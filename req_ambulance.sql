-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 08:33 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `req_ambulance`
--
ALTER TABLE `req_ambulance`
  ADD PRIMARY KEY (`id_req_ambulance`),
  ADD KEY `id_ambulance` (`id_ambulance`),
  ADD KEY `nik` (`nik`);

--
-- Constraints for dumped tables
--

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
