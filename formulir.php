<?php
session_start();
include "conn/koneksi.php";

$get = mysqli_query($koneksi, "SELECT * FROM ganti_status");
$stat = mysqli_fetch_assoc($get);
if ($stat["status_ppdb"] == 0) {
    header("Location: index.php");
}

$id_pendaftaran = mysqli_query($koneksi, "SELECT max(id_pendaftaran) AS idLast FROM form_pendaftaran");
$id_pend = mysqli_fetch_array($id_pendaftaran);
$id_pend = $id_pend["idLast"];

$urutan = (int) substr($id_pend, 4, 4);
$urutan++;

$huruf = "PPDB";
$id_pend = $huruf . sprintf("%04s", $urutan);

// var_dump($id_pend);
// die;

if (isset($_POST["daftar"])) {
    $id_pend = $_POST['id_pend'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $nisn = $_POST['nisn'];
    $jk = $_POST['jk'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $agama = $_POST['agama'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $nama_ayah = $_POST['nama_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];

    // var_dump($_POST);
    // die;
    $insert = mysqli_query($koneksi, "INSERT INTO form_pendaftaran (id_pendaftaran, nama_lengkap, nik, nisn, jk, tempat_lahir, tanggal_lahir, agama, asal_sekolah, nama_ayah, nama_ibu, pekerjaan_ayah, pekerjaan_ibu, alamat, no_telepon)
    VALUES ('$id_pend', '$nama_lengkap', '$nik', '$nisn', '$jk', '$tempat_lahir', '$tanggal_lahir', '$agama', '$asal_sekolah', '$nama_ayah', '$nama_ibu', '$pekerjaan_ayah', '$pekerjaan_ibu', '$alamat', '$no_telepon')
    ");

    if ($insert) {
        echo "
            <script>
                alert('Data berhasil ditambahkan');
                window.location.href='bukti_pendaftaran.php';
            </script>
        ";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir - PPDB MI BOJONGSARI</title>
    <link rel="stylesheet" href="assets/css/portal.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/gambar/LogoMI.jpg">
    <link rel="shortcut icon" href="assets/gambar/logomi.png" />
</head>

<body style="margin-top:120px;">
    <?php include "layout/navbar.php" ?>
    <!-- section1 -->
    <section class="my-5">
        <div class="container">
            <div class="text-center mb-5">
                <h4>
                    <b>Formulir Pendaftaran Siswa Baru</b>
                </h4>
                <p>Lengkapi Formulir Pendaftaran ini dengan Benar.</p>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row px-2 px-lg-0">
                    <div class="col-lg-6">
                        <h4 class="mb-3">Data Diri Siswa</h4>
                        <div class="card p-4 shadow-sm rounded-8 ">
                            <input type="hidden" name="id_pend" value="<?= $id_pend ?>">
                            <div class="mb-2">
                                <label for="" class="form-label">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required placeholder="Nama Lengkap" onkeypress="return cekHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">NIK</label>
                                <input type="number" id="nik" name="nik" class="form-control" required placeholder="NIK">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">NISN</label>
                                <input type="number" id="nisn" name="nisn" class="form-control" required placeholder="NISN">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Jenis Kelamin</label>
                                <select name="jk" class="form-select">
                                    <option value="Laki-Laki">-Pilih Jenis Kelamin-</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Tempat Lahir</label>
                                <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control" required placeholder="Tempat Lahir" onkeypress="return cekHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Tanggal Lahir</label>
                                <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required placeholder="">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Agama</label>
                                <select id="agama" name="agama" class="form-select">
                                    <option value="Islam">-Pilih Agama-</option>
                                    <option value="Islam">Islam</option>
                                    <option value="kristen">kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghuchu">Konghuchu</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Asal Sekolah</label>
                                <input type="text" id="sekolah_asal" name="asal_sekolah" class="form-control" required placeholder="Asal Sekolah" onkeypress="return cekHuruf(event)">
                            </div>
                        </div>
                    </div>

                    <!-- Data Orang Tua -->
                    <div class="col-lg-6 mt-3 mt-lg-0">
                        <h4 class="mb-3">Data Diri Orang Tua / Wali Siswa</h4>
                        <div class="card p-4 shadow-sm rounded-16">
                            <div class="mb-2">
                                <label for="" class="form-label">Nama Ayah</label>
                                <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" required placeholder="Nama Ayah" onkeypress="return cekHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Nama Ibu</label>
                                <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" required placeholder="Nama Ibu" onkeypress="return cekHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Pekerjaan Ayah</label>
                                <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" class="form-control" required placeholder="Pekerjaan Ayah" onkeypress="return cekHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Pekerjaan Ibu</label>
                                <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" class="form-control" required placeholder="Pekerjaan Ibu" onkeypress="return cekHuruf(event)">
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Alamat</label>
                                <textarea id="alamat" name="alamat" class="form-control" cols="30" rows="5" required placeholder="Alamat Lengkap"></textarea>
                            </div>
                            <div class="mb-2">
                                <label for="" class="form-label">Nomor Telepon</label>
                                <input type="number" id="no_telepon" name="no_telepon" class="form-control" required placeholder="081234********" onkeypress="return hanyaAngka(event)" onkeypress="if(this.value.length===13) return false">
                            </div>
                            <P>
                                <I>Tolong di lihat dan Cek kembali Formulir Data yang sudah di isi, jangan lupa di isi semua. Terimakasih.</I>
                            </P>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-9 col-lg-6">
                            <div class="card rounded-8 shadow-1">
                                <div class="card-body p-md-4">
                                    <h5>Persyaratan Daftar Ulang</h5>
                                    <ul>
                                        <li>Photo Copy Akte Kelahiran</li>
                                        <li>Photo Copy Kartu Keluarga</li>
                                        <li>Photo Copy Kartu PKH/KPS bagi yang punya</li>
                                        <li>Bukti Pendaftaran</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 text-md-end">
                        <!-- Button trigger modal -->
                        <a href="index.php" class="btn btn-secondary fw-bold p-3 me-1">Batal</a>
                        <button class="btn app-btn-primary fw-bold shadow p-3 me-2" type="submit" name="daftar" id="daftar">Daftar Sekarang</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php include "layout/footer.php" ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script>
        function cekHuruf(evt) {
            var charcode = (evt.which) ? evt.which : event.keycode
            if ((charcode < 65 || charcode > 90) && (charcode < 97 || charcode > 122) && charcode > 32)
                return false;
            return true;
        }

        function hanyaAngka(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
</body>

</html