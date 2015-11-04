<?php
$response['issues'] = array();
$item = array();
for ($i = 1; $i <= 10; $i++) {
    $item['issues'] = "API not working";
    $item['date'] = "2015-11-4";
    $item['status'] = "ด่วนมาก";
    array_push($response['issues'], $item);
}

echo json_encode($response);
?>