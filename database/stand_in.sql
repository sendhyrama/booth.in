-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 20, 2022 at 11:05 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stand.in`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID_ADMIN` varchar(10) NOT NULL,
  `NAMA_ADMIN` varchar(50) DEFAULT NULL,
  `EMAIL_ADMIN` varchar(50) DEFAULT NULL,
  `USERNAME_ADMIN` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `PASSWORD_ADMIN` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FOTO_ADMIN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `EMAIL_ADMIN`, `USERNAME_ADMIN`, `PASSWORD_ADMIN`, `FOTO_ADMIN`) VALUES
('ADM001', 'Bagas Tarangga', 'bagastarangga@gmail.com', 'bagas', 'bagas123', 'https://if.fm/4LZ'),
('ADM002', 'Rangga Saputra', 'ranggasaputra@gmail.com', 'rangga', 'rangga123', 'https://if.fm/4LZ'),
('ADM003', 'Hakim', 'hakim@gmail.com', 'hakim', 'hakim123', 'https://if.fm/4LZ');

-- --------------------------------------------------------

--
-- Table structure for table `bahan_stand`
--

DROP TABLE IF EXISTS `bahan_stand`;
CREATE TABLE IF NOT EXISTS `bahan_stand` (
  `ID_BAHAN` varchar(10) NOT NULL,
  `NAMA_BAHAN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_BAHAN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bahan_stand`
--

INSERT INTO `bahan_stand` (`ID_BAHAN`, `NAMA_BAHAN`) VALUES
('BHN001', 'Besi'),
('BHN002', 'Kayu'),
('BHN003', 'Aluminium'),
('BHN004', 'Spandek');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_stand`
--

DROP TABLE IF EXISTS `jenis_stand`;
CREATE TABLE IF NOT EXISTS `jenis_stand` (
  `ID_JENIS` varchar(10) NOT NULL,
  `NAMA_JENIS` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`ID_JENIS`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_stand`
--

INSERT INTO `jenis_stand` (`ID_JENIS`, `NAMA_JENIS`) VALUES
('JNS001', 'Makanan'),
('JNS002', 'Minuman'),
('JNS003', 'Makanan & Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `kelola_user`
--

DROP TABLE IF EXISTS `kelola_user`;
CREATE TABLE IF NOT EXISTS `kelola_user` (
  `ID_ADMIN` varchar(10) NOT NULL,
  `ID_USER` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_ADMIN`,`ID_USER`),
  KEY `FK_KELOLA_USER2` (`ID_USER`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kelola_user`
--

INSERT INTO `kelola_user` (`ID_ADMIN`, `ID_USER`) VALUES
('ADM001', 'USR001'),
('ADM001', 'USR002'),
('ADM001', 'USR003'),
('ADM002', 'USR001'),
('ADM002', 'USR002'),
('ADM002', 'USR003'),
('ADM003', 'USR001'),
('ADM003', 'USR002'),
('ADM003', 'USR003');

-- --------------------------------------------------------

--
-- Table structure for table `stand`
--

DROP TABLE IF EXISTS `stand`;
CREATE TABLE IF NOT EXISTS `stand` (
  `ID_STAND` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ID_USER` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ID_JENIS` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ID_BAHAN` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `JUDUL` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FOTO_STAND` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `DESKRIPSI` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `UKURAN` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `HARGA_STAND` int DEFAULT NULL,
  `ALAMAT` varchar(50) DEFAULT NULL,
  `KOTA` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_STAND`),
  KEY `FK_MENYEWAKAN` (`ID_USER`),
  KEY `FK_BERISI` (`ID_JENIS`),
  KEY `FK_BERISIKAN` (`ID_BAHAN`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stand`
--

INSERT INTO `stand` (`ID_STAND`, `ID_USER`, `ID_JENIS`, `ID_BAHAN`, `JUDUL`, `FOTO_STAND`, `DESKRIPSI`, `UKURAN`, `HARGA_STAND`, `ALAMAT`, `KOTA`, `STATUS`) VALUES
('STD001', 'USR001', 'JNS002', 'BHN004', 'Stand 6 x 6 Cocok untuk Jual Minuman', 'https://if.fm/AY6', 'Lorem ipsum dolor sit amet.', '6 x 6', 800000, 'Jl. Tenggilis Mejoyo Timur No. 79', 'Surabaya', 'Verified'),
('STD002', 'USR002', 'JNS001', 'BHN004', 'Disewakan Stand Lokasi Strategis', 'https://if.fm/AY6', 'Lorem ipsum dolor sit amet.', '6 x 6', 500000, 'Jl. Karang Menjangan No. 21', 'Surabaya', 'Verified'),
('STD003', 'USR003', 'JNS003', 'BHN001', 'Sewa Stand Makanan Murah', 'https://if.fm/AY6', 'Lorem ipsum dolor sit amet.', '6 x 6', 400000, 'Jl. Kapas Krampung No. 40', 'Surabaya', 'Verified'),
('STD004', 'USR001', 'JNS003', 'BHN002', 'Sewa Stand Murah Meriah', 'https://if.fm/AY6', 'Lorem ipsum dolor sit amet.', '6 x 6', 600000, 'Jl. Semolowaru Timur No. 40', 'Surabaya', 'Verified'),
('STD005', 'USR002', 'JNS001', 'BHN003', 'Stand Makanan Murah', 'https://if.fm/AY6', 'Lorem ipsum dolor sit amet.', '6 x 6', 300000, 'Jl. Rungkut Asri Timur No. 21', 'Surabaya', 'Verified'),
('STD006', 'USR003', 'JNS003', 'BHN004', 'Stand Murah, Lokasi Strategis', 'https://if.fm/AY6', 'Lorem ipsum dolor sit amet.', '6 x 6', 300000, 'Jl. Gunung Anyar No. 11', 'Surabaya', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NAMA_USER` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `EMAIL_USER` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `USERNAME_USER` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `PASSWORD_USER` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `FOTO_USER` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `NO_TELP_USER` varchar(13) DEFAULT NULL,
  `ALAMAT_USER` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `EMAIL_USER`, `USERNAME_USER`, `PASSWORD_USER`, `FOTO_USER`, `NO_TELP_USER`, `ALAMAT_USER`) VALUES
('USR001', 'Adam Rachman', 'adam@gmail.com', 'adam', 'adam123', 'https://if.fm/F4K', '08123456789', 'Jl. Rungkut Harapan No. 12'),
('USR002', 'Sendhy Ramadhinata', 'sendhy@gmail.com', 'sendhy', 'sendhy123', 'https://if.fm/F4K', '08123456788', 'Jl. Raya Prapen No. 3'),
('USR003', 'Abiyoga Dwi', 'abiyoga@gmail.com', 'abiyoga', 'abiyoga123', 'https://if.fm/F4K', '08123456787', 'Jl. HR Muhammad No. 8');

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi_stand`
--

DROP TABLE IF EXISTS `verifikasi_stand`;
CREATE TABLE IF NOT EXISTS `verifikasi_stand` (
  `ID_ADMIN` varchar(10) NOT NULL,
  `ID_STAND` varchar(10) NOT NULL,
  PRIMARY KEY (`ID_ADMIN`,`ID_STAND`),
  KEY `FK_VERIFIKASI_STAND2` (`ID_STAND`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `verifikasi_stand`
--

INSERT INTO `verifikasi_stand` (`ID_ADMIN`, `ID_STAND`) VALUES
('ADM001', 'STD001'),
('ADM001', 'STD002'),
('ADM001', 'STD003'),
('ADM002', 'STD001'),
('ADM002', 'STD002'),
('ADM002', 'STD003'),
('ADM003', 'STD001'),
('ADM003', 'STD002'),
('ADM003', 'STD003');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
