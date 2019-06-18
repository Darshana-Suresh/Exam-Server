-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2019 at 08:07 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.1.17-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `QUESTIONS`
--

CREATE TABLE `QUESTIONS` (
  `qno` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `opt_1` varchar(500) NOT NULL,
  `opt_2` varchar(500) NOT NULL,
  `opt_3` varchar(500) NOT NULL,
  `opt_4` varchar(500) NOT NULL,
  `correct_opt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `QUESTIONS`
--

INSERT INTO `QUESTIONS` (`qno`, `question`, `opt_1`, `opt_2`, `opt_3`, `opt_4`, `correct_opt`) VALUES
(1, '1. An exam was conducted and the following was analyzed. 4 men were able to check some exam papers in 8 days working 5 hours regularly. What is the total number of hours taken by 2 men in 20 days to check double the number of exam papers?', '4 hours', '8 hours', '14 hours', '16 hours', 2),
(2, '2.The banker\'s discount on Rs. 1600 at 15% per annum is the same as true discount on Rs. 1680 for the same time and at the same rate. The time is:', '3 months', '4 months', '6 months', '8 months', 2),
(3, '3. Two pipes A and B can fill a cistern in 37 minutes and 45 minutes respectively. Both pipes are opened. The cistern will be filled in just half an hour, if the B is turned off after: ', '5 min', '9 min', '10 min', '15 min', 2),
(4, '4. There is a tank whose 1/7 th part is filled with fuel. If 22 liters of fuel is poured into the tank, the indicator rises to 1/5 th mark of the tank. So what is the total capacity of the tank?', '370', '375', '377', '385', 4),
(5, '5. Running at the same constant rate, 6 identical machines can produce a total of 270 bottles per minute. At this rate, how many bottles could 10 such machines produce in 4 minutes?', '648', '1800', '2700', '3600', 2),
(6, '6. If VXUPLVH is written as SURMISE, what is SHDVD written as?', 'PBASA\r\n', 'PEBSB\r\n', 'PEASA', 'None of the above', 3),
(7, '7. Find the remainder when (100!)^100 is divided by 23?', '3', '2', '1', '0', 4),
(8, '8. A, B and C jointly thought of engaging themselves in a business venture. It was agreed that A would invest Rs. 6500 for 6 months, B, Rs. 8400 for 5 months and C, Rs. 10,000 for 3 months. A wants to be the working member for which, he was to receive 5% of the profits. The profit earned was Rs. 7400. Calculate the share of B in the profit.', '1900', '2660', '2800', '2840', 2),
(9, '9. In how many possible ways you can write 3240 as a product of 3 positive integers?\r\n', '320\r\n', '420\r\n', '450\r\n', '350', 3),
(10, '10. An old man takes 30 minutes and a young man takes 20 minutes to walk from apartment to office. If one day the old man started at 10.00 AM and the young man at 10:05 AM from the apartment to office, when will they meet?', '10:00', '10:15', '10:30', '10:45', 2);

-- --------------------------------------------------------

--
-- Table structure for table `RollList`
--

CREATE TABLE `RollList` (
  `NAME` varchar(100) NOT NULL,
  `DATE_OF_BIRTH` date NOT NULL,
  `EMAILID` varchar(100) NOT NULL,
  `ROLL_NUMBER` varchar(9) NOT NULL,
  `COLLEGE_NAME` varchar(100) NOT NULL,
  `BRANCH_NAME` varchar(100) NOT NULL,
  `CGPA` float NOT NULL,
  `GRADUATION_YEAR` int(11) NOT NULL,
  `USERNAME` varchar(10) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `marks` int(11) NOT NULL,
  `ATTEMPTED` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RollList`
--

INSERT INTO `RollList` (`NAME`, `DATE_OF_BIRTH`, `EMAILID`, `ROLL_NUMBER`, `COLLEGE_NAME`, `BRANCH_NAME`, `CGPA`, `GRADUATION_YEAR`, `USERNAME`, `PASSWORD`, `marks`, `ATTEMPTED`) VALUES
('Darshana Suresh', '2016-12-30', 'dachusuresh@gmail.com', 'B160373cs', 'NITC', 'Computer Science', 8, 2021, 'dashy', 'darshana', 0, 'No'),
('NAveen Babu', '2019-03-07', 'hello@gmail.com', 'b160184cs', 'NITC', 'Electronics and Communication', 8.5, 2019, 'naveen', 'naveen', 0, 'Yes'),
('Shalini Nath', '2019-03-20', 'shalini@gmail.com', 'B160373cs', 'NITC', 'Computer Science', 8, 2020, 'root', 'root', 1, 'Yes'),
('Vignesh Krishnan', '2019-03-13', 'vig@gmail.com', 'wfwef', 'wefwe', 'Computer Science', 2.34, 2019, 'vicky', 'vicky', 1, 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `QUESTIONS`
--
ALTER TABLE `QUESTIONS`
  ADD PRIMARY KEY (`qno`);

--
-- Indexes for table `RollList`
--
ALTER TABLE `RollList`
  ADD PRIMARY KEY (`EMAILID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
