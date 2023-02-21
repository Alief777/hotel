<?php

include 'function.php';

// session_start();

if (isset($_POST["submit"])) {
    login($_POST);
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

	<link rel="stylesheet" type="text/css" href="nis.css">

	<title>Hotel Kita</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">HotelKita</p>
			<div class="input-group">
				<input type="text" placeholder="email" name="email" autofocus required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password"  required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Belum punya akun? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>
