<!DOCTYPE html>
<html>

<head>
	<title>WSD learning</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />
	<link rel="stylesheet" href="css/style.css" />

	<link rel="stylesheet" type="text/css" href="css/stylelogin.css">

	<style type="text/css">

	</style>
</head>

<body>
	<header id="header" class="fixed-top">
		<div class="container d-flex align-items-center justify-content-between">
			<a href="index.php" class="logo"><img src="img/logo.jpg" alt="" class="img-fluid" /></a>
			

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto" href="index.php#hero">Home</a></li>
					<li><a class="nav-link scrollto" href="index.php#cources">Courses</a></li>
					<li><a class="nav-link scrollto" href="aboutus.php">About</a></li>
					<li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
					<li><a class="nav-link scrollto" href="contactus.php">Contact</a></li>
					<li><a class="nav-link scrollto" href="booking.php">Appointment</a></li>
					<?php

					if (!isset($_SESSION['Id']) || ($_SESSION['Id'] == '')) {
						echo "<li><a class=\"nav-link scrollto active\" href=\"login.php\">Login</a><li>";
					} else {
						echo "<a class=\"nav-link scrollto\" href=\"logout.php\">Logout  " . $row['UserName'] . " </a><li>";
					}
					?>



				</ul>
				<i class="icon icon-list mobile-nav-toggle"></i>
			</nav>
			
		</div>
	</header>
	<div class="content">
		<div class="main">
			<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">

				<label for="chk" aria-hidden="true">Sign up</label>
				<input type="text" name="txt" id="usrname" placeholder="User name" required="">
				<input type="file" name="image_file" id="image_file">
				<input type="email" name="emailsp" id="emailsp" placeholder="Email">
				<input type="password" name="passsp" id="passsp" placeholder="Password" required="">
				<p id="Errsp" class="emailErr"></p>
				<button onclick="Validate()">Sign up</button>

			</div>

			<div class="login">

				<label for="chk" aria-hidden="true">Login</label>
				<input type="email" name="" id="emaillog" placeholder="Email">
				<input type="password" name="" id="passlog" placeholder="Password" required="">
				<p id="Errlog" class="emailErr"></p>
				<button onclick="Validate()">Login</button>

			</div>
		</div>
	</div>

	<script src="js/popper.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
		 var image_file = document.getElementById("image_file");
		function Validate() {

			var emlog = document.getElementById("emaillog").value;
			var passlog = document.getElementById("passlog").value;
			var Errlo = document.getElementById("Errlog");


			var emsp = document.getElementById("emailsp").value;
			var passsp = document.getElementById("passsp").value;
			var usrname = document.getElementById("usrname").value;
			var Errsp = document.getElementById("Errsp");

			var chk = document.getElementById("chk").checked;

			Errlo.style.display = "none";
			Errsp.style.display = "none";
			Errlo.innerHTML = "";
			Errsp.innerHTML = "";

			if (chk) {
				if (emlog == "") {
					Errlog.innerHTML = "enter email";
					Errlog.style.display = "block";
					return;

				} else {
					if (!ValidateEmail(emlog, Errlog)) {
						return;
					}
				}
				if (passlog == "") {
					Errlog.innerHTML = "enter password";
					Errlog.style.display = "block";
					return;
				}
				$.ajax({
					type: 'post',
					url: 'logindb.php',
					data: {
						checklogin: "checklogin",
						email: emlog,
						password: passlog
					},
					success: function(response) {
						if (response == "success") {
							window.location.href = "index.php";
						} else {

							Errlog.innerHTML = response;
							Errlog.style.display = "block";
						}
					}
				});
			} else {
				if (usrname == "") {
					Errsp.innerHTML = "enter User name";
					Errsp.style.display = "block";
					return;

				}
				if (image_file.files.length == 0) {
					Errsp.innerHTML = "Please upload your User Image";
					Errsp.style.display = "block";
                    return false;
            }
				if (emsp == "") {
					Errsp.innerHTML = "enter email";
					Errsp.style.display = "block";
					return;

				} else {
					if (!ValidateEmail(emsp, Errsp)) {
						return;
					}
				}
				if (passsp == "") {
					Errsp.innerHTML = "enter password";
					Errsp.style.display = "block";
					return;
				}

				var file = image_file.files[0];
				var form = new FormData();
                 form.append('image_file', file);
                 form.append('password', passsp);
                form.append('email', emsp);
                form.append('UserName', usrname);
				$.ajax({
					type: 'post',
                    url: 'Signupdb.php',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form,
					success: function(response) {
						if (response == "success") {
							window.location.href = "index.php";
						} else {
							Errsp.innerHTML = response;
							Errsp.style.display = "block";
						}
					}
				});
			}

		}

		function ValidateEmail(inputText, lblemailErr) {
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			if (inputText.match(mailformat)) {

				return true;
			} else {
				lblemailErr.style.display = "block";
				lblemailErr.innerHTML = "You have entered an invalid email address!";
				return false;
			}
		}
	</script>
</body>

</html>