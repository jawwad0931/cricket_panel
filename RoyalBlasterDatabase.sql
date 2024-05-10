-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 12, 2024 at 07:22 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21993991_royaldatabases`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `admin_name`, `admin_pass`) VALUES
(1, 'murtaza', '11');

-- --------------------------------------------------------

--
-- Table structure for table `batsman_career`
--

CREATE TABLE `batsman_career` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `matches_played` int(255) NOT NULL,
  `innings_batted` int(255) NOT NULL,
  `runs_scored` int(255) NOT NULL,
  `highest_score` int(11) NOT NULL,
  `average` int(255) NOT NULL,
  `strike_rate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batting_ranks`
--

CREATE TABLE `batting_ranks` (
  `Id` int(255) NOT NULL,
  `Ranks` int(255) NOT NULL,
  `batsman_photo` varchar(255) NOT NULL,
  `Batsman_name` varchar(255) NOT NULL,
  `rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batting_ranks`
--

INSERT INTO `batting_ranks` (`Id`, `Ranks`, `batsman_photo`, `Batsman_name`, `rating`) VALUES
(31, 4, 'images/newbanner.png', 'khans', 1233),
(32, 1, 'images/WhatsApp Image 2024-02-23 at 12.54.55 PM.jpeg', 'kh', 11),
(34, 2, 'images/Yellow Orange Modern Minimalist Webinar Marketing Banner.png', 'juu', 123),
(35, 2, 'images/code-g32ca37dbd_1920.jpg', 'hans', 123);

-- --------------------------------------------------------

--
-- Table structure for table `bowler_career`
--

CREATE TABLE `bowler_career` (
  `id` int(255) NOT NULL,
  `NAMES` varchar(255) NOT NULL,
  `M` int(255) NOT NULL,
  `INN` int(255) NOT NULL,
  `RUNS` int(255) NOT NULL,
  `WICKETS` int(255) NOT NULL,
  `ECO` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bowler_career`
--

INSERT INTO `bowler_career` (`id`, `NAMES`, `M`, `INN`, `RUNS`, `WICKETS`, `ECO`) VALUES
(1, 'sad', 12, 111, 111, 5654, '33'),
(3, 'muhammad', 111, 111, 12, 11, '9.8');

-- --------------------------------------------------------

--
-- Table structure for table `bowler_ranks`
--

CREATE TABLE `bowler_ranks` (
  `Id` int(255) NOT NULL,
  `Ranks` int(255) NOT NULL,
  `bowler_image` varchar(255) NOT NULL,
  `Bowler_Name` varchar(255) NOT NULL,
  `Rating` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bowler_ranks`
--

INSERT INTO `bowler_ranks` (`Id`, `Ranks`, `bowler_image`, `Bowler_Name`, `Rating`) VALUES
(1, 125, 'images/newbanner.png', 'jawwadd', 145);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(255) NOT NULL,
  `date` date NOT NULL,
  `team1` varchar(255) NOT NULL,
  `team2` varchar(255) NOT NULL,
  `result` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `team1`, `team2`, `result`, `status`) VALUES
(36, '2024-02-28', '123', 'blasters', 'blaster won the matches', NULL),
(38, '2024-02-28', 'JkWester', 'Royal blaster', 'Upcoming', 1);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(255) NOT NULL,
  `Name` varchar(500) DEFAULT NULL,
  `playing_role` varchar(255) DEFAULT NULL,
  `age` int(255) DEFAULT NULL,
  `sex` varchar(300) DEFAULT NULL,
  `country` varchar(500) DEFAULT NULL,
  `phone` varchar(300) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `matches` int(11) DEFAULT NULL,
  `Innings` int(11) DEFAULT NULL,
  `runs` int(11) DEFAULT NULL,
  `wickets` int(11) DEFAULT NULL,
  `highest_wickets` varchar(255) DEFAULT NULL,
  `average` int(11) DEFAULT NULL,
  `strike_rate` int(11) DEFAULT NULL,
  `economy` int(11) DEFAULT NULL,
  `highest_score` int(11) DEFAULT NULL,
  `batting` varchar(300) DEFAULT NULL,
  `balling` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `Name`, `playing_role`, `age`, `sex`, `country`, `phone`, `password`, `matches`, `Innings`, `runs`, `wickets`, `highest_wickets`, `average`, `strike_rate`, `economy`, `highest_score`, `batting`, `balling`, `address`) VALUES
(17, 'Ahmed', 'All Rounder', 24, 'Female', 'pakistan', '923400028803', '111', 0, 0, 245, 0, '344', 32, 23, 0, 239, 'Right hand', 'Fast Bowling', 'wew'),
(20, 'ali', 'all Rounder', 12, 'male', 'pakistan', '0987654321', '12', 123, 345, 466, 78, '56/7', 7777, 324, 777, 0, 'right', 'right arm', 'new campus'),
(22, 'malik', 'batsman', 24, 'Male', 'Pakistan', '732187489', '1', 123, 23, 245, 200, '2/30', 23, 245, 13, 3, 'Right Hand', 'Left Hans', 'MT khan road near new haji camp, Sultanabad, Karachi'),
(23, 'leonardo', 'batsman', 45, 'Male', 'Pakistan', '1234567890', '', 12, 10, 346, 20, '4/7', 13, 245, 777, 130, 'Right Hand', 'Left Hands', 'MT khan road near new haji camp, Sultanabad, Karachi'),
(27, 'Bilal Khan', 'Batsman', 24, 'Male', 'asdsa', '06669856666', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Right hand', 'Spin Bowling', 'khanpur'),
(28, 'khan', 'Bowler', 24, 'Male', 'asdsa', '923400028803', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Left hand', 'Fast Bowling', 'khanpur'),
(29, 'Meer Shah', 'Captain', 21, 'Male', 'Pakistan ', '03272282213', '205541480', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Right hand', 'Spin Bowling', 'Ak-7B-S1 Street 11 Shah Abdul Latif Bhitai Road Daryabad Lyari Karachi'),
(30, 'Hameed Khan', 'All Rounder', 20, 'Male', 'Pakistan ', '03461295369', 'hameed16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Right hand', 'Spin Bowling', 'Bangali Para');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batsman_career`
--
ALTER TABLE `batsman_career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batting_ranks`
--
ALTER TABLE `batting_ranks`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `bowler_career`
--
ALTER TABLE `bowler_career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bowler_ranks`
--
ALTER TABLE `bowler_ranks`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batsman_career`
--
ALTER TABLE `batsman_career`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `batting_ranks`
--
ALTER TABLE `batting_ranks`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bowler_career`
--
ALTER TABLE `bowler_career`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bowler_ranks`
--
ALTER TABLE `bowler_ranks`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
