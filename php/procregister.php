<?php
include("dbconnectie.php");

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if(isset($_POST["username"])){
    try{
        $x = $conn->prepare("INSERT INTO customer (username, password, email)
                    VALUES(:un,:pw,:em)");

        $x->execute([   ":un"=>$username,
                        ":pw"=>$hashed_password,
                        ":em"=>$email]);

        header('Location: login.php');
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

