<?php
date_default_timezone_set("Asia/Bangkok");

if (isset($_POST['taskId']) && isset($_POST['taskState'])) {
    $taskId = $_POST['taskId'];
    $taskState = $_POST['taskState'];
    
    include_once "../configs/config.php";
    include_once "../classes/ManageTasks.php";

    $conn = new ManageTasks();

    if ($taskState == "Done") {
        $state = $conn->editTaskWithEndDate($taskId, $taskState);
    } else {
        $state = $conn->editTask($_POST['taskId'], $_POST['taskState']);
    }

}
?>