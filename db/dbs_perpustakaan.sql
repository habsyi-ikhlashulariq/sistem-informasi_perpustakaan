-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 05 Mei 2020 pada 01.36
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_anggota`
--

CREATE TABLE `tbl_anggota` (
  `kd_anggota` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `prodi` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`kd_anggota`, `nama`, `jk`, `prodi`, `alamat`) VALUES
(14180006, 'Dera Ayu Rasyita', 'Laki-Laki', 'Sistem Informasi', 'Cilebut'),
(14180057, 'Habsyi Ikhlashul Ariq', 'Laki-Laki', 'Sistem Informasi', 'Dramaga'),
(14180058, 'Kurnia Hidayat', 'Laki-Laki', 'Sistem Informasi', 'Ciomas'),
(15180040, 'Dzakiyatun Nisa', 'Laki-Laki', 'Teknik Informatika', 'Cilendek'),
(15180045, 'Aris Aditya Nugroho', 'Laki-Laki', 'Teknik Informatika', 'Ciomas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `kd_buku` varchar(20) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `penulis` varchar(30) NOT NULL,
  `penerbit` varchar(20) NOT NULL,
  `thn_terbit` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`kd_buku`, `judul`, `penulis`, `penerbit`, `thn_terbit`, `jumlah`) VALUES
('BK2005011', 'Probability And Statistics', 'Richard A. Johnson', 'Erlangga', 2009, 1),
('BK2005012', 'Samudera PHP', 'Loka Dwiartara', 'GPU', 2011, 0),
('BK2005013', 'OOP & MVC', 'David Naista', 'Grasindo', 2015, 2),
('BK2005021', 'Kebeh Bisa Basa Jawa ', 'Sudi Yatmanan', 'Erlangga', 2008, 7),
('BK2005022', 'Pemrograman android & Database', 'Abdul Kadir', 'Erlangga', 2015, 5),
('BK2005023', 'Data Mining', 'Efori Busulolo', 'GPU', 2011, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `kd_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `telp` int(11) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `avatar` varchar(30) NOT NULL,
  `level` enum('Petugas Perpustakaan','Kepala Perpustakaan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`kd_pegawai`, `nama`, `username`, `password`, `jk`, `telp`, `alamat`, `avatar`, `level`) VALUES
(1001, 'Supriyono', 'supri', '$2y$10$EA1qYeGAWSyidhOEIlPfbOlQJAFWomongg/A8t2cqflS1c4qTtoje', 'Laki-Laki', 2147483647, 'Kutorejo', 'default.png', 'Kepala Perpustakaan'),
(1002, 'Miftahul Azizah', 'azizah', '$2y$10$IXjr4cxO9UBvG/yDDA83jupWApJvXY74JLYhCWZnCkKpBghXqvLQ2', 'Laki-Laki', 98388383, 'Sukorejo', 'user21.png', 'Petugas Perpustakaan'),
(1003, 'Diki Andrian', 'diki', '$2y$10$C3v6SAx3bousfBDLsaMKr.OKhpE2wAVbmnGH1ixs7gdjkwzL8AdYO', 'Laki-Laki', 10802020, 'Srinahan', 'user2.png', 'Petugas Perpustakaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjaman`
--

CREATE TABLE `tbl_peminjaman` (
  `kd_peminjaman` varchar(20) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_deadline` date NOT NULL,
  `kd_petugas` int(11) NOT NULL,
  `kd_anggota` int(11) NOT NULL,
  `kd_buku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`kd_peminjaman`, `tgl_pinjam`, `tgl_deadline`, `kd_petugas`, `kd_anggota`, `kd_buku`) VALUES
('PM2005011', '2020-04-30', '2020-05-03', 1001, 14180057, 'BK2005011'),
('PM2005021', '2020-05-01', '2020-05-04', 1001, 15180045, 'BK2005012'),
('PM2005051', '2020-05-05', '2020-05-08', 1001, 14180006, 'BK2005011'),
('PM2005052', '2020-05-05', '2020-05-08', 1001, 15180040, 'BK2005013');

--
-- Trigger `tbl_peminjaman`
--
DELIMITER $$
CREATE TRIGGER `Kembalikan_buku` AFTER DELETE ON `tbl_peminjaman` FOR EACH ROW BEGIN
	UPDATE tbl_buku SET jumlah=jumlah+1
    WHERE kd_buku = OLD.kd_buku;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Pinjam_buku` AFTER INSERT ON `tbl_peminjaman` FOR EACH ROW BEGIN
	UPDATE tbl_buku SET jumlah = jumlah-1
    WHERE kd_buku = NEW.kd_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `kd_pengembalian` int(11) NOT NULL,
  `kd_peminjaman` varchar(20) NOT NULL,
  `kd_petugas_pengembalian` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengembalian`
--

INSERT INTO `tbl_pengembalian` (`kd_pengembalian`, `kd_peminjaman`, `kd_petugas_pengembalian`, `tgl_kembali`) VALUES
(4, 'PM2005032', 1001, '2020-05-05'),
(5, 'PM2005051', 1001, '2020-05-05'),
(6, 'PM2005031', 1001, '2020-05-05');

--
-- Trigger `tbl_pengembalian`
--
DELIMITER $$
CREATE TRIGGER `Pengembalian_buku` AFTER INSERT ON `tbl_pengembalian` FOR EACH ROW BEGIN
	DELETE  FROM tbl_peminjaman
    WHERE kd_peminjaman = NEW.kd_peminjaman;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD PRIMARY KEY (`kd_anggota`);

--
-- Indexes for table `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`kd_pegawai`);

--
-- Indexes for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD PRIMARY KEY (`kd_peminjaman`),
  ADD KEY `kd_anggota` (`kd_anggota`),
  ADD KEY `kd_buku` (`kd_buku`),
  ADD KEY `kd_petugas` (`kd_petugas`);

--
-- Indexes for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`kd_pengembalian`),
  ADD KEY `kd_peminjaman` (`kd_peminjaman`),
  ADD KEY `kd_petugas_pengembalian` (`kd_petugas_pengembalian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `kd_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
--
-- AUTO_INCREMENT for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  MODIFY `kd_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD CONSTRAINT `tbl_peminjaman_ibfk_1` FOREIGN KEY (`kd_anggota`) REFERENCES `tbl_anggota` (`kd_anggota`),
  ADD CONSTRAINT `tbl_peminjaman_ibfk_2` FOREIGN KEY (`kd_buku`) REFERENCES `tbl_buku` (`kd_buku`),
  ADD CONSTRAINT `tbl_peminjaman_ibfk_3` FOREIGN KEY (`kd_petugas`) REFERENCES `tbl_pegawai` (`kd_pegawai`);

--
-- Ketidakleluasaan untuk tabel `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD CONSTRAINT `tbl_pengembalian_ibfk_2` FOREIGN KEY (`kd_petugas_pengembalian`) REFERENCES `tbl_pegawai` (`kd_pegawai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
