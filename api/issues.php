<?php
$id = $_GET['id'];
$response['issues'] = array();
$item = array();
include_once "../configs/config.php";
include_once "../classes/ManageIssues.php";
$db = new ManageIssues();
$result = $db->getIssuesById($id);

foreach ($result as $row) {
    $item['id'] = $row['id'];
    $item['issues'] = $row['issue_desc'];
    $item['date'] = $row['issue_date'];
    $item['issues_image'] = $row['issue_image_path'];
    $item['status'] = $row['issue_status'];

    array_push($response['issues'], $item);
}
echo json_encode($response);
?>