<?php
session_start();

$id = $_GET['id'];
$response['issues'] = array();

$item = array();
include_once "../configs/config.php";
include_once "../classes/ManageIssues.php";
$db = new ManageIssues();
$result = $db->getIssuesWithAvatarById($id);
//$result = $db->getIssuesById($id);

foreach ($result as $row) {

    $item['id'] = $row['issue_id'];
    $item['issues'] = $row['issue_desc'];
    $item['date'] = $row['issue_date'];
    $item['issues_image'] = $row['issue_image_path'];
    $item['status'] = $row['issue_status'];
    $item['avatar'] = $row['profile_picture'];
    $item['users'] = $row['username'];


    array_push($response['issues'], $item);
}
echo json_encode($response);
?>