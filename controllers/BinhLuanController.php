<?php
include_once('DAO/BinhLuaDAO.php');
class BinhLuanController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    $sanPhamDAO = new SanPhamDAO();
                    $infor = $sanPhamDAO->showOne($_POST['id']);
                    $imgs = $sanPhamDAO->showImg($_POST['id']);
                    $lien_quan = $sanPhamDAO->showLQ($_GET['loai']);
                    $bo_truyen = $sanPhamDAO->showBo($_GET['botruyen']);
                    $BinhLuanDAO = new BinhLuanDAO();
                    $time = get_time();
                    $BinhLuanDAO->add($_POST['id'], $_SESSION['id'], $time, $_POST['comment']);
                    $binh_luan = $BinhLuanDAO->showOne($_POST['id']);
                    include_once "views/sach/user/ProductDetail.php";
                } else {
                    $BinhLuaDAO = new BinhLuanDAO();
                    $list = $BinhLuaDAO->show();
                    include_once "views/binhluan/admin/list.php";
                }
            } else {
                $sanPhamDAO = new SanPhamDAO();
                $infor = $sanPhamDAO->showOne($_POST['id']);
                $imgs = $sanPhamDAO->showImg($_POST['id']);
                $lien_quan = $sanPhamDAO->showLQ($_GET['loai']);
                $bo_truyen = $sanPhamDAO->showBo($_GET['botruyen']);
                $BinhLuanDAO = new BinhLuanDAO();
                $time = get_time();
                $BinhLuanDAO->add($_POST['id'], $_SESSION['id'], $time, $_POST['comment']);
                $binh_luan = $BinhLuanDAO->showOne($_POST['id']);
                include_once "views/sach/user/ProductDetail.php";
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
    public function delete()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    include_once('views/trangChu/user/Home.php');
                } else {
                    $BinhLuaDAO = new BinhLuanDAO();
                    $BinhLuaDAO->delete($_GET['id']);
                    $_SESSION['error'] = 'Xoá thành công';
                    header("Location: index.php?controller=binhLuan");
                    exit();
                }
            } else {
                include_once('views/trangChu/user/Home.php');
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
}
