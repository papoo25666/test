<?php

class ManageTeam
{
    private $db;
    private $result;

    public function __construct()
    {
        include_once "ConnectDB.php";
        $conn = new Database();
        $this->db = $conn->connect();
    }

    public function insertTeam($team)
    {
        $this->result = $this->db->prepare("INSERT INTO team(team_id,team_name) VALUES (null,?)");
        $value = array($team);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function editTeam()
    {

    }
}

?>