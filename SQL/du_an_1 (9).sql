-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 05:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `du_an_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `anh_san_pham`
--

CREATE TABLE `anh_san_pham` (
  `id_anh_san_pham` int(11) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `id_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anh_san_pham`
--

INSERT INTO `anh_san_pham` (`id_anh_san_pham`, `hinh_anh`, `id_san_pham`) VALUES
(80, 'b.png', 19),
(81, 'bộ 1.png', 19),
(82, 'Bộ.png', 19),
(83, 'v.jpg', 20),
(84, 'vv.jpg', 20),
(85, '12.jpg', 21),
(86, '11.jpg', 22),
(87, '13.jpg', 23),
(88, '14.jpg', 24),
(89, '15.jpg', 25),
(90, '16.jpg', 26),
(91, '17.jpg', 27),
(92, '18.jpg', 28),
(93, 'v.jpg', 29),
(94, 'vv.jpg', 29),
(95, '272854424_234147092255919_7263183627764175933_n.jpg', 30),
(96, '19.jpg', 31),
(97, '20.png', 31),
(98, '21.jpg', 31),
(99, '22.jpg', 31),
(100, '22.jpg', 32),
(101, '24.jpg', 33),
(102, '212.jpg', 34),
(103, '222.jpg', 35),
(104, '223.jpg', 35),
(105, '2225.jpg', 35),
(106, '2234.jpg', 35),
(107, '2226.jpg', 36),
(108, '2222.jpg', 37),
(109, '222221.jpg', 37),
(110, 'lemmen.jpg', 38),
(111, '443.png', 39),
(112, '444.png', 39),
(113, '4444.png', 39),
(114, '331.jpg', 40),
(115, '22345.jpg', 41),
(116, 'amnhac.jpg', 42),
(117, 'th.jpg', 43),
(118, '123.jpg', 44),
(119, '55.jpg', 45),
(120, '2233.jpg', 46),
(121, 'adq.jpg', 47),
(122, 'fs.jpg', 48),
(123, 'ft.jpg', 49),
(124, '11.jpg', 50);

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_binh_luan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `noi_dung_binh_luan` varchar(255) NOT NULL,
  `ngay_binh_luan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `danh_gia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`id_binh_luan`, `id_user`, `id_san_pham`, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia`) VALUES
(1, 28, 41, '', '2023-12-02 06:12:44', 4),
(2, 28, 42, '', '2023-12-02 06:12:47', 4),
(3, 28, 40, '', '2023-12-02 06:12:55', 5);

-- --------------------------------------------------------

--
-- Table structure for table `bo_truyen`
--

