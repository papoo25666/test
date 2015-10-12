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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
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
</body>
</html>