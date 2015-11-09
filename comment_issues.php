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
    <link rel="stylesheet" href="css/button.css"/>
    <link rel="stylesheet" href="css/navbar.css"/>
    <link rel="stylesheet" href="css/tables.css"/>
    <link rel="stylesheet" href="css/backlog.css"/>
    <link rel="stylesheet" href="css/breadcrumb.css"/>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        .problem {
            border: 0;
            border-top: 1px;
            border-style: solid;
        }

        .withripple {
            border: 0;
            border-top: 1px;
            border-style: solid;
        }

    </style>
</head>
<body>
<div class="wrapper" style="background-color: #fff">

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

    <section class="content container-fluid" style="min-height: 500px;margin-top: 70px">
        <div class="row" style="margin-top: 10px;margin-bottom: 20px;margin-left: 0;margin-right: 0">
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="list-group">
                    <a type="button" href="backlog_item.php" class="list-group-item">
                        <img src="images/ic_home.png" style="width: 20px;height: 20px">
                        แสดง Product Backlog
                    </a>
                    <a type="button" href="action_sprint.php" class="list-group-item">
                        <img src="images/ic_home.png" style="width: 20px;height: 20px">
                        แสดง Sprint Backlog</a>
                    <?php if (ManageSession::isPO() || ManageSession::isAdmin()) { ?>
                        <a href="action_backlog.php" type="button" class="list-group-item">
                            <img src="images/ic_mode.png" style="width: 20px;height: 20px">
                            แก้ไข Product Backlog</a>
                        <a type="button" href="action_priority.php" class="list-group-item">
                            <img src="images/ic_mode.png" style="width: 20px;height: 20px">
                            แก้ไข Prioriry</a>
                    <?php } ?>
                </div>
            </div>

            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12"
                >
                <div class="breadcrumb">
                    <li>
                        <a href="action_sprint.php">Sprint Backlog</a>
                    </li>
                    <li>
                        <a href="action_issues.php?id=<?php echo $_GET['sprint_id']; ?>">ปัญหา</a>
                    </li>
                    <li class="active">
                        ตอบปัญหา
                    </li>
                </div>
                <ul class="list-group" style="overflow: auto;height: 500px;background-color: #E0E0E0;">
                    <?php include_once "classes/ManageIssues.php"; ?>
                    <?php
                    $db = new ManageIssues();
                    $result = $db->getIssuesCommentWithAvatarById($_GET['id']);
                    foreach ($result as $row) {
                        ?>
                        <li>
                            <div class="text-center" style="">
                                <div class="row" style="margin: 0;padding: 10px">
                                    <div class="col-lg-2">
                                        <img class="img img-circle" src="<?php echo $row['profile_picture']; ?>"
                                             style="width: 100px;padding: 5px; "/>

                                        <h3 style="font-size: 1.5em;font-weight: bold;margin: 0;padding: 3px;font-family: sukhumvit;">
                                            <?php echo $row['username']; ?>
                                        </h3>
                                    </div>
                                    <div class="col-lg-6 col-lg-offset-1">
                                        <img class="img img-thumbnail" style="width: 90%;padding-bottom: 5px;padding: 0"
                                             src="<?php echo $row['issue_image_path']; ?>"/>
                                    </div>
                                    <div class="col-lg-12 text-center">
                                        <div class="col-lg-6 col-lg-offset-3" style="background-color: #333">
                                            <h3 style="font-family: sukhumvit;font-size: 1.2em;font-weight: bold;color: #fff;
                            padding-top: 10px;margin: 0;margin-top: 3px">
                                                <?php echo $row['issue_desc']; ?>
                                            </h3>

                                            <h3 style="font-family: sukhumvit;font-size: 1.3em;font-weight: bold;color: #fff">
                                                <?php echo $row['issue_status']; ?> | <?php echo $row['issue_date']; ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <?php
                    include_once "classes/ManageComment.php";
                    $db = new ManageComment();
                    $result = $db->getCommentByIssueId($_GET['id']);
                    foreach ($result as $row) {
                        ?>
                        <li style="height: 85px;">
                            <div class="text-center">
                                <div class="row text-center" style="margin: 0;">
                                    <div class="col-lg-1 col-lg-offset-3">
                                        <img src="<?php echo $row['profile_picture']; ?>" class="img-circle"
                                             style="width: 80px;height: 80px;display: inline"/>
                                    </div>
                                    <div class="col-lg-2">
                                        <h3 style="font-family: sukhumvit;font-size: 1.4em;font-weight: bold;color: #333">
                                            <?php echo $row['comment_content']; ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>
                    <div class="col-lg-6 col-lg-offset-3">
                        <form class="form" id="comments" method="post" style="margin-top: 10px">
                            <div class="form-group" style="margin: 0">
                                <input class="form-control" name="content" id="content"
                                       style="height: 50px;border-radius: 0"/>
                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>
                            </div>
                            <div class="form-group pull-right" style="margin-top: 3px">
                                <button type="submit" class="btn btn-warning">ตกลง</button>
                            </div>
                        </form>
                    </div>
                </ul>
            </div>
        </div>
    </section>

    <!--Footer-->
    <section class="footer-content">
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
        $('#comments').submit(function () {
            var data = $('#comments').serializeArray();
            $.ajax({
                url: 'libs/comment.php',
                data: data,
                type: 'post',
                success: function (msg) {
                    if(msg == "success"){
                        location.reload();
                    }
                }
            });

            return false;
        });
    });
</script>

</body>
</html>