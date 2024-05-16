<header class="app-header fixed-top">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between mt-2">
                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                                <title>Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div>
                    <div class="app-search-box col">
                        <p>Selamat Datang, <span class="text-capitalize"><?= $admin ?></span></p>
                    </div>
                    <div class="app-utilities col-auto">
                        <div class="app-utility-item app-user-dropdown dropdown">
                            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <span class="text-capitalize"><?= $admin ?></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                <li>
                                    <a class="dropdown-item" href="../logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Log Out</a>
                                </li>
                            </ul>
                        </div>
                        <!--//app-user-dropdown-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="app-sidepanel" class="app-sidepanel">
        <div id="sidepanel-drop" class="sidepanel-drop"></div>
        <div class="sidepanel-inner d-flex flex-column">
            <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
            <div class="app-branding">
                <a class="app-logo" href="index.html">
                    <img class="logo-icon me-2" src="../assets/gambar/logomi.png" alt="logo" />
                    <span class="logo-text">MI BOJONGSARI</span></a>
            </div>
            <!--//app-branding-->

            <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') {
                                                echo "active";
                                            }  ?>" href="index.php">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                    <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Dashboard</span> </a><!--//nav-link-->
                    </li>
                    <!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'data_pendaftaran.php') {
                                                echo "active";
                                            }  ?>" href="data_pendaftaran.php">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z" />
                                    <path fill-rule="evenodd" d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Data Pendaftaran</span> </a><!--//nav-link-->
                    </li>
                    <!--//nav-item-->
                    <li class="nav-item">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'akun.php') {
                                                echo "active";
                                            }  ?>" href="akun.php">
                            <span class="nav-icon">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v10.755S4 11 8 11s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z" />
                                    <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                            </span>
                            <span class="nav-link-text">Akun</span> </a><!--//nav-link-->
                    </li>

                    <?php if (isset($_POST["buka_ppdb"])) {
                        $stat = $_POST["buka"];
                        $ubah = mysqli_query($koneksi, "UPDATE ganti_status SET status_ppdb = '$stat'");
                        if ($ubah) {
                            echo "
                                <script>
                                    alert('PPDB Berhasil Dibuka!');
                                </script>
                            ";
                        }
                    } ?>
                    <?php if (isset($_POST["tutup_ppdb"])) {
                        $stat = $_POST["tutup"];
                        $ubah = mysqli_query($koneksi, "UPDATE ganti_status SET status_ppdb = '$stat'");
                        if ($ubah) {
                            echo "
                                <script>
                                    alert('PPDB Berhasil Ditutup!');
                                </script>
                            ";
                        }
                    } ?>

                    <li class="nav-item text-center mt-2">
                        <?php $get = mysqli_query($koneksi, "SELECT * FROM ganti_status");
                        $stat = mysqli_fetch_assoc($get); ?>
                        <?php if ($stat['status_ppdb'] == 0) : ?>
                            <form action="" method="post">
                                <input type="hidden" name="buka" value="1">
                                <button type="submit" name="buka_ppdb" class="btn app-btn-primary shadow" onclick="return confirm('Yakin Buka PPDB?')">Buka Pendaftaran</button>
                            </form>
                        <?php else : ?>
                            <form action="" method="post">
                                <input type="hidden" name="tutup" value="0">
                                <button type="submit" name="tutup_ppdb" class="btn app-btn-secondary shadow" onclick="return confirm('Yakin Tutup PPDB?')">Tutup Pendaftaran</button>
                            </form>
                        <?php endif ?>
                    </li>
                </ul>
                <!--//app-menu-->
            </nav>
        </div>
        <!--//sidepanel-inner-->
    </div>
    <!--//app-sidepanel-->
</header>