<?php

if (isset($_POST["tambah-karyawan"])) {
    tambahP($_POST);
}

?>

<form action="" method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label for="nama_fasum" class="form-label">Username</label>
			<input type="text" class="form-control" name="username" id="nama_fasum">
		</div>
		<div class="mb-3">
			<label for="nama_fasum" class="form-label">Email</label>
			<input type="email" class="form-control" name="email" id="nama_fasum">
		</div>
        <div class="mb-3">
			<label for="tanggal" class="form-label">No Telpon</label>
			<input type="text" class="form-control" name="no_telp" id="tanggal">
		</div>
        <div class="mb-3">
			<label for="nama_lengkap" class="form-label">Nama Lengkap</label>
			<input type="text" class="form-control" name="nama" id="nama_lengkap">
		</div>
        <div class="mb-3">
			<label for="password" class="form-label">Password</label>
			<input type="text" class="form-control" name="password" id="password">
		</div>
        <div class="mb-3">
			<label for="level" class="form-label">Level</label>
			<select class="form-control" name="level">
				<option selected>Pilih Level</option>
				<option value="1">Admin</option>
				<option value="2">Resepsionis</option>
			</select>
		</div>
	<button type="submit" class="w-100 rounded mb-4 btn btn-primary" name="tambah-karyawan">Simpan</button>
</form>