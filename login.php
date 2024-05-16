<?php
session_start();
include "conn/koneksi.php";

if (!empty($_SESSION["username"]) || !empty($_SESSION["email"])) {
    header('Location: index.php');
    exit();
}

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE email = '$email' AND password = '$password'");
    $data = mysqli_fetch_assoc($query);
    if (empty($data["email"])) {
        echo "
        <script>
            alert('Login Gagal!');
        </script>
        ";
    } else {
        $_SESSION['username'] = $data['username'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['password'] = $data['password'];

        echo "
            <script>
                alert('Login Berhasil!');
                window.location='admin/index.php';
            </script>
        ";
    }
    // die;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login - MI BOJONGSARI</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Login - MI BOJONGSARI">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="shortcut icon" href="favicon.ico">

    <!-- <link rel="stylesheet" href="assets/css/bootstrap.css"> -->
    <link rel="stylesheet" href="assets/css/portal.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/gambar/logomi.png">
</head>

<body class="app app-login p-0">
    <div class="row g-0 app-auth-wrapper">
        <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
            <div class="d-flex flex-column align-content-end">
                <div class="app-auth-body mx-auto">
                    <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/gambar/logomi.png" alt="logo"></a></div>
                    <h2 class="auth-heading text-center mb-5">LOGIN ADMIN</h2>
                    <div class="auth-form-container text-start">
                        <form method="post" class="auth-form login-form">
                            <div class="email mb-3">
                                <label class="sr-only mb-2" for="email">Email</label>
                                <input id="email" name="email" type="email" class="form-control email" placeholder="Email address" required="required">
                            </div><!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only mb-2" for="password">Password</label>
                                <input id="password" name="password" type="password" class="form-control password" placeholder="Password" required="required">
                            </div><!--//form-group-->
                            <div class="text-center">
                                <button type="submit" name="login" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
                            </div>
                        </form>
                        <a class="btn  w-100 theme-btn mt-2" href="index.php">Kembali Ke Home </a>
                    </div><!--//auth-form-container-->

                </div><!--//auth-body-->

                <footer class="app-auth-footer">
                    <div class="container text-center py-3">
                        <small>©2023. MI BOJONGSARI, All rights reserved.</small>
                    </div>
                </footer><!--//app-auth-footer-->
            </div><!--//flex-column-->
        </div><!--//auth-main-col-->
        <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
            <div class="auth-background-holder">
            </div>
            <div class="auth-background-mask"></div>
            <div class="auth-background-overlay p-3 p-lg-5">
                <div class="d-flex flex-column align-content-end h-100">
                    <!-- <div class="h-100" class="background-image: url('assets/gambar/fotosekolahmi.jpg')"> -->
                    <!-- <div class="h-100" class="background-image: url('assets/gambar/fotosekolahmi.jpg')"> -->
                    <img style="object-fit:cover" src="assets/gambar/fotosekolahmi.jpg" class="w-100" alt="">
                    <!-- </div> -->
                </div>
            </div><!--//auth-background-overlay-->
        </div><!--//auth-background-col-->
    </div><!--//row-->

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>