<?php
session_start();

// Database connection parameters
$dsn = "mysql:host=localhost;dbname=carzilla";
$username = "root";
$password = "root";

try {
    // Attempt to connect to the database
    $conn = new PDO($dsn, $username, $password);

    // Set PDO attributes (error mode)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetching cars example (you might not need this part here)
    $sql = "SELECT * FROM car";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    // If connection fails, display error message
    echo "Connection failed: " . $e->getMessage();
    die(); // Terminate script execution
}
?>
