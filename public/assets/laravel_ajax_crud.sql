-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 06:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ajax_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE `employee_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_full_name` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_phone` varchar(255) NOT NULL,
  `emp_gender` varchar(255) NOT NULL,
  `emp_username` varchar(255) NOT NULL,
  `emp_password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_master`
--

INSERT INTO `employee_master` (`id`, `emp_full_name`, `emp_email`, `emp_phone`, `emp_gender`, `emp_username`, `emp_password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Sanvi Verma', 'sanvi45@gmail.com', '9665874856', 'F', 'sanvi23@fht', '$2y$10$NtHw5ADk2C3GV3zwgae3XOiUlW019CqnkiqPMCXCbGQWgJ9F..9nO', '2025-02-04 05:04:34', '2025-02-04 07:04:34', NULL),
(3, 'Nikita Gandhi', 'nikita123@gmail.com', '06268172728', 'F', 'nikita@45', '$2y$10$U5.0o0yBFEHI0bCJSoEVJ.SQTJ.VgyQvPgWI7T3PMamg8kJe6sIti', '2025-02-04 07:05:45', '2025-02-04 09:15:05', '2025-02-04 09:15:05'),
(4, 'xyz', 'xyz@gmail.com', '06268172728', 'F', 'admin@23', '$2y$10$TyyCVk2cdJW2KnxmdQHXFeuJOhzPgBahMpaFBB2RCK3q9fW1lp.4S', '2025-02-04 07:42:51', '2025-02-04 08:52:39', '2025-02-04 08:52:39'),
(5, 'Shalin Shekh', 'shalin1235@gmail.com', '9669854758', 'M', 'sekhshalin@234', '$2y$10$QB25nKlPLOuTwuoxPwaZy.0HTFgVAadbysLdOUU1qye9bvguz5ape', '2025-02-05 13:26:15', '2025-02-05 13:26:44', NULL);

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
(5, '2025_01_19_221422_create_employee_master_table', 1),
(6, '2025_01_21_045006_create_student_master_table', 1),
(7, '2025_01_21_234510_add_student_dob_to_student_master', 1);

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
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_phone` varchar(255) NOT NULL,
  `student_dob` varchar(255) NOT NULL,
  `student_profile` varchar(255) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_course_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`id`, `student_name`, `student_email`, `student_phone`, `student_dob`, `student_profile`, `student_address`, `student_course_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nimrit Kaur', 'nimrit@gmail.com', '6268172728', '2025-01-21', '1738733501.png', 'Raipur', 'B.tech', '2025-01-22 15:28:34', '2025-02-05 13:32:06', '2025-02-05 13:32:06'),
(2, 'Ishani Dewngan', 'dewanganishani3@gmail.com', '9826817272', '2025-01-01', '1738714731.png', 'Birgaon', 'Commerce', '2025-01-23 12:45:35', '2025-02-05 08:18:51', NULL),
(4, 'Nishant', 'nishant23@gmail.com', '6985475896', '2025-01-24', '1737666234.jpg', 'bhilai', 'B.tech', '2025-01-24 04:46:49', '2025-01-24 05:03:54', NULL),
(5, 'nikita', 'niki@gmail.com', '6268172728', '2025-01-24', 'assets/uploads/students_profile//tXf9y3ZKD7Kokb6HJM9OvxE8zPeNCjF8s7ebg6GG.jpg', 'bilaspur', 'B.tech', '2025-01-24 04:58:20', '2025-01-24 04:58:20', NULL),
(6, 'ajax name', 'ajax@gmail.com', '1234567895', '2025-01-24', 'assets/uploads/students_profile//BkhHgX4lAu7KlHbWQjtmJ3NbbgXuqCCegJ8xVyT3.jpg', 'bhilai', 'B.tech', '2025-01-24 05:02:34', '2025-02-05 07:44:44', '2025-02-05 07:44:44'),
(7, 'Nidhi Sahu', 'nidhi12t@gmail.com', '06268172784', '2025-01-27', 'assets/uploads/students_profile//LZDRikyIwjAloGhr1JWH7p5SiU8yMcJ2NrTgqbSU.jpg', 'Jora, Raipur', 'B.tech', '2025-02-04 04:22:54', '2025-02-04 04:22:54', NULL),
(8, 'Ritik Shah', 'ritikshah@gmail.com', '9954876258', '2025-02-05', 'assets/uploads/students_profile//MamzoqTTiDqBzcSN1UlRXqyyFDFQ5vYivBFOgwfj.png', 'Mahadev Ghat, Raipur', 'B.tech', '2025-02-05 07:53:38', '2025-02-05 07:53:38', NULL),
(9, 'JYOTI SEN', 'sw23w@gmail.com', '06268172728', '2025-02-05', 'assets/uploads/students_profile//NiAWv8dDodR2fYpn4WjGflRfsodtm7nFr6PCgjQE.png', 'Birgaon', 'B.tech', '2025-02-05 08:17:57', '2025-02-05 08:17:57', NULL),
(10, 'Mahira Khan', 'mahirak123@gmail.com', '6268574859', '2020-06-20', 'assets/uploads/students_profile//ff5brtAMDpDwczDotA7YsUAE1fKvoJHlgNEGKyVQ.png', 'Sarona, Raipur', 'B.tech', '2025-02-05 13:28:01', '2025-02-05 13:28:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_master`
--
ALTER TABLE `employee_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_master_emp_email_unique` (`emp_email`),
  ADD UNIQUE KEY `employee_master_emp_username_unique` (`emp_username`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
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
-- AUTO_INCREMENT for table `employee_master`
--
ALTER TABLE `employee_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_master`
--
ALTER TABLE `student_master`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
