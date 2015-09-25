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
<div class="wrapper" style="background-color: #fff">

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

    <section class="content" style="min-height: 500px;">
        <nav class="col-lg-2 col-md-2 col-sm-2 menu-sprint" style="background-color: #03a9f4;height: 500px">
            <div class="profile" style="height: 200px;background-color: #233239;">
                <div class="" style="padding: 30px">
                    <img src="images/user.jpg" style="width: 100px;height: 100px;"
                         class="img img-circle img-responsive">
                    <h4 style="color:#fff;margin-top: 15px">Kotchaphan Muangsan</h4>
                </div>
            </div>
            <ul ng-app="" style="padding-left: 0">
                <li class="withripple" data-toggle="modal" data-target="#menu"><h4>Sprint 1</h4></li>
                <li class="withripple" data-toggle="modal" data-target="#menu"><h4>Sprint 2</h4></li>
                <li class="withripple" data-toggle="modal" data-target="#menu"><h4>Sprint 3</h4></li>
                <li class="withripple" data-toggle="modal" data-target="#menu"><h4>Sprint 4</h4></li>
                <li class="withripple" data-toggle="modal" data-target="#menu"><h4>Sprint 5</h4></li>
                <li class="withripple" data-toggle="modal" data-target="#menu"><h4>Sprint 6</h4></li>
                <li class="withripple" data-toggle="modal" data-target="#menu"><h4>Sprint 7</h4></li>
                <li class="withripple" data-toggle="modal" data-target="#menu"><h4>Sprint 8</h4></li>
                <li class="withripple" data-toggle="modal" data-target="#menu"><h4>Sprint 9</h4></li>
                <li class="withripple" data-toggle="modal" data-target="#menu"><h4>Sprint 10</h4></li>
            </ul>
        </nav>
        <div class="col-lg-10 col-md-10 col-sm-10 col-sm-10">
            <h3 class="sprint-backlog-centent">Sprint 1</h3>

            <table class="table table-bordered">
                <tr class="info" style="font-weight: bold">
                    <td>User Story</td>
                    <td>Tasks</td>
                    <td>Doing</td>
                    <td>Done</td>
                </tr>
                <tr class="">
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" placeholder="user story" class="form-control"/>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" placeholder="task"/>
                                    <input type="text" class="form-control" placeholder="estimate"/>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" placeholder="doing"/>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" placeholder="done"/>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- -->
                <tr>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" placeholder="user story" class="form-control"/>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" placeholder="task"/>
                                    <input type="text" class="form-control" placeholder="estimate"/>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" placeholder="doing"/>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" placeholder="done"/>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>

                <!-- -->
                <tr>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" placeholder="user story" class="form-control"/>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" placeholder="task"/>
                                    <input type="text" class="form-control" placeholder="estimate"/>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" placeholder="doing"/>
                                </div>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="col-lg-12 col-md-12 col-ms-12">
                            <form class="form-horizontal">
                                <div class="form-group has-info">
                                    <input type="text" class="form-control" placeholder="done"/>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>
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
<a class="btn btn-primary hidden" data-toggle="modal" href='#modal-id' id="btn-modal">Trigger modal</a>
<!--modal-->
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="font-weight: bold;">Problem</h4>
            </div>
            <div class="modal-body" style="color:#000">
                <h4>Demo</h4>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!--JavaScript-->
<?php
getSctiptPatch();
?>

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
            $('table tr').removeClass("warning");
            $(this).addClass("warning");
            $(this).css("cursor", "pointer");
        });
        $('table tr').click(function () {
            $('#btn-modal').click();
        });
    });
</script>

</body>
</html>