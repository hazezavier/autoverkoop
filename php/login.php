<?php

require "dbconnectie.php";
require_once 'auth.php';

requireNotLoggedIn();

$config = require('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameInput = $_POST['username'];
    $passwordInput = $_POST['password'];


    try {
        $db = new Database($config);

        $query = "SELECT * FROM customer WHERE username = :username";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':username', $usernameInput);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);


        if ($user && password_verify($passwordInput, $user['password'])) {
            $_SESSION['username'] = $usernameInput;
            echo "test";
            header('Location: index.php');
            exit();
        } else {
            echo "Invalid username or password. <a href='login.php'>Try again</a>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<head>
<title>Login</title>
</head>

    <body>

        <form method="post" action="">

            <label for="name">USERNAME</label>
            <input type="text" name="username" size="20" required>

            <br>
            <br>

            <label for="password">PASSWORD</label>
            <input type="password" name="password" size="20" required>

            <br>

            <input type="submit" value="LOGIN" name="btnsubmit">

            <input type="button" onclick="window.location.href='register.php';" value="REGISTER">
        </form>

    </body>

