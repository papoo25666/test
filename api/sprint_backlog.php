<?php
include_once "../configs/config.php";
include_once "../classes/ManageSprint.php";
$db = new ManageSprint();
$result = $db->getSprint();
$response['sprints'] = array();
foreach ($result as $row) {
    $items = array();
    $items['id'] = $row['sbl_id'];
    $items['sprint'] = $row['sbl_name'];
    $items['started'] = $row['sbl_started'];
    $items['end'] = $row['sbl_end'];

    array_push($response['sprints'], $items);
}
echo json_encode($response);
?>