<?php
include "/configs/config.php";

class Database
{
    private $conn;

    public function connect()
    {
        $this->conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DBNAME, USERNAME, PASSWORD);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->conn;
    }
}

?>