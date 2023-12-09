<?php
class BinhLuan
{
    public $id;
    public $nguoi_gui;
    public $san_pham;
    public $mes;
    public $ngay;
    public $anh;
    public $danh_gia;
    public function __construct($id, $nguoi_gui, $san_pham, $mes, $ngay,$anh, $danh_gia)
    {
        $this->id = $id;
        $this->nguoi_gui = $nguoi_gui;
        $this->san_pham = $san_pham;
        $this->mes = $mes;
        $this->ngay = $ngay;
        $this -> anh = $anh;
        $this->danh_gia = $danh_gia;
    }
}
