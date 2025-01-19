-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 19, 2025 at 03:05 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecowise`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Personal Care', '2024-12-14 22:26:25', '2024-12-14 22:26:25'),
(2, 'Household', '2024-12-14 22:26:25', '2024-12-14 22:26:25'),
(3, 'Reusable', '2024-12-14 22:26:25', '2024-12-14 22:26:25');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(13, 'Cia', '085237119388', 'Binus Square', '2024-12-16 02:22:09', '2024-12-16 02:22:09'),
(14, 'Jingga', '085237119388', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2024-12-16 02:28:32', '2024-12-16 02:28:32'),
(15, 'Charlie', '08923125568', 'Apartemen Sudirman, Jakarta Pusat', '2024-12-17 09:38:45', '2024-12-17 09:38:45'),
(16, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-17 09:39:25', '2024-12-17 09:39:25'),
(17, 'Jingga', '085337111118', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2024-12-18 13:40:24', '2024-12-18 13:40:24'),
(18, 'Jingga', '085337111118', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2024-12-18 13:47:21', '2024-12-18 13:47:21'),
(19, 'Jingga', '085337111118', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2024-12-18 13:48:48', '2024-12-18 13:48:48'),
(20, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 14:32:42', '2024-12-18 14:32:42'),
(21, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 14:35:38', '2024-12-18 14:35:38'),
(22, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 14:40:50', '2024-12-18 14:40:50'),
(23, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:02:27', '2024-12-18 15:02:27'),
(24, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:04:03', '2024-12-18 15:04:03'),
(25, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:08:09', '2024-12-18 15:08:09'),
(26, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:19:55', '2024-12-18 15:19:55'),
(27, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:21:19', '2024-12-18 15:21:19'),
(28, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:22:38', '2024-12-18 15:22:38'),
(29, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:28:01', '2024-12-18 15:28:01'),
(30, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:38:26', '2024-12-18 15:38:26'),
(31, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:43:42', '2024-12-18 15:43:42'),
(32, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:49:10', '2024-12-18 15:49:10'),
(33, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:50:37', '2024-12-18 15:50:37'),
(34, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:53:34', '2024-12-18 15:53:34'),
(35, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:55:24', '2024-12-18 15:55:24'),
(36, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 15:58:56', '2024-12-18 15:58:56'),
(37, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 16:02:00', '2024-12-18 16:02:00'),
(38, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 16:03:09', '2024-12-18 16:03:09'),
(39, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 16:06:46', '2024-12-18 16:06:46'),
(40, 'Asahi', '08223344881', 'Jl. Casablanca Raya', '2024-12-18 16:57:19', '2024-12-18 16:57:19'),
(41, 'Jingga', '085237119388', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2024-12-18 17:00:50', '2024-12-18 17:00:50'),
(42, 'Jingga', '085237119388', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2024-12-18 17:07:01', '2024-12-18 17:07:01'),
(43, 'Jingga', '085237119388', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2024-12-18 17:11:16', '2024-12-18 17:11:16'),
(44, 'Jingga', '085237119388', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2024-12-18 17:14:22', '2024-12-18 17:14:22'),
(45, 'Jingga', '085237119388', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2024-12-18 17:14:42', '2024-12-18 17:14:42'),
(46, 'Charlie', '08923125568', 'Apartemen Sudirman, Jakarta Pusat', '2024-12-18 17:17:48', '2024-12-18 17:17:48'),
(47, 'Charlie', '08923125568', 'Apartemen Sudirman, Jakarta Pusat', '2024-12-18 17:18:21', '2024-12-18 17:18:21'),
(48, 'Charlie', '08923125568', 'Apartemen Sudirman, Jakarta Pusat', '2024-12-18 17:19:12', '2024-12-18 17:19:12'),
(49, 'Charlie', '08923125568', 'Apartemen Sudirman, Jakarta Pusat', '2024-12-18 17:23:22', '2024-12-18 17:23:22'),
(50, 'Charlie', '08923125568', 'Apartemen Sudirman, Jakarta Pusat', '2024-12-18 17:24:19', '2024-12-18 17:24:19'),
(51, 'Jingga Kinanti', '085237119388', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2024-12-18 23:02:50', '2024-12-18 23:02:50'),
(52, 'Jingga', '085237119388', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2025-01-16 16:42:23', '2025-01-16 16:42:23'),
(53, 'Jingga', '085237119388', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2025-01-16 16:44:26', '2025-01-16 16:44:26'),
(54, 'Jingga', '085237119388', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', '2025-01-16 20:42:01', '2025-01-16 20:42:01'),
(55, 'Jingga', '085237119388', 'Belmont', '2025-01-17 07:39:39', '2025-01-17 07:39:39'),
(56, 'Rahma', '085237119388', 'Belmont', '2025-01-17 07:42:13', '2025-01-17 07:42:13');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_05_002842_create_categories_table', 1),
(5, '2024_12_05_002905_create_products_table', 1),
(6, '2024_12_05_010624_create_carts_table', 1),
(7, '2024_12_13_085454_add_roles_to_users_table', 1),
(8, '2024_12_14_120229_add_user_id_to_carts_table', 1),
(9, '2024_12_14_121941_create_transactions_table', 1),
(10, '2024_12_14_122035_create_transaction_details_table', 1),
(11, '2024_12_15_051528_add_shipping_address_to_transactions_table', 1),
(12, '2024_12_15_062118_create_deliveries_table', 2),
(13, '2024_12_15_062317_add_delivery_id_to_transactions_table', 2),
(14, '2024_12_18_211418_add_snap_token_to_transactions_table', 3),
(15, '2025_01_18_170027_add_image_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `sold` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `desc`, `stock`, `sold`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Natural Cotton Make Up Remover', 25000, 'Soft and reusable cotton pads, perfect for gently removing makeup while being kind to the environment.', 18, 20, 1, 1, '2024-12-14 22:27:08', '2024-12-18 17:24:19'),
(2, 'Plant Based Vegan Soap', 25000, 'A nourishing soap made from plant-based ingredients, ideal for sensitive skin and free of harmful chemicals.', 18, 44, 2, 1, '2024-12-14 22:27:08', '2024-12-18 23:02:56'),
(3, 'Natural Bath Pouf', 20000, 'A biodegradable bath pouf made from natural fibers to exfoliate your skin gently and sustainably.', 18, 61, 3, 1, '2024-12-14 22:27:08', '2024-12-18 23:02:56'),
(4, 'Bamboo Based Toothbrush', 20000, 'An eco-friendly toothbrush with a bamboo handle and soft bristles, reducing plastic waste in oral care.', 15, 29, 4, 1, '2024-12-14 22:27:08', '2025-01-17 07:41:06'),
(5, 'Linen Kitchen Sponge', 15000, 'Durable and biodegradable linen sponges for effective cleaning without harming the planet.', 20, 41, 5, 2, '2024-12-14 22:27:08', '2025-01-16 21:02:55'),
(6, 'Wooden Spoon', 50000, 'A stylish and sturdy wooden spoon, perfect for cooking or serving, made from sustainably sourced materials.', 13, 36, 6, 2, '2024-12-14 22:27:08', '2025-01-16 20:42:01'),
(7, 'Beeswax Wraps', 60000, 'Reusable food wraps made from organic cotton and beeswax, a natural alternative to plastic wrap.', 18, 11, 7, 2, '2024-12-14 22:27:08', '2025-01-17 07:42:13'),
(8, 'Eco Dish Brush', 35000, 'A versatile dish brush with a wooden handle and natural bristles for an eco-friendly way to clean your dishes.', 18, 10, 8, 2, '2024-12-14 22:27:08', '2024-12-17 09:39:25'),
(9, 'Reusable Shopping Bag', 20000, 'A durable and foldable shopping bag, ideal for carrying groceries and reducing single-use plastic bags.', 8, 10, 9, 3, '2024-12-14 22:27:08', '2025-01-17 07:42:13'),
(10, 'Reusable Water Bottle PINK', 150000, 'A stylish, eco-friendly water bottle in a vibrant pink color to keep you hydrated on the go.', 12, 46, 10, 3, '2024-12-14 22:27:08', '2025-01-16 16:44:26'),
(11, 'Reusable Water Bottle GREEN', 150000, 'A sleek, sustainable water bottle in a calming green shade, perfect for everyday use.', 11, 37, 11, 3, '2024-12-14 22:27:08', '2024-12-17 09:21:06'),
(12, 'Bamboo Paper Straws', 25000, 'Eco-friendly and biodegradable bamboo paper straws, a sustainable choice for sipping your favorite beverages.', 23, 23, 12, 3, '2024-12-14 22:27:08', '2024-12-18 17:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `snap_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `status`, `subtotal`, `total`, `user_id`, `created_at`, `updated_at`, `delivery_id`, `snap_token`) VALUES
(26, 'Paid', 150000, 150000, 3, '2024-12-18 16:57:20', '2024-12-18 16:57:49', 40, '04988e6d-97c9-498b-8849-d490a8140518'),
(27, 'Paid', 20000, 30000, 2, '2024-12-18 17:00:50', '2024-12-18 17:01:14', 41, '5f74e105-2f87-4386-8eeb-6beef1fb5191'),
(28, 'Unpaid', 45000, 55000, 2, '2024-12-18 17:07:01', '2024-12-18 17:07:01', 42, '53868848-faa4-47e5-8f48-3e3f6a417710'),
(29, 'Unpaid', 45000, 55000, 2, '2024-12-18 17:11:16', '2024-12-18 17:11:16', 43, '77a7030b-dd19-4bd2-be6e-223d38529ce8'),
(30, 'Paid', 100000, 110000, 2, '2024-12-18 17:14:22', '2024-12-18 21:19:35', 44, '07b37de0-6063-4649-9630-c5508caa3c03'),
(31, 'Paid', 100000, 110000, 2, '2024-12-18 17:14:42', '2024-12-18 17:15:15', 45, 'cbf54446-9d5b-49f0-9797-a365cb463267'),
(32, 'Unpaid', 20000, 30000, 4, '2024-12-18 17:17:48', '2024-12-18 17:17:48', 46, '44e6146e-6b5e-4ce1-9b33-76c707e9a162'),
(33, 'Unpaid', 25000, 35000, 4, '2024-12-18 17:18:21', '2024-12-18 17:18:21', 47, 'e90b98a3-0a85-4316-b8f1-377f3fd1a670'),
(34, 'Unpaid', 60000, 70000, 4, '2024-12-18 17:19:12', '2024-12-18 17:19:12', 48, 'c28b5d20-92a3-4150-b82e-b3327466d451'),
(35, 'Paid', 20000, 30000, 4, '2024-12-18 17:23:23', '2024-12-18 17:25:28', 49, '3c17438c-dbfa-4499-9fde-76e8fd7ff491'),
(36, 'Paid', 25000, 35000, 4, '2024-12-18 17:24:19', '2024-12-18 17:24:58', 50, '082fa812-6b40-40c7-870c-97fc9dfe6a0a'),
(37, 'Paid', 65000, 65000, 2, '2024-12-18 23:02:56', '2024-12-18 23:04:28', 51, '07ff7b53-5a77-43e7-ae54-8b5b026f378d'),
(39, 'Paid', 150000, 160000, 2, '2025-01-16 16:44:26', '2025-01-16 16:46:39', 53, 'ce45812d-1233-44c1-b608-a050599158b9'),
(40, 'Unpaid', 80000, 85000, 2, '2025-01-16 20:42:01', '2025-01-16 20:55:06', 54, '257b1948-e8cc-4a7b-b7c6-3610338cccf8');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `quantity`, `transaction_id`, `product_id`, `created_at`, `updated_at`) VALUES
(22, 1, 26, 10, '2024-12-18 16:57:20', '2024-12-18 16:57:20'),
(23, 1, 27, 9, '2024-12-18 17:00:50', '2024-12-18 17:00:50'),
(24, 1, 28, 4, '2024-12-18 17:07:01', '2024-12-18 17:07:01'),
(25, 1, 28, 12, '2024-12-18 17:07:01', '2024-12-18 17:07:01'),
(26, 1, 29, 4, '2024-12-18 17:11:16', '2024-12-18 17:11:16'),
(27, 1, 29, 12, '2024-12-18 17:11:16', '2024-12-18 17:11:16'),
(28, 2, 30, 6, '2024-12-18 17:14:22', '2024-12-18 17:14:22'),
(29, 2, 31, 6, '2024-12-18 17:14:42', '2024-12-18 17:14:42'),
(30, 1, 32, 9, '2024-12-18 17:17:48', '2024-12-18 17:17:48'),
(31, 1, 33, 1, '2024-12-18 17:18:21', '2024-12-18 17:18:21'),
(32, 1, 34, 7, '2024-12-18 17:19:12', '2024-12-18 17:19:12'),
(33, 1, 35, 9, '2024-12-18 17:23:23', '2024-12-18 17:23:23'),
(34, 1, 36, 1, '2024-12-18 17:24:19', '2024-12-18 17:24:19'),
(35, 1, 37, 2, '2024-12-18 23:02:56', '2024-12-18 23:02:56'),
(36, 2, 37, 3, '2024-12-18 23:02:56', '2024-12-18 23:02:56'),
(38, 1, 39, 10, '2025-01-16 16:44:26', '2025-01-16 16:44:26'),
(39, 2, 40, 5, '2025-01-16 20:42:01', '2025-01-16 20:42:01'),
(40, 1, 40, 6, '2025-01-16 20:42:01', '2025-01-16 20:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` enum('customer','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `earth_star` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `roles`, `earth_star`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(1, 'admin', 'Binus', 'admin', 0, '08123456789', 'admin@gmail.com', NULL, '$2y$12$o5OpRdpMiEMzwY0IfVqgnO//al84A4ladeWsdwQoitN3QUF.Cry/y', NULL, '2024-12-14 22:33:05', '2024-12-14 22:33:05', NULL),
(2, 'Jingga', 'Jl. Kebun Jeruk Indah Utama, No. 15, Jakarta Barat', 'customer', 65, '085237119388', 'jinggakinanti22@gmail.com', NULL, '$2y$12$.EXNQW5gHt2oZQvj5iJjvu8A.wXU1HnktElAviYXZZY9XHI5EH8dC', NULL, '2024-12-14 22:35:10', '2025-01-18 10:06:32', '1737219992.jpg'),
(3, 'Asahi', 'Jl. Casablanca Raya', 'customer', 0, '08223344881', 'asahi@gmail.com', NULL, '$2y$12$tcBZYPt3TBGUdoT3O1YQgO9jtfgXh9UKzbf93zXf1J6CNoJZPXQP2', NULL, '2024-12-17 09:30:30', '2024-12-18 16:57:20', NULL),
(4, 'Charlie', 'Apartemen Sudirman, Jakarta Pusat', 'customer', 25, '08923125568', 'inicharlie@gmail.com', NULL, '$2y$12$8Y312aySAXQEcxAy8GMzEuAe6bbcOO61jhmpOqL4/f9l2iJasnK.i', NULL, '2024-12-17 09:37:59', '2024-12-18 17:24:19', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_delivery_id_foreign` (`delivery_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
