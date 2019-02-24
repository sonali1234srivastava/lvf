-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2018 at 10:31 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostle_detail`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`) VALUES
(1, 'mona', 'highpackage0805@gmail.com', 'yt'),
(2, 'monali thakur', 'highpackage0805@gmail.com', 'feedback'),
(3, 'shonali thakur', 'sonalisrivastava1234@gmail.com', 'excellent work!!');

-- --------------------------------------------------------

--
-- Table structure for table `leave_detail`
--

CREATE TABLE `leave_detail` (
  `leave_id` int(11) NOT NULL,
  `student_name` text NOT NULL,
  `room_number` int(11) NOT NULL,
  `roll_number` bigint(20) NOT NULL,
  `student_number` varchar(30) NOT NULL,
  `course_branch` text NOT NULL,
  `semester` int(11) NOT NULL,
  `hostel_name` int(11) NOT NULL,
  `leave_period` int(11) NOT NULL,
  `day_from` date NOT NULL,
  `day_to` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `visiting_person_name` text NOT NULL,
  `relation` text NOT NULL,
  `address_contact_number` varchar(255) NOT NULL,
  `applicant_mobile_number` bigint(20) NOT NULL,
  `residence_address_number` varchar(255) NOT NULL,
  `student_signature` varchar(20) NOT NULL,
  `nowdate` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `accept` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_detail`
--

INSERT INTO `leave_detail` (`leave_id`, `student_name`, `room_number`, `roll_number`, `student_number`, `course_branch`, `semester`, `hostel_name`, `leave_period`, `day_from`, `day_to`, `reason`, `visiting_person_name`, `relation`, `address_contact_number`, `applicant_mobile_number`, `residence_address_number`, `student_signature`, `nowdate`, `status`, `accept`) VALUES
(25, 'minakshi', 310, 1602710154, '1610141', 'cse', 5, 3, 2, '2018-10-03', '2018-10-05', 'reason', 'resdfcv', 'rtyfhg', 'yghjbmn', 9818172708, 'tghjb', 'ryfthgnb', '2018-10-02 11:35:00', 1, 0),
(26, 'minakshi', 310, 1602710154, '1610141', 'cse', 5, 3, 2, '2018-10-03', '2018-10-05', 'reason', 'resdfcv', 'rtyfhg', 'yghjbmn', 9818172708, 'tghjb', 'ryfthgnb', '2018-10-02 11:35:00', 1, 1),
(28, 'mina', 310, 1602710154, '1610141', 'cse', 5, 3, 2, '2018-10-03', '2018-10-05', 'reason', 'resdfcv', 'rtyfhg', 'yghjbmn', 9818172708, 'tghjb', 'ryfthgnb', '2018-10-02 11:35:00', 1, 2),
(29, 'sonakshi sinha', 104, 1602710154, '1610141', 'cse', 6, 3, 2, '2018-10-17', '2018-10-21', 'I am home sick', 'papa', 'father', 'rambagh', 9818172708, 'rambagh, 9839282819', 'sonali', '2018-10-27 19:34:00', 1, 1),
(30, 'sonali', 12, 1602710154, '1610141', 'ftg', 5, 2, 2, '2018-10-11', '2018-10-14', 'hjhb', 'hjhj', 'hjbhj', 'hggh', 9818172708, 'gygy', 'gfdr', '2018-10-10 02:38:00', 1, 2),
(31, 'mona', 65, 1602710154, '1610141', 'j', 3, 2, 2, '2018-10-17', '2018-10-19', 'ty', 'tfyhtyyt', 'ytty', 'tfrt', 9818172708, 'ghghj', 'gf', '2018-10-10 02:58:00', 1, 1),
(33, 'sonaliiya', 545, 1602710154, '1610141', 'cse', 5, 2, 1, '2018-10-14', '2018-10-16', 'reason', 'ytfg', 'ygtugtu', 'tgfuf', 9818172708, 'fghhjhj', 'sonal', '2018-10-13 12:59:00', 1, 1),
(34, 'somu', 111, 1602710154, '1610141', 'cse', 5, 2, 2, '2018-10-14', '2018-10-16', 'reason', 'ghgh', 'ghgh', 'ghgh', 9818172708, 'gfghgh', 'somu', '2018-10-13 13:07:00', 1, 1),
(35, 'somya', 103, 1602710154, '1610141', 'cse', 5, 2, 2, '2018-10-14', '2018-10-16', 'reason', 'gygjh', 'hgghgh', 'ghghghjhj', 9818172708, 'ghgjgjv', 'somya', '2018-10-13 13:14:00', 1, 1),
(36, 'motu', 44, 1602710154, '1610141', 'cse', 5, 2, 2, '2018-10-14', '2018-10-17', 'res', 'gg', 'ghgh', 'ghgh', 9818172708, 'gtgy', 'sonalii', '2018-10-13 13:22:00', 1, 2),
(37, 'saurabh', 104, 1602710154, '1610141', 'cse', 5, 2, 2, '2018-10-14', '2018-10-16', 'rtdf', 'gffg', 'hjhj', 'tyygt', 9818172708, 'gygh', 'saurabh', '2018-10-13 13:30:00', 1, 1),
(39, 'bay', 104, 1602710154, '1610141', 'hh', 5, 2, 2, '2018-10-15', '2018-10-17', 'hggh', 'g', 'yuyu', 'yttyt', 9818172708, 'ghjh', 'ghgh', '2018-10-14 13:08:00', 1, 2),
(40, 'bani', 104, 1602710154, '1610141', 'cse', 2, 2, 1, '2018-10-15', '2018-10-16', 'ftgf', 'nbhbnhj', 'hjhbj', 'bbm', 9818172708, 'gghj', 'ghghj', '2018-10-14 13:14:00', 1, 1),
(41, 'MONA', 120, 1602710154, '1610141', 'G', 5, 2, 2, '2018-10-26', '2018-10-29', 'TFY', 'TYF', 'TYF', 'GFT', 9818172708, 'YUF', 'SONALII', '2018-10-26 01:47:00', 1, 2),
(43, 'sonali singh', 104, 1602710154, '1610141', 'cse', 5, 2, 2, '2018-11-04', '2018-11-08', 'diwalii', 'home', 'family', 'hghg', 9818172708, 'ghar', 'sonalii', '2018-11-02 21:13:00', 1, 0),
(44, 'try', 54, 1602710154, '1610141', 'gh', 5, 2, 2, '2018-11-06', '2018-11-13', 'ghjb', 'ftghjb', 'gyhjb', 'gyujhbmn', 9818172808, 'dgfh', 'sonalii', '2018-11-19 21:45:00', 1, 0),
(45, 'Neelam Srivastava', 104, 1602712154, '1610141', 'm-tech', 4, 3, 2, '2018-11-05', '2018-11-07', 'xyz', 'pqr', 'nst', 'ygh', 9998887787, 'fgbn', 'neelam', '2018-11-04 00:07:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE `student_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course` text NOT NULL,
  `branch` text NOT NULL,
  `year` int(11) NOT NULL,
  `username` bigint(20) NOT NULL,
  `password` text NOT NULL,
  `password_again` text NOT NULL,
  `hostel_name` int(11) NOT NULL,
  `room_number` int(11) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `father_name` text NOT NULL,
  `father_number` bigint(20) NOT NULL,
  `verify` int(11) NOT NULL DEFAULT '0',
  `is_email_confirmed` tinyint(4) NOT NULL,
  `token` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`id`, `name`, `number`, `email`, `course`, `branch`, `year`, `username`, `password`, `password_again`, `hostel_name`, `room_number`, `home_address`, `father_name`, `father_number`, `verify`, `is_email_confirmed`, `token`) VALUES
(17, 'sonali', 5646323213, 'sonalisrivastava1234@gmail.com', 'gfdgf', 'gffg', 3, 1602710154, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 2, 0, 'trfhf', 'hgfhgf', 5455656465, 1, 1, ''),
(50, 'sheenal', 9818172708, 'sonalisrivastava000@gmail.com', 'csr', 'cse', 3, 1602710166, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 2, 0, 'home', 'papa', 9718630188, 1, 1, ''),
(51, 'sonu', 9818172708, 'sonalisrivastava000@gmail.com', 'cse', 'cse', 4, 1602710155, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 1, 0, 'home', 'papa', 9718630188, 0, 1, ''),
(52, 'sorsum', 9818172708, 'sonalisrivastava000@gmail.com', 'cse', 'cse', 3, 1602710156, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 1, 0, 'home', 'papa', 9718630188, 0, 1, ''),
(58, 'monakshi', 9818172708, 'sonalisrivastava000@gmail.com', 'cse', 'cse', 2, 1602710191, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 1, 0, 'home', 'father', 9818172708, 0, 1, ''),
(59, 'tyggtyty', 9818172702, 'sonalisrivastava1234@gmail.com', 'gf', 'gf', 1, 1602710195, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 1, 0, 'home', 'gy', 9718630188, 0, 1, ''),
(62, 'sheshu', 9818172708, 'sonalisrivastava000@gmail.com', 'cdr', 'CDR', 3, 1602710188, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 2, 0, 'yug', 'gyt', 9818172708, 1, 1, ''),
(63, 'newa', 9818172787, 'sonalisrivastava1234@gmail.com', 'cse', 'cs', 3, 1602710133, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 3, 104, 'homly', 'papa', 9838252819, 1, 0, ''),
(64, 'new', 9818172708, 'sonalisrivastava1234@gmail.com', 'cse', 'cs', 3, 1602710134, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 3, 108, 'home', 'papa', 9838252819, 1, 0, ''),
(66, 'shubhi', 9818172708, 'sonalisrivastava000@gmail.com', 'b-tech', 'it', 3, 1602713154, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 2, 104, 'gf', 'gyj', 9718630188, 1, 0, 'NUn2ZxqLgt'),
(67, 'rajput', 9718630188, 'sonalisrivastava000@gmail.com', 'b-tech', 'it', 3, 1602713145, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 2, 104, 'gjh', 'gjf', 9839252819, 1, 0, 'F7UxuX2tS9'),
(68, 'neha kakkar', 9818172708, 'sonalisrivastava000@gmail.com', 'b-tech', 'cse', 3, 1602713165, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 1, 104, 'hj', 'bj', 9839252819, 1, 0, 'EtBnhIxRO8'),
(69, 'janvi gupta', 9818172708, 'sonalisrivastava000@gmail.com', 'cse', 'cse', 4, 1602413185, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 1, 104, 'home', 'papa', 9839252819, 0, 0, 'AvFz6iS8Oc'),
(70, 'monal', 9879879878, 'sonalisrivastava1234@gmail.com', 'cse', 'cse', 3, 1602713254, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 1, 123, 'gfgf', 'hhj', 9839252819, 0, 0, ''),
(71, 'Neelam Srivastava', 9839252819, 'minakshisri2017@gmail.com', 'm-tech', 'finance', 2, 1602712154, '40f64f4d4a6c90a706b2cbe09cf557a5', '40f64f4d4a6c90a706b2cbe09cf557a5', 3, 104, 'home', 'papa', 9794186304, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `warden_detail`
--

CREATE TABLE `warden_detail` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `number` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `password_again` text NOT NULL,
  `hostel_name` int(11) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `is_email_confirmed` tinyint(4) NOT NULL,
  `token` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warden_detail`
--

INSERT INTO `warden_detail` (`id`, `name`, `number`, `email`, `username`, `password`, `password_again`, `hostel_name`, `home_address`, `is_email_confirmed`, `token`) VALUES
(10, 'keshbala', 9818172708, 'sonalisrivastava000@gmail.com', 'kesh000', '987e29d8b3d543c47c27ed5a5fe9b964', '987e29d8b3d543c47c27ed5a5fe9b964', 2, 'home', 1, ''),
(11, 'anita', 9818172708, 'sonalisrivastava000@gmail.com', 'anita00', '053d9b133ad2227402b31734ba0fe62c', '053d9b133ad2227402b31734ba0fe62c', 3, 'home', 1, ''),
(23, 'anjali', 9839252819, 'sonalisrivastava000@gmail.com', 'anjali000', 'a482385dfc84d2d3ffcce292bc37c1c7', 'a482385dfc84d2d3ffcce292bc37c1c7', 1, 'home', 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_detail`
--
ALTER TABLE `leave_detail`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `leave_detail_ibfk_1` (`roll_number`);

--
-- Indexes for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`);

--
-- Indexes for table `warden_detail`
--
ALTER TABLE `warden_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `hostel_name` (`hostel_name`),
  ADD KEY `hostle_name` (`hostel_name`),
  ADD KEY `hostle_name_2` (`hostel_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_detail`
--
ALTER TABLE `leave_detail`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `student_detail`
--
ALTER TABLE `student_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `warden_detail`
--
ALTER TABLE `warden_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_detail`
--
ALTER TABLE `leave_detail`
  ADD CONSTRAINT `leave_detail_ibfk_1` FOREIGN KEY (`roll_number`) REFERENCES `student_detail` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
