<?php
include "views/layout/user/Header.php";
?>
<main class="main" style="background-color: #fff;">
    <section class="featured section-padding position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-1.png" alt="">
                        <h4 class="bg-1">Miễn phí vận chuyển</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-2.png" alt="">
                        <h4 class="bg-3">Đặt hàng trực tuyến</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-3.png" alt="">
                        <h4 class="bg-2">Tiết kiệm tiền</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-4.png" alt="">
                        <h4 class="bg-4">Khuyến mãi</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-5.png" alt="">
                        <h4 class="bg-5">Bán vui vẻ</h4>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-md-3 mb-lg-0">
                    <div class="banner-features wow fadeIn animated hover-up">
                        <img src="assets/imgs/theme/icons/feature-6.png" alt="">
                        <h4 class="bg-6">Hỗ trợ 24/7</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-tabs section-padding position-relative wow fadeIn animated " ">
        <div class=" bg-square">
        </div>

        <div class="container">
            <!-- danh muc -->
            <div class="tab-header">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php $count = 1;
                    foreach ($danh_muc as $key => $vl) {
                        if ($count == 1) {
                    ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab"
                            data-bs-target="#tab-<?php echo $vl->id ?>" type="button" role="tab" aria-controls="tab-one"
                            aria-selected="true"><?php echo $vl->ten ?></button>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-one" data-bs-toggle="tab"
                            data-bs-target="#tab-<?php echo $vl->id ?>" type="button" role="tab" aria-controls="tab-one"
                            aria-selected="true"><?php echo $vl->ten ?></button>
                    </li>
                    <?php
                        }
                        $count++;
                    } ?>
                </ul>
                <a href="index.php?controller=sanPham_view_more" class="view-more d-none d-md-flex">Xem thêm<i
                        class="fi-rs-angle-double-small-right"></i></a>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content wow fadeIn animated" id="myTabContent">
                <?php $count = 1;
                foreach ($danh_muc as $key => $vl1) {
                    if ($count == 1) { ?>
                <div class="tab-pane fade show active" id="tab-<?php echo $vl1->id ?>" role="tabpanel"
                    aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        <?php
                                $count_one = 0;
                                foreach ($san_pham as $key => $vl) {

                                    if ($vl->id_loai_san_pham == $vl1->id) {
                                        $count_one++;
                                ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom"
                                        style="min-height: 300px; max-height:300px ; overflow: hidden;">
                                        <a
                                            href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>">
                                            <img class="default-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>"
                                                style="margin: auto;min-height:  300px;" alt="loi">
                                            <img class="hover-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>"
                                                style="margin: auto;min-height:  300px;" alt="loi">
                                        </a>
                                    </div>
                                </div>
                                <div class="product-content-wrap" id="productInfo">
                                    <h2><a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>""><?php echo $vl->ten_san_pham ?></a></h2>
                                    <div class=" rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                </div>
                                <div class="product-price">
                                    <span><?php echo  number_format($vl->gia_ban, 0, ',', ',') ?> VND</span>
                                    <span class="old-price"><?php echo  number_format($vl->gia_goc, 0, ',', ',') ?>
                                        VND</span>
                                </div>
                                <div class="product-action-1 show">
                                    <?php if (isset($_SESSION['id'])) { ?>
                                    <button aria-label="Add To Cart" id="add_card"
                                        onclick="addToCart(<?php echo $vl->id_san_pham ?>)"
                                        class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></button>
                                    <?php } else { ?><a aria-label="Add To Cart" id="add_card"
                                        href="index.php?controller=dangNhap" class="action-btn hover-up"><i
                                            class="fi-rs-shopping-bag-add"></i></aria-label> </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                                    if ($count_one == 8) {
                                        break;
                                    }
                                }

                    ?>
                </div>
            </div>
            <?php $count++;
                    } else {
        ?>
            <div class="tab-pane fade " id="tab-<?php echo $vl1->id ?>" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    <?php
                        $count_one = 0;
                        foreach ($san_pham as $key => $vl) {

                            if ($vl->id_loai_san_pham == $vl1->id) {
                                $count_one++;
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                        <div class="product-cart-wrap mb-30">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom"
                                    style="min-height: 300px; max-height:300px ; overflow: hidden;">
                                    <a
                                        href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>">
                                        <img class="default-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>"
                                            style="margin: auto;min-height:  300px;" alt="loi">
                                        <img class="hover-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>"
                                            style="margin: auto;min-height:  300px;" alt="loi">
                                    </a>
                                </div>
                            </div>
                            <div class="product-content-wrap" id="productInfo">
                                <h2><a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>""><?php echo $vl->ten_san_pham ?></a></h2>
                                    <div class=" rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                            </div>
                            <div class="product-price">
                                <span><?php echo  number_format($vl->gia_ban, 0, ',', ',') ?> VND</span>
                                <span class="old-price"><?php echo  number_format($vl->gia_goc, 0, ',', ',') ?>
                                    VND</span>
                            </div>
                            <div class="product-action-1 show">
                                <?php if (isset($_SESSION['id'])) { ?>
                                <button aria-label="Add To Cart" id="add_card"
                                    onclick="addToCart(<?php echo $vl->id_san_pham ?>)" class="action-btn hover-up"><i
                                        class="fi-rs-shopping-bag-add"></i></button>
                                <?php } else { ?><a aria-label="Add To Cart" id="add_card"
                                    href="index.php?controller=dangNhap" class="action-btn hover-up"><i
                                        class="fi-rs-shopping-bag-add"></i></aria-label> </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }
                            if ($count_one == 8) {
                                break;
                            }
                        }
        ?>
            </div>
        </div>
        <?php
                    }
                } ?>
        <!--End product-grid-4-->
        </div>
        <!--En tab one (Featured)-->

        <!--End product-grid-4-->
        </div>
        <!--En tab two (Popular)-->

        <!--End product-grid-4-->
        </div>
        <!--En tab three (New added)-->
        </div>
        <!--End tab-content-->
        </div>
    </section>
    <section class="section-padding">
        <div class="container wow fadeIn animated">
            <h3 class="section-title mb-20"><span>Sản phẩm mới</span></h3>
            <div class="carausel-6-columns-cover position-relative">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-2-arrows">
                </div>
                <div class="carausel-6-columns carausel-arrow-center" id="carausel-6-columns-2">
                    <?php foreach ($san_pham_now as $key => $vl) { ?>
                    <div class="product-cart-wrap small hover-up">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom"
                                style="position: relative; width: 100%; height: 0;padding-bottom: 120%;overflow: hidden;">
                                <a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>"">
                                    <img class=" default-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>"
                                    width="100%" alt=""
                                    style=" position: absolute;top: 0;left: 0;width: 100%;height: 100%; object-fit: cover; ">
                                    <img class=" default-img" src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>"
                                        width="100%" alt=""
                                        style=" position: absolute;top: 0;left: 0;width: 100%;height: 100%; object-fit: cover; ">
                                </a>
                            </div>
                            <div class="product-action-1">
                                <a aria-label="Quick view" class="action-btn small hover-up" data-bs-toggle="modal"
                                    data-bs-target="#quickViewModal">
                                    <i class="fi-rs-eye"></i></a>
                                <a aria-label="Add To Wishlist" class="action-btn small hover-up" href="wishlist.php"
                                    tabindex="0"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Mua ngay" class="action-btn small hover-up"
                                    href="index.php?controller=muaHang&id=<?php echo $vl->id_san_pham ?>"
                                    tabindex="0"><i class="fi-rs-shuffle"></i></a>
                            </div>

                        </div>
                        <div class="product-content-wrap">
                            <h2><a href="index.php?controller=sanPham_view&id=<?php echo $vl->id_san_pham ?>&loai=<?php echo $vl->id_loai_san_pham ?>&botruyen=<?php echo $vl->id_bo_truyen ?>""><?php echo $vl->ten_san_pham ?></a></h2>
                            <div class=" rating-result" title="90%">
                                    <span>
                                    </span>
                        </div>
                        <div class="product-price">
                            <span><?php echo  number_format($vl->gia_ban, 0, ',', ',') ?> VND</span> <br>
                            <span class="old-price"><?php echo  number_format($vl->gia_goc, 0, ',', ',') ?> VND</span>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        </div>
    </section>
    <section class="section-padding">
        <div class="container">
            <h3 class="section-title mb-20 wow fadeIn animated"><span>Nhà xuất bản</span></h3>
            <div class="carausel-6-columns-cover position-relative wow fadeIn animated">
                <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-3-arrows">
                </div>
                <div class="carausel-6-columns text-center" id="carausel-6-columns-3">
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-1.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-2.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-4.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-5.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-6.png" alt="">
                    </div>
                    <div class="brand-logo">
                        <img class="img-grey-hover" src="assets/imgs/banner/brand-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
<?php include "views/layout/user/Footer.php"; ?>