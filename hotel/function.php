<?php


$conn = mysqli_connect('localhost' , 'root' , '' , 'perhotelan');

session_start();

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ){
        $rows[] = $row;
    };
    return $rows;
};

function findRow($query,$row) {
    global $conn;
    $table = mysqli_query($conn,$query);
    $coloums = mysqli_fetch_assoc($table);
    if (mysqli_num_rows($table) == 1) {
        $rows = $coloums[$row];
    }else {
        $rows = false;
    }
    return $rows;
};


function register($post) {
    global $conn;
    $username = $post["username"];
    $email = $post["email"];
    $no_telepon = $post["no_telepon"];
    $nama_lengkap = $post["nama_lengkap"];
    $password = $post["password"];
    $id_user_group = $post["id_user_group"];

    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)){
        echo "<script>
            alert('Email telah digunakan')
        <script>";

        return false;
    }

    $query = mysqli_query($conn, "INSERT INTO user VALUES('','$username', '$no_telepon', '$email', '$nama_lengkap', '$password', '$id_user_group')");
     if (mysqli_affected_rows($conn) === 1) {
        echo "
                    <script>
                        alert('Regristrasi berhasil');
                        document.location.href = 'login.php';
                    </script>
                ";
    } else {
        echo "
                    <script>
                        alert('Regristrasi gagal');
                        document.location.href = 'register.php';
                    </script>
                ";
    }

}


function login($post) {
    global $conn;

    if(isset($post["email"])) {
        $email = $post["email"];
        $password = $post["password"];
        $table = mysqli_query($conn, "SELECT username, password, id_user_group, id_user FROM user WHERE email='$email' AND password='$password'");
        $rows = mysqli_fetch_assoc($table);
        $pass = $rows["password"];
        $id_user = $rows["id_user"];
        $id_user_group = $rows["id_user_group"];
        if($password == $pass) {
            $_SESSION["id_user_group"] = $id_user_group;
            $_SESSION["login"] = $id_user;

            $_SESSION["id_user"] = $id_user;
            if ($id_user_group == '1') {
                echo "
                <script>
                    alert('SELAMAT DATANG ADMIN');
                    document.location.href = 'admin.php';
                </script>
                ";
            }elseif ($id_user_group == '2') {
                echo "
                <script>
                    alert('login telah berhasil');
                    document.location.href = 'resepsionis.php';
                </script>
                ";
            }else {
                echo "
                <script>
                    alert('login telah berhasil');
                    document.location.href = 'index.php';
                </script>
                ";
            }
        }else {
            echo "
            <script>
                alert('login gagal!');
                document.location.href = 'login.php';
            </script>
            ";
        }
    }
}

function kamar($post){
    global $conn;
    $no_kamar = $post["no_kamar"];
    $tipe_kamar = $post["tipe_kamar"];
    $harga_kamar = $post["harga_kamar"];
    $fasilitas_kamar = $post["fasilitas"];
    $status_kamar = $post["status"];

    $query = "INSERT INTO kamar VALUES ('', '$no_kamar', $tipe_kamar, '$harga_kamar', '$fasilitas_kamar', '$status_kamar')";
    mysqli_query($conn, $query);

    if ($query > 0) {
        echo "
        <script>
            alert('Kamar Berhasil Ditambahkan!');
            document.location.href = 'admin.php';
        </script>
        ";
    }
}

function booking($post){
    global $conn;

    
    $id_user = $post["id_user"];
    $email = $post["email"];
    $username = $post["username"];
    $cek_in = $post["cek-in"];
    $cek_out = $post["cek-out"];
    $tipe_kamar = $post["tipe_kamar"];
    $kode_booking = kode();

    // var_dump($id_user);
    // var_dump($email);
    // var_dump($cek_in);
    // var_dump($cek_out);
    // var_dump($tipe_kamar);
    // var_dump($kode_booking);
    // die;



    mysqli_query($conn, "INSERT INTO booking VALUES('', '$id_user', '$email', '$username', '$cek_in', '$cek_out', '$tipe_kamar', '$kode_booking')");
    if (mysqli_affected_rows($conn) == 1) {
        echo "
                <script>
                    alert('Book Berhasil');
                    document.location.href = 'index.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Book gagal');
                    document.location.href = 'index.php';
                </script>
            ";
    }

}

