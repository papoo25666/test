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
    </section>
    <!--End Navbar-->

    <section class="content" style="min-height: 500px;margin-top: 70px">
        <div class="">
            <div class="row" style="margin: 0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3 style="font-weight: bold;font-family: sukhumvit;letter-spacing: 1px">Product Backlog Items</h3>
                </div>
            </div>
            <div class="row" style="margin: 0">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-4 col-md-8 col-sm-10 col-xs-12" style="padding-left: 0">
                        <div class="create-backlog" style="margin-top: 5px">
                            <button class="btn btn-info" style="border: 0;height: 40px">
                                <i class="glyphicon glyphicon-edit"></i> ADD PBL
                            </button>
                            <button class="btn btn-warning" id="create-sprint" style="border: 0;height: 40px">
                                <i class="glyphicon glyphicon-edit"></i> CREATE SPRINT BACKLOG
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin: 0;margin-top: 10px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <form class="form-inline hidden" id="sprint-form">
                        <div class="form-group">
                            <label class="control-label">Sprint name </label>
                            <input type="text" name="sprint" class="form-control" placeholder="sprint name"/>
                            <button type="submit" class="btn btn-info" id="btn-create">CREATE</button>
                            <button type="button" class="btn btn-danger" id="btn-close">CLOSE</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row" style="margin-top: 10px;margin-bottom: 20px;margin-left: 0;margin-right: 0">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12"
                    >
                    <table>
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>VALUE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include "configs/config.php";
                        include "classes/ManangePBL.php";
                        $db = new ManagePBL();
                        $result = $db->getPBL();
                        foreach ($result as $row) {
                            ?>
                            <tr style="font-family: sukhumvit;font-size: 17px;font-weight: 500">
                                <td class="id"><?php echo $row['id'] ?></td>
                                <td class="name"><?php echo $row['item_name'] ?></td>
                                <td class="value"><?php echo $row['value'] ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                    <table>
                        <thead>
                        <tr>
                            <th>PRIORITY</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>3</td>
                        </tr>
                        <tr>
                            <td>1</td>
                        </tr>
                        <tr>
                            <td>4</td>
                        </tr>
                        </tbody>
                    </table>
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
    $(function(){
        $('#create-sprint').click(function(){
            $('#sprint-form').removeClass("hidden");
            return false;
        });
        $('#btn-close').click(function () {
            $('#sprint-form').addClass("hidden");
           return false;
        });
    });
</script>

</body>
</html>