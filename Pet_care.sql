-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220506.44a5cb2d56
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2022 at 05:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pet_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `label` text NOT NULL,
  `description` text NOT NULL,
  `photo` blob DEFAULT NULL,
  `location` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`label`, `description`, `photo`, `location`, `id`) VALUES
('About us testing', 'testing', '', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3622.7256444722366!2d46.68682081516388!3d24.77059418409634!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2efd3fc8ec4aeb%3A0x605baa975e4243f9!2sAdvanced%20Pet%20Clinic!5e0!3m2!1sen!2ssa!4v1645211168968!5m2!1sen!2ssa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointments_requests`
--

CREATE TABLE `appointments_requests` (
  `pet_name` varchar(15) NOT NULL,
  `service` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `owner_email` varchar(25) NOT NULL,
  `status` varchar(30) DEFAULT NULL,
  `note` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments_requests`
--

INSERT INTO `appointments_requests` (`pet_name`, `service`, `date`, `time`, `owner_email`, `status`, `note`) VALUES
('Lulu', 'grooming', '2022-05-11', '32:52:53', 'alhanouf@gmail.com', 'completed', NULL),
('sam', 'grooming', '2022-05-04', '28:52:53', 'nada@gmail.com', 'completed', NULL),
('Lucy', 'grooming', '2022-05-10', '29:54:17', 'raseel@gmail.com', 'declined', NULL),
('juju', 'Grooming ', '2022-05-10', '32:54:17', 'sara@gmail.com', 'completed', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `available_appointments`
--

CREATE TABLE `available_appointments` (
  `service` varchar(15) NOT NULL,
  `date` varchar(15) NOT NULL,
  `time` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_appointments`
--

INSERT INTO `available_appointments` (`service`, `date`, `time`) VALUES
('Checkup', '2022-04-11', '07:05'),
('Boarding', '2022-04-05', '00:40'),
('Grooming', '2022-04-19', '04:10');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `email` varchar(35) NOT NULL,
  `password` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`email`, `password`) VALUES
('alhanouf@gmail.com', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `pet`
--

CREATE TABLE `pet` (
  `ID` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `photo` text DEFAULT NULL,
  `birthDate` date NOT NULL,
  `breed` varchar(30) NOT NULL,
  `pet_status` enum('spayed','neutered') NOT NULL,
  `medicalHistory` longblob DEFAULT NULL,
  `vaccinations` longblob DEFAULT NULL,
  `gender` enum('male','female') NOT NULL,
  `owner_email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pet_owner`
--

CREATE TABLE `pet_owner` (
  `email` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `phone_no` int(11) NOT NULL,
  `photo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `Petimage` blob DEFAULT NULL,
  `Petname` varchar(25) DEFAULT NULL,
  `review` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments_requests`
--
ALTER TABLE `appointments_requests`
  ADD PRIMARY KEY (`owner_email`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `owner_email` (`owner_email`) USING BTREE;

--
-- Indexes for table `pet_owner`
--
ALTER TABLE `pet_owner`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pet`
--
ALTER TABLE `pet`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`owner_email`) REFERENCES `pet_owner` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



