-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 06:02 PM
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
-- Database: `db_rsuk_ambl`
--

-- --------------------------------------------------------

--
-- Table structure for table `req_ambulance`
--

CREATE TABLE `req_ambulance` (
  `id_req_ambulance` int(11) NOT NULL,
  `id_ambulance` varchar(5) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keluhan` text NOT NULL,
  `link` varchar(30) NOT NULL,
  `status_req` enum('0','1','2','3','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_ambulance`
--

INSERT INTO `req_ambulance` (`id_req_ambulance`, `id_ambulance`, `nik`, `alamat`, `no_hp`, `tanggal`, `keluhan`, `link`, `status_req`) VALUES
(13, 'AMBL2', '1234567890123456', 'Talangsari no 20', '0897644289', '2020-01-13 16:29:17', 'Kecelakaan patah tulang', '-9.347684, 100.763984', '1'),
(14, 'AMBL2', '350097979797979', 'Jl Jawa no 31', '0892276823', '2020-01-13 16:29:19', 'Gagar otak', '-8.181627, 113.675071', '1'),
(15, 'AMBL1', '350097979797979', 'Jln.Sumatra No.2', '085567765453', '2020-01-13 16:34:50', '', '-6.2367487, 23.738378', '1');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `req_ambulance`
--
ALTER TABLE `req_ambulance`
  MODIFY `id_req_ambulance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
