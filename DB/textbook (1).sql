-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 09:28 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `textbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade1`
--

CREATE TABLE `grade1` (
  `bookid` int(11) NOT NULL,
  `bookimage` varchar(100) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `price` float(100,2) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade1`
--

INSERT INTO `grade1` (`bookid`, `bookimage`, `bookname`, `price`, `quantity`, `status`) VALUES
(5, '2.jpg', 'ssss', 0.00, 3, 'Available'),
(7, '1.jpg', 'estrada', 0.00, 4, ''),
(8, '4.jpg', 'math', 0.00, 5, 'Available'),
(10, '6.jpg', 'sample', 400.00, 123, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `purchaseid` int(11) NOT NULL,
  `bookid` int(100) NOT NULL,
  `bookimage` varchar(100) NOT NULL,
  `idnumber` varchar(100) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `purchaseqty` int(100) NOT NULL,
  `totalprice` float(100,2) NOT NULL,
  `dates` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateofreceiveing` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`purchaseid`, `bookid`, `bookimage`, `idnumber`, `bookname`, `purchaseqty`, `totalprice`, `dates`, `dateofreceiveing`, `status`) VALUES
(8, 2, '', '15731698', 'Math', 1, 0.00, '0000-00-00 00:00:00', '0000-00-00', 'approve'),
(9, 4, '', '15731698', 'Filipino', 1, 0.00, '0000-00-00 00:00:00', '0000-00-00', 'pending'),
(10, 4, '', '14680573', 'Filipino', 3, 0.00, '2019-10-15 16:00:00', '0000-00-00', 'approve'),
(11, 2, '', '17928375', 'Math', 3, 0.00, '2019-10-22 16:00:00', '0000-00-00', 'approve');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(1, 'Samsung J2 Pro', '1.jpg', 100.00),
(2, 'HP Notebook', '2.jpg', 299.00),
(3, 'Panasonic T44 Lite', '3.jpg', 125.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idnumber` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idnumber`, `password`, `fname`, `lname`, `grade`, `user_type`) VALUES
('14680573', 'estrada', 'Kenneth', 'Estrada', '2', ''),
('15731698', 'golo', 'Adriano', 'Golo', '3', ''),
('17928375', 'hortelano', 'Lowell', 'Hortelano', '2', ''),
('17944133', 'manatad', 'Michael Rey', 'Manatad', '1', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade1`
--
ALTER TABLE `grade1`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idnumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade1`
--
ALTER TABLE `grade1`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
