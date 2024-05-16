<?php
session_start();
include "../conn/koneksi.php";

if (!isset($_SESSION['username'])) {
    header('location:../login.php');
}

$admin = $_SESSION["username"];
// cek status ppdb
$get = mysqli_query($koneksi, "SELECT * FROM ganti_status");
$stat = mysqli_fetch_assoc($get);

$all = mysqli_query($koneksi, "SELECT COUNT(*) AS jml FROM form_pendaftaran");
$siswa = mysqli_fetch_assoc($all);

$laki_laki = mysqli_query($koneksi, "SELECT COUNT(*) AS jml FROM form_pendaftaran WHERE jk = 'Laki-laki'");
$laki = mysqli_fetch_assoc($laki_laki);

$perempuan = mysqli_query($koneksi, "SELECT COUNT(*) AS jml FROM form_pendaftaran WHERE jk = 'Perempuan'");
$perem = mysqli_fetch_assoc($perempuan);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard - MI BOJONGSARI</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../assets/gambar/logomi.png" />
    <!-- FontAwesome CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>

    <link rel="stylesheet" href="../assets/css/portal.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="app">
    <?php include "template/header.php" ?>
    <!--//app-header-->

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">Dashboard</h1>
                <div class="app-card  shadow-sm mb-4 border-left-decoration">
                    <div class="inner">
                        <div class="app-card-body p-3 p-lg-4">
                            <h3 class="mb-3">Selamat datang di Dashboard PPDB <?= $admin ?></h3>
                            <div class="row gx-5 gy-3">
                                <div class="col-12 col-lg-9">
                                    <div>
                                        Layanan PPDB Online adalah sebuah sistem layanan yang dirancang untuk melakukan otomasi Pendaftaran Peserta Didik Baru (PPDB), mulai dari proses pendaftaran, yang dilakukan secara online.
                                    </div>
                                </div>
                                <!--//col-->
                            </div>
                        </div>
                        <!--//app-card-body-->
                    </div>
                    <!--//inner-->
                </div>
                <!--//app-card-->

                <!--//row-->
                <div class="row g-4 mb-4">
                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <div class="app-icon-holder">
                                            <span class="nav-icon">
                                                <i class="fa-solid fa-house"></i>
                                            </span>
                                        </div>
                                        <!--//icon-holder-->
                                    </div>
                                    <!--//col-->
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Data Pendaftaran</h4>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <!--//app-card-header-->
                            <div class="app-card-body px-4">
                                <div class="intro">
                                    Jumlah data calon siswa yang sudah mendaftar sebanyak <span class="fw-bold text-success"><?= $siswa["jml"] ?> siswa</span>.
                                </div>
                            </div>
                            <!--//app-card-body-->
                            <div class="app-card-footer p-4 mt-auto">
                                <a class="btn app-btn-secondary" href="data_pendaftaran.php">Lihat Data</a>
                            </div>
                            <!--//app-card-footer-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <div class="app-icon-holder">
                                            <i class="fa-solid fa-mars"></i>
                                        </div>
                                        <!--//icon-holder-->
                                    </div>
                                    <!--//col-->
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Jumlah Laki-laki</h4>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <!--//app-card-header-->
                            <div class="app-card-body px-4">
                                <div class="intro">
                                    Jumlah data siswa yang berjenis kelamin Laki-laki sebanyak <span class="fw-bold text-success"> <?= $laki["jml"] ?> siswa</span>.
                                </div>
                            </div>

                            <!--//app-card-footer-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <div class="app-icon-holder">
                                            <i class="fa-solid fa-venus"></i>
                                        </div>
                                        <!--//icon-holder-->
                                    </div>
                                    <!--//col-->
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Jumlah Perempuan</h4>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <!--//app-card-header-->
                            <div class="app-card-body px-4">
                                <div class="intro">
                                    Jumlah data siswa yang berjenis kelamin Laki-laki sebanyak <span class="fw-bold text-success"> <?= $perem["jml"] ?> siswi</span>.
                                </div>
                            </div>
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                    <div class="col-12 col-lg-4">
                        <div class="app-card app-card-basic d-flex flex-column align-items-start shadow-sm">
                            <div class="app-card-header p-3 border-bottom-0">
                                <div class="row align-items-center gx-3">
                                    <div class="col-auto">
                                        <div class="app-icon-holder">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                        <!--//icon-holder-->
                                    </div>
                                    <!--//col-->
                                    <div class="col-auto">
                                        <h4 class="app-card-title">Akun</h4>
                                    </div>
                                    <!--//col-->
                                </div>
                                <!--//row-->
                            </div>
                            <!--//app-card-header-->
                            <div class="app-card-body px-4">
                                <div class="intro">
                                    Berikut adalah halaman akun untuk melihat data akun dan tambah akun.
                                </div>
                            </div>
                            <!--//app-card-body-->
                            <div class="app-card-footer p-4 mt-auto">
                                <a class="btn app-btn-secondary" href="akun.php">Lihat Akun</a>
                            </div>
                            <!--//app-card-footer-->
                        </div>
                        <!--//app-card-->
                    </div>
                    <!--//col-->
                </div>
                <!--//row-->
            </div>
            <!--//container-fluid-->
        </div>
        <!--//app-content-->

        <?php include "template/footer.php"; ?>
        <!--//app-footer-->
    </div>
    <!--//app-wrapper-->

    <!-- Javascript -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>
</body>

</html>