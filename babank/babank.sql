-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 28 2021 г., 00:21
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
-- База данных: `babank`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE `cards` (
  `cards_id` int NOT NULL,
  `users_id` int NOT NULL,
  `cards_name` varchar(500) NOT NULL,
  `cards_number` bigint NOT NULL,
  `cards_firstname` varchar(500) NOT NULL,
  `cards_lastname` varchar(500) NOT NULL,
  `cards_month` int NOT NULL,
  `cards_year` int NOT NULL,
  `cards_cvc` int NOT NULL,
  `cards_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cards`
--

INSERT INTO `cards` (`cards_id`, `users_id`, `cards_name`, `cards_number`, `cards_firstname`, `cards_lastname`, `cards_month`, `cards_year`, `cards_cvc`, `cards_image`) VALUES
(1, 1, 'МИР', 2000200020002000, 'Ivan', 'Ivanov', 1, 2021, 111, 'images/cards/mir.svg'),
(2, 1, 'American Express', 3000300030003000, 'Ivan', 'Ivanov', 2, 2021, 222, 'images/cards/amex.svg'),
(3, 1, 'VISA', 4000400040004000, 'Ivan', 'Ivanov', 3, 2021, 333, 'images/cards/visa.svg'),
(4, 1, 'MasterCard', 5000500050005000, 'Ivan', 'Ivanov', 3, 2021, 444, 'images/cards/master.svg'),
(5, 1, 'Maestro', 6000600060006000, 'Ivan', 'Ivanov', 5, 2021, 555, 'images/cards/maestro.svg');

-- --------------------------------------------------------

--
-- Структура таблицы `checks`
--

CREATE TABLE `checks` (
  `checks_id` int NOT NULL,
  `users_id` int NOT NULL,
  `cards_id` int NOT NULL,
  `checks_product` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `checks_sum` bigint NOT NULL,
  `checks_date` date NOT NULL,
  `checks_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `checks`
--

INSERT INTO `checks` (`checks_id`, `users_id`, `cards_id`, `checks_product`, `checks_sum`, `checks_date`, `checks_time`) VALUES
(1, 1, 1, 'Покупка еды в \"MACDONALDS\"', 1000, '2021-04-28', '01:01:00'),
(2, 1, 2, 'Покупка еды в \"KFC\"', 2000, '2021-04-28', '02:02:00'),
(3, 1, 3, 'Покупка еды в \"BURGER KING\"', 3000, '2021-04-28', '03:03:00'),
(4, 1, 4, 'Покупка еды в \"SUBWAY\"', 4000, '2021-04-28', '04:04:00'),
(5, 1, 5, 'Покупка еды в \"ЛАНЧ ТАЙМ\"', 5000, '2021-04-28', '05:05:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `users_name` varchar(500) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_email`, `users_password`) VALUES
(1, 'Иванов Иван Иванович', '1@1', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`cards_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Индексы таблицы `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`checks_id`),
  ADD KEY `cards_id` (`cards_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cards`
--
ALTER TABLE `cards`
  MODIFY `cards_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `checks`
--
ALTER TABLE `checks`
  MODIFY `checks_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cards`
--
ALTER TABLE `cards`
  ADD CONSTRAINT `cards_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `checks_ibfk_1` FOREIGN KEY (`cards_id`) REFERENCES `cards` (`cards_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checks_ibfk_2` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
