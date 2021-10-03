-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 08 2021 г., 22:50
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `schoolbook`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int NOT NULL,
  `class` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` int NOT NULL,
  `image` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `class`, `subject`, `name`, `author`, `year`, `image`, `link`) VALUES
(1, '1', 'Математика', 'Математика', 'Самат Малкваев', 2016, 'images/books/1.jpg', '1rmiIxKzdPi_2zI1w0MmafFWQrME1FEmR'),
(2, '1', 'Русский язык', 'Русский язык', 'Ксения Ярцева', 2017, 'images/books/2.jpg', '1ejWYkz7Hf7d5BvjGreu-xIan2PFrN3Z2'),
(3, '1', 'Физика', 'Физика', 'Дмитрий Куцко', 2018, 'images/books/3.jpg', '1mT7rh1ZmiriBt5bUkx1iAYs9YMXZAZNs'),
(4, '1', 'Химия', 'Химия', 'Леонид Каштанов', 2019, 'images/books/4.jpg', '1ebvc7VlxHzgaejUy1i2bpfm5v2hhiqIE'),
(5, '1', 'Биология', 'Биология', 'Вадим Франк', 2020, 'images/books/5.jpg', '13ggAcMEPCM9SH_RRBX33hHHAtezP3WEM'),
(6, '1', 'Английский язык', 'Английский язык', 'Данила Спиридонов', 2021, 'images/books/6.jpg', '1eChc_a1402jS2wp6R50UIAp08_IADr1B');

-- --------------------------------------------------------

--
-- Структура таблицы `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `class` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `classes`
--

INSERT INTO `classes` (`id`, `class`, `image`) VALUES
(1, '1', 'images/classes/1.png'),
(2, '2', 'images/classes/2.png'),
(3, '3', 'images/classes/3.png'),
(4, '4', 'images/classes/4.png'),
(5, '5', 'images/classes/5.png'),
(6, '6', 'images/classes/6.png'),
(7, '7', 'images/classes/7.png'),
(8, '8', 'images/classes/8.png'),
(9, '9', 'images/classes/9.png'),
(10, '10', 'images/classes/10.png'),
(11, '11', 'images/classes/11.png');

-- --------------------------------------------------------

--
-- Структура таблицы `help`
--

CREATE TABLE `help` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `help`
--

INSERT INTO `help` (`id`, `email`) VALUES
(1, 'biba@boba.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id` int NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id`, `subject`) VALUES
(6, 'Английский язык'),
(5, 'Биология'),
(1, 'Математика'),
(2, 'Русский язык'),
(3, 'Физика'),
(4, 'Химия');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `flag` int NOT NULL DEFAULT '0',
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `flag`, `name`, `email`, `password`) VALUES
(1, 1, 'Дмитрий Куцко', 'volkovfeed@gmail.com', '1'),
(2, 0, 'миниДмитрий Куцко', 'nevolkovfeed@gmail.com', '2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`class`),
  ADD KEY `subject` (`subject`);

--
-- Индексы таблицы `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class` (`class`);

--
-- Индексы таблицы `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject`),
  ADD KEY `subject_2` (`subject`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `help`
--
ALTER TABLE `help`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`class`) REFERENCES `classes` (`class`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`subject`) REFERENCES `subjects` (`subject`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
