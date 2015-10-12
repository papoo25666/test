<?php
include "../configs/config.php";
include "../database/backlog_db.php";
$db = new BacklogItems();
$response['backlog'] = array();
$result = $db->query("backlog_items");
while ($row = mysqli_fetch_array($result)) {
    $items = array();

    $items['id'] = $row['id'];
    $items['item_name'] = $row['item_name'];
    $items['value'] = $row['value'];

    array_push($response['backlog'], $items);
}

echo json_encode($response);
?>