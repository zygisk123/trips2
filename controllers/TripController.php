<?php
include "./models/Trip.php";

class TripController{

    public static function getAll()
    {
        return Trip::getAll();
    }

    public static function createNewTrip()
    {
        if (Validator::validate()) {
            header("Location: ./index.php");
            die;
        }
        Trip::createNewTrip();
    }

    public static function filter()
    {
        return Trip::filter();
    }

    public static function showTrip($id)
    {
        return Trip::showTrip($id);
    }

    public static function updateTrip()
    {
        $trip = New Trip();
        $trip->id = $_POST['updateTripID'];
        $trip->month = $_POST['month'];
        $trip->maxPeople = $_POST['maxPeople'];
        $trip->distance = $_POST['distance'];
        $trip->withPets = $_POST['withAnimals'];
        $trip->updateTrip();
    }

    public static function destroy($id)
    {
        Trip::destroy($id);
    }

}
?>