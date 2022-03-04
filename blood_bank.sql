-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 08:55 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_types`
--

CREATE TABLE `blood_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_types`
--

INSERT INTO `blood_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A+', '2022-02-23 22:00:00', '2022-02-23 22:00:00'),
(2, 'O+', '2022-02-23 22:00:00', '2022-02-23 22:00:00'),
(3, 'AB+', '2022-02-23 22:00:00', '2022-02-23 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blood_type_client`
--

CREATE TABLE `blood_type_client` (
  `id` int(10) UNSIGNED NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_type_client`
--

INSERT INTO `blood_type_client` (`id`, `blood_type_id`, `client_id`, `created_at`, `updated_at`) VALUES
(4, 1, 2, NULL, NULL),
(5, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'مقالات طبيه عامه', '2022-02-23 23:20:35', '2022-02-23 23:20:35'),
(2, 'قلب وباطنه', '2022-02-23 23:21:44', '2022-02-23 23:21:44'),
(3, 'ابحاث طبيه', '2022-02-23 23:21:54', '2022-02-23 23:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `governorate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `governorate_id`, `created_at`, `updated_at`) VALUES
(1, 'قطور', 1, '2022-02-23 16:23:13', '2022-02-23 16:23:13'),
(2, 'طنطا', 1, '2022-02-23 16:23:19', '2022-02-23 16:23:19'),
(3, 'المحله', 1, '2022-02-23 16:23:34', '2022-02-23 16:23:34'),
(4, 'مدينه نصر', 2, '2022-02-23 16:23:41', '2022-02-23 16:23:41'),
(5, 'المعادي', 2, '2022-02-23 16:23:48', '2022-02-23 16:23:48'),
(6, 'مصر الجديده', 2, '2022-02-23 16:23:56', '2022-02-23 16:23:56'),
(7, 'المنصوره', 3, '2022-02-23 16:24:02', '2022-02-23 16:24:02'),
(8, 'بركه السبع', 4, '2022-02-23 16:24:17', '2022-02-23 16:24:17'),
(9, 'الزقازيق', 6, '2022-02-23 16:24:27', '2022-02-23 16:24:27'),
(10, 'الهرم', 5, '2022-02-23 16:24:37', '2022-02-23 16:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_o_b` date NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL,
  `last_donation_date` date NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `pin_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `email`, `phone`, `password`, `d_o_b`, `blood_type_id`, `last_donation_date`, `city_id`, `pin_code`, `api_token`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'm7md elfert', 'mohamedelfert@yahoo.com', '01141561354', '$2y$10$ajYnnI8DY7jZx5aFK8yc/Oagz7ji8B.1VDOThV66lj1PXDSxZySaq', '1995-02-11', 1, '2021-06-16', 2, NULL, 'sXGh4OtoslPf0PVhSOfRPv60ytCkQN8hgvrHUTYdbw9a4G8ig1J1sv8Cyd43', 1, '2022-03-03 15:16:50', '2022-03-04 17:18:23'),
(2, 'سامي علي السيد', 'samy20@yahoo.com', '01163225000', '$2y$10$duhV5Q1AeGclPAHZggYiTuOsB2Rs4RKV9Mn1yyCdj5eD9C861I3ri', '2003-03-05', 1, '2020-05-15', 8, NULL, 'WUwh8xx33qnkjWvutQazmwdxTY0ETQyU3VbmttMVtsG8jhSCWx880TgY8lKS', 1, '2022-03-03 15:20:22', '2022-03-04 16:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `client_governorate`
--

CREATE TABLE `client_governorate` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `governorate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_governorate`
--

INSERT INTO `client_governorate` (`id`, `client_id`, `governorate_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(4, 2, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_notification`
--

CREATE TABLE `client_notification` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `notification_id` int(10) UNSIGNED NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_notification`
--

INSERT INTO `client_notification` (`id`, `client_id`, `notification_id`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_post`
--

CREATE TABLE `client_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Ursula Cook', 'xibo@mailinator.com', '01164231547', 'Molestiae placeat d', 'In labore amet at vIn labore amet at vIn labore amet at vIn labore amet at vIn labore amet at vIn labore amet at vIn labore amet at vIn labore amet at vIn labore amet at vIn labore amet at v', '2022-03-04 12:49:22', '2022-03-04 12:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` int(11) NOT NULL,
  `blood_type_id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `bags_num` int(11) NOT NULL,
  `hospital_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `patient_name`, `patient_phone`, `patient_age`, `blood_type_id`, `city_id`, `client_id`, `bags_num`, `hospital_name`, `hospital_address`, `latitude`, `longitude`, `details`, `created_at`, `updated_at`) VALUES
(1, 'سعيد خالد محمود', '01156421011', 45, 2, 7, 1, 1, 'مستشفي الدمرداش', 'طنطا', '30.79303510', '30.96433700', 'يحتاج الي تبرع عاجل بالدم', '2022-02-23 20:06:07', '2022-02-23 20:06:07'),
(5, 'ali gmal', '01164521547', 33, 3, 10, 2, 21, 'مستشفي الجامعه بطنطا', 'طنطا , شارع البحر ,مبني مستشفي الجامعه', '30.80069080', '30.99581360', 'يحتاج الي تبرع عاجل بالدم لاجراء عمليه سريعه', NULL, NULL),
(7, 'hassan', '0116452157', 54, 3, 7, 2, 21, 'مستشفى الخير', '153 قناة السويس، المنصورة (قسم 2)، المنصورة، الدقهلية', '31.05178620', '31.40691860', '', NULL, NULL),
(8, 'Merritt Mckee', '01165842687', 30, 3, 2, 1, 2, 'Christopher Nicholson', 'Irure soluta vel acc', '30.54477400', '30.54477400', 'Non qui excepturi ab', '2022-03-04 14:41:20', '2022-03-04 14:41:20'),
(9, 'David Allen', '01164309755', 40, 3, 5, 1, 3, 'Haley Lester', 'Error nostrum offici', '30.50377400', '30.53157400', 'In aliquid exercitat In aliquid exercitat In aliquid exercitat In aliquid exercitat', '2022-03-04 14:46:20', '2022-03-04 14:46:20');

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
-- Table structure for table `governorates`
--

CREATE TABLE `governorates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governorates`
--

INSERT INTO `governorates` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'الغربيه', '2022-02-23 16:22:26', '2022-02-23 16:22:26'),
(2, 'القاهره', '2022-02-23 16:22:33', '2022-02-23 16:22:33'),
(3, 'الدقهليه', '2022-02-23 16:22:40', '2022-02-23 16:22:40'),
(4, 'المنوفيه', '2022-02-23 16:22:45', '2022-02-23 16:22:45'),
(5, 'الجيزه', '2022-02-23 16:22:51', '2022-02-23 16:22:51'),
(6, 'الشرقيه', '2022-02-23 16:23:02', '2022-02-23 16:23:02'),
(7, 'قنا', '2022-03-03 16:23:48', '2022-03-03 16:23:48');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_02_10_110319_create_blood_type_client_table', 1),
(4, '2022_02_10_110319_create_blood_types_table', 1),
(5, '2022_02_10_110319_create_categories_table', 1),
(6, '2022_02_10_110319_create_cities_table', 1),
(7, '2022_02_10_110319_create_client_governorate_table', 1),
(8, '2022_02_10_110319_create_client_notification_table', 1),
(9, '2022_02_10_110319_create_client_post_table', 1),
(10, '2022_02_10_110319_create_clients_table', 1),
(12, '2022_02_10_110319_create_donations_table', 1),
(13, '2022_02_10_110319_create_governorates_table', 1),
(14, '2022_02_10_110319_create_notifications_table', 1),
(15, '2022_02_10_110319_create_posts_table', 1),
(16, '2022_02_10_110319_create_settings_table', 1),
(17, '2022_02_10_110329_create_foreign_keys', 1),
(18, '2022_02_28_014516_create_permission_tables', 2),
(19, '2014_10_12_100000_create_password_resets_table', 3),
(20, '2014_10_12_000000_create_users_table', 4),
(21, '2022_02_10_110319_create_contacts_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(5, 'App\\User', 3),
(5, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `donation_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `content`, `donation_id`, `created_at`, `updated_at`) VALUES
(1, 'حاله تحتاج تبرع قريبه منك', 'AB+يوجد حاله تحتاج الي التبرع بالدم قريبه منك فصيله دمها ', 9, '2022-03-04 14:46:20', '2022-03-04 14:46:20');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `routes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`, `routes`) VALUES
(1, 'user-list', 'المستخدمين', 'web', '2022-02-28 00:53:52', '2022-02-28 00:53:52', 'users.index'),
(2, 'user-create', 'المستخدمين', 'web', '2022-02-28 00:53:52', '2022-02-28 00:53:52', 'users.create,users.store'),
(3, 'user-edit', 'المستخدمين', 'web', '2022-02-28 00:53:52', '2022-02-28 00:53:52', 'users.edit,users.update'),
(4, 'user-delete', 'المستخدمين', 'web', '2022-02-28 00:53:52', '2022-02-28 00:53:52', 'users.destroy'),
(5, 'role-list', 'الصلاحيات', 'web', '2022-02-28 00:53:52', '2022-02-28 00:53:52', 'roles.index'),
(6, 'role-create', 'الصلاحيات', 'web', '2022-02-28 00:53:52', '2022-02-28 00:53:52', 'roles.create,roles.store'),
(7, 'role-edit', 'الصلاحيات', 'web', '2022-02-28 00:53:52', '2022-02-28 00:53:52', 'roles.edit,roles.update'),
(8, 'role-delete', 'الصلاحيات', 'web', '2022-02-28 00:53:52', '2022-02-28 00:53:52', 'roles.destroy'),
(9, 'post-list', 'المقالات', 'web', '2022-02-27 22:00:00', '2022-02-27 22:00:00', 'posts.index'),
(10, 'post-create', 'المقالات', 'web', '2022-02-27 22:00:00', '2022-02-27 22:00:00', 'posts.store'),
(11, 'post-edit', 'المقالات', 'web', '2022-02-27 22:00:00', '2022-02-27 22:00:00', 'posts.update'),
(12, 'post-delete', 'المقالات', 'web', '2022-02-27 22:00:00', '2022-02-27 22:00:00', 'posts.destroy'),
(14, 'client-list', 'العملاء', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'clients.index'),
(15, 'client-create', 'العملاء', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'clients.create,clients.store'),
(16, 'client-edit', 'العملاء', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'clients.edit,clients.update'),
(17, 'client-delete', 'العملاء', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'clients.destroy'),
(18, 'governorates-list', 'المحافظات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'governorates.index'),
(19, 'governorates-create', 'المحافظات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'governorates.create,governorates.store'),
(20, 'governorates-edit', 'المحافظات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'governorates.edit,governorates.update'),
(21, 'governorates-delete', 'المحافظات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'governorates.destroy'),
(22, 'cities-list', 'المدن', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'cities.index'),
(23, 'cities-create', 'المدن', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'cities.create,cities.store'),
(24, 'cities-edit', 'المدن', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'cities.edit,cities.update'),
(25, 'cities-delete', 'المدن', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'cities.destroy'),
(26, 'categories-list', 'التنصنيفات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'categories.index'),
(27, 'categories-create', 'التنصنيفات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'categories.create,categories.store'),
(28, 'categories-edit', 'التنصنيفات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'categories.edit,categories.update'),
(29, 'categories-delete', 'التنصنيفات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'categories.destroy'),
(30, 'donations-list', 'التبرعات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'donations.index'),
(31, 'donations-create', 'التبرعات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'donations.create,donations.store'),
(32, 'donations-edit', 'التبرعات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'donations.edit,donations.update'),
(33, 'donations-delete', 'التبرعات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'donations.destroy'),
(34, 'contacts-list', 'الرسائل', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'contacts.index'),
(35, 'contacts-create', 'الرسائل', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'contacts.create,contacts.store'),
(36, 'contacts-edit', 'الرسائل', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'contacts.edit,contacts.update'),
(37, 'contacts-delete', 'الرسائل', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'contacts.destroy'),
(38, 'settings-list', 'الاعدادات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'settings.index'),
(39, 'settings-create', 'الاعدادات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'settings.create,settings.store'),
(40, 'settings-edit', 'الاعدادات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'settings.edit,settings.update'),
(41, 'settings-delete', 'الاعدادات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'settings.destroy'),
(42, 'roles-show', 'الصلاحيات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'roles.show'),
(44, 'donations-show', 'التبرعات', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'donations.show'),
(45, 'contacts-show', 'الرسائل', 'web', '2022-02-28 22:00:00', '2022-02-28 22:00:00', 'contacts.show'),
(46, 'lang', 'اللغه', 'web', '2022-03-02 22:00:00', '2022-03-02 22:00:00', 'lang'),
(47, 'client-active', 'تفعيل المستخدم', 'web', '2022-03-02 22:00:00', '2022-03-02 22:00:00', 'activate'),
(48, 'client-deactivate', 'الغاء تفعيل المستخدم', 'web', '2022-03-02 22:00:00', '2022-03-02 22:00:00', 'deactivate'),
(49, 'blood-types-filters', 'فلتره بفصيله الدم للمستخدمين', 'web', '2022-03-02 22:00:00', '2022-03-02 22:00:00', 'clients.blood-types-filters'),
(50, 'clients-filter', 'فلتره للمستخدمين', 'web', '2022-03-02 22:00:00', '2022-03-02 22:00:00', 'clients.filter'),
(51, 'donations-blood-types-filter', 'فلتره للتبرعات', 'web', '2022-03-02 22:00:00', '2022-03-02 22:00:00', 'donations.blood-types-filter'),
(52, 'donations-filter', 'فلتره للتبرعات', 'web', '2022-03-02 22:00:00', '2022-03-02 22:00:00', 'donations.filter'),
(53, 'contacts-filter', 'فلتره للرسائل', 'web', '2022-03-02 22:00:00', '2022-03-02 22:00:00', 'contacts.filter'),
(54, 'language', 'اللغه', 'web', '2022-03-02 22:00:00', '2022-03-02 22:00:00', 'lang');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `publish_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `image`, `category_id`, `client_id`, `publish_date`, `created_at`, `updated_at`) VALUES
(9, 'Molestiae dolores in', 'Provident sunt ten', '1646090501error.png', 1, 1, '1990-05-17', '2022-02-28 21:17:34', '2022-02-28 21:21:41'),
(10, 'Nemo sed quidem veli', 'Ad sint eum quis vol', '1646256151695.jpg', 2, 1, '2015-03-21', '2022-03-02 19:22:31', '2022-03-02 19:22:31'),
(11, 'Natus fugiat qui con', 'Nemo quis deserunt a Nemo quis deserunt a\r\nNemo quis deserunt a Nemo quis deserunt a\r\nNemo quis deserunt a Nemo quis deserunt a', '1646256310student.png', 2, 1, '2004-03-06', '2022-03-02 19:25:10', '2022-03-02 19:25:10'),
(12, 'Ab minima aliquip eu Ullam aut esse et qu', 'Ullam aut esse et qu\r\nUllam aut esse et qu\r\nUllam aut esse et qu\r\nUllam aut esse et qu\r\nUllam aut esse et qu', '1646256558icons8-e-commerce-100.png', 1, 1, '2021-05-15', '2022-03-02 19:29:18', '2022-03-02 19:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superAdmin', 'المدير العام', 'web', '2022-02-28 01:06:56', '2022-02-28 13:02:39'),
(5, 'user', 'مستخدم', 'web', '2022-02-28 10:52:23', '2022-02-28 13:02:27'),
(6, 'admin', 'محرر', 'web', '2022-02-28 10:52:34', '2022-02-28 13:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 6),
(2, 1),
(2, 6),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 5),
(9, 6),
(10, 1),
(10, 5),
(10, 6),
(11, 1),
(11, 5),
(11, 6),
(12, 1),
(12, 6),
(14, 1),
(14, 5),
(14, 6),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(18, 5),
(18, 6),
(19, 1),
(19, 5),
(19, 6),
(20, 1),
(20, 5),
(20, 6),
(21, 1),
(21, 6),
(22, 1),
(22, 5),
(22, 6),
(23, 1),
(23, 5),
(23, 6),
(24, 1),
(24, 5),
(24, 6),
(25, 1),
(25, 6),
(26, 1),
(26, 5),
(26, 6),
(27, 1),
(27, 5),
(27, 6),
(28, 1),
(28, 5),
(28, 6),
(29, 1),
(29, 6),
(30, 1),
(30, 5),
(30, 6),
(31, 1),
(31, 6),
(32, 1),
(32, 6),
(33, 1),
(33, 6),
(34, 1),
(34, 5),
(34, 6),
(35, 1),
(36, 1),
(37, 1),
(37, 6),
(38, 1),
(38, 5),
(38, 6),
(39, 1),
(39, 6),
(40, 1),
(40, 6),
(41, 1),
(42, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `notification_setting_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_app` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tw_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insta_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `notification_setting_text`, `about_app`, `phone`, `email`, `fb_url`, `tw_url`, `insta_url`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply a dummy text of the printing and typesetting industry.\r\nLorem Ipsum is simply a dummy text of the printing and typesetting industry.\r\nLorem Ipsum is simply a dummy text of the printing and typesetting industry.\r\nLorem Ipsum is simply a dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply a dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '01153225410', 'info@bllodbank.com', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', '2022-02-26 22:00:00', '2022-03-03 16:27:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_name`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Ibrahiem', 'mohamed@yahoo.com', NULL, '$2y$10$KgRz6pO9Hncc0dW/fYSYbebhcbNaMYtICQYHRKLOrPuePm5AiqpiW', 'superAdmin', 'مفعل', 'Q3dDTNsFeGxIqFBEHiqtK8mtpQ6BgRnwL8eieLshWDY8Vn32tAUGv07ghZCo', '2022-02-27 22:00:00', '2022-02-28 01:09:28'),
(3, 'test user', 'test@yahoo.com', NULL, '$2y$10$nxwJLBM3FDLmyoN94hMHNe8kgswEmZUplKmjY5dbb/E.ZwFfHAlp2', 'user', 'غير مفعل', 'XDPreqTEp88WcV7awIFIHa9PyTbdGLOvskuYtC2Gbh1Ty5Ws2xTXHC4Djmvu', '2022-02-28 11:31:05', '2022-02-28 16:11:42'),
(4, 'm7md elfert', 'mohamedelfert19@gmail.com', NULL, '$2y$10$wMIuiVRgNf4kM2DiyQXdkOROYLSp3MlugAdn9fKzS02u8bsRxl/Ve', 'user', 'مفعل', 'kQJnGgHzub9rJvlqpRDyJieSruKNeElMabYbXKNz4xbqsd3wV88Zly1uyuJT', '2022-02-28 15:06:43', '2022-02-28 15:13:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_types`
--
ALTER TABLE `blood_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_type_client_blood_type_id_foreign` (`blood_type_id`),
  ADD KEY `blood_type_client_client_id_foreign` (`client_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_governorate_id_foreign` (`governorate_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`),
  ADD UNIQUE KEY `clients_phone_unique` (`phone`),
  ADD UNIQUE KEY `clients_api_token_unique` (`api_token`),
  ADD KEY `clients_blood_type_id_foreign` (`blood_type_id`),
  ADD KEY `clients_city_id_foreign` (`city_id`);

--
-- Indexes for table `client_governorate`
--
ALTER TABLE `client_governorate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_governorate_client_id_foreign` (`client_id`),
  ADD KEY `client_governorate_governorate_id_foreign` (`governorate_id`);

--
-- Indexes for table `client_notification`
--
ALTER TABLE `client_notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_notification_client_id_foreign` (`client_id`),
  ADD KEY `client_notification_notification_id_foreign` (`notification_id`);

--
-- Indexes for table `client_post`
--
ALTER TABLE `client_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_post_client_id_foreign` (`client_id`),
  ADD KEY `client_post_post_id_foreign` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donations_patient_phone_unique` (`patient_phone`),
  ADD KEY `donations_blood_type_id_foreign` (`blood_type_id`),
  ADD KEY `donations_city_id_foreign` (`city_id`),
  ADD KEY `donations_client_id_foreign` (`client_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governorates`
--
ALTER TABLE `governorates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_donation_id_foreign` (`donation_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `blood_types`
--
ALTER TABLE `blood_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_governorate`
--
ALTER TABLE `client_governorate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_notification`
--
ALTER TABLE `client_notification`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_post`
--
ALTER TABLE `client_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `governorates`
--
ALTER TABLE `governorates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_type_client`
--
ALTER TABLE `blood_type_client`
  ADD CONSTRAINT `blood_type_client_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `blood_type_client_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clients_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_governorate`
--
ALTER TABLE `client_governorate`
  ADD CONSTRAINT `client_governorate_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `client_governorate_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_notification`
--
ALTER TABLE `client_notification`
  ADD CONSTRAINT `client_notification_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `client_notification_notification_id_foreign` FOREIGN KEY (`notification_id`) REFERENCES `notifications` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `client_post`
--
ALTER TABLE `client_post`
  ADD CONSTRAINT `client_post_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `client_post_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_blood_type_id_foreign` FOREIGN KEY (`blood_type_id`) REFERENCES `blood_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `donations_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_donation_id_foreign` FOREIGN KEY (`donation_id`) REFERENCES `donations` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
