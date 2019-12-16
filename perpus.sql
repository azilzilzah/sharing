-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2018 at 01:01 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `nama_admin` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'azilzilzah', 'azilzilzah', '2ecdf565d44933226cc6709c761c0acd');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(5) NOT NULL,
  `nama_anggota` varchar(45) DEFAULT NULL,
  `gender` enum('laki-laki','perempuan') DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `gender`, `no_telp`, `alamat`, `email`, `password`) VALUES
(1, 'Tepe', 'laki-laki', '082223710114', 'Areman Depok', 'tepe@gmail.com', 'akukece123'),
(4, 'Sayang', 'perempuan', '0211212121212', 'Tidak Diketahui', 'sayang@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(5) NOT NULL,
  `id_kategori` int(5) DEFAULT NULL,
  `judul_buku` varchar(50) DEFAULT NULL,
  `pengarang` varchar(35) DEFAULT NULL,
  `thn_terbit` date DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `isbn` varchar(25) DEFAULT NULL,
  `jumlah_buku` int(3) DEFAULT NULL,
  `lokasi` enum('Rak 1','Rak 2','Rak 3') DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `status_buku` enum('1','0') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul_buku`, `pengarang`, `thn_terbit`, `penerbit`, `isbn`, `jumlah_buku`, `lokasi`, `gambar`, `tgl_input`, `status_buku`) VALUES
(6, 1, 'Digimon', 'Reavean', '1999-12-19', 'Deepweb', '777', 1, 'Rak 1', 'gambar1542697234.jpg', '2018-10-06', '1'),
(7, 3, 'Si Kancil', 'Anak 90\'an', '1990-01-01', 'Space Toon', '01011990', 2, 'Rak 1', 'gambar1537594946.jpg', '2018-09-22', '1'),
(10, 1, 'Digimon', 'Anak 90\'an', '1212-12-12', 'Depok', '12412', 2, 'Rak 1', 'gambar1542698046.jpg', '2018-11-20', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Komik'),
(2, 'Novel'),
(3, 'Dongeng'),
(4, 'Kamus'),
(5, 'Paket');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_pinjam` int(11) NOT NULL,
  `tgl_pencatatan` datetime DEFAULT NULL,
  `id_anggota` int(4) DEFAULT NULL,
  `id_buku` int(4) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `denda` double DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `total_denda` double DEFAULT NULL,
  `status_pengembalian` varchar(15) DEFAULT NULL,
  `status_peminjaman` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_pinjam`, `tgl_pencatatan`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `denda`, `tgl_pengembalian`, `total_denda`, `status_pengembalian`, `status_peminjaman`) VALUES
(2, '2018-09-21 21:57:34', 1, 6, '1222-12-12', '2018-09-22', 100000, '2018-09-23', 100000, '1', '1'),
(4, '2018-09-22 07:44:25', 2, 7, '2018-09-22', '2018-09-24', 1000000, '2018-09-23', 1000000, '1', '1'),
(5, '2018-10-06 18:58:46', 1, 6, '1999-04-12', '1999-04-12', 1000, '2018-10-18', 7129000, '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
