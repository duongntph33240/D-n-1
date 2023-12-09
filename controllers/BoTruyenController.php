<?php
include_once 'DAO/BoTruyenDAO.php';
class BoTruyenController
{
    // lấy danh sách bộ truyện
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    $loaiTruyenDAO = new loaiTruyenDAO();
                    $danh_muc = $loaiTruyenDAO->show();
                    $BoTruyenDAO = new BoTruyenDAO();
                    $san_pham = $BoTruyenDAO->showList();
                    $GioHangDAO = new GioHangDAO();
                    $sum = $GioHangDAO->sum($_SESSION['id']);
                    include_once('views/botruyen/user/botruyen.php');
                } else {
                    $BoTruyenDAO = new BoTruyenDAO();
                    $list = $BoTruyenDAO->show();
                    include_once "views/botruyen/admin/list.php";
                }
            } else {
                $loaiTruyenDAO = new loaiTruyenDAO();
                $danh_muc = $loaiTruyenDAO->show();
                $BoTruyenDAO = new BoTruyenDAO();
                $san_pham = $BoTruyenDAO->showList();
                $GioHangDAO = new GioHangDAO();
                $sum = $GioHangDAO->sum($_SESSION['id']);
                include_once('views/botruyen/user/botruyen.php');
            }
        } else {
            $loaiTruyenDAO = new loaiTruyenDAO();
            $danh_muc = $loaiTruyenDAO->show();
            $BoTruyenDAO = new BoTruyenDAO();
            $san_pham = $BoTruyenDAO->showList();
            $sum = 0;
            include_once('views/botruyen/user/botruyen.php');
        }
    }
    //
    public function showOne()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    $BoTruyenDAO = new BoTruyenDAO();
                    $bo_truyen = $BoTruyenDAO->showView($_GET['id']);
                    $bo_truyen_lien_quan = $BoTruyenDAO->list($_GET['id'], $_GET['loai']);
                    $SanPhamDAO = new SanPhamDAO();
                    $san_pham = $SanPhamDAO->showBo($_GET['id']);
                    $GioHangDAO = new GioHangDAO();
                    $sum = $GioHangDAO->sum($_SESSION['id']);
                    include_once('views/botruyen/user/botruyenDetal.php');
                } else {
                    $BoTruyenDAO = new BoTruyenDAO();
                    $list = $BoTruyenDAO->show();
                    include_once "views/botruyen/admin/list.php";
                }
            } else {
                $BoTruyenDAO = new BoTruyenDAO();
                $bo_truyen = $BoTruyenDAO->showView($_GET['id']);
                $bo_truyen_lien_quan = $BoTruyenDAO->list($_GET['id'], $_GET['loai']);
                $SanPhamDAO = new SanPhamDAO();
                $san_pham = $SanPhamDAO->showBo($_GET['id']);
                $GioHangDAO = new GioHangDAO();
                $sum = $GioHangDAO->sum($_SESSION['id']);
                include_once('views/botruyen/user/botruyenDetal.php');
            }
        } else {
            $BoTruyenDAO = new BoTruyenDAO();
            $bo_truyen = $BoTruyenDAO->showView($_GET['id']);
            $bo_truyen_lien_quan = $BoTruyenDAO->list($_GET['id'], $_GET['loai']);
            $SanPhamDAO = new SanPhamDAO();
            $san_pham = $SanPhamDAO->showBo($_GET['id']);
            $sum = 0;
            include_once('views/botruyen/user/botruyenDetal.php');
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
                    $BoTruyenDAO = new BoTruyenDAO();
                    $BoTruyenDAO->add($_POST['ten'], $_POST['id_loai_san_pham'], $_FILES['img'], $_POST['giaban'], $_POST['giagoc'], $_POST['mo_ta']);
                    $sl = $BoTruyenDAO->countid();
                    $BoTruyenDAO->addPro($sl, $_POST['add_pro']);
                    $list = $BoTruyenDAO->show();
                    $_SESSION['error'] = 'thêm mới thành công';
                    header('location: index.php?controller=boTruyen');
                    exit();
                } else {
                    $loaiTruyenDAO = new loaiTruyenDAO();
                    $loai = $loaiTruyenDAO->show();
                    $danh_muc = $loaiTruyenDAO->show();
                    $BoTruyenDAO = new BoTruyenDAO();

                    // $san_pham = $BoTruyenDAO->show();
                    $SanPhamDAO = new SanPhamDAO();
                    $san_pham = $SanPhamDAO->listSanPham();

                    include_once('views/botruyen/admin/add.php');
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
                $BoTruyenDAO = new BoTruyenDAO();
                $BoTruyenDAO->remove($_GET['id']);
                $list = $BoTruyenDAO->show();
                $_SESSION['error'] = 'Xoá thành công';
                header('location: index.php?controller=boTruyen');
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
                    $BoTruyenDAO = new BoTruyenDAO();
                    $BoTruyenDAO->update($_POST['id'], $_POST['loai'], $_POST['ten'], $_POST['giaban'], $_POST['giagoc'], $_POST['mota'], $_POST['trang_thai'], $_FILES['img']);

                    if (isset($_POST['add_pro'])) {
                        $BoTruyenDAO->addPro($_POST['id'], $_POST['add_pro']);
                    }
                    // var_dump($_POST['add_pro']);
                    $list = $BoTruyenDAO->show();
                    $_SESSION['error'] = 'Sửa thông tin thành công';
                    header('location: index.php?controller=boTruyen');
                    exit();
                } else {
                    $BoTruyenDAO = new BoTruyenDAO();
                    $list = $BoTruyenDAO->showView($_GET['id']);
                    $loaiTruyenDAO = new LoaiTruyenDAO();
                    $loai = $loaiTruyenDAO->show();
                    $SanPhamDAO = new SanPhamDAO();
                    $bo = $SanPhamDAO->showBo($_GET['id']);
                    $san_pham = $SanPhamDAO->listSanPham();
                    include_once "views/botruyen/admin/fix.php";
                }
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
}