<?php include_once 'views/layout/user/Header.php'; ?>
<style>
.star-rating {
    display: flex;
    flex-direction: row-reverse;
}

td input[type="radio"] {
    display: none;
}

td label {
    display: inline-block;
    cursor: pointer;
}

td label:before {
    content: '\2605';
    /* Unicode character for a star */
    font-size: 30px;
    color: #ccc;
    /* Default color for a star */
}

td input[type="radio"]:checked~label:before {
    color: #ffd700;
    /* Yellow color for a selected star */
}
</style>

<main class="main">
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4>Thông tin hóa đơn</h4>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="fname">Họ và tên:</label>
                            <input class="form-control" type="text" required="" name="txt_billing_fullname"
                                placeholder="Họ và tên *" value="<?php echo $thongTinUs[0]->ten ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="sdt">Số điện thoại:</label>
                            <input class="form-control" required="" type="text" name="txt_billing_mobile"
                                placeholder="Số điện thoại *" value="<?php echo $thongTinUs[0]->sdt ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="diaChi">Địa chỉ:</label>
                            <input class="form-control" type="text" name="txt_billing_addr1" required=""
                                placeholder="Địa chỉ *" value="<?php echo $thongTinUs[0]->dia_chi ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="diaChi">Mã hóa đơn:</label>
                            <input class="form-control" id="order_id" name="order_id" type="text"
                                value="<?php echo $thongTinUs[0]->ma_don ?>" readonly />
                        </div>
                        <input class="form-control" name="amount" type="hidden" value="<?php echo $thanhTien ?>">
                        <!-- Thời hạn thanh toán -->
                        <div class="form-group">
                            <label for="diaChi">Ngày đặt hàng:</label>
                            <input class="form-control" id="order_id" name="order_id" type="text"
                                value="<?php echo $thongTinUs[0]->thoi_gian ?>" readonly />
                        </div>

                        <div class="form-group">
                            <label for="diaChi">Phương thức thanh toán:</label>
                            <input class="form-control" id="order_id" name="order_id" type="text"
                                value="<?php echo $thongTinUs[0]->phung_thuc ?>" readonly />
                        </div>

                        <br>
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
                                    <?php
                                    $thanhTien = 0;
                                    foreach ($thongTinSp as $key => $sp) {
                                        if ($sp->trang_thai == 3) {
                                    ?>
                                    <tr>
                                        <td class="image product-thumbnail"><img
                                                src="assets/imgs/shop/<?php echo $sp->hinh_anh ?>" alt="#"></td>
                                        <td>
                                            <h5><a
                                                    href="index.php?controller=sanPham_view&id=<?php echo $sp->id_san_pham ?>&loai=<?php echo $sp->id_loai_san_pham ?>&botruyen=<?php echo $sp->id_bo_truyen ?>"><?php echo $sp->ten_san_pham ?></a>
                                                <span class="product-qty">x<?php echo $sp->so_luong; ?></span>
                                            </h5>
                                        </td>
                                        <td><?php echo  number_format($sp->gia, 0, ',', '.') ?> VND</td>
                                    </tr>
                                    <tr>
                                        <td>
                                        <td style="display: flex;justify-content: space-between; align-items: center;"
                                            id="b<?php echo $sp->id_san_pham ?>">
                                            <?php
                                                    for ($i = 5; $i >= 1; $i--) {
                                                        $radioId = "star{$i}_{$sp->id_san_pham}"; // Dynamic id
                                                        $radioName = "rating_{$sp->id_san_pham}"; // Dynamic name
                                                    ?>
                                            <input type="radio" id="<?php echo $radioId ?>"
                                                name="<?php echo $radioName ?>" value="<?php echo $i ?>" /><br> <br>
                                            <label for="<?php echo $radioId ?>"><?php echo $i ?> Sao</label>

                                            <?php
                                                    }
                                                    ?>
                                        </td>
                                        </td>
                                        <td id="a<?php echo $sp->id_san_pham ?>"><button class="btn-danh-gia"
                                                data-index="<?php echo $sp->id_san_pham ?>">Đánh
                                                giá</button></td>
                                    </tr>
                                    <?php
                                            $thanhTien += $sp->so_luong * $sp->gia;
                                        } else { ?>
                                    <tr>
                                        <td class="image product-thumbnail"><img
                                                src="assets/imgs/shop/<?php echo $sp->hinh_anh ?>" alt="#"></td>
                                        <td>
                                            <h5><a
                                                    href="index.php?controller=sanPham_view&id=<?php echo $sp->id_san_pham ?>&loai=<?php echo $sp->id_loai_san_pham ?>&botruyen=<?php echo $sp->id_bo_truyen ?>"><?php echo $sp->ten_san_pham ?></a>
                                                <span class="product-qty">x<?php echo $sp->so_luong; ?></span>
                                            </h5>

                                        </td>
                                        <td><?php echo  number_format($sp->gia, 0, ',', '.') ?> VND</td>
                                    </tr>
                                    <?php $thanhTien += $sp->so_luong * $sp->gia;
                                        }
                                    } ?>
                                    <tr>
                                        <th>Phí giao hàng</th>
                                        <td colspan="2"><em>Miễn phí</em></td>
                                    </tr>
                                    <tr>
                                        <th>Thành tiền</th>
                                        <td colspan="2" class="product-subtotal"><span
                                                class="font-xl text-brand fw-900"><?php echo number_format($thanhTien, 0, ',', '.') ?>
                                                VND</span></td>
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
<script>
document.addEventListener("DOMContentLoaded", function() {
    var danhGiaBtns = document.querySelectorAll(".btn-danh-gia");

    danhGiaBtns.forEach(function(btn) {
        btn.addEventListener("click", function(event) {
            event.preventDefault(); // Ngăn chặn sự kiện mặc định (tải lại trang)

            var index = btn.getAttribute("data-index");
            var selectedRating = getSelectedRating(index);



            var productInfo = {
                id: index,
                star: selectedRating,
                // Thêm thông tin khác nếu cần thiết
            };

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "api/comment/add_star.php", true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Xử lý kết quả từ máy chủ nếu cần
                        // var response = JSON.parse(xhr.responseText);
                        // Gửi số sao tương ứng - Bạn có thể thay thế dòng này với logic gửi dữ liệu đến server.
                        alert("Đã chọn " + selectedRating + " sao cho sản phẩm có index " +
                            index);
                        id = "b" + index
                        var response = JSON.parse(xhr.responseText);
                        document.getElementById(id).innerHTML = response.result;
                        id = "a" + index
                        document.getElementById(id).innerHTML = "";
                        // Cập nhật nội dung thẻ có id là "card" với dữ liệu từ máy chủ
                    } else {
                        // Xử lý lỗi nếu có
                        alert("Có lỗi xảy ra");
                    }
                }
            };
            // Chuyển đổi object thành JSON và gửi đi
            xhr.send(JSON.stringify(productInfo));
            // Thêm hoặc loại bỏ lớp CSS để làm sao sáng tương ứng
            updateStarStyles(index, selectedRating);
        });
    });

    function getSelectedRating(index) {
        var radioButtons = document.querySelectorAll('input[name="rating_' + index + '"]');
        for (var i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked) {
                return parseInt(radioButtons[i].value);
            }
        }
        return 0; // Trả về 0 nếu không có sao nào được chọn
    }

    function updateStarStyles(index, selectedRating) {
        var stars = document.querySelectorAll('input[name="rating_' + index + '"] + label');

        for (var i = 0; i < stars.length; i++) {
            if (i < selectedRating) {
                stars[i].classList.add('selected');
            } else {
                stars[i].classList.remove('selected');
            }
        }
    }
});
</script>
<?php include_once 'views/layout/user/Footer.php'; ?>