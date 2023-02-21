<?php

include "function.php";
$admins = query("SELECT * FROM kamar");

if (!isset($_SESSION["id_user"])) {
    header("Location: login.php");
}

if (isset($_POST["cari"])) {
    $kamar = cari($_POST["keyword"]);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin HotelKita - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
            <?php include("sidebar.php") ?>
        <!-- endsidebar  -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php include("topbar.php") ?>
                <div class="container-fluid">
                <?php 
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                        switch ($page) {
                            case 'daftar-kamar':
                                include 'daftar-kamar.php';
                                break;
                            case 'tambah-kamar':
                                include 'tambah-kamar.php';
                                break;
                            case 'edit-kamar':
                                include 'edit-kamar.php';
                                break;
                            default:
                                break;
                        }
                    } else {
                        include 'homescreen.php';
                    }
                    
                ?>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php if(isset($_GET["page"])) : ?>
        <?php if($page == 'edit-kamar') : ?>
            <script src="js/script.js"></script>
        <?php else : ?>

        <?php endif; ?>
    <?php endif; ?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>