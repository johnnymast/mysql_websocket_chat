-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 18, 2016 at 03:50 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `socket_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_interactions`
--

CREATE TABLE `chat_interactions` (
  `message_id` int(11) NOT NULL,
  `to_id` varchar(255) NOT NULL,
  `from_id` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_interactions`
--
ALTER TABLE `chat_interactions`
  ADD PRIMARY KEY (`message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_interactions`
--
ALTER TABLE `chat_interactions`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;