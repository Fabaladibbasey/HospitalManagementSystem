-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2022 at 01:02 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospitalManagementSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fname` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fname`, `lname`, `email`, `phone`, `message`, `date`) VALUES
(2, 'Fabala', 'Dibbasey', 'fabaladibbasey27@gmail.com', '3539005', 'Second message', '2022-02-18 06:02:48'),
(3, 'lamin', 'fofona', 'fofona@gmail.com', '9876', 'some comments added', '2022-02-19 01:02:26'),
(4, 'annonymous', 'annony', 'annony@gmail.com', '0000', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam error natus deserunt reiciendis! Repellendus, sit rem rerum, laudantium temporibus nam necessitatibus magni officiis eius consectetur corporis. Molestias sapiente sint tempora animi a magni iste ratione magnam, aliquid quasi dolorum? Quia vel magnam blanditiis nulla repudiandae pariatur fuga saepe voluptas, laborum, officia recusandae. Obcaecati perferendis libero hic iusto aspernatur, voluptate quisquam! Error sint perspiciatis, repellendus consequatur placeat est praesentium quos, sed accusantium, ea itaque nemo ad porro nulla magnam qui tempore nam fugiat minus obcaecati eligendi dolorum. Sequi cumque optio commodi provident atque culpa et at reprehenderit obcaecati dolor alias quas, maxime rerum quisquam debitis odit ab a modi! Voluptate totam aperiam assumenda, voluptatibus molestiae quam voluptatum exercitationem corrupti minima illum, tempora eius veritatis perspiciatis placeat distinctio architecto quaerat iste error voluptas earum commodi, corporis inventore vitae? Illo, eius earum ab nemo alias provident blanditiis esse tempore porro adipisci ipsa quasi hic accusamus aliquid magnam. Deserunt facere impedit deleniti magnam animi provident sint praesentium ipsum quibusdam! Sequi odio nobis, fuga quo illo, nisi ipsam quidem distinctio quibusdam dicta rem ut quia reprehenderit nostrum officia maxime consectetur quaerat molestias totam architecto sed doloremque ducimus alias. Dolores itaque neque animi necessitatibus reiciendis id?', '2022-02-19 01:02:55'),
(6, 'Fabala', 'Dibbasey', 'fabaladibbasey27@gmail.com', '3539005', 'Hello from viewers', '2022-02-20 05:02:31'),
(7, 'Fabala', 'Dibbasey', 'fabala27@gmail.com', '900090933', 'Hello from viewers!', '2022-02-20 05:02:21'),
(8, 'Fabala', 'Dibba', 'dibbasey27@gmail.com', '8796087968', 'Hi from fabala and the viewers', '2022-02-20 06:02:30'),
(9, 'Fabala', 'Dibba', 'dibba@gmail.com', '84975455', 'Hello from viewers and I', '2022-02-20 07:02:14'),
(10, 'bala', 'Dibb', 'dibba@gmail.com', '27000987', 'Hello from balla\'s viewers', '2022-02-20 07:02:06'),
(11, 'Fabala', 'Dibbasey', 'fabaladibbasey27@gmail.com', '789697800976', 'some message hi there', '2022-05-26 05:05:14');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fname` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lname` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `specialization` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `enroll_date` datetime NOT NULL,
  `profilePhoto` varchar(2080) COLLATE utf8_unicode_ci NOT NULL DEFAULT './images/myPic-min.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `lname`, `username`, `password`, `email`, `specialization`, `salary`, `enroll_date`, `profilePhoto`) VALUES
(12, 'chatty', 'cham', 'chattyboy', '0001234', 'chattyboy@gmail.com', 'socery', '700.00', '2022-02-17 04:02:47', './images/myPic-min.jpg'),
(13, 'Muhammed', '', 'Muhammed', '1234', 'muh@gmail.com', 'dressing', '680.88', '2022-02-18 01:02:51', './images/myPic-min.jpg'),
(16, 'Muhammed', 'Sillah', 'ms', '0987', 'ms@gmail.com', 'general', '700.00', '2022-02-19 01:02:20', './images/myPic-min.jpg'),
(17, 'Saikou', 'Jaiteh', 'jaiteh', '00111', 'jaiteh@gmail.com', 'operation', '60000.00', '2022-02-19 01:02:25', './images/myPic-min.jpg'),
(20, 'Habibou', 'Jallow', 'jallow', '1234', 'jallow@gmail.com', NULL, '789.00', '2022-02-20 02:02:28', './images/myPic-min.jpg'),
(21, 'Fabala', 'Dibbasey', 'houseboy@gmail.com', '1234', 'fabaladibbasey27@gmail.com', NULL, '9768.00', '2022-02-20 03:02:31', './images/myPic-min.jpg'),
(22, 'musa', 'jaiteh', 'moses', '1234', 'moses@gmail.com', 'Choose...', '8976.00', '2022-02-20 03:02:34', './images/myPic-min.jpg'),
(23, 'Doctor', 'Dibbasey', 'dibc', '1234', 'dibc@gmail.com', NULL, '97685.00', '2022-02-20 03:02:43', './images/myPic-min.jpg'),
(24, 'mamujara', 'Dibbasey', 'dibc', '1234', 'dibc@gmail.com', 'Doctor', '9876.00', '2022-02-20 04:02:35', './images/myPic-min.jpg'),
(25, 'zulian', 'zuzu', 'zuzu', '1234', 'zulian@gmail.com', 'Choose...', '7896.00', '2022-02-20 05:02:17', './images/myPic-min.jpg'),
(27, 'adam', 'smith', 'Smith', '1234', 'adam@gmail.com', 'Choose...', '78965.00', '2022-02-20 07:02:42', './images/myPic-min.jpg'),
(28, 'lamin', 'jammeh', 'JammehJammeh', '1234', 'lboy@gmail.com', 'Choose...', '7868.00', '2022-02-20 07:02:06', './images/myPic-min.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
