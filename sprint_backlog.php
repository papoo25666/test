<?php
include_once "classes/ManageSession.php";
date_default_timezone_set("Asia/Bangkok");
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
    <link rel="stylesheet" href="css/breadcrumb.css"/>


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
                            <li><a href="backlog_item.php" style="padding: 10px">Product Backlog items</a></li>
                            <li><a href="profiles.php" style="padding: 10px">Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php" style="padding: 10px">Logout</a></li>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <!--End Navbar-->

    <section class="content container-fluid" style="min-height: 720px;margin-top: 70px">
        <div class="col-lg-12 col-md-12 col-sm-12 col-sm-12" style="margin-top: 10px">
            <div class="breadcrumb">
                <li>
                    <a href="action_sprint.php">Sprint Backlog</a>
                </li>
                <li class="active">

                </li>
            </div>
            <div>
                <span class="sprint-backlog-centent"
                      style="font-family: sukhumvit;font-weight: bold;font-size: 2em;margin-top: 0">
                    <?php
                    $id = $_GET['id'];
                    include_once "configs/config.php";
                    include_once "classes/ManageSprint.php";
                    include_once "classes/ManageTasks.php";
                    $db = new ManageSprint();
                    $result = $db->getSprintById($id);
                    foreach ($result as $row) {
                        echo $row['sbl_name'];
                    }
                    ?>
                </span>

                <a class="btn btn-warning pull-right" href="summary.php?id=<?php echo $_GET['id']; ?>"
                   style="color: #ffffff">Burn Down Chart</a>
            </div>

            <div class="row" style="margin: 0;">
                <table>
                    <thead>
                    <tr style="font-weight: 500">
                        <th>USER STORY</th>
                        <th class="text-center">TASKS</th>
                        <th class="text-center">ESTIMATE VALUE</th>
                        <th class="text-center">VOLUNTEER</th>
                        <th class="text-center" style="width: 13%">STATUS</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $story_id = $row['user_story_id'];
                    $conn = new ManageTasks();

                    $db = new ManageSprint();
                    $result = $db->getUserStoryBySprintId($id);
                    foreach ($result as $row) {
                        $list = $conn->getTaskByStoryId($row['user_story_id']);
                        ?>
                        <tr style="background-color: #EEEEEE;border: 1px solid #333;border-top: 0;border-right: 0;border-left: 0">
                            <td rowspan="<?php echo count($list) + 1; ?>">
                                <a style="font-family: sukhumvit;font-size: 1.2em;color: #000"
                                   href="add_tasks.php?sprint_id=<?php echo $_GET['id']; ?>&story_id=<?php echo $row['user_story_id']; ?>">
                                    <?php echo $row['user_story_name']; ?></a>
                            </td>
                        </tr>
                        <?php foreach ($list as $data) { ?>
                            <tr style="background-color: transparent">
                                <td class="text-center">
                                    <?php echo $data['task_name']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $data['task_value']; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $data['task_volunteer']; ?>
                                </td>
                                <td class="text-center">

                                    <?php
                                    $state = array($data['task_state'], "To Do", "Doing", "Done");
                                    $state = array_unique($state);
                                    ?>
                                    <select id="task_state" class="form-control">
                                        <?php
                                        foreach ($state as $i) {
                                            ?>
                                            <option
                                                value="<?php echo $data['task_id']; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
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
        $('select').on('change', function () {
            var taskId = $('option:selected', this).val();
            var taskState = $('option:selected', this).text();

            $.ajax({
                url: 'libs/update_task_state.php',
                data: {taskId: taskId, taskState: taskState},
                type: 'post',
                success: function (msg) {
                    console.log(msg);
                }
            });

            return false;
        });
    });
</script>

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