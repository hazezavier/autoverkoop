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

    // Add more methods as needed, such as getCarById, addCar, updateCar, deleteCar, etc.
}

// Usage example:
$car = new Car($conn);
$cars = $car->getAllCars();

// Check if cars are found
if ($cars) {
    foreach ($cars as $carInfo) {
        // Output car information here
        echo '<div class="car">';
        echo '<img src="images/' . $carInfo['image'] . '" alt="' . $carInfo['name'] . '">';
        echo '<div class="car-info">';
        echo '<h2>' . $carInfo['name'] . '</h2>';
        echo '<p>' . $carInfo['description'] . '</p>';
        echo '<p>Price: $' . $carInfo['price'] . '</p>';
        echo '<button onclick="buyCar(\'' . $carInfo['name'] . '\')">Buy Now</button>';
        echo '</div>'; // car-info
        echo '</div>'; // car
    }
} else {
    // Display a message if no cars are found
    echo '<p>No cars found.</p>';
}
?>
