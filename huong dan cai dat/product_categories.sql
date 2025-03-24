-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 24, 2025 lúc 10:20 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;            $provinces = Province::all();



--
-- Cơ sở dữ liệu: `test123`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
