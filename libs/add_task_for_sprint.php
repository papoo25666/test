<?php
session_start();

if (isset($_POST['task_name']) && isset($_POST['task_estimate'])
    && isset($_POST['sprint_id']) && isset($_POST['story_id'])
) {
    include_once "../configs/config.php";
    include_once "../classes/ManageTasks.php";

    $task_name = $_POST['task_name'];
    $task_volunteer = $_SESSION['username'];
    $task_estimate = $_POST['task_estimate'];
    $sprintId = $_POST['sprint_id'];
    $storyId = $_POST['story_id'];

    $date = date('Y-m-d', strtotime('now'));

    $conn = new ManageTasks();
    $dup = $conn->getTaskDuplicate($task_name, $storyId);

    if ($dup == 0) {
        $result = $conn->insertTask($task_name, $task_estimate, $task_volunteer, $date, $sprintId, $storyId);
        if ($result == 1) {
            echo "เพิ่มสำเร็จ";
        } else {
            echo "เพิ่มไม่สำเร็จสำเร็จ";
        }
    } else {
        echo "Task นี้มีอยู่แล้ว";
    }
}
?>