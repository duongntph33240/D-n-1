<?php
class TacGia
{
    public $id;
    public $ten;
    public $soluong;
    public $trang_thai;
    public function __construct($id, $ten, $soluong, $trang_thai)
    {
        $this->id = $id;
        $this->ten = $ten;
        $this->soluong = $soluong;
        $this->trang_thai = $trang_thai;
    }
}
