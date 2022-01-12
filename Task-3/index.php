<?php

include "configuration/config.php";
session_start();
error_reporting(0);

$fetchListQuery = "SELECT * FROM examslist ";
$result = mysqli_query($conn, $fetchListQuery);

$examsList = mysqli_fetch_all($result);


if (isset($_GET['submit']) && isset($_GET['dob']) && isset($_GET['rollnumber']) && isset($_GET['examchooser'])) {
	$_SESSION['rollnumber'] = $_GET['rollnumber'];
	$_SESSION['dob'] = $_GET['dob'];
	$_SESSION['examname'] = $_GET['examchooser'];
	header('Location: results/results.php');
} 

?>

<html>

<head>
	<title>LGMVIP Task-3</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width = device-width ; initial-scale = 1.0 ">
	<meta name="og:title" content="LGMVIP Task-3">
	<meta name="og:description" content="LetsGrowMore Web-Developement Intern TAsk-3">
	<meta name="theme-color" content="#ff00ff">
	<meta name="X-UA-Compatible" content="IE-edge">
	<link rel="stylesheet" href="./styles/index.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">

</head>

<body>
	<header>
		<?php include "./assets/navigation.php"; ?>
	</header>
	<main class="mainsec">
		<div class="school-img-div">
			<img class="school-img" src="http://unblast.com/wp-content/uploads/2020/05/Back-to-School-Illustration.jpg" alt="school image" />
		</div>
		<div class="main-links">
			<div class="login-form-maker">
				<h3 class="login-heading">Student Login</h3>
				<form class="student-form" method="GET">
					<div class="field-common">
						<label for="rollnumber" class="label-id">Roll-Number</label><br>
						<input id="change1" <?php echo "required"; ?> name="rollnumber" class="input-field" type="text" placeholder="lgm001" autofocus />
						<div class='prelims-div'>
							<p class="prelims">Use these examples: lgm001, lgm192, lgm310, lgm443</p>
						</div>
					</div>
					<div class="field-common">
						<label for="dob" class="label-id">Date-of-Birth</label><br>
						<input id="change2" <?php echo "required"; ?> name='dob' class="input-field" type="date" placeholder="01012001" />
						<div class='prelims-div'>
							<p class="prelims">Pattern: MM/DD/YYYY <br> Use these examples: 01/01/2001, 03/05/1997, 12/17/2002, 12/25/2000</p>
						</div>
					</div>
					<div class="field-common">
						<select name='examchooser' <?php echo "required"; ?> class="input-field" value="">
							<option value="">Select Exam</option>
							<?php 
							for($i = 0; $i < count($examsList); $i++){
								echo "<option value='".$examsList[$i][1]."'>".$examsList[$i][1]."</option>";
							}
							?>
						</select>

					</div>
						<div class="field-common">
							<a href="results/results.php"><input class="submit-btn" type="submit" value="submit" name="submit"></a>
						</div>
				</form>
			</div>
		</div>
	</main>

	<script src="./scripts/tiny.js"></script>
</body>

</html>