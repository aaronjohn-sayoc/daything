-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2019 at 09:53 PM
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
(5, '2019_02_03_053146_add_status_users_details', 3),
(7, '2019_02_04_104231_create_user_photos_table', 4),
(9, '2019_02_05_154333_add_username_users_table', 5);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`, `username`) VALUES
(1, 'johnnydepthh123', 'johnnydepthh123@gmail.com', NULL, '$2y$10$DeCqDyAj27mbJ6q1Uesv/ehuolviLS59zCr1I9W8QfoE6d6vylRHO', 1, 'LOfzwmBMnZ66yegM11AM2Mc2GTgSXDyisfQQQG2E72loSUs0CyFfhyPuRO2T', '2019-01-31 19:54:46', '2019-01-31 19:54:46', 'johnnydepthh123'),
(2, 'Danny', 'dannydanny1234567890@gmail.com', NULL, '$2y$10$Fy7JsZW1vfOD2YAUWUYrR.KosdnEMcM469SrpvKOsYkaDIpvTrhp2', 0, NULL, '2019-02-01 07:54:14', '2019-02-01 07:54:14', 'Danny123'),
(4, 'sadsdasdasda', 'asdasfasfsafsa@gmail.com', NULL, '$2y$10$vEKBw3OQB7i2TzivRIXy/eQRoIlD807beuz4spRPI7UUbiN.TUF1q', 0, NULL, '2019-02-02 03:28:43', '2019-02-02 03:28:43', 'asddsasdas123'),
(5, 'asddsasdas', 'safasafsdasdsad@gmail.com', NULL, '$2y$10$EACsk8wK/b2f/Tc4KTELk.nC7JiIC1ThtCO0BKOGvCr1cvuSRKQ3W', 0, NULL, '2019-02-02 03:31:11', '2019-02-02 03:31:11', 'asddsasdas123'),
(9, 'Laptopasddsa', 'asdasdasddsa@gmail.com', NULL, '$2y$10$pINCyhpYQgPclVhK17TWeu6YRG8k8rxaQbg9L6lS6ntPfkoC4HVYK', 0, NULL, '2019-02-02 22:32:02', '2019-02-02 22:32:02', 'Laptopasddsa123'),
(10, 'asdassadadasda', 'sadsadsadsad@gmail.com', NULL, '$2y$10$XTJhKy7YkGrh69hIZEnI2u0wVMLnhZGt8Xkux3VBbcrM/rU1XlmMC', 0, NULL, '2019-02-02 23:00:20', '2019-02-02 23:00:20', 'asdassadadasda123'),
(11, 'asdfasdfas', 'asdfaasdfa123@gmail.com', NULL, '$2y$10$qWI0InXxYMDPiy6m1Q/abevcmKEju1jJoZmwbhY7GoplbHHtdnFeC', 0, NULL, '2019-02-03 05:00:23', '2019-02-03 05:00:23', 'asdfasdfas123'),
(14, 'asdsadas', 'asdafasfsa@gmail.com', NULL, '$2y$10$gmayPUvpOJbfrMzzSLgjJ.xJ3iQWy4sXvVY6k9OZ9s3W8pOe892i2', 0, NULL, '2019-02-05 06:19:23', '2019-02-05 06:19:23', 'asdsadas123'),
(15, 'sadsdsdadsa', 'asdsaddasda7890@gmail.com', NULL, '$2y$10$01UlCBk9TUEwY/99VYZcueGuXh6r2099P6yyGZ4/H6Gwuy8Ym23Le', 0, NULL, '2019-02-05 06:32:56', '2019-02-05 06:32:56', 'sadsdsdadsa123');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marital_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `user_id`, `date_of_birth`, `height`, `body_type`, `marital_status`, `description`, `gender`, `created_at`, `updated_at`, `approved`) VALUES
(6, 10, '02/04/2000', '5\'7\"', 'average', 'relationship', 'asdsadsadsadadsadsadsa', 'female', '2019-02-04 06:41:28', '2019-02-05 04:56:59', 1),
(7, 11, '02/03/1997', '5\'6\"', 'average', 'single', 'asddassadsdasdaasdasdsadas', 'male', '2019-02-05 06:04:05', '2019-02-05 06:04:05', 1),
(8, 2, '08/15/1996', '5\'5\"', 'athletic', 'complicated', 'asdasfsafsafsafsaffasfasfsaffsa', 'male', '2019-02-05 06:06:30', '2019-02-05 06:06:30', 1),
(9, 14, '02/15/2000', '5\'5\"', 'average', 'relationship', 'asddsadsadsadasafsfsafsafsa', 'male', '2019-02-05 06:19:51', '2019-02-05 06:19:51', 0),
(10, 15, '02/07/2000', '5\'2\"', 'athletic', 'married', 'asfsgagagagsasgagssgasga', 'female', '2019-02-05 06:33:22', '2019-02-05 06:33:22', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE `user_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_photos`
--

INSERT INTO `user_photos` (`id`, `user_id`, `photo`, `default_photo`, `approved`, `created_at`, `updated_at`) VALUES
(2, 10, '8410.jpg', 'No', 1, '2019-02-05 00:04:59', '2019-02-05 11:20:46'),
(3, 10, '72969.jpg', 'No', 1, '2019-02-05 00:04:59', '2019-02-05 11:20:44'),
(5, 10, '35748.jpg', 'No', 1, '2019-02-05 01:47:47', '2019-02-05 11:20:48'),
(15, 2, '23769.jpg', 'Yes', 1, '2019-02-05 07:35:43', '2019-02-05 11:03:49'),
(17, 2, '44264.jpg', 'No', 1, '2019-02-05 10:32:22', '2019-02-05 11:03:49'),
(18, 2, '98520.jpg', 'No', 1, '2019-02-05 11:07:15', '2019-02-05 11:20:51');

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
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_photos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_details`
--
ALTER TABLE `users_details`
  ADD CONSTRAINT `users_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_photos`
--
ALTER TABLE `user_photos`
  ADD CONSTRAINT `user_photos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
