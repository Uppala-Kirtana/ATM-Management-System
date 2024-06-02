-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 02, 2024 at 10:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myatm`
--

-- --------------------------------------------------------

--
-- Table structure for table `atm`
--

CREATE TABLE `atm` (
  `atm_id` int(11) NOT NULL,
  `atm_bal` int(11) NOT NULL,
  `one` int(11) NOT NULL,
  `two` int(11) NOT NULL,
  `five` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `atm_cdt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atm`
--

INSERT INTO `atm` (`atm_id`, `atm_bal`, `one`, `two`, `five`, `status`, `atm_cdt`) VALUES
(1, 22000, 30, 30, 26, '1', '2024-02-09 06:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `u_acc`
--

CREATE TABLE `u_acc` (
  `a_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `withdraw` int(11) DEFAULT NULL,
  `ftransfer` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `cdt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `u_acc`
--

INSERT INTO `u_acc` (`a_id`, `u_id`, `withdraw`, `ftransfer`, `deposit`, `status`, `cdt`) VALUES
(1, 1, 100, NULL, NULL, '1', '2024-02-05 14:54:04'),
(2, 1, 100, NULL, NULL, '1', '2024-02-05 14:54:08'),
(3, 1, 100, NULL, NULL, '1', '2024-02-05 14:54:11'),
(4, 1, 100, NULL, NULL, '1', '2024-02-05 14:54:14'),
(5, 4, 50000, NULL, NULL, '1', '2024-02-05 14:55:17'),
(6, 1, NULL, 500, NULL, '1', '2024-02-05 15:45:22'),
(7, 1, 500, NULL, NULL, '1', '2024-02-05 16:10:03'),
(8, 1, NULL, 500, NULL, '1', '2024-02-05 16:11:24'),
(9, 1, NULL, 500, NULL, '1', '2024-02-05 17:07:02'),
(10, 1, NULL, 500, NULL, '1', '2024-02-05 17:07:58'),
(11, 1, NULL, 500, NULL, '1', '2024-02-05 17:12:01'),
(12, 1, NULL, 500, NULL, '1', '2024-02-05 17:19:48'),
(13, 1, NULL, 500, NULL, '1', '2024-02-05 17:20:37'),
(14, 1, NULL, 500, NULL, '1', '2024-02-05 17:21:19'),
(15, 1, NULL, 100, NULL, '1', '2024-02-05 17:22:57'),
(16, 1, NULL, 100, NULL, '1', '2024-02-05 17:24:53'),
(17, 1, NULL, 100, NULL, '1', '2024-02-05 17:27:34'),
(18, 1, NULL, 100, NULL, '1', '2024-02-05 17:29:15'),
(19, 1, NULL, 900, NULL, '1', '2024-02-05 17:31:08'),
(20, 1, 700, NULL, NULL, '1', '2024-02-05 17:31:49'),
(21, 1, NULL, NULL, 600, '1', '2024-02-05 18:13:23'),
(22, 1, NULL, NULL, 1400, '1', '2024-02-05 18:13:38'),
(23, 1, 5000, NULL, NULL, '1', '2024-02-05 18:15:57'),
(24, 1, 10000, NULL, NULL, '1', '2024-02-05 18:21:50'),
(25, 1, NULL, 10000, NULL, '1', '2024-02-05 18:22:46'),
(26, 1, NULL, 10000, NULL, '1', '2024-02-05 18:23:32'),
(27, 1, NULL, NULL, 30000, '1', '2024-02-05 18:25:19'),
(28, 1, NULL, NULL, 5000, '1', '2024-02-05 18:25:25'),
(29, 1, NULL, 5000, NULL, '1', '2024-02-05 18:33:13'),
(30, 1, NULL, 100, NULL, '1', '2024-02-05 18:33:42'),
(31, 1, NULL, 100, NULL, '1', '2024-02-05 18:34:01'),
(32, 1, NULL, NULL, 5200, '1', '2024-02-05 18:34:17'),
(33, 4, NULL, NULL, 3800, '1', '2024-02-05 18:35:30'),
(34, 1, 5000, NULL, NULL, '1', '2024-02-06 06:56:38'),
(35, 1, NULL, 5000, NULL, '1', '2024-02-06 07:00:56'),
(36, 1, NULL, NULL, 5000, '1', '2024-02-06 07:02:30'),
(37, 1, 5000, NULL, NULL, '1', '2024-02-06 08:47:21'),
(38, 1, 5000, NULL, NULL, '1', '2024-02-06 08:50:45'),
(39, 1, 5000, NULL, NULL, '1', '2024-02-06 08:50:52'),
(40, 1, 100, NULL, NULL, '1', '2024-02-06 08:54:35'),
(41, 1, 100, NULL, NULL, '1', '2024-02-06 08:54:42'),
(42, 1, 100, NULL, NULL, '1', '2024-02-06 09:05:11'),
(43, 1, 100, NULL, NULL, '1', '2024-02-06 09:33:06'),
(44, 1, 100, NULL, NULL, '1', '2024-02-06 09:36:24'),
(45, 1, 500, NULL, NULL, '1', '2024-02-06 09:37:37'),
(46, 1, 100, NULL, NULL, '1', '2024-02-06 09:45:02'),
(47, 1, 100, NULL, NULL, '1', '2024-02-06 09:45:58'),
(48, 1, 100, NULL, NULL, '1', '2024-02-06 09:46:58'),
(49, 1, 100, NULL, NULL, '1', '2024-02-06 09:48:05'),
(50, 1, 100, NULL, NULL, '1', '2024-02-06 09:49:03'),
(51, 1, 100, NULL, NULL, '1', '2024-02-06 09:49:26'),
(52, 1, 100, NULL, NULL, '1', '2024-02-06 09:50:29'),
(53, 1, 100, NULL, NULL, '1', '2024-02-06 09:51:09'),
(54, 1, 100, NULL, NULL, '1', '2024-02-06 09:51:44'),
(55, 1, NULL, 100, NULL, '1', '2024-02-06 09:56:33'),
(56, 1, NULL, 100, NULL, '1', '2024-02-06 10:02:15'),
(57, 1, 100, NULL, NULL, '1', '2024-02-06 15:07:01'),
(58, 1, NULL, 100, NULL, '1', '2024-02-06 15:08:06'),
(59, 1, NULL, NULL, 100000000, '1', '2024-02-06 15:08:28'),
(60, 1, 100, NULL, NULL, '1', '2024-02-06 15:19:58'),
(61, 1, 100, NULL, NULL, '1', '2024-02-06 15:24:52'),
(62, 1, 100, NULL, NULL, '1', '2024-02-06 15:36:35'),
(63, 1, NULL, 100, NULL, '1', '2024-02-06 15:37:27'),
(64, 1, NULL, 100, NULL, '1', '2024-02-06 17:37:34'),
(65, 1, 300, NULL, NULL, '1', '2024-02-06 17:37:51'),
(66, 1, NULL, NULL, 5000, '1', '2024-02-06 17:40:00'),
(67, 1, 5000, NULL, NULL, '1', '2024-02-06 17:56:03'),
(68, 4, 500, NULL, NULL, '1', '2024-02-06 18:15:35'),
(69, 4, NULL, 500, NULL, '1', '2024-02-06 18:16:35'),
(70, 4, 500, NULL, NULL, '1', '2024-02-06 18:17:11'),
(71, 4, NULL, NULL, 500, '1', '2024-02-06 18:17:50'),
(72, 1, 100, NULL, NULL, '1', '2024-02-07 05:48:36'),
(73, 1, NULL, 900, NULL, '1', '2024-02-07 05:49:42'),
(74, 1, NULL, NULL, 1000, '1', '2024-02-07 05:50:20'),
(75, 1, NULL, 100, NULL, '1', '2024-02-07 05:52:35'),
(76, 1, NULL, NULL, 100, '1', '2024-02-07 05:53:00'),
(77, 1, 500, NULL, NULL, '1', '2024-02-07 07:07:19'),
(78, 1, 10, NULL, NULL, '1', '2024-02-07 07:10:19'),
(79, 1, NULL, 51, NULL, '1', '2024-02-07 07:13:56'),
(80, 1, NULL, 6, NULL, '1', '2024-02-07 07:14:44'),
(81, 1, NULL, NULL, 1500, '1', '2024-02-07 07:15:36'),
(82, 1, 400, NULL, NULL, '1', '2024-02-07 11:55:35'),
(83, 1, 400, NULL, NULL, '1', '2024-02-07 12:00:26'),
(84, 1, 400, NULL, NULL, '1', '2024-02-07 12:05:23'),
(85, 1, 400, NULL, NULL, '1', '2024-02-07 12:09:17'),
(86, 1, 200, NULL, NULL, '1', '2024-02-07 12:29:42'),
(87, 1, 500, NULL, NULL, '1', '2024-02-07 12:45:01'),
(88, 1, 1000, NULL, NULL, '1', '2024-02-07 12:47:19'),
(89, 1, 500, NULL, NULL, '1', '2024-02-07 15:15:55'),
(90, 1, 800, NULL, NULL, '1', '2024-02-07 15:16:28'),
(91, 1, 1000, NULL, NULL, '1', '2024-02-07 15:16:49'),
(92, 1, 1000, NULL, NULL, '1', '2024-02-07 15:19:01'),
(93, 1, 100, NULL, NULL, '1', '2024-02-07 15:51:50'),
(94, 1, 100, NULL, NULL, '1', '2024-02-07 15:58:19'),
(95, 1, 200, NULL, NULL, '1', '2024-02-07 16:00:27'),
(96, 1, 1000, NULL, NULL, '1', '2024-02-07 16:11:04'),
(97, 1, NULL, 1000, NULL, '1', '2024-02-07 16:37:01'),
(98, 1, NULL, NULL, 9000, '1', '2024-02-07 16:45:57'),
(99, 1, 800, NULL, NULL, '1', '2024-02-07 17:19:38'),
(100, 1, 100, NULL, NULL, '1', '2024-02-07 17:29:41'),
(101, 1, NULL, 900, NULL, '1', '2024-02-07 17:30:23'),
(102, 1, NULL, NULL, 1600, '1', '2024-02-07 17:31:04'),
(103, 1, NULL, 800, NULL, '1', '2024-02-07 17:31:31'),
(104, 1, NULL, NULL, 1000, '1', '2024-02-07 17:31:42'),
(105, 1, NULL, 1000, NULL, '1', '2024-02-07 17:32:16'),
(106, 1, NULL, NULL, 1000, '1', '2024-02-07 17:32:26'),
(107, 1, 100, NULL, NULL, '1', '2024-02-08 06:50:12'),
(108, 1, NULL, NULL, 100, '1', '2024-02-08 06:50:31'),
(109, 1, NULL, 100, NULL, '1', '2024-02-08 06:51:05'),
(110, 1, NULL, 100, NULL, '1', '2024-02-08 07:05:10'),
(111, 1, 6000, NULL, NULL, '1', '2024-02-08 07:15:11'),
(112, 1, NULL, NULL, 2000, '1', '2024-02-08 07:16:41'),
(113, 1, NULL, 500, NULL, '1', '2024-02-08 07:19:15'),
(114, 1, 500, NULL, NULL, '1', '2024-02-08 12:37:28'),
(115, 1, 10000, NULL, NULL, '1', '2024-02-08 12:54:42'),
(116, 1, 700, NULL, NULL, '1', '2024-02-08 12:55:03'),
(117, 1, NULL, 300, NULL, '1', '2024-02-08 13:00:41'),
(118, 1, NULL, 1000, NULL, '1', '2024-02-08 13:06:46'),
(119, 1, NULL, 700, NULL, '1', '2024-02-08 13:07:52'),
(120, 1, NULL, NULL, 2700, '1', '2024-02-08 13:08:46'),
(121, 1, NULL, 5000, NULL, '1', '2024-02-08 17:26:41'),
(122, 1, NULL, 1000, NULL, '1', '2024-02-08 17:29:43'),
(123, 1, 4000, NULL, NULL, '1', '2024-02-08 17:30:26'),
(124, 1, NULL, NULL, 10000, '1', '2024-02-08 17:41:10'),
(125, 1, NULL, 8000, NULL, '1', '2024-02-08 17:42:37'),
(126, 1, 2000, NULL, NULL, '1', '2024-02-09 06:37:18'),
(127, 1, NULL, 5000, NULL, '1', '2024-02-09 06:43:18'),
(128, 1, NULL, 100, NULL, '1', '2024-02-09 06:43:42'),
(129, 1, NULL, NULL, 5000, '1', '2024-02-09 06:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `u_login`
--

CREATE TABLE `u_login` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_pass` varchar(255) NOT NULL,
  `u_acc` varchar(255) NOT NULL,
  `u_pin` int(11) NOT NULL,
  `acc_type` enum('C','S') NOT NULL,
  `acc_bal` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `u_login`
