-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 09, 2024 at 06:23 PM
-- Server version: 5.7.44
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beroz_MagmaEvents`
--

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `id` int(11) NOT NULL,
  `firstname` tinytext,
  `lastname` tinytext,
  `username` tinytext,
  `password` tinytext,
  `phone` tinytext,
  `rate` tinytext,
  `vacation` tinytext,
  `usertype` tinytext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employees`
--

INSERT INTO `Employees` (`id`, `firstname`, `lastname`, `username`, `password`, `phone`, `rate`, `vacation`, `usertype`) VALUES
(1, 'David', 'Dobrik', 'dd2222', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '610-555-2222', '11.03', '7/20-7/22', 'Server'),
(2, 'Jimmy', 'Donaldson', 'jd5453', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '610-555-5463', '9.45', '7/1-7/3', 'Server'),
(3, 'Tannar', 'Eacott', 'te8495', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '484-555-8495', '10.43', '7/16-7/19', 'Server'),
(4, 'Felix', 'Kjelberg', 'fk9008', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '215-555-9008', '11.23', '7/2, 7/15, 7/26', 'Server'),
(5, 'Liza', 'Koshy', 'lk3392', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '215-555-3392', '11.50', '7/6, 7/9, 7/18', 'Server'),
(6, 'James', 'Vietch', 'jv0948', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '609-555-0948', '11.04', '7/21-7/27', 'Server'),
(7, 'Jenna', 'Marbles', 'jm5445', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '484-555-5445', '10.61', '7/15', 'Server'),
(8, 'Rhett', 'McLaughlin', 'rm4476', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '248-555-4476', '10.22', '7/4-7/8', 'Server'),
(9, 'John', 'Mulaney', 'jm3245', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '717-555-3245', '9.87', '7/17, 7/19, 7/20', 'Server'),
(10, 'Link', 'Neal', 'ln3333', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '267-555-3333', '9.55', '7/15', 'Server'),
(11, 'Lindsey', 'Stirling', 'ls2313', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '215-555-2313', '10.54', NULL, 'Server'),
(12, 'Tyler', 'Toney', 'tt1111', '$2y$10$GpjAAw7fdh7pKBDJVBKtDefdmRkIh2BCJDYSX6ccdutc9BwZVzKKq', '215-555-1111', '10.25', '7/1-7/5', 'Server'),
(13, 'Charli', 'D\'Amelio', 'cd1323', '$2y$10$qv7y5jjk79tea4Qr/9ftBONZ3g251JHoRbCNILZ.HzrHnzDubJxIy', '267-555-1323', '15.37', '7/3-7/6', 'Preparer'),
(14, 'Loren', 'Gray', 'lg1123', '$2y$10$qv7y5jjk79tea4Qr/9ftBONZ3g251JHoRbCNILZ.HzrHnzDubJxIy', '215-555-1123', '15.78', '7/12, 7/16, 7/20', 'Preparer'),
(15, 'Kristen', 'Hancher', 'kh0448', '$2y$10$qv7y5jjk79tea4Qr/9ftBONZ3g251JHoRbCNILZ.HzrHnzDubJxIy', '484-555-0448', '15.25', '7/26-7/31', 'Preparer'),
(16, 'Chase', 'Hudson', 'ch4223', '$2y$10$qv7y5jjk79tea4Qr/9ftBONZ3g251JHoRbCNILZ.HzrHnzDubJxIy', '215-555-4223', '16.02', '7/15-7/20', 'Preparer'),
(17, 'Zach', 'King', 'zk6672', '$2y$10$qv7y5jjk79tea4Qr/9ftBONZ3g251JHoRbCNILZ.HzrHnzDubJxIy', '609-555-6672', '14.55', NULL, 'Preparer'),
(18, 'Spencer', 'Knight', 'sk3340', '$2y$10$qv7y5jjk79tea4Qr/9ftBONZ3g251JHoRbCNILZ.HzrHnzDubJxIy', '610-555-3340', '15.10', '7/22-7/26', 'Preparer'),
(19, 'Ariel', 'Martin', 'am8790', '$2y$10$qv7y5jjk79tea4Qr/9ftBONZ3g251JHoRbCNILZ.HzrHnzDubJxIy', '267-555-8790', '15.44', '7/26', 'Preparer'),
(20, 'Addison', 'Rae', 'ar3524', '$2y$10$qv7y5jjk79tea4Qr/9ftBONZ3g251JHoRbCNILZ.HzrHnzDubJxIy', '610-555-3524', '14.68', '7/7-7/11', 'Preparer'),
(21, 'Vint', 'Cerf', 'vc0000', '$2y$10$0H3AfVqKcwLPGUnZhX3T5ukM0HN4JxyGqZiKHRzSTDH26ywmuN56a', '212-555-0000', NULL, NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `id` int(11) NOT NULL,
  `name` tinytext,
  `address` tinytext,
  `phone` tinytext,
  `administrator` tinytext,
  `email` tinytext,
  `date` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `servers` tinytext,
  `preparers` tinytext
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`id`, `name`, `address`, `phone`, `administrator`, `email`, `date`, `duration`, `servers`, `preparers`) VALUES
(1, 'Comic-Con @ San Diego Convention Center', '111 W. Harbor Drive, San Diego, CA 92101', '619-525-5000', 'Shel Dorf', 'founder@detroitcomics.com', '2024-07-18', 6, 'DD, FK, JMa, RM, LN, TT', 'KH, AM, AR'),
(2, 'E3 @ Los Angeles Convention Center', '1202 S. Figueroa Street, Los Angeles, CA 90015', '213-741-1151', 'Stanley Pierre-Louis', 'ceo@esa.com', '2024-07-09', 5, 'DD, TE, JMa, RM, LN, TT', 'CH, SK, AM'),
(3, 'MegaCon @ Orange County Convention Center', '9800 International Drive, Orlando, FL 32819', '407-685-9800', 'Stan Lee', 'superhero@marvel.com', '2024-07-05', 2, 'JD, TE, JV, JMu, LN, LS', 'LG, KH, AR'),
(4, 'PAX West @ Washington State Convention Center', '705 Pike Street, Seattle, WA 98101', '206-694-5000', 'Jerry Holkins', 'jerryh@pennyarcade.org', '2024-07-20', 3, 'JD, TE, FK, LK, JV, TT', 'KH, SK, AM'),
(5, 'Playlist Live @ World Center Marriot', '8701 World Center Drive, Orlando, FL 32821', '407-239-4200', 'Steve Chen', 'chen@youtube.com', '2024-07-26', 5, 'DD, TE, JMa, JMu, LS, TT', 'CD, CH, AR'),
(6, 'VidCon @ Anaheim Convention Center', '800 W. Katella Avenue, Anaheim, CA 92802', '714-765-8950', 'Bill Gates', 'wmgates@microsoft.com', '2024-07-01', 4, 'DD, FK, LK, RM, JMu, LS', 'CD, CH, ZK'),
(7, 'WOAHX TikTok Conference @ Rio All-Suites Hotel and Casino', '3700 W. Flamingo Road, Las Vegas, NV 89103', '619-546-0621', 'Zhang Yiming', 'founder@tiktok.com', '2024-07-15', 4, 'JD, LK, JV, RM, JMu, LS', 'CD, LG, ZK');

