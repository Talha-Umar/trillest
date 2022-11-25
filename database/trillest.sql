-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2022 at 04:14 PM
-- Server version: 5.7.38-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thozhilmunaivor_trillest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `mobile`, `password`, `profile_image`) VALUES
(1, 'admin', 'admin@gmail.com', '03037495997', 'admin', 'img/adminprofile/62b4b44d899edadminprofile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `assigntags`
--

CREATE TABLE `assigntags` (
  `id` int(11) NOT NULL,
  `free_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assigntags`
--

INSERT INTO `assigntags` (`id`, `free_id`, `tag_id`) VALUES
(7, 4, 6),
(8, 4, 14),
(9, 5, 6),
(10, 5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'In-person Recording'),
(2, 'VFX Editing'),
(3, 'Both');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`) VALUES
(1, 'Lahore'),
(2, 'Multan'),
(3, 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `dumy`
--

CREATE TABLE `dumy` (
  `id` int(11) NOT NULL,
  `col1` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dumy`
--

INSERT INTO `dumy` (`id`, `col1`) VALUES
(52, '4'),
(51, '6,14'),
(50, '4'),
(49, '6,14');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer`
--

CREATE TABLE `freelancer` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freelancer`
--

INSERT INTO `freelancer` (`id`, `cat_id`, `city_id`, `name`, `email`, `mobile`, `description`, `password`, `profile_image`) VALUES
(4, 1, 2, 'Talha Umar', 'tuc4373@gmail.com', '03037485855', '', 'talha', 'img/adminprofile/62c182c3adb16adminprofile.jpg'),
(5, 1, 2, 'bilal', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `q_id`, `option`, `price`) VALUES
(2, 2, 'Vip', '200'),
(3, 2, 'Basic', '100'),
(4, 2, 'ee', '2'),
(5, 3, 'Hassan', '20'),
(6, 3, 'Talha', '10'),
(12, 3, 'utt', '45'),
(13, 5, 'hd video', '20'),
(14, 5, 'low', '23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `pkg_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `order_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pkg_id`, `user_id`, `freelancer_id`, `payment_id`, `status`, `order_date`) VALUES
(55, 44, 1, 4, 98, 0, '2022-07-05 19:41:22 pm'),
(56, 45, 1, 4, 99, 0, '2022-07-05 20:06:16 pm'),
(57, 46, 1, 4, 100, 0, '2022-07-05 20:08:01 pm');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `cat_id`, `user_id`, `name`, `price`, `description`) VALUES
(3, 2, 1, 'xyz', 200, ''),
(4, 2, 1, 'xyz', 200, ''),
(5, 2, 1, 'yyg', 200, ''),
(6, 2, 1, 'yyg', 200, ''),
(7, 2, 1, 'yyg', 200, ''),
(8, 2, 1, 'hello ', 200, ''),
(9, 1, 1, 'hello ', 40, ''),
(10, 1, 1, 'hello ', 33, ''),
(11, 1, 1, '', 40, ''),
(12, 1, 1, '', 33, ''),
(13, 1, 1, '', 30, ''),
(14, 1, 1, '', 43, ''),
(15, 1, 1, '', 43, ''),
(16, 1, 1, '', 30, ''),
(17, 1, 1, '', 68, ''),
(18, 1, 1, '', 68, ''),
(19, 2, 1, 'tt', 200, ''),
(20, 1, 1, '', 40, ''),
(21, 1, 1, '', 40, ''),
(22, 1, 1, 'hh', 33, ''),
(23, 1, 1, 'hhh', 40, ''),
(24, 1, 1, '', 40, ''),
(25, 1, 1, '', 33, ''),
(26, 1, 1, '', 33, ''),
(27, 1, 1, '', 33, ''),
(28, 2, 1, 'giii', 100, ''),
(29, 2, 1, 'trt', 100, ''),
(30, 1, 1, '', 40, ''),
(31, 1, 1, '', 30, ''),
(32, 1, 1, '', 30, ''),
(33, 1, 1, '', 33, ''),
(34, 1, 1, '', 33, ''),
(35, 1, 1, '', 33, ''),
(36, 1, 1, '', 30, ''),
(37, 1, 1, '', 40, ''),
(38, 1, 1, '', 40, ''),
(39, 1, 1, '', 30, ''),
(40, 1, 1, '', 30, ''),
(41, 1, 1, '', 40, ''),
(42, 1, 1, '', 40, ''),
(43, 1, 1, '', 33, ''),
(44, 1, 1, '', 33, ''),
(45, 1, 1, '', 30, ''),
(46, 1, 1, '', 30, '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pkg_id` int(11) NOT NULL,
  `method` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `pkg_id`, `method`, `txn_id`, `currency`, `amount`, `status`, `date_time`) VALUES
(98, 1, 44, 'Stripe', 'pi_3LIHcZG6rr8Q31kh0DZhVtVs', 'USD', '33.0', 'succeeded', '2022-07-05 19:41:22'),
(99, 1, 45, 'Stripe', 'pi_3LII0fG6rr8Q31kh0vGNCy9V', 'USD', '30.0', 'succeeded', '2022-07-05 20:06:16'),
(100, 1, 46, 'Stripe', 'pi_3LII2MG6rr8Q31kh1JJIm1Wh', 'USD', '30.0', 'succeeded', '2022-07-05 20:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `cat_id`, `question`) VALUES
(2, 2, 'What type of video editing you want?'),
(3, 1, 'What is admin name?'),
(5, 1, 'what type of  video recording you want?');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(2, 'video editing'),
(3, 'hd camera'),
(4, '3d image');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `profile_image`) VALUES
(1, 'asad', 'asad@gmail.com', '03041234567', 'asad', 'userprofile/62c23b420a941userprofile.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigntags`
--
ALTER TABLE `assigntags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `free_id` (`free_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dumy`
--
ALTER TABLE `dumy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pkg_id` (`pkg_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `freelancer_id` (`freelancer_id`),
  ADD KEY `payment_id` (`payment_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pkg_id` (`pkg_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigntags`
--
ALTER TABLE `assigntags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dumy`
--
ALTER TABLE `dumy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `freelancer`
--
ALTER TABLE `freelancer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigntags`
--
ALTER TABLE `assigntags`
  ADD CONSTRAINT `assigntags_ibfk_1` FOREIGN KEY (`free_id`) REFERENCES `freelancer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assigntags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `freelancer`
--
ALTER TABLE `freelancer`
  ADD CONSTRAINT `freelancer_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `freelancer_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `options`
--
ALTER TABLE `options`
  ADD CONSTRAINT `options_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`pkg_id`) REFERENCES `package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `package_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `package_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`pkg_id`) REFERENCES `package` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
