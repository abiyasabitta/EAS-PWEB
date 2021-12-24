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
-- Table structure for table `tugas`
--

CREATE TABLE `tugas` (
  `tgs_id` int(11) NOT NULL,
  `kls_id` char(11) NOT NULL,
  `tgs_ke` int(11) NOT NULL,
  `tgs_nama` varchar(255) NOT NULL,
  `tgs_deskripsi` text NOT NULL,
  `tgs_url` varchar(255) DEFAULT NULL,
  `tgs_file` varchar(255) DEFAULT NULL,
  `tgs_deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tugas`
--

INSERT INTO `tugas` (`tgs_id`, `kls_id`, `tgs_ke`, `tgs_nama`, `tgs_deskripsi`, `tgs_url`, `tgs_file`, `tgs_deadline`) VALUES
(1, 'IF18450421B', 1, 'Membuat Curriculum Vitae', 'Buatlah static website dengan menggunakan HTML. Konten dari website yang dibuat adalah CV kalian, bisa berisi deskripsi diri, pendidikan, pengalaman, hingga kontak. Pengumpulan berupa link dokumentasi yang dipost pada blog.', 'http://fajarbaskoro.blogspot.com/2018/03/pweb-2-1-hyper-text-markup-language.html', '', '2021-09-07 23:59:59'),
(2, 'IF18450421B', 2, 'Membuat Profil Diri', 'Buatlah website profil diri menggunakan HTML dan CSS. Pengumpulan bisa berupa file website yang dizip.', 'http://fajarbaskoro.blogspot.com/2018/03/pweb-2-1-hyper-text-markup-language.html', NULL, '2021-09-14 23:59:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`tgs_id`),
  ADD KEY `kls_id` (`kls_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tugas`
--
ALTER TABLE `tugas`
  MODIFY `tgs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tugas`
--
ALTER TABLE `tugas`
  ADD CONSTRAINT `tugas_ibfk_1` FOREIGN KEY (`kls_id`) REFERENCES `kelas` (`kls_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
