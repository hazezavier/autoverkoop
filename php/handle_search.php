<?php
// Database credentials
$hostname = 'localhost'; // Or your database host
$username = 'root';
$password = '';
$database = 'carzilla';

// Create connection
$connection = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$selectedBrand = $_POST['brand'];

// Construct SQL query to fetch data based on selected brand
$sql = "SELECT model, YEAR(registration_date) AS year, kilometers FROM car WHERE brand = '$selectedBrand'";
$result = mysqli_query($connection, $sql);

// Check if query was successful
if ($result) {
    // Fetch and display the results
    while ($row = mysqli_fetch_assoc($result)) {
        // Display each result
        echo "<p>Model: " . $row['model'] . "</p>";
        echo "<p>Build Year: " . $row['year'] . "</p>";
        echo "<p>Kilometers: " . $row['kilometers'] . "</p>";
    }
} else {
    // Query failed
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
mysqli_close($connection);
?>
