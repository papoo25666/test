<?php
include_once "classes/ManageSession.php";
if (!ManageSession::isLogged()) {
    header("location:login.php");
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
    <link rel="stylesheet" href="css/link.css"/>

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
                            <li><a href="backlog_item.php" style="padding: 10px">Product Backlog items</a></li>
                            <li><a href="profiles.php" style="padding: 10px">Profile</a></li>
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
                                แสดง Sprint
                                Backlog</a>
                        <?php } ?>
                        <?php if (ManageSession::isSM()) {
                            ?>
                            <a type="button" href="action_team.php" class="list-group-item active">
                                <img src="images/ic_home.png" style="width: 20px;height: 20px">
                                แสดง Team Development
                            </a>
                        <?php } ?>
                        <?php if (ManageSession::isPO() || ManageSession::isAdmin()) { ?>
                            <a type="button" href="action_backlog.php" class="list-group-item">
                                <img src="images/ic_mode.png" style="width: 20px;height: 20px">
                                แก้ไข Product Backlog</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <div class="">
                        <div class="breadcrumb">
                            <li>
                                <a href="action_team.php">Team Development</a>
                            </li>
                            <li class="active">

                            </li>
                        </div>
                        <div class="col-lg-10 col-md-10 col-sm-10" style="padding: 0;">
                            <?php include_once "libs/add_team.php"; ?>
                            <form class="form" id="form-add-team" method="post" action="">
                                <?php if (isset($success)) echo "<span style='margin-bottom: 10px;color: green;'>" . $success . "</span>"; ?>
                                <?php if (isset($err)) echo "<span style='margin-bottom: 10px;color: red;'>" . $err . "</span>"; ?>
                                <div class="form-group form-inline">
                                    <input type="text" class="form-control" name="team_name" style="width: 50%"
                                           required/>
                                    <button type="submit" class="btn btn-warning form-control"
                                            style="font-family: sukhumvit;font-size: 1.2em">
                                        เพิ่ม Team Development
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="list" style="margin-top: 10px">
                        <?php include_once "configs/config.php"; ?>
                        <?php include_once "classes/ManageTeam.php"; ?>
                        <?php
                        $db = new ManageTeam();
                        $result = $db->getAllTeam();
                        foreach ($result as $row) {
                            ?>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-6" style="padding-left: 0">
                                <div class="text-center"
                                     style="background-color: #757575;height: 140px;margin-bottom: 15px">
                                    <img src="images/ic_build.png" class="img img-rounded"/>

                                    <div class="btn-group pull-right">
                                        <button class="btn btn-default dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"
                                                style="border-radius: 0"
                                            >
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu" style="background-color: #333">
                                            <li><a href="#">แก้ไข</a></li>
                                            <li>
                                                <a href="delete_team.php?id=<?php echo $row['team_id']; ?>"
                                                   onclick="return confirm('Are you sure?')">
                                                    ลบ
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div style="background-color: #333;padding: 10px">
                                        <a href="team.php?id=<?php echo $row['team_id']; ?>"
                                           class="link-sprint">
                                            <?php echo $row['team_name']; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- end php-->
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


</body>
</html>