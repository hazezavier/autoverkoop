<?php

require_once("classes/user.php");

class Buyer extends User {
    public function __construct($id, $username, $email)
    {
        parent::__construct($id, $username, $email);
    }

    public function buyCar($carId) {
        $config = require('config.php');
        $db = new Database($config);
        // Assume $db is your database connection object

        // Check if the car exists and is available for sale
        $query = "SELECT * FROM cars WHERE id = :carId AND status = 'available'";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':carId', $carId);
        $statement->execute();
        $car = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$car) {
            return "Car not available for purchase.";
        }

        // Perform the purchase transaction
        $buyerId = $this->getId(); // Assuming you have a method to get the buyer's ID
        $sellerId = $car['seller_id']; // Assuming there's a seller ID associated with the car

        // Start a database transaction to ensure data consistency
        $db->connection->beginTransaction();

        try {
            // Update car status to 'sold' and set buyer ID
            $updateQuery = "UPDATE car SET status = 'sold', buyer_id = :buyerId WHERE id = :carId";
            $updateStatement = $db->connection->prepare($updateQuery);
            $updateStatement->bindParam(':buyerId', $buyerId);
            $updateStatement->bindParam(':carId', $carId);
            $updateStatement->execute();

            // Deduct purchase amount from buyer's account balance (hypothetical)
            // You would need to implement the actual logic based on your system
            // For example: $this->deductFromAccount($car['price']);

            // Transfer funds to the seller (hypothetical)
            // You would need to implement the actual logic based on your system
            // For example: $this->transferToSeller($car['price'], $sellerId);

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