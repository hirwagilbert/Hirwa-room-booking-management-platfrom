-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 02:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `Firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `Firstname`, `lastname`, `email`, `password`) VALUES
(1, 'HIRWA', 'Gilbert', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `num_guests` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientid`, `email`, `password`, `check_in_date`, `check_out_date`, `num_guests`, `room_name`) VALUES
(17, 'janvier@gmail.com', 'janvier', '2024-01-02', '2024-01-04', 1, 'room 1'),
(19, 'blandon@gmail.com', 'blandon', '2024-01-16', '2024-01-17', 2, 'room 2'),
(21, 'abayo@gmail.com', 'abayo', '2024-01-18', '2024-01-19', 2, 'room 6');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `managerid` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `idCard` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `cvFile` varchar(255) DEFAULT NULL,
  `blocked` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`managerid`, `fName`, `lName`, `idCard`, `email`, `password`, `phone`, `gender`, `dateOfBirth`, `cvFile`, `blocked`) VALUES
(20, 'UWERA', 'kelia', 12345, 'uwera@gmail.com', 'uwera', '7223473478', 'F', '2004-01-12', 'path/to/uploaded/files/addmanager.php', 1),
(22, 'KAMANA', 'Fils', 5643, 'fils@gmail.com', 'fils', '5432323', 'M', '2002-01-15', 'path/to/uploaded/files/html.css', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `roomid` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `beds` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomid`, `photo`, `name`, `category`, `price`, `beds`) VALUES
(25, 'r1.jpeg', 'room 1', 'double ', 3455, 2),
(26, 'r2.jpeg', 'room 2', 'suite', 12432, 2),
(27, 'r3.jpeg', 'room 3', 'single', 3234, 2),
(28, 'r4.jpeg', 'room 4', 'double', 233, 2),
(29, 'r5.jpeg', 'room 5', 'double', 785, 2),
(30, 'r6.jpeg', 'room 6', 'double', 2332, 3),
(32, 'r8.jpeg', 'room 8', 'double', 21312, 2),
(33, 'r9.jpeg', 'room 9', 'suite', 2324, 2),
(34, 'r10.jpeg', 'room 10', 'double', 23324, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_blocked` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `names`, `email`, `password`, `is_blocked`) VALUES
(1, 'RUKUNDO', 'kevin@gmail.com', 'kevin', 0),
(3, 'janvier cruise', 'janvier@gmail.com', 'janvier', 0),
(5, 'Fils', 'fils@gmail.com', 'fils', 0),
(7, 'ABAYO', 'abayo@gmail.com', 'ABAYO', 0),
(8, 'Fisto kade', 'fisto@gmail.com', 'fisto', 0),
(9, 'valentin', 'valentin@gmai.com', 'valentin', 0),
(10, 'Blandon', 'blandon@gmail.com', 'blandon', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientid`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`managerid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`roomid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `managerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `roomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
