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
  <title>JobSite | Registration Page</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Job</b>Hire</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="fullname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

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
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="cpassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <select class="form-control" name="role" id="">
            <option value="0">Please Select Your Role</option>
            <option value="1">Employer</option>
            <option value="2">Job Applicant</option>
          </select>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
          </div>
          <!-- /.col -->
        </div>
      </form>


      <?php
        if(isset($_POST['register'])) {
          $fullname       = mysqli_real_escape_string($db, $_POST['fullname']);
          $username       = mysqli_real_escape_string($db, $_POST['username']);
          $email          = mysqli_real_escape_string($db, $_POST['email']);
          $password       = mysqli_real_escape_string($db, $_POST['password']);
          $cpassword      = mysqli_real_escape_string($db, $_POST['cpassword']);
          $role           = mysqli_real_escape_string($db, $_POST['role']);

          if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($cpassword) || empty($role)) {
            echo "<div class='alert alert-warning'>Please provide all the informations</div>";
          }
          else {

            if($password == $cpassword) {
              $hassedPass = sha1($password);

              $sql = "INSERT INTO users(fullname, username, email, password, role) VALUES('$fullname','$username','$email','$hassedPass','$role')";
              $register_user = mysqli_query($db, $sql);

              if($register_user) {
                header("Location: index.php");
              }
              else {
                die("Query Failed". mysqli_error($db));
              }
            }
            else {
              echo "<div class='alert alert-warning'>Password didn't match</div>";
            }


          }
        }
      ?>






      <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="login.html" class="text-center">I already have a membership</a> -->
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<!-- <script src="plugins/js/adminlte.min.js"></script> -->

<?php ob_end_flush();?>
</body>
</html>
