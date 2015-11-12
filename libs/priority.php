<?php
if (isset($_POST['id']) && isset($_POST['priority'])) {
    $id = $_POST['id'];
    $priority = $_POST['priority'];

    include_once "/classes/ManageUserStory.php";
    $db = new ManageUserStory();
//    $result = $db->editPriority($id, $priority);
//    if ($result != 0) {
//        $success = "แก้ไขสำเร็จ";
//    } else {
//        $err = "แก้ไขไม่สำเร็จ";
//    }
}
?>
