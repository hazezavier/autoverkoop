<?php
session_start();

include("dbconnectie.php");
require_once 'auth.php';

requireNotLoggedIn();

// Get form input
$usernameInput = $_POST['username'];
$passwordInput = $_POST['password'];


try {
    // Create PDO instance
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Query database to check user credentials
    $query = "SELECT * FROM customer WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $usernameInput);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Verify password
    if ($user && password_verify($passwordInput, $user['password'])) {
        // Password is correct, set session variables
        $_SESSION['username'] = $user['username'];
        
        // Redirect to a different page
        header('Location: index.php');
        exit();
    } else {
        // Invalid username or password
        echo "Invalid username or password. <a href='login.php'>Try again</a>";
    }
} catch (PDOException $e) {
    // Handle database errors
    echo "Error: " . $e->getMessage();
}