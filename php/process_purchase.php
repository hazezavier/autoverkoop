<?php

    include("classes/buyer.php");


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buy_car'])) {
        $config = require('config.php');
        $db = new Database($config);
        // var_dump($_POST);
        $carId = $_POST['car_id'];
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $buyer = new Buyer($id, $username, $email); // Create a Buyer object (you may need to pass user ID or other info)

        // Call the buyCar() function
        $result = $buyer->buyCar($carId);

        // Output the result (e.g., success message or error)
        echo $result;
    }