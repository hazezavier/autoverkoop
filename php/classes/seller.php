<?php

require_once("classes/user.php");

class Seller extends User {
    public function __construct($id, $username, $email, $phone_number)
    {
        parent::__construct($id, $username, $email, $phone_number);
    }

    public function sell()
    {
        //copy to buyer
        //remove from seller
    }

    public static function displaySeller($db, $userId) {
        $config = require('config.php');
        $db = new Database($config);

        $query = "SELECT * FROM user WHERE id = :id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':id', $userId);
        $statement->execute();
        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        echo "Username: " . $userData['username'];
        echo "<br>";
        echo "<br>";
        echo "E-mail: " . $userData['email'];
        echo "<br>";
        echo "<br>";
        echo "Phone number: " . $userData['phone_number'];

            return new self(
                $userData['id'],
                $userData['username'],
                $userData['email'],
                $userData['phone_number']);
    }
}
?>