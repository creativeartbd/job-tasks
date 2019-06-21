-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 06:22 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_tbl`
--

CREATE TABLE `sales_tbl` (
  `id` bigint(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `buyer` varchar(255) NOT NULL,
  `receipt_id` varchar(20) NOT NULL,
  `items` varchar(255) NOT NULL,
  `buyer_email` varchar(50) NOT NULL,
  `buyer_ip` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `hash_key` varchar(128) NOT NULL,
  `entry_at` date NOT NULL,
  `entry_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_tbl`
--

INSERT INTO `sales_tbl` (`id`, `amount`, `buyer`, `receipt_id`, `items`, `buyer_email`, `buyer_ip`, `note`, `city`, `phone`, `hash_key`, `entry_at`, `entry_by`) VALUES
(8, 120, 'Alex Mojum', 'receipid', 'Items one,items two,items three', 'stfab_k08@yahoo.com', '::1', 'Please allow me', 'Dhaka', '8801671133639', 'fba0c8dfc6bf5ca072738d1bd2d352bd8639657f27fba5f39ccf4ef2786b9e939ab0e98cad838ac6888d745aabc6252352a5b7746a19367499819e18e2cbcb14', '2019-06-20', 11),
(9, 120, 'Shibbir Ahmed', 'receipid', 'Items one', 'stfab_k08@yahoo.com', '::1', 'Please allow me', 'Dhaka', '8801671133639', 'fba0c8dfc6bf5ca072738d1bd2d352bd8639657f27fba5f39ccf4ef2786b9e939ab0e98cad838ac6888d745aabc6252352a5b7746a19367499819e18e2cbcb14', '2019-07-20', 11),
(10, 1, 'Fayez Ahmed', 'sdf d', 'sdf', 'stfab_k08@yahoo.com', '::1', 'À	Á	Â	Ã	Ä	Å	Æ	Ç	È	É', 'fsdf', '412329684', '7d80f9932ca79cd40b8d26fff477dfd21c799cc99703c120b6d999e16ee76b88693a03118422d3a7218f8e067fc1bad443ef35ea8b8b637b02c1e5a5577401af', '2019-08-20', 1),
(13, 1, 'Alex Mojum', 'sdf d', 'sdf', 'stfab_k08@yahoo.com', '::1', 'À	Á	Â	Ã', 'fsdf', '412329684', '7d80f9932ca79cd40b8d26fff477dfd21c799cc99703c120b6d999e16ee76b88693a03118422d3a7218f8e067fc1bad443ef35ea8b8b637b02c1e5a5577401af', '2019-06-21', 2019);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_tbl`
--
ALTER TABLE `sales_tbl`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
