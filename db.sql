-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2017 at 08:16 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `certificat`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `cnp` varchar(100) NOT NULL,
  `nume` varchar(100) NOT NULL,
  `prenume` varchar(100) NOT NULL,
  `sexul` varchar(100) NOT NULL,
  `dob` varchar(500) NOT NULL,
  `pob` varchar(100) NOT NULL,
  `nume_familie_parinte1` varchar(500) NOT NULL,
  `prenume_parinte1` varchar(1000) NOT NULL,
  `nume_familie_parinte2` varchar(200) NOT NULL,
  `prenume_parinte2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `cnp`, `nume`, `prenume`, `dob`, `pob`, `sexul`, `nume_familie_parinte1`, `prenume_parinte1`, `nume_familie_parinte2`, `prenume_parinte2`) VALUES
(1, '6978145871012', 'Popescu', 'Paula', '17-09-1993', 'Craiova,Dolj,Romania', 'Feminin', 'Popescu', 'Ion', 'Popescu', 'Elena');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
