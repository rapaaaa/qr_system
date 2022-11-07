-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2022 at 09:42 AM
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
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `encoded_by` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `middle_name`, `last_name`, `gender`, `contact_number`, `birthday`, `username`, `password`, `encoded_by`, `date_added`) VALUES
(1, 'ewe', 'wew', 'wew', 'F', '031232156897', '2022-11-02', 'EWE', '', 1, '2022-11-30 00:00:00'),
(6, '31', '32', '31', 'F', '3', '2022-11-06', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 10, '2022-11-04 06:30:44'),
(8, 'a', 'a', 'a', 'M', 'a', '2022-11-07', 'a', '0cc175b9c0f1b6a831c399e269772661', 1, '2022-11-07 05:43:23'),
(9, '1', '1', '1', 'F', '1', '2022-11-07', '1', 'c4ca4238a0b923820dcc509a6f75849b', 1, '2022-11-07 05:55:21');

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
(4, 1, 'Post 1', 'As humans, we love simple solutions. We want to lose weight, be happier, have better relationships, make more money, and we want to find the fastest, easiest way to do all of these things.\r\n\r\nMindfulness may be that simple solution.\r\n\r\nWith that one habit, everything in your life could change for the better.', '2022-11-07 07:37:16');

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
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supply_id`, `name`, `description`, `remarks`, `supply_category`, `date_added`) VALUES
(1, 'LATIGO FX', 'QWEQWE', '123123123', 'M', '2022-11-07 06:28:44');

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
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `category_id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `date_added`) VALUES
(1, 1, 'Juan', 'Dela', 'Cruz', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-11-04 00:00:00'),
(10, 2, 'Junjun', 'Delos', 'Reyes', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', '2022-11-04 05:39:35'),
(11, 1, '2', '2', '2', '2', 'c81e728d9d4c2f636f067f89cc14862c', '2022-11-07 05:25:02');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
