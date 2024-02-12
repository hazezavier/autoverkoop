<?php
include("dbconnectie.php");

class Car {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
}
?>