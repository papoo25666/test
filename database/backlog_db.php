<?php
include "../configs/config.php";

class BacklogItems
{
    private $conn;
    private $result;
    private $numrows;

    public function __construct()
    {
        $this->conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME) or die(mysqli_connect_error());
    }

    public function query($sql)
    {
        $sql = "SELECT *FROM " . $sql;
        $this->result = mysqli_query($this->conn, $sql);
        $this->numrows = mysqli_num_rows($this->result);
        return $this->result;
    }

    public function rows()
    {
        $row = array();
        for ($i = 0; $i < $this->numrows; $i++) {
            $row[] = mysqli_fetch_array($this->result);
        }

        return $row;
    }
}

?>