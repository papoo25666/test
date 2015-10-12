<?php
include "../configs/config.php";

class Database
{
    private $conn;
    public function connect()
    {
        $this->conn = new PDO("mysql:host=".SERVER.";dbname=".DBNAME , USERNAME , PASSWORD);
        return $this->conn;
    }
}
?>