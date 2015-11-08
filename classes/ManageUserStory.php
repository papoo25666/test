<?php
include_once "ConnectDB.php";

class ManageUserStory
{
    private $db;
    private $result;

    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->connect();
    }

    public function getUserStory()
    {
        $this->result = $this->db->prepare("SELECT *FROM user_story");
        $this->result->execute();
        $data = $this->result->fetchAll();
        return $data;
    }

    public function getUserStoryById($id)
    {
        $this->result = $this->db->prepare("SELECT *FROM user_story WHERE user_story_id = ?");
        $value = array($id);
        $this->result->execute($value);
        $data = $this->result->fetchAll();
        return $data;
    }


    public function insertUserStory($userstory, $value)
    {
        $this->result = $this->db->prepare("INSERT INTO user_story(user_story_name, user_story_price) VALUES (?,?)");
        $value = array($userstory, $value);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function deleteStoryItems($id)
    {
        $this->result = $this->db->prepare("DELETE FROM user_story WHERE user_story_id = ?");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function editStoryItems($user_story_name, $user_story_price, $id)
    {
        $this->result = $this->db->prepare("UPDATE user_story SET user_story_name = ?,user_story_price = ? WHERE user_story_id = ?");
        $value = array($user_story_name, $user_story_price, $id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getPrioriry()
    {
        $this->result = $this->db->prepare("SELECT *FROM priority WHERE id = 1");
        $this->result->execute();
        return $this->result->fetchAll();
    }

    public function deletePriority($id)
    {
        $this->result = $this->db->prepare("DELETE FROM priority WHERE id = ?");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function editPriority($id, $priority)
    {
        $this->result = $this->db->prepare("UPDATE priority SET priority = ? WHERE id = ?");
        $value = array($priority, $id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

}

?>