-- --------------------------------------------------------

--
-- Table structure for table `Vacation`
--

CREATE TABLE `Vacation` (
  `id` int(11) NOT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Vacation`
--

INSERT INTO `Vacation` (`id`, `employeeid`, `date`) VALUES
(1, 1, '2024-07-20'),
(2, 1, '2024-07-21'),
(3, 1, '2024-07-22'),
(4, 2, '2024-07-01'),
(5, 2, '2024-07-02'),
(6, 2, '2024-07-03'),
(7, 3, '2024-07-16'),
(8, 3, '2024-07-17'),
(9, 3, '2024-07-18'),
(10, 3, '2024-07-19'),
(11, 4, '2024-07-02'),
(12, 4, '2024-07-15'),
(13, 4, '2024-07-26'),
(14, 5, '2024-07-06'),
(15, 5, '2024-07-09'),
(16, 5, '2024-07-18'),
(17, 6, '2024-07-21'),
(18, 6, '2024-07-22'),
(19, 6, '2024-07-23'),
(20, 6, '2024-07-24'),
(21, 6, '2024-07-25'),
(22, 6, '2024-07-26'),
(23, 7, '2024-07-15'),
(24, 8, '2024-07-04'),
(25, 8, '2024-07-05'),
(26, 9, '2024-07-17'),
(27, 9, '2024-07-19'),
(28, 9, '2024-07-20'),
(29, 10, '2024-07-15'),
(30, 12, '2024-07-01'),
(31, 12, '2024-07-02'),
(32, 12, '2024-07-03'),
(33, 13, '2024-07-03'),
(34, 13, '2024-07-04'),
(35, 13, '2024-07-05'),
(36, 13, '2024-07-06'),
(37, 14, '2024-07-12'),
(38, 14, '2024-07-16'),
(39, 14, '2024-07-20'),
(40, 15, '2024-07-26'),
(41, 15, '2024-07-27'),
(42, 15, '2024-07-28'),
(43, 15, '2024-07-29'),
(44, 15, '2024-07-30'),
(45, 15, '2024-07-31'),
(46, 16, '2024-07-15'),
(47, 16, '2024-07-16'),
(48, 16, '2024-07-17'),
(49, 16, '2024-07-18'),
(50, 16, '2024-07-19'),
(61, 17, '2024-04-04'),
(52, 18, '2024-07-22'),
(53, 18, '2024-07-23'),
(54, 18, '2024-07-24'),
(55, 18, '2024-07-25'),
(56, 18, '2024-07-26'),
(57, 19, '2024-07-26'),
(58, 20, '2024-07-07'),
(59, 20, '2024-07-08'),
(60, 20, '2024-07-09'),
(72, 14, '2024-04-14'),
(71, 14, '2024-04-20'),
(70, 14, '2024-04-17'),
(73, 14, '2024-04-14'),
(74, 15, '2024-04-25'),
(75, 13, '2024-04-11'),
(78, 2, '2024-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `VacationRequests`
--

CREATE TABLE `VacationRequests` (
  `id` int(11) NOT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Workers`
--

CREATE TABLE `Workers` (
  `id` int(11) NOT NULL,
  `event` int(11) DEFAULT NULL,
  `employee` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Workers`
--

INSERT INTO `Workers` (`id`, `event`, `employee`) VALUES
(546, 1, 20),
(556, 1, 11),
(550, 1, 10),
(553, 1, 7),
(543, 2, 13),
(521, 2, 19),
(501, 5, 12),
(547, 1, 2),
(513, 2, 1),
(515, 2, 7),
(516, 2, 8),
(517, 2, 10),
(520, 2, 18),
(549, 1, 8),
(452, 3, 11),
(451, 3, 10),
(442, 6, 9),
(544, 1, 17),
(456, 3, 20),
(453, 3, 14),
(445, 6, 4),
(498, 5, 7),
(514, 2, 3),
(499, 5, 9),
(500, 5, 11),
(454, 3, 15),
(495, 5, 20),
(496, 5, 1),
(497, 5, 3),
(487, 4, 2),
(486, 4, 19),
(490, 4, 6),
(491, 4, 5),
(443, 6, 11),
(485, 4, 18),
(484, 4, 15),
(488, 4, 3),
(206, 6, 1),
(446, 6, 5),
(444, 6, 8),
(489, 4, 4),
(226, 6, 13),
(53, 6, 16),
(54, 6, 17),
(471, 7, 6),
(470, 7, 5),
(466, 7, 13),
(469, 7, 2),
(468, 7, 17),
(467, 7, 14),
(473, 7, 9),
(448, 3, 3),
(450, 3, 9),
(555, 1, 12),
(474, 7, 11),
(548, 1, 9),
(447, 3, 2),
(545, 1, 18),
(492, 4, 12),
(518, 2, 12),
(494, 5, 16),
(472, 7, 8),
(493, 5, 13),
(449, 3, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Vacation`
--
ALTER TABLE `Vacation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `VacationRequests`
--
ALTER TABLE `VacationRequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Workers`
--
ALTER TABLE `Workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Vacation`
--
ALTER TABLE `Vacation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `VacationRequests`
--
ALTER TABLE `VacationRequests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Workers`
--
ALTER TABLE `Workers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
