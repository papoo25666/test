<?php
include_once "../classes/ManageSession.php";
if (!ManageSession::isLogged()) {
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrum Board</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet"/>
    <link href="../css/font-awesome.min.css" rel="stylesheet"/>
    <link href="../css/custom_style.css" rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/navbar.css"/>
    <link rel="stylesheet" href="../css/button.css"/>
    <link rel="stylesheet" href="../css/tables.css"/>
    <link rel="stylesheet" href="../css/backlog.css"/>
    <link rel="stylesheet" href="../css/link.css"/>

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
            <a class="navbar-brand" href="../index.php">Scrum Board</a>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <ul class="nav navbar-nav navbar-right" style="margin-right: 0">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle username" data-toggle="dropdown" role="button"
                       aria-haspopup="true"
                       aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../backlog_item.php" style="padding: 10px">Prodoct Backlog items</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="../logout.php" style="padding: 5px 10px 5px 10px">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <!--End Navbar-->

    <section class="content" style="min-height: 500px;margin-top: 70px">
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="text-center" style="background-color: #333;height: 90px;padding: 30px;margin-top: 10px">
                <a href="user_story.php" class="link-sprint">User Story</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="text-center" style="background-color: #333;height: 90px;padding: 30px;margin-top: 10px">
                <a href="priority.php" class="link-sprint">Priority</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="text-center" style="background-color: #333;height: 90px;padding: 30px;margin-top: 10px">
                <a href="sprint_backlog.php" class="link-sprint">Sprint Backlog</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="text-center" style="background-color: #333;height: 90px;padding: 30px;margin-top: 10px">
                <a href="issues.php" class="link-sprint">Issues</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="text-center" style="background-color: #333;height: 90px;padding: 30px;margin-top: 10px">
                <a href="account.php" class="link-sprint">Account</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="text-center" style="background-color: #333;height: 90px;padding: 30px;margin-top: 10px">
                <a href="comment.php" class="link-sprint">Comments</a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="text-center" style="background-color: #333;height: 90px;padding: 30px;margin-top: 10px">
                <a href="desc_sprint.php" class="link-sprint">Sprint Description</a>
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
<script type="application/javascript" src="../js/jquery-1.11.3.min.js"></script>
<script type="application/javascript" src="../js/bootstrap.min.js"></script>
<script type="application/javascript" src="../js/angular.min.js"></script>


</body>
</html>