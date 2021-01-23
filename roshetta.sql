-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 05:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roshetta`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `detail` longtext NOT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `detail`, `image`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"<p>sadsa<\\/p>\",\"ar\":\"<p>\\u0634\\u0633\\u064a\\u0634\\u0633\\u064a\\u0634\\u0633\\u064a<\\/p>\"}', '1566495514.jpg-1611065155-image.jpg', '2021-01-19 12:05:55', '2021-01-20 12:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `city_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id`, `title`, `status`, `city_id`, `country_id`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"ff\",\"ar\":\"\\u0634\\u064a\\u0634\\u0634\\u0633\\u064a\"}', 1, 1, 2, 1, '2021-01-20 13:46:56', '2021-01-20 13:50:07'),
(2, '{\"en\":\"werwer\",\"ar\":\"bnfb\"}', 1, 2, 2, 2, '2021-01-20 13:47:28', '2021-01-20 13:47:28');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title`, `country_id`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"cairo\",\"ar\":\"\\u0627\\u0644\\u0642\\u0627\\u0647\\u0631\\u0647\"}', 3, 1, 1, '2021-01-20 05:23:46', '2021-01-20 13:51:34'),
(2, '{\"en\":\"asd\",\"ar\":\"hghhghg\"}', 2, 1, 4, '2021-01-20 13:47:16', '2021-01-20 13:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `company_insurances`
--

CREATE TABLE `company_insurances` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company_insurances`
--

INSERT INTO `company_insurances` (`id`, `title`, `status`, `image`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"misr\",\"ar\":\"\\u0645\\u0635\\u0631\"}', 0, '1565267092.png-1611132898-image.png', 1, '2021-01-20 06:54:58', '2021-01-20 06:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `time_work` longtext NOT NULL,
  `mobile` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `address`, `email`, `time_work`, `mobile`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"asds\",\"ar\":\"asd\"}', 'mohanad_1x@yahoo.com', '{\"en\":\"asd\",\"ar\":\"asd\"}', '123123', '2021-01-19 12:48:50', '2021-01-19 12:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `status`, `image`, `order`, `created_at`, `updated_at`) VALUES
(2, '{\"en\":\"egypt\",\"ar\":\"\\u0645\\u0635\\u0631\"}', 1, '1565267092.png-1611069211-image.png', 1, '2021-01-19 13:13:31', '2021-01-19 13:13:37'),
(3, '{\"en\":\"\\u0634\\u0633\\u064a\\u0633\\u0634\\u064a\",\"ar\":\"\\u0634\\u0633\\u064a\\u0633\\u0634\\u064a\\u0634\\u0633\\u064a\"}', 1, '1566291943.png-1611157881-image.png', 32, '2021-01-20 13:51:21', '2021-01-20 13:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` text DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `status`, `image`, `code`, `order`, `created_at`, `updated_at`) VALUES
(1, 'english', 1, '1565267092.png-1610972169-image.png', 'en', 1, '2021-01-18 08:13:44', '2021-01-18 10:23:05'),
(2, 'العربيه', 1, '1566495514.jpg-1611128328-image.jpg', 'ar', 2, '2021-01-18 08:13:44', '2021-01-20 05:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `detail` longtext NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL,
  `medicine_category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `title`, `detail`, `image`, `status`, `order`, `medicine_category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"asd\",\"ar\":\"qweqwe\"}', '', '1565267092.png-1611147855-image.png', 1, 3, 1, '2021-01-20 11:04:15', '2021-01-20 11:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_categories`
--

CREATE TABLE `medicine_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_categories`
--

INSERT INTO `medicine_categories` (`id`, `title`, `image`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"asd\",\"ar\":\"\\u0645\\u0635\\u0631\"}', '1565267092.png-1611147069-image.png', 1, 32, '2021-01-20 10:51:09', '2021-01-20 10:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `display_title` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `display_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dashboard-show', '{\"en\":\"dashboard show\",\"ar\":\"\\u0639\\u0631\\u0636 \\u0644\\u0648\\u062d\\u0647 \\u0627\\u0644\\u062a\\u062d\\u0643\\u0645\"}', '2021-01-17 12:22:52', '2021-01-23 13:02:36', NULL),
(2, 'acl-list', '{\"en\":\"acl list\",\"ar\":\"\\u0642\\u0627\\u0626\\u0645\\u0647 \\u0627\\u0644\\u0627\\u0630\\u0646\"}', '2021-01-17 12:22:52', '2021-01-23 12:59:33', NULL),
(3, 'user-list', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(4, 'user-index', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(5, 'user-create', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(6, 'user-edit', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(7, 'user-password', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(8, 'user-status', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(9, 'user-many-status', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(10, 'role-list', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(11, 'role-index', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(12, 'role-create', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(13, 'role-edit', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(14, 'permission-list', '', '2021-01-17 12:22:52', '2021-01-17 12:22:52', NULL),
(15, 'permission-index', '', '2021-01-17 12:22:53', '2021-01-17 12:22:53', NULL),
(16, 'permission-edit', '', '2021-01-17 12:22:53', '2021-01-17 12:22:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privacies`
--

CREATE TABLE `privacies` (
  `id` int(10) UNSIGNED NOT NULL,
  `detail` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `privacies`
--

INSERT INTO `privacies` (`id`, `detail`, `created_at`, `updated_at`) VALUES
(2, '{\"ar\":\"<p>\\u0634\\u0633\\u064a\\u0634\\u0633\\u064a<\\/p>\",\"en\":\"<p>ssss<\\/p>\"}', '2021-01-19 11:04:21', '2021-01-20 12:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `detail` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `detail`, `status`, `image`, `order`, `product_category_id`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"ss\",\"ar\":\"asd\"}', '', 1, '1565267092.png-1611145733-image.png', 2, 1, '2021-01-20 09:54:16', '2021-01-20 10:28:53'),
(2, '{\"en\":\"asd\",\"ar\":\"sadsad\"}', '', 1, '1565267248.png-1611145665-image.png', 1, 1, '2021-01-20 10:27:45', '2021-01-20 10:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title`, `status`, `image`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"ss\",\"ar\":\"\\u0645\\u0635\\u0631\"}', 1, '1565267092.png-1611142331-image.png', 1, '2021-01-20 09:32:11', '2021-01-20 09:32:11');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'developer', 1, '2021-01-17 14:27:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2021-01-21 12:46:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scientific_degrees`
--

CREATE TABLE `scientific_degrees` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scientific_degrees`
--

INSERT INTO `scientific_degrees` (`id`, `title`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"asd\",\"ar\":\"\\u0645\\u0635\\u0631\"}', 1, 32, '2021-01-20 07:31:51', '2021-01-20 07:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `detail` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `service_category_id` int(10) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `detail`, `status`, `service_category_id`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"ss\",\"ar\":\"ddd\"}', '{\"en\":\"asdasd\",\"ar\":\"asdasd  asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd asdasd asdadasdasd\"}', 1, 1, 32, '2021-01-20 09:10:52', '2021-01-20 11:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `service_categories`
--

CREATE TABLE `service_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_categories`
--

INSERT INTO `service_categories` (`id`, `title`, `image`, `status`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"asd\",\"ar\":\"asd\"}', '1565267092.png-1611140176-image.png', 1, 1, '2021-01-20 08:56:16', '2021-01-20 08:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `logo` text NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `youtube` text NOT NULL,
  `app_google` text NOT NULL,
  `app_ios` text NOT NULL,
  `twitter` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `logo`, `facebook`, `instagram`, `youtube`, `app_google`, `app_ios`, `twitter`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"roshetta\",\"ar\":\"\\u0631\\u0648\\u0634\\u062a\\u0647\"}', '1565267091.jpg-1611050406-logo.jpg', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', '2021-01-19 08:00:06', '2021-01-19 11:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `title`, `status`, `image`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"clic\",\"ar\":\"hsk\"}', 1, '1565267091.jpg-1611073747-image.jpg', 1, '2021-01-19 14:29:07', '2021-01-19 14:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `sub_specialties`
--

CREATE TABLE `sub_specialties` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `specialty_id` int(10) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_specialties`
--

INSERT INTO `sub_specialties` (`id`, `title`, `status`, `specialty_id`, `order`, `created_at`, `updated_at`) VALUES
(1, '{\"en\":\"asd\",\"ar\":\"asd\"}', 1, 1, 1, '2021-01-20 06:31:55', '2021-01-20 06:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` longtext NOT NULL,
  `second_name` longtext NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `status_login` int(11) NOT NULL DEFAULT 0,
  `image` text DEFAULT NULL,
  `gender` int(11) NOT NULL DEFAULT 1,
  `date_birth` date NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `second_name`, `email`, `mobile`, `password`, `status`, `status_login`, `image`, `gender`, `date_birth`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '', '', 'mohanad@admin.com', '010220202020200', '$2y$10$nf/L1tyPljGtg6cPpFp51uvX9s/p6ifxoH.YvSNoOj7mzfNmn1oDq', 1, 1, NULL, 1, '2021-01-17', 1, '2021-01-17 12:33:42', '2021-01-23 14:12:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `company_insurances`
--
ALTER TABLE `company_insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medicine_category_id` (`medicine_category_id`);

--
-- Indexes for table `medicine_categories`
--
ALTER TABLE `medicine_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacies`
--
ALTER TABLE `privacies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_id` (`permission_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `scientific_degrees`
--
ALTER TABLE `scientific_degrees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_category_id` (`service_category_id`);

--
-- Indexes for table `service_categories`
--
ALTER TABLE `service_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_specialties`
--
ALTER TABLE `sub_specialties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialty_id` (`specialty_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `mobile` (`mobile`(1024)),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_insurances`
--
ALTER TABLE `company_insurances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine_categories`
--
ALTER TABLE `medicine_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `privacies`
--
ALTER TABLE `privacies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scientific_degrees`
--
ALTER TABLE `scientific_degrees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_categories`
--
ALTER TABLE `service_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_specialties`
--
ALTER TABLE `sub_specialties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `city_area_area` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `country_area_area` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `country_city_city` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_category_product` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`);

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `permission_role_permission` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_role_permission` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `service_category_service` FOREIGN KEY (`service_category_id`) REFERENCES `service_categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
