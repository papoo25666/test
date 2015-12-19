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
        try {
            $this->db->beginTransaction();

            $this->result = $this->db->prepare("INSERT INTO team(team_id,team_name) VALUES (null,?)");
            $value = array($team);
            $this->result->execute($value);

            $this->db->commit();

            return $this->result->rowCount();
        } catch (Exception $e) {
            $this->db->rollBack();
        }
    }

    public function deleteTeam($id)
    {
        try {
            $this->db->beginTransaction();

            $this->result = $this->db->prepare("DELETE FROM team WHERE team_id = ?");
            $value = array($id);
            $this->result->execute($value);

            $this->db->commit();

            return $this->result->rowCount();
        } catch (Exception $e) {
            $this->db->rollBack();
        }
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
        try {
            $this->db->beginTransaction();

            $this->result = $this->db->prepare("INSERT INTO sprint_backlog_has_team VALUES (null,?,?)");
            $value = array($sprintId, $teamId);
            $this->result->execute($value);

            $this->db->commit();

            return $this->result->rowCount();
        } catch (Exception $e) {
            $this->db->rollBack();
        }

    }

    public function checkForInsertTeamForSprint($sprintId)
    {
        $this->result = $this->db->prepare("SELECT *FROM sprint_backlog_has_team WHERE sbl_id = ?");
        $value = array($sprintId);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function changeTeam($sprintId, $teamId)
    {
        try {
            $this->db->beginTransaction();

            $this->result = $this->db->prepare("UPDATE sprint_backlog_has_team SET team_id = ? WHERE sbl_id = ?");
            $value = array($teamId, $sprintId);
            $this->result->execute($value);

            $this->db->commit();

            return $this->result->rowCount();
        } catch (Exception $e) {
            $this->db->rollBack();
        }
    }
}

?>