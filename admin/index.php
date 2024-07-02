<?php include "include/db.php"?>
<?php 
  ob_start();
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JobSite | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>Job</b>Hire</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="POST">
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
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="login" value="Sign In">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <!-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fas-fa-user mr-2"></i> Register Here
        </a>
      </div> -->

      <div class="not-a-user mt-1" style="display:flex; justify-content:center">
          <p>Not a member?</p>
          <a href="register.php">
            <div class="ml-2">
              Signup Now
            </div>
          </a>
        </div>
      <!-- /.social-auth-links -->


    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<?php
  if(isset($_POST['login'])) {
    $email      = mysqli_real_escape_string($db, $_POST['email']);
    $password   = mysqli_real_escape_string($db, $_POST['password']);

    $hassedPass = sha1($password);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $the_user = mysqli_query($db, $sql);

    while($row = mysqli_fetch_assoc($the_user)) {
      $_SESSION['id']         = $row['id'];
      $_SESSION['fullname']   = $row['fullname'];
      $_SESSION['username']   = $row['username'];
      $set_password           = $row['password'];
      $_SESSION['email']      = $row['email'];
      $_SESSION['phone']      = $row['phone'];
      $_SESSION['address']    = $row['address'];
      $_SESSION['role']       = $row['role'];
      $_SESSION['image']      = $row['image'];
    }

    if($email == $_SESSION['email'] && $hassedPass == $set_password) {
      header("Location: dashboard.php");
    }
    else if ($email !== $_SESSION['email'] || $hassedPass !== $set_password) {
      header("Location: index.php");
    }
    else {
      header("Location: index.php");
    }
  }
?>

<!-- jQuery -->
<script src="plugins/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App
<script src="plugins/js/adminlte.min.js"></script> -->

<?php ob_end_flush();?>
</body>
</html>
