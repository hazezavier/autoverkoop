<?php

include("classes/vehicle.php");



class Car extends Vehicle {
    public $doors;

    public function __construct($name, $color, $price, $doors)
    {
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
        $this->doors = $doors;
    }

    public static function fromDatabase($db, $tableName, $carId, $columns = ['name', 'color', 'price', 'doors']) {
        $config = require('config.php');
        $db = new Database($config);

        $columnNames = implode(', ', $columns);
        $query = "SELECT {$columnNames} FROM {$tableName} WHERE id = :id";
        // $query = "SELECT name, color, price, doors FROM car WHERE id = :id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':id', $carId);
        $statement->execute();

        $carData = $statement->fetch(PDO::FETCH_ASSOC);


        $carArgs = array_map(function($col) use ($carData) {
            return $carData[$col];
        }, $columns);

        // Create and return a new Car object
        // return new self($carData['name'], $carData['color'], $carData['price'], $carData['doors']);
        return new self(...$carArgs);
    }


    // function __destruct() {
    //     echo "The car is an {$this->name}";
    //     echo "<br>";
    //     echo "The color is {$this->color}"; 
    //     echo "<br>";
    //     echo "It costs €{$this->price},-";
    //     echo "<br>";
    //     echo "The car has {$this->doors} doors"; 
    //     echo "<br>";
    //     echo "<br>";
    //   }
}
?>