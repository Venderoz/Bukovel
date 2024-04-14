-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 04:33 PM
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
-- Database: `bukovel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `ID` int(11) NOT NULL,
  `equipment_name` varchar(100) NOT NULL,
  `days_num` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`ID`, `equipment_name`, `days_num`, `price`, `category`) VALUES
(1, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 1, 23, 'A'),
(2, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 2, 42, 'A'),
(3, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 3, 61, 'A'),
(4, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 4, 76, 'A'),
(5, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 5, 89, 'A'),
(6, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 1, 14, 'B'),
(7, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 2, 27, 'B'),
(8, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 3, 38, 'B'),
(9, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 4, 47, 'B'),
(10, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 5, 56, 'B'),
(11, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 1, 9, 'C'),
(12, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 2, 17, 'C'),
(13, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 3, 24, 'C'),
(14, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 4, 30, 'C'),
(15, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 5, 35, 'C'),
(16, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 1, 10, 'D1'),
(17, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 2, 19, 'D1'),
(18, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 3, 27, 'D1'),
(19, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 4, 34, 'D1'),
(20, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 5, 40, 'D1'),
(21, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 1, 7, 'D2'),
(22, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 2, 13, 'D2'),
(23, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 3, 18, 'D2'),
(24, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 4, 23, 'D2'),
(25, 'SKI SET (SKIS, BOOTS, POLES, HELMET)', 5, 27, 'D2'),
(26, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 1, 23, 'A'),
(27, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 2, 42, 'A'),
(28, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 3, 61, 'A'),
(29, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 4, 74, 'A'),
(30, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 5, 89, 'A'),
(31, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 1, 14, 'B'),
(32, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 2, 27, 'B'),
(33, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 3, 38, 'B'),
(34, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 4, 47, 'B'),
(35, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 5, 56, 'B'),
(36, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 1, 9, 'C'),
(37, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 2, 17, 'C'),
(38, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 3, 24, 'C'),
(39, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 4, 30, 'C'),
(40, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 5, 35, 'C'),
(41, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 1, 10, 'D1'),
(42, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 2, 19, 'D1'),
(43, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 3, 27, 'D1'),
(44, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 4, 34, 'D1'),
(45, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 5, 40, 'D1'),
(46, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 1, 7, 'D2'),
(47, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 2, 13, 'D2'),
(48, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 3, 18, 'D2'),
(49, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 4, 23, 'D2'),
(50, 'SNOWBOARD SET (BOARD, BOOTS, HELMET)', 5, 27, 'D2'),
(51, 'HELMET', 1, 4, 'no_distribution'),
(52, 'HELMET', 2, 7, 'no_distribution'),
(53, 'HELMET', 3, 10, 'no_distribution'),
(54, 'HELMET', 4, 13, 'no_distribution'),
(55, 'HELMET', 5, 15, 'no_distribution'),
(56, 'GOGGLES', 1, 8, 'no_distribution'),
(57, 'GOGGLES', 2, 15, 'no_distribution'),
(58, 'GOGGLES', 3, 21, 'no_distribution'),
(59, 'GOGGLES', 4, 27, 'no_distribution'),
(60, 'GOGGLES', 5, 32, 'no_distribution');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skipass_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skipasses`
--

