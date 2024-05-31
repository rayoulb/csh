-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 03:00 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csh`
--

-- --------------------------------------------------------

--
-- Table structure for table `demander`
--

CREATE TABLE `demander` (
  `id` int(11) NOT NULL,
  `service` text NOT NULL,
  `sujet` text NOT NULL,
  `profile` text NOT NULL,
  `date_de_début` varchar(80) NOT NULL,
  `date_dxpiration` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `email_encadrant` varchar(100) NOT NULL,
  `gs_confirm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `demander`
--

INSERT INTO `demander` (`id`, `service`, `sujet`, `profile`, `date_de_début`, `date_dxpiration`, `email`, `status`, `email_encadrant`, `gs_confirm`) VALUES
(4, 'gnbgfn', 'ngfn', 'ngf', '2024-05-22', '2024-05-22', 'fa@gmail.com', 1, 'csh@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `service` text NOT NULL,
  `sujet` text NOT NULL,
  `profile` text NOT NULL,
  `date_de_début` varchar(80) NOT NULL,
  `date_dxpiration` varchar(80) NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `service`, `sujet`, `profile`, `date_de_début`, `date_dxpiration`, `status`) VALUES
(2, 'gnbgfn', 'ngfn', 'ngf', '2024-05-22', '2024-05-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('encadrant','gestionnaire','admin','stagiaire') DEFAULT NULL,
  `specialite` varchar(100) DEFAULT NULL,
  `etablissement` varchar(100) DEFAULT NULL,
  `diplome` varchar(100) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL,
  `binome` varchar(100) DEFAULT NULL,
  `statut_dencadrant` int(11) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `email_encadrant` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `specialite`, `etablissement`, `diplome`, `statut`, `binome`, `statut_dencadrant`, `file`, `email_encadrant`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(3, 'riadh', 'rayou@gmail.com', '123', 'encadrant', NULL, NULL, NULL, NULL, NULL, 1, NULL, ''),
(5, 'hhhhhhhhhhhh', 'test@gmail.com', '123', '', 'hhhhhhhh', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(6, 'riadh coding', 'main@gmail.com', '123', 'gestionnaire', 'hhhhhhhhhhh', NULL, NULL, NULL, NULL, NULL, NULL, ''),
(7, 'riadh hhhh', 'fa@gmail.com', '123', 'stagiaire', 'sp', 'et', 'deplom', 1, '', NULL, '1715988343.png', 'main@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `demander`
--
ALTER TABLE `demander`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `demander`
--
ALTER TABLE `demander`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
