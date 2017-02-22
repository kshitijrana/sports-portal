-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2017 at 08:19 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `revels17`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `ID`) VALUES
('admin', 'admin', 1),
('kshitijrana', 'rana', 2),
('rana', 'rana', 3),
('abcd', 'rana', 4),
('hello', 'rana', 5);

-- --------------------------------------------------------

--
-- Table structure for table `delegates`
--

CREATE TABLE `delegates` (
  `delegate_number` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `regno` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `college` varchar(50) NOT NULL,
  `date_of_creation` datetime NOT NULL,
  `payment` int(11) NOT NULL DEFAULT '1',
  `date_of_payment` datetime NOT NULL,
  `category` varchar(30) NOT NULL DEFAULT 'Sports',
  `organiser_id` int(11) NOT NULL DEFAULT '0',
  `updated_by` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delegates`
--

INSERT INTO `delegates` (`delegate_number`, `name`, `regno`, `email`, `phone`, `college`, `date_of_creation`, `payment`, `date_of_payment`, `category`, `organiser_id`, `updated_by`, `price`) VALUES
(11, 'Amit Alan', '129192192', '223452555', 'aa@gmail.com', 'MIT Manipal', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(12, 'Aloo Kachaloo', '29384888', '567262262', 'ak@gmail.com', 'MIT Manipal', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(13, 'Kshitij Rana', '150905386', '223452555', 'aa@gmail.com', 'MIT Manipal', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(14, 'IDK', 'IDK123456', '223452555', 'aa@gmail.com', 'MIT Manipal', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(15, 'Something', '12434343', '892839283', 'somthing@gmail.', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(16, 'Something ', '389374834', '0398403984', 'sdksd@gmail.com', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(17, 'idk', '12121212', '892839283', 'somthing@gmail.', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(18, 'idk', '5458845', '892839283', 'somthing@gmail.', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(19, 'idk', '434343434', '892839283', 'somthing@gmail.', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(20, 'ghj', '56', '1234567899', 'captain1@gmail.', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(21, 'rdftghj', '2134567', '1234567898', 'vicecaptain@gma', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(22, 'hg', '675', '1234567899', 'captain1@gmail.', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(23, 'hjgf', '786', '1234567899', 'captain1@gmail.', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(24, 'ytfd', '87654', '123456789098765', 'captain1@gmail.', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(25, 'yfhg', '456789', '213456785435678', 'vicecaptain@gma', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(26, 'captain', '2378236872', '1234567890', 'sakak@gmail.com', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200),
(27, 'asdjfsaf', '34343434', '0987654321', 'adads@gmail.com', 'MIT', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', 'Sports', 0, NULL, 200);

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `ID` int(11) NOT NULL,
  `NAME` text NOT NULL,
  `REGNO` varchar(25) NOT NULL,
  `CLG_NAME` text NOT NULL,
  `EMAIL` text NOT NULL,
  `PHONE` varchar(15) NOT NULL,
  `GENDER` text NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(5) NOT NULL,
  `admin_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`ID`, `NAME`, `REGNO`, `CLG_NAME`, `EMAIL`, `PHONE`, `GENDER`, `TIME`, `user_id`, `admin_id`) VALUES
(26, 'Kshitij Rana', '150905386', 'MIT Manipal', 'krana191@gmail.com', '7838859439', 'Male', '0000-00-00 00:00:00', 1, 3),
(27, 'Amit', 'ARH05386', 'College one', 'amit@gmail.com', '9818999911', 'Male', '0000-00-00 00:00:00', 1, 3),
(28, 'Alok Banerjee', '9987HARY', 'alokban@gmail.com', 'alok@gmail.com', '0987678765', 'Male', '0000-00-00 00:00:00', 1, 3),
(29, 'Harry Potter', 'HP998761', 'Hogwarts', 'hp@gmail.com', '9898989898', 'Male', '0000-00-00 00:00:00', 1, 3),
(30, 'Anjelina Jolie', '4434341123', 'Pata nahi', 'patanahi@gmail.com', '1101928273', 'Female', '0000-00-00 00:00:00', 3, 5),
(31, 'Jason Statham', '7654636332', 'School of Transporting', 'js@gmail.com', '4431122323', 'Male', '0000-00-00 00:00:00', 2, 4),
(32, 'kshitij', '5897345897', 'mit', 'krana191@gmail.com', '8374837483', 'male', '2017-02-17 12:16:29', 1, 1),
(33, 'kshitij', '48574985', 'mit', 'krana191@gmail.com', '4734687346', 'male', '2017-02-17 12:17:02', 1, 1),
(34, 'kshitij', '3493843', 'mit', 'krana191@gmail.com', '9834983948', 'male', '2017-02-17 12:28:07', 1, 1),
(35, 'lalalal', 'q3453849', 'mit', 'kaka@gmai.cmo', '8734873845', 'male', '2017-02-17 13:39:41', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TEAM_ID` int(11) NOT NULL,
  `D_ID` int(11) NOT NULL,
  `REGNO` varchar(15) NOT NULL,
  `NAME` text NOT NULL,
  `GENDER` text NOT NULL,
  `SPORT` varchar(15) NOT NULL,
  `PAYMENT` int(1) NOT NULL,
  `user_id` int(5) NOT NULL,
  `admin_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TEAM_ID`, `D_ID`, `REGNO`, `NAME`, `GENDER`, `SPORT`, `PAYMENT`, `user_id`, `admin_id`) VALUES
(41, 26, '150905386', 'Kshitij Rana', 'Male', 'handball', 1, 1, 2),
(21, 27, 'ARH05386', 'Amit', 'Male', 'basketball', 1, 1, 1),
(41, 27, 'ARH05386', 'Amit', 'Male', 'handball', 1, 1, 2),
(138, 28, '9987HARY', 'Alok Banerjee', 'Male', 'basketball', 1, 1, 2),
(139, 29, 'HP998761', 'Harry Potter', 'Male', 'squash', 1, 1, 1),
(142, 30, '4434341123', 'Anjelina Jolie', 'Female', 'badminton', 1, 1, 1),
(55, 31, '7654636332', 'Jason Statham', 'Male', 'football', 1, 1, 1),
(40, 31, '7654636332', 'Jason Statham', 'Male', 'handball', 1, 1, 1),
(139, 31, '7654636332', 'Jason Statham', 'Male', 'squash', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `ID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `ID`) VALUES
('kshitij', 'rana', 1),
('paul', 'rana', 2),
('steve', 'rana', 3),
('bill', 'rana', 4),
('lola', 'rana', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `delegates`
--
ALTER TABLE `delegates`
  ADD PRIMARY KEY (`delegate_number`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`ID`,`user_id`,`admin_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_admin_id` (`admin_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`D_ID`,`SPORT`,`user_id`,`admin_id`),
  ADD KEY `D_ID` (`D_ID`),
  ADD KEY `tfk_user_id` (`user_id`),
  ADD KEY `tfk_admin_id` (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `delegates`
--
ALTER TABLE `delegates`
  MODIFY `delegate_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `fk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `fk_d_id` FOREIGN KEY (`D_ID`) REFERENCES `participant` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `tfk_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tfk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
