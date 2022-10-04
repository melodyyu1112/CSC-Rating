-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2022 年 10 月 04 日 17:32
-- 伺服器版本： 10.5.16-MariaDB
-- PHP 版本： 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `id19501158_mockrating`
--

-- --------------------------------------------------------

--
-- 資料表結構 `dz_thread`
--

CREATE TABLE `dz_thread` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `nickname` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `account` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `newRating` int(5) DEFAULT NULL,
  `content` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `content_negative` varchar(1024) CHARACTER SET utf8 DEFAULT NULL,
  `Revise_C` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Revise_C_N` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `q1` int(5) DEFAULT NULL,
  `q2` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `dz_thread`
--

INSERT INTO `dz_thread` (`id`, `product_id`, `nickname`, `account`, `rating`, `newRating`, `content`, `content_negative`, `Revise_C`, `Revise_C_N`, `ip`, `time`, `q1`, `q2`) VALUES
(284, 1, 'Tina', 'test1', 3, 3, '1-linke', '1', 'gg', 'g22', '120.101.3.151', '2022-10-04 08:32:36', 2, 1),
(286, 5, 'Tina', 'test1', 4, 5, '6', '5', 'secff', 'sef11', '120.101.3.151', '2022-10-04 08:34:41', NULL, NULL),
(288, 4, 'Tina', 'test1', 2, 2, 'r', 'r', 'rd', 'rd', '120.101.3.151', '2022-10-04 08:37:45', NULL, NULL),
(290, 2, 'Tina', 'test1', 4, 4, '8', '8', 'b11', 'b..', '120.101.3.151', '2022-10-04 08:40:30', 2, 2),
(291, 8, 'Tina', 'test1', 1, 1, 'cccc', 'ccccccc', '12', '1', '120.101.3.151', '2022-10-04 08:41:26', 2, 4),
(292, 6, 'Tina', 'test1', 2, 3, 'v', 'v', '6nn', '6nn', '120.101.3.151', '2022-10-04 08:42:12', NULL, NULL),
(295, 3, 'Tina', 'test1', 3, 3, '6', '6', '6nn', '6nn', '120.101.3.151', '2022-10-04 08:44:16', NULL, NULL),
(313, 7, 'Tina', 'test1', 1, 1, '1', '1', '12', '1', '120.101.3.151', '2022-10-04 17:26:49', 2, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`id`, `name`, `status`) VALUES
(1, '時尚皮帶', 0),
(2, '灰色踝襪', 0),
(3, '防水機車口罩', 0),
(7, '雪花深灰毛帽', 0),
(8, '黑色踝襪', 0),
(6, '褐色皮帶', 0),
(5, '純黑護膝', 0),
(4, '質感灰毛帽', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `profileimg`
--

CREATE TABLE `profileimg` (
  `status` int(11) NOT NULL,
  `account` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `profileimg`
--

INSERT INTO `profileimg` (`status`, `account`) VALUES
(0, 'test1'),
(1, 'test2'),
(1, '11'),
(0, 'sere'),
(1, 'test3'),
(0, 'demo'),
(1, 'ssssssssss'),
(1, 'hidihid');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` varchar(32) NOT NULL,
  `pwd` varchar(32) NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `pwd`, `nickname`, `is_admin`) VALUES
(1, 'test1', '827ccb0eea8a706c4c34a16891f84e7b', 'Tina', 1),
(2, 'test2', '827ccb0eea8a706c4c34a16891f84e7b', '小華華', 1),
(42, '11', '6512bd43d9caa6e02c990b0a82652dca', '11', 0),
(43, 'sere', '87697a92382d3302b376ae04117b203d', 'Lin', 0),
(44, 'test3', '827ccb0eea8a706c4c34a16891f84e7b', '咩咩', 0),
(53, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `dz_thread`
--
ALTER TABLE `dz_thread`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `dz_thread`
--
ALTER TABLE `dz_thread`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
