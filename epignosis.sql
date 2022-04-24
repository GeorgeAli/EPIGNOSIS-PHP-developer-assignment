-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 12:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epignosis`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `applicationID` int(30) NOT NULL,
  `accountID` int(30) DEFAULT NULL,
  `submitDay` varchar(30) NOT NULL,
  `dateFrom` varchar(30) NOT NULL,
  `dateTo` varchar(30) NOT NULL,
  `reason` varchar(500) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`applicationID`, `accountID`, `submitDay`, `dateFrom`, `dateTo`, `reason`, `status`) VALUES
(0, 1, '2022-04-22', '2022-06-05', '2022-06-25', 'I want to take a trip to Ohio', 'Pending'),
(1, 1, '2021-06-17', '2021-07-17', '2021-07-27', 'I will be moving into a new house and need time to do it', 'Approved'),
(2, 1, '2020-12-13', '2020-12-24', '2021-01-04', 'Christmas vacation', 'Approved'),
(3, 1, '2020-09-28', '2020-09-29', '2020-10-03', 'Need some time of because my mother died', 'Rejected'),
(4, 1, '2020-07-26', '2020-08-06', '2020-08-08', 'I need to take some time off for my birthday party', 'Rejected'),
(5, 3, '2020-07-24', '2020-07-27', '2020-08-07', 'I want to go to Moscow, need some free time. Thanks!', 'Approved'),
(6, 3, '2020-01-05', '2020-01-16', '2020-01-17', 'I am getting married and will need the day off', 'Approved'),
(7, 2, '2020-01-01', '2020-01-05', '2020-01-09', 'I need extra christmas holidays', 'Rejected'),
(8, 2, '2018-12-20', '2019-01-05', '2019-01-09', 'I need extra christmas holidays', 'Approved'),
(9, 2, '2018-06-05', '2018-06-16', '2018-08-29', 'Oops sent the same application twice, sorry!!', 'Rejected'),
(10, 2, '2018-06-05', '2018-06-16', '2018-08-29', 'Summer Vacation requested', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `accountID` int(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `account_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`accountID`, `firstname`, `lastname`, `password`, `email`, `account_type`) VALUES
(0, 'admin', 'admin', 'admin', 'admin@epignosis.admin.com', '1'),
(1, 'George', 'Alivertis', '123567', 'George@epignosis.com', '0'),
(2, 'Panagiotis', 'Anastasiadis', 'Panagiotis', 'Panagiotis@epignosis.com', '0'),
(3, 'Giannis', 'Tzortzakis', 'zsdvdaf', 'Giannis@epignosis.com', '0'),
(4, 'Nikos', 'Stathakis', 'x123xaz', 'Nikos@epignosis.com', '0'),
(5, 'Tasos', 'Karagianopoulos', 'v25cqW', 'Tasos@epignosis.com', '0'),
(6, 'Marios', 'Alivertis', '2V5# 24 5 ', 'Marios@epignosis.com', '0'),
(7, 'Sofia', 'Gounari', ':-)', 'Sofia@epignosis.com', '0'),
(8, 'Maria', 'Gounari', 'empty', 'Maria@epignosis.com', '0'),
(9, 'Eleni', 'Andreou', 'DROP DATABASE', 'Eleni@epignosis.com', '0'),
(10, 'Euthimia', 'Panagiotopoulou', 'admin', 'Euthimia@epignosis.com', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`applicationID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`accountID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
