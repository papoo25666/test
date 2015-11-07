<?php
include_once "ConnectDB.php";

class ManageUsers
{
    private $db;
    private $result;
    private $row;

    public function __construct()
    {
        $conn = new Database();
        $this->db = $conn->connect();
    }

    public function getUserCount($username)
    {
        $this->result = $this->db->prepare("SELECT *FROM users WHERE username = ?");
        $values = array($username);
        $this->result->execute($values);
        $this->row = $this->result->rowCount();
        return $this->row;
    }

    public function loginUser($username, $password)
    {
        $salt = "23143453458923scrum232342532";
        //hash password
        $password = hash_hmac('sha256', $password, $salt);
        $this->result = $this->db->prepare("SELECT *FROM users WHERE username = ? AND password = ?");
        $values = array($username, $password);
        $this->result->execute($values);
        return $this->result->rowCount();
    }

    public function registerUser($username, $password, $fname, $lname, $email, $user_type_id, $image_path)
    {
        $salt = "23143453458923scrum232342532";
        //hash password
        $password = hash_hmac('sha256', $password, $salt);
        $this->result = $this->db->prepare("INSERT INTO users(username, password ,profile_picture , fname, lname, email, user_types_id) VALUES(?,?,?,?,?,?,?)");
        $value = array($username, $password, $image_path, $fname, $lname, $email, $user_type_id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

    public function getUserInfo($username)
    {
        $this->result = $this->db->prepare("SELECT *FROM users WHERE username = ?");
        $value = array($username);
        $this->result->execute($value);
        $data = $this->result->fetchAll();
        return $data;
    }

    public function getRole()
    {
        $this->result = $this->db->prepare("SELECT *FROM user_types WHERE user_type_name != 'Admin'");
        $this->result->execute();
        return $this->result->fetchAll();
    }

    public function getUserRole($username)
    {
        $this->result = $this->db->prepare("SELECT *FROM user_types LEFT JOIN users ON users.user_types_id = user_types.id WHERE users.username = ?");
        $value = array($username);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }

    public function getUserInfoById($id)
    {
        $this->result = $this->db->prepare("SELECT *FROM users WHERE user_id = ?");
        $value = array($id);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }

    public function loginWithDisplayUsername($username)
    {
        $this->result = $this->db->prepare("SELECT *FROM users INNER JOIN user_types ON users.username = ? AND users.user_types_id = user_types.id");
        $values = array($username);
        $this->result->execute($values);
        return $this->result->fetchAll();
    }
}

?>