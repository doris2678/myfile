-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-06-18 02:15:49
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `files`
--

-- --------------------------------------------------------

--
-- 資料表結構 `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(16) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `uploads`
--

INSERT INTO `uploads` (`id`, `type`, `name`, `description`, `created_at`) VALUES
(9, 'image', '00.png', '0000', '2025-06-16 05:25:30'),
(10, 'image', '01.png', '01', '2025-06-16 05:29:01'),
(11, 'image', '02.png', '02', '2025-06-16 05:29:15'),
(12, 'image', '03.png', '03', '2025-06-16 05:29:34'),
(13, 'image', '04.png', '04', '2025-06-16 05:29:47'),
(14, 'image', '05.png', '05', '2025-06-16 05:29:59'),
(15, 'image', '06.png', '06', '2025-06-16 05:30:41'),
(16, 'image', '07.png', '07', '2025-06-16 05:30:53'),
(17, 'image', '08.png', '08', '2025-06-16 05:31:02'),
(18, 'image', '09.png', '09', '2025-06-16 05:31:15'),
(19, 'image', '10.png', '10', '2025-06-16 05:31:25'),
(20, 'image', '01.png', '13', '2025-06-16 05:31:43'),
(21, 'image', '12.png', '12', '2025-06-16 05:31:55'),
(22, 'image', '13.png', '13', '2025-06-16 05:32:06'),
(23, 'image', '14.png', '14', '2025-06-16 05:32:16'),
(24, 'image', '15.png', '15', '2025-06-16 05:32:26'),
(25, 'image', '16.png', '16', '2025-06-16 05:32:39'),
(26, 'image', '17.png', '17', '2025-06-16 05:32:49'),
(27, 'image', '18.png', '18', '2025-06-16 05:33:04'),
(28, 'image', '19.png', '19', '2025-06-16 05:33:13'),
(29, 'image', '20.png', '20', '2025-06-16 05:33:23'),
(30, 'image', '21.png', '21', '2025-06-16 05:33:32'),
(31, 'image', '22.png', '22', '2025-06-16 05:33:40'),
(32, 'image', '23.png', '23', '2025-06-16 05:33:48'),
(33, 'image', '24.png', '24', '2025-06-16 05:33:57'),
(34, 'image', '25.png', '25', '2025-06-16 05:34:07'),
(35, 'image', '26.png', '26', '2025-06-16 05:34:16'),
(36, 'image', '27.png', '27', '2025-06-16 05:34:25'),
(37, 'image', '28.png', '28', '2025-06-16 05:34:34'),
(38, 'image', '06.png', '0602', '2025-06-16 05:35:30'),
(39, 'image', '09.png', '0902', '2025-06-16 05:35:41'),
(40, 'image', '21.png', '2102', '2025-06-16 05:35:53'),
(41, 'image', '25.png', '2502', '2025-06-16 05:36:07'),
(42, 'image', '13.png', '1302', '2025-06-16 05:36:20'),
(43, 'image', '23.png', '2302', '2025-06-16 05:36:57'),
(44, 'image', '00.png', '00-2', '2025-06-17 01:01:03'),
(46, 'image', '03.png', '03-3', '2025-06-17 01:15:17'),
(47, 'image', '06.png', '03-3', '2025-06-17 01:15:50'),
(48, 'image', '06.png', '03-3', '2025-06-17 01:16:27'),
(49, 'image', '00.png', '00-4', '2025-06-17 01:24:43');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
