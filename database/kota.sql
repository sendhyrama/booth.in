-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 04:12 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stand_in`
--

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'PIDIE JAYA'),
(2, 'SIMEULUE'),
(3, 'BIREUEN'),
(4, 'ACEH TIMUR'),
(5, 'ACEH UTARA'),
(6, 'PIDIE'),
(7, 'ACEH BARAT DAYA'),
(8, 'GAYO LUES'),
(9, 'ACEH SELATAN'),
(10, 'ACEH TAMIANG'),
(11, 'ACEH BESAR'),
(12, 'ACEH TENGGARA'),
(13, 'BENER MERIAH'),
(14, 'ACEH JAYA'),
(15, 'LHOKSEUMAWE'),
(16, 'ACEH BARAT'),
(17, 'NAGAN RAYA'),
(18, 'LANGSA'),
(19, 'BANDA ACEH'),
(20, 'ACEH SINGKIL'),
(21, 'SABANG'),
(22, 'ACEH TENGAH'),
(23, 'SUBULUSSALAM'),
(24, 'NIAS SELATAN'),
(25, 'MANDAILING NATAL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
