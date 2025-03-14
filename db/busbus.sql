-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2025 at 07:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busbus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `passenger_name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `boarding_place` varchar(255) NOT NULL,
  `Your_destination` varchar(255) NOT NULL,
  `alternate_telephone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `passenger_name`, `telephone`, `email`, `boarding_place`, `Your_destination`, `alternate_telephone`) VALUES
(20, '222', '3333333333', '2@gmail.com', '', '', '3333333333'),
(21, 'laksh', '3333333334', 'adsfa@gmail.com', '', '', '3334443334'),
(22, 'laksh', 'dddddddddd', 'adsfa@gmail.com', '', '', '3334443334'),
(23, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3334443334'),
(24, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(25, 'd', '2222222222', 'dfgdfgdf@gmail.com', '', '', '2222222222'),
(26, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(27, ' laksh', '3333322222', 'laksh@gmail.com', '', '', '3333333333'),
(28, 'lukhi', '1111111111', '2@gmail.com', '', '', '2221111123'),
(29, 'bhavdip', '5464748736', 'd@gmail.com', '', '', '4444555543'),
(30, 'rytvesh', '4551459785', 'rutvesh123@gmail.com', '', '', '1234567897'),
(31, 'jinal', '2323444555', 'jinal123@gmail.com', '', '', '4444555543'),
(32, 'bhavdip', '4551459785', 'bhavdip123@gmail.com', '', '', '1234567897'),
(33, 'sas', '4569855569', 'ased@gmail.com', '', '', '5258965874'),
(34, 'ram lakhan', '1111111111', 'ramlakhan@gmail.com', '', '', '1111111111'),
(35, 'adsfds', '1125566632', 'dadf@gmail.com', '', '', '8978625486'),
(36, 'adsfds', '1125566632', 'adsfadsf@gmail.colm', '', '', '8978625486'),
(37, 'adsfds', '1125566632', 'adsfadsf@gmail.colm', '', '', '8978625486'),
(38, 'adsfds', '1125566632', 'adsfadsf@gmail.colm', '', '', '8978625486'),
(39, 'adsfds', '1125566632', 'adsfadsf@gmail.colm', '', '', '8978625486'),
(40, 'darshana', '1125566632', 'adsfadsf@gmail.colm', '', '', '8978625486'),
(41, 'darshana', '1125566632', 'adsfadsf@gmail.colm', '', '', '8978625486'),
(42, 'laksh', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(43, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(44, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(45, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(46, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(47, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(48, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(49, 'bhavdip', '1125566632', 'bhavdip@gmail.com', '', '', '8978625486'),
(50, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(51, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(52, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(53, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(54, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(55, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(56, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(57, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(58, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(59, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(60, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(61, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(62, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(63, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(64, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(65, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(66, 'sdgf', '3333333333', 'adsfa@gmail.com', '', '', '3333333333'),
(67, 'adsfds', '1125566632', 'adsfadsf@gmail.com', '', '', '8978625486'),
(68, 'darshana', '1125566632', 'adsfadsf@gmail.com', '', '', '8978625486'),
(69, 'adsfds', '1125566632', 'adsfadsf@gmail.com', '', '', '8978625486');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `Bus_Name` varchar(255) NOT NULL,
  `Bus_NumberPlate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `Bus_Name`, `Bus_NumberPlate`) VALUES
(11, 'Randal', 'GJ05EW2222'),
(12, 'Ganshayam', 'GJ06GF3452'),
(13, 'GANSHAYAM', 'GJ09QW1212'),
(14, 'Randal', 'MH12AS2423'),
(20, 'randal', 'GJ04JK5865'),
(24, 'randal', 'GJ23GH2015');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `message`, `created_at`) VALUES
(6, 'laksh', 'luxlukhi250@gmail.com', '5689545253', 'just looking like a wow\r\n', '2024-09-20 04:36:11'),
(8, 'Yash', 'yash@gaiml.com', '89231239043', 'The rate of all buse are very pocket friendly.', '2024-09-21 07:42:56'),
(9, 'sahil', 'sahil123@gmail.com', '4589658956', 'this is my messege', '2024-09-30 07:39:58'),
(10, 'RAM', 'luxlukhi04@gmail.com', '4589865896', 'THIS IS MY TODAY MESSEGE', '2024-09-30 08:20:09'),
(11, 'not_name', 'adsfa@gmial.com', '5689545253', 'a', '2024-10-09 00:34:29'),
(12, 'anju', 'luxlukhi250@gmail.com', '9638866983', 'my name is aman', '2024-10-21 23:55:29'),
(13, 'asdf', 'luxlukhi250@gmail.com', '5698758965', 'adsfasdfds dfdsf', '2024-10-22 05:52:39'),
(14, 'names', 'aaa@gmail.com', '7898855485', 'dfgdfsgsdfg', '2025-03-14 06:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `course` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `level` varchar(150) NOT NULL,
  `total_amount` float NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `description`, `level`, `total_amount`, `date_created`) VALUES
(1, 'Course 2', 'Sample', '1', 4500, '2020-10-31 11:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `course_id`, `description`, `amount`) VALUES
(1, 1, 'Tuition', 3000),
(3, 1, 'sample', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` int(6) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `exp_year` varchar(20) NOT NULL,
  `cvv` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `name`, `email`, `address`, `city`, `state`, `zip_code`, `card_name`, `card_number`, `exp_month`, `exp_year`, `cvv`) VALUES
(3, 0, 'chathuranga priyadarshana', 'chathurangapriyadarshana29@gmail.com', 'No24,Udumaththa,Eheliyagoda', 'Eheliyagoda', 'india', 70600, 'werr', '1111222233334444', 'gs', '2022', 1234),
(4, 0, 'chathuranga priyadarshana', 'chathurangapriyadarshana29@gmail.com', 'No24,Udumaththa,Eheliyagoda', 'Eheliyagoda', 'india', 70600, 'ffvfvf', '1111222233334444', 'janurgb', '26', 123),
(5, 200, 'chathuranga priyadarshana', 'chathurangapriyadarshana29@gmail.com', 'No24,Udumaththa,Eheliyagoda', 'Eheliyagoda', 'india', 70600, 'jorn', '1111222233334444', 'gfggg', '2022', 1234),
(6, 200, 'chathuranga priyadarshana', 'chathurangapriyadarshana29@gmail.com', 'No24,Udumaththa,Eheliyagoda', 'Eheliyagoda', 'india', 70600, 'jorn', '1111222233334444', 'janray', '2022', 1234),
(7, 200, 'Ranasinghe Pedige Chathuranga Priyadarshana Ranasinghe', 'chathurangapriyadarshana29@gmail.com', 'No24,Udumaththa,Eheliyagoda', 'Eheliyagoda', 'india', 70600, 'cm', '1111222233334444', 'janu', '2021', 134),
(34, 200, 'anju', 'luxlukhi250@gmail.com', 'H-201 pramukh avenue', '', '', 394520, '', '1111222233334444', 'jan', '2025', 256),
(35, 200, 'anju', 'luxlukhi250@gmail.com', 'h-201 vivekandan college', 'mumbai', 'gujrat', 123554, '', '1111222233334444', 'feb', '2025', 256),
(36, 200, 'ram', 'ram123@gmail.com', 'H-201 pramukh avenue vivekanand', 'vapi', 'gujrat', 256985, '', '1111222233334444', 'jan', '2022', 125),
(37, 200, 'anju', 'luxlukhi250@gmail.com', '', '', '', 123456, '', '1111222233334444', '', '', 123),
(38, 200, 'anju', 'luxlukhi250@gmail.com', '', '', '', 111111, '', '1111222233334444', '', '2024', 123),
(39, 200, 'anju', 'luxlukhi250@gmail.com', '', '', '', 123456, '', '1111222233334444', '', '2024', 123),
(40, 200, 'anju', 'luxlukhi250@gmail.com', '', '', '', 658965, '', '1111555566664444', '', '2024', 325),
(41, 200, 'anju', 'luxlukhi250@gmail.com', '', '', '', 256458, '', '1111222233334444', '', '2024', 123),
(42, 200, 'anju', 'luxlukhi250@gmail.com', '', '', '', 125636, '', '3333333333333333', '', '2024', 125),
(43, 200, 'anju', 'luxlukhi250@gmail.com', '', '', '', 125636, '', '3333333333333333', '', '2024', 125),
(44, 200, 'anju', 'luxlukhi250@gmail.com', '', '', '', 125636, '', '3333333333333333', '', '2024', 125),
(45, 200, 'anju', 'luxlukhi250@gmail.com', '', '', '', 125635, '', '2222333344445555', '', '2024', 125),
(46, 200, 'anju', 'luxlukhi250@gmail.com', 'h 201 pramukh avenue', 'mycity', 'gujrat', 394520, '', '1111222233334444', 'feb', '2024', 123),
(47, 400, 'names', 'aaa@gmail.com', '', '', '', 452569, '', '1111222233334444', '', '2025', 123);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(30) NOT NULL,
  `ef_id` int(30) NOT NULL,
  `amount` float NOT NULL,
  `remarks` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `ef_id`, `amount`, `remarks`, `date_created`) VALUES
(1, 1, 1000, 'sample', '2020-10-31 14:25:35'),
(2, 1, 500, 'sample 2', '2020-10-31 14:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `via_city` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` time(6) NOT NULL,
  `cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `via_city`, `destination`, `bus_name`, `departure_date`, `departure_time`, `cost`) VALUES
(8, 'Surat', 'bhavnagar', 'GJ05EV1150', '2024-09-30', '16:44:00.000000', '400'),
(9, 'Bhavnagar', 'Surat', 'GJ06RS1126', '2024-09-27', '16:25:00.000000', '400'),
(11, 'Vadodra', 'Vapi', 'GJ04OP6677', '2024-09-28', '12:24:00.000000', '100'),
(16, 'Surat', 'agd', 'GJ05EV1150', '2024-10-03', '16:46:00.000000', '200'),
(17, 'laksh', 'bhavdip', 'GJ04EV2021', '2024-10-23', '21:25:00.000000', '500'),
(18, 'dang', 'varacha', 'randal', '2024-10-25', '05:59:00.000000', '500');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` bigint(25) NOT NULL,
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `First_Name`, `Last_Name`, `username`, `email`, `password`) VALUES
(5, 252154, 'chathuranga', 'priyadarshana', 'kamal', 'chathurangapriyadarshana29@gmail.com', '1234'),
(6, 988593664, 'laksh', 'adsf', 'aaa', 'adsfadsf@gmail.com', '111111'),
(10, 68417001674353, 'adsf', 'dfdf', 'anju', 'luxlukhi250@gmail.com', '12345@'),
(12, 3678666587, 'laksh', 'likhi', 'my name', 'test@email.com', 'luxluxlux'),
(13, 9223372036854775807, 'njame', 'ninja', 'not_name', 'adsfa@gmial.com', '11111111'),
(16, 72829970602, 'DARSHNA', 'GHADIYA', 'sdfdsf', 'darshand@gmail.com', 'asdfasdf'),
(17, 6613592, 'aman', 'darshil', 'aman1', 'aman@gmail.com', '11111111'),
(18, 799476331975517, 'adsf', 'lukhi', 'asdf', 'luxlukhi250@gmail.com', 'asdfasdf'),
(19, 5157955510, 'tara', 'rara', 'laksh', 'darshand@gmail.com', 'lakshlaksh'),
(20, 569936948570021061, 'my', 'name', 'names', 'aaa@gmail.com', '11111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
