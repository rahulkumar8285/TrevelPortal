-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 04:06 PM
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
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` int(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `mobile`, `status`) VALUES
(1, 'admin kumar', 'admin123@gmail.com', '12345admin', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cab`
--

CREATE TABLE `cab` (
  `cid` int(11) NOT NULL,
  `carname` varchar(200) NOT NULL,
  `carmodel` varchar(200) NOT NULL,
  `carnumber` varchar(50) NOT NULL,
  `cartype` varchar(50) NOT NULL,
  `rentcost` varchar(50) NOT NULL,
  `fullinc` varchar(50) NOT NULL,
  `carset` varchar(50) NOT NULL,
  `drivetype` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` int(11) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `carinfo` varchar(200) NOT NULL,
  `carrc` varchar(200) NOT NULL,
  `carinsurance` varchar(200) NOT NULL,
  `documnet` varchar(200) NOT NULL,
  `carimg` varchar(200) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `selleremail` varchar(200) NOT NULL,
  `adddate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cab`
--

INSERT INTO `cab` (`cid`, `carname`, `carmodel`, `carnumber`, `cartype`, `rentcost`, `fullinc`, `carset`, `drivetype`, `address`, `city`, `state`, `zip`, `carinfo`, `carrc`, `carinsurance`, `documnet`, `carimg`, `sellerid`, `selleremail`, `adddate`) VALUES
(1, 'Toyota Fortuner', 'M4*4', 'kl456nj', '2', '4500', '0', '6', '1', 'Example Any Testing Work Part And Testing.', 'New Delhi', 9, '110063', 'Testing Demo Any test', 'document9.pdf', 'document10.pdf', 'document11.pdf', 'carimg.png', 2, 'rahulkumar828515@gmail.com', '01-Jun-2021');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hid` int(11) NOT NULL,
  `hotelid` varchar(50) NOT NULL,
  `hotelname` varchar(500) NOT NULL,
  `hotelconnum` varchar(50) NOT NULL,
  `hoteladd` varchar(500) NOT NULL,
  `nearlandmark` varchar(50) NOT NULL,
  `state` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `hotelinfo` longtext NOT NULL,
  `facilites` varchar(100) NOT NULL,
  `imgname` varchar(50) NOT NULL,
  `img0` varchar(50) NOT NULL,
  `img1` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `img3` varchar(50) NOT NULL,
  `img4` varchar(50) NOT NULL,
  `sellerid` int(11) NOT NULL,
  `rooms` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hid`, `hotelid`, `hotelname`, `hotelconnum`, `hoteladd`, `nearlandmark`, `state`, `city`, `zip`, `hotelinfo`, `facilites`, `imgname`, `img0`, `img1`, `img2`, `img3`, `img4`, `sellerid`, `rooms`) VALUES
(1, 'Dl45', 'Demo Hotel Working Test', '22503656', 'social media Login Link Google and Facebook . payment intergate : - card and scan base  mail offer,', 'Amth', 9, 'new delhi', '110059', 'social media Login Link Google and Facebook . payment intergate : - card and scan base mail offer,                                                                ', '0 ,1 ,2 ,3 ,4 ,5 ,6 ,7', 'restaurant-7.jpg', '19.jpg', '95.jpg', '43.jpg', '95.jpg', '24.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rid` int(11) NOT NULL,
  `roomtype` int(11) NOT NULL,
  `norooms` int(11) NOT NULL,
  `noadults` int(11) NOT NULL,
  `nochild` int(11) NOT NULL,
  `facilites` varchar(50) NOT NULL,
  `hotleinfo` text NOT NULL,
  `selecthotel` int(11) NOT NULL,
  `demoprice` float NOT NULL,
  `mainprice` float NOT NULL,
  `copecode` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `sellerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rid`, `roomtype`, `norooms`, `noadults`, `nochild`, `facilites`, `hotleinfo`, `selecthotel`, `demoprice`, `mainprice`, `copecode`, `status`, `sellerid`) VALUES
(1, 0, 2, 2, 4, '0 1 2', 'social media Login Link Google and Facebook .\r\npayment intergate : - card and scan base \r\nmail offer,', 1, 4500, 3500, 'MK45', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `password` varchar(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `address` varchar(500) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `adharfile` varchar(200) NOT NULL,
  `penfile` varchar(200) NOT NULL,
  `bankfile` varchar(200) NOT NULL,
  `profile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id`, `fullname`, `email`, `number`, `password`, `status`, `address`, `city`, `state`, `zip`, `adharfile`, `penfile`, `bankfile`, `profile`) VALUES
(1, 'aakash kumar', 'rakesh123@gmail.com', '7894561235', '1235admin', 1, 'house no z33 gali no 5', 'new delhiq', '9', '110059', 'document.pdf', 'document1.pdf', 'document2.pdf', 'person_1.jpg'),
(2, 'aakash kumar', 'rahulkumar828515@gmail.com', '9874563214', '1235admin', 1, 'house no z33 gali no 5 deppa', 'new delhiq', '9', '110059', 'document3.pdf', 'document4.pdf', 'document5.pdf', 'person_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(11) NOT NULL,
  `state` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `state`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA'),
(40, 'KERALA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cab`
--
ALTER TABLE `cab`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `state` (`state`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hid`),
  ADD UNIQUE KEY `hotelid` (`hotelid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
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
-- AUTO_INCREMENT for table `cab`
--
ALTER TABLE `cab`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cab`
--
ALTER TABLE `cab`
  ADD CONSTRAINT `cab_ibfk_1` FOREIGN KEY (`state`) REFERENCES `state_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
