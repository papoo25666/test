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
        $this->result = $this->db->prepare("SELECT *FROM user_story WHERE user_story_work != 'ซ่อน' ORDER BY user_story_priority DESC");
        $this->result->execute();
        $data = $this->result->fetchAll();
        return $data;
    }

    public function editUserStoryState($storyId)
    {

        $text = "เคยถูกหยิบแล้ว";
        $this->result = $this->db->prepare("UPDATE user_story SET user_story_state = ?,user_story_priority = 0 WHERE user_story_id = ?");
        $value = array($text, $storyId);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getUserStoryById($id)
    {
        $this->result = $this->db->prepare("SELECT *FROM user_story WHERE user_story_id = ?");
        $value = array($id);
        $this->result->execute($value);
        $data = $this->result->fetchAll();
        return $data;
    }


    public function insertUserStory($userstory, $value, $state, $priority)
    {
        $this->result = $this->db->prepare("INSERT INTO user_story(user_story_name, user_story_price,user_story_state,user_story_priority,user_story_work) VALUES (?,?,?,?,?)");
        $value = array($userstory, $value, $state, $priority, "แสดง");
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

    public function editUserStoryWork($user_story_id)
    {
        $this->result = $this->db->prepare("UPDATE user_story SET user_story_work = ? WHERE user_story_id = ?");
        $value = array("ซ่อน", $user_story_id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function editStoryItems($user_story_name, $user_story_price, $state, $priority, $id)
    {
        $this->result = $this->db->prepare("UPDATE user_story SET user_story_name = ?,user_story_price = ?,user_story_priority = ?,user_story_state = ? WHERE user_story_id = ?");
        $value = array($user_story_name, $user_story_price, $priority, $state, $id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function checkDuplicate($user_story_name)
    {
        $this->result = $this->db->prepare("SELECT *FROM user_story WHERE  user_story_name = ?");
        $value = array($user_story_name);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

}

?>