-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 03 2021 г., 12:28
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kudago`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_name`) VALUES
('Достопримечательности'),
('Кино'),
('Рестораны'),
('Театры'),
('Торговые центры');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `products_id` int NOT NULL,
  `category_name` varchar(200) NOT NULL,
  `products_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `products_adress` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `products_tel` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `products_price` int NOT NULL,
  `products_image` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`products_id`, `category_name`, `products_name`, `products_adress`, `products_tel`, `products_price`, `products_image`) VALUES
(1, 'Достопримечательности', 'Птичья гавань', '​Енисейская, 1 к2', '7(3812)-90-35-36', 200, 'database/1622712241-1.PNG'),
(2, 'Кино', 'Маяк', '​проспект Комарова, 6 к1, ​4 этаж', '7(3812)-35-66-77', 300, 'database/1622712314-2.PNG'),
(3, 'Рестораны', 'Шикари', '​бульвар Архитекторов, 35​, 2 этаж', '7(3812)-92-51-63', 1000, 'database/1622712389-3.jpg'),
(4, 'Театры', 'Пятый театр', '​улица Красный Путь, 153', '7(3812)-24-03-63', 300, 'database/1622712444-4.PNG'),
(5, 'Торговые центры', 'МЕГА', '​бульвар Архитекторов, 35', '7-962-035-11-94', 100, 'database/1622712499-5.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `users_login` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `users_password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`users_id`, `users_login`, `users_password`) VALUES
(1, 'admin', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD KEY `category_name` (`category_name`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `category_name` (`category_name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `category` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
