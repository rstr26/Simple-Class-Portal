-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 04:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `name` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pw` varchar(30) NOT NULL,
  `role` varchar(7) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `accountId` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`name`, `username`, `pw`, `role`, `subject`, `accountId`) VALUES
('Adam West', 'adam1', 'west1', 'teacher', 'Law', 'dkbmf28gn2'),
('Griffin, Chris', 'chris1', 'griffin1', 'student', 'NA', '63f32fa618ce7'),
('Cleveland Brown', 'cleveland1', 'brown1', 'teacher', 'History', 'sm37fn01j5'),
('Glenn Quagmire', 'glenn1', 'quagmire1', 'teacher', 'Physical Education', 'dm5nj7ls1'),
('Joe Swanson', 'joe1', 'swanson1', 'teacher', 'Science', 'dk58vmm2m1'),
('Lois Griffin', 'lois1', 'griffin1', 'teacher', 'Music', 'smtd523c05'),
('Griffin, Meg', 'meg1', 'griffin1', 'student', 'NA', '63f32d22903cf'),
('Mort Goldman', 'mort1', 'goldman1', 'teacher', 'Math', 'dse2cr13rv'),
('Peter Griffin', 'peter1', 'griffin1', 'teacher', 'English', 'mwk3MnLp019mZ'),
('Tom Tucker', 'Tom1', 'Tucker1', 'teacher', 'Research', 'sm4kgLnU789mN');

-- --------------------------------------------------------

--
-- Table structure for table `semester1`
--

CREATE TABLE `semester1` (
  `accountId` varchar(13) NOT NULL,
  `name` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester1`
--

