<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrum Board</title>
    <?php
    require_once "views/Styles.php";
    Style::getStylePatch();
    ?>
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
    </section>
    <!--End Navbar-->
    <section style="margin-top: 80px">
        <div class="row" style="margin: 0">
            <div
                class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4"
                style="background-color: #E0E0E0;padding: 20px">
                <h2 class="text-center" style="color: #333;font-weight: bold;margin-top: 10px">WELCOME</h2>

                <?php include "libs/login.php"; ?>
                <div class="imgage-login"
                     style="background-image: url('<?php if (isset($err)) echo 'images/user_login_err.png'; else echo 'images/user_login.png'; ?>')">
                </div>
                <form role="form" method="post">
                    <?php if (isset($err)) echo "<span class='alert-danger' style='width: auto'>" . $err . "</span>"; ?>
                    <div class="form-group" style="color: #000">
                        <label class="control-label">username</label>
                        <input class="form-control" type="texts" id="username" name="username"/>
                    </div>
                    <div class="form-group" style="color: #000">
                        <label class="control-label">password</label>
                        <input class="form-control" type="password" id="password" name="password"/>
                    </div>
                    <div class="form-group">
                        <a href="#">Forgot password</a>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-success" type="submit" style="width: 100%">LOG IN</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
</body>
</html>