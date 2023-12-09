<?php
class Login
{
    public $name;
    public $role;
    public $id;
    public $img;
    public $trang_thai;
    public function __construct($id, $name, $role, $img, $trang_thai)
    {
        $this->name = $name;
        $this->role = $role;
        $this->img = $img;
        $this->trang_thai = $trang_thai;
        $this->id = $id;
    }
}
