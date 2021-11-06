-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2016 at 03:54 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rm_full`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_username` varchar(200) DEFAULT NULL,
  `admin_password` varchar(200) DEFAULT NULL,
  `admin_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE IF NOT EXISTS `applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `recruiter_username` varchar(300) DEFAULT NULL,
  `company_name` varchar(300) DEFAULT NULL,
  `date_of_visit` varchar(300) DEFAULT NULL,
  `application_status` varchar(300) DEFAULT NULL,
  `student_rollnumber` varchar(300) DEFAULT NULL,
  `first_name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `dob` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `mobile` varchar(300) DEFAULT NULL,
  `Xth_aggregate` varchar(300) DEFAULT NULL,
  `XIIth_aggregate` varchar(300) DEFAULT NULL,
  `branch_ug` varchar(300) DEFAULT NULL,
  `sem1_ug` varchar(300) DEFAULT NULL,
  `sem2_ug` varchar(300) DEFAULT NULL,
  `sem3_ug` varchar(300) DEFAULT NULL,
  `sem4_ug` varchar(300) DEFAULT NULL,
  `sem5_ug` varchar(300) DEFAULT NULL,
  `sem6_ug` varchar(300) DEFAULT NULL,
  `sem7_ug` varchar(300) DEFAULT NULL,
  `sem8_ug` varchar(300) DEFAULT NULL,
  `aggregate_ug` varchar(300) DEFAULT NULL,
  `branch_pg` varchar(300) DEFAULT NULL,
  `sem1_pg` varchar(300) DEFAULT NULL,
  `sem2_pg` varchar(300) DEFAULT NULL,
  `sem3_pg` varchar(300) DEFAULT NULL,
  `sem4_pg` varchar(300) DEFAULT NULL,
  `aggregate_pg` varchar(300) DEFAULT NULL,
  `resume_link` varchar(400) DEFAULT NULL,
  `extra_curriculars` longtext,
  `professional_societies` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `applications`
--

-- --------------------------------------------------------

--
-- Table structure for table `intern_applications`
--

CREATE TABLE IF NOT EXISTS `intern_applications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `recruiter_username` varchar(300) DEFAULT NULL,
  `company_name` varchar(300) DEFAULT NULL,
  `date_of_visit` varchar(300) DEFAULT NULL,
  `application_status` varchar(300) DEFAULT NULL,
  `student_rollnumber` varchar(300) DEFAULT NULL,
  `first_name` varchar(300) DEFAULT NULL,
  `last_name` varchar(300) DEFAULT NULL,
  `dob` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `mobile` varchar(300) DEFAULT NULL,
  `Xth_aggregate` varchar(300) DEFAULT NULL,
  `XIIth_aggregate` varchar(300) DEFAULT NULL,
  `branch_ug` varchar(300) DEFAULT NULL,
  `sem1_ug` varchar(300) DEFAULT NULL,
  `sem2_ug` varchar(300) DEFAULT NULL,
  `sem3_ug` varchar(300) DEFAULT NULL,
  `sem4_ug` varchar(300) DEFAULT NULL,
  `sem5_ug` varchar(300) DEFAULT NULL,
  `sem6_ug` varchar(300) DEFAULT NULL,
  `sem7_ug` varchar(300) DEFAULT NULL,
  `sem8_ug` varchar(300) DEFAULT NULL,
  `aggregate_ug` varchar(300) DEFAULT NULL,
  `branch_pg` varchar(300) DEFAULT NULL,
  `sem1_pg` varchar(300) DEFAULT NULL,
  `sem2_pg` varchar(300) DEFAULT NULL,
  `sem3_pg` varchar(300) DEFAULT NULL,
  `sem4_pg` varchar(300) DEFAULT NULL,
  `aggregate_pg` varchar(300) DEFAULT NULL,
  `resume_link` varchar(400) DEFAULT NULL,
  `extra_curriculars` longtext,
  `professional_societies` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `intern_notifications`
--

