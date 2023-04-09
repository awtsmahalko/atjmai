-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
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
  `alumni_graduation` date NOT NULL DEFAULT '0000-00-00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `alumni_job_title` varchar(50) DEFAULT NULL,
  `alumni_summary` text,
  `is_employed` int(1) NOT NULL,
  PRIMARY KEY (`alumni_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_alumni: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_alumni` DISABLE KEYS */;
INSERT INTO `tbl_alumni` (`alumni_id`, `user_id`, `alumni_fname`, `alumni_mname`, `alumni_lname`, `alumni_gender`, `alumni_contact`, `alumni_address`, `course_id`, `alumni_graduation`, `created_at`, `updated_at`, `alumni_job_title`, `alumni_summary`, `is_employed`) VALUES
	(1, 1, 'Eduard Rino', 'Questo', 'Carton', NULL, '', '', 1, '2018-03-04', '2023-04-06 14:44:05', '0000-00-00 00:00:00', 'IT Programmer', NULL, 1),
	(2, 2, 'Genesis', 'Carton', 'Francisco', NULL, '', '', 2, '2023-02-01', '2023-04-06 14:57:28', '0000-00-00 00:00:00', '', NULL, 0);
/*!40000 ALTER TABLE `tbl_alumni` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_alumni_educations
CREATE TABLE IF NOT EXISTS `tbl_alumni_educations` (
  `educ_id` int(11) NOT NULL AUTO_INCREMENT,
  `alumni_id` int(11) NOT NULL,
  `educ_degree` varchar(255) DEFAULT NULL,
  `educ_school` varchar(255) DEFAULT NULL,
  `year_enrolled` year(4) NOT NULL,
  `year_graduated` year(4) NOT NULL,
  `honor_received` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`educ_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_alumni_educations: ~4 rows (approximately)
/*!40000 ALTER TABLE `tbl_alumni_educations` DISABLE KEYS */;
INSERT INTO `tbl_alumni_educations` (`educ_id`, `alumni_id`, `educ_degree`, `educ_school`, `year_enrolled`, `year_graduated`, `honor_received`, `created_at`, `updated_at`) VALUES
	(1, 1, 'BSIS', 'Northern Negros State College of Science and Technology', '2014', '2018', '', '2023-04-06 14:44:05', NULL),
	(2, 2, 'BSIT', 'Northern Negros State College of Science and Technology', '2019', '2023', '', '2023-04-06 14:57:28', NULL),
	(3, 1, 'sdfsdfsd', 'fsdfsd', '0000', '0000', 'ffsdfsdfsdf', '2023-04-07 10:44:07', NULL);
/*!40000 ALTER TABLE `tbl_alumni_educations` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_alumni_skills
CREATE TABLE IF NOT EXISTS `tbl_alumni_skills` (
  `as_id` int(11) NOT NULL AUTO_INCREMENT,
  `alumni_id` int(11) NOT NULL DEFAULT '0',
  `skill_id` int(11) NOT NULL DEFAULT '0',
  `skill_rate` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`as_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_alumni_skills: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_alumni_skills` DISABLE KEYS */;
INSERT INTO `tbl_alumni_skills` (`as_id`, `alumni_id`, `skill_id`, `skill_rate`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 2, '2023-04-06 14:53:28', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_alumni_skills` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_alumni_skills_category
CREATE TABLE IF NOT EXISTS `tbl_alumni_skills_category` (
  `asc_id` int(11) NOT NULL AUTO_INCREMENT,
  `alumni_id` int(11) NOT NULL DEFAULT '0',
  `sc_id` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`asc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_alumni_skills_category: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_alumni_skills_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_alumni_skills_category` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_candidates
CREATE TABLE IF NOT EXISTS `tbl_candidates` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `alumni_id` int(11) NOT NULL DEFAULT '0',
  `job_id` int(11) NOT NULL DEFAULT '0',
  `employer_id` int(11) NOT NULL DEFAULT '0',
  `candidate_status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_candidates: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_candidates` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_candidates` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_colleges
CREATE TABLE IF NOT EXISTS `tbl_colleges` (
  `college_id` int(11) NOT NULL AUTO_INCREMENT,
  `college_name` varchar(150) NOT NULL DEFAULT '0',
  `college_status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`college_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_colleges: ~3 rows (approximately)
/*!40000 ALTER TABLE `tbl_colleges` DISABLE KEYS */;
INSERT INTO `tbl_colleges` (`college_id`, `college_name`, `college_status`, `created_at`, `updated_at`) VALUES
	(1, 'College of Computer Studies', 0, '2023-04-07 10:58:07', '0000-00-00 00:00:00'),
	(3, 'College of Education', 0, '2023-04-07 11:11:31', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_colleges` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `tbl_courses` DISABLE KEYS */;
INSERT INTO `tbl_courses` (`course_id`, `course_name`, `course_status`, `created_at`, `updated_at`) VALUES
	(1, 'BSIS', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(2, 'BSIT', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_courses` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_employers
CREATE TABLE IF NOT EXISTS `tbl_employers` (
  `employer_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `industry_id` int(11) NOT NULL DEFAULT '0',
  `sub_industry_id` int(11) NOT NULL DEFAULT '0',
  `employer_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_contact` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_description` text,
  `employees_number` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`employer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_employers: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_employers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_employers` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_industries
CREATE TABLE IF NOT EXISTS `tbl_industries` (
  `industry_id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_name` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`industry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_industries: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_industries` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_industries` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_jobs
CREATE TABLE IF NOT EXISTS `tbl_jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_id` int(11) DEFAULT '0',
  `job_title` varchar(250) DEFAULT NULL,
  `job_description` text,
  `job_type_id` int(11) NOT NULL DEFAULT '0',
  `job_sched_id` int(11) NOT NULL DEFAULT '0',
  `hire_needed` int(11) NOT NULL DEFAULT '0',
  `expected_hire_date` varchar(50) DEFAULT NULL,
  `salary_details` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_jobs` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_job_schedules
CREATE TABLE IF NOT EXISTS `tbl_job_schedules` (
  `job_sched_id` int(11) NOT NULL AUTO_INCREMENT,
  `sched_name` varchar(150) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_sched_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_job_schedules: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_job_schedules` DISABLE KEYS */;
INSERT INTO `tbl_job_schedules` (`job_sched_id`, `sched_name`, `created_at`, `updated_at`) VALUES
	(1, 'Flextime', '2023-03-31 08:14:31', '0000-00-00 00:00:00'),
	(2, '8 hour shift', '2023-03-31 08:14:43', '0000-00-00 00:00:00'),
	(3, '10 hour shift', '2023-03-31 08:15:01', '0000-00-00 00:00:00'),
	(4, '12 hour shift', '2023-03-31 08:15:12', '0000-00-00 00:00:00'),
	(5, 'Shift system', '2023-03-31 08:15:27', '0000-00-00 00:00:00'),
	(6, 'Early shift', '2023-03-31 08:15:39', '0000-00-00 00:00:00'),
	(7, 'Day Shift', '2023-03-31 08:15:48', '0000-00-00 00:00:00'),
	(8, 'Afternoon Shift', '2023-03-31 08:16:04', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_job_schedules` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_job_skills
CREATE TABLE IF NOT EXISTS `tbl_job_skills` (
  `job_skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL DEFAULT '0',
  `skill_rating` int(11) NOT NULL DEFAULT '0',
  `job_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_skill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_job_skills: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_job_skills` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_job_skills` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_job_types
CREATE TABLE IF NOT EXISTS `tbl_job_types` (
  `job_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_type_name` varchar(150) DEFAULT NULL,
  `job_type_status` int(1) DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_job_types: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_job_types` DISABLE KEYS */;
INSERT INTO `tbl_job_types` (`job_type_id`, `job_type_name`, `job_type_status`, `created_at`, `updated_at`) VALUES
	(1, 'Full-time', 1, '2023-03-31 08:08:55', '0000-00-00 00:00:00'),
	(2, 'Part-time', 1, '2023-03-31 08:09:09', '0000-00-00 00:00:00'),
	(3, 'Permanent', 1, '2023-03-31 08:09:25', '0000-00-00 00:00:00'),
	(4, 'Fixed Term', 1, '2023-03-31 08:09:42', '0000-00-00 00:00:00'),
	(5, 'Temporary', 1, '2023-03-31 08:09:54', '0000-00-00 00:00:00'),
	(6, 'OJT (On the job training)', 1, '2023-03-31 08:10:16', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_job_types` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_skills
CREATE TABLE IF NOT EXISTS `tbl_skills` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_industry_id` int(11) DEFAULT NULL,
  `sc_id` int(11) NOT NULL DEFAULT '0',
  `skill_name` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_skills: ~136 rows (approximately)
/*!40000 ALTER TABLE `tbl_skills` DISABLE KEYS */;
INSERT INTO `tbl_skills` (`skill_id`, `sub_industry_id`, `sc_id`, `skill_name`, `created_at`, `updated_at`) VALUES
	(1, NULL, 1, 'Admin Assistant', '2023-03-22 14:29:06', '2023-03-22 15:19:11'),
	(2, NULL, 1, 'Appointment Setter', '2023-03-22 14:29:06', '2023-03-22 15:19:21'),
	(3, NULL, 1, 'Data Entry', '2023-03-22 14:29:06', '2023-03-22 15:19:27'),
	(4, NULL, 1, 'Email Management', '2023-03-22 14:29:06', '2023-03-22 15:19:33'),
	(5, NULL, 1, 'Event Planner', '2023-03-22 14:29:06', '2023-03-22 15:19:45'),
	(6, NULL, 1, 'Excel', '2023-03-22 14:29:06', '2023-03-22 15:19:52'),
	(7, NULL, 1, 'Human Resource Management', '2023-03-22 14:29:06', '2023-03-22 15:20:09'),
	(8, NULL, 1, 'Personal Assistant', '2023-03-22 14:29:06', '2023-03-22 15:20:25'),
	(9, NULL, 1, 'Project Coordinator', '2023-03-22 15:20:40', '0000-00-00 00:00:00'),
	(10, NULL, 1, 'Project Quality Assurance', '2023-03-22 15:20:40', '0000-00-00 00:00:00'),
	(11, NULL, 1, 'Recruitment Assistant', '2023-03-22 15:20:40', '0000-00-00 00:00:00'),
	(12, NULL, 1, 'Research', '2023-03-22 15:21:30', '2023-03-22 15:21:32'),
	(13, NULL, 1, 'Transcription', '2023-03-22 15:21:30', '2023-03-22 15:21:32'),
	(14, NULL, 1, 'Travel Planning', '2023-03-22 15:21:30', '2023-03-22 15:21:32'),
	(15, NULL, 2, 'Speaking', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(16, NULL, 2, 'Translation', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(17, NULL, 2, 'Tutoring Teaching', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(18, NULL, 2, 'Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(19, NULL, 3, 'Blogging', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(20, NULL, 3, 'Copywriting', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(21, NULL, 3, 'Creative Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(22, NULL, 3, 'Ebook Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(23, NULL, 3, 'Editing Proofreading', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(24, NULL, 3, 'Ghost Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(25, NULL, 3, 'Technical Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(26, NULL, 3, 'Web Content Writing', '2023-03-22 15:33:40', '2023-03-22 15:33:45'),
	(27, NULL, 4, 'Affiliate Marketing', '2023-03-22 15:33:40', '2023-03-22 15:45:42'),
	(28, NULL, 4, 'Classified Ads Marketing', '2023-03-22 15:33:40', '2023-03-22 15:45:45'),
	(29, NULL, 4, 'Craigslist Marketing', '2023-03-22 15:33:40', '2023-03-22 15:45:45'),
	(30, NULL, 4, 'Direct Mail Marketing', '2023-03-22 15:33:40', '2023-03-22 15:45:45'),
	(31, NULL, 4, 'Email Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(32, NULL, 4, 'Facebook Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(33, NULL, 4, 'Instagram Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(34, NULL, 4, 'Lead Generation', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(35, NULL, 4, 'LinkedIn Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(36, NULL, 4, 'Mobile Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(37, NULL, 4, 'Private Blog Network', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(38, NULL, 4, 'Sales Representative', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(39, NULL, 4, 'SEM', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(40, NULL, 4, 'SEO', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(41, NULL, 4, 'Social Media Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(42, NULL, 4, 'Telemarketing', '2023-03-22 15:33:40', '2023-03-22 15:49:25'),
	(43, NULL, 4, 'Video Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(44, NULL, 4, 'YouTube Marketing', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(45, NULL, 5, 'Amazon Product Ads', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(46, NULL, 5, 'Bing Ads', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(47, NULL, 5, 'Creative advertising', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(48, NULL, 5, 'Facebook Ads', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(49, NULL, 5, 'Google AdWords', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(50, NULL, 5, 'Instagram Ads', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(51, NULL, 5, 'Media Buys', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(52, NULL, 5, 'Other Ad Platforms', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(53, NULL, 5, 'Scientific advertising', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(54, NULL, 5, 'Youtube Ads', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(55, NULL, 6, 'AngularJS', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(56, NULL, 6, 'ASP.NET', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(57, NULL, 6, 'ClickFunnels', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(58, NULL, 6, 'Drupal Development', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(59, NULL, 6, 'Infusionsoft', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(60, NULL, 6, 'Javascript', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(61, NULL, 6, 'Joomla Development', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(62, NULL, 6, 'Laravel', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(63, NULL, 6, 'Magento', '2023-03-22 15:33:40', '2023-03-22 15:46:32'),
	(64, NULL, 6, 'Mysql', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(65, NULL, 6, 'Node.js', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(66, NULL, 6, 'Optimizepress', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(67, NULL, 6, 'PHP', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(68, NULL, 6, 'React', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(69, NULL, 6, 'Ruby on Rails', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(70, NULL, 6, 'Shopify', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(71, NULL, 6, 'VueJS', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(72, NULL, 6, 'WooCommerce', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(73, NULL, 6, 'Wordpress Development', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(74, NULL, 7, 'Content Management', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(75, NULL, 7, 'Cpanel', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(76, NULL, 7, 'Css', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(77, NULL, 7, 'Drupal', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(78, NULL, 7, 'Ecommerce / Shopping Carts', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(79, NULL, 7, 'Google analytics', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(80, NULL, 7, 'Html', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(81, NULL, 7, 'Joomla', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(82, NULL, 7, 'Managing Servers', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(83, NULL, 7, 'PSD to HTML', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(84, NULL, 7, 'Webmaster Tools', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(85, NULL, 7, 'Wordpress', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(86, NULL, 8, '3D Modeling', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(87, NULL, 8, 'Adobe Indesign', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(88, NULL, 8, 'Animation Specialist', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(89, NULL, 8, 'Autocad', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(90, NULL, 8, 'Graphics Editing', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(91, NULL, 8, 'Illustrator', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(92, NULL, 8, 'Logo Design', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(93, NULL, 8, 'Photoshop', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(94, NULL, 8, 'Print Design', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(95, NULL, 8, 'Recording Audio', '2023-03-22 15:55:32', '0000-00-00 00:00:00'),
	(96, NULL, 8, 'Shirt Design', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(97, NULL, 8, 'User Interface Design', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(98, NULL, 8, 'Video Editing', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(99, NULL, 8, 'Web page Design', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(100, NULL, 9, 'Android development', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(101, NULL, 9, 'C#', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(102, NULL, 9, 'Desktop Applications', '2023-03-22 16:07:45', '0000-00-00 00:00:00'),
	(103, NULL, 9, 'Game development', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(104, NULL, 9, 'iOS development', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(105, NULL, 9, 'Python', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(106, NULL, 9, 'Software QA Testing', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(107, NULL, 10, 'Accounting', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(108, NULL, 10, 'Bookkeeping', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(109, NULL, 10, 'Business Plans', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(110, NULL, 10, 'Financial Analysis', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(111, NULL, 10, 'Financial Forecasting', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(112, NULL, 10, 'Financial Management', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(113, NULL, 10, 'Inventory Management', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(114, NULL, 10, 'Investment Researching', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(115, NULL, 10, 'Payroll', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(116, NULL, 10, 'Quickbooks', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(117, NULL, 10, 'Strategic Planning', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(118, NULL, 10, 'Tax Preparation', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(119, NULL, 10, 'Xero', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(120, NULL, 11, 'Community Forum Moderation', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(121, NULL, 11, 'Content Moderation', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(122, NULL, 11, 'Customer Support', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(123, NULL, 11, 'Email Support', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(124, NULL, 11, 'Phone Support', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(125, NULL, 11, 'Social Media Moderation', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(126, NULL, 11, 'Tech Support', '2023-03-22 16:07:45', '2023-03-22 16:09:57'),
	(127, NULL, 12, 'Architectural and Engineering Services', '2023-03-22 16:07:45', '2023-03-22 16:23:57'),
	(128, NULL, 12, 'Legal Services', '2023-03-22 16:07:45', '2023-03-22 16:24:05'),
	(129, NULL, 12, 'Medical Services', '2023-03-22 16:07:45', '2023-03-22 16:24:16'),
	(130, NULL, 12, 'Real Estate Services', '2023-03-22 16:07:45', '2023-03-22 16:24:29'),
	(131, NULL, 13, 'Design Project Management', '2023-03-22 16:07:45', '2023-03-22 16:25:06'),
	(132, NULL, 13, 'Marketing Project Management', '2023-03-22 16:07:45', '2023-03-22 16:25:58'),
	(133, NULL, 13, 'Other Project Management', '2023-03-22 16:07:45', '2023-03-22 16:26:01'),
	(134, NULL, 13, 'Software Development Project Management', '2023-03-22 16:07:45', '2023-03-22 16:26:11'),
	(135, NULL, 13, 'Web Development Project Management', '2023-03-22 16:07:45', '2023-03-22 16:26:30'),
	(136, NULL, 13, 'Writing Development Project Management', '2023-03-22 16:07:45', '2023-03-22 16:26:59');
/*!40000 ALTER TABLE `tbl_skills` ENABLE KEYS */;

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
/*!40000 ALTER TABLE `tbl_skills_category` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `tbl_skills_category` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_sub_industries
CREATE TABLE IF NOT EXISTS `tbl_sub_industries` (
  `sub_industry_id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_id` int(11) NOT NULL DEFAULT '0',
  `industry_name` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sub_industry_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_sub_industries: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_sub_industries` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_sub_industries` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_users: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_category`, `user_status`, `created_at`, `update_at`) VALUES
	(1, 'Eduard Rino Questo Carton', 'eduard16carton@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'S', 1, '2023-04-06 14:44:05', '0000-00-00 00:00:00'),
	(2, 'Genesis Carton Francisco', 'student1@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'S', 1, '2023-04-06 14:57:28', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_work_experiences
CREATE TABLE IF NOT EXISTS `tbl_work_experiences` (
  `work_exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `company_address` varchar(150) DEFAULT NULL,
  `job_title` varchar(255) NOT NULL,
  `date_hired` varchar(7) NOT NULL,
  `date_resigned` varchar(7) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  `currently_worked` int(1) NOT NULL,
  `alumni_id` int(11) NOT NULL,
  PRIMARY KEY (`work_exp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_work_experiences: ~1 rows (approximately)
/*!40000 ALTER TABLE `tbl_work_experiences` DISABLE KEYS */;
INSERT INTO `tbl_work_experiences` (`work_exp_id`, `company_name`, `company_address`, `job_title`, `date_hired`, `date_resigned`, `created_at`, `updated_at`, `currently_worked`, `alumni_id`) VALUES
	(1, 'Bacolod Prosperity Feedmill Corp', NULL, 'IT Programmer', '2018-02', NULL, '2023-04-06 14:44:05', '0000-00-00 00:00:00', 1, 1);
/*!40000 ALTER TABLE `tbl_work_experiences` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
