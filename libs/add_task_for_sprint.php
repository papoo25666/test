<?php
if (isset($_POST['task_name']) && isset($_POST['task_volunteer']) && isset($_POST['task_estimate'])
    && isset($_POST['sprint_id']) && isset($_POST['story_id'])
) {
    include_once "/classes/ManageTasks.php";

    $task_name = $_POST['task_name'];
    $task_volunteer = $_POST['task_volunteer'];
    $task_estimate = $_POST['task_estimate'];
    $sprintId = $_POST['sprint_id'];
    $storyId = $_POST['story_id'];

    $conn = new ManageTasks();
    $result = $conn->insertTask($task_name, $task_estimate, $task_volunteer, $sprintId, $storyId);

    if ($result == 1) {
        header("location: add_tasks.php?sprint_id=" . $storyId . "&story_id=" . $storyId);
    } else {
        header("location: add_tasks.php?sprint_id=" . $storyId . "&story_id=" . $storyId);
    }
}
?>