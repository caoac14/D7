-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2023 at 10:08 AM
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
(1, 'Máy tính', '2023-01-05 07:16:19', '2023-01-05 07:16:19'),
(2, 'Bàn ghế', '2023-01-05 07:16:19', '2023-01-05 07:16:19'),
(3, 'Máy lạnh & máy chiếu', '2023-01-05 07:17:42', '2023-01-05 07:17:42'),
(4, 'Đèn', '2023-01-05 07:17:42', '2023-01-05 07:17:42'),
(5, 'Quạt', '2023-01-05 07:17:42', '2023-01-05 07:17:42');

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
(1, 'DA19TTA', '2023-01-05 07:19:27', '2023-01-05 07:19:27'),
(2, 'DA21CKA', '2023-01-05 07:19:27', '2023-01-05 07:19:27'),
(3, 'DA20TY', '2023-01-05 07:19:27', '2023-01-05 07:19:27'),
(4, 'DA19NNA', '2023-01-05 07:19:27', '2023-01-05 07:19:27'),
(5, 'DA21TTB', '2023-01-05 07:19:27', '2023-01-05 07:19:27'),
(6, 'DA19CNOT', '2023-01-05 07:19:27', '2023-01-05 07:19:27'),
(7, 'DA19TY', '2023-01-05 07:19:27', '2023-01-05 07:19:27'),
(8, 'DA20DA', '2023-01-05 07:19:27', '2023-01-05 07:19:27');

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
(10, '2022_12_07_031840_create_nhat_ky_table', 1),
(11, '2022_12_07_031841_create_nhom_thiet_bi_table', 1);

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
  `mo_ta_loi` varchar(255) DEFAULT NULL,
  `buoi` varchar(255) NOT NULL,
  `ngay` date NOT NULL,
  `ghi_chu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nhat_ky`
--

INSERT INTO `nhat_ky` (`id`, `ma_giao_vien`, `ma_phong`, `ma_lop`, `mo_ta_loi`, `buoi`, `ngay`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'gãy cánh', 'Chiều', '2023-01-05', '', '2023-01-05 00:21:06', '2023-01-05 00:21:06'),
(2, 1, 1, 6, NULL, 'Chiều', '2023-01-05', '', '2023-01-05 00:29:43', '2023-01-05 00:29:43');

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
(1, 'C71.101', '1', '2023-01-05 00:15:41', '2023-01-05 00:15:41');

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
(1, 1, 1, 'Máy tính 01', '2023-01-05 00:18:17', '2023-01-05 00:18:17'),
(2, 1, 5, 'Quạt 01', '2023-01-05 00:18:27', '2023-01-05 00:18:27'),
(3, 1, 3, 'Máy lạnh 01', '2023-01-05 00:18:42', '2023-01-05 00:18:42');

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
(1, 'Trương Quốc Huy', '', '', '', 'quochuy@gmail.com', NULL, '$2y$10$4HUWyg62zXqIr/dxbsvocOuJ5M/qw0NguUImn9FiMgNiiqKiQ3nMi', NULL, '2023-01-05 00:13:01', '2023-01-05 00:13:30');

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
  ADD KEY `nhat_ky_ma_lop_foreign` (`ma_lop`);

--
-- Indexes for table `nhom_thiet_bi`
--
ALTER TABLE `nhom_thiet_bi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nhom_thiet_bi_ma_nhat_ky_foreign` (`ma_nhat_ky`),
  ADD KEY `nhom_thiet_bi_ma_thiet_bi_foreign` (`ma_thiet_bi`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `thiet_bi`
--
ALTER TABLE `thiet_bi`
  ADD CONSTRAINT `thiet_bi_ma_loai_thiet_bi_foreign` FOREIGN KEY (`ma_loai_thiet_bi`) REFERENCES `loai_thiet_bi` (`id`),
  ADD CONSTRAINT `thiet_bi_ma_phong_foreign` FOREIGN KEY (`ma_phong`) REFERENCES `phong` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
