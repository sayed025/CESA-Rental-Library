<?php
include "connection.php";
include "navbar.php";

$verified = false;
if (isset($_GET['verification'])) {
  $res = mysqli_query($db, "SELECT * FROM `student` WHERE verification_token='$_GET[verification]';");
  $count = mysqli_num_rows($res);

  if ($count > 0) {
    mysqli_query($db, "UPDATE `student` SET verification_token=null WHERE verification_token='$_GET[verification]';");
    $verified = true;
  }
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Student Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width = device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style media="screen">
    section {
      margin-top: -20px;
      height: 650px;
    }

    .box1 {
      height: 480px;
      width: 450px;
      background-color: black;
      margin: 0px auto;
      opacity: .8;
      color: white;
      padding: 10px;
    }

    label {
      font-size: 18px;
      font-weight: 600;
    }
  </style>
</head>

<body>


  <section>
    <div class="log_img">
      <br><br><br>
      <div class="box1">
        <h1 style="text-align: center;font-size:35px;font-family = Lucida Console;"> CESA Library Management </h1>
        <?php
          if (isset($_GET['verification']) && $verified) {

            ?>
          <h2 style="text-align: center;font-size:15px;font-family = Lucida Console;">Account verified. You can login now.</h2>
            <?php
          }
        ?>
        <h1 style="text-align: center; font-size:25px;"> Login Form </h1>
        <br>
        <form name="login" action="" method="post">

          <b>
            <p style="padding-left:50px;font-size:15px;font-weight:700;"> Login as:</p>
          </b>
          <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="admin" value="admin">
          <label for="admin">Admin</label>
          <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="student" value="student" checked="">
          <label for="student">Student</label>

          <div class="login">
            <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
            <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br> <br>
            <input class="btn btn-default" type="Submit" name="submit" value="Login" style="color:black; width:auto; height:30px;">
          </div>
          <p style="color: white; padding-left: 15px;">
            <br><br>
            <a style="color:white;" href="update_password.php">Forgot password?</a> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
            New to this website?<a style="color: white;" href="registration.php">Sign Up</a>
          </p>
        </form>
      </div>
    </div>
  </section>

  <?php
  if (isset($_POST['submit'])) {
    if ($_POST['user'] == 'admin') {
      $count = 0;
      $res = mysqli_query($db, "SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]' and status='yes';");
      $count = mysqli_num_rows($res);

      $row = mysqli_fetch_assoc($res);

      if ($count == 0) {
  ?>
        <script type="text/javascript">
          alert("Wrong username or password");
        </script>
      <?php
      }  else {

        /*if macthes*/

        $_SESSION['login_user'] = $_POST['username'];
        $_SESSION['pic'] = $row['pic'];
      ?>
        <script type="text/javascript">
          window.location = "admin/profile.php";
        </script>
      <?php
      }
    } else {
      $count = 0;
      $res = mysqli_query($db, "SELECT * FROM `student` WHERE username='$_POST[username]' && password='$_POST[password]';");
      $count = mysqli_num_rows($res);

      $row = mysqli_fetch_assoc($res);

      if ($count == 0) {
      ?>
        <script type="text/javascript">
          alert("Wrong username or password");
        </script>
      <?php
      } else if ($row['verification_token'] != null) {
        ?>
        <script type="text/javascript">
          alert("Please verify your account first.");
        </script>
      <?php
      } else {
        $_SESSION['login_user'] = $_POST['username'];
        $_SESSION['pic'] = $row['pic'];
      ?>
        <script type="text/javascript">
          window.location = "student/profile.php";
        </script>
  <?php
      }
    }
  }
  ?>

</body>

</html>