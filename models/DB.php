<?php

class DB{
    public $conn;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "trips_data";
        $this->conn = new mysqli($servername, $username, $password, $db);
    }





}

?>