CREATE TABLE IF NOT EXISTS `intern_notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `company_name` varchar(300) DEFAULT NULL,
  `recruiter_username` varchar(300) DEFAULT NULL,
  `notification` longtext,
  `placement_coordinator` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `intern_notifications`
--

-- --------------------------------------------------------

--
-- Table structure for table `intern_recruiter`
--

CREATE TABLE IF NOT EXISTS `intern_recruiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recruiter_username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `about_company` longtext,
  `ctc` varchar(100) DEFAULT NULL,
  `btech` varchar(10) DEFAULT NULL,
  `btech_cutoff` varchar(10) DEFAULT NULL,
  `btech_branches` longtext,
  `mtech` varchar(10) DEFAULT NULL,
  `mtech_cutoff` varchar(10) DEFAULT NULL,
  `mtech_branches` longtext,
  `mba` varchar(10) DEFAULT NULL,
  `mba_cutoff` varchar(10) DEFAULT NULL,
  `job_description` longtext,
  `location` varchar(100) DEFAULT NULL,
  `coordinator` varchar(100) DEFAULT NULL,
  `coordinator_mobile` varchar(50) DEFAULT NULL,
  `date_of_visit` varchar(100) DEFAULT NULL,
  `application_deadline` varchar(100) DEFAULT NULL,
  `note` longtext,
  `security_question` varchar(100) DEFAULT NULL,
  `security_answer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `intern_recruiter`
--

-- --------------------------------------------------------

--
-- Table structure for table `intern_student`
--

CREATE TABLE IF NOT EXISTS `intern_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username_rollnumber` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `debarr` int(2) DEFAULT NULL,
  `firstname` varchar(300) DEFAULT NULL,
  `lastname` varchar(300) DEFAULT NULL,
  `guardianname` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `jobinterest` varchar(300) DEFAULT NULL,
  `mobile` varchar(300) DEFAULT NULL,
  `guardianmobile` varchar(300) DEFAULT NULL,
  `dob` varchar(300) DEFAULT NULL,
  `currentaddress` varchar(300) DEFAULT NULL,
  `permanentaddress` varchar(300) DEFAULT NULL,
  `sex` varchar(300) DEFAULT NULL,
  `category` varchar(300) DEFAULT NULL,
  `height` varchar(300) DEFAULT NULL,
  `weight` varchar(300) DEFAULT NULL,
  `placeofbirth` varchar(300) DEFAULT NULL,
  `hometown` varchar(300) DEFAULT NULL,
  `homestate` varchar(300) DEFAULT NULL,
  `maritalstatus` varchar(300) DEFAULT NULL,
  `citizenship` varchar(300) DEFAULT NULL,
  `languages` varchar(300) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `security_question` varchar(300) DEFAULT NULL,
  `security_question_answer` varchar(300) DEFAULT NULL,
  `resume_link` varchar(300) DEFAULT NULL,
  `pursuing` varchar(10) DEFAULT NULL,
  `schoolname10` varchar(300) DEFAULT NULL,
  `board10` varchar(300) DEFAULT NULL,
  `passingyear10` varchar(300) DEFAULT NULL,
  `aggregate10` varchar(300) DEFAULT NULL,
  `subjects10` varchar(300) DEFAULT NULL,
  `schoolname12` varchar(300) DEFAULT NULL,
  `board12` varchar(300) DEFAULT NULL,
  `passingyear12` varchar(300) DEFAULT NULL,
  `aggregate12` varchar(300) DEFAULT NULL,
  `subjects12` varchar(300) DEFAULT NULL,
  `entrance` varchar(300) DEFAULT NULL,
  `entrance_category` varchar(300) DEFAULT NULL,
  `rank` varchar(300) DEFAULT NULL,
  `branchgrad` varchar(300) DEFAULT NULL,
  `yearofgradgrad` varchar(300) DEFAULT NULL,
  `sem1grad` varchar(300) DEFAULT NULL,
  `sem2grad` varchar(300) DEFAULT NULL,
  `sem3grad` varchar(300) DEFAULT NULL,
  `sem4grad` varchar(300) DEFAULT NULL,
  `sem5grad` varchar(300) DEFAULT NULL,
  `sem6grad` varchar(300) DEFAULT NULL,
  `sem7grad` varchar(300) DEFAULT NULL,
  `sem8grad` varchar(300) DEFAULT NULL,
  `aggregategrad` varchar(300) DEFAULT NULL,
  `universitygrad` varchar(300) DEFAULT NULL,
  `branchpg` varchar(300) DEFAULT NULL,
  `sem1pg` varchar(300) DEFAULT NULL,
  `sem2pg` varchar(300) DEFAULT NULL,
  `sem3pg` varchar(300) DEFAULT NULL,
  `sem4pg` varchar(300) DEFAULT NULL,
  `yearofgradpg` varchar(300) DEFAULT NULL,
  `aggregatepg` varchar(300) DEFAULT NULL,
  `project` longtext,
  `training` longtext,
  `gapreason` varchar(300) DEFAULT NULL,
  `number_of_backlogs` varchar(11) DEFAULT NULL,
  `backlogreason` varchar(300) DEFAULT NULL,
  `professional_societies` longtext,
  `extra_curriculars` longtext,
  `career_objective` longtext,
  `technical_skills` longtext,
  `other_skills` longtext,
  `hobbies` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `intern_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `company_name` varchar(300) DEFAULT NULL,
  `recruiter_username` varchar(300) DEFAULT NULL,
  `notification` longtext,
  `placement_coordinator` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `notifications`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_recovery`
--

CREATE TABLE IF NOT EXISTS `password_recovery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `username_roll` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hash` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `password_recovery`
--

-- --------------------------------------------------------

--
-- Table structure for table `recruiter`
--

CREATE TABLE IF NOT EXISTS `recruiter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recruiter_username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `about_company` longtext,
  `ctc` varchar(100) DEFAULT NULL,
  `btech` varchar(10) DEFAULT NULL,
  `btech_cutoff` varchar(10) DEFAULT NULL,
  `btech_branches` longtext,
  `mtech` varchar(10) DEFAULT NULL,
  `mtech_cutoff` varchar(10) DEFAULT NULL,
  `mtech_branches` longtext,
  `mba` varchar(10) DEFAULT NULL,
  `mba_cutoff` varchar(10) DEFAULT NULL,
  `job_description` longtext,
  `location` varchar(100) DEFAULT NULL,
  `coordinator` varchar(100) DEFAULT NULL,
  `coordinator_mobile` varchar(50) DEFAULT NULL,
  `date_of_visit` varchar(100) DEFAULT NULL,
  `application_deadline` varchar(100) DEFAULT NULL,
  `note` longtext,
  `security_question` varchar(100) DEFAULT NULL,
  `security_answer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `recruiter`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_personal`
