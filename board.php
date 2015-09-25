<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrum Board</title>
    <?php
    include_once "function/link.php";
    getStylePatch();
    ?>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>

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
    <section class="navbar navbar-inverse navbar-static-top" style="margin: 0;">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="board.php">Scrum Board</a>
        </div>

        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Team  <span class="caret"></span></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Create Team</a></li>
                        <li><a href="#">Team members</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Problem  <span class="caret"></span></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Add problem</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Summary  <span class="caret"></span></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">This backlog</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin: 0;">
                <li class="active dropdown">
                    <a href="#" class="dropdown-toggle" style="padding: 15px 0 0 0;height: 60px;"
                       data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="mdi-action-account-circle" style="color:#fff;"></i>
                        Kotchaphan Muangsan <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="mdi-image-timer-auto"></i> View profile</a></li>
                        <li><a href="#"><i class="mdi-image-brightness-7"></i> Settings</a></li>
                        <li role="separator" class="divider" style="background: #90CAF9"></li>
                        <li><a href="#">Log out</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </section>
    <!--End Navbar-->

    <section class="content" style="min-height: 500px;">
        <div class="">
            <div class="row" style="margin: 0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 style="font-weight: 500">Product Backlog</h3>

                    <div class="backlog"
                         style="border: 1px solid #90CAF9;border-left: 0;border-right: 0;border-bottom: 0">
                        <div class="create-backlog" style="margin-top: 5px">
                            <a href="#" class="btn btn-warning btn-fab btn-raised mdi-action-note-add"></a>
                            <span style="font-size: 1.5em">Create Product Backlog</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 0;margin-bottom: 20px;margin-left: 0;margin-right: 0">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1"
                     ng-app=""
                    >
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12"
                         ng-repeat="n in ['Demo', 'Demo', 'Demo', 'Demo' , 'Demo' , 'Demo','Demo','Demo','Demo','Demo','Demo','Demo'] track by $index">
                        <form role="form" class="form-backlog">
                            <div class="btn-group pull-right dropdown-group" style="margin: 0;">
                                <a href="#" data-target="#"
                                   class="btn btn-default dropdown-toggle dropdown-caret" data-toggle="dropdown">
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="min-width: 100px;border-radius: 0">
                                    <li><a href="#">Add team member</a></li>
                                    <li><a href="#">Rename</a></li>
                                    <li><a href="#">Delete</a></li>
                                </ul>
                            </div>
                            <div class="form-group" style="padding: 20px">
                                <div class="row">
                                    <span class="badge pull-right">3</span>
                                </div>
                                <div class="row">
                                    <div class="text-center">
                                        <a href="sprint.php" class="backlog-name">
                                            <h3 style="color: #fff;margin:5px 0">{{n}}</h3>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center">
                                        <i class="mdi-hardware-memory hidden-xs"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<?php
    getSctiptPatch();
?>

</body>
</html>