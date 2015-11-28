<?php
if (isset($_POST['sprint-id']) && isset($_POST['team'])) {
    if (empty($_POST['sprint-id']) == false && empty($_POST['team']) == false) {
        include_once "../configs/config.php";
        include_once "../classes/ManageTeam.php";
        include_once "../classes/ManageUsers.php";
        include_once "../classes/ManageHistory.php";

        $conn = new ManageTeam();
        $sprintId = $_POST['sprint-id'];
        $teamId = $_POST['team'];

        $userConn = new ManageUsers();
        $data = $userConn->getUserByTeamId($teamId);

        $check = $conn->checkForInsertTeamForSprint($sprintId);
        if ($check == 0) {
            $result = $conn->insertTeamForSprint($sprintId, $teamId);
            if ($result == 1) {
                $historyCon = new ManageHistory();

                foreach ($data as $userId) {
                    // $count = $historyCon->getHistoryInfo($sprintId, $userId['user_id']);
                    //if ($count > 0)
                    $historyCon->insertHistoryTeam($sprintId, $userId['user_id']);
                }

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