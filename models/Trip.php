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
        }
        $result = $db->conn->query($query);
        // echo $query;
        while ($row = $result->fetch_assoc()) {
            $trips[] = new Trip($row['id'], $row['month'], $row['max_people_allowed'], $row['distance'], $row['with_animals']);
        }
        $db->conn->close();
        return $trips;
    }

}

?>