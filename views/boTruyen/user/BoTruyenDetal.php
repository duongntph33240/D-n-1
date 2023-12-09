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
                                    <div class="product-image-slider">

                                        <?php  foreach ($bo_truyen as $key => $vl) { ?>
                                        <figure class="border-radius-10">
                                            <img src="assets/imgs/shop/<?php echo $vl->img ?>" alt="product image">
                                        </figure>
                                        <?php } ?>
                                    </div>
                                    <!-- THUMBNAILS -->
                                    <div class="slider-nav-thumbnails pl-15 pr-15">
                                        <?php foreach ($bo_truyen as $key => $vl) { ?>
                                        <div><img src="assets/imgs/shop/<?php echo $vl->img ?>" alt="product image">
                                        </div>
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
                                <?php  foreach ($bo_truyen as $key => $vl) {
                                    ?>
                                <div class="detail-info">
                                    <h2 class="title-detail"><?php echo $vl->ten ?></h2>

                                    <div class="clearfix product-price-cover">
                                        <div class="product-price primary-color float-left">
                                            <ins><span
                                                    class="text-brand"><?php echo number_format($vl->gia_ban, 0, ',', ',') ?>
                                                    VND</span></ins>
                                            <ins><span
                                                    class="old-price font-md ml-15"><?php echo number_format($vl->gia_goc, 0, ',', ',') ?>
                                                    VND</span></ins>
                                            <span
                                                class="save-price  font-md color3 ml-15"><?php echo ($vl->gia_ban / $vl->gia_goc) * 100 ?>%
                                                Off</span>
                                        </div>
                                    </div>
                                    <div class="bt-1 border-color-1 mt-15 mb-15"></div>
                                    <div class="short-desc mb-30">
                                        <p><?php echo $vl-> mo_ta?></p>
                                    </div>
                                    <div class="product_sort_info font-xs mb-30">
                                        <ul>
                                            <li class="mb-10"><i class="fi-rs-crown mr-5"></i> Thời gian giao hàng </li>
                                            <li class="mb-10"><i class="fi-rs-refresh mr-5"></i>Chính sách hoàn trả</li>
                                            <li><i class="fi-rs-credit-card mr-5"></i> Đổi sản phẩm trong 30 ngày
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="bt-1 border-color-1 mt-30 mb-30"></div>
                                    <form action="index.php?controller=check&nd=thongTin" method="POST">
                                        <div class="detail-extralink">
                                            <div class="detail-qty border radius" style="width: 10%;  ">
                                                <input type="number" name="so_luong" min="1" max="10" value="1"
                                                    style="">
                                                <input type="hidden" name="idsp" value="<?php echo $vl->id ?>">
                                            </div>
                                            <?php foreach ($san_pham as $sp) {?>
                                                <input type="hidden" name="card[]" value="<?php echo $sp->id_san_pham ?>">
                                            <?php } ?>
                                            <input type="hidden" name="boTruyen">
                                            <input type="hidden" name="id_bo_truyen" value="<?php echo $vl->id ?>">
                                            <div class="product-extra-link2">
                                                <button type="submit" class="button button-add-to-cart">Mua
                                                    ngay</button>
                                                <a aria-label="Compare" class="action-btn hover-up"
                                                    href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </form>

                                    <?php } ?>

                                </div>
                                <!-- Detail Info -->
                            </div>
                        </div>

                        <div class="row mt-60">
                            <div class="col-12">
                                <h3 class="section-t    itle style-1 mb-30">Bộ truyện Liên Quan</h3>
                            </div>
                            <div class="col-12">
                                <div class="row related-products">
                                    <?php
                                    $count_one = 0;
                                    foreach ($bo_truyen_lien_quan as $key => $vl) {
                                        $count_one++; ?>

                                    <div class="col-lg-3 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap small hover-up">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="index.php?controller=boTruyen_view&id=<?php echo $vl->id ?>&loai=<?php echo $vl->loai ?>"
                                                        tabindex="0">
                                                        <img class="default-img"
                                                            src="assets/imgs/shop/<?php echo $vl->img ?>" alt="">
                                                        <img class="hover-img"
                                                            src="assets/imgs/shop/<?php echo $vl->img ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="product-action-1">
                                                    <a aria-label="Quick view" class="action-btn hover-up"
                                                        href="index.php?controller=boTruyen_view&id=<?php echo $vl->id ?>&loai=<?php echo $vl->loai ?>"><i
                                                            class="fi-rs-eye"></i></a>

                                                    <a aria-label="Mua ngay" class="action-btn hover-up"
                                                        href="index.php?controller=boTruyen_view&id=<?php echo $vl->id ?>&loai=<?php echo $vl->loai ?>"><i
                                                            class="fas fa-truck"></i></i></a>
                                                </div>

                                            </div>
                                            <div class="product-content-wrap">
                                                <h2><a
                                                        href="index.php?controller=boTruyen_view&id=<?php echo $vl->id ?>&loai=<?php echo $vl->loai ?>">
                                                        <?php echo $vl->ten ?>
                                                    </a></h2>
                                                <div class="rating-result" title="90%">
                                                    <span>
                                                    </span>
                                                </div>
                                                <div class="product-price">
                                                    <span><?php echo  number_format($vl->gia_ban, 0, ',', ',') ?>
                                                        VND</span>
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
                        <h5 class="section-title style-1 mb-30 wow fadeIn animated">Tập truyện</h5>
                        <?php
                        
                        foreach ($san_pham as $key => $vl) {
                             ?>
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" alt="#">
                            </div>
                            <div class="content pt-10">
                                <h5><a><?php echo $vl->ten_san_pham ?></a></h5>
                                <p class="price mb-0 mt-5"><?php echo  number_format($vl->gia_ban, 0, ',', ',')  ?> VND
                                </p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width:90%"></div>
                                </div>
                            </div>
                        </div>
                        <?php

                        }
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include "views/layout/user/Footer.php"; ?>