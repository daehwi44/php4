-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-06-09 17:10:47
-- サーバのバージョン： 10.4.24-MariaDB
-- PHP のバージョン: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacy_d02_01`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `tango_table`
--

CREATE TABLE `tango_table` (
  `id` int(11) NOT NULL,
  `tango` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `nihongo` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `tango_table`
--

INSERT INTO `tango_table` (`id`, `tango`, `nihongo`, `created_at`, `updated_at`) VALUES
(7, 'grape', 'ブドウ', '2022-05-26 20:44:27', '2022-06-07 23:38:09'),
(8, 'banana', 'バナナ', '2022-05-26 23:12:44', '2022-06-07 23:38:03'),
(9, '안녕하세요', 'こんにちは', '2022-05-26 23:16:00', '2022-05-26 23:16:00'),
(13, 'apple', 'リンゴ', '2022-06-09 01:02:22', '2022-06-09 01:02:22');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `tango_table`
--
ALTER TABLE `tango_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `tango_table`
--
ALTER TABLE `tango_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
