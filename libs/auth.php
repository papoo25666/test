<?php
if (!isset($_SESSION))
    session_start();

include_once "/classes/ManageUsers.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
    if (empty($_POST['username']) == false && empty($_POST['password']) == false) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $conn = new ManageUsers();
        $counts = $conn->loginUser($username, $password);
        if ($counts == 1) {
            $data = $conn->getUserRole($username);
            foreach ($data as $row) {
                $role = $row['user_role'];
                $user_id = $row['user_id'];
            }
            $_SESSION['state'] = "logged";
            $_SESSION['role'] = $role;
            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = $user_id;

            header("location:index.php");
        } else {
            $err = "username หรือ password ผิด";
        }
    } else {
        $err = "กรุณากรอก username และ password";
    }
}
?>