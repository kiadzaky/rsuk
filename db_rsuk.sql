-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2020 at 04:02 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rsuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `nik` varchar(16) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `foto` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nik`, `nama`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `no_telepon`, `foto`, `username`, `password`, `level`) VALUES
('1234567890123456', 'Indrawati', '2019-11-17', 'Jl.Mastrip V No.7', 'Wanita', '085123456342', 'dr-1573741526.jpg', 'indrawati', 'indrawati', '1'),
('3509191312540007', 'admin', '1998-12-02', 'RSU Kaliwates', 'Pria', '08970605445', 'pasjdpoajsd.jpg', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `id_ambulance` varchar(5) NOT NULL,
  `ambulance` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ambulance`
--

INSERT INTO `ambulance` (`id_ambulance`, `ambulance`) VALUES
('AMBL1', 'Ambulan Jenazah'),
('AMBL2', 'Ambulan Darurat');

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_registrasi` varchar(5) NOT NULL,
  `no_antrian` varchar(4) NOT NULL,
  `status_antrian` enum('0','1','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id`, `waktu`, `no_registrasi`, `no_antrian`, `status_antrian`) VALUES
(18, '2019-12-10 05:06:09', 'PS001', 'P001', '1'),
(21, '2019-12-11 01:38:38', 'PS004', 'P001', '1'),
(25, '2019-12-12 07:38:30', 'PS005', 'P001', '0');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_hari`
--

CREATE TABLE `daftar_hari` (
  `id_hari` int(1) NOT NULL,
  `hari` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_hari`
--

INSERT INTO `daftar_hari` (`id_hari`, `hari`) VALUES
(1, 'senin'),
(2, 'selasa'),
(3, 'rabu'),
(4, 'kamis'),
(5, 'jumat'),
(6, 'sabtu'),
(7, 'sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(5) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` text NOT NULL,
  `id_poli` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `no_hp`, `foto`, `id_poli`) VALUES
('DR001', 'drg.Septyono Heriawan,Sp.Perio', '', 'dr-1573432960.jpg', 'POLI1'),
('DR002', 'dr.Hudoyo,Sp.PD', '', 'dr-1573432960.jpg', 'POLI2'),
('DR003', 'dr.Sutikno,Sp.JP', '', 'dr-1573744869.jpg', 'POLI3');

-- --------------------------------------------------------

--
-- Table structure for table `hari_kerja_dokter`
--

