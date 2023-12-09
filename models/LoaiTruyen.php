<?php 
class LoaiTruyen
{
    public $id;
    public $ten;
    public $trang_thai;
    public $soluong;
    public function __construct($id,$ten, $trang_thai,$soluong){
        $this->id = $id;
        $this->ten=$ten;
        $this->trang_thai=$trang_thai;
        $this -> soluong = $soluong;
    }
}