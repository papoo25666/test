<?php
if (isset($_POST['team_name'])) {
    if (empty($_POST['team_name']) == false) {
        include_once "/configs/config.php";
        include_once "/classes/ManageTeam.php";

        $team = $_POST['team_name'];

        $conn = new ManageTeam();
        $result = $conn->insertTeam($team);
        if ($result == 1) {
            $success = "สร้างสำเร็จ";
        } else {
            $err = "สร้างสำเร็จ";
        }
    }
}
?>