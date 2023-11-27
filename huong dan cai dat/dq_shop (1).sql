-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 12:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dq_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `avatar`, `role`, `remember_token`, `created_at`, `updated_at`, `code`, `time_code`) VALUES
(1, 'Admin', 'admin@gmail.com', '0123456789', NULL, '$2y$10$OikT4U5V0K0uVqH83SkQdeSBU0rC3tVoySGHxrtQoIS6tzBcc9xAe', 'http://127.0.0.1:8000/storage/photos/avatar/user8-128x128.jpg', NULL, 'WdoVEErikOY2CNXm1KvO3YDEnUcBhxezLl6HqDU1PtLKNRTfu2wGc9z0wOAu', '2023-04-19 12:22:12', '2023-06-12 10:00:55', 'c91d0e5a93a4e162fa2da6207a4ba0ab', '2023-04-04 11:52:20'),
(2, 'Đăng Quang', 'quanggaren11111@gmail.com', '0981607062', NULL, '$2y$10$Su6i9kOTzHuX3nDoxVE4We9N10aVPHzIptBvq9r4djvm7c0o/xUZG', 'http://127.0.0.1:8000/storage/photos/avatar/user2-160x160.jpg', NULL, 'z3oKPrRDYmoq0XXNKil0Hrgu461PzBy34eCLIz8129p2RVjwLt6UcyJSLgV6', NULL, '2023-04-14 10:02:53', 'c91d0e5a93a4e162fa2da6207a4ba0ab', '2023-04-04 11:52:20'),
(3, 'Hell', 'hellquay@gmail.com', '0987654321', NULL, '$2y$10$Su6i9kOTzHuX3nDoxVE4We9N10aVPHzIptBvq9r4djvm7c0o/xUZG', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Lê Đăng Quang', 'admin@botble.com', '0981607062', NULL, '$2y$10$2XWE/DNCptwhyBraQ91SLu2bywa2a3QDv3JtFiR0kWCOAR.r6gmta', 'http://127.0.0.1:8000/storage/photos/avatar/avatar3.png', NULL, 'G9w8XzRh99Fi6Zq3f7NY6u8z9SWsFu9kuOE4rfLsK5oFJInjOlkBl5o1DKo3', '2023-04-14 08:16:07', '2023-04-15 11:32:26', NULL, NULL),
(11, 'Teacher', 'teacher@gmail.com', '13312312312', NULL, '$2y$10$DT54y.z.EsjAnWRy7YYFcOpUocdO.AfhaidUtViCNxq.34loPNDJa', 'http://127.0.0.1:8000/storage/photos/avatar/avatar2.png', NULL, NULL, '2023-04-22 01:26:35', '2023-04-22 01:26:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(11) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `content`, `link`, `images`, `size`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Hello World', 'Spring Collection', 'https://translate.google.com/?sl=en&tl=vi&text=edit&op=translate', 'http://127.0.0.1:8000/storage/photos/Banner/offer-1.png', 12, 'inactive', '2023-04-17 07:54:10', '2023-04-20 02:15:56'),
(5, 'Cristiano Ronaldo TOTY FIFA 21', 'Cristiano Ronaldo TOTY FIFA 21', 'https://www.pinterest.com/pin/868772584342173531/', 'http://127.0.0.1:8000/storage/photos/Banner/Cristiano Ronaldo TOTY FIFA 21 - 98  - Rating and Price.png', 6, 'active', '2023-04-17 09:02:07', '2023-04-20 02:10:13'),
(6, 'FIFA 23 FUT Card Creator', 'Lorem Ipsum is simply', 'https://www.pinterest.com/pin/858498747732721600/', 'http://127.0.0.1:8000/storage/photos/Banner/FIFA 23 FUT Card Creator.png', 6, 'active', '2023-04-17 09:55:08', '2023-04-20 02:09:58');

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
(5, '2022_11_19_082745_create_orders_table', 1),
(6, '2022_11_19_084600_create_order_details_table', 1),
(7, '2022_11_19_084904_create_products_table', 1),
(8, '2022_11_19_090110_create_product_categories_table', 1),
(9, '2022_11_19_090700_create_product_comments_table', 1),
(10, '2022_11_19_090920_create_blogs_table', 1),
(11, '2022_11_19_091144_create_blogs_comments_table', 1),
(12, '2022_11_19_092257_create_admin_table', 1),
(13, '2023_02_05_193249_create_slider_table', 1),
(15, '2023_03_25_151523_create_site_setting_table', 1),
(16, '2023_04_04_163925_alter_column_code_and_time_code_in_table_users', 2),
(17, '2023_04_04_163925_alter_column_code_and_time_code_in_table_admin', 3),
(18, '2023_04_14_122715_create_permission_tables', 4),
(20, '2023_02_05_204455_create_banner_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 11),
(13, 'App\\Models\\Admin', 5),
(15, 'App\\Models\\Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` enum('payment on delivery','online payment') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'online payment',
  `payment_status` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `status` enum('new','preparing goods','delivering','delivered','order has been cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `street_address`, `note`, `provincial`, `district`, `ward`, `payment_method`, `payment_status`, `status`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lê Đăng Quang', 'quanggaren37@gmail.com', '0981607062', 'số 5', 'Good', 'Tỉnh Nghệ An', 'Thành phố Vinh', 'Phường Lê Lợi', 'online payment', 'paid', 'order has been cancelled', 3000000, '2023-04-01 10:31:15', '2023-04-27 09:12:59'),
(11, NULL, 'Lê Đăng Quang', 'quanggaren37@gmail.com', '0981607062', 'số 5', '123', 'Tỉnh Nghệ An', 'Thị xã Thái Hoà', 'Phường Quang Phong', 'online payment', 'paid', 'order has been cancelled', 2100000, '2023-04-06 09:25:23', '2023-04-27 09:14:22'),
(12, 1, 'Lê Đăng Quang', 'quanggaren37@gmail.com', '0981607062', 'nhà số 2', 'good', 'Thành phố Hà Nội', 'Quận Ba Đình', 'Phường Phúc Xá', 'payment on delivery', 'paid', 'delivered', 10, '2023-04-10 09:50:03', '2023-04-22 00:47:34'),
(14, 1, 'Lê Đăng Quang', 'quanggaren37@gmail.com', '0981607062', '123', '123', 'Thành phố Hà Nội', 'Quận Hoàn Kiếm', 'Phường Phúc Tân', 'payment on delivery', 'unpaid', 'order has been cancelled', 12000000, '2023-04-20 04:00:48', '2023-04-22 04:10:58'),
(15, 1, 'Lê Đăng Quang', 'quanggaren37@gmail.com', '0981607062', 'Số 5 Nguyễn Viết Xuân', 'Good!', 'Tỉnh Nghệ An', 'Thành phố Vinh', 'Phường Hưng Dũng', 'payment on delivery', 'unpaid', 'order has been cancelled', 3000000, '2023-04-12 08:42:44', '2023-04-21 08:46:32'),
(16, NULL, 'Phạm Văn A', 'abc@gmail.com', '123456789', '123', '123', 'Thành phố Hà Nội', 'Quận Ba Đình', 'Phường Phúc Xá', 'payment on delivery', 'paid', 'delivered', 300000, '2023-04-22 01:05:39', '2023-04-22 01:15:07'),
(17, NULL, 'Lò Thị Cê', 'hoaiinam2k@gmail.com', '12344523423', '5', '12312312312', 'Tỉnh Bắc Kạn', 'Huyện Pác Nặm', 'Xã Nhạn Môn', 'payment on delivery', 'paid', 'delivered', 2400000, '2023-04-22 01:23:15', '2023-04-22 01:23:36'),
(18, NULL, 'Ho Ly Shit', 'hoaiinam2k@gmail.com', '123123123123', '123123', '12312', 'Tỉnh Cao Bằng', 'Huyện Bảo Lâm', 'Xã Đức Hạnh', 'payment on delivery', 'unpaid', 'order has been cancelled', 2000000, '2023-04-22 01:41:00', '2023-04-22 01:41:47'),
(19, NULL, 'Phạm Quang Núi', 'phamquangnui@abc.xyz', '034567891', 'ngõ 5', 'giao nhanh nhá shop', 'Thành phố Hà Nội', 'Quận Tây Hồ', 'Phường Phú Thượng', 'online payment', 'paid', 'delivered', 3000000, '2023-03-22 03:56:34', '2023-04-22 04:00:07'),
(20, NULL, 'Phạm Quang Núi', 'phamquangnui@abc.xyz', '034567891', 'ngõ 5', 'giao nhanh không boom hàng.', 'Thành phố Hà Nội', 'Quận Tây Hồ', 'Phường Phú Thượng', 'online payment', 'paid', 'delivered', 3000000, '2023-04-15 03:56:46', '2023-04-22 03:59:50'),
(21, NULL, 'Phạm Quang Núi', 'phamquangnui@abc.xyz', '034567891', 'ngõ 5', 'oke', 'Thành phố Hà Nội', 'Quận Tây Hồ', 'Phường Phú Thượng', 'online payment', 'paid', 'delivered', 3000000, '2023-04-22 03:57:33', '2023-04-26 02:10:48'),
(22, NULL, 'Lê Đăng Quang', 'quanggaren37@gmail.com', '0981607062', 'số 5', 'oke', 'Tỉnh Ninh Bình', 'Thành phố Ninh Bình', 'Phường Đông Thành', 'payment on delivery', 'unpaid', 'order has been cancelled', 1000000, '2023-04-26 02:05:48', '2023-04-27 08:04:40'),
(23, NULL, 'Lê Đăng Quang', 'quanggaren37@gmail.com', '0981607062', 'số 5', 'oke', 'Tỉnh Ninh Bình', 'Thành phố Ninh Bình', 'Phường Đông Thành', 'payment on delivery', 'paid', 'delivered', 1000000, '2023-01-26 02:06:27', '2023-04-26 02:08:54'),
(24, NULL, 'Lê Đăng Quang', 'quanggaren37@gmail.com', '0981607062', 'số 5', 'oke', 'Tỉnh Ninh Bình', 'Thành phố Ninh Bình', 'Phường Đông Thành', 'payment on delivery', 'unpaid', 'delivering', 1000000, '2023-02-26 02:07:36', '2023-04-26 02:08:44'),
(25, NULL, 'Phạm Văn B', 'hoaiinam2k@gmail.com', '0981607062', 'số 5', '123', 'Tỉnh Nghệ An', 'Thị xã Cửa Lò', 'Phường Nghi Thuỷ', 'online payment', 'paid', 'delivered', 300000, '2023-04-26 02:09:47', '2023-04-26 02:11:32'),
(26, NULL, 'Lê Đăng Quang', 'hoaiinam2k@gmail.com', '0981607062', 'số 5', '123123123123', 'Tỉnh Nghệ An', 'Thị xã Cửa Lò', 'Phường Nghi Tân', 'payment on delivery', 'unpaid', 'new', 300000, '2023-04-26 02:12:53', '2023-04-26 02:12:53'),
(27, NULL, 'Quang Đăng', 'hoaiinam2k@gmail.com', '0383894903', 'Nghệ An', 'ngon', 'Tỉnh Cao Bằng', 'Huyện Bảo Lâm', 'Xã Nam Quang', 'online payment', 'paid', 'delivered', 500000, '2023-04-27 01:00:39', '2023-04-27 09:27:07'),
(29, NULL, 'Quang Đăng', 'hoaiinam2k@gmail.com', '0383894903', 'Nghệ An', '123123', 'Thành phố Hà Nội', 'Quận Ba Đình', 'Phường Phúc Xá', 'payment on delivery', 'paid', 'order has been cancelled', 2700000, '2023-04-27 09:15:36', '2023-04-27 09:17:26'),
(30, NULL, 'Quang Đăng', 'hoaiinam2k@gmail.com', '0383894903', 'Nghệ An', '123', 'Thành phố Hà Nội', 'Quận Tây Hồ', 'Phường Phú Thượng', 'payment on delivery', 'paid', 'order has been cancelled', 28000000, '2023-04-27 09:18:51', '2023-04-27 09:19:29'),
(31, NULL, 'Quang Đăng', 'hoaiinam2k@gmail.com', '0383894903', 'Nghệ An', '123213', 'Thành phố Hà Nội', 'Quận Ba Đình', 'Phường Vĩnh Phúc', 'payment on delivery', 'paid', 'order has been cancelled', 14000000, '2023-04-27 09:20:21', '2023-04-27 09:21:34'),
(32, NULL, 'Quang Đăng', 'hoaiinam2k@gmail.com', '0383894903', 'Nghệ An', '1321321', 'Thành phố Hà Nội', 'Quận Ba Đình', 'Phường Phúc Xá', 'payment on delivery', 'paid', 'delivered', 14000000, '2023-04-27 09:20:49', '2023-04-27 09:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `size`, `qty`, `amount`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'S', 1, NULL, 3000000, '2023-04-01 10:31:15', '2023-04-01 10:31:15'),
(20, 11, 3, 'S', 2, NULL, 1400000, '2023-04-06 09:25:23', '2023-04-06 09:25:23'),
(21, 11, 3, 'L', 1, NULL, 700000, '2023-04-06 09:25:23', '2023-04-06 09:25:23'),
(22, 12, 6, '44', 1, NULL, 10, '2023-04-10 09:50:03', '2023-04-10 09:50:03'),
(24, 14, 1, 'S', 3, NULL, 9000000, '2023-04-20 04:00:48', '2023-04-20 04:00:48'),
(25, 14, 13, 'S', 1, NULL, 3000000, '2023-04-20 04:00:48', '2023-04-20 04:00:48'),
(26, 15, 5, '39', 2, NULL, 2000000, '2023-04-21 08:42:44', '2023-04-21 08:42:44'),
(27, 15, 5, '42', 1, NULL, 1000000, '2023-04-21 08:42:44', '2023-04-21 08:42:44'),
(28, 16, 14, '39', 1, NULL, 300000, '2023-04-22 01:05:39', '2023-04-22 01:05:39'),
(29, 17, 21, 'S', 1, NULL, 700000, '2023-04-22 01:23:15', '2023-04-22 01:23:15'),
(30, 17, 21, 'L', 1, NULL, 700000, '2023-04-22 01:23:15', '2023-04-22 01:23:15'),
(31, 17, 22, '37', 1, NULL, 500000, '2023-04-22 01:23:15', '2023-04-22 01:23:15'),
(32, 17, 22, '40', 1, NULL, 500000, '2023-04-22 01:23:15', '2023-04-22 01:23:15'),
(33, 18, 16, '37', 1, NULL, 500000, '2023-04-22 01:41:00', '2023-04-22 01:41:00'),
(34, 18, 16, '40', 3, NULL, 1500000, '2023-04-22 01:41:00', '2023-04-22 01:41:00'),
(35, 19, 5, '39', 2, NULL, 2000000, '2023-04-22 03:56:34', '2023-04-22 03:56:34'),
(36, 19, 29, 'S', 2, NULL, 1000000, '2023-04-22 03:56:34', '2023-04-22 03:56:34'),
(37, 20, 5, '39', 2, NULL, 2000000, '2023-04-22 03:56:46', '2023-04-22 03:56:46'),
(38, 20, 29, 'S', 2, NULL, 1000000, '2023-04-22 03:56:46', '2023-04-22 03:56:46'),
(39, 21, 5, '39', 2, NULL, 2000000, '2023-04-22 03:57:33', '2023-04-22 03:57:33'),
(40, 21, 29, 'S', 2, NULL, 1000000, '2023-04-22 03:57:33', '2023-04-22 03:57:33'),
(41, 22, 29, 'S', 2, NULL, 1000000, '2023-04-26 02:05:48', '2023-04-26 02:05:48'),
(42, 23, 29, 'S', 2, NULL, 1000000, '2023-04-26 02:06:27', '2023-04-26 02:06:27'),
(43, 24, 29, 'S', 2, NULL, 1000000, '2023-04-26 02:07:36', '2023-04-26 02:07:36'),
(44, 25, 32, '2XL', 1, NULL, 300000, '2023-04-26 02:09:47', '2023-04-26 02:09:47'),
(45, 26, 17, '42', 1, NULL, 300000, '2023-04-26 02:12:53', '2023-04-26 02:12:53'),
(46, 27, 16, '37', 1, NULL, 500000, '2023-04-27 01:00:39', '2023-04-27 01:00:39'),
(48, 29, 32, '2XL', 9, NULL, 2700000, '2023-04-27 09:15:36', '2023-04-27 09:15:36'),
(49, 30, 31, 'M', 40, NULL, 28000000, '2023-04-27 09:18:51', '2023-04-27 09:18:51'),
(50, 31, 31, 'M', 20, NULL, 14000000, '2023-04-27 09:20:21', '2023-04-27 09:20:21'),
(51, 32, 31, 'M', 20, NULL, 14000000, '2023-04-27 09:20:49', '2023-04-27 09:20:49');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'edit products', 'admin', '2023-04-14 06:28:11', '2023-04-14 13:24:18'),
(2, 'create product', 'admin', '2023-04-14 13:08:37', '2023-04-15 12:53:25'),
(3, 'delete product', 'admin', '2023-04-14 13:08:46', '2023-04-14 13:08:46'),
(6, 'file manager', 'admin', '2023-04-15 11:02:23', '2023-04-15 13:04:29'),
(7, 'product view', 'admin', '2023-04-15 12:02:59', '2023-04-15 12:02:59'),
(9, 'product categories view', 'admin', '2023-04-15 12:42:07', '2023-04-16 07:49:27'),
(10, 'edit product categories', 'admin', '2023-04-15 12:46:55', '2023-04-16 07:49:36'),
(11, 'create product categories', 'admin', '2023-04-15 12:47:12', '2023-04-16 07:49:43'),
(12, 'delete product categories', 'admin', '2023-04-15 12:47:40', '2023-04-16 07:49:50'),
(23, 'slider view', 'admin', '2023-04-15 13:02:44', '2023-04-15 13:02:44'),
(24, 'delete slider', 'admin', '2023-04-15 13:02:53', '2023-04-15 13:02:53'),
(25, 'edit slider', 'admin', '2023-04-15 13:03:00', '2023-04-15 13:03:00'),
(26, 'create slider', 'admin', '2023-04-15 13:03:47', '2023-04-15 13:03:47'),
(27, 'order view', 'admin', '2023-04-15 13:05:08', '2023-04-15 13:05:08'),
(28, 'edit order', 'admin', '2023-04-15 13:05:15', '2023-04-15 13:05:15'),
(29, 'delete order', 'admin', '2023-04-15 13:05:26', '2023-04-15 13:05:26'),
(30, 'user view', 'admin', '2023-04-15 13:05:41', '2023-04-15 13:05:41'),
(31, 'delete user', 'admin', '2023-04-15 13:05:46', '2023-04-15 13:05:46'),
(32, 'site setting view', 'admin', '2023-04-15 13:05:56', '2023-04-15 13:05:56'),
(33, 'edit site setting', 'admin', '2023-04-15 13:06:03', '2023-04-15 13:06:03'),
(34, 'edit product', 'admin', '2023-04-16 07:26:49', '2023-04-16 07:29:05'),
(35, 'banner view', 'admin', '2023-04-17 09:43:33', '2023-04-17 09:43:33'),
(36, 'edit banner', 'admin', '2023-04-17 09:43:40', '2023-04-17 09:43:40'),
(37, 'delete banner', 'admin', '2023-04-17 09:43:48', '2023-04-17 09:43:48'),
(38, 'create banner', 'admin', '2023-04-17 09:43:53', '2023-04-17 09:43:53'),
(39, 'super-admin', 'admin', '2023-04-17 10:39:45', '2023-04-17 10:39:45');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `discount` double DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `product_category_id`, `images`, `description`, `content`, `price`, `size`, `qty`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Áo phông báo thủ', 'ao-phong-bao-thu', 5, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/product-5.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/product-8.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/product-9.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 500000000, 'S,M,L,XL,2XL,3XL', 17, 3000000, 'active', '2023-04-01 10:02:28', '2023-04-27 09:12:59'),
(2, 'Quần jean', 'quan-jean', 3, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-jean-xam2.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>', 500000, '37,38,39', 70, 300000, 'active', '2023-04-01 10:20:14', '2023-04-27 03:00:06'),
(3, 'Chân váy trắng', 'chan-vay-trang', 4, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/qweerrr.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>', 7000000, 'S,M,L', 90, 6000000, 'active', '2023-04-01 10:21:06', '2023-04-27 09:14:22'),
(5, 'Quần rách gối', 'quan-rach-goi', 3, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan_joker1.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan_joker2.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan_joker3.jpg', 'Laravel 5.3 Filter search results based on most matches', '<h3>&nbsp;</h3>\r\n\r\n<ul>\r\n	<li>\r\n	<p><em>orderBy</em>. The orderBy method allows you to sort the result of the query by a given column. The first argument to the orderBy method&nbsp;...</p>\r\n	</li>\r\n	<li>\r\n	<p>Typically, this is the plural&nbsp;<em>form</em>&nbsp;of the model name; however, ... from your existing database to determine the applicable search&nbsp;<em>results</em>&nbsp;for your query.</p>\r\n	</li>\r\n</ul>', 1000000, '39,40,41,42', -5, NULL, 'active', '2023-04-06 10:46:27', '2023-04-22 03:57:33'),
(6, 'Quần tả tơi', 'quan-ta-toi', 3, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/zzxxx.jpg', 'Order by best match in eloquent - mysql - Stack Overflow', '<h3><a href=\"https://stackoverflow.com/questions/56573629/order-by-best-match-in-eloquent\">Order by best match in eloquent - mysql - Stack Overflow</a></h3>', 500000000, '44', 0, 10, 'inactive', '2023-04-06 10:48:03', '2023-04-14 05:16:36'),
(13, 'Áo phông báo thủ', 'ao-phong-bao-thu', 5, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/product-9.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/product-5.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/product-8.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 500000000, 'S,M,L,XL,2XL,3XL', 18, 3000000, 'active', '2023-04-01 10:02:28', '2023-04-27 03:01:50'),
(14, 'Quần jean bóng đêm', 'quan-jean-bong-dem', 3, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-ripjeans-den1.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-ripjeans-den2.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-ripjeans-den3.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-ripjeans-den4.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>', 50000000, '37,38,39', 69, 300000, 'active', '2023-04-01 10:20:14', '2023-04-22 01:05:39'),
(15, 'Chân váy', 'chan-vay', 4, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ao-thun-unisex4.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ao-thun-unisex3.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ao-thun-unisex2.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>', 700000, 'S,M,L', 87, NULL, 'active', '2023-04-01 10:21:06', '2023-04-06 10:28:46'),
(16, 'Váy', 'vay', 4, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/cccccc.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ccvxcv.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/offer-1.png', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p>NULL!!!</p>', 500000, '37,38,39,40', 19, NULL, 'active', '2023-04-06 10:30:22', '2023-04-27 01:00:39'),
(17, 'Quần rách gối', 'quan-kaki', 3, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan_joker4.jpg', 'Laravel 5.3 Filter search results based on most matches', '<h3><a href=\"https://laravel.com/docs/10.x/collections\">Collections - Laravel - The PHP Framework For Web Artisans</a></h3>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a href=\"https://laravel.com/docs/10.x/collections\">laravel.com</a></p>\r\n\r\n<p><a href=\"https://laravel.com/docs/10.x/collections\"><cite>https://laravel.com&nbsp;&rsaquo; docs &rsaquo; collections</cite></a></p>\r\n\r\n<p>&middot;<a href=\"https://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=https://laravel.com/docs/10.x/collections&amp;prev=search&amp;pto=aue\">Dịch trang n&agrave;y</a></p>\r\n\r\n<p>The results of Eloquent queries are always returned as&nbsp;<em>Collection instances</em>. Extending Collections. Collections are &quot;macroable&quot;, which allows you to add&nbsp;...</p>\r\n\r\n<ul>\r\n	<li>&nbsp;\r\n	<h3><a href=\"https://laravel.com/docs/5.0/queries\">Query Builder - Laravel - The PHP Framework For Web Artisans</a></h3>\r\n\r\n	<p><a href=\"https://laravel.com/docs/5.0/queries\"><cite>https://laravel.com&nbsp;&rsaquo; docs &rsaquo; queries</cite></a></p>\r\n\r\n	<p>&middot;<a href=\"https://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=https://laravel.com/docs/5.0/queries&amp;prev=search&amp;pto=aue\">Dịch trang n&agrave;y</a></p>\r\n\r\n	<p>The database&nbsp;<em>query builder</em>&nbsp;provides a convenient, fluent interface to creating and running database queries. It can be used to perform most database operations&nbsp;...</p>\r\n	</li>\r\n	<li>&nbsp;\r\n	<h3><a href=\"https://laravel.com/docs/5.2/queries\">Query Builder - Laravel - The PHP Framework For Web Artisans</a></h3>\r\n\r\n	<p><a href=\"https://laravel.com/docs/5.2/queries\"><cite>https://laravel.com&nbsp;&rsaquo; docs &rsaquo; queries</cite></a></p>\r\n\r\n	<p>&middot;<a href=\"https://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=https://laravel.com/docs/5.2/queries&amp;prev=search&amp;pto=aue\">Dịch trang n&agrave;y</a></p>\r\n\r\n	<p><em>orderBy</em>. The orderBy method allows you to sort the result of the query by a given column. The first argument to the orderBy method&nbsp;...</p>\r\n	</li>\r\n	<li>&nbsp;\r\n	<h3><a href=\"https://laravel.com/docs/10.x/scout\">Laravel Scout - Laravel - The PHP Framework For Web Artisans</a></h3>\r\n\r\n	<p><a href=\"https://laravel.com/docs/10.x/scout\"><cite>https://laravel.com&nbsp;&rsaquo; docs &rsaquo; scout</cite></a></p>\r\n\r\n	<p>&middot;<a href=\"https://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=https://laravel.com/docs/10.x/scout&amp;prev=search&amp;pto=aue\">Dịch trang n&agrave;y</a></p>\r\n\r\n	<p>Typically, this is the plural&nbsp;<em>form</em>&nbsp;of the model name; however, ... from your existing database to determine the applicable search&nbsp;<em>results</em>&nbsp;for your query.</p>\r\n	</li>\r\n</ul>', 890000, '39,40,41,42', 0, 300000, 'active', '2023-04-06 10:46:27', '2023-04-26 02:12:53'),
(18, 'Quần tả tơi', 'quan-ta-toi', 3, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/zzxxx.jpg', 'Order by best match in eloquent - mysql - Stack Overflow', '<h3><a href=\"https://stackoverflow.com/questions/56573629/order-by-best-match-in-eloquent\">Order by best match in eloquent - mysql - Stack Overflow</a></h3>', 500000000, '44', 0, 10, 'inactive', '2023-04-06 10:48:03', '2023-04-14 05:16:36'),
(20, 'Quần jean', 'quan-jean', 3, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-ripjeans-den1.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-ripjeans-den2.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-ripjeans-den3.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-ripjeans-den4.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>', 500000, '37,38,39', 70, 300000, 'active', '2023-04-01 10:20:14', '2023-04-01 10:21:44'),
(21, 'Chân váy ngắn', 'chan-vay-ngan', 4, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ao-thun-unisex3.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ao-thun-unisex4.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ao-thun-unisex2.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>', 700000, 'S,M,L', 85, NULL, 'active', '2023-04-01 10:21:06', '2023-04-22 01:23:15'),
(22, 'Váy', 'vay', 4, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ccvxcv.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p>NULL!!!</p>', 500000, '37,38,39,40', 18, NULL, 'active', '2023-04-06 10:30:22', '2023-04-22 01:23:15'),
(23, 'Quần đen ninja', 'quan-den-ninja', 3, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan_joker3.jpg', 'Laravel 5.3 Filter search results based on most matches', '<h3>The results of Eloquent queries are always returned as&nbsp;<em>Collection instances</em>. Extending Collections. Collections are &quot;macroable&quot;, which allows you to add&nbsp;...</h3>\r\n\r\n<ul>\r\n	<li>&nbsp;\r\n	<h3><a href=\"https://laravel.com/docs/5.0/queries\">Query Builder - Laravel - The PHP Framework For Web Artisans</a></h3>\r\n\r\n	<p><a href=\"https://laravel.com/docs/5.0/queries\"><cite>https://laravel.com&nbsp;&rsaquo; docs &rsaquo; queries</cite></a></p>\r\n\r\n	<p>&middot;<a href=\"https://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=https://laravel.com/docs/5.0/queries&amp;prev=search&amp;pto=aue\">Dịch trang n&agrave;y</a></p>\r\n\r\n	<p>The database&nbsp;<em>query builder</em>&nbsp;provides a convenient, fluent interface to creating and running database queries. It can be used to perform most database operations&nbsp;...</p>\r\n	</li>\r\n	<li>&nbsp;\r\n	<h3><a href=\"https://laravel.com/docs/5.2/queries\">Query Builder - Laravel - The PHP Framework For Web Artisans</a></h3>\r\n\r\n	<p><a href=\"https://laravel.com/docs/5.2/queries\"><cite>https://laravel.com&nbsp;&rsaquo; docs &rsaquo; queries</cite></a></p>\r\n\r\n	<p>&middot;<a href=\"https://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=https://laravel.com/docs/5.2/queries&amp;prev=search&amp;pto=aue\">Dịch trang n&agrave;y</a></p>\r\n\r\n	<p><em>orderBy</em>. The orderBy method allows you to sort the result of the query by a given column. The first argument to the orderBy method&nbsp;...</p>\r\n	</li>\r\n	<li>&nbsp;\r\n	<h3><a href=\"https://laravel.com/docs/10.x/scout\">Laravel Scout - Laravel - The PHP Framework For Web Artisans</a></h3>\r\n\r\n	<p><a href=\"https://laravel.com/docs/10.x/scout\"><cite>https://laravel.com&nbsp;&rsaquo; docs &rsaquo; scout</cite></a></p>\r\n\r\n	<p>&middot;<a href=\"https://translate.google.com/translate?hl=vi&amp;sl=en&amp;u=https://laravel.com/docs/10.x/scout&amp;prev=search&amp;pto=aue\">Dịch trang n&agrave;y</a></p>\r\n\r\n	<p>Typically, this is the plural&nbsp;<em>form</em>&nbsp;of the model name; however, ... from your existing database to determine the applicable search&nbsp;<em>results</em>&nbsp;for your query.</p>\r\n	</li>\r\n</ul>', 1000000, '39,40,41,42', 1, NULL, 'active', '2023-04-06 10:46:27', '2023-04-21 08:28:41'),
(25, 'Quần jean', 'quan-jean', 3, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-ripjeans-den2.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/quan-ripjeans-den1.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>', 500000, '37,38,39', 70, 300000, 'active', '2023-04-01 10:20:14', '2023-04-27 03:00:29'),
(26, 'Chân váy xám', 'chan-vay-xam', 4, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ao-thun-unisex2.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ao-thun-unisex4.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ao-thun-unisex3.jpg', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', '<p><strong>Lorem Ipsum</strong>&nbsp;chỉ đơn giản l&agrave; một đoạn văn bản giả, được d&ugrave;ng v&agrave;o việc tr&igrave;nh b&agrave;y v&agrave; d&agrave;n trang phục vụ cho in ấn. Lorem Ipsum đ&atilde; được sử dụng như một văn bản chuẩn cho ng&agrave;nh c&ocirc;ng nghiệp in ấn từ những năm 1500, khi một họa sĩ v&ocirc; danh gh&eacute;p nhiều đoạn văn bản với nhau để tạo th&agrave;nh một bản mẫu văn bản. Đoạn văn bản n&agrave;y kh&ocirc;ng những đ&atilde; tồn tại năm thế kỉ, m&agrave; khi được &aacute;p dụng v&agrave;o tin học văn ph&ograve;ng, nội dung của n&oacute; vẫn kh&ocirc;ng hề bị thay đổi. N&oacute; đ&atilde; được phổ biến trong những năm 1960 nhờ việc b&aacute;n những bản giấy Letraset in những đoạn Lorem Ipsum, v&agrave; gần đ&acirc;y hơn, được sử dụng trong c&aacute;c ứng dụng d&agrave;n trang, như Aldus PageMaker.</p>', 700000, 'S,M,L', 87, NULL, 'active', '2023-04-01 10:21:06', '2023-04-21 06:38:45'),
(27, 'Áo phông cutee', 'ao-phong-cutee', 5, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/ao-thun-unisex1.jpg', 'Order by best match in eloquent - mysql - Stack OverflowOrder by best match in eloquent - mysql - Stack OverflowOrder by best match in eloquent - mysql - Stack OverflowOrder by best match in eloquent - mysql - Stack Overflow', '<p>one two three</p>', 500000000, '44', 0, 100000, 'active', '2023-04-06 10:48:03', '2023-04-27 03:01:13'),
(29, 'Áo phông baby', 'ao-phong-baby', 16, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/jjhghj.jpg', 'good!', '<p>&Aacute;o polo trẻ em phối tay năng động, th&agrave;nh phần:<strong>&nbsp;</strong>50% Cafe + 50% Recycle PET</p>\r\n\r\n<p>Chất liệu cafe th&acirc;n thiện m&ocirc;i trường l&agrave;m từ b&atilde; cafe v&agrave; chai nhựa t&aacute;i chế</p>\r\n\r\n<p>C&oacute; khả năng thấm h&uacute;t nhanh v&agrave; kh&ocirc; nhanh, kh&ocirc;ng b&aacute;m m&ugrave;i</p>\r\n\r\n<p>Chống tia UV l&ecirc;n đến 98%</p>\r\n\r\n<p>&Aacute;o rất th&iacute;ch hợp để b&eacute; mặc đi chơi, đi học đặc biệt v&agrave;o m&ugrave;a h&egrave; hoạt động nhiều</p>\r\n\r\n<p>C&oacute; thể phối đa dạng với quần short, jeans, ch&acirc;n v&aacute;y...</p>\r\n\r\n<p>YODY - Look good. Feel good.</p>', 500000, 'S,M', 7, NULL, 'active', '2023-04-22 03:05:10', '2023-04-27 08:04:40'),
(30, 'Áo phông cute', 'ao-phong-cute', 14, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/337286773_1196258634387034_6386537082066342348_n.jpg', 'Lần đầu tiên vũ trụ áo Marvel , xuất hiện tại website Coolmate. Hơn cả một chiếc áo thun, đằng sau đó là một câu chuyện thời trang \"Proundly Made in VietNam\" theo hướng bền vững. Chính vì điều đó mà chiếc áo nam này có vài đặc điểm nổi bật:', '<ul>\r\n	<li>\r\n	<p>L&agrave; sản phẩm của sự hợp t&aacute;c giữa&nbsp;<a href=\"https://www.coolmate.me/product/marvel-i-ao-thun-marvel-hulk-i-choose-strength\" target=\"_blank\">Coolmate</a>&nbsp;v&agrave; Disney - đơn vị sở hữu bản quyền Marvel. Chiếc&nbsp;&aacute;o thun&nbsp;c&oacute; th&agrave;nh phần l&agrave; sợi t&aacute;i chế tại Việt Nam, hướng tới sự bền vững trong ng&agrave;nh may mặc.</p>\r\n	</li>\r\n	<li>Mềm mại, bền dai, kh&ocirc;ng bai, nh&atilde;o, x&ugrave; l&ocirc;ng v&agrave; kh&ocirc;ng g&acirc;y kh&oacute; chịu khi mặc</li>\r\n	<li>\r\n	<p>Chất liệu cotton co gi&atilde;n 4 chiều đem lại sự thoải m&aacute;i suốt ng&agrave;y d&agrave;i</p>\r\n	</li>\r\n	<li>Đ&acirc;y l&agrave; sản phẩm &aacute;o thun nam đi theo hướng thời trang bền vững, th&acirc;n thiện hơn với m&ocirc;i trường</li>\r\n</ul>', 300000, 'S,M,L,XL,2XL', 90, 200000, 'active', '2023-04-22 04:13:51', '2023-04-22 04:16:46'),
(31, 'Áo phông cute phô mai que', 'ao-phong-cute-pho-mai-que', 9, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/336706284_1378153532964591_5710040123852128128_n.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/337279952_791066725423906_3068829300825733812_n.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/336469103_1425321594883067_2382775101064829372_n.jpg', 'Lần đầu tiên vũ trụ áo Marvel , xuất hiện tại website Coolmate. Hơn cả một chiếc áo thun, đằng sau đó là một câu chuyện thời trang \"Proundly Made in VietNam\" theo hướng bền vững. Chính vì điều đó mà chiếc áo nam này có vài đặc điểm nổi bật:', '<p>Lần đầu ti&ecirc;n vũ trụ &aacute;o Marvel , xuất hiện tại website Coolmate. Hơn cả một chiếc &aacute;o thun, đằng sau đ&oacute; l&agrave; một c&acirc;u chuyện thời trang &quot;Proundly Made in VietNam&quot; theo hướng bền vững. Ch&iacute;nh v&igrave; điều đ&oacute; m&agrave; chiếc&nbsp;<a href=\"https://www.coolmate.me/collection/ao-nam\" target=\"_blank\">&aacute;o nam</a>&nbsp;n&agrave;y c&oacute; v&agrave;i đặc điểm nổi bật:</p>\r\n\r\n<p>Lần đầu ti&ecirc;n vũ trụ &aacute;o Marvel , xuất hiện tại website Coolmate. Hơn cả một chiếc &aacute;o thun, đằng sau đ&oacute; l&agrave; một c&acirc;u chuyện thời trang &quot;Proundly Made in VietNam&quot; theo hướng bền vững. Ch&iacute;nh v&igrave; điều đ&oacute; m&agrave; chiếc&nbsp;<a href=\"https://www.coolmate.me/collection/ao-nam\" target=\"_blank\">&aacute;o nam</a>&nbsp;n&agrave;y c&oacute; v&agrave;i đặc điểm nổi bật:</p>', 700000, 'M,2XL', 20, NULL, 'active', '2023-04-22 04:19:11', '2023-04-27 09:21:34'),
(32, 'Áo phông trắng', 'ao-phong-trang', 12, 'http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/336181878_2864522453701125_5655872868205631919_n.jpg,http://127.0.0.1:8000/storage/photos/Ảnh sản phẩm/336647062_3371097389771114_30922578198300592_n.jpg', 'Lần đầu tiên vũ trụ áo Marvel , xuất hiện tại website Coolmate. Hơn cả một chiếc áo thun, đằng sau đó là một câu chuyện thời trang \"Proundly Made in VietNam\" theo hướng bền vững. Chính vì điều đó mà chiếc áo nam này có vài đặc điểm nổi bật:', '<p>Lần đầu ti&ecirc;n vũ trụ &aacute;o Marvel , xuất hiện tại website Coolmate. Hơn cả một chiếc &aacute;o thun, đằng sau đ&oacute; l&agrave; một c&acirc;u chuyện thời trang &quot;Proundly Made in VietNam&quot; theo hướng bền vững. Ch&iacute;nh v&igrave; điều đ&oacute; m&agrave; chiếc&nbsp;<a href=\"http://127.0.0.1:8000/shop/detail/32-ao-phong-trang\" target=\"_blank\">&aacute;o </a><a href=\"http://127.0.0.1:8000/shop/detail/32-ao-phong-trang\">nữ</a>&nbsp;n&agrave;y c&oacute; v&agrave;i đặc điểm nổi bật:</p>\r\n\r\n<p>&nbsp;</p>', 300000, '2XL,3XL', 0, NULL, 'active', '2023-04-22 04:20:53', '2023-04-27 09:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Thời trang nam', 'thoi-trang-nam', 0, '2023-03-27 09:40:54', '2023-03-27 09:40:54'),
(2, 'Thời trang nữ', 'thoi-trang-nu', 0, '2023-03-27 09:41:01', '2023-03-27 09:41:01'),
(3, 'Quần jean', 'quan-jean', 1, '2023-03-27 09:41:11', '2023-03-27 09:41:11'),
(4, 'Váy đầm', 'vay-dam', 2, '2023-03-27 09:41:23', '2023-03-27 09:41:23'),
(5, 'Áo phông', 'ao-phong', 1, '2023-04-01 10:00:36', '2023-04-01 10:00:36'),
(9, 'Áo sơ mi', 'ao-so-mi', 1, '2023-04-20 03:03:46', '2023-04-20 03:03:46'),
(12, 'Áo sơ mi', 'ao-so-mi', 2, '2023-04-20 03:05:59', '2023-04-20 03:05:59'),
(13, 'Quần âu', 'quan-au', 1, '2023-04-20 03:06:42', '2023-04-20 03:06:42'),
(14, 'Áo phông', 'ao-phong', 2, '2023-04-20 03:06:59', '2023-04-20 03:06:59'),
(15, 'Đồ trẻ em', 'do-tre-em', 0, '2023-04-20 03:10:05', '2023-04-20 03:10:05'),
(16, 'Áo phông', 'ao-phong', 15, '2023-04-20 03:10:16', '2023-04-20 03:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_comments`
--

CREATE TABLE `product_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messages` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `email`, `messages`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'quanggaren37@gmail.com', 'Lorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn.', 4, '2023-04-01 10:03:31', '2023-04-01 10:03:31'),
(2, 3, 1, 'quanggaren37@gmail.com', 'is very bad', 1, '2023-04-01 10:22:48', '2023-04-01 10:22:48'),
(3, 6, 1, 'quanggaren37@gmail.com', 'Sản phẩm rẻ rách ~.~', 1, '2023-04-06 10:48:43', '2023-04-06 10:48:43'),
(5, 27, 1, 'quanggaren37@gmail.com', 'ok', 2, '2023-04-20 04:06:15', '2023-04-20 04:06:15'),
(6, 5, 1, 'quanggaren37@gmail.com', 'Good!', 5, '2023-04-21 08:32:28', '2023-04-21 08:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'admin', NULL, NULL),
(3, 'preview', 'admin', NULL, NULL),
(7, 'products', 'admin', '2023-04-15 11:52:16', '2023-04-15 11:54:29'),
(8, 'slider', 'admin', '2023-04-15 11:52:29', '2023-04-15 11:52:29'),
(9, 'orders', 'admin', '2023-04-15 11:52:36', '2023-04-15 11:54:23'),
(10, 'file manager', 'admin', '2023-04-15 11:52:48', '2023-04-15 13:11:42'),
(11, 'site setting', 'admin', '2023-04-15 11:53:00', '2023-04-15 13:11:49'),
(12, 'Danh mục sản phẩm', 'admin', '2023-04-15 11:54:13', '2023-04-15 13:20:26'),
(13, 'users', 'admin', '2023-04-15 11:59:59', '2023-04-15 11:59:59'),
(15, 'banner', 'admin', '2023-04-17 09:44:27', '2023-04-17 09:44:27');

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
(1, 7),
(2, 1),
(2, 7),
(3, 1),
(3, 7),
(6, 1),
(6, 3),
(6, 10),
(7, 1),
(7, 7),
(9, 1),
(9, 12),
(10, 1),
(10, 12),
(11, 1),
(11, 12),
(12, 1),
(12, 12),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(35, 15),
(36, 1),
(36, 15),
(37, 1),
(37, 15),
(38, 1),
(38, 15),
(39, 1),
(39, 13);

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_link_facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_link_youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_link_instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `site_name`, `site_title`, `site_keywords`, `site_icon`, `site_email`, `site_phone`, `site_address`, `site_link_facebook`, `site_link_youtube`, `site_link_instagram`, `site_description`, `created_at`, `updated_at`) VALUES
(4, 'DQ Shop', 'DQ Shop', 'DQ Shop', 'http://127.0.0.1:8000/storage/photos/Banner/Cristiano Ronaldo TOTY FIFA 21 - 98  - Rating and Price.png', 'admin@gmail.com', '012345678', 'Nghệ An, Việt Nam', 'Lrv v 9.40.1', 'Lrv v 9.40.1', 'Lrv v 9.40.1', 'Bạn không có đồ mặc ư vậy thì shoping thôi nào!', '2023-04-04 10:28:20', '2023-06-12 10:00:27');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `images`, `description`, `created_at`, `updated_at`) VALUES
(2, 'DQ Shop', 'http://127.0.0.1:8000/storage/photos/Slider/hero-1.jpg', 'Bán hàng vì đam mê!', '2023-04-10 07:55:34', '2023-04-10 07:55:34'),
(4, 'Đăng Quang', 'http://127.0.0.1:8000/storage/photos/Slider/carousel-2.jpg', 'Reasonable Price', '2023-04-16 10:37:13', '2023-04-16 10:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provincial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_code` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `provincial`, `district`, `ward`, `created_at`, `updated_at`, `code`, `time_code`) VALUES
(1, 'Lê Đăng Quang', 'quanggaren37@gmail.com', '0981607062', NULL, '$2y$10$7zqHofVexFJE0ipXhyxJxOtih2DMxMlu0qrehBI2vS0L4UlQXC3Ke', NULL, NULL, NULL, NULL, '2023-03-27 09:47:56', '2023-04-21 08:52:58', '1bef531a03b7a9c3fdd3c26d08e65f62', '2023-04-21 08:52:58'),
(2, 'Đăng Quang', 'danggquang01@gmail.com', '1323123123', NULL, '$2y$10$IfTIZrbXLNf1QyUoDPP6SusLh1u041iFEaIpo9TpYEJcyytsRhlVq', NULL, NULL, NULL, NULL, '2023-03-27 09:50:05', '2023-03-27 09:50:05', NULL, NULL),
(4, 'Nguyễn Văn A', 'user@gmail.com', '0987654321', NULL, '$2y$10$sO56tU2sF27NPe6mNDXFBejl6vfIgyg0T5NW8fWpZZlBW6bVpb2sm', NULL, NULL, NULL, NULL, '2023-04-21 08:47:55', '2023-04-21 08:47:55', NULL, NULL),
(5, 'Phạm Quang Núi', 'phamquangnui@abc.xyz', '034567891', NULL, '$2y$10$EyOy1eBRk8VE/VOw4XUpgepkdKPpMiORTiR6gMN9iA23L3/jxkhI.', NULL, NULL, NULL, NULL, '2023-04-22 03:46:19', '2023-04-22 03:46:19', NULL, NULL),
(6, 'Cr7', 'cr7@goat.com', '19000099', NULL, '$2y$10$yZJ7d5AzFNzRgq9BgQK7luMPBrAta2qh5wVgYZdda4GnUv1MldAsa', NULL, NULL, NULL, NULL, '2023-04-22 03:47:01', '2023-04-22 03:47:01', NULL, NULL),
(7, 'Lê Văn Đỗ Kỳ', 'levandoky@abc.vc', '123123456', NULL, '$2y$10$wGHReZg4ksXzTCM0mkNfPu2DzqNrD1zhcFQT97qNuBOEY2x1uUqpq', NULL, NULL, NULL, NULL, '2023-04-22 03:47:34', '2023-04-22 03:47:34', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD KEY `admin_code_index` (`code`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `site_setting_site_email_unique` (`site_email`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_code_index` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