function kode($numDigits = 6)
{
    $digits = '';

    for (
        $i = 0;
        $i < $numDigits;
        ++$i
    ) {
        $digits .= mt_rand(0, 9);
    }

    return $digits;
}



function tambah($post) 
{
    global $conn;
    $gambar = upload();
    $tipe_kamar = htmlspecialchars($post["tipe_kamar"]);
    $nomor_kamar = htmlspecialchars($post["nomor_kamar"]);
    $harga_kamar = htmlspecialchars($post["harga"]);
    $fasilitas_kamar = fasili($post["fasilitas"]);
    $status_kamar = $post["status"];
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO kamar VALUES('', '$gambar', '$tipe_kamar', '$nomor_kamar', '$harga_kamar', '$fasilitas_kamar', '$status_kamar')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) >= 1) {
        echo "
            <script>
                alert('Data Berhasil ditambah!');
                document.location.href = 'admin.php?page=daftar-kamar';
            </script>
        ";
    }  else {
        echo "
            <script>
                alert('Data gagal ditambah!');
                document.location.href = 'admin.php?page=tambah-kamar';
            </script>
        ";
    }
}

function fasili($fasilitas) {
    $hasil = implode(", ", $fasilitas);
    return $hasil;
}

function rubahKamar($post) 
{
    global $conn;
    
    $gambar = upload();
    $id_kamar = $post["id_kamar"];
    $tipe_kamar = htmlspecialchars($post["tipe_kamar"]);
    $nomor_kamar = htmlspecialchars($post["nomor_kamar"]);
    $harga_kamar = htmlspecialchars($post["harga"]);
    $fasilitas_kamar = fasili($post["fasilitas"]);
    $gambar_lama = htmlspecialchars($post["gambar_lama"]);
    $status_kamar = $post["status"];
    if (!$gambar) {
        $gambar = $gambar_lama;
    }
    $query = "UPDATE kamar SET gambar = '$gambar' ,tipe_kamar = '$tipe_kamar', no_kamar = '$nomor_kamar', harga_kamar = '$harga_kamar', fasilitas_kamar = '$fasilitas_kamar', status_kamar = '$status_kamar' WHERE id_kamar = $id_kamar";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) >= 1) {
        echo "
            <script>
                alert('Data Berhasil diubah!');
                document.location.href = 'admin.php?page=daftar-kamar';
            </script>
            ";
    }  else {
        echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = 'admin.php?page=edit-kamar&id=$id_kamar';
            </script>
            ";
}

}

function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tempName = $_FILES['gambar']['tmp_name'];

    if ($namaFile == null) {
        return false;
    }

    if($error === 4){
        echo "<script>
                alert('Masukan Gambar');
            </script>";
        return false;
    }

    $validGambar = ['jpg', 'jpeg', 'png'];

    $extensiGambar = explode('.', $namaFile);
  
    $extensiGambar = strtolower(end($extensiGambar));
    if (!in_array($extensiGambar, $validGambar)) {
        echo "<script>
                alert('Yang anda upload bukan gambar');
            </script>";
        return false;
    }

    if ($ukuranFile > 5000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    move_uploaded_file($tempName, 'img/' . $namaFile);

    return $namaFile;
}

function cari($keyword){
    $query = "SELECT * FROM kamar
                WHERE
                tipe_kamar LIKE '$keyword%' 
                ";
    return query($query);      
}

