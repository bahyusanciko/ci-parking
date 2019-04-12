-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2019 at 08:37 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbparkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `kd_admin` varchar(50) NOT NULL,
  `username_admin` varchar(50) NOT NULL,
  `password_admin` varchar(256) NOT NULL,
  `nama_admin` varchar(100) DEFAULT NULL,
  `email_admin` varchar(50) DEFAULT NULL,
  `no_hp_admin` varchar(50) DEFAULT NULL,
  `img_admin` varchar(256) DEFAULT NULL,
  `level_admin` int(11) DEFAULT NULL,
  `create_date_admin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`kd_admin`, `username_admin`, `password_admin`, `nama_admin`, `email_admin`, `no_hp_admin`, `img_admin`, `level_admin`, `create_date_admin`) VALUES
('A001', 'bahyu', '$2y$10$QgaToza20NHUJ.TMWvWEOeJisnHrrNfifhwpuJoSLsauRHIkmOnqe', 'Bahyu Sanciko', 'cbahyu@gmail.com', '089682261128', 'assets/dist/img/default.png', 1, '0000-00-00 00:00:00'),
('A004', 'admin', '$2y$10$/QU9h5JnAxk/KqHkXg6Q0u5LsPLu1pHHdHGnD/WtlKyGRak5amLjm', 'Kang Parkir', 'parkirinaja@gmail.com', '089682261128', 'assets/dist/img/default.png', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluar`
--

