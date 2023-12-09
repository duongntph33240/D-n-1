<?php include "views/layout/admin/Header.php";
?>
<!-- Begin Page Content -->

<!-- /.container-fluid -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Danh sách đơn hàng</h1>
    <h1>
        <?php if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
        } ?>
    </h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <!-- <button><a href="index.php?controller=donHang_exportId&nd=all">Xuất đơn hàng chờ xác nhận</a></button> -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Người mua hàng </th>
                            <th>Số điện thoai</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th>Tương tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Người mua hàng</th>
                            <th>Số điện thoai</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                            <th>Tương tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($list as $i => $dh) { ?>
                        <tr id="dh<?php echo $dh->id_don_hang ?>">

                            <td><?php echo $i + 1 ?></td>
                            <td> <a
                                    href="index.php?controller=donHang_fix&id=<?php echo $dh->id_don_hang ?>">#<?php echo $dh->ma_hoa_don ?></a>
                            </td>
                            <td><?php echo $dh->id_user ?></td>
                            <td><?php echo $dh->sdt ?></td>
                            <td><?php echo $dh->thoi_gian ?></td>
                            <th> <?php
                                        if ($dh->ten_tt_don_hang == "Chờ xác nhận") {
                                        ?> <span style="color: black;" class="badge bg-warning text-dark">
                                    <?php echo $dh->ten_tt_don_hang ?></span>
                                <?php
                                        } elseif ($dh->ten_tt_don_hang == "Đang giao hàng") {
                                    ?> <span style="color: aliceblue;" class="badge bg-primary">
                                    <?php echo $dh->ten_tt_don_hang ?></span>
                                <?php
                                        } elseif ($dh->ten_tt_don_hang == "Hủy") {
                                    ?> <span style="color: aliceblue;" class="badge bg-danger">
                                    <?php echo $dh->ten_tt_don_hang ?></span>
                                <?php
                                        } elseif ($dh->ten_tt_don_hang == "Đã giao hàng") {
                                    ?> <span style="color: aliceblue;" class="badge bg-success">
                                    <?php echo $dh->ten_tt_don_hang ?></span>
                                <?php
                                        } elseif ($dh->ten_tt_don_hang == "Giao hàng không thành công") {
                                    ?> <span style="color: aliceblue;" class="badge bg-secondary">
                                    <?php echo $dh->ten_tt_don_hang ?></span>
                                <?php
                                        }
                                    ?>
                            </th>

                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalLong" onclick="showDH(<?php echo $dh->id_don_hang ?>)">
                                    Trạng thái đơn hàng
                                </button>
                                <br>
                                <button style="margin-top: 5px;" type="button" class="btn btn-primary">
                                    <a style="padding: 3px;color: white"
                                        href="index.php?controller=donHang_exportId&id=<?php echo $dh->id_don_hang?>">Xuất
                                        hóa đơn</a>
                                </button>
                            </td>
                        </tr>
                        <?php } ?>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle" style="color: black;">Thông
                                            tin đơn hàng</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div id="userShow">
                                            <h5 style="color: dimgray">Thông tin khách hàng</h5>
                                            <p>Người đặt hàng: </p>
                                            <p>Số điện thoại: </p>
                                            <p>Địa chỉ nhận hàng: </p>
                                        </div>
                                        <div>
                                            <h5 style="color: dimgray">Thông tin đơn hàng</h5>
                                            <p id="ma_don">Mã đơn hàng : </p>
                                            <div id="showDH">
                                                <p>Sản phẩm 1 X1 </p>
                                                <p>Sản Phẩm 2 X2 </p>
                                            </div>
                                            <div>
                                                Trạng thái đơn hàng:
                                                <select name="trang_thai" id="trang_thai">

                                                </select>
                                            </div>
                                            <div>
                                                <h5 style="color: dimgray">Ghi chú</h5>
                                                <textarea name="ghi_chu" id="ghi_chu" cols="50" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                            onclick="huy()">Huỷ</button>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal"
                                            onclick="save()">Lưu</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>