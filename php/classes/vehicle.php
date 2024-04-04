<?php

class Vehicle {
    public $name;
    public $color;
    public $price;

    public function __construct($brand, $model, $color, $price)
    {
        $this->name = $brand;
        $this->name = $model;
        $this->color = $color;
        $this->price = $price;
    }

}
?>