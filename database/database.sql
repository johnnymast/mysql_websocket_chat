-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 27 apr 2021 om 17:26
-- Serverversie: 10.3.28-MariaDB-1:10.3.28+maria~focal
-- PHP-versie: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socket_chat`
--
CREATE DATABASE IF NOT EXISTS `socket_chat` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `socket_chat`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `chat_interactions`
--

CREATE TABLE IF NOT EXISTS `chat_interactions` (
    `message_id` int(11) NOT NULL AUTO_INCREMENT,
    `to_id` varchar(255) DEFAULT NULL,
    `from_id` varchar(255) NOT NULL,
    `message` text NOT NULL,
    `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `ip_address` varchar(255) NOT NULL,
    PRIMARY KEY (`message_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
