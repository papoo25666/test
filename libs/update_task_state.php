<?php
if (isset($_POST['taskId']) && isset($_POST['taskState'])) {
    echo $_POST['taskId'];
    echo $_POST['taskState'];

    include_once "../configs/config.php";
    include_once "../classes/ManageTasks.php";

    $conn = new ManageTasks();
    $state = $conn->editTask($_POST['taskId'], $_POST['taskState']);
}
?>