<?php
include "ConnectDB.php";

class ManageUserStory
{
    private $db;
    private $result;

    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->connect();
    }

    public function getUserStory()
    {
        $this->result = $this->db->prepare("SELECT *FROM user_story");
        $this->result->execute();
        $data = $this->result->fetchAll();
        return $data;
    }
}

?>