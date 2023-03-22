-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for almai_db
CREATE DATABASE IF NOT EXISTS `almai_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `almai_db`;

-- Dumping structure for table almai_db.tbl_alumni
CREATE TABLE IF NOT EXISTS `tbl_alumni` (
  `alumni_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `alumni_fname` varchar(150) DEFAULT NULL,
  `alumni_mname` varchar(150) DEFAULT NULL,
  `alumni_lname` varchar(150) DEFAULT NULL,
  `alumni_gender` varchar(10) DEFAULT NULL,
  `alumni_contact` varchar(15) DEFAULT NULL,
  `alumni_address` varchar(255) DEFAULT NULL,
  `course_id` int(11) NOT NULL DEFAULT '0',
  `work_employer` varchar(255) DEFAULT NULL,
  `work_place` varchar(255) DEFAULT NULL,
  `work_designation` varchar(255) DEFAULT NULL,
  `alumni_graduation` date NOT NULL DEFAULT '0000-00-00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`alumni_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_alumni: ~0 rows (approximately)
INSERT INTO `tbl_alumni` (`alumni_id`, `user_id`, `alumni_fname`, `alumni_mname`, `alumni_lname`, `alumni_gender`, `alumni_contact`, `alumni_address`, `course_id`, `work_employer`, `work_place`, `work_designation`, `alumni_graduation`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Eduard', 'Rino', 'Carton', 'Male', '09096836075', 'Alijis, Bacolod City', 1, 'BPFC', 'Bredco Port Area Bacolod', 'IT Programmer', '2023-03-21', '2023-03-21 08:32:45', '2023-03-22 13:35:42');

-- Dumping structure for table almai_db.tbl_courses
CREATE TABLE IF NOT EXISTS `tbl_courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(150) NOT NULL DEFAULT '0',
  `course_status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_courses: ~2 rows (approximately)
INSERT INTO `tbl_courses` (`course_id`, `course_name`, `course_status`, `created_at`, `updated_at`) VALUES
	(1, 'BSIS', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(2, 'BSIT', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00');

-- Dumping structure for table almai_db.tbl_employer
CREATE TABLE IF NOT EXISTS `tbl_employer` (
  `employer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `employer_name` varchar(255) DEFAULT NULL,
  `employer_foundation` date DEFAULT NULL,
  `employer_address` varchar(255) DEFAULT NULL,
  `employer_contact` varchar(255) DEFAULT NULL,
  `employer_industry` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_employer: ~0 rows (approximately)

-- Dumping structure for table almai_db.tbl_skills
CREATE TABLE IF NOT EXISTS `tbl_skills` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_id` int(11) NOT NULL DEFAULT '0',
  `skill_name` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_skills: ~136 rows (approximately)
INSERT INTO `tbl_skills` (`skill_id`, `sc_id`, `skill_name`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Admin Assistant', '2023-03-22 14:29:06', '2023-03-22 15:19:11'),
	(2, 1, 'Appointment Setter', '2023-03-22 14:29:06', '2023-03-22 15:19:21'),
	(3, 1, 'Data Entry', '2023-03-22 14:29:06', '2023-03-22 15:19:27'),
	(4, 1, 'Email Management', '2023-03-22 14:29:06', '2023-03-22 15:19:33'),
	(5, 1, 'Event Planner', '2023-03-22 14:29:06', '2023-03-22 15:19:45'),
	(6, 1, 'Excel', '2023-03-22 14:29:06', '2023-03-22 15:19:52'),
	(7, 1, 'Human Resource Management', '2023-03-22 14:29:06', '2023-03-22 15:20:09'),
	(8, 1, 'Personal Assistant', '2023-03-22 14:29:06', '2023-03-22 15:20:25'),
	(9, 1, 'Project Coordinator', '2023-03-22 15:20:40', '0000-00-00 00:00:00'),
	(10, 1, 'Project Quality Assurance', '2023-03-22 15:20:40', '0000-00-00 00:00:00'),
	(11, 1, 'Recruitment Assistant', '2023-03-22 15:20:40', '0000-00-00 00:00:00'),
	(12, 1, 'Research', '2023-03-22 15:21:30', '2023-03-22 15:21:32'),
	(13, 1, 'Transcription', '2023-03-22 15:21:30', '2023-03-22 15:21:32'),
	(14, 1, 'Travel Planning', '2023-03-22 15:21:30', '2023-03-22 15:21:32'),
	(15, 2, 'Speaking', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(16, 2, 'Translation', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(17, 2, 'Tutoring Teaching', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(18, 2, 'Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(19, 3, 'Blogging', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(20, 3, 'Copywriting', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(21, 3, 'Creative Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(22, 3, 'Ebook Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(23, 3, 'Editing Proofreading', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(24, 3, 'Ghost Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(25, 3, 'Technical Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(26, 3, 'Web Content Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(27, 4, 'Affiliate Marketing', '2023-03-22 15:33:40', '2023-03-22 15:45:42'),
	(28, 4, 'Classified Ads Marketing', '2023-03-22 15:33:40', '2023-03-22 15:45:45'),
	(29, 4, 'Craigslist Marketing', '2023-03-22 15:33:40', '2023-03-22 15:45:45'),
	(30, 4, 'Direct Mail Marketing', '2023-03-22 15:33:40', '2023-03-22 15:45:45'),
	(31, 4, 'Email Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(32, 4, 'Facebook Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(33, 4, 'Instagram Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(34, 4, 'Lead Generation', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(35, 4, 'LinkedIn Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(36, 4, 'Mobile Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(37, 4, 'Private Blog Network', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(38, 4, 'Sales Representative', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(39, 4, 'SEM', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(40, 4, 'SEO', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(41, 4, 'Social Media Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(42, 4, 'Telemarketing', '2023-03-22 15:33:40', '2023-03-22 15:49:25'),
	(43, 4, 'Video Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(44, 4, 'YouTube Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(45, 5, 'Amazon Product Ads', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(46, 5, 'Bing Ads', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(47, 5, 'Creative advertising', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(48, 5, 'Facebook Ads', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(49, 5, 'Google AdWords', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(50, 5, 'Instagram Ads', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(51, 5, 'Media Buys', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(52, 5, 'Other Ad Platforms', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(53, 5, 'Scientific advertising', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(54, 5, 'Youtube Ads', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(55, 6, 'AngularJS', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(56, 6, 'ASP.NET', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(57, 6, 'ClickFunnels', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(58, 6, 'Drupal Development', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(59, 6, 'Infusionsoft', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(60, 6, 'Javascript', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(61, 6, 'Joomla Development', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(62, 6, 'Laravel', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(63, 6, 'Magento', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(64, 6, 'Mysql', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(65, 6, 'Node.js', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(66, 6, 'Optimizepress', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(67, 6, 'PHP', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(68, 6, 'React', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(69, 6, 'Ruby on Rails', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(70, 6, 'Shopify', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(71, 6, 'VueJS', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(72, 6, 'WooCommerce', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(73, 6, 'Wordpress Development', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(74, 7, 'Content Management', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(75, 7, 'Cpanel', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(76, 7, 'Css', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(77, 7, 'Drupal', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(78, 7, 'Ecommerce / Shopping Carts', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(79, 7, 'Google analytics', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(80, 7, 'Html', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(81, 7, 'Joomla', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(82, 7, 'Managing Servers', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(83, 7, 'PSD to HTML', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(84, 7, 'Webmaster Tools', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(85, 7, 'Wordpress', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(86, 8, '3D Modeling', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(87, 8, 'Adobe Indesign', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(88, 8, 'Animation Specialist', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(89, 8, 'Autocad', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(90, 8, 'Graphics Editing', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(91, 8, 'Illustrator', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(92, 8, 'Logo Design', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(93, 8, 'Photoshop', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(94, 8, 'Print Design', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(95, 8, 'Recording Audio', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(96, 8, 'Shirt Design', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(97, 8, 'User Interface Design', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(98, 8, 'Video Editing', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(99, 8, 'Web page Design', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(100, 9, 'Android development', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(101, 9, 'C#', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(102, 9, 'Desktop Applications', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(103, 9, 'Game development', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(104, 9, 'iOS development', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(105, 9, 'Python', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(106, 9, 'Software QA Testing', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(107, 10, 'Accounting', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(108, 10, 'Bookkeeping', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(109, 10, 'Business Plans', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(110, 10, 'Financial Analysis', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(111, 10, 'Financial Forecasting', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(112, 10, 'Financial Management', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(113, 10, 'Inventory Management', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(114, 10, 'Investment Researching', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(115, 10, 'Payroll', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(116, 10, 'Quickbooks', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(117, 10, 'Strategic Planning', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(118, 10, 'Tax Preparation', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(119, 10, 'Xero', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(120, 11, 'Community Forum Moderation', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(121, 11, 'Content Moderation', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(122, 11, 'Customer Support', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(123, 11, 'Email Support', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(124, 11, 'Phone Support', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(125, 11, 'Social Media Moderation', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(126, 11, 'Tech Support', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(127, 12, 'Architectural and Engineering Services', '2023-03-22 16:07:45', '2023-03-22 16:23:57'),
	(128, 12, 'Legal Services', '2023-03-22 16:07:45', '2023-03-22 16:24:05'),
	(129, 12, 'Medical Services', '2023-03-22 16:07:45', '2023-03-22 16:24:16'),
	(130, 12, 'Real Estate Services', '2023-03-22 16:07:45', '2023-03-22 16:24:29'),
	(131, 13, 'Design Project Management', '2023-03-22 16:07:45', '2023-03-22 16:25:06'),
	(132, 13, 'Marketing Project Management', '2023-03-22 16:07:45', '2023-03-22 16:25:58'),
	(133, 13, 'Other Project Management', '2023-03-22 16:07:45', '2023-03-22 16:26:01'),
	(134, 13, 'Software Development Project Management', '2023-03-22 16:07:45', '2023-03-22 16:26:11'),
	(135, 13, 'Web Development Project Management', '2023-03-22 16:07:45', '2023-03-22 16:26:30'),
	(136, 13, 'Writing Development Project Management', '2023-03-22 16:07:45', '2023-03-22 16:26:59');

-- Dumping structure for table almai_db.tbl_skills_category
CREATE TABLE IF NOT EXISTS `tbl_skills_category` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_name` varchar(150) DEFAULT NULL,
  `sc_description` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_skills_category: ~13 rows (approximately)
INSERT INTO `tbl_skills_category` (`sc_id`, `sc_name`, `sc_description`, `created_at`, `updated_at`) VALUES
	(1, 'Office & Admin (Virtual Assistant)', 'S', '2023-03-22 13:39:05', '2023-03-22 15:15:03'),
	(2, 'English', 'S', '2023-03-22 13:39:05', '2023-03-22 15:15:08'),
	(3, 'Writing', 'S', '2023-03-22 13:39:05', '2023-03-22 15:15:14'),
	(4, 'Sales and Marketing', 'S', '2023-03-22 13:39:05', '2023-03-22 15:15:24'),
	(5, 'Advertising', 'S', '2023-03-22 13:39:05', '2023-03-22 15:15:24'),
	(6, 'Web Development', 'S', '2023-03-22 13:39:05', '2023-03-22 15:15:24'),
	(7, 'Webmaster', NULL, '2023-03-22 15:16:10', '0000-00-00 00:00:00'),
	(8, 'Graphics & Multimedia', NULL, '2023-03-22 15:16:34', '0000-00-00 00:00:00'),
	(9, 'Software Development / Programming', NULL, '2023-03-22 15:16:58', '0000-00-00 00:00:00'),
	(10, 'Finance & Management', NULL, '2023-03-22 15:17:10', '0000-00-00 00:00:00'),
	(11, 'Customer Service & Admin Support', NULL, '2023-03-22 15:17:31', '0000-00-00 00:00:00'),
	(12, 'Proffessional Services', NULL, '2023-03-22 15:17:45', '0000-00-00 00:00:00'),
	(13, 'Project Management', NULL, '2023-03-22 15:17:54', '0000-00-00 00:00:00');

-- Dumping structure for table almai_db.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_category` varchar(1) NOT NULL COMMENT 'A=Admin,E=Employer,S=Student/Alumni',
  `user_status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_users: ~0 rows (approximately)
INSERT INTO `tbl_users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_category`, `user_status`, `created_at`, `update_at`) VALUES
	(1, 'Eduard Rino Carton', 'eduard16carton@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'S', 1, '2023-03-21 08:32:45', '0000-00-00 00:00:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
