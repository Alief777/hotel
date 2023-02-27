<?php

include "function.php";

if (isset($_POST["submit"])) {
    register($_POST);
}


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="nis.css">

	<title>Register</title>
</head>
<body  style="background-image: 2.jpg;">
	<div class="container">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="email" name="email" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="nomor telephone" name="no_telepon" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="nama lengkap" name="nama_lengkap" required>
			</div>
			<!-- <div class="input-group">
				<input type="tlp" placeholder="telephone" name="telephone" required>
			</div> -->
			<!-- <div class="input-group">
				<select name="jk" id="">
					<option value="">Jenis kelamin</option>
					<option value="L">Laki-laki</option>
					<option value="P">Perempuan</option>
				</select>
			</div> -->
			<!-- <div class="input-group">
				<input type="text" placeholder="foto_profile" name="foto_profile" required>
			</div>
			<div class="input-group">
				<input type="date" placeholder="tanggal_lahir" name="tanggal_lahir" required>
			</div> -->
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" required>
            </div>
			<input type="hidden" name="id_user_group" value="3">
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
		</form>
		<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
	</div>
</body>
</html>