function update($post) {
    global $conn;
    $id_user = $_SESSION["user"];
    $username = $post["username"];
    $nama_lengkap = $post["nama"];
    $email = $post["email"];

    mysqli_query($conn,"UPDATE user SET username='$username', nama_lengkap='$nama_lengkap', email='$email'WHERE id=$id_user");

    // if (mysqli_affected_rows($conn) == 1) {
    //     echo "
    //             <script>
    //                 alert('Data berhasil diubah!');
    //                 document.location.href = 'biodata.php';
    //             </script>
    //         ";
    // }else {
    //     echo "
    //             <script>
    //                 alert('Data gagal diubah!');
    //                 document.location.href = 'biodata.php';
    //             </script>
    //         ";
    // }    
    // $gambar = upload($gambar_lama);
    // if (!$gambar) {
    //     return false;
    // }
    // $query = "INSERT INTO user VALUES ('', $id_user, '$username', '$nama_lengkap', '$email')";
    // mysqli_query($conn, $query);
    // var_dump($conn)
    // return mysqli_affected_rows($conn);
    // mysqli_query($db,"UPDATE user SET username='$username', nama_lengkap='$nama_lengkap', email='$email'");
    // if (mysqli_affected_rows($conn) == 1) {
    //     echo "
    //             <script>
    //                 alert('Data berhasil diubah!');
    //                 document.location.href = 'biodata.php';
    //             </script>
    //         ";
    // }else {
    //     echo "
    //             <script>
    //                 alert('Data gagal diubah!');
    //                 document.location.href = 'biodata.php';
    //             </script>
    //         ";
    // }
}


function tambah_fasum($post) 
{
    global $conn;

    $nama_fasum = $post["nama_fasum"];
    $keterangan = $post["keterangan"];
    $gambar = upload();
    $tanggal = date('Y-m-d');

    mysqli_query($conn, "INSERT INTO fasum VALUES('', '$nama_fasum','$gambar','$keterangan','$tanggal')");

    if (mysqli_affected_rows($conn) == 1) {
        echo "
            <script>
                alert('Tambah Fasum Berhasil');
                document.location.href = 'admin.php?page=daftar-fasum';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Tambah Fasum gagal');
                document.location.href = 'admin.php?page=tambah-fasum';
            </script>
        ";
    }
}

function edit_fasum($post)
{
    global $conn;

    $id_fasum = $post["id_fasum"];
    $nama_fasum = $post["nama_fasum"];
    $keterangan = $post["keterangan"];
    $gambar = upload();
    $gambar_lama = $post["gambar_lama"];
    $tanggal = date('Y-m-d');

    if (!$gambar) {
        $gambar = $gambar_lama;
    }

    mysqli_query($conn, "UPDATE fasum SET nama_fasum = '$nama_fasum', gambar = '$gambar', keterangan = '$keterangan', tgl = '$tanggal' WHERE id_fasum = $id_fasum");

    if (mysqli_affected_rows($conn)) {
        echo "
            <script>
                alert('Fasum berhasil diedit!');
                document.location.href = 'admin.php?page=daftar-fasum';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Fasum gagal diedit!');
                document.location.href = 'admin.php?page=edit-fasum&id=$id_fasum';
            </script>
        ";
    }
    
}

function tambahP($request) {

    global $conn;

    $username = htmlspecialchars($request["username"]);
    $email = htmlspecialchars($request["email"]);
    $notelp = htmlspecialchars($request["no_telp"]);
    $nama = htmlspecialchars($request["nama"]);
    $password = htmlspecialchars($request["password"]);
    $level = htmlspecialchars($request["level"]);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$email', '$notelp', '$nama', '$password', '$level')");
    if (mysqli_affected_rows($conn) == 1) {
        echo "
            <script>
                alert('Tambah Karyawan Berhasil');
                document.location.href = 'admin.php?page=Karyawan';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Tambah Karyawan gagal');
                document.location.href = 'admin.php?page=tambah-karyawan';
            </script>
        ";
    }

}

function editP($request) {
    global $conn;

    $username = htmlspecialchars($request["username"]);
    $email = htmlspecialchars($request["email"]);
    $notelp = htmlspecialchars($request["no_telp"]);
    $nama = htmlspecialchars($request["nama"]);
    $password = htmlspecialchars($request["password"]);
    $level = htmlspecialchars($request["level"]);
    $id = $request["id"];

    mysqli_query($conn, "UPDATE user SET username='$username', email='$email', no_telepon='$notelp', nama_lengkap='$nama',
    password='$password', id_user_group='$level' WHERE id_user = $id");

    if (mysqli_affected_rows($conn) == 1) {
        echo "
            <script>
                alert('Edit Karyawan Berhasil');
                document.location.href = 'admin.php?page=Karyawan';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Edit Karyawan gagal');
                document.location.href = 'admin.php?page=edit-fasum&id=$id';
            </script>
        ";
    }
}

?>
