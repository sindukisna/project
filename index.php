<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
</head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
<body >

<?php
  session_start();

  if (isset($_SESSION["username"])) {
  include_once("library/koneksi.php");
  exit;
}

  include_once("library/koneksi.php");
  if (isset($_POST["login"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];


    $final = mysql_query("SELECT * FROM login WHERE username ='$username' AND password ='$password'");

    if ( mysql_num_rows($final) === 1 ) {
      $row = mysql_fetch_array($final);

        // $_SESSION["login"] = true;
        $_SESSION['username'] = $username;
        $_SESSION['kd_user'] = $row['kd_user'];
        header('location:admin/?menu=uang_masuk');
        exit;
    }

    $error = true;

  }
?>

<div class="container">


    <div id="login-form">
        <form role="form" method="post" action="">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 class="">Login:</h2>
                </div>

                <div class="form-group">
                    <hr/>
                </div>


                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input class="form-control" placeholder="Username" name="username" type="text" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="password" class="form-control" placeholder="Password" required/>
                    </div>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-block btn-primary" name="login">Login</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <a href="register.php" type="button" class="btn btn-block btn-danger"
                       name="btn-login">Register</a>
                </div>

            </div>

        </form>
    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>