<?php
include_once "../configs/config.php";
include_once "/ConnectDB.php";

class ManageSprint
{
    private $db;
    private $result;

    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->connect();
    }

    public function insertSprint($name)
    {
        $end_date = date("Y-m-d", strtotime("+2 week"));
        $this->result = $this->db->prepare("INSERT INTO sprint_backlog(sbl_id,sbl_name,sbl_started,sbl_end) VALUES (null,?,NOW(),?)");
        $value = array($name, $end_date);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getLastSprint()
    {
        $this->result = $this->db->prepare("SELECT *FROM sprint_backlog ORDER BY sbl_id DESC LIMIT 1;");
        $this->result->execute();
        return $this->result->fetchAll();
    }

    public function getSprintById($id)
    {
        $this->result = $this->db->prepare("SELECT *FROM sprint_backlog WHERE sbl_id = ?");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }

    public function getSprintCount()
    {
        $this->result = $this->db->prepare("SELECT COUNT(*) AS counts FROM sprint_backlog");
        $this->result->execute();
        return $this->result->fetchAll();
    }

    public function getSprint()
    {
        $this->result = $this->db->prepare("SELECT *FROM sprint_backlog");
        $this->result->execute();
        return $this->result->fetchAll();
    }

    public function deleteSprint($id)
    {
        $value = array($id);
        $issues = $this->db->prepare("DELETE FROM issues WHERE sprint_backlog_id = ?");
        $issues->execute($value);

        $this->result = $this->db->prepare("DELETE FROM sprint_backlog WHERE sbl_id = ?");
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    //check name sprint ซ้ำ
    public function getInfo($sbl)
    {
        $this->result = $this->db->prepare("SELECT *FROM sprint_backlog WHERE sbl_name = ?");
        $value = array($sbl);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function insertUserStoryForSprint($sprint_id, $story_id)
    {
        $this->result = $this->db->prepare("INSERT INTO scrum.sprint_backlog_has_user_story (sbl_story_id, sbl_id, user_story_id) VALUES (null,?,?)");
        $value = array($sprint_id, $story_id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getUserStoryBySprintId($id)
    {
        $this->result = $this->db->prepare("SELECT *FROM user_story "
            . "INNER JOIN sprint_backlog_has_user_story ON sprint_backlog_has_user_story.sbl_id = ? "
            . "AND user_story.user_story_id = sprint_backlog_has_user_story.user_story_id");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }

    public function getSprintInfoWithTeam($sprintId)
    {
        $this->result = $this->db->prepare("SELECT *FROM sprint_backlog INNER JOIN sprint_backlog_has_team "
            . "ON (sprint_backlog.sbl_id = ? AND sprint_backlog_has_team.sbl_id = ?) "
            . "INNER JOIN team ON team.team_id = sprint_backlog_has_team.team_id");
        $value = array($sprintId, $sprintId);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }

    public function getCountBySprintId($sprintId)
    {
        $this->result = $this->db->prepare("SELECT *FROM sprint_backlog_has_user_story WHERE sbl_story_id = ?");
        $value = array($sprintId);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }
}

?>