-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 12:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(20) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`, `pic`) VALUES
(8, 'Admin', 'Admin', 'Admin', 'Admin', 'admin@gmail.com', '09577128141', 'default-profile.png'),
(9, 'Shelly', 'Montreona', 'Shelly679', 'admin221', 'shelly12@gmail.com', '09364718291', 'default-profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `bookname` varchar(50) DEFAULT NULL,
  `bookauthor` varchar(50) DEFAULT NULL,
  `publisher` varchar(50) DEFAULT NULL,
  `edition` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookid`, `bookname`, `bookauthor`, `publisher`, `edition`, `status`, `quantity`, `department`) VALUES
(101, 'Criminology', 'Tim Newburn', 'Goodreads', '1st Edition', 'Available', 2, 'Criminology'),
(331, 'Introduction to Java Programming 1', 'Preps', 'MUTYA', '1st Edition', 'Available', 2, 'Programming'),
(332, 'Introduction to Java Programming 2', 'Preps', 'Mutya', '2nd Edition', 'Available ', 3, 'Programming'),
(641, 'Learning Radiology: Recognizing the Basics', 'William Hearing ', 'Elsevier Health', '1st Edition', 'Available', 5, 'Radiology'),
(991, 'Magnetic Resonance Imaging', 'Strange', 'MUTYA', '1st Edition', 'Available', 3, 'Radiology'),
(1211, 'Surgeon Note', 'Atul Gawande', 'Goodreads', '1st Edition', 'Available', 2, 'Medical'),
(1233, 'Book of Physics', 'Charger', 'MUTYA', '2nd Edition', 'Available', 11, 'Physics'),
(1312, 'The World of Underworld', 'Shanks', 'MUTYA', '1st Edition', 'not available', 0, 'World'),
(1414, 'Introduction to C#: Step by Step', 'Harry H. Cuhary', 'MUTYA', '1st Edition', 'not available', 0, 'Programming'),
(2213, 'Accounting All in One', 'Kenneth Wilson', 'Goodreads', '1st Edition', 'not available', 1, 'Accounting'),
(2214, 'Accounting All in One 2', 'Kenneth Wilson', 'Goodreads', '2nd Edition', 'Available', 1, 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(1) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `username`, `comment`) VALUES
(1, 'Admin', 'Hi! Everyone! :)'),
(2, 'MARK', 'qweee'),
(3, '', 'qweqwe');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `username` varchar(50) DEFAULT NULL,
  `bookid` int(11) DEFAULT NULL,
  `approve` varchar(100) DEFAULT NULL,
  `issue` varchar(100) DEFAULT NULL,
  `book_return` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`username`, `bookid`, `approve`, `issue`, `book_return`) VALUES
('MARK', 1312, 'Expired', '2021-12-03', '2022-01-01'),
('MARK', 2213, 'Returned', '2021-12-03', '2021-12-18'),
('MARK', 101, 'Returned', '2021-12-03', '2021-12-10'),
('MARK', 1414, 'Approve', '2021-12-05', '2022-2-10'),
('MARK', 1233, 'Returned', '2021-12-05', '2021-12-15'),
('marlon', 332, 'Approve', '2022-06-10', '2022-06-20'),
('marlon', 332, 'Approve', '2022-06-10', '2022-06-20'),
('marlon', 331, 'Approve', '2022-12-8', '2023-01-12'),
('MARK', 332, '', '', ''),
('Rounin', 101, 'Approve', '2022-12-03', '2022-12-11'),
('Rounin', 641, '', '', ''),
('Rounin', 1211, 'Returned', '2021-12-03', '2021-12-10'),
('Rounin', 1233, '', '', ''),
('Rounin', 2214, '', '', ''),
('banban', 1233, 'Returned', '2021-12-05', '2021-12-17'),
('banban', 331, 'Approve', '2022-12-06', '2022-12-20'),
('banban', 332, '', '', ''),
('banban', 641, '', '', ''),
('Keeii', 2214, '', '', ''),
('Keeii', 1233, 'Returned', '2021-12-05', '2021-12-17'),
('Keeii', 331, 'Approve', '2022-12-11', '2022-12-22'),
('Prinssuuu', 1312, '', '', ''),
('marlon', 101, '', '', ''),
('oji', 2214, 'Approve', '2022-1-20', '2022-1-25'),
('princee', 2213, 'Approve', '2022-1-22', '2022-1-28'),
('Kenny', 2214, 'Approve', '2022-1-24', '2022-1-29');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `studentid` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`studentid`, `firstname`, `lastname`, `username`, `password`, `email`, `contact`) VALUES
(200351231, 'Prince', 'Nagac', 'oji', 'howdreyou221', 'princenagac12@gmail.com', '092131415'),
(201489239, 'Prince', 'Nagac', 'princee', 'howdreyou221', 'princenagac12@gmail.com', '096565608412'),
(201938499, 'Kenth', 'Balagonsa', 'Kenny', '123', 'kenny@gmail.com', '09241244'),
(2001274821, 'Marlon', 'Quider', 'marlon', 'marlon12345', 'marlonquider@gmail.com', '09957728131'),
(2001491283, 'Christine', 'Gatab', 'christine21', 'gatab123456', 'christine@gmail.com', '09993828191'),
(2004042538, 'Prince', 'Nagac', 'Prinssuuu', 'howdreyou221', 'princenagac12@gmail.com', '09656507412'),
(2014002538, 'Mark', 'Malacat', 'MARK', 'malacat123', 'markmalacat@gmail.com', '09167346084'),
(2014812318, 'John Clerk', 'Jabla', 'Rounin', 'rounin123', 'jclerk@gmail.com', '09977584127'),
(2018512371, 'Shan', 'Sinohon', 'banban', 'banban123', 'banban@gmail.com', '09582731228'),
(2019441231, 'Jad', 'Maglacion', 'JAD', 'jj12345678', 'jadmaglacion@gmail.com', '09663211234'),
(2019857261, 'Kenth', 'Balagonsa', 'Keeii', 'kei1234567', 'kbalagonsa21@gmail.com', '09443718291'),
(2147483647, 'Raymart', 'Tumanda', 'Loki', 'rayart123', 'rtumanda@gmail.com', '09664436367');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`studentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
