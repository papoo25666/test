<?php
if (isset($_GET['id'])) {
    include_once "classes/ManageUserStory.php";
    $id = $_GET['id'];
    $db = new ManageUserStory();

    //$result = $db->deleteStoryItems($id);
    $result = $db->editUserStoryWork($id);
    if ($result == 1) {
        header("location: action_backlog.php");
    } else {
        header("location: action_backlog.php");
    }
}
?>