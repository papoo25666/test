<?php
include "../configs/config.php";
include_once "ConnectDB.php";

class ManagePBL
{
    private $db;
    private $result;

    function __construct()
    {
        $conn = new Database();
        $this->db = $conn->connect();
    }

    public function getPBL()
    {
        $this->result = $this->db->prepare("SELECT *FROM user_story");
        $this->result->execute();
        $this->result = $this->result->fetchAll();
        return $this->result;
    }

    public function deleteStoryItems()
    {

    }

    public function insertStoryItems()
    {

    }

    public function editStoryItems()
    {

    }

    public function updateStoryItems()
    {

    }

    public function getPrioriry()
    {

    }
}

?>