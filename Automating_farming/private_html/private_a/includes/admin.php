<?php

if(isset($_SESSION['user_id']))
{
 
  header('location:../private_html/private_a/includes/');

}
else{
$Error = "";

if(count($_POST) > 0)
{

  $user = new User();
  $Error = $user->login($_POST);
  
  if($Error == ""){
    header("Location:../private_html/private_a/includes/");
    die;
  } 
  

}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Automatic Farming</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../private_html/private_a/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../private_html/private_a/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../private_html/private_a/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="./" class="h1"><b>V-raag </b>Automated Farming</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <?php 

        if($Error == "")
        {
          echo $Error;
        }
      ?>
      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input class="btn btn-primary btn-block" type="submit" value="Sign In">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- /.social-auth-links -->

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../private_html/private_a/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../private_html/private_a/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../private_html/private_a/dist/js/adminlte.min.js"></script>

  </body>
</html>