-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2018 at 02:20 PM
-- Server version: 5.7.16-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmenadue`
--

-- --------------------------------------------------------

--
-- Table structure for table `gwdb`
--

CREATE TABLE `gwdb` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(75) NOT NULL,
  `score` int(9) NOT NULL,
  `screenshot` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gwdb`
--

INSERT INTO `gwdb` (`id`, `date`, `name`, `score`, `screenshot`) VALUES
(2, '2018-09-29', 'bryce', 4164, 'f'),
(3, '2018-09-29', 'anan', 486, 'f'),
(15, '2018-09-30', 'bryce', 4415, 'small.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gwdb`
--
ALTER TABLE `gwdb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gwdb`
--
ALTER TABLE `gwdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
