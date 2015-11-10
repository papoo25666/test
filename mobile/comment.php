<?php
include_once "../configs/config.php";
include_once "../classes/ManageComment.php";
$db = new ManageComment();
$content = $_POST['content'];
$user_id = $_POST['user_id'];
$issue_id = $_POST['issue_id'];

if (empty($content) == false) {
    $result = $db->insertComment($content, $user_id, $issue_id);

    $response = array();

    if ($result == 1) {
        $response['success'] = "1";
    } else {
        $response['success'] = "0";
    }
}else {
    $response['success'] = "0";
}

echo json_encode($response);
?>