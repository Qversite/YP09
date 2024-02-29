-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 27 2024 г., 07:40
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
-- База данных: `31`
--
CREATE DATABASE IF NOT EXISTS `31` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `31`;

-- --------------------------------------------------------

--
-- Структура таблицы `notes`
--

CREATE TABLE `notes` (
  `id` int(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `dateT` date NOT NULL,
  `note` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `notes`
--

INSERT INTO `notes` (`id`, `author`, `dateT`, `note`) VALUES
(62, 'dsa', '0000-00-00', 'das'),
(63, 'das', '0000-00-00', 'das'),
(64, 'dsa', '2023-10-25', 'das'),
(65, 'Тотченко Никита', '2023-10-25', 'Это самый главный отзыв в моей жизни, он главенствует надо всеми главными глами этого главенствующего мира'),
(66, 'Тотченко Никита', '2023-11-01', 'АВВФАЫВАЫВ'),
(67, 'Никита', '2023-11-01', 'Что-то'),
(68, 'o[-', '2023-11-09', 'op-'),
(69, 'op', '2023-11-09', 'oop'),
(70, 'Никита', '2023-12-04', 'Что-то');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- База данных: `gradebook`
--
CREATE DATABASE IF NOT EXISTS `gradebook` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `gradebook`;

-- --------------------------------------------------------

--
-- Структура таблицы `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `grade` varchar(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `lesson_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `grade`
--

INSERT INTO `grade` (`id`, `grade`, `subject_id`, `student_id`, `lesson_num`) VALUES
(2, '5', 1, 2, 15),
(3, '5', 1, 3, 15),
(4, '5', 1, 4, 15),
(5, '5', 1, 6, 15),
(6, '5', 1, 5, 15),
(7, '5', 1, 7, 15),
(8, '5', 1, 8, 15),
(9, '5', 1, 9, 15),
(10, '5', 1, 10, 15),
(12, '2', 1, 2, 3),
(13, '2', 1, 3, 3),
(14, '2', 1, 4, 3),
(15, '2', 1, 5, 3),
(16, '3', 1, 6, 3),
(17, '3', 1, 7, 3),
(18, '3', 1, 8, 3),
(19, '3', 1, 9, 3),
(20, '3', 1, 10, 3),
(21, '', 2, 11, 1),
(22, '2', 2, 11, 2),
(23, '', 2, 11, 3),
(24, '', 2, 11, 4),
(25, '', 2, 11, 5),
(26, '', 2, 11, 6),
(27, '2', 2, 11, 7),
(28, '2', 2, 11, 8),
(29, '2', 2, 11, 9),
(30, '2', 2, 11, 10),
(31, '2', 2, 11, 11),
(32, '2', 2, 11, 12),
(33, '2', 2, 11, 13),
(34, '2', 2, 11, 14),
(35, '2', 2, 11, 15),
(36, '2', 2, 11, 16),
(37, '2', 2, 11, 17),
(38, '2', 2, 11, 18),
(39, '2', 2, 11, 19),
(40, '2', 2, 11, 20),
(41, '2', 2, 11, 21),
(42, '2', 2, 11, 22),
(43, '2', 2, 11, 23),
(44, '2', 2, 11, 24),
(45, '2', 2, 11, 25),
(46, '2', 2, 11, 26),
(47, '2', 2, 11, 27),
(48, '2', 2, 11, 28),
(49, '2', 2, 11, 29),
(50, '2', 2, 11, 30),
(51, '2', 2, 11, 31),
(54, '', 2, 3, 4),
(55, '', 2, 5, 4),
(56, '', 2, 7, 4),
(57, '', 2, 9, 4),
(58, '', 2, 3, 10),
(59, '', 2, 4, 12),
(60, '5', 1, 3, 10),
(61, '5', 1, 4, 10),
(62, '5', 1, 5, 10),
(63, '5', 1, 6, 10),
(64, '5', 1, 7, 10),
(65, '5', 1, 8, 10),
(66, '5', 1, 3, 22),
(67, '5', 1, 5, 22),
(68, '5', 1, 6, 22),
(69, '5', 1, 7, 22),
(70, '5', 1, 8, 22),
(71, '5', 1, 8, 23),
(72, '5', 1, 7, 23),
(73, '5', 1, 6, 23),
(74, '5', 1, 5, 23),
(75, '5', 1, 4, 23),
(76, '5', 1, 4, 22),
(77, '5', 1, 4, 21),
(78, '5', 1, 4, 20),
(79, '5', 1, 5, 20),
(80, '5', 1, 6, 20),
(81, '5', 1, 7, 20),
(82, '5', 1, 8, 20),
(83, '5', 1, 9, 20),
(84, '5', 1, 10, 20),
(85, '5', 1, 10, 21),
(86, '5', 1, 10, 22),
(87, '5', 1, 10, 23),
(88, '5', 1, 10, 24),
(89, '5', 1, 10, 25),
(90, '5', 1, 9, 25),
(91, '5', 1, 8, 25),
(92, '5', 1, 7, 25),
(93, '5', 1, 6, 25),
(94, '5', 1, 5, 25),
(95, '5', 1, 4, 25),
(96, '5', 1, 3, 25),
(97, '5', 1, 3, 24),
(98, '5', 1, 2, 24),
(99, '5', 1, 2, 23),
(102, '5', 1, 2, 22),
(103, '5', 1, 2, 21),
(104, '5', 1, 2, 20),
(105, '5', 1, 2, 19),
(106, '5', 1, 3, 19),
(107, '5', 2, 12, 1),
(108, '5', 2, 12, 2),
(109, '5', 2, 12, 3),
(110, '5', 2, 12, 4),
(111, '5', 2, 12, 5),
(112, '5', 2, 12, 6),
(113, '5', 2, 12, 7),
(114, '5', 2, 12, 8),
(115, '5', 2, 12, 10),
(116, '5', 2, 12, 9),
(117, '5', 2, 12, 11),
(118, '5', 2, 12, 12),
(119, '5', 2, 12, 13),
(120, '5', 2, 12, 14),
(121, '5', 2, 12, 15),
(122, '5', 2, 12, 16),
(123, '5', 2, 12, 17),
(124, '5', 2, 12, 18),
(125, '5', 2, 12, 19),
(126, '5', 2, 12, 20),
(127, '5', 2, 12, 21),
(128, '5', 2, 12, 22),
(129, '5', 2, 12, 23),
(130, '5', 2, 12, 24),
(131, '5', 2, 12, 25),
(132, '5', 2, 12, 26),
(133, '5', 2, 12, 27),
(134, '5', 2, 12, 28),
(135, '5', 2, 12, 29),
(136, '5', 2, 12, 30),
(137, '5', 2, 12, 31),
(167, '', 2, 2, 1),
(168, '', 2, 2, 2),
(169, '', 2, 2, 3),
(170, '', 2, 2, 4),
(171, '', 2, 2, 5),
(172, '', 2, 2, 6),
(173, '', 2, 2, 7),
(174, '', 2, 2, 8),
(175, '', 2, 2, 9),
(176, '', 2, 2, 10),
(177, '', 2, 2, 11),
(178, '', 2, 2, 12),
(179, '', 2, 2, 13),
(180, '', 2, 2, 14),
(181, '', 2, 2, 15),
(182, '', 2, 2, 16),
(183, '', 2, 2, 17),
(184, '', 2, 2, 18),
(185, '', 2, 2, 19),
(186, '', 2, 2, 22),
(187, '', 2, 2, 23),
(188, '', 2, 2, 24),
(189, '', 2, 2, 25),
(190, '', 2, 2, 26),
(191, '', 2, 2, 27),
(192, '', 2, 2, 28),
(193, '', 2, 2, 29),
(194, '', 2, 2, 30),
(195, '', 2, 2, 31),
(196, '', 2, 3, 1),
(197, '', 2, 3, 2),
(198, '', 2, 3, 3),
(199, '', 2, 3, 5),
(200, '', 2, 3, 6),
(201, '', 2, 3, 7),
(202, '', 2, 3, 8),
(203, '', 2, 3, 9),
(204, '', 2, 3, 11),
(205, '', 2, 3, 12),
(206, '', 2, 3, 13),
(207, '', 2, 3, 14),
(208, '2', 2, 3, 15),
(209, '2', 2, 3, 16),
(210, '2', 2, 3, 17),
(211, '', 2, 3, 18),
(212, '', 2, 3, 19),
(213, '', 2, 3, 20),
(214, '', 2, 3, 21),
(215, '', 2, 3, 22),
(216, '', 2, 3, 23),
(217, '', 2, 3, 27),
(218, '', 2, 4, 27),
(219, '', 2, 5, 27),
(220, '2', 2, 7, 27),
(221, '', 2, 6, 27),
(222, '2', 2, 8, 27),
(223, '2', 2, 9, 27),
(224, '2', 2, 10, 27),
(225, '', 2, 6, 13),
(226, '', 2, 7, 13),
(227, '', 2, 5, 13),
(228, '', 2, 4, 13),
(229, '', 2, 8, 13),
(230, '', 2, 9, 13),
(231, '0', 2, 10, 13),
(232, '0', 2, 10, 14),
(233, '0', 2, 9, 14),
(234, '0', 2, 8, 14),
(235, '0', 2, 7, 14),
(236, '0', 2, 5, 14),
(237, '', 2, 6, 14),
(238, '', 2, 5, 15),
(239, '', 2, 4, 15),
(240, '', 2, 4, 14),
(241, '', 2, 7, 15),
(242, '0', 2, 9, 16),
(243, '0', 2, 9, 15),
(244, '0', 2, 10, 15),
(245, '0', 2, 8, 15),
(246, '0', 2, 8, 16),
(247, '', 2, 7, 16),
(248, '', 2, 6, 16),
(249, '', 2, 5, 16),
(250, '', 2, 4, 16),
(251, '', 2, 6, 15),
(252, '0', 2, 10, 16),
(253, '0', 2, 10, 17),
(254, '0', 2, 9, 17),
(255, '0', 2, 8, 17),
(256, '', 2, 7, 17),
(257, '', 2, 6, 17),
(258, '', 2, 5, 17),
(259, '', 2, 4, 17),
(260, '', 2, 4, 18),
(261, '', 2, 5, 18),
(262, '', 2, 6, 18),
(263, '', 2, 7, 18),
(264, '0', 2, 8, 18),
(265, '0', 2, 9, 18),
(266, '0', 2, 10, 18),
(267, '', 2, 6, 19),
(268, '', 2, 7, 19),
(269, '0', 2, 8, 19),
(270, '0', 2, 9, 19),
(271, '0', 2, 10, 19),
(272, '0', 2, 10, 20),
(273, '0', 2, 9, 20),
(274, '0', 2, 8, 20),
(275, '', 2, 7, 20),
(276, '', 2, 6, 20),
(277, '', 2, 5, 20),
(278, '', 2, 5, 19),
(279, '', 2, 4, 19),
(280, '', 2, 4, 20),
(281, '', 2, 4, 21),
(282, '', 2, 4, 22),
(283, '', 2, 5, 22),
(284, '', 2, 5, 21),
(285, '', 2, 6, 21),
(286, '', 2, 6, 22),
(287, '0', 2, 7, 22),
(288, '', 2, 7, 21),
(289, '0', 2, 9, 21),
(290, '0', 2, 9, 22),
(291, '0', 2, 8, 22),
(292, '0', 2, 8, 21),
(293, '0', 2, 10, 21),
(294, '0', 2, 10, 22),
(295, '0', 2, 10, 23),
(296, '0', 2, 9, 23),
(297, '0', 2, 8, 23),
(298, '0', 2, 7, 23),
(299, '', 2, 6, 23),
(300, '0', 2, 5, 23),
(301, '', 2, 4, 23),
(302, '', 2, 3, 24),
(303, '', 2, 4, 24),
(304, '', 2, 5, 24),
(305, '', 2, 6, 24),
(306, '0', 2, 7, 24),
(307, '0', 2, 8, 24),
(308, '0', 2, 9, 24),
(309, '0', 2, 10, 24),
(310, '0', 2, 10, 25),
(311, '0', 2, 9, 25),
(312, '0', 2, 8, 25),
(313, '0', 2, 7, 25),
(314, '', 2, 6, 25),
(315, '', 2, 5, 25),
(316, '', 2, 4, 25),
(317, '', 2, 3, 26),
(318, '', 2, 3, 25),
(319, '', 2, 4, 26),
(320, '', 2, 5, 26),
(321, '', 2, 6, 26),
(322, '0', 2, 7, 26),
(323, '0', 2, 8, 26),
(324, '0', 2, 9, 26),
(325, '0', 2, 10, 26),
(326, '5', 2, 5, 10),
(327, 'Н', 2, 7, 5),
(328, 'Н', 2, 6, 5),
(329, 'Н', 2, 5, 5),
(330, 'У', 2, 5, 6),
(331, 'У', 2, 6, 6),
(332, 'У', 2, 7, 6),
(333, '2', 2, 5, 7),
(334, '2', 2, 6, 7),
(335, '2', 2, 7, 7),
(336, '3', 2, 7, 8),
(337, '3', 2, 6, 8),
(338, '3', 2, 5, 8),
(339, '4', 2, 5, 9),
(340, '4', 2, 6, 9),
(341, '', 2, 8, 9),
(342, '4', 2, 7, 9),
(343, '5', 2, 7, 10),
(344, '5', 2, 6, 10),
(345, '2', 1, 6, 6),
(346, '2', 1, 7, 6),
(347, '2', 1, 8, 6),
(348, '2', 1, 10, 6),
(349, '2', 1, 9, 6),
(350, 'Н', 1, 6, 13),
(351, 'Н', 1, 5, 13),
(352, 'Н', 1, 4, 13),
(353, 'У', 1, 4, 17),
(354, 'У', 1, 6, 17),
(355, 'У', 1, 5, 17),
(356, '5', 1, 12, 11),
(357, '5', 1, 12, 13),
(358, '5', 1, 12, 12),
(359, '5', 1, 2, 7),
(360, '5', 1, 3, 7),
(361, '5', 1, 4, 7),
(362, '5', 1, 5, 7),
(363, '5', 1, 6, 7),
(364, '2', 4, 13, 1),
(365, '2', 4, 13, 5),
(366, '5', 4, 13, 8),
(367, '5', 4, 13, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'ИС-4'),
(2, 'ПД-4'),
(3, 'П-4'),
(4, 'Л-1'),
(5, 'Л-2'),
(6, 'Л-5'),
(7, 'Л-3');

-- --------------------------------------------------------

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `student`
--

INSERT INTO `student` (`id`, `name`, `lastname`, `surname`, `group_id`) VALUES
(2, 'Мария', 'Петрова', 'Игоревна', 1),
(3, 'Александр', 'Смирнов', 'Александрович', 1),
(4, 'Елена', 'Козлова', 'Викторовна', 1),
(5, 'Сергей', 'Морозов', 'Сергеевич', 1),
(6, 'Ольга', 'Кузнецова', 'Дмитриевна', 1),
(7, 'Дмитрий', 'Павлов', 'Андреевич', 1),
(8, 'Анна', 'Соколова', 'Павловна', 1),
(9, 'Артем', 'Васильев', 'Артемович', 1),
(10, 'Наталья', 'Перлова', 'Сергеевна', 1),
(11, 'Никита', 'Тотченко', 'Сергеевич', 1),
(12, 'Артем', 'Семернин', 'Витальевич', 1),
(13, 'Никита', 'Топченко', 'Сергеев', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`id`, `name`, `group_id`) VALUES
(1, 'Информатика', 1),
(2, 'Численные методы', 1),
(4, 'МДК 08.01', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `lastname`, `surname`, `password`, `role`) VALUES
(1, 'admin', 'Admin', 'Admin', 'Admin', '$2y$10$pE0J/.wjJOeZc0gOY9JUtutCfQUmMVpgJ5GoSdTJxQr/sdBJQKBl6', 'admin'),
(2, 'user', 'User', 'User', 'User', '$2y$10$pE0J/.wjJOeZc0gOY9JUtutCfQUmMVpgJ5GoSdTJxQr/sdBJQKBl6', 'user'),
(3, 'Zellar', 'Никита', 'Тотченко', 'Сергеевич', '$2y$10$/GUfRzkiGkpO2OZEPhL.YOLM1DvE6S5aLocMHxVHMbJ8mwNqENHJa', ''),
(4, 'Se7En', 'Артем', 'Семернин', 'Витальевич', '$2y$10$sbO/TcLweuPdiZeqKa9y7eDfQukhhKRLwZYR7k3soLisZCdYGZ/pe', ''),
(5, 'доапощзжооазхролавзехрлозхвуорщзавощаворщзваорщзаворщзвпоршврпршвршщвурпшщувкрпшщвршщпвршпровщзаповщзрпщворпзщваорпзщваорщзварощваорзщваорщзворщваорвщзаровщзарощзваорщзваорщзваорщзворщващозр', 'доапощзжооазхролавзехрлозхвуорщзавощаворщзваорщзаворщзвпоршврпршвршщвурпшщувкрпшщвршщпвршпровщзаповщзрпщворпзщваорпзщваорщзварощваорзщваорщзворщваорвщзаровщзарощзваорщзваорщзваорщзворщващозр', 'доапощзжооазхролавзехрлозхвуорщзавощаворщзваорщзаворщзвпоршврпршвршщвурпшщувкрпшщвршщпвршпровщзаповщзрпщворпзщваорпзщваорщзварощваорзщваорщзворщваорвщзаровщзарощзваорщзваорщзваорщзворщващозр', 'доапощзжооазхролавзехрлозхвуорщзавощаворщзваорщзаворщзвпоршврпршвршщвурпшщувкрпшщвршщпвршпровщзаповщзрпщворпзщваорпзщваорщзварощваорзщваорщзворщваорвщзаровщзарощзваорщзваорщзваорщзворщващозр', '$2y$10$fhlMdLRfOB0HacKwpalZo.q5jGtoTflb1wDB1cZPeklvak.hyxMzm', 'admin'),
(6, '1', 'fodshfiusldfsdgfjsdgjufgsdjufgdsjyfgsduygfsdgfildsygfsiuygfuysdgfusdy', 'fodshfiusldfsdgfjsdgjufgsdjufgdsjyfgsduygfsdgfildsygfsiuygfuysdgfusdy', 'fodshfiusldfsdgfjsdgjufgsdjufgdsjyfgsduygfsdgfildsygfsiuygfuysdgfusdy', '$2y$10$UH7EjJKaFZY.CJjf3is3xebdf.Q.6JbWo7fLqQHD1uhZwaSnYS7z2', ''),
(7, 'admin123', 'Никита', 'Тотченко', 'Сергеевич', '$2y$10$ky78sANFQOwbdFgfkw6qQukbppfFzpS8ObgYkUtihn7uxglNgPkqq', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`),
  ADD CONSTRAINT `grade_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Ограничения внешнего ключа таблицы `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Ограничения внешнего ключа таблицы `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
--
-- База данных: `hz`
--
CREATE DATABASE IF NOT EXISTS `hz` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hz`;

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id` int(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id`, `role`) VALUES
(1, 'USER'),
(2, 'ADMIN');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `bdate` date NOT NULL,
  `password` varchar(60) NOT NULL,
  `dateAcc` date NOT NULL,
  `login` varchar(30) NOT NULL,
  `salt` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `countries` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `bdate`, `password`, `dateAcc`, `login`, `salt`, `name`, `lastname`, `surname`, `status_id`, `countries`) VALUES
(24, 'so.zatvornik.lo@gmail.com', '1223-02-12', '$2y$10$WJmcT5z9NDYlx6GxS93BIui.rH5FhzOu0cOE7RI/ZgINurgt5frEe', '2024-01-30', 'dash', '65b8adde7308e6.17575444', 'dajj', 'sdah', 'dsah', 2, ''),
(26, 'so.zatvornik.lo@gmail.com', '2024-01-11', '$2y$10$LWk7rj8xGc3LJXuc2ZXVy.BPHa7GWQ2OksHUYu5yiPc5v9fx051uq', '2024-01-30', 'NewUser', '65b8b4f973fbe9.06527508', 'Никита', 'Тотченко', 'Сергеевич', 2, 'Россия'),
(27, 'so.zatvornik.lo@gmail.com', '2024-01-06', '$2y$10$Iaq2AwVb2aygkUIGs64PheuKxU/Yeirbwj2PI96ibiyPeusecp9gG', '2024-01-30', 'Zellar123', '65b8b810bd49a8.82236544', 'вфывфы', 'вфывфы', 'вфывфы', 2, 'Россия'),
(29, 'so.zatvornik.lo@gmail.com', '2004-09-16', '$2y$10$vfjtk5690NTY/bLYpROHAO8MBOQLri2MBosB5fNwWz2Byf6jd5qmm', '2024-01-30', 'admin', '65b8b9a8875ba1.15119164', 'Никита', 'Тотченко', 'Сергеевич', 2, 'Россия'),
(30, 'so.zatvornik.lo@gmail.com', '2024-01-11', '$2y$10$s9Fh2Ibl3w05jfNMzwbO3O0t0ci4Y9363Fs4zma0tnXaal08XpJUq', '2024-01-30', 'user1234', '65b8bc96264119.74648969', 'Никита', 'Тотчекн', 'Сергеевич', 1, 'Россия'),
(31, 'so.zatvornik.lo@gmail.com', '0000-00-00', '$2y$10$e6v8gvySQb9tJohH8/eWNezIyKQ5Pg4dVYMFU8iviIHMloj.dzXoW', '2024-01-30', 'zellar1234', '65b8bdfa42fe97.74036570', 'вфывф', 'вфывфы', 'выфвфы', 1, 'Россия'),
(32, 'dsadsad@dsa.dsa', '0265-05-31', '$2y$10$2Jm2kecN2Pp5L6A7n6PfZeszfn0f2HQHOtq4UFMtjbRCLruuj17Jq', '2024-02-06', 'fddfds', '65c1e633df2fc6.61823978', 'fsddsa', 'fdsdas', 'fdsdas', 1, 'Россия');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_status` (`status_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);
--
-- База данных: `kursach4kurs`
--
CREATE DATABASE IF NOT EXISTS `kursach4kurs` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `kursach4kurs`;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `reviews_text` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `reviews_text`, `user_id`) VALUES
(2, 'люблю Никиту и Олега', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'student'),
(2, 'teacher');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(355) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `avatar` varchar(500) DEFAULT NULL,
  `telnumber` varchar(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`, `telnumber`, `subject`, `id_role`) VALUES
(3, 'Месропян Вардкес Вачаганович', 'vard', 'mesropyan@gmail.com', '$2y$10$y1ehSQwH05OGYWoCzmnWkukz3njTJ3SNzGDbr5VdZr7261mWiwTt2', 'uploads/1702359529R.jpg', '89885593535', '', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- База данных: `mobilestore`
--
CREATE DATABASE IF NOT EXISTS `mobilestore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mobilestore`;
--
-- База данных: `p4`
--
CREATE DATABASE IF NOT EXISTS `p4` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `p4`;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `bdate` date DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `bdate`, `password`, `email`) VALUES
(4, 'Zellar', '2004-09-16', '12345', 'so.zatvornik.lo@gmai'),
(5, 'Дима ', '2024-01-17', '123', 'so.@ddk'),
(6, 'Zel', '2024-01-16', '123', 'so.@fds');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- База данных: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Структура таблицы `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Дамп данных таблицы `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Структура таблицы `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Дамп данных таблицы `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"shop\",\"table\":\"users\"},{\"db\":\"shop\",\"table\":\"cart\"},{\"db\":\"webpcshop\",\"table\":\"user\"},{\"db\":\"webpcshop\",\"table\":\"role\"},{\"db\":\"shop\",\"table\":\"products\"},{\"db\":\"shop\",\"table\":\"cart_items\"},{\"db\":\"hz\",\"table\":\"status\"},{\"db\":\"hz\",\"table\":\"users\"},{\"db\":\"p4\",\"table\":\"user\"},{\"db\":\"p4\",\"table\":\"1\"}]');

-- --------------------------------------------------------

--
-- Структура таблицы `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Дамп данных таблицы `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'hz', 'users', '{\"CREATE_TIME\":\"2024-01-30 11:23:38\",\"col_order\":[0,1,3,2,4,5,6,7,8,9,10,11],\"col_visib\":[1,1,1,1,1,1,1,1,1,1,1,1]}', '2024-01-30 08:35:17'),
('root', 'p4', 'user', '{\"CREATE_TIME\":\"2024-01-16 11:57:43\",\"col_order\":[0,1,3,2,4],\"col_visib\":[1,1,1,1,1]}', '2024-01-16 09:02:07'),
('root', 'test', 'user', '{\"sorted_col\":\"`user`.`login` DESC\"}', '2023-12-20 06:52:04');

-- --------------------------------------------------------

--
-- Структура таблицы `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Дамп данных таблицы `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2024-02-27 06:40:39', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"ru\"}');

-- --------------------------------------------------------

--
-- Структура таблицы `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Структура таблицы `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Индексы таблицы `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Индексы таблицы `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Индексы таблицы `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Индексы таблицы `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Индексы таблицы `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Индексы таблицы `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Индексы таблицы `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Индексы таблицы `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Индексы таблицы `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Индексы таблицы `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Индексы таблицы `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Индексы таблицы `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Индексы таблицы `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Индексы таблицы `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Индексы таблицы `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Индексы таблицы `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Индексы таблицы `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- База данных: `pr27`
--
CREATE DATABASE IF NOT EXISTS `pr27` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pr27`;

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `article` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `author`, `article`) VALUES
(1, 'Петров', 'В своей статье рассказывает о машинах'),
(2, 'Иванов', 'Написал статью об инфляции.'),
(3, 'Сидоров ', 'Придумал новый химический элемент'),
(4, 'Осокина', 'Также писала о машинах'),
(5, 'Ветров ', 'Написал статью о том, как разрабатывать элементы дизайна');

-- --------------------------------------------------------

--
-- Структура таблицы `workers`
--

CREATE TABLE `workers` (
  `id` int(30) NOT NULL,
  `names` varchar(30) NOT NULL,
  `age` int(30) NOT NULL,
  `salary` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `workers`
--

INSERT INTO `workers` (`id`, `names`, `age`, `salary`) VALUES
(1, 'Дима', 23, 400),
(2, 'Петя', 25, 500),
(3, 'Вася', 23, 500),
(4, 'Коля', 30, 1000),
(5, 'Иван', 27, 500),
(6, 'Кирилл', 28, 1000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `workers`
--
ALTER TABLE `workers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- База данных: `registration`
--
CREATE DATABASE IF NOT EXISTS `registration` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `registration`;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `birthdate` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- База данных: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `quantity`, `price`) VALUES
(28, 1, NULL, NULL, NULL),
(43, 1, 8, NULL, NULL),
(46, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `image`, `name`, `description`, `price`, `user_id`) VALUES
(1, 'png/phone1.png', 'Lphone 15 pro max s', 'Экран6.67\" (2400x1080) AMOLED 120 Гц Память встроенная 240 ГБ, оперативная 32 ГБ Фото 4 камеры, основная 808 МП Аккумулятор 5050 мА·ч Процессор Qualcomm s 245G', '125000.00', NULL),
(2, 'png/phone10.png', 'Lphone 14 pro s', 'Экран6.67\" (2400x1080) AMOLED 120 Гц Память встроенная 228 ГБ, оперативная 8 ГБ Фото 4 камеры, основная 408 МП Аккумулятор 5020 мА·ч Процессор Qualcomm s 845G\r\n\r\n', '260000.00', NULL),
(3, 'png/phone13.png', 'Redmi note 13 pro', 'Экран6.67\" (2400x1080) AMOLED 120 Гц\r\nПамять встроенная 128 ГБ, оперативная 8 ГБ\r\nФото 4 камеры, основная 108 МП\r\nАккумулятор 5020 мА·ч\r\nПроцессор Qualcomm Snapdragon 732G', '34000.00', NULL),
(4, 'png/phone12.png', 'lphone 12 pro', 'Память: 128Gb\r\nДиагональ (дюйм): 6.1 OLED\r\nРазрешение (пикс): 2532x1170\r\nФотокамера (Мп): 12 + 12 (двойная)\r\nОптический зум: x2\r\nАккумулятор: 2815 мА·ч', '210000.00', NULL),
(5, 'png/phone14.png', 'Dimond qartz 56s', 'Экран 6.67\" (2712x1220) AMOLED 120 Гц\r\nПамять встроенная 256 ГБ, \r\nоперативная 8 ГБ\r\nФото 3 камеры, основная 64 МП\r\nАккумулятор 5100 мА·ч\r\nПроцессор Qualcomm Snapdragon 7s Gen2\r\nSIM + eSIM', '200000.00', NULL),
(6, 'png/phone15.png', 'Poco x101s', 'Экран 6.7\" (1344x2992) OLED 120 Гц\r\nПамять встроенная 128 ГБ, оперативная 12 ГБ\r\nФото 3 камеры, основная 50 МП\r\nАккумулятор 5050 мА·ч\r\nПроцессор Google Tensor G3\r\nSIM-карты Dual: nano SIM + eSIM', '125000.00', NULL),
(7, 'png/phone16.png', 'Lphone 13 Lpt s pro ', 'Экран 5.67\" (2712x1220) AMOLED 160 Гц Память встроенная 136 ГБ, оперативная 18 ГБ Фото 3 камеры, основная 164 МП Аккумулятор 9100 мА·ч Процессор ios 49x \r\nIos Tensor G5 SIM-карты Dual: nano SIM + eSIM\r\n\r\n', '200000.00', NULL),
(8, 'png/phone17.png', 'Google pixel s', 'Экран 6.7\" (1344x2992) OLED 120 Гц\r\nамять встроенная 128 ГБ, оперативная 12 ГБ\r\nФото 3 камеры, основная 50 МП\r\nАккумулятор 5050 мА·ч\r\nПроцессор Google Tensor G3\r\nSIM-карты Dual: nano SIM + eSIM', '45000.00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `password_change_date` date DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `password`, `email`, `created_at`, `password_change_date`, `username`, `lastname`, `role`) VALUES
(8, '$2y$10$.VmjoKLZsCsU/KyKjuUKHOtztj4CgQBLGhlGRAJ7qRrDA0wqoxMIS', 'kir@mail.ru', '2024-02-20 08:47:02', NULL, 'Копр', 'Допл', 'admin'),
(12, '$2y$10$mJOdrVA62OJEFSiYLqv.V.ohKgcRl/SnsQjL9AwbpXrs/Vv39ODE.', 'jeb@mail.ru', '2024-02-26 05:35:21', NULL, 'Абиби', 'Блуп', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
--
-- База данных: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(25) NOT NULL,
  `login` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(1, 'user', '12345'),
(2, 'admin', '12345');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- База данных: `webpcshop`
--
CREATE DATABASE IF NOT EXISTS `webpcshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `webpcshop`;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'USER'),
(2, 'ADMIN\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `fio`, `email`, `phone_num`, `password`, `role_id`) VALUES
(2, 'zellar', 'Тотченко Никита Сергеевич', 'so.zatvornik.lo@gmail.com', '89180846610', '$2y$10$hXXZLa5XN0hahVG1OXco8eGGRyMDQbJirtrnZZUHRvxzmSWgZptN.', 1),
(3, 'вфывф', 'вфывфы вфывыф фывфывфы', 'so.zavornik.lo@gmail.com', '89180846621', '$2y$10$St5.yyS2UmnHFnQ2aDX5ZubAPwIL/Nj8W.Ue6SAHoY3aRjRzGghoW', 1),
(4, 'dqa', 'iui dasda dsadas', 'so.zatrnik.lo@gmail.com', '89180746621', '$2y$10$PJxwxUbv5Of/z8cq.jWTa.MjVkIq45uXq5FppAq32Dp5XK5ak3l.u', 1),
(5, 'dasda', 'iui dadas dsada', 'so.zatik.lo@gmail.com', '89180746621', '$2y$10$VczN8Ax6f5cSBr6nZ3Z85.YOiwy/X5NRVaFqomsIi/zQEaaIRuPta', 1),
(6, 'admin', 'Тотченко Никита Сергеевич', 'so.zavarnik.lo@gmail.com', '89180846610', '$2y$10$J2CPPwn3Z/q0FBqYKkxh6e1k0B0nlEJq6j/DE873YNaej0PhHkjJC', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
--
-- База данных: `workers`
--
CREATE DATABASE IF NOT EXISTS `workers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `workers`;
--
-- База данных: `ваша_база_данных`
--
CREATE DATABASE IF NOT EXISTS `ваша_база_данных` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ваша_база_данных`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
