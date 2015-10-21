<?php
include "/classes/ManageUserStory.php";
if (isset($_POST['userstory_name']) && isset($_POST['userstory_price']) && isset($_POST['action'])) {

    if (empty($_POST['userstory_name']) == false && empty($_POST['userstory_price']) == false && $_POST['action'] == "add") {
        $us = $_POST['userstory_name'];
        $usp = $_POST['userstory_price'];

        $db = new ManageUserStory();
        $result = $db->insertUserStory($us, $usp);
        if ($result == 1) {
            $success = "เพิ่ม User Story สำเร็จ";
        } else {
            $warning = "เพิ่ม User Story ไม่สำเร็จ";
        }
    }

    if (empty($_POST['userstory_name']) == false && empty($_POST['userstory_price']) == false && $_POST['action'] == "edit") {
        $us = $_POST['userstory_name'];
        $usp = $_POST['userstory_price'];

        $db = new ManageUserStory();
        $result = $db->editStoryItems($us, $usp);
        if ($result == 1) {
            $success = "แก้ไข User Story สำเร็จ";
        } else {
            $warning = "แก้ไข User Story ไม่สำเร็จ";
        }
    }
}
?>