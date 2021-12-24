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
-- Table structure for table `tugas_mahasiswa`
--

CREATE TABLE `tugas_mahasiswa` (
  `tgs_id` int(11) NOT NULL,
  `mhs_id` char(14) NOT NULL,
  `tm_nama_url` varchar(255) DEFAULT NULL,
  `tm_url` varchar(255) DEFAULT NULL,
  `tm_display_file` varchar(255) DEFAULT NULL,
  `tm_file` varchar(255) DEFAULT NULL,
  `tm_status` varchar(17) NOT NULL,
  `tm_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas_mahasiswa`
--

INSERT INTO `tugas_mahasiswa` (`tgs_id`, `mhs_id`, `tm_nama_url`, `tm_url`, `tm_display_file`, `tm_file`, `tm_status`, `tm_nilai`) VALUES
(1, '05111940000044', 'Link Dokumentasi', 'https://auliaaepa.blogspot.com/2021/09/tugas-1-pembuatan-static-website.html', NULL, NULL, 'menunggu dinilai', 90),
(2, '05111940000044', NULL, NULL, NULL, NULL, 'belum dikumpulkan', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tugas_mahasiswa`
--
ALTER TABLE `tugas_mahasiswa`
  ADD PRIMARY KEY (`tgs_id`,`mhs_id`),
  ADD KEY `mhs_id` (`mhs_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tugas_mahasiswa`
--
ALTER TABLE `tugas_mahasiswa`
  ADD CONSTRAINT `tugas_mahasiswa_ibfk_1` FOREIGN KEY (`tgs_id`) REFERENCES `tugas` (`tgs_id`),
  ADD CONSTRAINT `tugas_mahasiswa_ibfk_2` FOREIGN KEY (`mhs_id`) REFERENCES `mahasiswa` (`mhs_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
