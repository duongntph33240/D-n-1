<?php
include_once('../../DAO/TaiKhoanDAOAPI.php');
class TaiKhoanControllerAPI
{
    public function add($text)
    {
        $TaiKhoanDAO = new TaiKhoaDAOAPI();
        $TaiKhoanDAO->add($text);
        $TaiKhoanDAO->show_dia_chi();
    }
    public function edit($text)
    {
        $TaiKhoanDAO = new TaiKhoaDAOAPI();
        $TaiKhoanDAO->update($text);
        $TaiKhoanDAO->show_dia_chi();
    }
    public function delete($text)
    {
        $TaiKhoanDAO = new TaiKhoaDAOAPI();
        $TaiKhoanDAO->delete($text);
        $TaiKhoanDAO->show_dia_chi();
    }
}
