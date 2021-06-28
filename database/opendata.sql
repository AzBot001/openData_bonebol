-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2021 pada 15.50
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opendata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `pass`, `username`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dataset`
--

CREATE TABLE `dataset` (
  `id_dataset` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `cakupan` varchar(15) NOT NULL,
  `frekuensi` varchar(51) NOT NULL,
  `tgl_input` date NOT NULL,
  `tgl_update` date DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `infografik`
--

CREATE TABLE `infografik` (
  `id_infografik` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `file` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_data`
--

CREATE TABLE `kategori_data` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_data`
--

INSERT INTO `kategori_data` (`id_kategori`, `nama_kategori`, `gambar`) VALUES
(4, 'Ekonomi', '1622968553.894160bc88e9da47a.svg'),
(5, 'Infrastruktur', '1622968566.777760bc88f6bde15.svg'),
(6, 'Kemiskinan', '1622968579.615660bc8903964db.svg'),
(7, 'Kependudukan', '1622968594.248260bc89123c96e.svg'),
(8, 'Kesehatan', '1622968605.400760bc891d61d19.svg'),
(9, 'Lingkungan Hidup', '1622968616.448860bc89286d90b.svg'),
(10, 'Pariwisata dan Kebudayaan', '1622968629.74560bc8935b5e0b.svg'),
(11, 'Pemerintahan dan Desa', '1622968640.375460bc89405ba88.svg'),
(12, 'Pendidikan', '1622968659.506360bc89537b9a6.svg'),
(13, 'Sosial', '1622968672.311460bc89604c088.svg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `organisasi`
--

CREATE TABLE `organisasi` (
  `id_organisasi` int(11) NOT NULL,
  `nama_organisasi` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `pass` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `organisasi`
--

INSERT INTO `organisasi` (`id_organisasi`, `nama_organisasi`, `no_telp`, `alamat`, `website`, `email`, `deskripsi`, `gambar`, `pass`) VALUES
(2, 'Dinas Komunikasi dan Informatika Kab. Bone Bolango', '085255800646', 'Ulanta, Suwawa, Kabupaten Bone Bolango, Gorontalo ', 'http://kominfo.bonebolangokab.go.id/', 'diskominfo@bonebolangokab.go.id', 'Dinas Komunikasi dan Informatika merupakan unsur pelaksana urusan pemerintahan bidang komunikasi dan informatika, urusan pemerintahan bidang persandian, dan urusan pemerintahan bidang statistik yang dipimpin oleh Kepala Dinas yang berkedudukan di bawah dan bertanggung jawab kepada Bupati melalui Sekretaris Daerah.', '1623001604.259760bd0a043f652.jpg', '$2y$10$m3orXG4g.yDQyWsvS/rChONZLH22L0ipXXd2cJ4LzX.G57VG/u4f2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `request_data`
--

CREATE TABLE `request_data` (
  `id_request` int(11) NOT NULL,
  `id_organisasi` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `token`
--

CREATE TABLE `token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `token` varchar(80) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `token`
--

INSERT INTO `token` (`id_token`, `email`, `token`, `time`) VALUES
(1, 'diskominfo@bonebolangokab', 'J02dLj2HeZ', '2021-06-07 11:14:59'),
(2, 'diskominfo@bonebolangokab', 'a8IM4348zM', '2021-06-07 11:28:32'),
(3, 'diskominfo@bonebolangokab', 'zdLw1dIocq', '2021-06-07 11:29:42'),
(4, 'admin', 'mvlGJB5Cjv', '2021-06-12 12:23:39'),
(5, 'diskominfo@bonebolangokab', 'p2r5YWLJCb', '2021-06-07 13:10:39'),
(6, 'diskominfo@bonebolangokab', '3CWA5ujvVj', '2021-06-07 13:10:51'),
(7, 'diskominfo@bonebolangokab', 'P5o7Uja6fd', '2021-06-07 13:11:05'),
(8, 'diskominfo@bonebolangokab', 'uqAa5gPMM5', '2021-06-07 13:12:38'),
(9, 'diskominfo@bonebolangokab', 'csVeSqxVNm', '2021-06-07 13:14:21'),
(10, 'diskominfo@bonebolangokab', '6ZNykJQu3k', '2021-06-07 13:14:30'),
(11, 'diskominfo@bonebolangokab', 'dVEjPNJxmg', '2021-06-07 13:19:32'),
(12, 'diskominfo@bonebolangokab', 'cx6WOc4Ngt', '2021-06-07 13:21:57'),
(13, 'diskominfo@bonebolangokab', 'MxJEfXH8Pa', '2021-06-07 16:30:29'),
(14, 'diskominfo@bonebolangokab', '8CHYelC8pM', '2021-06-07 20:30:44'),
(15, 'diskominfo@bonebolangokab', 'Z0MkOlflmg', '2021-06-07 20:30:54'),
(16, 'diskominfo@bonebolangokab', 'sMnqbP4kNK', '2021-06-07 23:21:21'),
(17, 'diskominfo@bonebolangokab', '7t9ZBrILnm', '2021-06-07 23:30:27'),
(18, 'diskominfo@bonebolangokab', 'NURvWrh1VG', '2021-06-07 23:40:35'),
(19, 'diskominfo@bonebolangokab', 'NHfHHfKk5E', '2021-06-08 02:55:32'),
(20, 'diskominfo@bonebolangokab', 'Q9rd4zdjXe', '2021-06-11 19:03:29'),
(21, 'diskominfo@bonebolangokab', 'OhXGwZN7qX', '2021-06-11 19:03:48'),
(22, 'diskominfo@bonebolangokab', 'leLzlguAQ0', '2021-06-12 06:32:35'),
(23, 'diskominfo@bonebolangokab', 'ZVMkzai6qJ', '2021-06-12 08:12:57'),
(24, 'diskominfo@bonebolangokab', 'wUiQBSlynw', '2021-06-12 13:46:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indeks untuk tabel `infografik`
--
ALTER TABLE `infografik`
  ADD PRIMARY KEY (`id_infografik`);

--
-- Indeks untuk tabel `kategori_data`
--
ALTER TABLE `kategori_data`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id_organisasi`);

--
-- Indeks untuk tabel `request_data`
--
ALTER TABLE `request_data`
  ADD PRIMARY KEY (`id_request`);

--
-- Indeks untuk tabel `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `infografik`
--
ALTER TABLE `infografik`
  MODIFY `id_infografik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori_data`
--
ALTER TABLE `kategori_data`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id_organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `request_data`
--
ALTER TABLE `request_data`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `token`
--
ALTER TABLE `token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
