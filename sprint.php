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
    </section>
    <!--End Navbar-->

    <section class="content" style="min-height: 500px;margin-top: 50px">
        <nav class="col-lg-2 col-md-2 col-sm-2 col-xs-12 hidden-xs menu-sprint"
             style="background-color: #03a9f4;height: 500px;">
            <div class="profile" style="height: 180px;background-color: #233239;">
                <div class="" style="padding: 20px">
                    <img src="images/user.jpg" style="width: 100px;height: 100px;"
                         class="img img-circle">
                    <h5 style="color:#fff;margin-top: 15px">Kotchaphan Muangsan</h5>
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
        <div class="col-lg-7 col-md-7 col-sm-7 col-sm-7">
            <h3 class="sprint-backlog-centent">Sprint 1</h3>

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
<?php
Style::getSctiptPatch();
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
            $('table tr').removeClass("success");
            $(this).addClass("success");
            $(this).css("cursor", "pointer");
        });

    });
</script>

</body>
</html>