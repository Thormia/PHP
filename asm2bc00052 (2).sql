-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 07:27 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asm2bc00052`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `ID` int(200) NOT NULL,
  `ProductName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `OrderID` int(200) NOT NULL,
  `Price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`ID`, `ProductName`, `OrderID`, `Price`) VALUES
(1, 'Design Va     ', 68, 900),
(2, 'Design K ', 85, 3090000),
(3, 'Design H', 77, 5650000),
(4, 'Design M', 85, 2759900),
(5, 'Design O', 97, 9000074),
(6, 'Design B', 4, 30090000),
(13, 'Design Veveve', 145, 995),
(16, 'Design A', 36, 2147483647),
(22, 'Design B', 40, 1000000000);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(255) NOT NULL,
  `UserName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateOut` date NOT NULL,
  `Address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total Price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `UserName`, `DateOut`, `Address`, `Phone number`, `Total Price`) VALUES
(1, 'BTEC     ', '2022-11-16', '11A Green Street, LA     ', '0958475136     ', 785695479),
(2, 'Pearson', '2022-11-19', '12B White Street, London', '0478569258', 14785620),
(3, 'Alice B', '2022-11-29', '298K Red Street, London   ', '0718584751   ', 6090000),
(4, 'htnp00052', '2022-11-14', '70/69 CMT8, Can Tho', '0916198548', 30090000),
(40, 'User123', '2022-12-02', 'A123 BC street, LA', '0558966874', 1000000000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` double NOT NULL,
  `Image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` varchar(50) NOT NULL,
  `Status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Name`, `Price`, `Image`, `Description`, `Status`) VALUES
('Design A', 859875426987, 'image/1669814002 as.png', 'First Item', 'Available'),
('Design B', 1000000000, 'image/1669812635 designA.png', 'Suitale for teenagers', 'Available'),
('Design D', 7777777777, 'image/1669812819 designc.png', 'New Arrive!', 'Available'),
('Design E', 745896258, 'image/1669813465 designE.png', 'Nike and Nice', 'Available'),
('Design F', 1258963, 'image/1669815601 hehehe.png', 'You will love it', 'Available'),
('Design H', 85988855, 'image/1669815367 designH.png', 'Appropriate for Sporty person', 'Available'),
('Design K', 8999987558, 'image/1669815452 designK.png', 'Old style', 'Available'),
('Design M', 77945896, 'image/1669815548 Ldesign.pgn.jpg', 'Your lady will love it', 'Available'),
('Example', 2000, 'image/1669985147 cach-lam-banh-tai-yen.jpg', 'This is example for adding', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `supportrequirement`
--

CREATE TABLE `supportrequirement` (
  `ID` int(200) NOT NULL,
  `Time` date NOT NULL,
  `PhoneNumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supportrequirement`
--

INSERT INTO `supportrequirement` (`ID`, `Time`, `PhoneNumber`, `Email`, `Status`, `Description`) VALUES
(1, '2022-11-01', '058965412', 'huynh.namphuong0003040@gmail.com', 'no', 'can\'t login'),
(2, '2022-11-10', '087456920', 'daomaixuandi@conechxanhxanh.com', 'no', 'forget my password'),
(3, '2022-11-26', '06589176', 'alice0510189@gmail.com', 'yes', 'Can\'t change the username'),
(9, '2022-12-02', '0916198548', 'phuonghtnBC00052@fpt.edu.vn', 'no', 'Need more ancient item');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Full Name` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Banking` varchar(50) NOT NULL,
  `Authority` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Full Name`, `Phone`, `Address`, `Banking`, `Authority`) VALUES
('BC00052  ', 'B783B007  ', 'Huynh Tran Nam Phuong', '0895142684  ', '13B Red Street, London  ', 'Fx051754225  ', 'Customer'),
('BTEC ', 'A123B005 ', 'Alex ShiohYu', '0775145685 ', '11A Green Street, LA ', 'Fx0512541155', 'Customer'),
('example2', '987654321', ' This IS EXAM', ' 0555896549', ' AK street, Can Tho', ' Ak05896874', 'Customer'),
('hehe', 'heheheheheh', 'Ohiyo Nihao', '8895', 'Momo street, Califonia', 'Ma089579547', 'Customer'),
('htnp00052', 'bc00052Aa@', 'Wan An', '0916198548', '70/69 CMT8, Can Tho', '1013399410', 'Customer'),
('Lavaa', '123456A@aLOadmin', 'Lavia Mika', '0998578', 'ASK street, Vung Tau', 'Om084759875', 'Customer'),
('LavaAdmin', 'Lavaadmin123', ' Wiliam Moki', '09178547895', 'ABC Street, Ho Chi Minh', 'Mk0588789', 'Admin'),
('User123', '123456789', 'Alixe Karma', '0558966874', 'A123 BC street', 'Fx0512541155', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Name`);

--
-- Indexes for table `supportrequirement`
--
ALTER TABLE `supportrequirement`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `supportrequirement`
--
ALTER TABLE `supportrequirement`
  MODIFY `ID` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
