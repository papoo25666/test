<?php
include_once "/configs/config.php";

class Database
{
    private $conn;

    public function connect()
    {
        $this->conn = new PDO("mysql:host=" . SERVER . ";dbname=" . DBNAME, USERNAME, PASSWORD , array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $this->conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'utf8'");
        return $this->conn;
    }
}

?>