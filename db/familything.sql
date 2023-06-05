-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-06-04 10:54:35
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `familything`
--

-- --------------------------------------------------------

--
-- 資料表結構 `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` varchar(32) NOT NULL,
  `description` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `categories`
--

INSERT INTO `categories` (`id`, `category`, `description`) VALUES
(2, '用的', 'test1'),
(3, '食物', 'test2'),
(4, '結婚紀念日', 'test3');

-- --------------------------------------------------------

--
-- 資料表結構 `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `desc` text NOT NULL,
  `type` text NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `mem_id` int(10) NOT NULL,
  `project_id` int(10) NOT NULL,
  `img_id` int(10) UNSIGNED NOT NULL,
  `topic_id` int(10) NOT NULL,
  `vote_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `records` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `acc` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL,
  `pr` varchar(16) NOT NULL DEFAULT 'member',
  `nickname` varchar(32) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(64) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `acc`, `pw`, `pr`, `nickname`, `tel`, `email`, `created_time`) VALUES
(1, 'admin', 'cc100', '0', 'Cerry', '0911123456', 'cerry.c@gmail.com', '2023-05-24 12:04:07');

-- --------------------------------------------------------

--
-- 資料表結構 `optionsv`
--

CREATE TABLE `optionsv` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text NOT NULL,
  `total` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `summary`
--

CREATE TABLE `summary` (
  `id` int(10) UNSIGNED NOT NULL,
  `project` varchar(32) NOT NULL,
  `category_id` int(10) NOT NULL,
  `details` text NOT NULL,
  `amount` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `class` tinyint(1) NOT NULL,
  `effective_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `private` tinyint(1) NOT NULL,
  `continuous` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `summary`
--

INSERT INTO `summary` (`id`, `project`, `category_id`, `details`, `amount`, `price`, `class`, `effective_time`, `created_time`, `updated_time`, `private`, `continuous`) VALUES
(5, 'Array', 2, 'Array', 0, 0, 0, '2023-05-25 15:56:16', '2023-05-25 15:56:16', '2023-05-25 15:56:16', 0, 0),
(6, '晚餐', 3, '荷包蛋', 4, 600, 0, '2023-05-28 05:44:35', '2023-05-25 16:14:14', '2023-05-28 05:44:35', 1, 1),
(7, '晚餐', 3, '荷包蛋', 4, 600, 1, '2023-05-28 05:44:47', '2023-05-25 16:20:49', '2023-05-28 05:44:47', 1, 0),
(8, '8周年結婚紀念', 4, '淡水二樓餐廳用餐', 1, 1200, 0, '2023-05-31 14:59:35', '2023-05-31 14:59:35', '2023-05-31 14:59:35', 0, 0),
(9, '8周年結婚紀念', 4, '淡水二樓餐廳用餐', 1, 1200, 0, '2023-05-31 15:02:40', '2023-05-31 15:02:40', '2023-05-31 15:02:40', 0, 0),
(10, '8周年結婚紀念', 4, '淡水二樓餐廳用餐', 1, 1200, 0, '2023-05-31 15:03:24', '2023-05-31 15:03:24', '2023-05-31 15:03:24', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `topicsv`
--

CREATE TABLE `topicsv` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(32) NOT NULL,
  `open_time` datetime NOT NULL,
  `close_time` datetime NOT NULL,
  `type` tinyint(1) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `optionsv`
--
ALTER TABLE `optionsv`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `topicsv`
--
ALTER TABLE `topicsv`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `optionsv`
--
ALTER TABLE `optionsv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `summary`
--
ALTER TABLE `summary`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `topicsv`
--
ALTER TABLE `topicsv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
