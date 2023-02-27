<?php

if (isset($_POST["tambah-fasum"])) {
    tambah_fasum($_POST);
}

?>

<form action="" method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label for="nama_fasum" class="form-label">Nama Fasum</label>
			<input type="text" class="form-control" name="nama_fasum" id="nama_fasum">
		</div>
		<div class="mb-3">
			<label for="nomor_kamar" class="form-label">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
		</div>
		<div class="mb-3">
			<label for="upload" class="form-label">Upload Gambar</label>
			<div class="d-flex">
				<div style="position: relative; width: 20%;">
					<span class="btn btn-primary w-100">Choose</span>
					<input class="rounded-start form-control" type="file" name="gambar" id="upload" style="position: absolute; margin-top: -38px; opacity: 0; cursor: pointer;">
				</div>
                <input type="text" name="gambar_lama" class="form-control" id="text-gambar" style="width: 80%;">
			</div>
		</div>
        <div class="mb-3">
			<label for="tanggal" class="form-label">Tanggal</label>
			<input type="text" disabled class="form-control" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>">
		</div>
	<button type="submit" class="w-100 rounded mb-4 btn btn-primary" name="tambah-fasum">Simpan</button>
</form>