<?php

class Validator{


public static function validate()
{
    $hasError = false;
    if ($_POST['month'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti mėnesį";
        $hasError = true;
    }
    if ($_POST['distance'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti kelionės atstumą";
        $hasError = true;
    }
    if ($_POST['maxPeople'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti maksimalų keliautojų skaičių";
        $hasError = true;
    }

    if($hasError){
        foreach ($_POST as $key => $value) {
            $_SESSION['POST'][$key] = $value;
        }
    }
    
    return $hasError;
}

public static function validateParticipant()
{
    $hasError = false;
    if ($_POST['participantName'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti keliautojo vardą";
        $hasError = true;
    }
    if ($_POST['participantSurname'] == "") {
        $_SESSION['errors'][] = "Būtina nurodyti keliautojo pavardę";
        $hasError = true;
    }

    if($hasError){
        foreach ($_POST as $key => $value) {
            $_SESSION['POST'][$key] = $value;
        }
    }
    
    return $hasError;
}








}

?>