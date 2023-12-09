<?php include('views/layout/admin/Header.php');
if (!isset($_SESSION)) {
    session_start();
} ?>
<div class="wrapper2">
    <section class="users">
        <header>

        </header>
        <div class="search">
            <span class="text">Lựa chọn Khách hàng cần hỗ trợ</span>
            <input class="" type="text" name="search" id="" placeholder="Nhập tên để tìm kiếm">
            <button class=""><i class="fas fa-search"></i></button>
        </div>
        <div class="users-list">
        </div>
    </section>
</div>
<!-- inform -->
<script src="assets/js/users-event.js"></script>
<?php include "views/layout/admin/Footer.php"; ?>