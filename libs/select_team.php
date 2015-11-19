<?php
if (isset($_POST['sprint-id']) && isset($_POST['team'])) {
    if (empty($_POST['sprint-id']) == false && empty($_POST['team']) == false) {
        include_once "../configs/config.php";
        include_once "../classes/ManageTeam.php";
        $conn = new ManageTeam();
        $sprintId = $_POST['sprint-id'];
        $teamId = $_POST['team'];
        $check = $conn->checkForInsertTeamForSprint($sprintId);
        if ($check == 0) {
            $result = $conn->insertTeamForSprint($sprintId, $teamId);
            if ($result == 1) {
                echo "เลือกสำเร็จ";
            } else {
                echo "เลือกไม่สำเร็จ";
            }
        } else {
            $result = $conn->changeTeam($sprintId, $teamId);
            if ($result == 1) {
                echo "เลือกสำเร็จ [แก้ไข]";
            } else {
                echo "แก้ไขไม่สำเร็จ";
            }
        }
    }
}
?>