--

INSERT INTO `u_login` (`u_id`, `u_name`, `u_email`, `u_pass`, `u_acc`, `u_pin`, `acc_type`, `acc_bal`, `status`) VALUES
(1, 'Rahul Kumar', 'rahul@gmail.com', 'pass', 'IN123456789', 1234, 'S', 45000, '1'),
(2, 'Priya Sharma', 'priya@gmail.com', 'securepass456', 'IN987654321', 5678, 'C', 75000, '1'),
(3, 'Amit Patel', 'amit@gmail.com', 'pass@word789', 'IN456789012', 9876, 'S', 100000, '1'),
(4, 'Sneha Gupta', 'sneha@gmail.com', 'secure123', 'IN654321098', 4321, 'C', 150000, '1'),
(5, 'Vikram Singh', 'vikram@gmail.com', 'strongpass789', 'IN012345678', 8765, 'S', 80000, '1'),
(6, 'Neha Verma', 'neha@gmail.com', 'pass456', 'IN234567890', 3456, 'S', 60000, '1'),
(7, 'Raj Kapoor', 'raj@gmail.com', 'secret789', 'IN345678901', 6789, 'C', 90000, '1'),
(8, 'Preeti Singh', 'preeti@gmail.com', 'securepass789', 'IN456789012', 7890, 'S', 120000, '1'),
(9, 'Aarav Gupta', 'aarav@gmail.com', 'pass123', 'IN567890123', 8901, 'C', 70000, '1'),
(10, 'Simran Malhotra', 'simran@gmail.com', 'strongpass789', 'IN678901234', 9012, 'S', 95000, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atm`
--
ALTER TABLE `atm`
  ADD PRIMARY KEY (`atm_id`);

--
-- Indexes for table `u_acc`
--
ALTER TABLE `u_acc`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `u_login`
--
ALTER TABLE `u_login`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atm`
--
ALTER TABLE `atm`
  MODIFY `atm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `u_acc`
--
ALTER TABLE `u_acc`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `u_login`
--
ALTER TABLE `u_login`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
