<?php
$content = $_POST['issues_content'];
$sprint_id = $_POST['id'];
$status = $_POST['issues_status'];
$user_id = $_POST['user_id'];
$image = $_FILES['issues_image']['name'];

$tmp = explode(".", $image);
//rename file
$rename = round(microtime(true)) . '.' . end($tmp);
$response = array();
//upload to server path

$move = move_uploaded_file($_FILES['issues_image']['tmp_name'], "../issues/" . $rename);
if ($move) {
    include_once "../configs/config.php";
    include_once "../classes/ManageIssues.php";
    $db = new ManageIssues();
    $result = $db->insertIssues($content, "issues/" . $rename, $status, $sprint_id, $user_id);
    if ($result == 1) {
        $response['success'] = "1";
    } else {
        $response['success'] = $result;
    }
} else {
    $response['success'] = $image;
}

echo json_encode($response);
?>