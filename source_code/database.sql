-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2022 lúc 06:33 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `feature` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image`, `category_id`, `feature`, `active`) VALUES
(1, 'Pizza Golden 4 Cheese', 'Phủ phô mai Gouda thơm vàng', '309.00', '\"/images/Pizza1.png\"', 0, 'True', 'True'),
(2, 'Pizza Hải Sản Pesto Xanh', 'Tôm, cua, mực và bông cải xanh tươi ngon trên nền sốt Pesto Xanh', '169.00', '\"/images/Pizza2.png\"', 0, 'True', 'True'),
(3, 'Pizza Hải Sản Nhiệt Đới', 'Tôm, nghêu, mực cua, dứa với sốt Thousand Island', '139.00', '\"/images/Pizza3.png\"', 0, 'True', 'True'),
(4, 'Pizza Aloha', 'Thịt nguội, xúc xích tiêu cay và dứa hòa quyện với sốt Thousand Island', '139.00', '\"/images/Pizza4.png\"', 0, 'True', 'True'),
(5, 'Pizza Gà Nướng 3 Vị', 'Gà nướng, gà bơ tỏi và gà ướp sốt nấm', '129.00', '\"/images/Pizza5.png\"', 0, 'True', 'True'),
(6, 'Pizza Thịt Nguội Kiểu Canada', 'Sự kết hợp giữa thịt nguội và bắp ngọt', '129.00', '\"/images/Pizza6.png\"', 0, 'True', 'True'),
(7, 'Pizza 5 Loại Thịt Đặc Biệt', 'Xúc xích lợn và bò đặc trưng của Ý, giăm bông, thịt xông khói', '129.00', '\"/images/Pizza7.png\"', 0, 'True', 'True'),
(8, 'Pizza Hawaiian', 'Giăm bông, thịt muối và dứa ', '119.00', '\"/images/Pizza8.png\"', 0, 'True', 'True'),
(9, 'Pizza Phô Mai', 'Bánh Pizza với vô vàn phô mai để bạn tha hồ tận hưởng', '119.00', '\"/images/Pizza9.png\"', 0, 'True', 'True'),
(10, 'Pepsi', 'Lon', '29.00', '\"/images/Drink1.png\"', 1, 'True', 'True'),
(11, '7up', 'Lon', '29.00', '\"/images/Drink2.png\"', 1, 'True', 'True'),
(12, 'Coca Cola', 'Lon', '29.00', '\"/images/Drink3.png\"', 1, 'True', 'True'),
(13, 'Pepsi Black', 'Lon', '29.00', '\"/images/Drink4.png\"', 1, 'True', 'True'),
(14, 'Mirinda Soda Kem', 'Lon', '29.00', '\"/images/Drink5.png\"', 1, 'True', 'True'),
(15, 'Aquafina', 'Chai', '29.00', '\"/images/Drink6.png\"', 1, 'True', 'True'),
(16, 'Trà sữa Tea Break', 'Chai', '29.00', '\"/images/Drink7.png\"', 1, 'True', 'True'),
(17, 'All-Free nước uống vị lúa mạch', 'Lon', '29.00', '\"/images/Drink8.png\"', 1, 'True', 'True'),
(18, 'Pepsi Black Lime', 'Lon', '29.00', '\"/images/Drink9.png\"', 1, 'True', 'True'),
(19, 'Ricotta Cheese, Parma Ham Wrap', 'Phô mai Riotta thơm béo và thịt xông khói', '89.00', '\"/images/Side1.png\"', 2, 'True', 'True'),
(20, 'Khoai tây đút lò', 'Khoai tây nướng lò ăn cùng sốt kem', '49.00', '\"/images/Side2.png\"', 2, 'True', 'True'),
(21, 'Salad cá ngừ', 'Rau củ và cá ngừ sốt giấm', '69.00', '\"/images/Side3.png\"', 2, 'True', 'True'),
(22, 'Xúc xích xông khói đút lò', 'Xúc xích đức sốt BBQ', '69.00', '\"/images/Side4.png\"', 2, 'True', 'True'),
(23, 'Gà tẩm bột rán', 'Cánh gà được phủ bởi một lớp bột chiên giòn', '79.00', '\"/images/Side5.png\"', 2, 'True', 'True'),
(24, 'Mì Ý sốt kem hải sản', 'Mỳ Ý rán với các loại hải sản tươi ngon cùng sốt kem', '89.00', '\"/images/Side6.png\"', 2, 'True', 'True'),
(25, 'Salad Cá hồi Na-uy', 'Salad với cá hồi Na-uy với bắp cải đỏ, cà chua bi, ngô với sốt Yuzu', '89.00', '\"/images/Side7.png\"', 2, 'True', 'True'),
(26, 'Salad Cam', 'Sự kết hợp tươi ngon giữ rau củ và cam', '59.00', '\"/images/Side8.png\"', 2, 'True', 'True'),
(27, 'Nui Bỏ Lò Hải Sản Sốt Hương Nhu', 'Đánh thức vị giác với sốt hương nhu độc đáo, kết hợp cùng hải sản tươi ngon đậm đà', '59.00', '\"/images/Side9.png\"', 2, 'True', 'True');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privil` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `full_name`, `username`, `password`, `privil`, `email`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@gmail.com'),
(2, 'staff', 'staff', 'staff', 'staff', 'staff@gmail.com'),
(3, 'user', 'user', 'user', 'user', 'user@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
