<?php
include_once 'DAO/PDFDAO.php';
//include 'DAO/DonHangDAO.php';

class PDFController
{
    public function indexXuat()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header("location: index.php?controller=trangChu");
            } elseif (isset($_GET['nd']) && $_GET['nd']=='all'){
                $pdf = new PDFDAO();
                $DonHangDAO = new DonHangDAO();
                $info = $DonHangDAO->showOneId($_GET['id']);
                $sanPham = $DonHangDAO->gethd_id($_GET['id']);
                $pdf->generateInvoice($info, $sanPham);
                $list = $DonHangDAO->show();
                include "views/donhang/admin/list.php";
            } else {
                $pdf = new PDFDAO();
                $DonHangDAO = new DonHangDAO();
                $info = $DonHangDAO->showOneId($_GET['id']);
                $sanPham = $DonHangDAO->gethd_id($_GET['id']);
                $pdf->generateInvoice($info, $sanPham);
                $list = $DonHangDAO->show();
                include "views/donhang/admin/list.php";
            }
        } else {
            header("location: index.php?controller=trangChu");
        }
    }
}
