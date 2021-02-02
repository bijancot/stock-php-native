-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2019 pada 12.50
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stok`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_barang`
--

CREATE TABLE `is_barang` (
  `id_barang` varchar(7) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` smallint(6) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_barang_keluar`
--

CREATE TABLE `is_barang_keluar` (
  `id_barang_keluar` varchar(15) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `status` enum('Proses','Approve','Reject') NOT NULL DEFAULT 'Proses',
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_barang_masuk`
--

CREATE TABLE `is_barang_masuk` (
  `id_barang_masuk` varchar(15) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_barang` varchar(7) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_jenis_barang`
--

CREATE TABLE `is_jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` smallint(6) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_satuan`
--

CREATE TABLE `is_satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_satuan` varchar(30) NOT NULL,
  `created_user` smallint(6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` smallint(6) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `is_users`
--

CREATE TABLE `is_users` (
  `id_user` smallint(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','Manajer','Gudang') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `is_users`
--

INSERT INTO `is_users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ADMIN', '21232f297a57a5a743894a0e4a801fc3', '', '', 'user-default.png', 'Super Admin', 'aktif', '2019-11-13 03:42:53', '2019-11-14 11:45:23'),
(2, 'manajer', 'MANAJER', '69b731ea8f289cf16a192ce78a37b4f0', '', '', 'user-default.png', 'Manajer', 'aktif', '2019-11-13 03:42:53', '2019-11-14 11:46:44'),
(3, 'user', 'USER', 'ee11cbb19052e40b07aac0ca060c23ee', '', '', 'user-default.png', 'Gudang', 'aktif', '2019-11-13 03:41:46', '2019-11-14 11:47:30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `is_barang`
--
ALTER TABLE `is_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indeks untuk tabel `is_barang_keluar`
--
ALTER TABLE `is_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `created_user` (`created_user`);

--
-- Indeks untuk tabel `is_barang_masuk`
--
ALTER TABLE `is_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `created_user` (`created_user`);

--
-- Indeks untuk tabel `is_jenis_barang`
--
ALTER TABLE `is_jenis_barang`
  ADD PRIMARY KEY (`id_jenis`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indeks untuk tabel `is_satuan`
--
ALTER TABLE `is_satuan`
  ADD PRIMARY KEY (`id_satuan`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indeks untuk tabel `is_users`
--
ALTER TABLE `is_users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `is_jenis_barang`
--
ALTER TABLE `is_jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `is_satuan`
--
ALTER TABLE `is_satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `is_users`
--
ALTER TABLE `is_users`
  MODIFY `id_user` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `is_barang`
--
ALTER TABLE `is_barang`
  ADD CONSTRAINT `is_barang_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `is_satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_ibfk_4` FOREIGN KEY (`id_jenis`) REFERENCES `is_jenis_barang` (`id_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `is_barang_keluar`
--
ALTER TABLE `is_barang_keluar`
  ADD CONSTRAINT `is_barang_keluar_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_keluar_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `is_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `is_barang_masuk`
--
ALTER TABLE `is_barang_masuk`
  ADD CONSTRAINT `is_barang_masuk_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_barang_masuk_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `is_barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `is_jenis_barang`
--
ALTER TABLE `is_jenis_barang`
  ADD CONSTRAINT `is_jenis_barang_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_jenis_barang_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `is_satuan`
--
ALTER TABLE `is_satuan`
  ADD CONSTRAINT `is_satuan_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `is_satuan_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `is_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
