-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 03:10 PM
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
-- Database: `attedance_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendee`
--

CREATE TABLE `attendee` (
  `Attendee_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `dateofbirth` date NOT NULL,
  `phone_number` varchar(10) NOT NULL,
  `Email_address` varchar(100) NOT NULL,
  `PASS` varchar(20) NOT NULL,
  `Avatar` varchar(25) NOT NULL,
  `Category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendee`
--

INSERT INTO `attendee` (`Attendee_id`, `firstname`, `lastname`, `dateofbirth`, `phone_number`, `Email_address`, `PASS`, `Avatar`, `Category`) VALUES
(1, 'molly', 'maseno', '0000-00-00', '0729674563', 'masenomolly1@gmail.com', '123', '', 1),
(2, 'rob', 'okoth', '2020-12-03', '0792783657', 'robokoth@gmail.com', '1q23', '', 1),
(14, 'timothy', 'muthama', '1951-07-04', '0723440442', 'muthama@gmail.com', '1234r', '231 st jonhs', 2),
(15, 'timo', 'nganga', '2003-01-01', '0723377277', 'timo@kimonyoski.com', '123', '21 rongai', 2),
(23, 'richee', 'riche', '2003-07-01', '073456722', 'richee@gmail.com', '12345', '12 landimawe', 2),
(24, 'rene', 'john', '2005-07-27', '0758207777', 'richee@gmail.com', '12333', '234 ndwaru', 1),
(26, 'rene', 'maish', '1954-03-09', '0758207777', 'kelvingithu019@gmail.com', '1234', '234 ndwaru', 2),
(27, 'johnte', 'maish', '2001-01-01', '0758201234', 'richee@gmail.com', '1234', '21 delmonte', 1),
(28, 'johnte', 'maish', '2003-07-01', '0758207777', 'kelvingithu019@gmail.com', '11234', '12 landimawe', 2),
(29, 'mary', 'poppins', '2009-02-04', '0758201234', 'mary@gmail.com', '2345', '21 delmonte', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendee`
--
ALTER TABLE `attendee`
  ADD PRIMARY KEY (`Attendee_id`),
  ADD KEY `fk_attendee_category` (`Category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendee`
--
ALTER TABLE `attendee`
  MODIFY `Attendee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendee`
--
ALTER TABLE `attendee`
  ADD CONSTRAINT `fk_attendee_category` FOREIGN KEY (`Category`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
