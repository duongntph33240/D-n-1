<?php include "views/layout/admin/Header.php";
?>
<div class="container" >
    <div class=" text">
    Thêm loại truyện
</div>
<form action="index.php?controller=loaisanpham_add" method="post" style="min-height: 500px;">
    <div class=" form-row">
        <div class="input-data">
            <input type="text" name="ten" required>
            <div class="underline"></div>
            <label for="">Tên loại truyện</label>
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
        </div>
</form>
</div>
<!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>