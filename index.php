<?php if (!isset($_SESSION)) session_start(); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrum Board</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/font-awesome.min.css" rel="stylesheet"/>
    <link href="css/custom_style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/navbar.css"/>
    <link rel="stylesheet" href="css/button.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color: #3D5AFE">
<div class="wrapper">
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
                    <li class="active text-center text-login"><a class="login-button" href="login.php">LOG IN</a></li>
                <?php } else { ?>
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle username" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="backlog_item.php" style="padding: 10px">Prodoct Backlog items</a></li>
                            <li><a href="api/" style="padding: 10px">API</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php" style="padding: 5px 10px 5px 10px">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <!--End Navbar-->

    <!--Welcome message -->
    <section class="header-content" style="margin-top: 70px">
        <div class="">
            <div class="jumbotron text-center" style="background-color: #3D5AFE;margin-bottom: 0">
                <h1 class="text-center" style="color:#fff;font-family: sukhumvit">ระบบติดตามการทำงานของสกรัมทีม</h1>

                <h3>Issue and Progress tracking designed for Scrum team</h3>

                <div class="container" style="margin-top: 30px">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                        <?php if (!ManageSession::isLogged()) { ?>
                            <a class="btn btn-success" href="sigup.php"
                               style="color:#ffffff !important;font-weight: bold !important;">
                                SIGN UP FOR FREE
                            </a>
                        <?php } else { ?>
                            <a class="btn btn-success" href="backlog_item.php"
                               style="color:#ffffff !important;font-weight: bold !important;">
                                PRODUCT BACKLOG
                            </a>
                        <?php } ?>
                        <h4>Available on <a href="#" class="link">Google play</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Feature-->
    <section class="body-content">
        <div class="content-bg">
            <img src="images/bg_work_feature.png?v=1" class="img img-responsive"
                 style="width: 100%;min-height: 200px;background-color: #fff">
        </div>
    </section>

    <!-- about feature -->
    <section class="about-feature" style="background-color: #E0E0E0;">
        <div style="padding-top: 15px">
            <div class="container">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center" style="border-color:#E0E0E0;
                border-style: solid;">
                    <img src="images/ic_update.png?v=1" style="width: 50%;margin: 0" class="img img-circle"/>

                    <h2 style="font-family: sukhumvit;color: #000" class="text-center">อัพเดทงาน</h2>

                    <p style="color: #000;font-family: sukhumvit;font-weight: 500;font-size: 18px">
                        สามารถอัพเดทงานของทีมได้ทุกที่ทุกเวลา สะดวกและรวดเร็ว
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center" style="border-color:#E0E0E0;
                border-style: solid;">
                    <img src="images/ic_tracking.png?v=1" style="width: 50%;color: #000" class="img"/>

                    <h2 style="font-family: sukhumvit;color: #000" class="text-center">ติดตามงาน</h2>

                    <p style="color: #000;font-family: sukhumvit;font-weight: 500;font-size: 18px">
                        สามารถติดตามงานและปัญหาของทีมได้ทุกที่ทุกเวลา
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center" style="border-color:#E0E0E0;
                border-style: solid;">
                    <img src="images/ic_report.png?v=1" style="width: 50%;" class="img"/>

                    <h2 style="font-family: sukhumvit;color: #000" class="text-center">วางแผนงาน</h2>

                    <p style="color: #000;font-family: sukhumvit;font-weight: 500;font-size: 18px">
                        สามารถวางแผนการทำงานได้ ถึงแม้จะอยู่ต่างสถานที่กัน
                    </p>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 text-center" style="border-color:#E0E0E0;
                border-style: solid;">
                    <img src="images/ic_chart.png?v=1" style="width: 50%;" class="img"/>

                    <h2 style="font-family: sukhumvit;color: #000" class="text-center">สรุปผลการทำงาน</h2>

                    <p style="color: #000;font-family: sukhumvit;font-weight: 500;font-size: 18px">
                        สามารถดูสรุปงานของทีมในรูป Burndown Chart
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- end about feature -->

    <!-- power by -->
    <section class="about_development" style="background-color: #fff;">
        <div class="row" style="margin: 0;">
            <div class="container">
                <h2 class="text-center" style="color: #696969;padding-top: 20px;
                margin-bottom: 0;font-family: sukhumvit;font-weight: bold;font-size: 3em">POWER BY</h2>

                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1"
                     style="margin-bottom: 55px">
                    <img src="images/logo_cs.png?v=1" class="img img-responsive" style="width: 100%"/>
                </div>
            </div>
        </div>
    </section>
    <!-- end power by -->

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
                        <p style="font-weight: bold;font-size: 1.1em">Develop by Computer Science. Khon Kaen University.
                            Thailand</p>
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