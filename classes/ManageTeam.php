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

    public function deleteTeam($id)
    {
        $this->result = $this->db->prepare("DELETE FROM team WHERE team_id = ?");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function editTeam()
    {

    }

    public function getAllTeam()
    {
        $this->result = $this->db->prepare("SELECT *FROM team");
        $this->result->execute();
        return $this->result->fetchAll();
    }

    public function insertTeamForSprint($sprintId, $teamId)
    {
        $this->result = $this->db->prepare("INSERT INTO sprint_backlog_has_team VALUES (null,?,?)");
        $value = array($sprintId, $teamId);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function checkForInsertTeamForSprint($sprintId)
    {
        $this->result = $this->db->prepare("SELECT *FROM sprint_backlog_has_team WHERE sbl_id = ?");
        $value = array($sprintId);
        $this->result->execute($value);
        return $this->result->rowCount();
    }
}

?>