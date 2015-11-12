<?php
include_once "../configs/config.php";
include_once "../classes/ManageUsers.php";
$username = $_POST['username'];
$password = $_POST['password'];

$db = new ManageUsers();
$status = $db->loginUser($username, $password);
$response = array();
if ($status == 1) {
    $users = $db->loginWithDisplayUsername($username);
    foreach ($users as $row) {
        $response['username'] = $row['username'];
        $response['user_id'] = $row['user_id'];
        $response['role'] = $row['user_role'];
    }
}
$response['success'] = $status;
echo json_encode($response);
?>