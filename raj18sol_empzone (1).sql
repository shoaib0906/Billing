-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2016 at 01:15 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `raj18sol_empzone`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE IF NOT EXISTS `activity_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=121 ;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `user_id`, `text`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 1, 'Clocked in', '117.242.62.22', NULL, '2015-12-31 21:05:32', '2015-12-31 21:05:32'),
(2, 1, 'Clocked out', '117.242.62.22', NULL, '2015-12-31 21:05:48', '2015-12-31 21:05:48'),
(3, 1, 'New department "Accounts" added', '117.242.62.22', NULL, '2016-01-02 15:23:05', '2016-01-02 15:23:05'),
(4, 1, 'New designation "Manager" added', '117.242.62.22', NULL, '2016-01-02 15:25:08', '2016-01-02 15:25:08'),
(5, 1, 'New designation "Employee" added', '117.242.62.22', NULL, '2016-01-02 15:25:55', '2016-01-02 15:25:55'),
(6, 3, 'Clocked in', '94.205.242.194', NULL, '2016-01-02 19:16:25', '2016-01-02 19:16:25'),
(7, 3, 'Requested for a leave', '94.205.242.194', NULL, '2016-01-02 19:17:27', '2016-01-02 19:17:27'),
(8, 2, 'Clocked in', '94.205.242.194', NULL, '2016-01-02 19:19:15', '2016-01-02 19:19:15'),
(9, 1, 'Clocked in', '86.98.87.150', NULL, '2016-01-02 21:43:50', '2016-01-02 21:43:50'),
(10, 1, 'New department "sales department" added', '86.98.87.150', NULL, '2016-01-02 21:44:55', '2016-01-02 21:44:55'),
(11, 1, 'New designation "assistant manager" added', '86.98.87.150', NULL, '2016-01-02 21:46:26', '2016-01-02 21:46:26'),
(12, 1, 'Clocked out', '86.98.87.150', NULL, '2016-01-02 21:54:09', '2016-01-02 21:54:09'),
(13, 1, 'Added new holiday', '86.98.87.150', NULL, '2016-01-02 21:57:26', '2016-01-02 21:57:26'),
(14, 1, 'Added new holiday', '86.98.87.150', NULL, '2016-01-02 21:57:45', '2016-01-02 21:57:45'),
(15, 1, 'Publish a notice', '86.98.87.150', NULL, '2016-01-02 22:05:41', '2016-01-02 22:05:41'),
(16, 1, 'New Custom Field "Personal ID" added', '94.205.242.194', NULL, '2016-01-03 18:21:44', '2016-01-03 18:21:44'),
(17, 1, 'New Custom Field "IBAN Number" added', '94.205.242.194', NULL, '2016-01-03 18:22:19', '2016-01-03 18:22:19'),
(18, 1, 'New Custom Field "Previous salary date" added', '202.133.59.201', NULL, '2016-01-04 22:13:34', '2016-01-04 22:13:34'),
(19, 1, 'New Custom Field "Department " added', '202.133.59.201', NULL, '2016-01-05 00:24:26', '2016-01-05 00:24:26'),
(20, 1, 'Deleted a Custome Field', '202.133.59.201', NULL, '2016-01-05 00:25:36', '2016-01-05 00:25:36'),
(21, 1, 'New Custom Field "Location" added', '202.133.59.201', NULL, '2016-01-05 00:26:39', '2016-01-05 00:26:39'),
(22, 1, 'Profile updated', '202.133.59.201', NULL, '2016-01-07 02:01:33', '2016-01-07 02:01:33'),
(23, 1, 'Profile updated', '202.133.59.201', NULL, '2016-01-07 02:03:22', '2016-01-07 02:03:22'),
(24, 1, 'Profile updated', '202.133.59.201', NULL, '2016-01-07 02:05:40', '2016-01-07 02:05:40'),
(25, 1, 'Added new transalation', '117.242.62.37', NULL, '2016-01-07 17:48:09', '2016-01-07 17:48:09'),
(26, 1, 'Added new transalation', '117.242.62.37', NULL, '2016-01-07 17:50:16', '2016-01-07 17:50:16'),
(27, 1, 'Added new transalation', '117.242.62.37', NULL, '2016-01-07 18:25:20', '2016-01-07 18:25:20'),
(28, 1, 'Added new transalation', '117.242.62.37', NULL, '2016-01-07 18:45:54', '2016-01-07 18:45:54'),
(29, 1, 'Added new transalation', '117.242.62.37', NULL, '2016-01-07 18:46:17', '2016-01-07 18:46:17'),
(30, 1, 'Added new transalation', '117.242.62.37', NULL, '2016-01-07 18:49:16', '2016-01-07 18:49:16'),
(31, 1, 'New location "Suadi" added', '117.242.62.37', NULL, '2016-01-07 18:59:41', '2016-01-07 18:59:41'),
(32, 1, 'Location "Suadi2" updated', '117.242.62.37', NULL, '2016-01-07 19:00:09', '2016-01-07 19:00:09'),
(33, 1, 'Deleted a Location', '117.242.62.37', NULL, '2016-01-07 19:00:25', '2016-01-07 19:00:25'),
(34, 1, 'New location "Suadi" added', '117.242.62.37', NULL, '2016-01-07 19:26:54', '2016-01-07 19:26:54'),
(35, 1, 'New location "Dubai" added', '117.242.62.37', NULL, '2016-01-07 22:03:37', '2016-01-07 22:03:37'),
(36, 1, 'Clocked in', '217.165.123.1', NULL, '2016-01-08 01:14:18', '2016-01-08 01:14:18'),
(37, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 14:08:22', '2016-01-09 14:08:22'),
(38, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 14:33:42', '2016-01-09 14:33:42'),
(39, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 14:33:50', '2016-01-09 14:33:50'),
(40, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 14:35:50', '2016-01-09 14:35:50'),
(41, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 15:04:17', '2016-01-09 15:04:17'),
(42, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 16:44:16', '2016-01-09 16:44:16'),
(43, 1, 'Deleted a Custome Field', '117.242.62.63', NULL, '2016-01-09 17:08:22', '2016-01-09 17:08:22'),
(44, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 18:19:42', '2016-01-09 18:19:42'),
(45, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 18:21:24', '2016-01-09 18:21:24'),
(46, 1, 'Requested for a leave', '117.242.62.63', NULL, '2016-01-09 18:26:55', '2016-01-09 18:26:55'),
(47, 1, 'Location "Suadi" updated', '117.242.62.63', NULL, '2016-01-09 18:50:37', '2016-01-09 18:50:37'),
(48, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 19:17:52', '2016-01-09 19:17:52'),
(49, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 19:32:09', '2016-01-09 19:32:09'),
(50, 1, 'Added new Employee Asset', '117.242.62.63', NULL, '2016-01-09 19:37:52', '2016-01-09 19:37:52'),
(51, 1, 'Added new transalation', '117.242.62.63', NULL, '2016-01-09 19:46:06', '2016-01-09 19:46:06'),
(52, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-09 20:04:30', '2016-01-09 20:04:30'),
(53, 1, 'Added new Employee Asset', '202.133.59.201', NULL, '2016-01-09 21:15:30', '2016-01-09 21:15:30'),
(54, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-09 21:34:24', '2016-01-09 21:34:24'),
(55, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-09 21:47:32', '2016-01-09 21:47:32'),
(56, 1, 'Updated a Employee Asset ERROR', '117.242.62.63', NULL, '2016-01-09 22:04:23', '2016-01-09 22:04:23'),
(57, 1, 'Updated a Employee Asset ERROR', '117.242.62.63', NULL, '2016-01-09 22:07:16', '2016-01-09 22:07:16'),
(58, 1, 'Updated a Employee Asset ERROR', '117.242.62.63', NULL, '2016-01-09 22:09:25', '2016-01-09 22:09:25'),
(59, 1, 'Updated a Employee Asset ERROR', '117.242.62.63', NULL, '2016-01-09 22:13:08', '2016-01-09 22:13:08'),
(60, 1, 'Updated a Employee Asset ERROR', '117.242.62.63', NULL, '2016-01-09 22:19:15', '2016-01-09 22:19:15'),
(61, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-10 00:00:04', '2016-01-10 00:00:04'),
(62, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-10 00:00:43', '2016-01-10 00:00:43'),
(63, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-10 00:03:20', '2016-01-10 00:03:20'),
(64, 1, 'Added new Employee Asset', '117.242.62.63', NULL, '2016-01-10 00:05:18', '2016-01-10 00:05:18'),
(65, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-10 01:29:41', '2016-01-10 01:29:41'),
(66, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-10 01:30:31', '2016-01-10 01:30:31'),
(67, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-10 01:40:00', '2016-01-10 01:40:00'),
(68, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-10 01:41:19', '2016-01-10 01:41:19'),
(69, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-10 01:49:28', '2016-01-10 01:49:28'),
(70, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-10 02:03:27', '2016-01-10 02:03:27'),
(71, 1, 'Updated a Employee Asset', '117.242.62.63', NULL, '2016-01-10 02:05:28', '2016-01-10 02:05:28'),
(72, 1, 'Added new Language', '94.205.242.194', NULL, '2016-01-10 22:35:05', '2016-01-10 22:35:05'),
(73, 1, 'Updated a Employee Asset', '117.242.62.95', NULL, '2016-01-12 19:50:04', '2016-01-12 19:50:04'),
(74, 1, 'Updated a Employee Asset', '117.242.62.95', NULL, '2016-01-12 19:50:28', '2016-01-12 19:50:28'),
(75, 1, 'Added new Employee Asset', '117.242.62.95', NULL, '2016-01-12 19:51:42', '2016-01-12 19:51:42'),
(76, 1, 'Updated a Employee Asset', '117.242.62.95', NULL, '2016-01-12 19:56:55', '2016-01-12 19:56:55'),
(77, 1, 'Updated a Employee Asset', '117.242.62.95', NULL, '2016-01-12 20:03:50', '2016-01-12 20:03:50'),
(78, 1, 'Updated a Employee Asset', '117.242.62.95', NULL, '2016-01-12 20:21:42', '2016-01-12 20:21:42'),
(79, 1, 'Updated a Employee Asset', '117.242.62.95', NULL, '2016-01-12 20:24:15', '2016-01-12 20:24:15'),
(80, 1, 'Updated a Employee Asset', '117.242.62.95', NULL, '2016-01-12 20:32:50', '2016-01-12 20:32:50'),
(81, 1, 'Updated a Employee Asset', '117.242.62.95', NULL, '2016-01-12 21:05:07', '2016-01-12 21:05:07'),
(82, 1, 'Added new transalation', '117.242.62.95', NULL, '2016-01-12 22:46:47', '2016-01-12 22:46:47'),
(83, 1, 'Added new transalation', '117.242.62.95', NULL, '2016-01-12 23:11:11', '2016-01-12 23:11:11'),
(84, 1, 'Added new transalation', '117.242.62.95', NULL, '2016-01-12 23:51:51', '2016-01-12 23:51:51'),
(85, 1, 'Added new transalation', '117.242.62.95', NULL, '2016-01-12 23:56:34', '2016-01-12 23:56:34'),
(86, 1, 'Added new transalation', '117.242.62.95', NULL, '2016-01-13 00:26:45', '2016-01-13 00:26:45'),
(87, 1, 'Added new transalation', '117.242.62.95', NULL, '2016-01-13 00:26:57', '2016-01-13 00:26:57'),
(88, 1, 'Dependent deleted', '117.242.62.95', NULL, '2016-01-13 01:42:52', '2016-01-13 01:42:52'),
(89, 1, 'Profile updated', '117.242.62.95', NULL, '2016-01-13 01:53:50', '2016-01-13 01:53:50'),
(90, 1, 'Dependent deleted', '117.242.62.95', NULL, '2016-01-13 01:59:19', '2016-01-13 01:59:19'),
(91, 1, 'Clocked in', '94.205.242.194', NULL, '2016-01-13 23:39:21', '2016-01-13 23:39:21'),
(92, 1, 'Clocked out', '94.205.242.194', NULL, '2016-01-14 00:21:20', '2016-01-14 00:21:20'),
(93, 1, 'Clocked out', '94.205.242.194', NULL, '2016-01-14 18:42:14', '2016-01-14 18:42:14'),
(94, 1, 'Clocked in', '94.205.242.194', NULL, '2016-01-18 20:17:53', '2016-01-18 20:17:53'),
(95, 1, 'Updated a leave request', '117.242.62.32', NULL, '2016-01-19 14:35:00', '2016-01-19 14:35:00'),
(96, 1, 'Added new transalation', '117.242.62.32', NULL, '2016-01-19 16:56:52', '2016-01-19 16:56:52'),
(97, 1, 'Profile updated', '202.133.59.201', NULL, '2016-01-19 21:12:41', '2016-01-19 21:12:41'),
(98, 1, 'Added new transalation', '117.242.62.32', NULL, '2016-01-19 21:21:55', '2016-01-19 21:21:55'),
(99, 1, 'Added new transalation', '117.242.62.32', NULL, '2016-01-19 21:24:07', '2016-01-19 21:24:07'),
(100, 1, 'Added new transalation', '117.242.62.32', NULL, '2016-01-19 21:29:51', '2016-01-19 21:29:51'),
(101, 1, 'Added new transalation', '117.242.62.32', NULL, '2016-01-19 21:30:11', '2016-01-19 21:30:11'),
(102, 1, 'Deleted a Custome Field', '117.242.62.32', NULL, '2016-01-19 22:27:52', '2016-01-19 22:27:52'),
(103, 1, 'Added new transalation', '117.200.24.113', NULL, '2016-01-21 18:29:33', '2016-01-21 18:29:33'),
(104, 1, 'Added new transalation', '117.200.24.113', NULL, '2016-01-21 18:35:43', '2016-01-21 18:35:43'),
(105, 1, 'Added new transalation', '117.200.24.113', NULL, '2016-01-21 19:02:28', '2016-01-21 19:02:28'),
(106, 1, 'Added new transalation', '117.200.24.113', NULL, '2016-01-21 21:45:50', '2016-01-21 21:45:50'),
(107, 1, 'Profile updated', '202.133.59.201', NULL, '2016-01-21 22:24:29', '2016-01-21 22:24:29'),
(108, 1, 'Added new transalation', '117.200.24.113', NULL, '2016-01-21 22:34:20', '2016-01-21 22:34:20'),
(109, 3, 'Clocked in', '117.200.24.113', NULL, '2016-01-21 23:28:19', '2016-01-21 23:28:19'),
(110, 3, 'Clocked out', '117.200.24.113', NULL, '2016-01-21 23:32:40', '2016-01-21 23:32:40'),
(111, 1, 'Added new transalation', '117.200.24.113', NULL, '2016-01-22 00:22:32', '2016-01-22 00:22:32'),
(112, 1, 'Added new transalation', '117.200.24.113', NULL, '2016-01-22 02:13:08', '2016-01-22 02:13:08'),
(113, 1, 'Clocked in', '213.165.42.230', NULL, '2016-03-06 23:34:27', '2016-03-06 23:34:27'),
(114, 1, 'Clocked in', '202.133.59.201', NULL, '2016-03-11 01:49:31', '2016-03-11 01:49:31'),
(115, 1, 'New Custom Field "Shoaib_Test" added', '103.35.168.38', NULL, '2016-03-26 03:14:54', '2016-03-26 03:14:54'),
(116, 1, 'New Custom Field "sadasd" added', '103.35.168.38', NULL, '2016-03-26 03:24:09', '2016-03-26 03:24:09'),
(117, 1, 'Deleted a Training', '::1', NULL, '2016-07-30 12:11:50', '2016-07-30 12:11:50'),
(118, 1, 'Department "Flate No-001" updated', '::1', NULL, '2016-10-03 08:45:01', '2016-10-03 08:45:01'),
(119, 1, 'Department "Flate NO-002" updated', '::1', NULL, '2016-10-03 08:45:30', '2016-10-03 08:45:30'),
(120, 1, 'Department "Flate NO-003" updated', '::1', NULL, '2016-10-03 08:45:58', '2016-10-03 08:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `alias`
--

CREATE TABLE IF NOT EXISTS `alias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `alias`
--

