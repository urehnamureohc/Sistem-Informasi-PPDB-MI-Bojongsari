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

$id_pend = $_GET["id_pendaftaran"];
$data = mysqli_query($koneksi, "SELECT * FROM form_pendaftaran WHERE id_pendaftaran = '$id_pend'");
$siswa = mysqli_fetch_assoc($data);
// var_dump($data);
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Detail Siswa - MI BOJONGSARI</title>

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers" />
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media" />
    <link rel="shortcut icon" href="../assets/gambar/logomi.png" />

    <!-- FontAwesome CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    <link rel="stylesheet" href="../assets/css/portal.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="app">
    <?php include "template/header.php"; ?>
    <!--//app-header-->

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <h1 class="app-page-title">Detail Siswa</h1>
                            <span>
                                <a href="data_pendaftaran.php" class="btn app-btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row g-4 mb-4">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <!--//app-card-header-->
                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>ID Pendaftaran</strong></div>
                                            <div class="item-data"><?= $siswa["id_pendaftaran"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Nama Lengkap</strong></div>
                                            <div class="item-data"><?= $siswa["nama_lengkap"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <!--//item-->
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Nik</strong></div>
                                            <div class="item-data"><?= $siswa["nik"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Nisn</strong></div>
                                            <div class="item-data"><?= $siswa["nisn"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Jenis Kelamin</strong></div>
                                            <div class="item-data"><?= $siswa["jk"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Tempat / Tanggal Lahir</strong></div>
                                            <?php
                                            $date = $siswa["tanggal_lahir"];
                                            $newDate = date("d-m-Y", strtotime($date));
                                            ?>
                                            <div class="item-data"><?= $siswa["tempat_lahir"] ?>, <?= $newDate ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Agama</strong></div>
                                            <div class="item-data"><?= $siswa["agama"] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <div class="app-card-body px-4 w-100">
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Asal Sekolah</strong></div>
                                            <div class="item-data"><?= $siswa["asal_sekolah"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Nama Ayah</strong></div>
                                            <div class="item-data"><?= $siswa["nama_ayah"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Nama Ibu</strong></div>
                                            <div class="item-data"><?= $siswa["nama_ibu"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <!--//item-->
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Pekerjaan Ayah</strong></div>
                                            <div class="item-data"><?= $siswa["pekerjaan_ayah"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Pekerjaan Ibu</strong></div>
                                            <div class="item-data"><?= $siswa["pekerjaan_ibu"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Alamat</strong></div>
                                            <div class="item-data"><?= $siswa["alamat"] ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong>Nomor Telepon</strong></div>
                                            <div class="item-data"><?= $siswa["no_telepon"] ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <script src="assets/plugins/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Charts JS -->
    <script src="assets/plugins/chart.js/chart.min.js"></script>
    <script src="assets/js/index-charts.js"></script>

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>
</body>

</html>