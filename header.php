<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>FantArby's Brobotics League</title>
		<link href="images/favicon.ico" rel="shortcut icon">
		<link href="images/favicon-32x32.png" rel="icon" type="image/png" sizes="32x32">
		<link href="images/favicon-16x16.png" rel="icon" type="image/png" sizes="16x16">
		<link href="css/jquery-ui.css" rel="stylesheet">
		<link href="css/spectre.css" rel="stylesheet">
		<link href="css/spectre.min.css" rel="stylesheet">
		<link href="css/spectre-exp.css" rel="stylesheet">
		<link href="css/spectre-exp.min.css" rel="stylesheet">
		<link href="css/spectre-icons.css" rel="stylesheet">
		<link href="css/spectre-icons.min.css" rel="stylesheet">
		<link href="/site.webmanifest" rel="manifest">
		<meta name="theme-color" content="#ffffff">
		<script src="js/jquery-3.4.1.slim.min.js"></script>
		<script src="js/jquery-3.4.1.js"></script>
		<script src="js/jquery-ui.js"></script>
		<script src="js/jquery.js"></script>
	<style>
		body{
			font-family: "Trebuchet MS", sans-serif;
			margin: 50px;
		}
		.demoHeaders {
			margin-top: 2em;
		}
		#dialog-link {
			padding: .4em 1em .4em 20px;
			text-decoration: none;
			position: relative;
		}
		#dialog-link span.ui-icon {
			margin: 0 5px 0 0;
			position: absolute;
			left: .2em;
			top: 50%;
			margin-top: -8px;
		}
		#icons {
			margin: 0;
			padding: 0;
		}
		#icons li {
			margin: 2px;
			position: relative;
			padding: 4px 0;
			cursor: pointer;
			float: left;
			list-style: none;
		}
		#icons span.ui-icon {
			float: left;
			margin: 0 4px;
		}
		.fakewindowcontain .ui-widget-overlay {
			position: absolute;
		}
		select {
			width: 200px;
		}
	</style>
	</head>
	<body>
		<header class="navbar">
			<section class="navbar-section">
				<a href="index.php" class="btn btn-link">Home</a>
				<a href="menu.php" class="btn btn-link">Arby's Menu</a>
			</section>
			<section class="navbar-center">
				<a href="index.php">
					<img src="images/logo.png" alt="FantArby's Logo">
				</a>
			</section>
			<section class="navbar-section">
				<a href="developer.php" class="btn btn-link">Developer Home</a>
				<a href="#" class="btn btn-link">Contact</a>
			</section>
				<?php
				if (isset($_SESSION['userID']))
				{
					echo '<section class="navbar-section">
					<form action="includes/logout.inc.php" method="post">
					<button class="btn btn-primary" id="button" type="submit" name="logout-submit">Log out</button>
					</form>
					</section>';
				}
				else
				{
					echo '<section class="navbar-section">
					<div class="input-group">
					<form action="includes/login.inc.php" method="post">
					<input type="text" name="emailuid" placeholder="E-Mail/Username">
					<input type="password" name="pwd" placeholder="Password">
					<button class="btn btn-primary input-group-btn" id="button" type="submit" name="login-submit">Login!</button>
					</form>
					</div>
					<a href="signup.php" class="btn btn-link">Sign up!</a>
					</section>';
				}
				?>
		</header>
		