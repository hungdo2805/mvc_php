-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2021 lúc 11:51 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mvc_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(7, 'Bóng  đá'),
(8, 'Thời trang'),
(9, 'Thời tiết'),
(10, 'Bất động sản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `name_post`, `slug`, `content`, `category_id`, `tags`, `image`) VALUES
(11, 'Hôm nay trời lạnh thật', 'hom-nay-troi-lanh-that', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>\r\n', 8, 'new posts,hehehe,lạnh', 'nhung2.jpg'),
(20, 'Hôm nay trời lạnh thế', 'hom-nay-troi-lanh-the', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>\r\n\r\n<p><img alt=\"\" src=\"/public/userfiles/images/posts/Hyundai%20app-06.jpg\" style=\"height:356px; width:200px\" /></p>\r\n', 9, 'new posts,Hôm nay trời lạnh thế', 'anh-so-3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permision` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `address`, `permision`) VALUES
(6, 'admin', '$2y$10$q/Puqn9w.vGNx9TpASMOOuqq1.PcIiNJyKmSxzzoJ45W2.cpwYms2', 'Hùng Văn Đỗ', 'dohung28599@gmail.com', 'Xã Quyết Thắng- Thành Phố Thái Nguyên- tỉnh Thái Nguyên', 1),
(11, 'admin1', '$2y$10$LuYKmYaabYYto7BBVgTOKeJeCr/pHlMUk4.3Zd3sFuGscQqj3qX9u', 'HungDev', 'admin@gmail.com', 'Xã Quyết Thắng- Thành Phố Thái Nguyên- tỉnh Thái Nguyên', 0),
(12, 'admin2', '$2y$10$YpK/lnpVL8qMCHOPgkKRm.GIHczsnwIkGZtBwv6d42p1iEKZTJ52i', 'admin2', 'admin2@gmaiil.com', 'fdgdfgdgf, gfdg', 0),
(13, 'admin3', '$2y$10$EDsNo4FgwkjF5IWnB1mIjOJHpXaLaeVnGa8KO.1K2RwPD2x4MX7Ri', 'admin3', 'admin3@gmaiil.com', 'Xã Quyết Thắng- Thành Phố Thái Nguyên- tỉnh Thái Nguyên', 0),
(14, 'admin4', '$2y$10$iHwngqZtwzRmQxiCknWksO8TLB1oxAVGzj0gEqTHAXKrtJcw9J8gW', 'admin4', 'admin4@gmaiil.com', 'fdgdfgdgf, gfdg', 0),
(15, 'admin5', '$2y$10$X/bz4GFA2BZktBb2GNe7OuW0szwGHOTyUZdpFyD0OhNQwq8trjCSq', 'admin5', 'admin5@gmail.com', 'fdgdfgdgf, gfdg', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
