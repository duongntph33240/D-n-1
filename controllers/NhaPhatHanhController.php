<?php
include_once 'DAO/NhaPhatHanhDAO.php';
class NhaPhatHanhController
{
    // lấy danh sách bộ truyện
    public function index()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header('location: index.php?controller=trangChu');
            } else {
                $NhaPhatHanhDAO = new NhaPhatHanhDAO();
                $list = $NhaPhatHanhDAO->show();
                include_once "views/nhaphathanh/admin/list.php";
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    // tạo mới bộ truện
    public function add()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header('location: index.php?controller=trangChu');
            } else {
                if (isset($_POST['ten'])) {
                    $NhaPhatHanhDAO = new NhaPhatHanhDAO();
                    $NhaPhatHanhDAO->add($_POST['ten']);
                    $list = $NhaPhatHanhDAO->show();
                    $_SESSION['error'] = 'thêm mới thành công';
                    header('location: index.php?controller=nhaPhatHanh');
                    exit();
                } else {
                    include_once('views/nhaphathanh/admin/add.php');
                }
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    // xoá bộ truyện
    public function remove()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header('location: index.php?controller=trangChu');
            } else {
                $NhaPhatHanhDAO = new NhaPhatHanhDAO();
                $NhaPhatHanhDAO->remove($_GET['id']);
                $list = $NhaPhatHanhDAO->show();
                $_SESSION['error'] = 'Xoá thành công';
                header('location: index.php?controller=nhaPhatHanh');
                exit();
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    // sửa bộ truyện
    public function update()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header('location: index.php?controller=trangChu');
            } else {
                if (isset($_POST['ten'])) {
                    $NhaPhatHanhDAO = new NhaPhatHanhDAO();
                    $NhaPhatHanhDAO->update($_POST['id'], $_POST['ten'], $_POST['trang_thai']);
                    $list = $NhaPhatHanhDAO->show();
                    $_SESSION['error'] = 'Sửa thông tin thành công';
                    header('location: index.php?controller=nhaPhatHanh');
                    exit();
                } else {
                    $NhaPhatHanhDAO = new NhaPhatHanhDAO();
                    $list = $NhaPhatHanhDAO->showOne($_GET['id']);
                    include_once "views/nhaphathanh/admin/fix.php";
                }
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
}
