<?php
session_start();

if (isset($_POST['username']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email'])) {
    if (empty($_POST['username']) == false) {
        include_once "../configs/config.php";
        include_once "../classes/ManageUsers.php";

        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $userId = $_POST['id'];

        $conn = new ManageUsers();

        if (empty($_POST['team'])) {
            $result = $conn->editUserWithoutTeam($username, $fname, $lname, $email, $userId);
            if ($result == 1) {
                echo "แก้ไขสำเร็จ";
                $_SESSION['username'] = $username;
                $_SESSION['team'] = "on";
            } else {
                echo "แก้ไขไม่สำเร็จ";
            }
        } else {
            $team_id = $_POST['team'];
            $result = $conn->editUser($username, $fname, $lname, $email, $userId, $team_id);
            if ($result == 1) {
                echo "แก้ไขสำเร็จ";
                $_SESSION['username'] = $username;
                $_SESSION['team'] = "on";
            } else {
                echo "แก้ไขไม่สำเร็จ";
            }
        }
    }
} else {
    echo "แก้ไขไม่สำเร็จ";
}
?>