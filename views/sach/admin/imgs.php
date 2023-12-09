<?php include "views/layout/admin/Header.php";
?>
    <!-- Begin Page Content -->

    <!-- /.container-fluid -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh sách ảnh sản phẩm</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <a href="index.php?controller=sanPham_fix&id=<?php echo $idsp?>">Trở lại</a>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <td>STT</td>
                            <td>Ảnh</td>
                            <td>button</td>
                        </tr>
                        <?php foreach ($imgs as $i => $img) {?>
                        <tr>
                            <td><?php echo $i+1 ?></td>
                            <td><img src="assets/imgs/shop/<?php echo $img->hinh_anh?>" width="300px" height="200px" alt=""></td>
                            <td><a href="index.php?controller=sanPham_fix_dlimg&id_san_pham=<?php echo $idsp?>&id_hinh_anh=<?php echo $img->id?>">Xóa</a></td>
                        </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>