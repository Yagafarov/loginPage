-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 09, 2023 at 11:22 AM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anodra`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataUser`
--

CREATE TABLE `dataUser` (
  `user_id` int NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `pasport` varchar(10) DEFAULT NULL,
  `jshshr` varchar(15) DEFAULT NULL,
  `descRip` varchar(530) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `telnum` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dataUser`
--

INSERT INTO `dataUser` (`user_id`, `fname`, `lname`, `pasport`, `jshshr`, `descRip`, `img_url`, `telnum`) VALUES
(1, 'Dinmuhammad', 'Yagafarov', 'AB1234567', '12345678912345', 'saDfghlu ktrckudvtlb f fu lftrd lcuj k ib ;ldk7 t', 'qrcode (1).png', 991366488),
(2, 'sdasd', 'molas', 'AB1234567', '12345612312312', 'dasdasd asd asd asd', 'IMG_20210806_170734_826.jpg', 991234567),
(8, 'Munavvar', 'Jumanova', 'AB1234567', '12345678912345', 'ertwn r ergdf ghfg hfg', 'student-with-graduation-cap.png', 991235467),
(9, 'Shohrux', 'Salomov', 'AA1234534', '12345678912345', 'Saakdskf jgkjshdg fskdjfh kshfs d', 'istockphoto-1285083846-170667a-removebg-preview.png', 991231223);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataUser`
--
ALTER TABLE `dataUser`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataUser`
--
ALTER TABLE `dataUser`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
