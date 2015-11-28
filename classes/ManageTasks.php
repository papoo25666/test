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

    public function insertTask($task_name, $task_value, $task_volunteer, $sprint_id, $story_id)
    {
        $this->result = $this->db->prepare("INSERT INTO tasks(task_name,task_value,task_volunteer,sbl_id,user_story_id) VALUES(?,?,?,?,?)");
        $value = array($task_name, $task_value, $task_volunteer, $sprint_id, $story_id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getAllTask()
    {
        $this->result = $this->db->prepare("SELECT *FROM tasks ORDER BY task_id DESC");
        $this->result->execute();
        return $this->result->fetchAll();
    }

    public function getTaskByStoryId($user_story_id)
    {
        $this->result = $this->db->prepare("SELECT *FROM tasks INNER JOIN user_story ON user_story.user_story_id = ? AND tasks.user_story_id = ?");
        $value = array($user_story_id, $user_story_id);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }

    public function editTask($taskId, $taskState)
    {
        $this->result = $this->db->prepare("UPDATE tasks SET task_state = ? WHERE task_id = ?");
        $value = array($taskState, $taskId);
        $this->result->execute($value);
        return $this->result->rowCount();
    }
}

?>