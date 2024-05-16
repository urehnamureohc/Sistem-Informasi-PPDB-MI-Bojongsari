<?php
include "conn/koneksi.php";
session_start();
$get = mysqli_query($koneksi, "SELECT * FROM ganti_status");
$stat = mysqli_fetch_assoc($get);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PPDB MI BOJONGSARI</title>
  <link rel="stylesheet" href="assets/css/portal.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="icon" href="assets/gambar/logomi.png">
</head>

<body style="margin-top:120px;">

  <?php include "layout/navbar.php" ?>


  <!-- section1 -->
  <section class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h4 class="display-6 fw-bold">PPDB MI BOJONGSARI</h4>
          <h5 class="fs-3">Terangkai Bersama Menuju Sukses</h5>
          <p class="mb-3">Pendaftaran tahun ajaran 2024/2025 dilakukan secara online melalui website ini, untuk tata cara penggunaan bisa dilihat ke bawah.</p>

          <?php if ($stat['status_ppdb'] == 1) : ?>
            <a href="formulir.php" class="btn app-btn-primary fw-bold">Daftar Sekarang</a>
          <?php else : ?>
            <span class="btn btn-danger text-white"><i class="fa-solid fa-circle-exclamation"></i> PPDB SUDAH DI TUTUP!</span>
          <?php endif ?>

        </div>
        <div class="col-lg-6 text-end">
          <img src="assets/gambar/fotosekolahmi.jpg" class="w-75 rounded-3" alt="">
        </div>
      </div>
    </div>
  </section>

  <!-- alur pendaftaran -->
  <section id="alur" class="mt-5">
    <div class="container py-5">
      <div class="row ">
        <div class="col-12">
          <h5 class="display-6 fw-bold">Alur Pendaftaran</h5>
          <p>Ikuti Langkah-langkah dibawah ini supaya proses pendaftaran berjalan lancar tanpa kendala apapun.</p>
        </div>
      </div>
      <div class="row gy-3">
        <div class="col-lg-3">
          <div class="card rounded-3 shadow text-center h-100">
            <div class="card-body">
              <h3 class="fs-24">1. Data Diri</h3>
              <p class="fs-14">Klik <b>“Daftar Sekarang”</b>, Untuk masuk ke halaman Formulir Pendaftan dan Isi Data Diri Anda</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card rounded-8 shadow text-center h-100">
            <div class="card-body">
              <h3 class="fs-24">2. Isi Data Diri</h3>
              <p class="fs-14">Isi Data diri anda sesuai dengan apa yang harus diisi</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card rounded-8 shadow text-center h-100">
            <div class="card-body">
              <h3 class="fs-24">3. Daftar Sekarang</h3>
              <p class="fs-14">Jika data diri sudah di isi maka lakukan Klik tombol <b>“Daftar Sekarang”</b></p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card rounded-8 shadow text-center h-100">
            <div class="card-body">
              <h3 class="fs-24">4. Bukti Pendaftan</h3>
              <p class="fs-14">Jika sudah mengisi formulir dan menekan tombol "Daftar" maka akan ada bukti pendaftaran, maka bukti pendaftaran anda sudah selesai.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card rounded-8 shadow text-center h-100">
            <div class="card-body">
              <h3 class="fs-24">5. Lakukan Pemetaan</h3>
              <p class="fs-14">Pemetaan dilakukan secara offline di MI Bojongsari. jadwal bisa dilihat dibawah ini</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="card rounded-8 shadow text-center h-100">
            <div class="card-body">
              <h3 class="fs-24">6. Daftar Ulang</h3>
              <p class="fs-14">Saat Dafta Ulang maka hendak membawa persyaratan-persyaratan yang tertera pada halaman Formulir Pendaftaran dan membawa bukti pendaftaran</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Jadwal Pendaftaran -->
  <section id="jadwal" class="mt-5">
    <div class="container py-5">
      <div class="row">
        <div class="col-12">
          <h4 class="display-6 fw-bold">Jadwal Pendaftaran</h4>
          <p>Berikut rincian jadwal PPDB tahun 2024/2025</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5">
          <div class="d-flex flex-column">
            <div class="my-1">
              <h5>Pendaftaran</h5>
              <p>25 Januari – 10 Februari 2024</p>
            </div>
            <div class="my-1">
              <h5>Pemetaan</h5>
              <p>20 – 23 Februari 2024</p>
            </div>
            <div class="my-1">
              <h5>Daftar Ulang</h5>
              <p>6 – 8 Maret 2024</p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 text-end">
          <img src="assets/gambar/foto1.jpg" class="w-50" style="border-radius:100px;" alt="">
        </div>
      </div>
    </div>
  </section>

  <?php include "layout/footer.php" ?>

  <?php if ($stat['status_ppdb'] == 0) : ?>
    <div class="modal fade" tabindex="-1" id="myModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Pendaftan Telah Ditutup!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="text-center">
              <img src="assets/gambar/warning.svg" width="120" class="mb-2">
              <p>PPDB INI SUDAH DI TUTUP. SILAHKAN DAFTAR KEMBALI SESUAI PENDAFTARAN TAHUN SELANJUTNYA</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" id="closeBtn" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const myModal = new bootstrap.Modal(document.getElementById("myModal"));
      myModal.show();
    });
  </script>
</body>

</html