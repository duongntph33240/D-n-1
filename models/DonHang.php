<?php
class DonHang
{
    public $id_don_hang, $id_user, $thoi_gian, $id_trang_thai_don_hang, $ten_tt_don_hang;
    public function __construct($id_don_hang, $id_user, $thoi_gian, $id_trang_thai_don_hang, $ten_tt_don_hang)
    {
        $this->id_don_hang = $id_don_hang;
        $this->id_user = $id_user;
        $this->thoi_gian = $thoi_gian;
        $this->id_trang_thai_don_hang = $id_trang_thai_don_hang;
        $this->ten_tt_don_hang = $ten_tt_don_hang;
    }
}
class DonHangshow
{
    public $id_don_hang, $ma_hoa_don, $id_user, $sdt, $thoi_gian, $id_trang_thai_don_hang, $ten_tt_don_hang;
    public function __construct($id_don_hang, $ma_hoa_don, $id_user, $sdt, $thoi_gian, $id_trang_thai_don_hang, $ten_tt_don_hang)
    {
        $this->id_don_hang = $id_don_hang;
        $this->id_user = $id_user;
        $this->thoi_gian = $thoi_gian;
        $this->id_trang_thai_don_hang = $id_trang_thai_don_hang;
        $this->ten_tt_don_hang = $ten_tt_don_hang;
        $this->sdt = $sdt;
        $this->ma_hoa_don = $ma_hoa_don;
    }
}
class ChiTietDonHang
{
    public $id_chi_tiet_don_hang, $id_san_pham, $id_don_hang, $gia, $ten_san_pham, $so_luong;
    public function __construct($id_chi_tiet_don_hang, $id_san_pham, $id_don_hang, $gia, $ten_san_pham, $so_luong)
    {
        $this->id_chi_tiet_don_hang = $id_chi_tiet_don_hang;
        $this->id_san_pham = $id_san_pham;
        $this->id_don_hang = $id_don_hang;
        $this->gia = $gia;
        $this->ten_san_pham = $ten_san_pham;
        $this->so_luong = $so_luong;
    }
}
class LichSu
{
    public $id_don_hang, $thoi_gian, $trang_thai_don_hang, $ten_san_pham, $gia, $so_luong;
    public function __construct($id_don_hang, $thoi_gian, $trang_thai_don_hang, $ten_san_pham, $gia, $so_luong)
    {
        $this->id_don_hang = $id_don_hang;
        $this->thoi_gian = $thoi_gian;
        $this->trang_thai_don_hang = $trang_thai_don_hang;
        $this->ten_san_pham = $ten_san_pham;
        $this->gia = $gia;
        $this->so_luong = $so_luong;
    }
}
class showu
{
    public $id_don_hang, $ma_don, $ten, $sdt, $thoi_gian, $dia_chi, $phung_thuc;
    public function __construct($id_don_hang, $ma_don, $ten, $sdt, $thoi_gian, $dia_chi, $phung_thuc)
    {
        $this->id_don_hang = $id_don_hang;
        $this->ma_don = $ma_don;
        $this->sdt = $sdt;
        $this->ten = $ten;
        $this->thoi_gian = $thoi_gian;
        $this->dia_chi = $dia_chi;
        $this->phung_thuc = $phung_thuc;
    }
}
class showpro
{
    public $hinh_anh, $ten_san_pham, $gia, $so_luong, $id_san_pham, $id_loai_san_pham, $id_bo_truyen, $trang_thai;
    public function __construct($hinh_anh, $ten_san_pham, $gia, $so_luong, $id_san_pham, $id_loai_san_pham, $id_bo_truyen, $trang_thai)
    {
        $this->hinh_anh = $hinh_anh;
        $this->ten_san_pham = $ten_san_pham;
        $this->gia = $gia;
        $this->so_luong = $so_luong;
        $this->id_san_pham = $id_san_pham;
        $this->id_loai_san_pham = $id_loai_san_pham;
        $this->id_bo_truyen = $id_bo_truyen;
        $this->trang_thai = $trang_thai;
    }
}
