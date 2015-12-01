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
        $response['email'] = $row['email'];
        $response['role'] = $row['user_role'];
    }
    $team = $db->getUserTeam($id);

    foreach($team as $row) {
        $response['team'] = $row['team_name'];
    }
} else {
    $response['avatar'] = "";
}
echo json_encode($response);
?>