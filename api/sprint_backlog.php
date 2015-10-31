<?php
include_once "../configs/config.php";
include_once "../classes/ManageSprint.php";
$db = new ManageSprint();
$result = $db->getSprint();
$response['sprints'] = array();
foreach ($result as $row) {
    $items = array();
    $items['id'] = $row['id'];
    $items['sprint'] = $row['sbl_name'];
    $items['created'] = $row['sbl_date'];

    array_push($response['sprints'], $items);
}
echo json_encode($response);
?>