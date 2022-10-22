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
      margin-top: -20px;
      height: 650px;
      background-color: #E4CDA7;
    }
  </style>
</head>

<body>


  <section>
    <div class="reg_img">
      <div class="box2">

        <h1 style="text-align: center;font-size:25px;font-family=Lucida Console;"> CESA Library Management </h1>
        <h1 style="text-align: center; font-size:15px;">User Registration Form </h1> <br>

        <form name="registration" action="" method="post">
          <div class="login">
            <input class="form-control" type="text" name="first" placeholder="First_Name" required=""> <br>
            <input class="form-control" type="text" name="last" placeholder="Last_Name" required=""> <br>
            <input class="form-control" type="number" name="roll" placeholder="Roll_Number" required=""> <br>
            <input class="form-control" type="email" name="email" placeholder="Email" required=""> <br>
            <input class="form-control" type="text" name="contact" placeholder="Contact_No" required=""> <br>
            <input class="form-control" type="text" name="username" placeholder="User_Name" required=""> <br>
            <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
            <input class="btn btn-default" type="Submit" name="submit" value="Sign Up" style="color:black; width:auto; height:30px;">
          </div>
        </form>

      </div>
    </div>
  </section>

  <?php

  if (isset($_POST['submit'])) {
    $count = 0;
    $sql = "select username from student";
    $res = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
      if ($row['username'] == $_POST['username']) {
        $count = $count + 1;
      }
    }

    if ($count == 0) {
      $token = bin2hex(random_bytes(20));
      mysqli_query($db, "INSERT INTO `student` VALUES ('$_POST[first]','$_POST[last]',
        '$_POST[roll]','$_POST[email]','$_POST[contact]','$_POST[username]','$_POST[password]','user.jpg', '$token' );");

      $msg = 'Account creation success. Before login, please activate your account by clicking the link: ';
      $msg .= '<a href="http://localhost/library/login.php?verification=' . $token . '">Click to activate your account</a>';

      try {
        mail($_POST["email"], 'Account Registration : Please activate your account', $msg);
      } catch (\Throwable $th) {
        throw $th;
      }

  ?>
      <script type="text/javascript">
        window.location = "../login.php";
      </script>
    <?php
    } else {
    ?>
      <script type="text/javascript">
        alert("The Username already Exists");
      </script>

  <?php
    }
  }

  ?>

</body>

</html>