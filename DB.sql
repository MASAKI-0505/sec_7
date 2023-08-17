1111
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-08-17 10:16:49
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `movie`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `friends`
--

CREATE TABLE `friends` (
  `id` int(32) NOT NULL,
  `user_id` int(32) DEFAULT NULL,
  `friend_user_id` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_user_id`) VALUES
(1, 15, 14),
(4, 15, 16),
(5, 14, 15),
(6, 14, 16);

-- --------------------------------------------------------

--
-- テーブルの構造 `movies_data`
--

CREATE TABLE `movies_data` (
  `id` int(32) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `movies_data`
--

INSERT INTO `movies_data` (`id`, `title`) VALUES
(35, '仮面ライダー'),
(36, 'ウルトラマン'),
(37, 'ワンピース');

-- --------------------------------------------------------

--
-- テーブルの構造 `movies_review`
--

CREATE TABLE `movies_review` (
  `id` int(32) NOT NULL,
  `user_id` int(32) DEFAULT NULL,
  `day` date DEFAULT NULL,
  `movie_id` int(32) NOT NULL,
  `category` varchar(255) NOT NULL,
  `age` varchar(32) NOT NULL,
  `evaluation` int(32) NOT NULL,
  `story` varchar(512) NOT NULL,
  `impression` varchar(512) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `movies_review`
--

INSERT INTO `movies_review` (`id`, `user_id`, `day`, `movie_id`, `category`, `age`, `evaluation`, `story`, `impression`, `created_at`) VALUES
(35, 14, '2023-08-23', 35, 'アクション映画', '1950 年代', 1, '仮面ライダー', 'おもしろい', '2023-08-17 08:11:58'),
(36, 14, '2023-08-22', 36, 'アクション映画', '1950 年代', 1, '・・・', '楽しい', '2023-08-17 08:12:32'),
(37, 15, '2023-08-22', 37, 'アクション映画', '1950 年代', 1, '・・・・・', '面白かった。', '2023-08-17 08:14:19');

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `plans`
--

CREATE TABLE `plans` (
  `id` int(32) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `day` date NOT NULL,
  `plan` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `plans`
--

INSERT INTO `plans` (`id`, `user_id`, `day`, `plan`) VALUES
(18, 14, '2023-08-17', '映画を見る'),
(19, 14, '2023-08-29', '本を読む'),
(20, 14, '2023-09-21', '映画を見る。');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_data`
--

CREATE TABLE `users_data` (
  `id` int(32) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- テーブルのデータのダンプ `users_data`
--

INSERT INTO `users_data` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(14, '田中', 't@test', '$2y$10$2ByMglkQkcdDyFKnJ8BP6.deX6mAv0kI549qo3lJKbEPsFFii9btm', '2023-07-28 15:37:05'),
(15, '山田', 'test@test', '$2y$10$.EgPg8x29Mj4ND4s4tSET.g8u35D3Nu2Y9kZQVLKjKUcvfK5LbCim', '2023-08-02 13:45:19'),
(16, '鈴木', '1@test', '$2y$10$F29JhXTqf/ubmTlnuqqNfO4AZAcdGcEVdXCyOG0Ucf8IckLQfzioi', '2023-08-02 14:10:33');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `movies_data`
--
ALTER TABLE `movies_data`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `movies_review`
--
ALTER TABLE `movies_review`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `movies_data`
--
ALTER TABLE `movies_data`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- テーブルの AUTO_INCREMENT `movies_review`
--
ALTER TABLE `movies_review`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- テーブルの AUTO_INCREMENT `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- テーブルの AUTO_INCREMENT `users_data`
--
ALTER TABLE `users_data`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
