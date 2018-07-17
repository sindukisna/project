-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2018 at 02:25 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e_uang`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama` varchar(20) NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`kd_user`, `username`, `password`, `nama`) VALUES
(11, 'admin', 'admin', 'administrator'),
(12, 'test', 'test', 'admin'),
(15, 'abi', '123', 'abi galabi'),
(16, 'bayu', '123', 'bayu'),
(17, 'ivan', '123', 'ivan');

-- --------------------------------------------------------

--
-- Table structure for table `uang`
--

CREATE TABLE IF NOT EXISTS `uang` (
  `kode` varchar(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `keluar` varchar(20) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uang`
--

INSERT INTO `uang` (`kode`, `kategori`, `judul`, `tgl`, `jumlah`, `jenis`, `keluar`, `kd_user`, `username`) VALUES
('1', 'Uang', 'Penghasilan Bulanan', '2018-07-09', '5000000', 'Masuk', '', 11, 'admin'),
('1232', 'Uang', 'as', '2018-07-09', '150000', 'Masuk', '', 0, 'test'),
('12vb', 'Uang', 'Usaha', '2018-07-09', '2000000', 'Masuk', '', 0, 'test'),
('1er', 'Penghasilan', 'Gaji Pokok', '2018-07-12', '2700000', 'Masuk', '', 0, 'abi'),
('1gh', 'Pengeluaran', 'beli hdd', '2018-07-09', '', 'Keluar', '800000', 0, 'test'),
('1hj', 'Penghasilan', 'Uang Saku', '2018-07-13', '2000000', 'Masuk', '', 0, 'admin'),
('1V', 'Pengeluaran', 'Bensin', '2018-07-12', '', 'Keluar', '20000', 0, 'admin'),
('2we', 'Penghasilan', 'Uang Bulanan', '2018-07-13', '1500000', 'Masuk', '', 0, 'ivan'),
('90h', 'Pengeluaran', 'minum', '2018-07-09', '', 'Keluar', '150000', 0, 'test'),
('sd', 'Penghasilan', 'Gaji', '2018-07-10', '7000000', 'Masuk', '', 0, 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
