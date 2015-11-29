<?php

class ManageSummary
{
    private $db;
    private $result;

    public function __construct()
    {
        include_once "ConnectDB.php";
        $con = new Database();
        $this->db = $con->connect();
    }

    public function getPointBurnDownById($sprintId)
    {
        $this->result = $this->db->prepare("SELECT *FROM tasks INNER JOIN sprint_backlog "
            . "ON sprint_backlog.sbl_id = ? AND task_state = 'Done' AND sprint_backlog.sbl_id = tasks.sbl_id");

        $value = array($sprintId);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }
}

?>