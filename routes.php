<?php
include "./controllers/TripController.php";
include "./controllers/ParticipantController.php";
$edit = false;


if ($_SERVER['REQUEST_METHOD'] == "GET"){

    if(count($_GET) == 0){
        $trips = TripController::getAll();
    }

    if(isset($_GET['filter'])){
        $trips = TripController::filter();
    }

    if (isset($_GET['tripID'])) {
        $trip = TripController::showTrip($_GET['tripID']);
        $participants = ParticipantController::getAllParticipants($_GET['tripID']);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['createNewTrip'])){
        TripController::createNewTrip();
        header("Location: ./index.php");
        die;
    }

    if (isset($_POST['registerParticipant'])) {
        ParticipantController::createNewParticipant();
        $trip = TripController::showTrip($_GET['tripID']);
        $participants = ParticipantController::getAllParticipants($_GET['tripID']);
    }

    if(isset($_POST['edit'])){
        $trip = TripController::showTrip($_POST['id']);    
        $trips = TripController::getAll();
        $edit = true;
    } 

    if(isset($_POST['destroy'])){
        TripController::destroy($_POST['id']);    
        header("Location: ./index.php");
        die;
    } 
    
    if(isset($_POST['updateTrip'])){
        TripController::updateTrip();    
        header("Location: ./index.php");
        die;
    } 
}

$months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
?>