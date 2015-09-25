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
<div class="wrapper" style="background-color: #B2EBF2">
    <!--Navbar-->
    <section class="navbar navbar-inverse navbar-static-top" style="margin: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <ul class="nav navbar-nav navbar-left" style="margin-top: 0">
                <li class="active text-center">
                    <a class="login-button" href="index.php">Home</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 0">

            </ul>
        </div>
    </section>
    <!--End Navbar-->

    <section class="content" style="background-color: #fff">
        <div class="container" style="background-color: #B2DFDB;min-height: 550px;">
            <div class="row" style="margin-top: 20px;padding: 40px;">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-lg-offset-3 col-md-offset-3 col-sm-offset-3"
                     style="background-color: #fff;">
                    <h3 style="font-weight: 400;">Sign up</h3>

                    <form role="form" class="form-horizontal" style="margin-top: 10px;padding: 10px">
                        <div class="form-group has-success">
                            <div class="col-lg-12" style="padding-left: 0">
                                <input type="text" class="form-control" id="fname" placeholder="First name">
                            </div>
                        </div>
                        <div class="form-group  has-success">
                            <div class="col-lg-12" style="padding-left: 0">
                                <input type="text" class="form-control" id="lname" placeholder="Last name">
                            </div>
                        </div>
                        <div class="form-group  has-success">
                            <div class="col-lg-12" style="padding-left: 0">
                                <input type="text" class="form-control" id="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group  has-success">
                            <div class="col-lg-12" style="padding-left: 0">
                                <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group  has-success">
                            <div class="col-lg-12" style="padding-left: 0">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group text-center" style="margin-bottom: 0">
                            <button type="submit" class="btn btn-success" style="width: 100%">
                                Sign up
                            </button>
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
                        <p style="font-weight: bold;font-size: 1.1em">Develop by Computer Science. Khon Kaen University.
                            Thailand</p>
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