<?php
class BoTruyen
{
    public $id;
    public $img;
    public $ten;
    public $trang_thai;
    public $soluong;
    public function __construct($id, $ten, $trang_thai, $soluong, $img)
    {
        $this->id = $id;
        $this->ten = $ten;
        $this->trang_thai = $trang_thai;
        $this->soluong = $soluong;
        $this->img = $img;
    }
}
class ShowBoTruyen
{
    public $id;
    public $img;
    public $ten;
    public $loai;
    public $gia_ban;
    public $gia_goc;
    public $mo_ta;
    public $trang_thai;
    public function __construct($id, $ten, $img, $loai, $gia_ban, $gia_goc, $mo_ta, $trang_thai)
    {
        $this->id = $id;
        $this->loai = $loai;
        $this->ten = $ten;
        $this->img = $img;
        $this->gia_ban = $gia_ban;
        $this->gia_goc = $gia_goc;
        $this->mo_ta = $mo_ta;
        $this->trang_thai = $trang_thai;
    }
}
