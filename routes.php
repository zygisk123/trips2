<?php
include "./controllers/TripController.php";

if ($_SERVER['REQUEST_METHOD'] == "GET"){

    if(count($_GET) == 0){
        $trips = TripController::getAll();
    }

    if(isset($_GET['filter'])){
        $trips = TripController::filter();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['createNewTrip'])){
        TripController::createNewTrip();
        header("Location: ./index.php");
        die;
    }
}

$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
?>