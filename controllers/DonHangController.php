<?php
include_once "DAO/DonHangDao.php";

class DonHangController
{
    public function index()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header('location: index.php?controller=trangChu');
            } else {
                $DonHangDAO = new DonHangDAO();
                $list = $DonHangDAO->show();
                include_once "views/donhang/admin/list.php";
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function delete()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header('location: index.php?controller=trangChu');
            } else {
                $DonHangDAO = new DonHangDAO();
                $DonHangDAO->delete($_GET['id']);
                $list = $DonHangDAO->show();
                $_SESSION['error'] = 'Xoá thành công';
                header('location: index.php?controller=donHang');
            }

            exit();
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function showTT()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header('location: index.php?controller=trangChu');
            } else {
                $DonHangDAO = new DonHangDAO();
                $list = $DonHangDAO->showTTDH();
                include_once "views/trangThaiDonHang/admin/list.php";
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    function update_tt()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header('location: index.php?controller=trangChu');
            } else {
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $DonHangDAO = new DonHangDAO();
                    $DonHangDAO->update_tt($_POST['id_trang_thai_don_hang'], $_POST['ten_trang_thai_don_hang']);
                    $list = $DonHangDAO->showTTDH();
                    $_SESSION['error'] = 'Sửa thông tin thành công';
                    header('location: index.php?controller=trangThaiDH');
                    exit();
                } else if (isset($_GET['id'])) {
                    $DonHangDAO = new DonHangDAO();
                    $list = $DonHangDAO->showOneTTDH($_GET['id']);
                    include_once "views/trangThaiDonHang/admin/update.php";
                }
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function update_tt_dh()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header('location: index.php?controller=trangChu');
            } else {
                $DonHangDAO = new DonHangDAO();
                $DonHangDAO->donHang_update_tt($_GET['id'], $_GET['tt']);
                $list = $DonHangDAO->showTTDH();
                $_SESSION['error'] = 'Sửa thông tin thành công';
                header("location: index.php?controller=donHang");
                exit();
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function fix()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                header('location: index.php?controller=trangChu');
            } else {
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $DonHangDAO = new DonHangDAO();
                    $info = $DonHangDAO->showOneId($_GET['id']);
                    include_once "views/donhang/admin/fix.php";
                }
            }
        } else {
            header('location: index.php?controller=trangChu');
        }
    }
    public function muaHang()
    {
        if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
            if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    if (isset($_GET['nd']) && $_GET['nd'] == "muaHang") {
                        $sanPhamDAO = new SanPhamDAO();
                        $user = new TaiKhoanDAO();
                        $thongTinUs = $user->getUsID($_SESSION['id']);
                        $thongTinSp = $sanPhamDAO->showOne($_POST['idsp']);
                        $soLuong = $_POST['so_luong'];
                        $thanhTien = 0;
                        foreach ($thongTinSp as $sp) {
                            $thanhTien = $thanhTien + ($sp->gia_ban * $soLuong);
                        }
                        include_once "views/donHang/user/thongTin.php";
                    }
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                        $_SESSION['value_hd'] = array(
                            'mahd' => $_POST['order_id'],
                            'amount' => $_POST['amount'],
                            'idsp' => $_POST['idsp'],
                            'soLuongGH' => $_POST['idsp'],
                            'so_luong' => $_POST['so_luong']
                        );
                        include_once "views/donhang/user/vnpay_create_payment.php";
                    }
                } else {
                }
            } else {
                if (isset($_GET['nd']) && $_GET['nd'] == "muaHang") {
                    $sanPhamDAO = new SanPhamDAO();
                    $user = new TaiKhoanDAO();
                    $thongTinUs = $user->getUsID($_SESSION['id']);
                    $thongTinSp = $sanPhamDAO->showOne($_POST['idsp']);
                    $soLuong = $_POST['so_luong'];
                    $thanhTien = 0;
                    foreach ($thongTinSp as $sp) {
                        $thanhTien = $thanhTien + ($sp->gia_ban * $soLuong);
                    }
                    include_once "views/donHang/user/thongTin.php";
                }
                if (isset($_GET['nd']) && $_GET['nd'] == "thanhToan") {
                    if (isset($_POST['idbt'])){
                        $_SESSION['value_hd'] = array(
                            'mahd' => $_POST['order_id'],
                            'amount' => $_POST['amount'],
                            'idsp' => $_POST['idsp'],
                            'idbt' => $_POST['idbt'],
                            'soLuong' => $_POST['so_luong'],
                        );
                        include_once "views/donhang/user/vnpay_create_payment.php";
                    }else{
                        $_SESSION['value_hd'] = array(
                            'mahd' => $_POST['order_id'],
                            'amount' => $_POST['amount'],
                            'idsp' => $_POST['idsp'],
                            'soLuongGH' => $_POST['idsp'],
                            'so_luong' => $_POST['so_luong']
                        );
                        include_once "views/donhang/user/vnpay_create_payment.php";
                    }
                }
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
    public function showCard()
    {
        if (isset($_SESSION['role']) && isset($_SESSION['id'])) {
            if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    if (isset($_GET['nd']) && $_GET['nd'] == "thongTin") {
                        $sanPhamDAO = new SanPhamDAO();
                        $user = new TaiKhoanDAO();
                        $thongTinUs = $user->getUsID($_SESSION['id']);
                        if (isset($_POST['boTruyen'])) {
                            $thongTinSp = $sanPhamDAO->cardB($_POST['card']);
                        } else {
                            $thongTinSp = $sanPhamDAO->card($_SESSION['id'], $_POST['card']);
                        }
                        if (isset($_POST['so_luong'])) {
                            $soLuong = $_POST['so_luong'];
                        } else {
                            $soLuong = 0;
                        }
                        $thanhTien = 0;
                        foreach ($thongTinSp as $sp) {
                            $thanhTien = $thanhTien + ($sp->gia_ban * $sp->so_luong);
                        }
                        include_once "views/donHang/user/thongTin.php";
                    }
                    if (isset($_GET['nd']) && $_GET['nd'] == "thanhToan") {
                        $sanPhamDAO = new SanPhamDAO();
                        $_SESSION['value_hd'] = array(
                            'mahd' => $_POST['order_id'],
                            'amount' => $_POST['amount'],
                            'idsp' => $_POST['idsp'],
                            'soLuong' => $_POST['soLuong'],
                            'so_luong' => $_POST['so_luong']
                        );
                        include_once "views/donhang/user/vnpay_create_payment.php";
                    }
                } else {
                }
            } else {
                if (isset($_GET['nd']) && $_GET['nd'] == "thongTin") {
                    if (isset($_POST['id_bo_truyen'])){
                        $BoTruyenDao = new BoTruyenDAO();
                        $sanPhamDAO = new SanPhamDAO();
                        $user = new TaiKhoanDAO();
                        $thongTinUs = $user->getUsID($_SESSION['id']);
                        if (isset($_POST['boTruyen'])) {
                            $thongTinSp = $sanPhamDAO->cardB($_POST['card']);
                        } else {
                            $thongTinSp = $sanPhamDAO->card($_SESSION['id'], $_POST['card']);
                        }
                        $thongTinBT = $BoTruyenDao->showView($_POST['id_bo_truyen']);
                        $id_bo_truyen = $_POST['id_bo_truyen'];
                        if (isset($_POST['so_luong'])) {
                            $soLuong = $_POST['so_luong'];
                        } else {
                            $soLuong = 0;
                        }
                        $thanhTien = $thongTinBT[0]->gia_ban * $soLuong;
                        $giaGoc =  $thongTinBT[0]->gia_goc * $soLuong;
                        include_once "views/donHang/user/thongTin.php";
                    }else{
                        $sanPhamDAO = new SanPhamDAO();
                        $user = new TaiKhoanDAO();
                        $thongTinUs = $user->getUsID($_SESSION['id']);
                        if (isset($_POST['boTruyen'])) {
                            $thongTinSp = $sanPhamDAO->cardB($_POST['card']);
                        } else {
                            $thongTinSp = $sanPhamDAO->card($_SESSION['id'], $_POST['card']);
                        }
                        if (isset($_POST['so_luong'])) {
                            $soLuong = $_POST['so_luong'];
                        } else {
                            $soLuong = 0;
                        }
                        $thanhTien = 0;
                        foreach ($thongTinSp as $sp) {
                            $thanhTien = $thanhTien + ($sp->gia_ban * $sp->so_luong);
                        }
                        include_once "views/donHang/user/thongTin.php";
                    }

                }
                if (isset($_GET['nd']) && $_GET['nd'] == "thanhToan") {
                        $sanPhamDAO = new SanPhamDAO();
                        $_SESSION['value_hd'] = array(
                            'mahd' => $_POST['order_id'],
                            'amount' => $_POST['amount'],
                            'idsp' => $_POST['idsp'],
                            'soLuong' => $_POST['soLuong'],
                            'so_luong' => $_POST['so_luong']
                        );
                        include_once "views/donhang/user/vnpay_create_payment.php";
                }
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
    public function thanhToanKNH()
    {
        if (isset($_GET['nd']) && $_GET['nd']=='boTruyen'){
            $DonHangDAO = new DonHangDAO();
            $SanPhamDAO = new SanPhamDAO();
            $BoTruyenDao = new BoTruyenDAO();
            $DonHangDAO->addDH($_SESSION['id'], get_time(), 1);
            $thongTinBT = $BoTruyenDao->showView($_POST['idbt']);
            $idsp = $_POST['idsp'];
            $iddh = $DonHangDAO->getOneIdDesc();
            foreach ($idsp as $idSp) {
                $vlsp = $SanPhamDAO->showOne($idSp);
                $slsp = $vlsp[0]->so_luong;
                $slm = $_POST['so_luong'];
                $soLuongUD = $slsp - $slm;echo $soLuongUD;
                if ($soLuongUD == 0) {
                    $SanPhamDAO->updateSlSP(0, 0, $idSp);
                } elseif ($soLuongUD > 0) {
                    $SanPhamDAO->updateSlSP($soLuongUD, 1, $idSp);
                } else {
                    echo "Lỗi";
                }
            }
            $DonHangDAO->addChiTietBT($_POST['idbt'], $iddh[0]->id_don_hang,$_SESSION['id'], $slm);
            $DonHangDAO->addHD($iddh[0]->id_don_hang, $_POST['order_id'], "Thanh toán khi nhận hàng", 0);
            header("location: index.php?controller=taiKhoan");
        }else{
            $so_luong = $_POST['so_luong'];
            if ($so_luong == 0) {
                $DonHangDAO = new DonHangDAO();
                $SanPhamDAO = new SanPhamDAO();
                $GioHangDAO = new GioHangDAO();
                $_SESSION['value_hd'] = array(
                    'mahd' => $_POST['order_id'],
                    'amount' => $_POST['amount'],
                    'idsp' => $_POST['idsp'],
                    'soLuong' => $_POST['soLuong'],
                    'so_luong' => $_POST['so_luong']
                );
                $DonHangDAO->addDH($_SESSION['id'], get_time(), 1);
                foreach ($_SESSION['value_hd']['idsp'] as $i => $sp) {
                    $vlsp = $SanPhamDAO->showOne($_SESSION['value_hd']['idsp'][$i]);
                    $slsp = $vlsp[0]->so_luong;
                    $slm = $_SESSION['value_hd']['soLuong'][$i];
                    $soLuongUD = $slsp - $slm;
                    if ($soLuongUD == 0) {
                        $SanPhamDAO->updateSlSP(0, 0, $_SESSION['value_hd']['idsp'][$i]);
                    } elseif ($soLuongUD > 0) {
                        $SanPhamDAO->updateSlSP($soLuongUD, 1, $_SESSION['value_hd']['idsp'][$i]);
                    } else {
                        echo "Lỗi";
                    }
                    $iddh = $DonHangDAO->getOneIdDesc();
                    $DonHangDAO->addChiTietDH($_SESSION['value_hd']['idsp'][$i], $iddh[0]->id_don_hang, $vlsp[0]->gia_ban, $vlsp[0]->ten_san_pham, $slm);
                    $DonHangDAO->addHD($iddh[0]->id_don_hang, $_SESSION['value_hd']['mahd'], "Thanh toán khi nhận hàng", 0);
                    $GioHangDAO->delete($_SESSION['value_hd']['idsp'][$i]);
                }
                header("location: index.php?controller=taiKhoan");
            } elseif ($so_luong > 0) {
                $DonHangDAO = new DonHangDAO();
                $SanPhamDAO = new SanPhamDAO();
                $DonHangDAO->addDH($_SESSION['id'], get_time(), 1);
                $vlsp = $SanPhamDAO->showOne($_POST['idsp']);
                $slsp = $vlsp[0]->so_luong;
                $slm = $_POST['so_luong'];
                $soLuongUD = $slsp - $slm;
                if ($soLuongUD == 0) {
                    $SanPhamDAO->updateSlSP(0, 0, $_POST['idsp']);
                } elseif ($soLuongUD > 0) {
                    $SanPhamDAO->updateSlSP($soLuongUD, 1, $_POST['idsp']);
                } else {
                    echo "Lỗi";
                }
                $iddh = $DonHangDAO->getOneIdDesc();
                $DonHangDAO->addChiTietDH($_POST['idsp'], $iddh[0]->id_don_hang, $vlsp[0]->gia_ban, $vlsp[0]->ten_san_pham, $slm);
                $DonHangDAO->addHD($iddh[0]->id_don_hang, $_POST['order_id'], "Thanh toán khi nhận hàng", 0);
                header("location: index.php?controller=taiKhoan");
            }
        }
    }
    public function addHD()
    {
        $sanPhamDAO = new SanPhamDAO();
    }
    public function don_hang_tt()
    {

        if (isset($_SESSION['role']) && $_SESSION['role'] != 4) {
            if (isset($_SESSION['chuyen'])) {
                $GioHangDAO = new GioHangDAO();
                $sum = $GioHangDAO->sum($_SESSION['id']);
                $DonHangDAO = new DonHangDAO();
                $thongTinUs = $DonHangDAO->tt_user_don_hang($_GET['id']);
                $thongTinSp  = $DonHangDAO->tt_sp_don_hang($_GET['id']);
                include_once('views/donhang/user/chiTietDonHang.php');
            } else {
                header('location: index.php?controller=trangChu');
            }
        } else {
            $GioHangDAO = new GioHangDAO();
            $sum = $GioHangDAO->sum($_SESSION['id']);
            $DonHangDAO = new DonHangDAO();
            $thongTinUs = $DonHangDAO->tt_user_don_hang($_GET['id']);
            $thongTinSp  = $DonHangDAO->tt_sp_don_hang($_GET['id']);
            include_once('views/donhang/user/chiTietDonHang.php');
        }
    }
}