<?php
include "../conn/koneksi.php";

// Query untuk mengambil data dari database
$sql = "SELECT * FROM form_pendaftaran";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    // Menentukan nama file CSV
    $filename = "data_pendaftaran.csv";

    // Mengatur header untuk menghasilkan file CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '"');

    // Membuka output untuk penulisan data
    $output = fopen('php://output', 'w');

    // Menulis baris header
    fputcsv($output, array('No', 'Nama Lengkap', 'NIK', 'NISN', 'Jenis Kelamin', 'Tempat Lahir', 'Tanggal Lahir', 'Agama', 'Asal Sekolah', 'Nama Ayah', 'Nama Ibu', 'Pekerjaan Ayah', 'Pekerjaan Ibu', 'Alamat', 'Telepon',));

    // Menulis data dari database
    while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }

    // Menutup output
    fclose($output);
} else {
    echo "Tidak ada data yang ditemukan.";
}

$koneksi->close();
