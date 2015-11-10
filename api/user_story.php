<?php
include_once "../configs/config.php";
include_once "../classes/ManageUserStory.php";
$db = new ManageUserStory();
$response['items'] = array();
$result = $db->getUserStory();
foreach ($result as $row) {
    $items = array();
    $items['id'] = $row['user_story_id'];
    $items['item_name'] = $row['user_story_name'];
    $value = $row['user_story_price'];
    $value = number_format($value, 2, ".", ",");
    $items['value'] = $value;

    array_push($response['items'], $items);
}

echo json_encode($response);
?>