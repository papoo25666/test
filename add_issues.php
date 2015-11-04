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

    <section class="content container-fluid" style="min-height: 500px;margin-top: 50px">
        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10 col-lg-offset-2 col-md-offset-2"
             style="margin-top: 40px;padding: 0">
            <form class="form" action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label" style="font-family: sukhumvit;font-size: 1.2em">หัวข้อ</label>
                    <textarea class="form-control" name="issues_content"></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label" style="font-family: sukhumvit;font-size: 1.2em">ระดับปัญหา</label>
                    <select class="form-control" name="issues_status">
                        <option>ปกติ</option>
                        <option>ด่วน</option>
                        <option>ด่วนที่สุด</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="control-label" style="font-family: sukhumvit;font-size: 1.2em">รูปประกอบ</label>
                    <input type="file" class="form-control" name="issues_image"/>
                </div>
                <div class="form-group text-center">
                    <button class="form-control btn btn-warning" type="submit"
                            style="font-family: sukhumvit;font-size: 1.2em;width: 40%;height: 40px">เพิ่มปัญหา
                    </button>
                </div>
            </form>
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


</body>
</html>