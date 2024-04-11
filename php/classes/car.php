<?php

require_once("classes/vehicle.php");

class Car extends Vehicle {
    public $doors;

    public function __construct($brand, $model, $color, $price, $doors, $transmission, $horsepower, $kilometers, $state, $body_type, $fuel, $registration_date, $weight, $license_plate)
    {
        parent::__construct($brand, $model, $color, $price, $transmission, $horsepower, $kilometers, $state, $body_type, $fuel, $registration_date, $weight, $license_plate);
        $this->doors = $doors;
    }

    public static function allCarInfo($db, $carId) {
        $config = require('config.php');
        $db = new Database($config);

        $query = "SELECT * FROM car WHERE id = :id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':id', $carId);
        $statement->execute();
        $carData = $statement->fetch(PDO::FETCH_ASSOC);

            echo "Brand: " . $carData['brand'];
            echo "<br>";
            echo "Model: " . $carData['model'];
            echo "<br>";
            echo "Color: " . $carData['color'];
            echo "<br>";
            echo "Price: €" . $carData['price'] . ",-";
            echo "<br>";
            echo "Doors: " . $carData['doors'];
            echo "<br>";
            echo "Transmission: " . $carData['transmission'];
            echo "<br>";
            echo "Horsepower: " . $carData['horsepower'];
            echo "<br>";
            echo "Kilometers: " . $carData['kilometers'];
            echo "<br>";
            echo "State: " . $carData['state'];
            echo "<br>";
            echo "Body type: " . $carData['body_type'];
            echo "<br>";
            echo "Fuel type: " . $carData['fuel'];
            echo "<br>";
            echo "Registration date: " . $carData['registration_date'];
            echo "<br>";
            echo "Weight: " . $carData['weight'] . "kg";
            echo "<br>";
            echo "License plate: " . $carData['license_plate'];

            //update car
            // UPDATE car
            // SET transmission = 'Manual', horsepower = '300', kilometers = '200000', state = 'As good as new', body_type = 'Sedan', fuel = 'Gasoline', registration_date = '2012-03-12', weight = '1300', license_plate = 'LK-X42-3'
            // WHERE id = 1;

        return new self(
            $carData['brand'], 
            $carData['model'], 
            $carData['color'], 
            $carData['price'], 
            $carData['doors'], 
            $carData['transmission'], 
            $carData['horsepower'], 
            $carData['kilometers'], 
            $carData['state'], 
            $carData['body_type'], 
            $carData['fuel'], 
            $carData['registration_date'], 
            $carData['weight'], 
            $carData['license_plate']);
    }

    public static function shortCarInfo($db, $carId) {
        $config = require('config.php');
        $db = new Database($config);

        $query = "SELECT * FROM car WHERE id = :id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':id', $carId);
        $statement->execute();
        $carData = $statement->fetch(PDO::FETCH_ASSOC);

            echo "Brand: " . $carData['brand'];
            echo " ";
            echo "Model: " . $carData['model'];
            echo " ";
            echo "Price: €" . $carData['price'] . ",-";
            echo " ";
            echo "Doors: " . $carData['doors'];
            echo " ";
            echo "Transmission: " . $carData['transmission'];

            return new self(
                $carData['brand'], 
                $carData['model'], 
                $carData['color'], 
                $carData['price'], 
                $carData['doors'], 
                $carData['transmission'], 
                $carData['horsepower'], 
                $carData['kilometers'], 
                $carData['state'], 
                $carData['body_type'], 
                $carData['fuel'], 
                $carData['registration_date'], 
                $carData['weight'], 
                $carData['license_plate']);

    }

    public static function brandCarInfo($db, $carId) {
        $config = require('config.php');
        $db = new Database($config);

        $query = "SELECT * FROM car WHERE id = :id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':id', $carId);
        $statement->execute();
        $carData = $statement->fetch(PDO::FETCH_ASSOC);

        echo $carData['brand'];

            return new self(
                $carData['brand'], 
                $carData['model'], 
                $carData['color'], 
                $carData['price'], 
                $carData['doors'], 
                $carData['transmission'], 
                $carData['horsepower'], 
                $carData['kilometers'], 
                $carData['state'], 
                $carData['body_type'], 
                $carData['fuel'], 
                $carData['registration_date'], 
                $carData['weight'], 
                $carData['license_plate']);

    }

    public static function priceCarInfo($db, $carId) {
        $config = require('config.php');
        $db = new Database($config);

        $query = "SELECT * FROM car WHERE id = :id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':id', $carId);
        $statement->execute();
        $carData = $statement->fetch(PDO::FETCH_ASSOC);

        echo $carData['price'];

            return new self(
                $carData['brand'], 
                $carData['model'], 
                $carData['color'], 
                $carData['price'], 
                $carData['doors'], 
                $carData['transmission'], 
                $carData['horsepower'], 
                $carData['kilometers'], 
                $carData['state'], 
                $carData['body_type'], 
                $carData['fuel'], 
                $carData['registration_date'], 
                $carData['weight'], 
                $carData['license_plate']);

    }
}
?>
