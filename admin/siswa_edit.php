<?php
session_start();
include "../conn/koneksi.php";

// if (!isset($_SESSION['username'])) {
//     header('location:../login.php');
// }

$admin = $_SESSION["username"];
// cek status ppdb
$get = mysqli_query($koneksi, "SELECT * FROM ganti_status");
$stat = mysqli_fetch_assoc($get);

$id_pend = $_GET["id_pendaftaran"];
$data = mysqli_query($koneksi, "SELECT * FROM form_pendaftaran WHERE id_pendaftaran = '$id_pend'");
$siswa = mysqli_fetch_assoc($data);

if (isset($_POST["edit_data"])) {
    $id_pendaftaran = $_POST['id_pendaftaran'];
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
    $edit = mysqli_query($koneksi, "UPDATE form_pendaftaran SET nama_lengkap = '$nama_lengkap', nik = '$nik', nisn = '$nisn', jk = '$jk', tempat_lahir = '$tempat_lahir', tanggal_lahir = '$tanggal_lahir', agama = '$agama', asal_sekolah = '$asal_sekolah', nama_ayah = '$nama_ayah', nama_ibu = '$nama_ibu', pekerjaan_ayah = '$pekerjaan_ayah', pekerjaan_ibu = '$pekerjaan_ibu', alamat = '$alamat', no_telepon = '$no_telepon' WHERE id_pendaftaran = '$id_pendaftaran'
    ");

    if ($edit) {
        echo "
            <script>
                alert('Data berhasil diubah');
                window.location.href='data_pendaftaran.php';
            </script>
        ";
    }
}
// var_dump($data);
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Siswa - MI BOJONGSARI</title>

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
            <form action="" method="post">
                <div class="container-xl">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-between">
                                <h1 class="app-page-title">Edit Data Siswa</h1>
                                <span>
                                    <a href="data_pendaftaran.php" class="btn app-btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 mb-4">
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                <div class="app-card-body px-4 w-100 pb-4 pt-2">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">ID Pendaftaran</label>
                                            <input type="text" name="id_pendaftaran" class="form-control" value="<?= $siswa["id_pendaftaran"] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">Nama Lengkap</label>
                                            <input type="text" name="nama_lengkap" class="form-control" value="<?= $siswa["nama_lengkap"] ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">NIK</label>
                                            <input type="number" name="nik" class="form-control" value="<?= $siswa["nik"] ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">NISN</label>
                                            <input type="number" name="nisn" class="form-control" value="<?= $siswa["nisn"] ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">Jenis Kelamin</label>
                                            <select name="jk" class="form-select    ">
                                                <option value="<?= $siswa['jk'] ?>"><?= $siswa['jk'] ?></option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 col-md-6 pt-2">
                                            <label for="" class="form-label fw-bold">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $siswa["tempat_lahir"] ?>">
                                        </div>
                                        <div class="col-12 col-md-6 pt-2 ">
                                            <label for="" class="form-label fw-bold">Tanggal Lahir</label>
                                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= $siswa["tanggal_lahir"] ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">Agama</label>
                                            <select name="agama" class="form-select">
                                                <option value="<?= $siswa['agama'] ?>"><?= $siswa['agama'] ?></option>
                                                <option value="Islam">-Pilih Agama-</option>
                                                <option value="Islam">Islam</option>
                                                <option value="kristen">kristen</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Buddha">Buddha</option>
                                                <option value="Konghuchu">Konghuchu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                                <div class="app-card-body px-4 w-100">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">Asal Sekolah</label>
                                            <input type="text" name="asal_sekolah" class="form-control" value="<?= $siswa["asal_sekolah"] ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">Nama Ayah</label>
                                            <input type="text" name="nama_ayah" class="form-control" value="<?= $siswa["nama_ayah"] ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">Nama Ibu</label>
                                            <input type="text" name="nama_ibu" class="form-control" value="<?= $siswa["nama_ibu"] ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">Pekerjaan Ayah</label>
                                            <input type="text" name="pekerjaan_ayah" class="form-control" value="<?= $siswa["pekerjaan_ayah"] ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">Pekerjaan Ibu</label>
                                            <input type="text" name="pekerjaan_ibu" class="form-control" value="<?= $siswa["pekerjaan_ibu"] ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" value="<?= $siswa["alamat"] ?>">
                                        </div>
                                    </div>
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-12 pt-2">
                                            <label for="" class="form-label fw-bold">Nomor Telepon</label>
                                            <input type="text" name="no_telepon" class="form-control" value="<?= $siswa["no_telepon"] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-end">
                        <button type="submit" name="edit_data" class="btn app-btn-primary">Edit Data</button>
                    </div>
                </div>
            </form>
        </div>
        <?php include "template/footer.php"; ?>
    </div>

    <!-- Javascript -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Page Specific JS -->
    <script src="../assets/js/app.js"></script>
</body>

</html>