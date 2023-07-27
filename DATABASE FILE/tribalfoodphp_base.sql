-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 07:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tribalfoodphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `code` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`, `rs_id`) VALUES
(1, 'admin', 'admin', 'cb.admin@amrita.edu', '', '2023-06-03 13:51:23', 143),
(3, 'MainCanteen', 'maincanteen', 'cb.maincanteen@amrita.edu', '', '2023-05-13 13:20:19', 7),
(4, 'ITCanteen', 'itcanteen', 'cb.itcanteen@amrita.edu', '', '2023-05-13 13:22:40', 8),
(5, 'MBACanteen', 'mbacanteen', 'cb.mbacanteen@amrita.edu', '', '2023-05-13 13:23:34', 9);

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `slogan` varchar(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) NOT NULL,
  `fc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `fc_id` int(11) NOT NULL,
  `fc_name` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remark` mediumtext NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `o_hr` varchar(222) NOT NULL,
  `c_hr` varchar(222) NOT NULL,
  `o_days` varchar(222) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(10, 10, 'Heritage Crafts', '10am', '8pm', 'All Days', 'situated in the main way to Ooty which is approximately 30km from Ooty main town', '64c15bbfca6d1.jpg', '2023-07-26 17:45:35'),
(11, 11, 'Organic Oasis', '10am', '9pm', '24hr-x7', 'Food stall has been planned in Masinagudi village in the Tribal Cooperative Society building', '64c15c473097b.jpg', '2023-07-26 17:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(10, 'Products', '2023-07-26 17:37:19'),
(11, 'food', '2023-07-26 17:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `f_name` varchar(222) NOT NULL,
  `l_name` varchar(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `phone` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `status` int(222) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Academic Program` varchar(222) NOT NULL,
  `Admitted Branch` varchar(222) NOT NULL,
  `Section` varchar(222) NOT NULL,
  `Class Advisor` varchar(222) NOT NULL,
  `Joining Year` int(222) NOT NULL,
  `Gender` varchar(222) NOT NULL,
  `Date of Birth` date DEFAULT NULL,
  `Blood Group` varchar(222) NOT NULL,
  `balance` int(11) NOT NULL,
  `pin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `status`, `date`, `Academic Program`, `Admitted Branch`, `Section`, `Class Advisor`, `Joining Year`, `Gender`, `Date of Birth`, `Blood Group`, `balance`, `pin`) VALUES
(8, 'CB.EN.U4CSE20621', 'Harsha', 'Vardhan', 'tadikonda.shiva@yahoo.com', '9652938412', 'a9b59d7179830e6eecae0ba954503370', 1, '2023-06-02 18:03:48', 'B.Tech', 'Computer Science Engineering (CSE)', 'F', 'Vidhya S', 2020, 'Male', '2003-01-24', 'A+', 15, 1234),
(9, 'CB.EN.U4CSE20611', 'Yash', 'chowta', 'yash@gmail.com', '9502790992', '25d55ad283aa400af464c76d713c07ad', 1, '2023-06-02 18:04:59', 'B.Tech', 'Computer Science Engineering (CSE)', 'F', 'Vidhya S', 2020, 'Male', '2003-01-01', 'O+', 11, 1234),
(39, 'CB.EN.U4CSE20603', 'Deepthi Reddy', 'Alety', 'deepthireddy03@gmail.com', '7894561233', 'fcea920f7412b5da7be0cf42b8c93759', 1, '2023-05-22 19:06:47', 'B.Tech', 'Computer Science Engineering (CSE)', 'F', 'Ramya G R', 2020, 'Female', '2003-07-07', 'B+', 0, 1234),
(40, 'CB.EN.U4CSE20654', 'Priyatha Reddy', 'S L', 'priya@gmail.com', '9573732697', '0b1c8bc395a9588a79cd3c191c22a6b4', 1, '2023-05-22 19:07:12', 'B.Tech', 'Computer Science Engineering (CSE)', 'F', 'Ramya G R', 2020, 'Female', '2002-12-31', 'A+', 0, 1234),
(41, 'CB.EN.U4CSE20639', 'Karthik', 'Mukkanti', 'karthik@gmail.com', '9874563217', '02adcec2263d2127269fcd769c33f029', 1, '2023-05-22 19:07:15', 'B.Tech', 'Computer Science Engineering (CSE)', 'F', 'Ramya G R', 2020, 'Male', '2003-04-08', 'O+', 0, 1234),
(42, 'CB.EN.U4MEE20144', 'Sreedhar', ' Balaji G ', 'sreedhar@gmail.com', '7412589632', '64e1b13a22d3ae8ebf72ec3e2a0eb213', 1, '2023-05-22 19:07:18', 'B.Tech', 'Mechanical Engineering (MEE)', 'A', 'Bhaskar A', 2020, 'Male', '2003-06-28', 'A+', 0, 1234),
(43, 'CB.EN.U4CSE20271', 'Ashish   ', 'Yenepuri ', 'ashish@gmail.com', '8965471235', '7b69ad8a8999d4ca7c42b8a729fb0ffd', 1, '2023-05-22 19:07:21', 'B.Tech', 'Computer Science Engineering (CSE)', 'C', 'Venkat R', 2020, 'Male', '2003-10-03', 'B+', 0, 1234),
(44, 'CB.EN.U4ECE20213', 'Dharun', 'Kumar S', 'dharun@gmail.com', '7894561236', '4ccd8a3d5219d3145fe00f00bc843aec', 1, '2023-05-22 19:07:24', 'B.Tech', 'Electronics and Communication Engineering (ECE)', 'B', 'Goutham C', 2020, 'Male', '2003-08-26', 'O+', 0, 1234),
(45, 'CB.EN.U4ELC20017', 'Saketh', 'Desini', 'saketh@gmail.com', '8523697412', '47097357fa18466c03efe81b056677d0', 1, '2023-05-22 19:07:29', 'B.Tech', 'Electronics & Computers Engineering (ELC)', 'C', 'Bhuvan M', 2020, 'Male', '2003-03-10', 'A+', 0, 1234),
(46, 'CB.EN.U4CSE20143', 'Mahesh Sai', 'Mullapudi', 'mahesh@gmail.com', '7891236548', '49bb197bec17b7d20b2df6b1f3c3434a', 1, '2023-05-22 19:07:31', 'B.Tech', 'Computer Science Engineering (CSE)', 'B', 'Bhagavathi Sivakumar', 2020, 'Male', '2003-02-01', 'O+', 0, 1234);

-- --------------------------------------------------------

--
-- Table structure for table `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rs_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`fc_id`);

--
-- Indexes for table `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Indexes for table `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `fc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
