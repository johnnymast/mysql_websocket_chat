-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Gegenereerd op: 26 apr 2021 om 19:37
-- Serverversie: 10.3.28-MariaDB-1:10.3.28+maria~focal
-- PHP-versie: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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
    `to_id` varchar(255) NOT NULL,
    `from_id` varchar(255) NOT NULL,
    `message` text NOT NULL,
    `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    `ip_address` varchar(255) NOT NULL,
    PRIMARY KEY (`message_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;
