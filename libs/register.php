<?php
if (isset($_POST['fname']) && isset($_POST['lname'])
    && isset($_POST['username']) && isset($_POST['password'])
    && isset($_POST['email'])
) {

    if (empty($_POST['fname']) == false && empty($_POST['lname']) == false
        && empty($_POST['username']) == false && empty($_POST['password']) == false
        && empty($_POST['email']) == false) {
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['usernames'];
        $password = $_POST['password'];
        $email = $_POST['email'];

    } else {
        $err = "information required";
    }
}
?>