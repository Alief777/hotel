-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Feb 2023 pada 12.49
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perhotelan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(255) NOT NULL,
  `no_kamar` char(5) NOT NULL,
  `harga_kamar` bigint(15) NOT NULL,
  `fasilitas_kamar` text NOT NULL,
  `status_kamar` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `tipe_kamar`, `no_kamar`, `harga_kamar`, `fasilitas_kamar`, `status_kamar`) VALUES
(45, 'DELUXE ROOM ', '1', 100000, 'ac,wifi,tv', 1),
(46, 'private ', '', 0, 'ac', 0),
(47, 'nigga room', '3', 1000000, 'wifi', 0),
(48, 'nigga room', '3', 1000000, 'wifi', 1),
(49, '', '', 0, '', 0),
(50, '', '', 0, '', 0),
(51, 'king room', '', 250000, 'ac,wifi', 1),
(52, 'nigga room', '', 9223372036854775807, 'ac', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar_gambar`
--

CREATE TABLE `kamar_gambar` (
  `id_kamar_gambar` int(11) NOT NULL,
  `nama_kamar_gambar` varchar(50) NOT NULL,
  `id_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kamar_gambar`
--

INSERT INTO `kamar_gambar` (`id_kamar_gambar`, `nama_kamar_gambar`, `id_kamar`) VALUES
(1, 'nama_kamar_gambar1574452364.jpg', 1),
(4, 'nama_kamar_gambar1574464177.jpg', 2),
(5, 'nama_kamar_gambar1574464197.jpeg', 3),
(6, 'nama_kamar_gambar1574464209.jpg', 4),
(7, 'nama_kamar_gambar1574464217.jpg', 5),
(8, 'nama_kamar_gambar1574464228.jpg', 6),
(9, 'nama_kamar_gambar1574464551.jpg', 2),
(10, 'nama_kamar_gambar1574692697.jpg', 7),
(11, 'nama_kamar_gambar1574692704.jpg', 8),
(12, 'nama_kamar_gambar1574692715.jpg', 9),
(13, 'nama_kamar_gambar1574692739.jpg', 10),
(14, 'nama_kamar_gambar1574700111.jpg', 11),
(15, 'nama_kamar_gambar1574700126.jpg', 12),
(16, 'nama_kamar_gambar1574700138.jpg', 13),
(17, 'nama_kamar_gambar1574700156.jpg', 14),
(18, 'nama_kamar_gambar1574700164.jpg', 15),
(19, 'nama_kamar_gambar1574700173.jpg', 16),
(20, 'nama_kamar_gambar1574700183.jpg', 17),
(21, 'nama_kamar_gambar1574700195.jpeg', 18),
(22, 'nama_kamar_gambar1574700204.jpg', 19),
(23, 'nama_kamar_gambar1574700212.jpg', 20),
(24, 'nama_kamar_gambar1574700221.jpg', 21),
(25, 'nama_kamar_gambar1574700229.jpg', 22),
(26, 'nama_kamar_gambar1574700237.jpg', 23),
(27, 'nama_kamar_gambar1574700247.jpg', 24),
(28, 'nama_kamar_gambar1574700254.jpg', 25),
(29, 'nama_kamar_gambar1574700263.jpg', 26),
(30, 'nama_kamar_gambar1574700274.jpg', 27),
(31, 'nama_kamar_gambar1574700281.jpg', 28),
(32, 'nama_kamar_gambar1574700289.jpg', 29),
(33, 'nama_kamar_gambar1574700298.jpeg', 30),
(34, 'nama_kamar_gambar1574700306.jpeg', 31),
(35, 'nama_kamar_gambar1574700314.jpg', 32),
(36, 'nama_kamar_gambar1574700322.jpg', 33),
(37, 'nama_kamar_gambar1574700331.jpg', 34),
(38, 'nama_kamar_gambar1574700338.jpg', 35),
(39, 'nama_kamar_gambar1574700345.jpg', 36),
(40, 'nama_kamar_gambar1574700353.jpg', 37),
(41, 'nama_kamar_gambar1574700360.jpg', 38),
(42, 'nama_kamar_gambar1574700367.jpg', 39),
(43, 'nama_kamar_gambar1574700377.jpg', 40),
(44, 'nama_kamar_gambar1574700387.jpg', 41),
(45, 'nama_kamar_gambar1574700395.jpg', 42),
(46, 'nama_kamar_gambar1574700403.jpg', 43),
(47, 'nama_kamar_gambar1574700410.jpg', 44),
(48, 'nama_kamar_gambar1574752414.jpg', 1),
(49, 'nama_kamar_gambar1574752424.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `nama_reservasi` varchar(25) NOT NULL,
  `tlp_reservasi` varchar(12) NOT NULL,
  `alamat_reservasi` text NOT NULL,
  `tgl_reservasi_masuk` date NOT NULL,
  `tgl_reservasi_keluar` date NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `status_reservasi` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `nama_reservasi`, `tlp_reservasi`, `alamat_reservasi`, `tgl_reservasi_masuk`, `tgl_reservasi_keluar`, `id_kamar`, `status_reservasi`) VALUES
(1, 'yoga', '085210662437', 'river valley\r\n', '2019-11-27', '2019-11-28', 1, 2),
(2, 'alamaheyyy', '098760987', 'semlaheyy', '2019-11-28', '2019-11-30', 44, 2),
(3, 'anjay', '0862628682', 'anjay mabar\r\n', '2019-11-28', '2019-12-01', 43, 2),
(4, 'tegetrg', '0850805', 'cfdsfds', '2019-11-29', '2019-11-30', 35, 2),
(5, 'yoga', '085210662437', 'river valley\r\n', '2019-12-04', '2019-12-31', 1, 1),
(6, 'malih', '0876788768', 'ciputat', '2019-12-05', '2019-12-07', 7, 2),
(7, 'yoga', '085210662437', 'river valley', '2019-12-06', '2019-12-10', 42, 1),
(8, 'Ahmad Sentosa', '08519283912', 'Jl. Hoseruya', '2019-12-10', '2019-12-11', 6, 1),
(9, 'SarjanaKomedi', '0851928391', 'Jl. Hello World', '2020-01-01', '2020-01-02', 5, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi_pembayaran`
--

CREATE TABLE `reservasi_pembayaran` (
  `id_reservasi_pembayaran` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `uang_bayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `id_reservasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reservasi_pembayaran`
--

INSERT INTO `reservasi_pembayaran` (`id_reservasi_pembayaran`, `tgl_pembayaran`, `nominal_pembayaran`, `uang_bayar`, `kembalian`, `id_reservasi`) VALUES
(1, '2019-11-27', 981818, 1000000, 18182, 1),
(2, '2019-11-28', 1137190, 2000000, 862810, 2),
(3, '2019-11-28', 1705785, 1800000, 94215, 3),
(4, '2019-12-03', 568595, 600000, 31405, 4),
(5, '2019-12-05', 909090, 1000000, 90910, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nama_saran` varchar(50) NOT NULL,
  `email_saran` varchar(25) NOT NULL,
  `tlp_saran` bigint(15) NOT NULL,
  `isi_saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saran`
--

INSERT INTO `saran` (`id_saran`, `nama_saran`, `email_saran`, `tlp_saran`, `isi_saran`) VALUES
(1, 'test saran', 'test@saran.com', 1282381239, 'ini adalah percobaan untuk saran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_user_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `email`, `nama_lengkap`, `password`, `id_user_group`) VALUES
(1, 'admin_hotel', 'testing@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'operator', 'operator@testing.com', 'operator', '4b583376b2767b923c3e1da60d10de59', 2),
(3, 'yoga', 'arifincaesar@gmail.com', 'yoga', '28fab75dc1f392d731b3f54cf09ae212', 2),
(7, 'alifpanca', 'Alief Panca Rachman', 'alief@gmail.com', 'alif123', 3),
(8, 'alifpanca', 'alief@gmail.com', 'Alief Panca Rachman', 'alif123', 1),
(9, 'alifpanca', 'alief123@gmail.com', 'Alief Panca Rachman', 'alif1234', 3),
(10, 'Mrperfext777_', 'admin@alief.com', 'zevandra panca indrawan bin Jabar', 'vladimiralif', 3),
(11, 'local', 'local@gmail.com', 'localhost', 'localhost123', 1),
(12, 'adit', 'aditya@gmail.com', 'aditya naufal', 'aditganteng123', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_group`
--

CREATE TABLE `user_group` (
  `id_user_group` int(11) NOT NULL,
  `nama_user_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_group`
--

INSERT INTO `user_group` (`id_user_group`, `nama_user_group`) VALUES
(1, 'admin'),
(2, 'operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `kamar_gambar`
--
ALTER TABLE `kamar_gambar`
  ADD PRIMARY KEY (`id_kamar_gambar`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indeks untuk tabel `reservasi_pembayaran`
--
ALTER TABLE `reservasi_pembayaran`
  ADD PRIMARY KEY (`id_reservasi_pembayaran`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id_user_group`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `kamar_gambar`
--
ALTER TABLE `kamar_gambar`
  MODIFY `id_kamar_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `reservasi_pembayaran`
--
ALTER TABLE `reservasi_pembayaran`
  MODIFY `id_reservasi_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id_user_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
