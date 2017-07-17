-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2017 at 02:28 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `price` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `download_count` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `isbn`, `price`, `count`, `download_count`, `created_by`) VALUES
(1, 'Aaa', 'ip-11212', '240.00', 1, 0, 1),
(2, 'Test Book', 'ISBN-4523', '1000', 2, 0, 1),
(3, 'Orbit', 'ISBN-45212', '200', 5, 0, 1),
(4, 'The O.C.', 'ISBN -  4567', '1250', 1, 0, 1),
(5, 'Oxford Pocket Dictionary', 'ISBN - 5548', '1000', 8, 1, 1),
(6, 'The Life And Death Of Cholemendely', 'ISBN - 5798', '500', 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_isbn` varchar(45) NOT NULL,
  `order_price` varchar(45) NOT NULL,
  `order_time` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_isbn`, `order_price`, `order_time`) VALUES
('ip-11212', '240.00', '06:05:36pm'),
('ISBN - 5548', '1000', '01:33:19am'),
('ISBN - 5548', '1000', '02:23:52am'),
('ISBN - 5798', '500', '01:33:23am'),
('ISBN - 5798', '500', '07:13:49pm'),
('ISBN-45212', '200', '06:09:58pm'),
('ISBN-45212', '200', '06:43:49pm'),
('ISBN-45212', '200', '07:06:02pm'),
('ISBN-4523', '1000', '06:06:12pm'),
('ISBN-4523', '1000', '06:06:20pm'),
('ISBN-4523', '1000', '07:05:43pm');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `display` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `display`) VALUES
(1, 'admin', 'Admin'),
(2, 'user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `active` int(11) NOT NULL DEFAULT '0',
  `token` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fname`, `lname`, `password`, `role`, `active`, `token`) VALUES
(1, 'admin', 'lahiru', 'pathirana', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 1, 1, '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9'),
(2, 'user', 'fname', 'lname', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2, 1, 'e606e38b0d8c19b24cf0ee3808183162ea7cd63ff7912dbb22b5e803286b4446'),
(3, 'lahiru', 'lahiru', 'rangitha', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 2, 1, '01d44c3e9548a0b4479dc4cd1d0e16d495e937ad45c5a24b2c7c35e2adc18ba3'),
(4, 'gihan', 'aaaa', 'bbbb', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2, 1, '900bc0d0dd3685a2fe3db061fd51d6327154788f4792517b28f3ed1eff893c42'),
(5, 'kavinda', 'kavinda', 'jayakody', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2, 1, '6c37e957a29add08b7d551bd8df0fd3a2cdd7990c27955710fcc1a27164f8152');

-- --------------------------------------------------------

--
-- Table structure for table `users_books`
--

CREATE TABLE `users_books` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_isbn`,`order_price`,`order_time`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_books`
--
ALTER TABLE `users_books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users_books`
--
ALTER TABLE `users_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
