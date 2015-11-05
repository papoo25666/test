<?php

class ManageIssues
{

    private $db;
    private $result;

    public function __construct()
    {
        include_once "ConnectDB.php";
        $conn = new Database();
        $this->db = $conn->connect();
    }

    public function insertIssues($desc, $image, $status, $sprint_id)
    {
        $this->result = $this->db->prepare("INSERT INTO issues(id,issue_desc,issue_date,issue_image_path,issue_status,sprint_backlog_id) VALUES (null,?,NOW(),?,?,?)");
        $value = array($desc, $image, $status, $sprint_id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getIssues()
    {

    }

    public function getIssuesById($id)
    {
        $this->result = $this->db->prepare("SELECT *FROM issues WHERE sprint_backlog_id = ?");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }
}

?>