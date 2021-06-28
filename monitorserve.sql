-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 06:49 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitorserve`
--

-- --------------------------------------------------------

--
-- Table structure for table `customcontrol`
--

CREATE TABLE `customcontrol` (
  `id` int(11) NOT NULL,
  `unik` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `command` text NOT NULL,
  `result` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `name_reg`
--

CREATE TABLE `name_reg` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `target` int(11) NOT NULL COMMENT '1 = pulic,2 = local,3 = revers'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `public`
--

CREATE TABLE `public` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `ip` varchar(256) NOT NULL,
  `date` varchar(256) NOT NULL,
  `target` int(11) NOT NULL,
  `port` text NOT NULL,
  `ssh_live` text NOT NULL,
  `ssh_failed` text NOT NULL,
  `ssh_success` text NOT NULL,
  `disk` text NOT NULL,
  `ram` text NOT NULL,
  `service_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `public_command`
--

CREATE TABLE `public_command` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `reboot` int(1) NOT NULL,
  `service_list` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '1 = admin, 2 = viwer',
  `public` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `trackip` int(11) NOT NULL,
  `custom_control` int(11) NOT NULL,
  `user_manage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`, `public`, `local`, `trackip`, `custom_control`, `user_manage`) VALUES
(5, 'strongpapazola', '$2y$10$aIf7kg86Hq00jiaWW1RlheVv7xoyd5vs1dFjvC8DlDC7rNxBwCnTO', 1, 1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customcontrol`
--
ALTER TABLE `customcontrol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `name_reg`
--
ALTER TABLE `name_reg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public`
--
ALTER TABLE `public`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_command`
--
ALTER TABLE `public_command`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customcontrol`
--
ALTER TABLE `customcontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `name_reg`
--
ALTER TABLE `name_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public`
--
ALTER TABLE `public`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_command`
--
ALTER TABLE `public_command`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
