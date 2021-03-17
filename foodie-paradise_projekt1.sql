-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2021 at 10:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodie-paradise_projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulli` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategoria`
--

INSERT INTO `kategoria` (`id`, `titulli`, `image_name`, `featured`, `active`) VALUES
(2, 'Paragjellat', 'Food_Category_930.jpg', 'Po', 'Po');

-- --------------------------------------------------------

--
-- Table structure for table `porosia`
--

CREATE TABLE `porosia` (
  `id` int(10) UNSIGNED NOT NULL,
  `emri_ushqimit` varchar(200) NOT NULL,
  `cmimi` decimal(10,2) NOT NULL,
  `sasia` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `data_porosise` datetime NOT NULL,
  `statusi` varchar(50) NOT NULL,
  `emri_konsumatorit` varchar(100) NOT NULL,
  `numri_telefonit` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `adresa` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `porosia`
--

INSERT INTO `porosia` (`id`, `emri_ushqimit`, `cmimi`, `sasia`, `total`, `data_porosise`, `statusi`, `emri_konsumatorit`, `numri_telefonit`, `email`, `adresa`) VALUES
(1, 'sallate', '2.00', 2, '4.00', '2021-03-16 05:56:18', 'E Derguar', 'Qendresa Berisha', '46577547', 'sdfddsfdsd@reff.com', 'gtgtgrt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `emri` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `emri`, `username`, `password`) VALUES
(3, 'Qendresa Berisha', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `ushqimi`
--

CREATE TABLE `ushqimi` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulli` varchar(100) NOT NULL,
  `pershkrimi` text NOT NULL,
  `cmimi` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ushqimi`
--

INSERT INTO `ushqimi` (`id`, `titulli`, `pershkrimi`, `cmimi`, `image_name`, `kategori_id`, `featured`, `active`) VALUES
(2, 'pica', 'dfgddff', '2.00', 'Food_Name_6072.jpg', 0, 'Po', 'Po'),
(4, 'cheesecake', 'cheesecake', '2.00', 'Food_Name_8662.jpg', 1, 'Po', 'Po');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `porosia`
--
ALTER TABLE `porosia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ushqimi`
--
ALTER TABLE `ushqimi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `porosia`
--
ALTER TABLE `porosia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ushqimi`
--
ALTER TABLE `ushqimi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
