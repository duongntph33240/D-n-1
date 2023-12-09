<?php
class AnhSanPham{
    public $id;
    public $hinh_anh;
    public $id_san_pham;
    public function __construct($id,$hinh_anh,$id_san_pham)
    {
        $this->id = $id;
        $this->hinh_anh = $hinh_anh;
        $this->id_san_pham = $id_san_pham;
    }
}