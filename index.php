<!doctype html>
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
    <section class="navbar navbar-inverse navbar-static-top" style="margin: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <ul class="nav navbar-nav navbar-right" style="margin-right: 0">
                <li class="active text-center"><a class="login-button" data-toggle="modal" href='#modal-login'>Log
                        In</a></li>
            </ul>
        </div>
    </section>
    <!--End Navbar-->

    <!--Modal Log In-->
    <div class="modal fade" id="modal-login">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h2 class="modal-title" style="font-weight: bold">Log In</h2>
                </div>
                <div class="modal-body" style="padding-top: 20px">
                    <div class="row">
                        <div
                            class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1">
                            <h2 class="text-center" style="color: #333;font-weight: bold;margin-top: 10px">WELCOME</h2>

                            <div class="imgage-login">
                            </div>
                            <form role="form">
                                <div class="form-group">
                                    <label class="control-label">username</label>
                                    <input class="form-control" type="texts" id="txtUsername"/>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">password</label>
                                    <input class="form-control" type="password" id="txtPassword"/>
                                </div>
                                <div class="form-group">
                                    <a href="#" s>Forgot password</a>
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Log In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Welcome message -->
    <section class="header-content">
        <div class="">
            <div class="jumbotron text-center" style="background-color: #4285f4;margin-bottom: 0">
                <h1 class="text-center" style="color:#fff">Welcome to Scrum Board</h1>

                <h3>Issue and Progress tracking designed for Scrum team</h3>

                <div class="container" style="margin-top: 30px">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4">
                        <a class="btn btn-success" href="sigup.php">
                            Sign Up
                        </a>
                        <h4>Available on <a href="#" class="link">Google play</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Feature-->
    <section class="body-content">
        <div class="content-bg">
            <img src="images/bg_work_feature.png" class="img img-responsive" style="width: 100%">
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