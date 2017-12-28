-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 28, 2017 lúc 04:09 PM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo_shop2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Apple'),
(2, 'Sony'),
(3, 'Nokia'),
(4, 'LG'),
(5, 'Samsung'),
(6, 'Xiaomi'),
(7, 'Dell'),
(8, 'HP'),
(9, 'ASUS'),
(10, 'Oppo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`cart_id`, `product_id`, `customer_id`, `quantity`, `price`, `total`) VALUES
(13, 16, 1, 3, 18990500, 56971500),
(14, 17, 1, 2, 20490000, 40980000),
(15, 18, 1, 6, 15990000, 95940000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Smartphone'),
(2, 'Laptop'),
(3, 'Tablet'),
(4, 'Accessories');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `email`, `mobile`, `address`) VALUES
(1, 'Danh Manh', 'danh@gmail.com', '01639324040', 'Vinh'),
(3, 'Danh Manh', 'zilean39@gmail.com', '0906247449', 'Nothing'),
(4, 'Ã¡d', 'Ã¡d', 'Ã¡d', 'Ã¡d'),
(5, 'sssssssss', 'ssssssss', '515213123124', 'asdasd'),
(6, 'waweq', 'sadqwe', 'sadwq', 'Æ°aew'),
(7, 'Danh Manh Nguyen', 'hunglv@hiworld.com', '0906247449', 'Hanoi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `detailproduct` text COLLATE utf8_unicode_ci NOT NULL,
  `total` float NOT NULL,
  `note` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8_unicode_ci NOT NULL,
  `product_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `product_sale` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `category_id`, `brand_id`, `product_price`, `product_detail`, `product_description`, `product_image`, `product_keyword`, `product_sale`) VALUES
(16, 'IPhone 7', 1, 1, 18990500, 'lorem ipsum', 'lorem ipsum', 'iphone-7-256gb-5-400x460.PNG', 'lorem ipsum', 0),
(17, 'Samsung Galaxy S8 Plus', 1, 5, 20490000, 'lorem ipsum', 'lorem ipsum', 'samsung-galaxy-s8-plus-tim-khoi-400-400x460.PNG', 'lorem ipsum', 0),
(18, 'Sony Xpreria XZ', 1, 2, 15990000, 'lorem ipsum', 'lorem ipsum', 'sony-xperia-xz1-2-400x460.PNG', 'lorem ipsum', 0),
(19, 'Sony Xperia XZ Premium Pink Gold', 1, 2, 13000000, 'lorem ipsum', 'lorem ipsum', 'sony-xperia-xz-premium-pink-gold-400x460.png', 'lorem ipsum', 0),
(20, 'Xiaomi Mi A1', 1, 6, 5.99, 'lorem ipsum', 'lorem ipsum', 'xiaomi-mi-a12-400x460.png', 'lorem ipsum', 0),
(21, 'Nokia 8', 1, 3, 12999000, 'lorem ipsum', 'lorem ipsum', 'nokia-8-1-400x460.png', 'lorem ipsum', 0),
(22, 'Oppo F3 Plus', 1, 10, 10690000, 'lorem ipsum', 'lorem ipsum', 'oppo-f3-plus-1-1-400x460.PNG', 'lorem ipsum', 0),
(23, 'Sony Xperia XZ Dual', 1, 2, 9.99, 'lorem ipsum', 'lorem ipsum', 'sony-xperia-xz-1-400x460.PNG', 'lorem ipsum', 0),
(24, 'Samsung Galaxy J7+', 1, 5, 8.69, 'lorem ipsum', 'lorem ipsum', 'samsung-galaxy-j7-plus-1-400x460.PNG', 'lorem ipsum', 0),
(25, 'Oppo F5', 1, 10, 6.99, 'lorem ipsum', 'lorem ipsum', 'oppo-f5-h1-400x460.PNG', 'lorem ipsum', 0),
(26, 'iPhone X 256GB', 1, 1, 34.79, 'lorem ipsum', 'lorem ipsum', 'iphone-x-256gb-400-460copy-400x460.PNG', 'lorem ipsum', 0),
(27, 'iPhone 8 Plus 64GB', 1, 1, 23.99, 'lorem ipsum', 'lorem ipsum', 'iphone-8-plus2-1-400x460.PNG', 'lorem ipsum', 0),
(28, 'iPhone 6s 32GB', 1, 1, 12.99, 'lorem ipsum', 'lorem ipsum', 'iphone-6s-32gb-400x450-400x450.PNG', 'lorem ipsum', 0),
(29, 'OPPO F5 Youth', 1, 10, 6.19, 'lorem ipsum', 'lorem ipsum', 'oppo-f5-youth-a-2-400x460.PNG', 'lorem ipsum', 0),
(30, 'IPhone 5s', 1, 1, 5.99, 'lorem ipsum', 'lorem ipsum', 'iphone-5s-16gb-7-400x460.PNG', 'lorem ipsum', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `customer_id_2` (`customer_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT cho bảng `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Các ràng buộc cho bảng `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
