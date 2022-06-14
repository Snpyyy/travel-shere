-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 5 月 11 日 15:43
-- サーバのバージョン： 5.7.34
-- PHP のバージョン: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `travel_shere`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `goods`
--

INSERT INTO `goods` (`id`, `user_id`, `travel_id`, `updated_at`, `created_at`) VALUES
(86, 1, 39, '2022-05-09 07:03:10', '2022-05-09 07:03:10'),
(87, 9, 44, '2022-05-09 07:03:51', '2022-05-09 07:03:51'),
(101, 1, 43, '2022-05-09 14:32:46', '2022-05-09 14:32:46'),
(102, 1, 10, '2022-05-09 16:38:32', '2022-05-09 16:38:32'),
(104, 1, 1, '2022-05-09 16:40:57', '2022-05-09 16:40:57'),
(105, 6, 76, '2022-05-09 19:27:07', '2022-05-09 19:27:07'),
(107, 10, 76, '2022-05-09 19:52:53', '2022-05-09 19:52:53');

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_04_10_071957_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('snpy.it@gmail.com', '$2y$10$tkG3RU9wO6lFK45uwKeTD.Jpi5viC8.6ySCpKlq.OYJrXu3MbEx3K', '2022-05-08 18:48:47');

-- --------------------------------------------------------

--
-- テーブルの構造 `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2KR33wcP7souLeUj9wbRv5EbQjOtJt4dguzYpRnS', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkxOUFUzQzR0SEN3bno0RlFodm9RclMwWXVxMkk0dVlxR1F3VTlZViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1652160790),
('KnlrIDrfNxY6e93UFqAFrFZG9gdu13EcWhhz7V2Q', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUm9XT0hQWlY2UTk1ZUEwbFdYWnp4YTVkbWRsRmZuMVhlVHhFWWxsdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC92aWV3P2lkPTc2Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1652172115),
('kpfzVTpsTGavNjoAdcre0HZYvRCKVaVSNvk462ld', 10, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaDZqeUNPWlZXd2cyMW5BZFAxSTZialM1UzFlOWt4MHp5eER0cjg5biI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEwO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkZWxyOGwub0RXSFgvUTZyUmRvZ2JCZUZ6YTFRSG1SNEZOT2E0dDFLZi5YcWxWNzRabmhXNlciO30=', 1652158472),
('QDTJOvv7ZcOa7F7GXRZgZS47y5TRU6JynBn2VTzI', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYUt4RmJKUGN6TUhaOTFFY0NzWVZ2emE4NmFGSjJIVDc2MUs2bW95NiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRZNk45SFltTVc4ZkRqZTZvN2NMcExPNllQejE3MUFBV0JKeTNkVGlqVlVGTnBSY1kvczB1UyI7fQ==', 1652251387);

-- --------------------------------------------------------

--
-- テーブルの構造 `travels`
--

CREATE TABLE `travels` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `message` varchar(1000) NOT NULL,
  `release_flg` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `travels`
--

INSERT INTO `travels` (`id`, `user_id`, `destination_id`, `title`, `sub_title`, `message`, `release_flg`, `created_at`) VALUES
(1, 1, 1, '北海道旅行!!', '遊びまくろう！', '', 0, '2022-04-07 07:02:53'),
(3, 1, 1, '函館旅行!!', '', '', 0, '2022-04-07 07:14:22'),
(10, 1, 27, '大阪旅行', 'USJを満喫しよう！！！', '大阪旅行の\"良い所\"を詰め合わせました！\r\n旅行に行く際は、参考にどうぞ', 0, '2022-05-06 08:03:44'),
(76, 6, 26, '世界遺産「清水寺」をめぐる王道コース', '京都旅行に欠かせない定番スポット「清水寺」を軸にしたコース。', '京都旅行にぜひ参考にしてください', 0, '2022-05-10 04:26:58');

-- --------------------------------------------------------

--
-- テーブルの構造 `travel_brochures`
--

CREATE TABLE `travel_brochures` (
  `id` int(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `traffic_method` varchar(10) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `travel_brochures`
--

INSERT INTO `travel_brochures` (`id`, `travel_id`, `date`, `traffic_method`, `time`, `title`, `body`, `created_at`) VALUES
(1, 1, '2022-04-11', '飛行機', '17:30:00', '札幌飛行場着', '', '2022-04-07 07:05:01'),
(2, 1, '2022-04-11', '飛行機', '17:50:00', '札幌飛行場発', '20番ゲート出口 札幌駅方面行きバス25号', '2022-04-07 07:05:58'),
(6, 3, '2022-09-20', 'バス', '08:00:00', '函館空港発', '函館空港 乗り場3番\n    料金230円\n    所要時間 5分', '2022-04-07 07:18:04'),
(7, 3, '2022-09-20', 'バス', '08:05:00', '湯の川温泉着', '料金1000円', '2022-04-07 07:19:31'),
(10, 10, '2022-05-19', '', '08:00:00', '大阪駅出発', '電車： テスト線テスト方面行き\r\n約30分', '2022-05-06 08:03:44'),
(11, 10, '2022-05-19', '徒歩', '08:30:00', 'テスト市場', '見どころ： (滞在時間: 約60分)\r\n・大阪随一の観光スポット\r\n・大阪に来たならココはぜひ行っておきたい\r\n・特におすすめは、テスト串。100円', '2022-05-06 08:03:44'),
(12, 10, '2022-05-19', '徒歩', '09:00:00', 'テスト神社', '見どころ：　(滞在時間: 約30分)\r\n・由緒正しき神社。\r\n・神社巡りが好きな方はココも外せない！', '2022-05-06 08:03:44'),
(13, 10, '2022-05-20', '', '10:00:00', '2日目〜', '備考\r\n・1日目でココ！という場所はもう見たので、\r\n2日目は各自自由に回りましょう〜', '2022-05-06 08:03:44'),
(14, 10, '2022-05-21', '', '10:00:00', '3日目もあるなら・・・', '2日目、3日目を使い、京都に観光に行ってみるのもおすすめです。', '2022-05-06 08:03:44'),
(19, 11, '2022-05-21', '', '10:00:00', '3日目もあるなら・・・', '2日目、3日目を使い、京都に観光に行ってみるのもおすすめです。', '2022-05-06 08:23:19'),
(113, 76, '2022-05-10', '徒歩', '10:00:00', '清水寺', '【滞在時間目安】約1時間30分\r\n\r\n春夏秋冬楽しめる美しい景色が魅力。夜のライトアップも\r\n\r\n世界遺産にも登録され、京都に旅行に行く多くの人が訪れる「清水寺」。', '2022-05-10 04:26:58'),
(114, 76, '2022-05-10', '徒歩', '12:00:00', '金剛寺（八坂庚申堂）', '【滞在時間目安】約20分\r\n\r\n京都の中でも清水寺や八坂神社などがある「東山」は、京都観光でも欠かせないエリア。', '2022-05-10 04:26:58'),
(115, 76, '2022-05-10', '徒歩', '12:50:00', '安井金比羅宮', '【滞在時間目安】約30分\r\n\r\n京都の安井金比羅宮は最強の縁切り神社！\r\n\r\n多くの観光客が集まる京都東山。なかでも安井金比羅宮は比較的若いかたが多く、パワースポットとしてにぎわっています。', '2022-05-10 04:26:58'),
(116, 76, '2022-05-10', '徒歩', '13:00:00', '〜Lunch Time〜', '昼食タイム', '2022-05-10 04:26:58'),
(117, 76, '2022-05-10', '徒歩', '14:00:00', ' 建仁寺', '【滞在時間目安】約30分', '2022-05-10 04:26:58'),
(118, 76, '2022-05-10', '徒歩', '14:40:00', '八坂神社', '【滞在時間目安】約1時間\r\n\r\n「美の神様」も祀られているパワースポット!', '2022-05-10 04:26:58'),
(119, 76, '2022-05-10', '徒歩', '16:00:00', '〜where to go〜', '', '2022-05-10 04:26:58');

-- --------------------------------------------------------

--
-- テーブルの構造 `travel_destinations`
--

CREATE TABLE `travel_destinations` (
  `id` int(11) NOT NULL,
  `country` int(11) NOT NULL DEFAULT '0',
  `location_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `travel_destinations`
