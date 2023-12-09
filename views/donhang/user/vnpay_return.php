<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>VNPAY RESPONSE</title>

    </head>
    <body>
        <?php
        session_start();
        function connect(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            try {
                $conn = new PDO("mysql:host=$servername;dbname=du_an_1",$username,$password);
                $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //echo "thanh cong";
            } catch (PDOException $e){
                //echo "lỗi";
            }
            return $conn;
        }
        function getData($query, $params = [], $getAll = true) {
            $conn = connect();
            $stmt = $conn->prepare($query);
            $stmt->execute($params);
            if ($getAll) {
                return $stmt->fetchAll();
            }
            return $stmt->fetch();
        }
        function get_time() {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $currentTime = time();
            $timestamp = $currentTime;
            return date("Y-m-d H:i:s", $timestamp);
        }
        function soLuongIdSp($id){
            $sql = "SELECT so_luong FROM `san_pham` WHERE id_san_pham = ?";
            return getData($sql,[$id]);
        }
        function deleteGH($id){
            $sql = "DELETE FROM `gio_hang` WHERE id_san_pham = ?";
            return getData($sql,[$id],false);
        }
        function updateSP($soLuong,$trangThai,$id){
            $sql = "UPDATE `san_pham` SET `so_luong`=?,`trang_thai`=? WHERE id_san_pham = ?";
            return getData($sql,[$soLuong,$trangThai,$id],false);
        }
        function addDH($id_user,$time)
        {
            $sql = "INSERT INTO `don_hang`(`id_user`, `thoi_gian`, `id_trang_thai_don_hang`) VALUES (?,?,1)";
            return getData($sql, [$id_user,$time], false);
        }
        function addHD($id_don_hang,$ma_hoa_don,$phuong_thuc,$trangThai)
        {
            $sql = "INSERT INTO `ho_don`(`id_don_hang`, `ma_hoa_don`, `phuong_thuc`, `trang_thai`) VALUES (?,?,?,?)";
            return getData($sql, [$id_don_hang,$ma_hoa_don,$phuong_thuc,$trangThai], false);
        }
        function addChiTietDH($id_san_pham,$id_don_hang,$gia,$ten_san_pham,$so_luong)
        {
            $sql = "INSERT INTO `chi_tiet_don_hang`(`id_san_pham`, `id_don_hang`, `gia`, `ten_san_pham`, `so_luong`) VALUES (?,?,?,?,?)";
            return getData($sql, [$id_san_pham,$id_don_hang,$gia,$ten_san_pham,$so_luong], false);
        }
        function addChiTietBT($id_bo_truyen, $id_don_hang,$id_user, $so_luong)
        {
            $sql = "INSERT INTO `chi_tiet_don_hang_bo_truyen`(`id_bo_truyen`, `id_don_hang`, `id_user`, `soLuong`) VALUES (?,?,?,?)";
            return getData($sql, [$id_bo_truyen, $id_don_hang,$id_user, $so_luong], false);
        }
        function getOneIdDesc()
        {
            $sql = "SELECT id_don_hang FROM don_hang ORDER BY id_don_hang DESC LIMIT 1";
            return getData($sql);
        }
        function showOne($id)
        {
            $sql = "SELECT * FROM `san_pham` WHERE id_san_pham = ?";
            return getData($sql,[$id]);
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */

        $vnp_TmnCode = "87J682PG"; //Website ID in VNPAY System
        $vnp_HashSecret = "KQJDGPOXRJQROQWOENLOACLRFKMTUCSF"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost/php/Nhom01_WebBanHang_Edubook/views/donhang/user/vnpay_return.php";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }
        
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
        if ($_GET['vnp_ResponseCode'] == 00 && $_GET['vnp_TransactionStatus'] == 00){
            if (isset($_SESSION['value_hd']['idbt'])){
                addDH($_SESSION['id'],get_time());
                $newIdDH = getOneIdDesc();
                foreach ($_SESSION['value_hd']['idsp'] as $i => $sp) {
                    $slsp = soLuongIdSp($_SESSION['value_hd']['idsp'][$i]);
                    $slm = $_SESSION['value_hd']['soLuong'];
                    $sanPham =  showOne($sp);
                    $soLuongUD = $slsp[0]['so_luong'] - $slm;
                    if ($soLuongUD == 0){
                        updateSP(0,0,$_SESSION['value_hd']['idsp'][$i]);
                    }elseif ($soLuongUD > 0 ){
                        updateSP($soLuongUD,1,$_SESSION['value_hd']['idsp'][$i]);
                    }else{
                        echo "Lỗi";
                    }
                }
                addChiTietBT($_SESSION['value_hd']['idbt'], $newIdDH[0]['id_don_hang'],$_SESSION['id'], $_SESSION['value_hd']['soLuong']);
                addHD($newIdDH[0]['id_don_hang'], $_SESSION['value_hd']['mahd'],"vnpay",1);
            } else if (isset($_SESSION['value_hd']['so_luong']) && $_SESSION['value_hd']['so_luong'] == 0 && !isset($_SESSION['value_hd']['idbt'])){
                addDH($_SESSION['id'],get_time());
                $newIdDH = getOneIdDesc();
                foreach ($_SESSION['value_hd']['idsp'] as $i => $sp) {
                        $slsp = soLuongIdSp($_SESSION['value_hd']['idsp'][$i]);
                        $slm = $_SESSION['value_hd']['soLuong'][$i];
                        $sanPham =  showOne($sp);
                        addChiTietDH($_SESSION['value_hd']['idsp'][$i],$newIdDH[0]['id_don_hang'],$sanPham[0]['gia_ban'],$sanPham[0]['ten_san_pham'],$_SESSION['value_hd']['soLuong'][$i]);
                        $soLuongUD = $slsp[0]['so_luong'] - $slm;
                        if ($soLuongUD == 0){
                            updateSP(0,0,$_SESSION['value_hd']['idsp'][$i]);
                        }elseif ($soLuongUD > 0 ){
                            updateSP($soLuongUD,1,$_SESSION['value_hd']['idsp'][$i]);
                        }else{
                            echo "Lỗi";
                        }
                    deleteGH($_SESSION['value_hd']['idsp'][$i]);
                }
                addHD($newIdDH[0]['id_don_hang'], $_SESSION['value_hd']['mahd'],"vnpay",1);
            }else if (isset($_SESSION['value_hd']['so_luong']) && $_SESSION['value_hd']['so_luong'] > 0 && !isset($_SESSION['value_hd']['idbt'])){
                addDH($_SESSION['id'],get_time());
                $slsp = soLuongIdSp($_SESSION['value_hd']['idsp']);
                $slm = $_SESSION['value_hd']['so_luong'];
                $newIdDH = getOneIdDesc();
                $sanPham =  showOne($_SESSION['value_hd']['idsp']);
                addChiTietDH($_SESSION['value_hd']['idsp'],$newIdDH[0]['id_don_hang'],$sanPham[0]['gia_ban'],$sanPham[0]['ten_san_pham'],$_SESSION['value_hd']['so_luong']);
                $soLuongUD = $slsp[0]['so_luong'] - $slm;
                if ($soLuongUD == 0){
                    updateSP(0,0,$_SESSION['value_hd']['idsp']);
                }elseif ($soLuongUD > 0 ){
                    updateSP($soLuongUD,1,$_SESSION['value_hd']['idsp']);
                }else{
                    echo "Lỗi";
                }
                addHD($newIdDH[0]['id_don_hang'], $_SESSION['value_hd']['mahd'],"vnpay",1);
            }
        }
        unset($_SESSION['value_hd']);
        ?>
        <!DOCTYPE html>
        <html class="no-js" lang="en">

        <head>
            <meta charset="utf-8">
            <title>Edu-Book</title>
            <!-- chat -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"
                  integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw=="
                  crossorigin="anonymous" referrerpolicy="no-referrer" />
            <link rel="stylesheet" href="../../../assets/css/chatbox/style1.css">
            <meta http-equiv="x-ua-compatible" content="ie=edge">
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta property="og:title" content="">
            <meta property="og:type" content="">
            <meta property="og:url" content="">
            <meta property="og:image" content="">
            <link rel="shortcut icon" type="image/x-icon" href="../../../assets/imgs/theme/favicon.ico">
            <link rel="stylesheet" href="../../../assets/css/main.css">
            <link rel="stylesheet" href="../../../assets/css/custom.css">
            <link rel="stylesheet" href="../../../assets/css/gioithieu/gioithieu.css">
        </head>

        <body>
        <div class="mobile-header-active mobile-header-wrapper-style">
            <div class="mobile-header-wrapper-inner">
                <div class="mobile-header-top">
                    <div class="mobile-header-logo">
                        <a href="../../../index.php?controller=trangChu"><img src="../../../assets/imgs/logo/logo.png" alt="logo"></a>
                    </div>
                </div>
                <div class="mobile-header-content-area">
                    <div class="mobile-search search-style-3 mobile-header-border">
                        <form action="#">
                            <input type="text" placeholder="Search for items…">
                            <button type="submit"><i class="fi-rs-search"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">

                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a
                                            href="index.html">Trang chủ</a></li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="shop.html">Sản
                                        phẩm</a>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Giới
                                        thiệu</a>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Giới
                                        thiệu</a>
                                </li>
                                <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Danh mục</a>
                                    <ul class="dropdown">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">Spanish</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>
                    <div class="mobile-header-info-wrap mobile-header-border">
                        <div class="single-mobile-header-info">
                            <a href="login.html">Đăng nhập </a>
                        </div>
                        <div class="single-mobile-header-info">
                            <a href="register.html">Đăng ký</a>
                        </div>
                    </div>
                    <div class="mobile-social-icon">
                        <h5 class="mb-15 text-grey-4">Follow Us</h5>
                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                        <a href="#"><img src="../../../assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                    </div>
                </div>
            </div>
        </div>

        <!--Begin display -->
        <div class="container" style="text-align: center;margin-top: 100px">
            <img src="https://cdn.dribbble.com/users/2121936/screenshots/4814257/media/a9ba072da5d4bca2f595420a52ea1b09.gif" style="height: 200px" alt="">
            <div class="header clearfix">
                <h3 class="text-muted">Thanh toán VNPAY</h3>
            </div>
            <div class="table-responsive">
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php echo number_format(($_GET['vnp_Amount']/100), 0, ',', '.') ?> VND</label>
                </div>
<!--                <div class="form-group">-->
<!--                    <label >Nội dung thanh toán:</label>-->
<!--                    <label>--><?php //echo $_GET['vnp_OrderInfo'] ?><!--</label>-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label >Mã phản hồi (vnp_ResponseCode):</label>-->
<!--                    <label>--><?php //echo $_GET['vnp_ResponseCode'] ?><!--</label>-->
<!--                </div>-->
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div>
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div>
<!--                <div class="form-group">-->
<!--                    <label >Thời gian thanh toán:</label>-->
<!--                    <label>--><?php //echo $_GET['vnp_PayDate'] ?><!--</label>-->
<!--                </div>-->
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                echo "<span style='color:blue'>Giao dịch thành công</span>";
                            } else {
                                echo "<span style='color:red'>Giao dịch không thành công</span>";
                            }
                        } else {
                            echo "<span style='color:red'>Chữ ký không hợp lệ</span>";
                        }
                        ?>

                    </label>
                </div>
                <div class="form-group">
                    <button style="border: none;padding: 8px;border-radius: 5px;background-color: #f15412;"><a style="color: white" href="../../../index.php?controller=trangChu">Trở về trang chủ</a></button>
                </div>
            </div>
        </div>
            <p>
                &nbsp;
            </p>
            <!-- Vendor JS-->
            <script src="../../../assets/js/vendor/modernizr-3.6.0.min.js"></script>
            <script src="../../../assets/js/vendor/jquery-3.6.0.min.js"></script>
            <script src="../../../assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
            <script src="../../../assets/js/vendor/bootstrap.bundle.min.js"></script>
            <script src="../../../assets/js/plugins/slick.js"></script>
            <script src="../../../assets/js/plugins/jquery.syotimer.min.js"></script>
            <script src="../../../assets/js/plugins/wow.js"></script>
            <script src="../../../assets/js/plugins/jquery-ui.js"></script>
            <script src="../../../assets/js/plugins/perfect-scrollbar.js"></script>
            <script src="../../../assets/js/plugins/magnific-popup.js"></script>
            <script src="../../../assets/js/plugins/select2.min.js"></script>
            <script src="../../../assets/js/plugins/waypoints.js"></script>
            <script src="../../../assets/js/plugins/counterup.js"></script>
            <script src="../../../assets/js/plugins/jquery.countdown.min.js"></script>
            <script src="../../../assets/js/plugins/images-loaded.js"></script>
            <script src="../../../assets/js/plugins/isotope.js"></script>
            <script src="../../../assets/js/plugins/scrollup.js"></script>
            <script src="../../../assets/js/plugins/jquery.vticker-min.js"></script>
            <script src="../../../assets/js/plugins/jquery.theia.sticky.js"></script>
            <script src="../../../assets/js/plugins/jquery.elevatezoom.js"></script>
            <!-- Template  JS -->
            <script src="../../../assets/js/main.js?v=3.3"></script>
            <script src="../../../assets/js/shop.js?v=3.3"></script>
            <script src="../../../assets/js/addcard.js"></script>
            <!-- địa chỉ -->
            <script src="../../../assets/js/form_dia_chi.js"></script>
        </body>

        </html>
        </div>  
    </body>
</html>
