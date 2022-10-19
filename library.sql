-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 07:32 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_id` int(6) NOT NULL,
  `Title` text NOT NULL,
  `Author` text NOT NULL,
  `Pub_year` year(4) DEFAULT NULL,
  `Quantity` int(4) DEFAULT NULL,
  `Available` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_id`, `Title`, `Author`, `Pub_year`, `Quantity`, `Available`) VALUES
(48, 'Arabian Knights', 'Md bin Salman', 2018, 2, 2),
(58, 'Complete Reference to java', 'Vijay', 2015, 5, 5),
(78, 'Men Who knew Infinity', 'S Ramanujam', 2018, 8, 8),
(145, 'Let Us C', 'Yashwant Kanetkar', 2021, 4, 3),
(146, 'BLACK BOOK', 'TAMAL DEY', 2021, 4, 4),
(147, 'Indian Polity', 'M.Lakshmikant', 2021, 5, 5),
(178, 'Aryabhatta A', 'rahul', 2020, 15, 15),
(878, 'Block Chain', 'Santosh Katti', 2017, 4, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
