-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 02:37 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

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
  `grade` int(100) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `price` float(100,2) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade1`
--

INSERT INTO `grade1` (`bookid`, `bookimage`, `grade`, `bookname`, `author`, `price`, `quantity`, `status`) VALUES
(16, '51ZgF3gupDL._SX374_BO1,204,203,200_.jpg', 11, 'English', 'Michael Rey Manatad', 250.00, 16, 'Available'),
(17, '51jvzh-wZeL._SX258_BO1,204,203,200_.jpg', 11, 'Filipino', 'Adriano Golo', 300.00, 20, 'Available'),
(18, '4913-0309051991-450.jpg', 12, 'Geography', 'Kenneth Jay Estrada', 350.00, 25, 'Available'),
(19, '91bgXrAry7L.jpg', 12, 'Noli Me TÃ¡ngere', 'Jose Rizal', 400.00, 50, 'Available'),
(20, '6450562.jpg', 12, 'El Filibusterismo', 'Jose Rizal', 400.00, 40, 'Available'),
(21, 'download.jpg', 11, 'Math ', 'Michael Rey Manatad', 350.00, 44, 'Available'),
(22, '81wz87p6zwL.jpg', 12, 'History', 'Teodoro Agoncillo', 300.00, 33, 'Available');

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
  `dates` date NOT NULL DEFAULT current_timestamp(),
  `dateofreceiveing` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`purchaseid`, `bookid`, `bookimage`, `idnumber`, `bookname`, `purchaseqty`, `totalprice`, `dates`, `dateofreceiveing`, `status`) VALUES
(21, 17, '', '15731698', 'Filipino', 2, 600.00, '2020-01-20', '0000-00-00', 'approve'),
(22, 16, '', '14680573', 'English', 4, 1000.00, '2020-01-20', '0000-00-00', 'approve'),
(23, 16, '51ZgF3gupDL._SX374_BO1,204,203,200_.jpg', '14680573', 'English', 5, 1250.00, '2020-01-30', '0000-00-00', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idnumber` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idnumber`, `password`, `fname`, `lname`, `email`, `grade`, `user_type`) VALUES
('14680573', 'estrada', 'Kenneth', 'Estrada', '', '2', ''),
('15731698', 'golo', 'Adriano', 'Golo', '', '3', ''),
('17928375', 'hortelano', 'Lowell', 'Hortelano', '', '2', ''),
('17944133', 'manatad', 'Michael Rey', 'Manatad', '', '1', 'admin');

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
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
