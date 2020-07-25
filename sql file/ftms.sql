-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2020 at 08:47 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ftms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `att_id` int(11) NOT NULL,
  `player_id` int(11) DEFAULT NULL,
  `player_no` int(11) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `footed` varchar(10) DEFAULT NULL,
  `ranking` int(11) DEFAULT NULL,
  `division` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`att_id`, `player_id`, `player_no`, `position`, `footed`, `ranking`, `division`) VALUES
(23, 34, 13, 'right defender', 'right', 89, 'A'),
(24, 35, 13, 'striker', 'right', 35, 'B'),
(26, 37, 13, 'goalkeeper', 'left', 78, 'A'),
(27, 38, 4, 'left defender', 'left', 67, 'B'),
(28, 39, 4, 'center defender', 'left', 77, 'B'),
(29, 40, 7, 'right winger', 'right', 78, 'A'),
(30, 41, 9, 'left winger', 'right', 86, 'A'),
(31, 42, 8, 'center midfielder', 'right', 73, 'A'),
(32, 43, 12, 'left midfielder', 'left', 10, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `player_detail`
--

CREATE TABLE `player_detail` (
  `id` int(100) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `DOB` varchar(120) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone_no` bigint(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player_detail`
--

INSERT INTO `player_detail` (`id`, `name`, `address`, `DOB`, `email`, `phone_no`, `image`) VALUES
(34, 'vivek hamal', 'jadibuti-35,kathmandu', '', 'eiennotamashi@yahoo.com', 9841664661, ''),
(35, 'adarsha bhattrai', 'jaributi', '', 'adarsha@gmail.com', 9878797979, ''),
(37, 'pranil rai', 'lagankhel', '', 'rai@yahoo.com', 9876565644, ''),
(38, 'abooshan bhattrai', 'nagarkot', '', 'abooshan@yahoo.com', 9877665542, ''),
(39, 'saroj adhikari', 'dolkha', '', 'adhikari@yahoo.com', 9843551285, ''),
(40, 'kiran kunwar', 'maharajgunj', '', 'kun@gmail.com', 9866541733, ''),
(41, 'bisesh limbu', 'kusunti', '', 'iwa@gmail.com', 984264332, ''),
(42, 'joseph shrestha', 'baneshwar', '', 'shrestha@binas.com', 9845456776, ''),
(43, 'suman shrestha', 'kathmandu,dallu', '1996-03-26', 'shrestha.suman9803@gmail.com', 864564756, 'test.png');

-- --------------------------------------------------------

--
-- Table structure for table `player_game_info`
--

CREATE TABLE `player_game_info` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `former_club` varchar(120) NOT NULL,
  `join_date` varchar(120) NOT NULL,
  `contract_date` varchar(120) NOT NULL,
  `total_game_played` int(11) NOT NULL,
  `total_goal_score` int(11) NOT NULL,
  `yellow_card` int(11) NOT NULL,
  `red_card` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `player_game_info`
--

INSERT INTO `player_game_info` (`id`, `player_id`, `former_club`, `join_date`, `contract_date`, `total_game_played`, `total_goal_score`, `yellow_card`, `red_card`, `rating`) VALUES
(1, 43, 'machindranath club', '2056-05-04', '2057-05-14', 56, 68, 7, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `sal_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `basic_sal` float DEFAULT NULL,
  `bonus` float DEFAULT NULL,
  `allowance` float DEFAULT NULL,
  `tax_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sal_id`, `player_id`, `basic_sal`, `bonus`, `allowance`, `tax_rate`) VALUES
(20, 34, 45000, 4000, 5000, 5),
(21, 35, 50000, 4000, 3000, 7),
(23, 37, 43000, 3900, 4000, 5),
(24, 38, 39000, 3500, 3000, 5),
(25, 39, 47500, 5000, 4000, 6),
(26, 40, 60000, 5000, 5000, 10),
(27, 41, 60000, 5500, 4500, 10),
(28, 42, 52500, 3500, 3000, 5),
(29, 43, 40000, 10000, 10000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `admin_id`) VALUES
('anil', 'anil@gmail.com', 'anil', 1),
('jayanta', 'jayanta@jay.com', 'jayanta', 4),
('sunil', 'sunil@gmail.com', 'sunil', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `player_detail`
--
ALTER TABLE `player_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_game_info`
--
ALTER TABLE `player_game_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`sal_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `player_detail`
--
ALTER TABLE `player_detail`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `player_game_info`
--
ALTER TABLE `player_game_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `sal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute`
--
ALTER TABLE `attribute`
  ADD CONSTRAINT `attribute_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `player_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `player_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
