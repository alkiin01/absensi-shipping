-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2022 pada 11.05
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

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
