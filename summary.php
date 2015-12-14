<?php
date_default_timezone_set("Asia/Bangkok");
include_once "classes/ManageSession.php";
if (!ManageSession::isLogged()) {
    header("location:login.php");
}
if (ManageSession::isPO()) {
    header("location: backlog_item.php");
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
    <link rel="stylesheet" href="css/breadcrumb.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="application/javascript" src="js/Chart.js"></script>

    <script>
        <?php
                 $sprintId = $_GET['id'];

                 include_once "classes/ManageSummary.php";
                 include_once "classes/ManageSprint.php";

                 $summaryConn = new ManageSummary();
                 $sprintConn = new ManageSprint();

                 $day = array();

                 //หาวันเริ่ม Sprint
                 $resultSprint = $sprintConn->getSprintById($sprintId);
                 foreach ($resultSprint as $splitDay) {
                     array_push($day, $splitDay['sbl_started']);
                     $next = strtotime($splitDay['sbl_started']);
                 }

                 //หาจำนวนวัน 14 วันแล้วเก็บใน array
                 for ($i = 1; $i <= 14; $i++) {
                     $next = strtotime("+1 days", $next);
                     $convert = date('Y-m-d', $next);
                     array_push($day, $convert);

                    if (date('Y-m-d', strtotime('now')) == $convert) {
                            break;
                    }
                 }

                 //หาแต่ละวัน Burn ไปเท่าไหร่?
                 $plot = array();
                 for ($i = 0; $i < count($day); $i++) {
                     $resultPlot = $summaryConn->getPlotChart($day[$i], $sprintId);
                     foreach ($resultPlot as $p) {
                         array_push($plot, $p['Plot']);
                     }
                 }

                 //หา Max ของ Estimate ทั้งหมด
                 $resultSummary = $summaryConn->getSumEstimate($sprintId);
                 foreach ($resultSummary as $point)
                     $max = $point['EstimateSum'];

                 ?>
        var randomScalingFactor = function () {
            return Math.round(Math.random() * 100)
        };
        var lineChartData = {
            labels: ["Day 0", "Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6",
                "Day 7", "Day 8", "Day 9", "Day 10", "Day 11", "Day 12", "Day 13", "Day 14"],
            datasets: [
                {
                    label: "Burn Down Chart",
                    fillColor: "rgba(140,158,255,0.2)",
                    strokeColor: "rgba(126,87,194,0.5)",
                    pointColor: "rgba(126,87,194,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [
                        <?php echo $max; ?>
                        <?php
                        for ($i = 0; $i < count($plot); $i++) {
                            $max -= $plot[$i];
                            echo ",".$max;
                        }
                        ?>
                    ]
                }
            ]
        }
        window.onload = function () {
            var ctx = document.getElementById("burn_down_chart").getContext("2d");
            window.myLine = new Chart(ctx).Line(lineChartData, {
                responsive: true
            });
        }
    </script>
</head>
<body>
<div class="wrapper" style="background-color: #d9e0e7;">

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

    <section class="content" style="min-height: 600px;margin-top: 30px">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2"
                 style="min-height: 390px;margin-top: 50px;padding-left: 0; padding-right: 0">
                <div class="breadcrumb">
                    <li>
                        <a href="action_sprint.php">Sprint Backlog</a>
                    </li>
                    <li class="active">
                        Burn Down Chart
                    </li>
                </div>
                <div>
                    <h3 style="font-family: sukhumvit;font-size: 1.35em;font-weight: bold;padding: 0;margin: 0">
                        ค่าของการ Estimate
                    </h3>

                    <canvas id="burn_down_chart"></canvas>
                    <h3 style="font-family: sukhumvit;font-size: 1.35em;font-weight: bold;padding: 0;margin: 0;text-align: right">
                        จำนวนวัน
                    </h3>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2" style="padding-right: 0">
                <?php include_once "classes/ManageTasks.php"; ?>
                <div style="background-color: #333;height: 145px;margin-top: 50px">
                    <h3 style="font-family: sukhumvit;font-size: 1.3em;padding: 5px;color: #fff;margin: 0">
                        ผลรวมของ Task ทั้งหมด :
                        <?php
                        foreach ($resultSummary as $point) {
                            echo $point['EstimateSum'];
                            $maxEstimate = $point['EstimateSum'];
                        }
                        ?>
                    </h3>

                    <h3 style="font-family: sukhumvit;font-size: 1.3em;padding: 5px;color: #fff;margin: 0">
                        จำนวน Task ทั้งหมด :
                        <?php
                        $taskConn = new ManageTasks();
                        echo $taskConn->getCountTaskBySprintId($sprintId);
                        $countOfTask = $taskConn->getCountTaskBySprintId($sprintId);
                        ?>
                    </h3>


                    <h3 style="font-family: sukhumvit;font-size: 1.3em;padding: 5px;color: #fff;margin: 0">
                        Velocity :
                        <?php
                        echo number_format($maxEstimate / $countOfTask, 2, ".", ".");
                        ?>
                    </h3>

                    <h3 style="font-family: sukhumvit;font-size: 1.3em;padding: 5px;color: #fff;margin: 0">
                        วันที่เริ่ม :
                        <?php
                        $start = $sprintConn->getStartDateById($sprintId);
                        foreach ($start as $startDate) {
                            echo $startDate['sbl_started'];
                        }
                        ?>
                    </h3>

                    <h3 style="font-family: sukhumvit;font-size: 1.3em;padding: 5px;color: #fff;margin: 0">
                        วันที่สิ้นสุด :
                        <?php
                        $start = $sprintConn->getStartDateById($sprintId);
                        foreach ($start as $startDate) {
                            echo $startDate['sbl_end'];
                        }
                        ?>
                    </h3>

                </div>
            </div>
        </div>
    </section>

    <!--Footer-->
    <section class="footer-content" style="margin-top: 60px">
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

</body>
</html>