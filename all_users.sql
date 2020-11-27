-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2020 pada 17.40
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `all_users`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `infobooking`
--

CREATE TABLE `infobooking` (
  `idBooking` int(11) NOT NULL,
  `idRuangan` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `waktuMulai` int(11) NOT NULL,
  `waktuSelesai` int(11) NOT NULL,
  `tahunBooking` int(11) NOT NULL,
  `bulanBooking` int(11) NOT NULL,
  `tanggalBooking` int(11) NOT NULL,
  `hargaTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `infobooking`
--

INSERT INTO `infobooking` (`idBooking`, `idRuangan`, `idUser`, `waktuMulai`, `waktuSelesai`, `tahunBooking`, `bulanBooking`, `tanggalBooking`, `hargaTotal`) VALUES
(1, 5, 1, 1, 11, 11, 11, 11, 11),
(2, 6, 1, 1, 11, 11, 11, 11, 120000),
(3, 5, 1, 1, 11, 11, 11, 11, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruangan`
--

CREATE TABLE `ruangan` (
  `idRuangan` int(250) NOT NULL,
  `namaRuangan` varchar(250) NOT NULL,
  `deskripsiRuangan` varchar(250) NOT NULL,
  `hargaRuangan` int(11) NOT NULL,
  `lokasiRuangan` varchar(250) NOT NULL,
  `urlGambarRuangan` varchar(250) NOT NULL,
  `kapasitasRuangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruangan`
--

INSERT INTO `ruangan` (`idRuangan`, `namaRuangan`, `deskripsiRuangan`, `hargaRuangan`, `lokasiRuangan`, `urlGambarRuangan`, `kapasitasRuangan`) VALUES
(5, 'Mawar', 'Mantab', 100000, 'Jogja', 'https://www.test.com', 5),
(6, 'Tulip', 'Yoi', 120000, 'Jogja', 'https://www.test.com', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(250) NOT NULL,
  `urlGambarUser` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`idUser`, `namaUser`, `urlGambarUser`) VALUES
(1, 'Kris', 'www.test.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `infobooking`
--
ALTER TABLE `infobooking`
  ADD PRIMARY KEY (`idBooking`);

--
-- Indeks untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`idRuangan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `infobooking`
--
ALTER TABLE `infobooking`
  MODIFY `idBooking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `idRuangan` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
