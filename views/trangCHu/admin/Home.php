<?php include "views/layout/admin/Header.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thống kê</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Đơn hàng đã giao</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $doanh_thu['so_don_hang']; ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Doanh thu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo number_format($doanh_thu['tong_tien'], 0, ',', ','); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Đơn hàng chưa giao
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        <?php echo $don_hanh_chua_giao['soluong']; ?></div>

                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: <?php echo  round($don_hanh_chua_giao['soluong'] / $don_hang['soluong'] * 100, 2); ?>%"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Số lượng khách hàng phản hồi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $lien_he['soluong']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ doanh thu theo tháng</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Biểu đồ đơn hàng mỗi loại sản phẩm</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <?php foreach ($bill as $key => $vl) {
                        $tens[] = $vl['ten_loai_san_pham'];
                    } ?>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> <?php echo $tens[0] ?>
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> <?php echo $tens[1] ?>
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> <?php echo $tens[2] ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Content Column -->
        <div class="col-lg-6 mb-4">

            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sản phẩm mỗi loại trên tổng số</h6>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($san_pham as $key => $vl) {
                        $ten[] = $vl['ten_loai_san_pham'];
                        $so[] = $vl['so_luong_sach'];
                    }
                    ?>
                    <h4 class="small font-weight-bold"><?php echo $ten[0] ?>
                        <span class="float-right">
                            <?php echo round($so[0] / $all_san_pham['soluong'] * 100, 2); ?>%(<?php echo $so[0] ?>)</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar"
                            style="width: <?php echo  round($so[0] / $all_san_pham['soluong'] * 100, 2); ?>%"
                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        <?php echo $ten[1] ?>
                        <span
                            class="float-right"><?php echo  round($so[1] / $all_san_pham['soluong'] * 100, 2); ?>%(<?php echo $so[1] ?>)</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar"
                            style="width: <?php echo  round($so[1] / $all_san_pham['soluong'] * 100, 2); ?>%"
                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <h4 class="small font-weight-bold">
                        <?php echo $ten[2] ?> <span
                            class="float-right"><?php echo round($so[2] / $all_san_pham['soluong'] * 100, 2); ?>%(
                            <?php echo $so[2] ?>)</span>
                    </h4>
                    <div class="progress mb-4">
                        <div class="progress-bar" role="progressbar"
                            style="width: <?php echo  round($so[2] / $all_san_pham['soluong'] * 100, 2) ?>%"
                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!-- <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div> -->
                    <h4 class="small font-weight-bold">Tổng <span
                            class="float-right"><?php echo  $all_san_pham['soluong'] / $all_san_pham['soluong'] * 100; ?>%(<?php echo  $all_san_pham['soluong']; ?>)</span>
                    </h4>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar"
                            style="width:  <?php echo  $all_san_pham['soluong'] / $all_san_pham['soluong'] * 100; ?>%"
                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>
<!-- /.container-fluid -->
<script>
<?php
    $Date = json_encode($bill);
    ?>
var data = <?php echo $Date; ?>
</script>

<!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php";
echo "acv"; ?>