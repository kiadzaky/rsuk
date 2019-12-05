-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 07:37 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `id_ambulance` varchar(5) NOT NULL,
  `ambulance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(5) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `foto` text NOT NULL,
  `id_poli` varchar(5) NOT NULL,
  `id_jadwal` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `foto`, `id_poli`, `id_jadwal`) VALUES
('DR01', 'drg.Septyono Heriawan,Sp.Perio', 'dr-1573432960.jpg', 'POLI1', 'JDW01'),
('DR02', 'dr.Hudoyo,Sp.PD', 'dr-1573432960.jpg', 'POLI2', 'JDW02'),
('DR03', 'dr.Sutikno, Sp.JP', 'dr-1573532860.jpg', 'POLI1', 'JDW01');

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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `nik` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `no_registrasi` varchar(5) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `id_dokter` varchar(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keluhan` text NOT NULL,
  `riwayat_sakit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `keluhan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `alamat` varchar(50) NOT NULL,
  `koordinat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status_obat`
--

CREATE TABLE `status_obat` (
  `no_resep` varchar(5) NOT NULL,
  `jml_obat` varchar(2) NOT NULL,
  `status` enum('belum terproses','dirproses','selesai','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`no_registrasi`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `nik` (`nik`);

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
  ADD UNIQUE KEY `id_ambulance` (`id_ambulance`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `status_obat`
--
ALTER TABLE `status_obat`
  ADD PRIMARY KEY (`no_resep`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokter_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `akun` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pasien_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `akun` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

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
