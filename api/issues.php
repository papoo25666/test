<?php
$response['issues'] = array();
$item = array();
$item['issues'] = "API   ";
array_push($response['issues'] , $item);
echo json_encode($response);
?>