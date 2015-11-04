<?php
include_once "../configs/config.php";
include_once "../classes/ManageUsers.php";
$username = $_POST['username'];
$password = $_POST['password'];

$db = new ManageUsers();
$status = $db->loginUser($username, $password);
$response = array();
$response['success'] = $status;
echo json_encode($response);
?>