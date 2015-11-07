<?php
include_once "../configs/config.php";
include_once "../classes/ManageUsers.php";
$id = $_GET['id'];

$response = array();

$db = new ManageUsers();
if (empty($id) == false) {
    $result = $db->getUserInfoById($id);
    foreach ($result as $row) {
        $response['avatar'] = $row['profile_picture'];
        $response['username'] = $row['username'];
        $response['fname'] = $row['fname'];
        $response['lname'] = $row['lname'];
    }
}else {
    $response['avatar'] = "";
}
echo json_encode($response);
?>