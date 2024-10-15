-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2022 at 04:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'Agraj Adhikari', 'agraj', 'agraj123'),
(3, 'Roshan Karki', 'roshan', 'roshan123');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `oid` int(11) NOT NULL,
  `uid` int(255) NOT NULL,
  `sid` int(255) NOT NULL DEFAULT 0,
  `ordername` text NOT NULL,
  `rname` text NOT NULL,
  `remail` varchar(30) NOT NULL,
  `rphone` varchar(10) NOT NULL,
  `raddress` varchar(20) NOT NULL,
  `weight` int(2) NOT NULL,
  `date` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`oid`, `uid`, `sid`, `ordername`, `rname`, `remail`, `rphone`, `raddress`, `weight`, `date`, `image`, `status`) VALUES
(1, 1, 0, 'Car', 'Roshan Karki', 'roshan@gmail.com', '9845649085', 'Kumroj', 1, '08/10/2022', 'images/acura_PNG129.png', 2),
(2, 5, 2, 'Meat', 'Sabik Bhandari', 'sabik@gmail.com', '9856421354', 'Tandi', 4, '08/23/2022', 'images/deal-img2.png', 4),
(3, 4, 1, 'Vegitables', 'Sanish Poudel', 'sanish@gmail.com', '9874563214', 'Sauraha', 2, '08/08/2022', 'images/home-img.png', 4),
(4, 2, 1, 'Apples', 'Purshuttom Shresth', 'purshuttom@gmail.com', '9874563210', 'Magani', 5, '08/11/2022', 'images/product-7.png', 3),
(5, 6, 0, 'Letter', 'Puspa Silwal', 'puspa@gmail.com', '9874563214', 'Bharatpur', 1, '08/17/2022', 'images/newsletter-bg.jpg', 0),
(6, 3, 0, 'Almod', 'Subash Shrestha', 'subash@gmail.com', '9874563214', 'Kathmandu', 2, '08/11/2022', 'images/product-6.png', 1),
(7, 6, 3, 'Documents', 'Sila Nepal', 'sila@gmail.com', '9874563214', 'Lother', 2, '08/06/2022', 'images/download.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `gender`) VALUES
(1, 'Roshan Karki', 'roshan21', '11223344', 'roshan21@gmail.com', '9865354145', 'khairahani-13Gawai', 'Male'),
(2, 'Sabik Bhandari', 'sabik20', '11223344', 'sabik20@gmail.com', '9845762145', 'Ratnagartandi', 'Male'),
(3, 'Shristy Thapa', 'shristy23', '11223344', 'shristy23@gmail.com', '9896541235', 'ParsaChitwan', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
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

INSERT INTO `user` (`id`, `name`, `username`, `password`, `email`, `phone`, `address`, `gender`) VALUES
(1, 'Diwas Basnet', 'diwas21', '11112222', 'diwas21@gmail.com', '9874563214', 'khairahani-13Gawai', 'Male'),
(2, 'Sudarshan Uprety', 'sudarshan22', '11112222', 'sudarshan22@gmail.com', '9874563214', 'Chitwan,Parsa', 'Male'),
(3, 'Manjesh Rayamahji', 'manjesh23', '11112222', 'manjesh23@gmail.com', '9874563321', 'ParsaChitwan', 'Male'),
(4, 'Aditiya Adhikari', 'aditiya23', '11112222', 'aditiya23@gmail.com', '9865421365', 'Tandi', 'Male'),
(5, 'Kumar Chaudhary', 'kumar20', '11112222', 'kumar20@gmail.com', '9874563214', 'Budauli', 'Male'),
(6, 'Soniya Bartaula', 'soniya21', '11112222', 'soniya21@gmail.com', '9874563214', 'Bhandara', 'Female'),
(7, 'Kabin Chaudhary', 'kabin20', '11112222', 'kabin20@gmail.com', '9874563214', 'kabin20@gmail.com', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courier`
--
ALTER TABLE `courier`
  ADD CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
