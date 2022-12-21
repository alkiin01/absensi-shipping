-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2022 pada 14.33
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `ID_POSISI` int(11) NOT NULL,
  `tgl_absen` date DEFAULT NULL,
  `jam_absen` time DEFAULT NULL,
  `jam_keluar` time NOT NULL,
  `masuk` int(11) DEFAULT NULL,
  `keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id_absen`, `id_karyawan`, `ID_POSISI`, `tgl_absen`, `jam_absen`, `jam_keluar`, `masuk`, `keluar`) VALUES
(2, 4, 0, '2022-11-12', '12:09:07', '00:00:00', 1, 0),
(3, 3, 0, '2022-11-12', '12:12:37', '00:00:00', 1, 0),
(4, 4, 0, '2022-11-12', '12:16:38', '00:00:00', 1, 0),
(6, 4, 0, '2022-11-12', '16:24:04', '00:00:00', 1, 0),
(7, 3, 0, '2022-11-15', '20:13:17', '00:00:00', 2, 0),
(8, 3, 0, '2022-11-16', '20:35:30', '00:00:00', 1, 0),
(9, 3, 0, '2022-11-16', '20:35:49', '00:00:00', 2, 0),
(10, 3, 0, '2022-11-26', '14:37:40', '00:00:00', 1, 0),
(11, 3, 0, '2022-11-26', '14:37:53', '00:00:00', 2, 0),
(12, 3, 0, '2022-11-30', '19:50:13', '00:00:00', 1, 0),
(13, 3, 0, '2022-11-30', '19:50:22', '00:00:00', 2, 0),
(14, 3, 0, '2022-11-30', '20:37:51', '00:00:00', 1, 0),
(15, 3, 0, '2022-11-30', '20:38:05', '00:00:00', 2, 0),
(20, 19, 4, '2022-12-16', '21:33:54', '00:00:00', 1, 1),
(21, 19, 4, '2022-12-16', '21:33:54', '00:00:00', 1, 1),
(27, 19, 4, '2022-12-17', '12:37:17', '00:00:00', 1, 0),
(28, 9, 3, '2022-12-20', '11:49:20', '12:18:17', 1, 1),
(29, 21, 4, '2022-12-20', '19:16:09', '00:00:00', 1, 0),
(32, 21, 4, '2022-12-21', '13:41:40', '13:41:52', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `ID_ITEM` int(11) NOT NULL,
  `QTY_PENGIRIMAN` int(11) NOT NULL,
  `HARGA_PENGIRIMAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenkel` varchar(100) DEFAULT NULL,
  `tlp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ID_POSISI` int(11) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `jenkel`, `tlp`, `alamat`, `username`, `password`, `ID_POSISI`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(9, 'Admin', 'Laki-Laki', '081111212414', 'Karawang', 'jono', '42867493d4d4874f331d288df0044baa', 3, '2022-12-08', NULL),
(19, 'member', 'Laki-Laki', '081111212414', 'asdasd', 'kurir', 'bb31e9f1f03ad601eb8fb53e4f663039', 4, NULL, NULL),
(21, ' Imang Sulendar', 'Laki-Laki', '081111212414', 'Karawang', 'imang', 'b2ae07de72a8173f842196afccea8bd3', 4, '2022-04-01', NULL),
(22, 'Esot', 'Laki-Laki', '0896123123123', 'Karawang', 'esot', 'a0a1e2bf68440570060bb5036d7a886f', 3, '2022-12-01', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggajian`
--

CREATE TABLE `penggajian` (
  `id_penggajian` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `ID_POSISI` int(11) DEFAULT NULL,
  `jumlah_masuk` int(11) DEFAULT NULL,
  `sallary` int(11) DEFAULT NULL,
  `shipment` int(11) DEFAULT NULL,
  `pickup` int(11) DEFAULT NULL,
  `insentif_shipment` int(11) DEFAULT NULL,
  `insentif_pickup` int(11) DEFAULT NULL,
  `BPJS` int(11) DEFAULT NULL,
  `lembur` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `hold_sallary` int(11) DEFAULT NULL,
  `thp` int(11) DEFAULT NULL,
  `bulan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_posisi` int(11) NOT NULL,
  `shipment` int(11) NOT NULL,
  `pickup` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_pengiriman`, `id_karyawan`, `id_posisi`, `shipment`, `pickup`, `tanggal`) VALUES
(1, 21, 4, 12, 11, '2022-12-06'),
(2, 19, 4, 20, 12, '2022-12-20'),
(3, 21, 4, 12, 10, '2022-12-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`) VALUES
(1, 'admin', 'admin', '338b49f419fd710299c9e32f61bbc927'),
(5, 'joni aja', 'joni', '1281d0ac7a74eb91550ff52a02862cda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi`
--

CREATE TABLE `posisi` (
  `ID_POSISI` int(11) NOT NULL,
  `POSISI` varchar(50) NOT NULL,
  `GAPOK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `posisi`
--

INSERT INTO `posisi` (`ID_POSISI`, `POSISI`, `GAPOK`) VALUES
(2, 'KOORDINATOR', 4500000),
(3, 'Admin', 4200000),
(4, 'SALES COVER', 0),
(5, 'SALES UNCOVER', 0),
(6, 'TRANSPORTER OPPO', 4500000),
(7, 'WAREHOUSE', 3750000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ID_ITEM`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id_penggajian`),
  ADD KEY `id_penggajian` (`id_penggajian`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`ID_POSISI`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `ID_ITEM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id_penggajian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `posisi`
--
ALTER TABLE `posisi`
  MODIFY `ID_POSISI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
