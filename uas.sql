-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2020 at 03:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_detail`
--

CREATE TABLE `pengiriman_detail` (
  `Id` int(11) NOT NULL,
  `itemDesc` char(50) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Satuan` char(50) NOT NULL,
  `GoodCategory` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman_detail`
--

INSERT INTO `pengiriman_detail` (`Id`, `itemDesc`, `Qty`, `Satuan`, `GoodCategory`) VALUES
(11, 'Ban Mobil', 20, 'Pcs', 'Non DG'),
(12, 'Keyboard Asus', 1, 'Pcs', 'Non DG'),
(13, 'Ban Mobil', 5, 'Pcs', 'DG'),
(14, 'Ban Motor', 10, 'Pcs', 'Non DG'),
(15, 'Ban Mobil', 20, 'Pcs', 'DG'),
(16, 'Obat Serangga', 100, 'Pcs', 'DG'),
(17, 'Keyboard Razer', 20, 'Pcs', 'Non DG'),
(18, 'Sayur', 100, 'Pcs', 'DG');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman_header`
--

CREATE TABLE `pengiriman_header` (
  `pengirimanId` char(15) NOT NULL,
  `requestType` char(15) NOT NULL,
  `portOrigin` char(10) NOT NULL,
  `PortDestination` char(10) NOT NULL,
  `shipmenMode` char(15) NOT NULL,
  `Weight` int(11) NOT NULL,
  `Dimension` char(30) NOT NULL,
  `RequestDate` date NOT NULL,
  `RequestBy` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengiriman_header`
--

INSERT INTO `pengiriman_header` (`pengirimanId`, `requestType`, `portOrigin`, `PortDestination`, `shipmenMode`, `Weight`, `Dimension`, `RequestDate`, `RequestBy`) VALUES
('0001', 'Import', 'CGK', 'SUB', 'Air', 20, '2x3 m', '2020-08-07', 'admin'),
('0002', 'Choose...', 'DPS', 'RUH', 'Air', 30, '5x4 m', '2020-08-07', 'admin'),
('0003', 'Import', 'DPS', 'CGK', 'Sea', 30, '5x6 m', '2020-08-07', 'Rani');

-- --------------------------------------------------------

--
-- Table structure for table `port_list`
--

CREATE TABLE `port_list` (
  `port_id` char(20) NOT NULL,
  `port_country` char(30) NOT NULL,
  `port_name` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `port_list`
--

INSERT INTO `port_list` (`port_id`, `port_country`, `port_name`) VALUES
('CGK', 'Indonesia', 'Soekarno Hatta'),
('DPS', 'Indonesia', 'Ngurah Rai International'),
('RUH', 'Arab Saudi', 'King Khalid International'),
('SUB', 'Indonesia', 'Juanda Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(15) NOT NULL,
  `name` char(30) NOT NULL,
  `level` char(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `level`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'user', 'user', 'ee11cbb19052e40b07aac0ca060c23ee'),
(3, 'Rani', 'user', 'b9f81618db3b0d7a8be8fd904cca8b6a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengiriman_detail`
--
ALTER TABLE `pengiriman_detail`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pengiriman_header`
--
ALTER TABLE `pengiriman_header`
  ADD PRIMARY KEY (`pengirimanId`);

--
-- Indexes for table `port_list`
--
ALTER TABLE `port_list`
  ADD PRIMARY KEY (`port_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengiriman_detail`
--
ALTER TABLE `pengiriman_detail`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