CREATE TABLE `bo_truyen` (
  `id_bo_truyen` int(11) NOT NULL,
  `ten_bo_truyen` varchar(50) NOT NULL,
  `id_loai_san_pham` int(11) NOT NULL,
  `gia_ban` int(11) NOT NULL,
  `gia_goc` int(11) NOT NULL,
  `mo_ta` varchar(110) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bo_truyen`
--

INSERT INTO `bo_truyen` (`id_bo_truyen`, `ten_bo_truyen`, `id_loai_san_pham`, `gia_ban`, `gia_goc`, `mo_ta`, `hinh_anh`, `trang_thai`) VALUES
(4, 'Giáo Dục', 7, 130000, 188000, '', '55.jpg', 1),
(7, 'Tiểu Thuyết', 5, 210000, 250000, '', '11.jpg', 1),
(10, 'Chủ đề âm nhạc', 4, 300000, 40000, '', 'amnhac.jpg', 1),
(12, 'Thiếu nhi', 6, 120000, 140000, '', '2233.jpg', 1),
(13, 'Nấu ăn', 9, 130000, 150000, '', '22.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chatbox`
--

CREATE TABLE `chatbox` (
  `id_msg` int(11) NOT NULL,
  `id_in` int(11) NOT NULL,
  `id_out` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chatbox`
--

INSERT INTO `chatbox` (`id_msg`, `id_in`, `id_out`, `msg`) VALUES
(77, 29, 28, 'hello'),
(78, 29, 28, 'fđf'),
(79, 29, 28, 'alo'),
(80, 28, 29, 'alo com mẹ mày');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_bo_truyen`
--

CREATE TABLE `chi_tiet_bo_truyen` (
  `id_bo_truyen` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_bo_truyen`
--

INSERT INTO `chi_tiet_bo_truyen` (`id_bo_truyen`, `id_san_pham`) VALUES
(4, 19),
(7, 49),
(10, 41),
(10, 42),
(10, 40),
(10, 0),
(12, 48),
(12, 47),
(12, 46),
(12, 0),
(4, 27),
(4, 26),
(4, 20),
(4, 25),
(4, 23),
(13, 0),
(13, 38),
(13, 39),
(13, 37),
(13, 36),
(13, 33),
(13, 32),
(13, 35),
(13, 31),
(13, 0),
(7, 45),
(7, 44),
(7, 34),
(7, 43),
(7, 28),
(7, 24),
(7, 29),
(7, 22),
(7, 21),
(7, 50),
(7, 30);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id_chi_tiet_don_hang` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `id_don_hang` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `ten_san_pham` varchar(100) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id_chi_tiet_don_hang`, `id_san_pham`, `id_don_hang`, `gia`, `ten_san_pham`, `so_luong`) VALUES
(96, 42, 109, 130000, '45 Ngày Biết Đệm Guitar - Tiết Điệu: Slow Fox-Disc', 2),
(97, 42, 110, 130000, '45 Ngày Biết Đệm Guitar - Tiết Điệu: Slow Fox-Disc', 3),
(98, 41, 111, 85000, '36 Ngày Biết Đệm Guitar - Kèm CD (Tái Bản 2016)', 2),
(99, 42, 111, 130000, '45 Ngày Biết Đệm Guitar - Tiết Điệu: Slow Fox-Disc', 1),
(100, 41, 112, 85000, '36 Ngày Biết Đệm Guitar - Kèm CD (Tái Bản 2016)', 5),
(101, 42, 112, 130000, '45 Ngày Biết Đệm Guitar - Tiết Điệu: Slow Fox-Disc', 5),
(102, 41, 117, 85000, '36 Ngày Biết Đệm Guitar - Kèm CD (Tái Bản 2016)', 1),
(103, 41, 118, 85000, '36 Ngày Biết Đệm Guitar - Kèm CD (Tái Bản 2016)', 1),
(104, 42, 118, 130000, '45 Ngày Biết Đệm Guitar - Tiết Điệu: Slow Fox-Disc', 1),
(105, 40, 118, 145000, 'Những Nhạc Khúc Hay Và Dễ Soạn Cho Đàn Piano (Tái ', 1),
(106, 41, 119, 85000, '36 Ngày Biết Đệm Guitar - Kèm CD (Tái Bản 2016)', 3),
(107, 42, 119, 130000, '45 Ngày Biết Đệm Guitar - Tiết Điệu: Slow Fox-Disc', 3),
(108, 40, 119, 145000, 'Những Nhạc Khúc Hay Và Dễ Soạn Cho Đàn Piano (Tái ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang_bo_truyen`
--

CREATE TABLE `chi_tiet_don_hang_bo_truyen` (
  `id_chi_tiet_don_hang_bo_truyen` int(11) NOT NULL,
  `id_bo_truyen` int(11) NOT NULL,
  `id_don_hang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_don_hang_bo_truyen`
--

INSERT INTO `chi_tiet_don_hang_bo_truyen` (`id_chi_tiet_don_hang_bo_truyen`, `id_bo_truyen`, `id_don_hang`, `id_user`, `soLuong`) VALUES
(4, 10, 106, 28, 2),
(5, 10, 107, 28, 2),
(6, 10, 108, 28, 2),
(7, 10, 113, 28, 2),
(8, 10, 114, 28, 3);

-- --------------------------------------------------------

--
-- Table structure for table `dia_chi`
--

CREATE TABLE `dia_chi` (
  `id_dia_chi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dia_chi`
--

INSERT INTO `dia_chi` (`id_dia_chi`, `id_user`, `dia_chi`, `trang_thai`) VALUES
(4, 28, 'dsfsfsd', 1),
(5, 29, 'erstsd', 1),
(7, 30, 'Hà Nội', 1);

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don_hang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `thoi_gian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_trang_thai_don_hang` int(11) NOT NULL,
  `ghi_chu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id_don_hang`, `id_user`, `thoi_gian`, `id_trang_thai_don_hang`, `ghi_chu`) VALUES
(106, 28, '2023-11-30 18:26:47', 1, ''),
(107, 28, '2023-11-30 18:29:01', 1, ''),
(108, 28, '2023-11-30 18:30:06', 1, ''),
(109, 28, '2023-11-30 18:32:19', 1, ''),
(110, 28, '2023-11-30 18:33:02', 1, ''),
(111, 28, '2023-11-30 18:34:01', 1, ''),
(112, 28, '2023-11-30 18:35:42', 1, ''),
(113, 28, '2023-11-30 18:36:12', 1, ''),
(114, 28, '2023-11-30 18:36:58', 1, ''),
(117, 30, '2023-12-02 02:05:36', 1, ''),
(118, 30, '2023-12-02 02:06:09', 1, ''),
(119, 28, '2023-12-02 05:26:36', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_gio_hang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`id_gio_hang`, `id_user`, `id_san_pham`, `so_luong`) VALUES
(35, 28, 42, 3),
(36, 28, 40, 4),
(37, 28, 41, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ho_don`
--

CREATE TABLE `ho_don` (
  `id_hoa_don` int(11) NOT NULL,
  `id_don_hang` int(11) NOT NULL,
  `ma_hoa_don` varchar(100) NOT NULL,
  `phuong_thuc` varchar(30) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ho_don`
--

INSERT INTO `ho_don` (`id_hoa_don`, `id_don_hang`, `ma_hoa_don`, `phuong_thuc`, `trang_thai`) VALUES
(73, 106, '20231201012644', 'Thanh toán khi nhận hàng', 0),
(74, 107, '20231201012900', 'Thanh toán khi nhận hàng', 0),
(75, 108, '20231201012943', 'vnpay', 1),
(76, 109, '20231201013218', 'Thanh toán khi nhận hàng', 0),
(77, 110, '20231201013233', 'vnpay', 1),
(78, 111, '20231201013359', 'Thanh toán khi nhận hàng', 0),
(79, 111, '20231201013359', 'Thanh toán khi nhận hàng', 0),
(80, 112, '20231201013517', 'vnpay', 1),
(81, 113, '20231201013609', 'Thanh toán khi nhận hàng', 0),
(82, 114, '20231201013633', 'vnpay', 1),
(85, 117, '20231202090528', 'Thanh toán khi nhận hàng', 0),
(86, 118, '20231202090602', 'Thanh toán khi nhận hàng', 0),
(87, 118, '20231202090602', 'Thanh toán khi nhận hàng', 0),
(88, 118, '20231202090602', 'Thanh toán khi nhận hàng', 0),
(89, 119, '20231202121855', 'Thanh toán khi nhận hàng', 0),
(90, 119, '20231202121855', 'Thanh toán khi nhận hàng', 0),
(91, 119, '20231202121855', 'Thanh toán khi nhận hàng', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id_loai_san_pham` int(11) NOT NULL,
  `ten_loai_san_pham` varchar(50) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id_loai_san_pham`, `ten_loai_san_pham`, `trang_thai`) VALUES
(4, 'Âm Nhạc', 1),
(5, 'Tiểu Thuyết', 1),
(6, 'Truyện Thiếu Nhi', 1),
(7, 'Giáo Dục', 1),
(9, 'Nấu Ăn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nha_phat_hanh`
--

CREATE TABLE `nha_phat_hanh` (
  `id_nha_phat_hanh` int(11) NOT NULL,
  `ten_nha_phat_hanh` varchar(50) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nha_phat_hanh`
--

INSERT INTO `nha_phat_hanh` (`id_nha_phat_hanh`, `ten_nha_phat_hanh`, `trang_thai`) VALUES
(1, 'Kim Đồng', 1),
(2, 'Sky Book', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nha_san_xuat`
--

CREATE TABLE `nha_san_xuat` (
  `id_nha_san_xuat` int(11) NOT NULL,
  `ten_nha_san_xuat` varchar(50) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nha_san_xuat`
--

INSERT INTO `nha_san_xuat` (`id_nha_san_xuat`, `ten_nha_san_xuat`, `trang_thai`) VALUES
(1, 'Văn học Việt', 0),
(2, 'Tuổi trẻ', 1),
(5, 'Dân trí', 1),
(7, 'Phụ Nữ Việt Nam', 1),
(8, 'NXB Phụ Nữ', 1),
(9, 'NXB Lao Động Xã Hội', 1),
(10, 'Dân trí', 1),
(11, 'Kim Đồng', 1),
(12, 'Thế Giới', 1),
(13, 'Orchard Books', 1),
(14, 'Macmillan Childrens Books', 1),
(15, 'NXB Tổng Hợp TPHCM', 1),
(16, 'Thế Giới, Tổng Hợp TPHCM', 1),
(17, 'NXB Văn Hóa - Văn Nghệ', 1),
(18, 'Thanh Niên', 1),
(19, 'Trẻ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `id_quyen` int(11) NOT NULL,
  `ten_quyen` varchar(30) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`id_quyen`, `ten_quyen`, `trang_thai`) VALUES
(1, 'admin', 1),
(2, 'web', 1),
(3, 'ship', 1),
(4, 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id_san_pham` int(11) NOT NULL,
  `ten_san_pham` varchar(50) NOT NULL,
  `mo_ta` varchar(100) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `gia_ban` int(11) NOT NULL,
  `gia_goc` int(11) NOT NULL,
  `so_luong` int(3) NOT NULL,
  `so_trang` int(11) NOT NULL,
  `id_tac_gia` int(11) NOT NULL,
  `nam_xb` date NOT NULL,
  `kich_thuoc` varchar(100) NOT NULL,
  `trong_luong` float NOT NULL,
  `ngay_nhap` date NOT NULL,
  `id_nha_san_xuat` int(11) NOT NULL,
  `id_nha_phat_hanh` int(11) NOT NULL,
  `trang_thai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id_san_pham`, `ten_san_pham`, `mo_ta`, `hinh_anh`, `gia_ban`, `gia_goc`, `so_luong`, `so_trang`, `id_tac_gia`, `nam_xb`, `kich_thuoc`, `trong_luong`, `ngay_nhap`, `id_nha_san_xuat`, `id_nha_phat_hanh`, `trang_thai`) VALUES
(19, 'LÀM THẦY', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', 'b.png', 130000, 188000, 25, 120, 18, '2023-10-25', '23', 3, '2023-11-27', 10, 1, 1),
(20, 'Dạy con trong hoang mang ', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', 'v.jpg', 179000, 238000, 33, 240, 16, '2023-11-10', '23', 3, '2023-11-27', 13, 2, 1),
(21, 'Cố Định Một Đám Mây (Tái Bản 2023)', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '12.jpg', 125000, 139000, 123, 332, 17, '2023-11-04', '23', 223, '2023-11-27', 15, 1, 1),
(22, 'Gáy Người Thì Lạnh (Tái Bản 2022)', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '11.jpg', 68000, 80000, 564, 543, 14, '2023-11-09', '23', 421, '2023-11-27', 18, 2, 1),
(23, 'Gió Lẻ Và 9 Câu Chuyện Khác (Tái Bản 2022)', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '13.jpg', 76000, 90000, 32, 321, 9, '2023-11-09', '23', 3, '2023-11-27', 19, 1, 1),
(24, 'Cánh Đồng Bất Tận - Phiên Bản Đặc Biệt', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '14.jpg', 284000, 335000, 32, 124, 9, '2023-06-07', '23', 33, '2023-11-27', 19, 2, 1),
(25, 'Sông (Tái Bàn 2020)', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '15.jpg', 84150, 99000, 100, 203, 10, '2023-11-10', '23', 32, '2023-11-27', 19, 2, 1),
(26, 'Cánh Đồng Bất Tận (Tái Bản 2019)', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '16.jpg', 72000, 85000, 240, 135, 14, '2023-10-13', '23', 4302, '2023-11-27', 19, 2, 1),
(27, 'Đong Tấm Lòng (Tái Bản 2019)', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '17.jpg', 80000, 95000, 304, 432, 6, '2023-10-31', '23', 321, '2023-11-27', 19, 2, 1),
(28, 'Hong Tay Khói Lạnh', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '18.jpg', 78000, 98000, 401, 300, 16, '2023-11-10', '23', 3, '2023-11-27', 18, 2, 1),
(29, 'Dạy con trong hoang mang (Tập 1 + 2)', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', 'v.jpg', 179000, 238000, 230, 120, 6, '2023-10-30', '23', 3, '2023-11-28', 19, 1, 1),
(30, '123', '12323', '272854424_234147092255919_7263183627764175933_n.jpg', 213213, 90000, 1234, 1243, 4, '2023-11-24', '23', 1234, '2023-11-28', 1, 1, 1),
(31, 'Vegan Journey - Món Tây Gia Vị Việt', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '19.jpg', 202000, 225000, 130, 237, 17, '2023-10-12', '23', 3, '2023-11-28', 7, 1, 1),
(32, 'Kỹ Thuật Làm Bánh Ngọt - Ngẫu Hứng Cùng Cake (Tái ', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '22.jpg', 68000, 80000, 210, 130, 18, '2023-11-15', '23', 4, '2023-11-28', 8, 2, 1),
(33, 'Kỹ Thuật Làm Bánh Ngọt - Cuốn Sách Cho Người Bắt Đ', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '24.jpg', 66000, 78000, 400, 320, 18, '2023-10-31', '23', 3, '2023-11-28', 8, 1, 1),
(34, 'Những Ngày Đầy Nắng', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '212.jpg', 109000, 212000, 130, 333, 19, '2023-11-17', '23', 3, '2023-11-28', 9, 2, 1),
(35, 'Bếp Nhà Nam Không Có Lò', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '222.jpg', 193000, 215000, 190, 210, 16, '2023-06-15', '23', 3, '2023-11-28', 12, 2, 1),
(36, 'Kombucha - Tuyệt Đỉnh Thức Uống Lên Men', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '2226.jpg', 272000, 320000, 230, 159, 15, '2023-11-02', '23', 3, '2023-11-28', 7, 1, 1),
(37, 'Ẩm Thực Chinh Phục Thế Giới - Chocolate', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '2222.jpg', 55000, 55000, 450, 140, 14, '2023-07-14', '23', 3, '2023-11-28', 11, 2, 1),
(38, 'Ẩm Thực Chinh Phục Thế Giới - Món Lên Men', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', 'lemmen.jpg', 58000, 65000, 340, 1300, 13, '2023-11-17', '23', 3, '2023-11-28', 11, 2, 1),
(39, 'Một Chút Đáng Yêu Nhiều Chút Ngọt Ngào', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '443.png', 197000, 279000, 300, 230, 12, '2023-11-11', '23', 3, '2023-11-28', 12, 2, 1),
(40, 'Những Nhạc Khúc Hay Và Dễ Soạn Cho Đàn Piano (Tái ', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '331.jpg', 145000, 185000, 396, 132, 11, '2023-12-01', '23', 3, '2023-11-28', 10, 2, 1),
(41, '36 Ngày Biết Đệm Guitar - Kèm CD (Tái Bản 2016)', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '22345.jpg', 85000, 149000, 168, 213, 11, '2023-11-04', '23', 1313, '2023-11-28', 10, 2, 1),
(42, '45 Ngày Biết Đệm Guitar - Tiết Điệu: Slow Fox-Disc', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', 'amnhac.jpg', 130000, 159000, 149, 145, 11, '2023-08-16', '23', 3, '2023-11-28', 10, 2, 1),
(43, 'Trái Tim Của Bụt - Ấn Bản Giới Hạn - Bìa Cứng', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', 'th.jpg', 1600000, 1600000, 232, 133, 10, '2023-11-09', '23', 3, '2023-11-28', 12, 2, 1),
(44, 'Không Diệt Không Sinh Đừng Sợ Hãi - Bìa Cứng - Phi', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '123.jpg', 386000, 538000, 123, 234, 10, '2023-11-15', '23', 4, '2023-11-28', 12, 1, 1),
(45, 'Thay Đổi Cuộc Sống Với Nhân Số Học', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '55.jpg', 173000, 248000, 240, 137, 10, '2023-11-10', '23', 3, '2023-11-28', 15, 1, 1),
(46, 'I Am Cat', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', '2233.jpg', 130000, 139000, 124, 443, 16, '2023-11-10', '23', 3, '2023-11-28', 7, 1, 1),
(47, 'The Hugasaurus', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', 'adq.jpg', 146000, 184000, 23, 231, 7, '2023-11-17', '23', 3, '2023-11-28', 16, 1, 1),
(48, 'Truyện Cổ Tích Kinh Điển - Cô Bé Quàng Khăn Đỏ', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', 'fs.jpg', 55000, 60000, 12, 32, 7, '2023-11-18', '23', 3, '2023-11-28', 12, 2, 1),
(49, 'Đại Ca ', 'Theo Bộ Giáo dục và Đào tạo Việt Nam, đến năm học 2020 – 2021, cả nước có 42.080 cơ sở giáo dục từ n', 'ft.jpg', 32000, 44000, 23, 312, 8, '2023-11-18', '23', 3, '2023-11-28', 10, 1, 1),
(50, 'gáy người thig lạnh', 'gáy người thig lạnhTập tản văn Gáy Người Thì Lạnh chưa dày tới 200 trang là trạm dừng chân cho những', '11.jpg', 65000, 10000, 11, 200, 5, '2023-12-21', '23', 4, '2023-12-02', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tac_gia`
--

CREATE TABLE `tac_gia` (
  `id_tac_gia` int(11) NOT NULL,
  `ten_tac_gia` varchar(100) NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tac_gia`
--

INSERT INTO `tac_gia` (`id_tac_gia`, `ten_tac_gia`, `trang_thai`) VALUES
(4, 'Nguyễn Thế Dương', 0),
(5, 'duong 123', 0),
(6, 'Rachel Bright, Jim Field', 1),
(7, 'Rachel Bright, Chris Chatterton', 1),
(8, 'Peter Bently, Chris Chatterton', 1),
(9, 'Lê Đỗ Quỳnh Hương', 1),
(10, 'Thích Nhất Hạnh, Lê Đỗ Quỳnh Hương', 1),
(11, 'Song Minh', 1),
(12, 'Tara Nguyễn', 1),
(13, 'Uyển Nhi', 1),
(14, 'Ngọc Hân, Bảo Anh', 1),
(15, 'Hannah Crum, Alex LaGory', 1),
(16, 'Nam Có Ích', 1),
(17, 'Shushu Le', 1),
(18, 'Đình Bình, Đình Trung', 1),
(19, 'Hoàng Yến', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hang`
--

CREATE TABLE `trang_thai_don_hang` (
  `id_trang_thai_don_hang` int(11) NOT NULL,
  `ten_trang_thai_don_hang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trang_thai_don_hang`
--

INSERT INTO `trang_thai_don_hang` (`id_trang_thai_don_hang`, `ten_trang_thai_don_hang`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đang giao hàng'),
(3, 'Đã giao hàng'),
(4, 'Giao hàng không thành công'),
(5, 'Hủy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(100) NOT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `ten` varchar(100) DEFAULT 'khác hàng',
  `anh` varchar(100) NOT NULL DEFAULT 'user.jpg',
  `id_quyen` int(11) NOT NULL DEFAULT 4,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `mat_khau`, `sdt`, `ten`, `anh`, `id_quyen`, `trang_thai`) VALUES
(28, 'duong@gmail.com', '123', '0337684944', 'Nguyễn Thế Dương', 'user.jpg', 4, 1),
(29, 'admin@admin.com', '123', NULL, 'duong', 'user.jpg', 1, 1),
(30, 'phunhph33261@fpt.edu.vn', '123', '0962954690', 'Phú Nguyễn', 'user.jpg', 2, 1),
(33, 'hanhbabe@gmail.com', '123', NULL, 'Phú Nguyễn', 'user.jpg', 4, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anh_san_pham`
--
ALTER TABLE `anh_san_pham`
  ADD PRIMARY KEY (`id_anh_san_pham`),
  ADD KEY `fk_ha_sp` (`id_san_pham`);

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_binh_luan`),
  ADD KEY `fk_bl_us` (`id_user`),
  ADD KEY `fk_bl_sp` (`id_san_pham`);

--
-- Indexes for table `bo_truyen`
--
ALTER TABLE `bo_truyen`
  ADD PRIMARY KEY (`id_bo_truyen`);

--
-- Indexes for table `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`id_msg`),
  ADD KEY `fk_ch_us` (`id_in`),
  ADD KEY `fk_ch_us2` (`id_out`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id_chi_tiet_don_hang`),
  ADD KEY `fk_ct_dh` (`id_don_hang`),
  ADD KEY `fk_ct_sp` (`id_san_pham`);

--
-- Indexes for table `chi_tiet_don_hang_bo_truyen`
--
ALTER TABLE `chi_tiet_don_hang_bo_truyen`
  ADD PRIMARY KEY (`id_chi_tiet_don_hang_bo_truyen`),
  ADD KEY `fk_ctbt_bt` (`id_bo_truyen`),
  ADD KEY `fk_ctbt_us` (`id_user`),
  ADD KEY `fk_ctbt_hd` (`id_don_hang`);

--
-- Indexes for table `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD PRIMARY KEY (`id_dia_chi`),
  ADD KEY `fk_dc_us` (`id_user`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don_hang`),
  ADD KEY `fk_dh_us` (`id_user`),
  ADD KEY `fk_dh_tth` (`id_trang_thai_don_hang`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_gio_hang`),
  ADD KEY `fk_gh_us` (`id_user`),
  ADD KEY `fk_gh_sp` (`id_san_pham`);

--
-- Indexes for table `ho_don`
--
ALTER TABLE `ho_don`
  ADD PRIMARY KEY (`id_hoa_don`),
  ADD KEY `fk_hd_dh` (`id_don_hang`);

--
-- Indexes for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id_loai_san_pham`);

--
-- Indexes for table `nha_phat_hanh`
--
ALTER TABLE `nha_phat_hanh`
  ADD PRIMARY KEY (`id_nha_phat_hanh`);

--
-- Indexes for table `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  ADD PRIMARY KEY (`id_nha_san_xuat`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id_quyen`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_san_pham`),
  ADD KEY `fk_sp_nsx` (`id_nha_san_xuat`),
  ADD KEY `fk_sp_nph` (`id_nha_phat_hanh`),
  ADD KEY `fk_sp_tg` (`id_tac_gia`);

--
-- Indexes for table `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`id_tac_gia`);

--
-- Indexes for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  ADD PRIMARY KEY (`id_trang_thai_don_hang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_us_q` (`id_quyen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anh_san_pham`
--
ALTER TABLE `anh_san_pham`
  MODIFY `id_anh_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_binh_luan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bo_truyen`
--
ALTER TABLE `bo_truyen`
  MODIFY `id_bo_truyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id_chi_tiet_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hang_bo_truyen`
--
ALTER TABLE `chi_tiet_don_hang_bo_truyen`
  MODIFY `id_chi_tiet_don_hang_bo_truyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dia_chi`
--
ALTER TABLE `dia_chi`
  MODIFY `id_dia_chi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id_gio_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `ho_don`
--
ALTER TABLE `ho_don`
  MODIFY `id_hoa_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id_loai_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nha_phat_hanh`
--
ALTER TABLE `nha_phat_hanh`
  MODIFY `id_nha_phat_hanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  MODIFY `id_nha_san_xuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tac_gia`
--
ALTER TABLE `tac_gia`
  MODIFY `id_tac_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  MODIFY `id_trang_thai_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anh_san_pham`
--
ALTER TABLE `anh_san_pham`
  ADD CONSTRAINT `fk_ha_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`);

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `fk_bl_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`),
  ADD CONSTRAINT `fk_bl_us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `chatbox`
--
ALTER TABLE `chatbox`
  ADD CONSTRAINT `fk_ch_us` FOREIGN KEY (`id_in`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `fk_ch_us2` FOREIGN KEY (`id_out`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `fk_ct_dh` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`),
  ADD CONSTRAINT `fk_ct_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`);

--
-- Constraints for table `chi_tiet_don_hang_bo_truyen`
--
ALTER TABLE `chi_tiet_don_hang_bo_truyen`
  ADD CONSTRAINT `fk_ctbt_bt` FOREIGN KEY (`id_bo_truyen`) REFERENCES `bo_truyen` (`id_bo_truyen`),
  ADD CONSTRAINT `fk_ctbt_hd` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`),
  ADD CONSTRAINT `fk_ctbt_us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD CONSTRAINT `fk_dc_us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_dh_tth` FOREIGN KEY (`id_trang_thai_don_hang`) REFERENCES `trang_thai_don_hang` (`id_trang_thai_don_hang`),
  ADD CONSTRAINT `fk_dh_us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `fk_gh_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`),
  ADD CONSTRAINT `fk_gh_us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `ho_don`
--
ALTER TABLE `ho_don`
  ADD CONSTRAINT `fk_hd_dh` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`);

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_sp_nph` FOREIGN KEY (`id_nha_phat_hanh`) REFERENCES `nha_phat_hanh` (`id_nha_phat_hanh`),
  ADD CONSTRAINT `fk_sp_nsx` FOREIGN KEY (`id_nha_san_xuat`) REFERENCES `nha_san_xuat` (`id_nha_san_xuat`),
  ADD CONSTRAINT `fk_sp_tg` FOREIGN KEY (`id_tac_gia`) REFERENCES `tac_gia` (`id_tac_gia`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_us_q` FOREIGN KEY (`id_quyen`) REFERENCES `quyen` (`id_quyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
