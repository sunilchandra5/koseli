-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 05:52 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koseli`
--

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `id` int(11) NOT NULL,
  `uid` int(255) NOT NULL,
  `sid` int(255) NOT NULL DEFAULT 0,
  `sname` varchar(20) NOT NULL,
  `semail` varchar(30) NOT NULL,
  `sphone` varchar(10) NOT NULL,
  `saddress` varchar(20) NOT NULL,
  `slocation` varchar(20) NOT NULL,
  `rname` varchar(20) NOT NULL,
  `remail` varchar(30) NOT NULL,
  `rphone` varchar(10) NOT NULL,
  `raddress` varchar(20) NOT NULL,
  `rlocation` varchar(20) NOT NULL,
  `weight` int(2) NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`id`, `uid`, `sid`, `sname`, `semail`, `sphone`, `saddress`, `slocation`, `rname`, `remail`, `rphone`, `raddress`, `rlocation`, `weight`, `date`, `image`, `status`) VALUES
(77, 29, 28, 'roshan', 'roshanbh39@gmai', '9865354145', 'khairahani', '2850', 'diwas', 'diwas@gmail.com', '9845632145', 'kkkkkk', '56256.1', 2, '2022-05-12', 'images/_MG_48921.jpg', 3),
(78, 29, 0, 'roshan', 'roshanbh39@gmai', '9865354145', 'khairahani', '2850', 'sabik', 'diwas@gmail.com', '7453215', 'kkkkkk', '74587', 2, '2022-05-12', 'images/_MG_4903iii.jpg', 2),
(79, 29, 28, 'roshan', 'roshanbh39@gmai', '9865354145', 'khairahani', '2850', 'BHASKAR', 'hari@gmail.com', '9845632145', 'eeeeeee', '56256.1', 2, '2022-05-24', 'images/_MG_48921.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usertype` int(3) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usertype`, `name`, `username`, `password`, `email`, `phone`, `address`, `gender`) VALUES
(1, 0, 'roshan karki', 'admin', 'admin', 'roshan@gmail.co', '9865354145', 'khairahani13', '1'),
(28, 2, 'staff', 'staff1', '111111111', 'ramesh@gmail.com', '985456677', 'parsa', 'Male'),
(29, 1, 'roshann', 'user1', '111111111', 'roshanbh39@gmai.com', '9865354145', 'khairahani', 'Male'),
(34, 2, 'karki', 'staff2', '111111111', 'roshanbh39@gmai', '9854566', 'kapiya', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
