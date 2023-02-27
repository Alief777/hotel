<?php

include 'function.php';
global $conn;

$id = $_GET["id"];
mysqli_query($conn, "DELETE FROM fasum WHERE id_fasum=$id");
if (mysqli_affected_rows($conn) == 1) {
    echo "
        <script>
            alert('Fasum Berhasil Hapus!');
            document.location.href = 'admin.php?page=daftar-fasum';
        </script>
    ";
}else {
    echo "
        <script>
            alert('Fasum gagal dihapus!');
            document.location.href = 'admin.php?page=daftar-fasum';
        </script>
    ";
}


?>