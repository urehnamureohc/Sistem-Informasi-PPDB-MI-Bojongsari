<?php
session_start();
include "conn/koneksi.php";

$get = mysqli_query($koneksi, "SELECT * FROM ganti_status");
$stat = mysqli_fetch_assoc($get);
if ($stat["status_ppdb"] == 0) {
    header("Location: index.php");
}

$datapend = mysqli_query($koneksi, "SELECT * FROM form_pendaftaran ORDER BY id_pendaftaran DESC LIMIT 1");
$data = mysqli_fetch_assoc($datapend);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pendaftaran - PPDB MI BOJONGSARI</title>
    <link rel="stylesheet" href="assets/css/portal.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/gambar/logomi.png">
</head>

<body style="margin-top:120px;">
    <?php include "layout/navbar.php" ?>
    <!-- section1 -->
    <section class="my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="m-5">
                    <h4 class="row justify-content-center" id="pend_sukses"> Pendaftaran Telah Berhasil</h4>
                </div>
                <div class="row justify-content-center">
                    <img src="assets/gambar/sukses.svg" id="gambar" class="w-25" alt="logo">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <dl class="row g-2 p-4 mb-4 fs-20 mx-auto shadow rounded-8">
                        <h4 class="fw-bold text-lg-center text-center">BUKTI PENDAFTARAN</h4>
                        <h6 class="text-lg-center text-center">BUKTI PENDAFTARAN PENERIMAAN PESERTA DIDIK BARU (PPDB)</h6>
                        <h6 class="fw-bold text-lg-center text-center">MI BOJONGSARI</h6>
                        <p class="text-lg-center fs-15 text-center">Jl. Bojongsari No.75, Kel. Maleber, Kec. Ciamis, Kab. Ciamis, Jawa Barat</p>
                        <dt class="col-5 fs-14">ID Pendaftaran</dt>
                        <dd class="col-7 fs-14 fw-bold"><?= $data["id_pendaftaran"] ?></dd>

                        <dt class="col-5 fs-14">Nama Lengkap</dt>
                        <dd class="col-7 fs-14"><?= $data["nama_lengkap"] ?></dd>

                        <dt class="col-5 fs-14">NISN</dt>
                        <dd class="col-7 fs-14"><?= $data["nisn"] ?></dd>

                        <dt class="col-5 fs-14">Sekolah Asal</dt>
                        <dd class="col-7 fs-14"><?= $data["asal_sekolah"] ?></dd>

                        <dt class="col-5 fs-14">Jenis Kelamin</dt>
                        <dd class="col-7 fs-14"><?= $data["jk"] ?></dd>

                        <dt class="col-5 fs-14">Tempat / Tgl Lahir</dt>
                        <dd class="col-7 fs-14"><?= $data["tempat_lahir"] ?>, <?= $data["tanggal_lahir"] ?></dd>
                    </dl>
                    <P>
                        <I>Wajib membawa bukti Pendaftaran ini pada saat Daftar Ulang, Dan jangan sampai Lupa.</I>
                    </P>
                    <button type="button" id="cetak" class="btn app-btn-primary fw-bold" onclick="cetak()">CETAK BUKTI PENDAFTARAN</button>
                </div>
            </div>
        </div>
    </section>

    <?php include "layout/footer.php" ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        var text = document.getElementById('text');
        var gambar = document.getElementById('gambar');
        var nav = document.getElementById('nav');
        var footer = document.getElementById('footer');
        var pend_sukses = document.getElementById('pend_sukses');

        function cetak() {
            gambar.style.display = 'none';
            nav.style.display = 'none';
            footer.style.display = 'none';
            pend_sukses.style.display = 'none';
            window.print();
        }
    </script>
</body>

</html