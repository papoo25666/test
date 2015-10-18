<?php
include "/classes/ManageUsers.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
    if (empty($_POST['username']) == false && empty($_POST['password']) == false) {
        $username = $_POST['username'];
        $password = $_POST['password'];


    } else {
        $err = "Please username or password required";
    }
}
?>