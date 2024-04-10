<?php

require_once("classes/vehicle.php");

class Bike extends Vehicle {
    public function __construct($brand, $model, $color, $price, $transmission, $horsepower, $kilometers, $state, $body_type, $fuel, $registration_date, $weight, $license_plate)
    {
        parent::__construct($brand, $model, $color, $price, $transmission, $horsepower, $kilometers, $state, $body_type, $fuel, $registration_date, $weight, $license_plate);
    }

    public static function allFromDatabase($db, $bikeId) {
        $config = require('config.php');
        $db = new Database($config);

        $query = "SELECT * FROM bike WHERE id = :id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':id', $bikeId);
        $statement->execute();

        $bikeData = $statement->fetch(PDO::FETCH_ASSOC);

            echo $bikeData['brand'];
            echo "<br>";
            echo $bikeData['model'];
            echo "<br>";
            echo $bikeData['color'];
            echo "<br>";
            echo $bikeData['price'];
            echo "<br>";
            echo $bikeData['transmission'];
            echo "<br>";
            echo $bikeData['horsepower'];
            echo "<br>";
            echo $bikeData['kilometers'];
            echo "<br>";
            echo $bikeData['state'];
            echo "<br>";
            echo $bikeData['body_type'];
            echo "<br>";
            echo $bikeData['fuel'];
            echo "<br>";
            echo $bikeData['registration_date'];
            echo "<br>";
            echo $bikeData['weight'];
            echo "<br>";
            echo $bikeData['license_plate'];

        return new self(
            $bikeData['brand'], 
            $bikeData['model'], 
            $bikeData['color'], 
            $bikeData['price'],
            $bikeData['transmission'], 
            $bikeData['horsepower'], 
            $bikeData['kilometers'], 
            $bikeData['state'], 
            $bikeData['body_type'], 
            $bikeData['fuel'], 
            $bikeData['registration_date'], 
            $bikeData['weight'], 
            $bikeData['license_plate']);
    }
}
?>