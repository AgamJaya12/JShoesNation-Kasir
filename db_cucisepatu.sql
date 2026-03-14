-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2021 pada 13.10
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cucisepatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `username`, `password`, `no_hp`) VALUES
(1, 'agam', 'jayaagam387@gmail.com', 'admin1', '123', '085843908381'),
(2, 'rafli', 'raliabi@gmail.com', 'admin2', '123', '081328458053');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_bank`
--

CREATE TABLE `akun_bank` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `akunbankid_akunbank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_order` int(11) NOT NULL,
  `or_number` varchar(50) DEFAULT NULL,
  `nama_cus` varchar(50) DEFAULT NULL,
  `no_telp` char(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jen_treatment` varchar(50) DEFAULT NULL,
  `wkt_kerja` varchar(30) DEFAULT NULL,
  `jmlh_treatment` int(11) DEFAULT NULL,
  `hrg_treatment` int(11) DEFAULT NULL,
  `tgl_msk` varchar(50) DEFAULT NULL,
  `tgl_kluar` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id` int(11) NOT NULL,
  `or_number` varchar(50) DEFAULT NULL,
  `nama_cus` varchar(50) DEFAULT NULL,
  `no_telp` char(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jen_treatment` varchar(50) DEFAULT NULL,
  `wkt_kerja` varchar(30) DEFAULT NULL,
  `jmlh_treatment` int(11) DEFAULT NULL,
  `hrg_treatment` int(11) DEFAULT NULL,
  `tgl_msk` varchar(50) DEFAULT NULL,
  `tgl_kluar` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `nominal_bayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `nama_treatment` varchar(25) NOT NULL,
  `waktu_kerja` varchar(50) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `treatment`
--

INSERT INTO `treatment` (`id`, `nama_treatment`, `waktu_kerja`, `biaya`) VALUES
(1, 'deepclean', '3hari', 30000),
(2, 'fastclean', '1hari', 20000),
(3, 'whiteshoes', '3-4hari', 40000),
(4, 'unyellowing', '3-4hari', 40000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `akun_bank`
--
ALTER TABLE `akun_bank`
  ADD KEY `id` (`id`) USING BTREE;

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `akunbankid_akunbank` (`akunbankid_akunbank`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `akun_bank`
--
ALTER TABLE `akun_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`akunbankid_akunbank`) REFERENCES `akun_bank` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
