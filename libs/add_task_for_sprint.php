<?php
session_start();
if (isset($_POST['task_name']) && isset($_POST['task_estimate'])
    && isset($_POST['sprint_id']) && isset($_POST['story_id'])
) {
    include_once "/classes/ManageTasks.php";

    $task_name = $_POST['task_name'];
    $task_volunteer = $_SESSION['username'];
    $task_estimate = $_POST['task_estimate'];
    $sprintId = $_POST['sprint_id'];
    $storyId = $_POST['story_id'];

    $date = date('Y-m-d', strtotime('now'));

    $conn = new ManageTasks();
    $result = $conn->insertTask($task_name, $task_estimate, $task_volunteer, $date, $sprintId, $storyId);

    if ($result == 1) {
        header("location: add_tasks.php?sprint_id=" . $storyId . "&story_id=" . $storyId);
    } else {
        header("location: add_tasks.php?sprint_id=" . $storyId . "&story_id=" . $storyId);
    }
}
?>