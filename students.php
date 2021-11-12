<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/batch.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<input type="checkbox" id="checkbox">
	<header class="header">
		<h2 class="u-name">DASH<b>BOARD</b>
			<label for="checkbox">
				<i id="navbtn" class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</h2>
		<h3>Computer Science & Technology, S.O.E.T - CUH</h3>
		<!-- <i class="fa fa-user" aria-hidden="true"></i> -->
	</header>
	<div class="body">
		<nav class="side-bar">
			<div class="user-p">
				<img src="img/cuhlogo.png">
				<h5>CSE - SOET - CUH</h5>
			</div>
			<ul>
				<li>
					<a href="dashboard.php">
						<i class="fa fa-desktop" aria-hidden="true"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li>
					<a href="batches.php">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<span>Batches</span>
					</a>
				</li>
				<li>
					<a href="classes.php">
						<i class="fa fa-laptop" aria-hidden="true"></i>
						<span>Classes</span>
					</a>
				</li>
				<li>
					<a href="students.php">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Students</span>
					</a>
				</li>
				<!-- <li>
					<a href="#">
						<i class="fa fa-cog" aria-hidden="true"></i>
						<span>Setting</span>
					</a>
				</li> -->
				<li>
					<a href="#">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<section class="main-section">
			<?php include("./components/student.php") ?>
		</section>
	</div>

</body>
</html>