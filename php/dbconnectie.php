<?php

// Database connection parameters
$dsn = "mysql:host=localhost;dbname=carzilla";
$username = "root";
$password = "";

try {
    // Attempt to connect to the database
    $conn = new PDO($dsn, $username, $password);

    // Set PDO attributes (error mode)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    // If connection fails, display error message
    echo "Connection failed: " . $e->getMessage();
    die(); // Terminate script execution
}
?>
