-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 08:57 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideascorner`
--
CREATE DATABASE IF NOT EXISTS `ideascorner` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ideascorner`;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(5) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Facilities'),
(3, 'Food'),
(4, 'Accommodation'),
(6, 'IT Labs'),
(7, 'Education'),
(8, 'Technology'),
(9, 'Others'),
(10, 'Library');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `c_id` int(5) NOT NULL,
  `c_title` varchar(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `user_id` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`c_id`, `c_title`, `comments`, `user_id`) VALUES
(63, 'Android Studio app is not working in Bill Gate labs.', 'the app is very slow.', '000909012'),
(64, 'Food is canteen is not tasty but too expensive.', 'no', '000909012'),
(65, 'Food is canteen is not tasty but too expensive.', 'yes', '000909012'),
(66, 'Android Studio app is not working in Bill Gate labs.', 'yesss', '000909012'),
(67, 'The accommodation provided need to be near the college campus.', 'yes, i agree with this. ', '000909021'),
(73, 'Canteen Food', 'yes, the catering needs to be change. ', '000909123'),
(74, 'Make Collaboration a Priority.', 'yes, i agree with this idea. ', '000909123');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `depart_id` int(5) NOT NULL,
  `depart_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`depart_id`, `depart_name`) VALUES
(1001, 'Computing'),
(1002, 'Business'),
(1003, 'Arts'),
(1004, 'Accounting'),
(1005, 'Mathematics'),
(1006, 'Social Science');

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

DROP TABLE IF EXISTS `idea`;
CREATE TABLE IF NOT EXISTS `idea` (
  `i_id` int(5) NOT NULL,
  `category` varchar(100) NOT NULL,
  `author_name` varchar(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `idea` varchar(255) NOT NULL,
  `doc` longblob NOT NULL,
  `posted_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` (`i_id`, `category`, `author_name`, `title`, `idea`, `doc`, `posted_time`, `author_id`) VALUES
(19, 'IT Labs', 'Selvi', 'App not working', 'Android Studio app is not working in Bill Gate labs. ', '', '2018-04-11 05:29:00', 909034),
(20, 'Accommodation', '', 'Canteen Food ', 'Food is canteen is not tasty but too expensive.', '', '2018-04-11 05:29:00', 909034),
(21, 'Accommodation', 'may', 'Hostel', 'The accommodation provided need to be near the college campus.  \r\n', '', '2018-04-11 05:38:42', 909021),
(22, 'IT Labs', 'dim', 'Install useful apps in pc', 'The management needs to install useful and important apps in the college pc. \r\n', '', '2018-04-11 05:38:42', 909012),
(23, 'Others', '', 'Partner With Researchers', 'Around the country, university faculty are working to develop innovative classroom lessons, test new educational technologies, and uncover effective i', '', '2018-04-11 05:38:42', 909013),
(24, 'Technology', 'lim', 'Encourage Teachers to Use Social-Networking Sites', '\r\nIn schools, a lot of the discussion about social networking focuses on how students are using (or misusing) popular sites like Facebook or MySpace.', '', '2018-04-11 05:38:42', 909011),
(25, 'Facilities', '', 'Use Free Digital Tools.', 'Want to get teachers excited about using media and technology in the classroom? Show them whatâ€™s availableâ€”free and online. Take Wordle, for insta', 0x322d4c697465726174757265205265766965772053616d706c65732e706466, '2018-04-11 05:38:42', 909011),
(26, 'Others', '', 'Make Collaboration a Priority.', 'In theory, most schools want teachers to collaborate with one another to develop lessons, address individual studentsâ€™ learning needs, and share ideas and resources. In reality, most teachers have little time within the school day to do so. In elementar', '', '2018-04-11 05:38:43', 909098),
(31, 'Education', '', 'go digital', 'Once upon a time there were no alternatives to notebooks, textbooks and folders full of handouts from professors. While there are still plenty of these items floating around university campuses, thereâ€™s definitely a switch towards doing things more digi', '', '2018-04-10 23:41:35', 909123);

-- --------------------------------------------------------

--
-- Table structure for table `liked`
--

DROP TABLE IF EXISTS `liked`;
CREATE TABLE IF NOT EXISTS `liked` (
  `user_id` varchar(40) NOT NULL,
  `i_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked`
--

INSERT INTO `liked` (`user_id`, `i_id`) VALUES
('000909011', '19'),
('000909011', '20'),
('000909011', '22'),
('000909012', '19'),
('000909012', '20'),
('000909012', '21'),
('000909012', '25'),
('000909013', '19'),
('000909013', '20'),
('000909013', '21'),
('000909013', '23'),
('000909013', '25'),
('000909021', '11'),
('000909021', '12'),
('000909021', '13'),
('000909021', '14'),
('000909021', '15'),
('000909021', '16'),
('000909021', '17'),
('000909021', '19'),
('000909021', '21'),
('000909021', '9'),
('000909034', '12'),
('000909034', '16'),
('000909034', '17'),
('000909034', '18'),
('000909034', '20'),
('000909123', '20'),
('000909123', '21'),
('000909123', '22'),
('000909123', '24');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
CREATE TABLE IF NOT EXISTS `staff` (
  `staff_id` int(5) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `staff_pwd` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `depart_id` int(5) NOT NULL,
  `staff_mail` varchar(100) NOT NULL,
  `level` int(5) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `u_name`, `staff_pwd`, `role`, `depart_id`, `staff_mail`, `level`, `status`) VALUES
(2001, 'admin1', 'admin1', 'admin', 1001, 'adminlee@gmail.com', 1, 1),
(2002, 'qa', 'qa123', 'qa manager', 1002, 'qa123@gmail.com', 2, 1),
(2003, 'ca', 'ca123', 'corrdinator', 1002, 'qamanager@gmail.com', 3, 1),
(2004, 'linda', 'linda', 'lecturer', 1004, 'lindauk@gmail.com', 0, 1),
(2005, 'may', 'may', 'Lecturer', 1005, 'mayuk@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `s_id` int(10) NOT NULL,
  `s_name` varchar(200) NOT NULL,
  `s_age` int(3) NOT NULL,
  `depart_id` int(5) NOT NULL,
  `s_mail` varchar(255) NOT NULL,
  `s_pwd` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_name`, `s_age`, `depart_id`, `s_mail`, `s_pwd`) VALUES
