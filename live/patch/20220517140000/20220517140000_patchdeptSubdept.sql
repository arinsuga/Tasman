-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2022 at 07:46 AM
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
-- Table structure for table `dept`
--

TRUNCATE TABLE dept;

INSERT INTO `dept` (`id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'MAN', 'Manajemen', 'Manajemen', 'Manajemen', 10, 1, NULL, NULL),
(2, 'DIR', 'Board Of Director', 'Direksi', 'Direksi', 20, 1, NULL, NULL),
(3, 'DNB', 'Accent', 'Accent', 'Accent', 30, 1, NULL, NULL),
(4, 'ART', 'Artwork', 'Artwork', 'Artwork', 40, 1, NULL, NULL),
(5, 'PLK', 'Disain and Build', 'Disain and Build', 'Disain and Build', 50, 1, NULL, NULL),
(6, 'KEU', 'Direktorat Keuangan', 'Direktorat Keuangan', 'Direktorat Keuangan', 60, 1, NULL, NULL),
(7, 'UMUM', 'Legal Corporate', 'Legal Corporate', 'Legal Corporate', 70, 1, NULL, NULL),
(8, 'HRD', 'SDM dan Umum', 'SDM dan Umum', 'SDM dan Umum', 80, 1, NULL, NULL),
(9, 'PRC', 'Perencanaan', 'Perencanaan', 'Perencanaan', 90, 1, NULL, NULL),
(10, 'SUP', 'Support', 'Support', 'Support', 100, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subdept`
--

TRUNCATE TABLE subdept;

INSERT INTO `subdept` (`id`, `dept_id`, `code`, `name`, `displayname`, `description`, `numsort`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'MAN', 'Manajemen', 'Manajemen', 'Manajemen', 10, 1, NULL, NULL),
(2, 2, 'DIR', 'Direksi', 'Direksi', 'Direksi', 11, 1, NULL, NULL),
(3, 3, 'DNB', 'DNB', 'DNB', 'DNB', 12, 1, NULL, NULL),
(4, 4, 'ART', 'Artwork', 'Artwork', 'Artwork', 13, 1, NULL, NULL),
(5, 5, 'PLK', 'Pelaksanaan', 'Pelaksanaan', 'Pelaksanaan', 14, 1, NULL, NULL),
(6, 6, 'KEU', 'Finance - Accounting', 'Finance – Accounting', 'Finance – Accounting', 15, 1, NULL, NULL),
(7, 7, 'UMUM', 'UMUM', 'UMUM', 'UMUM', 16, 1, NULL, NULL),
(8, 8, 'HRD', 'HRD', 'HRD', 'HRD', 17, 1, NULL, NULL),
(9, 9, 'ARS', 'Perencanaan Arsitek - Landscape', 'Perencanaan Arsitek - Landscape', 'Perencanaan Arsitek - Landscape', 18, 1, NULL, NULL),
(10, 9, 'INT', 'Perencanaan Interior - Special Lighting', 'Perencanaan Interior - Special Lighting', 'Perencanaan Interior - Special Lighting', 19, 1, NULL, NULL),
(12, 10, 'IT', 'IT', 'IT', 'IT', 21, 1, NULL, NULL),
(13, 10, 'MKT', 'Marketing', 'Marketing', 'Marketing', 22, 1, NULL, NULL),
(14, 10, 'LOG', 'Logistik', 'Logistik', 'Logistik', 23, 1, NULL, NULL),
(15, 10, 'QA', 'QA', 'QA', 'QA', 24, 1, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
