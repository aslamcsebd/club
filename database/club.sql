-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2022 at 05:58 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

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
-- Table structure for table `all_users`
--

CREATE TABLE `all_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_users`
--

INSERT INTO `all_users` (`id`, `user_type`, `name`, `email`, `mobile`, `password`, `address`, `gender`, `blood`, `dob`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Student', 'Arif', 'admin@gmail.com', '3434', '$2y$10$TDjQ2d0FBlr/4OD3eLMMrenO7kFsBpe7lMXnI.wP12hoBZubl0bKi', 'ddff', 'Male', 'A-', '2022-05-10', 'images/default.jpg', 1, '2022-05-16 01:02:17', '2022-05-16 01:02:17'),
(2, 'Student', 'Rahim', 'adeermin@gmail.com', '2323', '$2y$10$0a19mR3AFwC80JnzZ/UXNO9qTeVB.6RQw8rNlmOBandt1b9FeIYXy', 'fgfg', 'Female', 'A -ve', '2022-05-10', 'images/default.jpg', 1, '2022-05-16 01:10:27', '2022-05-16 01:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `required` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Not mandatory, 1=Mandatory',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `head_infos`
--

CREATE TABLE `head_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `head_infos`
--

INSERT INTO `head_infos` (`id`, `name`, `head_type`, `material`, `parent_head`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Bag', 'Income', 'Yes', 'Discount', 1, '2022-04-25 11:41:20', '2022-04-25 11:41:20'),
(3, 'Calculator', 'Income', 'Yes', 'Admission Fee', 1, '2022-04-25 11:41:42', '2022-04-25 11:41:42'),
(4, 'Pen', 'Expense', 'Yes', 'Guide Book', 1, '2022-05-16 01:00:09', '2022-05-30 23:31:29');

-- --------------------------------------------------------

--
-- Table structure for table `head_parents`
--

CREATE TABLE `head_parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `head_parents`
--

INSERT INTO `head_parents` (`id`, `created_by`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aslam', 'Office Rent', 1, '2022-04-25 04:20:20', '2022-04-25 04:20:20'),
(2, 'Aslam', 'Guide Book', 1, '2022-04-25 04:20:31', '2022-04-25 04:20:31'),
(3, 'Aslam', 'Bag', 1, '2022-04-25 04:20:39', '2022-04-25 04:20:39'),
(4, 'Aslam', 'Admission Fee', 1, '2022-04-25 04:20:48', '2022-04-25 04:20:48'),
(5, 'Aslam', 'Monthly Fee', 1, '2022-04-25 04:20:58', '2022-04-25 04:20:58'),
(6, 'Aslam', 'Teacher Fee', 1, '2022-04-25 04:21:07', '2022-04-25 04:21:07'),
(7, 'Aslam', 'Staff Fee', 1, '2022-04-25 04:21:17', '2022-04-25 04:21:17'),
(8, 'Aslam', 'Discount', 1, '2022-04-25 04:21:25', '2022-04-25 04:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `member_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `member_category`, `member_no`, `name`, `email`, `password`, `mobile`, `address`, `gender`, `blood`, `dob`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Full time', '147852', 'kamal', 'aslamhossainctg@gmail.com', '$2y$10$6QWleZv2wE5mUcJPumFT8.vz5hWMKDYG3yNBOd6Xd3pfOy55Y4Uwm', '4544', 'ujhbjb', 'Other', 'A +ve', '2022-05-25', 'images/default.jpg', 1, NULL, NULL),
(7, 'Full time', '369852', 'rafiq', 'aslamhosscvbainctg@gmail.com', '$2y$10$0Zq2JNzyjr1JB9jy2PCtUOaTA9vyV0la49JL24Sy4LO5hBpt56e3O', '56546', 'fghfg', 'Other', 'A +ve', '2022-05-04', 'images/default.jpg', 1, NULL, NULL),
(8, 'Full time', '123654', 'karim', 'aslamfdgfgcsebd@gmail.com', '$2y$10$MrnLDGLLqXA2Lh2E9FhtR.x7Swp3QZQUZl53S8fQwANBmiq9Rb2JC', '3545', 'sdfdf', 'Male', 'A +ve', '2022-06-01', 'images/default.jpg', 1, NULL, NULL),
(9, 'Full time', '789654', 'rahim', 'trytr@email.com', '$2y$10$cKfnrxcwooNKeGpl549Dy.rrm/S21Uf0Y9Ljp6Q8mrdezQVyIJp4m', '45656', 'fdgfdg', 'Female', 'B -ve', '1999-06-14', 'images/member/1654430552.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member_categories`
--

CREATE TABLE `member_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `member_categories` (`id`, `created_by`, `name`, `paymentType`, `fee`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aslam', 'Full time', 'Monthly', '100', NULL, 1, NULL, NULL),
(2, 'Aslam', 'Fifetime', 'One Time', '200', '10', 1, NULL, NULL),
(3, 'Aslam', 'tryty', 'One Time', '454', NULL, 1, NULL, NULL);

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
(13, '2022_04_22_163151_create_user_types_table', 4),
(18, '2022_04_23_120505_create_notices_table', 6),
(20, '2022_04_24_095145_create_files_table', 8),
(21, '2022_04_25_083802_create_head_parents_table', 9),
(24, '2022_04_25_085926_create_head_infos_table', 10),
(25, '2022_04_26_095956_create_recipient_types_table', 11),
(26, '2022_04_28_052353_create_all_users_table', 11),
(27, '2022_04_20_101630_create_members_table', 12),
(28, '2022_04_22_080652_create_custom_fields_table', 13),
(30, '2022_05_30_063722_member_edit', 14),
(31, '2022_06_02_072614_notice_table_edit', 15),
(32, '2022_06_02_091054_custom_field_edit', 16),
(33, '2022_06_05_114000_recipient_type_edit', 17),
(34, '2022_06_05_115758_member_edit2', 18),
(35, '2022_06_05_163931_setting_edit', 19);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=Inactive, 1=Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `created_by`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Aslam', 'Student', 1, NULL, NULL),
(2, 'Aslam', 'Teacher', 1, NULL, NULL),
(3, 'Aslam', 'Sub-admin', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_users`
--
ALTER TABLE `all_users`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `all_users`
--
ALTER TABLE `all_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `head_infos`
--
ALTER TABLE `head_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `head_parents`
--
ALTER TABLE `head_parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `member_categories`
--
ALTER TABLE `member_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
