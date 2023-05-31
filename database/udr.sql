-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 31, 2023 at 10:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udr`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `department_id`) VALUES
(1, 'BSc. LMV', 4),
(2, 'BSc. REFI', 3),
(3, 'BSc. PFM', 4),
(4, 'BSc. AF', 3),
(5, 'BSc. GM', 2),
(6, 'BSc. GIS & RS', 2),
(7, 'BSc. CSN', 1),
(8, 'BSc. ISM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`) VALUES
(1, 'Computer systems and Mathematics'),
(2, 'Geospatial Sciences and Technology'),
(3, 'Business Studies (DBS)'),
(4, 'Land Management and Valuation');

-- --------------------------------------------------------

--
-- Table structure for table `dissertations`
--

CREATE TABLE `dissertations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `abstract` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unverified, 1=verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dissertations`
--

INSERT INTO `dissertations` (`id`, `student_id`, `supervisor_id`, `title`, `abstract`, `document`, `year`, `created_at`, `updated_at`, `status`) VALUES
(7, 21, 24, 'Moorine Aron', 'Ut eos, dolor sed vo. ttsyaysyasyuaysyuaysyuayusyuas', '647478fad332b_6474670476eb1_Network-Virtualization-For-Dummies (1).pdf', 2019, '2023-05-29 05:52:43', '2023-05-29 10:45:24', 1),
(8, 21, 24, 'Nobis eveniet verit', 'Ut eos, dolor sed vo. ttsyaysyasyuaysyuaysyuayusyuas', '64747381a8649_6474670476eb1_Network-Virtualization-For-Dummies.pdf', 2019, '2023-05-29 06:42:25', '2023-05-29 10:33:36', 1),
(9, 21, 25, 'Maajabu', 'Ut eos, dolor sed vo. ttsyaysyasyuaysyuaysyuayusyuas', '6474739cc36a0_6474670476eb1_Network-Virtualization-For-Dummies (1).pdf', 2019, '2023-05-29 06:42:52', '2023-05-31 05:17:28', 1),
(10, 43, 16, 'Ad nemo totam nesciu', 'Dolores qui autem se. ggsgsgsggsgsgsggs', '6476fbfc88b15_6474777889d4b_6474670476eb1_Network-Virtualization-For-Dummies (1).pdf', 2016, '2023-05-31 04:49:16', '2023-05-31 04:49:16', 0);

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
(5, '2023_05_06_092624_create_dissertations_table', 1),
(6, '2023_05_06_093051_create_departments_table', 1),
(7, '2023_05_06_093122_create_courses_table', 1),
(8, '2023_05_29_073900_add_status_to_dissertations_table', 2),
(9, '2023_05_29_143213_add_phone_to_users_table', 3);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course_id` tinyint(4) DEFAULT NULL,
  `department_id` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 2 COMMENT '0=coordinator, 1=supervisor, 2=student',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `course_id`, `department_id`, `password`, `role_as`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'Theodore', 'Dodson', 'rybak@mailinator.com', 6, 2, '$2y$10$V8RFAFmCnJhPhlI5P/ZBdu0P.VgbbaAPAVS/PvuMU7X2kV/oruwKO', 0, NULL, NULL, '2023-05-06 09:36:42', '2023-05-06 09:36:42', NULL),
(2, 'Teagan', 'Pope', 'sivehylus@mailinator.com', 3, 2, '$2y$10$0QKLiM.Z0Cha1lkbKHs2wOvp8yjofAcf72M7NoeNqHDYEYp4JmoXW', 0, NULL, NULL, '2023-05-06 09:41:05', '2023-05-06 09:41:05', NULL),
(3, 'Demetrius', 'Sims', 'fizoxyjik@mailinator.com', 6, 2, '$2y$10$EcbvbKI78IeIRQb2/.VZDOZLVb92JWLLfkixVpcq9WUdwYmhayWte', 2, NULL, NULL, '2023-05-06 09:52:15', '2023-05-06 09:52:15', NULL),
(4, 'Sheila', 'Hull', 'ralew@mailinator.com', 4, 1, '$2y$10$zI988mR1hRez.TUTYceOKuQJUgqOmT9GHPR1aIutRmYb6sl7gw.sG', 2, NULL, NULL, '2023-05-06 09:53:11', '2023-05-06 09:53:11', NULL),
(5, 'Kaye', 'Bennett', 'gulido@mailinator.com', 2, 3, '$2y$10$icZx4BvO/IYcz8rcTXktqewpAccuPyPtYlOMKaU1ecx5rAPnbr9uC', 2, NULL, NULL, '2023-05-06 09:56:01', '2023-05-06 09:56:01', NULL),
(6, 'Astra', 'Salazar', 'gyjidimy@mailinator.com', 6, 2, '$2y$10$p0DnmadFK3VQkg269ljx1uLm71EnCuKUoUm6hPqAxAYe62TiWfpzS', 2, NULL, NULL, '2023-05-06 09:57:37', '2023-05-06 09:57:37', NULL),
(7, 'Zelda', 'Griffin', 'pihybu@mailinator.com', 8, 3, '$2y$10$ulgKgE2MDh5oZFbmZ1dNLeVxfAHRDHjYt/fpOC2z/imu4fAcM5iyq', 2, NULL, NULL, '2023-05-06 09:59:13', '2023-05-06 09:59:13', NULL),
(8, 'Lester', 'Holland', 'qehopaxomy@mailinator.com', 2, 2, '$2y$10$QKjcpPDwAWtU6cK392tIi.VDxxSocuTa4/Jz8N9uxVP.WCdLcSqDa', 2, NULL, NULL, '2023-05-06 10:01:47', '2023-05-06 10:01:47', NULL),
(9, 'Kylie', 'Herring', 'wyki@mailinator.com', 4, 3, '$2y$10$f4QCguVTZpPjIUz0fa4bEO8kIKqOceSNfGmFq4mp4U4hj10QH4Pni', 2, NULL, NULL, '2023-05-06 10:02:33', '2023-05-06 10:02:33', NULL),
(10, 'Jermaine', 'Gilmore', 'lalyhe@mailinator.com', 3, 2, '$2y$10$R5/H9gW98OMltrblT4Rlh.FUYzOql.ohC45N90oKCdD7/pdag4W9e', 2, NULL, NULL, '2023-05-06 10:03:20', '2023-05-06 10:03:20', NULL),
(11, 'Shaeleigh', 'Patel', 'wytaj@mailinator.com', 7, 3, '$2y$10$1YsPrbm0CXlQKLEtN/rzHu5SdQ0dShl.we3w7JBXfSKwnyPJUjNHi', 2, NULL, NULL, '2023-05-06 11:31:56', '2023-05-06 11:31:56', NULL),
(12, 'Adrian', 'Brennan', 'lypopedu@mailinator.com', 8, 2, '$2y$10$eL5OVFj0Vgpo57dsefk4iu1K62S/4u9LDzhr2pwCI/wz/vFzn3/hu', 2, NULL, NULL, '2023-05-06 12:12:57', '2023-05-06 12:12:57', NULL),
(15, 'meshack', 'mtweve', 'meshackmtweve13@gmail.com', 1, 1, '$2y$10$Y5TXvS82/ykk.0o26ulbN.9IZjZcyOO1JU3aEAtEZUPHQ3zA5eTH2', 1, NULL, NULL, '2023-05-11 04:06:58', '2023-05-29 13:32:04', '0623344513'),
(16, 'Ivy', 'Simpson', 'lilian@gamil.com', 6, 1, '$2y$10$fFskcCgTtfmsdv4RWVjsruu5297nAzDLAV1vOh164PIN0a6To6k7a', 1, NULL, NULL, '2023-05-18 20:48:39', '2023-05-18 20:48:39', NULL),
(17, 'Walter', 'Ramirez', 'farogyxibu@mailinator.com', 7, 1, '$2y$10$/fIji5IfyECyjsQiIhxSJOFH7eOmWRKBePrBxQ4x17CpUkDWeAAEy', 2, NULL, NULL, '2023-05-19 03:19:56', '2023-05-19 03:19:56', NULL),
(18, 'Lavinia', 'Wells', 'gybyfaqi@mailinator.com', 8, 1, '$2y$10$Gd1P5NrV3De4g/3hi45wOO4nWFMIeQ6P.ZVXt5PUMY2LysQ9.VGUS', 2, NULL, NULL, '2023-05-19 09:43:19', '2023-05-19 09:43:19', NULL),
(19, 'meshack', 'mtweve', 'admin@gmail.com', 1, 2, '$2y$10$/hDg3LNySyPm2baVHdVxPOK2NCC962REkeMZpvfXVEOmeKwTlvVye', 2, NULL, NULL, '2023-05-27 08:15:23', '2023-05-27 08:15:23', NULL),
(20, 'Stella', 'Knox', 'cymekery@mailinator.com', 8, 1, '$2y$10$VGzD5pEuOSyfDKn99Baek.FVRjhuxgIOws6UF1rNxn2H0FpoZprWS', 2, NULL, NULL, '2023-05-29 02:39:52', '2023-05-29 02:39:52', NULL),
(21, 'Harlan', 'Doyle', 'qopyviw@mailinator.com', 7, 1, '$2y$10$couWA2ndRSqgWkEXjtAu6u3xbGLL6YPhY3hMybC/xIiNJIlhCjDOm', 2, NULL, NULL, '2023-05-29 02:43:52', '2023-05-29 02:43:52', NULL),
(22, 'supervisor', 'one', 'towuzalaf@mailinator.com', 4, 4, '$2y$10$zT0YQipb.ofjl8levnKGBOY3pyTYFt9QIh1ZaxiW3fUebyNHE2fb.', 2, NULL, NULL, '2023-05-29 08:00:22', '2023-05-29 08:00:22', NULL),
(23, 'supervisor', 'one', 'viwabyto@mailinator.com', 4, 1, '$2y$10$cIibN8gpwqxtLVSOG94OzubSepj59az.fexept/CwZg77z8jBgNXe', 2, NULL, NULL, '2023-05-29 08:01:10', '2023-05-29 08:01:10', NULL),
(24, 'super', 'two', 'supertwo@gmail.com', 7, 3, '$2y$10$wrc.KB3zbmbhOPZa6/Hie.mTOlOtjd0CexaRza15jd2eN66FPdNKm', 1, NULL, NULL, '2023-05-29 08:01:54', '2023-05-29 08:01:54', NULL),
(25, 'super', 'two', 'superone@gmail.com', 4, 2, '$2y$10$lgpSxKX5Z3kiOKyDpm/M7OvVHgoiFFDV.h6KhRFF5d5C9Dhq1jciG', 1, NULL, NULL, '2023-05-29 08:03:31', '2023-05-29 08:03:31', NULL),
(26, 'meshack', 'mtweve', 'coodinator1@gmail.com', 8, 4, '$2y$10$1GyEkfDreiOr4j37dX/t4.36uKF5WXz7twQoAVCGZ79sttBNay6/G', 0, NULL, NULL, '2023-05-29 11:58:49', '2023-05-29 11:58:49', NULL),
(27, 'meshack', 'mtweve', 'coodinator2@gmail.com', 7, 4, '$2y$10$gXlNlqF7rLZPofG8qQpCauUnH3XQuzXkCqQUuhDrRj4/E4zSEF9nW', 0, NULL, NULL, '2023-05-29 12:02:15', '2023-05-29 12:02:15', NULL),
(28, 'Yoko', 'Ramirez', 'kokutexo@mailinator.com', NULL, 2, '$2y$10$j3SdybSeXFMfqu/75Kwh3Osmj3Z8uWdh/Q7SSWz.8ph2A.qMns2eu', 2, NULL, NULL, '2023-05-29 12:40:11', '2023-05-29 12:40:11', NULL),
(29, 'Quin', 'Lynch', 'tysiverin@mailinator.com', NULL, 4, '$2y$10$oelclyaQX/uFD3rBxRmLOOZLBVy1bMWSbmb8XOFsXUkT/8gyvrPi6', 2, NULL, NULL, '2023-05-29 12:48:29', '2023-05-29 12:48:29', NULL),
(30, 'Igor', 'Hines', 'jahidy@mailinator.com', NULL, 4, '$2y$10$LUCZWL3zvnt/6QuUTpqg0.392TypxEV5GjvykzbVJPZIqbB8lglEa', 2, NULL, NULL, '2023-05-29 12:48:43', '2023-05-29 12:48:43', NULL),
(31, 'Kim', 'Washington', 'novavero@mailinator.com', NULL, 4, '$2y$10$tSAfZDlz9X5hYStUOJDP1Ozh./bsn48KKyQODWvHWfl9GFoW4uXyK', 2, NULL, NULL, '2023-05-29 12:51:26', '2023-05-29 12:51:26', NULL),
(32, 'Cody', 'Stokes', 'rajegysi@mailinator.com', NULL, 4, '$2y$10$v1DTqrHnOL4/aSho5IgUPue.UxRyEygxYK.9MQkU0kY7d6kDSNEeW', 2, NULL, NULL, '2023-05-29 12:52:32', '2023-05-29 12:52:32', NULL),
(33, 'Rinah', 'Rutledge', 'durezy@mailinator.com', NULL, 4, '$2y$10$Yf87/Jcvcm23YQ4kDw//8eIF6zPjPREhcphfkiukhtmwyHaPXC4ue', 2, NULL, NULL, '2023-05-29 12:54:25', '2023-05-29 12:54:25', NULL),
(34, 'Leroy', 'Wilkins', 'nuvywafa@mailinator.com', NULL, 4, '$2y$10$NAfpRM7/sxW.DLUcE26XBuIRXDE7xPz19reSpjw1mGTxpN3PNod52', 2, NULL, NULL, '2023-05-29 12:55:16', '2023-05-29 12:55:16', NULL),
(35, 'Martena', 'Morales', 'qokycapef@mailinator.com', NULL, 4, '$2y$10$1/I5AV9d/6pFfnj7mKpK/u5JjLvffYX0SeJeAmejtcNBspwlWaZlG', 2, NULL, NULL, '2023-05-29 12:59:32', '2023-05-29 12:59:32', NULL),
(37, 'Mesayah', 'Herring', 'tube@mailinator.com', NULL, 4, '$2y$10$dRu6vikOL3EPvSR6t3LmmeRc.weGRG2GSoTHDqfcttBXJ5zt9WKwi', 1, NULL, NULL, '2023-05-29 13:02:18', '2023-05-29 13:02:18', NULL),
(38, 'Brock', 'Jenkins', 'zavofusi@mailinator.com', NULL, 4, '$2y$10$PWCEhX8C/PuVKeayXz02dOOaqluSd4POnC6O0m6f3YqTT/DRVIRl.', 1, NULL, NULL, '2023-05-29 13:03:27', '2023-05-29 13:03:27', NULL),
(39, 'Cyrus', 'Robles', 'dyrireqyke@mailinator.com', NULL, 4, '$2y$10$s0Vx.moFtYHQQZaqxIKz3uox87kjYI6lve/zx8BjI4WcvK2SnruBW', 1, NULL, NULL, '2023-05-29 13:24:43', '2023-05-29 13:24:43', NULL),
(42, 'Blossom', 'Hess', 'fysicide@mailinator.com', 1, 1, '$2y$10$C5rggJbIISw46nfsOAJT5eYkYmsWqrMAYAV3zDhbh/T2OJH6R3.dq', 2, NULL, NULL, '2023-05-31 04:27:06', '2023-05-31 04:27:06', NULL),
(43, 'Zelda', 'Payne', 'coja@mailinator.com', 1, 1, '$2y$10$C9IpOor32IZSBPR1xRldu.re/Tv8Vs5e7jDqzlz.h0gnv1j4w4cPe', 2, NULL, NULL, '2023-05-31 04:48:23', '2023-05-31 04:48:23', NULL),
(44, 'meshack', 'mtweve', 'meshackmtweve@gmail.com', NULL, 4, '$2y$10$0BBC5n1Q0D4pp09OyP72tOb903fq1x/hc9O.hFEWXMmHy9xOCdETy', 1, NULL, NULL, '2023-05-31 05:15:23', '2023-05-31 05:15:23', '0623344513');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dissertations`
--
ALTER TABLE `dissertations`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dissertations`
--
ALTER TABLE `dissertations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
