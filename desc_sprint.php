<?php
include_once "classes/ManageSession.php";
if (!ManageSession::isLogged()) {
    header("location:login.php");
}
if (ManageSession::isPO()) {
    header("location:action_backlog.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrum Board</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    <link href="css/custom_style.css" rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/navbar.css"/>
    <link rel="stylesheet" href="css/button.css"/>
    <link rel="stylesheet" href="css/tables.css"/>
    <link rel="stylesheet" href="css/backlog.css"/>
    <link rel="stylesheet" href="css/breadcrumb.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="wrapper" style="background-color:#fff">
    <!--Navbar-->
    <section class="navbar navbar-inverse navbar-fixed-top" style="margin: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Scrum Board</a>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <?php include_once "classes/ManageSession.php"; ?>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 0">
                <?php if (!ManageSession::isLogged()) { ?>

                <?php } else { ?>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle username" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="backlog_item.php" style="padding: 10px">Prodoct Backlog items</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php" style="padding: 10px">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <!--End Navbar-->

    <section class="content" style="min-height: 620px;margin-top: 70px">
        <div class="">
            <div class="row" style="margin-top: 10px;margin-bottom: 20px;margin-left: 0;margin-right: 0">
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="list-group">
                        <a type="button" href="backlog_item.php" class="list-group-item">
                            <img src="images/ic_home.png" style="width: 20px;height: 20px">
                            แสดง Product Backlog
                        </a>
                        <?php
                        if (ManageSession::isSM() || ManageSession::isTeam()) {
                            ?>
                            <a type="button" href="action_sprint.php" class="list-group-item">
                                <img src="images/ic_home.png" style="width: 20px;height: 20px">
                                แสดง Sprint Backlog</a>
                        <?php } ?>
                        <?php if (ManageSession::isSM()) {
                            ?>
                            <a type="button" href="action_team.php" class="list-group-item">
                                <img src="images/ic_home.png" style="width: 20px;height: 20px">
                                แสดง Team Development
                            </a>
                        <?php } ?>
                        <?php if (ManageSession::isPO() || ManageSession::isAdmin()) { ?>
                            <a href="action_backlog.php" type="button" class="list-group-item">
                                <img src="images/ic_mode.png" style="width: 20px;height: 20px">
                                แก้ไข Product Backlog</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <div class="">
                        <div class="breadcrumb">
                            <li>
                                <a href="action_sprint.php">Sprint Backlog</a>
                            </li>
                            <li class="active">
                                รายละเอียด
                            </li>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                             style=" background-color: #E0E0E0;padding-top: 10px;padding-left: 30px;
                             padding-right:30px;padding-bottom: 20px">
                            <h3 style="font-family: sukhumvit;font-weight: bold">รายละเอียดของ
                                <?php
                                $id = $_GET['id'];
                                include_once "classes/ManageSprint.php";
                                $conn = new ManageSprint();
                                $result = $conn->getSprintById($id);
                                foreach ($result as $row) {
                                    echo $row['sbl_name'];
                                }
                                ?>
                            </h3>
                            <?php
                            $result = $conn->getSprintInfoWithTeam($id);
                            if (count($result) != 0) {
                                foreach ($result as $row) {
                                    ?>
                                    <h3 style="font-family: sukhumvit;font-size: 1.5em">เริ่มวันที่
                                        : <?php echo $row['sbl_started']; ?></h3>
                                    <h3 style="font-family: sukhumvit;font-size: 1.5em">สิ้นสุดวันที่
                                        : <?php echo $row['sbl_end']; ?></h3>
                                    <h3 style="font-family: sukhumvit;font-size: 1.5em">ทีมที่รับผิดชอบ
                                        : <?php
                                        if (empty($row['team_name']) == false)
                                            echo $row['team_name'];
                                        else
                                            echo "-";
                                        ?>
                                    </h3>
                                <?php }
                            } else { ?>
                                <?php
                                $result = $conn->getSprintById($id);
                                foreach ($result as $row) {
                                    ?>
                                    <h3 style="font-family: sukhumvit;font-size: 1.5em">เริ่มวันที่
                                        : <?php echo $row['sbl_started']; ?></h3>
                                    <h3 style="font-family: sukhumvit;font-size: 1.5em">สิ้นสุดวันที่
                                        : <?php echo $row['sbl_end']; ?></h3>
                                    <h3 style="font-family: sukhumvit;font-size: 1.5em">ทีมที่รับผิดชอบ :
                                        ไม่ได้กำหนดทีมโดย Scrum Master
                                    </h3>
                                <?php }
                            } ?>

                            <?php
                            $result = $conn->getCountBySprintId($id);
                            ?>
                            <h3 style="font-family: sukhumvit;font-size: 1.5em">จำนวน User Story ภายใน Sprint
                                : <?php echo $result; ?>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!--Footer-->
    <section class="footer-content" style="margin-top: 30px">
        <footer style="padding: 20px">
            <div class="container">
                <div class="row hidden-xs">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                        <p>@2015 Scrum Board</p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4">
                        <p>Team</p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-4">
                        <p>Privacy</p>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <p style="font-weight: bold;font-size: 1.1em">Develop by Computer Science. Khon Kaen
                            University.Thailand </p>
                    </div>
                </div>
            </div>
        </footer>
    </section>
</div>

<!--JavaScript-->
<script type="application/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="application/javascript" src="js/bootstrap.min.js"></script>
<script type="application/javascript" src="js/angular.min.js"></script>
<script type="application/javascript">
    $(function () {
        $('#team-form').submit(function () {
            var data = $('#team-form').serializeArray();
            $.ajax({
                url: 'libs/select_team.php',
                data: data,
                type: 'post',
                success: function (msg) {
                    $('.info-team').text(msg);
                }
            });
            return false;
        });
    });
</script>
</body>
</html>