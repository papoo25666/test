<?php
include "../classes/ManangePBL.php";
$db = new ManagePBL();
$response['items'] = array();
$result = $db->getPBL();
foreach ($result as $row) {
    $items = array();
    $items['id'] = $row['id'];
    $items['item_name'] = $row['item_name'];
    $items['value'] = $row['value'];

    array_push($response['items'], $items);
}

echo json_encode($response);
?>