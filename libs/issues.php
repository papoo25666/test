<?php
if (isset($_POST['issues_content']) && isset($_POST['id'])
    && isset($_POST['issues_status']) && isset($_FILES['issues_image'])
    && isset($_POST['insert'])
) {

    $content = $_POST['issues_content'];
    $sprint_id = $_POST['id'];
    $topic = $_POST['issues_topic'];
    $status = $_POST['issues_status'];
    $user_id = $_POST['user_id'];
    $image = $_FILES['issues_image']['name'];

    $tmp = explode(".", $image);
    //rename file
    $rename = round(microtime(true)) . '.' . end($tmp);
    //upload to server path
    move_uploaded_file($_FILES['issues_image']['tmp_name'], "issues/" . $rename);

    include_once "/classes/ManageIssues.php";
    $db = new ManageIssues();
    $result = $db->insertIssues($content, "issues/" . $rename, $status, $sprint_id, $user_id, $topic);
    if ($result == 1) {
        $success = "เพิ่มปัญหาสำเร็จ";
    } else {
        $err = "เพิ่มปัญหาไม่สำเร็จ";
    }
}
?>