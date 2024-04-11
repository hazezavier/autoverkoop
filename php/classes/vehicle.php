<?php

class Vehicle {
    public $name;
    public $model;
    public $color;
    public $price;
    public $transmission;
    public $horsepower;
    public $kilometers;
    public $state;
    public $body_type;
    public $fuel;
    public $registration_date;
    public $weight;
    public $license_plate;

    public function __construct($brand, $model, $color, $price, $transmission, $horsepower, $kilometers, $state, $body_type, $fuel, $registration_date, $weight, $license_plate)
    {
        $this->name = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->price = $price;
        $this->transmission = $transmission;
        $this->horsepower = $horsepower;
        $this->kilometers = $kilometers;
        $this->state = $state;
        $this->body_type = $body_type;
        $this->fuel = $fuel;
        $this->registration_date = $registration_date;
        $this->weight = $weight;
        $this->license_plate = $license_plate;
    }

}
?>