--

INSERT INTO `travel_destinations` (`id`, `country`, `location_name`, `created_at`) VALUES
(1, 0, '北海道', '2022-04-07 05:00:07'),
(2, 0, '青森', '2022-04-07 05:00:07'),
(3, 0, '岩手', '2022-04-07 05:00:07'),
(4, 0, '宮城', '2022-04-07 05:00:07'),
(5, 0, '秋田', '2022-04-07 05:00:07'),
(6, 0, '山形', '2022-04-07 05:00:07'),
(7, 0, '福島', '2022-04-07 05:00:07'),
(8, 0, '茨城', '2022-04-07 05:00:07'),
(9, 0, '栃木', '2022-04-07 05:00:07'),
(10, 0, '群馬', '2022-04-07 05:00:07'),
(11, 0, '埼玉', '2022-04-07 05:00:07'),
(12, 0, '千葉', '2022-04-07 05:00:07'),
(13, 0, '東京', '2022-04-07 05:00:07'),
(14, 0, '神奈川', '2022-04-07 05:00:07'),
(15, 0, '新潟', '2022-04-07 05:00:07'),
(16, 0, '富山', '2022-04-07 05:00:07'),
(17, 0, '石川', '2022-04-07 05:00:07'),
(18, 0, '福井', '2022-04-07 05:00:07'),
(19, 0, '山梨', '2022-04-07 05:00:07'),
(20, 0, '長野', '2022-04-07 05:00:07'),
(21, 0, '岐阜', '2022-04-07 05:00:07'),
(22, 0, '静岡', '2022-04-07 05:00:07'),
(23, 0, '愛知', '2022-04-07 05:00:07'),
(24, 0, '三重', '2022-04-07 05:00:07'),
(25, 0, '滋賀', '2022-04-07 05:00:07'),
(26, 0, '京都', '2022-04-07 05:00:07'),
(27, 0, '大阪', '2022-04-07 05:00:07'),
(28, 0, '兵庫', '2022-04-07 05:00:07'),
(29, 0, '奈良', '2022-04-07 05:00:07'),
(30, 0, '和歌山', '2022-04-07 05:00:07'),
(31, 0, '鳥取', '2022-04-07 05:00:07'),
(32, 0, '島根', '2022-04-07 05:00:07'),
(33, 0, '岡山', '2022-04-07 05:00:07'),
(34, 0, '広島', '2022-04-07 05:00:07'),
(35, 0, '山口', '2022-04-07 05:00:07'),
(36, 0, '徳島', '2022-04-07 05:00:07'),
(37, 0, '香川', '2022-04-07 05:00:07'),
(38, 0, '愛媛', '2022-04-07 05:00:07'),
(39, 0, '高知', '2022-04-07 05:00:07'),
(40, 0, '福岡', '2022-04-07 05:00:07'),
(41, 0, '佐賀', '2022-04-07 05:00:07'),
(42, 0, '長崎', '2022-04-07 05:00:07'),
(43, 0, '熊本', '2022-04-07 05:00:07'),
(44, 0, '大分', '2022-04-07 05:00:07'),
(45, 0, '宮崎', '2022-04-07 05:00:07'),
(46, 0, '鹿児島', '2022-04-07 05:00:07'),
(47, 0, '沖縄', '2022-04-07 05:00:07');

