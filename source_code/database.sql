-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 22, 2022 lúc 08:40 AM
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Đang đổ dữ liệu cho bảng `tbl_food`
--

INSERT INTO `tbl_food` (`id` , `title` , `description` , `price` , `image` , `category_id` , `feature` , `active` ) VALUES
(NULL, 'Pizza Golden 4 Cheese' , 'Phủ phô mai Gouda thơm vàng' , '309.000 VNĐ', '\"/images/Pizza1.png\"', '0' ,'True','True'),
(NULL, 'Pizza Hải Sản Pesto Xanh' , 'Tôm, cua, mực và bông cải xanh tươi ngon trên nền sốt Pesto Xanh' , '169.000 VNĐ', '\"/images/Pizza2.png\"', '0' ,'True','True'),
(NULL, 'Pizza Hải Sản Nhiệt Đới' , 'Tôm, nghêu, mực cua, dứa với sốt Thousand Island' , '139.000 VNĐ', '\"/images/Pizza3.png\"', '0' ,'True','True'),
(NULL, 'Pizza Aloha' , 'Thịt nguội, xúc xích tiêu cay và dứa hòa quyện với sốt Thousand Island' , '139.000 VNĐ', '\"/images/Pizza4.png\"', '0' ,'True','True'),
(NULL, 'Pizza Gà Nướng 3 Vị' , 'Gà nướng, gà bơ tỏi và gà ướp sốt nấm' , '129.000 VNĐ', '\"/images/Pizza5.png\"', '0' ,'True','True'),
(NULL, 'Pizza Thịt Nguội Kiểu Canada' , 'Sự kết hợp giữa thịt nguội và bắp ngọt' , '129.000 VNĐ', '\"/images/Pizza6.png\"',  '0' ,'True','True'),
(NULL, 'Pizza 5 Loại Thịt Đặc Biệt' , 'Xúc xích lợn và bò đặc trưng của Ý, giăm bông, thịt xông khói' , '129.000 VNĐ', '\"/images/Pizza7.png\"', '0' ,'True','True'),
(NULL, 'Pizza Hawaiian' , 'Giăm bông, thịt muối và dứa ' , '119.000 VNĐ', '\"/images/Pizza8.png\"', '0' ,'True','True'),
(NULL, 'Pizza Phô Mai' , 'Bánh Pizza với vô vàn phô mai để bạn tha hồ tận hưởng' , '119.000 VNĐ', '\"/images/Pizza9.png\"', '0' ,'True','True'),
(NULL, 'Pepsi' , 'Lon' , '29.000 VNĐ', '\"/images/Drink1.png\"',  '2' ,'True','True'),
(NULL, '7up' , 'Lon' , '29.000 VNĐ', '\"/images/Drink2.png\"',  '2' ,'True','True'),
(NULL, 'Coca Cola' , 'Lon' , '29.000 VNĐ', '\"/images/Drink3.png\"', '2' ,'True','True'),
(NULL, 'Pepsi Black' , 'Lon' , '29.000 VNĐ', '\"/images/Drink4.png\"', '2' ,'True','True'),
(NULL, 'Mirinda Soda Kem' , 'Lon' , '29.000 VNĐ', '\"/images/Drink5.png\"', '2' ,'True','True'),
(NULL, 'Aquafina' , 'Chai' , '29.000 VNĐ', '\"/images/Drink6.png\"', '2' ,'True','True'),
(NULL, 'Trà sữa Tea Break' , 'Chai' , '29.000 VNĐ', '\"/images/Drink7.png\"', '2' ,'True','True'),
(NULL, 'All-Free nước uống vị lúa mạch' , 'Lon' , '29.000 VNĐ', '\"/images/Drink8.png\"',  '2' ,'True','True'),
(NULL, 'Pepsi Black Lime' , 'Lon' , '29.000 VNĐ', '\"/images/Drink9.png\"', '2' ,'True','True'),
(NULL, 'Ricotta Cheese, Parma Ham Wrap' , 'Phô mai Riotta thơm béo và thịt xông khói' , '89.000 VNĐ', '\"/images/Side1.png\"', '1' ,'True','True'),
(NULL, 'Khoai tây đút lò' , 'Khoai tây nướng lò ăn cùng sốt kem' , '49.000 VNĐ', '\"/images/Side2.png\"', '1' ,'True','True'),
(NULL, 'Salad cá ngừ' , 'Rau củ và cá ngừ sốt giấm' , '69.000 VNĐ', '\"/images/Side3.png\"', '1' ,'True','True'),
(NULL, 'Xúc xích xông khói đút lò' , 'Xúc xích đức sốt BBQ' , '69.000 VNĐ', '\"/images/Side4.png\"', '1' ,'True','True'),
(NULL, 'Gà tẩm bột rán' , 'Cánh gà được phủ bởi một lớp bột chiên giòn' , '79.000 VNĐ', '\"/images/Side5.png\"',  '1' ,'True','True'),
(NULL, 'Mì Ý sốt kem hải sản' , 'Mỳ Ý rán với các loại hải sản tươi ngon cùng sốt kem' , '89.000 VNĐ', '\"/images/Side6.png\"',  '1' ,'True','True'),
(NULL, 'Salad Cá hồi Na-uy' , 'Salad với cá hồi Na-uy với bắp cải đỏ, cà chua bi, ngô với sốt Yuzu' , '89.000 VNĐ', '\"/images/Side7.png\"', '1' ,'True','True'),
(NULL, 'Salad Cam' , 'Sự kết hợp tươi ngon giữ rau củ và cam' , '59.000 VNĐ', '\"/images/Side8.png\"', '1' ,'True','True'),
(NULL, 'Nui Bỏ Lò Hải Sản Sốt Hương Nhu' , 'Đánh thức vị giác với sốt hương nhu độc đáo, kết hợp cùng hải sản tươi ngon đậm đà' , '59.000 VNĐ', '\"/images/Side9.png\"',  '1' ,'True','True');

