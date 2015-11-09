<?php
session_start();
if (isset($_POST['content']) && isset($_POST['id'])) {

    $content = $_POST['content'];
    $issue_id = $_POST['id'];

    include_once "../configs/config.php";
    include_once "../classes/ManageComment.php";
    $db = new ManageComment();
    $result = $db->insertComment($content, $_SESSION['user_id'], $issue_id);
    if ($result == 1) {
        echo "success";
    } else {
        echo "not success";
    }
}
?>