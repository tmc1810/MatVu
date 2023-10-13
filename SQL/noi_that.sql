-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 12:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `noi_that`
--

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id` int(11) NOT NULL,
  `ma_don_hang` int(11) DEFAULT NULL,
  `ma_san_pham` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `thoi_gian_dathang` datetime DEFAULT NULL,
  `trangthai_donhang` varchar(50) DEFAULT NULL,
  `trangthai_vanchuyen` varchar(50) DEFAULT NULL,
  `trangthai_thanhtoan` varchar(50) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id`, `ma_don_hang`, `ma_san_pham`, `gia`, `thoi_gian_dathang`, `trangthai_donhang`, `trangthai_vanchuyen`, `trangthai_thanhtoan`, `so_luong`) VALUES
(1, 1, 3, 3000000, '2023-10-12 14:23:57', 'Chờ xử lý', 'Đã giao hàng', 'Đã thanh toán', 8),
(3, 333, 1, 3, '2023-10-12 17:32:50', 'Chờ xử lý', 'Chưa giao hàng', 'Chưa thanh toán', 10);

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(11) NOT NULL,
  `anh_danh_muc` text DEFAULT NULL,
  `ten_danh_muc` varchar(100) DEFAULT NULL,
  `thu_tu` int(11) DEFAULT NULL,
  `hien_thi_trang_chu` varchar(10) DEFAULT NULL,
  `hien_thi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `anh_danh_muc`, `ten_danh_muc`, `thu_tu`, `hien_thi_trang_chu`, `hien_thi`) VALUES
(1, 'no', 'danh muc 1', 1, 'co', 'co');

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ho_ten` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `ghi_chu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id`, `user_id`, `ho_ten`, `email`, `so_dien_thoai`, `dia_chi`, `ghi_chu`) VALUES
(1, 1, 'Trần Mạnh Cường', 'tmc9012@gmail.com', '0392683276', 'Hà Nội', 'Đéo có');

-- --------------------------------------------------------

--
-- Table structure for table `gioi_thieu_website`
--

