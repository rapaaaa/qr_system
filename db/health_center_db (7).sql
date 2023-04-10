-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2023 at 08:47 AM
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
  `service_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `app_time` datetime NOT NULL,
  `queue_number` int(3) NOT NULL,
  `status` int(1) NOT NULL,
  `notif_status` int(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`app_id`, `user_id`, `patient_id`, `service_id`, `description`, `app_time`, `queue_number`, `status`, `notif_status`, `date_added`) VALUES
(52, 1, 8, 1, 'qwqw', '2022-11-23 16:12:00', 1, 0, 1, '2022-11-22 16:04:51'),
(54, 1, 1, 1, 'qweqweqwe', '2022-11-22 16:08:00', 1, 1, 1, '2022-11-22 16:08:51'),
(58, 1, 8, 1, 'qwqwqw', '2022-11-23 09:20:00', 2, 0, 1, '2022-11-23 09:20:06'),
(59, 1, 9, 4, 'qweqwe', '2022-11-24 09:24:00', 1, 0, 1, '2022-11-23 09:24:19'),
(60, 1, 1, 4, 'qweqwe', '2022-11-24 01:28:00', 2, 0, 1, '2022-11-23 09:25:10'),
(61, 1, 8, 1, 'qweqwe', '2022-11-24 09:04:00', 3, 0, 1, '2022-11-24 09:03:41'),
(62, 1, 12, 4, 'qweqwe', '2022-11-26 09:15:00', 1, 0, 1, '2022-11-24 09:15:55'),
(63, 1, 8, 1, 'TEST QR', '2022-11-25 10:13:00', 1, 1, 1, '2022-11-25 10:13:24'),
(64, 1, 6, 1, 'qwqw', '2022-11-25 10:25:00', 2, 0, 1, '2022-11-25 10:25:13'),
(65, 1, 1, 4, 'wqeqwe', '2022-11-25 10:25:00', 3, 1, 1, '2022-11-25 10:25:24'),
(66, 1, 12, 1, 'qweqwe', '2022-11-25 11:03:00', 4, 0, 1, '2022-11-25 11:03:46'),
(67, 1, 8, 1, 'qweqwe', '2022-11-30 14:48:00', 1, 0, 1, '2022-11-30 14:48:49'),
(68, 1, 6, 4, 'qweqweqwe', '2022-11-30 14:48:00', 2, 0, 1, '2022-11-30 14:48:59'),
(69, 1, 8, 1, 'test qr', '2022-12-07 13:42:00', 1, 0, 1, '2022-12-07 13:42:49'),
(70, 1, 12, 4, 'test qr', '2022-12-07 13:58:00', 2, 2, 1, '2022-12-07 13:59:02'),
(71, 1, 14, 4, 'qweqwe', '2022-12-07 14:02:00', 3, 1, 1, '2022-12-07 14:02:31'),
(72, 1, 9, 1, '21321654654', '2022-12-07 14:26:00', 4, 0, 1, '2022-12-07 14:26:29'),
(73, 15, 8, 1, 'qwewqeq', '2023-03-27 13:21:00', 1, 0, 0, '2023-03-27 13:21:38'),
(74, 0, 8, 1, 'test', '2023-03-29 13:43:00', 0, 0, 0, '2023-03-29 13:43:30'),
(75, 1, 8, 4, 'qwe', '2023-03-29 13:43:00', 2, 2, 1, '2023-03-29 13:43:42'),
(76, 1, 8, 1, 'qweqweqwe', '2023-04-03 14:12:00', 1, 0, 0, '2023-04-03 14:12:30'),
(78, 1, 11, 4, 'qweqwe', '2023-04-03 14:55:00', 2, 0, 0, '2023-04-03 14:55:55'),
(79, 1, 1, 1, 'eqweqwe', '2023-04-03 16:07:00', 3, 0, 0, '2023-04-03 16:08:03'),
(85, 1, 8, 1, 'QWEQWE', '2023-04-05 00:00:00', 1, 0, 0, '2023-04-05 14:06:12'),
(86, 1, 8, 1, 'QWEQWE', '2023-04-05 00:00:00', 2, 0, 0, '2023-04-05 14:06:23'),
(87, 1, 13, 1, 'QWEQWE', '2023-04-05 00:00:00', 3, 0, 0, '2023-04-05 14:06:33'),
(88, 1, 6, 1, 'qweqwe', '2023-04-05 00:00:00', 4, 0, 0, '2023-04-05 14:10:05'),
(89, 1, 8, 1, 'qweqweqwe', '2023-04-10 00:00:00', 1, 0, 0, '2023-04-10 13:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `check_ups`
--

CREATE TABLE `check_ups` (
  `cu_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_ups`
--

INSERT INTO `check_ups` (`cu_id`, `app_id`, `user_id`, `service_id`, `remarks`, `prescription`, `status`, `date_added`) VALUES
(29, 54, 1, 1, 'QEWQWEW', 'QWEQWE', 1, '2022-11-22 16:38:54'),
(30, 63, 1, 0, '', '', 1, '2022-11-25 10:24:30'),
(31, 65, 1, 1, 'qwe', 'qweqwe', 1, '2022-11-25 11:08:55'),
(32, 67, 1, 1, 'qweqwe', 'qweqwe', 0, '2022-11-30 14:58:45'),
(33, 68, 1, 1, 'qweqwe', 'qweqwe', 0, '2022-11-30 15:41:02'),
(34, 71, 1, 1, 'QWE', 'QWE', 1, '2022-12-07 14:57:07'),
(35, 76, 1, 1, 'qwe', 'qwe', 0, '2023-04-03 14:17:37'),
(36, 89, 1, 1, 'eqwe', 'qweqw', 0, '2023-04-10 13:53:18');

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
(15, 29, 4, '1.00000', '1000.00000', '2022-11-22 16:39:03'),
(16, 35, 4, '10.00000', '1000.00000', '2023-04-03 14:17:45'),
(17, 35, 2, '11.00000', '11.05000', '2023-04-03 14:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedule`
--

