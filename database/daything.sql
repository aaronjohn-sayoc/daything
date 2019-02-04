-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2019 at 01:05 AM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daything`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_02_02_182652_create_users_details_table', 2),
(5, '2019_02_03_053146_add_status_users_details', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'johnnydepthh123', 'johnnydepthh123@gmail.com', NULL, '$2y$10$DeCqDyAj27mbJ6q1Uesv/ehuolviLS59zCr1I9W8QfoE6d6vylRHO', 1, 'LOfzwmBMnZ66yegM11AM2Mc2GTgSXDyisfQQQG2E72loSUs0CyFfhyPuRO2T', '2019-01-31 19:54:46', '2019-01-31 19:54:46'),
(2, 'Danny', 'dannydanny1234567890@gmail.com', NULL, '$2y$10$Fy7JsZW1vfOD2YAUWUYrR.KosdnEMcM469SrpvKOsYkaDIpvTrhp2', 0, NULL, '2019-02-01 07:54:14', '2019-02-01 07:54:14'),
(4, 'sadsdasdasda', 'asdasfasfsafsa@gmail.com', NULL, '$2y$10$vEKBw3OQB7i2TzivRIXy/eQRoIlD807beuz4spRPI7UUbiN.TUF1q', 0, NULL, '2019-02-02 03:28:43', '2019-02-02 03:28:43'),
(5, 'asddsasdas', 'safasafsdasdsad@gmail.com', NULL, '$2y$10$EACsk8wK/b2f/Tc4KTELk.nC7JiIC1ThtCO0BKOGvCr1cvuSRKQ3W', 0, NULL, '2019-02-02 03:31:11', '2019-02-02 03:31:11'),
(9, 'Laptopasddsa', 'asdasdasddsa@gmail.com', NULL, '$2y$10$pINCyhpYQgPclVhK17TWeu6YRG8k8rxaQbg9L6lS6ntPfkoC4HVYK', 0, NULL, '2019-02-02 22:32:02', '2019-02-02 22:32:02'),
(10, 'asdassadadasda', 'sadsadsadsad@gmail.com', NULL, '$2y$10$XTJhKy7YkGrh69hIZEnI2u0wVMLnhZGt8Xkux3VBbcrM/rU1XlmMC', 0, NULL, '2019-02-02 23:00:20', '2019-02-02 23:00:20'),
(11, 'asdfasdfas', 'asdfaasdfa123@gmail.com', NULL, '$2y$10$qWI0InXxYMDPiy6m1Q/abevcmKEju1jJoZmwbhY7GoplbHHtdnFeC', 0, NULL, '2019-02-03 05:00:23', '2019-02-03 05:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved` tinyint(4) NOT NULL DEFAULT 0,
  `age` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `user_id`, `date_of_birth`, `height`, `marital_status`, `description`, `gender`, `created_at`, `updated_at`, `approved`, `age`) VALUES
(2, 2, '02/04/1999', '5\'5\"', 'Single', 'asddsadsadsa', 'male', '2019-02-02 11:04:17', '2019-02-02 11:04:17', 1, 0),
(3, 2, '07/10/2000', '5\'5\"', 'Single', 'dasasddasdsa', 'male', '2019-02-02 21:50:38', '2019-02-02 21:50:38', 0, 0),
(4, 9, '02/03/2019', '5\'7\"', 'Single', 'asdasdsadasdasdasdasdasd', 'Male', '2019-02-02 22:57:30', '2019-02-02 22:57:30', 0, 0),
(5, 10, '02/03/2000', '5\'3\"', 'single', 'asdsadsadasdasdasdssadsadsa', 'Female', '2019-02-02 23:00:53', '2019-02-02 23:00:53', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE;

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_details`
--
ALTER TABLE `users_details`
  ADD CONSTRAINT `users_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
