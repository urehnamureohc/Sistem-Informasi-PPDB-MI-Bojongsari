-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Agu 2023 pada 16.45
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mibojongsari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'dinda', 'dinda@gmail.com', '594280c6ddc94399a392934cac9d80d5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_pendaftaran`
--

CREATE TABLE `form_pendaftaran` (
  `id_pendaftaran` varchar(15) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(50) NOT NULL,
  `asal_sekolah` varchar(20) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(100) NOT NULL,
  `pekerjaan_ibu` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `form_pendaftaran`
--

INSERT INTO `form_pendaftaran` (`id_pendaftaran`, `nama_lengkap`, `nik`, `nisn`, `jk`, `tempat_lahir`, `tanggal_lahir`, `agama`, `asal_sekolah`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `alamat`, `no_telepon`) VALUES
('PPDB0001', 'Yuli Puji', '331309170430001', '9981892895', 'Perempuan', 'Tasikmalaya', '2020-02-05', 'Islam', 'TK Asri', 'Nanang Firmansyah', 'Nunung Amriah', 'Wirausaha', 'Ibu Rumah Tangga', 'Parungponten, Tasikmalaya', '085223424182'),
('PPDB0002', 'Heru Choeruman', '331309170120002', '9981892987', 'Laki-Laki', 'Ciamis', '2023-08-18', 'Islam', 'TK Suka Ceria', 'Dadan Hidayat', 'Asri Sulastri', 'Wirausaha', 'Ibu Rumah Tangga', 'Bojonghuni, Maleber, Ciamis', '085223123756'),
('PPDB0003', 'Livia Nur', '331309170240002', '9981892271', 'Perempuan', 'Tasikmalaya', '2020-07-09', 'Islam', 'TK Idah', 'Abdul Alif', 'Kusmia Jami', 'Wirausaha', 'Ibu Rumah Tangga', 'Tasikmalaya, Jawa Barat', '087747123840'),
('PPDB0004', 'Sandhy Mul', '432006007212', '003124153', 'Laki-laki', 'Tasikmalaya', '2023-08-27', 'Islam', 'TK Asri', 'Dudung', 'Indah', 'Wirausaha', 'Ibu Rumah Tangga', 'Tasikmalaya', '085223124132');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ganti_status`
--

CREATE TABLE `ganti_status` (
  `id` tinyint(4) NOT NULL,
  `status_ppdb` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ganti_status`
--

INSERT INTO `ganti_status` (`id`, `status_ppdb`) VALUES
(0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `form_pendaftaran`
--
ALTER TABLE `form_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indeks untuk tabel `ganti_status`
--
ALTER TABLE `ganti_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
