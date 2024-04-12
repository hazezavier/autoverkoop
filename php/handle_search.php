<?php
// Include the Database class
require_once 'classes/dbconnectie.php';

try {
    // Create a new instance of the Database class
    $config = require('config.php'); // Assuming $config is defined in the config.php file
    $db = new Database($config);

    // Retrieve form data
    $selectedCarId = $_POST['car_id'];
    $selectedBrand = $_POST['brand'];
    $selectedModel = $_POST['model'];
    $selectedYear = $_POST['year'];
    $selectedKilometers = $_POST['kilometers'];

    // Construct SQL query to fetch data based on selected brand
    $sql = "SELECT model, YEAR(registration_date) AS year, kilometers FROM car WHERE brand = :selectedBrand";

    // Prepare the statement
    $stmt = $db->connection->prepare($sql);

    // Bind parameter values
    $stmt->bindParam(':selectedBrand', $selectedBrand, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();

    // Fetch and display the results
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Display each result
        // echo "<p>Model: " . $row['model'] . "</p>";
        // echo "<p>Build Year: " . $row['year'] . "</p>";
        // echo "<p>Kilometers: " . $row['kilometers'] . "</p>";
        header('Location: advertisement.php?car_id=' . $selectedCarId);
        exit();
    }
} catch (PDOException $e) {
    // Display error message
    echo "Error: " . $e->getMessage();
}
?>