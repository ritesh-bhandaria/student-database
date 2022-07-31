-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2021 at 09:18 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `course` varchar(50) NOT NULL,
  `announcement` varchar(500) NOT NULL,
  `files` blob NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`course`, `announcement`, `files`, `date`) VALUES
('dS', 'ayan seal sir is busy somewhere else ', '', '2021-11-14 20:30:28'),
('sample2', 'helo', '', '2021-11-14 20:31:16'),
('sample2', 'helo', '', '2021-11-14 20:31:21'),
('dbms lab', 'submit your assignments on time', '', '2021-11-15 12:38:37'),
('dbms lab', 'submit your assignments on time', '', '2021-11-15 12:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_name` varchar(50) NOT NULL,
  `course_instructor` varchar(15) NOT NULL,
  `syllabus` varchar(100) NOT NULL,
  `marksheets` varchar(100) NOT NULL,
  `lecture_link` varchar(100) NOT NULL,
  `lecture_folder` varchar(100) NOT NULL,
  `credits` int(8) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `additionals` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_name`, `course_instructor`, `syllabus`, `marksheets`, `lecture_link`, `lecture_folder`, `credits`, `date`, `additionals`) VALUES
('complex algebra', 'abc', 'https://www.facebook.com', '', '', '', 3, '2021-10-29', ''),
('dbms lab', 'amit bhati', 'https://www.google.com', '', '', '', 3, '2021-11-15', ''),
('dS', 'abc', '', '', '', '', 5, '2021-10-24', ''),
('new course by as', 'seal', '', '', '', '', 3, '2021-11-15', ''),
('new sample', 'abc', '', '', '', '', 3, '2021-10-25', ''),
('sample course', 'abc', '#', '#', '#', '#', 4, '2021-09-21', '#'),
('sample2', 'abc', '', '', '', '', 3, '2021-10-25', ''),
('sql lab', 'amit bhati', 'https://www.google.com', 'https://www.facebook.com', 'https://www.google.com', 'https://www.google.com', 3, '2021-11-15', 'https://www.syllabus.com'),
('webdev', 'amit bhati', '', '', '', '', 4, '2021-11-15', '');

-- --------------------------------------------------------

--
-- Table structure for table `joining`
--

CREATE TABLE `joining` (
  `course` varchar(50) NOT NULL,
  `roll_no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `joining`
--

INSERT INTO `joining` (`course`, `roll_no`) VALUES
('webdev', '20bcs183'),
('webdev', '20bcs900');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `rollno` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`rollno`, `name`, `email`, `password`, `date`) VALUES
('1', '', 'hello@gmail.com', '1234', '2021-09-12 01:02:22'),
('20bcs007', 'xyz', 'raghav@example.com', '12345678', '2021-11-15 11:41:16'),
('raghav', '', 'raghav@example.com', 'raghav', '2021-09-12 23:00:21'),
('rakshit', '', 'rakshit@example.com', '1234', '2021-09-13 09:42:42'),
('ritesh bhan', '', 'ritesh.bhandaria1308', '1234', '2021-09-12 01:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` varchar(15) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(15) NOT NULL,
  `department` varchar(8) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `department`, `password`) VALUES
('0000', 'amit bhati', 'amitbhati@gmail', 'cse', '12345678'),
('123', 'abc', 'abc@gmail.com', 'cse', ''),
('12344', '', '', '', 'AYANSEAL'),
('456', 'seal', 'raghav@example.', 'cse', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD KEY `course` (`course`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_name`),
  ADD KEY `course_instructor` (`course_instructor`);

--
-- Indexes for table `joining`
--
ALTER TABLE `joining`
  ADD KEY `course` (`course`),
  ADD KEY `roll_no` (`roll_no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rollno`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `joining`
--
ALTER TABLE `joining`
  ADD CONSTRAINT `joining_ibfk_1` FOREIGN KEY (`course`) REFERENCES `courses` (`course_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
