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

$search = $_GET["search"];


$batas = 10;
$halaman = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$sebelumnya = $halaman - 1;
$selanjutnya = $halaman + 1;
$data_pend = mysqli_query($koneksi, "SELECT * FROM form_pendaftaran WHERE id_pendaftaran LIKE '%$search%' OR nama_lengkap LIKE '%$search%'");

$jumlah_data = mysqli_num_rows($data_pend);
$total = ceil($jumlah_data / $batas);
$nomor = $halaman_awal + 1;

$data = mysqli_query($koneksi, "SELECT * FROM form_pendaftaran WHERE id_pendaftaran LIKE '%$search%' OR nama_lengkap LIKE '%$search%' LIMIT $halaman_awal, $batas");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Pendaftaran - MI BOJONGSARI</title>

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
    <?php include "template/header.php"; ?>
    <!--//app-header-->

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">Data Pendaftaran</h1>
                <p>Menampilkan hasil pencarian dari <b><?= $search ?></b>.</p>
                <div class="row mb-4">
                    <!--//col-->
                    <div class="search-mobile-trigger d-sm-none col">
                        <i class="search-mobile-trigger-icon fa-solid fa-magnifying-glass"></i>
                    </div>
                    <!--//col-->
                    <div class="app-search-box col">
                        <form action="search.php" method="get" class="app-search-form">
                            <input type="text" placeholder="Cari Data..." name="search" class="form-control search-input" autocomplete="off" />
                            <button type="submit" class="btn search-btn btn-primary" value="Search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                    <!--//app-search-box-->
                </div>
                <div class="row g-4 mb-4">
                    <div class="tab-content" id="orders-table-tab-content">
                        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                            <div class="app-card app-card-orders-table shadow-sm mb-5">
                                <div class="app-card-body">
                                    <div class="table-responsive">
                                        <table class="table app-table-hover mb-0 text-left">
                                            <thead>
                                                <tr>
                                                    <th class="cell">NO</th>
                                                    <th class="cell">ID PENDAFTARAN</th>
                                                    <th class="cell">NAMA SISWA</th>
                                                    <th class="cell">NIK</th>
                                                    <th class="cell">NISN</th>
                                                    <th class="cell">JENIS KELAMIN</th>
                                                    <th class="cell">ALAMAT</th>
                                                    <th class="cell">AKSI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($data as $item) : ?>
                                                    <tr>
                                                        <td class="cell"><?= $no++ ?></td>
                                                        <td class="cell">
                                                            <span class="truncate"><?= $item["id_pendaftaran"] ?></span>
                                                        </td>
                                                        <td class="cell">
                                                            <span><?= $item["nama_lengkap"] ?></span>
                                                        </td>
                                                        <td class="cell">
                                                            <span><?= $item["nik"] ?></span>
                                                        </td>
                                                        <td class="cell">
                                                            <span><?= $item["nisn"] ?></span>
                                                        </td>
                                                        <td class="cell">
                                                            <span class=""><?= $item["jk"] ?></span>
                                                        </td>
                                                        <td class="cell"><?= $item["alamat"] ?></td>
                                                        <td class="cell">
                                                            <a class="btn px-2 py-1 app-btn-secondary" href="siswa_detail.php?id_pendaftaran=<?= $item['id_pendaftaran'] ?>"><i class="fa-regular fa-eye"></i>
                                                            </a>
                                                            <a class="btn px-2 py-1 app-btn-secondary" href="siswa_edit.php?id_pendaftaran=<?= $item['id_pendaftaran'] ?>"><i class="fa-regular fa-pen-to-square"></i>
                                                            </a>
                                                            <a class="btn px-2 py-1 app-btn-secondary" href="siswa_delete.php?id_pendaftaran=<?= $item['id_pendaftaran'] ?>" onclick="return confirm('Yakin Hapus Data?')"><i class="fa-solid fa-trash-can"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--//table-responsive-->
                                </div>
                                <!--//app-card-body-->
                            </div>
                            <!--//app-card-->
                            <nav class="app-pagination">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item <?php if ($halaman < 1) {
                                                                echo "disabled";
                                                            } ?>">
                                        <a class=" page-link" <?php if ($halaman > 1) {
                                                                    echo "href='?halaman=$sebelumnya'";
                                                                } ?>>Previous</a>
                                    </li>
                                    <?php for ($i = 1; $i <= $total; $i++) : ?>
                                        <li class="page-item <?php if ($halaman == $i) {
                                                                    echo "active";
                                                                } ?>">
                                            <a class="page-link" href="?halaman=<?= $i ?>"><?= $i ?></a>
                                        </li>
                                    <?php endfor ?>
                                    <li class="page-item <?php if ($halaman >= $total) {
                                                                echo "disabled";
                                                            } ?>">
                                        <a class="page-link" <?php if ($halaman < $total) {
                                                                    echo "href='?halaman=$selanjutnya'";
                                                                } ?>>Next</a>
                                    </li>
                                </ul>
                            </nav>
                            <!--//app-pagination-->
                        </div>
                        <!--//tab-pane-->
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

    <!-- Page Specific JS -->
    <script src="assets/js/app.js"></script>
</body>

</html>