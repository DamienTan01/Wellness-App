-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 12:16 PM
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
('act000', 'Sit-up', 25),
('act001', 'Running', 25),
('act002', 'Weightlifting', 25),
('act003', 'Cycle', 25),
('act004', 'Yoga', 25),
('act005', 'Breakfast', 10),
('act006', 'Lunch', 10),
('act007', 'Dinner', 10),
('act008', 'Sleep Earlier', 10),
('act009', '8 hours Sleep', 10);

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

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `com_id`, `user_id`, `content`) VALUES
(18, '000001', 'USR001', 'No! I hate vege T.T'),
(19, '000001', 'USR002', 'Arhhhh!!! I\'m the vege lover! Nice to meet you!'),
(20, '000002', 'USR000', 'No please'),
(30, '000002', 'USR002', 'Oh yes, a workout helps me to keep my body fit and healthy!'),
(31, '000002', 'USR000', 'lazy to workout la...'),
(32, '000004', 'USR000', 'Nice hahahaha'),
(33, '000004', 'USR001', 'Yo man... be positive'),
(34, '000004', 'USR001', 'just have a good habit to live healthier'),
(35, '000004', 'USR002', 'agree +1');

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
  `com_status` varchar(10) NOT NULL DEFAULT 'Pending',
  `user_id` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `community`
--

INSERT INTO `community` (`com_id`, `com_title`, `com_content`, `com_media`, `com_published`, `com_status`, `user_id`) VALUES
('000001', 'Vege Everyday!', 'Guys, you should try to have vege everyday. It is so good!', 'eatHealthy.jpg', '2022-07-18 13:20:54', 'Approved', 'USR001'),
('000002', 'Time to Workout', 'What are the health benefits of exercise?\r\n\r\n1. Help you control your weight.\r\n2. Reduce your risk of heart diseases.\r\n3. Help your body manage blood sugar and insulin levels.\r\n4. Improve your mental health and mood. ', 'workout1.png', '2022-07-19 03:22:15', 'Approved', 'ADM000'),
('000003', 'It\'s A Day', '** Workout Day 4 **\r\n\r\nDaily attendance +1\r\nBe happy be healthy', 'workout2.png', '2022-07-19 03:40:10', 'Approved', 'USR000'),
('000004', 'Countdown: Life', 'Life is a countdown.\r\nWhy don\'t we live longer than we expected?\r\nBe more healthy', 'countdown.gif', '2022-07-23 15:14:46', 'Approved', 'ADM001'),
('000005', 'Benefits of Eating Healthy Food', 'Benefits of Healthy Eating\r\n\r\n1. Keeps skin, teeth, and eyes healthy.\r\n2. Boosts immunity.\r\n3. Strengthens bones.\r\n4. Lowers risk of heart disease, type 2 diabetes, and some cancers.', 'EAT_HEALTHY_FOOD.jpg', '2022-07-23 15:14:46', 'Pending', 'USR000'),
('000006', 'Foodie :3', 'Salad for my dinner today hehe ', 'salad.jpg', '2022-07-24 09:11:40', 'Pending', 'USR002');

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
  `tip_content` text NOT NULL,
  `tip_media` text DEFAULT NULL,
  `tip_published` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`tip_id`, `tip_title`, `tip_content`, `tip_media`, `tip_published`) VALUES
('TIP000', '10 Healthy Living Tips for College Students', '1. Focus on health\r\n\r\n2. Get into a routine\r\n\r\n3. Choose nutrient-dense meals and snacks\r\n\r\n4. Keep healthy food easily available\r\n\r\n5. Avoid eating while studying\r\n\r\n6. Avoid eating late at night\r\n\r\n7. Drink plenty of water\r\n\r\n8. Prioritize sleep\r\n\r\n9. Walk to everything and utilize fitness facilities\r\n\r\n10. Manage stress', 'health_for_all.gif', '2022-07-16 12:25:38'),
('TIP001', 'Meditation Brings Us Benefits', 'The emotional and physical benefits of meditation can include:\r\n\r\n* Gaining a new perspective on stressful situations\r\n\r\n* Building skills to manage your stress\r\n\r\n* Focusing on the present\r\n\r\n* Reducing negative emotions\r\n\r\n* Increasing imagination and creativity\r\n\r\n* Increasing patience and tolerance', 'mental.jpg', '2022-07-17 09:23:33'),
('TIP002', 'Signs & Symptoms of Mental Illness', '- Confused thinking or reduced ability to concentrate\r\n\r\n- Excessive fears or worries, or extreme feelings of guilt\r\n\r\n- Extreme mood changes of highs and lows\r\n\r\n- Withdrawal from friends and activities\r\n\r\n- Significant tiredness, low energy or problems sleeping\r\n\r\n- Major changes in eating habits', 'gudetama.png', '2022-07-18 03:23:54'),
('TIP003', 'What is Wellness?', 'The Global Wellness Institute defines wellness as the active pursuit of activities, choices and lifestyles that lead to a state of holistic health.\r\n\r\nModels of Wellness:\r\n\r\n1. Physical\r\n\r\n2. Mental\r\n\r\n3. Emotional\r\n\r\n4. Spiritual\r\n\r\n5. Social\r\n\r\n6. Environmental\r\n', 'wellness2.png', '2022-07-19 03:29:12'),
('TIP004', 'What are 5 Benefits of Wellness?', 'It is in high demand.\r\n\r\nIt improves productivity and performance.\r\n\r\nIt lowers the risk of illness and the impact of stress.\r\n\r\nIt lowers healthcare costs.\r\n\r\nIt improves teamwork.\r\n', 'wellness.jpg', '2022-07-19 03:36:44');

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
('ADM000', 'Admin', 'Joey', 'Ooi Ying Jie', '2001-04-19', 'F', 'crazyjoey@gmail.com', '123456'),
('ADM001', 'Admin', 'Teriyaki', 'Lim Pau Thing', '2001-06-07', 'F', 'ptlim67@gmail.com', '654321 '),
('USR000', 'User', 'Jessi', 'Tan Yi Jia', '2001-08-20', 'F', 'yijiatan@gmail.com', '456789'),
('USR001', 'User', 'Lengzai Mou', 'Jeremy Oh', '2000-05-15', 'M', 'jeremyoh515@gmail.com', '987654'),
('USR002', 'User', 'Lenglui Mou', 'Nayeon', '1995-09-22', 'F', 'nayeon22@gmail.com', 'twice123');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `record_id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
