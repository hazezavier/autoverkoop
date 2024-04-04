<?php
require_once 'auth.php';
include("header.php");

require("classes/dbconnectie.php");
include("classes/car.php");
include("classes/bike.php");

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
            $carId = 1;
            $car = Car::allFromDatabase($db, $carId);

            echo "<br>";
            echo "<br>";

            $bikeId = 1;
            $bike = Bike::allFromDatabase($db, $bikeId);
        ?>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Car Shop</p>
    </footer>
</body>

</html>
