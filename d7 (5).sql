-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 10:27 AM
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
(1, 'Phòng lý thuyết', '2023-01-08 00:37:19', '2023-01-08 00:37:19'),
(2, 'Phòng thực hành', '2023-01-08 00:37:19', '2023-01-08 00:37:19');

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
(1, 'Máy tính', '2023-01-08 02:48:16', '2023-01-08 02:48:16'),
(2, 'Máy lạnh & Máy chiếu', '2023-01-08 02:48:16', '2023-01-08 02:48:16'),
(3, 'Đèn quạt', '2023-01-08 02:48:16', '2023-01-08 02:48:16'),
(4, 'Bàn ghế', '2023-01-08 02:48:16', '2023-01-08 02:48:16'),
(5, 'Khác', '2023-01-08 02:48:16', '2023-01-08 02:48:16');

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
(1, 'DA19TTA', '2023-01-11 08:53:53', '2023-01-11 08:53:53');

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
(5, '2022_12_07_014035_create_loai_thiet_bi_table', 1),
(6, '2022_12_07_031728_create_phong_table', 1),
(7, '2022_12_07_031757_create_thiet_bi_table', 1),
(8, '2022_12_07_031831_create_lop_table', 1),
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
  `ngay` date NOT NULL,
  `ghi_chu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, 'C3', '2023-01-08 00:37:57', '2023-01-08 00:37:57'),
(15, 'D7', '2023-01-08 00:39:36', '2023-01-08 00:39:36'),
(20, 'A2', '2023-01-11 01:45:21', '2023-01-11 01:45:21'),
(21, 'B1', '2023-01-11 01:46:48', '2023-01-11 01:46:48'),
(22, 'B2', '2023-01-11 01:46:51', '2023-01-11 01:46:51'),
(23, 'B3', '2023-01-11 01:46:54', '2023-01-11 01:46:54');

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
(1, 15, 2, 'D71.104', '', '2023-01-07 18:15:15', '2023-01-07 18:15:15'),
(2, 7, 2, 'C31.101', '', '2023-01-07 18:23:20', '2023-01-07 18:23:20'),
(3, 7, 1, 'C31.102', '', '2023-01-07 18:26:31', '2023-01-07 18:26:31'),
(4, 7, 1, 'C31.103', '', '2023-01-07 18:45:17', '2023-01-07 18:45:17'),
(5, 7, 1, 'C31.104', '', '2023-01-07 18:46:56', '2023-01-07 18:46:56'),
(6, 7, 2, 'C31.105', '', '2023-01-07 19:24:49', '2023-01-07 19:24:49'),
(7, 7, 1, 'C31.106', '', '2023-01-07 19:24:56', '2023-01-07 19:24:56'),
(8, 7, 2, 'C31.107', '', '2023-01-07 19:37:29', '2023-01-07 19:37:29'),
(9, 7, 1, 'C31.108', '', '2023-01-07 19:39:56', '2023-01-07 19:39:56'),
(10, 15, 2, 'D71.105', '', '2023-01-10 20:50:17', '2023-01-10 20:50:17'),
(11, 15, 1, 'D71.106', '', '2023-01-10 23:28:44', '2023-01-10 23:28:44');

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
(1, 1, 1, 'Máy tính 01', '2023-01-11 03:26:07', '2023-01-11 03:26:07'),
(3, 10, 1, 'Máy tính 02', '2023-01-11 00:12:17', '2023-01-11 00:12:17'),
(4, 10, 2, 'Máy lạnh Toshiba', '2023-01-11 00:13:29', '2023-01-11 00:13:29'),
(5, 10, 4, 'Bàn 01', '2023-01-11 00:18:47', '2023-01-11 00:18:47'),
(7, 10, 1, 'Máy tính 03', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(8, 10, 1, 'Máy tính 04', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(9, 10, 1, 'Máy tính 05', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(10, 10, 1, 'Máy tính 06', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(11, 10, 1, 'Máy tính 07', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(12, 10, 1, 'Máy tính 08', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(13, 10, 1, 'Máy tính 09', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(14, 10, 1, 'Máy tính 10', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(15, 10, 1, 'Máy tính 11', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(16, 10, 1, 'Máy tính 12', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(17, 10, 1, 'Máy tính 13', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(18, 10, 1, 'Máy tính 14', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(19, 10, 1, 'Máy tính 15', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(20, 10, 1, 'Máy tính 16', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(21, 10, 1, 'Máy tính 17', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(22, 10, 1, 'Máy tính 18', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(23, 10, 1, 'Máy tính 19', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(24, 10, 1, 'Máy tính 20', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(25, 10, 1, 'Máy tính 21', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(26, 10, 1, 'Máy tính 22', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(27, 10, 1, 'Máy tính 23', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(28, 10, 1, 'Máy tính 24', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(29, 10, 1, 'Máy tính 25', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(30, 10, 1, 'Máy tính 26', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(31, 10, 1, 'Máy tính 27', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(32, 10, 1, 'Máy tính 28', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(33, 10, 1, 'Máy tính 29', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(34, 10, 1, 'Máy tính 30', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(35, 10, 1, 'Máy tính 31', '2023-01-11 00:22:29', '2023-01-11 00:22:29'),
(37, 10, 1, 'Máy tính 01', '2023-01-11 01:50:09', '2023-01-11 01:50:09');

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
(1, 'Trương Quốc Huy', 'Giảng viên', 'Tiến sĩ', '0945976200', 'quochuy@gmail.com', NULL, '$2y$10$bRiBh1HUZQGQR0nfR6vVtOhCq8KQpPiPEcgDIRwIZcyEqe3t7PCuK', NULL, '2023-01-07 17:32:52', '2023-01-07 17:34:09');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhom_phong`
--
ALTER TABLE `nhom_phong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `nhom_thiet_bi`
--
ALTER TABLE `nhom_thiet_bi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
