-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2025 at 01:11 PM
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
-- Database: `alumni_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `prodi` varchar(50) NOT NULL,
  `tahun_lulus` int(11) NOT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `nim`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `prodi`, `tahun_lulus`, `pekerjaan`, `created_at`) VALUES
(8, '2108001010062', 'Haura Nadifa ', 'sigli', '2024-11-20', 'hliquehbcr', 'u  vxegyt', 1234, 'kjkjnhdii', '2024-11-20 06:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `full_name`, `created_at`) VALUES
(1, 'reno', '$2y$10$aZ3PNIOZaSl3yyoHgW0fxOHzyd5NPRxxoV.NH/6.IhpOEOJtbtASe', 'renofi123@gmail.com', 'reno barata', '2024-11-19 06:28:35'),
(2, 'Rose', '$2y$10$F6cFwVX1u6/5pNX2afj9puXymfVtcu9jKa0ZB45uUxdSPtDfeyVKq', 'rose64@gmail.com', 'Rose kim', '2024-11-19 10:27:11'),
(3, 'Sehun', '$2y$10$9K6EIBQB4CVzq6PiJ5gz9eB4KM0zqHcyHt9FMFdgRNZdLTzeieQcS', 'sehun64@gmail.com', 'oh sehun', '2024-11-19 10:28:18'),
(4, 'Haura', '$2y$10$gRXs54i2YH7qmz9jOXPdE.YT4zhxIcIuKtPYQaHOF26t4XgTQrZuu', 'haura74@gmail.com', 'Haura kin', '2024-11-20 04:46:30'),
(5, 'admin', '$2y$10$7zDxz5E.jm4hoqnwawq7AO7sVK49FXMaQSIbC3JYFda25lzq.VLC2', 'admin123@gmail.com', 'admin', '2024-11-20 05:15:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
