<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buy_car'])) {
    // Retrieve the car_id from the form submission
    $selectedCarId = $_POST['car_id'];

    // Redirect to advertisement.php with the car_id as a query parameter
    header('Location: advertisement.php?car_id=' . $selectedCarId);
    exit; // Make sure to exit after the redirect
}
?>