CREATE TABLE `gioi_thieu_website` (
  `id` int(11) NOT NULL,
  `tieu_de` varchar(100) DEFAULT NULL,
  `gioi_thieu_ngan` varchar(200) DEFAULT NULL,
  `anh_dai_dien` text DEFAULT NULL,
  `gioi_thieu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hang_san_xuat`
--

CREATE TABLE `hang_san_xuat` (
  `id` int(11) NOT NULL,
  `ten_hang` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `anh_dai_dien` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hang_san_xuat`
--

INSERT INTO `hang_san_xuat` (`id`, `ten_hang`, `so_dien_thoai`, `dia_chi`, `anh_dai_dien`) VALUES
(1, 'hang san xuat 1', '088888888', 'ha noi', 'no'),
(2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `thuoc_nhom` varchar(50) DEFAULT NULL,
  `tieu_de_menu` varchar(100) DEFAULT NULL,
  `menu_cha` varchar(50) DEFAULT NULL,
  `loai_menu` varchar(50) DEFAULT NULL,
  `trang_dich` varchar(50) DEFAULT NULL,
  `trang_thai` varchar(50) DEFAULT NULL,
  `mo_menu` varchar(50) DEFAULT NULL,
  `mo_ta_chi_tiet` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nhom_menu`
--

CREATE TABLE `nhom_menu` (
  `id` int(11) NOT NULL,
  `ten_nhom` varchar(100) DEFAULT NULL,
  `mo_ta_nhom` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `noi_dung_tinh_website`
--

CREATE TABLE `noi_dung_tinh_website` (
  `id` int(11) NOT NULL,
  `fanpage` text DEFAULT NULL,
  `theo_doi_chung_toi` text DEFAULT NULL,
  `thong_tin_lien_he` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phan_hoi`
--

CREATE TABLE `phan_hoi` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `noi_dung_phan_hoi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(11) NOT NULL,
  `ma_danh_muc` int(11) DEFAULT NULL,
  `ma_hang_san_xuat` int(11) DEFAULT NULL,
  `ten_san_pham` text DEFAULT NULL,
  `gia_ban` int(11) DEFAULT NULL,
  `anh_thumbnail` text DEFAULT NULL,
  `mo_ta_san_pham` text DEFAULT NULL,
  `mo_ta_san_pham_chi_tiet` text DEFAULT NULL,
  `ngay_them_san_pham` datetime DEFAULT NULL,
  `ngay_cap_nhat_san_pham` datetime DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `da_ban` int(11) DEFAULT NULL,
  `luot_xem` int(11) DEFAULT NULL,
  `hien_thi` varchar(10) DEFAULT NULL,
  `tinh_trang` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `ma_danh_muc`, `ma_hang_san_xuat`, `ten_san_pham`, `gia_ban`, `anh_thumbnail`, `mo_ta_san_pham`, `mo_ta_san_pham_chi_tiet`, `ngay_them_san_pham`, `ngay_cap_nhat_san_pham`, `so_luong`, `da_ban`, `luot_xem`, `hien_thi`, `tinh_trang`) VALUES
(1, 1, 2, 'san pham 1', 800, 'no', 'deo co mo ta', 'deo co mo ta', '2023-10-05 22:28:41', '2023-10-05 22:28:41', 8, 8, 8, 'co', 'co'),
(3, 1, 1, 'Tủ', 300000, 'anh_san_pham/1696951892.jpg', '1', '1', '2023-10-10 05:31:32', '2023-10-10 05:31:32', 10000, 0, 1, 'co', 'co');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham_desc`
--

CREATE TABLE `san_pham_desc` (
  `id` int(11) NOT NULL,
  `ma_san_pham` int(11) DEFAULT NULL,
  `anh_thumbnail_bo_sung` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thong_tin_co_ban_website`
--

CREATE TABLE `thong_tin_co_ban_website` (
  `id` int(11) NOT NULL,
  `tieu_de_trang` varchar(100) DEFAULT NULL,
  `logo_cua_trang` text DEFAULT NULL,
  `trang_thai` varchar(50) DEFAULT NULL,
  `email_nguoi_quan_tri` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(50) DEFAULT NULL,
  `gioi_tinh` varchar(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `so_dien_thoai` varchar(20) DEFAULT NULL,
  `cap_bac` varchar(20) DEFAULT NULL,
  `dia_chi` varchar(200) DEFAULT NULL,
  `mat_khau` varchar(32) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `ho_ten`, `gioi_tinh`, `email`, `so_dien_thoai`, `cap_bac`, `dia_chi`, `mat_khau`, `role`) VALUES
(1, 'Trần Mạnh Cường', 'Nam', 'admin@gmail.com', NULL, 'Quản trị', NULL, '1', NULL),
(3, 'Trần Duy Hoàng', 'Nam', 'user@gmail.com', NULL, 'Khách', 'Hà Nam', '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_don_hang` (`ma_don_hang`),
  ADD KEY `ma_san_pham` (`ma_san_pham`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `gioi_thieu_website`
--
ALTER TABLE `gioi_thieu_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hang_san_xuat`
--
ALTER TABLE `hang_san_xuat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nhom_menu`
--
ALTER TABLE `nhom_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noi_dung_tinh_website`
--
ALTER TABLE `noi_dung_tinh_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_hang_san_xuat` (`ma_hang_san_xuat`),
  ADD KEY `ma_danh_muc` (`ma_danh_muc`);

--
-- Indexes for table `san_pham_desc`
--
ALTER TABLE `san_pham_desc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_san_pham` (`ma_san_pham`);

--
-- Indexes for table `thong_tin_co_ban_website`
--
ALTER TABLE `thong_tin_co_ban_website`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gioi_thieu_website`
--
ALTER TABLE `gioi_thieu_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hang_san_xuat`
--
ALTER TABLE `hang_san_xuat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhom_menu`
--
ALTER TABLE `nhom_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `noi_dung_tinh_website`
--
ALTER TABLE `noi_dung_tinh_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phan_hoi`
--
ALTER TABLE `phan_hoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_pham_desc`
--
ALTER TABLE `san_pham_desc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `thong_tin_co_ban_website`
--
ALTER TABLE `thong_tin_co_ban_website`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `chi_tiet_don_hang_ibfk_2` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`id`);

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_hang_san_xuat`) REFERENCES `hang_san_xuat` (`id`),
  ADD CONSTRAINT `san_pham_ibfk_2` FOREIGN KEY (`ma_danh_muc`) REFERENCES `danh_muc` (`id`);

--
-- Constraints for table `san_pham_desc`
--
ALTER TABLE `san_pham_desc`
  ADD CONSTRAINT `san_pham_desc_ibfk_1` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
