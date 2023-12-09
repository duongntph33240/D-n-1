<?php include "views/layout/admin/Header.php";
?>
<!-- Begin Page Content -->

<!-- /.container-fluid -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách sản phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>giá bán</th>
                            <th>Số lượng</th>
                           
                            <th>button</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>giá bán</th>
                            <th>Số lượng</th>
                            
                            <th>button</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($list as $i => $sp) {?>
                        <tr>
                            <td><?php echo $i+1?></td>
                            <td><?php echo $sp->ten_san_pham?></td>
                            <td><img src="assets/imgs/shop/<?php echo $sp->hinh_anh?>" width="100px" height="60px" alt=""></td>
                            <td><?php echo  number_format($sp->gia_ban, 0, ',', ',')?></td>
                            <td><?php echo $sp->so_luong?></td>
                            <td>
                                <a href="index.php?controller=sanPham_fix&id=<?php echo $sp->id_san_pham?>">Chi tiết</a> |
                                <a href="index.php?controller=sanPham_delete&id=<?php echo $sp->id_san_pham?>">Xóa</a>
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