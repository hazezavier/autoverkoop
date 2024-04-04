<?php

class Vehicle {
    public $name;
    public $color;
    public $price;

    public function __construct($name, $color, $price)
    {
        $this->name = $name;
        $this->color = $color;
        $this->price = $price;
    }

}
?>