-- --------------------------------------------------------

--
-- テーブルの構造 `travel_note`
--

CREATE TABLE `travel_note` (
  `id` int(11) NOT NULL,
  `travel_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(3000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `travel_note`
--

INSERT INTO `travel_note` (`id`, `travel_id`, `title`, `body`, `created_at`) VALUES
(1, 1, '宿泊するホテル', 'ホテルオークラ札幌 一泊1万円', '2022-04-07 07:03:16'),
(7, 10, '持ち物', '・お薬\r\n・スマホ\r\n・現金\r\n・ハンカチ\r\n・ティッシュ', '2022-05-06 08:03:44'),
(8, 10, '大阪観光スポット', '・テスト市\r\n・テスト橋\r\n・テスト神社', '2022-05-06 08:03:44'),
(73, 76, '', '', '2022-05-10 04:26:58');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@test.jp', NULL, '$2y$10$Y6N9HYmMW8fDje6o7cLpLO6YPz171AAWBJy3dTijVUFNpRcY/s0uS', NULL, NULL, NULL, 'aYwze9aPkS9fA2S2KDhCY4D2USHhtkYTBPliNXnZN2Y9p2et5r7UnkXcuTdr', NULL, NULL, '2022-04-09 22:30:35', '2022-05-10 21:41:22'),
(5, 'ユーザー', 'user@test.jp', NULL, '$2y$10$AWi6cs7KQWie6Z/ilhydN.10FyZhz99C5UqJBjgf8OYpXMdXAHgdS', NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-25 21:14:51', '2022-04-25 21:14:51'),
(6, 'サトウ', 'sato@test.jp', NULL, '$2y$10$BWWl5U0JJg6gEc1x/YSUd.fMde68Ew9H94upLYQOKo1FevAQuEQoq', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-06 21:40:36', '2022-05-06 21:40:36'),
(9, '佐々木', 'sasaki@test.jp', NULL, '$2y$10$AR.Av3wzDev47ivmpjmEKugwBwLftBAQMIb2nZ3Hf9kI1iEzekxKe', NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-09 07:03:49', '2022-05-09 07:03:49');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- テーブルのインデックス `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `travel_id` (`travel_id`) USING BTREE,
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- テーブルのインデックス `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- テーブルのインデックス `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `travel_brochures`
--
ALTER TABLE `travel_brochures`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `travel_destinations`
--
ALTER TABLE `travel_destinations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `location_name` (`location_name`);

--
-- テーブルのインデックス `travel_note`
--
ALTER TABLE `travel_note`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- テーブルの AUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- テーブルの AUTO_INCREMENT `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- テーブルの AUTO_INCREMENT `travel_brochures`
--
ALTER TABLE `travel_brochures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- テーブルの AUTO_INCREMENT `travel_destinations`
--
ALTER TABLE `travel_destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- テーブルの AUTO_INCREMENT `travel_note`
--
ALTER TABLE `travel_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- テーブルの AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
