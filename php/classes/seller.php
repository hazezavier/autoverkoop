<?php

require_once("classes/user.php");

class Seller extends User {
    public function __construct($id, $username, $password, $email)
    {
        parent::__construct($id, $username, $password, $email);
    }

    public function sell()
    {
        //copy to buyer
        //remove from seller
    }
}
?>