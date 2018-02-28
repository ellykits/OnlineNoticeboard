-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 02:21 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `p_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `email`, `password`, `name`, `address`, `city`, `p_code`, `phone`) VALUES
('admin', 'mejahjohn94@gmail.com', '12345', 'Mejah John', 'Mawego', 'Bondo', '56565', '0715424311');

-- --------------------------------------------------------

--
-- Table structure for table `cod`
--

CREATE TABLE `cod` (
  `job_code` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `faculty` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `p_address` varchar(255) DEFAULT NULL,
  `p_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cod`
--

INSERT INTO `cod` (`job_code`, `username`, `password`, `name`, `job_title`, `department`, `faculty`, `gender`, `p_address`, `p_code`, `phone`) VALUES
('123', '123', '123', 'Mutuku Ngao', 'Assistant Lecturer', 'Building and Civil Engineering', 'Faculty of Engineering and Technology', 'Male', 'Kitui', '566565', '0712365879');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_no` varchar(255) NOT NULL,
  `dept_no` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_no`, `dept_no`, `course_name`) VALUES
('1', '1', 'Bachelor of Science Civil Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `depts`
--

CREATE TABLE `depts` (
  `dept_no` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `dept_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depts`
--

INSERT INTO `depts` (`dept_no`, `faculty`, `dept_name`) VALUES
('1', 'Faculty of Engineering and Technology', 'Building and Civil Engineering'),
('2', 'Faculty of Engineering and Technology', 'Electrical and Electronic Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `notice_no` varchar(255) NOT NULL,
  `posted_by` varchar(1000) DEFAULT NULL,
  `time_posted` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `subject` varchar(255) DEFAULT NULL,
  `details` longtext NOT NULL,
  `doc_name` varchar(1000) NOT NULL,
  `file_location` varchar(1000) NOT NULL,
  `sent_to` varchar(255) NOT NULL,
  `mailed` varchar(10) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`notice_no`, `posted_by`, `time_posted`, `subject`, `details`, `doc_name`, `file_location`, `sent_to`, `mailed`) VALUES
('NTC1494893484', 'LAZARUS MUDIBO - Secretary(Academic)', '2017-05-16 00:11:58', 'Meeting with class representatives', 'Lets all meet at the marine block at 2 PM', '', '../notices/LAZARUS MUDIBO-Secretary(Academic)/', 'All', 'YES'),
('NTC1494893770', 'Mutuku Ngao - Building and Civil Engineering (COD)', '2017-05-16 00:17:08', 'Signing of Nominal Rolls', 'Please the following students to come and sign in the nominal rol', 'GROUPS.docx', '../notices/Mutuku Ngao-Building and Civil Engineering (COD)/GROUPS.docx', 'Building and Civil Engineering', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_no` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `responsibility` varchar(255) DEFAULT 'Regular',
  `position` varchar(255) NOT NULL DEFAULT 'Commoner',
  `department` varchar(255) DEFAULT 'Degree',
  `course` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `p_address` varchar(255) DEFAULT NULL,
  `p_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_no`, `name`, `username`, `password`, `responsibility`, `position`, `department`, `course`, `gender`, `email`, `phone`, `p_address`, `p_code`) VALUES
('BTIT/001/2013', 'Joe Miano', 'joe', '123456', 'Regular', 'Comrade', 'Building and Civil Engineering', 'Bachelor of Science Civil Engineering', 'Male', 'joemiano@gmail.com', '07128319813', 'Kiambu', '56565'),
('BTIT/027J/2013', 'LAZARUS MUDIBO', 'laz', '123456', 'Leader', 'Secretary(Academic)', 'Building and Civil Engineering', 'Bachelor of Science Civil Engineering', 'Male', 'lazarotosha@gmail.com', '071256545', 'Migori', '4223'),
('BTIT/033J/2013', 'SAMUEL MIBEI', 'BTIT/033J/2013', 'BTIT/033J/2013', 'Regular', 'Comrade', 'Building and Civil Engineering', 'Bachelor of Science Civil Engineering', 'Male', 'samuelmibei@gmail.com', '0712804965', 'Kericho', '2200');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cod`
--
ALTER TABLE `cod`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `job_code` (`job_code`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_no`,`dept_no`),
  ADD KEY `dept_no` (`dept_no`);

--
-- Indexes for table `depts`
--
ALTER TABLE `depts`
  ADD PRIMARY KEY (`dept_no`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`notice_no`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_no`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`dept_no`) REFERENCES `depts` (`dept_no`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
