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
                    <h3>Thông tin người dùng</h3>
                    <table>
                        <tr>
                            <td>Id người dùng:</td>
                            <td>38748</td>
                        </tr>
                        <tr>
                            <td>Họ và tên:</td>
                            <td>Nguyễn Thế Dương</td>
                        </tr>
                        <tr>
                            <td>Địa chỉ:</td>
                            <td>Cao đẳng fpt</td>
                        </tr>
                        <tr>
                            <td>Số điện thoại: </td>
                            <td>3094938938473</td>
                        </tr>
                    </table>
                    <h3>Thông tin hóa đơn</h3>
                    <table>
                        <tr>
                            <td>Mã hóa đơn:</td>
                            <td>3626372637</td>
                        </tr>
                        <tr>
                            <td>Ngày đặt:</td>
                            <td>2023-11-20 15:23:47</td>
                        </tr>
                        <tr>
                            <td>Sản phẩm 1:</td>
                            <td>Trượt môn - 100.000 VND(x3)</td>
                        </tr>
                        <tr>
                            <td>Sản phẩm 2:</td>
                            <td>Học lại - 100.000 VND(x2)</td>
                        </tr>
                        <tr>
                            <td>Thành tiền:</td>
                            <td>2.000.000 VND</td>
                        </tr>
                        <tr>
                            <td>Phương Thức thanh toán: </td>
                            <td>VNPAY</td>
                        </tr>
                        <tr>
                            <td>Trạng thái hóa đơn: </td>
                            <td>Đã thanh toán</td>
                        </tr>
                    </table>
                    <button style="border: none;background-color: #2850c3;border-radius: 3px"><a style="padding: 3px;color: white" href="index.php?controller=donHang_exportId&id=<?php echo $id?>">Xuất đơn hàng</a></button>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>