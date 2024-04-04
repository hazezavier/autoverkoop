<?php

require_once("classes/vehicle.php");

class Car extends Vehicle {
    public $doors;

    public function __construct($brand, $model, $color, $price, $doors)
    {
        parent::__construct($brand, $model, $color, $price);
        $this->doors = $doors;
    }

    public static function fromDatabase($db, $carId) {
        $config = require('config.php');
        $db = new Database($config);

        $query = "SELECT brand, model, color, price, doors FROM car WHERE id = :id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':id', $carId);
        $statement->execute();

        $carData = $statement->fetch(PDO::FETCH_ASSOC);

            echo $carData['brand'];
            echo "<br>";
            echo $carData['model'];
            echo "<br>";
            echo $carData['color'];
            echo "<br>";
            echo $carData['price'];
            echo "<br>";
            echo $carData['doors'];
            echo "<br>";

        return new self($carData['brand'], $carData['model'], $carData['color'], $carData['price'], $carData['doors']);
    }
}
?>