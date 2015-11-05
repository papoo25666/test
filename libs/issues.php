<?php
if (isset($_POST['issues_content']) && isset($_POST['id'])
    && isset($_POST['issues_status']) && isset($_FILES['issues_image'])
    && isset($_POST['insert'])
) {

    $content = $_POST['issues_content'];
    $sprint_id = $_POST['id'];
    $status = $_POST['issues_status'];
    $image = $_FILES['issues_image']['name'];

    $tmp = explode(".", $_FILES['issues_image']['name']);
    $rename = round(microtime(true) . '.' . end($tmp));
    move_uploaded_file($_FILES['issues_image']['tmp_name'], "issues/" . $rename);

    include_once "/classes/ManageIssues.php";
    $db = new ManageIssues();
    $result = $db->insertIssues($content, "issues/" . $rename, $status, $sprint_id);
    if ($result == 1) {
        $success = "เพิ่มปัญหาสำเร็จ";
    } else {
        $err = "เพิ่มปัญหาไม่สำเร็จ";
    }
}
?>