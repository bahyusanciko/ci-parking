-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2019 at 02:51 PM
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
('A004', 'admin', '$2y$10$/QU9h5JnAxk/KqHkXg6Q0u5LsPLu1pHHdHGnD/WtlKyGRak5amLjm', 'Kang Parkir', 'parkirinaja@gmail.com', '089682261128', 'assets/dist/img/default.png', 2, '0000-00-00 00:00:00'),
('A006', 'owner', '$2y$10$j1lDCDGnkzO01CElfAZe1e9Wxo7pZhwbkPUs5kKSGDq2GHV.aqiUm', 'OWNER', 'owner@parkrinaja.com', '089682261128', 'assets/dist/img/default.png', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluar`
--

CREATE TABLE `tbl_keluar` (
  `kd_keluar` varchar(50) NOT NULL,
  `kd_masuk` varchar(50) DEFAULT NULL,
  `kd_member` varchar(50) DEFAULT NULL,
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

INSERT INTO `tbl_keluar` (`kd_keluar`, `kd_masuk`, `kd_member`, `tgl_jam_masuk`, `tgl_jam_keluar`, `lama_parkir_keluar`, `tarif_keluar`, `total_keluar`, `status_keluar`, `create_keluar`) VALUES
('K00000001', 'M00000033', 'NULL', '2019-04-22 13:26:38', '2019-04-25 12:21:44', '70 Jam,55 Menit', 150000, 0, 1, 'OWNER'),
('K00000002', 'M00000034', 'NULL', '2019-04-25 12:35:09', '2019-04-25 12:43:08', '0 Jam,7 Menit', 2000, 2000, 1, 'OWNER'),
('K00000003', 'M00000032', 'NULL', '2019-04-17 22:44:53', '2019-04-25 19:44:35', '188 Jam,59 Menit', 6000, 1134000, 1, 'Kang Parkir'),
('K00000004', 'M00000035', 'MBR00000002', '2019-04-25 19:45:41', '2019-04-25 19:46:32', '0 Jam,0 Menit', 350000, 0, 1, 'Kang Parkir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kendaraan`
--

CREATE TABLE `tbl_kendaraan` (
  `kd_kendaraan` varchar(50) NOT NULL,
  `nama_kendaraan` varchar(50) DEFAULT NULL,
  `harga_kendaraan` int(20) DEFAULT NULL,
  `jenis_kendaraan` int(11) NOT NULL,
  `create_by_kendaraan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kendaraan`
--

INSERT INTO `tbl_kendaraan` (`kd_kendaraan`, `nama_kendaraan`, `harga_kendaraan`, `jenis_kendaraan`, `create_by_kendaraan`) VALUES
('JK001', 'motor', 2000, 1, 'bahyu'),
('JK002', 'mobil', 4000, 1, 'bahyu'),
('JK003', 'Truk Kecil', 6000, 1, 'bahyu'),
('JK004', 'Motor Bulanan', 150000, 2, 'bahyu'),
('JK005', 'MOBIL BULANAN', 350000, 2, 'bahyu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_masuk`
--

CREATE TABLE `tbl_masuk` (
  `kd_masuk` varchar(50) NOT NULL,
  `kd_member` varchar(50) NOT NULL,
  `kd_kendaraan` varchar(50) DEFAULT NULL,
  `plat_masuk` varchar(50) DEFAULT NULL,
  `tgl_masuk` datetime DEFAULT NULL,
  `status_masuk` int(11) DEFAULT NULL,
  `create_masuk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_masuk`
--

INSERT INTO `tbl_masuk` (`kd_masuk`, `kd_member`, `kd_kendaraan`, `plat_masuk`, `tgl_masuk`, `status_masuk`, `create_masuk`) VALUES
('M00000032', 'NULL', 'JK003', 'B 4514 VBN', '2019-04-17 22:44:53', 2, 'Kang Parkir'),
('M00000033', 'MBR00000001', 'JK004', 'B 4514 BLN', '2019-04-22 13:26:38', 2, 'Kang Parkir'),
('M00000034', 'NULL', 'JK001', 'B 4514 BLN', '2019-04-25 12:35:09', 2, 'OWNER'),
('M00000035', 'MBR00000002', 'JK005', 'B 7894 BLN', '2019-04-25 19:45:41', 2, 'Kang Parkir'),
('M00000036', 'NULL', 'JK001', 'B 4781 JHG', '2019-04-25 19:46:13', 1, 'Kang Parkir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `kd_member` varchar(50) NOT NULL,
  `kd_kendaraan` varchar(50) DEFAULT NULL,
  `kd_kartu` varchar(256) DEFAULT NULL,
  `nama_member` varchar(100) DEFAULT NULL,
  `plat_member` varchar(50) DEFAULT NULL,
  `no_rangka_member` varchar(126) DEFAULT NULL,
  `no_mesin_member` varchar(126) DEFAULT NULL,
  `create_member` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`kd_member`, `kd_kendaraan`, `kd_kartu`, `nama_member`, `plat_member`, `no_rangka_member`, `no_mesin_member`, `create_member`) VALUES
('MBR00000001', 'JK004', NULL, 'Bahyu Sanciko', 'B 4514 BLN', 'asddsa5451354da', 'asdasd545153454', 'Kang Parkir'),
('MBR00000002', 'JK005', NULL, 'Bahyu Sanciko', 'B 7894 BLN', 'asdkasdjkads6231131', 'as5d4asd54asd23121s', 'Kang Parkir'),
('MBR00000003', 'JK004', NULL, 'Motor Gue', 'B 4561 BLN', 'asdlsjdkljasd5645', 'saddsadsa564645', 'Bahyu Sanciko');

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

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`kd_member`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
