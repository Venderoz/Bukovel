-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 09 2024 г., 22:49
-- Версия сервера: 10.4.27-MariaDB
-- Версия PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `bukovel_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `equipment`
--

CREATE TABLE `equipment` (
  `ID` int(11) NOT NULL,
  `equipment_name` varchar(100) NOT NULL,
  `days_num` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `equipment`
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
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skipass_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `order_time` date NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `skipasses`
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

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `account_image` blob NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `username`, `birthdate`, `email`, `password`, `account_image`, `created_at`) VALUES
(11, 'nataniel', '2024-03-30', 'qwertyu@dsfsg', '12345', 0x494d475f32303234303432305f3139303331332e6a7067, '2024-03-20'),
(12, 'Burber', '2024-04-03', 'burger@mailed.com', '12345678', '', '2024-04-07'),
(14, 'admin', '4651-05-05', 'admin@gmail.com', 'Vender0z', 0x796167616d696c696768742e6a7067, '2024-05-09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `equipment_relation` (`equipment_id`),
  ADD KEY `skipass_relation` (`skipass_id`),
  ADD KEY `user_relation` (`user_id`);

--
-- Индексы таблицы `skipasses`
--
ALTER TABLE `skipasses`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `equipment`
--
ALTER TABLE `equipment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `skipasses`
--
ALTER TABLE `skipasses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `equipment_relation` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skipass_relation` FOREIGN KEY (`skipass_id`) REFERENCES `skipasses` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_relation` FOREIGN KEY (`user_id`) REFERENCES `users` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
