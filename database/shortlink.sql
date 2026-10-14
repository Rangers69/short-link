-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2026 at 08:32 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shortlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'admin', 'Password1!', 'Administrator Bitlytic');

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

CREATE TABLE `clicks` (
  `id` int NOT NULL,
  `link_id` int NOT NULL,
  `country_code` char(2) DEFAULT NULL,
  `user_agent` text,
  `ip_address` varchar(45) DEFAULT NULL,
  `clicked_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clicks`
--

INSERT INTO `clicks` (`id`, `link_id`, `country_code`, `user_agent`, `ip_address`, `clicked_at`) VALUES
(1, 1, 'ID', NULL, NULL, '2026-05-10 03:00:00'),
(2, 1, 'ID', NULL, NULL, '2026-05-10 04:30:00'),
(3, 1, 'SG', NULL, NULL, '2026-05-11 07:00:00'),
(4, 2, 'ID', NULL, NULL, '2026-05-12 02:00:00'),
(5, 2, 'US', NULL, NULL, '2026-05-12 14:00:00'),
(6, 1, 'ID', NULL, NULL, '2026-05-13 01:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `original_url` text NOT NULL,
  `short_code` varchar(50) NOT NULL,
  `custom_title` varchar(100) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `clicks` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `user_id`, `original_url`, `short_code`, `custom_title`, `status`, `clicks`, `created_at`) VALUES
(1, 1, 'https://github.com/ahmadwidodo', 'mygithub', 'Repo Project', 'aktif', 0, '2026-05-16 07:14:34'),
(2, 1, 'https://laravel.com/docs', 'belajarlaravel', 'Dokumentasi Laravel', 'aktif', 0, '2026-05-16 07:14:34'),
(3, 1, 'https://google.com', 'g-search', 'Google Search', 'nonaktif', 0, '2026-05-16 07:14:34'),
(4, NULL, 'https://www.youtube.com/watch?v=xRkW_07e3kY', 'OF2ion', NULL, 'aktif', 0, '2026-05-16 10:28:50'),
(5, NULL, 'https://www.youtube.com/watch?v=xRkW_07e3kY', '3eql5z', NULL, 'aktif', 0, '2026-05-16 10:35:11'),
(6, NULL, 'https://www.youtube.com/watch?v=xRkW_07e3kY', 'MK1DiO', NULL, 'aktif', 0, '2026-05-16 10:36:37'),
(7, NULL, 'https://www.youtube.com/watch?v=xRkW_07e3kY', 'agwGtU', NULL, 'aktif', 0, '2026-05-16 17:25:06'),
(8, NULL, 'https://www.youtube.com/watch?v=RLgjyGaKcZI', 'iQrwvb', NULL, 'aktif', 0, '2026-05-16 17:32:30'),
(9, NULL, 'https://www.youtube.com/watch?v=RLgjyGaKcZI', '20WU6Z', NULL, 'aktif', 0, '2026-05-17 08:24:55'),
(10, NULL, 'https://www.youtube.com/watch?v=dKQEdtueSy8', 'e1SgKx', NULL, 'aktif', 0, '2026-05-17 09:18:21'),
(11, NULL, 'https://www.youtube.com/watch?v=iKamHvA-lnY', 'z7R93u', NULL, 'aktif', 20, '2026-05-17 10:15:52'),
(12, NULL, 'https://www.youtube.com/watch?v=eT-O2WUiiCc&t=2s', 'KI57Mv', NULL, 'aktif', 0, '2026-09-04 20:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `master_affiliate`
--

CREATE TABLE `master_affiliate` (
  `id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT 'General',
  `affiliate_url` text NOT NULL,
  `total_clicks` int DEFAULT '0',
  `unique_visitors` int DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `top_referrer` varchar(255) DEFAULT 'Direct',
  `top_device` varchar(50) DEFAULT 'Unknown',
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `master_affiliate`
--

INSERT INTO `master_affiliate` (`id`, `product_name`, `category`, `affiliate_url`, `total_clicks`, `unique_visitors`, `last_used_at`, `top_referrer`, `top_device`, `status`, `created_at`) VALUES
(6, 'Gantungan Modern', 'Lain-lain', 'https://s.shopee.co.id/1Vw6FhtS8G', 0, 0, NULL, 'Direct', 'Unknown', 'aktif', '2026-05-17 09:53:03'),
(7, 'Rak Sabun Kamar Mandi', 'Rumah Tangga', 'https://s.shopee.co.id/1qYweKc6cq', 0, 0, NULL, 'Direct', 'Unknown', 'aktif', '2026-05-17 09:56:22'),
(8, 'Spatula set putih 3pcs', 'Rumah Tangga', 'https://s.shopee.co.id/17ISyPQsE', 1, 0, '2026-05-18 00:28:33', 'Direct', 'Desktop', 'aktif', '2026-05-17 09:58:28'),
(9, 'Kotak Makan Portable Tahan Panas', 'Rumah Tangga', 'https://s.shopee.co.id/9Kexa8hBA7', 0, 0, NULL, 'Direct', 'Unknown', 'aktif', '2026-05-17 10:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `username`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'doni', 'doni', 'doni@gmail.com', '$2y$10$RBnP7aENGECA2ajNzf9Ffugr5.D.M778aOvwaNPyPhMEqrP9Wcfni', 'aktif', '2026-05-17 18:00:57'),
(2, 'danang', 'danang', 'danang@gmail.com', '$2y$10$uxo6YcE0UhUcAPmwNUXsKeY4jYyTbF4CIhjxIF0CFfjTgc4klgZnG', 'aktif', '2026-05-17 18:01:36'),
(3, 'user1', 'user1', 'user1@gmail.com', '$2y$10$44aCPLsDb2NdX9sH7wuYG.VdfyLcOWu1GUeooLHlhwQRzzImZ20hG', 'aktif', '2026-09-05 03:26:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_id` (`link_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short_code` (`short_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `master_affiliate`
--
ALTER TABLE `master_affiliate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clicks`
--
ALTER TABLE `clicks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `master_affiliate`
--
ALTER TABLE `master_affiliate`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clicks`
--
ALTER TABLE `clicks`
  ADD CONSTRAINT `clicks_ibfk_1` FOREIGN KEY (`link_id`) REFERENCES `links` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
