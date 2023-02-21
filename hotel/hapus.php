<?php
include 'function.php';

global $conn;
$id_kamar = $_GET["id"];

mysqli_query($conn, "DELETE FROM kamar WHERE id_kamar = $id_kamar");


if(mysqli_affected_rows($conn) >= 1) {
    echo "
    <script>
        alert('Data sudah dihapus!');
        document.location.href = 'admin.php?page=daftar-kamar';
    </script>
    ";
} else   {
    echo "
    <script>
        alert('Data gagal dihapus!');
        document.location.href = 'admin.php?page=daftar-kamar';
    </script>
    ";
}
?> 