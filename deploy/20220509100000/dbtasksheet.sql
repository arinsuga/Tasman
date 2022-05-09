-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2022 at 03:22 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtasksheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `activitytype_id` int(11) DEFAULT NULL,
  `activitysubtype_id` int(11) DEFAULT NULL,
  `activitystatus_id` int(11) DEFAULT NULL,
  `tasktype_id` int(11) DEFAULT NULL,
  `tasksubtype1_id` int(11) DEFAULT NULL,
  `tasksubtype2_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `resolution` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startdt` datetime DEFAULT NULL,
  `enddt` datetime DEFAULT NULL,
  `enduser_id` bigint(20) DEFAULT NULL,
  `enduserdept_id` bigint(20) DEFAULT NULL,
  `technician_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `activitystatus`
--

DROP TABLE IF EXISTS `activitystatus`;
CREATE TABLE IF NOT EXISTS `activitystatus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `activitystatus`
--

INSERT INTO `activitystatus` (`id`, `name`, `description`, `image`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Open', 'Open', NULL, 10, 1, NULL, NULL),
(2, 'Close', 'Close', NULL, 20, 1, NULL, NULL),
(3, 'Pending', 'Pending', NULL, 30, 1, NULL, NULL),
(4, 'Cancel', 'Cancel', NULL, 40, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activitysubtype`
--

DROP TABLE IF EXISTS `activitysubtype`;
CREATE TABLE IF NOT EXISTS `activitysubtype` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `activitytype_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `activitysubtype`
--

INSERT INTO `activitysubtype` (`id`, `activitytype_id`, `name`, `description`, `image`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Request', 'Request', NULL, 10, 1, NULL, NULL),
(2, 1, 'Incident', 'Incident', NULL, 20, 1, NULL, NULL),
(3, 2, 'Reguler', 'Reguler', NULL, 30, 1, NULL, NULL),
(4, 2, 'Request', 'Request', NULL, 40, 1, NULL, NULL),
(5, 2, 'Incident', 'Incident', NULL, 50, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activitytype`
--

DROP TABLE IF EXISTS `activitytype`;
CREATE TABLE IF NOT EXISTS `activitytype` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `activitytype`
--

INSERT INTO `activitytype` (`id`, `name`, `description`, `image`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SUPPORT', 'Support Hardware, Software/Aplikasi, Jaringan, Troubleshoot, Request User', NULL, 10, 1, NULL, NULL),
(2, 'MAINTENANCE ', 'Perawatan Hardware, Software/Aplikasi dan Jaringan', NULL, 20, 1, NULL, NULL),
(3, 'PROJECT ', 'Project Hardware, Software/Aplikasi dan Networking', NULL, 30, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

DROP TABLE IF EXISTS `apps`;
CREATE TABLE IF NOT EXISTS `apps` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `code`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'tsk', 'Tasksheet', 'Task Management System', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

DROP TABLE IF EXISTS `app_user`;
CREATE TABLE IF NOT EXISTS `app_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`id`, `app_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bizunit`
--

DROP TABLE IF EXISTS `bizunit`;
CREATE TABLE IF NOT EXISTS `bizunit` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `bloodtype`
--

DROP TABLE IF EXISTS `bloodtype`;
CREATE TABLE IF NOT EXISTS `bloodtype` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `bloodtype`
--

INSERT INTO `bloodtype` (`id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A', 'A', 'A', 'A', 10, 1, NULL, NULL),
(2, 'B', 'B', 'B', 'B', 20, 1, NULL, NULL),
(3, 'AB', 'AB', 'AB', 'AB', 30, 1, NULL, NULL),
(4, 'O', 'O', 'O', 'O', 40, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ACCENT', 'Accent', 'Accent', 'Accent', 10, 1, NULL, NULL),
(2, 'BALI', 'Bali', 'Bali', 'Bali', 20, 1, NULL, NULL),
(3, 'GCH', 'Graha Cipta Hadiprana', 'Graha Cipta Hadiprana', 'Graha Cipta Hadiprana', 30, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

DROP TABLE IF EXISTS `dept`;
CREATE TABLE IF NOT EXISTS `dept` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KOM', 'Komisaris', 'Komisaris', 'Komisaris', 10, 1, NULL, NULL),
(2, 'BOD', 'Board Of Director', 'Direksi', 'Direksi', 20, 1, NULL, NULL),
(3, 'ACCENT', 'Accent', 'Accent', 'Accent', 30, 1, NULL, NULL),
(4, 'ART', 'Artwork', 'Artwork', 'Artwork', 40, 1, NULL, NULL),
(5, 'DNB', 'Disain and Build', 'Disain and Build', 'Disain and Build', 50, 1, NULL, NULL),
(6, 'KEU', 'Direktorat Keuangan', 'Direktorat Keuangan', 'Direktorat Keuangan', 60, 1, NULL, NULL),
(7, 'LEGAL', 'Legal Corporate', 'Legal Corporate', 'Legal Corporate', 70, 1, NULL, NULL),
(8, 'HRGA', 'SDM dan Umum', 'SDM dan Umum', 'SDM dan Umum', 80, 1, NULL, NULL),
(9, 'PRC', 'Perencanaan', 'Perencanaan', 'Perencanaan', 90, 1, NULL, NULL),
(10, 'SUP', 'Support', 'Support', 'Support', 100, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SMA', 'SMA', 'SMA', 'Sekolah Menengah Atas', 10, 1, NULL, NULL),
(2, 'SMK', 'SMK', 'SMK', 'Sekolah Menengah Kejuruan', 20, 1, NULL, NULL),
(3, 'D1', 'D1', 'D1', 'Ahli Pratama', 30, 1, NULL, NULL),
(4, 'D2', 'D2', 'D2', 'Ahli Muda', 40, 1, NULL, NULL),
(5, 'D3', 'D3', 'D3', 'Ahli Madya', 50, 1, NULL, NULL),
(6, 'S1', 'S1', 'S1', 'Sarjana', 60, 1, NULL, NULL),
(7, 'S2', 'S2', 'S2', 'Magister', 70, 1, NULL, NULL),
(8, 'S3', 'S3', 'S3', 'Doctor', 80, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noabsen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_dt` datetime DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annleave_balance` int(11) DEFAULT NULL,
  `annleave_lastdt` datetime DEFAULT NULL,
  `sabbatical_balance` int(11) DEFAULT NULL,
  `sabbatical_lastdt` datetime DEFAULT NULL,
  `join_dt` datetime DEFAULT NULL,
  `probstart_dt` datetime DEFAULT NULL,
  `probend_dt` datetime DEFAULT NULL,
  `contstart_dt` datetime DEFAULT NULL,
  `contend_dt` datetime DEFAULT NULL,
  `empstatus_id` int(11) DEFAULT NULL,
  `emptype_id` int(11) DEFAULT NULL,
  `inactivetype_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `superior_id` int(11) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `subdept_id` int(11) DEFAULT NULL,
  `bizunit_id` int(11) DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `marital_id` int(11) DEFAULT NULL,
  `bloodtype_id` int(11) DEFAULT NULL,
  `religion_id` int(11) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `education_id` int(11) DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp_province_id` int(11) DEFAULT NULL,
  `ktp_city_id` int(11) DEFAULT NULL,
  `ktp_street1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp_street2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp_street3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp_postal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dom_province_id` int(11) DEFAULT NULL,
  `dom_city_id` int(11) DEFAULT NULL,
  `dom_street1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dom_street2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dom_street3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_accountname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `empstatus`
--

DROP TABLE IF EXISTS `empstatus`;
CREATE TABLE IF NOT EXISTS `empstatus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `emptype`
--

DROP TABLE IF EXISTS `emptype`;
CREATE TABLE IF NOT EXISTS `emptype` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'LAKI-LAKI', 'Laki-laki', 'Laki-laki', 'Laki-laki', 10, 1, NULL, NULL),
(2, 'PEREMPUAN', 'Perempuan', 'Perempuan', 'Perempuan', 20, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inactivetype`
--

DROP TABLE IF EXISTS `inactivetype`;
CREATE TABLE IF NOT EXISTS `inactivetype` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FOUND', 'FOUNDER', 'FOUNDER', 'FOUNDER', 10, 1, NULL, NULL),
(2, 'KOM', 'KOMISARIS', 'KOMISARIS', 'KOMISARIS', 20, 1, NULL, NULL),
(3, 'DIRUT', 'DIREKTUR UTAMA', 'DIREKTUR UTAMA', 'DIREKTUR UTAMA', 30, 1, NULL, NULL),
(4, 'DIROPS', 'DIR. OPERASIONAL', 'DIR. OPERASIONAL', 'DIR. OPERASIONAL', 40, 1, NULL, NULL),
(5, 'FINCTL', 'FINANCIAL CONTROLLER', 'FINANCIAL CONTROLLER', 'FINANCIAL CONTROLLER', 50, 1, NULL, NULL),
(6, 'DISPRIN', 'PRINCIPAL DESAINER', 'PRINCIPAL DESAINER', 'PRINCIPAL DESAINER', 60, 1, NULL, NULL),
(7, 'KADEP', 'Kepala Departement', 'Kepala Departement', 'Kepala Departement', 70, 1, NULL, NULL),
(8, 'KADIV', 'Kepala Divisi', 'Kepala Divisi', 'Kepala Divisi', 80, 1, NULL, NULL),
(9, 'DIS', 'DESAINER', 'DESAINER', 'DESAINER', 90, 1, NULL, NULL),
(10, 'PM', 'PM', 'PM', 'PM', 100, 1, NULL, NULL),
(11, 'PPC', 'PPC', 'PPC', 'PPC', 110, 1, NULL, NULL),
(12, 'PROKO', 'Project Koordinator', 'Project Koordinator', 'Project Koordinator', 120, 1, NULL, NULL),
(13, 'HEADSTU', 'KEP. STUDIO PROD', 'KEP. STUDIO PROD', 'KEP. STUDIO PROD', 130, 1, NULL, NULL),
(14, 'QC', 'QUALITY CONTROL', 'QUALITY CONTROL', 'QUALITY CONTROL', 140, 1, NULL, NULL),
(15, 'ARSENG', 'Architect Engineer', 'Architect Engineer', 'Architect Engineer', 150, 1, NULL, NULL),
(16, 'DTLQCDRF', 'DETAILE / QCDRAFT', 'DETAILE / QCDRAFT', 'DETAILE / QCDRAFT', 160, 1, NULL, NULL),
(17, 'SPEKTOR', 'PRESPEKTOR', 'PRESPEKTOR', 'PRESPEKTOR', 170, 1, NULL, NULL),
(18, 'EST', 'ESTIMATOR', 'ESTIMATOR', 'ESTIMATOR', 180, 1, NULL, NULL),
(19, 'DISASS', 'ASS. DESAINER', 'ASS. DESAINER', 'ASS. DESAINER', 190, 1, NULL, NULL),
(20, 'DRAFTARS', 'DRAFTER ARSITEKTUR', 'DRAFTER ARSITEKTUR', 'DRAFTER ARSITEKTUR', 200, 1, NULL, NULL),
(21, 'ADM', 'ADMINISTRASI', 'ADMINISTRASI', 'ADMINISTRASI', 210, 1, NULL, NULL),
(22, 'PENGAWAS', 'PENGAWAS', 'PENGAWAS', 'PENGAWAS', 220, 1, NULL, NULL),
(23, 'ADPRO', 'ADPRO', 'ADPRO', 'ADPRO', 230, 1, NULL, NULL),
(24, '3DART', '3D ARTIS', '3D ARTIS', '3D ARTIS', 240, 1, NULL, NULL),
(25, 'DRAFTMKT', 'DRAFT MAKETTER', 'DRAFT MAKETTER', 'DRAFT MAKETTER', 250, 1, NULL, NULL),
(26, 'PLK', 'PELAKSANA', 'PELAKSANA', 'PELAKSANA', 260, 1, NULL, NULL),
(27, 'SM', 'SM', 'SM', 'SM', 270, 1, NULL, NULL),
(28, 'OPRTLP', 'OPERATOR TLP', 'OPERATOR TLP', 'OPERATOR TLP', 280, 1, NULL, NULL),
(29, 'KOORENG', 'KOOR ENGINEER', 'KOOR ENGINEER', 'KOOR ENGINEER', 290, 1, NULL, NULL),
(30, 'SPECWRT', 'SPECT WRITTER', 'SPECT WRITTER', 'SPECT WRITTER', 300, 1, NULL, NULL),
(31, 'ASSTPC', 'ASIST. PC', 'ASIST. PC', 'ASIST. PC', 310, 1, NULL, NULL),
(32, 'ILLUSTRATOR', 'ILLUSTRATOR', 'ILLUSTRATOR', 'ILLUSTRATOR', 320, 1, NULL, NULL),
(33, 'DRAFTER ', 'DRAFTER ', 'DRAFTER ', 'DRAFTER ', 330, 1, NULL, NULL),
(34, 'DTLSPECCTL', 'DETAIL SPEC.CONTROL', 'DETAIL SPEC.CONTROL', 'DETAIL SPEC.CONTROL', 340, 1, NULL, NULL),
(35, 'DRIVER', 'DRIVER', 'DRIVER', 'DRIVER', 350, 1, NULL, NULL),
(36, 'SECURITY', 'SECURITY', 'SECURITY', 'SECURITY', 360, 1, NULL, NULL),
(37, 'QA', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE', 370, 1, NULL, NULL),
(38, 'STAFFMKT', 'STAFF MARKETING', 'STAFF MARKETING', 'STAFF MARKETING', 380, 1, NULL, NULL),
(39, 'INTAUD', 'INTERNAL AUDIT', 'INTERNAL AUDIT', 'INTERNAL AUDIT', 390, 1, NULL, NULL),
(40, 'KSR', 'STAFF KASIR', 'STAFF KASIR', 'STAFF KASIR', 400, 1, NULL, NULL),
(41, 'SEXEC', 'SENIOR EXECUTIVE', 'SENIOR EXECUTIVE', 'SENIOR EXECUTIVE', 410, 1, NULL, NULL),
(42, 'STAFFGDG', 'STAFF GUDANG', 'STAFF GUDANG', 'STAFF GUDANG', 420, 1, NULL, NULL),
(43, 'KURIR', 'KURIR', 'KURIR', 'KURIR', 430, 1, NULL, NULL),
(44, 'DIRDIS', 'DIREKTUR DESAIN', 'DIREKTUR DESAIN', 'DIREKTUR DESAIN', 440, 1, NULL, NULL),
(45, 'KOORDKEND', 'KOORD. KENDARAAN', 'KOORD. KENDARAAN', 'KOORD. KENDARAAN', 450, 1, NULL, NULL),
(46, 'STAFFPJK', 'STAFF PAJAK', 'STAFF PAJAK', 'STAFF PAJAK', 460, 1, NULL, NULL),
(47, 'RECEPTIONIST', 'RECEPTIONIST', 'RECEPTIONIST', 'RECEPTIONIST', 470, 1, NULL, NULL),
(48, 'STAFFIT', 'STAFF IT', 'STAFF IT', 'STAFF IT', 480, 1, NULL, NULL),
(49, 'OFFBOY', 'OFFICE BOY', 'OFFICE BOY', 'OFFICE BOY', 490, 1, NULL, NULL),
(50, 'TEKHNISI', 'TEKHNISI', 'TEKHNISI', 'TEKHNISI', 500, 1, NULL, NULL),
(51, 'STAFFKEU', 'STAFF KEUANGAN', 'STAFF KEUANGAN', 'STAFF KEUANGAN', 510, 1, NULL, NULL),
(52, 'KORPRCDIS', 'KORD.PERENC/DIS', 'KORD.PERENC/DIS', 'KORD.PERENC/DIS', 520, 1, NULL, NULL),
(53, 'STAFFPLK', 'STAFF PELAKSANA', 'STAFF PELAKSANA', 'STAFF PELAKSANA', 530, 1, NULL, NULL),
(54, 'STAFFLOG', 'STAFF LOGISTIK', 'STAFF LOGISTIK', 'STAFF LOGISTIK', 540, 1, NULL, NULL),
(55, 'STAFFACT', 'STAFF ACCOUNTING', 'STAFF ACCOUNTING', 'STAFF ACCOUNTING', 550, 1, NULL, NULL),
(56, 'STAFFPERPUS', 'STAFF PERPUSTAKAAN', 'STAFF PERPUSTAKAAN', 'STAFF PERPUSTAKAAN', 560, 1, NULL, NULL),
(57, 'STAFFSEK', 'STAFF SEKRETARIAT', 'STAFF SEKRETARIAT', 'STAFF SEKRETARIAT', 570, 1, NULL, NULL),
(58, 'STAFFTAGIH', 'STAFF PENAGIHAN', 'STAFF PENAGIHAN', 'STAFF PENAGIHAN', 580, 1, NULL, NULL),
(59, 'KPSTUDIO', 'DRAFT/KP.STUDIO', 'DRAFT/KP.STUDIO', 'DRAFT/KP.STUDIO', 590, 1, NULL, NULL),
(60, 'ASS.DIS.LANDSCAPE', 'ASS.DIS.LANDSCAPE', 'ASS.DIS.LANDSCAPE', 'ASS.DIS.LANDSCAPE', 600, 1, NULL, NULL),
(61, 'DRAWING QC', 'DRAWING QC', 'DRAWING QC', 'DRAWING QC', 610, 1, NULL, NULL),
(62, 'PRODUKSI', 'PRODUKSI', 'PRODUKSI', 'PRODUKSI', 620, 1, NULL, NULL),
(63, 'STAFF PENUNJANG', 'STAFF PENUNJANG', 'STAFF PENUNJANG', 'STAFF PENUNJANG', 630, 1, NULL, NULL),
(64, 'PROJECT CONTROL', 'PROJECT CONTROL', 'PROJECT CONTROL', 'PROJECT CONTROL', 640, 1, NULL, NULL),
(65, 'ASS.ARSITEK', 'ASS.ARSITEK', 'ASS.ARSITEK', 'ASS.ARSITEK', 650, 1, NULL, NULL),
(66, 'ASS.PERENCANAAN', 'ASS.PERENCANAAN', 'ASS.PERENCANAAN', 'ASS.PERENCANAAN', 660, 1, NULL, NULL),
(67, 'LANDSCAPE', 'LANDSCAPE', 'LANDSCAPE', 'LANDSCAPE', 670, 1, NULL, NULL),
(68, 'STAFF DRAFTER', 'STAFF DRAFTER', 'STAFF DRAFTER', 'STAFF DRAFTER', 680, 1, NULL, NULL),
(69, 'SUPERVISOR', 'SUPERVISOR', 'SUPERVISOR', 'SUPERVISOR', 690, 1, NULL, NULL),
(70, 'COST CONTROL', 'COST CONTROL', 'COST CONTROL', 'COST CONTROL', 700, 1, NULL, NULL),
(71, 'Desainer Produk', 'Desainer Produk', 'Desainer Produk', 'Desainer Produk', 710, 1, NULL, NULL),
(72, 'DRAFTER LANDSCAPE', 'DRAFTER LANDSCAPE', 'DRAFTER LANDSCAPE', 'DRAFTER LANDSCAPE', 720, 1, NULL, NULL),
(73, 'KABAG OPERASIONAL', 'KABAG OPERASIONAL', 'KABAG OPERASIONAL', 'KABAG OPERASIONAL', 730, 1, NULL, NULL),
(74, 'Marketing Officer', 'Marketing Officer', 'Marketing Officer', 'Marketing Officer', 740, 1, NULL, NULL),
(75, 'INTERIOR ENGGINERING', 'INTERIOR ENGGINERING', 'INTERIOR ENGGINERING', 'INTERIOR ENGGINERING', 750, 1, NULL, NULL),
(76, 'Project Desainer', 'Project Desainer', 'Project Desainer', 'Project Desainer', 760, 1, NULL, NULL),
(77, 'ISO OFFICER', 'ISO OFFICER', 'ISO OFFICER', 'ISO OFFICER', 770, 1, NULL, NULL),
(78, 'PUBLIC RELATIONS', 'PUBLIC RELATIONS', 'PUBLIC RELATIONS', 'PUBLIC RELATIONS', 780, 1, NULL, NULL),
(79, 'Desainer Landscape', 'Desainer Landscape', 'Desainer Landscape', 'Desainer Landscape', 790, 1, NULL, NULL),
(80, 'MARKETING PELAKSANAAN', 'MARKETING PELAKSANAAN', 'MARKETING PELAKSANAAN', 'MARKETING PELAKSANAAN', 800, 1, NULL, NULL),
(81, 'IT Support', 'IT Support', 'IT Support', 'IT Support', 810, 1, NULL, NULL),
(82, 'IT Programmer', 'IT Programmer', 'IT Programmer', 'IT Programmer', 820, 1, NULL, NULL),
(83, 'Associate', 'Associate', 'Associate', 'Associate', 830, 1, NULL, NULL),
(84, 'Desainer Arsitektur', 'Desainer Arsitektur', 'Desainer Arsitektur', 'Desainer Arsitektur', 840, 1, NULL, NULL),
(85, 'Legal Officer', 'Legal Officer', 'Legal Officer', 'Legal Officer', 850, 1, NULL, NULL),
(86, 'Marketing Interior Designer', 'Marketing Interior Designer', 'Marketing Interior Designer', 'Marketing Interior Designer', 860, 1, NULL, NULL),
(87, 'Desainer Utama', 'Desainer Utama', 'Desainer Utama', 'Desainer Utama', 870, 1, NULL, NULL),
(88, 'Kepala Produksi', 'Kepala Produksi', 'Kepala Produksi', 'Kepala Produksi', 880, 1, NULL, NULL),
(89, 'Koordinator Project Control', 'Koordinator Project Control', 'Koordinator Project Control', 'Koordinator Project Control', 890, 1, NULL, NULL),
(90, 'Project Cost Controll', 'Project Cost Controll', 'Project Cost Controll', 'Project Cost Controll', 900, 1, NULL, NULL),
(91, 'Desainer Interior', 'Desainer Interior', 'Desainer Interior', 'Desainer Interior', 910, 1, NULL, NULL),
(92, 'Kepala Bagian Umum', 'Kepala Bagian Umum', 'Kepala Bagian Umum', 'Kepala Bagian Umum', 920, 1, NULL, NULL),
(93, 'Installer', 'Installer', 'Installer', 'Installer', 930, 1, NULL, NULL),
(94, 'Koordinator Principal Desainer', 'Koordinator Principal Desainer', 'Koordinator Principal Desainer', 'Koordinator Principal Desainer', 940, 1, NULL, NULL),
(95, 'Bussiness Development', 'Bussiness Development', 'Bussiness Development', 'Bussiness Development', 950, 1, NULL, NULL),
(96, 'Koord.Team Desainer', 'Koord.Team Desainer', 'Koord.Team Desainer', 'Koord.Team Desainer', 960, 1, NULL, NULL),
(97, 'Desainer Lighting', 'Desainer Lighting', 'Desainer Lighting', 'Desainer Lighting', 970, 1, NULL, NULL),
(98, 'Chief Security', 'Chief Security', 'Chief Security', 'Chief Security', 980, 1, NULL, NULL),
(99, 'Staff GA', 'Staff GA', 'Staff GA', 'Staff GA', 990, 1, NULL, NULL),
(100, 'Project Support Koordinator', 'Project Support Koordinator', 'Project Support Koordinator', 'Project Support Koordinator', 1000, 1, NULL, NULL),
(101, 'IT Server', 'IT Server', 'IT Server', 'IT Server', 1010, 1, NULL, NULL),
(102, 'IT Network', 'IT Network', 'IT Network', 'IT Network', 1020, 1, NULL, NULL),
(103, 'Brand Representative', 'Brand Representative', 'Brand Representative', 'Brand Representative', 1030, 1, NULL, NULL),
(104, 'Owner Representative', 'Owner Representative', 'Owner Representative', 'Owner Representative', 1040, 1, NULL, NULL),
(105, 'Supervisor Accounting', 'Supervisor Accounting', 'Supervisor Accounting', 'Supervisor Accounting', 1050, 1, NULL, NULL),
(106, 'Supervisor Keuangan', 'Supervisor Keuangan', 'Supervisor Keuangan', 'Supervisor Keuangan', 1060, 1, NULL, NULL),
(107, 'Staff HRD', 'Staff HRD', 'Staff HRD', 'Staff HRD', 1070, 1, NULL, NULL),
(108, 'Design Strategic Partner', 'Design Strategic Partner', 'Design Strategic Partner', 'Design Strategic Partner', 1080, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GOL01', 'Golongan 1', 'Golongan 1', 'Golongan 1', 10, 1, NULL, NULL),
(2, 'GOL02', 'Golongan 2', 'Golongan 2', 'Golongan 2', 20, 1, NULL, NULL),
(3, 'GOL03', 'Golongan 3', 'Golongan 3', 'Golongan 3', 30, 1, NULL, NULL),
(4, 'GOL04', 'Golongan 4', 'Golongan 4', 'Golongan 4', 40, 1, NULL, NULL),
(5, 'GOL05', 'Golongan 5', 'Golongan 5', 'Golongan 5', 50, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `marital`
--

DROP TABLE IF EXISTS `marital`;
CREATE TABLE IF NOT EXISTS `marital` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_01_29_083534_create_users_table', 1),
(2, '2019_01_29_083705_create_password_resets_table', 1),
(3, '2019_02_21_092749_create_apps_table', 1),
(4, '2019_02_21_093156_create_app_user_table', 1),
(5, '2019_02_23_232543_create_roles_table', 1),
(6, '2019_02_23_233448_create_role_user_table', 1),
(7, '2021_08_02_105640_create_activitytype_table', 1),
(8, '2021_08_02_105655_create_activity_table', 1),
(9, '2021_11_03_101204_create_employee_table', 1),
(10, '2021_11_11_085625_create_gender_table', 1),
(11, '2021_11_11_090447_create_bloodtype_table', 1),
(12, '2021_11_11_090600_create_religion_table', 1),
(13, '2021_11_11_090725_create_nationality_table', 1),
(14, '2021_11_11_090805_create_education_table', 1),
(15, '2021_11_11_090856_create_level_table', 1),
(16, '2021_11_11_091126_create_bizunit_table', 1),
(17, '2021_11_11_091200_create_subdept_table', 1),
(18, '2021_11_11_091235_create_dept_table', 1),
(19, '2021_11_11_091305_create_branch_table', 1),
(20, '2021_11_11_091447_create_superior_table', 1),
(21, '2021_11_11_091520_create_job_table', 1),
(22, '2021_11_11_091550_create_inactivetype_table', 1),
(23, '2021_11_11_091628_create_emptype_table', 1),
(24, '2021_11_11_091701_create_empstatus_table', 1),
(25, '2021_11_15_102325_create_marital_table', 1),
(26, '2022_01_20_120813_create_activitysubtype_table', 1),
(27, '2022_01_20_120831_create_tasktype_table', 1),
(28, '2022_01_20_120844_create_tasksubtype1_table', 1),
(29, '2022_02_02_140145_create_tasksubtype2_table', 1),
(30, '2022_02_04_125713_create_activitystatus_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nationality`
--

DROP TABLE IF EXISTS `nationality`;
CREATE TABLE IF NOT EXISTS `nationality` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `nationality`
--

INSERT INTO `nationality` (`id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'US', 'United States', 'United States', 'United States', 10, 1, NULL, NULL),
(2, 'AF', 'Afghanistan', 'Afghanistan', 'Afghanistan', 20, 1, NULL, NULL),
(3, 'AL', 'Albania', 'Albania', 'Albania', 30, 1, NULL, NULL),
(4, 'DZ', 'Algeria', 'Algeria', 'Algeria', 40, 1, NULL, NULL),
(5, 'AS', 'American Samoa', 'American Samoa', 'American Samoa', 50, 1, NULL, NULL),
(6, 'AD', 'Andorra', 'Andorra', 'Andorra', 60, 1, NULL, NULL),
(7, 'AO', 'Angola', 'Angola', 'Angola', 70, 1, NULL, NULL),
(8, 'AI', 'Anguilla', 'Anguilla', 'Anguilla', 80, 1, NULL, NULL),
(9, 'AQ', 'Antarctica', 'Antarctica', 'Antarctica', 90, 1, NULL, NULL),
(10, 'AG', 'Antigua and Barbuda', 'Antigua and Barbuda', 'Antigua and Barbuda', 100, 1, NULL, NULL),
(11, 'AR', 'Argentina', 'Argentina', 'Argentina', 110, 1, NULL, NULL),
(12, 'AM', 'Armenia', 'Armenia', 'Armenia', 120, 1, NULL, NULL),
(13, 'AW', 'Aruba', 'Aruba', 'Aruba', 130, 1, NULL, NULL),
(14, 'AU', 'Australia', 'Australia', 'Australia', 140, 1, NULL, NULL),
(15, 'AT', 'Austria', 'Austria', 'Austria', 150, 1, NULL, NULL),
(16, 'AZ', 'Azerbaijan', 'Azerbaijan', 'Azerbaijan', 160, 1, NULL, NULL),
(17, 'BS', 'Bahamas', 'Bahamas', 'Bahamas', 170, 1, NULL, NULL),
(18, 'BH', 'Bahrain', 'Bahrain', 'Bahrain', 180, 1, NULL, NULL),
(19, 'BD', 'Bangladesh', 'Bangladesh', 'Bangladesh', 190, 1, NULL, NULL),
(20, 'BB', 'Barbados', 'Barbados', 'Barbados', 200, 1, NULL, NULL),
(21, 'BY', 'Belarus', 'Belarus', 'Belarus', 210, 1, NULL, NULL),
(22, 'BE', 'Belgium', 'Belgium', 'Belgium', 220, 1, NULL, NULL),
(23, 'BZ', 'Belize', 'Belize', 'Belize', 230, 1, NULL, NULL),
(24, 'BJ', 'Benin', 'Benin', 'Benin', 240, 1, NULL, NULL),
(25, 'BM', 'Bermuda', 'Bermuda', 'Bermuda', 250, 1, NULL, NULL),
(26, 'BT', 'Bhutan', 'Bhutan', 'Bhutan', 260, 1, NULL, NULL),
(27, 'BO', 'Bolivia', 'Bolivia', 'Bolivia', 270, 1, NULL, NULL),
(28, 'BA', 'Bosnia-Herzegovina', 'Bosnia-Herzegovina', 'Bosnia-Herzegovina', 280, 1, NULL, NULL),
(29, 'BW', 'Botswana', 'Botswana', 'Botswana', 290, 1, NULL, NULL),
(30, 'BV', 'Bouvet Island', 'Bouvet Island', 'Bouvet Island', 300, 1, NULL, NULL),
(31, 'BR', 'Brazil', 'Brazil', 'Brazil', 310, 1, NULL, NULL),
(32, 'IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 'British Indian Ocean Territory', 320, 1, NULL, NULL),
(33, 'BN', 'Brunei Darussalam', 'Brunei Darussalam', 'Brunei Darussalam', 330, 1, NULL, NULL),
(34, 'BG', 'Bulgaria', 'Bulgaria', 'Bulgaria', 340, 1, NULL, NULL),
(35, 'BF', 'Burkina Faso', 'Burkina Faso', 'Burkina Faso', 350, 1, NULL, NULL),
(36, 'BI', 'Burundi', 'Burundi', 'Burundi', 360, 1, NULL, NULL),
(37, 'KH', 'Cambodia', 'Cambodia', 'Cambodia', 370, 1, NULL, NULL),
(38, 'CM', 'Cameroon', 'Cameroon', 'Cameroon', 380, 1, NULL, NULL),
(39, 'CV', 'Cape Verde', 'Cape Verde', 'Cape Verde', 390, 1, NULL, NULL),
(40, 'KY', 'Cayman Islands', 'Cayman Islands', 'Cayman Islands', 400, 1, NULL, NULL),
(41, 'CF', 'Central African Republic', 'Central African Republic', 'Central African Republic', 410, 1, NULL, NULL),
(42, 'TD', 'Chad', 'Chad', 'Chad', 420, 1, NULL, NULL),
(43, 'CL', 'Chile', 'Chile', 'Chile', 430, 1, NULL, NULL),
(44, 'CN', 'China', 'China', 'China', 440, 1, NULL, NULL),
(45, 'CX', 'Christmas Island', 'Christmas Island', 'Christmas Island', 450, 1, NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 'Cocos (Keeling) Islands', 460, 1, NULL, NULL),
(47, 'CO', 'Colombia', 'Colombia', 'Colombia', 470, 1, NULL, NULL),
(48, 'KM', 'Comoros', 'Comoros', 'Comoros', 480, 1, NULL, NULL),
(49, 'CG', 'Congo', 'Congo', 'Congo', 490, 1, NULL, NULL),
(50, 'CD', 'Congo (Democratic Republic)', 'Congo (Democratic Republic)', 'Congo (Democratic Republic)', 500, 1, NULL, NULL),
(51, 'CK', 'Cook Islands', 'Cook Islands', 'Cook Islands', 510, 1, NULL, NULL),
(52, 'CR', 'Costa Rica', 'Costa Rica', 'Costa Rica', 520, 1, NULL, NULL),
(53, 'HR', 'Croatia', 'Croatia', 'Croatia', 530, 1, NULL, NULL),
(54, 'CU', 'Cuba', 'Cuba', 'Cuba', 540, 1, NULL, NULL),
(55, 'CY', 'Cyprus', 'Cyprus', 'Cyprus', 550, 1, NULL, NULL),
(56, 'CZ', 'Czech Republic', 'Czech Republic', 'Czech Republic', 560, 1, NULL, NULL),
(57, 'DK', 'Denmark', 'Denmark', 'Denmark', 570, 1, NULL, NULL),
(58, 'DJ', 'Djibouti', 'Djibouti', 'Djibouti', 580, 1, NULL, NULL),
(59, 'DM', 'Dominica', 'Dominica', 'Dominica', 590, 1, NULL, NULL),
(60, 'DO', 'Dominican Republic', 'Dominican Republic', 'Dominican Republic', 600, 1, NULL, NULL),
(61, 'TP', 'East Timor', 'East Timor', 'East Timor', 610, 1, NULL, NULL),
(62, 'EC', 'Ecuador', 'Ecuador', 'Ecuador', 620, 1, NULL, NULL),
(63, 'EG', 'Egypt', 'Egypt', 'Egypt', 630, 1, NULL, NULL),
(64, 'SV', 'El Salvador', 'El Salvador', 'El Salvador', 640, 1, NULL, NULL),
(65, 'GQ', 'Equatorial Guinea', 'Equatorial Guinea', 'Equatorial Guinea', 650, 1, NULL, NULL),
(66, 'ER', 'Eritrea', 'Eritrea', 'Eritrea', 660, 1, NULL, NULL),
(67, 'EE', 'Estonia', 'Estonia', 'Estonia', 670, 1, NULL, NULL),
(68, 'ET', 'Ethiopia', 'Ethiopia', 'Ethiopia', 680, 1, NULL, NULL),
(69, 'FK', 'Falkland Islands', 'Falkland Islands', 'Falkland Islands', 690, 1, NULL, NULL),
(70, 'FO', 'Faroe Islands', 'Faroe Islands', 'Faroe Islands', 700, 1, NULL, NULL),
(71, 'FJ', 'Fiji', 'Fiji', 'Fiji', 710, 1, NULL, NULL),
(72, 'FI', 'Finland', 'Finland', 'Finland', 720, 1, NULL, NULL),
(73, 'FR', 'France', 'France', 'France', 730, 1, NULL, NULL),
(74, 'FX', 'France (European Territory)', 'France (European Territory)', 'France (European Territory)', 740, 1, NULL, NULL),
(75, 'GF', 'French Guiana', 'French Guiana', 'French Guiana', 750, 1, NULL, NULL),
(76, 'TF', 'French Southern Territories', 'French Southern Territories', 'French Southern Territories', 760, 1, NULL, NULL),
(77, 'GA', 'Gabon', 'Gabon', 'Gabon', 770, 1, NULL, NULL),
(78, 'GM', 'Gambia', 'Gambia', 'Gambia', 780, 1, NULL, NULL),
(79, 'GE', 'Georgia', 'Georgia', 'Georgia', 790, 1, NULL, NULL),
(80, 'DE', 'Germany', 'Germany', 'Germany', 800, 1, NULL, NULL),
(81, 'GH', 'Ghana', 'Ghana', 'Ghana', 810, 1, NULL, NULL),
(82, 'GI', 'Gibraltar', 'Gibraltar', 'Gibraltar', 820, 1, NULL, NULL),
(83, 'GR', 'Greece', 'Greece', 'Greece', 830, 1, NULL, NULL),
(84, 'GL', 'Greenland', 'Greenland', 'Greenland', 840, 1, NULL, NULL),
(85, 'GD', 'Grenada', 'Grenada', 'Grenada', 850, 1, NULL, NULL),
(86, 'GP', 'Guadeloupe', 'Guadeloupe', 'Guadeloupe', 860, 1, NULL, NULL),
(87, 'GU', 'Guam', 'Guam', 'Guam', 870, 1, NULL, NULL),
(88, 'GT', 'Guatemala', 'Guatemala', 'Guatemala', 880, 1, NULL, NULL),
(89, 'GN', 'Guinea', 'Guinea', 'Guinea', 890, 1, NULL, NULL),
(90, 'GW', 'Guinea Bissau', 'Guinea Bissau', 'Guinea Bissau', 900, 1, NULL, NULL),
(91, 'GY', 'Guyana', 'Guyana', 'Guyana', 910, 1, NULL, NULL),
(92, 'HT', 'Haiti', 'Haiti', 'Haiti', 920, 1, NULL, NULL),
(93, 'HM', 'Heard and McDonald Islands', 'Heard and McDonald Islands', 'Heard and McDonald Islands', 930, 1, NULL, NULL),
(94, 'VA', 'Holy See (Vatican)', 'Holy See (Vatican)', 'Holy See (Vatican)', 940, 1, NULL, NULL),
(95, 'HN', 'Honduras', 'Honduras', 'Honduras', 950, 1, NULL, NULL),
(96, 'HK', 'Hong Kong', 'Hong Kong', 'Hong Kong', 960, 1, NULL, NULL),
(97, 'HU', 'Hungary', 'Hungary', 'Hungary', 970, 1, NULL, NULL),
(98, 'IS', 'Iceland', 'Iceland', 'Iceland', 980, 1, NULL, NULL),
(99, 'IN', 'India', 'India', 'India', 990, 1, NULL, NULL),
(100, 'ID', 'Indonesia', 'Indonesia', 'Indonesia', 1000, 1, NULL, NULL),
(101, 'IR', 'Iran', 'Iran', 'Iran', 1010, 1, NULL, NULL),
(102, 'IQ', 'Iraq', 'Iraq', 'Iraq', 1020, 1, NULL, NULL),
(103, 'IE', 'Ireland', 'Ireland', 'Ireland', 1030, 1, NULL, NULL),
(104, 'IL', 'Israel', 'Israel', 'Israel', 1040, 1, NULL, NULL),
(105, 'IT', 'Italy', 'Italy', 'Italy', 1050, 1, NULL, NULL),
(106, 'CI', 'Ivory Coast (Cote D\'Ivoire)', 'Ivory Coast (Cote D\'Ivoire)', 'Ivory Coast (Cote D\'Ivoire)', 1060, 1, NULL, NULL),
(107, 'JM', 'Jamaica', 'Jamaica', 'Jamaica', 1070, 1, NULL, NULL),
(108, 'JP', 'Japan', 'Japan', 'Japan', 1080, 1, NULL, NULL),
(109, 'JO', 'Jordan', 'Jordan', 'Jordan', 1090, 1, NULL, NULL),
(110, 'KZ', 'Kazakhstan', 'Kazakhstan', 'Kazakhstan', 1100, 1, NULL, NULL),
(111, 'KE', 'Kenya', 'Kenya', 'Kenya', 1110, 1, NULL, NULL),
(112, 'KI', 'Kiribati', 'Kiribati', 'Kiribati', 1120, 1, NULL, NULL),
(113, 'KW', 'Kuwait', 'Kuwait', 'Kuwait', 1130, 1, NULL, NULL),
(114, 'KG', 'Kyrgyzstan', 'Kyrgyzstan', 'Kyrgyzstan', 1140, 1, NULL, NULL),
(115, 'LA', 'Laos', 'Laos', 'Laos', 1150, 1, NULL, NULL),
(116, 'LV', 'Latvia', 'Latvia', 'Latvia', 1160, 1, NULL, NULL),
(117, 'LB', 'Lebanon', 'Lebanon', 'Lebanon', 1170, 1, NULL, NULL),
(118, 'LS', 'Lesotho', 'Lesotho', 'Lesotho', 1180, 1, NULL, NULL),
(119, 'LR', 'Liberia', 'Liberia', 'Liberia', 1190, 1, NULL, NULL),
(120, 'LY', 'Libya', 'Libya', 'Libya', 1200, 1, NULL, NULL),
(121, 'LI', 'Liechtenstein', 'Liechtenstein', 'Liechtenstein', 1210, 1, NULL, NULL),
(122, 'LT', 'Lithuania', 'Lithuania', 'Lithuania', 1220, 1, NULL, NULL),
(123, 'LU', 'Luxembourg', 'Luxembourg', 'Luxembourg', 1230, 1, NULL, NULL),
(124, 'MO', 'Macau', 'Macau', 'Macau', 1240, 1, NULL, NULL),
(125, 'MK', 'Macedonia', 'Macedonia', 'Macedonia', 1250, 1, NULL, NULL),
(126, 'MG', 'Madagascar', 'Madagascar', 'Madagascar', 1260, 1, NULL, NULL),
(127, 'MW', 'Malawi', 'Malawi', 'Malawi', 1270, 1, NULL, NULL),
(128, 'MY', 'Malaysia', 'Malaysia', 'Malaysia', 1280, 1, NULL, NULL),
(129, 'MV', 'Maldives', 'Maldives', 'Maldives', 1290, 1, NULL, NULL),
(130, 'ML', 'Mali', 'Mali', 'Mali', 1300, 1, NULL, NULL),
(131, 'MT', 'Malta', 'Malta', 'Malta', 1310, 1, NULL, NULL),
(132, 'MH', 'Marshall Islands', 'Marshall Islands', 'Marshall Islands', 1320, 1, NULL, NULL),
(133, 'MQ', 'Martinique', 'Martinique', 'Martinique', 1330, 1, NULL, NULL),
(134, 'MR', 'Mauritania', 'Mauritania', 'Mauritania', 1340, 1, NULL, NULL),
(135, 'MU', 'Mauritius', 'Mauritius', 'Mauritius', 1350, 1, NULL, NULL),
(136, 'YT', 'Mayotte', 'Mayotte', 'Mayotte', 1360, 1, NULL, NULL),
(137, 'MX', 'Mexico', 'Mexico', 'Mexico', 1370, 1, NULL, NULL),
(138, 'FM', 'Micronesia', 'Micronesia', 'Micronesia', 1380, 1, NULL, NULL),
(139, 'MD', 'Moldova', 'Moldova', 'Moldova', 1390, 1, NULL, NULL),
(140, 'MC', 'Monaco', 'Monaco', 'Monaco', 1400, 1, NULL, NULL),
(141, 'MN', 'Mongolia', 'Mongolia', 'Mongolia', 1410, 1, NULL, NULL),
(142, 'MS', 'Montserrat', 'Montserrat', 'Montserrat', 1420, 1, NULL, NULL),
(143, 'MA', 'Morocco', 'Morocco', 'Morocco', 1430, 1, NULL, NULL),
(144, 'MZ', 'Mozambique', 'Mozambique', 'Mozambique', 1440, 1, NULL, NULL),
(145, 'MM', 'Myanmar', 'Myanmar', 'Myanmar', 1450, 1, NULL, NULL),
(146, 'NA', 'Namibia', 'Namibia', 'Namibia', 1460, 1, NULL, NULL),
(147, 'NR', 'Nauru', 'Nauru', 'Nauru', 1470, 1, NULL, NULL),
(148, 'NP', 'Nepal', 'Nepal', 'Nepal', 1480, 1, NULL, NULL),
(149, 'NL', 'Netherlands', 'Netherlands', 'Netherlands', 1490, 1, NULL, NULL),
(150, 'AN', 'Netherlands Antilles', 'Netherlands Antilles', 'Netherlands Antilles', 1500, 1, NULL, NULL),
(151, 'NC', 'New Caledonia', 'New Caledonia', 'New Caledonia', 1510, 1, NULL, NULL),
(152, 'NZ', 'New Zealand', 'New Zealand', 'New Zealand', 1520, 1, NULL, NULL),
(153, 'NI', 'Nicaragua', 'Nicaragua', 'Nicaragua', 1530, 1, NULL, NULL),
(154, 'NE', 'Niger', 'Niger', 'Niger', 1540, 1, NULL, NULL),
(155, 'NG', 'Nigeria', 'Nigeria', 'Nigeria', 1550, 1, NULL, NULL),
(156, 'NU', 'Niue', 'Niue', 'Niue', 1560, 1, NULL, NULL),
(157, 'NF', 'Norfolk Island', 'Norfolk Island', 'Norfolk Island', 1570, 1, NULL, NULL),
(158, 'KP', 'North Korea', 'North Korea', 'North Korea', 1580, 1, NULL, NULL),
(159, 'MP', 'Northern Mariana Islands', 'Northern Mariana Islands', 'Northern Mariana Islands', 1590, 1, NULL, NULL),
(160, 'NO', 'Norway', 'Norway', 'Norway', 1600, 1, NULL, NULL),
(161, 'OM', 'Oman', 'Oman', 'Oman', 1610, 1, NULL, NULL),
(162, 'PK', 'Pakistan', 'Pakistan', 'Pakistan', 1620, 1, NULL, NULL),
(163, 'PW', 'Palau', 'Palau', 'Palau', 1630, 1, NULL, NULL),
(164, 'PS', 'Palestinian Territory', 'Palestinian Territory', 'Palestinian Territory', 1640, 1, NULL, NULL),
(165, 'PA', 'Panama', 'Panama', 'Panama', 1650, 1, NULL, NULL),
(166, 'PG', 'Papua New Guinea', 'Papua New Guinea', 'Papua New Guinea', 1660, 1, NULL, NULL),
(167, 'PY', 'Paraguay', 'Paraguay', 'Paraguay', 1670, 1, NULL, NULL),
(168, 'PE', 'Peru', 'Peru', 'Peru', 1680, 1, NULL, NULL),
(169, 'PH', 'Philippines', 'Philippines', 'Philippines', 1690, 1, NULL, NULL),
(170, 'PN', 'Pitcairn', 'Pitcairn', 'Pitcairn', 1700, 1, NULL, NULL),
(171, 'PL', 'Poland', 'Poland', 'Poland', 1710, 1, NULL, NULL),
(172, 'PF', 'Polynesia', 'Polynesia', 'Polynesia', 1720, 1, NULL, NULL),
(173, 'PT', 'Portugal', 'Portugal', 'Portugal', 1730, 1, NULL, NULL),
(174, 'PR', 'Puerto Rico', 'Puerto Rico', 'Puerto Rico', 1740, 1, NULL, NULL),
(175, 'QA', 'Qatar', 'Qatar', 'Qatar', 1750, 1, NULL, NULL),
(176, 'RE', 'Reunion', 'Reunion', 'Reunion', 1760, 1, NULL, NULL),
(177, 'RO', 'Romania', 'Romania', 'Romania', 1770, 1, NULL, NULL),
(178, 'RU', 'Russian Federation', 'Russian Federation', 'Russian Federation', 1780, 1, NULL, NULL),
(179, 'RW', 'Rwanda', 'Rwanda', 'Rwanda', 1790, 1, NULL, NULL),
(180, 'GS', 'S. Georgia & S. Sandwich Isls.', 'S. Georgia & S. Sandwich Isls.', 'S. Georgia & S. Sandwich Isls.', 1800, 1, NULL, NULL),
(181, 'SH', 'Saint Helena', 'Saint Helena', 'Saint Helena', 1810, 1, NULL, NULL),
(182, 'KN', 'Saint Kitts & Nevis Anguilla', 'Saint Kitts & Nevis Anguilla', 'Saint Kitts & Nevis Anguilla', 1820, 1, NULL, NULL),
(183, 'LC', 'Saint Lucia', 'Saint Lucia', 'Saint Lucia', 1830, 1, NULL, NULL),
(184, 'PM', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 'Saint Pierre and Miquelon', 1840, 1, NULL, NULL),
(185, 'VC', 'Saint Vincent & Grenadines', 'Saint Vincent & Grenadines', 'Saint Vincent & Grenadines', 1850, 1, NULL, NULL),
(186, 'WS', 'Samoa', 'Samoa', 'Samoa', 1860, 1, NULL, NULL),
(187, 'SM', 'San Marino', 'San Marino', 'San Marino', 1870, 1, NULL, NULL),
(188, 'ST', 'Sao Tome and Principe', 'Sao Tome and Principe', 'Sao Tome and Principe', 1880, 1, NULL, NULL),
(189, 'SA', 'Saudi Arabia', 'Saudi Arabia', 'Saudi Arabia', 1890, 1, NULL, NULL),
(190, 'SN', 'Senegal', 'Senegal', 'Senegal', 1900, 1, NULL, NULL),
(191, 'SC', 'Seychelles', 'Seychelles', 'Seychelles', 1910, 1, NULL, NULL),
(192, 'SL', 'Sierra Leone', 'Sierra Leone', 'Sierra Leone', 1920, 1, NULL, NULL),
(193, 'SG', 'Singapore', 'Singapore', 'Singapore', 1930, 1, NULL, NULL),
(194, 'SK', 'Slovakia', 'Slovakia', 'Slovakia', 1940, 1, NULL, NULL),
(195, 'SI', 'Slovenia', 'Slovenia', 'Slovenia', 1950, 1, NULL, NULL),
(196, 'SB', 'Solomon Islands', 'Solomon Islands', 'Solomon Islands', 1960, 1, NULL, NULL),
(197, 'SO', 'Somalia', 'Somalia', 'Somalia', 1970, 1, NULL, NULL),
(198, 'ZA', 'South Africa', 'South Africa', 'South Africa', 1980, 1, NULL, NULL),
(199, 'KR', 'South Korea', 'South Korea', 'South Korea', 1990, 1, NULL, NULL),
(200, 'ES', 'Spain', 'Spain', 'Spain', 2000, 1, NULL, NULL),
(201, 'LK', 'Sri Lanka', 'Sri Lanka', 'Sri Lanka', 2010, 1, NULL, NULL),
(202, 'SD', 'Sudan', 'Sudan', 'Sudan', 2020, 1, NULL, NULL),
(203, 'SR', 'Suriname', 'Suriname', 'Suriname', 2030, 1, NULL, NULL),
(204, 'SZ', 'Swaziland', 'Swaziland', 'Swaziland', 2040, 1, NULL, NULL),
(205, 'SE', 'Sweden', 'Sweden', 'Sweden', 2050, 1, NULL, NULL),
(206, 'CH', 'Switzerland', 'Switzerland', 'Switzerland', 2060, 1, NULL, NULL),
(207, 'SY', 'Syrian Arab Republic', 'Syrian Arab Republic', 'Syrian Arab Republic', 2070, 1, NULL, NULL),
(208, 'TW', 'Taiwan', 'Taiwan', 'Taiwan', 2080, 1, NULL, NULL),
(209, 'TJ', 'Tajikistan', 'Tajikistan', 'Tajikistan', 2090, 1, NULL, NULL),
(210, 'TZ', 'Tanzania', 'Tanzania', 'Tanzania', 2100, 1, NULL, NULL),
(211, 'TH', 'Thailand', 'Thailand', 'Thailand', 2110, 1, NULL, NULL),
(212, 'TG', 'Togo', 'Togo', 'Togo', 2120, 1, NULL, NULL),
(213, 'TK', 'Tokelau', 'Tokelau', 'Tokelau', 2130, 1, NULL, NULL),
(214, 'TO', 'Tonga', 'Tonga', 'Tonga', 2140, 1, NULL, NULL),
(215, 'TT', 'Trinidad and Tobago', 'Trinidad and Tobago', 'Trinidad and Tobago', 2150, 1, NULL, NULL),
(216, 'TN', 'Tunisia', 'Tunisia', 'Tunisia', 2160, 1, NULL, NULL),
(217, 'TR', 'Turkey', 'Turkey', 'Turkey', 2170, 1, NULL, NULL),
(218, 'TM', 'Turkmenistan', 'Turkmenistan', 'Turkmenistan', 2180, 1, NULL, NULL),
(219, 'TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 'Turks and Caicos Islands', 2190, 1, NULL, NULL),
(220, 'TV', 'Tuvalu', 'Tuvalu', 'Tuvalu', 2200, 1, NULL, NULL),
(221, 'UG', 'Uganda ', 'Uganda ', 'Uganda ', 2210, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `religion`
--

DROP TABLE IF EXISTS `religion`;
CREATE TABLE IF NOT EXISTS `religion` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `religion`
--

INSERT INTO `religion` (`id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ISL', 'Islam', 'Islam', 'Islam', 10, 1, NULL, NULL),
(2, 'KRI', 'Kristen', 'Kristen', 'Kristen', 20, 1, NULL, NULL),
(3, 'KAT', 'Katolik', 'Katolik', 'Katolik', 30, 1, NULL, NULL),
(4, 'HIN', 'Hindu', 'Hindu', 'Hindu', 40, 1, NULL, NULL),
(5, 'BUD', 'Buddha', 'Buddha', 'Buddha', 50, 1, NULL, NULL),
(6, 'KHO', 'Khonghucu', 'Khonghucu', 'Khonghucu', 60, 1, NULL, NULL),
(7, 'SHI', 'Shinto', 'Shinto', 'Shinto', 70, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `app_id`, `code`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'adm', 'Super Admin', 'Role Super Admin memiliki akses ke semua feature aplikasi.', NULL, NULL),
(2, 1, 'post', 'Content Poster Admin', 'Role Content Poster hanya memiliki akses untuk memposting content.', NULL, NULL),
(3, 1, 'rpt', 'Content Reporter', 'Role Content Reporter hanya memiliki akses untuk membuat laporan.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `app_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `app_id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL),
(2, 1, 2, 2, NULL, NULL),
(3, 1, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subdept`
--

DROP TABLE IF EXISTS `subdept`;
CREATE TABLE IF NOT EXISTS `subdept` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `subdept`
--

INSERT INTO `subdept` (`id`, `dept_id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'KOM', 'Komisaris', 'Komisaris', 'Komisaris', 10, 1, NULL, NULL),
(2, 2, 'BOD', 'Board Of Director', 'Direksi', 'Direksi', 11, 1, NULL, NULL),
(3, 3, 'ACCENT', 'Accent', 'Accent', 'Accent', 12, 1, NULL, NULL),
(4, 4, 'ARTPLK', 'Pelaksanaan Artwork', 'Pelaksanaan Artwork', 'Pelaksanaan Artwork', 13, 1, NULL, NULL),
(5, 5, 'DNBPLK', 'Pelaksanaan dan MEP', 'Pelaksanaan dan MEP', 'Pelaksanaan dan MEP', 14, 1, NULL, NULL),
(6, 6, 'KEU', 'Direktorat Keuangan', 'Direktorat Keuangan', 'Direktorat Keuangan', 15, 1, NULL, NULL),
(7, 7, 'LEGAL', 'Legal Corporate', 'Legal Corporate', 'Legal Corporate', 16, 1, NULL, NULL),
(8, 8, 'HRGA', 'SDM dan Umum', 'SDM dan Umum', 'SDM dan Umum', 17, 1, NULL, NULL),
(9, 9, 'ARS', 'Perencanaan Arsitektur', 'Perencanaan Arsitektur', 'Perencanaan Arsitektur', 18, 1, NULL, NULL),
(10, 9, 'INT', 'Perencanaan Interior', 'Perencanaan Interior', 'Perencanaan Interior', 19, 1, NULL, NULL),
(11, 9, 'LGH', 'perencanaan Lighting', 'perencanaan Lighting', 'perencanaan Lighting', 20, 1, NULL, NULL),
(12, 10, 'IT', 'IT Support', 'IT Support', 'IT Support', 21, 1, NULL, NULL),
(13, 10, 'MKT', 'Marketing', 'Marketing', 'Marketing', 22, 1, NULL, NULL),
(14, 10, 'PS', 'Project Support', 'Project Support', 'Project Support', 23, 1, NULL, NULL),
(15, 10, 'QA', 'Quality Assurance', 'Quality Assurance', 'Quality Assurance', 24, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `superior`
--

DROP TABLE IF EXISTS `superior`;
CREATE TABLE IF NOT EXISTS `superior` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `displayname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tasksubtype1`
--

DROP TABLE IF EXISTS `tasksubtype1`;
CREATE TABLE IF NOT EXISTS `tasksubtype1` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `activitytype_id` int(11) DEFAULT NULL,
  `tasktype_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tasksubtype1`
--

INSERT INTO `tasksubtype1` (`id`, `activitytype_id`, `tasktype_id`, `name`, `description`, `image`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Add Email', 'Add Email', NULL, 10, 1, NULL, NULL),
(2, 1, 2, 'Email Client', 'Email Client', NULL, 20, 1, NULL, NULL),
(3, 1, 2, 'Email Client Setting', 'Email Client Setting', NULL, 30, 1, NULL, NULL),
(4, 1, 2, 'Email Group', 'Email Group', NULL, 40, 1, NULL, NULL),
(5, 1, 2, 'Webmail', 'Webmail', NULL, 50, 1, NULL, NULL),
(6, 1, 3, 'harddisk', 'harddisk', NULL, 60, 1, NULL, NULL),
(7, 1, 3, 'I/O Device', 'I/O Device', NULL, 70, 1, NULL, NULL),
(8, 1, 3, 'Memory', 'Memory', NULL, 80, 1, NULL, NULL),
(9, 1, 3, 'Monitor', 'Monitor', NULL, 90, 1, NULL, NULL),
(10, 1, 3, 'Motherboard', 'Motherboard', NULL, 100, 1, NULL, NULL),
(11, 1, 3, 'Power Suplay', 'Power Suplay', NULL, 110, 1, NULL, NULL),
(12, 1, 3, 'Processor', 'Processor', NULL, 120, 1, NULL, NULL),
(13, 1, 3, 'Scanner', 'Scanner', NULL, 130, 1, NULL, NULL),
(14, 1, 3, 'ThinClient', 'ThinClient', NULL, 140, 1, NULL, NULL),
(15, 1, 3, 'UPS', 'UPS', NULL, 150, 1, NULL, NULL),
(16, 1, 3, 'VGA', 'VGA', NULL, 160, 1, NULL, NULL),
(17, 1, 4, 'Login User', 'Login User', NULL, 170, 1, NULL, NULL),
(18, 1, 4, 'Password', 'Password', NULL, 180, 1, NULL, NULL),
(19, 1, 5, 'DHCP', 'DHCP', NULL, 190, 1, NULL, NULL),
(20, 1, 5, 'Firewall', 'Firewall', NULL, 200, 1, NULL, NULL),
(21, 1, 5, 'Internet', 'Internet', NULL, 210, 1, NULL, NULL),
(22, 1, 5, 'LAN', 'LAN', NULL, 220, 1, NULL, NULL),
(23, 1, 5, 'WAN', 'WAN', NULL, 230, 1, NULL, NULL),
(24, 1, 5, 'Wireless', 'Wireless', NULL, 240, 1, NULL, NULL),
(25, 1, 7, 'Plotter', 'Plotter', NULL, 250, 1, NULL, NULL),
(26, 1, 7, 'Print Quality', 'Print Quality', NULL, 260, 1, NULL, NULL),
(27, 1, 7, 'Printer Driver / Software', 'Printer Driver / Software', NULL, 270, 1, NULL, NULL),
(28, 1, 7, 'Printer Setting', 'Printer Setting', NULL, 280, 1, NULL, NULL),
(29, 1, 7, 'Toner / Cartridge', 'Toner / Cartridge', NULL, 290, 1, NULL, NULL),
(30, 1, 8, 'MS Project', 'MS Project', NULL, 300, 1, NULL, NULL),
(31, 1, 8, 'PWA', 'PWA', NULL, 310, 1, NULL, NULL),
(32, 1, 9, 'Cloud Server', 'Cloud Server', NULL, 320, 1, NULL, NULL),
(33, 1, 9, 'File Server', 'File Server', NULL, 330, 1, NULL, NULL),
(34, 1, 10, '3D Max', '3D Max', NULL, 340, 1, NULL, NULL),
(35, 1, 10, 'Adobe Reader', 'Adobe Reader', NULL, 350, 1, NULL, NULL),
(36, 1, 10, 'Antivirus', 'Antivirus', NULL, 360, 1, NULL, NULL),
(37, 1, 10, 'Autocad', 'Autocad', NULL, 370, 1, NULL, NULL),
(38, 1, 10, 'Browser', 'Browser', NULL, 380, 1, NULL, NULL),
(39, 1, 10, 'GstarCad', 'GstarCad', NULL, 390, 1, NULL, NULL),
(40, 1, 10, 'MS Office', 'MS Office', NULL, 400, 1, NULL, NULL),
(41, 1, 10, 'MSSQL Server', 'MSSQL Server', NULL, 410, 1, NULL, NULL),
(42, 1, 10, 'Operating System', 'Operating System', NULL, 420, 1, NULL, NULL),
(43, 1, 10, 'Other', 'Other', NULL, 430, 1, NULL, NULL),
(44, 1, 10, 'PDF', 'PDF', NULL, 440, 1, NULL, NULL),
(45, 1, 10, 'Photoshop', 'Photoshop', NULL, 450, 1, NULL, NULL),
(46, 1, 10, 'Remote Server', 'Remote Server', NULL, 460, 1, NULL, NULL),
(47, 1, 10, 'ServiceDesk Plus', 'ServiceDesk Plus', NULL, 470, 1, NULL, NULL),
(48, 1, 10, 'Sketchup', 'Sketchup', NULL, 480, 1, NULL, NULL),
(49, 1, 10, 'Virtual Memory', 'Virtual Memory', NULL, 490, 1, NULL, NULL),
(50, 1, 10, 'VRAY', 'VRAY', NULL, 500, 1, NULL, NULL),
(51, 1, 11, 'Akses Timesheet', 'Akses Timesheet', NULL, 510, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasksubtype2`
--

DROP TABLE IF EXISTS `tasksubtype2`;
CREATE TABLE IF NOT EXISTS `tasksubtype2` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `activitytype_id` int(11) DEFAULT NULL,
  `tasktype_id` int(11) DEFAULT NULL,
  `tasksubtype1_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tasksubtype2`
--

INSERT INTO `tasksubtype2` (`id`, `activitytype_id`, `tasktype_id`, `tasksubtype1_id`, `name`, `description`, `image`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 'MS Outlook', 'MS Outlook', NULL, 10, 1, NULL, NULL),
(2, 1, 2, 2, 'Thunderbird', 'Thunderbird', NULL, 20, 1, NULL, NULL),
(3, 1, 2, 2, 'Zimbra', 'Zimbra', NULL, 30, 1, NULL, NULL),
(4, 1, 2, 4, 'Add Email Group', 'Add Email Group', NULL, 40, 1, NULL, NULL),
(5, 1, 2, 4, 'Remove Email Group', 'Remove Email Group', NULL, 50, 1, NULL, NULL),
(6, 1, 3, 7, 'Keyboard', 'Keyboard', NULL, 60, 1, NULL, NULL),
(7, 1, 3, 7, 'Mouse', 'Mouse', NULL, 70, 1, NULL, NULL),
(8, 1, 3, 9, 'Monitor LCD', 'Monitor LCD', NULL, 80, 1, NULL, NULL),
(9, 1, 3, 9, 'Monitor LED', 'Monitor LED', NULL, 90, 1, NULL, NULL),
(10, 1, 3, 9, 'Tube', 'Tube', NULL, 100, 1, NULL, NULL),
(11, 1, 3, 10, 'Motherboard AMD', 'Motherboard AMD', NULL, 110, 1, NULL, NULL),
(12, 1, 3, 10, 'Motherboard Intel', 'Motherboard Intel', NULL, 120, 1, NULL, NULL),
(13, 1, 3, 13, 'Scanner A3', 'Scanner A3', NULL, 130, 1, NULL, NULL),
(14, 1, 3, 13, 'Scanner A4', 'Scanner A4', NULL, 140, 1, NULL, NULL),
(15, 1, 3, 14, 'Ncomputing', 'Ncomputing', NULL, 150, 1, NULL, NULL),
(16, 1, 3, 16, 'Onboard', 'Onboard', NULL, 160, 1, NULL, NULL),
(17, 1, 3, 16, 'PCI Ex', 'PCI Ex', NULL, 170, 1, NULL, NULL),
(18, 1, 4, 18, 'Change Password', 'Change Password', NULL, 180, 1, NULL, NULL),
(19, 1, 4, 18, 'Reset Password', 'Reset Password', NULL, 190, 1, NULL, NULL),
(20, 1, 9, 33, 'Access', 'Access', NULL, 200, 1, NULL, NULL),
(21, 1, 10, 34, 'Fix', 'Fix', NULL, 210, 1, NULL, NULL),
(22, 1, 10, 34, 'Install', 'Install', NULL, 220, 1, NULL, NULL),
(23, 1, 10, 34, 'Uninstall', 'Uninstall', NULL, 230, 1, NULL, NULL),
(24, 1, 10, 34, 'Upgrade', 'Upgrade', NULL, 240, 1, NULL, NULL),
(25, 1, 10, 35, 'Install', 'Install', NULL, 250, 1, NULL, NULL),
(26, 1, 10, 35, 'Uninstall', 'Uninstall', NULL, 260, 1, NULL, NULL),
(27, 1, 10, 36, 'Install', 'Install', NULL, 270, 1, NULL, NULL),
(28, 1, 10, 36, 'Uninstall', 'Uninstall', NULL, 280, 1, NULL, NULL),
(29, 1, 10, 38, 'Install', 'Install', NULL, 290, 1, NULL, NULL),
(30, 1, 10, 38, 'Uninstall', 'Uninstall', NULL, 300, 1, NULL, NULL),
(31, 1, 10, 40, 'Install', 'Install', NULL, 310, 1, NULL, NULL),
(32, 1, 10, 40, 'Uninstall', 'Uninstall', NULL, 320, 1, NULL, NULL),
(33, 1, 10, 40, 'Upgrade', 'Upgrade', NULL, 330, 1, NULL, NULL),
(34, 1, 10, 41, 'Install', 'Install', NULL, 340, 1, NULL, NULL),
(35, 1, 10, 41, 'Uninstall', 'Uninstall', NULL, 350, 1, NULL, NULL),
(36, 1, 11, 51, 'Login Timesheet', 'Login Timesheet', NULL, 360, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasktype`
--

DROP TABLE IF EXISTS `tasktype`;
CREATE TABLE IF NOT EXISTS `tasktype` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `activitytype_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numsort` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tasktype`
--

INSERT INTO `tasktype` (`id`, `activitytype_id`, `name`, `description`, `image`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Domain', 'Domain', NULL, 10, 1, NULL, NULL),
(2, 1, 'Email', 'Email', NULL, 20, 1, NULL, NULL),
(3, 1, 'Hardware', 'Hardware', NULL, 30, 1, NULL, NULL),
(4, 1, 'Login', 'Login', NULL, 40, 1, NULL, NULL),
(5, 1, 'Network', 'Network', NULL, 50, 1, NULL, NULL),
(6, 1, 'Others', 'Others', NULL, 60, 1, NULL, NULL),
(7, 1, 'Printers', 'Printers', NULL, 70, 1, NULL, NULL),
(8, 1, 'Project Server', 'Project Server', NULL, 80, 1, NULL, NULL),
(9, 1, 'Server', 'Server', NULL, 90, 1, NULL, NULL),
(10, 1, 'Software', 'Software', NULL, 100, 1, NULL, NULL),
(11, 1, 'Timsheet', 'Timsheet', NULL, 110, 1, NULL, NULL),
(12, 2, 'Server', 'Server', NULL, 120, 1, NULL, NULL),
(13, 2, 'PC', 'PC', NULL, 130, 1, NULL, NULL),
(14, 2, 'Printer/Plotter', 'Printer/Plotter', NULL, 140, 1, NULL, NULL),
(15, 2, 'Networking', 'Networking', NULL, 150, 1, NULL, NULL),
(16, 3, 'Hardware', 'Hardware', NULL, 160, 1, NULL, NULL),
(17, 3, 'Software', 'Software', NULL, 170, 1, NULL, NULL),
(18, 3, 'Network', 'Network', NULL, 180, 1, NULL, NULL),
(19, 3, 'Arsitek', 'Arsitek', NULL, 190, 1, NULL, NULL),
(20, 3, 'Interior', 'Interior', NULL, 200, 1, NULL, NULL),
(21, 3, 'Pelaksana', 'Pelaksana', NULL, 210, 1, NULL, NULL),
(22, 3, 'DnB', 'DnB', NULL, 220, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bo` tinyint(1) NOT NULL DEFAULT '0',
  `disabled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `bo`, `disabled`) VALUES
(1, 'Super Admin', 'superadmin@mail.com', '2022-05-09 02:47:32', '$2y$10$uLojOvY1X38XheIvcqPnderRi9R4nyHPc4sWHqee/tQ6AuPpTZmsW', 'EEbmp8fMMN', NULL, NULL, 1, 0),
(2, 'Post Admin', 'postadmin@mail.com', '2022-05-09 02:47:32', '$2y$10$JmkU81bcBAnAVhCQuGJyyuUWDCVXEdP8epv.JVB.qeEGUsvgZ/v66', 'uWWX6QLqtA', NULL, NULL, 1, 0),
(3, 'Report Admin', 'reportadmin@mail.com', '2022-05-09 02:47:33', '$2y$10$B1Ux5cbJpIDOBVPNAdlxxOU1TuCz6t32HgwXVJPgIhIQMtyE0eV72', 'pI1yv01msk', NULL, NULL, 1, 0),
(4, 'Guest 1', 'guest1@mail.com', '2022-05-09 02:47:33', '$2y$10$wKu5Hd2JvFDNAuT9hHHEtOndk3/fKzhCV.Oh0XvxmPJzoiLQn8CwC', 'pwYE7NXKxq', NULL, NULL, 0, 0),
(5, 'Guest 2', 'guest2@mail.com', '2022-05-09 02:47:33', '$2y$10$yOX5K7hoVLVCdhwbs5VMseEnXL5doxPV2GqYIGYf9dBPilL2ZMfHK', 'fuKrp3I7tb', NULL, NULL, 0, 0),
(6, 'Arief Sunjaya', 'arief_sunjaya@hadiprana.co.id', '2022-05-09 02:47:33', '$2y$10$DDy3gxyOyIqT3feHd2X6gOzQz4XysK5/ju290lww1EH6JPASx1/3K', 'NRRNuPLUeo', NULL, NULL, 1, 0),
(7, 'Hendi Pratama', 'hendi.pratama@hadiprana.co.id', '2022-05-09 02:47:33', '$2y$10$2oHkdTh0u8SNj/E/W2o4Y.Z2X18vxi3r1lzeu7wjdScT2Ml7DXEnm', 'CJVEfZj8za', NULL, NULL, 1, 0),
(9, 'Fandhi', 'fandhi@hadiprana.co.id', '2022-05-09 02:47:33', '$2y$10$vuv7zmR6t8T/QQw57hKWqu/sR/G6jmkRSCG795T7mIQOXcAKxQz72', 'pdgV2GqQgy', NULL, NULL, 1, 0),
(10, 'Arin', 'arinsuga@hadiprana.co.id', '2022-05-09 02:47:33', '$2y$10$fTyRJdNJdHeqVZQ/epMD7uyERsZy8TNzy5Jvzwn4fJ0VLSOMrqaJa', 'D1nwL7bn94', NULL, NULL, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
