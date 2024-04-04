<?php

require_once("classes/user.php");

class Seller extends User {
    public function __construct($username, $password, $email)
    {
        parent::__construct($username, $password, $email);
    }

    public function sell()
    {
        //copy to buyer
        //remove from seller
    }
}
?>