INSERT INTO `semester1` (`accountId`, `name`, `subject`, `teacher`, `grade`) VALUES
('63f32d22903cf', 'Griffin, Meg', 'Law', 'Adam West', 81),
('63f32d22903cf', 'Griffin, Meg', 'History', 'Cleveland Brown', 0),
('63f32d22903cf', 'Griffin, Meg', 'Physical Education', 'Glenn Quagmire', 0),
('63f32d22903cf', 'Griffin, Meg', 'Science', 'Joe Swanson', 0),
('63f32d22903cf', 'Griffin, Meg', 'Music', 'Lois Griffin', 0),
('63f32d22903cf', 'Griffin, Meg', 'Math', 'Mort Goldman', 0),
('63f32d22903cf', 'Griffin, Meg', 'English', 'Peter Griffin', 74),
('63f32d22903cf', 'Griffin, Meg', 'Research', 'Tom Tucker', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Law', 'Adam West', 0),
('63f32fa618ce7', 'Griffin, Chris', 'History', 'Cleveland Brown', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Physical Education', 'Glenn Quagmire', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Science', 'Joe Swanson', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Music', 'Lois Griffin', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Math', 'Mort Goldman', 0),
('63f32fa618ce7', 'Griffin, Chris', 'English', 'Peter Griffin', 81),
('63f32fa618ce7', 'Griffin, Chris', 'Research', 'Tom Tucker', 78);

-- --------------------------------------------------------

--
-- Table structure for table `semester2`
--

CREATE TABLE `semester2` (
  `accountId` varchar(13) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester2`
--

INSERT INTO `semester2` (`accountId`, `name`, `subject`, `teacher`, `grade`) VALUES
('63f32d22903cf', 'Griffin, Meg', 'Law', 'Adam West', 80),
('63f32d22903cf', 'Griffin, Meg', 'History', 'Cleveland Brown', 0),
('63f32d22903cf', 'Griffin, Meg', 'Physical Education', 'Glenn Quagmire', 0),
('63f32d22903cf', 'Griffin, Meg', 'Science', 'Joe Swanson', 0),
('63f32d22903cf', 'Griffin, Meg', 'Music', 'Lois Griffin', 0),
('63f32d22903cf', 'Griffin, Meg', 'Math', 'Mort Goldman', 0),
('63f32d22903cf', 'Griffin, Meg', 'English', 'Peter Griffin', 75),
('63f32d22903cf', 'Griffin, Meg', 'Research', 'Tom Tucker', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Law', 'Adam West', 0),
('63f32fa618ce7', 'Griffin, Chris', 'History', 'Cleveland Brown', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Physical Education', 'Glenn Quagmire', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Science', 'Joe Swanson', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Music', 'Lois Griffin', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Math', 'Mort Goldman', 0),
('63f32fa618ce7', 'Griffin, Chris', 'English', 'Peter Griffin', 82),
('63f32fa618ce7', 'Griffin, Chris', 'Research', 'Tom Tucker', 81);

-- --------------------------------------------------------

--
-- Table structure for table `semester3`
--

CREATE TABLE `semester3` (
  `accountId` varchar(13) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester3`
--

INSERT INTO `semester3` (`accountId`, `name`, `subject`, `teacher`, `grade`) VALUES
('63f32d22903cf', 'Griffin, Meg', 'Law', 'Adam West', 80),
('63f32d22903cf', 'Griffin, Meg', 'History', 'Cleveland Brown', 0),
('63f32d22903cf', 'Griffin, Meg', 'Physical Education', 'Glenn Quagmire', 0),
('63f32d22903cf', 'Griffin, Meg', 'Science', 'Joe Swanson', 0),
('63f32d22903cf', 'Griffin, Meg', 'Music', 'Lois Griffin', 0),
('63f32d22903cf', 'Griffin, Meg', 'Math', 'Mort Goldman', 0),
('63f32d22903cf', 'Griffin, Meg', 'English', 'Peter Griffin', 80),
('63f32d22903cf', 'Griffin, Meg', 'Research', 'Tom Tucker', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Law', 'Adam West', 0),
('63f32fa618ce7', 'Griffin, Chris', 'History', 'Cleveland Brown', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Physical Education', 'Glenn Quagmire', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Science', 'Joe Swanson', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Music', 'Lois Griffin', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Math', 'Mort Goldman', 0),
('63f32fa618ce7', 'Griffin, Chris', 'English', 'Peter Griffin', 88),
('63f32fa618ce7', 'Griffin, Chris', 'Research', 'Tom Tucker', 77);

-- --------------------------------------------------------

--
-- Table structure for table `semester4`
--

CREATE TABLE `semester4` (
  `accountId` varchar(13) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `teacher` varchar(30) NOT NULL,
  `grade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester4`
--

INSERT INTO `semester4` (`accountId`, `name`, `subject`, `teacher`, `grade`) VALUES
('63f32d22903cf', 'Griffin, Meg', 'Law', 'Adam West', 80),
('63f32d22903cf', 'Griffin, Meg', 'History', 'Cleveland Brown', 0),
('63f32d22903cf', 'Griffin, Meg', 'Physical Education', 'Glenn Quagmire', 0),
('63f32d22903cf', 'Griffin, Meg', 'Science', 'Joe Swanson', 0),
('63f32d22903cf', 'Griffin, Meg', 'Music', 'Lois Griffin', 0),
('63f32d22903cf', 'Griffin, Meg', 'Math', 'Mort Goldman', 0),
('63f32d22903cf', 'Griffin, Meg', 'English', 'Peter Griffin', 74),
('63f32d22903cf', 'Griffin, Meg', 'Research', 'Tom Tucker', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Law', 'Adam West', 0),
('63f32fa618ce7', 'Griffin, Chris', 'History', 'Cleveland Brown', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Physical Education', 'Glenn Quagmire', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Science', 'Joe Swanson', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Music', 'Lois Griffin', 0),
('63f32fa618ce7', 'Griffin, Chris', 'Math', 'Mort Goldman', 0),
('63f32fa618ce7', 'Griffin, Chris', 'English', 'Peter Griffin', 86),
('63f32fa618ce7', 'Griffin, Chris', 'Research', 'Tom Tucker', 79);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `accountId` (`accountId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
