<?php include "views/layout/admin/Header.php";
?>
    <div class="container" ">
    <div class=" text">
        Thêm Bộ truyện
    </div>
    <form action="index.php?controller=trangThaiDH_update" method="post" style="min-height: 500px;">
        <div class=" form-row">
            <div class="input-data">
                <input type="text" name="ten_trang_thai_don_hang" value="<?php echo $list[0]->ten_trang_thai_don_hang ?>" required>
                <input type="hidden" name="id_trang_thai_don_hang" value="<?php echo $list[0]->id_trang_thai_don_hang ?>">
                <div class="underline"></div>
                <label for="">Tên trạng thái</label>
            </div>
        </div>
        <div class="form-row">
            <div class="input-data textarea">
                <div class="form-row submit-btn">
                    <div class="input-data">
                        <div class="inner"></div>
                        <input type="submit" value="submit">
                    </div>
                </div>
    </form>
    </div>
    <!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>