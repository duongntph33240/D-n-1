<?php include "views/layout/user/Header.php"; ?>
<main class="main">
    <section class="pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto" style="width: 100%;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Đơn hàng</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Lịch sử
                                            mua hàng</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>Địa chỉ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Thông tin</a>
                                    </li>
                                    <?php if (isset($_SESSION['chuyen'])) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php?controller=chuyenDoi"><i class="fi-rs-sign-out mr-10"></i>Chuyển đổi qua admin</a>
                                        </li>
                                    <?php
                                    } ?>

                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php?controller=dangXuat"><i class="fi-rs-sign-out mr-10"></i>Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content dashboard-content">
                                <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Đơn hàng</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Mã Đơn hàng</th>
                                                            <th>Ngày đặt</th>
                                                            <th>Trạng thái</th>
                                                            <th>Sản Phẩm</th>
                                                            <th>Thanh toán</th>
                                                            <th>điều khiển</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $list_dh = [];

                                                        foreach ($list_don_hang as $vl) {
                                                            $found = false;

                                                            foreach ($list_dh as &$vl2) {
                                                                if ($vl2['id'] == $vl->id_don_hang) {
                                                                    $vl2['san_pham'] .= "<br>" . $vl->ten_san_pham;
                                                                    $vl2['tien'] += $vl->so_luong * $vl->gia;
                                                                    $found = true;
                                                                    break;
                                                                }
                                                            }
                                                            if (!$found) {
                                                                $id = $vl->id_don_hang;
                                                                $ngay = $vl->thoi_gian;
                                                                $trang_thai = $vl->trang_thai_don_hang;
                                                                $san_pham = $vl->ten_san_pham;
                                                                $tien = $vl->so_luong * $vl->gia;

                                                                $list_dh[] = [
                                                                    'id' => $id,
                                                                    'ngay' => $ngay,
                                                                    'trang_thai' => $trang_thai,
                                                                    'san_pham' => $san_pham,
                                                                    'tien' => $tien
                                                                ];
                                                            }
                                                        }
                                                        ?>
                                                        <?php

                                                        foreach ($list_dh as $key => $vl) {

                                                        ?>
                                                            <tr>
                                                                <td><?php echo $vl['id'] ?></td>
                                                                <td><?php echo $vl['ngay'] ?></td>
                                                                <td><?php echo $vl['trang_thai'] ?></td>
                                                                <td><?php echo $vl['san_pham'] ?></td>
                                                                <td><?php echo  number_format($vl['tien'], 0, ',', ',')  ?>
                                                                    VND
                                                                </td>
                                                                <td><a href="index.php?controller=donHang_chi_tiet&id=<?php echo $vl['id'] ?>" target="_blank" class="btn-small d-block">View</a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Lịch sử mua hàng</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Mã Đơn hàng</th>
                                                            <th>Ngày đặt</th>
                                                            <th>Trạng thái</th>
                                                            <th>Sản Phẩm</th>
                                                            <th>Thanh toán</th>
                                                            <th>điều khiển</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $list_dh = [];

                                                        foreach ($list_lich_su as $vl) {
                                                            $found = false;

                                                            foreach ($list_dh as &$vl2) {
                                                                if ($vl2['id'] == $vl->id_don_hang) {
                                                                    $vl2['san_pham'] .= "<br>" . $vl->ten_san_pham;
                                                                    $vl2['tien'] += $vl->so_luong * $vl->gia;
                                                                    $found = true;
                                                                    break;
                                                                }
                                                            }

                                                            if (!$found) {
                                                                $id = $vl->id_don_hang;
                                                                $ngay = $vl->thoi_gian;
                                                                $trang_thai = $vl->trang_thai_don_hang;
                                                                $san_pham = $vl->ten_san_pham;
                                                                $tien = $vl->so_luong * $vl->gia;

                                                                $list_dh[] = [
                                                                    'id' => $id,
                                                                    'ngay' => $ngay,
                                                                    'trang_thai' => $trang_thai,
                                                                    'san_pham' => $san_pham,
                                                                    'tien' => $tien
                                                                ];
                                                            }
                                                        }
                                                        ?>
                                                        <?php

                                                        foreach ($list_dh as $key => $vl) {

                                                        ?>
                                                            <tr>
                                                                <td><?php echo $vl['id'] ?></td>
                                                                <td><?php echo $vl['ngay'] ?></td>
                                                                <td><?php echo $vl['trang_thai'] ?></td>
                                                                <td><?php echo $vl['san_pham'] ?></td>
                                                                <td><?php echo  number_format($vl['tien'], 0, ',', ',') ?>
                                                                    VND
                                                                </td>
                                                                <td><a href="index.php?controller=donHang_chi_tiet&id=<?php echo $vl['id'] ?>" target="_blank" class="btn-small d-block">View</a>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0">Địa chỉ khách hàng</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <div id="show_dia_chi" style="display: block;">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Số thứ tự</th>
                                                                <th>địa chỉ</th>
                                                                <th>Trạng thái</th>

                                                                <th>đặt làm mặc định</th>
                                                                <th>xóa</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="tbody_dia_chi">
                                                            <?php
                                                            foreach ($list as $key => $vl) {
                                                                if ($vl->trang_thai == 1) {
                                                                    $trang_thai = 'Mặc định';
                                                                } else {
                                                                    $trang_thai = 'Địa chỉ';
                                                                }
                                                            ?>
                                                                <tr>
                                                                    <td><?php echo $key + 1 ?></td>
                                                                    <td><?php echo $vl->dia_chi ?></td>
                                                                    <td><?php echo  $trang_thai ?></td>

                                                                    <td><a onclick="pick(<?php echo $vl->id ?>)">đặt làm mặc
                                                                            định</a>
                                                                    <td> <a onclick="remo(<?php echo $vl->id ?>)">xoa</a>
                                                                    </td>
                                                                    </td>

                                                                </tr>
                                                            <?php
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                    <button id="them">thêm địa chỉ</button>
                                                </div>
                                                <form action="" id="form_dia_chi" style="display: none;">
                                                    <label for="">Địa chỉ nhận hàng</label>
                                                    <textarea name="" id="dia_chi" cols="20" rows="10"></textarea>
                                                    <button id="huy">Hủy</button> <button id="submitButton">Thêm</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Thông tin tài khoản</h5>
                                        </div>
                                        <div class="card-body">

                                            <form method="post" name="enq">
                                                <?php
                                                foreach ($infor as $key => $vl) { ?>
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <img src="assets/imgs/user/<?php echo $vl->anh ?>" alt="" width="5%">
                                                            <label>Hình ảnh<span class="required">*</span></label>
                                                            <input required="" class="form-control square" name="dname" type="file" readonly>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Tên người dùng <span class="required">*</span></label>
                                                            <input required="" class="form-control square" value="<?php echo $vl->name ?>" name="dname" type="text" readonly>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Địa chỉ email <span class="required">*</span></label>
                                                            <input required="" class="form-control square" value="<?php echo $vl->email ?>" name="email" type="email" readonly>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Điện thoại di động<span class="required">*</span></label>
                                                            <input required="" class="form-control square" value="<?php echo $vl->sdt ?>" name="sdt" type="email" readonly>
                                                        </div>

                                                        <!-- <div class="form-group col-md-12">
                                                            <label>Mật khẩu <span class="required">*</span></label>
                                                            <input required="" class="form-control square" value="<?php echo $vl->anh ?>" name="password" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Mật Khẩu mới <span class="required">*</span></label>
                                                            <input required="" class="form-control square" value="<?php echo $vl->anh ?>" name="npassword" type="password">
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Xác thực mật khẩu <span class="required">*</span></label>
                                                            <input required="" class="form-control square" value="<?php echo $vl->anh ?>" name="cpassword" type="password">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <button type="submit" class="btn btn-fill-out submit" name="submit" value="Submit">Save</button>
                                                        </div> -->
                                                    </div>
                                                <?php } ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include "views/layout/user/Footer.php"; ?>