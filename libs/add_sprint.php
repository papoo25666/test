<?php
if (isset($_POST['sprint_name'])) {
    include_once "../classes/ManageSprint.php";
    $db = new ManageSprint();
    $sprint = $_POST['sprint_name'];
    $result = $db->insertSprint($sprint);
    if ($result == 1) {
        echo "success";
    } else {
        echo "not";
    }
}
?>