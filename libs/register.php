<?php
if (isset($_POST['fname']) && isset($_POST['lname'])
    && isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['email'])) {

    if(empty($_POST['fname'])== false && empty($_POST['lname'])== false
        && empty($_POST['username']) == false && empty($_POST['password']) == false
        && empty($_POST['email']) == false) {

    }else {
        $err = "information required";
    }
}
?>