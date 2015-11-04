<?php
if (isset($_POST['story']) && isset($_POST['id'])) {
    $story_id = $_POST['story'];
    $sprint_id = $_POST['id'];
    include_once "../classes/ManageSprint.php";
    foreach ($story_id as $id) {
        $id = intval($id);
        $sprint_id = intval($sprint_id);
        $db = new ManageSprint();
        $counts = $db->insertUserStoryForSprint($sprint_id , $id);
        echo $counts;
    }
}
?>