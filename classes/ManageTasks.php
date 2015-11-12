<?php

class ManageTasks
{

    private $db;
    private $result;

    public function __construct()
    {
        include_once "ConnectDB.php";
        $conn = new Database();
        $this->db = $conn->connect();
    }

    public function insertTask($task, $volunteer, $task_value, $user_id, $sprint_id)
    {
        $this->result = $this->db->prepare("INSERT INTO tasks(task_name,task_value,user_id,sbl_id) VALUES(?,?,?,?)");
        $value = array($task, $task_value, $user_id, $sprint_id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }
}

?>