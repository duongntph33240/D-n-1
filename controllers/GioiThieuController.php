<?php
class GioiThieuController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    $GioHangDAO = new GioHangDAO();
                    $sum = $GioHangDAO->sum($_SESSION['id']);
                    $LoaiTruyenDAO = new LoaiTruyenDAO();
                    $danh_muc = $LoaiTruyenDAO->show();
                    include_once "views/gioithieu/gioithieu.php";
                } else {
                    header('Location: index.php?controller=trangChu');
                }
            } else {

                $GioHangDAO = new GioHangDAO();
                $sum = $GioHangDAO->sum($_SESSION['id']);
                $LoaiTruyenDAO = new LoaiTruyenDAO();
                $danh_muc = $LoaiTruyenDAO->show();
                include_once "views/gioithieu/gioithieu.php";
            }
        } else {


            $GioHangDAO = new GioHangDAO();
            $LoaiTruyenDAO = new LoaiTruyenDAO();
            $danh_muc = $LoaiTruyenDAO->show();
            $sum = 0;
            include_once "views/gioithieu/gioithieu.php";
        }
    }
}
