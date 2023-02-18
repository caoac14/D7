-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 02:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `d7`
--

-- --------------------------------------------------------

--
-- Table structure for table `loai_phong`
--

CREATE TABLE `loai_phong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_loai_phong` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_phong`
--

INSERT INTO `loai_phong` (`id`, `ten_loai_phong`, `created_at`, `updated_at`) VALUES
(1, 'Lý thuyết', '2023-02-02 00:43:52', '2023-02-02 00:43:52'),
(2, 'Thực hành', '2023-02-02 00:43:52', '2023-02-02 00:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `loai_thiet_bi`
--

CREATE TABLE `loai_thiet_bi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_loai_thiet_bi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loai_thiet_bi`
--

INSERT INTO `loai_thiet_bi` (`id`, `ten_loai_thiet_bi`, `created_at`, `updated_at`) VALUES
(1, 'Máy tính', '2023-02-03 19:16:04', '2023-02-03 19:16:04'),
(2, 'Bàn ghế', '2023-02-03 19:16:08', '2023-02-03 19:16:08'),
(3, 'Đèn - Quạt', '2023-02-03 19:16:17', '2023-02-03 19:16:17'),
(4, 'Máy chiếu - Máy lạnh', '2023-02-03 19:16:37', '2023-02-03 19:16:37'),
(5, 'Khác', '2023-02-03 19:16:42', '2023-02-03 19:16:42');

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_lop` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`id`, `ten_lop`, `created_at`, `updated_at`) VALUES
(1, 'DA19TTA', '2023-02-02 00:43:28', '2023-02-02 00:43:28'),
(2, 'DA19TTB', '2023-02-02 00:43:28', '2023-02-02 00:43:28');

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
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_11_07_024054_create_nhom_phong_table', 1),
(4, '2022_11_08_002834_create_loai_phong_table', 1),
(5, '2022_12_07_014055_create_loai_thiet_bi_table', 1),
(6, '2022_12_07_031728_create_phong_table', 1),
(7, '2022_12_07_031831_create_lop_table', 1),
(8, '2022_12_07_031832_create_thiet_bi_table', 1),
(9, '2022_12_07_031840_create_nhat_ky_table', 1),
(10, '2022_12_07_031842_create_su_co_table', 1),
(11, '2022_12_07_031846_create_nhom_thiet_bi_table', 1),
(12, '2023_02_02_003238_create_phan_quyen_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhat_ky`
--

CREATE TABLE `nhat_ky` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_giao_vien` bigint(20) UNSIGNED NOT NULL,
  `ma_phong` bigint(20) UNSIGNED NOT NULL,
  `ma_lop` bigint(20) UNSIGNED NOT NULL,
  `mo_ta_loi` varchar(255) DEFAULT NULL,
  `buoi` varchar(255) NOT NULL,
  `trang_thai` varchar(255) NOT NULL,
  `ngay` date NOT NULL,
  `ghi_chu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhat_ky`
--

INSERT INTO `nhat_ky` (`id`, `ma_giao_vien`, `ma_phong`, `ma_lop`, `mo_ta_loi`, `buoi`, `trang_thai`, `ngay`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(9, 1, 9, 1, 'Bàn gãy chân', 'Sáng', '1', '2023-02-17', '', '2023-02-16 21:34:32', '2023-02-16 21:34:32'),
(11, 1, 9, 2, 'ds', 'Sáng', '1', '2023-02-16', '', '2023-02-17 00:26:08', '2023-02-17 00:26:08'),
(12, 1, 9, 1, NULL, 'Tối', '0', '2023-02-17', '', '2023-02-17 00:29:38', '2023-02-17 00:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `nhom_phong`
--

CREATE TABLE `nhom_phong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_day_phong` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhom_phong`
--

INSERT INTO `nhom_phong` (`id`, `ten_day_phong`, `created_at`, `updated_at`) VALUES
(1, 'A1', '2023-02-03 19:06:50', '2023-02-03 19:06:50'),
(2, 'A2', '2023-02-03 19:06:56', '2023-02-03 19:06:56'),
(3, 'A3', '2023-02-03 19:07:06', '2023-02-03 19:07:06'),
(4, 'B1', '2023-02-03 19:07:09', '2023-02-03 19:07:09'),
(5, 'B2', '2023-02-03 19:07:12', '2023-02-03 19:07:12'),
(6, 'B3', '2023-02-03 19:07:16', '2023-02-03 19:07:16'),
(7, 'B4', '2023-02-03 19:07:28', '2023-02-03 19:07:28'),
(8, 'C1', '2023-02-03 19:07:32', '2023-02-03 19:07:32'),
(9, 'C2', '2023-02-03 19:07:34', '2023-02-03 19:07:34'),
(10, 'C3', '2023-02-03 19:07:37', '2023-02-03 19:07:37'),
(11, 'C4', '2023-02-03 19:07:40', '2023-02-03 19:07:40'),
(12, 'C5', '2023-02-03 19:07:43', '2023-02-03 19:07:43'),
(13, 'C6', '2023-02-03 19:07:46', '2023-02-03 19:07:46'),
(14, 'C7', '2023-02-03 19:07:49', '2023-02-03 19:07:49'),
(15, 'C8', '2023-02-03 19:07:52', '2023-02-03 19:07:52'),
(16, 'C9', '2023-02-03 19:07:55', '2023-02-03 19:07:55'),
(17, 'D3', '2023-02-03 19:07:59', '2023-02-03 19:07:59'),
(18, 'D6', '2023-02-03 19:08:06', '2023-02-03 19:08:06'),
(19, 'D7', '2023-02-03 19:08:09', '2023-02-03 19:08:09'),
(20, 'E1', '2023-02-03 19:08:23', '2023-02-03 19:08:23'),
(21, 'E2', '2023-02-03 19:08:28', '2023-02-03 19:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `nhom_thiet_bi`
--

CREATE TABLE `nhom_thiet_bi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_nhat_ky` bigint(20) UNSIGNED NOT NULL,
  `ma_thiet_bi` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhom_thiet_bi`
--

INSERT INTO `nhom_thiet_bi` (`id`, `ma_nhat_ky`, `ma_thiet_bi`, `created_at`, `updated_at`) VALUES
(9, 9, 76, '2023-02-16 21:34:32', '2023-02-16 21:34:32'),
(11, 11, 1, '2023-02-17 00:26:08', '2023-02-17 00:26:08'),
(12, 11, 2, '2023-02-17 00:26:08', '2023-02-17 00:26:08'),
(13, 12, 64, '2023-02-17 00:29:38', '2023-02-17 00:29:38');

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
-- Table structure for table `phan_quyen`
--

CREATE TABLE `phan_quyen` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phan_quyen`
--

INSERT INTO `phan_quyen` (`id`, `user_email`, `created_at`, `updated_at`) VALUES
(1, 'quochuy@gmail.com', '2023-02-02 00:43:12', '2023-02-02 00:43:12'),
(3, 'quocdam@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_nhom_phong` bigint(20) UNSIGNED NOT NULL,
  `ma_loai_phong` bigint(20) UNSIGNED NOT NULL,
  `ten_phong` varchar(255) NOT NULL,
  `so_do_bo_tri` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`id`, `ma_nhom_phong`, `ma_loai_phong`, `ten_phong`, `so_do_bo_tri`, `created_at`, `updated_at`) VALUES
(2, 19, 2, 'D71.104', 'images/room/1675476707.png', '2023-02-03 19:13:12', '2023-02-03 19:13:12'),
(3, 19, 2, 'D71.105', 'images/room/1675476707.png', '2023-02-03 19:13:12', '2023-02-03 19:13:12'),
(4, 19, 2, 'D71.106', 'images/room/1675476707.png', '2023-02-03 19:13:12', '2023-02-03 19:13:12'),
(5, 19, 2, 'D71.107', 'images/room/1675476707.png', '2023-02-03 19:13:12', '2023-02-03 19:13:12'),
(6, 19, 2, 'D71.108', 'images/room/1675476707.png', '2023-02-03 19:13:12', '2023-02-03 19:13:12'),
(7, 19, 2, 'D71.109', 'images/room/1675476707.png', '2023-02-03 19:13:12', '2023-02-03 19:13:12'),
(8, 19, 2, 'D71.110', 'images/room/1675476707.png', '2023-02-03 19:13:12', '2023-02-03 19:13:41'),
(9, 19, 2, 'D71.111', 'images/room/1675476707.png', '2023-02-03 19:13:12', '2023-02-03 19:13:47'),
(10, 19, 2, 'D71.112', 'images/room/1675476707.png', '2023-02-03 19:13:12', '2023-02-03 19:13:33'),
(11, 19, 2, 'D71.103', '', '2023-02-03 19:13:57', '2023-02-03 19:13:57'),
(14, 6, 1, 'B31.101', '', '2023-02-03 19:34:48', '2023-02-03 19:34:48'),
(15, 6, 1, 'B31.102', '', '2023-02-03 19:34:48', '2023-02-03 19:34:48'),
(16, 6, 1, 'B31.103', '', '2023-02-03 19:34:48', '2023-02-03 19:34:48'),
(17, 6, 1, 'B31.104', '', '2023-02-03 19:34:48', '2023-02-03 19:34:48'),
(18, 6, 1, 'B31.105', '', '2023-02-03 19:34:48', '2023-02-03 19:34:48'),
(19, 6, 1, 'B31.106', '', '2023-02-03 19:34:48', '2023-02-03 19:34:48'),
(20, 6, 1, 'B31.107', '', '2023-02-03 19:34:48', '2023-02-03 19:34:48'),
(21, 6, 1, 'B31.108', '', '2023-02-03 19:34:48', '2023-02-03 19:34:48'),
(22, 6, 1, 'B31.109', '', '2023-02-03 19:34:48', '2023-02-03 19:34:48'),
(23, 1, 1, 'A11.101', '', '2023-02-16 23:54:31', '2023-02-16 23:54:31'),
(24, 1, 1, 'A11.102', '', '2023-02-16 23:56:51', '2023-02-16 23:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `su_co`
--

CREATE TABLE `su_co` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_giao_vien` bigint(20) UNSIGNED NOT NULL,
  `ma_phong` bigint(20) UNSIGNED NOT NULL,
  `ma_thiet_bi` bigint(20) UNSIGNED NOT NULL,
  `mo_ta_loi` varchar(255) DEFAULT NULL,
  `trang_thai` varchar(255) NOT NULL,
  `ngay` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `su_co`
--

INSERT INTO `su_co` (`id`, `ma_giao_vien`, `ma_phong`, `ma_thiet_bi`, `mo_ta_loi`, `trang_thai`, `ngay`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 2, 'f', '0', '2023-02-17', '2023-02-17 06:32:59', '2023-02-17 18:39:55'),
(2, 1, 9, 86, 'Ghế gãy 2 chân sau', '0', '2023-02-18', '2023-02-17 18:10:05', '2023-02-17 18:46:16'),
(3, 1, 9, 22, 'Không kết nối được mạng', '1', '2023-02-18', '2023-02-17 18:45:56', '2023-02-17 18:45:56'),
(4, 1, 9, 27, 'Máy tính bị đứt dây bàn phím', '1', '2023-02-18', '2023-02-17 18:46:11', '2023-02-17 18:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `thiet_bi`
--

CREATE TABLE `thiet_bi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_phong` bigint(20) UNSIGNED NOT NULL,
  `ma_loai_thiet_bi` bigint(20) UNSIGNED NOT NULL,
  `ten_thiet_bi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thiet_bi`
--

INSERT INTO `thiet_bi` (`id`, `ma_phong`, `ma_loai_thiet_bi`, `ten_thiet_bi`, `created_at`, `updated_at`) VALUES
(1, 9, 1, 'D71.111-MT01', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(2, 9, 1, 'D71.111-MT02', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(3, 9, 1, 'D71.111-MT03', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(4, 9, 1, 'D71.111-MT04', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(5, 9, 1, 'D71.111-MT05', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(6, 9, 1, 'D71.111-MT06', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(7, 9, 1, 'D71.111-MT07', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(8, 9, 1, 'D71.111-MT08', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(9, 9, 1, 'D71.111-MT09', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(10, 9, 1, 'D71.111-MT10', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(11, 9, 1, 'D71.111-MT11', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(12, 9, 1, 'D71.111-MT12', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(13, 9, 1, 'D71.111-MT13', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(14, 9, 1, 'D71.111-MT14', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(15, 9, 1, 'D71.111-MT15', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(16, 9, 1, 'D71.111-MT16', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(17, 9, 1, 'D71.111-MT17', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(18, 9, 1, 'D71.111-MT18', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(19, 9, 1, 'D71.111-MT19', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(20, 9, 1, 'D71.111-MT20', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(21, 9, 1, 'D71.111-MT21', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(22, 9, 1, 'D71.111-MT22', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(23, 9, 1, 'D71.111-MT23', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(24, 9, 1, 'D71.111-MT24', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(25, 9, 1, 'D71.111-MT25', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(26, 9, 1, 'D71.111-MT26', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(27, 9, 1, 'D71.111-MT27', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(28, 9, 1, 'D71.111-MT28', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(29, 9, 1, 'D71.111-MT29', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(30, 9, 1, 'D71.111-MT30', '2023-02-03 19:18:52', '2023-02-03 19:18:52'),
(61, 9, 3, 'D71.111-ĐQ1', '2023-02-03 19:23:57', '2023-02-03 19:23:57'),
(62, 9, 3, 'D71.111-ĐQ2', '2023-02-03 19:23:57', '2023-02-03 19:23:57'),
(63, 9, 3, 'D71.111-ĐQ3', '2023-02-03 19:23:57', '2023-02-03 19:23:57'),
(64, 9, 3, 'D71.111-ĐQ4', '2023-02-03 19:23:57', '2023-02-03 19:23:57'),
(65, 9, 3, 'D71.111-ĐQ5', '2023-02-03 19:23:57', '2023-02-03 19:23:57'),
(66, 9, 3, 'D71.111-ĐQ6', '2023-02-03 19:23:57', '2023-02-03 19:23:57'),
(67, 9, 3, 'D71.111-ĐQ7', '2023-02-03 19:23:57', '2023-02-03 19:23:57'),
(68, 9, 3, 'D71.111-ĐQ8', '2023-02-03 19:23:57', '2023-02-03 19:23:57'),
(69, 9, 2, 'D71.111-BG01', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(70, 9, 2, 'D71.111-BG02', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(71, 9, 2, 'D71.111-BG03', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(72, 9, 2, 'D71.111-BG04', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(73, 9, 2, 'D71.111-BG05', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(74, 9, 2, 'D71.111-BG06', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(75, 9, 2, 'D71.111-BG07', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(76, 9, 2, 'D71.111-BG08', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(77, 9, 2, 'D71.111-BG09', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(78, 9, 2, 'D71.111-BG10', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(79, 9, 2, 'D71.111-BG11', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(80, 9, 2, 'D71.111-BG12', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(81, 9, 2, 'D71.111-BG13', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(82, 9, 2, 'D71.111-BG14', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(83, 9, 2, 'D71.111-BG15', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(84, 9, 2, 'D71.111-BG16', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(85, 9, 2, 'D71.111-BG17', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(86, 9, 2, 'D71.111-BG18', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(87, 9, 2, 'D71.111-BG19', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(88, 9, 2, 'D71.111-BG20', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(89, 9, 2, 'D71.111-BG21', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(90, 9, 2, 'D71.111-BG22', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(91, 9, 2, 'D71.111-BG23', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(92, 9, 2, 'D71.111-BG24', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(93, 9, 2, 'D71.111-BG25', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(94, 9, 2, 'D71.111-BG26', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(95, 9, 2, 'D71.111-BG27', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(96, 9, 2, 'D71.111-BG28', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(97, 9, 2, 'D71.111-BG29', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(98, 9, 2, 'D71.111-BG30', '2023-02-03 19:28:20', '2023-02-03 19:28:20'),
(99, 9, 4, 'D71.111-ML01', '2023-02-03 19:29:12', '2023-02-03 19:29:12'),
(100, 9, 4, 'D71.111-ML02', '2023-02-03 19:29:35', '2023-02-03 19:29:35'),
(101, 9, 4, 'D71.111-MC-Canon', '2023-02-03 19:29:48', '2023-02-03 19:29:48'),
(203, 14, 3, 'D71.111-Đ01', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(204, 14, 3, 'D71.111-Đ02', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(205, 14, 3, 'D71.111-Đ03', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(206, 14, 3, 'D71.111-Đ04', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(207, 14, 3, 'D71.111-Đ05', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(208, 14, 3, 'D71.111-Đ06', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(209, 14, 3, 'D71.111-Đ07', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(210, 14, 3, 'D71.111-Đ08', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(211, 14, 3, 'D71.111-Đ09', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(212, 14, 3, 'D71.111-Đ10', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(213, 14, 3, 'D71.111-Đ11', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(214, 14, 3, 'D71.111-Đ12', '2023-02-03 19:40:16', '2023-02-03 19:40:16'),
(215, 14, 3, 'D71.111-Q01', '2023-02-03 19:40:34', '2023-02-03 19:40:34'),
(216, 14, 3, 'D71.111-Q02', '2023-02-03 19:40:34', '2023-02-03 19:40:34'),
(217, 14, 3, 'D71.111-Q03', '2023-02-03 19:40:34', '2023-02-03 19:40:34'),
(218, 14, 3, 'D71.111-Q04', '2023-02-03 19:40:34', '2023-02-03 19:40:34'),
(219, 14, 2, 'D71.111-BG01', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(220, 14, 2, 'D71.111-BG02', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(221, 14, 2, 'D71.111-BG03', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(222, 14, 2, 'D71.111-BG04', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(223, 14, 2, 'D71.111-BG05', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(224, 14, 2, 'D71.111-BG06', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(225, 14, 2, 'D71.111-BG07', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(226, 14, 2, 'D71.111-BG08', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(227, 14, 2, 'D71.111-BG09', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(228, 14, 2, 'D71.111-BG10', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(229, 14, 2, 'D71.111-BG11', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(230, 14, 2, 'D71.111-BG12', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(231, 14, 2, 'D71.111-BG13', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(232, 14, 2, 'D71.111-BG14', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(233, 14, 2, 'D71.111-BG15', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(234, 14, 2, 'D71.111-BG16', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(235, 14, 2, 'D71.111-BG17', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(236, 14, 2, 'D71.111-BG18', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(237, 14, 2, 'D71.111-BG19', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(238, 14, 2, 'D71.111-BG20', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(239, 14, 2, 'D71.111-BG21', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(240, 14, 2, 'D71.111-BG22', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(241, 14, 2, 'D71.111-BG23', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(242, 14, 2, 'D71.111-BG24', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(243, 14, 2, 'D71.111-BG25', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(244, 14, 2, 'D71.111-BG26', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(245, 14, 2, 'D71.111-BG27', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(246, 14, 2, 'D71.111-BG28', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(247, 14, 2, 'D71.111-BG29', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(248, 14, 2, 'D71.111-BG30', '2023-02-03 19:41:10', '2023-02-03 19:41:10'),
(249, 14, 4, 'B31.101-ML01', '2023-02-03 19:41:27', '2023-02-03 19:41:27'),
(250, 14, 4, 'B31.101-ML02', '2023-02-03 19:41:32', '2023-02-03 19:41:32'),
(251, 14, 4, 'B31.101-MC-Canon', '2023-02-03 19:41:43', '2023-02-03 19:41:43'),
(252, 23, 1, 'Máy tính 01', '2023-02-16 23:54:39', '2023-02-16 23:54:39'),
(253, 23, 2, 'Bàn ghế 01', '2023-02-16 23:54:57', '2023-02-16 23:54:57'),
(254, 23, 3, 'Đèn 01', '2023-02-16 23:55:09', '2023-02-16 23:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `chuc_vu` varchar(255) NOT NULL,
  `hoc_vi` varchar(255) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `chuc_vu`, `hoc_vi`, `sdt`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Trương Quốc Huy', '', '', '', 'quochuy@gmail.com', NULL, '$2y$10$gFibthydtAVvtN5wY2LiY.CxZGLEvOGPWiXpRWjqUuix5tvXfruuO', NULL, '2023-02-01 17:44:29', '2023-02-03 17:15:08'),
(3, 'Nguyễn Viết Phan', 'Chuyên gia đầu ngành', 'Tiến Sĩ', '', 'vietphan@gmail.com', NULL, '$2y$10$oALxpRVXpQVeKdD0RNA.D..36idchVsfJxL0mSzXb3wz.Cl8MXPFO', NULL, '2023-02-03 19:02:10', '2023-02-03 19:02:10'),
(4, 'Lâm Thành Thép', 'Chuyên gia đầu ngành', 'Tiến Sĩ', '', 'thanhthep@gmail.com', NULL, '$2y$10$lBRI8F8jdoIfBgvbyLRyV.Gl8Fsr4vAT46dROv6t5UJxYHe.Ov52a', NULL, '2023-02-03 19:02:10', '2023-02-03 19:02:10'),
(5, 'Vũ Quang Hiếu', 'Chuyên gia đầu ngành', 'Tiến Sĩ', '', 'quanghieu@gmail.com', NULL, '$2y$10$d5kvoNJmNkUN614sczACzufcZyzN215BE6XE0V3yr4RsCjICpFUhC', NULL, '2023-02-03 19:02:10', '2023-02-03 19:02:10'),
(6, 'Nguyễn Bá Nhiệm', 'Phó trưởng bộ môn', 'Thạc sĩ', '0983303609', 'nhiemnb@tvu.edu.vn', NULL, '$2y$10$Wy.TmjAtO7EEps1jDordn.4.C3vBHjL3R.xWavo.IU92i/lIdM.i.', NULL, '2023-02-03 19:02:10', '2023-02-03 19:02:10'),
(7, 'Nguyễn Hoàng Duy Thiện', 'Giảng viên', 'Thạc sĩ', '0989274222', 'thiennhd@tvu.edu.vn', NULL, '$2y$10$BCklaZ1C5Y4zzAVxiwvfxeqLhOaBGFq/09P3wofoWyzHvxK1vMn6S', NULL, '2023-02-03 19:02:10', '2023-02-03 19:02:10'),
(8, 'Nguyễn Bảo Ân', 'Phó trưởng bộ môn', 'Tiến Sĩ', '0908961632', 'annb@tvu.edu.vn', NULL, '$2y$10$cpyc5dMFmr0EIFpb.iDs6OyElWbICpH5ICndfVOmmliLu10Trjsoy', NULL, '2023-02-03 19:02:10', '2023-02-03 19:02:10'),
(9, 'Võ Thành C', 'Giảng viên', 'Thạc sĩ', '0909119657', 'vothanhc@tvu.edu.vn', NULL, '$2y$10$AhVJATFLm1Dt7FVfVh5pcuwf2nu7moj/xQLENLWj3H2J1VE/aeofa', NULL, '2023-02-03 19:02:10', '2023-02-03 19:02:10'),
(10, 'Phạm Minh Đương', 'Giảng viên', 'Thạc sĩ', '0868567268', 'duongminh@tvu.edu.vn', NULL, '$2y$10$Dj.yEFkjuisICTMq5SaYQekvoRiBdZ0lhsMY9wcTZ2QkVstJCpIQW', NULL, '2023-02-03 19:02:10', '2023-02-03 19:02:10'),
(11, 'Nguyễn Trần Diễm Hạnh', 'Giảng viên', 'Tiến Sĩ', '0917145587', 'diemhanh_tvu@tvu.edu.vn', NULL, '$2y$10$VN3NA4CFDyyXSC0IQm70FOYyWQim5p/7xpg9by9WkjObgRxs3tNeu', NULL, '2023-02-03 19:02:10', '2023-02-03 19:02:10'),
(12, 'Nguyễn Mộng Hiền', 'Giảng viên', 'Nghiên cứu sinh', ' 09759990579', 'hientvu@tvu.edu.vn', NULL, '$2y$10$gjREZYXSn7RzTQiym73bf.4AT5sZZhzMNdwItt0KaYfB/f7KyAO4y', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(13, 'Ngô Thanh Huy', 'Giảng viên', 'Cao học', '0989623237', 'huyngocntt@tvu.edu.vn', NULL, '$2y$10$m.wZb7dV./uo7NQfOZsokuPcGPVrftORIaeV7JCGOrdBtjC1NoJKS', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(14, 'Dương Ngọc Vân Khanh', 'Giảng viên', 'Thạc sĩ', '0988332008', 'vankhanh@tvu.edu.vn', NULL, '$2y$10$otJetnmT/UY9jxBqBo3W9O0jmXomBNmHc6Eicp/lqjx2FohE8MKHq', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(15, 'Nguyễn Nhứt Lam', 'Phó trưởng bộ môn', 'Tiến Sĩ', '0919556441', 'lamnn@tvu.edu.vn', NULL, '$2y$10$E/QX8zu0ui/bCTjlLXE8K.DPYBFklyYuPuSSdGV/y0Ne0J51V7KQ2', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(16, 'Phạm Thị Trúc Mai', 'Giảng viên', 'Thạc sĩ', '0936010206', 'pttmai@tvu.edu.vn', NULL, '$2y$10$28RE0mTOGlnhszko5gLHPeNKRBngMm3Nbs6OCr7Wwis6XEHVDSxAW', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(17, 'Đoàn Phước Miền', 'Giảng viên', 'Nghiên cứu sinh', '0978962954', 'phuocmien@tvu.edu.vn', NULL, '$2y$10$IGUqKXva4cdLyez3Y9SIcuWvQwUmDC3rUvWvf2rG9MezLmnuslVHq', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(18, 'Trầm Hoàng Nam', 'Giảng viên', 'Thạc sĩ', '0977810235', 'tramhoangnam@tvu.edu.vn', NULL, '$2y$10$eSwKN.ZhtSUxEme2c0lInutxyC9IjxXXYskdgBwajXyMnoh67EasS', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(19, 'Phan Thị Phương Nam', 'Giảng viên', 'Thạc sĩ', '098 923 6166', 'ptpnam@tvu.edu.vn', NULL, '$2y$10$O1LC0ZwfskPg3Z5CjZJ2Me1zUAhhTGOt3GEYNVZ70yzWT9AVgOwD6', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(20, 'Trần Văn Nam', 'Giảng viên', 'Thạc sĩ', '0365583414', 'namtv@tvu.edu.vn', NULL, '$2y$10$qY3.uZ8vZmtIuLi/n72DROqN5vg4KOH.xX/2pzSCvUxScFqhgcuvS', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(21, 'Khấu Văn Nhựt', 'Giảng viên', 'Thạc sĩ', '0979748090', 'nhutkhau@tvu.edu.vn', NULL, '$2y$10$Zceb6T7/W.SSGZZxNRLdUeqpn7QmzzK2ZmakChn6x0teS2JC7Mb1.', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(22, 'Nguyễn Thừa Phát Tài', 'Giảng viên', 'Thạc sĩ', '0988345131', 'phattai@tvu.edu.vn', NULL, '$2y$10$X8ezSPJS3nsm5DYiveuQg.r77bUxr5t.ZvsYwIoooBz14/tSloZV2', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(23, 'Huỳnh Văn Thanh', 'Giảng viên', 'Thạc sĩ', '0977654181', 'hvthanh@tvu.edu.vn', NULL, '$2y$10$qU.l7.ShnnCfv5UWGHk4R.nvAbK0W0FYnOC.m6g/d8u0meyfEkGB6', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(24, 'Nguyễn Khắc Quốc', 'Giảng viên', 'Thạc sĩ', '0918085180', 'nkquoc@tvu.edu.vn', NULL, '$2y$10$aCtrA7OgrlY1oWXhNNsaruCLZaY9eYC7Q8n8Nl1v712TZ2j9Cuq4m', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(25, 'Nguyễn Ngọc Đan Thanh', 'Giảng viên', 'Thạc sĩ', '0916741252', 'ngocdanthanhdt@tvu.edu.vn', NULL, '$2y$10$yraeez0um3WTMI1eldQ/heJS7Y3bJ3oyi0raDBEY6Y3eP9TMup3tu', NULL, '2023-02-03 19:02:11', '2023-02-03 19:02:11'),
(26, 'Lê Minh Tự', 'Giảng viên', 'Thạc sĩ', '0918677326', 'lmtu@tvu.edu.vn', NULL, '$2y$10$WMA1StJjowRROo37hRmNZOdqPpmW9PgQLKJIDvVQ6WrgJD6zRT/qy', NULL, '2023-02-03 19:02:12', '2023-02-03 19:02:12'),
(27, 'Thạch Kọng Saoane', 'Giảng viên', 'Nghiên cứu sinh', '', 'oane@tvu.edu.vn', NULL, '$2y$10$tBpim8NBjrehGopXIfULSOcXQ2Z/Zm7iaS4T/L3iEwhQZoozrvB8O', NULL, '2023-02-03 19:02:12', '2023-02-03 19:02:12'),
(28, 'Hà Thị Thuý Vi', 'Giảng viên', 'Thạc sĩ', '0983001084', 'hattvi201084@tvu.edu.vn', NULL, '$2y$10$SJuFUExbC96FZQ70qFiBo.zkNHz15Dr/6vYex/6Dg8mR5IxJeQHi2', NULL, '2023-02-03 19:02:12', '2023-02-03 19:02:12'),
(29, 'Trịnh Quốc Việt', 'Giảng viên', 'Thạc sĩ', '0354696999', 'tqviettv@tvu.edu.vn', NULL, '$2y$10$L12FoNKchUUMLPVMLSL4QuDXs69ZGJ3VqWoM2V51r.2ewkhK3H8h6', NULL, '2023-02-03 19:02:12', '2023-02-03 19:02:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loai_phong`
--
ALTER TABLE `loai_phong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai_thiet_bi`
--
ALTER TABLE `loai_thiet_bi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhat_ky`
--
ALTER TABLE `nhat_ky`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhat_ky_ma_giao_vien_foreign` (`ma_giao_vien`),
  ADD KEY `nhat_ky_ma_phong_foreign` (`ma_phong`),
  ADD KEY `nhat_ky_ma_lop_foreign` (`ma_lop`);

--
-- Indexes for table `nhom_phong`
--
ALTER TABLE `nhom_phong`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhom_thiet_bi`
--
ALTER TABLE `nhom_thiet_bi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhom_thiet_bi_ma_nhat_ky_foreign` (`ma_nhat_ky`),
  ADD KEY `nhom_thiet_bi_ma_thiet_bi_foreign` (`ma_thiet_bi`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `phan_quyen`
--
ALTER TABLE `phan_quyen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phong_ma_nhom_phong_foreign` (`ma_nhom_phong`),
  ADD KEY `phong_ma_loai_phong_foreign` (`ma_loai_phong`);

--
-- Indexes for table `su_co`
--
ALTER TABLE `su_co`
  ADD PRIMARY KEY (`id`),
  ADD KEY `su_co_ma_giao_vien_foreign` (`ma_giao_vien`),
  ADD KEY `su_co_ma_phong_foreign` (`ma_phong`),
  ADD KEY `su_co_ma_thiet_bi_foreign` (`ma_thiet_bi`);

--
-- Indexes for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thiet_bi_ma_phong_foreign` (`ma_phong`),
  ADD KEY `thiet_bi_ma_loai_thiet_bi_foreign` (`ma_loai_thiet_bi`);

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
-- AUTO_INCREMENT for table `loai_phong`
--
ALTER TABLE `loai_phong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loai_thiet_bi`
--
ALTER TABLE `loai_thiet_bi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nhat_ky`
--
ALTER TABLE `nhat_ky`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nhom_phong`
--
ALTER TABLE `nhom_phong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `nhom_thiet_bi`
--
ALTER TABLE `nhom_thiet_bi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phan_quyen`
--
ALTER TABLE `phan_quyen`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `su_co`
--
ALTER TABLE `su_co`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhat_ky`
--
ALTER TABLE `nhat_ky`
  ADD CONSTRAINT `nhat_ky_ma_giao_vien_foreign` FOREIGN KEY (`ma_giao_vien`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nhat_ky_ma_lop_foreign` FOREIGN KEY (`ma_lop`) REFERENCES `lop` (`id`),
  ADD CONSTRAINT `nhat_ky_ma_phong_foreign` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`id`);

--
-- Constraints for table `nhom_thiet_bi`
--
ALTER TABLE `nhom_thiet_bi`
  ADD CONSTRAINT `nhom_thiet_bi_ma_nhat_ky_foreign` FOREIGN KEY (`ma_nhat_ky`) REFERENCES `nhat_ky` (`id`),
  ADD CONSTRAINT `nhom_thiet_bi_ma_thiet_bi_foreign` FOREIGN KEY (`ma_thiet_bi`) REFERENCES `thiet_bi` (`id`);

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ma_loai_phong_foreign` FOREIGN KEY (`ma_loai_phong`) REFERENCES `loai_phong` (`id`),
  ADD CONSTRAINT `phong_ma_nhom_phong_foreign` FOREIGN KEY (`ma_nhom_phong`) REFERENCES `nhom_phong` (`id`);

--
-- Constraints for table `su_co`
--
ALTER TABLE `su_co`
  ADD CONSTRAINT `su_co_ma_giao_vien_foreign` FOREIGN KEY (`ma_giao_vien`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `su_co_ma_phong_foreign` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`id`),
  ADD CONSTRAINT `su_co_ma_thiet_bi_foreign` FOREIGN KEY (`ma_thiet_bi`) REFERENCES `thiet_bi` (`id`);

--
-- Constraints for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  ADD CONSTRAINT `thiet_bi_ma_loai_thiet_bi_foreign` FOREIGN KEY (`ma_loai_thiet_bi`) REFERENCES `loai_thiet_bi` (`id`),
  ADD CONSTRAINT `thiet_bi_ma_phong_foreign` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
