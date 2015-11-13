<?php
if (isset($_GET['id'])) {
    if (empty($_GET['id']) == false) {

        include_once "classes/ManageTeam.php";

        $conn = new ManageTeam();
        $id = $_GET['id'];
        $result = $conn->deleteTeam($id);

        if ($result == 1) {
            header("location: action_team.php");
        } else {
            header("location: action_team.php");
        }
    }
} else {
    header("location: action_team.php");
}
?>