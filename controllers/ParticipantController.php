<?php
include "./models/Participant.php";

class ParticipantController{

    public static function getAllParticipants($id)
    {
        return Participant::getAllParticipants($id);
    }

    public static function createNewParticipant()
    {
        Participant::createNewParticipant();
    }
}
?>