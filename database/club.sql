-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 25, 2022 at 06:42 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club`
--

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Studen_sub', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `user_type`, `file`, `status`, `created_at`, `updated_at`) VALUES
(10, 'This is txt file', 'Teacher', 'file/1650873593.txt', 1, '2022-04-25 01:59:53', '2022-04-25 01:59:53'),
(11, 'This is doc file', 'Sub-admin', 'file/1650873639.docx', 1, '2022-04-25 02:00:39', '2022-04-25 02:00:39'),
(12, 'This is pdf file', 'All', 'file/1650873702.pdf', 1, '2022-04-25 02:01:42', '2022-04-25 02:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `head_infos`
--

CREATE TABLE `head_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gift` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `head_infos`
--

INSERT INTO `head_infos` (`id`, `name`, `head_type`, `material`, `gift`, `parent_head`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pen2', 'Income', 'Yes', 'No', 'Bag', 1, '2022-04-25 11:41:06', '2022-04-25 12:32:02'),
(2, 'Bag', 'Income', 'Yes', 'No', 'Discount', 1, '2022-04-25 11:41:20', '2022-04-25 11:41:20'),
(3, 'Calculator', 'Income', 'Yes', 'No', 'Admission Fee', 1, '2022-04-25 11:41:42', '2022-04-25 11:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `head_parents`
--

CREATE TABLE `head_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `head_parents`
--

INSERT INTO `head_parents` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Office Rent', 1, '2022-04-25 04:20:20', '2022-04-25 04:20:20'),
(2, 'Guide Book', 1, '2022-04-25 04:20:31', '2022-04-25 04:20:31'),
(3, 'Bag', 1, '2022-04-25 04:20:39', '2022-04-25 04:20:39'),
(4, 'Admission Fee', 1, '2022-04-25 04:20:48', '2022-04-25 04:20:48'),
(5, 'Monthly Fee', 1, '2022-04-25 04:20:58', '2022-04-25 04:20:58'),
(6, 'Teacher Fee', 1, '2022-04-25 04:21:07', '2022-04-25 04:21:07'),
(7, 'Staff Fee', 1, '2022-04-25 04:21:17', '2022-04-25 04:21:17'),
(8, 'Discount', 1, '2022-04-25 04:21:25', '2022-04-25 04:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `Studen_sub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `user_type`, `form_no`, `device_id`, `name`, `email`, `password`, `mobile`, `address`, `gender`, `blood`, `dob`, `photo`, `status`, `Studen_sub`, `created_at`, `updated_at`) VALUES
(1, 'Student', NULL, NULL, 'MD Rahim', 'rahim@gmail.com', '$2y$10$Cb34WhkfKqdUM.cebj.tfO9kjX.tv7vc17LVM9n4aRJAK54DDr72i', '01680607293', 'agrabad, chittagong', 'Male', '+O', '2022-04-13', 'images/default.jpg', 1, NULL, NULL, NULL),
(2, 'Teacher', '1020', 'abcd1234', 'Abdur Rahim', 'rahim@gmail.com', '$2y$10$qB9ci752XJ2Gr6rFztmGrO3FYUwhf3wg6CPqJhA6N0BV3VVsiR/bO', '01680607596', 'mirpur-12', 'Male', '+O', '2002-04-06', 'images/default.jpg', 1, NULL, NULL, NULL),
(3, 'Student', '2030', '1234abcd', 'Abdur Raihan', 'raihan@gmail.com', '$2y$10$.VV9teOt4eZ14dTsPLchOuh.KKIR7Swb5sEcFBc3GvOvduFVUp4ki', '01598745632', 'Agrabad, ctg', 'Male', '-B', '2001-04-20', 'images/default.jpg', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_categories`
--

CREATE TABLE `member_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_categories`
--

INSERT INTO `member_categories` (`id`, `name`, `paymentType`, `fee`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Full time', 'Monthly', '100', NULL, 1, NULL, NULL),
(2, 'Fifetime', 'One Time', '200', '10', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2022_04_21_091057_create_member_categories_table', 2),
(12, '2022_04_22_080652_create_custom_fields_table', 3),
(13, '2022_04_22_163151_create_user_types_table', 4),
(18, '2022_04_23_120505_create_notices_table', 6),
(19, '2022_04_20_101630_create_members_table', 7),
(20, '2022_04_24_095145_create_files_table', 8),
(21, '2022_04_25_083802_create_head_parents_table', 9),
(24, '2022_04_25_085926_create_head_infos_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `user_type`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Holiday', 'Teacher', '1st may holiday.', 1, '2022-04-24 01:49:05', '2022-04-25 12:32:53'),
(4, 'Summer vacation', 'All', 'All member\'s holiday', 1, '2022-04-24 01:50:13', '2022-04-24 01:50:13'),
(5, 'Holiday', 'Teacher', 'Teacher\'s day.', 1, '2022-04-24 01:50:46', '2022-04-24 01:50:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refresh_status`
--

CREATE TABLE `refresh_status` (
  `id` bigint(20) NOT NULL,
  `time` bigint(20) NOT NULL DEFAULT '5' COMMENT 'Second',
  `status` tinyint(4) NOT NULL COMMENT '0=hide, 1=show'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `refresh_status`
--

INSERT INTO `refresh_status` (`id`, `time`, `status`) VALUES
(1, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Aslam', 'admin@gmail.com', NULL, '$2y$10$qs0VXXwNndVNWzlxbloRx.t3nm7hfxEVpG183vkQw16/lPdZEUmWu', NULL, '2022-04-20 15:17:04', '2022-04-20 15:17:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Student', 1, NULL, NULL),
(2, 'Teacher', 1, NULL, NULL),
(3, 'Sub-admin', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_infos`
--
ALTER TABLE `head_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `head_parents`
--
ALTER TABLE `head_parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_categories`
--
ALTER TABLE `member_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `refresh_status`
--
ALTER TABLE `refresh_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `head_infos`
--
ALTER TABLE `head_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `head_parents`
--
ALTER TABLE `head_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member_categories`
--
ALTER TABLE `member_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `refresh_status`
--
ALTER TABLE `refresh_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
