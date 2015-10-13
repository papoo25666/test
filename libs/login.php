<?php
include_once "/classes/ManageUsers.php";
if (isset($_POST['username']) && isset($_POST['password'])) {
    $login = new ManageUsers();
    if (empty($_POST['username']) == false && empty($_POST['password']) == false) {
        $username = $_POST['username'];
        $password = $_POST['password'];

//        $counts = $login->loginUser($username , $password);
//        if($counts == 1){
//            header("location: index.php");
//        }else{
//            $err = "Username or Password Invalid";
//        }
    }else {
        $err = "Please username or password required";
    }
}
?>