-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 05:13 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm_sms_gateway_lalita`
--

-- --------------------------------------------------------

--
-- Table structure for table `autoreply`
--

CREATE TABLE `autoreply` (
  `id` int(11) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `autoreply`
--

INSERT INTO `autoreply` (`id`, `code`, `description`, `status`) VALUES
(2, 'C12', 'Checking for status some', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `participants_number` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contact_group`
--

CREATE TABLE `contact_group` (
  `id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gammu`
--

CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(17);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `group_code` varchar(100) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `group_code`, `group_name`, `description`, `status`) VALUES
(2, 'G1', 'Group Family', 'G1s', 1),
(3, 'G2', 'Group F2', 'Group F2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ReceivingDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT -1,
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  `Status` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `outbox`
--

CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `InsertIntoDB` timestamp NOT NULL DEFAULT current_timestamp(),
  `SendingDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text DEFAULT NULL,
  `ReceiverName` varchar(100) DEFAULT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text DEFAULT NULL,
  `Class` int(11) DEFAULT -1,
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT -1,
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT current_timestamp(),
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  `Retries` int(3) DEFAULT 0,
  `Priority` int(11) DEFAULT 0,
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `outbox_multipart`
--

CREATE TABLE `outbox_multipart` (
  `Text` text DEFAULT NULL,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text DEFAULT NULL,
  `Class` int(11) DEFAULT -1,
  `TextDecoded` text DEFAULT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `SequencePosition` int(11) NOT NULL DEFAULT 1,
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error','Reserved') NOT NULL DEFAULT 'Reserved',
  `StatusCode` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `InsertIntoDB` timestamp NOT NULL DEFAULT current_timestamp(),
  `TimeOut` timestamp NOT NULL DEFAULT current_timestamp(),
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `IMSI` varchar(35) NOT NULL,
  `NetCode` varchar(10) DEFAULT 'ERROR',
  `NetName` varchar(35) DEFAULT 'ERROR',
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT -1,
  `Signal` int(11) NOT NULL DEFAULT -1,
  `Sent` int(11) NOT NULL DEFAULT 0,
  `Received` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `IMSI`, `NetCode`, `NetName`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('1123', '2021-06-21 14:24:37', '2021-06-03 12:44:30', '2021-06-03 12:44:30', 'no', 'no', '2342342352342', '9298923890989', 'ERROR', 'ERROR', 'Dodi Novembri', -1, -1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sentitems`
--

CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `InsertIntoDB` timestamp NOT NULL DEFAULT current_timestamp(),
  `SendingDateTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT -1,
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT 1,
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT -1,
  `TPMR` int(11) NOT NULL DEFAULT -1,
  `RelativeValidity` int(11) NOT NULL DEFAULT -1,
  `CreatorID` text NOT NULL,
  `StatusCode` int(11) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `sex` bit(1) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `birth_place`, `religion`, `sex`, `address`, `phone_number`, `password`, `role_id`, `status`) VALUES
(1, 'Dodi Novembri', 'admin@gmail.com', '60b8c5ea21240.jpg', 'Jakarta Barat', 'Islam', b'1', 'Jakarta Barat', '0821835999197', '21232f297a57a5a743894a0e4a801fc3', 0, 0),
(3, 'System Quality Assurance', 'sqa@gmail.com', '60b8bed482f02.png', 'Jakarta Barat', 'Islam', b'1', 'Jakarta Barat', '081373169407', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autoreply`
--
ALTER TABLE `autoreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_group`
--
ALTER TABLE `contact_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gammu`
--
ALTER TABLE `gammu`
  ADD PRIMARY KEY (`Version`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  ADD KEY `outbox_sender` (`SenderID`(250));

--
-- Indexes for table `outbox_multipart`
--
ALTER TABLE `outbox_multipart`
  ADD PRIMARY KEY (`ID`,`SequencePosition`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`IMEI`);

--
-- Indexes for table `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`ID`,`SequencePosition`),
  ADD KEY `sentitems_date` (`DeliveryDateTime`),
  ADD KEY `sentitems_tpmr` (`TPMR`),
  ADD KEY `sentitems_dest` (`DestinationNumber`),
  ADD KEY `sentitems_sender` (`SenderID`(250));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autoreply`
--
ALTER TABLE `autoreply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_group`
--
ALTER TABLE `contact_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