CREATE TABLE `tbl_keluar` (
  `kd_keluar` varchar(50) NOT NULL,
  `kd_masuk` varchar(50) DEFAULT NULL,
  `tgl_jam_masuk` datetime DEFAULT NULL,
  `tgl_jam_keluar` datetime DEFAULT NULL,
  `lama_parkir_keluar` varchar(50) DEFAULT NULL,
  `tarif_keluar` int(11) DEFAULT NULL,
  `total_keluar` int(11) DEFAULT NULL,
  `status_keluar` int(11) DEFAULT NULL,
  `create_keluar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keluar`
--

INSERT INTO `tbl_keluar` (`kd_keluar`, `kd_masuk`, `tgl_jam_masuk`, `tgl_jam_keluar`, `lama_parkir_keluar`, `tarif_keluar`, `total_keluar`, `status_keluar`, `create_keluar`) VALUES
('K00000001', 'M00000008', '2019-04-10 21:26:46', '2019-04-10 21:32:39', '0 jam,5 menit', 6000, 6000, 1, NULL),
('K00000002', 'M00000001', '2019-04-10 16:33:05', '2019-04-10 21:32:47', '4 jam,59 menit', 2000, 10000, 1, NULL),
('K00000003', 'M00000002', '2019-04-10 16:37:13', '2019-04-10 21:33:35', '4 Jam,56 Menit', 2000, 10000, 1, NULL),
('K00000004', 'M00000007', '2019-04-10 17:12:29', '2019-04-10 21:43:15', '4 Jam,30 Menit', 4000, 20000, 1, NULL),
('K00000005', 'M00000003', '2019-04-10 16:43:49', '2019-04-10 21:47:30', '5 Jam,3 Menit', 6000, 36000, 1, NULL),
('K00000006', 'M00000003', '2019-04-10 16:43:49', '2019-04-10 21:47:31', '5 Jam,3 Menit', 6000, 36000, 1, NULL),
('K00000007', 'M00000009', '2019-04-10 22:23:49', '2019-04-10 22:24:21', '0 Jam,0 Menit', 2000, 2000, 1, NULL),
('K00000008', 'M00000010', '2019-04-10 22:24:49', '2019-04-10 22:24:53', '0 Jam,0 Menit', 6000, 6000, 1, NULL),
('K00000009', 'M00000011', '2019-04-10 22:26:13', '2019-04-10 23:19:48', '0 Jam,53 Menit', 2000, 2000, 1, NULL),
('K00000010', 'M00000012', '2019-04-10 22:26:45', '2019-04-10 23:37:50', '1 Jam,11 Menit', 2000, 4000, 1, 'bahyu'),
('K00000011', 'M00000013', '2019-04-10 22:31:04', '2019-04-11 09:55:28', '11 Jam,24 Menit', 6000, 72000, 1, 'bahyu'),
('K00000012', 'M00000014', '2019-04-10 22:56:55', '2019-04-11 09:55:33', '10 Jam,58 Menit', 4000, 44000, 1, 'bahyu'),
('K00000013', 'M00000015', '2019-04-10 23:37:32', '2019-04-11 09:55:36', '10 Jam,18 Menit', 2000, 22000, 1, 'bahyu'),
('K00000014', 'M00000017', '2019-04-11 11:43:59', '2019-04-11 11:44:13', '0 Jam,0 Menit', 2000, 2000, 1, 'Kang Parkir'),
('K00000015', 'M00000016', '2019-04-11 11:33:35', '2019-04-11 16:55:44', '5 Jam,22 Menit', 2000, 12000, 1, 'Kang Parkir'),
('K00000016', 'M00000018', '2019-04-11 11:47:00', '2019-04-11 17:10:57', '5 Jam,23 Menit', 6000, 36000, 1, 'Kang Parkir'),
('K00000017', 'M00000019', '2019-04-11 11:58:47', '2019-04-11 17:11:06', '5 Jam,12 Menit', 2000, 12000, 1, 'Kang Parkir'),
('K00000018', 'M00000021', '2019-04-12 10:27:59', '2019-04-12 10:34:47', '0 Jam,6 Menit', 4000, 4000, 1, 'Bahyu Sanciko'),
('K00000019', 'M00000022', '2019-04-12 10:40:46', '2019-04-12 10:40:54', '0 Jam,0 Menit', 2000, 2000, 1, 'Bahyu Sanciko');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kendaraan`
--

CREATE TABLE `tbl_kendaraan` (
  `kd_kendaraan` varchar(50) NOT NULL,
  `nama_kendaraan` varchar(50) DEFAULT NULL,
  `harga_kendaraan` int(20) DEFAULT NULL,
  `create_by_kendaraan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kendaraan`
--

INSERT INTO `tbl_kendaraan` (`kd_kendaraan`, `nama_kendaraan`, `harga_kendaraan`, `create_by_kendaraan`) VALUES
('JK001', 'motor', 2000, 'bahyu'),
('JK002', 'mobil', 4000, NULL),
('JK003', 'Truk Kecil', 6000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masuk`
--

CREATE TABLE `tbl_masuk` (
  `kd_masuk` varchar(50) NOT NULL,
  `kd_kendaraan` varchar(50) DEFAULT NULL,
  `plat_masuk` varchar(50) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `status_masuk` int(11) DEFAULT NULL,
  `create_masuk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_masuk`
--

INSERT INTO `tbl_masuk` (`kd_masuk`, `kd_kendaraan`, `plat_masuk`, `tgl_masuk`, `status_masuk`, `create_masuk`) VALUES
('M00000001', 'JK001', 'B 4514 BLN', '2019-04-10 16:33:05', 2, NULL),
('M00000002', 'JK001', 'B 4512 UKN', '2019-04-10 16:37:13', 2, NULL),
('M00000003', 'JK003', 'B 7894 HJK', '2019-04-10 16:43:49', 2, NULL),
('M00000007', 'JK002', 'B 45142 BLJ', '2019-04-10 17:12:29', 2, NULL),
('M00000008', 'JK003', 'B 2133 KLN', '2019-04-10 21:26:46', 2, NULL),
('M00000009', 'JK001', 'B 4514 KLN', '2019-04-10 22:23:49', 2, NULL),
('M00000010', 'JK003', 'B 2122 KLN', '2019-04-10 22:24:49', 2, NULL),
('M00000011', 'JK001', 'B 4514 KHJ', '2019-04-10 22:26:13', 2, NULL),
('M00000012', 'JK001', 'B 7894 KJH', '2019-04-10 22:26:45', 2, NULL),
('M00000013', 'JK003', 'B 4514 BLN', '2019-04-10 22:31:04', 2, NULL),
('M00000014', 'JK002', 'B 4514 GHJ', '2019-04-10 22:56:55', 2, NULL),
('M00000015', 'JK001', 'B 4514 LKM', '2019-04-10 23:37:32', 2, 'bahyu'),
('M00000016', 'JK001', 'B 4561 NMB', '2019-04-11 11:33:35', 2, 'Bahyu Sanciko'),
('M00000017', 'JK001', 'B 4514 LKM', '2019-04-11 11:43:59', 2, 'Kang Parkir'),
('M00000018', 'JK003', 'B 1235 LKJ', '2019-04-11 11:47:00', 2, 'Kang Parkir'),
('M00000019', 'JK001', 'AD 21983 UZS', '2019-04-11 11:58:47', 2, 'Kang Parkir'),
('M00000020', 'JK002', 'B 2365 BLN', '2019-04-11 17:47:12', 1, 'Kang Parkir'),
('M00000021', 'JK002', 'B 4514 BLN', '2019-04-12 10:27:59', 2, 'Kang Parkir'),
('M00000022', 'JK001', 'B 54514 \'', '2019-04-12 10:40:46', 2, 'Bahyu Sanciko'),
('M00000023', 'JK001', 'B 4514 KLM', '2019-04-12 13:22:21', 1, 'Kang Parkir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tbl_keluar`
--
ALTER TABLE `tbl_keluar`
  ADD PRIMARY KEY (`kd_keluar`);

--
-- Indexes for table `tbl_kendaraan`
--
ALTER TABLE `tbl_kendaraan`
  ADD PRIMARY KEY (`kd_kendaraan`);

--
-- Indexes for table `tbl_masuk`
--
ALTER TABLE `tbl_masuk`
  ADD PRIMARY KEY (`kd_masuk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
