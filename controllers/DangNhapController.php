<?php
include_once 'DAO/LoginDAO.php';
class DangNhapController
{
    // đăng nhập
    public function index()
    {
        if (isset($_POST['email'])) {
            $loginDao = new LoginDao();
            $user = $loginDao->Login($_POST['email'], $_POST['password']);
            if ($user != []) {
                if (isset($_SESSION['error'])) {
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                    unset($_SESSION['username']);
                    unset($_SESSION['password']);
                }
                foreach ($user as $key => $value) {
                    $_SESSION['id'] = $value->id;
                    $_SESSION['name'] = $value->name;
                    $_SESSION['img'] = $value->img;
                    $_SESSION['role'] = $value->role;
                    $_SESSION['trang_thai'] = $value->trang_thai;
                };

                // Chuyển hướng sau khi đăng nhập thành công
                header("Location: index.php?controller=trangChu");
                exit();
            } else {
                $_SESSION['error'] = "đăng nhập thất bại";
                // Chuyển hướng sau khi đăng nhập thành công
                header("Location: index.php?controller=dangNhap");
                exit();
            }
        } else {
            include_once "views/dangNhap/Login.php";
        }
    }
    // đăng xuất
    public function logout()
    {
        session_unset();
        header("Location: index.php?controller=trangChu");
        exit();
    }
    // đăng ký
    public function signup()
    {
        if (isset($_SESSION['username'])) {
            header("Location: index.php?controller=dangNhap");
        } else {
            if (isset($_SESSION['role'])) {
                header("Location: index.php?controller=trangChu");
            } else {
                if (isset($_POST['email'])) {
                    $LoginDAO = new LoginDAO();
                    $LoginDAO->signup($_POST['name'], $_POST['email'], $_POST['password']);
                    header("Location: index.php?controller=dangNhap");
                    exit();
                } else {
                    header("Location: index.php?controller=dangNhap");
                }
            }
        }
    }
}
