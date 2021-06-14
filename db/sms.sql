-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2021 at 02:35 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `student_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`, `parent_id`, `student_id`) VALUES
(1, 'gradelevel', 'admin has created grade level', 'App\\Models\\GradeLevel', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Grade 1\",\"description\":\"g1\"}}', NULL, '2021-06-08 08:44:20', '2021-06-08 08:44:20', NULL, NULL),
(2, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"munar@mailinator.com\"}}', NULL, '2021-06-08 08:45:16', '2021-06-08 08:45:16', NULL, NULL),
(3, 'user', 'admin has created user', 'App\\Models\\User', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Parent John\",\"email\":\"parent@gmail.com\"}}', NULL, '2021-06-08 08:46:44', '2021-06-08 08:46:44', NULL, NULL),
(4, 'parent', 'Parent John has sent a payment', 'App\\Models\\ParentPayment', 'created', 1, 'App\\Models\\User', 2, '{\"attributes\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 08:48:03', '2021-06-08 08:48:03', 1, 1),
(5, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 08:48:31', '2021-06-08 08:48:31', 1, 1),
(6, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 08:49:12', '2021-06-08 08:49:12', 1, 1),
(7, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 08:50:12', '2021-06-08 08:50:12', 1, 1),
(8, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 08:53:33', '2021-06-08 08:53:33', 1, 1),
(9, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 08:56:01', '2021-06-08 08:56:01', 1, 1),
(10, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 08:57:25', '2021-06-08 08:57:25', 1, 1),
(11, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 08:58:17', '2021-06-08 08:58:17', 1, 1),
(12, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 08:59:17', '2021-06-08 08:59:17', 1, 1),
(13, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 09:00:47', '2021-06-08 09:00:47', 1, 1),
(14, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 09:01:58', '2021-06-08 09:01:58', 1, 1),
(15, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 09:02:40', '2021-06-08 09:02:40', 1, 1),
(16, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 09:03:26', '2021-06-08 09:03:26', 1, 1),
(17, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 09:04:20', '2021-06-08 09:04:20', 1, 1),
(18, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 09:04:57', '2021-06-08 09:04:57', 1, 1),
(19, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 09:05:42', '2021-06-08 09:05:42', 1, 1),
(20, 'parent', 'Parent John has sent a payment', 'App\\Models\\ParentPayment', 'created', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 09:41:21', '2021-06-08 09:41:21', 1, 1),
(21, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 09:42:04', '2021-06-08 09:42:04', 1, 1),
(22, 'parent', 'admin has sent a payment', 'App\\Models\\ParentPayment', 'updated', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"parent_id\":1,\"student_id\":1},\"old\":{\"parent_id\":1,\"student_id\":1}}', NULL, '2021-06-08 09:43:33', '2021-06-08 09:43:33', 1, 1),
(23, 'user', 'admin has created user', 'App\\Models\\User', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Ace Manalo\",\"email\":\"student@gmail.com\"}}', NULL, '2021-06-08 09:45:47', '2021-06-08 09:45:47', NULL, NULL),
(24, 'gradelevel', 'admin has created grade level', 'App\\Models\\GradeLevel', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Grade 2\",\"description\":\"g2\"}}', NULL, '2021-06-09 00:30:20', '2021-06-09 00:30:20', NULL, NULL),
(25, 'gradelevel', 'admin has created grade level', 'App\\Models\\GradeLevel', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Grade 3\",\"description\":\"g3\"}}', NULL, '2021-06-09 00:30:24', '2021-06-09 00:30:24', NULL, NULL),
(26, 'gradelevel', 'admin has created grade level', 'App\\Models\\GradeLevel', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Grade 4\",\"description\":\"g4\"}}', NULL, '2021-06-09 00:30:29', '2021-06-09 00:30:29', NULL, NULL),
(27, 'gradelevel', 'admin has created grade level', 'App\\Models\\GradeLevel', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Grade 5\",\"description\":\"g5\"}}', NULL, '2021-06-09 00:30:34', '2021-06-09 00:30:34', NULL, NULL),
(28, 'gradelevel', 'admin has created grade level', 'App\\Models\\GradeLevel', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Grade 6\",\"description\":\"g6\"}}', NULL, '2021-06-09 00:30:39', '2021-06-09 00:30:39', NULL, NULL),
(29, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Winter\",\"last_name\":\"Ayers\",\"email\":\"norawudoru@mailinator.com\"}}', NULL, '2021-06-09 00:31:08', '2021-06-09 00:31:08', NULL, NULL),
(30, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Moana\",\"last_name\":\"Finch\",\"email\":\"supuxob@mailinator.com\"}}', NULL, '2021-06-09 00:31:25', '2021-06-09 00:31:25', NULL, NULL),
(31, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Chelsea\",\"last_name\":\"Fuentes\",\"email\":\"puhadotim@mailinator.com\"}}', NULL, '2021-06-09 00:31:38', '2021-06-09 00:31:38', NULL, NULL),
(32, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Wylie\",\"last_name\":\"Foreman\",\"email\":\"fiwus@mailinator.com\"}}', NULL, '2021-06-09 00:31:50', '2021-06-09 00:31:50', NULL, NULL),
(33, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Brynne\",\"last_name\":\"Holloway\",\"email\":\"nukoqax@mailinator.com\"}}', NULL, '2021-06-09 00:32:04', '2021-06-09 00:32:04', NULL, NULL),
(34, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 7, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Bryar\",\"last_name\":\"Mcintosh\",\"email\":\"cakadeqi@mailinator.com\"}}', NULL, '2021-06-09 00:32:20', '2021-06-09 00:32:20', NULL, NULL),
(35, 'teacher', 'admin has created teacher', 'App\\Models\\Teacher', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Beatrice\",\"email\":\"sigil@mailinator.com\"}}', NULL, '2021-06-09 00:59:41', '2021-06-09 00:59:41', NULL, NULL),
(36, 'user', 'admin has updated user', 'App\\Models\\User', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"admin\",\"email\":\"admin@gmail.com\"},\"old\":{\"name\":\"admin\",\"email\":\"admin@gmail.com\"}}', NULL, '2021-06-09 02:06:42', '2021-06-09 02:06:42', NULL, NULL),
(37, 'user', 'admin has updated user', 'App\\Models\\User', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"admin\",\"email\":\"admin@gmail.com\"},\"old\":{\"name\":\"admin\",\"email\":\"admin@gmail.com\"}}', NULL, '2021-06-10 01:18:16', '2021-06-10 01:18:16', NULL, NULL),
(38, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 16, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"U\",\"last_name\":\"User\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-10 07:44:29', '2021-06-10 07:44:29', NULL, NULL),
(39, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 17, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"U\",\"last_name\":\"User\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-10 07:44:29', '2021-06-10 07:44:29', NULL, NULL),
(40, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 18, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"U\",\"last_name\":\"User\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-10 07:44:29', '2021-06-10 07:44:29', NULL, NULL),
(41, 'student', 'admin has deleted student', 'App\\Models\\Student', 'deleted', 18, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"U\",\"last_name\":\"User\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-10 07:44:47', '2021-06-10 07:44:47', NULL, NULL),
(42, 'student', 'admin has deleted student', 'App\\Models\\Student', 'deleted', 17, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"U\",\"last_name\":\"User\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-10 07:44:50', '2021-06-10 07:44:50', NULL, NULL),
(43, 'student', 'admin has deleted student', 'App\\Models\\Student', 'deleted', 16, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"U\",\"last_name\":\"User\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-10 07:44:53', '2021-06-10 07:44:53', NULL, NULL),
(44, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 21, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Jhess\",\"last_name\":\"User\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-10 07:54:37', '2021-06-10 07:54:37', NULL, NULL),
(45, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 22, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Jhess\",\"last_name\":\"User\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-10 07:54:37', '2021-06-10 07:54:37', NULL, NULL),
(46, 'student', 'admin has deleted student', 'App\\Models\\Student', 'deleted', 22, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Jhess\",\"last_name\":\"User\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-10 08:05:01', '2021-06-10 08:05:01', NULL, NULL),
(47, 'student', 'admin has deleted student', 'App\\Models\\Student', 'deleted', 21, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Jhess\",\"last_name\":\"User\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-10 08:05:04', '2021-06-10 08:05:04', NULL, NULL),
(80, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Math\",\"description\":\"intro to math 1\"}}', NULL, '2021-06-11 00:36:27', '2021-06-11 00:36:27', NULL, NULL),
(81, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Science\",\"description\":\"intro to science 1\"}}', NULL, '2021-06-11 00:36:27', '2021-06-11 00:36:27', NULL, NULL),
(82, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Filipino\",\"description\":\"panimula sa wikang filipino\"}}', NULL, '2021-06-11 00:36:28', '2021-06-11 00:36:28', NULL, NULL),
(83, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 4, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"Aral Pan\",\"description\":\"Araling Panlipunan\"}}', NULL, '2021-06-11 00:36:28', '2021-06-11 00:36:28', NULL, NULL),
(88, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 61, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 00:46:46', '2021-06-11 00:46:46', NULL, NULL),
(89, 'teacher', 'admin has deleted teacher', 'App\\Models\\Teacher', 'deleted', 1, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Beatrice\",\"email\":\"sigil@mailinator.com\"}}', NULL, '2021-06-11 01:48:40', '2021-06-11 01:48:40', NULL, NULL),
(90, 'teacher', 'admin has created teacher', 'App\\Models\\Teacher', 'created', 2, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Teacher\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-11 01:49:41', '2021-06-11 01:49:41', NULL, NULL),
(91, 'teacher', 'admin has created teacher', 'App\\Models\\Teacher', 'created', 3, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Teacher\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-11 01:49:41', '2021-06-11 01:49:41', NULL, NULL),
(92, 'user', 'admin has updated user', 'App\\Models\\User', 'updated', 1, 'App\\Models\\User', 1, '{\"attributes\":{\"name\":\"admin\",\"email\":\"admin@gmail.com\"},\"old\":{\"name\":\"admin\",\"email\":\"admin@gmail.com\"}}', NULL, '2021-06-11 01:51:34', '2021-06-11 01:51:34', NULL, NULL),
(93, 'teacher', 'admin has deleted teacher', 'App\\Models\\Teacher', 'deleted', 3, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Teacher\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-11 02:26:51', '2021-06-11 02:26:51', NULL, NULL),
(94, 'teacher', 'admin has deleted teacher', 'App\\Models\\Teacher', 'deleted', 2, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Teacher\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-11 02:26:53', '2021-06-11 02:26:53', NULL, NULL),
(96, 'teacher', 'admin has created teacher', 'App\\Models\\Teacher', 'created', 5, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Teacher\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-11 02:28:01', '2021-06-11 02:28:01', NULL, NULL),
(97, 'teacher', 'admin has created teacher', 'App\\Models\\Teacher', 'created', 6, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Teacher\",\"email\":\"email2@gmail.com\"}}', NULL, '2021-06-11 02:28:01', '2021-06-11 02:28:01', NULL, NULL),
(98, 'teacher', 'admin has deleted teacher', 'App\\Models\\Teacher', 'deleted', 5, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Teacher\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-11 02:28:09', '2021-06-11 02:28:09', NULL, NULL),
(100, 'teacher', 'admin has deleted teacher', 'App\\Models\\Teacher', 'deleted', 6, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Teacher\",\"email\":\"email2@gmail.com\"}}', NULL, '2021-06-11 02:28:21', '2021-06-11 02:28:21', NULL, NULL),
(101, 'teacher', 'admin has created teacher', 'App\\Models\\Teacher', 'created', 8, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Teacher\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-11 02:28:29', '2021-06-11 02:28:29', NULL, NULL),
(102, 'teacher', 'admin has created teacher', 'App\\Models\\Teacher', 'created', 9, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Teacher\",\"email\":\"email2@gmail.com\"}}', NULL, '2021-06-11 02:28:29', '2021-06-11 02:28:29', NULL, NULL),
(103, 'student', 'admin has deleted student', 'App\\Models\\Student', 'deleted', 61, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 02:31:38', '2021-06-11 02:31:38', NULL, NULL),
(104, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 62, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 02:31:47', '2021-06-11 02:31:47', NULL, NULL),
(105, 'student', 'admin has deleted student', 'App\\Models\\Student', 'deleted', 62, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 02:32:30', '2021-06-11 02:32:30', NULL, NULL),
(106, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 63, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 02:32:33', '2021-06-11 02:32:33', NULL, NULL),
(107, 'teacher', 'admin has deleted teacher', 'App\\Models\\Teacher', 'deleted', 8, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Teacher\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-11 02:36:18', '2021-06-11 02:36:18', NULL, NULL),
(108, 'teacher', 'admin has deleted teacher', 'App\\Models\\Teacher', 'deleted', 9, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Teacher\",\"email\":\"email2@gmail.com\"}}', NULL, '2021-06-11 02:36:20', '2021-06-11 02:36:20', NULL, NULL),
(109, 'teacher', 'admin has created teacher', 'App\\Models\\Teacher', 'created', 10, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Teacher\",\"email\":\"email@gmail.com\"}}', NULL, '2021-06-11 02:36:28', '2021-06-11 02:36:28', NULL, NULL),
(110, 'teacher', 'admin has created teacher', 'App\\Models\\Teacher', 'created', 11, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Teacher\",\"email\":\"email2@gmail.com\"}}', NULL, '2021-06-11 02:36:28', '2021-06-11 02:36:28', NULL, NULL),
(111, 'student', 'admin has deleted student', 'App\\Models\\Student', 'deleted', 63, 'App\\Models\\User', 1, '{\"old\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 05:13:45', '2021-06-11 05:13:45', NULL, NULL),
(112, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 64, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(113, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 65, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(114, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 66, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(115, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 67, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(116, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 68, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(117, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 69, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(118, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 70, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(119, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 71, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(120, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 72, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(121, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 73, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(122, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 74, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(123, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 75, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(124, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 76, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(125, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 77, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(126, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 78, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(127, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 79, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(128, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 80, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(129, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 81, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(130, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 82, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(131, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 83, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(132, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 84, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(133, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 85, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(134, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 86, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(135, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 87, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(136, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 88, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(137, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 89, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(138, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 90, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(139, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 91, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(140, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 92, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(141, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 93, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(142, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 94, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(143, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 95, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(144, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 96, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(145, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 97, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(146, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 98, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(147, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 99, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(148, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 100, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(149, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 101, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(150, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 102, 'App\\Models\\User', 1, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 05:13:51', '2021-06-11 05:13:51', NULL, NULL),
(151, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 103, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(152, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 104, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(153, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 105, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(154, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 106, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(155, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 107, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(156, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 108, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(157, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 109, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(158, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 110, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(159, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 111, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(160, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 112, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(161, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 113, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(162, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 114, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(163, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 115, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(164, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 116, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(165, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 117, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(166, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 118, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(167, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 119, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(168, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 120, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(169, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 121, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(170, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 122, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(171, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 123, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(172, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 124, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(173, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 125, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(174, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 126, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(175, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 127, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(176, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 128, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(177, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 129, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 06:06:08', '2021-06-11 06:06:08', NULL, NULL),
(178, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 130, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(179, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 131, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(180, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 132, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(181, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 133, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(182, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 134, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(183, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 135, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(184, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 136, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(185, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 137, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(186, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 138, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(187, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 139, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(188, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 140, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(189, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 141, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 06:06:09', '2021-06-11 06:06:09', NULL, NULL),
(190, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 142, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(191, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 143, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(192, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 144, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(193, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 145, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(194, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 146, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(195, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 147, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(196, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 148, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(197, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 149, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(198, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 150, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(199, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 151, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(200, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 152, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(201, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 153, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(202, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 154, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(203, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 155, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(204, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 156, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(205, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 157, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(206, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 158, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(207, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 159, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(208, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 160, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(209, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 161, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(210, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 162, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(211, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 163, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(212, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 164, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(213, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 165, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(214, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 166, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(215, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 167, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(216, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 168, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(217, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 169, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(218, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 170, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(219, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 171, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(220, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 172, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(221, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 173, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(222, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 174, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(223, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 175, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`, `parent_id`, `student_id`) VALUES
(224, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 176, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(225, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 177, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(226, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 178, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(227, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 179, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(228, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 180, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 06:07:44', '2021-06-11 06:07:44', NULL, NULL),
(229, 'subject', 'admin has deleted subject', 'App\\Models\\Subject', 'deleted', 4, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Aral Pan\",\"description\":\"Araling Panlipunan\"}}', NULL, '2021-06-11 06:17:52', '2021-06-11 06:17:52', NULL, NULL),
(230, 'subject', 'admin has deleted subject', 'App\\Models\\Subject', 'deleted', 3, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Filipino\",\"description\":\"panimula sa wikang filipino\"}}', NULL, '2021-06-11 06:17:53', '2021-06-11 06:17:53', NULL, NULL),
(231, 'subject', 'admin has deleted subject', 'App\\Models\\Subject', 'deleted', 1, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Math\",\"description\":\"intro to math 1\"}}', NULL, '2021-06-11 06:17:55', '2021-06-11 06:17:55', NULL, NULL),
(232, 'subject', 'admin has deleted subject', 'App\\Models\\Subject', 'deleted', 2, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Science\",\"description\":\"intro to science 1\"}}', NULL, '2021-06-11 06:17:57', '2021-06-11 06:17:57', NULL, NULL),
(233, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 5, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"Math\",\"description\":\"intro to math 1\"}}', NULL, '2021-06-11 06:18:49', '2021-06-11 06:18:49', NULL, NULL),
(234, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 6, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"Science\",\"description\":\"intro to science 1\"}}', NULL, '2021-06-11 06:18:49', '2021-06-11 06:18:49', NULL, NULL),
(235, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 7, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"Filipino\",\"description\":\"panimula sa wikang filipino\"}}', NULL, '2021-06-11 06:18:49', '2021-06-11 06:18:49', NULL, NULL),
(236, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 8, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"Aral Pan\",\"description\":\"Araling Panlipunan\"}}', NULL, '2021-06-11 06:18:49', '2021-06-11 06:18:49', NULL, NULL),
(237, 'subject', 'admin has deleted subject', 'App\\Models\\Subject', 'deleted', 6, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Science\",\"description\":\"intro to science 1\"}}', NULL, '2021-06-11 06:18:59', '2021-06-11 06:18:59', NULL, NULL),
(238, 'subject', 'admin has deleted subject', 'App\\Models\\Subject', 'deleted', 5, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Math\",\"description\":\"intro to math 1\"}}', NULL, '2021-06-11 06:19:01', '2021-06-11 06:19:01', NULL, NULL),
(239, 'subject', 'admin has deleted subject', 'App\\Models\\Subject', 'deleted', 7, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Filipino\",\"description\":\"panimula sa wikang filipino\"}}', NULL, '2021-06-11 06:19:02', '2021-06-11 06:19:02', NULL, NULL),
(240, 'subject', 'admin has deleted subject', 'App\\Models\\Subject', 'deleted', 8, 'App\\Models\\User', 4, '{\"old\":{\"name\":\"Aral Pan\",\"description\":\"Araling Panlipunan\"}}', NULL, '2021-06-11 06:19:04', '2021-06-11 06:19:04', NULL, NULL),
(241, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 9, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"Math\",\"description\":\"intro to math 1\"}}', NULL, '2021-06-11 06:19:45', '2021-06-11 06:19:45', NULL, NULL),
(242, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 10, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"Science\",\"description\":\"intro to science 1\"}}', NULL, '2021-06-11 06:19:46', '2021-06-11 06:19:46', NULL, NULL),
(243, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 11, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"Filipino\",\"description\":\"panimula sa wikang filipino\"}}', NULL, '2021-06-11 06:19:46', '2021-06-11 06:19:46', NULL, NULL),
(244, 'subject', 'admin has created subject', 'App\\Models\\Subject', 'created', 12, 'App\\Models\\User', 4, '{\"attributes\":{\"name\":\"Aral Pan\",\"description\":\"Araling Panlipunan\"}}', NULL, '2021-06-11 06:19:46', '2021-06-11 06:19:46', NULL, NULL),
(245, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 181, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(246, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 182, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(247, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 183, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(248, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 184, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(249, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 185, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(250, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 186, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(251, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 187, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(252, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 188, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(253, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 189, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(254, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 190, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(255, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 191, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(256, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 192, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(257, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 193, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(258, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 194, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(259, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 195, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(260, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 196, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(261, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 197, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(262, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 198, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(263, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 199, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(264, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 200, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(265, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 201, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(266, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 202, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(267, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 203, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(268, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 204, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(269, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 205, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(270, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 206, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(271, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 207, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(272, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 208, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(273, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 209, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(274, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 210, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(275, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 211, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(276, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 212, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(277, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 213, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(278, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 214, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(279, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 215, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(280, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 216, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(281, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 217, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(282, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 218, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(283, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 219, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 06:30:58', '2021-06-11 06:30:58', NULL, NULL),
(284, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 220, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Pearl\",\"last_name\":\"Washington\",\"email\":\"mozukoru@mailinator.com\"}}', NULL, '2021-06-11 06:39:52', '2021-06-11 06:39:52', NULL, NULL),
(285, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 221, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(286, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 222, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(287, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 223, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(288, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 224, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(289, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 225, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(290, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 226, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(291, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 227, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(292, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 228, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(293, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 229, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(294, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 230, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(295, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 231, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(296, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 232, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(297, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 233, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(298, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 234, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(299, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 235, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(300, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 236, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(301, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 237, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(302, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 238, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(303, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 239, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(304, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 240, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(305, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 241, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(306, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 242, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(307, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 243, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(308, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 244, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(309, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 245, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(310, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 246, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(311, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 247, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(312, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 248, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(313, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 249, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(314, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 250, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(315, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 251, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(316, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 252, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(317, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 253, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(318, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 254, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(319, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 255, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(320, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 256, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(321, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 257, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(322, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 258, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(323, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 259, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 06:43:47', '2021-06-11 06:43:47', NULL, NULL),
(324, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 260, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(325, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 261, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(326, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 262, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(327, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 263, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(328, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 264, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(329, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 265, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(330, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 266, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(331, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 267, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(332, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 268, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(333, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 269, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(334, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 270, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(335, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 271, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(336, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 272, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(337, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 273, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(338, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 274, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(339, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 275, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(340, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 276, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(341, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 277, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(342, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 278, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(343, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 279, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(344, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 280, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(345, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 281, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(346, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 282, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(347, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 283, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(348, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 284, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(349, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 285, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(350, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 286, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(351, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 287, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(352, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 288, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(353, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 289, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(354, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 290, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(355, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 291, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(356, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 292, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(357, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 293, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(358, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 294, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(359, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 295, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(360, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 296, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(361, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 297, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(362, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 298, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 06:50:12', '2021-06-11 06:50:12', NULL, NULL),
(363, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 299, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(364, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 300, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(365, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 301, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(366, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 302, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(367, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 303, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(368, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 304, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(369, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 305, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(370, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 306, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(371, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 307, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(372, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 308, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(373, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 309, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(374, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 310, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(375, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 311, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(376, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 312, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(377, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 313, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(378, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 314, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(379, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 315, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(380, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 316, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(381, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 317, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(382, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 318, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(383, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 319, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(384, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 320, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(385, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 321, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(386, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 322, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(387, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 323, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(388, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 324, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(389, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 325, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(390, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 326, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(391, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 327, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 06:51:20', '2021-06-11 06:51:20', NULL, NULL),
(392, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 328, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 06:51:21', '2021-06-11 06:51:21', NULL, NULL),
(393, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 329, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 06:51:21', '2021-06-11 06:51:21', NULL, NULL),
(394, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 330, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 06:51:21', '2021-06-11 06:51:21', NULL, NULL),
(395, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 331, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 06:51:21', '2021-06-11 06:51:21', NULL, NULL),
(396, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 332, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 06:51:21', '2021-06-11 06:51:21', NULL, NULL),
(397, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 333, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 06:51:21', '2021-06-11 06:51:21', NULL, NULL),
(398, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 334, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 06:51:21', '2021-06-11 06:51:21', NULL, NULL),
(399, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 335, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 06:51:21', '2021-06-11 06:51:21', NULL, NULL),
(400, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 336, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 06:51:21', '2021-06-11 06:51:21', NULL, NULL),
(401, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 337, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 06:51:21', '2021-06-11 06:51:21', NULL, NULL),
(402, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 338, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(403, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 339, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(404, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 340, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(405, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 341, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(406, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 342, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`, `parent_id`, `student_id`) VALUES
(407, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 343, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(408, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 344, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(409, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 345, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(410, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 346, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(411, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 347, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(412, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 348, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(413, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 349, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(414, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 350, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(415, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 351, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(416, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 352, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(417, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 353, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(418, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 354, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(419, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 355, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(420, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 356, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(421, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 357, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(422, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 358, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(423, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 359, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(424, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 360, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(425, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 361, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(426, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 362, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(427, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 363, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(428, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 364, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(429, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 365, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(430, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 366, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(431, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 367, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(432, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 368, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(433, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 369, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(434, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 370, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(435, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 371, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(436, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 372, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(437, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 373, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(438, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 374, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(439, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 375, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(440, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 376, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 06:56:34', '2021-06-11 06:56:34', NULL, NULL),
(441, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 377, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(442, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 378, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(443, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 379, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(444, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 380, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(445, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 381, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(446, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 382, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(447, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 383, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(448, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 384, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(449, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 385, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(450, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 386, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(451, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 387, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(452, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 388, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(453, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 389, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(454, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 390, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(455, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 391, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(456, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 392, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(457, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 393, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(458, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 394, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(459, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 395, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(460, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 396, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(461, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 397, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(462, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 398, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(463, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 399, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(464, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 400, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(465, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 401, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(466, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 402, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(467, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 403, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(468, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 404, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(469, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 405, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(470, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 406, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(471, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 407, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(472, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 408, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(473, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 409, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(474, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 410, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(475, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 411, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(476, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 412, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(477, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 413, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(478, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 414, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(479, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 415, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 06:57:20', '2021-06-11 06:57:20', NULL, NULL),
(480, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 416, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(481, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 417, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(482, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 418, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(483, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 419, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(484, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 420, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(485, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 421, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(486, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 422, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(487, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 423, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(488, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 424, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(489, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 425, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(490, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 426, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(491, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 427, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(492, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 428, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(493, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 429, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(494, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 430, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(495, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 431, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(496, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 432, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(497, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 433, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(498, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 434, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(499, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 435, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(500, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 436, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(501, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 437, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(502, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 438, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(503, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 439, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(504, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 440, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(505, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 441, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(506, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 442, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(507, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 443, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(508, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 444, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(509, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 445, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(510, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 446, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(511, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 447, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(512, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 448, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(513, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 449, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(514, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 450, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(515, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 451, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(516, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 452, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(517, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 453, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(518, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 454, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 07:07:38', '2021-06-11 07:07:38', NULL, NULL),
(519, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 455, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(520, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 456, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(521, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 457, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(522, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 458, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(523, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 459, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(524, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 460, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(525, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 461, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(526, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 462, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(527, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 463, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(528, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 464, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(529, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 465, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(530, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 466, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(531, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 467, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(532, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 468, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(533, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 469, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(534, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 470, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(535, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 471, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(536, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 472, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(537, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 473, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(538, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 474, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(539, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 475, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(540, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 476, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(541, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 477, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(542, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 478, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(543, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 479, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(544, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 480, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(545, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 481, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(546, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 482, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(547, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 483, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(548, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 484, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(549, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 485, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(550, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 486, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(551, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 487, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(552, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 488, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(553, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 489, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(554, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 490, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(555, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 491, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(556, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 492, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(557, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 493, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 07:08:33', '2021-06-11 07:08:33', NULL, NULL),
(558, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 494, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(559, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 495, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(560, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 496, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(561, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 497, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(562, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 498, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(563, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 499, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(564, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 500, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(565, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 501, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(566, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 502, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(567, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 503, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(568, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 504, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(569, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 505, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(570, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 506, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(571, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 507, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(572, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 508, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(573, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 509, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(574, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 510, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(575, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 511, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(576, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 512, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(577, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 513, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(578, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 514, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(579, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 515, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(580, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 516, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(581, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 517, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(582, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 518, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(583, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 519, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(584, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 520, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(585, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 521, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(586, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 522, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(587, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 523, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(588, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 524, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL);
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`, `parent_id`, `student_id`) VALUES
(589, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 525, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(590, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 526, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(591, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 527, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(592, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 528, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(593, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 529, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(594, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 530, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(595, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 531, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(596, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 532, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 07:09:41', '2021-06-11 07:09:41', NULL, NULL),
(597, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 533, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(598, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 534, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(599, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 535, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(600, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 536, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(601, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 537, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(602, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 538, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(603, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 539, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(604, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 540, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(605, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 541, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(606, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 542, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(607, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 543, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(608, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 544, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(609, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 545, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(610, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 546, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(611, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 547, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(612, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 548, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(613, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 549, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(614, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 550, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(615, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 551, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(616, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 552, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(617, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 553, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(618, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 554, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(619, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 555, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(620, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 556, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(621, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 557, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(622, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 558, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(623, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 559, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(624, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 560, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(625, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 561, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(626, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 562, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(627, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 563, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(628, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 564, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(629, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 565, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(630, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 566, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(631, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 567, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(632, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 568, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(633, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 569, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(634, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 570, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(635, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 571, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 07:10:55', '2021-06-11 07:10:55', NULL, NULL),
(636, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 572, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(637, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 573, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(638, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 574, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(639, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 575, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(640, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 576, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(641, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 577, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(642, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 578, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(643, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 579, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(644, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 580, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(645, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 581, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(646, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 582, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(647, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 583, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(648, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 584, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(649, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 585, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(650, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 586, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(651, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 587, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(652, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 588, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(653, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 589, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(654, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 590, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(655, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 591, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(656, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 592, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(657, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 593, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(658, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 594, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(659, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 595, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(660, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 596, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(661, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 597, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(662, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 598, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(663, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 599, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(664, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 600, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(665, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 601, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(666, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 602, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(667, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 603, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(668, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 604, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(669, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 605, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(670, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 606, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(671, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 607, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(672, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 608, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(673, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 609, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(674, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 610, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 07:11:43', '2021-06-11 07:11:43', NULL, NULL),
(675, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 611, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(676, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 612, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(677, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 613, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(678, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 614, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(679, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 615, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(680, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 616, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(681, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 617, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(682, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 618, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(683, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 619, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(684, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 620, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(685, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 621, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(686, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 622, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(687, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 623, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(688, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 624, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(689, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 625, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(690, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 626, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(691, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 627, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(692, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 628, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(693, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 629, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(694, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 630, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(695, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 631, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(696, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 632, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(697, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 633, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(698, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 634, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(699, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 635, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-11 07:12:04', '2021-06-11 07:12:04', NULL, NULL),
(700, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 636, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(701, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 637, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(702, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 638, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(703, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 639, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(704, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 640, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(705, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 641, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(706, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 642, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(707, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 643, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(708, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 644, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(709, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 645, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(710, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 646, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(711, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 647, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(712, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 648, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(713, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 649, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 07:12:05', '2021-06-11 07:12:05', NULL, NULL),
(714, 'student', 'admin has updated student', 'App\\Models\\Student', 'updated', 620, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"},\"old\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-11 07:12:27', '2021-06-11 07:12:27', NULL, NULL),
(715, 'student', 'admin has updated student', 'App\\Models\\Student', 'updated', 649, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"},\"old\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-11 07:12:32', '2021-06-11 07:12:32', NULL, NULL),
(716, 'student', 'admin has updated student', 'App\\Models\\Student', 'updated', 648, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"},\"old\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-11 07:12:38', '2021-06-11 07:12:38', NULL, NULL),
(717, 'student', 'admin has updated student', 'App\\Models\\Student', 'updated', 640, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"},\"old\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-11 07:12:51', '2021-06-11 07:12:51', NULL, NULL),
(718, 'student', 'admin has updated student', 'App\\Models\\Student', 'updated', 645, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"},\"old\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-11 07:12:55', '2021-06-11 07:12:55', NULL, NULL),
(719, 'student', 'admin has updated student', 'App\\Models\\Student', 'updated', 617, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"},\"old\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-11 07:13:00', '2021-06-11 07:13:00', NULL, NULL),
(720, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 650, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ace\",\"last_name\":\"Manalo\",\"email\":\"a@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(721, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 651, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"John\",\"last_name\":\"Manalo\",\"email\":\"aa@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(722, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 652, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Doe\",\"last_name\":\"Manalo\",\"email\":\"aaa@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(723, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 653, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Mark\",\"last_name\":\"Manalo\",\"email\":\"aaaa@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(724, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 654, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joe\",\"last_name\":\"Manalo\",\"email\":\"aw@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(725, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 655, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Joseph\",\"last_name\":\"Manalo\",\"email\":\"clark@email.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(726, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 656, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Clark\",\"last_name\":\"Manalo\",\"email\":\"joseph@email.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(727, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 657, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jay\",\"last_name\":\"Manalo\",\"email\":\"jay@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(728, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 658, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jae\",\"last_name\":\"Manalo\",\"email\":\"jae@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(729, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 659, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Acee\",\"last_name\":\"Manalo\",\"email\":\"acee@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(730, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 660, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willy\",\"last_name\":\"Manalo\",\"email\":\"willy@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(731, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 661, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Willie\",\"last_name\":\"Manalo\",\"email\":\"aaxe@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(732, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 662, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dowg\",\"last_name\":\"Manalo\",\"email\":\"dowg@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(733, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 663, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Dawson\",\"last_name\":\"Manalo\",\"email\":\"dawson@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(734, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 664, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rey\",\"last_name\":\"Manalo\",\"email\":\"rey@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(735, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 665, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Ray\",\"last_name\":\"Manalo\",\"email\":\"ray@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(736, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 666, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Rae\",\"last_name\":\"Manalo\",\"email\":\"rae@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(737, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 667, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Zae\",\"last_name\":\"Manalo\",\"email\":\"zae@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(738, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 668, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Kent\",\"last_name\":\"Manalo\",\"email\":\"kent@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(739, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 669, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Karl\",\"last_name\":\"Manalo\",\"email\":\"karl@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(740, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 670, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Tesla\",\"last_name\":\"Manalo\",\"email\":\"tesla@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(741, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 671, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nikola\",\"last_name\":\"Manalo\",\"email\":\"nikola@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(742, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 672, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Nicole\",\"last_name\":\"Manalo\",\"email\":\"nicole@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(743, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 673, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayce\",\"last_name\":\"Manalo\",\"email\":\"jayce@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(744, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 674, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jayve\",\"last_name\":\"Manalo\",\"email\":\"jake@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(745, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 675, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jake\",\"last_name\":\"Manalo\",\"email\":\"jan@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(746, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 676, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Jan\",\"last_name\":\"Manalo\",\"email\":\"bill@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(747, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 677, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Bill\",\"last_name\":\"Manalo\",\"email\":\"billy@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(748, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 678, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billy\",\"last_name\":\"Manalo\",\"email\":\"billie@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(749, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 679, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Billie\",\"last_name\":\"Manalo\",\"email\":\"vincent@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(750, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 680, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vincent\",\"last_name\":\"Manalo\",\"email\":\"vince@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(751, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 681, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vince \",\"last_name\":\"Manalo\",\"email\":\"vic@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(752, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 682, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Vic\",\"last_name\":\"Manalo\",\"email\":\"von@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(753, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 683, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Von\",\"last_name\":\"Manalo\",\"email\":\"blast@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(754, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 684, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Blast\",\"last_name\":\"Manalo\",\"email\":\"red@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(755, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 685, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Red\",\"last_name\":\"Manalo\",\"email\":\"alfred@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(756, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 686, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfred\",\"last_name\":\"Manalo\",\"email\":\"k@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(757, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 687, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Alfonso\",\"last_name\":\"Manalo\",\"email\":\"ae@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL),
(758, 'student', 'admin has created student', 'App\\Models\\Student', 'created', 688, 'App\\Models\\User', 4, '{\"attributes\":{\"first_name\":\"Aikee\",\"last_name\":\"Manalo\",\"email\":\"test@gmail.com\"}}', NULL, '2021-06-13 23:44:23', '2021-06-13 23:44:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_level_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `grade_level_id`, `description`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tuition fee', 15000.00, '2021-06-08 08:45:46', '2021-06-08 08:45:46'),
(2, 1, 'laboratory fee', 3000.00, '2021-06-08 08:45:46', '2021-06-08 08:45:46'),
(3, 1, 'library fee', 2000.00, '2021-06-08 08:45:46', '2021-06-08 08:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `grade_levels`
--

CREATE TABLE `grade_levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` double(8,2) NOT NULL DEFAULT 0.00,
  `months_no` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_levels`
--

INSERT INTO `grade_levels` (`id`, `name`, `description`, `total_amount`, `months_no`, `created_at`, `updated_at`) VALUES
(1, 'Grade 1', 'g1', 20000.00, 10, '2021-06-08 08:44:20', '2021-06-08 08:44:20'),
(2, 'Grade 2', 'g2', 0.00, 10, '2021-06-09 00:30:20', '2021-06-09 00:30:20'),
(3, 'Grade 3', 'g3', 0.00, 10, '2021-06-09 00:30:24', '2021-06-09 00:30:24'),
(4, 'Grade 4', 'g4', 0.00, 10, '2021-06-09 00:30:29', '2021-06-09 00:30:29'),
(5, 'Grade 5', 'g5', 0.00, 10, '2021-06-09 00:30:34', '2021-06-09 00:30:34'),
(6, 'Grade 6', 'g6', 0.00, 10, '2021-06-09 00:30:39', '2021-06-09 00:30:39');

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
(1, '2014_10_12_0000000_create_roles_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_14_031032_create_schools_table', 1),
(5, '2021_04_14_031033_create_grade_levels_table', 1),
(6, '2021_04_17_124838_create_teachers_table', 1),
(7, '2021_04_19_110909_create_subjects_table', 1),
(8, '2021_04_20_081323_create_students_table', 1),
(9, '2021_05_04_174800_create_subject_teacher_table', 1),
(10, '2021_05_05_102309_create_student_teacher_table', 1),
(11, '2021_05_07_104252_create_fees_table', 1),
(12, '2021_05_08_081918_create_student_fee_table', 1),
(13, '2021_05_08_192958_create_payments_table', 1),
(14, '2021_05_21_091108_create_payment_ledger_table', 1),
(15, '2021_05_31_145926_create_activity_log_table', 1),
(16, '2021_05_31_145927_add_event_column_to_activity_log_table', 1),
(17, '2021_05_31_145928_add_batch_uuid_column_to_activity_log_table', 1),
(18, '2021_06_02_081600_create_parents_table', 1),
(19, '2021_06_02_081755_create_parent_student_table', 1),
(20, '2021_06_02_081756_create_users_table', 1),
(21, '2021_06_03_095551_create_parent_payments_table', 1),
(22, '2021_06_05_135327_create_payment_modes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `name`, `email`, `contact`, `facebook`, `created_at`, `updated_at`) VALUES
(1, 'Parent John', 'parent@gmail.com', '09659312003', 'parent.fb.com', '2021-06-08 08:46:30', '2021-06-08 08:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `parent_payments`
--

CREATE TABLE `parent_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `official_receipt` bigint(20) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `receipt_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `screenshot` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `seen` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_student`
--

CREATE TABLE `parent_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_fee_id` bigint(20) UNSIGNED NOT NULL,
  `discounted_percentage` decimal(8,2) NOT NULL DEFAULT 0.00,
  `discounted_cash` double(8,2) NOT NULL DEFAULT 0.00,
  `discounted_amount` double(8,2) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_no` bigint(20) NOT NULL,
  `official_receipt` bigint(20) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_ledger`
--

CREATE TABLE `payment_ledger` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` date NOT NULL,
  `amount` double(8,2) NOT NULL,
  `student_fee_id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_change` double(8,2) NOT NULL DEFAULT 0.00,
  `balance` double(8,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_modes`
--

CREATE TABLE `payment_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'student', NULL, NULL),
(3, 'parent', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `depEd_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `school_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `months_no` bigint(20) NOT NULL,
  `date_started` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `school_name`, `depEd_no`, `city`, `province`, `country`, `address`, `contact`, `email`, `website`, `facebook`, `school_logo`, `months_no`, `date_started`, `created_at`, `updated_at`) VALUES
(1, 'A. Mabini Elementary School', '0982717271', 'Davao', 'Davao Del Sur', 'Philippines', 'Bangkal Davao City', '09657727718', 'school@email.com', 'school@edu.ph', 'facebook.school.com', 'ames.jpg', 10, '2021-06-01', '2021-06-08 08:09:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_level_id` bigint(20) UNSIGNED NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guardian_facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `middle_name`, `last_name`, `birth_date`, `gender`, `grade_level_id`, `nationality`, `city`, `province`, `country`, `address`, `contact`, `facebook`, `email`, `student_avatar`, `guardian_name`, `guardian_contact`, `guardian_facebook`, `created_at`, `updated_at`) VALUES
(650, 'Ace', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'a@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(651, 'John', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'aa@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(652, 'Doe', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'aaa@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(653, 'Mark', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'aaaa@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(654, 'Joe', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'aw@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(655, 'Joseph', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'clark@email.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(656, 'Clark', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'joseph@email.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(657, 'Jay', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'jay@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(658, 'Jae', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'jae@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(659, 'Acee', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'acee@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(660, 'Willy', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'willy@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(661, 'Willie', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'aaxe@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(662, 'Dowg', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'dowg@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(663, 'Dawson', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'dawson@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(664, 'Rey', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'rey@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(665, 'Ray', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'ray@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(666, 'Rae', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'rae@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(667, 'Zae', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'zae@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(668, 'Kent', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'kent@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(669, 'Karl', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'karl@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(670, 'Tesla', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'tesla@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(671, 'Nikola', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'nikola@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(672, 'Nicole', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'nicole@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(673, 'Jayce', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'jayce@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(674, 'Jayve', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'jake@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(675, 'Jake', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'jan@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(676, 'Jan', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'bill@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(677, 'Bill', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'billy@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(678, 'Billy', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'billie@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(679, 'Billie', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'vincent@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(680, 'Vincent', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'vince@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(681, 'Vince ', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'vic@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(682, 'Vic', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'von@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(683, 'Von', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'blast@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(684, 'Blast', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'red@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(685, 'Red', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'alfred@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(686, 'Alfred', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'k@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(687, 'Alfonso', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'ae@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23'),
(688, 'Aikee', 'Lui', 'Manalo', '1999-03-14', 'male', 1, 'filipino', 'davao', 'davao del sur', 'philippines', 'davao', '9659312003', 'fb.com', 'test@gmail.com', 'aw.png', 'Parent Name', '9659312003', 'fb.com', '2021-06-13 23:44:23', '2021-06-13 23:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

CREATE TABLE `student_fee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `grade_level_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `total_fee` double(8,2) NOT NULL,
  `months_no` bigint(20) NOT NULL,
  `has_downpayment` bigint(20) NOT NULL DEFAULT 0,
  `downpayment` double(8,2) NOT NULL DEFAULT 0.00,
  `monthly_payment` double(8,2) NOT NULL DEFAULT 0.00,
  `date_started` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_teacher`
--

CREATE TABLE `student_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_level_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `grade_level_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(9, 1, 'Math', 'intro to math 1', '2021-06-11 06:19:45', '2021-06-11 06:19:45'),
(10, 1, 'Science', 'intro to science 1', '2021-06-11 06:19:45', '2021-06-11 06:19:45'),
(11, 1, 'Filipino', 'panimula sa wikang filipino', '2021-06-11 06:19:46', '2021-06-11 06:19:46'),
(12, 1, 'Aral Pan', 'Araling Panlipunan', '2021-06-11 06:19:46', '2021-06-11 06:19:46');

-- --------------------------------------------------------

--
-- Table structure for table `subject_teacher`
--

CREATE TABLE `subject_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_level_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `grade_level_id`, `first_name`, `middle_name`, `last_name`, `birth_date`, `gender`, `city`, `province`, `country`, `address`, `contact`, `facebook`, `email`, `teacher_avatar`, `created_at`, `updated_at`) VALUES
(10, 1, 'Teacher', 'Lui', 'Ace', '35986', 'male', 'davao', 'davao del sur', 'philippines', 'Davao', '9872717217', 'fb.com', 'email@gmail.com', 'avatar.png', '2021-06-11 02:36:28', '2021-06-11 02:36:28'),
(11, 1, 'Teacher', 'Lui', 'John', '35986', 'male', 'davao', 'davao del sur', 'philippines', 'Davao', '9872717217', 'fb.com', 'email2@gmail.com', 'avatar.png', '2021-06-11 02:36:28', '2021-06-11 02:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `status` bigint(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `parent_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `status`) VALUES
(4, NULL, NULL, 'admin', 'admin@gmail.com', NULL, '$2y$10$UPNEWO.3925PqB8KN1tl..IFHJSKBINMWxKZNBWB9hBMfNlayuue6', NULL, NULL, '2021-06-13 23:43:03', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_grade_level_id_foreign` (`grade_level_id`);

--
-- Indexes for table `grade_levels`
--
ALTER TABLE `grade_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_payments`
--
ALTER TABLE `parent_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_payments_parent_id_foreign` (`parent_id`),
  ADD KEY `parent_payments_student_id_foreign` (`student_id`);

--
-- Indexes for table `parent_student`
--
ALTER TABLE `parent_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_student_parent_id_foreign` (`parent_id`),
  ADD KEY `parent_student_student_id_foreign` (`student_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_student_fee_id_foreign` (`student_fee_id`);

--
-- Indexes for table `payment_ledger`
--
ALTER TABLE `payment_ledger`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_ledger_student_fee_id_foreign` (`student_fee_id`),
  ADD KEY `payment_ledger_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `payment_modes`
--
ALTER TABLE `payment_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_grade_level_id_foreign` (`grade_level_id`);

--
-- Indexes for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_fee_student_id_foreign` (`student_id`),
  ADD KEY `student_fee_grade_level_id_foreign` (`grade_level_id`);

--
-- Indexes for table `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_teacher_student_id_foreign` (`student_id`),
  ADD KEY `student_teacher_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_grade_level_id_foreign` (`grade_level_id`);

--
-- Indexes for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_teacher_subject_id_foreign` (`subject_id`),
  ADD KEY `subject_teacher_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_grade_level_id_foreign` (`grade_level_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_student_id_foreign` (`student_id`),
  ADD KEY `users_parent_id_foreign` (`parent_id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=759;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grade_levels`
--
ALTER TABLE `grade_levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parent_payments`
--
ALTER TABLE `parent_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent_student`
--
ALTER TABLE `parent_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `payment_ledger`
--
ALTER TABLE `payment_ledger`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `payment_modes`
--
ALTER TABLE `payment_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=689;

--
-- AUTO_INCREMENT for table `student_fee`
--
ALTER TABLE `student_fee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `student_teacher`
--
ALTER TABLE `student_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_grade_level_id_foreign` FOREIGN KEY (`grade_level_id`) REFERENCES `grade_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parent_payments`
--
ALTER TABLE `parent_payments`
  ADD CONSTRAINT `parent_payments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parent_student`
--
ALTER TABLE `parent_student`
  ADD CONSTRAINT `parent_student_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parent_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_student_fee_id_foreign` FOREIGN KEY (`student_fee_id`) REFERENCES `student_fee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_ledger`
--
ALTER TABLE `payment_ledger`
  ADD CONSTRAINT `payment_ledger_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ledger_student_fee_id_foreign` FOREIGN KEY (`student_fee_id`) REFERENCES `student_fee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_grade_level_id_foreign` FOREIGN KEY (`grade_level_id`) REFERENCES `grade_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_fee`
--
ALTER TABLE `student_fee`
  ADD CONSTRAINT `student_fee_grade_level_id_foreign` FOREIGN KEY (`grade_level_id`) REFERENCES `grade_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_fee_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_teacher`
--
ALTER TABLE `student_teacher`
  ADD CONSTRAINT `student_teacher_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_grade_level_id_foreign` FOREIGN KEY (`grade_level_id`) REFERENCES `grade_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject_teacher`
--
ALTER TABLE `subject_teacher`
  ADD CONSTRAINT `subject_teacher_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_teacher_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_grade_level_id_foreign` FOREIGN KEY (`grade_level_id`) REFERENCES `grade_levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `parents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
