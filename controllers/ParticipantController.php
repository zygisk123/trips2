<?php
include "./models/Participant.php";
include "./helperClasses/Validator.php";


class ParticipantController{

    public static function getAllParticipants($id)
    {
        return Participant::getAllParticipants($id);
    }

    public static function createNewParticipant()
    {
        if (Validator::validateParticipant()) {
            header("Location: ./show.php");
            die;
        }
        Participant::createNewParticipant();
    }
}
?>