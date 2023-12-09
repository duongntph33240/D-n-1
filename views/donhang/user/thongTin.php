<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$vnp_TmnCode = "87J682PG"; //Website ID in VNPAY System
$vnp_HashSecret = "KQJDGPOXRJQROQWOENLOACLRFKMTUCSF"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/php/Nhom01_WebBanHang_Edubook/views/donhang/user/vnpay_return.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
date_default_timezone_set('Asia/Ho_Chi_Minh');
include_once 'views/layout/user/Header.php'; ?>

<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4>Thông tin hóa đơn</h4>
                    </div>
                    <form
                        action="<?php if ($soLuong==0 || $soLuong==""){echo 'index.php?controller=check&nd=thanhToan';}else{echo "index.php?controller=muaHang&nd=thanhToan";} ?>"
                        method="post">
                        <input type="hidden" name="so_luong" value="<?php echo $soLuong ?>">
                        <?php if ($soLuong==0 || $soLuong==""){?>

                        <?php }?>
                        <?php if ($soLuong==0){ foreach ($thongTinSp as $sp) {
                                ?>
                        <input type="hidden" name="idsp[]" value="<?php echo $sp->id_san_pham?>">
                        <input type="hidden" name="soLuong[]" value="<?php echo $sp->so_luong?>">

                        <?php }}else if ($soLuong>0 && !isset($id_bo_truyen)){ ?>
                        <input type="hidden" name="idsp" value="<?php echo $thongTinSp[0]->id_san_pham?>">
                        <?php }else if($soLuong>0 && isset($id_bo_truyen)){ ?>
                            <input type="hidden" name="idbt" value="<?php echo $thongTinBT[0]->id?>">
                            <?php foreach ($thongTinSp as $sp) {?>
                                <input type="hidden" name="idsp[]" value="<?php echo $sp->id_san_pham?>">
                            <?php }} ?>
                        <div class="form-group">
                            <label for="fname">Họ và tên:</label>
                            <input class="form-control" type="text" required="" name="txt_billing_fullname"
                                placeholder="Họ và tên *" value="<?php echo $thongTinUs[0]->name ?>">
                        </div>
                        <div class="form-group">
                            <label for="sdt">Số điện thoại:</label>
                            <input class="form-control" required="" type="text" name="txt_billing_mobile"
                                placeholder="Số điện thoại *" value="<?php echo $thongTinUs[0]->sdt?>" >
                        </div>
                        <div class="form-group">
                            <label for="diaChi">Địa chỉ:</label>
                            <input class="form-control" type="text" name="txt_billing_addr1" required=""
                                placeholder="Địa chỉ *" value="<?php echo $thongTinUs[0]->diaChi?>">
                        </div>
                        <div class="form-group">
                            <label for="diaChi">Mã hóa đơn:</label>
                            <input class="form-control" id="order_id" name="order_id" type="text"
                                value="<?php echo date("YmdHis") ?>" readonly />
                        </div>
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="amount">Số tiền</label>-->
                        <!--                            <input class="form-control" id="amount"-->
                        <!--                                   name="amount" type="text" value="--><?php //echo $thanhTien; ?>
                        <!--" readonly>-->
                        <!--                            -->
                        <!--                        </div>-->
                        <input class="form-control" name="amount" type="hidden" value="<?php echo $thanhTien?>">
                        <!-- Không cần quan tâm -->
                        <!-- Loại hàng hóa -->
                        <input type="hidden" name="order_type" id="order_type" class="form-control" value="billpayment">
                        <!-- Ngân hàng mặc định chọn không -->
                        <input type="hidden" name="bank_code" id="bank_code" class="form-control" value="">
                        <!-- Ngôn ngữ -->
                        <input type="hidden" name="language" id="language" class="form-control" value="vn">
                        <!-- Thời hạn thanh toán -->
                        <input class="form-control" id="txtexpire" name="txtexpire" type="hidden"
                            value="<?php echo $expire; ?>" />
                        <!-- Thời hạn thanh toán -->
                        <!-- quan tâm -->
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="order_id">Mã hóa đơn</label>-->
                        <!--                            <input class="form-control" id="order_id" name="order_id" type="text" value="--><?php //echo date("YmdHis") ?>
                        <!--"/>-->
                        <!--                        </div>-->
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="amount">Số tiền</label>-->
                        <!--                            <input class="form-control" id="amount"-->
                        <!--                                   name="amount" type="number" value="10000"/>-->
                        <!--                        </div>-->
                        <input type="hidden" name="order_desc" value="Nội dung thanh toán">
                        <!--                        <div class="form-group">-->
                        <!--                            <label for="order_desc">Nội dung thanh toán</label>-->
                        <!--                            <textarea class="form-control" cols="20" id="order_desc" name="order_desc" rows="2">Noi dung thanh toan</textarea>-->
                        <!--                        </div>-->
                        <!-- Thông tin hóa đơn (Billing) không cần quan tâm-->
                        <!--                        <input class="form-control" id="txt_billing_fullname"-->
                        <!--                               name="txt_billing_fullname" type="hidden" value="NGUYEN VAN XO"/>-->
                        <input class="form-control" id="txt_billing_email" name="txt_billing_email" type="hidden"
                            value="xonv@vnpay.vn" />
                        <!--                        <input class="form-control" id="txt_billing_mobile"-->
                        <!--                               name="txt_billing_mobile" type="hidden" value="0934998386"/>-->
                        <!--                        <input class="form-control" id="txt_billing_addr1"-->
                        <!--                               name="txt_billing_addr1" type="hidden" value="22 Lang Ha"/>-->
                        <input class="form-control" id="txt_postalcode" name="txt_postalcode" type="hidden"
                            value="100000" />
                        <input class="form-control" id="txt_bill_city" name="txt_bill_city" type="hidden"
                            value="Hà Nội" />
                        <input class="form-control" id="txt_bill_country" name="txt_bill_country" type="hidden"
                            value="VN" />
                        <!-- Thông tin gửi Hóa đơn điện tử (Invoice) -->
                        <input class="form-control" id="txt_inv_customer" name="txt_inv_customer" type="hidden"
                            value="Lê Văn Phổ" />
                        <input class="form-control" id="txt_inv_company" name="txt_inv_company" type="hidden"
                            value="Công ty Cổ phần giải pháp Thanh toán Việt Nam" />
                        <input class="form-control" id="txt_inv_addr1" name="txt_inv_addr1" type="hidden"
                            value="22 Láng Hạ, Phường Láng Hạ, Quận Đống Đa, TP Hà Nội" />
                        <input class="form-control" id="txt_inv_taxcode" name="txt_inv_taxcode" type="hidden"
                            value="0102182292" />
                        <input type="hidden" name="cbo_inv_type" id="cbo_inv_type" class="form-control" value="I">
                        <input class="form-control" id="txt_inv_email" name="txt_inv_email" type="hidden"
                            value="pholv@vnpay.vn" />
                        <input class="form-control" id="txt_inv_mobile" name="txt_inv_mobile" type="hidden"
                            value="02437764668" />


                        <div class="payment_method">
                            <div class="mb-25">
                                <h5>Phương thức thanh toán</h5>
                            </div>
                        </div>
                        <button type="submit" name="redirect" id="redirect" class="btn btn-default">Thanh toán
                            vnpay</button>
                    </form>
                    <br>
                    <form action="<?php if (isset($giaGoc)){echo 'index.php?controller=thanhToanKNH&nd=boTruyen';}else{ echo 'index.php?controller=thanhToanKNH';} ?>" method="post">
                        <input type="hidden" name="so_luong" value="<?php echo $soLuong ?>">
                        <?php if ($soLuong==0 || $soLuong==""){?>
                        <?php }?>
                        <?php if ($soLuong==0){ foreach ($thongTinSp as $sp) {
                                ?>
                        <input type="hidden" name="idsp[]" value="<?php echo $sp->id_san_pham?>">
                        <input type="hidden" name="soLuong[]" value="<?php echo $sp->so_luong?>">
                        <?php }}else if ($soLuong>0 && !isset($id_bo_truyen)){ ?>
                        <input type="hidden" name="idsp" value="<?php echo $thongTinSp[0]->id_san_pham?>">
                        <?php }else if($soLuong>0 && isset($id_bo_truyen)){ ?>
                            <input type="hidden" name="idbt" value="<?php echo $thongTinBT[0]->id?>">
                            <?php foreach ($thongTinSp as $sp) {?>
                            <input type="hidden" name="idsp[]" value="<?php echo $sp->id_san_pham?>">
                        <?php }} ?>
                        <input class="form-control" id="order_id" name="order_id" type="hidden"
                            value="<?php echo date("YmdHis") ?>" readonly />
                        <input class="form-control" name="amount" type="hidden" value="<?php echo $thanhTien?>">

                        <button type="submit" class="btn btn-primary" id="btnPopup">Thanh toán khi nhận hàng</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="order_review">
                        <div class="mb-20">
                            <h4>Thông tin sản phẩm</h4>
                        </div>
                        <div class="table-responsive order_table text-center">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Sản phẩm</th>
                                        <th>Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($thongTinSp as $sp) { ?>
                                    <tr>
                                        <td class="image product-thumbnail"><img
                                                src="assets/imgs/shop/<?php echo $sp->hinh_anh?>" alt="#"></td>
                                        <td>
                                            <h5><a
                                                    href="index.php?controller=sanPham_view&id=<?php echo $sp->id_san_pham ?>&loai=<?php echo $sp->id_loai_san_pham ?>&botruyen=<?php echo $sp->id_bo_truyen ?>"><?php echo $sp->ten_san_pham?></a>
                                            </h5>
                                            <span
                                                class="product-qty">x<?php if ($soLuong==0 && $soLuong=="")
                                                { echo $soLuong;}else{ if ($soLuong==0 ){echo $sp->so_luong;}else{echo $soLuong;}} ?></span>
                                        </td>
                                        <td><?php echo  number_format($sp->gia_ban, 0, ',', '.') ?> VND</td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>Phí giao hàng</th>
                                        <td colspan="2"><em>Miễn phí</em></td>
                                    </tr>
                                    <tr>
                                        <th>Thành tiền</th>
                                        <td colspan="2" class="product-subtotal"><span
                                                class="font-xl text-brand fw-900"><?php echo number_format($thanhTien, 0, ',', '.')?>
                                                VND<p style="color: black"><?php if (isset($giaGoc)){ echo "(<s>".$giaGoc." VND</s>)";} ?></p></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="bt-1 border-color-1 mt-30 mb-30"></div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once 'views/layout/user/Footer.php'; ?>