<?php
require("classes/dbconnectie.php");
require_once("classes/user.php");

class Buyer extends User {
    public function __construct($id, $username, $email)
    {
        parent::__construct($id, $username, $email);
    }

    public function buyCar($carId) {
        $config = require('config.php');
        $db = new Database($config);
        // var_dump($carId);

        $query = "SELECT * FROM car WHERE id = :carId AND status = 'available'";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':carId', $carId);
        $statement->execute();
        $car = $statement->fetch(PDO::FETCH_ASSOC);
        // var_dump($car);

        if (!$car) {
            return "Car not available for purchase.";
        }

        // Perform the purchase transaction
        $buyerId = $this->getId();
        $sellerId = $car['seller_id'];

        // Start a database transaction to ensure data consistency
        $db->connection->beginTransaction();

        try {
            // Update car status to 'sold' and set buyer ID
            $updateQuery = "UPDATE car SET status = 'sold', buyer_id = :buyerId WHERE id = :carId";
            $updateStatement = $db->connection->prepare($updateQuery);
            $updateStatement->bindParam(':buyerId', $buyerId);
            $updateStatement->bindParam(':carId', $carId);
            $updateStatement->execute();

            // Commit the transaction if everything is successful
            $db->connection->commit();

            return "Car purchased successfully.";
        } catch (Exception $e) {
            // Roll back the transaction if an error occurs
            $db->connection->rollBack();
            return "Error occurred during purchase: " . $e->getMessage();
        }
    }


    




}
?>