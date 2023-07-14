-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 09:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_cost` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `product_name`, `product_description`, `product_quantity`, `product_cost`, `product_img`) VALUES
(2, 'Samsung', '6 GB RAM | 128 GB ROM | Expandable Upto 1 TB\n         16.26 cm (6.4 inch) HD+ Display 48MP + 8MP + 2MP + 2MP | 13MP Front Camera\n         6000 mAh Lithium-ion Batterys MediaTek Helio G80 Processor.1 Year Manufacturer Warranty.\n    ', 2, '45198', 'img/samsung.webp'),
(6, 'Kurti', 'Kurtis take a top spot in fashionable and adaptable clothing for women with ethnic themes. They are available in a vast range of patterns, designs, themes\n    ', 1, '1050', 'img/womem.webp'),
(8, 'Headphone', '\n    With Mic:Yes\n    Bluetooth version: 5\n    Wireless range: 10 m\n    Battery life: 35 Hrs | Charging time: 4.5 Hrs\n    Using simple touch controls answer phone calls.\n    With Mic:Yes\n    Bluetooth version: 5\n    Wireless range: 10 m\n    ', 1, '999', 'img/headphone.webp');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_number` text NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_dob` date NOT NULL,
  `customer_gender` varchar(10) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_number`, `customer_password`, `customer_dob`, `customer_gender`, `customer_address`, `customer_type`) VALUES
(3, 'RAJ KUMAR', 'rajmarktr10@gmail.com', '7764904152', '7789456123', '2023-07-21', 'Male', 'Bishiya', 'Self Employee'),
(5, 'RAJ KUMAR', 'rajkumarktr10@gmail.com', '', '', '0000-00-00', '', '', 'government'),
(6, 'Arti kumari', 'arti@gmail.com', '7764904152', 'Rja@123', '4857-07-08', 'Male', 'Mohali', 'Private'),
(7, 'Gagan kumar', 'gagan@gmail.com', '123456789', 'Raja@123', '2023-07-20', 'Male', 'Mohali', 'Self Employee');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `upload_date` date NOT NULL,
  `upload_time` time NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(255) NOT NULL,
  `seller_email` varchar(255) NOT NULL,
  `seller_number` text NOT NULL,
  `seller_password` varchar(255) NOT NULL,
  `seller_dob` date NOT NULL,
  `seller_address` varchar(255) NOT NULL,
  `seller_gender` varchar(10) NOT NULL,
  `seller_gstnumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`seller_id`, `seller_name`, `seller_email`, `seller_number`, `seller_password`, `seller_dob`, `seller_address`, `seller_gender`, `seller_gstnumber`) VALUES
(1, 'RAJ KUMAR', 'rajkumarktr10@gmail.com', '776490415', '123456', '2023-07-12', 'Bishariya,sisiya,korha', 'Male', 'asfdfuij5612376');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
