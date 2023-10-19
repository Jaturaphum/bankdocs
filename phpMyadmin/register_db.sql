-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2023 at 10:11 AM
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
-- Database: `register_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `listbanks`
--

CREATE TABLE `listbanks` (
  `num_ID` int(11) NOT NULL,
  `IDstudent` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `balance` decimal(12,2) NOT NULL,
  `deposit` int(11) DEFAULT NULL,
  `withdraw` int(11) DEFAULT NULL,
  `datatime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listbanks`
--

INSERT INTO `listbanks` (`num_ID`, `IDstudent`, `username`, `balance`, `deposit`, `withdraw`, `datatime`) VALUES
(1, '6440200373', 'admin', '1000.00', 500, 0, '2023-10-19 07:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `IDstudent` varchar(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `balance` decimal(12,2) NOT NULL,
  `datatime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `IDstudent`, `email`, `username`, `password`, `balance`, `datatime`) VALUES
(1, 'admin', 'admin', '6440200373', 'admin@gmail.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '0.00', '2023-10-19 07:53:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listbanks`
--
ALTER TABLE `listbanks`
  ADD PRIMARY KEY (`num_ID`,`IDstudent`) USING BTREE,
  ADD UNIQUE KEY `IDstudent` (`IDstudent`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`IDstudent`,`username`) USING BTREE,
  ADD UNIQUE KEY `IDstudent` (`IDstudent`,`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listbanks`
--
ALTER TABLE `listbanks`
  MODIFY `num_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listbanks`
--
ALTER TABLE `listbanks`
  ADD CONSTRAINT `listbanks_ibfk_1` FOREIGN KEY (`IDstudent`) REFERENCES `users` (`IDstudent`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
