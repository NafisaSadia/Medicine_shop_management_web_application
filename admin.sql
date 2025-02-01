-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 11:27 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminn`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `email`, `phone`, `address`, `date_added`) VALUES
(1, 'John Doe', 'john.doe@example.com', '1234567890', '123 Elm Street, Springfield', '2025-01-30 19:45:07'),
(2, 'Jane Smith', 'jane.smith@example.com', '0987654321', '456 Oak Avenue, Riverside', '2025-01-30 19:45:07'),
(3, 'Michael Johnson', 'michael.johnson@example.com', '1122334455', '789 Pine Road, Lakeside', '2025-01-30 19:45:07'),
(4, 'Emily Davis', 'emily.davis@example.com', '5566778899', '321 Maple Street, Greenfield', '2025-01-30 19:45:07'),
(5, 'David Brown', 'david.brown@example.com', '9988776655', '654 Birch Lane, Midtown', '2025-01-30 19:45:07'),
(6, 'Sarah Wilson', 'sarah.wilson@example.com', '2233445566', '987 Cedar Boulevard, Pleasantville', '2025-01-30 19:45:07'),
(7, 'James White', 'james.white@example.com', '4455667788', '135 Oakwood Drive, Hilltop', '2025-01-30 19:45:07'),
(8, 'Laura Green', 'laura.green@example.com', '6677889900', '246 Redwood Avenue, Fairview', '2025-01-30 19:45:07'),
(9, 'Chris Martinez', 'chris.martinez@example.com', '7788990011', '369 Willow Street, Brooktown', '2025-01-30 19:45:07'),
(10, 'Olivia Clark', 'olivia.clark@example.com', '8899001122', '482 Elmwood Crescent, Rivertown', '2025-01-30 19:45:07'),
(11, 'saikot', 'amyrasolutionsltd@gmail.com', '01737040155', 'House 6/C, Mollah Tower, Dhaka Airport', '2025-01-30 14:45:41'),
(12, 'saikot', 'sa@gmail.com', '659654', 'House 6/C, Mollah Tower, Dhaka Airport', '2025-01-30 15:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `order_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `delivery_address` text NOT NULL,
  `delivery_status` enum('Pending','Shipped','Delivered','Canceled') NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`order_id`, `customer_name`, `delivery_address`, `delivery_status`, `date_added`) VALUES
(1, 'John Doe', '123 Elm Street, Springfield', 'Shipped', '2025-01-30 19:47:20'),
(2, 'Jane Smith', '456 Oak Avenue, Riverside', 'Delivered', '2025-01-30 19:47:20'),
(3, 'Michael Johnson', '789 Pine Road, Lakeside', 'Pending', '2025-01-30 19:47:20'),
(4, 'Emily Davis', '321 Maple Street, Greenfield', 'Shipped', '2025-01-30 19:47:20'),
(5, 'David Brown', '654 Birch Lane, Midtown', 'Canceled', '2025-01-30 19:47:20'),
(6, 'Sarah Wilson', '987 Cedar Boulevard, Pleasantville', 'Delivered', '2025-01-30 19:47:20'),
(7, 'James White', '135 Oakwood Drive, Hilltop', 'Pending', '2025-01-30 19:47:20'),
(8, 'Laura Green', '246 Redwood Avenue, Fairview', 'Shipped', '2025-01-30 19:47:20'),
(9, 'Chris Martinez', '369 Willow Street, Brooktown', 'Delivered', '2025-01-30 19:47:20'),
(10, 'Olivia Clark', '482 Elmwood Crescent, Rivertown', 'Shipped', '2025-01-30 19:47:20'),
(11, 'saikot', 'dhaka', 'Delivered', '2025-01-30 15:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `price`) STORED,
  `sale_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_name`, `quantity`, `price`, `sale_date`) VALUES
(1, 'Paracetamol Tablets', 3, 5.50, '2025-01-31'),
(2, 'Blood Pressure Monitor', 1, 35.00, '2025-01-30'),
(3, 'Vitamin C Supplements', 5, 8.00, '2025-01-29'),
(4, 'Insulin Injection', 2, 15.00, '2025-01-28'),
(5, 'First Aid Kit', 1, 25.00, '2025-01-27'),
(6, 'Multivitamin Tablets', 10, 12.00, '2025-01-26'),
(7, 'Boy D', 2, 12.00, '2025-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `userss`
--

CREATE TABLE `userss` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userss`
--

INSERT INTO `userss` (`id`, `username`, `password`) VALUES
(1, 'saikot', 'saikot1234'),
(2, 'pritom', 'pritom1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userss`
--
ALTER TABLE `userss`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
