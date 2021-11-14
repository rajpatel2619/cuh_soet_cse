<!DOCTYPE html>
<html>
<head>
	<title>Daily Attandance</title>

	<link rel="icon" href="./img/cuhlogo.png" type="image/gif" sizes="16x16">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
	<link rel="stylesheet" href="css/attandance_redirect.css">
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
		<h5>Computer Science & Technology, S.O.E.T - CUH</h5>
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
					<a href="classes.php?batch=2018">
						<i class="fa fa-laptop" aria-hidden="true"></i>
						<span>Classes</span>
					</a>
				</li>
				<li>
					<a href="students.php?batch=2018">
						<i class="fa fa-users" aria-hidden="true"></i>
						<span>Students</span>
					</a>
				</li>
				<li>
				<a href="attandance_records.php?bid=1&cid=1&sd=<?php echo date('Y-m-d', strtotime(' -1 month'));?>&ld=<?php echo date('Y-m-d'); ?>">
						<i class="fa fa-file" aria-hidden="true"></i>
						<span>Attandance</span>
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
			<?php include("./components/attandance_redirect.php") ?>
		</section>
	</div>

	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->
</body>
</html>