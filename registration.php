<?php
include "connection.php";
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width = device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style media="screen">
    section {
      height: 650px;
      margin-top: -20px;
      background-image: url("images/1.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }

    .box {
      height: 500px;
      width: 470px;
      background-color: black;
      margin: 0px auto;
      opacity: .8;
      color: white;
      padding: 20px;

    }

    label {
      font-weight: 600;
      font-size: 18px;
    }
  </style>
</head>

<body>
  <section>
    <br><br>
    <div class="box">
      <form name="signup" action="" method="post">

        <b>
          <p style="padding-left:50px;font-size:15px;font-weight:700;"> Sign Up as:</p>
        </b>
        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="admin" value="admin">
        <label for="admin">Admin</label>
        <input style="margin-left: 50px; width: 18px;" type="radio" name="user" id="student" value="student" checked="">
        <label for="student">Student</label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

        <button class="btn btn-default" type="submit" name="submit1" style="color:black; font-weight:700;width:70px;height:30px;">Ok</button>
    </div>

    <?php if (isset($_POST['submit1'])) {
      if ($_POST['user'] == 'admin') {
    ?>
        <script type="text/javascript">
          window.location = "admin/registration.php";
        </script>
      <?php
      } else {
      ?>
        <script type="text/javascript">
          window.location = "student/registration.php";
        </script>
    <?php
      }
    }

    ?>


  </section>

</body>

</html>