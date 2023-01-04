-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 10:44 AM
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
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Bàn ghế', NULL, NULL),
(3, 'Máy tính', NULL, NULL),
(4, 'Máy chiếu & Máy lạnh', NULL, NULL),
(5, 'Đèn quạt', NULL, NULL);

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
(1, 'DA19TTA', NULL, NULL),
(2, 'DA19TTA', NULL, NULL),
(3, 'DA19TTB', NULL, NULL),
(4, 'DA20CNOTA', NULL, NULL),
(5, 'DA19CK', NULL, NULL),
(6, 'DA21DA', NULL, NULL),
(7, 'DA20THA', NULL, NULL),
(8, 'DA21NNA', NULL, NULL),
(9, 'DA20YHDP', NULL, NULL),
(10, 'DA21TY', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_07_014035_create_loai_thiet_bi_table', 1),
(6, '2022_12_07_031728_create_phong_table', 1),
(7, '2022_12_07_031757_create_thiet_bi_table', 1),
(8, '2022_12_07_031812_create_nhan_vien_table', 1),
(9, '2022_12_07_031831_create_lop_table', 1),
(10, '2022_12_07_031840_create_nhat_ky_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ten_nhan_vien` varchar(255) NOT NULL,
  `ten_cong_ty` varchar(255) NOT NULL,
  `sdt_nhan_vien` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhat_ky`
--

CREATE TABLE `nhat_ky` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_giao_vien` bigint(20) UNSIGNED NOT NULL,
  `ma_phong` bigint(20) UNSIGNED NOT NULL,
  `ma_lop` bigint(20) UNSIGNED NOT NULL,
  `ma_thiet_bi` bigint(20) UNSIGNED NOT NULL,
  `mo_ta_loi` varchar(255) NOT NULL,
  `buoi` varchar(255) NOT NULL,
  `ngay` date NOT NULL,
  `ghi_chu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhat_ky`
--

INSERT INTO `nhat_ky` (`id`, `ma_giao_vien`, `ma_phong`, `ma_lop`, `ma_thiet_bi`, `mo_ta_loi`, `buoi`, `ngay`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 8, 6, 'Không kết nối được internet', 'Tối', '2022-12-31', '', '2022-12-31 07:51:40', '2022-12-31 07:51:40'),
(8, 1, 1, 1, 16, 'khoong lanhj', 'Chiều', '2023-01-02', '', '2023-01-01 17:36:49', '2023-01-01 17:36:49'),
(9, 30, 1, 1, 12, 'gãy chân', 'Chiều', '2023-01-03', '', '2023-01-02 23:35:45', '2023-01-02 23:35:45'),
(10, 1, 1, 1, 12, 'khong co', 'Chiều', '2023-01-04', '', '2023-01-04 02:04:50', '2023-01-04 02:04:50');

-- --------------------------------------------------------

--
-- Table structure for table `passone`
--

CREATE TABLE `passone` (
  `id` int(11) NOT NULL,
  `pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `ten_phong` varchar(255) NOT NULL,
  `so_do_bo_tri` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`id`, `ten_phong`, `so_do_bo_tri`, `created_at`, `updated_at`) VALUES
(1, 'C71.101', '1', NULL, NULL),
(3, 'C71.102', '2', NULL, NULL),
(4, 'C71.103', '3', NULL, NULL),
(5, 'C71.104', '4', NULL, NULL),
(7, 'C71.105', '5', NULL, NULL),
(8, 'C71.106', '6', NULL, NULL),
(9, 'C71.107', '7', NULL, NULL),
(10, 'C71.108', '8', NULL, NULL),
(11, 'C71.109', '9', NULL, NULL),
(12, 'C71.110', '10', NULL, NULL),
(13, 'C71.111', '11', NULL, NULL),
(14, 'C71.112', '12', NULL, NULL),
(15, 'C71.113', '13', NULL, NULL),
(16, 'C71.114', '14', NULL, NULL),
(17, 'C71.115', '15', NULL, NULL),
(18, 'C71.116', '16', NULL, NULL),
(19, 'C71.117', '17', NULL, NULL);

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
(1, 1, 3, 'Máy tính 01', NULL, NULL),
(2, 1, 3, 'Máy tính 02', NULL, NULL),
(3, 1, 3, 'Máy tính 03', NULL, NULL),
(4, 1, 3, 'Máy tính 04', NULL, NULL),
(5, 1, 3, 'Máy tính 05', NULL, NULL),
(6, 1, 3, 'Máy tính 06', NULL, NULL),
(7, 1, 3, 'Máy tính 07', NULL, NULL),
(8, 1, 2, 'Bàn 06', NULL, NULL),
(9, 1, 2, 'Bàn 01', NULL, NULL),
(10, 1, 2, 'Bàn 02', NULL, NULL),
(11, 1, 2, 'Bàn 03', NULL, NULL),
(12, 1, 2, 'Bàn 04', NULL, NULL),
(13, 1, 2, 'Bàn 05', NULL, NULL),
(15, 1, 4, 'Máy lạnh 01', NULL, NULL),
(16, 1, 4, 'Máy lạnh 02', NULL, NULL),
(17, 1, 5, 'Đèn dài 01', NULL, NULL),
(18, 1, 5, 'Quạt trần 01', NULL, NULL),
(19, 1, 5, 'Đèn dài 02', NULL, NULL),
(20, 1, 5, 'Đèn ngủ', NULL, NULL),
(21, 1, 4, 'Máy chiếu\r\n', NULL, NULL),
(22, 1, 2, 'Bàn 11', '2023-01-03 20:55:14', '2023-01-03 20:55:14'),
(23, 1, 2, 'Bàn 12', '2023-01-03 20:56:48', '2023-01-03 20:56:48'),
(24, 1, 2, 'Bàn 123', '2023-01-03 20:57:33', '2023-01-03 20:57:33'),
(25, 1, 2, 'Bàn 123', '2023-01-03 20:57:45', '2023-01-03 20:57:45'),
(26, 1, 2, 'Bàn 1234', '2023-01-03 20:57:57', '2023-01-03 20:57:57'),
(27, 3, 3, 'Máy tính 01', '2023-01-04 01:39:04', '2023-01-04 01:39:04'),
(28, 3, 2, 'Bàn 01', '2023-01-04 01:39:53', '2023-01-04 01:39:53'),
(29, 3, 2, 'Bàn 02', '2023-01-04 01:41:21', '2023-01-04 01:41:21');

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
(1, 'Trương Quốc Huy', 'Giảng viên', 'Phó giáo sư', '0945976200', 'quochuy@gmail.com', NULL, '$2y$10$y/VPWEYpwozbirQ.rukIEuG2g49/aLB/jb7kYXhBTuifeMauZThxW', NULL, '2022-12-30 11:50:33', '2023-01-02 23:55:06'),
(2, 'Lý Thế Vinh', 'Chuyên gia đầu ngành', 'Tiến sĩ', '0945976201', 'thevinh@gmail.com', NULL, '$2y$10$hlinuShsUVmiYJPelspohugyydAjmol7r2rnhryA/X37RisWRYMU.', NULL, '2022-12-30 13:01:40', '2023-01-03 01:53:22'),
(3, 'Thạch Minh Lực', 'Giảng viên', 'Tiến sĩ', '0945789123', 'minhluc@gmail.com', NULL, '$2y$10$Fp/asQbePvw8CEszXw.GaOjrfqFk42JKZsyxklXui6SIGqJhOW/Cu', NULL, '2023-01-01 20:11:11', '2023-01-03 01:54:53'),
(26, 'Thái Thị Hà', '', '', '', 'thiha@gmail.com', NULL, '$2y$10$WPMNGG9JB/tlLTUKpgbGUudpl6.uHWasXVgjWfGBUq5IYM/BioPzS', NULL, '2023-01-02 19:14:49', '2023-01-03 00:52:19'),
(28, 'Nguyễn Văn Ổi', '', '', '', 'vanoi@gmail.com', NULL, '$2y$10$/TDUfK4R6zpy27xXBdpa4.7uIXd7iFKVTtPneZKlNVWOgOgrTHcp.', NULL, '2023-01-02 19:27:24', '2023-01-03 01:55:24'),
(29, 'Nguyễn Văn Quýt', 'Giảng viên', 'Tiến sĩ', '0945789123', 'vanquyt@gmail.com', NULL, '$2y$10$axz9dm6MB7vBsSh3JNqC2.3UoiDz7ae9AeyVUTaaNznRNUXWdFtKe', NULL, '2023-01-02 19:31:36', '2023-01-03 19:52:42'),
(30, 'Nguyễn Văn Cam', '', '', '', 'vancam@gmail.com', NULL, '$2y$10$e20RbBKrxyIHCHX6MjpQtOf67G1XB05ZYf2oft3GVy74APVxic.bu', NULL, '2023-01-02 19:33:29', '2023-01-03 01:42:10'),
(31, 'Nguyễn Dưa Hấu', 'Giảng viên', 'Tiến sĩ', '0945687541', 'duahau@gmail.com', NULL, '$2y$10$TdAONJloSzLsv8VYpikyeeP0GziSI0PC1Y5AYM1TXC.MqX98A515W', NULL, '2023-01-02 19:36:42', '2023-01-03 01:47:31'),
(32, 'Nguyễn Văn Táo', '', '', '', 'vantao@gmail.com', NULL, '$2y$10$tWHDT0z/2VR12KlOV.tKTuXCgNeSK8UusQYUH.otuDJT2izkuqicm', NULL, '2023-01-02 19:38:11', '2023-01-03 01:48:26'),
(33, 'Trần Văn Nhãn', '', '', '', 'vannhan@gmail.com', NULL, '$2y$10$o3wuH9OyZJb1PqCg3U4nOe66gv4x7uVxqcnz4dU50zrcNl9bQX9Ky', NULL, '2023-01-03 00:27:02', '2023-01-03 01:53:58'),
(34, 'Lê Quốc Anh', '', '', '', 'quocanh@gmail.com', NULL, '$2y$10$QEHZQuKPBlxm.1HJwb/H4ulSDCCvCwKOFE.BGUaCklpWIbHBUax36', NULL, '2023-01-03 01:02:21', '2023-01-03 01:16:08'),
(35, 'Tăng Quảng Châu', '', '', '', 'quangchau@gmail.com', NULL, '$2y$10$X0FU0dKp6rGh/34LyWw80OwVOxXGYVco4RTuTAuLlsNViRNco99Ye', NULL, '2023-01-04 02:21:33', '2023-01-04 02:21:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhat_ky`
--
ALTER TABLE `nhat_ky`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhat_ky_ma_giao_vien_foreign` (`ma_giao_vien`),
  ADD KEY `nhat_ky_ma_phong_foreign` (`ma_phong`),
  ADD KEY `nhat_ky_ma_lop_foreign` (`ma_lop`),
  ADD KEY `nhat_ky_ma_thiet_bi_foreign` (`ma_thiet_bi`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loai_thiet_bi`
--
ALTER TABLE `loai_thiet_bi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhat_ky`
--
ALTER TABLE `nhat_ky`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhat_ky`
--
ALTER TABLE `nhat_ky`
  ADD CONSTRAINT `nhat_ky_ma_giao_vien_foreign` FOREIGN KEY (`ma_giao_vien`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `nhat_ky_ma_lop_foreign` FOREIGN KEY (`ma_lop`) REFERENCES `lop` (`id`),
  ADD CONSTRAINT `nhat_ky_ma_phong_foreign` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`id`),
  ADD CONSTRAINT `nhat_ky_ma_thiet_bi_foreign` FOREIGN KEY (`ma_thiet_bi`) REFERENCES `thiet_bi` (`id`);

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
