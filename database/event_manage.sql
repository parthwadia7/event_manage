-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 09:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event_manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_description` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL,
  `event_recurrence_type` int(1) DEFAULT NULL COMMENT '1single,2daily,3weekly,4monthly,5yearly',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0inactive,1active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_name`, `event_description`, `event_start_date`, `event_end_date`, `event_recurrence_type`, `status`, `created_at`) VALUES
(1, 'New event', 'all event here', '2023-05-04', '2023-05-31', 1, 1, '2023-05-04 14:34:31'),
(4, 'New event 2', '2new one', '2023-05-05', '2023-05-22', 4, 1, '2023-05-04 14:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incident_report`
--

CREATE TABLE `incident_report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_16_152933_create_cms_pages_table', 1),
(6, '2022_12_19_123831_create_user_auth_tokens_table', 1),
(7, '2022_12_20_091046_create_services_table', 1),
(8, '2022_12_20_091241_create_service_category_table', 1),
(9, '2022_12_20_091720_create_service_sub_category_table', 1),
(10, '2022_12_20_093848_create_incident_type_table', 1),
(11, '2022_12_20_093958_create_incident_report_table', 1),
(12, '2022_12_23_075959_create_packages_table', 1),
(13, '2022_12_23_113957_create_products_table', 1),
(14, '2022_12_26_161223_create_product_options_table', 1),
(15, '2023_01_09_090657_create_user_coupons_table', 1),
(16, '2023_01_09_121219_create_notifications_table', 1),
(17, '2023_01_10_090007_create_contact_us_table', 1),
(18, '2023_01_10_094607_create_reviews_table', 1),
(19, '2023_01_11_090551_create_order_masters_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1 means admin, 2 means vendor,3 means users,4 means delivery person',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'fr means french, en means english',
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 means active, 1 means deactive',
  `notification_setting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 means on, 1 means off',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `mobile`, `image`, `path`, `device_token`, `social_id`, `social_type`, `location`, `language`, `is_active`, `notification_setting`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 'Admin', 'Admin', 'admin@gmail.com', NULL, '$2y$10$iuaCQS87EQr8FLfKWSxD6.oxg9YuogSVpc2q3pgDGdPda.dNwp/.2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', NULL, '2023-05-04 07:46:45', '2023-05-04 07:46:45'),
(2, '2', 'Vendor', 'Vendor', 'vendor@gmail.com', NULL, '$2y$10$7fz4XLO6Z59L4FpN7rcOgunE67PxxhBG1CAKOeO9gDdQETnIj4F4i', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', NULL, '2023-05-04 07:46:45', '2023-05-04 07:46:45'),
(3, '3', 'User', 'User', 'user@gmail.com', NULL, '$2y$10$DO8HDIB6v1QvcnRX7UQsCO9jWTNkJrOC66Tt5m7X1GhBsfSMZmHY2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', NULL, '2023-05-04 07:46:45', '2023-05-04 07:46:45'),
(5, '1', 'Parth', 'Wadia', 'parth.wadia7@gmail.com', NULL, '$2y$10$tRggjFfHRLyw0oRxftW8Yuvmc7IrdxoX.VmnpjeK6sMle49DJICtu', '8866014645', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', NULL, '2023-05-05 00:10:32', '2023-05-05 00:10:32'),
(6, '1', 'aaa', 'aaa', '1admin@gmail.com', NULL, '$2y$10$kajvumOyzLWvGgVkRlD1L.5ev27H9ifkhdwASgsdeSv.Ne1mtFmrO', '123456789', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', NULL, '2023-05-05 00:20:28', '2023-05-05 00:20:28'),
(7, '1', '1aa', 'bb', '122admin@gmail.com', NULL, '$2y$10$H5pMzQvs1ACaucnNAb2F7ermCRtC26cNMmR..RIsKuMAhBxceg8/q', '12345678911', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', NULL, '2023-05-05 00:42:29', '2023-05-05 00:42:29'),
(8, '1', 'aaa', 'aaaa', 'aaadmin@gmail.com', NULL, '$2y$10$wwYC4z2wooYf6cXNESNgReMxFBYjvvyFJfFQ/roBAYttc4Ui/S30q', '1234567890123', NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0', NULL, '2023-05-05 00:43:07', '2023-05-05 00:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_auth_tokens`
--

CREATE TABLE `user_auth_tokens` (
  `id` int(11) NOT NULL,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `incident_report`
--
ALTER TABLE `incident_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_auth_tokens`
--
ALTER TABLE `user_auth_tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incident_report`
--
ALTER TABLE `incident_report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_auth_tokens`
--
ALTER TABLE `user_auth_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
