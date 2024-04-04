<?php
require 'classes/dbconnectie.php';
require_once 'auth.php';

requireNotLoggedIn();

$config = require('config.php');


if(isset($_POST["username"])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try{
        $db = new Database($config);

        $query = "INSERT INTO user (username, password, email) VALUES (:un, :pw, :em)";
        $statement = $db->connection->prepare($query);
        $statement->execute(array(":un" => $username, ":pw" => $hashed_password, ":em" => $email));

        header('Location: login.php');
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>
<head>
<title>Register</title>
</head>

    <body>

        <form method="post" action="">

            <label for="name">USERNAME</label>
            <br>
            <input type="text" name="username" size="20">

            <br>
            <br>

            <label for="password">PASSWORD</label>
            <br>
            <input type="password" name="password" size="20">

            <br>
            <br>

            <label for="email">EMAIL</label>
            <br>
            <input type="email" name="email" size="20">

            <br>
            <br>

            <input type="submit" value="REGISTER" name="btnsubmit">
        </form>

    </body>