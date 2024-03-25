<?php
require_once 'auth.php';
include("dbconnectie.php");
include("header.php");

requireLogin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <header>
        <h1>Car Shop</h1>
    </header>

    <div id="car-list">
        <!-- Car listings will be dynamically added here -->
        <?php
            // Fetch car listings from the database
            $sql = "SELECT * FROM car";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="car">';
                echo '<img src="images/' . $row['image'] . '" alt="' . $row['name'] . '">';
                echo '<h2>' . $row['name'] . '</h2>';
                echo '<p>Price: ' . $row['price'] . '</p>';
                echo '<button onclick="buyCar(\'' . $row['name'] . '\')">Buy Now</button>';
                echo '</div>';
            }
        ?>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Car Shop</p>
    </footer>
</body>

</html>
