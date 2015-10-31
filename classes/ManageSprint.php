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
        $this->result = $this->db->prepare("INSERT INTO sprint_backlog(id,sbl_name,sbl_date) VALUES (null,?,NOW())");
        $value = array($name);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getLastSprint()
    {
        $this->result = $this->db->prepare("SELECT *FROM sprint_backlog ORDER BY id DESC LIMIT 1;");
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
        $this->result = $this->db->prepare("DELETE FROM sprint_backlog WHERE id = ?");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getInfo()
    {

    }
}

?>