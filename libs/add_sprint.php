<?php
if (isset($_POST['sprint_name'])) {
    include_once "../classes/ManageSprint.php";
    $db = new ManageSprint();
    $sprint = $_POST['sprint_name'];

    $result = $db->insertSprint($sprint);
    $data = $db->getLastSprint();
    foreach ($data as $row) {
        echo '<div class="col-lg-3 col-md-3 col-sm-3 col-6" style="padding-left: 0">'
            . '<div class="text-center" style="background-color: #757575;height: 140px;margin-bottom: 15px">'
            . '<img src="images/ic_build.png" class="img img-rounded"/>'
            . '<div class="btn-group pull-right">'
            . '<button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" '
            . 'aria-expanded="false" style="border-radius: 0"> '
            . '<span class="caret"></span> </button> '
            . '<ul class="dropdown-menu" style="background-color: #333"> '
            . '<li><a href="#">แก้ไข</a></li> '
            . '<li><a href="add_sprint.php?id=' . $row['id'] . '">เพิ่ม User Story</a></li>'
            . '<li><a href="action_issues.php?id=' . $row['id'] . '">ปัญหา</a></li>'
            .'<li><a href="summary.php?id=' . $row['id'] . '">ดู Burndown Chart</a></li>'
            . '<li><a href="delete_sprint.php?id=' . $row['id'] . '" onclick="return confirm(' . '\'Are you sure?\'' . ')">ลบ</a></li>'
            . '</ul>'
            . '</div>'
            . '<div style="background-color: #333;padding: 10px">'
            . '<a href="sprint_backlog.php?id=' . $row["id"] . '" class="link-sprint">' . $row["sbl_name"] . '</a>'
            . '</div> '
            . '</div> '
            . '</div> ';
    }
}
?>