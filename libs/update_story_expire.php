<?php
date_default_timezone_set("Asia/Bangkok");
if (isset($_GET['id'])) {
    include_once "../configs/config.php";
    include_once "../classes/ManageUserStory.php";


    $now = date('Y-m-d', strtotime('now'));

    $con = new ManageUserStory();
    $result = $con->updateStoryExpire($now);
    header("location: ../action_sprint.php");
}
?>