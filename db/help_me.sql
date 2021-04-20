-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 08:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help_me`
--

-- --------------------------------------------------------

--
-- Table structure for table `abilities`
--

CREATE TABLE `abilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'إضافة مختص', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(2, 'تعديل مختص', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(3, 'حذف مختص', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(4, 'إضافة معلم', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(5, 'تعديل معلم', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(6, 'حذف معلم', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(7, 'إضافة طالب', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(8, 'عرض طالب', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(9, 'تعديل طالب', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(10, 'حذف طالب', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(11, 'إضافة هيئة تعليمية', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(12, 'عرض هيئة تعليمية', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(13, 'تعديل هيئة تعليمية', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(14, 'حذف هيئة تعليمية', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(15, 'إضافة جلسة', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(16, 'تعديل جلسة', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(17, 'حذف جلسة', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(18, 'إضافة دفعة', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(19, 'تعديل دفعة', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(20, 'حذف دفعة', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(21, 'تقارير', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(22, 'إضافة غرامة', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(23, 'إضافة برنامج', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(24, 'تعديل برنامج', '2021-04-06 10:04:29', '2021-04-06 10:04:29'),
(25, 'حذف برنامج', '2021-04-06 10:04:29', '2021-04-06 10:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `ability_user`
--

CREATE TABLE `ability_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ability_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ability_user`
--

INSERT INTO `ability_user` (`id`, `ability_id`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, NULL, NULL),
(5, 2, 1, NULL, NULL),
(6, 3, 1, NULL, NULL),
(7, 11, 1, NULL, NULL),
(8, 12, 1, NULL, NULL),
(9, 13, 1, NULL, NULL),
(10, 15, 1, NULL, NULL),
(11, 16, 1, NULL, NULL),
(12, 23, 1, NULL, NULL),
(13, 25, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `absence`
--

CREATE TABLE `absence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `absence_days` int(11) NOT NULL DEFAULT 0,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `period_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `budgets`
--

CREATE TABLE `budgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_fees` int(11) NOT NULL,
  `actual_fees` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `remainder` int(11) NOT NULL,
  `financial_year_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `financial_years`
--

CREATE TABLE `financial_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'current',
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `issuer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2021_03_01_142225_create_programs_table', 1),
(20, '2021_03_01_142458_create_schools_table', 1),
(21, '2021_03_01_143155_create_financial_years_table', 1),
(22, '2021_03_01_143156_create_periods_table', 1),
(23, '2021_03_01_143316_create_program_school_table', 1),
(24, '2021_03_01_143433_create_students_table', 1),
(25, '2021_03_03_080229_create_period_school_table', 1),
(26, '2021_03_03_123805_create_absence_table', 1),
(27, '2021_03_13_102226_create_teachers_table', 1),
(28, '2021_03_13_104731_create_sittings_table', 1),
(29, '2021_03_16_125936_create_fines_table', 1),
(30, '2021_03_29_134151_create_abilities_table', 1),
(31, '2021_03_29_134836_create_ability_user_table', 1),
(32, '2021_04_04_222559_create_budgets_table', 1);

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
-- Table structure for table `periods`
--

CREATE TABLE `periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `financial_ratio` int(11) NOT NULL,
  `attendance_days` int(11) NOT NULL,
  `financial_year_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `period_school`
--

CREATE TABLE `period_school` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `period_id` bigint(20) UNSIGNED NOT NULL,
  `initial_value` int(11) NOT NULL DEFAULT 0,
  `deserved_value` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'التاهيل المهنى', '2021-04-09 05:55:38', '2021-04-09 05:55:38'),
(2, 'التدخل المبكر', '2021-04-09 05:55:55', '2021-04-09 05:55:55'),
(3, 'الدمج التعليمى', '2021-04-09 05:56:46', '2021-04-09 05:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `program_school`
--

CREATE TABLE `program_school` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `school_id` bigint(20) UNSIGNED NOT NULL,
  `program_price` int(11) NOT NULL,
  `program_day_price` int(11) NOT NULL DEFAULT 0,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_school`
--

INSERT INTO `program_school` (`id`, `program_id`, `school_id`, `program_price`, `program_day_price`, `start_at`, `end_at`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 10000, 27, '2021-04-09', '2022-04-09', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_english` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `fax_number` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geolocation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `general_manager` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `code`, `name`, `name_english`, `stage`, `address`, `phone_number`, `fax_number`, `email`, `type`, `license_type`, `country`, `city`, `area`, `part`, `street`, `geolocation`, `general_manager`, `created_at`, `updated_at`) VALUES
(1, '1222', 'النبراس الدولية', 'al naberas', 'المتوسطة', 'حولى النقرة', 33654411, 6541, 'mskaa@gmail.com', 'مدرسة ثنائية اللغة', 'مؤسسة تعلييمة', 'الكويت', 'مدينة الكويت', 'الفحاحيل', '12', '9', 'شرق ال س', 'فادي الحبش', '2021-04-08 07:47:23', '2021-04-08 07:47:23'),
(2, '12345', 'داليا المروة', 'dali', 'hgd', 'القادسية قطعه 3 منزل 4', 654231, 564445, 'MASD@gmail.com', '0', 'مؤسسة تعلييمة', 'اختر البلد', NULL, '221', '521', '12', 'شرق ال س', 'فادي الحبش', '2021-04-08 07:58:00', '2021-04-08 07:58:00'),
(3, '12345', 'klkjhkh', 'bhhhgj', 'hgd', 'دوار دسمان', 6564645, 45445415, 'mjk@gmail.com', 'مدرسة عربية', 'مؤسسة تعلييمة', 'الكويت', 'مدينة الكويت', '221', '12313', '321654154', 'شرق ال س', 'klsadjhnsda', '2021-04-09 05:54:16', '2021-04-09 05:54:16'),
(4, '90288', 'nahda', 'omar esmaeel', 'الابتدائية', '492  Hemlock Lane', 1124485239, 1258848745, 'omaresamel590@gmail.com', 'مركز إيواء', '23pm', 'عمان', 'إبرو', 'كويت', 'كويت', 'عمارة 37 , شارع عزت النجار , من شارع جمال عبد الناصر, حرفيين السلام,القاهرة', '2 شارع احمد', 'أحمد محمد', '2021-04-09 09:03:21', '2021-04-09 09:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `sittings`
--

CREATE TABLE `sittings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_national_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disability_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `disability_power` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendance_begin` date NOT NULL,
  `attendance_end` date NOT NULL,
  `ministry_nomination` tinyint(1) NOT NULL DEFAULT 0,
  `school_nomination` tinyint(1) NOT NULL DEFAULT 0,
  `program_school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `national_number`, `guardian_name`, `guardian_national_number`, `email`, `disability_type`, `disability_power`, `report_type`, `section`, `attendance_begin`, `attendance_end`, `ministry_nomination`, `school_nomination`, `program_school_id`, `created_at`, `updated_at`) VALUES
(1, 'فريد جمعه', '125460123450', 'جمعه عبده', '54453216363526', 'mbarakat@gmail.com', 'توحد', 'ضعيف', 'عادي', '25', '2021-04-01', '2021-04-30', 1, 1, NULL, '2021-04-08 07:42:22', '2021-04-08 07:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entity_acceptance_number` int(11) NOT NULL,
  `entity_acceptance_date` date NOT NULL,
  `birth_day` date NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `position`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@help.com', '$2y$10$.Kbop7tCRdaUkgi77g2wG.OdRDCCUjNWzmI1QZbHPOMEaFXsbCSHa', NULL, NULL, 'admin', '2021-04-06 10:04:29', '2021-04-06 10:04:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ability_user`
--
ALTER TABLE `ability_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ability_user_ability_id_foreign` (`ability_id`),
  ADD KEY `ability_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absence_student_id_foreign` (`student_id`),
  ADD KEY `absence_period_id_foreign` (`period_id`);

--
-- Indexes for table `budgets`
--
ALTER TABLE `budgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budgets_financial_year_id_foreign` (`financial_year_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `financial_years`
--
ALTER TABLE `financial_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fines_school_id_foreign` (`school_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `periods_financial_year_id_foreign` (`financial_year_id`);

--
-- Indexes for table `period_school`
--
ALTER TABLE `period_school`
  ADD PRIMARY KEY (`id`),
  ADD KEY `period_school_period_id_foreign` (`period_id`),
  ADD KEY `period_school_school_id_foreign` (`school_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_school`
--
ALTER TABLE `program_school`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_school_school_id_foreign` (`school_id`),
  ADD KEY `program_school_program_id_foreign` (`program_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `schools_name_unique` (`name`),
  ADD UNIQUE KEY `schools_name_english_unique` (`name_english`),
  ADD UNIQUE KEY `schools_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `schools_email_unique` (`email`);

--
-- Indexes for table `sittings`
--
ALTER TABLE `sittings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sittings_teacher_id_foreign` (`teacher_id`),
  ADD KEY `sittings_student_id_foreign` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_program_school_id_foreign` (`program_school_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_school_id_foreign` (`school_id`);

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
-- AUTO_INCREMENT for table `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ability_user`
--
ALTER TABLE `ability_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `budgets`
--
ALTER TABLE `budgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_years`
--
ALTER TABLE `financial_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `periods`
--
ALTER TABLE `periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `period_school`
--
ALTER TABLE `period_school`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `program_school`
--
ALTER TABLE `program_school`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sittings`
--
ALTER TABLE `sittings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ability_user`
--
ALTER TABLE `ability_user`
  ADD CONSTRAINT `ability_user_ability_id_foreign` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ability_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absence_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `budgets`
--
ALTER TABLE `budgets`
  ADD CONSTRAINT `budgets_financial_year_id_foreign` FOREIGN KEY (`financial_year_id`) REFERENCES `financial_years` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fines`
--
ALTER TABLE `fines`
  ADD CONSTRAINT `fines_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `periods`
--
ALTER TABLE `periods`
  ADD CONSTRAINT `periods_financial_year_id_foreign` FOREIGN KEY (`financial_year_id`) REFERENCES `financial_years` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `period_school`
--
ALTER TABLE `period_school`
  ADD CONSTRAINT `period_school_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `period_school_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_school`
--
ALTER TABLE `program_school`
  ADD CONSTRAINT `program_school_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `program_school_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sittings`
--
ALTER TABLE `sittings`
  ADD CONSTRAINT `sittings_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sittings_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_program_school_id_foreign` FOREIGN KEY (`program_school_id`) REFERENCES `program_school` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_school_id_foreign` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
