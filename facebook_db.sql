-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 20, 2021 at 10:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_Id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Post_Id` int(11) DEFAULT NULL,
  `Body` varchar(255) NOT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_Id`, `user_id`, `Post_Id`, `Body`, `Date`) VALUES
(17, 3, 27, 'good', '2021-07-20 21:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Post_Id` int(11) NOT NULL,
  `User_Id` int(11) NOT NULL,
  `Body` varchar(250) NOT NULL,
  `Image` varchar(30) NOT NULL,
  `Date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Post_Id`, `User_Id`, `Body`, `Image`, `Date`) VALUES
(26, 2, 'hello from islam \r\ni can post without pic ! \r\nlol ..', '', '2021-07-20 05:28:47'),
(27, 1, 'hello', 'screen.jpg', '2021-07-20 21:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Gender` enum('Female','Male') NOT NULL,
  `Profile_Img` varchar(30) DEFAULT '1.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `fname`, `lname`, `Username`, `Address`, `Email`, `Password`, `Gender`, `Profile_Img`) VALUES
(1, 'islam', 'osama', 'islamheza', 'damitta', 'islam@gmail.com', '123', 'Male', 'islam.jpg'),
(2, ' islam', ' heza', 'islam', 'damitta ', ' islamo.heza@gmail.com', '123', 'Male', '2.png'),
(3, ' hamada', ' ali', 'hamada', 'cairo ', ' ploto.eg@gmail.com', '123', 'Male', '1.png'),
(4, ' hamada', ' ali', 'hamada', 'cairo ', ' ploto.eg@gmail.com', '123', 'Male', '1.png'),
(5, ' Islam osama', ' Mohamed', 'semo', 'Damittaa - El Roda ', ' eng.islam1001@gmail.com', '123', 'Male', 'screen03.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_Id`,`user_id`),
  ADD KEY `fk_foreign_post_id` (`Post_Id`),
  ADD KEY `fk_foreign_users_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Post_Id`,`User_Id`),
  ADD KEY `fk_foreign_user_id` (`User_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Post_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_foreign_post_id` FOREIGN KEY (`Post_Id`) REFERENCES `posts` (`Post_Id`),
  ADD CONSTRAINT `fk_foreign_users_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`User_Id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_foreign_user_id` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
