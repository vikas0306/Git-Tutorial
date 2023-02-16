-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 11:33 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fresh_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `mc_careers`
--

CREATE TABLE `mc_careers` (
  `id` int(11) NOT NULL,
  `mst_websites_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mc_careers`
--

INSERT INTO `mc_careers` (`id`, `mst_websites_id`, `name`, `email`, `mobile`, `subject`, `message`, `status`, `is_delete`, `created_date`, `modified_date`) VALUES
(1, 1, 'Sumit Kumbhalwar', 'digitalmarketingaskme@gmail.com', '9876543210', 'Work from home', 'Freelancing', 'Active', 'No', '2023-01-18 17:57:02', '2023-01-18 17:57:02'),
(2, 2, 'Kumarjeet Sarkar', 'kumarjeet.sarkar@gmail.com', '8839654376', 'Enquiry ', 'My friend is passionate about tea. I am interested in joining this venture along with my friend.', 'Active', 'No', '2023-01-18 17:57:02', '2023-01-18 17:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `mc_enquiries`
--

CREATE TABLE `mc_enquiries` (
  `id` int(11) NOT NULL,
  `mst_websites_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mc_enquiries`
--

INSERT INTO `mc_enquiries` (`id`, `mst_websites_id`, `name`, `email`, `message`, `mobile`, `status`, `is_delete`, `created_date`, `modified_date`) VALUES
(1, 1, 'yash Singade', 'yash@gmail.com', 'I am interested in talking frenchise, I would like to know what will be the cost of taking frenchise', '9855446622', 'Active', 'No', '2023-01-18 16:37:44', '2023-01-18 16:37:44'),
(2, 2, 'rushikesh thawkar', 'rushi@gmail.com', 'मला महाचाहा ची फ्रांचीसे घ्यायची आहे ..तर मला सगळी माहिती हवी आहे ..तर मला तुम्ही माझ्या मोबाईल नंबर वर कॉल करा.\r\n', '9765555454', 'Active', 'No', '2023-01-18 16:37:44', '2023-01-18 16:37:44'),
(3, 2, 'test', 'test@gmail.com', 'I am interested ', '9875641234', 'Active', 'No', '2023-01-18 17:43:53', '2023-01-18 17:48:01');

-- --------------------------------------------------------

--
-- Table structure for table `mc_franchisee`
--

CREATE TABLE `mc_franchisee` (
  `id` int(11) NOT NULL,
  `mst_websites_id` int(11) NOT NULL,
  `fran_name` varchar(255) NOT NULL,
  `fran_email` varchar(255) NOT NULL,
  `fran_mobile` varchar(255) NOT NULL,
  `fran_city` varchar(255) NOT NULL,
  `fran_comp_reprsnt` varchar(255) NOT NULL,
  `fran_designation` varchar(255) NOT NULL,
  `fran_busi_address` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` enum('Active','Inactuive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mc_franchisee`
--

INSERT INTO `mc_franchisee` (`id`, `mst_websites_id`, `fran_name`, `fran_email`, `fran_mobile`, `fran_city`, `fran_comp_reprsnt`, `fran_designation`, `fran_busi_address`, `message`, `status`, `is_delete`, `created_date`, `modified_date`) VALUES
(1, 1, 'Akshay pawar', 'akshay214@gmail.com', '9664246805', 'Mumbai', 'Test corp', 'Corporate', 'Kamla nagar, solapur, maharashtra', 'Would like to know if you are sailing any  ', 'Active', 'No', '2023-01-18 18:36:28', '2023-01-18 18:36:28'),
(2, 2, 'Vikas Arun Karpe', 'vkarpe35@gmail.com', '9307583434', 'Pune', 'Chintamani sales & marketing', 'Proprietor', 'Shreyas cimena,pune', 'Please provide the details on start to end setup and total', 'Active', 'No', '2023-01-18 18:36:28', '2023-01-18 18:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `mst_websites`
--

CREATE TABLE `mst_websites` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_delete` enum('Yes','No') NOT NULL DEFAULT 'No',
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mst_websites`
--

INSERT INTO `mst_websites` (`id`, `title`, `url`, `is_delete`, `status`, `created_at`, `modified_at`) VALUES
(1, 'Mahachaha.com', 'https://www.mahachaha.com/', 'No', 'Active', '2022-12-01 16:51:35', '2022-12-01 12:21:14'),
(2, 'Mahachai.in', 'https://www.mahachai.in/', 'No', 'Active', '2022-12-01 16:52:34', '2022-12-01 12:21:42'),
(3, 'Mahaconnect App', '', 'No', 'Active', '2022-12-01 16:53:36', '2022-12-01 12:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `sales_feedback`
--

CREATE TABLE `sales_feedback` (
  `id` int(100) NOT NULL,
  `users_id` int(100) NOT NULL,
  `shop_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dateof_visit` date NOT NULL,
  `shop_location` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cleaning_rate` int(10) NOT NULL,
  `employeedress_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_quality` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `client_communication` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `need_todo` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `final_remark` text COLLATE utf8_unicode_ci NOT NULL,
  `over_rating` int(10) NOT NULL,
  `contribution` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `user_type` enum('Admin','Super Admin') DEFAULT 'Admin',
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `show_password` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') DEFAULT 'Active',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `pincode` decimal(6,0) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `gst_no` varchar(255) NOT NULL,
  `pancard_no` varchar(255) NOT NULL,
  `otp` varchar(12) NOT NULL,
  `image` varchar(100) NOT NULL,
  `is_delete` enum('Yes','No') NOT NULL DEFAULT 'No',
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `mobile`, `email`, `dob`, `user_type`, `username`, `password`, `show_password`, `status`, `created_date`, `address`, `city_name`, `state_name`, `pincode`, `company_name`, `gst_no`, `pancard_no`, `otp`, `image`, `is_delete`, `modified_date`) VALUES
(1001, 'Yashwant', '7218456005', 'yash@gmail.com', '1995-09-30', 'Super Admin', 'yash@login', 'a1102957491b9ce5441e111f7725f2fd0201bc32465e2536e5182d1c5e3f6b0965355c09f2c8b9111ab6d18a73b75f0f3a06e788bd2a6dff4ddc7c4da6ada603', 'admin@123', 'Active', '2020-09-01 10:44:00', 'Test', 'test', 'test', '440027', 'test', 'test', 'test', '', '', 'No', '2023-01-16 12:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `users_feedback`
--

CREATE TABLE `users_feedback` (
  `id` int(11) NOT NULL,
  `mst_websites_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `is_delete` enum('Yes','No') NOT NULL DEFAULT 'No',
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mc_careers`
--
ALTER TABLE `mc_careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc_enquiries`
--
ALTER TABLE `mc_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mc_franchisee`
--
ALTER TABLE `mc_franchisee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_websites`
--
ALTER TABLE `mst_websites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_feedback`
--
ALTER TABLE `sales_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_feedback`
--
ALTER TABLE `users_feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mc_careers`
--
ALTER TABLE `mc_careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mc_enquiries`
--
ALTER TABLE `mc_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mc_franchisee`
--
ALTER TABLE `mc_franchisee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_websites`
--
ALTER TABLE `mst_websites`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales_feedback`
--
ALTER TABLE `sales_feedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;

--
-- AUTO_INCREMENT for table `users_feedback`
--
ALTER TABLE `users_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
