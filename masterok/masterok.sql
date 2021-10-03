-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2021 г., 09:01
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
-- База данных: `masterok`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `categories_id` int NOT NULL,
  `categories_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`) VALUES
(13, 'Визажист'),
(7, 'Кожевник'),
(3, 'Компьютерный мастер'),
(15, 'Курьер'),
(6, 'Обувщик'),
(14, 'Парикмахер'),
(12, 'Переводчик'),
(2, 'Плотник'),
(1, 'Сантехник'),
(4, 'Столяр'),
(10, 'Строитель'),
(9, 'Таксист'),
(5, 'Токарь'),
(8, 'Фотограф'),
(11, 'Юрист');

-- --------------------------------------------------------

--
-- Структура таблицы `cities`
--

CREATE TABLE `cities` (
  `cities_id` int NOT NULL,
  `cities_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cities`
--

INSERT INTO `cities` (`cities_id`, `cities_name`) VALUES
(15, 'г. Волгоград'),
(13, 'г. Воронеж'),
(4, 'г. Екатеринбург'),
(5, 'г. Казань'),
(12, 'г. Красноярск'),
(1, 'г. Москва'),
(6, 'г. Нижний Новгород'),
(3, 'г. Новосибирск'),
(9, 'г. Омск'),
(14, 'г. Пермь'),
(10, 'г. Ростов-на-Дону'),
(8, 'г. Самара'),
(2, 'г. Санкт-Петербург'),
(11, 'г. Уфа'),
(7, 'г. Челябинск');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comments_id` int NOT NULL,
  `products_id` int NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `comments_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `products_id` int NOT NULL,
  `users_id` int NOT NULL,
  `cities_name` varchar(255) NOT NULL,
  `categories_name` varchar(255) NOT NULL,
  `products_name` varchar(500) NOT NULL,
  `products_desc` text NOT NULL,
  `products_image` varchar(500) NOT NULL,
  `products_number` varchar(50) NOT NULL,
  `products_whatsapp` varchar(50) NOT NULL,
  `products_telegram` varchar(50) NOT NULL,
  `products_viber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`products_id`, `users_id`, `cities_name`, `categories_name`, `products_name`, `products_desc`, `products_image`, `products_number`, `products_whatsapp`, `products_telegram`, `products_viber`) VALUES
(1, 1, 'г. Омск', 'Кожевник', 'Участник кожевенного ремесла', 'Эй, дружок-пирожок, тобой выбрана неправильная дверь. Клуб кожевенного ремесла два блока вниз.', 'updates/1622956114-artworks-ZBaC80WPNo6QSOwT-HJrSzQ-t500x500.jpg', '+7 (999) 99-99-999', '+7 (888) 88-88-888', '+7 (777) 77-77-777', '+7 (666) 66-66-666');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `users_name` varchar(255) NOT NULL,
  `users_email` varchar(255) NOT NULL,
  `users_telephone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `users_password` varchar(255) NOT NULL,
  `users_flag` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_email`, `users_telephone`, `users_password`, `users_flag`) VALUES
(1, 'Администратор', '1@1.ru', '', '1', '1'),
(2, 'Пользователь', '2@2.ru', '+7 (999) 99-99-999', '2', '0');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`),
  ADD KEY `categories_name` (`categories_name`);

--
-- Индексы таблицы `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`cities_id`),
  ADD KEY `cities_name` (`cities_name`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`),
  ADD KEY `users_name` (`users_name`),
  ADD KEY `comments_ibfk_2` (`products_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `cities_name` (`cities_name`),
  ADD KEY `categories_name` (`categories_name`),
  ADD KEY `users_id` (`users_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `users_name` (`users_name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `cities`
--
ALTER TABLE `cities`
  MODIFY `cities_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`users_name`) REFERENCES `users` (`users_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`products_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cities_name`) REFERENCES `cities` (`cities_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`categories_name`) REFERENCES `categories` (`categories_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
