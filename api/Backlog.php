<?php
require_once "../database/backlog_db.php";
$db = new BacklogItems();
$response['backlog'] = array();
$result = $db->query("backlog_items order by id desc");
while ($row = mysqli_fetch_array($result)) {
    $items = array();
    $items['item_name'] = $row['item_name'];
    $items['value'] = $row['value'];

    array_push($response['backlog'], $items);
}

echo json_encode($response);
?>