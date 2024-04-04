<?php

require_once("classes/vehicle.php");

class Bike extends Vehicle {
    public function __construct($brand, $model, $color, $price)
    {
        parent::__construct($brand, $model, $color, $price);
    }

    public static function fromDatabase($db, $bikeId) {
        $config = require('config.php');
        $db = new Database($config);

        $query = "SELECT brand, model, color, price FROM bike WHERE id = :id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':id', $bikeId);
        $statement->execute();

        $bikeData = $statement->fetch(PDO::FETCH_ASSOC);

            // var_dump($bikeData);
            echo $bikeData['brand'];
            echo "<br>";
            echo $bikeData['model'];
            echo "<br>";
            echo $bikeData['color'];
            echo "<br>";
            echo $bikeData['price'];
            echo "<br>";

        return new self($bikeData['brand'], $bikeData['model'], $bikeData['color'], $bikeData['price']);
    }
}
?>