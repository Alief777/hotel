<?php

$id_kamar = $_GET["id"];
$kamar = query("SELECT * FROM kamar WHERE id_kamar = $id_kamar");
$fasilitas_kamar = explode(',',$kamar[0]["fasilitas_kamar"]);

if (isset($_POST["edit-kamar"])) {
	rubahKamar($_POST);
}
?>

<form action="" method="post" enctype="multipart/form-data">
	<?php foreach($kamar as $key) : ?>
		<div class="mb-3">
			<label for="tipe_kamar" class="form-label">Tipe Kamar</label>
			<input type="text" class="form-control" name="tipe_kamar" id="tipe_kamar" value="<?= $key["tipe_kamar"] ?>">
		</div>
		<div class="mb-3">
			<label for="nomor_kamar" class="form-label">Nomor Kamar</label>
			<input type="text" class="form-control" name="nomor_kamar" id="nomor_kamar" value="<?= $key["no_kamar"] ?>">
		</div>
		<div class="mb-3">
			<label for="upload" class="form-label">Upload Gambar</label>
			<div class="d-flex">
				<div style="position: relative; width: 20%;">
					<span class="btn btn-primary w-100">Choose</span>
					<input class="rounded-start form-control" type="file" name="gambar_kamar" id="upload" style="position: absolute; margin-top: -38px; opacity: 0; cursor: pointer;">
				</div>
				<input type="text" class="form-control" value="<?= $key["gambar"] ?>" id="text-gambar" style="width: 80%;">
			</div>
		</div>
		<div class="mb-3">
			<label for="harga_kamar" class="form-label">Harga Kamar</label>
			<input type="text" class="form-control" name="harga" id="harga_kamar" value="<?= $key["harga_kamar"] ?>">
		</div>
		<div class="mb-3">
			<label for="harga_kamar" class="form-label">Fasilitas Kamar</label>
			<div class="form-check form-switch">
				<input class="form-check-input" <?php echo (in_array('bathtub', $fasilitas_kamar) == true ? 'checked' : ''); ?> type="checkbox" name="fasilitas[]" value="bathub" id="flexSwitchCheckDefault">
				<label class="form-check-label" for="flexSwitchCheckDefault">Bathub</label>
			</div>
			<div class="form-check form-switch">
				<input class="form-check-input" <?php echo (in_array('tv', $fasilitas_kamar) == true ? 'checked' : ''); ?> type="checkbox" name="fasilitas[]" value="tv" id="flexSwitchCheckDefault">
				<label class="form-check-label" for="flexSwitchCheckDefault">TV</label>
			</div>
			<div class="form-check form-switch">
				<input class="form-check-input" <?php echo (in_array('wifii', $fasilitas_kamar) == true ? 'checked' : ''); ?> type="checkbox" name="fasilitas[]" value="wifii" id="flexSwitchCheckDefault">
				<label class="form-check-label" for="flexSwitchCheckDefault">Wifii</label>
			</div>
		</div>
		<div class="mb-3">
			<label for="status_kamar" class="form-label">Status Kamar</label>
			<select name="status" id="status_kamar" class="border rounded" style="width: 100%; height: 37px; outline: none;">
				<option value="isi" <?php echo ($key["status_kamar"] == 'isi' ? 'selected' : ''); ?> >isi</option>
				<option value="tidak-isi" <?php echo ($key["status_kamar"] == 'tidak-isi' ? 'selected' : ''); ?> >tidak-isi</option>
			</select>
		</div>
	<?php endforeach; ?>
	<button type="submit" class="w-100 rounded mb-4 btn btn-primary">Simpan</button>
</form>