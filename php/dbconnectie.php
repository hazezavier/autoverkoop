<?php
    session_start();
    $dsn = "mysql:host=localhost;dbname=cars";
    $hst = "localhost";
    $usr = "root";
    $pwd = "root";

    
    $conn = new PDO($dsn, $usr, $pwd);


    $sql = "SELECT * FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?> 
    