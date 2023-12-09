<?php
class SanPham
{
    public $id_san_pham, $ten_san_pham, $mo_ta, $hinh_anh, $gia_ban, $gia_goc, $so_luong, $so_trang, $id_tac_gia, $nam_xb, $kich_thuoc, $trong_luong, $ngay_nhap, $id_loai_san_pham, $id_bo_truyen, $id_nha_san_xuat, $id_nha_phat_hanh, $trang_thai;
    public function __construct($id_san_pham, $ten_san_pham, $mo_ta, $hinh_anh, $gia_ban, $gia_goc, $so_luong, $so_trang, $id_tac_gia, $nam_xb, $kich_thuoc, $trong_luong, $ngay_nhap, $id_loai_san_pham, $id_bo_truyen, $id_nha_san_xuat, $id_nha_phat_hanh, $trang_thai)
    {
        $this->id_san_pham = $id_san_pham;
        $this->ten_san_pham = $ten_san_pham;
        $this->mo_ta = $mo_ta;
        $this->hinh_anh = $hinh_anh;
        $this->gia_ban = $gia_ban;
        $this->gia_goc = $gia_goc;
        $this->so_luong = $so_luong;
        $this->so_trang = $so_trang;
        $this->id_tac_gia = $id_tac_gia;
        $this->nam_xb = $nam_xb;
        $this->kich_thuoc = $kich_thuoc;
        $this->trong_luong = $trong_luong;
        $this->ngay_nhap = $ngay_nhap;
        $this->id_loai_san_pham = $id_loai_san_pham;
        $this->id_bo_truyen = $id_bo_truyen;
        $this->id_nha_san_xuat = $id_nha_san_xuat;
        $this->id_nha_phat_hanh = $id_nha_phat_hanh;
        $this->trang_thai = $trang_thai;
    }
}
class SanPhamList
{
    public $id_san_pham, $ten_san_pham, $mo_ta, $hinh_anh, $gia_ban, $gia_goc, $so_luong, $so_trang, $id_tac_gia, $nam_xb, $kich_thuoc, $trong_luong, $ngay_nhap, $id_nha_san_xuat, $id_nha_phat_hanh, $trang_thai;
    public function __construct($id_san_pham, $ten_san_pham, $mo_ta, $hinh_anh, $gia_ban, $gia_goc, $so_luong, $so_trang, $id_tac_gia, $nam_xb, $kich_thuoc, $trong_luong, $ngay_nhap, $id_nha_san_xuat, $id_nha_phat_hanh, $trang_thai)
    {
        $this->id_san_pham = $id_san_pham;
        $this->ten_san_pham = $ten_san_pham;
        $this->mo_ta = $mo_ta;
        $this->hinh_anh = $hinh_anh;
        $this->gia_ban = $gia_ban;
        $this->gia_goc = $gia_goc;
        $this->so_luong = $so_luong;
        $this->so_trang = $so_trang;
        $this->id_tac_gia = $id_tac_gia;
        $this->nam_xb = $nam_xb;
        $this->kich_thuoc = $kich_thuoc;
        $this->trong_luong = $trong_luong;
        $this->ngay_nhap = $ngay_nhap;
       
        $this->id_nha_san_xuat = $id_nha_san_xuat;
        $this->id_nha_phat_hanh = $id_nha_phat_hanh;
        $this->trang_thai = $trang_thai;
    }
}
class card
{
    public $id_gio_hang, $id_user, $id_san_pham, $gia_ban, $so_luong, $hinh_anh, $id_loai_san_pham, $id_bo_truyen, $ten_san_pham;
    public function __construct($id_gio_hang, $id_user, $id_san_pham, $gia_ban, $so_luong, $hinh_anh, $id_loai_san_pham, $id_bo_truyen, $ten_san_pham)
    {
        $this->id_gio_hang = $id_gio_hang;
        $this->id_user = $id_user;
        $this->id_san_pham = $id_san_pham;
        $this->gia_ban = $gia_ban;
        $this->so_luong = $so_luong;
        $this->hinh_anh = $hinh_anh;
        $this->id_loai_san_pham = $id_loai_san_pham;
        $this->id_bo_truyen = $id_bo_truyen;
        $this->ten_san_pham = $ten_san_pham;
    }
}
