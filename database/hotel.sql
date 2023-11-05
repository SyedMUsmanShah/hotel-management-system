-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 05:29 AM
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
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `airports`
--

CREATE TABLE `airports` (
  `id` int(11) NOT NULL,
  `Airport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `airports`
--

INSERT INTO `airports` (`id`, `Airport`) VALUES
(1, 'Karachi Airport'),
(2, 'sargodha Airport'),
(3, 'Qata Airport'),
(4, 'Islamabad International Airport, Pakistan'),
(5, 'Multan Airport'),
(6, 'Dubai Airport'),
(7, 'Muree Airport'),
(8, 'Skardu Airport'),
(9, 'Sialkot Airport'),
(10, 'Lahore Airport');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `feature` varchar(255) NOT NULL,
  `faIcon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature`, `faIcon`) VALUES
(1, 'Free Breakfast Included', 'fas fa-coffee');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `id` int(11) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` varchar(18) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `car_pickup` date NOT NULL,
  `adults` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `rate` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `f_name`, `l_name`, `email`, `number`, `check_in`, `check_out`, `car_pickup`, `adults`, `child`, `rooms`, `room_type`, `rate`, `date`) VALUES
(2, 'usman', 'shah', 'usman4588408@gmail.com', '0987654321', '2023-01-14', '2023-01-28', '2023-01-27', 2, 0, 1, '2 Double Beds Non-Smoking', 0, '2023-01-28 16:15:28'),
(4, 'Atiq ur', 'Rehman', 'atiq420@gmail.com', '03010202020', '2023-01-14', '2023-01-28', '2023-01-27', 2, 0, 1, '2 Double Beds Non-Smoking', 1134, '2023-01-28 16:39:59'),
(5, 'Usman', 'Shah', 'usman4588408@gmail.com', '34234432489', '2023-07-13', '2023-07-20', '2023-07-21', 2, 1, 1, '2 Doubles Suite Smk With Free Wifi Free Light Breakfast Mini Refrigerator Microwave', 175, '2023-01-28 16:58:20'),
(6, 'Usman', 'Shah', 'usman4588408@gmail.com', '34234432489', '2023-07-13', '2023-07-20', '2023-07-21', 2, 1, 1, '2 Doubles Suite Smk With Free Wifi Free Light Breakfast Mini Refrigerator Microwave', 175, '2023-01-28 17:06:29'),
(7, 'Usman', 'Shah', 'usman4588408@gmail.com', '03116472511', '2023-07-13', '2023-07-20', '2023-07-21', 1, 1, 1, '2 Doubles Suite Smk With Free Wifi Free Light Breakfast Mini Refrigerator Microwave', 175, '2023-01-29 14:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `hotelfeatures`
--

CREATE TABLE `hotelfeatures` (
  `id` int(11) NOT NULL,
  `feature` varchar(200) NOT NULL,
  `hotelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelfeatures`
--

INSERT INTO `hotelfeatures` (`id`, `feature`, `hotelid`) VALUES
(1, 'Free Breakfast Included', 1),
(4, 'Free Breakfast Included', 4),
(5, 'Free Breakfast Included', 5);

-- --------------------------------------------------------

--
-- Table structure for table `hotelimages`
--

CREATE TABLE `hotelimages` (
  `id` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `hotelid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelimages`
--

INSERT INTO `hotelimages` (`id`, `images`, `hotelid`, `date`) VALUES
(1, '165101940733.jpg', 1, '2023-01-25 16:27:35'),
(2, '165101940862.jpg', 1, '2023-01-25 16:27:35'),
(3, '165101940931.jpg', 1, '2023-01-25 16:27:35'),
(4, '165101941049.jpg', 1, '2023-01-25 16:27:35'),
(12, '136007510368.jpg', 4, '2023-01-31 15:44:15'),
(13, '139446336320.jpg', 4, '2023-01-31 15:44:15'),
(14, '139446336338.jpg', 4, '2023-01-31 15:44:16'),
(15, 'hotel-quality-inn-suites-albany-airport-ny-6pt-picture-11.jpg', 4, '2023-01-31 15:44:16'),
(16, '', 5, '2023-01-31 15:46:38'),
(17, '', 5, '2023-01-31 15:46:38'),
(18, '', 5, '2023-01-31 15:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(200) NOT NULL,
  `distance` varchar(200) NOT NULL,
  `shuttle` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `airport` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `location`, `distance`, `shuttle`, `logo`, `airport`) VALUES
(1, 'Super 8 By Wyndham Latham - Albany Airport', '681 Troy Schenectady Road , LATHAM, NY 12110-2501', '4 Miles from ALB', 'must take taxi', '165101939860.jpg', 'Karachi Airport'),
(4, 'Quality Inn & Suites Albany Airport', '227 Wolf Rd, ALBANY, NY 12205', '2 Miles from ALB', '24 hours', '139446336388.jpg', 'Karachi Airport'),
(5, 'Holiday Inn Express - Newark Airport - Elizabeth, An Ihg Hotel', '681 Troy Schenectady Road , LATHAM, NY 12110-2501', '2 Miles from ALB', '7am-11am', 'minh-pham-HI6gy-p-WBI-unsplash.jpg', 'Karachi Airport');

-- --------------------------------------------------------

--
-- Table structure for table `hotelservices`
--

CREATE TABLE `hotelservices` (
  `id` int(11) NOT NULL,
  `service` varchar(200) NOT NULL,
  `hotelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotelservices`
--

INSERT INTO `hotelservices` (`id`, `service`, `hotelid`) VALUES
(1, 'Free WIFI', 1),
(2, 'Breakfast', 1),
(6, 'Free WIFI', 4),
(7, 'Breakfast', 4),
(8, 'Breakfast', 5),
(9, 'Breakfast', 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `c_name` varchar(200) NOT NULL,
  `c_number` varchar(16) NOT NULL,
  `exp` varchar(100) NOT NULL,
  `cvc` int(4) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `c_name`, `c_number`, `exp`, `cvc`, `address`, `zip`, `guest_id`, `date`) VALUES
(2, 'Syed M Usman Shah', '2147483647', '10-2027', 987, 'ABC house#123', 4000, 2, '2023-01-28 16:15:29'),
(4, 'Atiq Ur Rehman', '2147483647', '08-2039', 415, 'silanwali road sargodga', 40100, 4, '2023-01-28 16:39:59'),
(5, 'Syed M UmarShah', '2147483647', '07-2033', 567, 'Jameel Park Street#7 House#148', 40100, 5, '2023-01-28 16:58:20'),
(6, 'Syed M UmarShah', '5678748737856389', '07-2033', 567, 'Jameel Park Street#7 House#148', 40100, 6, '2023-01-28 17:06:29'),
(7, 'Syed M Usman Shah', '4567899093789234', '07-2027', 987, 'Jameel Park Street#7 House#148', 40100, 7, '2023-01-29 14:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL,
  `rate` int(111) NOT NULL,
  `no_of_rooms` int(11) NOT NULL,
  `season` varchar(40) NOT NULL,
  `hotelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `room`, `rate`, `no_of_rooms`, `season`, `hotelid`) VALUES
(1, '2 Double Beds Non-Smoking', 81, 1, 'Winter', 1),
(2, '1 King Bed Suite Non-Smoking', 88, 1, 'Winter', 1),
(3, '2 Doubles Suite Smk With Free Wifi Free Light Breakfast Mini Refrigerator Microwave', 25, 1, 'Summer', 1),
(4, '2 Double Beds Smk With Free Wifi Free Light Breakfast Ac Bathtub/shower', 200, 1, 'Summer', 1),
(11, '1 King or 2 Double Beds', 119, 5, 'Winter', 4),
(12, '2 Double Beds Non-Smoking', 205, 5, 'Winter', 4),
(13, '1 King or 2 Double Beds', 81, 5, 'Summer', 4),
(14, '2 Double Beds Non-Smoking', 50, 5, 'Summer', 4),
(15, '2 Double Beds Non-Smoking up', 100, 5, 'Summer', 5),
(16, '2 Double Beds Non-Smoking up', 100, 5, 'Summer', 5),
(17, '2 Double Beds Non-Smoking up', 100, 5, 'Summer', 5),
(18, '2 Double Beds Non-Smoking up', 100, 5, 'Summer', 5);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `name`, `start`, `end`) VALUES
(1, 'Winter', '2022-11-01', '2023-03-10'),
(2, 'Summer', '2023-04-01', '2023-09-29'),
(3, 'Spring', '2023-10-01', '2023-10-30'),
(4, 'Christmas', '2023-12-25', '2023-12-30');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `serviceName` varchar(255) NOT NULL,
  `faIcon` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `serviceName`, `faIcon`) VALUES
(1, 'Parking', 'fa fa-car'),
(2, 'Free WIFI', 'fa fa-wifi'),
(3, 'Breakfast', 'fas fa-utensils ');

-- --------------------------------------------------------

--
-- Table structure for table `stars`
--

CREATE TABLE `stars` (
  `id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `hotelid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stars`
--

INSERT INTO `stars` (`id`, `stars`, `hotelid`) VALUES
(1, 3, 1),
(4, 3, 4),
(5, 3, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airports`
--
ALTER TABLE `airports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelfeatures`
--
ALTER TABLE `hotelfeatures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelimages`
--
ALTER TABLE `hotelimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotelservices`
--
ALTER TABLE `hotelservices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stars`
--
ALTER TABLE `stars`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airports`
--
ALTER TABLE `airports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hotelfeatures`
--
ALTER TABLE `hotelfeatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotelimages`
--
ALTER TABLE `hotelimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotelservices`
--
ALTER TABLE `hotelservices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stars`
--
ALTER TABLE `stars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
