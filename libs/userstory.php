<?php
include "/classes/ManageUserStory.php";
if (isset($_POST['userstory_name']) && isset($_POST['userstory_price'])
    && isset($_POST['userstory_priority']) && isset($_POST['action'])
) {

    if (empty($_POST['userstory_name']) == false && empty($_POST['userstory_price']) == false
        && $_POST['action'] == "add"
    ) {
        $us = $_POST['userstory_name'];
        $usp = $_POST['userstory_price'];
        $priority = $_POST['userstory_priority'];
        $state = 'ยังไม่ถูกหยิบ';

        $db = new ManageUserStory();
        $dup = $db->checkDuplicate($us);
        if ($db == 0) {
            $result = $db->insertUserStory($us, $usp, $state, $priority);
            if ($result == 1) {
                $success = "เพิ่ม User Story สำเร็จ";
            } else {
                $warning = "เพิ่ม User Story ไม่สำเร็จ";
            }
        } else {
            $warning = "User Story นี้มีอยู่แล้ว";
        }
    } else if (empty($_POST['userstory_name']) == false && empty($_POST['userstory_price']) == false
        && $_POST['action'] == "edit" && empty($_POST['id']) == false
    ) {
        $us = $_POST['userstory_name'];
        $usp = $_POST['userstory_price'];
        $id = $_POST['id'];
        $priority = $_POST['userstory_priority'];
        $state = 'ยังไม่ถูกหยิบ';

        $db = new ManageUserStory();
        $result = $db->editStoryItems($us, $usp, $state, $priority, $id);
        if ($result == 1) {
            $success = "แก้ไข User Story สำเร็จ";
        } else {
            $warning = "แก้ไข User Story ไม่สำเร็จ";
        }
    } else {
        $err = "กรุณากรอกข้อมูลให้ครบ";
    }
}
?>