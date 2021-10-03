-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 14 2021 г., 20:54
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
-- База данных: `goodfood_project`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Завтрак'),
(2, 'Обед'),
(3, 'Полдник'),
(4, 'Ужин');

-- --------------------------------------------------------

--
-- Структура таблицы `favorite`
--

CREATE TABLE `favorite` (
  `favorite_id` int NOT NULL,
  `users_id` int NOT NULL,
  `products_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `products_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `products_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `products_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `products_property-1` int NOT NULL,
  `products_property-2` int NOT NULL,
  `products_property-3` int NOT NULL,
  `products_property-4` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`products_id`, `category_name`, `products_name`, `products_image`, `products_property-1`, `products_property-2`, `products_property-3`, `products_property-4`) VALUES
(1, 'Завтрак', 'Овсяная каша', 'update/1623692812-1.jpg', 127, 3, 3, 24),
(2, 'Обед', 'Гречневый суп с фрикадельками', 'update/1623692847-1.jpg', 47, 2, 0, 5),
(3, 'Полдник', 'Запеканка из брокколи и цветной капусты', 'update/1623692864-1.jpg', 107, 5, 8, 5),
(4, 'Ужин', 'Курица, запеченная в духовке', 'update/1623692881-1.jpg', 197, 15, 15, 0),
(5, 'Обед', 'Куриный суп с вермишелью', 'update/1623692912-1.jpg', 63, 3, 2, 8),
(6, 'Ужин', 'Рыбные котлеты  без обжарки в масле', 'update/1623693014-1.jpg', 59, 4, 2, 5),
(7, 'Завтрак', 'Пшенная каша', 'update/1623693031-1.jpg', 125, 4, 2, 23),
(8, 'Полдник', 'Творожная запеканка', 'update/1623693056-1.jpg', 243, 11, 13, 21),
(9, 'Ужин', 'Рыбные котлеты без обжарки в масле', 'update/1623693071-1.jpg', 59, 4, 2, 5),
(10, 'Обед', 'Картофельный суп с сельдью', 'update/1623693091-1.jpg', 89, 5, 3, 11),
(11, 'Ужин', 'Ленивые голубцы', 'update/1623693112-1.jpg', 147, 15, 50, 15),
(12, 'Завтрак', 'Ячневая каша', 'update/1623693125-1.jpg', 96, 3, 1, 18),
(13, 'Полдник', 'Рисовая бабка с яблоками', 'update/1623693143-1.jpg', 92, 3, 2, 15),
(14, 'Завтрак', 'Колбаски из семги', 'update/1623693164-1.jpg', 131, 18, 6, 1),
(15, 'Обед', 'Суп с фрикадельками и шпинатом', 'update/1623693180-1.jpg', 74, 5, 3, 6),
(16, 'Ужин', 'Мясо “Путь к сердцу”', 'update/1623693201-1.jpg', 252, 17, 20, 1),
(17, 'Завтрак', 'Яйца пашот', 'update/1623693217-1.jpg', 157, 12, 10, 1),
(18, 'Полдник', 'Апельсиновый творожный торт без выпечки', 'update/1623693238-1.jpg', 291, 7, 17, 27);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `users_name` varchar(500) NOT NULL,
  `users_email` varchar(500) NOT NULL,
  `users_password` varchar(500) NOT NULL,
  `users_flag` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_email`, `users_password`, `users_flag`) VALUES
(1, 'Администратор', '1@1.ru', '1', '1'),
(2, 'Пользователь', '2@2.ru', '2', '0'),
(3, 'Пользователь', '3@3.ru', '3', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_name` (`category_name`);

--
-- Индексы таблицы `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`favorite_id`),
  ADD KEY `users_id` (`users_id`),
  ADD KEY `favorites_ibfk_2` (`products_id`);

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
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favorite_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_name`) REFERENCES `category` (`category_name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
