<?php
include_once "../configs/config.php";
include_once "../classes/ManageComment.php";

$id = $_GET['id'];

$db = new ManageComment();
$result = $db->getCommentByIssueId($id);
$response['comments'] = array();
$item = array();
foreach ($result as $row) {

    $item['comment'] = $row['comment_content'];
    $item['user'] = $row['username'];
    $item['avatar'] = $row['profile_picture'];

    array_push($response['comments'], $item);
}
echo json_encode($response);
?>