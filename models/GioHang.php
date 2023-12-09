<?php
class GioHang
{
    public $id;
    public $idpro;
    public $hinh_anh;
    public $ten;
    public $gia;
    public $so_luong;
    public function __construct($id, $idpro, $hinh_anh, $ten, $so_luong, $gia)
    {
        $this->id = $id;
        $this->idpro = $idpro;
        $this->hinh_anh = $hinh_anh;
        $this->ten = $ten;
        $this->so_luong = $so_luong;
        $this->gia = $gia;
    }
}
