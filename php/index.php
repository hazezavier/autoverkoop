<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Shop</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Car Shop</h1> <!-- header -->
    </header>

    <div id="car-list"> <!-- #car-list -->
        <!-- Car listings will be dynamically added here -->
        <?php
        include("dbconnectie.php");
        $sql = "SELECT * FROM car";
        $stmt = $conn->query($sql);
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="car">'; // .car
            echo '<img src="images/' . $row['image'] . '" alt="' . $row['name'] . '">'; // .car img
            echo '<div class="car-info">'; // .car-info
            echo '<h2>' . $row['name'] . '</h2>'; // .car h2
            echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>'; // .car p
            echo '<button onclick="buyCar(\'' . $row['name'] . '\')">Buy Now</button>'; // .car button
            echo '</div>'; // car-info
            echo '</div>'; // car
        }
        ?>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Car Shop</p> <!-- footer -->
    </footer>
</body>

</html>