(909011, 'bryan', 30, 1005, 'bryan123@gmail.com', '$2y$10$/nEFRgNfbWfh2.rnoeeZJOe4c3DxQCzL4QHatEaHlRUzl5YN/Yqdm'),
(909012, 'Teh', 28, 1003, 'tehsim@gmail.com', '$2y$10$V/6SSM5QnpHQPIfPrtHTEebuCtaLQXYaC4Ik1IxqctbFsxlIqMfr2'),
(909013, 'Firash', 23, 1003, 'rashsim@gmail.com', '$2y$10$UiAiZQcMu9WeLlLaUa0xu.rzsHePeQsHGBquPmFWc0iki9ivE2vFS'),
(909021, 'lim', 23, 1002, 'lim123@gmail.com', '$2y$10$yIVg7P.8Npty5bLrYodNRu6zCONxiUWxsVMZNlBV.MhHRBngQ7iOS'),
(909034, 'selvi', 22, 1001, 'selvisree@gmail.com', '$2y$10$z/WS0sXY3bVu7rltajqz6e6dRLUTI25YunRzuod50K36jwyjBt14q'),
(909097, 'Reshmi', 24, 1001, 'ree@gmail.com', '$2y$10$roLJS4EBzaOQ3nk81MqHJOUJoHjKTdyxFrXiuI9I8g5eGHkW/cizS'),
(909098, 'Rash', 24, 1001, 'rash@gmail.com', '$2y$10$5oWMeA9zMLvO76Z21TVBDewWw5nykYqJHAbgfjZHfJQChd4F/ysNe'),
(909123, 'Grace', 22, 1004, 'grace@gmail.com', '$2y$10$wbMYr/5P1Hz0Y1MrVP9XEu7MhopP.eFVSVTcz.zoDB9VkUY1YiHKa');

-- --------------------------------------------------------

--
-- Table structure for table `unliked`
--

DROP TABLE IF EXISTS `unliked`;
CREATE TABLE IF NOT EXISTS `unliked` (
  `user_id` varchar(50) NOT NULL,
  `i_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unliked`
--

INSERT INTO `unliked` (`user_id`, `i_id`) VALUES
('000909012', '20'),
('000909012', '25'),
('000909013', '19'),
('000909013', '20'),
('000909013', '21'),
('000909013', '22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`depart_id`);

--
-- Indexes for table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `liked`
--
ALTER TABLE `liked`
  ADD UNIQUE KEY `idea_id` (`user_id`,`i_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `unliked`
--
ALTER TABLE `unliked`
  ADD UNIQUE KEY `user_id` (`user_id`,`i_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `idea`
--
ALTER TABLE `idea`
  MODIFY `i_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
