-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 26, 2022 at 08:13 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fina`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absensi`
--

CREATE TABLE `tbl_absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `status_masuk` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_absensi`
--

INSERT INTO `tbl_absensi` (`id_absensi`, `id_users`, `status_masuk`, `date`, `keterangan`) VALUES
(2, 5, 'Masuk', '2022-07-08', ''),
(3, 5, 'Ijin', '2022-07-25', 'tyeyeyet'),
(4, 5, 'Masuk', '2022-07-04', ''),
(5, 5, 'Masuk', '2022-07-05', ''),
(6, 5, 'Masuk', '2022-07-06', ''),
(7, 5, 'Masuk', '2022-07-06', ''),
(8, 1, 'Masuk', '2022-07-02', ''),
(9, 1, 'Masuk', '2022-07-03', ''),
(10, 5, 'Ijin', '2022-07-16', ''),
(11, 5, 'Ijin', '2022-07-15', 'ffgfgfg'),
(12, 1, 'Ijin', '2022-07-18', ''),
(13, 5, 'Masuk', '2022-07-22', ''),
(14, 5, 'Masuk', '2022-07-23', ''),
(15, 5, 'Ijin', '2022-07-26', 'keperluan keluarga'),
(16, 1, 'Masuk', '2022-07-26', ''),
(17, 4, 'Masuk', '2022-07-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_honor`
--

CREATE TABLE `tbl_honor` (
  `id_honor` int(11) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_honor`
--

INSERT INTO `tbl_honor` (`id_honor`, `jumlah`, `nama_jabatan`) VALUES
(1, '4700000', 'GURU AHLI MADYA'),
(2, '2300000', 'OPERATOR'),
(3, '6000000', 'KEPALA SEKOLAH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(3, 'GURU AHLI MADYA'),
(4, 'OPERATOR'),
(5, 'KEPALA SEKOLAH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `alamat` text,
  `nohp` varchar(14) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0 = Tidak Aktif, 1 = Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `username`, `password`, `nama`, `nip`, `id_jabatan`, `alamat`, `nohp`, `foto`, `role`, `status`) VALUES
(1, 'admin', 'admin123', 'Administrator', '123123123123', 4, NULL, '123123123', NULL, '0', 1),
(4, 'admin2', '123', 'Admin Cantiks', '12312312', 4, NULL, '12312312', NULL, '1', 1),
(5, 'fina', 'admin123', 'Fina Amelia', '123', 4, NULL, '23213', NULL, '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `tbl_honor`
--
ALTER TABLE `tbl_honor`
  ADD PRIMARY KEY (`id_honor`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`) USING BTREE;

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absensi`
--
ALTER TABLE `tbl_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_honor`
--
ALTER TABLE `tbl_honor`
  MODIFY `id_honor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
