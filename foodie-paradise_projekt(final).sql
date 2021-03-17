-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 07:23 PM
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
(5, 'Paragjellat', 'Food_Category_251.jpg', 'Po', 'Po'),
(6, 'Sallatat', 'Food_Category_9.jpg', 'Po', 'Po'),
(7, 'Specialitet', 'Food_Category_488.jpg', 'Po', 'Po'),
(8, 'Ëmbëlsirat', 'Food_Category_938.jpg', 'Po', 'Po'),
(9, 'Pijet', 'Food_Category_860.png', 'Po', 'Po');

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
(2, 'Supë Pule', '4.00', 1, '4.00', '2021-03-17 06:47:28', 'E Derguar', 'Qendresa Berisha', '049212113', 'ads@gmail.com', 'Prishtine'),
(3, 'Sallatë me Bizele', '2.00', 1, '2.00', '2021-03-17 06:50:08', 'E Derguar', 'Qendresa Berisha', '044234567', 'asas@gmail.com', 'Prishtine'),
(4, 'Biftek', '20.00', 1, '20.00', '2021-03-17 06:53:02', 'E Derguar', 'Qendresa Berisha', '044213245', 'asxs@gmail.com', 'Prishtine'),
(5, 'Ëmbëlsirë me Çokollatë', '3.00', 1, '3.00', '2021-03-17 06:53:54', 'E Derguar', 'Qendresa Berisha', '049232332', 'grrer@gmai.com', 'Prishtine'),
(6, 'Lëngje Frutash', '1.00', 1, '1.00', '2021-03-17 06:54:30', 'E Derguar', 'Qendresa Berisha', '044121434', 'ascg@gmail.com', 'Prishtine');

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
(3, 'Qendresa Berisha', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(4, 'Diellza Hodaj', 'admin1', '21232f297a57a5a743894a0e4a801fc3');

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
(5, 'Supë me Karrotë', 'Supë me karrota patate dhe brokoli', '3.00', 'Food_Name_9949.jpg', 5, 'Po', 'Po'),
(6, 'Supë me Spinaq', 'Supë me spinaq dhe perime', '3.00', 'Food_Name_5465.jpg', 5, 'Po', 'Po'),
(7, 'Supë Pule', 'Supë me mish pule dhe perime', '4.00', 'Food_Name_6468.jpg', 5, 'Po', 'Po'),
(8, 'Sallatë Sezonale', 'Sallatë me perime sezonale', '2.00', 'Food_Name_1045.jpg', 6, 'Po', 'Po'),
(9, 'Sallatë Pule', 'Sallatë pule dhe me perime', '2.00', 'Food_Name_9413.jpg', 6, 'Po', 'Po'),
(10, 'Sallatë me Bizele', 'Sallatë me bizele dhe perime të tjera', '2.00', 'Food_Name_1270.jpg', 6, 'Po', 'Po'),
(11, 'Biftek', 'Biftek me patate dhe sos', '20.00', 'Food_Name_2306.jpg', 7, 'Po', 'Po'),
(12, 'Mish Pule me Rizoto', 'Mish pule me rizoto dhe perime', '15.00', 'Food_Name_9871.jpg', 7, 'Po', 'Po'),
(13, 'Mix Mish', 'Mish viçi dhe pule', '25.00', 'Food_Name_443.jpg', 7, 'Po', 'Po'),
(14, 'Brinjë', 'Brinjë viçi me sos dhe perime', '30.00', 'Food_Name_8325.jpg', 7, 'Po', 'Po'),
(15, 'Ëmbëlsirë me Çokollatë', 'Ëmbëlsirë me çokollatë', '3.00', 'Food_Name_9788.jpg', 8, 'Po', 'Po'),
(16, 'Cheesecake', 'Ëmbëlsirë me fruta mali dhe djath maskarpone', '3.00', 'Food_Name_8078.jpg', 8, 'Po', 'Po'),
(17, 'Ëmbëlsirë me Manaferra', 'Ëmbëlsirë me manaferra', '3.00', 'Food_Name_2884.jpg', 8, 'Po', 'Po'),
(18, 'Kafe', '', '1.00', 'Food_Name_4216.jpg', 9, 'Po', 'Po'),
(19, 'Lëngje Frutash', '', '1.00', 'Food_Name_7464.jpg', 9, 'Po', 'Po'),
(20, 'Lëngje të Gazuara', '', '1.00', 'Food_Name_5679.jpg', 9, 'Po', 'Po'),
(21, 'Çajra të ndryshëm', '', '1.00', 'Food_Name_6583.jpg', 9, 'Po', 'Po'),
(22, 'Verë e Kuqe', '', '4.00', 'Food_Name_6968.jpg', 9, 'Po', 'Po'),
(23, 'Verë e Bardhë', '', '4.00', 'Food_Name_7644.jpg', 9, 'Po', 'Po'),
(24, 'Shampanjë', '', '25.00', 'Food_Name_3324.jpg', 9, 'Po', 'Po');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `porosia`
--
ALTER TABLE `porosia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ushqimi`
--
ALTER TABLE `ushqimi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