INSERT INTO `alias` (`id`, `alias_name`, `created_at`, `updated_at`) VALUES
(1, 'Company 1', '2016-01-21 19:03:59', '2016-01-21 19:03:59');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `app_description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('save_for_later','reject','select','unread') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'unread',
  `resume` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `job_id` (`job_id`),
  KEY `username` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE IF NOT EXISTS `assets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `asset_name` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `asset_code`, `asset_name`, `created_at`, `updated_at`) VALUES
(3, 'LP2', 'LENOVA LAPTOP 2', '2016-01-09 16:14:10', '2016-01-09 16:14:10'),
(4, 'LP 1', 'LENOVA LAPTOP 1', '2016-01-13 19:53:21', '2016-01-13 19:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_awards`
--

CREATE TABLE IF NOT EXISTS `assigned_awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `award_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`award_id`),
  KEY `award_id` (`award_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `assigned_tasks`
--

CREATE TABLE IF NOT EXISTS `assigned_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`task_id`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `attachment_description` text COLLATE utf8_unicode_ci NOT NULL,
  `task_id` int(11) NOT NULL,
  `attachment_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `attachment_username` (`attachment_username`),
  KEY `task_id` (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE IF NOT EXISTS `awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `award_type_id` int(11) NOT NULL,
  `gift` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cash` int(10) DEFAULT NULL,
  `month` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `year` year(4) NOT NULL,
  `award_description` text COLLATE utf8_unicode_ci NOT NULL,
  `award_date` date NOT NULL,
  `created_at` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `award_type_id` (`award_type_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `award_types`
--

CREATE TABLE IF NOT EXISTS `award_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `award_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `award_types`
--

INSERT INTO `award_types` (`id`, `award_name`, `created_at`, `updated_at`) VALUES
(1, 'Best Employee', '2015-12-31 20:56:28', '2015-12-31 20:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE IF NOT EXISTS `bank_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `bank_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `account_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ifsc_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bank_branch` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bank_accounts`
--

INSERT INTO `bank_accounts` (`id`, `user_id`, `bank_name`, `account_name`, `account_number`, `ifsc_code`, `bank_branch`, `created_at`, `updated_at`) VALUES
(1, 3, 'SBI', 'Johnson', '101000000', 'SB10', 'Delhi', '2016-01-12 18:49:37', '2016-01-12 23:49:37');

-- --------------------------------------------------------

--
-- Table structure for table `clock`
--

CREATE TABLE IF NOT EXISTS `clock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `date` date NOT NULL,
  `clock_in` datetime NOT NULL,
  `clock_out` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `clock`
--

INSERT INTO `clock` (`id`, `user_id`, `date`, `clock_in`, `clock_out`, `created_at`, `updated_at`) VALUES
(1, 1, '2015-12-31', '2015-12-31 16:05:32', '2015-12-31 16:05:48', '2015-12-31 10:35:48', '2015-12-31 21:05:48'),
(2, 3, '2016-01-02', '2016-01-02 14:16:25', NULL, '2016-01-02 19:16:25', '2016-01-02 19:16:25'),
(3, 2, '2016-01-02', '2016-01-02 14:19:15', NULL, '2016-01-02 19:19:15', '2016-01-02 19:19:15'),
(4, 1, '2016-01-02', '2016-01-02 16:43:50', '2016-01-02 16:54:08', '2016-01-02 11:24:09', '2016-01-02 21:54:08'),
(5, 1, '2016-01-14', '2016-01-14 09:00:00', '2016-01-14 13:42:14', '2016-01-14 08:12:14', '2016-01-14 18:42:14'),
(6, 1, '2016-01-07', '2016-01-07 20:14:18', NULL, '2016-01-08 01:14:18', '2016-01-08 01:14:18'),
(7, 1, '2016-01-13', '2016-01-13 18:39:21', '2016-01-13 19:21:20', '2016-01-13 13:51:20', '2016-01-14 00:21:20'),
(8, 1, '2016-01-18', '2016-01-18 15:17:53', NULL, '2016-01-18 20:17:53', '2016-01-18 20:17:53'),
(9, 3, '2016-01-21', '2016-01-21 04:00:00', '2016-01-21 10:00:00', '2016-01-21 13:25:31', '2016-01-21 23:55:31'),
(10, 1, '2016-03-06', '2016-03-06 18:34:27', NULL, '2016-03-06 23:34:27', '2016-03-06 23:34:27'),
(11, 1, '2016-03-10', '2016-03-10 20:49:31', NULL, '2016-03-11 01:49:31', '2016-03-11 01:49:31'),
(12, 1, '2016-02-01', '2016-02-01 09:00:00', '2016-02-01 18:00:00', '2016-03-11 23:26:26', '2016-03-11 23:26:26'),
(13, 1, '2016-07-06', '2016-07-06 01:25:00', NULL, '2016-07-28 14:35:48', '2016-07-28 14:35:48'),
(14, 2, '2016-07-20', '2016-07-20 08:50:00', '2016-07-20 14:55:00', '2016-07-28 14:36:20', '2016-07-28 14:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `comment_username` (`comment_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE IF NOT EXISTS `custom_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `field_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `field_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `field_type` enum('text','number','email','url','textarea','select','radio','checkbox') COLLATE utf8_unicode_ci NOT NULL,
  `field_values` text COLLATE utf8_unicode_ci,
  `field_required` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `form`, `field_name`, `field_title`, `field_type`, `field_values`, `field_required`, `created_at`, `updated_at`) VALUES
(1, 'employee-form', 'personal_id', 'Personal ID', 'text', '', 1, '2016-01-03 18:21:44', '2016-01-03 18:21:44'),
(3, 'employee-form', 'previous_salary_date', 'Previous salary date', 'text', '', 0, '2016-01-04 22:13:34', '2016-01-04 22:13:34'),
(4, 'employee-form', 'shoaib_test', 'Shoaib_Test', 'text', '', 1, '2016-03-26 03:14:54', '2016-03-26 03:14:54'),
(5, 'employee-form', 'sadasd', 'sadasd', 'text', '', 1, '2016-03-26 03:24:09', '2016-03-26 03:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `custom_field_values`
--

CREATE TABLE IF NOT EXISTS `custom_field_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` int(11) DEFAULT NULL,
  `field_id` int(11) NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `field_id` (`field_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `custom_field_values`
--

INSERT INTO `custom_field_values` (`id`, `unique_id`, `field_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '99087', '2016-01-07 02:01:33', '2016-01-07 02:01:33'),
(3, 2, 3, '', '2016-01-07 02:01:33', '2016-01-07 02:01:33'),
(5, 3, 1, 'PID', '2016-01-13 01:53:50', '2016-01-13 01:53:50'),
(7, 3, 3, '', '2016-01-13 01:53:50', '2016-01-13 01:53:50'),
(8, 1, 1, '876543A', '2016-01-19 21:12:41', '2016-01-19 21:12:41'),
(10, 1, 3, '', '2016-01-19 21:12:41', '2016-01-19 21:12:41');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ZIP` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `department_description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `street`, `city`, `state`, `ZIP`, `department_description`, `created_at`, `updated_at`) VALUES
(1, 'Flate No-001', '2600', 'New Yework', 'jeckson Height', '0945', '<p>sdgf</p>', '2016-10-03 09:15:01', '2016-10-03 08:45:01'),
(2, 'Flate NO-002', '324', 'New Yework', 'jeckson Height', '0945', '<p><br></p>', '2016-10-03 09:15:30', '2016-10-03 08:45:30'),
(3, 'Flate NO-003', '324', 'Boston', 'height', '0945', '<p>this is sales head and i have 10 sales persons under me.</p>', '2016-10-03 09:15:58', '2016-10-03 08:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `dependents`
--

CREATE TABLE IF NOT EXISTS `dependents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `relation` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `visa` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `document` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `dependents`
--

INSERT INTO `dependents` (`id`, `user_id`, `name`, `relation`, `visa`, `issue_date`, `expiry_date`, `document`, `created_at`, `updated_at`) VALUES
(3, 3, 'Johnson', 'Children', 'Company', '2016-01-01', '2016-02-04', '3-56951c0b9d6f7.docx', '2016-01-21 15:48:06', '2016-01-19 17:44:43'),
(4, 3, 'Johnny', 'Mother', 'Personal', '2016-01-01', '2016-02-29', '3-569dd571c9ef5.docx', '2016-01-21 15:56:17', '2016-01-19 17:27:04'),
(5, 3, 'jn', 'Father', 'Personal', '2016-01-02', '2016-01-31', '3-569ddf814358e.docx', '2016-01-19 07:13:48', '2016-01-19 17:43:48');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE IF NOT EXISTS `designations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `top_designation_id` int(11) DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  KEY `top_designation_id` (`top_designation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `department_id`, `top_designation_id`, `designation`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Admin', '2015-12-31 10:12:24', '0000-00-00 00:00:00'),
(3, 2, 1, 'Manager', '2016-01-02 15:25:08', '2016-01-02 15:25:08'),
(4, 2, 3, 'Employee', '2016-01-02 15:25:55', '2016-01-02 15:25:55'),
(5, 3, 3, 'assistant manager', '2016-01-02 21:46:26', '2016-01-02 21:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `document_type_id` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `document_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `document_description` text COLLATE utf8_unicode_ci NOT NULL,
  `document` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `document_type_id` (`document_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `document_type_id`, `expiry_date`, `document_title`, `document_description`, `document`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2016-02-20', 'Visa Doc', 'Description about Visa Document', '5694fcdf4c245.docx', '2016-01-21 15:13:51', '2016-01-12 23:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE IF NOT EXISTS `document_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `document_type_name`, `created_at`, `updated_at`) VALUES
(2, 'Doc', '2016-01-09 05:47:59', '2016-01-09 16:17:59'),
(3, 'Doc1', '2016-01-13 19:52:59', '2016-01-13 19:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `employeeasset`
--

CREATE TABLE IF NOT EXISTS `employeeasset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(100) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `return_date` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `employeeasset`
--

INSERT INTO `employeeasset` (`id`, `employee_id`, `asset_id`, `issue_date`, `comments`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 3, '2016-01-01', 'Please keep it safe and clean', '0000-00-00', 0, '2016-01-12 10:02:50', '2016-01-12 20:32:50'),
(5, 6, 3, '2015-12-01', 'With Additional Hard Disk, USB.', '2015-12-10', 1, '2016-01-12 09:33:50', '2016-01-12 20:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE IF NOT EXISTS `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_head_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `amount` int(11) NOT NULL,
  `expense_date` date NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `expense_head_id` (`expense_head_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `expense_heads`
--

CREATE TABLE IF NOT EXISTS `expense_heads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_head` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `expense_heads`
--

INSERT INTO `expense_heads` (`id`, `expense_head`, `created_at`, `updated_at`) VALUES
(1, 'Salary', '2015-12-31 20:58:07', '2015-12-31 20:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE IF NOT EXISTS `holidays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `holiday_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `date` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `date`, `holiday_description`, `created_at`, `updated_at`) VALUES
(1, '2016-01-01', 'weekly holiday', '2016-01-02 21:57:26', '2016-01-02 21:57:26'),
(2, '2016-01-23', 'public holiday', '2016-01-02 21:57:45', '2016-01-02 21:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `designation_id` int(11) NOT NULL,
  `numbers` int(11) NOT NULL,
  `job_description` text COLLATE utf8_unicode_ci,
  `status` enum('open','closed') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'open',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `designation_id` (`designation_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE IF NOT EXISTS `leaves` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `leave_description` text COLLATE utf8_unicode_ci NOT NULL,
  `leave_status` enum('pending','approved','rejected') COLLATE utf8_unicode_ci NOT NULL,
  `leave_comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`leave_type_id`),
  KEY `leaves_leave_type_id_foreign` (`leave_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `user_id`, `leave_type_id`, `from_date`, `to_date`, `leave_description`, `leave_status`, `leave_comment`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2016-01-04', '2016-01-06', '<p><br></p>', 'approved', '<p><br></p>', '2016-01-02 08:50:02', '2016-01-02 19:20:02'),
(2, 1, 1, '2016-01-15', '2016-01-18', '<p>Leave</p>', 'pending', '', '2016-01-19 04:05:00', '2016-01-19 14:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE IF NOT EXISTS `leave_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `leave_name`, `created_at`, `updated_at`) VALUES
(1, 'Casual Leave', '2015-12-31 20:56:55', '2015-12-31 20:56:55'),
(2, 'Sick Leaves', '2016-01-05 03:04:07', '2016-01-05 03:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `location_description` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`, `location_description`, `created_at`, `updated_at`) VALUES
(1, 'Suadi', '<p>Suadi Location</p>', '2016-01-07 19:26:54', '2016-01-07 19:26:54'),
(2, 'Dubai', '<p>Dubai<br></p>', '2016-01-07 22:03:37', '2016-01-07 22:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user_id` int(10) unsigned NOT NULL,
  `to_user_id` int(10) unsigned NOT NULL,
  `subject` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `read` int(11) NOT NULL,
  `delete_sender` int(11) NOT NULL DEFAULT '0',
  `delete_receiver` int(11) NOT NULL DEFAULT '0',
  `attachment` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `from_user_id` (`from_user_id`,`to_user_id`),
  KEY `to_user_id` (`to_user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user_id`, `to_user_id`, `subject`, `content`, `read`, `delete_sender`, `delete_receiver`, `attachment`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'leave request', '<p>hi ,</p><p><br></p><p>this is mohammed and i wanted to apply leave for next week.</p><p><br></p><p>kinldy approve.</p><p><br></p><p>ahmed sami.</p>', 1, 0, 0, '', '2016-01-02 11:22:39', '2016-01-02 21:52:39'),
(2, 8, 1, 'asf', '<p>sadg</p>', 1, 0, 0, '', '2016-10-03 10:16:29', '2016-10-03 09:46:29'),
(3, 8, 1, 'asdas', '<p>agasdg</p>', 1, 0, 0, '', '2016-10-03 10:16:43', '2016-10-03 09:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `note_content` text COLLATE utf8_unicode_ci NOT NULL,
  `note_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `unique_id` (`task_id`),
  KEY `username` (`note_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `content`, `from_date`, `to_date`, `username`, `created_at`, `updated_at`) VALUES
(1, 'HAPPY NEW YEAR', '<p>happy new year to nirsun team . And saturday is holiday for all.</p><p>Ahmed sami.</p>', '2016-01-01', '2016-01-02', 'admin', '2016-01-02 22:05:41', '2016-01-02 22:05:41');

-- --------------------------------------------------------

--
-- Table structure for table `notice_designation`
--

CREATE TABLE IF NOT EXISTS `notice_designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notice_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `notice_id` (`notice_id`),
  KEY `designation_id` (`designation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `notice_designation`
--

INSERT INTO `notice_designation` (`id`, `notice_id`, `designation_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('mdsamiahmed786@gmail.com', '4a9b41985adc9c67dc5c51309a2fb98bc4d99cd4a8089fb5f9bcde9049aba1d3', '2016-01-02 22:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE IF NOT EXISTS `payroll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payroll_slip_id` int(11) NOT NULL,
  `salary_type_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`salary_type_id`),
  KEY `salary_type_id` (`salary_type_id`),
  KEY `payroll_slip_id` (`payroll_slip_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `payroll_slip_id`, `salary_type_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '5000.00', '2016-01-14 07:26:47', '2016-01-14 17:56:47'),
(2, 1, 2, '2000.00', '2016-01-14 07:26:47', '2016-01-14 17:56:47'),
(3, 1, 3, '3000.00', '2016-01-14 07:26:47', '2016-01-14 17:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_slip`
--

CREATE TABLE IF NOT EXISTS `payroll_slip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_contribution` date DEFAULT NULL,
  `employee_contribution` decimal(10,2) NOT NULL DEFAULT '0.00',
  `employer_contribution` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payroll_slip`
--

INSERT INTO `payroll_slip` (`id`, `user_id`, `month`, `year`, `date_of_contribution`, `employee_contribution`, `employer_contribution`, `created_at`, `updated_at`) VALUES
(1, 1, '01', '2016', NULL, '0.00', '0.00', '2016-01-14 17:56:47', '2016-01-14 17:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `category`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'property', 'manage_department', 'Manage Property', '2015-08-27 22:08:03', '2015-08-27 22:08:03'),
(2, 'property', 'create_department', 'Create Property', '2015-08-27 22:08:51', '2015-08-27 22:08:51'),
(3, 'property', 'edit_department', 'Edit Property', '2015-08-27 22:08:57', '2015-08-27 22:08:57'),
(4, 'property', 'delete_department', 'Delete Property', '2015-08-28 07:26:54', '2015-08-28 07:26:54'),
(9, 'Tenants', 'manage_employee', 'Manage Tenants', '2015-08-28 08:08:41', NULL),
(10, 'Tenants', 'create_employee', 'Create Tenants', '2015-08-28 08:08:41', NULL),
(11, 'Tenants', 'edit_employee', 'Edit Tenants', '2015-08-28 08:09:00', NULL),
(12, 'Tenants', 'delete_employee', 'Delete Tenants', '2015-08-28 08:09:00', NULL),
(13, 'Tenants', 'profile_update_employee', 'Profile Update Tenants', '2015-08-28 08:11:16', NULL),
(14, 'Tenants', 'view_employee', 'View Tenants', '2015-08-28 08:11:16', NULL),
(57, 'sms', 'manage_message', 'Manage SMS', '2015-08-28 09:33:18', NULL),
(77, 'Tenants', 'reset_employee_password', 'Reset Tenants Password', '2015-10-11 14:03:23', NULL),
(78, 'Tenants', 'manage_all_employee', 'Manage All Tenants', '2015-10-25 07:04:51', NULL),
(79, 'Tenants', 'manage_subordinate', 'Manage Subordinate', '2015-10-25 07:04:51', NULL),
(102, 'Payment', 'pay_rent', 'Pay Rent', '2015-10-25 07:04:51', NULL),
(103, 'sms', 'manage_sms', 'manage_sms', '2015-10-25 07:04:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1, 102, 2),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 57, 2),
(7, 9, 2),
(8, 10, 2),
(9, 11, 2),
(10, 12, 2),
(11, 13, 2),
(12, 14, 2),
(13, 77, 2),
(14, 78, 2),
(15, 79, 2),
(16, 102, 3),
(17, 57, 3),
(18, 1, 1),
(19, 2, 1),
(20, 3, 1),
(21, 4, 1),
(22, 57, 1),
(23, 9, 1),
(24, 10, 1),
(25, 11, 1),
(26, 12, 1),
(27, 13, 1),
(28, 14, 1),
(29, 77, 1),
(30, 78, 1),
(31, 79, 1),
(32, 103, 2),
(33, 103, 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `employee_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `father_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_joining` date DEFAULT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `date_of_retirement` date DEFAULT NULL,
  `contact_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alternate_contact_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `alternate_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `present_address` text COLLATE utf8_unicode_ci NOT NULL,
  `permanent_address` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_link` text COLLATE utf8_unicode_ci NOT NULL,
  `twitter_link` text COLLATE utf8_unicode_ci NOT NULL,
  `blogger_link` text COLLATE utf8_unicode_ci NOT NULL,
  `linkedin_link` text COLLATE utf8_unicode_ci NOT NULL,
  `googleplus_link` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `employee_code`, `date_of_birth`, `father_name`, `mother_name`, `date_of_joining`, `date_of_leaving`, `date_of_retirement`, `contact_number`, `alternate_contact_number`, `alternate_email`, `present_address`, `permanent_address`, `photo`, `facebook_link`, `twitter_link`, `blogger_link`, `linkedin_link`, `googleplus_link`, `created_at`, `updated_at`) VALUES
(1, 1, '0001', NULL, '', '', NULL, NULL, NULL, '', '', '', '', '', '569e1321709f5.png', '', '', '', '', '', '2016-01-19 10:42:41', '2016-01-19 21:12:41'),
(2, 2, '001', NULL, '', '', NULL, NULL, NULL, '', '', '', '', '', '568d344c5042b.jpg', '', '', '', '', '', '2016-01-06 15:35:40', '2016-01-07 02:05:40'),
(3, 3, '002', NULL, '', '', NULL, NULL, NULL, '', '', '', '', '', '56951a86c37d7.png', '', '', '', '', '', '2016-01-12 15:23:50', '2016-01-13 01:53:50'),
(4, 4, '123456', NULL, '', '', NULL, NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '2016-01-02 21:48:22', '2016-01-02 21:48:22'),
(5, 5, 'e0001', NULL, '', '', NULL, NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '2016-01-03 18:14:46', '2016-01-03 18:14:46'),
(6, 6, '0010', NULL, '', '', NULL, NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '2016-01-07 22:56:29', '2016-01-07 22:56:29'),
(7, 7, '007', NULL, '', '', NULL, NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '2016-01-19 22:16:40', '2016-01-19 22:16:40'),
(8, 10, '100', NULL, '', '', NULL, NULL, NULL, '', '', '', '', '', NULL, '', '', '', '', '', '2016-10-03 08:47:16', '2016-10-03 08:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '0000-00-00 00:00:00', '2015-12-31 21:30:19'),
(2, 'manager', 'Manager', '2016-01-02 14:46:04', '2016-01-02 14:46:04'),
(3, 'user', 'User', '2016-01-02 14:46:24', '2016-01-02 14:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `assigned_roles_user_id_foreign` (`user_id`),
  KEY `assigned_roles_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(8, 8, 2),
(9, 9, 3),
(10, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `salary_type_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `salary_type_id` (`salary_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `user_id`, `salary_type_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '5000.00', '2016-03-11 12:54:59', '2016-03-11 23:24:59'),
(2, 1, 2, '1500.00', '2016-03-11 12:54:59', '2016-03-11 23:24:59'),
(3, 1, 3, '1000.00', '2016-03-11 12:54:59', '2016-03-11 23:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `salary_types`
--

CREATE TABLE IF NOT EXISTS `salary_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salary_head` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `salary_type` enum('earning','deduction') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `salary_head` (`salary_head`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `salary_types`
--

INSERT INTO `salary_types` (`id`, `salary_head`, `salary_type`, `created_at`, `updated_at`) VALUES
(1, 'Basic Salary', 'earning', '2015-12-31 20:57:48', '2015-12-31 20:57:48'),
(2, 'LIVING ALLOWANCE', 'earning', '2016-01-02 18:37:34', '2016-01-02 18:37:34'),
(3, 'FOOD ALLOWANCE', 'earning', '2016-01-02 18:37:49', '2016-01-02 18:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `task_description` text COLLATE utf8_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `due_date` date NOT NULL,
  `hours` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `task_progress` int(11) NOT NULL,
  `task_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `task_username` (`task_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `ticket_subject` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `ticket_description` text COLLATE utf8_unicode_ci,
  `ticket_priority` enum('low','medium','high','critical') COLLATE utf8_unicode_ci NOT NULL,
  `ticket_status` enum('open','closed') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_attachments`
--

CREATE TABLE IF NOT EXISTS `ticket_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `attachment_description` text COLLATE utf8_unicode_ci NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `attachment_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `attachment_username` (`attachment_username`),
  KEY `ticket_id` (`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_comments`
--

CREATE TABLE IF NOT EXISTS `ticket_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ticket_id` (`ticket_id`),
  KEY `comment_username` (`comment_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_notes`
--

CREATE TABLE IF NOT EXISTS `ticket_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `note_content` text COLLATE utf8_unicode_ci NOT NULL,
  `note_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `ticket_id` (`ticket_id`),
  KEY `username` (`note_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `visibility` enum('public','private') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'private',
  `todo_title` text COLLATE utf8_unicode_ci NOT NULL,
  `todo_description` text COLLATE utf8_unicode_ci,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `training_details`
--

CREATE TABLE IF NOT EXISTS `training_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `training_details`
--

INSERT INTO `training_details` (`id`, `training_name`) VALUES
(2, 'Human Resources Training'),
(4, 'Web Development'),
(5, 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `training_manage`
--

CREATE TABLE IF NOT EXISTS `training_manage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `result` varchar(200) NOT NULL,
  `duration` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_trn` (`training_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `training_manage`
--

INSERT INTO `training_manage` (`id`, `user_id`, `training_id`, `start_date`, `end_date`, `result`, `duration`, `description`) VALUES
(1, 1, 2, '2016-07-07', '2016-07-13', '12', 12, '<p>sdgasdg</p>'),
(2, 3, 5, '2016-07-06', '2016-07-27', '235', 12, '<p>sdgsdg</p>');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `property_id` int(11) NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `designation_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login_now` timestamp NULL DEFAULT NULL,
  `last_login_ip_now` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_id` int(11) NOT NULL,
  `payment_mode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `iban_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `emp_type` tinyint(4) NOT NULL,
  `alias_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `property_id`, `first_name`, `last_name`, `designation_id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `last_login`, `last_login_ip`, `last_login_now`, `last_login_ip_now`, `location_id`, `payment_mode`, `iban_number`, `emp_type`, `alias_id`) VALUES
(1, 0, 'Shoaib', 'ahmed', 1, 'admin', 'admin@demo.com', '$2y$10$SRBujDpvijyAztsU1naBremLXzieE1/eOgcgQVOdIjfIBLRZxCsaC', 'R9AwGqI426rztAe2dFqUSSJpaQFpieoVmxVJf43Ux3LhfKeDMkl8pNCys10n', '0000-00-00 00:00:00', '2016-10-03 09:59:22', '2016-10-03 09:46:23', '::1', '2016-10-03 09:59:22', '::1', 0, '', '', 0, 0),
(8, 0, 'Administrator', '', 1, 'administrator', 'ad23min@demo.com', '$2y$10$SRBujDpvijyAztsU1naBremLXzieE1/eOgcgQVOdIjfIBLRZxCsaC', 'B3gitkUjGe8jwshfC2gMxCbC6x82vy2yNZ5dxgJIaS0HcqKl9wEh0bl5ZKQ4', '0000-00-00 00:00:00', '2016-10-03 09:59:14', '2016-10-03 09:17:23', '::1', '2016-10-03 09:49:52', '::1', 0, '', '', 0, 0),
(9, 0, 'Tenants', '', 1, 'tenants', 'ad23m34in@demo.com', '$2y$10$SRBujDpvijyAztsU1naBremLXzieE1/eOgcgQVOdIjfIBLRZxCsaC', 'DYzIqLfTGFCdM3VrRED6AhTBCHEK0mXjx1qpYcy3VBcYvO88FnXj8ggjX2O5', '0000-00-00 00:00:00', '2016-10-03 09:17:01', '2016-10-03 09:06:07', '::1', '2016-10-03 09:10:42', '::1', 0, '', '', 0, 0),
(10, 1, 'asd', 'sdf', 1, 'emp-001', 'ashoab@ymail.com', '$2y$10$QRzzOACtty9bp5V/ASQlVu/yohTwa0JX.RSTKBPK8Pao7wsfDsY6C', '5ZnIwG89kSr8PwuUhIzbYBEMDHz9mIzoDKlCZSJvLUZyIMYXHO48j3O5zL5B', '2016-10-03 08:47:16', '2016-10-03 08:48:00', NULL, NULL, '2016-10-03 08:47:55', '::1', 0, '', '', 3, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_payroll_slip_id_foreign` FOREIGN KEY (`payroll_slip_id`) REFERENCES `payroll_slip` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payroll_salary_type_id_foreign` FOREIGN KEY (`salary_type_id`) REFERENCES `salary_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payroll_slip`
--
ALTER TABLE `payroll_slip`
  ADD CONSTRAINT `payroll_slip_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `assigned_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `assigned_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_salary_type_id_foreign` FOREIGN KEY (`salary_type_id`) REFERENCES `salary_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `salary_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_task_username_foreign` FOREIGN KEY (`task_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  ADD CONSTRAINT `ticket_attachments_attachment_username_foreign` FOREIGN KEY (`attachment_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_attachments_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_comments`
--
ALTER TABLE `ticket_comments`
  ADD CONSTRAINT `ticket_comments_comment_username_foreign` FOREIGN KEY (`comment_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_comments_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket_notes`
--
ALTER TABLE `ticket_notes`
  ADD CONSTRAINT `ticket_notes_note_username_foreign` FOREIGN KEY (`note_username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_notes_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `training_manage`
--
ALTER TABLE `training_manage`
  ADD CONSTRAINT `user_trn` FOREIGN KEY (`training_id`) REFERENCES `training_details` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
