-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 10:15 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mahasiswa`
--

CREATE TABLE `kelas_mahasiswa` (
  `mhs_id` char(14) NOT NULL,
  `kls_id` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas_mahasiswa`
--

INSERT INTO `kelas_mahasiswa` (`mhs_id`, `kls_id`) VALUES
('05111940000035', 'IF18450421B'),
('05111940000035', 'IF18450621B'),
('05111940000044', 'IF18450221E'),
('05111940000044', 'IF18450321A'),
('05111940000044', 'IF18450421B'),
('05111940000044', 'IF18450521A'),
('05111940000044', 'IF18450621B');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
  ADD PRIMARY KEY (`mhs_id`,`kls_id`),
  ADD KEY `kls_id` (`kls_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kelas_mahasiswa`
--
ALTER TABLE `kelas_mahasiswa`
  ADD CONSTRAINT `kelas_mahasiswa_ibfk_1` FOREIGN KEY (`mhs_id`) REFERENCES `mahasiswa` (`mhs_id`),
  ADD CONSTRAINT `kelas_mahasiswa_ibfk_2` FOREIGN KEY (`kls_id`) REFERENCES `kelas` (`kls_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
