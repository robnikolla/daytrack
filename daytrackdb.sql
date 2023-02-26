-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 06:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `daytrackdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admindb`
--

CREATE TABLE `admindb` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admindb`
--

INSERT INTO `admindb` (`ID`, `name`, `surname`, `email`, `username`, `password`, `confpassword`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', 'johndoe', 'admin123', 'admin123'),
(3, 'Ted ', 'Lasso', 'tedlasso@gmail.com', 'tedlasso', 'admin123', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `detyra`
--

CREATE TABLE `detyra` (
  `ID` int(11) NOT NULL,
  `desc` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `deadline` date NOT NULL,
  `admin` int(11) NOT NULL,
  `progress` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detyra`
--

INSERT INTO `detyra` (`ID`, `desc`, `status`, `deadline`, `admin`, `progress`, `username`) VALUES
(3, 'code landing page', 'Completed', '2023-02-21', 1, 0, 'patrik'),
(5, 'code header&footer', 'Completed', '2023-03-14', 1, 27, 'robert'),
(7, 'code login logic', 'Pending', '2025-02-20', 1, 0, 'pjetri'),
(8, 'design logo and header image', 'Pending', '2023-02-16', 1, 0, 'patrik'),
(11, 'design background image', 'Pending', '2023-01-04', 3, 0, 'patrik'),
(12, 'add spotify integration', 'Pending', '2023-04-05', 3, 0, 'robert'),
(13, 'send email to spotify', 'Pending', '2023-05-26', 3, 0, 'robert'),
(15, 'code pagination', 'In Progress', '2023-02-23', 3, 80, 'patrik'),
(17, 'document login code', 'Completed', '2023-02-24', 3, 0, 'pjetri'),
(23, 'make crud of meeting', 'In Progress', '2023-02-28', 3, 27, 'robert'),
(24, 'create morning meeting for tomorrow', 'In Progress', '2023-03-22', 3, 60, 'robert'),
(25, 'review code submit from patrik', 'Completed', '2023-02-25', 3, 0, 'robert');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `ID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `starttime` datetime NOT NULL,
  `length` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`ID`, `title`, `starttime`, `length`, `location`, `link`, `description`, `admin`) VALUES
(2, 'DayTrack opening webinar', '2023-02-01 10:00:00', 120, 'Prishtine', 'https://www.zoom.com', 'Meeting where development will be discussed.', 3),
(3, 'Meeting', '2023-02-01 10:00:00', 90, 'Ferizaj', 'www.meeting.com', 'test', 3),
(5, 'Test', '2024-02-01 22:30:00', 120, 'Prishtine', 'www.zoom.com', 'Test', 3),
(6, 'Meeting Test', '2023-02-22 14:30:00', 60, 'Tirane', 'https://www.spotify.com', 'Lorem ipsum dolor sit amet.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `meetinguser`
--

CREATE TABLE `meetinguser` (
  `meetingID` int(11) NOT NULL,
  `userEmail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meetinguser`
--

INSERT INTO `meetinguser` (`meetingID`, `userEmail`) VALUES
(5, 'robnikolla@gmail.com'),
(5, 'patriknikolla'),
(5, 'pjeteri@gmail.com'),
(6, 'robnikolla@gmail.com'),
(6, 'pjeteri@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usersdb`
--

CREATE TABLE `usersdb` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usersdb`
--

INSERT INTO `usersdb` (`ID`, `name`, `surname`, `email`, `username`, `password`, `confpassword`) VALUES
(1, 'Robert', 'Nikolla', 'robnikolla@gmail.com', 'robert', 'robert12345', 'robert12345'),
(2, 'Patrik', 'Nikolla', 'patriknikolla@gmail.com', 'patrik', 'patrik12345', 'patrik12345'),
(6, 'Pjeter', 'Nikolla', 'pjeteri@gmail.com', 'pjetri', 'pjeter12345', 'pjeter12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindb`
--
ALTER TABLE `admindb`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `detyra`
--
ALTER TABLE `detyra`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_username` (`username`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `usersdb`
--
ALTER TABLE `usersdb`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admindb`
--
ALTER TABLE `admindb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `detyra`
--
ALTER TABLE `detyra`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usersdb`
--
ALTER TABLE `usersdb`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detyra`
--
ALTER TABLE `detyra`
  ADD CONSTRAINT `FK_username` FOREIGN KEY (`username`) REFERENCES `usersdb` (`username`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
