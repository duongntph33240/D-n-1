<?php
class TaiKhoan
{
    public $id;
    public $name;
    public $email;
    public $quyen;
    public $trang_thai;
    public function __construct($id, $name, $email, $quyen, $trang_thai)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->quyen = $quyen;
        $this->trang_thai = $trang_thai;
    }
}
class role
{
    public $id;
    public $name;
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
}
class DiaChi
{
    public $name, $sdt, $diaChi;
    public function __construct($name, $sdt, $diaChi)
    {
        $this->name = $name;
        $this->sdt = $sdt;
        $this->diaChi = $diaChi;
    }
}
class listDiaChi
{
    public $id;
    public $dia_chi;
    public $trang_thai;
    public function __construct($id, $dia_chi, $trang_thai)
    {
        $this->id = $id;
        $this->dia_chi = $dia_chi;
        $this->trang_thai = $trang_thai;
    }
}
class infor
{
    public $id;
    public $name;
    public $email;
    public $mat_khau;
    public $sdt;
    public $anh;
    public function __construct($id, $name, $email, $mat_khau, $sdt, $anh)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->mat_khau = $mat_khau;
        $this->sdt = $sdt;
        $this->anh = $anh;
    }
}
