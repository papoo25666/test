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

    <section class="content container-fluid" style="min-height: 600px;margin-top: 50px">
        <div class="row col-lg-8 col-md-8 col-sm-12 col-xs-10 col-lg-offset-2 col-md-offset-2"
             style="margin-top: 40px;padding: 0">
            <a class="btn btn-warning" href="add_issues.php?id=<?php echo $_GET['id']; ?>"
               style="font-family: sukhumvit;font-size: 1.2em;">
                เพิ่มปัญหา
            </a>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2"
             style="background-color: #E0E0E0;height: 500px;margin-top: 5px">
            <ul class="list-group" style="overflow: auto;height: 500px;">
                <?php include_once "classes/ManageIssues.php"; ?>
                <?php
                $db = new ManageIssues();
                $result = $db->getIssuesWithAvatarById($_GET['id']);
                foreach ($result as $row) {
                    ?>
                    <li>
                        <div class="text-center" style="background-color: #fff;margin-top: 3px">
                            <img class="img img-circle" src="<?php echo $row['profile_picture']; ?>"
                                 style="width: 100px;padding: 5px"/>

                            <h3 style="font-size: 1.5em;font-weight: bold;margin: 0;padding: 3px;font-family: sukhumvit"><?php echo $row['username']; ?></h3>
                        </div>
                        <div class="text-center">
                            <img class="img img-rounded" style="height: 250px"
                                 src="<?php echo $row['issue_image_path']; ?>"/>
                        </div>
                        <div class="text-center" style="background-color: #fff;">
                            <h3 style="font-family: sukhumvit;font-size: 1.5em;font-weight: bold;
                            padding-top: 10px;margin: 0;margin-top: 3px">
                                <?php echo $row['issue_desc']; ?>
                            </h3>

                            <h3 style="font-family: sukhumvit;font-size: 1.3em;font-weight: bold">
                                <?php echo $row['issue_status']; ?> | <?php echo $row['issue_date']; ?>
                            </h3>
                        </div>
                    </li>
                <?php } ?>
            </ul>
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