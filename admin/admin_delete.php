<?php
include "../conn/koneksi.php";

$id_admin = $_GET["id_admin"];
$hapus = mysqli_query($koneksi, "DELETE FROM admin WHERE id_admin = '$id_admin'");

if ($hapus) {
    echo "
    <script>
        alert('Berhasil Hapus Data!');
        window.location='akun.php';
    </script>
";
}
