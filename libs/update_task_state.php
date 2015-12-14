<?php
date_default_timezone_set("Asia/Bangkok");

if (isset($_POST['taskId']) && isset($_POST['taskState'])) {
    $taskId = $_POST['taskId'];
    $taskState = $_POST['taskState'];

    include_once "../configs/config.php";
    include_once "../classes/ManageTasks.php";

    $conn = new ManageTasks();
    $date = date('Y-m-d', strtotime('now'));

    if ($taskState == "Done") {
        $taskState = "Done";
        $state = $conn->editTaskWithEndDate($taskId, $date, $taskState);
        echo "state : " . $taskState . " , date : " . $date . "id : " . $taskId . "<br/> : " . $state;
    } else {
        $state = $conn->editTask($_POST['taskId'], $_POST['taskState']);
        echo "state : " . $taskState . " , date : " . $date . "<br/> : " . $state;
    }

}
?>