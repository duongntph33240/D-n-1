-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2023 lúc 03:49 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh_san_pham`
--

CREATE TABLE `anh_san_pham` (
  `id_anh_san_pham` int(11) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `id_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `anh_san_pham`
--

INSERT INTO `anh_san_pham` (`id_anh_san_pham`, `hinh_anh`, `id_san_pham`) VALUES
(23, 'img2.jpg', 6),
(24, 'img3.jpg', 6),
(25, 'img4.jpg', 6),
(26, 'img5.jpg', 6),
(35, 'img4.jpg', 8),
(36, 'img5.jpg', 8),
(37, 'img6.jpg', 8),
(39, 'img2.jpg', 9),
(40, 'img3.jpg', 9),
(41, 'img0.jpg', 9),
(42, 'img4.jpg', 9),
(43, 'img5.jpg', 9),
(49, 'img0.jpg', 11),
(50, 'img1.jpg', 11),
(51, 'img2.jpg', 11),
(52, 'img3.jpg', 11),
(53, 'img4.jpg', 11),
(54, 'img0.jpg', 12),
(55, 'img1.jpg', 12),
(56, 'img2.jpg', 12),
(57, 'img3.jpg', 12),
(58, 'img4.jpg', 12),
(59, 'img5.jpg', 12),
(60, 'img6.jpg', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id_binh_luan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `noi_dung_binh_luan` varchar(255) NOT NULL,
  `ngay_binh_luan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `danh_gia` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bo_truyen`
--

CREATE TABLE `bo_truyen` (
  `id_bo_truyen` int(11) NOT NULL,
  `ten_bo_truyen` varchar(50) NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bo_truyen`
--

INSERT INTO `bo_truyen` (`id_bo_truyen`, `ten_bo_truyen`, `hinh_anh`, `trang_thai`) VALUES
(1, 'bộ truyện 1', '', 1),
(2, 'bộ truyện 2', '', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatbox`
--

CREATE TABLE `chatbox` (
  `id_msg` int(11) NOT NULL,
  `id_in` int(11) NOT NULL,
  `id_out` int(11) NOT NULL,
  `msg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chatbox`
--

INSERT INTO `chatbox` (`id_msg`, `id_in`, `id_out`, `msg`) VALUES
(75, 29, 28, 'alo'),
(76, 28, 29, 'loo con me may');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hang`
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
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id_chi_tiet_don_hang`, `id_san_pham`, `id_don_hang`, `gia`, `ten_san_pham`, `so_luong`) VALUES
(1, 11, 1, 1, 'sản phẩm 1', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dia_chi`
--

CREATE TABLE `dia_chi` (
  `id_dia_chi` int(11) NOT NULL,
  `dia_chi` varchar(255) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dia_chi`
--

INSERT INTO `dia_chi` (`id_dia_chi`, `dia_chi`, `trang_thai`) VALUES
(1, 'Nam định', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don_hang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `thoi_gian` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_trang_thai_don_hang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id_don_hang`, `id_user`, `thoi_gian`, `id_trang_thai_don_hang`) VALUES
(1, 28, '2023-11-18 05:28:19', 3),
(2, 28, '2023-11-17 14:27:03', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `id_gio_hang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_san_pham` int(11) NOT NULL,
  `so_luong` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ho_don`
--

CREATE TABLE `ho_don` (
  `id_hoa_don` int(11) NOT NULL,
  `id_don_hang` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `ma_hoa_don` varchar(100) NOT NULL,
  `phuong_thuc` varchar(30) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ho_don`
--

INSERT INTO `ho_don` (`id_hoa_don`, `id_don_hang`, `noidung`, `ma_hoa_don`, `phuong_thuc`, `trang_thai`) VALUES
(1, 1, '1', '1', 'vnpay', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_san_pham`
--

CREATE TABLE `loai_san_pham` (
  `id_loai_san_pham` int(11) NOT NULL,
  `ten_loai_san_pham` varchar(50) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_san_pham`
--

INSERT INTO `loai_san_pham` (`id_loai_san_pham`, `ten_loai_san_pham`, `trang_thai`) VALUES
(1, 'anime', 1),
(2, 'giáo dục', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_phat_hanh`
--

CREATE TABLE `nha_phat_hanh` (
  `id_nha_phat_hanh` int(11) NOT NULL,
  `ten_nha_phat_hanh` varchar(50) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_phat_hanh`
--

INSERT INTO `nha_phat_hanh` (`id_nha_phat_hanh`, `ten_nha_phat_hanh`, `trang_thai`) VALUES
(1, 'nhà phát hành 1', 1),
(2, 'nhà phát hành 2', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_san_xuat`
--

CREATE TABLE `nha_san_xuat` (
  `id_nha_san_xuat` int(11) NOT NULL,
  `ten_nha_san_xuat` varchar(50) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_san_xuat`
--

INSERT INTO `nha_san_xuat` (`id_nha_san_xuat`, `ten_nha_san_xuat`, `trang_thai`) VALUES
(1, 'nhà sản xuất 1', 1),
(2, 'nhà sản xuất 2', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id_quyen` int(11) NOT NULL,
  `ten_quyen` varchar(30) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`id_quyen`, `ten_quyen`, `trang_thai`) VALUES
(1, 'admin', 1),
(2, 'web', 1),
(3, 'ship', 1),
(4, 'user', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
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
  `id_loai_san_pham` int(11) NOT NULL,
  `id_bo_truyen` int(11) NOT NULL,
  `id_nha_san_xuat` int(11) NOT NULL,
  `id_nha_phat_hanh` int(11) NOT NULL,
  `trang_thai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id_san_pham`, `ten_san_pham`, `mo_ta`, `hinh_anh`, `gia_ban`, `gia_goc`, `so_luong`, `so_trang`, `id_tac_gia`, `nam_xb`, `kich_thuoc`, `trong_luong`, `ngay_nhap`, `id_loai_san_pham`, `id_bo_truyen`, `id_nha_san_xuat`, `id_nha_phat_hanh`, `trang_thai`) VALUES
(6, 'sách 1', 'sách 1', '6555ae09907ec.jpg', 11, 12, 12, 22, 4, '2023-11-18', '10cm(2*5)', 111, '2023-11-15', 1, 1, 1, 1, 1),
(8, 'sách 3', 'sách 3', 'img4.jpg', 11, 12, 11, 23, 4, '2023-11-01', '10cm(2*5)', 1, '2023-11-15', 1, 1, 1, 1, 1),
(9, 'sách 6', 'sách 2', '6555ae200f6f8.jpg', 11, 12, 66, 45, 5, '2023-11-04', '10cm(2*5)', 34, '2023-11-15', 2, 2, 2, 2, 1),
(11, 's1', 's1', '65562c9f950a0.jpg', 11, 11, 11, 11, 4, '2023-11-09', '11', 11, '2023-11-15', 1, 2, 1, 1, 1),
(12, 'sách 3', '2', 'img0.jpg', 1, 2, 1, 2, 4, '2023-11-19', '10cm(2*5)', 11, '2023-11-16', 1, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tac_gia`
--

CREATE TABLE `tac_gia` (
  `id_tac_gia` int(11) NOT NULL,
  `ten_tac_gia` varchar(100) NOT NULL,
  `trang_thai` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tac_gia`
--

INSERT INTO `tac_gia` (`id_tac_gia`, `ten_tac_gia`, `trang_thai`) VALUES
(4, 'Nguyễn Thế Dương', 0),
(5, 'duong 123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theo_doi`
--

CREATE TABLE `theo_doi` (
  `id_bo_truyen` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_bao`
--

CREATE TABLE `thong_bao` (
  `id_thong_bao` int(11) NOT NULL,
  `tu_khoa` varchar(50) NOT NULL,
  `noi_dung_thong_bao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_bao_user`
--

CREATE TABLE `thong_bao_user` (
  `id_thong_bao_user` int(11) NOT NULL,
  `noi_dung_thong_bao` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_thong_bao` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai_don_hang`
--

CREATE TABLE `trang_thai_don_hang` (
  `id_trang_thai_don_hang` int(11) NOT NULL,
  `ten_trang_thai_don_hang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai_don_hang`
--

INSERT INTO `trang_thai_don_hang` (`id_trang_thai_don_hang`, `ten_trang_thai_don_hang`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đang giao hàng'),
(3, 'Đã giao hàng'),
(4, 'Giao hàng không thành công'),
(5, 'Hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(100) NOT NULL,
  `sdt` varchar(10) DEFAULT NULL,
  `ten` varchar(100) DEFAULT 'khác hàng',
  `anh` varchar(100) NOT NULL DEFAULT 'user.jpg',
  `id_dia_chi` int(11) NOT NULL,
  `id_quyen` int(11) NOT NULL DEFAULT 4,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `email`, `mat_khau`, `sdt`, `ten`, `anh`, `id_dia_chi`, `id_quyen`, `trang_thai`) VALUES
(28, 'duong@gmail.com', '123', '00', 'khác hàng', 'user.jpg', 1, 4, 1),
(29, 'admin@admin.com', '123', NULL, 'duong', 'user.jpg', 0, 2, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anh_san_pham`
--
ALTER TABLE `anh_san_pham`
  ADD PRIMARY KEY (`id_anh_san_pham`),
  ADD KEY `fk_ha_sp` (`id_san_pham`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id_binh_luan`),
  ADD KEY `fk_bl_us` (`id_user`),
  ADD KEY `fk_bl_sp` (`id_san_pham`);

--
-- Chỉ mục cho bảng `bo_truyen`
--
ALTER TABLE `bo_truyen`
  ADD PRIMARY KEY (`id_bo_truyen`);

--
-- Chỉ mục cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`id_msg`),
  ADD KEY `fk_ch_us` (`id_in`),
  ADD KEY `fk_ch_us2` (`id_out`);

--
-- Chỉ mục cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD PRIMARY KEY (`id_chi_tiet_don_hang`),
  ADD KEY `fk_ct_dh` (`id_don_hang`),
  ADD KEY `fk_ct_sp` (`id_san_pham`);

--
-- Chỉ mục cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  ADD PRIMARY KEY (`id_dia_chi`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don_hang`),
  ADD KEY `fk_dh_us` (`id_user`),
  ADD KEY `fk_dh_tth` (`id_trang_thai_don_hang`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`id_gio_hang`),
  ADD KEY `fk_gh_us` (`id_user`),
  ADD KEY `fk_gh_sp` (`id_san_pham`);

--
-- Chỉ mục cho bảng `ho_don`
--
ALTER TABLE `ho_don`
  ADD PRIMARY KEY (`id_hoa_don`),
  ADD KEY `fk_hd_dh` (`id_don_hang`);

--
-- Chỉ mục cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  ADD PRIMARY KEY (`id_loai_san_pham`);

--
-- Chỉ mục cho bảng `nha_phat_hanh`
--
ALTER TABLE `nha_phat_hanh`
  ADD PRIMARY KEY (`id_nha_phat_hanh`);

--
-- Chỉ mục cho bảng `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  ADD PRIMARY KEY (`id_nha_san_xuat`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id_quyen`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id_san_pham`),
  ADD KEY `fk_sp_loai` (`id_loai_san_pham`),
  ADD KEY `fk_sp_bo` (`id_bo_truyen`),
  ADD KEY `fk_sp_nsx` (`id_nha_san_xuat`),
  ADD KEY `fk_sp_nph` (`id_nha_phat_hanh`),
  ADD KEY `fk_sp_tg` (`id_tac_gia`);

--
-- Chỉ mục cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  ADD PRIMARY KEY (`id_tac_gia`);

--
-- Chỉ mục cho bảng `theo_doi`
--
ALTER TABLE `theo_doi`
  ADD PRIMARY KEY (`id_bo_truyen`,`id_user`),
  ADD KEY `fk_td_us` (`id_user`);

--
-- Chỉ mục cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  ADD PRIMARY KEY (`id_thong_bao`);

--
-- Chỉ mục cho bảng `thong_bao_user`
--
ALTER TABLE `thong_bao_user`
  ADD PRIMARY KEY (`id_thong_bao_user`),
  ADD KEY `fk_tbu_us` (`id_user`),
  ADD KEY `fk_tbu_tb` (`id_thong_bao`);

--
-- Chỉ mục cho bảng `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  ADD PRIMARY KEY (`id_trang_thai_don_hang`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_us_q` (`id_quyen`),
  ADD KEY `fk_us_dc` (`id_dia_chi`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anh_san_pham`
--
ALTER TABLE `anh_san_pham`
  MODIFY `id_anh_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id_binh_luan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bo_truyen`
--
ALTER TABLE `bo_truyen`
  MODIFY `id_bo_truyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  MODIFY `id_chi_tiet_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `dia_chi`
--
ALTER TABLE `dia_chi`
  MODIFY `id_dia_chi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `id_gio_hang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ho_don`
--
ALTER TABLE `ho_don`
  MODIFY `id_hoa_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `loai_san_pham`
--
ALTER TABLE `loai_san_pham`
  MODIFY `id_loai_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nha_phat_hanh`
--
ALTER TABLE `nha_phat_hanh`
  MODIFY `id_nha_phat_hanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  MODIFY `id_nha_san_xuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id_quyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tac_gia`
--
ALTER TABLE `tac_gia`
  MODIFY `id_tac_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `thong_bao`
--
ALTER TABLE `thong_bao`
  MODIFY `id_thong_bao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thong_bao_user`
--
ALTER TABLE `thong_bao_user`
  MODIFY `id_thong_bao_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trang_thai_don_hang`
--
ALTER TABLE `trang_thai_don_hang`
  MODIFY `id_trang_thai_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anh_san_pham`
--
ALTER TABLE `anh_san_pham`
  ADD CONSTRAINT `fk_ha_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`);

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `fk_bl_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`),
  ADD CONSTRAINT `fk_bl_us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `chatbox`
--
ALTER TABLE `chatbox`
  ADD CONSTRAINT `fk_ch_us` FOREIGN KEY (`id_in`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `fk_ch_us2` FOREIGN KEY (`id_out`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `fk_ct_dh` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`),
  ADD CONSTRAINT `fk_ct_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`);

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `fk_dh_tth` FOREIGN KEY (`id_trang_thai_don_hang`) REFERENCES `trang_thai_don_hang` (`id_trang_thai_don_hang`),
  ADD CONSTRAINT `fk_dh_us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `fk_gh_sp` FOREIGN KEY (`id_san_pham`) REFERENCES `san_pham` (`id_san_pham`),
  ADD CONSTRAINT `fk_gh_us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `ho_don`
--
ALTER TABLE `ho_don`
  ADD CONSTRAINT `fk_hd_dh` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_sp_bo` FOREIGN KEY (`id_bo_truyen`) REFERENCES `bo_truyen` (`id_bo_truyen`),
  ADD CONSTRAINT `fk_sp_loai` FOREIGN KEY (`id_loai_san_pham`) REFERENCES `loai_san_pham` (`id_loai_san_pham`),
  ADD CONSTRAINT `fk_sp_nph` FOREIGN KEY (`id_nha_phat_hanh`) REFERENCES `nha_phat_hanh` (`id_nha_phat_hanh`),
  ADD CONSTRAINT `fk_sp_nsx` FOREIGN KEY (`id_nha_san_xuat`) REFERENCES `nha_san_xuat` (`id_nha_san_xuat`),
  ADD CONSTRAINT `fk_sp_tg` FOREIGN KEY (`id_tac_gia`) REFERENCES `tac_gia` (`id_tac_gia`);

--
-- Các ràng buộc cho bảng `theo_doi`
--
ALTER TABLE `theo_doi`
  ADD CONSTRAINT `fk_td_bo` FOREIGN KEY (`id_bo_truyen`) REFERENCES `bo_truyen` (`id_bo_truyen`),
  ADD CONSTRAINT `fk_td_us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `thong_bao_user`
--
ALTER TABLE `thong_bao_user`
  ADD CONSTRAINT `fk_tbu_tb` FOREIGN KEY (`id_thong_bao`) REFERENCES `thong_bao` (`id_thong_bao`),
  ADD CONSTRAINT `fk_tbu_us` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_us_q` FOREIGN KEY (`id_quyen`) REFERENCES `quyen` (`id_quyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
