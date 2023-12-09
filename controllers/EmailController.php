<?php
include_once "DAO/EmailDAO.php";
class EmailController
{
    public function quenMatKhau()
    {
        if (isset($_GET['nhapEmail'])) {
            // Chưa có check email
            $EmailDAO = new EmailDAO();
            $TaiKhoanDAO = new TaiKhoanDAO();
            $email = $_POST['email'];
            $user = $TaiKhoanDAO->showEmail($email);
            $id = $user[0]->id;
            $EmailDAO->quenMatKhau($id, $email);
            include_once "views/dangNhap/NhapEmail.php";
        } elseif (isset($_GET['datLaiMatKhau'])) {
            if (isset($_GET['id']) && isset($_GET['email'])) {
                if (isset($_POST['mk1']) && isset($_POST['mk2']) && $_POST['mk1'] != $_POST['mk2']) {
                    $TaiKhoanDAO = new TaiKhoanDAO();
                    $check = $TaiKhoanDAO->checkUS($_POST['email'], $_POST['id']);
                    if (empty($check)) {
                        // Thiếu thông báo sai tài khoản
                        echo "không tìm được tài khoản này";
                    } else {
                        $id = $_GET['id'];
                        $email = $_GET['email'];
                        include_once "views/dangNhap/MatKhauMoi.php";
                    }
                } else if (!isset($_POST['mk1']) && !isset($_POST['mk2'])) {
                    $TaiKhoanDAO = new TaiKhoanDAO();
                    $check = $TaiKhoanDAO->checkUS($_GET['email'], $_GET['id']);
                    if (empty($check)) {
                        // Thiếu thông báo sai tài khoản
                        echo "không tìm được tài khoản này";
                    } else {
                        $id = $_GET['id'];
                        $email = $_GET['email'];
                        include_once "views/dangNhap/MatKhauMoi.php";
                    }
                }
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['mk1']) && isset($_POST['mk2']) && isset($_POST['email']) && isset($_POST['id'])) {
                if ($_POST['mk1'] == $_POST['mk2']) {
                    $TaiKhoanDAO = new TaiKhoanDAO();
                    $TaiKhoanDAO->updateMK($_POST['mk1'], $_POST['email']);
                    header("location: index.php?controller=dangNhap");
                } else {
                    //Thiếu thông báo nhập không trùng mk
                    $email = $_POST['email'];
                    $id = $_POST['id'];
                    header("location: http://localhost/php/Nhom01_WebBanHang_Edubook/index.php?controller=quenMatKhau&datLaiMatKhau&id=" . $id . "&email=" . $email);
                }
            }
        } else {
            include_once "views/dangNhap/NhapEmail.php";
        }
    }
}
