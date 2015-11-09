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

    public function insertIssues($desc, $image, $status, $sprint_id, $user_id)
    {
        $this->result = $this->db->prepare("INSERT INTO issues(issue_id,issue_desc,issue_date,issue_image_path,issue_status,sprint_backlog_id,users_id) VALUES (null,?,NOW(),?,?,?,?)");
        $value = array($desc, $image, $status, $sprint_id, $user_id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getIssues()
    {

    }

    public function getIssuesWithAvatarById($id)
    {
        $this->result = $this->db->prepare("SELECT *FROM issues INNER JOIN users ON sprint_backlog_id = ? AND users.user_id = issues.users_id");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }

    public function getIssuesById($id)
    {
        $this->result = $this->db->prepare("SELECT *FROM issues WHERE sprint_backlog_id = ?");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }

    public function getIssuesCommentWithAvatarById($id)
    {
        $this->result = $this->db->prepare("SELECT *FROM issues INNER JOIN users ON issues.issue_id = ? AND users.user_id = issues.users_id");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }


}

?>