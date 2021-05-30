-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 06:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `content` varchar(1000) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`bid`, `username`, `created_at`, `content`, `title`) VALUES
(8, 'test1', '2021-05-27 00:07:12', 'hello this is a sample blog for testing purposes.', 'title'),
(9, 'test1', '2021-05-27 12:09:41', 'Clarification on the MAX_FILE_SIZE hidden form field:\r\n\r\nPHP has the somewhat strange feature of checking multiple \"maximum file sizes\".\r\n\r\nThe two widely known limits are the php.ini settings \"post_max_size\" and \"upload_max_size\", which in combination impose a hard limit on the maximum amount of data that can be received.\r\n\r\nIn addition to this PHP somehow got implemented a soft limit feature. It checks the existance of a form field names \"max_file_size\" (upper case is also OK), which should contain an integer with the maximum number of bytes allowed. If the uploaded file is bigger than the integer in this field, PHP disallows this upload and presents an error code in the $_FILES-Array.\r\n\r\nThe PHP documentation also makes (or made - see bug #40387 - http://bugs.php.net/bug.php?id=40387) vague references to \"allows browsers to check the file size before uploading\". This, however, is not true and has never been. Up til today there has never been a RFC proposing the usage of such named f', 'hello ');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `bid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `cid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`bid`, `username`, `comment`, `created_at`, `cid`) VALUES
(9, 'Madhav', 'hello', '2021-05-28 21:21:40', 2),
(9, 'Madhav', 'ok', '2021-05-28 22:06:13', 3),
(9, 'Madhav', 'comment2', '2021-05-28 22:58:28', 4),
(8, 'Madhav', 'hello', '2021-05-28 23:14:14', 5),
(8, 'Madhav', 'hello', '2021-05-28 23:14:21', 6),
(9, 'Madhav', 'ok', '2021-05-28 23:14:56', 7),
(8, 'Madhav', 'test', '2021-05-28 23:15:11', 8);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `feedback` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `email`, `name`, `feedback`) VALUES
(1, 'sample@gmail.com', 'Madhav', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `created_at`, `status`) VALUES
(28, 'Madhav', '2021-05-27 16:01:43', 0),
(29, 'John', '2021-05-27 16:03:07', 0),
(30, 'Madhav', '2021-05-27 16:06:14', 0),
(31, 'Madhav', '2021-05-27 16:06:35', 0),
(32, 'Madhav', '2021-05-27 16:07:00', 0),
(33, 'John', '2021-05-27 16:07:17', 0),
(34, 'David', '2021-05-27 16:08:25', 0),
(35, 'Madhav', '2021-05-27 17:39:52', 0),
(37, 'admin', '2021-05-28 23:23:43', 0),
(38, 'Madhav', '2021-05-28 23:31:44', 0),
(39, 'Madhav', '2021-05-29 00:10:24', 0),
(40, 'admin', '2021-05-29 00:15:47', 0),
(41, 'Madhav', '2021-05-29 10:35:26', 0),
(42, 'admin', '2021-05-29 10:36:49', 0),
(43, 'Madhav', '2021-05-29 10:37:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usercourse`
--

CREATE TABLE `usercourse` (
  `UID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `Course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercourse`
--

INSERT INTO `usercourse` (`UID`, `username`, `Course`) VALUES
(12, 'test1', 'html'),
(14, 'test1', 'javascript'),
(15, 'test1', 'python'),
(16, 'Madhav', 'html'),
(17, 'Madhav', 'javascript');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `profilepic` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `contact`, `email`, `country`, `city`, `address`, `created_at`, `profilepic`) VALUES
(3, 'Madhav', '123456', 2147483647, 'madhav@yahoo.com', 'India', 'Mumbai', 'Street 1', '2021-05-27 16:01:37', NULL),
(4, 'John', '123456', 2147483647, 'sample2@gmail.com', 'India', 'kolkata', 'street 3', '2021-05-27 16:02:58', NULL),
(5, 'David', '123456', 2147483647, 'sample3@gmail.com', 'India', 'chennai', 'street5', '2021-05-27 16:08:17', NULL),
(6, 'admin', '123456', 2147483647, 'sample@gmail.com', 'India', 'bangalore', 'street3', '2021-05-28 23:23:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercourse`
--
ALTER TABLE `usercourse`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `usercourse`
--
ALTER TABLE `usercourse`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
