<?php

include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Admin Registration</title>
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

        <h1 style="text-align: center;font-size:25px;font-family = Lucida Console;"> CESA Library Management </h1>
        <h1 style="text-align: center; font-size:15px;">User Registration Form </h1> <br>

        <form name="registration" action="" method="post">
          <div class="login">
            <input class="form-control" type="text" name="first" placeholder="First_Name" required=""> <br>
            <input class="form-control" type="text" name="last" placeholder="Last_Name" required=""> <br>
            <input class="form-control" type="text" name="username" placeholder="User_Name" required=""> <br>
            <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
            <input class="form-control" type="email" name="email" placeholder="Email" required=""> <br>
            <input class="form-control" type="text" name="contact" placeholder="Contact_No" required=""> <br>

            <input class="btn btn-default" type="Submit" name="submit" value="Sign Up" style="color:black; width:auto; height:30px;">
          </div>
        </form>

      </div>
    </div>
  </section>

  <?php

  if (isset($_POST['submit'])) {
    $count = 0;
    $sql = "select username from admin";
    $res = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($res)) {
      if ($row['username'] == $_POST['username']) {
        $count = $count + 1;
      }
    }

    if ($count == 0) {
      mysqli_query($db, "INSERT INTO `admin` VALUES ('','$_POST[first]','$_POST[last]',
          '$_POST[username]','$_POST[password]','$_POST[email]','$_POST[contact]','user.jpg', '');");

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