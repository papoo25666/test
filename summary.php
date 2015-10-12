<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrum Board</title>
    <?php
    include_once "views/Styles.php";
    Style::getStylePatch();
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
<div class="wrapper" style="background-color: #d9e0e7;">

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Summary <span class="caret"></span></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">This sprint</a></li>
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

    <section class="content" style="min-height: 530px;">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2"
                 style="background-color: #333;min-height: 380px;margin-top: 80px;padding-left: 0; padding-right: 0">

                <img src="images/bdc.png" class="img img-responsive" style="min-height: 380px;width: 100%"/>
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
<?php
Style::getSctiptPatch();
?>

<script type="application/javascript">
</script>

</body>
</html>