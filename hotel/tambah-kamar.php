<?php

if (isset($_POST["tambah"])) {
    tambah($_POST);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kamar</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">tipe kamar</label><br>
        <input type="text" name="tipe_kamar"><br>
        <label for="">nomor kamar</label><br>
        <input type="text" name="no_kamar"><br>
        <label for="">Gambar</label><br>
        <input type="file" name="gambar"><br>
        <label for="">Harga</label><br>
        <input type="text" name="harga_kamar"><br>
        <label for="">fasilitas Kamar</label><br>
        <input type="checkbox" name="fasilitas[]" value="bathtub"> bathtub <br>
        <input type="checkbox" name="fasilitas[]" value="tv"> tv <br>
        <input type="checkbox" name="fasilitas[]" value="rumah"> rumah <br>
        <input type="checkbox" name="fasilitas[]" value="kasur"> kasur <br>
        <input type="checkbox" name="fasilitas[]" value="rambut"> rambut <br>
        <input type="checkbox" name="fasilitas[]" value="jombi"> jombi <br>
        <label for="status">Status</label> <br>
        <select name="status_kamar" id="status"> <br>
            <option value="isi">isi</option>
            <option value="tidak-isi">tidak-isi</option>
        </select> <br>
        <button type="submit" name="tambah">Tambah</button>
    </form>
</body>

</html>