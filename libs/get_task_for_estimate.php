<?php
if (isset($_GET['id'])) {
    include_once "../configs/config.php";
    include_once "../classes/ManageTasks.php";

    $story = $_GET['id'];

    $conn = new ManageTasks();
    $result = $conn->getTaskByStoryId($story);
    foreach ($result as $row) {
        $div = '<li id="list-task" class="list-group-item" style="font-weight: normal">';

        $task = "<span style='padding: 10px;padding-left: 0;'> [TASK: " . $row['task_name'] . "]</span>";
        $vol = "<span style='padding: 10px'> [VOLUNTEER: " . $row['task_volunteer'] . "]</span>";
        $estimate = "<span style='padding: 10px'> [ESTIMATE VALUE: " . $row['task_value'] . "]</span>";

        $endDiv = "</li>";
        $html = $div . $task . $vol . $estimate . $endDiv;
        echo $html;
    }
}
?>