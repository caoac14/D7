-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 10:43 AM
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
(1, 'Lý thuyết', '2023-01-27 02:49:54', '2023-01-27 02:49:54'),
(2, 'Thực hành', '2023-01-27 02:49:54', '2023-01-27 02:49:54');

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
(1, 'Máy tính', '2023-01-26 19:51:07', '2023-01-26 19:51:07'),
(2, 'Bàn ghế', '2023-01-26 19:51:19', '2023-01-26 19:51:19'),
(3, 'Máy lạnh & máy chiếu', '2023-01-26 19:51:33', '2023-01-26 19:51:33'),
(4, 'Đèn & Quạt', '2023-01-26 19:51:44', '2023-01-26 19:51:44'),
(5, 'Khác', '2023-01-26 19:51:50', '2023-01-26 19:51:50');

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
(1, 'DA19TTA', '2023-01-27 02:49:38', '2023-01-27 02:49:38');

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
(10, '2022_12_07_031841_create_nhom_thiet_bi_table', 1);

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
(1, 3, 2, 1, 'Mất mạng', 'Sáng', '0', '2023-01-27', '', '2023-01-26 20:45:04', '2023-01-26 20:45:04'),
(2, 3, 2, 1, 'Mất mạng', 'Sáng', '1', '2023-01-27', '', '2023-01-26 20:45:46', '2023-02-01 02:29:26'),
(3, 3, 2, 1, 'Mất mạng', 'Sáng', '1', '2023-01-27', '', '2023-01-26 20:45:46', '2023-02-01 02:28:56'),
(4, 3, 2, 1, 'Mất mạng', 'Sáng', '1', '2023-01-27', '', '2023-01-26 20:46:28', '2023-01-26 20:46:28'),
(5, 3, 2, 1, 'Mất mạng', 'Sáng', '0', '2023-01-27', '', '2023-01-26 20:46:29', '2023-01-26 20:46:29'),
(6, 3, 2, 1, 'Mất mạng', 'Sáng', '1', '2023-01-27', '', '2023-01-26 20:46:29', '2023-02-01 02:30:59'),
(7, 3, 2, 1, 'Hư', 'Chiều', '1', '2023-01-26', '', '2023-01-26 20:57:29', '2023-01-26 20:57:29'),
(8, 3, 2, 1, 'Không kết nối được Internet', 'Tối', '1', '2023-02-01', '', '2023-02-01 02:30:06', '2023-02-01 02:30:44');

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
(1, 'A2', '2023-01-26 19:47:31', '2023-01-26 19:47:31'),
(2, 'B1', '2023-01-26 19:47:34', '2023-01-26 19:47:34'),
(3, 'B2', '2023-01-26 19:47:37', '2023-01-26 19:47:37'),
(4, 'B3', '2023-01-26 19:47:39', '2023-01-26 19:47:39'),
(5, 'C1', '2023-01-26 19:47:43', '2023-01-26 19:47:43'),
(6, 'C2', '2023-01-26 19:47:48', '2023-01-26 19:47:48'),
(7, 'C3', '2023-01-26 19:47:55', '2023-01-26 19:47:55'),
(8, 'C4', '2023-01-26 19:48:00', '2023-01-26 19:48:00'),
(9, 'C5', '2023-01-26 19:48:03', '2023-01-26 19:48:03'),
(10, 'C6', '2023-01-26 19:48:06', '2023-01-26 19:48:06'),
(11, 'C7', '2023-01-26 19:48:09', '2023-01-26 19:48:09'),
(12, 'D6', '2023-01-26 19:48:13', '2023-01-26 19:48:13'),
(13, 'D7', '2023-01-26 19:48:16', '2023-01-26 19:48:16'),
(14, 'D3', '2023-01-26 19:48:19', '2023-01-26 19:48:19');

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
(1, 1, 3, '2023-01-26 20:45:04', '2023-01-26 20:45:04'),
(2, 2, 3, '2023-01-26 20:45:46', '2023-01-26 20:45:46'),
(3, 3, 3, '2023-01-26 20:45:46', '2023-01-26 20:45:46'),
(4, 4, 3, '2023-01-26 20:46:28', '2023-01-26 20:46:28'),
(5, 5, 3, '2023-01-26 20:46:29', '2023-01-26 20:46:29'),
(6, 6, 3, '2023-01-26 20:46:29', '2023-01-26 20:46:29');

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
(1, 13, 1, 'D71.104', '', '2023-01-26 19:50:29', '2023-01-26 19:50:29'),
(2, 13, 2, 'D71.105', 'images/room/1674791015.png', '2023-01-26 19:50:40', '2023-01-26 20:43:35'),
(3, 13, 2, 'D71.106', '', '2023-01-26 20:01:31', '2023-01-26 20:40:12');

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
(1, 2, 1, 'Máy tính 01', '2023-01-26 19:52:11', '2023-01-26 19:52:11'),
(3, 2, 1, 'Máy tính GV', '2023-01-26 19:52:19', '2023-01-26 19:52:19');

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
(3, 'Trương Quốc Huy', '', '', '', 'quochuy@gmail.com', NULL, '$2y$10$WC74TAVegUvQcjGvxGOHEeswQBdgbZhH42vAtdCMHI9y7txN/VVS.', NULL, '2023-01-26 19:46:24', '2023-01-26 19:47:14');

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
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phong_ma_nhom_phong_foreign` (`ma_nhom_phong`),
  ADD KEY `phong_ma_loai_phong_foreign` (`ma_loai_phong`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nhat_ky`
--
ALTER TABLE `nhat_ky`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nhom_phong`
--
ALTER TABLE `nhom_phong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nhom_thiet_bi`
--
ALTER TABLE `nhom_thiet_bi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  ADD CONSTRAINT `thiet_bi_ma_loai_thiet_bi_foreign` FOREIGN KEY (`ma_loai_thiet_bi`) REFERENCES `loai_thiet_bi` (`id`),
  ADD CONSTRAINT `thiet_bi_ma_phong_foreign` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
