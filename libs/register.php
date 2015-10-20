<?php
if (isset($_POST['fname']) && isset($_POST['lname'])
    && isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['email'])
) {

    if (empty($_POST['fname']) == false && empty($_POST['lname']) == false
        && empty($_POST['username']) == false && empty($_POST['password']) == false
        && empty($_POST['email']) == false
    ) {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        include_once "/classes/ManageUsers.php";
        $conn = new ManageUsers();
        if ($conn->getUserCount($username) == 0) {
            $counts = $conn->registerUser($username, $password, $fname, $lname, $email, $role);
            if ($counts > 0) {
                $success = "ลงทะเบียนสำเร็จ";
            } else {
                $warning = "ลงทะเบียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง";
            }
        } else {
            $warning = "ชื่อผู้ใช้งาน(username) นี้ถูกใช้งานแล้ว";
        }
    } else {
        $err = "กรุณกรอกข้อมูลให้ครบ";
    }
}
?>