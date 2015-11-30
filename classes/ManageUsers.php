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

    public function registerUser($username, $password, $fname, $lname, $email, $user_role, $image_path)
    {
        $salt = "23143453458923scrum232342532";
        //hash password
        $password = hash_hmac('sha256', $password, $salt);
        $this->result = $this->db->prepare("INSERT INTO users(username, password ,profile_picture , fname, lname, email, user_role) VALUES(?,?,?,?,?,?,?)");
        $value = array($username, $password, $image_path, $fname, $lname, $email, $user_role);
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

    public function getUserRole($username)
    {
        $this->result = $this->db->prepare("SELECT *FROM users WHERE username = ?");
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
        $this->result = $this->db->prepare("SELECT *FROM users WHERE username = ?");
        $values = array($username);
        $this->result->execute($values);
        return $this->result->fetchAll();
    }

    public function getUserTeam($user_id)
    {
        $this->result = $this->db->prepare("SELECT *FROM team INNER JOIN users ON users.user_id = ? AND team.team_id = users.team_id");
        $values = array($user_id);
        $this->result->execute($values);
        return $this->result->fetchAll();
    }

    public function editUser($username, $fname, $lname, $email, $id, $team_id)
    {
        $this->result = $this->db->prepare("UPDATE users SET username = ?,fname = ?,lname = ?, email = ?,team_id = ? WHERE user_id = ?");
        $values = array($username, $fname, $lname, $email, $team_id, $id);
        $this->result->execute($values);
        return $this->result->rowCount();
    }

    public function editUserWithoutTeam($username, $fname, $lname, $email, $id)
    {
        $this->result = $this->db->prepare("UPDATE users SET username = ?,fname = ?,lname = ?, email = ? WHERE user_id = ?");
        $values = array($username, $fname, $lname, $email, $id);
        $this->result->execute($values);
        return $this->result->rowCount();
    }

    public function getUserByTeamId($teamId)
    {
        $this->result = $this->db->prepare("SELECT *FROM users WHERE team_id = ?");
        $value = array($teamId);
        $this->result->execute($value);
        return $this->result->fetchAll();
    }
}

?>