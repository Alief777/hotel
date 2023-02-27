<?php
include 'function.php';

global $conn;
$id = $_GET["id"];

mysqli_query($conn, "DELETE FROM user WHERE id_user = $id");


if(mysqli_affected_rows($conn) >= 1) {
    echo "
    <script>
        alert('Data berhasil dihapus!');
        document.location.href = 'admin.php?page=Karyawan';
    </script>
    ";
} else   {
    echo "
    <script>
        alert('Data gagal dihapus!');
        document.location.href = 'admin.php?page=Karyawan';
    </script>
    ";
}
?> 