--

CREATE TABLE IF NOT EXISTS `student_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username_rollnumber` varchar(300) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `debarr` int(2) DEFAULT NULL,
  `firstname` varchar(300) DEFAULT NULL,
  `lastname` varchar(300) DEFAULT NULL,
  `guardianname` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `jobinterest` varchar(300) DEFAULT NULL,
  `mobile` varchar(300) DEFAULT NULL,
  `guardianmobile` varchar(300) DEFAULT NULL,
  `dob` varchar(300) DEFAULT NULL,
  `currentaddress` varchar(300) DEFAULT NULL,
  `permanentaddress` varchar(300) DEFAULT NULL,
  `sex` varchar(300) DEFAULT NULL,
  `category` varchar(300) DEFAULT NULL,
  `height` varchar(300) DEFAULT NULL,
  `weight` varchar(300) DEFAULT NULL,
  `placeofbirth` varchar(300) DEFAULT NULL,
  `hometown` varchar(300) DEFAULT NULL,
  `homestate` varchar(300) DEFAULT NULL,
  `maritalstatus` varchar(300) DEFAULT NULL,
  `citizenship` varchar(300) DEFAULT NULL,
  `languages` varchar(300) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `security_question` varchar(300) DEFAULT NULL,
  `security_question_answer` varchar(300) DEFAULT NULL,
  `resume_link` varchar(300) DEFAULT NULL,
  `pursuing` varchar(10) DEFAULT NULL,
  `schoolname10` varchar(300) DEFAULT NULL,
  `board10` varchar(300) DEFAULT NULL,
  `passingyear10` varchar(300) DEFAULT NULL,
  `aggregate10` varchar(300) DEFAULT NULL,
  `subjects10` varchar(300) DEFAULT NULL,
  `schoolname12` varchar(300) DEFAULT NULL,
  `board12` varchar(300) DEFAULT NULL,
  `passingyear12` varchar(300) DEFAULT NULL,
  `aggregate12` varchar(300) DEFAULT NULL,
  `subjects12` varchar(300) DEFAULT NULL,
  `entrance` varchar(300) DEFAULT NULL,
  `entrance_category` varchar(300) DEFAULT NULL,
  `rank` varchar(300) DEFAULT NULL,
  `branchgrad` varchar(300) DEFAULT NULL,
  `yearofgradgrad` varchar(300) DEFAULT NULL,
  `sem1grad` varchar(300) DEFAULT NULL,
  `sem2grad` varchar(300) DEFAULT NULL,
  `sem3grad` varchar(300) DEFAULT NULL,
  `sem4grad` varchar(300) DEFAULT NULL,
  `sem5grad` varchar(300) DEFAULT NULL,
  `sem6grad` varchar(300) DEFAULT NULL,
  `sem7grad` varchar(300) DEFAULT NULL,
  `sem8grad` varchar(300) DEFAULT NULL,
  `aggregategrad` varchar(300) DEFAULT NULL,
  `universitygrad` varchar(300) DEFAULT NULL,
  `branchpg` varchar(300) DEFAULT NULL,
  `sem1pg` varchar(300) DEFAULT NULL,
  `sem2pg` varchar(300) DEFAULT NULL,
  `sem3pg` varchar(300) DEFAULT NULL,
  `sem4pg` varchar(300) DEFAULT NULL,
  `yearofgradpg` varchar(300) DEFAULT NULL,
  `aggregatepg` varchar(300) DEFAULT NULL,
  `project` longtext,
  `training` longtext,
  `work_experience` longtext,
  `gapreason` varchar(300) DEFAULT NULL,
  `number_of_backlogs` varchar(11) DEFAULT NULL,
  `backlog_subjects` longtext,
  `backlogreason` varchar(300) DEFAULT NULL,
  `other_qualifications` longtext,
  `professional_societies` longtext,
  `extra_curriculars` longtext,
  `career_objective` longtext,
  `technical_skills` longtext,
  `other_skills` longtext,
  `hobbies` longtext,
  `tnc_declaration` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_personal`
--
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