CREATE TABLE `skipasses` (
  `ID` int(11) NOT NULL,
  `season` varchar(100) NOT NULL,
  `skiing_period` varchar(100) NOT NULL,
  `days_number` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `validity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `skipasses`
--

INSERT INTO `skipasses` (`ID`, `season`, `skiing_period`, `days_number`, `status`, `price`, `description`, `validity`) VALUES
(1, 'Evening skiing', '15:00 - 19:30', 0, 'Standard', 16, 'From now on, you may replenish your cards online with items being previously exclusive to ticket offices.\n\nUnused ski-pass value is not by any means transferrable to other season periods.\n\nThe value of used or partially used ski-pass is not refundable.\n\nValid 2023-2024 winter season; On the day of actual purchase. \n\nBukovel Card may be replenished according to different skiing rates simultaneously. If multiple options are added during the same booking session, skiing days are stacked in the exactly same order in which they are added to the cart.\n\nThe tourniquet pass-through system then activates the card and starts charging it according to the queue.', 'On the day of purchase.'),
(2, 'Evening skiing', '15:00 - 19:30', 0, 'VIP', 32, 'From now on, you may replenish your cards online with items being previously exclusive to ticket offices.\r\n\r\nUnused ski-pass value is not by any means transferrable to other season periods.\r\n\r\nThe value of used or partially used ski-pass is not refundable.\r\n\r\nValid 2023-2024 winter season; On the day of actual purchase. \r\n\r\nBukovel Card may be replenished according to different skiing rates simultaneously. If multiple options are added during the same booking session, skiing days are stacked in the exactly same order in which they are added to the cart.\r\n\r\nThe tourniquet pass-through system then activates the card and starts charging it according to the queue.', 'On the day of purchase.'),
(3, 'High season', '19.12 - 01.01; 07.01 - 16.03', 2, 'Standard', 84, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(4, 'High season', '19.12 - 01.01; 07.01 - 16.03', 2, 'VIP', 167, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(5, 'High season', '19.12 - 01.01; 07.01 - 16.03', 3, 'Standard', 119, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(6, 'High season', '19.12 - 01.01; 07.01 - 16.03', 3, 'VIP', 239, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(7, 'High season', '19.12 - 01.01; 07.01 - 16.03', 4, 'Standard', 155, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(8, 'High season', '19.12 - 01.01; 07.01 - 16.03', 4, 'VIP', 311, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(9, 'High season', '19.12 - 01.01; 07.01 - 16.03', 5, 'Standard', 188, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(10, 'High season', '19.12 - 01.01; 07.01 - 16.03', 5, 'VIP', 376, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(11, 'High season', '19.12 - 01.01; 07.01 - 16.03', 6, 'Standard', 211, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(12, 'High season', '19.12 - 01.01; 07.01 - 16.03', 6, 'VIP', 422, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(13, 'High season', '19.12 - 01.01; 07.01 - 16.03', 7, 'Standard', 237, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(14, 'High season', '19.12 - 01.01; 07.01 - 16.03', 7, 'VIP', 473, 'This promotional ski-pass is usable during the entire winter season, except for the \"Holiday season\" period (02.01 - 06.01).\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(15, 'Holiday season', 'All season long', 2, 'Standard', 109, 'Unused days can’t be rescheduled. This promotional ski-pass is usable during the entire winter season.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(16, 'Holiday season', 'All season long', 2, 'VIP', 218, 'Unused days can’t be rescheduled. This promotional ski-pass is usable during the entire winter season.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(17, 'Holiday season', 'All season long', 3, 'Standard', 155, 'Unused days can’t be rescheduled. This promotional ski-pass is usable during the entire winter season.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(18, 'Holiday season', 'All season long', 3, 'VIP', 311, 'Unused days can’t be rescheduled. This promotional ski-pass is usable during the entire winter season.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(19, 'Holiday season', 'All season long', 4, 'Standard', 202, 'Unused days can’t be rescheduled. This promotional ski-pass is usable during the entire winter season.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(20, 'Holiday season', 'All season long', 4, 'VIP', 404, 'Unused days can’t be rescheduled. This promotional ski-pass is usable during the entire winter season.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(21, 'Holiday season', 'All season long', 5, 'Standard', 245, 'Unused days can’t be rescheduled. This promotional ski-pass is usable during the entire winter season.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(22, 'Holiday season', 'All season long', 5, 'VIP', 489, 'Unused days can’t be rescheduled. This promotional ski-pass is usable during the entire winter season.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(23, 'Low season', 'Season start - 18.12; 17.03 - Season end', 2, 'Standard', 50, 'Unused days can’t be rescheduled. This promotional ski-pass is usable within the following calendar periods: winter season start - 18.12; 17.03. – winter season end.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(24, 'Low season', 'Season start - 18.12; 17.03 - Season end', 2, 'VIP', 101, 'Unused days can’t be rescheduled. This promotional ski-pass is usable within the following calendar periods: winter season start - 18.12; 17.03. – winter season end.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(25, 'Low season', 'Season start - 18.12; 17.03 - Season end', 3, 'Standard', 72, 'Unused days can’t be rescheduled. This promotional ski-pass is usable within the following calendar periods: winter season start - 18.12; 17.03. – winter season end.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons'),
(26, 'Low season', 'Season start - 18.12; 17.03 - Season end', 3, 'VIP', 143, 'Unused days can’t be rescheduled. This promotional ski-pass is usable within the following calendar periods: winter season start - 18.12; 17.03. – winter season end.\r\n\r\nPlease note! The ski-pass is purchasable on a consecutive day basis, activated on the first tourniquet passthrough and loses its validity on the expiration date (or after the skiing season end, whichever comes first), regardless of actual skiing day use.\r\n\r\nIn order to prevent turnstile scanner collisions, we strictly restrain having more than 1 ski-pass when passing through turnstile gates, as well as handing ski-passes to another person through the turnstile.\r\n\r\nThe ski-pass is valid for 2 winter seasons.', '2 winter seasons');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone_number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `equipment_relation` (`equipment_id`),
  ADD KEY `skipass_relation` (`skipass_id`),
  ADD KEY `user_relation` (`user_id`);

--
-- Indexes for table `skipasses`
--
ALTER TABLE `skipasses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skipasses`
--
ALTER TABLE `skipasses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `equipment_relation` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`ID`),
  ADD CONSTRAINT `skipass_relation` FOREIGN KEY (`skipass_id`) REFERENCES `skipasses` (`ID`),
  ADD CONSTRAINT `user_relation` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
