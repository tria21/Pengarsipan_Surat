-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 08:31 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengarsipan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_surat`
--

CREATE TABLE `tb_surat` (
  `id` int(11) NOT NULL,
  `nomor_surat` varchar(255) NOT NULL,
  `judul_surat` varchar(255) NOT NULL,
  `kategori_surat` varchar(255) NOT NULL,
  `file_surat` varchar(255) NOT NULL,
  `waktu_pengarsipan` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_surat`
--

INSERT INTO `tb_surat` (`id`, `nomor_surat`, `judul_surat`, `kategori_surat`, `file_surat`, `waktu_pengarsipan`) VALUES
(18, '1509', 'Undangan Peresmian Kantor', 'Undangan', 'SITI AMALIA FITRIANI E-Sertifikat Sarasehan PKM 2020.pdf', '2022-09-15 21:19:09'),
(19, '1510', 'Libur Lebaran', 'Undangan', 'Assessment - FR. MUK.02. PERTANYAAN UNTUK MENDUKUNG OBSERVASI.pdf', '2022-09-16 13:04:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_surat`
--
ALTER TABLE `tb_surat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_surat`
--
ALTER TABLE `tb_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
