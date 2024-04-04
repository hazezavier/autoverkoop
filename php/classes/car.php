<?php

include("classes/vehicle.php");



class Car extends Vehicle {
    public $doors;

    public function __construct($name, $color, $price, $doors)
    {
        parent::__construct($name, $color, $price);
        $this->doors = $doors;
    }

    public static function fromDatabase($db, $carId) {
        $config = require('config.php');
        $db = new Database($config);

        $query = "SELECT `name`, color, price, doors FROM car WHERE id = :id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':id', $carId);
        $statement->execute();

        $carData = $statement->fetch(PDO::FETCH_ASSOC);

            echo $carData['name'];
            echo "<br>";
            echo $carData['color'];
            echo "<br>";
            echo $carData['price'];
            echo "<br>";
            echo $carData['doors'];

        return new self($carData['name'], $carData['color'], $carData['price'], $carData['doors']);
    }
}
?>