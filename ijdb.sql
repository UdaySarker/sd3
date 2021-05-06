-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 05:55 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ijdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(2) NOT NULL,
  `authorName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `authorName`) VALUES
(1, 'Marjane Satrapi'),
(2, 'Thomas Cahill'),
(3, 'Jodi Picoult'),
(4, 'Scott O\'Dell'),
(5, 'J.K. Rowling'),
(6, 'ঝংকার মাহবুব'),
(8, 'শাহরিয়ার সুবিন'),
(9, 'হুমায়ূন আহমেদ');

-- --------------------------------------------------------

--
-- Table structure for table `bookcategory`
--

CREATE TABLE `bookcategory` (
  `id` int(2) NOT NULL,
  `categoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookcategory`
--

INSERT INTO `bookcategory` (`id`, `categoryName`) VALUES
(1, 'Adventure'),
(2, 'Horror'),
(3, 'Art'),
(4, 'Science Fiction'),
(5, 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(3) NOT NULL,
  `bookTitle` varchar(100) NOT NULL,
  `authorID` int(255) NOT NULL,
  `categoryID` int(2) NOT NULL,
  `bookDesc` varchar(255) DEFAULT NULL,
  `bookPrice` int(10) NOT NULL,
  `bookThumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `bookTitle`, `authorID`, `categoryID`, `bookDesc`, `bookPrice`, `bookThumb`) VALUES
(1, 'Harry Potter And The Goblet Of Fire', 5, 1, 'This description may be from another edition of this product. The fourth book in the beloved Harry Potter series, now illustrated in glorious full color by award-winning artist Jim Kay', 100, 'assets/images/gobletoffire.jpg'),
(2, 'Perfect Match', 3, 3, 'This description may be from another edition of this product. Picoult brings to life a female prosecutor whose cherished family is shattered when she learns that her five-year-old son has been sexually abused.', 150, 'assets/images/perfectmatch.jpg'),
(10, 'কম্পিউটার প্রোগ্রামিং', 8, 5, 'আমার কম্পিউটার প্রোগ্রামিং (যেটি পরবর্তী সময়ে কম্পিউটার প্রোগ্রামিং ১ম খণ্ড নামে প্রকাশ করা হয়) বইটি প্রকাশ হওয়ার পরে দেখতে দেখতে পাঁচ বছরেরও বেশি সময় অতিবাহিত হয়ে গেল। এই সময়ে আরও বেশ কয়েকটি বই লিখলেও কম্পিউটার প্রোগ্রামিং ২য় খণ্ড লেখার কাজ অনেক ধীরগতিতে', 200, 'assets/images/thegildedone.jpg'),
(20, 'Dummy Book', 2, 2, 'Short desc', 180, 'assets/images/thegildedone.jpg'),
(21, 'জোছনা ও জননীর গল্প', 9, 3, 'জোছনা ও জননীর গল্প বাংলাদেশের স্বাধীনতা যুদ্ধের উপর ভিত্তি করে হুমায়ুন আহমেদ রচিত একটি উপন্যাস। মুক্তির মন্দির সোপানতলে কত প্রাণ হলো বলিদান, লেখা আছে অশ্রুজলে। কত বিপ্লবী বন্ধুর রক্তে রাঙা, বন্দিশালার ঐ শিকলভাঙা তারা কি ফিরিবে আর সুপ্রভাতে ? যত তরুণ অরুণ', 190, 'assets/images/josnajononi.jpg'),
(22, 'কৃষ্ণপক্ষ', 9, 3, 'অরু ও মুহিব বর্তমান প্রজম্মের দুই তরুণ তরুণী। হৃদয় জুড়ে আছে তাদের অকৃত্রিম ভালোলাগা ও ভালোবাসা। তাইতো একে অপরের কাছে এসেছে প্রকৃতির নিয়মে খুব সহজেই।টুকরো টুকরো আনন্দময় কিছু মুর্হুত তাদের জীবনে ছিল। সময়ের স্রোতে এগিয়ে গেছে তারা স্থির সিন্ধান্তের দিকে।', 300, 'assets/images/krishnopaksho.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jokes`
--

CREATE TABLE `jokes` (
  `joke_id` int(2) NOT NULL,
  `joke_text` varchar(255) NOT NULL,
  `authorid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jokes`
--

INSERT INTO `jokes` (`joke_id`, `joke_text`, `authorid`) VALUES
(0, 'my first joke and i am laughing', 1),
(1, 'my second joke and i am laughing ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'uday', 'uday', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookcategory`
--
ALTER TABLE `bookcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jokes`
--
ALTER TABLE `jokes`
  ADD PRIMARY KEY (`joke_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bookcategory`
--
ALTER TABLE `bookcategory`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
