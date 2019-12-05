-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2019 at 07:37 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3
=======
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 11:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40
>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937

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

<<<<<<< HEAD
=======
--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`nik`, `nama`, `tanggal_lahir`, `alamat`, `jenis_kelamin`, `no_telepon`, `foto`, `username`, `password`, `level`) VALUES
('1234567890123456', 'Indrawati', '2019-11-17', 'Jl.Mastrip V No.7', 'Wanita', '085123456342', 'dr-1573741526.jpg', 'indrawati', 'indrawati', '1'),
('350097979797979', 'amy', '2019-11-27', 'jsiskxkxkxkxjxkxkxkxkxkxkxkkxkxk', 'Wanita', '08970605445', 'asdasd.ajpg', 'amy', 'amy', 'pelanggan');

>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937
-- --------------------------------------------------------

--
-- Table structure for table `ambulance`
--

CREATE TABLE `ambulance` (
  `id_ambulance` varchar(5) NOT NULL,
<<<<<<< HEAD
  `ambulance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

=======
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
(7, '2019-11-30 10:35:23', 'PS001', 'P001', '1');

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

>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937
-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(5) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `foto` text NOT NULL,
<<<<<<< HEAD
  `id_poli` varchar(5) NOT NULL,
  `id_jadwal` varchar(5) NOT NULL
=======
  `id_poli` varchar(5) NOT NULL
>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

<<<<<<< HEAD
INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `foto`, `id_poli`, `id_jadwal`) VALUES
('DR01', 'drg.Septyono Heriawan,Sp.Perio', 'dr-1573432960.jpg', 'POLI1', 'JDW01'),
('DR02', 'dr.Hudoyo,Sp.PD', 'dr-1573432960.jpg', 'POLI2', 'JDW02'),
('DR03', 'dr.Sutikno, Sp.JP', 'dr-1573532860.jpg', 'POLI1', 'JDW01');
=======
INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `foto`, `id_poli`) VALUES
('DR001', 'drg.Septyono Heriawan,Sp.Perio', 'dr-1573432960.jpg', 'POLI1'),
('DR002', 'dr.Hudoyo,Sp.PD', 'dr-1573432960.jpg', 'POLI2'),
('DR003', 'dr.Sutikno,Sp.JP', 'dr-1573744869.jpg', 'POLI3');

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
(1, 'DR001', 1, 'JDW01');
>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937

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
<<<<<<< HEAD
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `nik` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

=======
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
('P001', 'tersedia'),
('P002', 'tersedia'),
('P003', 'tersedia'),
('P004', 'tersedia'),
('P005', 'tersedia'),
('P006', 'tersedia'),
('P007', 'tersedia');

>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937
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

<<<<<<< HEAD
=======
--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_registrasi`, `nik`, `id_dokter`, `tanggal`, `keluhan`, `riwayat_sakit`) VALUES
('PS001', '350097979797979', 'DR001', '2019-11-29 05:46:23', 'sakit pusing', 'asdasdasdasd');

>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937
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
<<<<<<< HEAD
  `koordinat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

=======
  `link` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `req_ambulance`
--

INSERT INTO `req_ambulance` (`id_req_ambulance`, `id_ambulance`, `nik`, `keluhan`, `tanggal`, `alamat`, `link`) VALUES
('AL15091901', 'AMBL2', '1234567890123456', 'Kecelakaan mobil dan pendarahan', '2019-11-15 02:51:19', 'Jln.Sumatra No.2', 'https://datatables.net/3/'),
('AL15091902', 'AMBL2', '1234567890123456', 'asdasd', '2019-11-21 04:56:55', 'Perum Milenia Blok D14', 'https://datatables.net/3/');

>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937
-- --------------------------------------------------------

--
-- Table structure for table `status_obat`
--

CREATE TABLE `status_obat` (
<<<<<<< HEAD
=======
  `id_obat` int(11) NOT NULL,
>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937
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
<<<<<<< HEAD
=======
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
>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
<<<<<<< HEAD
  ADD KEY `id_poli` (`id_poli`),
=======
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `hari_kerja_dokter`
--
ALTER TABLE `hari_kerja_dokter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dokter` (`id_dokter`,`id_hari`,`id_jadwal`),
  ADD KEY `id_hari` (`id_hari`),
>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
<<<<<<< HEAD
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `nik` (`nik`);
=======
-- Indexes for table `no_antri`
--
ALTER TABLE `no_antri`
  ADD PRIMARY KEY (`no_antrian`);
>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937

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
<<<<<<< HEAD
  ADD UNIQUE KEY `id_ambulance` (`id_ambulance`),
  ADD UNIQUE KEY `nik` (`nik`);
=======
  ADD KEY `id_ambulance` (`id_ambulance`),
  ADD KEY `nik` (`nik`);
>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937

--
-- Indexes for table `status_obat`
--
ALTER TABLE `status_obat`
<<<<<<< HEAD
  ADD PRIMARY KEY (`no_resep`);
=======
  ADD PRIMARY KEY (`id_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hari_kerja_dokter`
--
ALTER TABLE `hari_kerja_dokter`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `status_obat`
--
ALTER TABLE `status_obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937

--
-- Constraints for dumped tables
--

--
<<<<<<< HEAD
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
=======
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
>>>>>>> aab7e9d37c58f299331b8820ea3ff1f0e7d90937

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
