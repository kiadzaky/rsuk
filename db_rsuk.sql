-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2020 at 06:18 PM
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
(7, 'minggu');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` varchar(5) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `id_poli` varchar(6) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `id_poli`, `id_jadwal`, `keterangan`) VALUES
('DR001', 'dr.Hudoyo', 'POLI1', 1, 'bpjs'),
('DR002', 'dr.Ali Santosa', 'POLI1', 2, 'Umum'),
('DR003', 'dr.Atika', 'POLI1', 3, 'BPJS');

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
  `id_jadwal` int(11) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `mulai` varchar(5) NOT NULL,
  `selesai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `mulai`, `selesai`) VALUES
(1, 'Senin - Jumat', '16.30', '21.00'),
(2, 'Rabu', '16.30', '21.00'),
(3, 'Selasa & Kamis', '19.30', '20.30'),
(4, 'Rabu - Jumat', '09.00', '11.00'),
(5, 'Senin - Jumat', '14.00', '16.00'),
(6, 'Jumat', '16.00', '18.00'),
(7, 'Sabtu & Minggu', '08.00', '10.00'),
(8, 'Senin - Rabu', '06.00', '08.00'),
(9, 'Selasa & Kamis', '06.00', '08.00'),
(10, 'Kamis', '15.00', '17.00'),
(11, 'Jumat', '06.00', '08.00'),
(12, 'Rabu & Jumat', '06.00', '08.00'),
(13, 'Senin - Jumat', '09.00', '11.00'),
(14, 'Senin - Jumat', '16.30', '18.00'),
(15, 'Sabtu', '09.00', '11.00'),
(16, 'Selasa & Kamis', '14.00', '16.00'),
(17, 'Senin', '19.00', '21.00'),
(18, 'Selasa & Jumat', '19.00', '21.00'),
(19, 'Kamis & Jumat', '19.00', '21.00'),
(20, 'Senin - Jumat', '09.00', '11.00'),
(21, 'Selasa & Jumat', '14.00', '16.00'),
(22, 'Senin & Rabu', '19.00', '21.00'),
(23, 'Selasa & Kamis', '19.00', '21.00'),
(24, 'Selasa - Kamis', '06.00', '09.00'),
(25, 'Rabu & Jumat', '14.00', '17.00'),
(26, 'Senin & Rabu & Jumat', '16.00', '18.00'),
(27, 'Selasa & Kamis', '09.00', '12.00'),
(28, 'Selasa & Rabu', '13.00', '15.00');

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
  `id_poli` varchar(6) NOT NULL,
  `poli` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `poli`) VALUES
('POLI1', 'Penyakit Dalam'),
('POLI10', 'THT'),
('POLI11', 'Kulit dan Kelamin'),
('POLI12', 'Anak'),
('POLI13', 'Bedah Saraf'),
('POLI14', 'Rehabilitasi Medik'),
('POLI15', 'Poli Gigi (Spesialis Bedah Mul'),
('POLI16', 'Poli Gigi (Spesialis Periodonsi)'),
('POLI17', 'Poli Gigi ( Spesialis Endodonsi)'),
('POLI2', 'Jantung'),
('POLI3', 'Orthopedi'),
('POLI4', 'Bedah Umum'),
('POLI5', 'Saraf'),
('POLI6', 'Paru'),
('POLI7', 'Mata'),
('POLI8', 'Kandungan '),
('POLI9', 'Urologi');

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
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_jadwal` (`id_jadwal`);

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
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
-- Constraints for table `hari_kerja_dokter`
--
ALTER TABLE `hari_kerja_dokter`
  ADD CONSTRAINT `hari_kerja_dokter_ibfk_1` FOREIGN KEY (`id_hari`) REFERENCES `daftar_hari` (`id_hari`),
  ADD CONSTRAINT `hari_kerja_dokter_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);

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
