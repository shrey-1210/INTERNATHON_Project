-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 03:25 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `addr_point`
--

CREATE TABLE `addr_point` (
  `addr_id` varchar(200) NOT NULL,
  `latitude` varchar(36) NOT NULL,
  `longitude` varchar(36) NOT NULL,
  `address` varchar(500) NOT NULL,
  `postcode` int(20) NOT NULL,
  `order_number` varchar(20) NOT NULL,
  `timeline_id` int(10) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `district` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addr_point`
--

INSERT INTO `addr_point` (`addr_id`, `latitude`, `longitude`, `address`, `postcode`, `order_number`, `timeline_id`, `url`, `district`, `state`) VALUES
('1_1', '27.93969989759416', '77.84293348933154', 'justdifferent', 202138, '1', 1, 'https://www.google.com/maps/place/27.939196+77.842445/@27.939196,77.842445,17z', 'aligarh', 'U.P'),
('1_2', '27.93969989759416', '77.84293348933154', 'something address', 202138, '2', 1, 'nothing', 'alag', 'Jalag'),
('1_3', '27.93969989759416', '77.84293348933154', 'fffffffffffffffffff', 202557, '3', 1, 'nothing', 'Salag', 'Malag');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `image` longtext NOT NULL,
  `video` longtext NOT NULL,
  `description` longtext NOT NULL,
  `addr_id` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`image`, `video`, `description`, `addr_id`) VALUES
('media/image.jpg`media/image2.jpg', 'media/video.mp4`media/video2.mp4`', 'This is the description of A Address point', '1_1');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `id` int(30) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `tname` varchar(300) NOT NULL,
  `counter` int(10) NOT NULL,
  `destination` varchar(500) NOT NULL,
  `descp` longtext DEFAULT NULL,
  `uname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`id`, `pname`, `tname`, `counter`, `destination`, `descp`, `uname`) VALUES
(1, 'person_name', 'Masoori', 1, 'destination_name', 'Timeline_description', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(150) NOT NULL,
  `uname` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `uname`, `password`) VALUES
('', '', 'd41d8cd98f00b204e9800998ecf8427e'),
('root', 'root', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addr_point`
--
ALTER TABLE `addr_point`
  ADD PRIMARY KEY (`addr_id`),
  ADD KEY `timeline_id` (`timeline_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`addr_id`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timeline`
--
ALTER TABLE `timeline`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addr_point`
--
ALTER TABLE `addr_point`
  ADD CONSTRAINT `addr_point_ibfk_1` FOREIGN KEY (`timeline_id`) REFERENCES `timeline` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`addr_id`) REFERENCES `addr_point` (`addr_id`);

--
-- Constraints for table `timeline`
--
ALTER TABLE `timeline`
  ADD CONSTRAINT `timeline_ibfk_1` FOREIGN KEY (`uname`) REFERENCES `user` (`uname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
