<?php
include "../classes/ManangePBL.php";
$db = new ManagePBL();
$response['items'] = array();
$result = $db->getPBL();
foreach ($result as $row) {
    $items = array();
    $items['id'] = $row['id'];
    $items['item_name'] = $row['user_story_name'];
    $items['value'] = $row['user_story_price'];

    array_push($response['items'], $items);
}

echo json_encode($response);
?>