<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>
		CESA Rental Library
	</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width = device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style media="screen">
		nav {
			float: right;
			word-spacing: 30px;
			padding: 20px;
		}

		nav li {
			display: inline-block;
			line-height: 80px;
		}
	</style>
</head>


<body>
	<div class="wrapper">
		<header>
			<div class="logo">
				<img src="images/logo.jpg">
				<h1 style="color: white; font-size:30px;">CESA Rental Library</h1>
			</div>
			<?php

			if (isset($_SESSION['login_user'])) { ?>
				<nav>
					<ul>
						<li><a href="">
								<div style="color: white">
									<?php
									echo "Welcome " . $_SESSION['login_user'];
									?>
								</div>
							</a></li>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
					</ul>
				</nav>
			<?php
			} else {
			?>
				<nav>
					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="login.php">LOGIN</a></li>
						<li><a href="feedback.php">FEEDBACK</a></li>
					</ul>
				</nav>
			<?php
			}

			?>

		</header>

		<section>
			<div class="sec_img">
				<br><br><br>
				<div class="box">
					<br><br><br><br>
					<h1 style="text-align: center; font-size: 35px; font-weight: bold;">Welcome to library</h1><br><br>
					<h1 style="text-align: center;font-size: 25px;font-weight: bold;">Opens at: 9:00 </h1><br>
					<h1 style="text-align: center;font-size: 25px;font-weight: bold;">Closes at: 15:00 </h1><br>
				</div>
			</div>
		</section>

		<footer>
			<p style="color:white;  text-align: center; ">
				<br><br>
				Email: CESA.library@gmail.com
				<br>
				Mobile: +88018********
			</p>
		</footer>

	</div>
</body>

</html>