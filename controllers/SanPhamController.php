<?php
include_once "DAO/SanPhamDAO.php";
//include_once "DAO/TacGiaDAO.php";
//include_once "DAO/SanPhamDAO.php";

class SanPhamController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    $GioHangDAO = new GioHangDAO();
                    $sum = $GioHangDAO->sum($_SESSION['id']);
                    if (isset($_GET['id'])) {
                        $sanPhamDAO = new SanPhamDAO();
                        $LoaiTruyenDAO = new LoaiTruyenDAO();
                        $danh_muc = $LoaiTruyenDAO->show();
                        $list = $sanPhamDAO->showLQ($_GET['id']);
                        include_once "views/sach/user/Product.php";
                    } else {
                        $sanPhamDAO = new SanPhamDAO();
                        $LoaiTruyenDAO = new LoaiTruyenDAO();
                        $danh_muc = $LoaiTruyenDAO->show();
                        $list = $sanPhamDAO->show();
                        include_once "views/sach/user/Product.php";
                    }
                } else {
                    $sanPhamDAO = new SanPhamDAO();
                    $list = $sanPhamDAO->showList();
                    include_once "views/sach/admin/list.php";
                }
            } else {

                $GioHangDAO = new GioHangDAO();
                $sum = $GioHangDAO->sum($_SESSION['id']);
                if (isset($_GET['id'])) {
                    $sanPhamDAO = new SanPhamDAO();
                    $LoaiTruyenDAO = new LoaiTruyenDAO();
                    $danh_muc = $LoaiTruyenDAO->show();
                    $list = $sanPhamDAO->showLQ($_GET['id']);
                    include_once "views/sach/user/Product.php";
                } else {
                    $sanPhamDAO = new SanPhamDAO();
                    $LoaiTruyenDAO = new LoaiTruyenDAO();
                    $danh_muc = $LoaiTruyenDAO->show();
                    $list = $sanPhamDAO->show();

                    include_once "views/sach/user/Product.php";
                }
            }
        } else {
            $sanPhamDAO = new SanPhamDAO();
            $LoaiTruyenDAO = new LoaiTruyenDAO();
            $danh_muc = $LoaiTruyenDAO->show();
            $list = $sanPhamDAO->show();
            $sum = 0;
            include_once "views/sach/user/Product.php";
        }
    }
    public function productDetail()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    $sanPhamDAO = new SanPhamDAO();
                    $infor = $sanPhamDAO->showOne($_GET['id']);
                    $imgs = $sanPhamDAO->showImg($_GET['id']);
                    $lien_quan = $sanPhamDAO->showLQ($_GET['loai']);
                    $bo_truyen = $sanPhamDAO->showBo($_GET['botruyen']);
                    $BinhLuanDAO = new BinhLuanDAO();
                    $binh_luan = $BinhLuanDAO->showOne($_GET['id']);
                    $star = $BinhLuanDAO->showOne_star($_GET['id']);
                    $GioHang = new GioHangDAO();
                    $sum = $GioHang->sum($_SESSION['id']);
                    include_once "views/sach/user/ProductDetail.php";
                } else {
                    $sanPhamDAO = new SanPhamDAO();
                    $list = $sanPhamDAO->showList();
                    include_once "views/sach/admin/list.php";
                }
            } else {
                $sanPhamDAO = new SanPhamDAO();
                $infor = $sanPhamDAO->showOne($_GET['id']);
                $imgs = $sanPhamDAO->showImg($_GET['id']);
                $lien_quan = $sanPhamDAO->showLQ($_GET['loai']);
                $bo_truyen = $sanPhamDAO->showBo($_GET['botruyen']);
                $BinhLuanDAO = new BinhLuanDAO();
                $binh_luan = $BinhLuanDAO->showOne($_GET['id']);
                $star = $BinhLuanDAO->showOne_star($_GET['id']);
                $GioHang = new GioHangDAO();
                $sum = $GioHang->sum($_SESSION['id']);
                include_once "views/sach/user/ProductDetail.php";
            }
        } else {
            $sanPhamDAO = new SanPhamDAO();
            $infor = $sanPhamDAO->showOne($_GET['id']);
            $imgs = $sanPhamDAO->showImg($_GET['id']);
            $lien_quan = $sanPhamDAO->showLQ($_GET['loai']);
            $bo_truyen = $sanPhamDAO->showBo($_GET['botruyen']);
            $BinhLuanDAO = new BinhLuanDAO();
            $binh_luan = $BinhLuanDAO->showOne($_GET['id']);
            $star = $BinhLuanDAO->showOne_star($_GET['id']);
            $sum = 0;
            include_once "views/sach/user/ProductDetail.php";
        }
    }
    public function productViewMore()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    $LoaiTruyenDAO = new LoaiTruyenDAO();
                    $danh_muc = $LoaiTruyenDAO->show();
                    $SanPhamDAO = new SanPhamDAO();
                    $san_pham = $SanPhamDAO->show();
                    $GioHang = new GioHangDAO();
                    $sum = $GioHang->sum($_SESSION['id']);
                    include_once "views/sach/user/ProducrMore.php";
                } else {
                    header("Location: index.php?controller=trangChu");
                }
            } else {
                $LoaiTruyenDAO = new LoaiTruyenDAO();
                $danh_muc = $LoaiTruyenDAO->show();
                $SanPhamDAO = new SanPhamDAO();
                $san_pham = $SanPhamDAO->show();
                $GioHang = new GioHangDAO();
                $sum = $GioHang->sum($_SESSION['id']);
                include_once "views/sach/user/ProducrMore.php";
            }
        } else {
            $LoaiTruyenDAO = new LoaiTruyenDAO();
            $danh_muc = $LoaiTruyenDAO->show();
            $SanPhamDAO = new SanPhamDAO();
            $san_pham = $SanPhamDAO->show();
            $sum = 0;
            include_once "views/sach/user/ProducrMore.php";
        }
    }
    public function search()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    if (isset($_POST['search']) && $_POST['search'] != "") {
                        $sanPhamDAO = new SanPhamDAO();
                        $LoaiTruyenDAO = new LoaiTruyenDAO();
                        $danh_muc = $LoaiTruyenDAO->show();
                        $list = $sanPhamDAO->search($_POST['search']);
                        $GioHang = new GioHangDAO();
                        $sum = $GioHang->sum($_SESSION['id']);
                        include_once "views/sach/user/Product.php";
                    } else {
                        header("Location: index.php?controller=sanPham");
                    }
                } else {
                    header("Location: index.php?controller=trangChu");
                }
            } else {
                if (isset($_POST['search']) && $_POST['search'] != "") {
                    $sanPhamDAO = new SanPhamDAO();
                    $LoaiTruyenDAO = new LoaiTruyenDAO();
                    $danh_muc = $LoaiTruyenDAO->show();
                    $list = $sanPhamDAO->search($_POST['search']);
                    $GioHang = new GioHangDAO();
                    $sum = $GioHang->sum($_SESSION['id']);
                    include_once "views/sach/user/Product.php";
                } else {
                    header("Location: index.php?controller=sanPham");
                }
            }
        } else {
            if (isset($_POST['search']) && $_POST['search'] != "") {
                $sanPhamDAO = new SanPhamDAO();
                $LoaiTruyenDAO = new LoaiTruyenDAO();
                $danh_muc = $LoaiTruyenDAO->show();
                $list = $sanPhamDAO->search($_POST['search']);
                $sum = 0;
                include_once "views/sach/user/Product.php";
            } else {
                header("Location: index.php?controller=sanPham");
            }
        }
    }











    public function add()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $sanPhamDAO = new SanPhamDAO();
                $sanPhamDAO->add(
                    $_POST['ten_san_pham'],
                    $_POST['mo_ta'],
                    $_POST['gia_ban'],
                    $_POST['gia_goc'],
                    $_POST['so_luong'],
                    $_POST['so_trang'],
                    $_POST['id_tac_gia'],
                    $_POST['nam_xb'],
                    $_POST['kich_thuoc'],
                    $_POST['trong_luong'],
                    get_time(),
                    $_POST['id_loai_san_pham'],

                    $_POST['id_nha_san_xuat'],
                    $_POST['id_nha_phat_hanh']
                );
                $count = 0;
                $id = $sanPhamDAO->getOneIdDesc();
                $idSanPham = $id[0]->id_san_pham;
                $thuMucDich = "assets/imgs/shop/";
                if (isset($_FILES["images"])) {
                    foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                        $tenTep = basename($_FILES["images"]["name"][$key]);
                        $duongDanLuuTep = $thuMucDich . $tenTep;
                        if (move_uploaded_file($tmp_name, $duongDanLuuTep)) {
                            $anh = $tenTep;
                            $sanPhamDAO->addImgs($anh, $idSanPham);
                            if ($count == 0) {
                                $sanPhamDAO->updateImgSP($anh, $idSanPham);
                                $count = 1;
                            }
                        } else {
                            echo "Có lỗi khi tải lên ảnh: " . $tenTep;
                        }
                    }
                } else {
                    echo "Không có ảnh nào được chọn.";
                }

                $list = $sanPhamDAO->show();
                header("location: index.php?controller=sanPham");
                exit();
            } else {
                $sanPhamDAO = new SanPhamDAO();
                $tg = $sanPhamDAO->showtg();
                $nsx = $sanPhamDAO->showNSX();
                $l = $sanPhamDAO->showL();
                $nph = $sanPhamDAO->showPH();
                $b = $sanPhamDAO->showB();
                include_once "views/sach/admin/add.php";
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
    public function delete()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_GET['id'])) {
                $sanPhamDAO = new SanPhamDAO();
                $sanPhamDAO->deleteASP($_GET['id']);
                $sanPhamDAO->deleteSP($_GET['id']);
                $list = $sanPhamDAO->show();
                $_SESSION['error'] = 'Xoá thành công';
                header('location: index.php?controller=sanPham');
                exit();
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
    public function fix()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_GET['id'])) {
                $idsp = $_GET['id'];
                $sanPhamDAO = new SanPhamDAO();
                $tg = $sanPhamDAO->showtg();
                $nsx = $sanPhamDAO->showNSX();
                $l = $sanPhamDAO->showL();
                $nph = $sanPhamDAO->showPH();
                $b = $sanPhamDAO->showB();
                $imgs = $sanPhamDAO->imgs($_GET['id']);
                $list = $sanPhamDAO->showOne($_GET['id']);
                include_once "views/sach/admin/fix.php";
            }
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $sanPhamDAO = new SanPhamDAO();
                //upload sản phẩm
                $hinhAnh = $_POST['hinh_anh_sp_old'];
                if (isset($_FILES['hinh_anh_sp']) && $_FILES['hinh_anh_sp']['error'] === UPLOAD_ERR_OK) {
                    $hinhAnh = img();
                }
                $sanPhamDAO->fix(
                    $_POST['ten_san_pham'],
                    $_POST['mo_ta'],
                    $hinhAnh,
                    $_POST['gia_ban'],
                    $_POST['gia_goc'],
                    $_POST['so_luong'],
                    $_POST['so_trang'],
                    $_POST['id_tac_gia'],
                    $_POST['nam_xb'],
                    $_POST['kich_thuoc'],
                    $_POST['trong_luong'],
                    $_POST['id_loai_san_pham'],
                    $_POST['id_bo_truyen'],
                    $_POST['id_nha_san_xuat'],
                    $_POST['id_nha_phat_hanh'],
                    $_POST['id_san_pham']
                );
                // kiểm tra xem có ảnh sản phẩm mới không
                $idSanPham = $_POST['id_san_pham'];
                $thuMucDich = "assets/imgs/shop/";
                if (isset($_FILES["images"])) {
                    foreach ($_FILES["images"]["tmp_name"] as $key => $tmp_name) {
                        $tenTep = basename($_FILES["images"]["name"][$key]);
                        $duongDanLuuTep = $thuMucDich . $tenTep;
                        if (move_uploaded_file($tmp_name, $duongDanLuuTep)) {
                            $anh = $tenTep;
                            $sanPhamDAO->addImgs($anh, $idSanPham);
                        } else {
                            echo "Có lỗi khi tải lên ảnh: " . $tenTep;
                        }
                    }
                } else {
                    echo "Không có ảnh nào được chọn.";
                }
                $list = $sanPhamDAO->show();
                $_SESSION['error'] = 'Sửa thông tin thành công';
                header('location: index.php?controller=sanPham');
                exit();
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
    public function sanPham_fix_dlimg()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_GET['id_san_pham'])) {
                $sanPhamDAO = new SanPhamDAO();
                $idsp = $_GET['id_san_pham'];
                if (isset($_GET['id_hinh_anh'])) {
                    $sanPhamDAO->deleteOneASP($_GET['id_hinh_anh']);
                }
                $imgs = $sanPhamDAO->imgs($_GET['id_san_pham']);
                include_once "views/sach/admin/imgs.php";
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
}
