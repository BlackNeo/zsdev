<?php 

    $controller =  "../master/registerController/registerController.php";

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
        <link href="/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="/css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                            <h3 class="panel-title">Please Sign Up</h3>
                            <br />
                            <p>Please fill this form to create an account.</p>
                        </div>
                        <div class="panel-body">
                            <form role="form" action="<?php echo htmlspecialchars($controller); ?>" method="post">
                                <fieldset>
                                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                                        <label>E-mail</label> 
                                        <input class="form-control" placeholder="E-mail" name="email" type="email" value="<?php echo $email; ?>" autofocus>
                                        <span class="help-block"><?php echo $email_err; ?></span>
                                    </div>
                                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                                        <label>Username</label>
                                        <input class="form-control" placeholder="Username" name="username" type="text" value="<?php echo $username; ?>">
                                        <span class="help-block"><?php echo $username_err; ?></span>
                                    </div>
                                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <label>Password</label>
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="<?php echo $password; ?>">
                                        <span class="help-block"><?php echo $password_err; ?></span>
                                    </div>
                                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                                        <label>Confirm password</label>
                                        <input class="form-control" placeholder="Confirm password" name="confirm_password" type="password" value="<?php echo $confirm_password; ?>">
                                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Submit">
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="/js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="/js/startmin.js"></script>

    </body>
</html>
