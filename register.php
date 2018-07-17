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
{
if (isset($_POST['register'])){
  $nama = $_POST['nama'];
  $user = $_POST['username'];
  $pass = $_POST['password'];
 
  if($nama && $user && $pass){
        $cek = mysql_query("SELECT * FROM login WHERE username='$user'");
        $num = mysql_num_rows($cek);
 
        if($num == 0){
          $insert = mysql_query("INSERT INTO login VALUES(NULL,'$user', '$pass', '$nama')");
          $row = mysql_fetch_array($insert);
          if($insert){
            $_SESSION['username'] = $user;
            $_SESSION['kd_user'] = $row['kd_user'];
            header('location:admin/?menu=uang_masuk');
          } else {
            echo "<script>alert('Gagal melakukan Register, coba lagi!')</script>";
          }
        } else {
          echo "<script>alert('Username sudah terdaftar, pilih Username lain!')</script>";
        }
      } 
    } 
  } 
?>

<div class="container">

    <div id="login-form">
        <form method="post" autocomplete="off">

            <div class="col-md-12">

                <div class="form-group">
                    <h2 class="">Register for our Website</h2>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="nama" class="form-control" placeholder="Enter Name" autofocus required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input type="text" name="username" class="form-control" placeholder="Enter Username" required/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password"
                               required/>
                    </div>
                </div>

                <div class="checkbox">
                    <label><input type="checkbox" id="TOS" value="This"><a href="#">I agree with
                            terms of service</a></label>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn    btn-block btn-primary" name="register" id="reg">Register</button>
                </div>

                <div class="form-group">
                    <hr/>
                </div>

                <div class="form-group">
                    <a href="index.php" type="button" class="btn btn-block btn-success" name="btn-login">Login</a>
                </div>

            </div>

        </form>
    </div>

</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/tos.js"></script>

</body>
</html>