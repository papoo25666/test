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
<body>
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
                            <li><a href="profiles.php" style="padding: 10px">Profile</a></li>
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
    <section class="header-content" style="margin-top: 70px;min-height: 500px;">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4 text-center">
                <?php
                include_once "classes/ManageUsers.php";
                $conn = new ManageUsers();
                $result = $conn->getUserInfo($_SESSION['username']);
                foreach ($result as $row) {
                ?>
                <a class="pull-right" href="edit_profile.php?id=<?php echo $row['user_id']; ?>"
                   style="font-family: sukhumvit;font-size: 1.5em">
                    Edit
                </a>
                <img class="img-circle" src="<?php echo $row['profile_picture']; ?>"
                     style="width: 200px;height: 200px"/>

                <h2 style="font-family: sukhumvit;color: #000;font-weight: bold"><?php echo $row['fname'] . " " . $row['lname']; ?></h2>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-lg-offset-4 col-md-offset-4">
                <h2 style="font-family: sukhumvit;color: #000;"><?php echo "อีเมล : " . $row['email']; ?></h2>

                <h2 style="font-family: sukhumvit;color: #000;"><?php echo "บทบาท : " . $row['user_role']; ?></h2>

                <h2 style="font-family: sukhumvit;color: #000;">ทีม :
                    <?php
                    $team = $conn->getUserTeam($row['user_id']);
                    foreach ($team as $data) {
                        if ($data['team_name'] == "") {
                            echo "-";
                        } else {
                            echo $data['team_name'];
                        }
                    }
                    ?>
                </h2>
            </div>
            <?php } ?>
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