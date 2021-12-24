-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 10:14 AM
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
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kls_id` char(11) NOT NULL,
  `kls_nama` varchar(64) NOT NULL,
  `kls_hari` varchar(6) NOT NULL,
  `kls_jamstart` time NOT NULL,
  `kls_jamend` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kls_id`, `kls_nama`, `kls_hari`, `kls_jamstart`, `kls_jamend`) VALUES
('IF18450221E', 'Grafika Komputer (E)', 'Rabu', '13:30:00', '15:20:00'),
('IF18450321A', 'Kecerdasan Komputasional (A)', 'Senin', '07:00:00', '09:50:00'),
('IF18450421B', 'Pemrograman Web (B)', 'Rabu', '10:00:00', '12:50:00'),
('IF18450521A', 'Jaringan Komputer (A)', 'Senin', '10:00:00', '12:50:00'),
('IF18450621B', 'Manajemen Proyek Perangkat Lunak (B)', 'Selasa', '10:00:00', '12:50:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kls_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
