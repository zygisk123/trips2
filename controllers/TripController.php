<?php
include "./models/Trip.php";

class TripController{

    public static function getAll()
    {
        return Trip::getAll();
    }

    public static function createNewTrip()
    {
        Trip::createNewTrip();
    }

    public static function filter()
    {
        return Trip::filter();
    }
}
?>