-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2016 at 10:48 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccer_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1=supper,2=admin,3=operator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `user_name`, `password`, `type`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule_result`
--

CREATE TABLE `schedule_result` (
  `id` int(11) NOT NULL,
  `standing_id` smallint(6) NOT NULL,
  `home_team_id` smallint(6) NOT NULL,
  `visiting_team_id` smallint(6) NOT NULL,
  `stadium_id` smallint(6) NOT NULL,
  `match_date` date NOT NULL,
  `match_time` time NOT NULL,
  `home_team_goal` tinyint(2) NOT NULL,
  `visiting_team_goal` tinyint(2) NOT NULL,
  `match_status` tinyint(1) NOT NULL COMMENT '1=completed,0=upcoming'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedule_result`
--

INSERT INTO `schedule_result` (`id`, `standing_id`, `home_team_id`, `visiting_team_id`, `stadium_id`, `match_date`, `match_time`, `home_team_goal`, `visiting_team_goal`, `match_status`) VALUES
(3, 1, 12, 14, 2, '2016-05-21', '17:30:00', 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `id` smallint(6) NOT NULL,
  `stadium_name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1=active,0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`id`, `stadium_name`, `status`) VALUES
(1, 'Dhaka', 1),
(2, 'Khulna', 1),
(4, 'Cox Bazar Stadium', 1),
(5, 'Loriche Blae', 1),
(6, 'Dellhi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `standings`
--

CREATE TABLE `standings` (
  `id` smallint(6) NOT NULL,
  `category_id` tinyint(3) NOT NULL,
  `standing_name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `standings`
--

INSERT INTO `standings` (`id`, `category_id`, `standing_name`, `status`, `created`) VALUES
(1, 1, 'Veteranos', 1, '2016-05-06 11:49:25'),
(2, 1, 'Mayor', 1, '2016-05-06 11:54:27'),
(3, 2, 'Under 14', 1, '2016-05-06 11:54:57'),
(4, 1, 'Primera', 1, '2016-05-06 14:14:47'),
(5, 1, 'Segunda', 1, '2016-05-06 14:14:58'),
(6, 1, 'Femenil', 1, '2016-05-06 14:15:12'),
(7, 1, 'Tercera', 1, '2016-05-06 15:04:06'),
(8, 1, 'Clasicas', 1, '2016-05-06 15:04:20'),
(9, 2, 'Under 12', 1, '2016-05-06 15:04:40'),
(10, 2, 'Under 10', 1, '2016-05-06 15:05:03'),
(11, 2, 'Under 8', 1, '2016-05-06 15:05:36'),
(12, 2, 'Under 6', 1, '2016-05-06 15:05:46');

-- --------------------------------------------------------

--
-- Table structure for table `standing_categories`
--

CREATE TABLE `standing_categories` (
  `id` tinyint(3) NOT NULL,
  `category_name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `standing_categories`
--

INSERT INTO `standing_categories` (`id`, `category_name`, `status`) VALUES
(1, 'Standings Adultos', 1),
(2, 'Standings Infantils', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` smallint(6) NOT NULL,
  `standing_id` smallint(6) NOT NULL,
  `team_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `won` smallint(6) NOT NULL,
  `lost` smallint(6) NOT NULL,
  `tied` smallint(6) NOT NULL,
  `gf` smallint(6) NOT NULL COMMENT 'goal for (given goal)',
  `ga` smallint(6) NOT NULL COMMENT 'Goals Against (Against team goal given)',
  `diff` smallint(6) NOT NULL,
  `points` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `standing_id`, `team_name`, `won`, `lost`, `tied`, `gf`, `ga`, `diff`, `points`, `status`) VALUES
(5, 1, 'C. Americanos', 0, 0, 0, 0, 0, 0, 0, 1),
(6, 1, 'Crankyes', 0, 0, 0, 0, 0, 0, 0, 1),
(7, 8, 'Queretaro', 0, 0, 0, 0, 0, 0, 0, 1),
(8, 8, 'Mexico', 0, 0, 0, 0, 0, 0, 0, 1),
(10, 1, 'Soledad', 0, 0, 0, 0, 0, 0, 0, 1),
(11, 1, 'Rivera’s Tile', 0, 0, 0, 0, 0, 0, 0, 1),
(12, 1, 'Penuelas', 0, 0, 0, 0, 0, 0, 0, 1),
(13, 1, 'Inter', 0, 0, 0, 0, 0, 0, 0, 1),
(14, 1, 'Quetzal FC', 0, 0, 0, 0, 0, 0, 0, 1),
(15, 1, 'Durango', 0, 0, 0, 0, 0, 0, 0, 1),
(16, 1, 'Leones Negros', 0, 0, 0, 0, 0, 0, 0, 1),
(17, 1, 'La Piedad', 0, 0, 0, 0, 0, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `schedule_result`
--
ALTER TABLE `schedule_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standings`
--
ALTER TABLE `standings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `standing_categories`
--
ALTER TABLE `standing_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schedule_result`
--
ALTER TABLE `schedule_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `standings`
--
ALTER TABLE `standings`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `standing_categories`
--
ALTER TABLE `standing_categories`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
