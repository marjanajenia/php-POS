-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2022 at 03:16 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `br_id` int(11) NOT NULL,
  `brName` varchar(50) NOT NULL,
  `brLocation` text NOT NULL,
  `brManager` varchar(50) NOT NULL,
  `brPhone` varchar(15) NOT NULL,
  `brEmail` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`br_id`, `brName`, `brLocation`, `brManager`, `brPhone`, `brEmail`, `status`) VALUES
(1, 'Mirpur Branch', 'Mirpur Dhaka-1205', 'Md. Farid', '01720566924', 'farid@gmail.com', 1),
(2, 'Airport Branch', 'Airport Dhaka-1207', 'Amil Ahmed', '01723980402', 'amild@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `com_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `comName` varchar(50) NOT NULL,
  `comAdd` text NOT NULL,
  `comPhone` varchar(20) NOT NULL,
  `comEmail` varchar(50) NOT NULL,
  `comManagerName` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_company`
--

INSERT INTO `tbl_company` (`com_id`, `br_id`, `comName`, `comAdd`, `comPhone`, `comEmail`, `comManagerName`, `status`) VALUES
(1, 2, 'Advance', 'Mirpur Dhaka-1205', '01798765431', 'reya@gmail.com', 'Reya', 1),
(2, 1, 'Bazar kolkata', 'Airport Dhaka-1207', '01798708783', 'mariya@gmail.com', 'Mariya', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `em_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `emDesignation` varchar(20) NOT NULL,
  `emName` varchar(50) NOT NULL,
  `emAdd` text NOT NULL,
  `emNid` int(20) NOT NULL,
  `emPhone` varchar(15) NOT NULL,
  `emEmail` varchar(50) NOT NULL,
  `emJoiningDate` date NOT NULL,
  `emSalary` int(11) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` int(2) NOT NULL COMMENT '1 for active 2 for inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`em_id`, `br_id`, `emDesignation`, `emName`, `emAdd`, `emNid`, `emPhone`, `emEmail`, `emJoiningDate`, `emSalary`, `pass`, `status`) VALUES
(1, 2, 'manager', 'rs', 'dhaka', 98765432, '09876543w2', 'dfgv@gmail.com', '2023-04-21', 987654, '12345', 1),
(2, 1, 'salesman', 'Srabon', 'Brahmonbaria', 2147483647, '017888967r65', 'srabon@gmail.com', '0002-04-21', 20000, '32145', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `pro_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `proBarcode` varchar(50) NOT NULL,
  `proName` varchar(50) NOT NULL,
  `proDes` varchar(255) NOT NULL,
  `proType` varchar(20) NOT NULL,
  `proSize` varchar(20) NOT NULL,
  `proCostPrice` int(11) NOT NULL,
  `proSalePrice` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`pro_id`, `br_id`, `proBarcode`, `proName`, `proDes`, `proType`, `proSize`, `proCostPrice`, `proSalePrice`, `quantity`, `status`) VALUES
(1, 1, '202201', 'T-shirt', 'Man T-shirt', 'Man', 'XL', 1200, 2000, 15, 1),
(2, 1, '202202', 'Panjabi', 'Man Panjabi', 'Man', 'M', 1000, 1800, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_details`
--

CREATE TABLE `tbl_purchase_details` (
  `pur_detail_id` int(11) NOT NULL,
  `br_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `purDate` date NOT NULL,
  `invoiceNumber` varchar(50) NOT NULL,
  `proBarcode` varchar(50) NOT NULL,
  `prPrice` int(11) NOT NULL,
  `purQuantity` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_purchase_details`
--

INSERT INTO `tbl_purchase_details` (`pur_detail_id`, `br_id`, `com_id`, `purDate`, `invoiceNumber`, `proBarcode`, `prPrice`, `purQuantity`, `totalPrice`) VALUES
(1, 1, 2, '2022-05-06', '123', '202201', 1200, 3, 3600),
(2, 1, 2, '2022-05-06', '123', '202201', 1200, 7, 8400),
(3, 1, 2, '2022-05-06', '1234', '202201', 1200, 3, 3600),
(4, 1, 2, '2022-05-06', '1234', '202201', 1200, 3, 3600),
(5, 1, 2, '2022-05-06', '1234', '202201', 1200, 3, 3600),
(6, 1, 2, '2022-05-06', '1234', '202201', 1200, 3, 3600),
(7, 1, 2, '2022-05-06', '1234', '202201', 1200, 3, 3600),
(8, 1, 2, '2022-05-06', '1234', '202201', 1200, 3, 3600),
(9, 1, 2, '2022-05-06', '1234', '202201', 1200, 3, 3600),
(10, 1, 0, '2022-05-06', '456', '202201', 1200, 3, 3600),
(11, 1, 0, '2022-05-06', '456', '202201', 1200, 3, 3600),
(12, 1, 2, '2022-05-06', '456', '202201', 1200, 4, 4800),
(13, 1, 2, '2022-05-06', '456', '202201', 1200, 4, 4800),
(14, 1, 2, '2022-05-06', '456', '202201', 1200, 4, 4800),
(15, 1, 2, '2022-05-06', '456', '202201', 1200, 4, 4800),
(16, 1, 0, '2022-05-05', '987', '202202', 1000, 10, 10000),
(17, 1, 0, '2022-05-05', '12345', '202202', 1000, 2, 2000),
(18, 1, 0, '2022-05-05', '12345', '202202', 1000, 2, 2000),
(19, 1, 2, '2022-05-05', '123456', '202202', 1000, 3, 3000),
(20, 1, 0, '2022-05-05', '12345', '202201', 1200, 3, 3600),
(21, 1, 0, '2022-05-05', '12345', '202201', 1200, 3, 3600),
(22, 1, 0, '2022-05-05', '12345', '202201', 1200, 3, 3600),
(23, 1, 0, '2022-05-05', '12345', '202201', 1200, 3, 3600),
(24, 1, 0, '2022-05-05', '12345', '202201', 1200, 3, 3600),
(25, 1, 0, '2022-05-05', '12345', '202201', 1200, 3, 3600),
(26, 1, 0, '2022-05-06', '098', '202201', 1200, 3, 3600),
(27, 1, 0, '2022-05-06', '098', '202201', 1200, 3, 3600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`em_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  ADD PRIMARY KEY (`pur_detail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_purchase_details`
--
ALTER TABLE `tbl_purchase_details`
  MODIFY `pur_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
