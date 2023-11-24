-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 11:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_pendataan_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_camp`
--

CREATE TABLE `table_camp` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_camp`
--

INSERT INTO `table_camp` (`username`, `password`) VALUES
('0', '0'),
('Gym', '1sampe4'),
('iky', '123456789'),
('ilham camp', 'anjay'),
('No Mercy', 'adad');

-- --------------------------------------------------------

--
-- Table structure for table `table_member`
--

CREATE TABLE `table_member` (
  `Name` varchar(30) NOT NULL,
  `Class` varchar(100) NOT NULL,
  `Train` varchar(100) NOT NULL,
  `Session` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Expired_Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_member`
--

INSERT INTO `table_member` (`Name`, `Class`, `Train`, `Session`, `Date`, `Expired_Date`) VALUES
('Joseph', 'Kickboxing', '-', '8', '24-Nov-2023', '24-Dec-2023');

-- --------------------------------------------------------

--
-- Table structure for table `table_record_member`
--

CREATE TABLE `table_record_member` (
  `Name` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_record_member`
--

INSERT INTO `table_record_member` (`Name`, `Date`) VALUES
('0', '10'),
('Thariq', '10:26 24-Nov-2023'),
('Thariq', '10:26 24-Nov-2023'),
('Joseph', '15:08 24-Nov-2023'),
('Azhar', '15:15 24-Nov-2023'),
('joko', '15:23 24-Nov-2023'),
('joko', '15:23 24-Nov-2023'),
('joko', '15:24 24-Nov-2023'),
('joko', '15:24 24-Nov-2023'),
('Alif', '15:32 24-Nov-2023'),
('Azhar', '17:02 24-Nov-2023'),
('Joseph', '17:02 24-Nov-2023'),
('Joseph', '17:02 24-Nov-2023'),
('Joseph', '17:02 24-Nov-2023'),
('Joseph', '17:02 24-Nov-2023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_camp`
--
ALTER TABLE `table_camp`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `table_member`
--
ALTER TABLE `table_member`
  ADD PRIMARY KEY (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
