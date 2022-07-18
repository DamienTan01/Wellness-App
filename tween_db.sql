-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 09:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tween_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `ach_id` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ach_title` varchar(50) NOT NULL,
  `ach_description` text NOT NULL,
  `ach_score` int(11) NOT NULL,
  `ach_status` tinyint(1) NOT NULL,
  `act_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ach_records`
--

CREATE TABLE `ach_records` (
  `record_id` int(11) NOT NULL,
  `user_id` varchar(6) NOT NULL,
  `ach_id` varchar(6) NOT NULL,
  `ach_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `act_id` varchar(6) NOT NULL,
  `act_title` varchar(50) NOT NULL,
  `act_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `act_title`, `act_score`) VALUES
('act000', 'Sit-up', NULL),
('act001', 'Running', NULL),
('act002', 'Rope Skipping', NULL),
('act003', 'Weightlifting', NULL),
('act004', 'Cycle', NULL),
('act005', 'Yoga', NULL),
('act006', 'Stretching', NULL),
('act007', 'Star Jump', NULL),
('act008', 'Exercise Balls', NULL),
('act009', 'Breakfast', NULL),
('act010', 'Lunch', NULL),
('act011', 'Dinner', NULL),
('act012', 'Sleep Earlier', NULL),
('act013', '8 hours Sleep', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `com_id` varchar(6) NOT NULL,
  `user_id` varchar(6) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `com_id` varchar(6) NOT NULL,
  `com_title` varchar(255) NOT NULL,
  `com_content` longtext NOT NULL,
  `com_media` text DEFAULT NULL,
  `com_published` timestamp NOT NULL DEFAULT current_timestamp(),
  `com_like` int(11) NOT NULL DEFAULT 0,
  `com_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `user_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`com_id`, `com_title`, `com_content`, `com_media`, `com_published`, `com_like`, `com_status`, `user_id`) VALUES
('000001', 'adrehadfhadfhadfhsdf', 'adfhadfhadfhadhdgs dfghaef hd', NULL, '2022-07-15 18:10:44', 0, 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `record_id` int(6) NOT NULL,
  `user_id` varchar(6) NOT NULL,
  `act_id` varchar(6) NOT NULL,
  `streak` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `tip_id` varchar(6) NOT NULL,
  `tip_title` varchar(255) NOT NULL,
  `tip_content` longtext NOT NULL,
  `tip_media` text DEFAULT NULL,
  `tip_published` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`tip_id`, `tip_title`, `tip_content`, `tip_media`, `tip_published`) VALUES
('TIP001', 'Sha', 'Shy shy shy', '샤_bgr_2.jpg', '2022-07-19 03:03:38'),
('TIP002', 'Test Tip2', 'AHHHHHHHHHHHHH', '샤_bgr_1.jpg', '2022-07-19 03:23:33'),
('TIP003', 'Alcohol Free Tip', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', 'image1.jpg', '2022-07-19 03:23:54'),
('TIP004', 'ERm', 'What are the 5 duties of a principal? \r\n\r\n- Shaping a vision of academic success for all students. \r\n\r\n- Creating a climate hospitable to education. \r\n\r\n- Cultivating leadership in others. \r\n\r\n- Improving instruction. \r\n\r\n- Managing people, data and processes.\r\n', 'Link.png', '2022-07-19 03:29:12'),
('TIP005', 'What are 5 benefits of wellness?', 'It is in high demand.\r\n\r\nIt improves productivity and performance.\r\n\r\nIt lowers the risk of illness and the impact of stress.\r\n\r\nIt lowers healthcare costs.\r\n\r\nIt improves teamwork.\r\n', 'gudetama.png', '2022-07-19 03:36:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(6) NOT NULL,
  `user_type` char(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type`, `username`, `name`, `dob`, `gender`, `email`, `password`) VALUES
('ADM000', 'Admin', 'Joey', 'Ying Jie', '2001-04-19', 'F', 'crazyjoeyooi@gmail.com', '123456 '),
('USR000', 'User', 'Jojo', NULL, NULL, NULL, 'jojo@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`ach_id`);

--
-- Indexes for table `ach_records`
--
ALTER TABLE `ach_records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`act_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`tip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ach_records`
--
ALTER TABLE `ach_records`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
