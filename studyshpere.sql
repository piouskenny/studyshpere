-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2024 at 03:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studyshpere`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `phonenumber`, `password`, `created_at`, `updated_at`) VALUES
(3, 'kehinde Adekunle Fisayo', 'kehinde13@gmail.com', 8038278939, '$2y$12$yqfS7VjI9JH5J9pARh1Z3uqAv3yyih3A6cnKgzLr0siFSsFbI13Vi', '2024-01-10 15:49:04', '2024-01-10 15:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_type` varchar(255) NOT NULL,
  `tutor_id` bigint(20) DEFAULT NULL,
  `students_enrolled` bigint(20) DEFAULT NULL,
  `course_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_type`, `tutor_id`, `students_enrolled`, `course_image`, `created_at`, `updated_at`) VALUES
(1, 'Catfish Farming for begineers', 'video', 1, NULL, '1704122341-Catfish Farming for begineers.png', '2024-01-01 14:19:01', '2024-01-01 14:19:01'),
(2, 'Calculus for Beginners', 'text', 1, NULL, '1704122926-Calculus for Beginners.png', '2024-01-01 14:28:46', '2024-01-01 14:28:46'),
(3, 'Logo Design', 'video', 1, NULL, '1704123121-Logo Design.png', '2024-01-01 14:32:01', '2024-01-01 14:32:01'),
(4, 'AWS cloud Engineering', 'video', 1, NULL, '1704287338-AWS cloud Engineering.jpg', '2024-01-03 12:08:58', '2024-01-03 12:08:58'),
(6, 'Laravel for Beginners', 'video', 1, NULL, '1704287420-Laravel for Beginners.png', '2024-01-03 12:10:20', '2024-01-03 12:10:20'),
(7, 'Product Design', 'video', 1, NULL, '1704967738-Product Design.png', '2024-01-11 09:08:58', '2024-01-11 09:08:58'),
(8, 'public Speaker', 'video', 3, NULL, '1705508015-public Speaker.png', '2024-01-17 15:13:35', '2024-01-17 15:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `course_contents`
--

CREATE TABLE `course_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courses_id` bigint(20) UNSIGNED NOT NULL,
  `content_type` enum('video','document') NOT NULL,
  `content_url` varchar(255) NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_contents`
--

INSERT INTO `course_contents` (`id`, `courses_id`, `content_type`, `content_url`, `order`, `created_at`, `updated_at`) VALUES
(1, 8, 'video', 'https://www.youtube.com/embed/tgbNymZ7vqY', 1, '2024-01-17 23:12:03', '2024-01-17 23:12:03'),
(2, 8, 'video', 'https://www.youtube.com/embed/tgbNymZ7vqY', 1, '2024-01-17 23:38:25', '2024-01-17 23:38:25'),
(3, 8, 'video', 'https://www.youtube.com/embed/tgbNymZ7vqY', 1, '2024-01-18 00:01:53', '2024-01-18 00:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollments`
--

CREATE TABLE `course_enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tutor_id` bigint(20) DEFAULT NULL,
  `course_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_enrollments`
--

INSERT INTO `course_enrollments` (`id`, `tutor_id`, `course_id`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 1, 6, 1, '2024-01-05 15:31:56', '2024-01-05 15:31:56'),
(13, 1, 4, 1, '2024-01-05 15:32:51', '2024-01-05 15:32:51'),
(14, 1, 3, 2, '2024-01-10 06:16:29', '2024-01-10 06:16:29'),
(15, 1, 6, 2, '2024-01-10 13:32:04', '2024-01-10 13:32:04'),
(16, 1, 7, 1, '2024-01-11 09:12:13', '2024-01-11 09:12:13'),
(17, 1, 6, 3, '2024-01-16 14:44:42', '2024-01-16 14:44:42'),
(18, 3, 8, 3, '2024-01-20 09:52:33', '2024-01-20 09:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_12_20_092806_create_tutors_table', 1),
(13, '2023_12_20_142144_create_admins_table', 2),
(14, '2024_01_16_154725_create_course_contents_table', 3),
(15, '2024_01_22_085722_create_o_t_p_s_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `o_t_p_s`
--

CREATE TABLE `o_t_p_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `otp` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `o_t_p_s`
--

INSERT INTO `o_t_p_s` (`id`, `user_id`, `otp`, `created_at`, `updated_at`) VALUES
(1, 5, 5333, '2024-01-22 08:17:21', '2024-01-22 08:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` bigint(20) UNSIGNED NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `courses` bigint(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`id`, `full_name`, `email`, `phonenumber`, `profile_picture`, `courses`, `password`, `created_at`, `updated_at`) VALUES
(1, 'kehinde Adekunle Fisayo', 'kehinde13@gmail.com', 7042590308, NULL, NULL, '$2y$12$izEK6GPlgUHm3dnAm2ksCeKSrp4x.a4293RXYZJ.r8kMtKhAmBgPG', '2023-12-28 15:42:51', '2023-12-28 15:42:51'),
(2, 'Ayomide Samuel', 'ayomidesamuel@gmail.com', 8011223344, NULL, NULL, '$2y$12$cdEGxXx2J/hJH2Pp4On0reRnAFpo/xefjOsrhFrr1Lz/7UEm8fItm', '2024-01-15 10:56:38', '2024-01-15 10:56:38'),
(3, 'Samuel Ogun', 'samuelogun@gmail.com', 8038278939, NULL, NULL, '$2y$12$aLCtziIkNDznqy0nt1bqX.Dv.feGOISBxWVAL2lb7y6WqyYm1joPK', '2024-01-16 14:37:58', '2024-01-16 14:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phonenumber` bigint(20) UNSIGNED NOT NULL,
  `courses` bigint(20) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_verified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `phonenumber`, `courses`, `profile_picture`, `password`, `phone_verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kehinde Adekunle Fisayo', 'piouskenny', 'kehinde13@gmail.com', 7068186976, NULL, NULL, '$2y$12$nrGLdXXIroU/8PN5dgeL3uPXfXGxwpCosQgRjdKsvbmEBv49O7NkC', 0, NULL, '2023-12-28 16:11:10', '2023-12-28 16:11:10'),
(2, 'Adesigbin Segun', 'Segun', 'segun@gmail.com', 7068186977, NULL, NULL, '$2y$12$m1YxAms/FRXe4ussURrxB.xdL/LgMXQ9N0Txb9lZD08wjxi9d9.VG', 0, NULL, '2024-01-10 06:12:03', '2024-01-10 06:12:03'),
(3, 'Adekunle promise', 'promzy', 'promise@gmail.com', 7063943213, NULL, NULL, '$2y$12$rHO7VLVhivHCQub7Q3llouLs9OeQOxaXJlNR3ww4yEye2Ocuv3z9i', 0, NULL, '2024-01-16 14:43:54', '2024-01-16 14:43:54'),
(5, 'Adekunle Atileyin', 'Atileyin', 'atileyin@gmail.com', 9063966498, NULL, NULL, '$2y$12$pGy4Xd0XAGF47UDteXkQQuQdrrC7zE/KhtXTyYfnPpyPt2ol/EgYe', 0, NULL, '2024-01-22 08:17:20', '2024-01-22 08:17:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_contents`
--
ALTER TABLE `course_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_contents_course_id_foreign` (`courses_id`);

--
-- Indexes for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `o_t_p_s`
--
ALTER TABLE `o_t_p_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_contents`
--
ALTER TABLE `course_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_enrollments`
--
ALTER TABLE `course_enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `o_t_p_s`
--
ALTER TABLE `o_t_p_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_contents`
--
ALTER TABLE `course_contents`
  ADD CONSTRAINT `course_contents_course_id_foreign` FOREIGN KEY (`courses_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
