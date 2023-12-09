<?php
include_once('DAO/TrangChuDAO.php');
class TrangChuController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    $LoaiTruyenDAO = new LoaiTruyenDAO();
                    $danh_muc = $LoaiTruyenDAO->show();
                    $SanPhamDAO = new SanPhamDAO();
                    $san_pham = $SanPhamDAO->show();
                    $san_pham_now = $SanPhamDAO->showNow();
                    $BoTruyenDAO = new BoTruyenDAO();
                    $Bo_truyen = $BoTruyenDAO->show();
                    $GioHangDAO = new GioHangDAO();
                    $sum = $GioHangDAO->sum($_SESSION['id']);
                    include_once('views/trangChu/user/Home.php');
                } else {
                    $trangChuDAO = new TrangChuDAO();
                    $doanh_thu = $trangChuDAO->show_thong_ke();
                    $don_hang = $trangChuDAO->don_hang();
                    $don_hanh_chua_giao = $trangChuDAO->don_hang_chua_giao();
                    $lien_he = $trangChuDAO->phanhoi();
                    $all_san_pham = $trangChuDAO->all_san_pahm();
                    $san_pham = $trangChuDAO->List_san_pham();
                    $bill = $trangChuDAO->all_don_hang();
                    include_once('views/trangChu/admin/Home.php');
                }
            } else {
                $LoaiTruyenDAO = new LoaiTruyenDAO();
                $danh_muc = $LoaiTruyenDAO->show();
                $SanPhamDAO = new SanPhamDAO();
                $san_pham = $SanPhamDAO->show();
                $san_pham_now = $SanPhamDAO->showNow();
                $BoTruyenDAO = new BoTruyenDAO();
                $Bo_truyen = $BoTruyenDAO->show();
                $GioHangDAO = new GioHangDAO();
                $sum = $GioHangDAO->sum($_SESSION['id']);
                include_once('views/trangChu/user/Home.php');
            }
        } else {
            $LoaiTruyenDAO = new LoaiTruyenDAO();
            $danh_muc = $LoaiTruyenDAO->show();
            $SanPhamDAO = new SanPhamDAO();
            $san_pham = $SanPhamDAO->show();
            $san_pham_now = $SanPhamDAO->showNow();
            $BoTruyenDAO = new BoTruyenDAO();
            $Bo_truyen = $BoTruyenDAO->show();
            $sum = 0;
            include_once('views/trangChu/user/Home.php');
        }
    }
}
