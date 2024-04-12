<?php

require_once("classes/user.php");

class Seller extends User {
    public function __construct($id, $username, $email)
    {
        parent::__construct($id, $username, $email);
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

        echo $userData['username'];

            return new self(
                $userData['id'],
                $userData['username'],
                $userData['email']);
    }
}
?>