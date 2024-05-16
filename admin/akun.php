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

$data = mysqli_query($koneksi, "SELECT * FROM admin");

if (isset($_POST["tambah"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $insert = mysqli_query($koneksi, "INSERT INTO admin (id_admin, username, email, password) VALUES ('', '$username', '$email', '$password')");
    if ($insert) {
        echo "
            <script>
                alert('Berhasil Menambahkan Admin!');
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
                            <div class="app-card-body px-4 w-100">
                                <div class="table-responsive">
                                    <table class="table app-table-hover mb-0 text-left">
                                        <thead>
                                            <tr>
                                                <th class="cell">NO</th>
                                                <th class="cell">Username</th>
                                                <th class="cell">Email</th>
                                                <th class="cell">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($data as $key => $item) : ?>
                                                <tr>
                                                    <td class="cell"><?= $key + 1 ?></td>
                                                    <td class="cell">
                                                        <span><?= $item["username"] ?></span>
                                                    </td>
                                                    <td class="cell">
                                                        <span><?= $item["email"] ?></span>
                                                    </td>
                                                    <td class="cell">
                                                        <a class="btn px-2 py-1 app-btn-secondary" href="admin_edit.php?id_admin=<?= $item['id_admin'] ?>"><i class="fa-regular fa-pen-to-square"></i>
                                                        </a>
                                                        <?php
                                                        $level = $item['level'];
                                                        if ($level == 1) :
                                                        ?>
                                                            <a class="btn px-2 py-1 app-btn-secondary" href="#" id="showWarning"><i class="fa-solid fa-trash-can"></i></a>
                                                        <?php else : ?>
                                                            <a class="btn px-2 py-1 app-btn-secondary" href="admin_delete.php?id_admin=<?= $item['id_admin'] ?>" onclick="return confirm('Yakin Hapus Data?')"><i class="fa-solid fa-trash-can"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--//app-card-->
                    </div>

                    <div class="col-12 col-lg-6">
                        <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                            <div class="app-card-body px-4 w-100 pb-4 pt-2">
                                <form action="" method="post">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12 pt-2">
                                                <label for="" class="form-label fw-bold">Username</label>
                                                <input type="text" name="username" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 pt-2">
                                                <label for="" class="form-label fw-bold">Email</label>
                                                <input type="email" name="email" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 pt-2">
                                                <label for="" class="form-label fw-bold">Password</label>
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                        <button type="submit" name="tambah" class="btn btn-green mt-3">Tambah</button>
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
    <script>
        // Ambil elemen link
        var link = document.getElementById('showWarning');

        // Tambahkan event listener untuk link
        link.addEventListener('click', function(event) {
            // Hentikan tindakan default dari link
            event.preventDefault();

            // Tampilkan pesan peringatan
            alert('Data admin tidak bisa dihapus');
        });
    </script>
</body>

</html>