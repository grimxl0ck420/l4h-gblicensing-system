-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2021 at 08:27 PM
-- Server version: 5.7.34
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l4h_apipanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `black_lists`
--

CREATE TABLE `black_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `level_resellers`
--

CREATE TABLE `level_resellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_resellers`
--

INSERT INTO `level_resellers` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Silver', '2020-04-01 14:54:30', '2020-04-01 14:54:30'),
(2, 'Gold', '2020-04-01 14:57:29', '2020-04-01 14:57:29'),
(3, 'Slab 3', '2020-04-01 14:58:41', '2021-04-25 06:27:02'),
(4, 'Existing', '2020-04-01 17:33:09', '2020-04-01 17:33:09'),
(5, 'Owner', '2020-04-02 19:09:55', '2020-04-02 19:09:55'),
(6, 'Supreme', '2020-05-24 05:29:48', '2020-05-24 05:29:48'),
(7, 'Ultimate', '2020-05-25 05:15:37', '2020-05-25 05:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `level_reseller_options`
--

CREATE TABLE `level_reseller_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_reseller_id` bigint(20) UNSIGNED NOT NULL,
  `software_id` bigint(20) UNSIGNED NOT NULL,
  `price_reseller` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level_reseller_options`
--

INSERT INTO `level_reseller_options` (`id`, `level_reseller_id`, `software_id`, `price_reseller`, `created_at`, `updated_at`) VALUES
(70, 5, 1, 0, '2020-04-07 21:58:53', '2020-04-07 21:58:53'),
(71, 5, 2, 0, '2020-04-07 21:58:53', '2020-04-07 21:58:53'),
(72, 5, 3, 0, '2020-04-07 21:58:53', '2020-04-07 21:58:53'),
(73, 5, 4, 0, '2020-04-07 21:58:53', '2020-04-07 21:58:53'),
(74, 5, 6, 0, '2020-04-07 21:58:53', '2020-04-07 21:58:53'),
(75, 5, 7, 0, '2020-04-07 21:58:53', '2020-04-07 21:58:53'),
(76, 5, 13, 0, '2020-04-07 21:58:53', '2020-04-07 21:58:53'),
(586, 7, 1, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(587, 7, 2, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(588, 7, 3, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(589, 7, 4, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(590, 7, 6, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(591, 7, 7, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(592, 7, 13, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(593, 7, 17, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(594, 7, 18, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(595, 7, 19, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(596, 7, 20, 0, '2020-06-10 18:28:58', '2020-06-10 18:28:58'),
(597, 7, 21, 0, '2020-06-10 18:28:59', '2020-06-10 18:28:59'),
(598, 7, 22, 0, '2020-06-10 18:28:59', '2020-06-10 18:28:59'),
(599, 7, 23, 0, '2020-06-10 18:28:59', '2020-06-10 18:28:59'),
(600, 7, 25, 0, '2020-06-10 18:28:59', '2020-06-10 18:28:59'),
(1018, 1, 1, 5, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1019, 1, 2, 1, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1020, 1, 3, 3, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1021, 1, 4, 4, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1022, 1, 6, 4, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1023, 1, 7, 1, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1024, 1, 13, 10, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1025, 1, 17, 4, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1026, 1, 18, 2, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1027, 1, 19, 3, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1028, 1, 20, 2, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1029, 1, 21, 2, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1030, 1, 22, 4, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1031, 1, 23, 4, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1032, 1, 25, 5, '2020-11-20 15:19:16', '2020-11-20 15:19:16'),
(1035, 2, 1, 4, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1036, 2, 2, 1, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1037, 2, 3, 3, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1038, 2, 4, 3, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1039, 2, 6, 3, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1040, 2, 7, 1, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1041, 2, 13, 9, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1042, 2, 17, 3, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1043, 2, 18, 2, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1044, 2, 19, 2, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1045, 2, 20, 2, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1046, 2, 21, 2, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1047, 2, 22, 4, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1048, 2, 23, 3, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1049, 2, 25, 4, '2020-11-20 15:19:31', '2020-11-20 15:19:31'),
(1069, 4, 1, 3, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1070, 4, 2, 1, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1071, 4, 3, 2, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1072, 4, 4, 1, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1073, 4, 6, 2, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1074, 4, 7, 1, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1075, 4, 13, 6, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1076, 4, 17, 2, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1077, 4, 18, 1, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1078, 4, 19, 1, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1079, 4, 20, 1, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1080, 4, 21, 1, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1081, 4, 22, 2, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1082, 4, 23, 3, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1083, 4, 25, 3, '2020-11-20 15:19:53', '2020-11-20 15:19:53'),
(1101, 6, 1, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1102, 6, 2, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1103, 6, 3, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1104, 6, 4, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1105, 6, 6, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1106, 6, 7, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1107, 6, 13, 2, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1108, 6, 17, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1109, 6, 18, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1110, 6, 19, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1111, 6, 20, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1112, 6, 21, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1113, 6, 22, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1114, 6, 23, 1, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1115, 6, 25, 2, '2021-04-24 16:49:00', '2021-04-24 16:49:00'),
(1116, 3, 1, 3, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1117, 3, 2, 1, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1118, 3, 3, 2, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1119, 3, 4, 2, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1120, 3, 6, 2, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1121, 3, 7, 1, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1122, 3, 13, 8, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1123, 3, 17, 3, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1124, 3, 18, 1, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1125, 3, 19, 2, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1126, 3, 20, 1, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1127, 3, 21, 1, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1128, 3, 22, 3, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1129, 3, 23, 2, '2021-04-25 06:27:02', '2021-04-25 06:27:02'),
(1130, 3, 25, 3, '2021-04-25 06:27:02', '2021-04-25 06:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `software_id` bigint(20) UNSIGNED NOT NULL,
  `reseller_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `end_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validdirs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billingcycle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message` text CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message`, `created_at`, `updated_at`) VALUES
('<h2>Terms of service</h2>', NULL, '2021-04-22 16:34:42');

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
(10, '2020_03_10_142305_create_servers_table', 2),
(11, '2020_03_10_205821_create_resellers_table', 2),
(12, '2020_03_10_777777_create_licenses_table', 2),
(13, '2020_03_10_101147_create_software_table', 3),
(14, '2020_03_12_123717_create_messages_table', 4),
(17, '2020_03_23_113601_create_accounts_table', 5),
(18, '2020_03_23_113640_create_proxies_table', 5),
(23, '2020_03_23_121718_create_proxy_software_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `proxies`
--

CREATE TABLE `proxies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` int(11) NOT NULL,
  `expiry_date` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proxy_software`
--

CREATE TABLE `proxy_software` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proxy_id` int(11) NOT NULL,
  `expiry_date` int(11) NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci,
  `use` int(11) DEFAULT NULL,
  `used` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `priority` int(11) NOT NULL DEFAULT '1',
  `software_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_use` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resellers`
--

CREATE TABLE `resellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL,
  `end_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_domain` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `folder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key_cmd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('whmcs','local') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servers`
--

CREATE TABLE `servers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proxy_conf` text COLLATE utf8mb4_unicode_ci,
  `key` text COLLATE utf8mb4_unicode_ci,
  `priority` int(11) NOT NULL DEFAULT '1',
  `use` int(11) DEFAULT '0',
  `used` int(11) DEFAULT '0',
  `software_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `last_use` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servers`
--

INSERT INTO `servers` (`id`, `name`, `proxy_conf`, `key`, `priority`, `use`, `used`, `software_id`, `status`, `created_at`, `last_use`, `updated_at`, `expiry_date`) VALUES
(515, 'p1', NULL, 'A00Y00-R9BW08-WRV342-DSKM58-089E01', 1, 0, 0, 3, 1, '2021-10-13 19:23:32', NULL, '2021-10-13 19:23:32', 14);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Licenses4.host', '2020-04-11 17:00:00', '2021-10-13 20:26:40'),
(2, 'client_login', '', '2020-04-11 17:00:00', '2020-04-12 14:13:46'),
(3, 'proxy_using', '', '2020-04-11 17:00:00', '2021-10-13 20:26:40'),
(4, 'IP_whitelist', '', '2020-04-11 17:00:00', '2021-10-13 20:26:40'),
(5, 'last_using', '1', '2020-04-11 17:00:00', '2021-10-13 20:26:40'),
(6, 'enable_api', '1', '2020-04-12 17:00:00', '2020-07-08 18:45:03'),
(7, 'api_key', '6be799ae124a68c2cc0e1bf548dd9499', '2020-04-12 17:00:00', '2020-07-08 18:45:03'),
(8, 'whmcs_username', '9uno2Q901xY7l6VX1Nkm3pZ3rhasMJRC', '2020-04-15 17:00:00', '2021-10-13 20:26:40'),
(9, 'whmcs_password', 'rzX694Ex6pRKFrOok2ZNyWK3l941wtUQ', '2020-04-15 17:00:00', '2021-10-13 20:26:40'),
(10, 'whmcs_domain', 'Licenses4.host', '2020-04-15 17:00:00', '2021-10-13 20:26:40');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cmd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `softwares` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_reseller` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `change_ip` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id`, `name`, `key`, `cmd`, `softwares`, `price_reseller`, `status`, `change_ip`, `created_at`, `updated_at`) VALUES
(1, 'cPanel VPS Licensing System', 'cpanel', 'rm -rf installer\r\nrm -rf setup\r\ncurl -L -o \"installer\" \"{domain}/api/files/cpanel/installer?key=cpanel\"\r\nchmod +x installer\r\n./installer\r\ngblicensecp', '[\"2\"]', 0, 1, 1, '2020-03-12 04:13:44', '2021-04-24 16:07:55'),
(2, 'Softaculous Licensing System', 'soft', 'rm -rf installer\r\ncurl -L -o \"installer\" \"{domain}/api/files/soft/installer?key=soft\"\r\nchmod +x installer\r\n./installer\r\ngblicensesc_update', '[]', 0, 1, 1, '2020-03-12 04:15:09', '2021-02-08 05:04:08'),
(3, 'Plesk Web HOST VPS Licensing System', 'plesk', 'rm -rf installer\r\nwget  https://softaculous.xyz/req.sh\r\nsh req.sh\r\ncurl -L -o \"installer\" \"{domain}/api/files/plesk/installer?key=plesk\"\r\nchmod +x installer\r\n./installer', '[]', 0, 1, 1, '2020-03-12 04:50:46', '2020-05-11 07:30:53'),
(4, 'CloudLinux Licensing System', 'cloudlinux', 'rm -rf installer\r\ncurl -L -o \"installer\" \"{domain}/api/files/cloudlinux/installer?key=cloudlinux\"\r\nchmod +x installer\r\n./installer', '[]', 0, 1, 1, '2020-03-12 20:42:25', '2021-01-29 07:23:41'),
(6, 'Imunify360 Licensing System', 'imunify360', 'rm -rf installer\r\ncurl -L -o \"installer\" \"{domain}/api/files/imunify360/installer?key=imunify360\"\r\nchmod +x installer\r\n./installer', '[]', 0, 1, 1, '2020-03-12 20:43:55', '2020-05-11 07:31:13'),
(7, 'KernelCare Licensing System', 'kernelcare', 'rm -rf installer\r\ncurl -L -o \"installer\" \"{domain}/api/files/kernelcare/installer?key=kernelcare\"\r\nchmod +x installer\r\n./installer', '[]', 0, 1, 1, '2020-03-12 20:44:14', '2020-05-11 07:31:24'),
(13, 'cPanel Dedicated Licensing System', 'dcpanel', 'rm -rf installer\r\nrm -rf setup\r\ncurl -L -o \"installer\" \"{domain}/api/files/dcpanel/installer?key=dcpanel\"\r\nchmod +x installer\r\n./installer\r\ngblicensecp', '[\"2\",\"18\",\"20\"]', 0, 1, 1, '2020-04-07 21:21:18', '2021-02-03 22:12:05'),
(17, 'Virtualizor Licensing System', 'virtualizor', 'rm -rf installer\r\nwget  https://softaculous.xyz/req.sh\r\nsh req.sh\r\ncurl -L -o \"installer\" \"{domain}/api/files/virtualizor/installer?key=virtualizor\"\r\nchmod +x installer\r\n./installer', '[]', 0, 1, 1, '2020-05-10 23:56:24', '2021-02-07 05:39:19'),
(18, 'Sitepad Licensing System', 'sitepad', 'rm -rf installer\r\ncurl -L -o \"installer\" \"{domain}/api/files/sitepad/installer?key=sitepad\"\r\nchmod +x installer\r\n./installer\r\ngblicensesp_update', '[]', 0, 1, 1, '2020-05-10 23:57:49', '2020-07-05 11:14:28'),
(19, 'JetBackup Licensing System', 'jetbackup', 'rm -rf installer\r\ncurl -L -o \"installer\" \"{domain}/api/files/jetbackup/installer?key=jetbackup\"\r\nchmod +x installer\r\n./installer', '[]', 0, 1, 1, '2020-05-10 23:59:42', '2020-05-11 00:07:11'),
(20, 'WHM Reseller - multi-level Reseller Plugin', 'whmreseller', 'rm -rf installer\r\ncurl -L -o \"installer\" \"{domain}/api/files/whmreseller/installer?key=whmreseller\"\r\nchmod +x installer\r\n./installer', '[]', 0, 1, 1, '2020-05-11 00:00:12', '2020-05-11 00:07:39'),
(21, 'MediaCP License', 'mediacp', 'rm -rf installer\r\ncurl -L -o \"installer\" \"{domain}/api/files/blackedMCP/installer?key=blackedMCP\"\r\nchmod +x installer\r\n./installer', '[]', 0, 1, 1, '2020-05-11 00:00:40', '2021-10-13 07:25:48'),
(22, 'Plesk Web HOST Dedicated Licensing System', 'dplesk', 'rm -rf installer\r\nwget https://softaculous.xyz/req.sh\r\nsh req.sh\r\ncurl -L -o \"installer\" \"{domain}/api/files/dplesk/installer?key=dplesk\"\r\nchmod +x installer\r\n./installer', '[]', 0, 1, 1, '2020-05-11 00:01:40', '2020-05-11 00:08:56'),
(23, 'LiteSpeed Web Host System License', 'litespeed', 'rm -rf installer\r\ncurl -L -o \"installer\" \"{domain}/api/files/litespeed/installer?key=litespeed\"\r\nchmod +x installer\r\n./installer', '[]', 0, 1, 1, '2020-06-09 15:34:40', '2020-08-16 08:42:32'),
(25, 'Whmcs Business License Monthly', 'whmcs', 'Download License.zip file\r\n\r\nhttps://{domain}/api/files/whmcs/License.zip\r\n\r\n- Then upload/replace that file in public_html/vendor/whmcs/whmcs-foundation/lib  \r\n- Then extract License.zip with replacement\r\n- Change your license key in configuration.php\r\n\r\nIn case you do not have whmcs installed: https://releases.whmcs.com/v2/pkgs/whmcs-7.10.2-release.1.zip', '[]', 0, 1, 1, '2020-06-09 18:21:18', '2020-08-25 19:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', '$2y$12$Fd/A1YiYi.41W4uMlPeeUegyezQDBhWjUXrVgowh88wRvK9rWsZWy', 'T4cl12Zz0QSJ9MG5CNZi7X94sCmzFHR2fjWF2c6otzrfKG6M6J3S7lTbCDhF', '2020-03-10 05:45:19', '2021-01-29 21:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `virtual_servers`
--

CREATE TABLE `virtual_servers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `server_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `virtual_servers`
--

INSERT INTO `virtual_servers` (`id`, `title`, `server_ip`, `server_key`, `created_at`, `updated_at`) VALUES
(2, 'Whmreseller', '88.99.161.34', 'whmreseller', '2020-04-15 08:11:49', '2021-02-05 13:15:07'),
(3, 'WhmSonic', '88.99.161.34', 'whmsonic', '2020-04-21 11:58:38', '2021-02-05 13:15:35'),
(6, 'Virtualizor', '88.99.161.34', 'virtualizor', '2020-12-10 23:51:41', '2021-02-07 19:36:53'),
(8, 'softaculous', '88.99.161.34', 'softaculous', '2021-02-02 20:13:03', '2021-02-07 06:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `white_lists`
--

CREATE TABLE `white_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `black_lists`
--
ALTER TABLE `black_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_resellers`
--
ALTER TABLE `level_resellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_reseller_options`
--
ALTER TABLE `level_reseller_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level_reseller_options_ibfk_1` (`software_id`),
  ADD KEY `level_reseller_options_ibfk_2` (`level_reseller_id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proxies`
--
ALTER TABLE `proxies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proxy_software`
--
ALTER TABLE `proxy_software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resellers`
--
ALTER TABLE `resellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servers`
--
ALTER TABLE `servers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `virtual_servers`
--
ALTER TABLE `virtual_servers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `black_lists`
--
ALTER TABLE `black_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level_resellers`
--
ALTER TABLE `level_resellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `level_reseller_options`
--
ALTER TABLE `level_reseller_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1131;

--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `proxies`
--
ALTER TABLE `proxies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1210;

--
-- AUTO_INCREMENT for table `proxy_software`
--
ALTER TABLE `proxy_software`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4095;

--
-- AUTO_INCREMENT for table `resellers`
--
ALTER TABLE `resellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `servers`
--
ALTER TABLE `servers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=516;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `virtual_servers`
--
ALTER TABLE `virtual_servers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `level_reseller_options`
--
ALTER TABLE `level_reseller_options`
  ADD CONSTRAINT `level_reseller_options_ibfk_1` FOREIGN KEY (`software_id`) REFERENCES `software` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `level_reseller_options_ibfk_2` FOREIGN KEY (`level_reseller_id`) REFERENCES `level_resellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
