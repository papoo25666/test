<?php

class ManageComment
{
    private $db;
    private $result;

    public function __construct()
    {
        include_once "ConnectDB.php";
        $conn = new Database();
        $this->db = $conn->connect();
    }

    public function getCommentByIssueId($id)
    {
        $this->result = $this->db->prepare("SELECT *FROM comment_issues INNER JOIN users ON comment_issues.issues_id = ? AND users.user_id = comment_issues.users_id ORDER BY comment_issues.comment_id DESC");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }

    public function insertComment($content, $user_id, $issue_id)
    {
        $this->result = $this->db->prepare("INSERT INTO comment_issues(comment_id,comment_content,comment_date,users_id,issues_id) VALUES (null,?,NOW(),?,?)");
        $value = array($content, $user_id, $issue_id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }
}

?>