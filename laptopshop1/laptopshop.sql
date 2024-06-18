-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 18, 2024 at 05:48 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptopshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'لپتاپ مایکروسافت'),
(2, 'لپتاپ ایسر'),
(3, 'لپتاپ دل'),
(4, 'لپتاپ msi'),
(5, 'مک بوک'),
(6, 'لپتاپ ایسوس'),
(7, 'لپتاپ لنوو');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `totalprice` varchar(100) DEFAULT NULL,
  `creat_order_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `totalprice`, `creat_order_time`) VALUES
(1, 2, '8,228,000', '2019-05-08 07:30:00'),
(2, 2, '8,228,000', '2019-05-21 19:30:00'),
(3, 2, '1,495,200', '2019-05-16 15:02:27'),
(4, 2, '31,117,410', '2019-05-10 20:02:28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `creationTime` timestamp NULL DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `title`, `description`, `price`, `discount`, `creationTime`, `pic`) VALUES
(12, 2, 'لپتاپ ایسر', 'لپ تاپ ایسر 15.6 اینچی', 32800000, 10, '2019-05-19 16:12:52', 'upload/laptopeser.jpg'),
(13, 7, 'لپتاپ لنوو', 'لپ تاپ لنوو 15.6 اینچی مدل IdeaPad IdeaPad 3', 18788000, 5, '2019-05-19 16:22:34', 'upload/laptoplenovo.jpg'),
(14, 1, 'لپتاپ مایکروسافت', 'لپ تاپ مایکروسافت 15 اینچی مدل Surface Laptop 4 R7 16GB 512GB', 50200000, 8, '2019-05-19 16:23:22', 'upload/microsoft.jpg'),
(15, 3, 'لپتاپ دل', 'لپ تاپ دل 15.6 اینچی مدل Precision 3580 i7 1370P 32GB 1TB RTXA500', 141499000, 0, '2019-05-19 16:25:34', 'upload/dell.jpg'),
(16, 6, 'لپتاپ ایسوس', 'لپ تاپ ایسوس 15.6 اینچی مدل Vivobook 15 F1504VA i7 1355U 16GB 512GB Intel', 34390000, 5, '2019-05-19 16:26:12', 'upload/asus.jpg'),
(17, 2, 'لپتاپ ایسر', 'لپ‌ تاپ ایسر 15.6 اینچی مدل Nitro V 15 ANV15 i7 13620H 32GB 2TB RTX3050', 57600000, 20, '2019-05-19 16:27:04', 'upload/acer2.jpg'),
(18, 4, 'لپتاپ msi', 'لپ تاپ ام اس آی 16 اینچی مدل Summit E16 Flip i7 1360P 32GB 2TB RTX4060', 98888000, 0, '2019-05-19 16:27:48', 'upload/msi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `registerTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `firstname`, `lastname`, `address`, `registerTime`) VALUES
(2, 'shahin322@yahoo.com', '1', 'shahin', 'asghari', 'استان اصفهان، اصفهان', '2019-05-28 22:11:45'),
(4, 'mahsa22@gmail.com', '00', 'مهسا', 'وحیدی', 'استان تهران، تهران', '2019-05-28 22:12:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
