-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2018 at 02:17 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlm_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `c_date` varchar(100) NOT NULL,
  `m_date` varchar(100) NOT NULL,
  `c_by` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comission_seting`
--

CREATE TABLE `comission_seting` (
  `id` int(11) NOT NULL,
  `level_number` varchar(100) NOT NULL,
  `basic` varchar(100) NOT NULL,
  `standard` varchar(100) NOT NULL,
  `silver` varchar(100) NOT NULL,
  `gold` varchar(100) NOT NULL,
  `diamond` varchar(100) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comission_seting`
--

INSERT INTO `comission_seting` (`id`, `level_number`, `basic`, `standard`, `silver`, `gold`, `diamond`, `total`) VALUES
(1, '10', '2', '2', '2', '2', '2', 10),
(2, '9', '3', '3', '3', '3', '3', 15),
(3, '8', '4', '4', '4', '4', '4', 20),
(4, '7', '7', '7', '7', '7', '7', 35),
(5, '6', '8', '8', '8', '8', '8', 40),
(6, '5', '10', '10', '10', '10', '10', 50),
(7, '4', '13', '13', '13', '13', '13', 65),
(8, '3', '15', '15', '15', '15', '15', 75),
(9, '2', '17', '17', '17', '17', '17', 85),
(10, '1', '21', '21', '21', '21', '21', 105);

-- --------------------------------------------------------

--
-- Table structure for table `levels_settings`
--

CREATE TABLE `levels_settings` (
  `id` int(11) NOT NULL,
  `level_number` varchar(100) NOT NULL,
  `refer_for_level` varchar(100) NOT NULL,
  `package` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `levels_settings`
--

INSERT INTO `levels_settings` (`id`, `level_number`, `refer_for_level`, `package`) VALUES
(1, '1', '2', 'Basic'),
(2, ' 2', '4', 'Standard'),
(3, '3', '5', 'Silver'),
(4, '4', '6', 'Gold'),
(5, '5', '7', 'diamond'),
(6, '6', '8', 'diamond'),
(7, '7', '10', 'diamond'),
(8, '8', '20', 'diamond'),
(9, '9', '30', 'diamond'),
(10, '10', '40', 'diamond');

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_payments`
--

CREATE TABLE `pending_payments` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `account_type` varchar(100) NOT NULL,
  `phone_number` int(100) NOT NULL,
  `withdraw_amount` int(100) NOT NULL,
  `selected_bank` varchar(100) NOT NULL,
  `bank_account_number` int(100) NOT NULL,
  `withdraw_bank_amount` int(100) NOT NULL,
  `date_time` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `basic_vol` varchar(100) NOT NULL,
  `booster_vol` varchar(100) NOT NULL,
  `purchase_cost` varchar(100) NOT NULL,
  `product_des` varchar(300) NOT NULL,
  `product_cat` varchar(100) NOT NULL,
  `related_product` varchar(100) NOT NULL,
  `img_name` varchar(100) NOT NULL,
  `img_path` varchar(100) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `net_amount` varchar(100) NOT NULL,
  `c_date` varchar(100) NOT NULL,
  `m_date` varchar(100) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `basic_vol`, `booster_vol`, `purchase_cost`, `product_des`, `product_cat`, `related_product`, `img_name`, `img_path`, `product_price`, `qty`, `discount`, `net_amount`, `c_date`, `m_date`, `status`) VALUES
(2, '1111', 'test', '100', '200', '500', 'testing', 'tes', 'test', 'Chrysanthemum2.jpg', './images/Chrysanthemum.jpg', '1000', '12', '34', '1000', '11:44:57am', '12:41:20pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `total_cart` int(11) NOT NULL DEFAULT '0',
  `is_shipped` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_product`
--

CREATE TABLE `tbl_cart_product` (
  `id` int(11) NOT NULL,
  `product_cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `pv` text NOT NULL,
  `bv` text NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL,
  `parent_id` int(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `cnic` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `comission` varchar(100) NOT NULL,
  `booster_com` varchar(100) NOT NULL,
  `referal_id` int(100) NOT NULL,
  `type` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `parent_id`, `full_name`, `username`, `mobile`, `cnic`, `city`, `email`, `password`, `comission`, `booster_com`, `referal_id`, `type`) VALUES
(157, 1, 1, 'admin', '', '03001234567', '331009876543', 'Lahore', 'admin@yahoo.com', 'admin', '', '', 0, 1),
(302, 2, 1, 'b', '', '03001234567', '', '', 'b@gmail.com', '12', '', '', 1, 2),
(303, 3, 1, 'c', '', '03001234567', '', '', 'c@gmail.com', '12', '', '', 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comission_seting`
--
ALTER TABLE `comission_seting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels_settings`
--
ALTER TABLE `levels_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_payments`
--
ALTER TABLE `pending_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_cart_product`
--
ALTER TABLE `tbl_cart_product`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comission_seting`
--
ALTER TABLE `comission_seting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `levels_settings`
--
ALTER TABLE `levels_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pending_payments`
--
ALTER TABLE `pending_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_cart_product`
--
ALTER TABLE `tbl_cart_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=304;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
