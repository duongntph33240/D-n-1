<?php include "views/layout/user/Header.php"; ?>
<style>
/* Thêm style cho nút tăng và giảm */
input[type="number"]::-webkit-inner-spin-button {
    /* Điều chỉnh khoảng cách bên trái của nút tăng và giảm */
}
</style>
<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="product-detail accordion-detail">
                        <div class="row mb-50">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="detail-gallery">
                                    <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                    <!-- MAIN SLIDES -->
                                    <div class="product-image-slider" style="overflow: hidden;">

                                        <?php foreach ($imgs as $key => $vl) { ?>
                                        <figure class="border-radius-10">
                                            <img src="assets/imgs/shop/<?php echo $vl['hinh_anh'] ?>"
                                                style="width: 100%;height: 100%;object-fit: cover;" alt="product image">
                                        </figure>
                                        <?php } ?>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        <?php foreach ($imgs as $key => $vl) { ?>
                                        <div><img src="assets/imgs/shop/<?php echo $vl['hinh_anh'] ?>"
                                                alt="product image"></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- End Gallery -->
                                <div class="social-icons single-share">
                                    <ul class="text-grey-5 d-inline-block">
                                        <li><strong class="mr-10">Share this:</strong></li>
                                        <li class="social-facebook"><a href="#"><img
                                                    src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a></li>
                                        <li class="social-twitter"> <a href="#"><img
                                                    src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a></li>
                                        <li class="social-instagram"><a href="#"><img
                                                    src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a></li>
                                        <li class="social-linkedin"><a href="#"><img
                                                    src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <?php foreach ($infor as $key => $vl) {
                                    $id = $vl->id_san_pham;
                                    $loai = $vl->id_loai_san_pham;
                                    $bo = $vl->id_bo_truyen ?>
                                <div class="detail-info">
                                    <h2 class="title-detail"><?php echo $vl->ten_san_pham ?></h2>

                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span
                                                    class="text-brand"><?php echo number_format($vl->gia_ban, 0, ',', ',') ?>
                                                    VND</span></ins>
                                            <ins><span
                                                    class="old-price font-md ml-15"><?php echo number_format($vl->gia_goc, 0, ',', ',') ?>
                                                    VND</span></ins>
                                            <span
                                                class="save-price  font-md color3 ml-15"><?php echo round(($vl->gia_ban / $vl->gia_goc) * 100, 2); ?>%
                                                Off</span>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p><?php echo $vl->mo_ta ?></p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> Giao hàng nhanh </li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i>Đổi trả hàng khi có lỗi
                                                từ nhà sản xuất</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Phục vụ hỗ trợ 24/24
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <form action="index.php?controller=muaHang&nd=muaHang" method="post">
                                        <div class="detail-extralink">
                                            <div class="detail-qty border radius" style="width: 10%;  ">
                                                <input type="number" name="so_luong" min="1"
                                                    max="<?php echo $vl->so_luong ?>" value="1" style="">
                                                <input type="hidden" name="idsp" value="<?php echo $vl->id_san_pham ?>">
                                            </div>
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart">Mua
                                                    ngay</button>
                                                <?php if (isset($_SESSION['id'])) { ?>
                                                <a aria-label="Add To Cart" id="add_card"
                                                    onclick="addToCart(<?php echo $vl->id_san_pham ?>)"
                                                    class="action-btn hover-up"><i
                                                        class="fi-rs-shopping-bag-add"></i></a>
                                                <?php } else { ?><a aria-label="Add To Cart" id="add_card"
                                                    href="index.php?controller=dangNhap" class="action-btn hover-up"><i
                                                        class="fi-rs-shopping-bag-add"></i></aria-label> </a>
                                                <?php } ?>

                                            </div>
                                        </div>
                                    </form>

                                    <?php } ?>

                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link active" id="Description-tab" data-bs-toggle="tab"
                                        href="#Description">CHI TIẾT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">BÌNH
                                        LUẬN</a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade show active" id="Description">
                                    <table class="font-md">
                                        <tbody>
                                            <?php foreach ($infor as $key => $vl) { ?>
                                            <tr class="stand-up">
                                                <th>Số lượng sách</th>
                                                <td>
                                                    <p><?php echo $vl->so_luong ?></p>
                                                </td>
                                            </tr>
                                            <tr class="stand-up">
                                                <th>Tác giả</th>
                                                <td>
                                                    <p><?php echo $vl->id_tac_gia ?></p>
                                                </td>
                                            </tr>
                                            <tr class="stand-up">
                                                <th>Năm xuất bản</th>
                                                <td>
                                                    <p><?php echo $vl->nam_xb ?></p>
                                                </td>
                                            </tr>
                                            <tr class="stand-up">
                                                <th>Thể loại</th>
                                                <td>
                                                    <p><?php echo $vl->id_loai_san_pham ?></p>
                                                </td>
                                            </tr>
                                            <tr class="stand-up">
                                                <th>Nhà xuất bản</th>
                                                <td>
                                                    <p><?php echo $vl->id_nha_san_xuat ?></p>
                                                </td>
                                            </tr>
                                            <tr class="stand-up">
                                                <th>Nhà phát hành</th>
                                                <td>
                                                    <p><?php echo $vl->id_nha_phat_hanh ?></p>
                                                </td>
                                            </tr>
                                            <tr class="stand-up">
                                                <th>Trọng lượng</th>
                                                <td>
                                                    <p><?php echo $vl->trong_luong ?></p>
                                                </td>
                                            </tr>
                                            <tr class="stand-up">
                                                <th>Kích thức</th>
                                                <td>
                                                    <p><?php echo $vl->kich_thuoc ?></p>
                                                </td>
                                            </tr>
                                            <tr class="stand-up">
                                                <th>Số trang</th>
                                                <td>
                                                    <p><?php echo $vl->so_trang ?></p>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="Reviews">
                                    <!--Comments-->
                                    <div class="comments-area">
                                        <div class="row">

                                            <div class="col-lg-8">
                                                <h4 class="mb-30">Câu hỏi & trả lời của khách hàng</h4>
                                                <div class="comment-list" id="list_comment">
                                                    <?php
                                                    $count_one = 0;

                                                    foreach ($binh_luan as $key => $vl) {
                                                    ?>
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb text-center">
                                                                <img src="assets/imgs/user/<?php echo $vl->anh ?>"
                                                                    alt="" style="height: 80%;">
                                                                <h6><a href="#"><?php echo $vl->nguoi_gui ?></a></h6>

                                                            </div>
                                                            <div class="desc">
                                                                <div class="product-rate d-inline-block">
                                                                    <div class="product-rating" style="width:90%">
                                                                    </div>
                                                                </div>
                                                                <p><?php echo $vl->mes ?></p>
                                                                <div class="d-flex justify-content-between">
                                                                    <div class="d-flex align-items-center">
                                                                        <p class="font-xs mr-30"><?php echo $vl->ngay ?>
                                                                        </p>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php

                                                    }
                                                    ?>
                                                </div>
                                            </div>


                                            <div class="col-lg-4">
                                                <h4 class="mb-30">Phản hồi khách hàng</h4>
                                                <div class="d-flex mb-30">
                                                    <div class="product-rate d-inline-block mr-15">
                                                        <div class="product-rating" style="width:<?php if ($sum == 0) {
                                                                                                        echo 0;
                                                                                                    } else {
                                                                                                        echo $svg / $sum;
                                                                                                    } ?>%">
                                                        </div>
                                                    </div>
                                                    <?php $sum = $star[0]['so_luong'] + $star[1]['so_luong'] + $star[2]['so_luong'] + $star[3]['so_luong'] + $star[4]['so_luong'];
                                                    $svg = $star[0]['so_luong'] * 1 + $star[1]['so_luong'] * 2 + $star[2]['so_luong'] * 3 + $star[3]['so_luong'] * 4 + $star[4]['so_luong'] * 5;
                                                    ?>
                                                    <h6><?php if ($sum == 0) {
                                                            echo 0;
                                                        } else {
                                                            echo $svg / $sum;
                                                        } ?> out of
                                                        5</h6>
                                                </div>
                                                <div class="progress">
                                                    <span>5 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width:  <?php if ($star[4]['so_luong'] == 0) {
                                                                                                                    echo 0;
                                                                                                                } else {
                                                                                                                    echo ($star[4]['so_luong'] / $sum) * 100;
                                                                                                                } ?>%;"
                                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        <?php if ($star[4]['so_luong'] == 0) {
                                                            echo 0;
                                                        } else {
                                                            echo ($star[4]['so_luong'] / $sum) * 100;
                                                        } ?>%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>4 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width:  <?php if ($star[3]['so_luong'] == 0) {
                                                                                                                    echo 0;
                                                                                                                } else {
                                                                                                                    echo ($star[3]['so_luong'] / $sum) * 100;
                                                                                                                } ?>%;"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                        <?php if ($star[3]['so_luong'] == 0) {
                                                            echo 0;
                                                        } else {
                                                            echo ($star[3]['so_luong'] / $sum) * 100;
                                                        } ?>%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>3 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width:  <?php if ($star[2]['so_luong'] == 0) {
                                                                                                                    echo 0;
                                                                                                                } else {
                                                                                                                    echo ($star[2]['so_luong'] / $sum) * 100;
                                                                                                                } ?>%;"
                                                        aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                                        <?php if ($star[2]['so_luong'] == 0) {
                                                            echo 0;
                                                        } else {
                                                            echo ($star[2]['so_luong'] / $sum) * 100;
                                                        } ?>%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>2 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width:  <?php if ($star[1]['so_luong'] == 0) {
                                                                                                                    echo 0;
                                                                                                                } else {
                                                                                                                    echo ($star[1]['so_luong'] / $sum) * 100;
                                                                                                                } ?>%;"
                                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                        <?php if ($star[1]['so_luong'] == 0) {
                                                            echo 0;
                                                        } else {
                                                            echo ($star[1]['so_luong'] / $sum) * 100;
                                                        } ?>%
                                                    </div>
                                                </div>
                                                <div class="progress mb-30">
                                                    <span>1 star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: <?php if ($star[0]['so_luong'] == 0) {
                                                                                                                    echo 0;
                                                                                                                } else {
                                                                                                                    echo ($star[0]['so_luong'] / $sum) * 100;
                                                                                                                } ?>%;"
                                                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                        <?php if ($star[0]['so_luong'] == 0) {
                                                            echo 0;
                                                        } else {
                                                            echo ($star[0]['so_luong'] / $sum) * 100;
                                                        } ?>%
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="comment-form">
                                        <h4 class="mb-15">Bình luận</h4>
                                        <div class="product-rate d-inline-block mb-30">
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-8 col-md-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" name="comment"
                                                                id="comment" cols="30" rows="9"
                                                                placeholder="Viết bình luận"></textarea>
                                                        </div>
                                                        <input type="hidden" name="id" value="<?php echo $id ?>"
                                                            id="id">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="button button-contactForm"
                                                        onclick="comment()">Gửi</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-t    itle style-1 mb-30">Sản Phẩm Liên Quan</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    <?php
                                    $count_one = 0;
                                    foreach ($lien_quan as $key => $vl) {
                                        $count_one++; ?>

                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>"
                                                        tabindex="0">
                                                        <img class="default-img"
                                                            src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" alt="">
                                                        <img class="hover-img"
                                                            src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn hover-up"
                                                        href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>"><i
                                                            class="fi-rs-eye"></i></a>

                                                    <a aria-label="Mua ngay" class="action-btn hover-up"
                                                        href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>"><i
                                                            class="fas fa-truck"></i></i></a>
                                                </div>

                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a
                                                        href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>">
                                                        <?php echo $vl->ten_san_pham ?>
                                                    </a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span><?php echo  number_format($vl->gia_ban, 0, ',', ',') ?>
                                                        VND</span> <br>
                                                    <span
                                                        class="old-price"><?php echo  number_format($vl->gia_goc, 0, ',', ',') ?>
                                                        VND</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        if ($count_one == 4) {
                                            break;
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 primary-sidebar sticky-sidebar">

                    <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                        <div class="widget-header position-relative mb-20 pb-10">
                            <h5 class="widget-title mb-10">BỘ TRUYỆN</h5>
                            <div class="bt-1 border-color-1"></div>
                        </div>
                        <form action="index.php?controller=check&nd=thongTin" method="post">
                            <?php
                            $count_one = 0;
                            $sum_list = 0;
                            foreach ($bo_truyen as $key => $vl) {
                                $count_one++; ?>
                            <input type="hidden" name="so_luong" value="0">
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h5><a
                                            href="index.php?controller=boTruyen_view&id=<?php echo $vl->id_bo_truyen ?>"><?php echo $vl->ten_san_pham ?></a>
                                    </h5>
                                    <p class="price mb-0 mt-5">
                                        <?php $sum_list += $vl->gia_ban;
                                            echo  number_format($vl->gia_ban, 0, ',', ',')  ?> VND
                                    </p>
                                    <input type="hidden" name="card[]" value="<?php echo $vl->id_san_pham ?>">
                                    <input type="hidden" name="boTruyen">
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10"><?php echo $sum_list; ?></h5>
                                <div class="bt-1 border-color-1"> <button type="submit">Mua bộ truyện</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include "views/layout/user/Footer.php"; ?>