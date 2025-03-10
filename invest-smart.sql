-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 09:25 AM
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
-- Database: `invest-smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$G3hx69NIm1sLq9bsd/Mzqep/PW2eoj76X5lG6cWmaNi7iAb9W3kcq', '0', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Chanda Briggs', 'tedo@mailinator.com', 'Dolorum eu quis accu', 'Deleniti cumque in v', '2025-02-10 16:13:40', '2025-02-10 16:13:40');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_19_073547_create_admins_table', 2),
(6, '2024_08_19_080150_create_contacts_table', 3),
(9, '2024_08_22_034610_create_model_details_table', 5),
(10, '2024_08_27_032416_create_memberships_table', 6),
(11, '2024_08_27_135059_create_job_details_table', 7),
(12, '2024_09_08_223015_create_job_applieds_table', 8),
(14, '2025_02_07_090736_create_share_prices_table', 10),
(15, '2025_02_06_171708_create_share_packages_table', 11),
(16, '2025_02_08_173719_create_user_deposits_table', 12),
(18, '2024_08_22_000638_create_profile_details_table', 13),
(19, '2025_02_08_173730_create_user_withdrawls_table', 14),
(20, '2025_02_10_054237_create_user_assets_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `profile_details`
--

CREATE TABLE `profile_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `TRC20_address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profile_details`
--

