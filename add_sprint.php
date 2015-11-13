<?php
include_once "classes/ManageSession.php";
if (!ManageSession::isLogged()) {
    header("location:login.php");
}
if (!ManageSession::isPO()) {
    header("location:action_backlog.php");
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
    <link rel="stylesheet" href="css/navbar.css"/>
    <link rel="stylesheet" href="css/button.css"/>
    <link rel="stylesheet" href="css/tables.css"/>
    <link rel="stylesheet" href="css/backlog.css"/>
    <link rel="stylesheet" href="css/breadcrumb.css"/>

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

    <section class="content" style="min-height: 500px;margin-top: 70px">
        <div class="">
            <div class="row" style="margin-top: 10px;margin-bottom: 20px;margin-left: 0;margin-right: 0">
                <div class="col-lg-2 col-md-2 col-sm-2">
                    <div class="list-group">
                        <a type="button" href="backlog_item.php" class="list-group-item">
                            <img src="images/ic_home.png" style="width: 20px;height: 20px">
                            แสดง Product Backlog
                        </a>
                        <?php
                        if (ManageSession::isSM() || ManageSession::isTeam()) {
                            ?>
                            <a type="button" href="action_sprint.php" class="list-group-item">
                                <img src="images/ic_home.png" style="width: 20px;height: 20px">
                                แสดง Sprint Backlog</a>
                        <?php } ?>
                        <?php if (ManageSession::isPO() || ManageSession::isAdmin()) { ?>
                            <a href="action_backlog.php" type="button" class="list-group-item">
                                <img src="images/ic_mode.png" style="width: 20px;height: 20px">
                                แก้ไข Product Backlog</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <div class="">
                        <div class="breadcrumb">
                            <li>
                                <a href="action_sprint.php">Sprint Backlog</a>
                            </li>
                            <li class="active">
                                เพิ่ม User Story
                            </li>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"
                             style=" background-color: #E0E0E0;padding-top: 10px;padding-left: 30px;padding-right:
                             30px;padding-bottom: 20px
                        ">
                            <h3 style="font-family: sukhumvit;font-weight: bold"><?php echo $_GET['name']; ?></h3>

                            <form class="form form-add-sprint" role="form" method="post" action="">
                                <?php include_once "classes/ManageUserStory.php"; ?>
                                <?php
                                $db = new ManageUserStory();
                                $result = $db->getUserStory();
                                ?>
                                <div class="form-group  form-inline">
                                    <select id="user_story" class="form-control" style="width: 90%">
                                        <?php
                                        foreach ($result as $row) {
                                            ?>
                                            <option value="<?php echo $row['user_story_id']; ?>">
                                                <?php echo $row['user_story_name'] . '[' . $row['user_story_priority'] . '] [' . $row['user_story_state'] . ']'; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <button type="submit" class="btn btn-warning"
                                            style="font-family: sukhumvit;font-size: 1.2em;">
                                        เพิ่ม
                                    </button>
                                    <button type="button" class="btn btn-danger" id="btn-delete"
                                            style="font-family: sukhumvit;font-size: 1.2em;">ลบ
                                    </button>
                                </div>
                            </form>

                            <div class="list" style="background-color: #fff;height: 300px">
                                <ul class="list-group story" style="overflow: auto;height: 300px;">

                                </ul>
                            </div>
                            <div class="text-center" style="margin-top: 10px">
                                <button class="btn btn-warning" id="submit-story"
                                        onclick="return confirm('คุณต้องการเพิ่ม User Story ทั้งหมดหรือไม่?')"
                                        style="font-family: sukhumvit;font-size: 1.2em;width: 200px">ตกลง
                                </button>
                                <a href="sprint_backlog.php?id=<?php echo $_GET['id']; ?>" class="alert-for-success"
                                   style="font-size: 1.2em;font-weight: bold;font-family: sukhumvit;margin-left: 10px"></a>

                            </div>
                        </div>
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
<script type="application/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="application/javascript" src="js/bootstrap.min.js"></script>
<script type="application/javascript" src="js/angular.min.js"></script>
<script type="application/javascript">
    $(function () {
        var data = [];
        $('.form-add-sprint').submit(function () {
            var id = $('#user_story').val();
            var content = $('#user_story option:selected').text();
            //push id for story
            data.push(id);

            //console.log("data : " + data.length);

            var text = '<li class="list-group-item" style="font-weight: normal">' + content + '</li>';

            $('.list-group.story').append(text);
            return false;
        });

        $('#submit-story').click(function () {
            $.ajax({
                url: "libs/add_story_for_sprint.php",
                data: {story: data, id: <?php echo $_GET['id']; ?>},
                type: 'post',
                success: function (msg) {
                    $('.alert-for-success').text("คลิกเพื่อดูผลลัพท์");
                }
            });
            return false;
        });

        //button delete
        $('button#btn-delete').click(function () {
            $('.list-group.story > .list-group-item').remove();

            data = [];

            //console.log("data : " + data.length);

            return false;
        });
    });
</script>
</body>
</html>