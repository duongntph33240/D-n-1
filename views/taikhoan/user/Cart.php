<?php include "views/layout/user/Header.php"; ?>
<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="index.php?controller=check&nd=thongTin" method="post">
                        <div class="table-responsive">
                            <table class="table shopping-summery text-center clean">
                                <thead>
                                    <tr class="main-heading">
                                        <th></th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">tên sản phẩm</th>
                                        <th scope="col">Giá bán</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Thành tiền</th>
                                        <th scope="col">Xoá</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <?php if ($list == null) : ?>
                                        <tr class='text'>
                                            <td colspan='7'>Không có sản phẩm trong giỏ hàng.</td>
                                        </tr>
                                        <?php else :
                                        foreach ($list as $key => $vl) : ?>
                                            <tr>
                                                <td>
                                                    <label class="checkbox-wrap checkbox-primary">
                                                        <input type="checkbox" name="card[]" value="<?php echo $vl->idpro ?>" />
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </td>
                                                <td class="image product-thumbnail"><img src="assets/imgs/shop/<?php echo $vl->hinh_anh ?>" alt="#"></td>
                                                <td class="product-des product-name">
                                                    <h5 class="product-name"><a href="product-details.html"><?php echo $vl->ten ?></a></h5>
                                                </td>
                                                <td class="price" data-title="Price"><span><?php echo $vl->gia  ?> </span></td>
                                                <td class="text-center" data-title="Stock">
                                                    <div class="detai border radius m-auto">
                                                        <a href="#" class="qty-down" onclick="down(<?php echo $vl->idpro ?>)"><i class="fi-rs-angle-small-down"></i></a>
                                                        <span><?php echo $vl->so_luong ?></span>
                                                        <a href="#" class="qty-up" onclick="up(<?php echo $vl->idpro ?>)"><i class="fi-rs-angle-small-up"></i></a>
                                                    </div>
                                                </td>
                                                <td class="text-right" data-title="Cart">
                                                    <span><?php echo $vl->gia * $vl->so_luong ?></span>
                                                </td>
                                                <td class="action" data-title="Remove">
                                                    <a href="#" class="text-muted" onclick="dele(<?php echo $vl->idpro ?>)"><i class="fi-rs-trash"></i></a>
                                                </td>
                                            </tr>
                                    <?php endforeach;
                                    endif; ?>

                                    <tr>
                                        <td colspan="6" class="text-end">
                                            <a href="#" class="text-muted"> <i class="fi-rs-cross-small"></i> Clear
                                                Cart</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-action text-end">

                            <a class="btn " onclick="selectAll()"><i class="fi-rs-checkmark mr-10"></i>Chọn tất cả</a>
                            <a class="btn " onclick="deselectAll()"><i class="fi-rs-cross mr-10"></i>Bỏ chọn tất cả</a>

                            <a class="btn "><i class="fi-rs-shopping-bag mr-10"></i> <button style="outline: none; border: transparent; background: transparent; color: #fff;">Mua
                                    hàng</button></a>
                        </div>
                        <div class="divider center_icon mt-50 mb-50"><i class="fi-rs-fingerprint"></i></div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include "views/layout/user/Footer.php"; ?>