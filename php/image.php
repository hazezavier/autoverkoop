<?php
// require_once "classes/dbconnectie.php";
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
class Image {
    public $image;
    public function __construct()
    {
        // $this->image = $image
    }
    public static function getImage($db, $carId) {
        $config = require('config.php');
        $db = new Database($config);

        $query = "SELECT image_data FROM images WHERE id = :car_id";
        $statement = $db->connection->prepare($query);
        $statement->bindParam(':car_id', $carId);
        $statement->execute();
        $carImage = $statement->fetch(PDO::FETCH_ASSOC);
        // $bikeImage = $statement->fetch(PDO::FETCH_ASSOC);

        $blobData = $carImage['image_data'];

        echo '<img src="data:image/png;base64,'.base64_encode( $blobData ).'"/>';

        // return new self(
        //     $carImage);
    }
}

