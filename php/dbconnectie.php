<?php
session_start();

// Database connection parameters
$dsn = "mysql:host=localhost;dbname=cars";
$username = "root";
$password = "";

try {
    // Attempt to connect to the database
    $conn = new PDO($dsn, $username, $password);

    // Set PDO attributes (error mode)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetching users example (you might not need this part here)
    $sql = "SELECT * FROM user";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    // If connection fails, display error message
    echo "Connection failed: " . $e->getMessage();
    die(); // Terminate script execution
}
?>
