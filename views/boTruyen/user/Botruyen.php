<?php
include "views/layout/user/Header.php";
?>

<body>
    <section class="product-tabs section-padding position-relative wow fadeIn animated " ">
        <div class=" bg-square" style="background-color: #FFF;">
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

                                    if ($vl->loai == $vl1->id) {
                                        $count_one++;
                                ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom"
                                        style="min-height: 300px; max-height:300px ; overflow: hidden;">
                                        <a
                                            href="index.php?controller=boTruyen_view&id=<?php echo $vl->id ?>&loai=<?php echo $vl->loai ?>">
                                            <img class="default-img" src="assets/imgs/shop/<?php echo $vl->img ?>"
                                                style="margin: auto;min-height:  300px;" alt="loi">
                                            <img class="hover-img" src="assets/imgs/shop/<?php echo $vl->img ?>"
                                                style="margin: auto;min-height:  300px;" alt="loi">
                                        </a>
                                    </div>


                                </div>
                                <div class="product-content-wrap" id="productInfo">
                                    <h2><a
                                            href="index.php?controller=boTruyen_view&id=<?php echo $vl->id ?>&loai=<?php echo $vl->loai ?>"><?php echo $vl->ten ?></a>
                                    </h2>
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
                                        <button aria-label="Theo dõi" id="add_card"
                                            onclick="addToCart(<?php echo $vl->id_san_pham ?>)"
                                            class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></button>
                                        <?php } else { ?><a aria-label="Theo dõi" id="add_card"
                                            href="index.php?controller=dangNhap" class="action-btn hover-up"><i
                                                class="fi-rs-shopping-bag-add"></i></aria-label> </a>
                                        <?php } ?>
                                    </div>
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

                <?php $count++;
                    } else {
                    ?>
                <div class="tab-pane fade " id="tab-<?php echo $vl1->id ?>" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4">
                        <?php
                                $count_one = 0;
                                foreach ($san_pham as $key => $vl) {

                                    if ($vl->loai == $vl1->id) {
                                        $count_one++;
                                ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom"
                                        style="min-height: 300px; max-height:300px ; overflow: hidden;">
                                        <a
                                            href="index.php?controller=boTruyen_view&id=<?php echo $vl->id ?>&loai=<?php echo $vl->loai ?>">
                                            <img class="default-img" src="assets/imgs/shop/<?php echo $vl->img ?>"
                                                style="margin: auto;min-height:  300px;" alt="loi">
                                            <img class="hover-img" src="assets/imgs/shop/<?php echo $vl->img ?>"
                                                style="margin: auto;min-height:  300px;" alt="loi">
                                        </a>
                                    </div>


                                </div>
                                <div class="product-content-wrap" id="productInfo">
                                    <h2><a
                                            href="index.php?controller=boTruyen_view&id=<?php echo $vl->id ?>&loai=<?php echo $vl->loai ?>"><?php echo $vl->ten ?></a>
                                    </h2>
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
                                        <button aria-label="Theo dõi" id="add_card"
                                            onclick="addToCart(<?php echo $vl->id_san_pham ?>)"
                                            class="action-btn hover-up"><i class="fi-rs-shopping-bag-add"></i></button>
                                        <?php } else { ?><a aria-label="Theo dõi" id="add_card"
                                            href="index.php?controller=dangNhap" class="action-btn hover-up"><i
                                                class="fi-rs-shopping-bag-add"></i></aria-label> </a>
                                        <?php } ?>
                                    </div>
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

                <?php
                    }
                } ?>
            </div>
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
</body>
<?php include "views/layout/user/Footer.php"; ?>