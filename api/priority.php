<?php
include_once "../configs/config.php";
include_once "../classes/ManageUserStory.php";
$db = new ManageUserStory();
$response['priority'] = array();
$result = $db->getPrioriry();
foreach($result as $row){
    $value = explode(",", $row['priority']);
}
foreach ($value as $row) {
    $items = array();
    $items['item'] = $row;
    array_push($response['priority'], $items);
}

echo json_encode($response);
?>