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

    public function insertTask($task_name, $task_value, $task_volunteer, $task_start, $sprint_id, $story_id)
    {
        try {
            $this->db->beginTransaction();

            $this->result = $this->db->prepare("INSERT INTO tasks(task_name,task_value,task_volunteer,task_start,sbl_id,user_story_id) VALUES(?,?,?,?,?,?)");
            $value = array($task_name, $task_value, $task_volunteer, $task_start, $sprint_id, $story_id);
            $this->result->execute($value);

            $this->db->commit();

            return $this->result->rowCount();
        } catch (Exception $e) {
            $this->db->rollBack();
        }
    }

    public function getTaskDuplicate($task_name, $story_id)
    {
        $this->result = $this->db->prepare("SELECT *FROM tasks WHERE user_story_id = ? AND task_name = ?");
        $value = array($story_id, $task_name);
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
        try {
            $this->db->beginTransaction();

            $this->result = $this->db->prepare("UPDATE tasks SET task_state = ?,task_end = NULL WHERE task_id = ?");
            $value = array($taskState, $taskId);
            $this->result->execute($value);

            $this->db->commit();

            return $this->result->rowCount();
        } catch (Exception $e) {
            $this->db->rollBack();
        }
    }

    public function editTaskWithEndDate($taskId, $startDate, $taskState)
    {
        try {
            $this->db->beginTransaction();

            $this->result = $this->db->prepare("UPDATE tasks SET task_state = ?,task_end = ? WHERE task_id = ?");
            $value = array($taskState, $startDate, $taskId);
            $this->result->execute($value);

            $this->db->commit();

            return $this->result->rowCount();
        } catch (Exception $e) {
            $this->db->rollBack();
        }

    }

    public function getCountTaskBySprintId($sprintId)
    {
        $this->result = $this->db->prepare("SELECT *FROM tasks WHERE sbl_id = ?");
        $value = array($sprintId);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getEstimateStartDate($sprintId)
    {
        $this->result = $this->db->prepare("SELECT *FROM tasks WHERE sbl_id = ?");
        $value = array($sprintId);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getTaskValueHalfOfSprint($sprintId, $halfDate)
    {
        $this->result = $this->db->prepare("SELECT SUM(task_value) AS Half FROM tasks WHERE sbl_id = ? AND task_start = ?");
        $value = array($sprintId, $halfDate);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }

    public function checkExistingTask($sprintId)
    {
        $this->result = $this->db->prepare("SELECT *FROM tasks WHERE sbl_id = ?");
        $value = array($sprintId);
        $this->result->execute($value);
        return $this->result->rowCount();
    }
}

?>