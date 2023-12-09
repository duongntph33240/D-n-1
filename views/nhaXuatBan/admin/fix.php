<?php include "views/layout/admin/Header.php";
?>
<div class="container" >
    <div class=" text">
    Thêm Nhà Xuất Bản
</div>
<form action="index.php?controller=nhaXuatBan_fix" method="post" style="min-height: 500px;">
<?php foreach($list as $key => $vl) {?>
    <input type="hidden" name="id" value="<?php echo $vl->id ?>" >
    <div class=" form-row">
        <div class="input-data">
            <input type="text" name="ten" value="<?php echo $vl->ten ?>" required>
            <div class="underline"></div>
            <label for="">Tên Nhà Xuất Bản</label>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <select name="trang_thai" id="">
            <?php if( $vl->trang_thai == 1)
            {
                ?>
                <option value="1">Hoạt động</option>
                <option value="0">Dừng hoạt động</option>
                <?php
            }else
            {
                ?>
                 <option value="0">Dừng hoạt động</option>
                <option value="1">Hoạt động</option>
                <?php
            }?>
            </select>
            <div class="underline"></div>
            <label for="">Trạng thái</label>
        </div>
    </div>
    <?php }?>
    <div class="form-row">
        <div class="input-data textarea">
            <div class="form-row submit-btn">
                <div class="input-data">
                    <div class="inner"></div>
                    <input type="submit" value="submit">
                </div>
            </div>
        </div>
</form>
</div>
<!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>