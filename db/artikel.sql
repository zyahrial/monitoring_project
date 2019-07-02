-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2018 at 10:44 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artikel`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `tittle` varchar(100) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `tittle`, `content`, `date`, `updated_at`, `created_at`) VALUES
(2, 'tittle', 'test content', '2018-11-23', '2018-11-13 09:40:59', '2018-11-13 09:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$1flsDGs8qr8cmpfvIAcnM.6rgRHTXFFS5C3/GStx7Dwr4mfWuEo6e', 'admin@sprint.co.id', 'PPWqz4EpRheuvkt6PhmnOhwuL8mj6raYt9PA6GsP52LhLNejlUYkKfTYpzql', '2018-10-09 05:02:40', '2018-10-09 05:02:40'),
(2, 'superadmin', '$2y$10$KIrzCTbjB292zh.zyhDKyelNATsO5Ofi1arvPCCetJlpt78M2Lvr2', 'superadmin@sprint.co.id', 'Py5UdqXDwsYk65heBN5XJJiIfihGrjWv4EHq6AQIPHmUjezwJ35RQeAvgHvS', '2018-10-09 08:02:44', '2018-10-09 08:02:44'),
(3, 'Khaerus zyahrial', '$2y$10$6uBEIdM8a3o/yltl0CBcNeasbzh7myvDYknhhi53IxCDDHC93OZvi', 'test@test.com', 'SKCuaZw13vxJgvpaGDeBXjeLghdHJyVOvk34Ailyd46rZ09mRcgKRgSHFHZ4', '2018-11-05 07:05:19', '2018-11-05 07:05:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
