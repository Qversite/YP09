-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 05 2024 г., 08:49
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
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `captcha`
--

CREATE TABLE `captcha` (
  `id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `captcha`
--

INSERT INTO `captcha` (`id`, `value`, `expiration`) VALUES
(1, 5376, '2024-03-05 08:01:27'),
(2, 5207, '2024-03-05 08:01:27'),
(3, 6385, '2024-03-05 08:01:28');

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
(46, 1, NULL, NULL, NULL),
(78, 1, 12, NULL, NULL);

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
-- Структура таблицы `purchases`
--

CREATE TABLE `purchases` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(8, 'admin');

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
(8, '$2y$10$aCLJoYTCtp46KNYMBJOMhuEf3C36PN1iTFbRic7cB5rbD62Ra2xfy', 'kir@mail.ru', '2024-02-20 08:47:02', NULL, 'Копр', 'Допл', 'admin'),
(12, '$2y$10$mJOdrVA62OJEFSiYLqv.V.ohKgcRl/SnsQjL9AwbpXrs/Vv39ODE.', 'jeb@mail.ru', '2024-02-26 05:35:21', NULL, 'Абиби', 'Блуп', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`id`);

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
-- Индексы таблицы `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

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
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `captcha`
--
ALTER TABLE `captcha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- Ограничения внешнего ключа таблицы `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
