-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2020 at 01:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshopping`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcat` (IN `cid` INT)  SELECT * FROM categories WHERE cat_id=cid$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(10) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(300) NOT NULL,
  `admin_password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(4, 'armash', 'admin@gmail.com', 'Admin021');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Kiehl\'s'),
(2, 'Neutrogena'),
(3, 'Clinique'),
(4, 'Fenty Beauty'),
(5, 'Ysl Beauty'),
(6, 'Urban Decay'),
(7, 'Giorgio Armani Beauty'),
(8, 'Viktor & Rolf'),
(9, 'Yves Saint Laurent'),
(10, 'Tom Ford'),
(11, 'Tiffany & Co'),
(12, 'Harry Winston'),
(13, 'Cartier');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Jewellery'),
(2, 'Cosmetics');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  `Date` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `status`, `remarks`, `Date`) VALUES
(15, 'in Process', 'asdasd', '2020-07-23'),
(19, 'Delivered', 'Check ', '2020-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `orders_info`
--

CREATE TABLE `orders_info` (
  `order_id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `f_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `address` varchar(60) NOT NULL,
  `city` varchar(14) NOT NULL,
  `state` varchar(14) NOT NULL,
  `Mobile` varchar(32) NOT NULL,
  `cardname` varchar(25) NOT NULL,
  `cardnumber` varchar(20) NOT NULL,
  `expdate` varchar(25) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `prod_count` int(15) DEFAULT NULL,
  `total_amt` varchar(50) DEFAULT NULL,
  `cvv` int(5) NOT NULL,
  `Status` varchar(15) NOT NULL,
  `Start_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_info`
--

INSERT INTO `orders_info` (`order_id`, `user_id`, `f_name`, `email`, `address`, `city`, `state`, `Mobile`, `cardname`, `cardnumber`, `expdate`, `product_name`, `prod_count`, `total_amt`, `cvv`, `Status`, `Start_Date`) VALUES
(19, 43, 'Armash', 'root@gmail.com', 'Orangi town', 'Karachi', 'Sindh', '03232535969', 'armash', '4111111111111111', '25/04/21', 'Necklace ', 1, '2,000.00', 332, 'Delivered', '2020-07-27'),
(20, 51, 'Arbaz', 'arbaz@gmail.com', 'Nazimabad 2', 'Karachi', 'Punjab', '03232535969', 'armash', '41111111111111111', '22/04/21', 'Necklace Red', 1, '5,000.00', 332, 'In Process', '2020-07-28');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(50) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `New` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `New`) VALUES
(133, 1, 1, 'Necklace ', 2000, 'asdasd asdasdasdasdasdasdasdasdasdasd', 'c-product-1.jpg', 'No'),
(134, 1, 2, 'Necklace 2', 5000, 'adsdsasd&amp;nbsp;', 'c-product-2.jpg', 'Yes'),
(137, 1, 13, 'Necklace Blue', 2000, 'asdaasdaasdaasdaasda', 'c-product-4.jpg', 'Yes'),
(139, 1, 11, 'Necklace Red', 5000, 'adsasdadsasdadsasdadsasdadsasd', 'c-product-3.jpg', 'Yes'),
(140, 1, 13, 'Necklace Gold', 10000, 'Gold Chain Necklace Everyone loves gold, right?', 'c-product-5.jpg', 'No'),
(141, 1, 1, 'Necklace Gold 2', 10000, 'asdasasdasasdasasdasasdasasdasasdas', 'c-product-7.jpg', 'Yes'),
(142, 1, 5, 'Necklace Gold 3', 4200, 'adssadssadssadssadssadssadssadssadss', 'l-product-11.jpg', 'No'),
(143, 2, 8, 'Lipstick', 500, '500', 'l-product-7.jpg', 'No'),
(144, 1, 1, 'Necklace Blue 2', 10000, 'asdasd asdasd asdasd asdasd asdasd asdasd asdasd asdasd&amp;nbsp;', 'c-product-6.jpg', 'No'),
(145, 2, 12, 'Face Powder', 200, 'adasdadasdadasdadasd', 'l-product-8.jpg', 'No'),
(146, 2, 11, 'Makeup kit', 2000, 'asdasdadsasdasdadsasdasdadsasdasdads', 'l-product-6.jpg', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_Id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_Id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(43, 'Shaheer', 'Hussain', 'root@gmail.com', '123456', '3156986335', 'Nazimabad No 2', 'Nazimabad No 2 Near '),
(50, 'Armash', 'Hussain', 'armash@gmail.com', 'Admin021', '03232535969', 'Nazimabad', 'Nazimabad'),
(51, 'Arbaz', 'Khan', 'arbaz@gmail.com', 'Admin021', '03232535969', 'Nazimabad 2', 'Nazimabad 2'),
(55, 'Armash', 'Hussain', 'Armashash@gmail.com', 'Ad', '03232535969', 'Nazimabad', 'Nazimabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_info`
--
ALTER TABLE `orders_info`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_category` (`product_cat`),
  ADD KEY `product_brand` (`product_brand`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders_info`
--
ALTER TABLE `orders_info`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product_brand` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `product_category` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