CREATE TABLE `doctor_schedule` (
  `ds_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `max_residents` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_schedule`
--

INSERT INTO `doctor_schedule` (`ds_id`, `user_id`, `description`, `max_residents`, `date`, `start_time`, `end_time`, `date_added`) VALUES
(5, 1, 'werrw3434qsertyrty56tyr', 10, '2023-04-04', '15:18:00', '22:18:00', '2023-04-04 15:19:00'),
(6, 1, 'QWEQWEQWE', 3, '2023-04-05', '14:05:00', '18:05:00', '2023-04-05 14:05:56'),
(7, 1, 'qweqwe', 200, '2023-04-10', '13:52:00', '18:52:00', '2023-04-10 13:52:45');

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
(1, 'Marites', 'Marites', 'Marites', 'F', '031232156897', '2022-11-02', 'qweeqweqweqweqwe', 'EWE', '', 1, '2022-11-30 00:00:00'),
(6, 'Jun', 'Jun', 'Jun', 'F', '3', '2022-11-06', 'ASD QWE QWE QWE QWEQWEASD QWEQW', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 10, '2022-11-04 06:30:44'),
(8, 'Gireny', 'Ambot', 'Anotugani', 'M', 'a', '2022-11-07', 'qweqweqwe', 'a', '0cc175b9c0f1b6a831c399e269772661', 1, '2022-11-07 05:43:23'),
(9, 'Rodrigo', 'Patayinketa', 'Duterte', 'F', '1234567890', '2022-11-07', 'PUROK TUMPOK SEBUKAW DEKARABAW BAKOLOD SETYYY', '1', 'c4ca4238a0b923820dcc509a6f75849b', 1, '2022-11-07 05:55:21'),
(10, 'Rino', 'Carton', 'Dimakita', 'M', '2', '2022-11-08', '22222', '2', 'c81e728d9d4c2f636f067f89cc14862c', 1, '2022-11-08 01:01:27'),
(11, 'Kuya', 'Tito', 'Wils', 'F', 'qwe', '2022-11-08', 'qwe', 'qwe', '76d80224611fc919a5d54f0ff9fba446', 12, '2022-11-08 02:45:58'),
(12, 'test', 'test', 'test', 'M', 'test', '2022-11-15', 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', 1, '2022-11-15 14:35:25'),
(13, 'qweqw', 'eqwe', 'qwe', 'M', 'qweqwe', '2022-12-07', 'qweqwe', 'qweqwe', 'd41d8cd98f00b204e9800998ecf8427e', 1, '2022-12-07 14:01:53'),
(14, 'RINO', 'Q', 'CARTON', 'M', '123123123123', '2022-12-07', 'QWEQW QWEQWE QWEQWE', 'rino', '0cc175b9c0f1b6a831c399e269772661', 1, '2022-12-07 14:02:18'),
(15, 'b', 'b', 'b', 'M', '123123', '0000-00-00', 'b', 'b', '92eb5ffee6ae2fec3ad71c777531578f', 1, '2023-04-10 14:05:34');

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
(8, 12, 'PQWE POQWEPO QPOQWE POQWE', 'QWEPOQWEPO QWEOPQWEO HOAASD JJQWEPOQIW QWEPOIQWEPIASDU QWEQPWEOIQ WIASDPASOIEQWEQWEASDASDQWEQWEQWE', '2022-11-08 02:44:29'),
(9, 1, 'test', 'test', '2022-11-15 06:25:21'),
(10, 1, 'q', 'q', '2022-11-15 14:28:39'),
(11, 1, 'qwe', 'qwe', '2022-11-15 14:46:24');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE `referrals` (
  `r_id` int(11) NOT NULL,
  `cu_id` int(11) NOT NULL,
  `referred_to` varchar(70) NOT NULL,
  `referral_remarks` text NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`r_id`, `cu_id`, `referred_to`, `referral_remarks`, `date_added`) VALUES
(3, 32, '1212qweqwe', 'weweqwq', '2022-11-30 15:40:40'),
(5, 33, 'qwq123123', 'qwqwqw 123123123qweqw', '2022-11-30 15:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service` varchar(50) NOT NULL,
  `service_fee` decimal(12,5) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service`, `service_fee`, `date_added`) VALUES
(1, 'Consultations', '500.10000', '2022-11-11 06:43:04'),
(4, 'KIBIT MEDICATION', '1500.00000', '2022-11-11 06:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE `supplies` (
  `supply_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `supply_category` varchar(1) NOT NULL,
  `price` decimal(12,5) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`supply_id`, `name`, `description`, `quantity`, `remarks`, `supply_category`, `price`, `date_added`) VALUES
(1, 'LATIGO FX', 'QWEQWE', 0, '123123123', 'M', '2.60000', '2022-11-07 06:28:44'),
(2, 'qweqwe', 'qweqwe', 0, 'qweqwe', 'V', '11.05000', '2022-11-08 02:46:09'),
(3, 'qweqwe', 'qweqwe', 0, 'qweqwe', 'M', '10.50000', '2022-11-09 05:24:38'),
(4, '123qwe', 'wqeqw', 10, 'qwe', 'V', '1000.00000', '2022-11-15 02:04:43'),
(5, 'test', 'test', 0, 'test', 'M', '1.00000', '2022-11-15 14:30:43'),
(6, 'sd', 'sd', 0, 'sd', 'M', '0.00000', '2023-04-03 14:02:30'),
(7, 'qwe', 'qwe', 0, 'qwe', 'M', '0.00000', '2023-04-05 14:41:49');

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
(1, 1, 'Juan', 'Dela', 'Cruz', '12345678910', 'Cambodia street Sipalay city', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2022-11-04 00:00:00'),
(10, 2, 'Junjun', 'Delos', 'Reyes', '', '', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', '2022-11-04 05:39:35'),
(11, 1, '2', '2', '2', '', '', '2', 'c81e728d9d4c2f636f067f89cc14862c', '2022-11-07 05:25:02'),
(12, 2, '1', '1', '1', 'qweqweqwe', '123123123', '1', 'c4ca4238a0b923820dcc509a6f75849b', '2022-11-08 02:16:32'),
(13, 1, '1', '1', '1', '', '', 'wqeqwe', 'c4ca4238a0b923820dcc509a6f75849b', '2022-11-08 02:28:58'),
(14, 1, 'test', 'test', 'test', '', '', 'test', 'd41d8cd98f00b204e9800998ecf8427e', '2022-11-15 14:45:17'),
(15, 2, 'Vicky', 'BEKBEK', 'Belo', '', '', 'doctor', 'f9f16d97c90d8c6f2cab37bb6d1f1992', '2022-11-16 08:59:26'),
(16, 3, 'Tiyay', 'Mareng', 'Pautang', '', '', 'hw', '65c2a3d77127c15d068dec7e00e50649', '2022-11-16 08:59:55');

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
-- Indexes for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  ADD PRIMARY KEY (`ds_id`);

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
-- Indexes for table `referrals`
--
ALTER TABLE `referrals`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

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
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `check_ups`
--
ALTER TABLE `check_ups`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `check_up_supplies`
--
ALTER TABLE `check_up_supplies`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `doctor_schedule`
--
ALTER TABLE `doctor_schedule`
  MODIFY `ds_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `referrals`
--
ALTER TABLE `referrals`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `supplies`
--
ALTER TABLE `supplies`
  MODIFY `supply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
