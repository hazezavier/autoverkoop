<?php
include("dbconnectie.php");

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if(isset($_POST["username"])){
    try{
        $x = $conn->prepare("INSERT INTO customer (username, password, email)
                    VALUES(:un,:pw,:em)");

        $x->execute([   ":un"=>$username,
                        ":pw"=>$password,
                        ":em"=>$email]);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    header("location:login.php?msg=toegevoegd aan de database");
}

