-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2023 pada 15.01
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
-- Database: `uaufarm_mitra`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Perikanan'),
(2, 'Pertanian'),
(3, 'Perternakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mitra`
--

CREATE TABLE `mitra` (
  `id_mitra` int(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nama_toko` varchar(225) NOT NULL,
  `nomor_hp` varchar(225) DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `koordinat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mitra`
--

INSERT INTO `mitra` (`id_mitra`, `nama`, `nama_toko`, `nomor_hp`, `id_kategori`, `koordinat`) VALUES
(51, 'Choirun Annas', 'Choirunfarm', '087752660917', 1, '-7.276617064566558, 112.79349116299953'),
(52, 'Ubay', 'Ubay', '087752660917', 2, '-7.012381782602994, 113.85253409140948'),
(53, 'Udin', 'Udin Store', '087752660917', 1, '-6.893952111236561, 112.04576901365532'),
(54, 'Ferga Nur Budi', 'Ferga Store', '087752660917', 1, '-8.080520334137816, 111.9545991221331'),
(55, 'Choirun Annas', 'Choirunfarm', '087752660917', 1, '-7.303687239226072, 112.74300157686355');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nomor_hp` varchar(225) NOT NULL,
  `koordinat` varchar(225) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `nomor_hp`, `koordinat`, `username`, `password`, `role_id`) VALUES
(17, 'Admin', '087752660917', '-8.077135950064061, 111.95290442469206', 'admin', '$2y$10$ER4FhikUxOqNj4W1fEAFo.lSMta7zONGFori8lDm8STmW4Zv/oAAK', 1),
(22, 'Udin', '087752660917', '-6.903950492913178, 107.66577689330997', 'udin', '$2y$10$f4FHfjSlbVGrkNwCRCR1vusVfdwaiv.rayYdZp2wKAqKfiV7zT5Ya', 2),
(23, 'Annas', '087752660917', '-7.256010666202093, 112.76552076955808', 'annas', '$2y$10$zgAOLocN5C3P.YCosMB6EeFHnRArQz7ESnJDJP6n4RO9jsNPFaWSi', 2),
(24, 'Ubay', '087752660917', '-4.089995698977913, 137.86607785423223', 'ubay', '$2y$10$RaweL530GP1QSTWxnqRYpOdbwyeCAaHMZzLAV9kp2sY3ggp33ddRe', 2),
(25, 'Udin2', '087752660917', '-0.4132928845011903, 114.53218800570416', 'udin2', '$2y$10$1vyzRXwnfOONrORKj9vVWOU6DTL7GHZ/EfeO7z6AWT0Bn6dXMzYm.', 2),
(26, 'Ubay2', '087752660917', '-1.2745093433675712, 102.08222662626389', 'ubay2', '$2y$10$W4WFRmzYthh7t/8u6cLp1eWEEIApOYopQFrKcYMYcP4QmzXbpF9V.', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
