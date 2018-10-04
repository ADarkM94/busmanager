-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2018 lúc 11:50 PM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `lvtn`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bus_model`
--

CREATE TABLE `bus_model` (
  `Mã` int(11) NOT NULL,
  `Tên_Loại` varchar(255) NOT NULL,
  `Số_ghế` int(11) NOT NULL,
  `Sơ_đồ` tinytext NOT NULL,
  `Mã_nhân_viên_tạo` int(11) NOT NULL,
  `Mã_nhân_viên_chỉnh_sửa` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyen_xe`
--

CREATE TABLE `chuyen_xe` (
  `Mã` int(11) NOT NULL,
  `Mã_nhân_viên_tạo` int(11) NOT NULL,
  `Mã_lộ_trình` int(11) NOT NULL,
  `Mã_tài_xế` int(11) NOT NULL,
  `Mã_xe` int(11) NOT NULL,
  `Thời_gian_xuất_phát` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `Mã` int(11) NOT NULL,
  `Tên` varchar(255) DEFAULT NULL,
  `Ngày_sinh` date DEFAULT NULL,
  `Giới tính` set('0','1','2') DEFAULT NULL,
  `Địa chỉ` tinytext,
  `Nickname` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Sđt` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`Mã`, `Tên`, `Ngày_sinh`, `Giới tính`, `Địa chỉ`, `Nickname`, `Password`, `Email`, `Sđt`, `created_at`, `updated_at`) VALUES
(1, 'Phan Anh Minh', '1994-04-10', '1', 'Quảng Ngãi', 'admin', 'a970a7e3b359f88a4732b56050822888', 'phananhminh51202164@gmail.com', '01202639775', '2018-09-28 21:09:52', '2018-10-04 07:15:54'),
(3, 'Phan Anh Test', '1994-04-10', '0', 'Địa chỉ Test', 'usertest', '25f9e794323b453885f5181f1b624d0b', 'test@gmail.com', '01646881949', '2018-10-04 01:48:31', '2018-10-04 01:48:31'),
(4, 'Phan Anh Test1', '1994-11-10', '1', 'Quảng Ngãi', 'usertest1', '25f9e794323b453885f5181f1b624d0b', 'test1@email.com', '123456789', '2018-10-04 03:32:51', '2018-10-04 03:32:51'),
(5, 'Phan Anh Test2', '1994-11-10', '2', 'Quảng Ngãi', 'usertest2', '25f9e794323b453885f5181f1b624d0b', 'test2@email.com', '123456788', '2018-10-04 03:43:23', '2018-10-04 03:43:23'),
(6, 'Phan Anh Test3', '1994-02-10', '1', 'Quảng Nam', 'usertest3', '25f9e794323b453885f5181f1b624d0b', 'test3@email.com', '123456787', '2018-10-04 03:47:18', '2018-10-04 03:47:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `duong_di`
--

CREATE TABLE `duong_di` (
  `Mã` int(11) NOT NULL,
  `Mã_Trạm_Start` int(11) NOT NULL,
  `Mã_Trạm_End` int(11) NOT NULL,
  `Tọa_độ_detail` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `employee`
--

CREATE TABLE `employee` (
  `Mã` int(11) NOT NULL,
  `Họ_Tên` varchar(255) NOT NULL,
  `Ngày_sinh` date NOT NULL,
  `Giới_tính` set('0','1','2') DEFAULT NULL,
  `Địa_chỉ` tinytext NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Loại_NV` set('QTV','BV','TX') NOT NULL,
  `Chi_nhánh` varchar(255) DEFAULT NULL,
  `Bằng_lái` varchar(255) DEFAULT NULL,
  `Sđt` varchar(255) NOT NULL,
  `Date_Starting` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `employee`
--

INSERT INTO `employee` (`Mã`, `Họ_Tên`, `Ngày_sinh`, `Giới_tính`, `Địa_chỉ`, `Username`, `Password`, `Email`, `Loại_NV`, `Chi_nhánh`, `Bằng_lái`, `Sđt`, `Date_Starting`, `created_at`, `updated_at`) VALUES
(1, 'Phan Anh Minh', '1994-04-10', '1', 'Quảng Ngãi', 'admin', '25f9e794323b453885f5181f1b624d0b', 'phananhminh51202164@gmail.com', 'QTV', NULL, NULL, '01646881949', '2018-09-01', '2018-09-28 20:02:37', '2018-09-28 20:02:37'),
(2, 'Phan Anh Test', '1994-04-10', '1', '506/19/15 3/2 street', 'taixetest', 'd41d8cd98f00b204e9800998ecf8427e', '51202164@gmail.com', 'TX', 'Ho Chi Minh City', '999999999', '0123456789', '2017-10-10', '2018-10-04 09:34:13', '2018-10-04 09:47:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lo_trinh`
--

CREATE TABLE `lo_trinh` (
  `Mã` int(11) NOT NULL,
  `Mã_nhân_viên_tạo` int(11) NOT NULL,
  `Mã_nhân_viên_chỉnh_sửa` int(11) NOT NULL,
  `Nơi_đi` varchar(255) NOT NULL,
  `Nơi_đến` varchar(255) NOT NULL,
  `Các_trạm_dừng_chân` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE `tinh` (
  `Mã` int(11) NOT NULL,
  `Tên` varchar(255) NOT NULL,
  `Mã_vùng` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tinh`
--

INSERT INTO `tinh` (`Mã`, `Tên`, `Mã_vùng`, `created_at`, `updated_at`) VALUES
(1, 'An Giang', '67', '2018-09-27 06:37:58', '2018-09-27 06:37:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tram_dung`
--

CREATE TABLE `tram_dung` (
  `Mã` int(11) NOT NULL,
  `Tên` varchar(255) NOT NULL,
  `Tọa_độ` varchar(255) NOT NULL,
  `Mã_nhân_viên_tạo` int(11) NOT NULL,
  `Mã_nhân_viên_chỉnh_sửa` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ve`
--

CREATE TABLE `ve` (
  `Mã` int(11) NOT NULL,
  `Mã_chuyến_xe` int(11) NOT NULL,
  `Mã_nhân_viên_đặt` int(11) DEFAULT NULL,
  `Mã_khách_hàng` int(11) DEFAULT NULL,
  `Sđt_khách_hàng` varchar(255) DEFAULT NULL,
  `Vị_trí_ghế` varchar(255) NOT NULL,
  `Giá` int(11) NOT NULL,
  `Trạng_thái` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xe`
--

CREATE TABLE `xe` (
  `Mã` int(11) NOT NULL,
  `Biển_số` varchar(255) NOT NULL,
  `Mã_loại_xe` int(11) NOT NULL,
  `Ngày_bảo_trì_gần_nhất` date NOT NULL,
  `Ngày_bảo_trì_tiếp_theo` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bus_model`
--
ALTER TABLE `bus_model`
  ADD PRIMARY KEY (`Mã`),
  ADD UNIQUE KEY `Tên_Loại` (`Tên_Loại`),
  ADD KEY `Mã_nhân_viên_chỉnh_sửa` (`Mã_nhân_viên_chỉnh_sửa`),
  ADD KEY `Mã_nhân_viên_tạo` (`Mã_nhân_viên_tạo`);

--
-- Chỉ mục cho bảng `chuyen_xe`
--
ALTER TABLE `chuyen_xe`
  ADD PRIMARY KEY (`Mã`),
  ADD KEY `Mã_lộ_trình` (`Mã_lộ_trình`),
  ADD KEY `Mã_tài_xế` (`Mã_tài_xế`),
  ADD KEY `Mã_xe` (`Mã_xe`),
  ADD KEY `Mã_nhân_viên_tạo` (`Mã_nhân_viên_tạo`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Mã`),
  ADD UNIQUE KEY `Sđt` (`Sđt`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Nickname` (`Nickname`) USING BTREE;

--
-- Chỉ mục cho bảng `duong_di`
--
ALTER TABLE `duong_di`
  ADD PRIMARY KEY (`Mã`),
  ADD KEY `Mã_Trạm_Start` (`Mã_Trạm_Start`),
  ADD KEY `Mã_Trạm_End` (`Mã_Trạm_End`);

--
-- Chỉ mục cho bảng `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Mã`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Sđt` (`Sđt`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Chỉ mục cho bảng `lo_trinh`
--
ALTER TABLE `lo_trinh`
  ADD PRIMARY KEY (`Mã`),
  ADD KEY `Mã_nhân_viên_chỉnh_sửa` (`Mã_nhân_viên_chỉnh_sửa`),
  ADD KEY `Mã_nhân_viên_tạo` (`Mã_nhân_viên_tạo`);

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`Mã`),
  ADD UNIQUE KEY `Tên` (`Tên`) USING BTREE,
  ADD UNIQUE KEY `Mã_vùng` (`Mã_vùng`);

--
-- Chỉ mục cho bảng `tram_dung`
--
ALTER TABLE `tram_dung`
  ADD PRIMARY KEY (`Mã`),
  ADD UNIQUE KEY `Tên` (`Tên`),
  ADD UNIQUE KEY `Tọa_độ` (`Tọa_độ`),
  ADD KEY `Mã_nhân_viên_tạo` (`Mã_nhân_viên_tạo`),
  ADD KEY `Mã_nhân_viên_chỉnh_sửa` (`Mã_nhân_viên_chỉnh_sửa`);

--
-- Chỉ mục cho bảng `ve`
--
ALTER TABLE `ve`
  ADD PRIMARY KEY (`Mã`),
  ADD KEY `Mã_chuyến_xe` (`Mã_chuyến_xe`),
  ADD KEY `Mã_khách_hàng` (`Mã_khách_hàng`),
  ADD KEY `Mã_nhân_viên_đặt` (`Mã_nhân_viên_đặt`);

--
-- Chỉ mục cho bảng `xe`
--
ALTER TABLE `xe`
  ADD PRIMARY KEY (`Mã`),
  ADD UNIQUE KEY `Biển_số` (`Biển_số`),
  ADD KEY `Mã_loại_xe` (`Mã_loại_xe`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bus_model`
--
ALTER TABLE `bus_model`
  MODIFY `Mã` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chuyen_xe`
--
ALTER TABLE `chuyen_xe`
  MODIFY `Mã` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `Mã` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `duong_di`
--
ALTER TABLE `duong_di`
  MODIFY `Mã` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `employee`
--
ALTER TABLE `employee`
  MODIFY `Mã` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lo_trinh`
--
ALTER TABLE `lo_trinh`
  MODIFY `Mã` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tinh`
--
ALTER TABLE `tinh`
  MODIFY `Mã` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tram_dung`
--
ALTER TABLE `tram_dung`
  MODIFY `Mã` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ve`
--
ALTER TABLE `ve`
  MODIFY `Mã` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `xe`
--
ALTER TABLE `xe`
  MODIFY `Mã` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bus_model`
--
ALTER TABLE `bus_model`
  ADD CONSTRAINT `bus_model_ibfk_1` FOREIGN KEY (`Mã_nhân_viên_tạo`) REFERENCES `employee` (`Mã`),
  ADD CONSTRAINT `bus_model_ibfk_2` FOREIGN KEY (`Mã_nhân_viên_chỉnh_sửa`) REFERENCES `employee` (`Mã`);

--
-- Các ràng buộc cho bảng `chuyen_xe`
--
ALTER TABLE `chuyen_xe`
  ADD CONSTRAINT `chuyen_xe_ibfk_1` FOREIGN KEY (`Mã_lộ_trình`) REFERENCES `lo_trinh` (`Mã`),
  ADD CONSTRAINT `chuyen_xe_ibfk_2` FOREIGN KEY (`Mã_tài_xế`) REFERENCES `employee` (`Mã`),
  ADD CONSTRAINT `chuyen_xe_ibfk_3` FOREIGN KEY (`Mã_xe`) REFERENCES `xe` (`Mã`),
  ADD CONSTRAINT `chuyen_xe_ibfk_4` FOREIGN KEY (`Mã_nhân_viên_tạo`) REFERENCES `employee` (`Mã`);

--
-- Các ràng buộc cho bảng `duong_di`
--
ALTER TABLE `duong_di`
  ADD CONSTRAINT `duong_di_ibfk_1` FOREIGN KEY (`Mã_Trạm_Start`) REFERENCES `tram_dung` (`Mã`),
  ADD CONSTRAINT `duong_di_ibfk_2` FOREIGN KEY (`Mã_Trạm_End`) REFERENCES `tram_dung` (`Mã`);

--
-- Các ràng buộc cho bảng `lo_trinh`
--
ALTER TABLE `lo_trinh`
  ADD CONSTRAINT `lo_trinh_ibfk_1` FOREIGN KEY (`Mã_nhân_viên_tạo`) REFERENCES `employee` (`Mã`),
  ADD CONSTRAINT `lo_trinh_ibfk_2` FOREIGN KEY (`Mã_nhân_viên_chỉnh_sửa`) REFERENCES `employee` (`Mã`);

--
-- Các ràng buộc cho bảng `tram_dung`
--
ALTER TABLE `tram_dung`
  ADD CONSTRAINT `tram_dung_ibfk_1` FOREIGN KEY (`Mã_nhân_viên_tạo`) REFERENCES `employee` (`Mã`),
  ADD CONSTRAINT `tram_dung_ibfk_2` FOREIGN KEY (`Mã_nhân_viên_chỉnh_sửa`) REFERENCES `employee` (`Mã`);

--
-- Các ràng buộc cho bảng `ve`
--
ALTER TABLE `ve`
  ADD CONSTRAINT `ve_ibfk_1` FOREIGN KEY (`Mã_nhân_viên_đặt`) REFERENCES `employee` (`Mã`),
  ADD CONSTRAINT `ve_ibfk_2` FOREIGN KEY (`Mã_khách_hàng`) REFERENCES `customer` (`Mã`),
  ADD CONSTRAINT `ve_ibfk_3` FOREIGN KEY (`Mã_chuyến_xe`) REFERENCES `chuyen_xe` (`Mã`);

--
-- Các ràng buộc cho bảng `xe`
--
ALTER TABLE `xe`
  ADD CONSTRAINT `xe_ibfk_1` FOREIGN KEY (`Mã_loại_xe`) REFERENCES `bus_model` (`Mã`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
