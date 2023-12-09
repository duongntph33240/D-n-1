<?php include "views/layout/admin/Header.php";
?>
<div class="container" ">
    <div class=" text">
    Thêm mới tài khoản
</div>
<form action="index.php?controller=taiKhoan_add" method="post" style="min-height: 500px;">
    <div class=" form-row">
        <div class="input-data">
            <input type="email" name="email" required>
            <div class="underline"></div>
            <label for="">Email</label>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <input type="password" name="password" required>
            <div class="underline"></div>
            <label for="">Password</label>
        </div>
    </div>
    <div class=" form-row">
        <div class="input-data">
            <input type="text" name="ten" required>
            <div class="underline"></div>
            <label for="">Tên người dùng</label>
        </div>
    </div>

    <div class=" form-row">
        <div class="input-data">
            <select name="quyen" id="">
                <?php foreach ($roles as $key => $vl) { ?>
                    <option value=" <?php echo $vl->id ?>"> <?php echo  $vl->name ?></option>
                <?php } ?>
            </select>
            <div class="underline"></div>
            <label for="">Quyền hạn</label>
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