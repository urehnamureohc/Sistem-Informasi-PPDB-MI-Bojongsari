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

$id_admin = $_GET["id_admin"];
$data = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_admin = '$id_admin'");
$item = mysqli_fetch_assoc($data);

if (isset($_POST["edit"])) {
    $id_admin = $_POST["id_admin"];

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_baru = $_POST["password_baru"];

    if ($password_baru == '') {
        $passwd = $password;
    } else {
        $passwd = md5($password_baru);
    }

    $edit = mysqli_query($koneksi, "UPDATE admin SET username = '$username', email = '$email', password = '$passwd' WHERE id_admin = '$id_admin'");
    if ($edit) {
        echo "
            <script>
                alert('Berhasil Mengubah Admin!');
                window.location='akun.php';
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
                            <h1 class="app-page-title">Admin</h1>
                            <span>
                                <a href="index.php" class="btn app-btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row g-4 mb-4">
                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <div class="app-card-body px-4 w-100 pb-4 pt-2">
                                <form action="" method="post">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 pt-2">
                                                <label for="" class="form-label fw-bold">Username</label>
                                                <input type="hidden" name="id_admin" value="<?= $item['id_admin'] ?>">
                                                <input type="text" name="username" class="form-control" value="<?= $item['username'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 pt-2">
                                                <label for="" class="form-label fw-bold">Email</label>
                                                <input type="email" name="email" class="form-control" value="<?= $item['email'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 pt-2">
                                                <label for="" class="form-label fw-bold">Password</label>
                                                <input type="password" name="password" class="form-control" readonly value="<?= $item['password'] ?>">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 pt-2">
                                                <label for="" class="form-label fw-bold">Password Baru</label>
                                                <input type="password" name="password_baru" class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" name="edit" class="btn btn-green mt-3">Edit</button>
                                    </div>
                                </form>
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
</body>

</html>