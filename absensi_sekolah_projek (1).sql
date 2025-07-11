-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2025 pada 17.14
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi_sekolah_projek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `id_siswa` int(11) NOT NULL,
  `status` enum('hadir','tidak hadir') NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `tanggal`, `id_siswa`, `status`, `keterangan`, `id_guru`) VALUES
(41, '2025-06-21 02:41:57', 63, 'tidak hadir', 'sakit', 61),
(42, '2025-06-21 02:41:57', 64, 'hadir', '', 61),
(43, '2025-06-21 02:41:57', 65, 'hadir', '', 61),
(44, '2025-06-21 02:41:57', 66, 'hadir', '', 61),
(45, '2025-06-21 02:41:57', 67, 'hadir', '', 61),
(46, '2025-06-21 02:41:57', 68, 'hadir', '', 61),
(47, '2025-06-21 02:41:57', 69, 'hadir', '', 61),
(48, '2025-06-21 02:41:57', 70, 'hadir', '', 61),
(49, '2025-06-21 02:41:57', 71, 'hadir', '', 61),
(50, '2025-06-21 02:41:57', 72, 'hadir', '', 61),
(51, '2025-06-21 02:50:46', 73, 'hadir', '', 61),
(52, '2025-06-21 02:50:46', 74, 'hadir', '', 61),
(53, '2025-06-21 02:50:47', 75, 'tidak hadir', 'sakit', 61),
(54, '2025-06-21 02:50:47', 76, 'hadir', '', 61),
(55, '2025-06-21 02:50:47', 77, 'hadir', '', 61),
(56, '2025-06-21 02:50:47', 78, 'hadir', '', 61),
(57, '2025-06-21 02:50:47', 79, 'hadir', '', 61),
(58, '2025-06-21 02:50:47', 80, 'hadir', '', 61),
(59, '2025-06-21 02:50:47', 81, 'hadir', '', 61),
(60, '2025-06-21 02:50:47', 82, 'hadir', '', 61),
(61, '2025-06-21 02:56:29', 83, 'hadir', '', 61),
(62, '2025-06-21 02:56:29', 84, 'hadir', '', 61),
(63, '2025-06-21 02:56:29', 85, 'hadir', '', 61),
(64, '2025-06-21 02:56:29', 86, 'hadir', '', 61),
(65, '2025-06-21 02:56:29', 87, 'hadir', '', 61),
(66, '2025-06-21 02:56:29', 88, 'hadir', '', 61),
(67, '2025-06-21 02:56:29', 89, 'hadir', '', 61),
(68, '2025-06-21 02:56:29', 90, 'hadir', '', 61),
(69, '2025-06-21 02:56:29', 91, 'hadir', '', 61),
(70, '2025-06-21 02:56:29', 92, 'hadir', '', 61),
(71, '2025-06-21 03:05:12', 103, 'hadir', '', 61),
(72, '2025-06-21 03:05:12', 104, 'hadir', '', 61),
(73, '2025-06-21 03:05:12', 105, 'hadir', '', 61),
(74, '2025-06-21 03:05:12', 106, 'hadir', '', 61),
(75, '2025-06-21 03:05:12', 107, 'hadir', '', 61),
(76, '2025-06-21 03:05:12', 108, 'hadir', '', 61),
(77, '2025-06-21 03:05:12', 109, 'hadir', '', 61),
(78, '2025-06-21 03:05:12', 110, 'hadir', '', 61),
(79, '2025-06-21 03:05:12', 111, 'hadir', '', 61),
(80, '2025-06-21 03:05:12', 112, 'hadir', '', 61),
(81, '2025-06-21 14:13:21', 93, 'hadir', '', 123),
(82, '2025-06-21 14:13:21', 94, 'tidak hadir', '', 123),
(83, '2025-06-21 14:13:21', 95, 'hadir', '', 123),
(84, '2025-06-21 14:13:21', 96, 'hadir', '', 123),
(85, '2025-06-21 14:13:21', 97, 'tidak hadir', '', 123),
(86, '2025-06-21 14:13:21', 98, 'hadir', '', 123),
(87, '2025-06-21 14:13:21', 99, 'hadir', '', 123),
(88, '2025-06-21 14:13:21', 100, 'tidak hadir', '', 123),
(89, '2025-06-21 14:13:21', 101, 'hadir', '', 123),
(90, '2025-06-21 14:13:21', 102, 'tidak hadir', '', 123),
(91, '2025-06-22 09:15:46', 63, 'hadir', '', 123),
(92, '2025-06-22 09:15:46', 64, 'tidak hadir', '', 123),
(93, '2025-06-22 09:15:46', 65, 'hadir', '', 123),
(94, '2025-06-22 09:15:46', 66, 'hadir', '', 123),
(95, '2025-06-22 09:15:46', 67, 'tidak hadir', '', 123),
(96, '2025-06-22 09:15:46', 68, 'hadir', '', 123),
(97, '2025-06-22 09:15:46', 69, 'tidak hadir', '', 123),
(98, '2025-06-22 09:15:46', 70, 'hadir', '', 123),
(99, '2025-06-22 09:15:46', 71, 'hadir', '', 123),
(100, '2025-06-22 09:15:46', 72, 'tidak hadir', '', 123),
(101, '2025-07-11 17:02:38', 63, 'tidak hadir', 'sakit', 62),
(102, '2025-07-11 17:02:38', 64, 'hadir', '', 62),
(103, '2025-07-11 17:02:38', 65, 'hadir', '', 62),
(104, '2025-07-11 17:02:38', 66, 'hadir', '', 62),
(105, '2025-07-11 17:02:38', 67, 'hadir', '', 62),
(106, '2025-07-11 17:02:38', 68, 'hadir', '', 62),
(107, '2025-07-11 17:02:38', 69, 'hadir', '', 62),
(108, '2025-07-11 17:02:38', 70, 'tidak hadir', 'alpha', 62),
(109, '2025-07-11 17:02:38', 71, 'hadir', '', 62),
(110, '2025-07-11 17:02:38', 72, 'hadir', '', 62);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `role` enum('siswa','guru') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `password`, `kelas`, `role`) VALUES
(61, 'adam', '63a9f0ea7bb98050796b649e85481845', NULL, 'guru'),
(62, 'asmi', '63a9f0ea7bb98050796b649e85481845', NULL, 'guru'),
(63, 'Adit Pratama', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 1', 'siswa'),
(64, 'Budi Santoso', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 1', 'siswa'),
(65, 'Citra Lestari', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 1', 'siswa'),
(66, 'Dimas Ramadhan', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 1', 'siswa'),
(67, 'Eka Putra', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 1', 'siswa'),
(68, 'Fajar Maulana', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 1', 'siswa'),
(69, 'Gina Maharani', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 1', 'siswa'),
(70, 'Heri Saputra', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 1', 'siswa'),
(71, 'Indah Permata', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 1', 'siswa'),
(72, 'Joko Wahyu', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 1', 'siswa'),
(73, 'Kiki Andika', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 2', 'siswa'),
(74, 'Lina Fitriani', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 2', 'siswa'),
(75, 'Miko Salim', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 2', 'siswa'),
(76, 'Nina Oktaviani', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 2', 'siswa'),
(77, 'Oscar Prasetyo', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 2', 'siswa'),
(78, 'Putri Aulia', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 2', 'siswa'),
(79, 'Qori Ramadhan', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 2', 'siswa'),
(80, 'Riko Andrian', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 2', 'siswa'),
(81, 'Santi Nurhaliza', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 2', 'siswa'),
(82, 'Tegar Firmansyah', '827ccb0eea8a706c4c34a16891f84e7b', '10 DKV 2', 'siswa'),
(83, 'Umi Kalsum', '827ccb0eea8a706c4c34a16891f84e7b', '10 PH 1', 'siswa'),
(84, 'Vina Anggraini', '827ccb0eea8a706c4c34a16891f84e7b', '10 PH 1', 'siswa'),
(85, 'Wawan Setiawan', '827ccb0eea8a706c4c34a16891f84e7b', '10 PH 1', 'siswa'),
(86, 'Xenia Permata', '827ccb0eea8a706c4c34a16891f84e7b', '10 PH 1', 'siswa'),
(87, 'Yudi Kurnia', '827ccb0eea8a706c4c34a16891f84e7b', '10 PH 1', 'siswa'),
(88, 'Zahra Safitri', '827ccb0eea8a706c4c34a16891f84e7b', '10 PH 1', 'siswa'),
(89, 'Alya Nuraini', '827ccb0eea8a706c4c34a16891f84e7b', '10 PH 1', 'siswa'),
(90, 'Bambang Gunawan', '827ccb0eea8a706c4c34a16891f84e7b', '10 PH 1', 'siswa'),
(91, 'Cahya Rizky', '827ccb0eea8a706c4c34a16891f84e7b', '10 PH 1', 'siswa'),
(92, 'Dewi Sartika', '827ccb0eea8a706c4c34a16891f84e7b', '10 PH 1', 'siswa'),
(93, 'Evan Hartono', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 1', 'siswa'),
(94, 'Fina Azzahra', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 1', 'siswa'),
(95, 'Galih Firmansyah', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 1', 'siswa'),
(96, 'Hana Mutiara', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 1', 'siswa'),
(97, 'Ivan Wibowo', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 1', 'siswa'),
(98, 'Jihan Safira', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 1', 'siswa'),
(99, 'Kevin Aditya', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 1', 'siswa'),
(100, 'Laras Sekar', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 1', 'siswa'),
(101, 'Mario Suharto', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 1', 'siswa'),
(102, 'Nanda Salsabila', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 1', 'siswa'),
(103, 'Okta Dermawan', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 2', 'siswa'),
(104, 'Putra Mahesa', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 2', 'siswa'),
(105, 'Qarina Izzati', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 2', 'siswa'),
(106, 'Rani Oktaviani', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 2', 'siswa'),
(107, 'Syifa Rahma', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 2', 'siswa'),
(108, 'Tia Mulyani', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 2', 'siswa'),
(109, 'Ujang Iskandar', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 2', 'siswa'),
(110, 'Vera Ayuningtyas', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 2', 'siswa'),
(111, 'Widi Santika', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 2', 'siswa'),
(112, 'Xander Saputra', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 2', 'siswa'),
(113, 'Yulia Dwi', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 3', 'siswa'),
(114, 'Zaky Nur', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 3', 'siswa'),
(115, 'Aurel Safitri', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 3', 'siswa'),
(116, 'Bagas Setiawan', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 3', 'siswa'),
(117, 'Cici Paramitha', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 3', 'siswa'),
(118, 'Dion Prakoso', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 3', 'siswa'),
(119, 'Elsa Wulandari', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 3', 'siswa'),
(120, 'Fikri Hidayat', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 3', 'siswa'),
(121, 'nurdin nur hayati', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 3', 'siswa'),
(122, 'Halim Ramadhan', '827ccb0eea8a706c4c34a16891f84e7b', '11 DKV 3', 'siswa'),
(123, 'barnet', 'barnet123', NULL, 'guru');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `tanggal` (`tanggal`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `absensi_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
