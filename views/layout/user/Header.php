<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu-Book</title>
    <!-- chat -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" integrity="sha512-q3eWabyZPc1XTCmF+8/LuE1ozpg5xxn7iO89yfSOd5/oKvyqLngoNGsx8jq92Y8eXJ/IRxQbEC+FGSYxtk2oiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/chatbox/style1.css">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.ico">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/gioithieu/gioithieu.css">
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="index.php?controller=trangChu"><img src="assets/imgs/logo/logo.jpg" alt="logo"></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-1">
                            <form action="index.php?controller=search" method="post">
                                <input type="text" name="search" placeholder="Tìm kiếm...">
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                </div>
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="index.php?controller=giohang">
                                        <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">
                                        <span class="pro-count blue cart" id="card"><?php echo $sum ?></span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="assets/imgs/logo/logo.jpg" alt="logo"></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categori-button-active" href="#">
                                <span class="fi-rs-apps"></span> Danh mục
                            </a>
                            <div class="categori-dropdown-wrap categori-dropdown-active-large">
                                <ul class="categories">
                                    <?php foreach ($danh_muc as $key => $vl) { ?>
                                        <li><a href="index.php?controller=sanPham&id=<?php echo $vl->id ?>"><?php echo $vl->ten ?></a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                            <nav>
                                <ul>
                                    <li><a class="active" href="index.php?controller=trangChu">Trang chủ </a></li>
                                    <li><a href="index.php?controller=sanPham">Sản phẩm</a></li>
                                    <li><a href="index.php?controller=gioiThieu">Giới thiệu</a></li>
                                    <li><a href="index.php?controller=chatBox">Liên hệ </a></li>
                                    <li><a href="index.php?controller=boTruyen">Bộ truyện </a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="hotline d-none d-lg-block">
                        <a href="index.php?controller=taiKhoan"><?php if (isset($_SESSION['role'])) {
                                                                    echo "Tài khoản";
                                                                } else {
                                                                    echo "Đăng nhập";
                                                                } ?></a>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="index.php?controller=cart">
                                    <img alt="Surfside Media" src="assets/imgs/theme/icons/icon-cart.svg">
                                    <span class="pro-count white card" id="card"></span>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.php?controller=trangChu"><img src="assets/imgs/logo/logo.png" alt="logo"></a>
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
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="index.html">Trang chủ</a></li>
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
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>