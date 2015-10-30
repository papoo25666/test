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
        <div class="col-lg-9 col-md-9 col-sm-9 col-sm-9">
            <h3 class="sprint-backlog-centent" style="font-family: sukhumvit;font-weight: bold;font-size: 2em">
                Sprint <?php echo $_GET['id']; ?>
            </h3>

            <div class="row" style="margin: 0;">
                <table>
                    <thead>
                    <tr style="font-weight: 500">
                        <th>USER STORY</th>
                        <th>TASKS</th>
                        <th>DOING</th>
                        <th>DONE</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 hidden-xs">
            <div class="detailBox">
                <div class="titleBox">
                    <label>Comment Box</label>
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                </div>
                <div class="commentBox">
                    <p class="taskDescription">Problem Tracking.</p>
                </div>
                <div class="actionBox">
                    <ul class="commentList">
                        <li>
                            <div class="commenterImage">
                                <img src="images/user.jpg" style="width: 50px;height: 50px"/>
                            </div>
                            <div class="commentText">
                                <p class="">API not working</p> <span class="date sub-text">on March 5th, 2015</span>
                            </div>
                        </li>

                        <li>
                            <div class="commenterImage">
                                <img src="images/user.jpg" style="width: 50px;height: 50px"/>
                            </div>
                            <div class="commentText">
                                <p class="">Network die</p> <span class="date sub-text">on March 5th, 2015</span>
                            </div>
                        </li>


                        <li>
                            <div class="commenterImage">
                                <img src="images/user.jpg" style="width: 50px;height: 50px"/>
                            </div>
                            <div class="commentText">
                                <p class="">Fragments crash</p> <span class="date sub-text">on March 5th, 2015</span>
                            </div>
                        </li>


                        <li>
                            <div class="commenterImage">
                                <img src="images/user.jpg" style="width: 50px;height: 50px"/>
                            </div>
                            <div class="commentText">
                                <p class="">Android not working</p> <span
                                    class="date sub-text">on March 5th, 2015</span>
                            </div>
                        </li>

                    </ul>
                    <form class="form-inline" role="form">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Your comments"/>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info" style="padding: 5px 0 5px 0">Add</button>
                        </div>
                    </form>
                </div>
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
        $('.withripple:first-child').addClass('active');
        $('.withripple:first-child').click();
    });

    $(function () {
        $('.withripple').click(function () {
            var content = $(this).text();
            console.log('content : ' + content);
            $('.withripple').removeClass('active');
            $(this).addClass('active');
            $('.sprint-backlog-centent').text(content);
        });
    });

    $(function () {
        $('table tr').mouseover(function () {
            $('table tr').removeClass("success");
            $(this).addClass("success");
            $(this).css("cursor", "pointer");
        });

    });
</script>

</body>
</html>