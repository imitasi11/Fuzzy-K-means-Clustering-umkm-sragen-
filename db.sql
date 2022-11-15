-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 08:47 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cluster`
--

CREATE TABLE IF NOT EXISTS `cluster` (
  `id_cluster` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `omset` float NOT NULL,
  `aset` float NOT NULL,
  `tenaga` float NOT NULL,
  PRIMARY KEY (`id_cluster`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cluster`
--

INSERT INTO `cluster` (`id_cluster`, `nama`, `omset`, `aset`, `tenaga`) VALUES
(1, 'Mikro', 1, 1, 1),
(2, 'Kecil', 6.35, 2.49, 6.4),
(3, 'Menengah', 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `bidang_usaha` varchar(50) NOT NULL,
  `omset` float NOT NULL,
  `aset` float NOT NULL,
  `tenaga` float NOT NULL,
  `cluster` int(11) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`id_data`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id_data`, `nama`, `nama_usaha`, `bidang_usaha`, `omset`, `aset`, `tenaga`, `cluster`, `lat`, `lng`) VALUES
(1, 'Darsih', 'WARUNG KELONTONG DARSIH', 'PERDAGANGAN', 144000000, 50000000, 1, 1, -7.475294, 110.974372),
(2, 'Sugiyani', 'WARUNG KELONTONG SUGIYANI', 'PERDAGANGAN', 120000000, 50000000, 1, 1, -7.473188, 110.972763),
(3, 'Parmin', 'WEDEL PARMIN', 'INDUSTRI', 96000000, 20000000, 1, 1, -7.474315, 110.992568),
(4, 'Sukini', 'PEDAGANG BERAS SUKINI', 'PERDAGANGAN', 120000000, 50000000, 1, 1, -7.466826, 110.967012),
(5, 'Surijo', 'INDUSTRI PISAU SURIJO', 'INDUSTRI', 72000000, 5000000, 2, 1, -7.461452, 110.974367),
(6, 'Pardi', 'TERNAK LABET', 'PERDAGANGAN', 2400000000, 100000000, 3, 2, -7.461239, 110.984624),
(7, 'Sumarto', 'INDUSTRI PISAU SUMARTO', 'INDUSTRI', 48000000, 3000000, 2, 1, -7.463873, 110.980312),
(8, 'Sugiyanto', 'TOKO KELONTONG SUGIYANTO', 'PERDAGANGAN', 72000000, 3000000, 2, 1, -7.460276, 110.978814),
(9, 'Kasono', 'BENGKEL SEPEDA KASONO', 'JASA LAIN', 31200000, 10000000, 1, 1, -7.461378, 110.973837),
(10, 'Joko Kristanto', 'TOKO PUTRA PELANGI', 'PERDAGANGAN', 62400000, 50000000, 4, 1, -7.448306, 110.991272),
(11, 'Priyanto', 'BENGKEL PURNAMA MOTOR', 'JASA LAIN', 62400000, 20000000, 3, 1, -7.47257, 111.001907),
(12, 'Daliman', 'BENGKEL CAT MOBIL DALIMAN', 'JASA LAIN', 46800000, 15000000, 2, 1, -7.44044, 111.022938),
(13, 'Mugiyarti', 'WARUNG MUGIYARTI', 'MAKANAN&MINUMAN', 109200000, 2000000, 1, 1, -7.471401, 111.001276),
(14, 'Wiji', 'KELONTONG WIJI', 'PERDAGANGAN', 93600000, 2000000, 1, 1, -7.453007, 110.999813),
(15, 'Sutrisno', 'ROSOK SUTRIS', 'PERDAGANGAN', 109200000, 15000000, 1, 1, -7.450001, 111.000312),
(16, 'Warno', 'PRODUKSI JAMU JUMINAH', 'INDUSTRI', 78000000, 1000000, 1, 1, -7.467839, 111.009616),
(17, 'Suyadi', 'REPARASI SEPEDA SUYADI', 'JASA LAIN', 81600000, 10000000, 1, 1, -7.444202, 110.997457),
(18, 'Drs.Irvan', 'TOKO INDHI', 'PERDAGANGAN', 1440000000, 50000000, 7, 2, -7.44491, 111.004519),
(19, 'Tugiyo', 'WARUNG KELONTONG TUGIYO', 'PERDAGANGAN', 192000000, 25000000, 2, 1, -7.454854, 111.008253),
(20, 'Suratmi', 'TOKO KELONTONG SPRING SURATMI', 'PERDAGANGAN', 192000000, 25000000, 2, 1, -7.466195, 111.025614),
(21, 'Sunarti', 'JUAL MARTABAK BULAN SUNARTI', 'INDUSTRI', 31200000, 3000000, 2, 1, -7.450877, 111.021794),
(22, 'Minem', 'INDUSTRI TEMPE MINEM', 'INDUSTRI', 31200000, 17500000, 2, 1, -7.452173, 111.024647),
(23, 'Mariyam', 'WARUNG KELONTONG MARIAM', 'PERDAGANGAN', 31200000, 1000000, 1, 1, -7.450503, 111.027715),
(24, 'Puryanti', 'TOKO PURYANTI', 'PERDAGANGAN', 31200000, 10000000, 2, 1, -7.461828, 111.029031),
(25, 'Suwanti', 'BOEDIR PAKAIAN SUWANTI', 'INDUSTRI', 218000000, 3000000, 1, 1, -7.463758, 111.049012),
(26, 'Suratmi', 'WARUNG MAKAN SURATMI', 'MAKANAN&MINUMAN', 156000000, 2000000, 1, 1, -7.470275, 111.053834),
(27, 'Sukadi', 'DAGANG ALAT DAPUR SUKADI', 'PERDAGANGAN', 280800000, 10000000, 1, 1, -7.454222, 111.071376),
(28, 'Bu Painem', 'WARUNG KELONTONG BU PAINEM', 'PERDAGANGAN', 218400000, 5000000, 2, 1, -7.462324, 111.065393),
(29, 'Sukinem', 'WARUNG KELONTONG SUKINEM', 'PERDAGANGAN', 240000000, 30000000, 2, 1, -7.451261, 111.056572),
(30, 'Arika', 'INDUSTRI JAMU TRADISIONAL/BERAS', 'INDUSTRI', 240000000, 20000000, 1, 1, -7.449048, 111.055091),
(31, 'Abbas Soiman', 'TOKO KELONTONG ABBAS', 'PERDAGANGAN', 156000000, 25000000, 2, 1, -7.442881, 111.056694),
(32, 'Joko Paryanto', 'DAGANG SAPI', 'PERDAGANGAN', 2400000000, 600000000, 2, 3, -7.455453, 111.065074),
(33, 'Suryadi', 'TOKO KELONTONG CANDI MARKET', 'PERDAGANGAN', 720000000, 500000000, 2, 2, -7.434089, 111.02937),
(34, 'Toma Afriantoro', 'TOKO MEBEL BINTANG BARU', 'PERDAGANGAN', 180000000, 200000000, 2, 1, -7.448064, 111.045556),
(35, 'Warso Suwito', 'INDUSTRI BATU BATA WARSO', 'INDUSTRI', 120000000, 7000000, 2, 1, -7.445692, 111.048206),
(36, 'Sukimin', 'INDUSTRI BATU MERAH SUKIMIN', 'INDUSTRI', 300000000, 20000000, 2, 1, -7.43104, 111.04162),
(37, 'Sutarno', 'TOKO KELONTONG BANJIR SUTARNO', 'PERDAGANGAN', 60000000, 25000000, 2, 1, -7.441149, 111.010855),
(38, 'Partiwi', 'TOKO KELONTONG PARTIWI', 'PERDAGANGAN', 60000000, 30000000, 2, 1, -7.442824, 111.022244),
(39, 'Ari Budi Harjo', 'BENGKEL SEPEDA MOTOR ARI BUDI HARJO', 'JASA LAIN', 36000000, 40000000, 2, 1, -7.445608, 111.029092),
(40, 'Darmi', 'INDUSTRI BATA MERAH DARMI', 'INDUSTRI', 60000000, 25000000, 2, 1, -7.434376, 111.027341);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user` varchar(25) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user`, `pass`) VALUES
('admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
