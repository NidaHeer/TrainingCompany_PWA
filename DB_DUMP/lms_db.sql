-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 02:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `_to` varchar(255) NOT NULL,
  `_date` varchar(255) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `banner` varchar(100) NOT NULL,
  `date_created` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `section` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `fee` int(11) NOT NULL,
  `is_assigned` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_enroll`
--

CREATE TABLE `course_enroll` (
  `ID` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `fee_status` varchar(50) NOT NULL DEFAULT 'Not Paid'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_material`
--

CREATE TABLE `course_material` (
  `ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `title` text NOT NULL,
  `material` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_teacher`
--

CREATE TABLE `course_teacher` (
  `ID` int(11) NOT NULL,
  `T_ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_video`
--

CREATE TABLE `course_video` (
  `ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_classes`
--

CREATE TABLE `live_classes` (
  `ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `_date` varchar(100) NOT NULL,
  `_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `ID` int(11) NOT NULL,
  `Q_ID` int(11) NOT NULL,
  `op1` varchar(255) NOT NULL,
  `op2` varchar(255) NOT NULL,
  `op3` varchar(255) NOT NULL,
  `op4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `ID` int(11) NOT NULL,
  `C_ID` varchar(100) NOT NULL,
  `question` varchar(255) NOT NULL,
  `correct` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_attempts`
--

CREATE TABLE `quiz_attempts` (
  `ID` int(11) NOT NULL,
  `S_ID` int(11) NOT NULL,
  `Q_ID` int(11) NOT NULL,
  `attempted_on` varchar(100) NOT NULL,
  `obtain_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule_quiz`
--

CREATE TABLE `schedule_quiz` (
  `ID` int(11) NOT NULL,
  `C_ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `start_date` varchar(100) NOT NULL,
  `end_date` varchar(100) NOT NULL,
  `marks` int(11) NOT NULL,
  `quiz_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cellNo` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `cellNo` varchar(100) NOT NULL,
  `qual` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainingevents`
--

CREATE TABLE `trainingevents` (
  `EventID` int(11) NOT NULL,
  `EventName` varchar(100) NOT NULL,
  `EventType` enum('Online','In-person') NOT NULL,
  `EventDate` varchar(100) DEFAULT NULL,
  `StartTime` varchar(100) DEFAULT NULL,
  `EndTime` varchar(100) DEFAULT NULL,
  `VenueID` varchar(100) DEFAULT NULL,
  `JoinLink` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainingvenues`
--

CREATE TABLE `trainingvenues` (
  `VenueID` int(11) NOT NULL,
  `VenueName` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Capacity` varchar(50) NOT NULL,
  `Facilities` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `course_enroll`
--
ALTER TABLE `course_enroll`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `course_material`
--
ALTER TABLE `course_material`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `course_teacher`
--
ALTER TABLE `course_teacher`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `course_video`
--
ALTER TABLE `course_video`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `live_classes`
--
ALTER TABLE `live_classes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `schedule_quiz`
--
ALTER TABLE `schedule_quiz`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `trainingevents`
--
ALTER TABLE `trainingevents`
  ADD PRIMARY KEY (`EventID`);

--
-- Indexes for table `trainingvenues`
--
ALTER TABLE `trainingvenues`
  ADD PRIMARY KEY (`VenueID`),
  ADD UNIQUE KEY `VenueName` (`VenueName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_enroll`
--
ALTER TABLE `course_enroll`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_material`
--
ALTER TABLE `course_material`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_teacher`
--
ALTER TABLE `course_teacher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_video`
--
ALTER TABLE `course_video`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_classes`
--
ALTER TABLE `live_classes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_attempts`
--
ALTER TABLE `quiz_attempts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `schedule_quiz`
--
ALTER TABLE `schedule_quiz`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingevents`
--
ALTER TABLE `trainingevents`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainingvenues`
--
ALTER TABLE `trainingvenues`
  MODIFY `VenueID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
