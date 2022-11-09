-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 09, 2022 at 09:24 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_center_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `app_time` time NOT NULL,
  `queue_number` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`app_id`, `user_id`, `patient_id`, `description`, `app_time`, `queue_number`, `status`, `date_added`) VALUES
(14, 1, 11, 'xczxc. wqeqwe13123123123', '16:29:00', 1, 0, '2022-11-08 07:29:25'),
(15, 1, 8, 'wqeqweasd', '03:29:00', 2, 0, '2022-11-08 07:29:34'),
(16, 1, 10, 'qwewqe', '15:39:00', 3, 0, '2022-11-08 07:39:44'),
(17, 1, 9, 'qweqwe', '08:29:00', 1, 1, '2022-11-09 00:29:54'),
(18, 1, 10, 'qweqwe', '08:30:00', 2, 0, '2022-11-09 00:30:10'),
(19, 1, 8, 'asdasdqwe', '11:37:00', 3, 0, '2022-11-09 03:37:17'),
(20, 1, 6, 'qweqwe', '15:17:00', 4, 0, '2022-11-09 07:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `check_ups`
--

CREATE TABLE `check_ups` (
  `cu_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_ups`
--

INSERT INTO `check_ups` (`cu_id`, `app_id`, `user_id`, `remarks`, `prescription`, `status`, `date_added`) VALUES
(1, 16, 1, 'TEST REMARKS', 'TEST PRESCIPTION', 0, '2022-11-09 00:00:00'),
(3, 17, 1, 'GANI GWAPO KATAMA 123123123123', 'RAPA GWAPO 12312', 1, '2022-11-09 03:30:18'),
(4, 18, 1, 'WEWQESD SDSQWE7 asd 123123', 'WEWESD WEWE sad sad123', 0, '2022-11-09 03:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `check_up_supplies`
--

CREATE TABLE `check_up_supplies` (
  `cus_id` int(11) NOT NULL,
  `cu_id` int(11) NOT NULL,
  `supply_id` int(11) NOT NULL,
  `quantity` decimal(12,5) NOT NULL,
  `price` decimal(12,5) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_up_supplies`
--

INSERT INTO `check_up_supplies` (`cus_id`, `cu_id`, `supply_id`, `quantity`, `price`, `date_added`) VALUES
(3, 4, 2, '2.00000', '11.05000', '2022-11-09 06:54:58'),
(4, 4, 1, '5.00000', '2.60000', '2022-11-09 07:12:14'),
(5, 4, 1, '1.00000', '2.60000', '2022-11-09 07:13:27'),
(6, 4, 3, '2.00000', '10.50000', '2022-11-09 07:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `encoded_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `middle_name`, `last_name`, `gender`, `contact_number`, `birthday`, `address`, `username`, `password`, `encoded_by`, `date_added`) VALUES
(1, 'ewe', 'wew', 'wew', 'F', '031232156897', '2022-11-02', 'qweeqweqweqweqwe', 'EWE', '', 1, '2022-11-30 00:00:00'),
(6, '31', '32', '31', 'F', '3', '2022-11-06', 'ASD QWE QWE QWE QWEQWEASD QWEQW', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 10, '2022-11-04 06:30:44'),
(8, 'a', 'a', 'a', 'M', 'a', '2022-11-07', 'qweqweqwe', 'a', '0cc175b9c0f1b6a831c399e269772661', 1, '2022-11-07 05:43:23'),
(9, 'Rodrigo', 'Patayinketa', 'Duterte', 'F', '1234567890', '2022-11-07', 'PUROK TUMPOK SEBUKAW DEKARABAW BAKOLOD SETYYY', '1', 'c4ca4238a0b923820dcc509a6f75849b', 1, '2022-11-07 05:55:21'),
(10, '2', '2', '2', 'M', '2', '2022-11-08', '22222', '2', 'c81e728d9d4c2f636f067f89cc14862c', 1, '2022-11-08 01:01:27'),
(11, 'qwe', 'wqe', 'qwe', 'F', 'qwe', '2022-11-08', 'qwe', 'qwe', '76d80224611fc919a5d54f0ff9fba446', 12, '2022-11-08 02:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `title`, `content`, `date_added`) VALUES
(2, 1, 'post 3', 'IMPROVE PRODUCTIVITY & JOB SATISFACTION\r\nWhat you can accomplish during a work day depends on a variety of factors: your relationship with your teammates, your ability to focus, your love (or lack thereof) for your job, and your concern about how your efforts and decisions will impact the company (or the likelihood of retaining your position). These studies indicated that mindfulness leads to better decision-making; meanwhile, this research outlines how mindful leadership can inspire happier, more productive employees:', '2022-11-07 07:11:31'),
(3, 1, 'Post 2', 'You might be thinking, â€œNot that simple. Iâ€™ve tried meditation, and I canâ€™t do it.â€ Good news: meditation and mindfulness arenâ€™t exactly the same thing.\r\n\r\nThis paper from the American Psychological Association says â€œâ€¦mindfulness is defined as a moment-to-moment awareness of oneâ€™s experience without judgment.â€\r\n\r\nLetâ€™s take a look at how that judgment-free awareness can impact all areas of your lifeâ€”and at the many simple ways to practice it.', '2022-11-07 07:25:05'),
(4, 1, 'Post 1', 'As humans, we love simple solutions. We want to lose weight, be happier, have better relationships, make more money, and we want to find the fastest, easiest way to do all of these things.\r\n\r\nMindfulness may be that simple solution.\r\n\r\nWith that one habit, everything in your life could change for the better.', '2022-11-07 07:37:16'),
(6, 1, '123', 'weq123', '2022-11-08 02:41:09'),
(7, 1, 'we', 'we', '2022-11-08 02:42:47'),
(8, 12, 'PQWE POQWEPO QPOQWE POQWE', 'QWEPOQWEPO QWEOPQWEO HOAASD JJQWEPOQIW QWEPOIQWEPIASDU QWEQPWEOIQ WIASDPASOIEQWEQWEASDASDQWEQWEQWE', '2022-11-08 02:44:29');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `supply_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `supply_category` varchar(1) NOT NULL,
  `price` decimal(12,5) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supply_id`, `name`, `description`, `remarks`, `supply_category`, `price`, `date_added`) VALUES
(1, 'LATIGO FX', 'QWEQWE', '123123123', 'M', '2.60000', '2022-11-07 06:28:44'),
(2, 'qwe', 'qwe', 'qwe', 'V', '11.05000', '2022-11-08 02:46:09'),
(3, 'qweqwe', 'qweqwe', 'qweqwe', 'M', '10.50000', '2022-11-09 05:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `contact_number` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `category_id`, `first_name`, `middle_name`, `last_name`, `contact_number`, `address`, `username`, `password`, `date_added`) VALUES
(1, 1, 'Juan', 'Dela', 'Cruz', '12345678910', 'aaaassdewe123123', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-11-04 00:00:00'),
(10, 2, 'Junjun', 'Delos', 'Reyes', '', '', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', '2022-11-04 05:39:35'),
(11, 1, '2', '2', '2', '', '', '2', 'c81e728d9d4c2f636f067f89cc14862c', '2022-11-07 05:25:02'),
(12, 2, '1', '1', '1', 'qweqweqwe', '123123123', '1', 'c4ca4238a0b923820dcc509a6f75849b', '2022-11-08 02:16:32'),
(13, 1, '1', '1', '1', '', '', 'wqeqwe', 'c4ca4238a0b923820dcc509a6f75849b', '2022-11-08 02:28:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `check_ups`
--
ALTER TABLE `check_ups`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `check_up_supplies`
--
ALTER TABLE `check_up_supplies`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`supply_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `check_ups`
--
ALTER TABLE `check_ups`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `check_up_supplies`
--
ALTER TABLE `check_up_supplies`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
