<?php include "views/layout/admin/Header.php";
?>
<!-- Begin Page Content -->

<!-- /.container-fluid -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Trạng thái đơn hàng</h1>
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
                            <th>Id trạng thái</th>
                            <th>Tên trạng thái</th>
                            <th>button</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Id trạng thái</th>
                            <th>Tên trạng thái</th>
                            <th>button</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($list as $i => $tt) { ?>
                            <tr>
                                <td><?php echo $i + 1 ?></td>
                                <td><?php echo $tt->id_trang_thai_don_hang ?></td>
                                <td><?php echo $tt->ten_trang_thai_don_hang ?></td>
                                <td>
                                    <a href="index.php?controller=trangThaiDH_update&id=<?php echo $tt->id_trang_thai_don_hang ?>">Sửa</a>
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