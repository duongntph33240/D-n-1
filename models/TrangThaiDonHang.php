<?php
class TrangThaiDonHang{
    public $id_trang_thai_don_hang,$ten_trang_thai_don_hang;
    public function __construct($id_trang_thai_don_hang,$ten_trang_thai_don_hang)
    {
        $this->id_trang_thai_don_hang = $id_trang_thai_don_hang;
        $this->ten_trang_thai_don_hang = $ten_trang_thai_don_hang;
    }
}