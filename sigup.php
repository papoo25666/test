<?php
include_once "classes/ManageSession.php";
if (ManageSession::isLogged()) {
    header("location:index.php");
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
    <section class="content">
        <div class="" style="margin-top: 70px">
            <div class="row" style="margin:0;px;padding: 40px;">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-lg-offset-4 col-md-offset-4 col-sm-offset-4"
                     style="background-color: #E0E0E0;padding: 20px">
                    <h2 class="text-center"
                        style="color: #333;font-weight: bold;margin-top: 10px;font-family: sukhumvit;font-size: 3em;;">
                        SIGN UP</h2>
                    <?php include_once "/libs/register.php"; ?>
                    <form role="form" class="form-horizontal" action="" method="post" enctype="multipart/form-data"
                          style="margin-top: 10px;padding: 10px">
                        <?php if (isset($success)) echo "<span style='margin-left: -10px;margin-bottom: 10px;color: green;'>" . $success . "<a href='login.php' style='font-weight: bold'>  คลิกเพื่อเข้าสู่ระบบ</a></span>"; ?>
                        <?php if (isset($warning)) echo "<span  style='margin-left: -10px;margin-bottom: 10px;color: orangered'>" . $warning . "</span>"; ?>
                        <?php if (isset($err)) echo "<span style='margin-left: -10px;margin-bottom: 10px;color: red'>" . $err . "</span>"; ?>
                        <div class="form-group" style="margin-top: 10px">
                            <div class="col-lg-12" style="padding-left: 0">
                                <label style="font-family: sukhumvit;font-size: 1.2em" class="control-label">Profile picture</label>
                                <input type="file" class="form-control" id="image" name="image"
                                    placeholder="profile">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12" style="padding-left: 0">
                                <input type="text" class="form-control" id="fname" name="fname"
                                       placeholder="First name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12" style="padding-left: 0">
                                <input type="text" class="form-control" id="lname" name="lname" placeholder="Last name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12" style="padding-left: 0">
                                <input type="text" class="form-control" id="username" name="username"
                                       placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12" style="padding-left: 0">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12" style="padding-left: 0">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12" style="padding-left: 0">
                                <select name="role" class="form-control">
                                    <?php
                                    include_once "classes/ManageUsers.php";
                                    $conn = new ManageUsers();
                                    $result = $conn->getRole();
                                    foreach ($result as $row) {
                                        ?>
                                        <option
                                            value="<?php echo $row['id']; ?>"><?php echo $row['user_type_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-center" style="margin-bottom: 0">
                            <button type="submit" class="btn btn-success" style="width: 100%">
                                SIGN UP
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!--Footer-->
    <section class="footer-content" style="margin-top: 10px">
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
<script type="application/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="application/javascript" src="js/bootstrap.min.js"></script>
<script type="application/javascript" src="js/angular.min.js"></script>
</body>
</html>