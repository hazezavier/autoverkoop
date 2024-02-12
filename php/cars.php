<?php
include("dbconnectie.php");

class Car {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllCars() {
        $sql = "SELECT * FROM car";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCarById($id) {
        $sql = "SELECT * FROM car WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Add more methods as needed, such as addCar, updateCar, deleteCar, etc.
}

// Usage example:
$car = new Car($conn);
$cars = $car->getAllCars();
foreach ($cars as $carInfo) {
    // Output car information here
}
?>
