<?php
include "./models/DB.php";

class Trip{
    public $id;
    public $month;
    public $distance;
    public $maxPeople;
    public $withPets;

    public function __construct($id = null, $month = null, $maxPeople = null, $distance = null, $withPets = null)
    {
        $this->id = $id;
        $this->month = $month;
        $this->maxPeople = $maxPeople;
        $this->distance = $distance;
        $this->withPets = $withPets;
    }

    public static function getAll()
    {
        $trips = [];
        $db = New DB();
        $query = "SELECT * FROM `trips`";
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $trips[] = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals']);
        }
        $db->conn->close();
        return $trips;
    }

    public static function createNewTrip()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `trips`(`month`, `max_people_allowed`, `distance`, `with_animals`) VALUES (?,?,?,?)");
        $stmt->bind_param("siii", $_POST['month'], $_POST['maxPeople'], $_POST['distance'], $_POST['withAnimals']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function filter()
    {
        $trips = [];
        $db = New DB();
        $query = "SELECT * FROM `trips`";
        $first = true;

        if ($_GET['filterByMonth'] != "") {
            $query .= " WHERE `month` = '" . $_GET['filterByMonth'] . "'";
            $first = false;
        }
        if ($_GET['filterByPatricipants'] != "") {
            if ($first) {
                $query .= " WHERE `max_people_allowed` >= '" . $_GET['filterByPatricipants'] . "'";
                $first = false;
            }else {
                $query .= " AND `max_people_allowed` >= '" . $_GET['filterByPatricipants'] . "'";
            }
        }
        if (isset($_GET['findWithAnimals'])) {
            if ($first) {
                $query .= " WHERE `with_animals` > 0 ";
                $first = false;
            }else {
                $query .= " AND `with_animals` > 0 " ;
            }
        }
        switch ($_GET['sort']) {
            case '1':
                $query .= " ORDER by `distance`";
                break;
            case '2':
                $query .= " ORDER by `distance` DESC";
                break;
        }
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $trips[] = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals']);
        }
        $db->conn->close();
        return $trips;
    }

    public static function showTrip($id)
    {
        $trip = new Trip();
        $db = new DB();
        $query = "SELECT * FROM `trips` WHERE `id` = '" . $id . "'";
        $result = $db->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $trip = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals']);
        }
        $db->conn->close();
        return $trip;

    }

    public function updateTrip()
    {
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `trips` SET `month`= ?,`max_people_allowed`= ?,`distance`= ?,`with_animals`= ? WHERE `id` = ?");
        $stmt->bind_param("siiii", $_POST['month'], $_POST['maxPeople'], $_POST['distance'], $_POST['withAnimals'], $_POST['updateTripID']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `trips` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();
        $db->conn->close(); 
    }
}

?>