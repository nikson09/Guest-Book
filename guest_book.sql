-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 18 2020 г., 23:24
-- Версия сервера: 10.4.10-MariaDB
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `guest_book`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `text` text CHARACTER SET utf32 NOT NULL,
  `parent_id` int(11) NOT NULL,
  `date` varchar(255) DEFAULT current_timestamp(),
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`comment_id`, `name`, `text`, `parent_id`, `date`) VALUES
(10, 'nikson09', 'Это система комментариев', 0, '2020-05-19 02:05:11'),
(11, 'nikson09', 'фымфым', 0, '2020-05-19 02:11:29'),
(12, 'nikson09', 'фымфымф', 0, '2020-05-19 02:11:32'),
(13, 'nikson09', 'ыфмф', 10, '2020-05-19 02:11:35'),
(14, 'nikson09', 'bdfbdf', 0, '2020-05-19 02:24:07'),
(15, 'nikson09', 'dfbdfb', 0, '2020-05-19 02:24:10'),
(16, 'nikson09', 'ываыв', 0, '2020-05-19 02:24:16');

-- --------------------------------------------------------

--
-- Структура таблицы `login_base`
--

DROP TABLE IF EXISTS `login_base`;
CREATE TABLE IF NOT EXISTS `login_base` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `login_base`
--

INSERT INTO `login_base` (`id`, `login`, `password`) VALUES
(3, 'nikson09', '14e1b600b1fd579f47433b88e8d85291');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
