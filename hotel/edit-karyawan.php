<?php

if (isset($_POST["edit-karyawan"])) {
    editP($_POST);
}

$id = $_GET["id"];

$user = query("SELECT * FROM user WHERE id_user = $id");

?>

<form action="" method="post" enctype="multipart/form-data">
    <?php foreach($user as $key) : ?>
		<div class="mb-3">
			<label for="nama_fasum" class="form-label">Username</label>
			<input type="text" class="form-control" name="username" id="nama_fasum" value="<?= $key["username"]?>">
		</div>
		<div class="mb-3">
			<label for="nama_fasum" class="form-label">Email</label>
			<input type="email" class="form-control" name="email" id="nama_fasum" value="<?= $key["email"]?>">
		</div>
        <div class="mb-3">
			<label for="tanggal" class="form-label">No Telpon</label>
			<input type="text" class="form-control" name="no_telp" id="tanggal" value="<?= $key["no_telepon"]?>">
		</div>
        <div class="mb-3">
			<label for="nama_lengkap" class="form-label">Nama Lengkap</label>
			<input type="text" class="form-control" name="nama" id="nama_lengkap" value="<?= $key["nama_lengkap"]?>">
		</div>
			<input type="hidden" class="form-control" name="password" id="password" value="<?= $key["password"]?>">
            <input type="hidden" name="id" value="<?= $id?>">
        <div class="mb-3">
			<label for="level" class="form-label">Level</label>
			<select class="form-control" name="level">
				<?php if($key["id_user_group"] == 1) : ?>
                <option value="1" selected>Admin</option>
                <option value="2">Resepsionis</option>
                <?php else : ?>
                <option value="1">Admin</option>
                <option value="2" selected>Resepsionis</option>
                <?php endif;?>
			</select>
		</div>
	<button type="submit" class="w-100 rounded mb-4 btn btn-primary" name="edit-karyawan">Simpan</button>
    <?php endforeach; ?>
</form>