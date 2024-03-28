-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 28, 2024 lúc 09:08 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `school.com`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `challenge`
--

CREATE TABLE `challenge` (
  `id` int(11) NOT NULL,
  `challenge_date` date DEFAULT NULL,
  `challenge_file` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: is not deleted\r\n1: is deleted\r\n1: ',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `challenge`
--

INSERT INTO `challenge` (`id`, `challenge_date`, `challenge_file`, `description`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, '2024-03-29', 'Challenge1.txt', '<p>This is Challenge1</p>', 0, '2024-03-28', '2024-03-28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not read\r\n1: read',
  `created_date` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chat`
--

INSERT INTO `chat` (`id`, `sender_id`, `receiver_id`, `message`, `file`, `status`, `created_date`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'a', NULL, 1, 1711450577, '2024-03-26 10:56:17', '2024-03-28 07:35:48'),
(3, 1, 3, 'hi', NULL, 1, 1711451071, '2024-03-26 11:04:31', '2024-03-28 07:35:48'),
(4, 7, 1, 'hi', NULL, 1, 1711522486, '2024-03-27 06:54:46', '2024-03-28 03:01:48'),
(5, 1, 7, 'Hello teacher 4 im teacher1', NULL, 0, 1711522585, '2024-03-27 06:56:25', '2024-03-27 09:29:27'),
(6, 1, 7, 'hello', NULL, 0, 1711523349, '2024-03-27 07:09:09', '2024-03-27 09:29:27'),
(7, 1, 7, 'How r u', NULL, 0, 1711523778, '2024-03-27 07:16:18', '2024-03-27 09:29:27'),
(8, 1, 7, 'Just test', NULL, 0, 1711524118, '2024-03-27 07:21:58', '2024-03-27 09:29:27'),
(9, 7, 1, 'h', NULL, 1, 1711530496, '2024-03-27 09:08:16', '2024-03-28 03:01:48'),
(14, 1, 7, 'nanana', NULL, 0, 1711531976, '2024-03-27 09:32:56', '2024-03-27 09:32:56'),
(17, 1, 7, 'a', NULL, 0, 1711532170, '2024-03-27 09:36:10', '2024-03-27 09:36:10'),
(18, 1, 3, 'b', NULL, 1, 1711532181, '2024-03-27 09:36:21', '2024-03-28 07:35:48'),
(21, 1, 6, 'Hi bro', NULL, 0, 1711539728, '2024-03-27 11:42:08', '2024-03-27 11:42:08'),
(22, 1, 2, 'hi student', NULL, 1, 1711539856, '2024-03-27 11:44:16', '2024-03-28 07:36:11'),
(23, 2, 1, 'hi teacher', NULL, 1, 1711539877, '2024-03-27 11:44:37', '2024-03-28 03:01:45'),
(24, 3, 1, 'yeah', NULL, 1, 1711539988, '2024-03-27 11:46:28', '2024-03-28 03:01:44'),
(25, 1, 3, 'hi', NULL, 1, 1711540028, '2024-03-27 11:47:08', '2024-03-28 07:35:48'),
(26, 3, 1, 'hello', NULL, 1, 1711540038, '2024-03-27 11:47:18', '2024-03-28 03:01:44'),
(27, 1, 2, 'hello', NULL, 1, 1711540051, '2024-03-27 11:47:31', '2024-03-28 07:36:11'),
(28, 1, 3, 'yes', NULL, 1, 1711540072, '2024-03-27 11:47:52', '2024-03-28 07:35:48'),
(29, 3, 1, 'a', NULL, 1, 1711540093, '2024-03-27 11:48:13', '2024-03-28 03:01:44'),
(30, 3, 1, 'Helo bro', NULL, 1, 1711590651, '2024-03-28 01:50:51', '2024-03-28 03:01:44'),
(31, 1, 3, 'yo bro', NULL, 1, 1711590668, '2024-03-28 01:51:08', '2024-03-28 07:35:48'),
(32, 3, 1, 'a', NULL, 1, 1711591215, '2024-03-28 02:00:15', '2024-03-28 03:01:44'),
(33, 1, 2, 'yeah yeah', NULL, 1, 1711592756, '2024-03-28 02:25:56', '2024-03-28 07:36:11'),
(34, 1, 2, 'he', '20240328022830ru9bddc6sdwbs6yysdso.jpg', 1, 1711592910, '2024-03-28 02:28:30', '2024-03-28 07:36:11'),
(35, 3, 1, '1 2 3 4 5 6', NULL, 1, 1711594921, '2024-03-28 03:02:01', '2024-03-28 03:04:22'),
(36, 3, 1, 'yeah yeah', NULL, 1, 1711595108, '2024-03-28 03:05:08', '2024-03-28 03:05:09'),
(37, 3, 1, '1', NULL, 1, 1711595113, '2024-03-28 03:05:13', '2024-03-28 03:05:21'),
(38, 3, 1, '2', NULL, 1, 1711595115, '2024-03-28 03:05:15', '2024-03-28 03:05:21'),
(39, 3, 1, 'what', NULL, 0, 1711611363, '2024-03-28 07:36:03', '2024-03-28 07:36:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `homework`
--

CREATE TABLE `homework` (
  `id` int(11) NOT NULL,
  `homework_date` date DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT 0 COMMENT '0: is not delete\r\n1: is deleted',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `homework`
--

INSERT INTO `homework` (`id`, `homework_date`, `submission_date`, `document_file`, `description`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, '2024-03-22', '2024-03-22', 'otp8n6iyy3atgagw3non.pdf', 'No des 1', 1, '2024-03-22', '2024-03-22'),
(3, '2024-03-22', '2024-03-22', 'Bài_Thực_Hành_02-Nguyễn_Đình_Đông-B21DCAT065.pdf', '<p><font face=\"Segoe UI\"><span style=\"font-family: &quot;Times New Roman&quot;;\">Haha</span></font></p>', 0, '2024-03-22', '2024-03-22'),
(4, '2024-03-31', '2024-03-31', 'Bai tap so 2.txt', '<p>Day la bai tap so 2</p><p><br></p>', 0, '2024-03-25', '2024-03-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `homework_submit`
--

CREATE TABLE `homework_submit` (
  `id` int(11) NOT NULL,
  `homework_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `document_file` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `homework_submit`
--

INSERT INTO `homework_submit` (`id`, `homework_id`, `student_id`, `description`, `document_file`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '<p>Ye</p>', '123.pdf', '2024-03-22', '2024-03-22'),
(2, 3, 2, '<p>123</p>', '123.pdf', '2024-03-25', '2024-03-25'),
(3, 4, 2, '<p>nop bai tap so 2</p>', 'Nop bai tap so 2.txt', '2024-03-25', '2024-03-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:active\r\n1:inactive',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: not deleted\r\n1: deleted',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`id`, `name`, `type`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Bai 1', 'Practical', 0, 0, '2024-03-18 09:47:21', '2024-03-18 10:15:47'),
(2, 'Bai 2', 'Contest', 0, 1, '2024-03-18 10:05:13', '2024-03-18 10:18:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT 2 COMMENT '1:teacher, 2:student',
  `is_delete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0:not deleted\r\n1: deleted',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: acitve\r\n1: inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `profile_pic`, `email_verified_at`, `password`, `remember_token`, `user_type`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, 'teacher1', 'teacher1@gmail.com', '1234567891', 'ljmb6eff1q1syig89mxy.jpg', NULL, '$2y$12$3ucDpvPv1wjXrNag4y7aROCBNl4H7o1LVXJ2GXE5LgTjUlIEAJHl6', 'E9QYDQLOmn1B5PInrtOavPeBA3YxFRcNqbE7GbiD1qArAc07wxDSmDG0UxGY', 1, 0, 0, '2024-03-14 07:57:45', '2024-03-28 00:37:13'),
(2, 'Student1', 'student1@gmail.com', '5234342345', 'yinwrhnwrcvrfvowhymn.jpg', NULL, '$2y$12$QVx5RjofhqtMsKTluSOb.uQzFB8V4JKeMbD.eb1qcXOdkZUj0quTO', '2NbuwrWGjlAgdgmXRhuMlWoZbh9Yxj99J1dkJyxuMzNrqSExPn9tKgti7bQu', 2, 0, 0, '2024-03-14 07:57:45', '2024-03-28 00:36:14'),
(3, 'teacher2', 'teacher2@gmail.com', '987654321', '20240328073103pxfmebipbu5oxy3kp8xv.jpg', NULL, '$2y$12$wuuVkW0FdEqNuEhJgWVlA.RsXZpFzdBBInXnRIns6K0C4sZkYhrwy', NULL, 1, 0, 0, '2024-03-17 23:51:13', '2024-03-28 00:36:33'),
(4, 'teacher3', 'teacher3@gmail.com', '1234567890', '3rq9d0qrez1nr9xtkoet.jpg', NULL, '$2y$12$QVx5RjofhqtMsKTluSOb.uQzFB8V4JKeMbD.eb1qcXOdkZUj0quTO', NULL, 1, 0, 0, '2024-03-18 01:11:00', '2024-03-26 02:34:22'),
(5, 'student2', 'student2@gmail.com', '12345', 'ycifpmecljp54c3duvm3.jpg', NULL, '$2y$12$JZ8A/oXxKYRJvS27uQOsRO6JwNzahje.sciLo8Rceb8348aSzUZLu', NULL, 2, 0, 0, '2024-03-19 02:57:39', '2024-03-28 00:39:08'),
(6, 'student3', 'student3@gmail.com', '123333344', 'gnnxuxt3u9rjrjzvaxir.jpg', NULL, '$2y$12$QVx5RjofhqtMsKTluSOb.uQzFB8V4JKeMbD.eb1qcXOdkZUj0quTO', NULL, 2, 0, 0, '2024-03-19 03:11:15', '2024-03-20 20:00:47'),
(7, 'teacher4', 'teacher4@gmail.com', '11111', 'a81fvfmcjnlm3ynnrq8i.jpg', NULL, '$2y$12$QVx5RjofhqtMsKTluSOb.uQzFB8V4JKeMbD.eb1qcXOdkZUj0quTO', NULL, 1, 0, 0, '2024-03-20 20:33:02', '2024-03-20 20:33:02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `homework_submit`
--
ALTER TABLE `homework_submit`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `challenge`
--
ALTER TABLE `challenge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `homework`
--
ALTER TABLE `homework`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `homework_submit`
--
ALTER TABLE `homework_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
