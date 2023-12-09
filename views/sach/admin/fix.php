<?php include "views/layout/admin/Header.php";

?>
<div class="container" ">
    <div class=" text">
    Chi tiết
</div>
<form action="index.php?controller=sanPham_fix" method="post" enctype="multipart/form-data" style="min-height: 500px;">
    <input type="hidden" name="id_san_pham" value="<?php echo $list[0]->id_san_pham ?>">
    <div class=" form-row">
        <div class="input-data">
            <input type="text" name="ten_san_pham" value="<?php echo $list[0]->ten_san_pham ?>" required>
            <div class="underline"></div>
            <label for="">Tên sách</label>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <input type="text" name="mo_ta" value="<?php echo $list[0]->mo_ta ?>" required>
            <div class="underline"></div>
            <label for="">Mô tả</label>
        </div>
    </div>
    <img src="assets/imgs/shop/<?php echo $list[0]->hinh_anh ?>" width="300px" height="200px" alt="">
    <div class=" form-row">
        <h6>Ảnh đại diện</h6>
        <div class="input-data">
            <input type="file" name="hinh_anh_sp">
            <input type="hidden" name="hinh_anh_sp_old" value="<?php echo $list[0]->hinh_anh ?>">
            <div class="underline"></div>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <input type="text" name="gia_ban" value="<?php echo $list[0]->gia_ban ?>" required>
            <div class="underline"></div>
            <label for="">Giá bán</label>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <input type="text" name="gia_goc" value="<?php echo $list[0]->gia_goc ?>" required>
            <div class="underline"></div>
            <label for="">Giá gốc</label>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <input type="number" name="so_luong" value="<?php echo $list[0]->so_luong ?>" required>
            <div class="underline"></div>
            <label for="">Số lượng</label>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <input type="number" name="so_trang" value="<?php echo $list[0]->so_trang ?>" required>
            <div class="underline"></div>
            <label for="">Số trang</label>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <input type="date" name="nam_xb" value="<?php echo $list[0]->nam_xb ?>" required>
            <div class="underline"></div>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <input type="text" name="kich_thuoc" value="<?php echo $list[0]->kich_thuoc ?>" required>
            <div class="underline"></div>
            <label for="">Kích thước</label>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <input type="number" name="trong_luong" value="<?php echo $list[0]->trong_luong ?>" required>
            <div class="underline"></div>
            <label for="">Trọng lượng</label>
        </div>
    </div>
    <div class=" form-row">
        <h6>Loại sản phẩm</h6>
        <div class="input-data">
            <select name="id_loai_san_pham" id="">
                <?php foreach ($l as $vl) { ?>
                    <option value="<?php echo $vl->id ?>" <?php echo ($list[0]->id_loai_san_pham == $vl->id) ? "selected" : ""; ?>><?php echo $vl->ten ?>
                    </option>
                <?php } ?>
            </select>
            <div class="underline"></div>
        </div>
    </div>
    <div class=" form-row">
        <h6>Bộ truyện</h6>
        <div class="input-data">
            <select name="id_bo_truyen" id="">
                <?php foreach ($b as $vl) { ?>
                    <option value="<?php echo $vl->id ?>" <?php echo ($list[0]->id_bo_truyen == $vl->id) ? "selected" : ""; ?>><?php echo $vl->ten ?></option>
                <?php } ?>
            </select>
            <div class="underline"></div>
        </div>
    </div>
    <div class=" form-row">
        <h6>Nhà sản xuất</h6>
        <div class="input-data">
            <select name="id_nha_san_xuat" id="">
                <?php foreach ($nsx as $vl) { ?>
                    <option value="<?php echo $vl->id ?>" <?php echo ($list[0]->id_nha_san_xuat == $vl->id) ? "selected" : ""; ?>><?php echo $vl->ten ?>
                    </option>
                <?php } ?>
            </select>
            <div class="underline"></div>
        </div>
    </div>
    <div class=" form-row">
        <h6>Nhà phát hành</h6>
        <div class="input-data">
            <select name="id_nha_phat_hanh" id="">
                <?php foreach ($nph as $vl) { ?>
                    <option value="<?php echo $vl->id ?>" <?php echo ($list[0]->id_nha_phat_hanh == $vl->id) ? "selected" : ""; ?>><?php echo $vl->ten ?>
                    </option>
                <?php } ?>
            </select>
            <div class="underline"></div>
        </div>
    </div>
    <h6>Ảnh sản phẩm</h6>
    <input type="file" name="images[]" multiple accept="image/*">
    <div class="form-row">
        <a href="index.php?controller=sanPham_fix_dlimg&id_san_pham=<?php echo $idsp ?>">Chỉnh sửa</a>
        <table style="width: 100%">
            <?php $count = 1;
            foreach ($imgs as $i => $img) { ?>
                <?php if ($count == 1) {
                    echo '<tr>';
                } ?>
                <td>
                    <img src="assets/imgs/shop/<?php echo $img->hinh_anh ?>" width="300px" height="200px" alt="">
                </td>

                <!-- <a href="index.php?controller=sanPham_fix_dlimg&id_san_pham=<?php echo $list[0]->id_san_pham ?>&id_hinh_anh=<?php echo $img->id ?>">Xóa</a> -->

                <?php if ($count == 4 || $i == count($imgs) - 1) {
                    echo '</tr>';
                } ?>
                <?php $count++;
                if ($count > 4) {
                    $count = 1;
                } ?>
            <?php } ?>
        </table>
    </div>
    <div class="form-row">
        <div class="input-data textarea">
            <div class="form-row submit-btn">
                <div class="input-data">
                    <div class="inner"></div>
                    <input type="submit" value="submit">
                </div>
            </div>
        </div>
    </div>
</form>
</div>
<!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>