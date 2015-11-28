<?php

class ManageHistory
{
    private $db;
    private $result;

    public function __construct()
    {
        include_once "ConnectDB.php";
        $con = new Database();
        $this->db = $con->connect();
    }

    public function insertHistoryTeam($sbl_id, $user_id)
    {
        $this->result = $this->db->prepare("INSERT INTO history(sbl_id, user_id) VALUES (?,?)");
        $value = array($sbl_id, $user_id);
        $this->result->execute($value);
        return $this->result->rowCount();
    }

}

?>