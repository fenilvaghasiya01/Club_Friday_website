-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 01:22 PM
-- Server version: 10.4.11-MariaDB-log
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meeting_server`
--

-- --------------------------------------------------------

--
-- Table structure for table `descr`
--

CREATE TABLE `descr` (
  `id` int(11) NOT NULL,
  `notice` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `descr`
--

INSERT INTO `descr` (`id`, `notice`) VALUES
(1, 'Dear Member,\r\n\r\nWelcome to the Friday Club website,\r\n\r\nThis website is in its beta stage and we hope that you find it easy to use.\r\n\r\nWe appreciate any constructive feedback in its operation.\r\n\r\nBest regards\r\nFriday Club Committee\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `gallary`
--

CREATE TABLE `gallary` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `date1` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallary`
--

INSERT INTO `gallary` (`id`, `name`, `date1`) VALUES
(2, '1.jpg', '2020-04-01'),
(7, '5.jpg', '2020-04-01'),
(9, '7.jpg', '2020-04-23'),
(11, '8.jpg', '2020-04-23'),
(12, 'photo1.jpg', '2020-04-03'),
(13, '3.jpg', '2020-04-25'),
(14, 'ss.png', '2020-04-25'),
(15, '4.jpg', '2020-04-25'),
(16, '9.jpg', '2020-04-25'),
(17, '10.jpg', '2020-04-25'),
(19, 'Screenshot (6).png', '2020-04-21'),
(20, 'IMG_20190521_132257.jpg', '2020-04-25'),
(21, 'IMG_20190518_121234.jpg', '2020-04-21'),
(22, 'IMG_20190518_132907.jpg', '2020-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `meeting_code` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(12) NOT NULL,
  `food_choice` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `meeting_code`, `email`, `first_name`, `last_name`, `food_choice`) VALUES
(4, '456', '18it139@charusat.edu.in', 'krushi', 'vasani', 'Non Veg'),
(5, '123', '18it084@charusat.edu.in', 'Harshil', 'Patel', 'Fish'),
(6, '123', 'neelp004@gmail.com', 'prachi', 'patel', 'Fish'),
(7, '123', 'neelp004@gmail.com', 'jagruti', 'patel', 'Non Veg');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `meeting_type` varchar(15) NOT NULL,
  `meeting_code` varchar(15) NOT NULL,
  `dress_code` varchar(15) NOT NULL,
  `meeting_desc` varchar(15) NOT NULL,
  `speaker` varchar(15) NOT NULL,
  `meeting_venue` varchar(15) NOT NULL,
  `speaker_details` varchar(15) NOT NULL,
  `meeting_date` datetime NOT NULL,
  `responce_date` date NOT NULL,
  `food_veg` varchar(15) NOT NULL,
  `food_nonveg` varchar(15) NOT NULL,
  `food_fish` varchar(15) NOT NULL,
  `upload_files` blob NOT NULL,
  `other_info` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `meeting_type`, `meeting_code`, `dress_code`, `meeting_desc`, `speaker`, `meeting_venue`, `speaker_details`, `meeting_date`, `responce_date`, `food_veg`, `food_nonveg`, `food_fish`, `upload_files`, `other_info`) VALUES
(2, 'Regular', '123', 'Formal', 'Black Day', 'Neel', 'Ahmedabad', 'IT Student', '2020-04-21 16:00:00', '2020-04-20', 'Paneer Tikka', 'Chicken tikka', 'fish fry', '', 'Bring your own '),
(3, 'Festive', '456', 'Diwali cloths', 'Diwali', 'Dhruvil & Karan', 'ahmedabad', 'IT Students', '2020-04-25 16:00:00', '2020-04-24', 'Malai Khofta', 'Chicken Biryani', 'Fish returns', 0x70686f746f312e6a7067, 'Bring your own '),
(4, 'NEW', '789', 'TRADITIONAL', 'Garba Party', 'Ambe ma', 'Ambaji', 'Goddess ', '2020-05-15 16:00:00', '2020-04-30', 'Khichdi', 'NOT Available', 'NOT Available', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mob_no` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `pass_word` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `first_name`, `last_name`, `email`, `mob_no`, `dob`, `pass_word`) VALUES
(1, 'Friday', 'Club', 'clubfriday.uk@gmail.com', '7573800529', '2001-05-09', 'admin'),
(3, 'dhruvil', 'patel', '18it084@charusat.edu.in', '7990418475', '2000-12-26', '2000-12-26'),
(4, 'neel', 'patel', '18it092@charusat.edu.in', '7573800529', '2001-05-09', 'neel'),
(6, 'karan', 'patel', 'neelp004@gmail.com', '7573800529', '2001-09-05', '2001-09-05'),
(7, 'Jignesh', 'Patel', 'prachijpatel@gmail.com', '9825303599', '1967-08-11', '123456'),
(8, 'harshil', 'patel', '18it086@charusat.edu.in', '7894561233', '2000-12-14', '2000-12-14'),
(9, 'krushi', 'vasani', '18it143@charusat.edu.in', '4548798745', '2000-12-12', '2000-12-12'),
(10, 'fenil', 'vaghasiya', '18it139@charusat.edu.in', '7573800529', '2000-01-01', '2000-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `membership_details`
--

CREATE TABLE `membership_details` (
  `id` int(2) NOT NULL,
  `fee` int(10) NOT NULL,
  `late_fee_charge` int(10) NOT NULL,
  `guest_charge` int(10) NOT NULL,
  `last_date` date NOT NULL,
  `payment_due` date NOT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership_details`
--

INSERT INTO `membership_details` (`id`, `fee`, `late_fee_charge`, `guest_charge`, `last_date`, `payment_due`, `year`) VALUES
(1, 1000, 100, 40, '2020-04-30', '2020-04-30', 2020);

-- --------------------------------------------------------

--
-- Table structure for table `member_meeting`
--

CREATE TABLE `member_meeting` (
  `id` int(11) NOT NULL,
  `meeting_code` varchar(10) NOT NULL,
  `presence` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `food_choice` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_meeting`
--

INSERT INTO `member_meeting` (`id`, `meeting_code`, `presence`, `email`, `food_choice`) VALUES
(9, '123', 'true', '18it084@charusat.edu.in', 'Veg'),
(11, '123', 'false', '18it139@charusat.edu.in', ''),
(12, '456', 'true', '18it139@charusat.edu.in', 'Veg'),
(17, '123', 'Present', 'neelp004@gmail.com', 'Non Veg'),
(18, '456', 'Absent', 'neelp004@gmail.com', ''),
(31, '789', 'Present', '18it092@charusat.edu.in', 'Fish');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(2) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `address`, `contact`) VALUES
(1, 'krushi', 'Ahmedabad', '789545678'),
(2, 'dhruvil', 'Ahmedabad', '7894561239'),
(3, 'fenil', 'surat', '7896543217'),
(4, 'karan', 'anand', '7589741256');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `descr`
--
ALTER TABLE `descr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallary`
--
ALTER TABLE `gallary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_details`
--
ALTER TABLE `membership_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_meeting`
--
ALTER TABLE `member_meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `descr`
--
ALTER TABLE `descr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gallary`
--
ALTER TABLE `gallary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `membership_details`
--
ALTER TABLE `membership_details`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_meeting`
--
ALTER TABLE `member_meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
