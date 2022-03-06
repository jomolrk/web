-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2022 at 11:37 AM
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
-- Database: `hotel_book_proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `room_booking_reuests`
--

CREATE TABLE `room_booking_reuests` (
  `rbook_id` int(50) NOT NULL,
  `rbook_uid` int(50) NOT NULL,
  `rbook_fullname` varchar(500) NOT NULL,
  `rbook_age` varchar(500) NOT NULL,
  `rbook_contactno` varchar(500) NOT NULL,
  `rbook_address` varchar(500) NOT NULL,
  `rbook_email_id` varchar(500) NOT NULL,
  `rbook_checkin_time` varchar(500) NOT NULL,
  `room_id` int(50) NOT NULL,
  `rbook_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_booking_reuests`
--

INSERT INTO `room_booking_reuests` (`rbook_id`, `rbook_uid`, `rbook_fullname`, `rbook_age`, `rbook_contactno`, `rbook_address`, `rbook_email_id`, `rbook_checkin_time`, `room_id`, `rbook_status`) VALUES
(40, 9, 'Jomol', '36', '321654987', 'Kerala Main Home', 'jomol12@gmail.com', 'Night', 6, 'cancelled'),
(41, 9, 'Jomol', '26', '7894561230', 'Alapuzha', 'jomol12@gmail.com', 'Evening', 6, 'accepted'),
(42, 9, 'Jomol', '19', '9518476230', 'Kerala', 'jomol12@gmail.com', 'Night', 6, 'pending'),
(43, 9, 'Jomol', '50', '8529637410', 'Alapuzha, Kerala', 'jomol12@gmail.com', 'Evening', 6, 'pending'),
(44, 10, 'Salini', '20', '9638527410', 'my house', 'salini2000@gmail.com', 'Morning', 6, 'accepted'),
(45, 10, 'Salini', '24', '8529637412', 'Salini VIlla', 'salini2000@gmail.com', 'Evening', 6, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `room_id` int(50) NOT NULL,
  `room_cat_type` varchar(500) NOT NULL,
  `room_cat_feature` varchar(500) NOT NULL,
  `room_cat_rate` varchar(500) NOT NULL,
  `room_count` int(50) NOT NULL,
  `room_cat_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`room_id`, `room_cat_type`, `room_cat_feature`, `room_cat_rate`, `room_count`, `room_cat_img`) VALUES
(1, 'Standard Room', 'Small Size Bed, TV, basic essentials', '2,000', 15, '../1.jpg'),
(2, 'Guest Room', '1 Medium Size Bed, TV, Wash Room, Basic Essentials, Room Service', '2,400', 10, '../2.jpg'),
(3, 'Superior Room', '1 Large Sized Bed, Free Parking, TV, Wash Room, Room Service, Laundry Service', '2,850', 10, '../3.jpg'),
(4, 'Super Deluxe', '2 Large Sized Bed, Dry Cleaning Service, Free Parking, TV, Wash Room, Laundry Service, Free Wifi', '5,000', 5, '../4.jpg'),
(5, 'Junior Suite', '1 Large Sized Bed, Dry Cleaning Service, TV, Laundry Service, Free Wifi, Telecom, etc', '5,300', 5, '../5.jpg'),
(6, 'Executive Suite', '2 Large Sized Bed, Dry Cleaning Service, TV, Laundry Service, Free Wifi, Telecom, Free Parking, TV, Wash Room, House Keeping, etc', '6,000', 5, '../6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_fullname` varchar(200) NOT NULL,
  `user_emailid` varchar(200) NOT NULL,
  `user_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_emailid`, `user_password`) VALUES
(9, 'Jomol', 'jomol12@gmail.com', 'Jomol@1234'),
(10, 'Salini', 'salini2000@gmail.com', 'Salini@2000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `room_booking_reuests`
--
ALTER TABLE `room_booking_reuests`
  ADD PRIMARY KEY (`rbook_id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `room_booking_reuests`
--
ALTER TABLE `room_booking_reuests`
  MODIFY `rbook_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `room_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
