<?php

require_once("classes/user.php");

class Buyer extends User {
    public function __construct($username, $password, $email)
    {
        parent::__construct($username, $password, $email);
    }

    public function buy()
    {
        //copy from seller to buyer
        //delete from seller
    }
}
?>