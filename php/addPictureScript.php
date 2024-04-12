<?php
require "classes/dbconnectie.php";
$config = require('config.php');
$db = new Database($config);


$imageData = file_get_contents('../images/toyotacamry.jpg');
echo "<pre>" . print_r($imageData, true) . "</pre>";
$query = "INSERT INTO images (image_data, car_id) VALUES (?, 2)";
$statement = $db->connection->prepare($query);
$statement->bindParam(1, $imageData, PDO::PARAM_LOB);
$statement->execute();

//change so filename also is given