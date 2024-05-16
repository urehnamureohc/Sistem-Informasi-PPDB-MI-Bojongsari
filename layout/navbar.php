<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top" id="nav">
    <div class="container py-1">
        <a class="navbar-brand" href="#">
            <img src="assets/gambar/logomi.png" width="50" alt="">
            <span class="fw-bold"> MI BOJONGSARI</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto fw-500">
                <?php if (empty($_SESSION["username"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#alur">Alur Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#jadwal">Jadwal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn app-btn-primary text-white rounded-3 fw-600" href="login.php">Login</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link btn app-btn-primary" href="admin/index.php">Dashboard</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>