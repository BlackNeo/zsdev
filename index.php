<?php 

    $controller =  "../master/logController/loginController.php";
    session_start();
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === true){
        header("location: admin/dashboard.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ZSDev | User Net Admin</title>

        <!-- Bootstrap Core CSS -->
        <link href="admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="admin/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="admin/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo htmlspecialchars($controller); ?>" method="post">
                                <fieldset>
                                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                                        <span class="help-block"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                        <span class="help-block"><?php echo $password_err; ?></span>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Login">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="admin/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="admin/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="admin/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="admin/js/startmin.js"></script>

    </body>
</html>
