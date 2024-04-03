<?php
require_once 'auth.php';
require("classes/dbconnectie.php");
include("header.php");
include("classes/car.php");

requireLogin();

$config = require('config.php');

$db = new Database($config);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <header>
        <h1>Car Shop</h1>
    </header>

    <div id="car-list">
        <?php

            //fetch/fetchAll???

            //$db = new Database();

            // $users = $db->query("select * from customer")->fetchAll();

            // foreach ($users as $user) {
            //     echo "<li>" . $user['password'] . "</li>";
            // }


            
            // Create a new Car object from the database
            $carId = 1;
            // $car = Car::fromDatabase($db, $carId);
            $car = Car::fromDatabase($db, 'car', $carId, ['name', 'color', 'price', 'doors']);


            // Now you can access the properties of the car object
            // echo "Car details:<br>";
            // echo "Name: " . $car->name . "<br>";
            // echo "Color: " . $car->color . "<br>";
            // echo "Price: €" . $car->price . "<br>";
            // echo "Doors: " . $car->doors . "<br>";


            // works with destruct
            // $audiS3 = new Car("Audi S3", "red", "15000", "4");
            // $bmwE36 = new Car("BMW", "purple", "5000", "2");
        ?>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Car Shop</p>
    </footer>
</body>

</html>
