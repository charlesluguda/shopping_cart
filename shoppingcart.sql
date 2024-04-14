-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 02:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `Name`, `Email`, `Activity`) VALUES
(1, '', 'chakupewa1@gmail.com', 'Deleted'),
(2, 'Abas', 'luguda@gmail.com', 'Deleted'),
(3, 'charls', 'luguda@gmail.com', 'Deleted'),
(4, 'erbariki', 'erbariki@gmail.com', 'Deleted'),
(5, 'francis', 'luguda@gmail.com', 'Deleted');

-- --------------------------------------------------------

--
-- Table structure for table `resets`
--

CREATE TABLE `resets` (
  `id` int(11) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Code` int(100) NOT NULL,
  `Expire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resets`
--

INSERT INTO `resets` (`id`, `Email`, `Code`, `Expire`) VALUES
(1, 'charlesluguda6@gmail.com', 75300, '1686769158'),
(2, 'charlesluguda6@gmail.com', 10775, '1686773644');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Sno` int(255) NOT NULL,
  `Fullname` varchar(200) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Admin` varchar(200) NOT NULL DEFAULT 'user',
  `Token` varchar(255) NOT NULL,
  `Phone number` int(255) NOT NULL,
  `Status` int(255) NOT NULL,
  `Code` int(200) NOT NULL,
  `Expire` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Sno`, `Fullname`, `Email`, `Address`, `Password`, `Admin`, `Token`, `Phone number`, `Status`, `Code`, `Expire`) VALUES
(29, 'peter', 'peter@gmail.com', 'moshi', '$2y$10$HQE7JY42MM/c6OIoJIYHWOJrWWZvM7RAYwvkzDHt7WAfUg/5jViUC', 'admin', '', 627078932, 0, 0, ''),
(36, 'Raytony', 'raytony@gmail.com', 'Bukoba', '$2y$10$UfdpVhSVrzbApSqtIjh6AumN3A8Fl0YEKJE2CrKqxxYwpSpHs/rdS', 'user', '', 745896460, 0, 0, ''),
(39, 'Hamad  Juma', 'hamad@gmail.com', 'Arusha', '$2y$10$2SwgKmaHqogbkuy7h57mpuiVUbMTEou1yi5VhKof7/Nfts1mksZj2', 'user', '', 745896460, 0, 0, ''),
(40, 'luguda', 'luguda@gmail.com', 'Mpanda', '$2y$10$41r02oi1mQG6xHNom47k9OCj5O02CqQDfHI7JrJJ60dHnZkOvsSz2', 'user', '', 745896460, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resets`
--
ALTER TABLE `resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resets`
--
ALTER TABLE `resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Sno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
