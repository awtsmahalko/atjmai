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
  `is_employed` int(1) NOT NULL,
  PRIMARY KEY (`alumni_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_alumni: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_alumni` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_alumni_educations: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_alumni_educations` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_alumni_educations` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_alumni_job_preferences
CREATE TABLE IF NOT EXISTS `tbl_alumni_job_preferences` (
  `preference_id` int(11) NOT NULL AUTO_INCREMENT,
  `alumni_id` int(11) NOT NULL,
  `job_title` varchar(50) DEFAULT '',
  `job_description` text,
  `job_type_id` int(11) NOT NULL,
  `job_sched_id` int(11) NOT NULL,
  `salary_details` varchar(255) DEFAULT '',
  `salary_min` decimal(12,2) NOT NULL DEFAULT '0.00',
  `salary_max` decimal(12,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`preference_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_alumni_job_preferences: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_alumni_job_preferences` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_alumni_job_preferences` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_alumni_skills
CREATE TABLE IF NOT EXISTS `tbl_alumni_skills` (
  `as_id` int(11) NOT NULL AUTO_INCREMENT,
  `alumni_id` int(11) NOT NULL DEFAULT '0',
  `skill_id` int(11) NOT NULL DEFAULT '0',
  `skill_rate` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`as_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_alumni_skills: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_alumni_skills` DISABLE KEYS */;
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

-- Dumping structure for table almai_db.tbl_colleges
CREATE TABLE IF NOT EXISTS `tbl_colleges` (
  `college_id` int(11) NOT NULL AUTO_INCREMENT,
  `college_name` varchar(150) NOT NULL DEFAULT '0',
  `college_status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`college_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_colleges: ~8 rows (approximately)
/*!40000 ALTER TABLE `tbl_colleges` DISABLE KEYS */;
INSERT INTO `tbl_colleges` (`college_id`, `college_name`, `college_status`, `created_at`, `updated_at`) VALUES
	(1, 'College Of Agriculture, Fisheries, And Allied Sciences', 1, '2023-04-07 10:58:07', '2023-04-13 11:27:08'),
	(2, 'College Of Arts and Sciences', 1, '2023-04-07 11:11:31', '2023-04-13 11:27:02'),
	(3, 'College Of Business And Management', 1, '2023-04-13 11:26:57', '2023-04-13 11:28:23'),
	(4, 'College Of Criminal Justice Education', 1, '2023-04-13 11:26:57', '2023-04-13 11:28:25'),
	(5, 'College Of  Education', 1, '2023-04-13 11:26:57', '2023-04-13 11:28:41'),
	(6, 'College Of  Information And Communications Technology And Engineering', 1, '2023-04-13 11:26:57', '2023-04-13 11:28:27'),
	(7, 'College Of  Nursing And Allied Health Sciences', 1, '2023-04-13 11:26:57', '2023-04-13 11:28:27'),
	(8, 'Graduate School', 1, '2023-04-13 11:26:57', '2023-04-13 11:28:27');
/*!40000 ALTER TABLE `tbl_colleges` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_courses
CREATE TABLE IF NOT EXISTS `tbl_courses` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(11) NOT NULL DEFAULT '0',
  `course_code` varchar(15) DEFAULT NULL,
  `course_name` varchar(150) NOT NULL DEFAULT '0',
  `course_category` varchar(50) DEFAULT NULL,
  `course_status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_courses: ~40 rows (approximately)
/*!40000 ALTER TABLE `tbl_courses` DISABLE KEYS */;
INSERT INTO `tbl_courses` (`course_id`, `college_id`, `course_code`, `course_name`, `course_category`, `course_status`, `created_at`, `updated_at`) VALUES
	(1, 1, 'BSAB', 'Bachelor of Science in Agribusiness', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(2, 1, 'BSA', 'Bachelor of Science in Agriculture', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(3, 1, 'BSF', 'Bachelor of Science in Fisheries', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(4, 2, 'BAELS', 'Bachelor of Arts in English Language Studies', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(5, 2, 'BSBIO', 'Bachelor of Science in Biology', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(6, 3, 'BPA', 'Bachelor of Public Administration', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(7, 3, 'BSAIS', 'Bachelor of Science in Accounting Information System', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(8, 3, 'BSBA-FM', 'Bachelor of Science in Business Administration major in Financial Management', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(9, 3, 'BSBA-MM', 'Bachelor of Science in Business Administration major in Marketing Management', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(10, 3, 'BSCM', 'Bachelor of Science in Cooperative Management', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(11, 3, 'BSHM', 'Bachelor of Science in Hospitality Management', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(12, 3, 'BSTM', 'Bachelor of Science in Tourism Management', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(13, 4, 'BSCrim', 'Bachelor of Science in Criminology', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(14, 5, 'BPEd', 'Bachelor in Physical Education', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(15, 5, 'BSED', 'Bachelor in Secondary Education', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(16, 5, 'BSED-English', 'Bachelor of Secondary Education Major in English', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(17, 5, 'BSED-Mathematic', 'Bachelor of Secondary Education Major in Mathematics', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(18, 5, 'BSED-Science', 'Bachelor of Secondary Education Major in Science', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(19, 5, 'BSED-TLE', 'Bachelor of Secondary Education major in Technology and Livelihood Education', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(20, 5, 'BTLEd-AFA', 'Bachelor of Technology and Livelihood Education Major in Agri-Fishery Arts', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(21, 5, 'BTLEd-HE', 'Bachelor of Technology and Livelihood Education Major in Home Economics', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(22, 5, 'BTLEd-IA', 'Bachelor of Technology and Livelihood Education Major in Industrial Arts', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(23, 5, 'BTLEd-ICT', 'Bachelor of Technology and Livelihood Education Major in Information and Communications Technology', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(24, 5, 'DIT', 'Diploma in Teaching', 'Short-Course', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(25, 6, 'BLIS', 'Bachelor of Library and Information Science', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(26, 6, 'BSEMC-A', 'Bachelor of Science in Entertainment and Multimedia Computing major in Animation Technology', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(27, 6, 'BSIS', 'Bachelor of Science in Information Systems', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(28, 6, 'BSIT', 'Bachelor of Science in Information Technology', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(29, 7, 'BSN', 'Bachelor of Science in Nursing', 'Undergraduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(30, 7, 'DM', 'Diploma in Midwifery', 'Short-Course', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(31, 8, 'DIT', 'Doctor in Information Technology', 'Graduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(32, 8, 'PHDEM', 'Doctor of Philosophy in Educational Management', 'Graduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(33, 8, 'PHDTM', 'Doctor of Philosophy in Technology Management', 'Graduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(34, 8, 'DPA', 'Doctor of Public Administration', 'Graduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(35, 8, 'MIT', 'Master in Information Technology', 'Graduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(36, 8, 'MN', 'Master in Nursing major in Nursing Management and Administration', 'Graduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(37, 8, 'MPA', 'Master in Public Administration', 'Graduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(38, 8, 'MAED', 'Master of Arts in Education major in Educational Management', 'Graduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(39, 8, 'MSA', 'Master of Science in Agriculture', 'Graduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00'),
	(40, 8, 'MSFi', 'Master of Science in Fisheries', 'Graduate', 1, '2023-03-16 23:16:33', '0000-00-00 00:00:00');
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
  `industry_status` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`industry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_industries: ~25 rows (approximately)
/*!40000 ALTER TABLE `tbl_industries` DISABLE KEYS */;
INSERT INTO `tbl_industries` (`industry_id`, `industry_name`, `industry_status`, `created_at`, `updated_at`) VALUES
	(1, 'Aerospace & Defense', 0, '2023-04-11 09:44:02', '0000-00-00 00:00:00'),
	(2, 'Agriculture', 1, '2023-04-11 09:44:02', '2023-04-21 08:08:44'),
	(3, 'Arts, Entertainment & Recreation', 0, '2023-04-11 09:44:02', '0000-00-00 00:00:00'),
	(4, 'Construction, Repair & Maintenance Services', 0, '2023-04-11 09:44:02', '0000-00-00 00:00:00'),
	(5, 'Education', 1, '2023-04-11 09:44:02', '2023-04-21 08:08:50'),
	(6, 'Energy, Mining & Utilities', 0, '2023-04-11 09:44:02', '0000-00-00 00:00:00'),
	(7, 'Financial Services', 1, '2023-04-11 09:44:02', '2023-04-21 08:09:12'),
	(8, 'Government & Public Administration', 1, '2023-04-11 09:44:02', '2023-04-21 08:09:14'),
	(9, 'Healthcare', 1, '2023-04-11 09:44:02', '2023-04-21 08:09:15'),
	(10, 'Hotels & Travel Accommodation', 1, '2023-04-11 09:44:02', '2023-04-21 08:09:17'),
	(11, 'Human Resources & Staffing', 1, '2023-04-11 09:44:02', '2023-04-21 08:09:19'),
	(12, 'Information Technology', 1, '2023-04-11 09:44:02', '2023-04-21 08:09:20'),
	(13, 'Insurance', 0, '2023-04-11 09:44:02', '2023-04-11 09:52:29'),
	(14, 'Legal', 0, '2023-04-11 09:44:02', '2023-04-11 09:52:29'),
	(15, 'Management & Consulting', 0, '2023-04-11 09:44:02', '2023-04-11 09:52:29'),
	(16, 'Manufacturing', 1, '2023-04-11 09:44:02', '2023-04-21 08:09:27'),
	(17, 'Media & Communication', 0, '2023-04-11 09:44:02', '2023-04-11 09:52:29'),
	(18, 'Nonprofit & NGO', 0, '2023-04-11 09:44:02', '2023-04-11 09:52:29'),
	(19, 'Personal Consumer Services', 0, '2023-04-11 09:44:02', '2023-04-11 09:52:29'),
	(20, 'Pharmaceutical & Biotechnology', 1, '2023-04-11 09:44:02', '2023-04-21 08:09:37'),
	(21, 'Real Estate', 0, '2023-04-11 09:44:02', '2023-04-11 09:52:29'),
	(22, 'Restaurants & Food Service', 0, '2023-04-11 09:44:02', '2023-04-11 09:52:29'),
	(23, 'Retail & Wholesale', 0, '2023-04-11 09:44:02', '2023-04-11 09:52:29'),
	(24, 'Telecommunications', 1, '2023-04-11 09:44:02', '2023-04-21 08:10:14'),
	(25, 'Transportation & Logistics', 1, '2023-04-11 09:44:02', '2023-04-21 08:10:12');
/*!40000 ALTER TABLE `tbl_industries` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_jobs
CREATE TABLE IF NOT EXISTS `tbl_jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_id` int(11) DEFAULT '0',
  `industry_id` int(11) DEFAULT '0',
  `job_title` varchar(250) DEFAULT NULL,
  `job_description` text,
  `job_type_id` int(11) NOT NULL DEFAULT '0',
  `job_sched_id` int(11) NOT NULL DEFAULT '0',
  `hire_needed` int(11) NOT NULL DEFAULT '0',
  `expected_hire_date` varchar(50) DEFAULT NULL,
  `salary_details` varchar(150) DEFAULT NULL,
  `salary_min` decimal(12,2) NOT NULL DEFAULT '0.00',
  `salary_max` decimal(12,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_jobs` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_job_candidates
CREATE TABLE IF NOT EXISTS `tbl_job_candidates` (
  `candidate_id` int(11) NOT NULL AUTO_INCREMENT,
  `alumni_id` int(11) NOT NULL DEFAULT '0',
  `job_id` int(11) NOT NULL DEFAULT '0',
  `employer_id` int(11) NOT NULL DEFAULT '0',
  `candidate_status` int(1) NOT NULL DEFAULT '0' COMMENT '-1 = Apply',
  `rating` decimal(12,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`candidate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_job_candidates: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_job_candidates` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_job_candidates` ENABLE KEYS */;

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

-- Dumping structure for table almai_db.tbl_posts
CREATE TABLE IF NOT EXISTS `tbl_posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(255) DEFAULT NULL,
  `post_message` text,
  `college_id` int(1) DEFAULT NULL,
  `show_to_employer` int(1) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_posts: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_posts` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_skills
CREATE TABLE IF NOT EXISTS `tbl_skills` (
  `skill_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_industry_id` int(11) DEFAULT NULL,
  `sc_id` int(11) NOT NULL DEFAULT '0',
  `skill_name` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`skill_id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_skills: ~166 rows (approximately)
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
	(136, NULL, 13, 'Writing Development Project Management', '2023-03-22 16:07:45', '2023-03-22 16:26:59'),
	(137, NULL, 14, 'Planting', '2023-04-21 08:57:59', '0000-00-00 00:00:00'),
	(138, NULL, 14, 'Harvesting', '2023-04-21 08:57:59', '0000-00-00 00:00:00'),
	(139, NULL, 14, 'Irrigation', '2023-04-21 08:57:59', '0000-00-00 00:00:00'),
	(140, NULL, 14, 'Soil Analysis', '2023-04-21 08:57:59', '0000-00-00 00:00:00'),
	(141, NULL, 14, 'Pest control', '2023-04-21 08:57:59', '0000-00-00 00:00:00'),
	(142, NULL, 14, 'Mechanization', '2023-04-21 08:57:59', '0000-00-00 00:00:00'),
	(143, NULL, 14, 'Fertilization', '2023-04-21 08:57:59', '0000-00-00 00:00:00'),
	(144, NULL, 14, 'Crop selection', '2023-04-21 08:57:59', '0000-00-00 00:00:00'),
	(145, NULL, 14, 'Animal husbandry', '2023-04-21 08:57:59', '0000-00-00 00:00:00'),
	(146, NULL, 14, 'Marketing', '2023-04-21 08:57:59', '0000-00-00 00:00:00'),
	(147, NULL, 14, 'Research', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(148, NULL, 14, 'Sustainability', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(149, NULL, 14, 'Conservation', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(150, NULL, 14, 'Agribusiness', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(151, NULL, 14, 'Farm management', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(152, NULL, 15, 'Aquaculture', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(153, NULL, 15, 'Fish breeding', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(154, NULL, 15, 'Water quality management', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(155, NULL, 15, 'Fisheries management', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(156, NULL, 15, 'Fish health management', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(157, NULL, 15, 'Fish processing', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(158, NULL, 15, 'Harvesting', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(159, NULL, 15, 'Fishing gear maintenance', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(160, NULL, 15, 'Seafood safety and quality control', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(161, NULL, 15, 'Research and data analysis', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(162, NULL, 15, 'Environmental monitoring and assessment', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(163, NULL, 15, 'Marketing and sales', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(164, NULL, 15, 'Leadership and teamwork', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(165, NULL, 15, 'Communication and interpersonal skills', '2023-04-21 08:57:59', '2023-04-21 08:59:50'),
	(166, NULL, 15, 'Regulatory compliance', '2023-04-21 08:57:59', '2023-04-21 08:59:50');
/*!40000 ALTER TABLE `tbl_skills` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_skills_category
CREATE TABLE IF NOT EXISTS `tbl_skills_category` (
  `sc_id` int(11) NOT NULL AUTO_INCREMENT,
  `sc_name` varchar(150) DEFAULT NULL,
  `sc_description` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `sc_status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_skills_category: ~15 rows (approximately)
/*!40000 ALTER TABLE `tbl_skills_category` DISABLE KEYS */;
INSERT INTO `tbl_skills_category` (`sc_id`, `sc_name`, `sc_description`, `created_at`, `updated_at`, `sc_status`) VALUES
	(1, 'Office & Admin (Virtual Assistant)', 'S', '2023-03-22 13:39:05', '2023-04-21 08:57:25', 1),
	(2, 'English', 'S', '2023-03-22 13:39:05', '2023-04-21 08:57:26', 1),
	(3, 'Writing', 'S', '2023-03-22 13:39:05', '2023-04-21 08:57:26', 1),
	(4, 'Sales and Marketing', 'S', '2023-03-22 13:39:05', '2023-04-21 08:57:27', 1),
	(5, 'Advertising', 'S', '2023-03-22 13:39:05', '2023-04-21 08:57:27', 1),
	(6, 'Web Development', 'S', '2023-03-22 13:39:05', '2023-04-21 08:57:29', 1),
	(7, 'Webmaster', NULL, '2023-03-22 15:16:10', '2023-04-21 08:57:29', 1),
	(8, 'Graphics & Multimedia', NULL, '2023-03-22 15:16:34', '2023-04-21 08:57:30', 1),
	(9, 'Software Development / Programming', NULL, '2023-03-22 15:16:58', '2023-04-21 08:57:31', 1),
	(10, 'Finance & Management', NULL, '2023-03-22 15:17:10', '2023-04-21 08:57:31', 1),
	(11, 'Customer Service & Admin Support', NULL, '2023-03-22 15:17:31', '2023-04-21 08:57:32', 1),
	(12, 'Proffessional Services', NULL, '2023-03-22 15:17:45', '2023-04-21 08:57:33', 1),
	(13, 'Project Management', NULL, '2023-03-22 15:17:54', '2023-04-21 08:57:33', 1),
	(14, 'Agriculture', NULL, '2023-04-21 08:56:45', '2023-04-21 08:57:13', 1),
	(15, 'Fisheries', NULL, '2023-04-21 09:03:18', '0000-00-00 00:00:00', 0);
/*!40000 ALTER TABLE `tbl_skills_category` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_sub_industries
CREATE TABLE IF NOT EXISTS `tbl_sub_industries` (
  `sub_industry_id` int(11) NOT NULL AUTO_INCREMENT,
  `industry_id` int(11) NOT NULL DEFAULT '0',
  `industry_name` varchar(150) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sub_industry_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_sub_industries: ~113 rows (approximately)
/*!40000 ALTER TABLE `tbl_sub_industries` DISABLE KEYS */;
INSERT INTO `tbl_sub_industries` (`sub_industry_id`, `industry_id`, `industry_name`, `created_at`, `updated_at`) VALUES
	(1, 2, 'Animal Production', '2023-04-11 09:45:13', '0000-00-00 00:00:00'),
	(2, 2, 'Crop Production', '2023-04-11 09:45:13', '0000-00-00 00:00:00'),
	(3, 2, 'Farm Support', '2023-04-11 09:45:13', '0000-00-00 00:00:00'),
	(4, 2, 'Fishery', '2023-04-11 09:45:58', '2023-04-11 09:46:00'),
	(5, 2, 'Floral Nursery', '2023-04-11 09:45:58', '2023-04-11 09:46:00'),
	(6, 2, 'Forestry, Logging & Timber Operations', '2023-04-11 09:45:58', '2023-04-11 09:46:00'),
	(7, 3, 'Culture & Entertainment', '2023-04-11 09:45:58', '2023-04-11 09:46:00'),
	(8, 3, 'Gambling', '2023-04-11 09:45:58', '2023-04-11 09:46:00'),
	(9, 3, 'Sports & Recreation', '2023-04-11 09:45:58', '2023-04-11 09:49:21'),
	(10, 3, 'Ticket Sales', '2023-04-11 09:45:58', '2023-04-11 09:49:21'),
	(11, 4, 'Architectural & Engineering Services', '2023-04-11 09:45:58', '2023-04-11 10:07:19'),
	(12, 4, 'Commercial Equipment  Services', '2023-04-11 09:45:58', '2023-04-11 10:07:49'),
	(13, 4, 'Construction', '2023-04-11 09:45:58', '2023-04-11 10:08:41'),
	(14, 4, 'General Repair & Maintenance', '2023-04-11 09:45:58', '2023-04-11 10:08:41'),
	(15, 4, 'Vehicle Repair & Maintenance', '2023-04-11 09:45:58', '2023-04-11 10:08:41'),
	(16, 5, 'Colleges & Universities', '2023-04-11 09:45:58', '2023-04-11 10:08:41'),
	(17, 5, 'Education & Training Services', '2023-04-11 09:45:58', '2023-04-11 10:08:41'),
	(18, 5, 'Preschool & Child Care Services', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(19, 5, 'Primary & Secondary Schools', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(20, 6, 'Energy & Utilities', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(21, 6, 'Mining & Metals', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(22, 7, 'Accounting & Tax', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(23, 7, 'Banking & Lending', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(24, 7, 'Debt Relief', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(25, 7, 'Financial Transaction Processing', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(26, 7, 'Investment & Asset Management', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(27, 7, 'Stock Exchanges', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(28, 8, 'Municipal Agencies', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(29, 8, 'National Agencies', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(30, 8, 'State & Regional Agencies', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(31, 9, 'Ambulance & Medical Transaportation', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(32, 9, 'Dental Clinics', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(33, 9, 'Hospital & Health Clinics', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(34, 9, 'Medical Testing & Clinical Laboratories', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(35, 9, 'Nursing Care Facilities', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(36, 10, 'Hotels & Resorts', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(37, 10, 'Travel Agencies', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(38, 11, 'HR Consulting', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(39, 11, 'Staffing & Subcontracting', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(40, 12, 'Computer Hardware Development', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(41, 12, 'Information Technology Support Services', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(42, 12, 'Internet & Web Services', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(43, 12, 'Software Development', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(44, 13, 'Insurance Agencies & Brokerages', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(45, 13, 'Insurance Carriers', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(46, 14, 'Law Firms', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(47, 14, 'Legal Services', '2023-04-11 09:45:58', '2023-04-11 10:26:36'),
	(48, 15, 'Business Consulting', '2023-04-11 09:45:58', '2023-04-11 11:02:07'),
	(49, 15, 'Membership Organizations', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(50, 15, 'Research & Development', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(51, 15, 'Security & Protective', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(52, 15, 'Waste Management', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(53, 16, 'Chemical Manufacturing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(54, 16, 'Commercial Printing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(55, 16, 'Consumer Product Manufacturing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(56, 16, 'Electronics Manufacturing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(57, 16, 'Food & Beverage Manufacturing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(58, 16, 'Health Care Products Manufacturing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(59, 16, 'Machinery Manufacturing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(60, 16, 'Metal & Mineral Manufacturing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(61, 16, 'Textile & Apparel Manufacturing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(62, 16, 'Transportation Equipment Manufacturing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(63, 16, 'Wood & Paper Manufacturing', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(64, 17, 'Advertising & Public Relations', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(65, 17, 'Broadcast Media', '2023-04-11 09:45:58', '2023-04-11 11:02:26'),
	(66, 17, 'Film Production', '2023-04-11 09:45:58', '2023-04-11 11:10:23'),
	(67, 17, 'Music & Sound Production', '2023-04-11 09:45:58', '2023-04-11 11:10:23'),
	(68, 17, 'Photography', '2023-04-11 09:45:58', '2023-04-11 11:10:23'),
	(69, 17, 'Publishing', '2023-04-11 09:45:58', '2023-04-11 11:10:23'),
	(70, 17, 'Translation & Linguistic Services', '2023-04-11 09:45:58', '2023-04-11 11:10:23'),
	(71, 17, 'Video Game Publishing', '2023-04-11 09:45:58', '2023-04-11 11:10:23'),
	(72, 18, 'Civic & Social Services', '2023-04-11 09:45:58', '2023-04-11 11:10:23'),
	(73, 18, 'Grantmaking & Charitable Foundations', '2023-04-11 09:45:58', '2023-04-11 11:10:23'),
	(74, 18, 'Religious Institution', '2023-04-11 09:45:58', '2023-04-11 11:10:23'),
	(75, 19, 'Beauty & Wellness', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(76, 19, 'Event Services', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(77, 19, 'Laundry & Dry Cleaning', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(78, 19, 'Pet Care & Veterinary', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(79, 19, 'Private Households', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(80, 20, 'Biotechnology', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(81, 20, 'Pharmaceutical', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(82, 21, 'Property Management', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(83, 21, 'Real Estate Agencies', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(84, 22, 'Bars & Nightclubs', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(85, 22, 'Catering & Food Service Contractors', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(86, 22, 'Restaurant & Cafes', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(87, 23, 'Auction & Galleries', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(88, 23, 'Automotive Parts & Accessories Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(89, 23, 'Beauty & Personal Accessories Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(90, 23, 'Consumer Electronics & Appliances Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(91, 23, 'Convenience Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(92, 23, 'Department Clothing & Shoe Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(93, 23, 'Drug & Health Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(94, 23, 'Food & Beverage Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(95, 23, 'General Merchandise & Superstores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(96, 23, 'Gift, Novelty & Souvenir Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(97, 23, 'Grocery Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(98, 23, 'Home Furniture & Housewares Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(99, 23, 'Media & Entertainment Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(100, 23, 'Office Supply & Copy Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(101, 23, 'Pet & Pet Supplies Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(102, 23, 'Sporting Good Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(103, 23, 'Toy & Hobby Stores', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(104, 23, 'Vehicle Dealers', '2023-04-11 09:45:58', '2023-04-11 11:13:48'),
	(105, 23, 'Wholesale', '2023-04-11 09:45:58', '2023-04-11 11:24:45'),
	(106, 25, 'Airlines, Airports & Air Transportation', '2023-04-11 09:45:58', '2023-04-11 11:24:45'),
	(107, 25, 'Car & Truck Rental', '2023-04-11 09:45:58', '2023-04-11 11:24:45'),
	(108, 25, 'Marine Tranportation', '2023-04-11 09:45:58', '2023-04-11 11:24:45'),
	(109, 25, 'Parking & Valet', '2023-04-11 09:45:58', '2023-04-11 11:24:45'),
	(110, 25, 'Rail Transportation', '2023-04-11 09:45:58', '2023-04-11 11:26:38'),
	(111, 25, 'Shipping & Trucking', '2023-04-11 09:45:58', '2023-04-11 11:26:38'),
	(112, 25, 'Taxi & Car Services', '2023-04-11 09:45:58', '2023-04-11 11:26:38'),
	(113, 25, 'Transportation Management', '2023-04-11 09:45:58', '2023-04-11 11:26:38');
/*!40000 ALTER TABLE `tbl_sub_industries` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(255) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_category` varchar(1) NOT NULL COMMENT 'A=Admin,E=Employer,S=Student/Alumni',
  `user_status` int(1) NOT NULL DEFAULT '0',
  `user_img` varchar(255) NOT NULL DEFAULT 'default_male.png',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

-- Dumping structure for table almai_db.tbl_work_achievements
CREATE TABLE IF NOT EXISTS `tbl_work_achievements` (
  `achievements_id` int(11) NOT NULL AUTO_INCREMENT,
  `work_exp_id` int(11) NOT NULL,
  `achievement_name` text NOT NULL,
  `to_delete` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`achievements_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_work_achievements: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_work_achievements` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_work_achievements` ENABLE KEYS */;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table almai_db.tbl_work_experiences: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_work_experiences` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_work_experiences` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
