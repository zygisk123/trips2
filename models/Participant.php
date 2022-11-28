<?php

class Participant{
    public $id;
    public $name;
    public $surname;

    public function __construct($id = null, $name = null, $surname = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
    }

    public static function getAllParticipants($id)
    {
        $participants = [];
        $db = new DB();
        $query = "SELECT `id`, `name`, `surname` FROM `participants` WHERE `trip_id` = '" . $id . "'";
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $participants[] = new Participant($row['id'], $row['name'], $row['surname']);
        }
        $db->conn->close();
        return $participants;
    }

    public static function createNewParticipant()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `participants`( `name`, `surname`, `trip_id`) VALUES (?,?,?)");
        $stmt->bind_param("ssi", $_POST['participantName'], $_POST['participantSurname'], $_POST['regTripID']);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }
}
?>