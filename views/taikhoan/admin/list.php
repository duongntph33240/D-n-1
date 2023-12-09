<?php include "views/layout/admin/Header.php";
?>
<!-- Begin Page Content -->

<!-- /.container-fluid -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh tài khoản</h1>
    <h1>
        <?php if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
        } ?>
    </h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Quyền hạn</th>
                            <th>Trạng thái</th>
                            <th>button</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Quyền hạn</th>
                            <th>Trạng thái</th>
                            <th>button</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($list as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $key + 1 ?></td>
                            <td><?php echo $value->name ?></td>
                            <td><?php echo $value->email ?></td>
                            <td><?php echo $value->quyen ?></td>
                            <td><?php if ($value->trang_thai == 0) {
                                        echo "Vô hiệu hoá";
                                    } else {
                                        echo "Còn tồn tại";
                                    }  ?></td>
                            </td>
                            <td>
                                <a href="index.php?controller=taiKhoan_delete&id=<?php echo $value->id ?>">Xoá</a>
                                /<a href="index.php?controller=taiKhoan_fix&id=<?php echo $value->id ?>">Sửa</a>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>