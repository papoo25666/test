<?php
if (isset($_GET['id'])) {

    include_once "configs/config.php";
    include_once "classes/ManageSprint.php";

    $id = $_GET['id'];
    $db = new ManageSprint();
    $result = $db->deleteSprint($id);
    if ($result > 0) {
        $state = "ลบสำเร็จ";
    } else {
        $state = "ลบไม่เสร็จ";
    }
    header("location: action_sprint.php");
}
?>