<?php
include "../conn/koneksi.php";

$id_pend = $_GET["id_pendaftaran"];
// var_dump($id_pend);die;
$hapus = mysqli_query($koneksi, "DELETE FROM form_pendaftaran WHERE id_pendaftaran = '$id_pend'");

if ($hapus) {
    echo "
    <script>
        alert('Berhasil Hapus Data!');
        window.location='data_pendaftaran.php';
    </script>
";
}
