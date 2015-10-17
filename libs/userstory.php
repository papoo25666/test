<?php
include "../classes/ManageUserStory.php";
if (isset($_POST['userstory_name']) && isset($_POST['userstory_price'])) {
    if (empty($_POST['userstory_name']) == false && empty($_POST['userstory_price']) == false) {
        $us = $_POST['userstory_name'];
        $usp = $_POST['userstory_price'];

        $db = new ManageUserStory();
        $result = $db->insertUserStory($us , $usp);
        if($result >= 1) {
            echo "1";
        }else {
            echo "2";
        }
    }
}
?>