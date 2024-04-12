<?php

class User {
    public $id;
    public $username;
    public $email;
    public $phone_number;
    public function __construct($id, $username, $email, $phone_number)
    {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->phone_number = $phone_number;
    }

    public function getId() {
        return $this->id;
    }

}
?>