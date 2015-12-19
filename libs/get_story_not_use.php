<?php
include_once "../configs/config.php";
include_once "../classes/ManageUserStory.php";
$db = new ManageUserStory();
$result = $db->getUserStoryNotUse();
//foreach ($result as $row) {
//    echo '<option value="' . $row['user_story_id'] . '">'
//        . $row['user_story_name'] . '[' . $row['user_story_priority'] . ']['
//        . $row['user_story_state'] . ']' . '</option>';
//}
echo json_encode($result);
?>