-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 22 2021 г., 18:18
-- Версия сервера: 8.0.23-0ubuntu0.20.04.1
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `User`
--

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `Name` varchar(50) NOT NULL,
  `Photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Email` varchar(64) NOT NULL,
  `Phone` int UNSIGNED NOT NULL,
  `Password` varchar(25) NOT NULL,
  `Role` int DEFAULT NULL,
  `id` int UNSIGNED NOT NULL,
  `Ban` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`Name`, `Photo`, `Email`, `Phone`, `Password`, `Role`, `id`, `Ban`) VALUES
('Elina111', 'upload/profile1.png', 'elina@gmail.com', 556632, '2222', 0, 1, 0),
('Lena Lena Lena', '', 'lena@gmail.com', 123123123, '1111', 0, 2, 0),
('DanaD', '', 'dana@mail.ru', 123121212, '3333', 0, 3, 0),
('Sergey Sergey Sergey', '', 'serg@mail.ru', 99999999, '4444', 0, 4, 1),
('Dan Dan Dan', '', 'dan@mail.ru', 12312454, '5555', 0, 5, 0),
('Fil Fil Fil', '', 'fil@mail.ru', 121212123, '6666', 1, 6, 0),
('Danil Danil Danil', '', 'danil@gmail.com', 55555563, '7777', 0, 7, 0),
('Tom Tom Tom', '', 'tom@gmail.com', 1231254, '8888', 0, 8, 0),
('Lena', '', 'Lena@mail.ru', 332211235, '6633', 0, 9, 0),
('lili', '', 'lili@mail.ru', 1243465, '12we', 0, 19, 0),
('Rita', '', 'rita@mail.ru', 1234658, '3344', 0, 20, 0),
('123123123', '', '123123123@gmail.om', 123123123, '123123123', 0, 21, 0),
('123123123', '', '123123123@gmail.om', 123123123, '123123123', 0, 22, 0),
('test', '', 'test@gggg.com', 123123123, '123123123123', 0, 23, 0),
('tadsfasdf', '', 'ttr@gmail.com', 123123123, '123123123', 0, 24, 0),
('asdfasdfasdf', '', 'teset1111@gmail.com', 123123123, '123123123123', 0, 25, 0),
('testatesfs', '', 'testtt@gm.com', 3123123123, '123123123', 0, 26, 0),
('Test', '', 'asdfadsf@gmm.com', 123123123, '123123123', 0, 27, 0),
('testat', '', 'test@gmail.com', 123123123, '123123123', 0, 28, 0),
('test', 'upload/profile29.png', 'userwithimage@test.com', 123123, '123123123', 0, 29, 0),
('test', 'upload/profile30.png', 'yyy@ghmail.com', 123123123, '123123123', 0, 30, 0),
('test', 'upload/profile31.png', 'hhhh@hhh.com', 123123123, '123123123', 0, 31, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