INSERT INTO `profile_details` (`id`, `user_id`, `email`, `TRC20_address`, `created_at`, `updated_at`) VALUES
(1, '1', 'james@gmail.com', 'thisismywalletaddress456', '2025-02-09 02:36:31', '2025-02-09 02:40:12'),
(2, '2', 'developer@test.com', 'sdxfcgvhbjn12345', '2025-02-10 15:31:59', '2025-02-10 15:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `share_packages`
--

CREATE TABLE `share_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pkg_shares` varchar(255) DEFAULT NULL,
  `pkg_price` varchar(255) NOT NULL DEFAULT '0',
  `pkg_monthly_roi` varchar(255) DEFAULT NULL,
  `pkg_bonus_roi` varchar(255) NOT NULL DEFAULT 'Surprise',
  `pkg_referral_bonus` varchar(255) DEFAULT NULL,
  `pkg_daily_referral_roi` varchar(255) DEFAULT NULL,
  `status` text NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `share_packages`
--

INSERT INTO `share_packages` (`id`, `pkg_shares`, `pkg_price`, `pkg_monthly_roi`, `pkg_bonus_roi`, `pkg_referral_bonus`, `pkg_daily_referral_roi`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '50', '5', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 16:02:33'),
(2, '5', '250', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(3, '10', '500', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(4, '20', '1000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(5, '50', '2500', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(6, '100', '5000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(7, '150', '7500', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(8, '200', '10000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(9, '300', '15000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(10, '400', '20000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(11, '600', '30000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(12, '800', '40000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(13, '1000', '50000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(14, '1500', '75000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(15, '2000', '100000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(16, '3000', '150000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(17, '4000', '200000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26'),
(18, '5000', '250000', '10', 'Surprise', '5', '10', '0', '2025-02-07 17:55:21', '2025-02-10 15:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `share_prices`
--

CREATE TABLE `share_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_shares` varchar(255) NOT NULL DEFAULT '1',
  `share_price` varchar(255) NOT NULL DEFAULT '5',
  `status` text NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `share_prices`
--

INSERT INTO `share_prices` (`id`, `total_shares`, `share_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '50', '0', NULL, '2025-02-10 15:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `referral_code` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT 'approved',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `referral_code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'James Rogers', 'james@gmail.com', '$2y$10$U88CAqTh3g41IM942jA.y.mk8VOa3jlc5k4YL3U3da7E8ZyCKsdta', '1234WXY', 'approved', NULL, '2025-02-06 20:25:16', '2025-02-10 16:21:33'),
(2, 'Drive Rivets', 'developer@test.com', '$2y$10$ND4LQHKuHeTsvOsK2BYYj.qugWE9r9YMPE8A8BELAOY24upyUrwvS', 'asdfgh234', 'approved', NULL, '2025-02-10 15:18:35', '2025-02-10 15:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_assets`
--

CREATE TABLE `user_assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL DEFAULT '0',
  `deposits_shares` varchar(255) NOT NULL DEFAULT '0',
  `selled_shares` varchar(255) NOT NULL DEFAULT '0',
  `withdraw_shares` varchar(255) NOT NULL DEFAULT '0',
  `status` text NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_assets`
--

INSERT INTO `user_assets` (`id`, `user_id`, `deposits_shares`, `selled_shares`, `withdraw_shares`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '800', '0', '800', 'pending', '2025-02-10 15:29:59', '2025-02-10 15:39:29'),
(2, '2', '300', '0', '0', 'pending', '2025-02-10 15:30:42', '2025-02-10 15:30:42'),
(3, '1', '10', '0', '0', 'pending', '2025-02-10 15:33:57', '2025-02-10 15:33:57'),
(4, '1', '200', '0', '0', 'pending', '2025-02-10 15:34:20', '2025-02-10 15:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_deposits`
--

CREATE TABLE `user_deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL DEFAULT '0',
  `pkg_id` varchar(255) NOT NULL DEFAULT '0',
  `pkg_shares` varchar(255) NOT NULL DEFAULT '0',
  `pkg_amount` varchar(255) NOT NULL DEFAULT '0',
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_ss` varchar(255) DEFAULT NULL,
  `status` text NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_deposits`
--

INSERT INTO `user_deposits` (`id`, `user_id`, `pkg_id`, `pkg_shares`, `pkg_amount`, `transaction_id`, `payment_ss`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', '12', '800', '41600', '2_x47GTTW5HZ', '1739172599_FULL STACK.png', 'approved', '2025-02-10 15:29:59', '2025-02-10 15:38:26'),
(2, '2', '9', '300', '15600', '2_HBTUTEdHz2', '1739172642_FULL STACK.png', 'pending', '2025-02-10 15:30:42', '2025-02-10 15:30:42'),
(3, '1', '3', '10', '520', '1_xh8qfeB6E0', '1739172837_FULL STACK.png', 'pending', '2025-02-10 15:33:57', '2025-02-10 15:33:57'),
(4, '1', '8', '200', '10400', '1_loFZGYacaG', '1739172860_FULL STACK.png', 'approved', '2025-02-10 15:34:20', '2025-02-10 15:34:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_withdrawls`
--

CREATE TABLE `user_withdrawls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL DEFAULT '0',
  `deposit_id` int(11) NOT NULL DEFAULT 0,
  `share_withdrawl_requested` varchar(255) NOT NULL DEFAULT '0',
  `status` text NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_withdrawls`
--

INSERT INTO `user_withdrawls` (`id`, `user_id`, `deposit_id`, `share_withdrawl_requested`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 1, '800', 'approved', '2025-02-10 15:38:56', '2025-02-10 15:39:29'),
(2, '1', 4, '200', 'approved', '2025-02-10 15:48:56', '2025-02-10 15:48:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password_reset_tokens_email_unique` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profile_details`
--
ALTER TABLE `profile_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_packages`
--
ALTER TABLE `share_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_prices`
--
ALTER TABLE `share_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_assets`
--
ALTER TABLE `user_assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_deposits`
--
ALTER TABLE `user_deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_withdrawls`
--
ALTER TABLE `user_withdrawls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profile_details`
--
ALTER TABLE `profile_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `share_packages`
--
ALTER TABLE `share_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `share_prices`
--
ALTER TABLE `share_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_assets`
--
ALTER TABLE `user_assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_deposits`
--
ALTER TABLE `user_deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_withdrawls`
--
ALTER TABLE `user_withdrawls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
