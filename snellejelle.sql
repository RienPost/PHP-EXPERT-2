-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 09:11 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `snellejelle`
--

-- --------------------------------------------------------

--
-- Table structure for table `fiets`
--

CREATE TABLE `fiets` (
  `id` int(10) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `model` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `kleur` varchar(20) NOT NULL,
  `soortrem` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fiets`
--

INSERT INTO `fiets` (`id`, `merk`, `model`, `type`, `kleur`, `soortrem`) VALUES
(5, 'gzelle', '2021-02-03', '21:42', 'kanker', '100');

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `achternaam` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefoonnummer` varchar(10) NOT NULL,
  `wachtwoord` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`id`, `username`, `achternaam`, `email`, `telefoonnummer`, `wachtwoord`) VALUES
(2, 'Sander', '', '', '', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `medewerker`
--

CREATE TABLE `medewerker` (
  `id` int(10) NOT NULL DEFAULT 2,
  `username` varchar(20) NOT NULL,
  `achternaam` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefoonnummer` varchar(10) NOT NULL,
  `wachtwoord` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medewerker`
--

INSERT INTO `medewerker` (`id`, `username`, `achternaam`, `email`, `telefoonnummer`, `wachtwoord`) VALUES
(2, 'Medewerker', '', '', '', '123456'),
(2, 'Leonardo', 'Uterwijk', 'LeoU@gmail.com', '0610549395', '');

-- --------------------------------------------------------

--
-- Table structure for table `reparatie`
--

CREATE TABLE `reparatie` (
  `id` int(10) NOT NULL,
  `titel` varchar(30) NOT NULL,
  `datum` date NOT NULL,
  `tijdstip` time(6) NOT NULL,
  `opmerkingen` varchar(30) NOT NULL,
  `kosten` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reparatie`
--

INSERT INTO `reparatie` (`id`, `titel`, `datum`, `tijdstip`, `opmerkingen`, `kosten`) VALUES
(35, 'Gazelle', '2021-02-11', '22:42:00.000000', 'kanker', '1000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fiets`
--
ALTER TABLE `fiets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reparatie`
--
ALTER TABLE `reparatie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fiets`
--
ALTER TABLE `fiets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reparatie`
--
ALTER TABLE `reparatie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