CREATE TABLE `hari_kerja_dokter` (
  `id` int(3) NOT NULL,
  `id_dokter` varchar(5) NOT NULL,
  `id_hari` int(1) NOT NULL,
  `id_jadwal` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari_kerja_dokter`
--

INSERT INTO `hari_kerja_dokter` (`id`, `id_dokter`, `id_hari`, `id_jadwal`) VALUES
(1, 'DR001', 1, 'JDW01'),
(2, 'DR001', 2, 'JDW02'),
(3, 'DR002', 1, 'JDW01');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(5) NOT NULL,
  `jadwal` enum('pagi','siang','malam','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `jadwal`) VALUES
('JDW01', 'pagi'),
('JDW02', 'siang'),
('JDW03', 'malam');

-- --------------------------------------------------------

--
-- Table structure for table `no_antri`
--

CREATE TABLE `no_antri` (
  `no_antrian` varchar(4) NOT NULL,
  `status_antrian` enum('tersedia','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `no_antri`
--

INSERT INTO `no_antri` (`no_antrian`, `status_antrian`) VALUES
('P001', 'tidak'),
('P002', 'tersedia'),
('P003', 'tersedia'),
('P004', 'tersedia'),
('P005', 'tersedia'),
('P006', 'tersedia'),
('P007', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `no_registrasi` varchar(5) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_poli` varchar(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keluhan` text NOT NULL,
  `riwayat_sakit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_registrasi`, `nik`, `id_poli`, `tanggal`, `keluhan`, `riwayat_sakit`) VALUES
('PS001', '1234567890123456', 'POLI1', '2019-12-10 05:05:22', 'poasd', 'pasjdas'),
('PS004', '1234567890123456', 'POLI1', '2019-12-11 01:36:14', 'Kff', 'Ff'),
('PS005', '1234567890123456', 'POLI1', '2019-12-12 07:38:30', 'Sakit gigi', 'Lubang');

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` varchar(5) NOT NULL,
  `poli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `poli`) VALUES
('POLI1', 'Poli Gigi'),
('POLI2', 'Poli Rawat Jalan'),
('POLI3', 'Poli Saraf');

-- --------------------------------------------------------

--
-- Table structure for table `req_ambulance`
--

CREATE TABLE `req_ambulance` (
  `id_req_ambulance` varchar(10) NOT NULL,
  `id_ambulance` varchar(5) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keluhan` text NOT NULL,
  `link` varchar(30) NOT NULL,
  `status_req` enum('0','1','2','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_ambulance`
--

INSERT INTO `req_ambulance` (`id_req_ambulance`, `id_ambulance`, `nik`, `alamat`, `no_hp`, `tanggal`, `keluhan`, `link`, `status_req`) VALUES
('AL15091901', 'AMBL2', '1234567890123456', 'Jln.Sumatra No.2', '0', '2019-11-15 02:51:19', 'Kecelakaan mobil dan pendarahan', 'https://datatables.net/3/', '0'),
('AL15091902', 'AMBL2', '1234567890123456', 'Perum Milenia Blok D14', '0', '2019-11-21 04:56:55', 'asdasd', 'https://datatables.net/3/', '0'),
('AL15091903', 'AMBL1', '1234567890123456', 'Jl Riau no 10, Jember', '085567876456', '2019-12-17 17:00:00', '', 'localp', '0');

-- --------------------------------------------------------

--
-- Table structure for table `status_obat`
--

CREATE TABLE `status_obat` (
  `id_obat` int(11) NOT NULL,
  `no_resep` varchar(5) NOT NULL,
  `jml_obat` varchar(2) NOT NULL,
  `status` enum('belum terproses','dirproses','selesai','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_obat`
--

INSERT INTO `status_obat` (`id_obat`, `no_resep`, `jml_obat`, `status`) VALUES
(1, 'NR001', '10', 'belum terproses');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jadwal_dokter_poli`
-- (See below for the actual view)
--
CREATE TABLE `view_jadwal_dokter_poli` (
`nama_dokter` varchar(30)
,`foto` text
,`poli` varchar(20)
,`hari` varchar(7)
,`jadwal` enum('pagi','siang','malam','')
);

-- --------------------------------------------------------

--
-- Structure for view `view_jadwal_dokter_poli`
--
DROP TABLE IF EXISTS `view_jadwal_dokter_poli`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jadwal_dokter_poli`  AS  select `dokter`.`nama_dokter` AS `nama_dokter`,`dokter`.`foto` AS `foto`,`poli`.`poli` AS `poli`,`daftar_hari`.`hari` AS `hari`,`jadwal`.`jadwal` AS `jadwal` from ((((`hari_kerja_dokter` join `dokter` on((`hari_kerja_dokter`.`id_dokter` = `dokter`.`id_dokter`))) join `poli` on((`dokter`.`id_poli` = `poli`.`id_poli`))) join `daftar_hari` on((`hari_kerja_dokter`.`id_hari` = `daftar_hari`.`id_hari`))) join `jadwal` on((`hari_kerja_dokter`.`id_jadwal` = `jadwal`.`id_jadwal`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `ambulance`
--
ALTER TABLE `ambulance`
  ADD PRIMARY KEY (`id_ambulance`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_registrasi` (`no_registrasi`),
  ADD KEY `no_antrian` (`no_antrian`);

--
-- Indexes for table `daftar_hari`
--
ALTER TABLE `daftar_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `hari_kerja_dokter`
--
ALTER TABLE `hari_kerja_dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dokter` (`id_dokter`,`id_hari`,`id_jadwal`),
  ADD KEY `id_hari` (`id_hari`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `no_antri`
--
ALTER TABLE `no_antri`
  ADD PRIMARY KEY (`no_antrian`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_registrasi`),
  ADD KEY `nik` (`nik`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `req_ambulance`
--
ALTER TABLE `req_ambulance`
  ADD PRIMARY KEY (`id_req_ambulance`),
  ADD KEY `id_ambulance` (`id_ambulance`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `status_obat`
--
ALTER TABLE `status_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `hari_kerja_dokter`
--
ALTER TABLE `hari_kerja_dokter`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_obat`
--
ALTER TABLE `status_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`no_registrasi`) REFERENCES `pasien` (`no_registrasi`),
  ADD CONSTRAINT `antrian_ibfk_2` FOREIGN KEY (`no_antrian`) REFERENCES `no_antri` (`no_antrian`);

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hari_kerja_dokter`
--
ALTER TABLE `hari_kerja_dokter`
  ADD CONSTRAINT `hari_kerja_dokter_ibfk_1` FOREIGN KEY (`id_hari`) REFERENCES `daftar_hari` (`id_hari`),
  ADD CONSTRAINT `hari_kerja_dokter_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `hari_kerja_dokter_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`);

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `akun` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasien_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`);

--
-- Constraints for table `req_ambulance`
--
ALTER TABLE `req_ambulance`
  ADD CONSTRAINT `req_ambulance_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `akun` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `req_ambulance_ibfk_2` FOREIGN KEY (`id_ambulance`) REFERENCES `ambulance` (`id_ambulance`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
