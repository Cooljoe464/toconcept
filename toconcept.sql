-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2025 at 12:01 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toconcept`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `names` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photos` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `links` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_id_index` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `names`, `photos`, `links`, `created_at`, `updated_at`) VALUES
(1, 'Trials', 'clients/DKyUHWb8I0rExwbUfPsMhvTRr0l9keYvANZNwyku.png', 'https://hello.com', NULL, '2025-02-18 21:29:50'),
(2, 'Swallow', 'clients/sC8bj6ugRGTFar10R5N1xwZuNRMEFg1EBaR5oVSV.jpg', 'https://test.com', NULL, '2025-02-18 15:19:33'),
(7, 'GtTeams', 'clients/oFZNMthSgDFO2RwUIMZZf0J4yXTPsN98kqosy6un.webp', 'https://test.com', NULL, '2025-02-18 15:21:50'),
(6, 'GtTeams', 'clients/oFZNMthSgDFO2RwUIMZZf0J4yXTPsN98kqosy6un.webp', 'https://test.com', NULL, '2025-02-18 15:21:50'),
(8, 'GtTeams', 'clients/oFZNMthSgDFO2RwUIMZZf0J4yXTPsN98kqosy6un.webp', 'https://test.com', NULL, '2025-02-18 15:21:50'),
(9, 'GtTeams', 'clients/oFZNMthSgDFO2RwUIMZZf0J4yXTPsN98kqosy6un.webp', 'https://test.com', NULL, '2025-02-18 15:21:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `faqs_question_unique` (`question`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'How do I book a session?', 'You can book a session by clicking on [Book Now], calling us at\n                                                        (123) 456-7890, or emailing us at hello@toconcepts.com.', '2025-02-22 22:07:02', '2025-02-22 22:07:04'),
(2, 'What should I expect during a photo session?', 'Our sessions are tailored to your needs. We’ll discuss your vision beforehand and guide you through poses and settings to achieve the best results.', '2025-02-22 22:13:59', '2025-02-22 22:14:01');

-- --------------------------------------------------------

--
-- Table structure for table `home_page`
--

DROP TABLE IF EXISTS `home_page`;
CREATE TABLE IF NOT EXISTS `home_page` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography_home` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography_footer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography_about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography_photo` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email1` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email2` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `home_page_uuid_index` (`uuid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_page`
--

INSERT INTO `home_page` (`id`, `uuid`, `video_id`, `biography_home`, `biography_footer`, `biography_about`, `biography_photo`, `email1`, `email2`, `phone1`, `phone2`, `address`, `map_address`, `facebook`, `twitter`, `instagram`, `tiktok`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'LDU_Txk06tM', 'LDU_Txk06tM', 'At ToConcepts, photography is not\n                                                    just a profession; it’s our passion. With years of experience\n                                                    capturing weddings, portraits, events, and landscapes, we’ve honed\n                                                    our craft to turn ordinary moments into extraordinary visuals.', 'At ToConcepts, photography is not\n                                                    just a profession; it’s our passion. With years of experience\n                                                    capturing weddings, portraits, events, and landscapes, we’ve honed\n                                                    our craft to turn ordinary moments into extraordinary visuals.', 'At ToConcepts, photography is not\n                                                    just a profession; it’s our passion. With years of experience\n                                                    capturing weddings, portraits, events, and landscapes, we’ve honed\n                                                    our craft to turn ordinary moments into extraordinary visuals.', 'biography/aRkxNf5j7od7R7NIITpUWY6hkp2BWR2s7CWueN5n.png', 'toconcepts@gmail.com', '', '080347567445', NULL, 'address bars', '<iframe\n                    src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31516.474495111022!2d7.3782608505471785!3d9.103847596691818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x104e756e877080fb%3A0xa9cbe3f96accde4e!2sGwarinpa%20Estate%2C%20Abuja%20900108%2C%20Federal%20Capital%20Territory!5e0!3m2!1sen!2sng!4v1737558580206!5m2!1sen!2sng\"\n                    width=\"850\" height=\"1920\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"\n                    referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'https://facebook.com', 'https://twitter.com', 'https://instagram.com', 'https://tiktok.com', 'https://linkedin.com', NULL, '2025-02-17 14:51:58', '2025-02-21 06:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(10, '2025_02_15_074040_create_home_pages_table', 4),
(8, '2025_02_15_074544_create_portfolios_table', 3),
(6, '2025_02_15_074829_create_tags_table', 2),
(20, '2025_02_22_225134_create_faqs_table', 7),
(15, '2025_02_17_154630_create_clients_table', 5),
(16, '2025_02_17_154637_create_teams_table', 5),
(19, '2025_02_17_154823_create_videos_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
CREATE TABLE IF NOT EXISTS `portfolios` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `tags_id`, `tags`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Testing1', '2', 'corporate', 'portfolios/kKRtBtAlBz3fJOVCvOiFxImlicbqzYi1YRGNBNHf.png', '2025-02-15 13:25:40', '2025-02-21 06:07:44'),
(30, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(31, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(32, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(33, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(34, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(39, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(36, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(25, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(26, 'Testing', '1', 'weddings', 'portfolios/0WCzdVOXVPnrzxvfdWXPnZpl6JVegp7RIloDAWHD.png', '2025-02-15 13:25:40', '2025-02-21 06:17:58'),
(27, 'Testing', '1', 'weddings', 'portfolios/86pu9eOc4XmlTHSUc5iAoEceSQfpAVlEW2TmNUwL.png', '2025-02-15 13:25:40', '2025-02-21 06:18:57'),
(41, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(37, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(40, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(38, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(35, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(29, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(42, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(43, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(44, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20'),
(45, 'Testing', '1', 'weddings', 'portfolios/qk4V0n2cTYDRzmSdDsZYDoAPwsLEuRFAlnHaU7sm.png', '2025-02-15 13:25:40', '2025-02-21 06:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('x8wqQKDqye5RvGJRXqod1wrodgL5jnRHqDUhoLrb', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR1NaeHVxbVFTeVBTWVM5NFkybnYydHNZRERoeXFZTnU4aTNtSmVVaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzM6Imh0dHA6Ly8xMjcuMC4wLjExL3BvcnRmb2xpb3MvMFdDemRWT1hWUG5yenh2ZmRXWFBuWnBsNkpWZWdwN1JJbG9EQVdIRC5wbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740264126),
('FjdullNn8ac1EXTDlgjZirMnAK7AJhfV0gGoNCqh', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'ZXlKcGRpSTZJbHB0YW5sa2FISkxSM2d4UVRkSVRHdHRPRGhOZFZFOVBTSXNJblpoYkhWbElqb2lkMGxzTkhCUlkwTTRkMkoxTjBsSWIybG9RekZEVTI1WVdXeFliMFIxTkhOWFdWWTFWRzl2Ym01TlREbFlXVGxPUVZsVWQybHpXVUpuWlRneGNXZEthazVoYjJaWmQzQjNhMlV5ZUhreFdVbEtNMFpaVkU5WlQzSnFiRGROTTJ4Rk1ETkhjakZKYjBRNVNHTnNPVFZ4YVhreFRpOXZVVTVTVTJSTEswWm9RM1p5WkhsaVJFaFJUVWcwU3poTFZGVjBWR2xzUlUxUWNraGpOalJZV25abFZ6ZGxTRkpuTjFJd1EzTkxhbWwzWWs5SGJrUm9aWGswTldJM1drWmthelJuT1U1UlExQktPVVJrYUU5SVpFbHhlV1kwUm5kck4wMVJPVVZrV0VobFptOTRTVEZJVFZKeVVWUlRkWGxtYTBGUFpWVTNTRVpPTUV3MVJYUmxRazQzYW1OdVEzWm9jRVZMVGxNd2FUUXllRGRoWkVOSU5sSndiMm95TTNjeFVEaDJTMkZvVDNaVVl6ZG9lVlUzWVVsaGMxZFlSbWxvU1daS2FVaDRTVGg1VjNsTGRVbzRjbWhwWkVGSkwybHJUVXd6Y0dGTVpHdGpSbVZITVU1d1RubHRjemwxVVU4MFEzSkJiblJCUFNJc0ltMWhZeUk2SWpVd05UZGlNelEwWlROa1ptUm1ZVFF5TnpReU5EWXdPR1ZrTURrME1UQXhNVFEyWlRRd04yRTBNVFUwTnpFNVkyUTFZemhpTTJRNE5ESmlZV1ExWkdVaUxDSjBZV2NpT2lJaWZRPT0=', 1740268712),
('PKLbLLzpT2644SCCHVuVuzWLQbXBnVlY0GelSug9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWm9NYzB5M2xCYXBwMEg3azU5WFV3T0hVSDM1SE9HZmd1MEYwV2ZGZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzM6Imh0dHA6Ly8xMjcuMC4wLjExL3BvcnRmb2xpb3MvcWs0VjBuMmNUWURSem1TZERzWllEb0FQd3NMRXVSRkFsbkhhVTdzbS5wbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740264126),
('qPQ9zTq7syV8ZG7FfkRcZ0eWvhnuuFbnSHHWiUU5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiblpOeWtKZ2czTUU3bnptTWw5bTRnTWZhNm5MTzFlQWdVWXZZNHlaUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzM6Imh0dHA6Ly8xMjcuMC4wLjExL3BvcnRmb2xpb3MvODZwdTllT2M0WG1sVEhTVWM1aUFvRWNlU1FmcEFWbEVXMlRtTlV3TC5wbmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1740264126);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`),
  UNIQUE KEY `tags_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Weddings', 'weddings', '2025-02-15 09:30:48', '2025-02-15 09:30:48'),
(2, 'Corporate', 'corporate', '2025-02-15 13:20:58', '2025-02-15 13:21:01'),
(3, 'Portraits', 'portraits', '2025-02-16 21:32:21', '2025-02-16 21:32:23');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES
(3, 'Chaimaka', 'teams/ov715DWOTtdwZYBXnfYzVHPTWTXO38hU1bu9z7gM.png', '2025-02-17 15:22:38', '2025-02-18 15:42:54'),
(4, 'Woman in white dress1', 'teams/Id5k7SyFioUX0x7Dcd2q6SMCzToA1hY13OtCLFii.jpg', '2025-02-17 15:22:38', '2025-02-18 15:43:09'),
(7, 'Hello', 'teams/ldAyVJBcZw3mFFsO41DaKFR0QbscTHggxd15iBtF.jpg', '2025-02-18 15:43:25', '2025-02-18 15:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-01-21 09:45:28', '$2y$12$P9AZ2HRHiB0qyTl5K.7xgOs4vKFpQDI.gOEcRt8CDEp/QlMw4JVou', '8vwEDsOy37BYyEvqeTDCLQ7fAZnO0RpmaPnYqvj98iUHQmWC3YWc8jNaI5iu', '2025-01-21 09:45:28', '2025-01-21 09:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_id` bigint DEFAULT NULL,
  `video_id` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `tag`, `tag_id`, `video_id`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'corporate', 2, 'LDU_Txk06tM', '2025-02-21 18:34:28', '2025-02-22 21:22:53'),
(3, 'Test', 'corporate', 2, 'LDU_Txk06tM', '2025-02-21 18:34:28', '2025-02-22 21:22:53'),
(4, 'Test', 'weddings', 2, 'LDU_Txk06tM', '2025-02-21 18:34:28', '2025-02-22 21:22:53'),
(5, 'Test', 'corporate', 2, 'LDU_Txk06tM', '2025-02-21 18:34:28', '2025-02-22 21:22:53'),
(6, 'Test', 'corporate', 2, 'LDU_Txk06tM', '2025-02-21 18:34:28', '2025-02-22 21:22:53'),
(7, 'Test', 'corporate', 2, 'LDU_Txk06tM', '2025-02-21 18:34:28', '2025-02-22 21:22:53');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
