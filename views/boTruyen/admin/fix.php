<?php include "views/layout/admin/Header.php";
?><style>
/* CSS để thay đổi kích thước của phần tử khi hover */
p:hover {
    cursor: pointer;
    color: #4e73df;
}
</style>
<div class="container">
    <div class=" text">
        Thêm Bộ truyện
    </div>
    <form action="index.php?controller=boTruyen_fix" method="post" enctype="multipart/form-data"
        style="min-height: 500px;">
        <?php foreach ($list as $key => $vl) {

        ?>
        <input type="hidden" name="id" value="<?php echo $vl->id ?>">
        <div class=" form-row">
            <div class="input-data">
                <input type="text" name="ten" value="<?php echo $vl->ten ?>" required>
                <div class="underline"></div>
                <label for="">Tên bộ truyện</label>
            </div>
        </div>
        <div class=" form-row">
            <div class="input-data">
                <input type="number" name="giaban" value="<?php echo $vl->gia_ban ?>" required>
                <div class="underline"></div>
                <label for="">Giá bán</label>
            </div>
        </div>
        <div class=" form-row">
            <div class="input-data">
                <input type="number" name="giagoc" value="<?php echo $vl->gia_goc ?>" required>
                <div class="underline"></div>
                <label for="">Giá gốc</label>
            </div>
        </div>
        <label for="">Mô tả</label>
        <div class="input-data">
            <textarea name="mota" id="" cols="30" rows="5" style="width: 100%;"></textarea>
        </div>
        <div class=" form-row">
            <div class="input-data">
                <select name="loai" id="">
                    <?php foreach ($loai as $key => $value) {
                            if ($value->id == $vl->loai) {
                        ?>
                    <option value="<?php echo $vl->loai ?>"><?php echo $value->ten ?></option>
                    <?php
                            }
                        }
                        ?>
                    <?php foreach ($loai as $key => $value) {
                            if ($value->id != $vl->loai) {
                        ?>
                    <option value="<?php echo $value->id ?>"><?php echo $value->ten ?></option>
                    <?php
                            }
                        }
                        ?>
                </select>
                <!-- <div class="underline"></div> -->
                <label for="">Loại truyện</label>
            </div>
        </div>
        <img src="assets/imgs/shop/<?php echo $vl->img ?>" width="10%" alt="">
        <div class=" form-row">
            <div class="input-data">
                <input type="file" name="img">
                <div class="underline"></div>
            </div>
        </div>
        <div class=" form-row">
            <div class="input-data">
                <select name="trang_thai" id="">
                    <?php if ($vl->trang_thai == 1) {
                        ?>
                    <option value="1">Hoạt động</option>
                    <option value="0">Dừng hoạt động</option>
                    <?php
                        } else {
                        ?>
                    <option value="0">Dừng hoạt động</option>
                    <option value="1">Hoạt động</option>
                    <?php
                        } ?>
                </select>
                <div class="underline"></div>
                <label for="">Trạng thái</label>
            </div>
        </div>
        <?php } ?>
        <div class="form-row">
            <h3 style="">Sản phẩm</h3>
        </div>
        <div class="form-row " id="list">
            <?php
            foreach ($bo as $key => $vl) { ?>
            <div class="show1">
                <div>
                    <label for="">Tên sản phẩm</label> <br>
                    <input type="text" name="<?php echo $vl->ten_san_pham ?>" value="<?php echo $vl->ten_san_pham ?>"
                        id="">
                </div>
                <div>
                    <label for="">Giá bán</label> <br>
                    <input type="text" name="<?php echo $vl->gia_ban ?>" value="<?php echo $vl->gia_ban ?>" id="">
                </div>
                <div>
                    <label for="">Giá gốc</label> <br>
                    <input type="text" name="<?php echo $vl->gia_goc ?>" value="<?php echo $vl->gia_goc ?>" id="">
                </div>
                <div>
                    <label for="">Số lượng</label> <br>
                    <input type="text" name="<?php echo $vl->so_luong ?>" value="<?php echo $vl->so_luong ?>" id="">
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="form-row show1">
            <div>

                <p onclick="add()" style="font-size: 40px;">+</p>

            </div>
        </div>
        <div class="form-row">
            <div class="input-data textarea">
                <div class="form-row submit-btn">
                    <div class="input-data">
                        <div class="inner"></div>
                        <input type="submit" value="submit">
                    </div>
                </div>
            </div>
    </form>
</div>
<script>
<?php
    // Chuyển đổi dữ liệu PHP thành chuỗi JSON
    $json_data = json_encode($san_pham);
    ?>
var list = <?php echo $json_data; ?>;
// Xác định đối tượng div mà bạn muốn append HTML vào
var container = document.getElementById("list");
count = 0;
// Dữ liệu mẫu (thay thế bằng dữ liệu thực nếu cần)
function add() {
    var div = document.createElement("div");
    // Tạo các phần tử HTML và thiết lập thuộc tính
    var label1 = document.createElement("label");
    label1.textContent = "Tên sản phẩm";
    var input1 = document.createElement("select");
    input1.type = "text";
    input1.name = 'add_pro[]'
    var name_pro = document.getElementsByName("add_pro[]");
    // Tạo các tùy chọn cho thẻ select
    var option1 = document.createElement("option");
    option1.value = "0";
    option1.text = "Option 1";
    input1.add(option1);
    if (count == 0) {
        list.forEach(element => {
            var option = document.createElement("option");
            option.value = element.id_san_pham;
            option.text = element.ten_san_pham;
            input1.add(option);
        });
        count++;
    } else {
        list.forEach(element => {
            var option = document.createElement("option");
            option.value = element.id_san_pham;
            option.text = element.ten_san_pham;
            input1.add(option);
        });
        count++;
        name_pro.forEach(function(element) {
            var value = element.value;
            list.forEach(element => {
                if (element.id_san_pham != value) {
                    for (var i = 0; i < input1.options.length; i++) {
                        if (input1.options[i].value === value) {
                            input1.remove(i);
                            break; // Kết thúc vòng lặp sau khi xóa
                        }
                    }
                }
            });


        });
    }


    // Thêm sự kiện "change" cho thẻ select
    input1.addEventListener("change", function() {
        // Khi giá trị được chọn thay đổi, lấy giá trị và hiển thị trong console
        list.forEach(element => {
            var selectedValue = input1.value;

            if (element.id_san_pham == selectedValue) {

                input2.value = element.gia_ban;
                input3.value = element.gia_goc;
                input4.value = element.so_luong;

            }
            if (0 == selectedValue) {

                input2.value = "";
                input3.value = "";
                input4.value = "";
            }
        });
        // Thực hiện các bước tiếp theo tùy thuộc vào yêu cầu của bạn
    });
    // Thêm các tùy chọn vào thẻ select
    var div1 = document.createElement("div");
    input1.style.width = "200px";
    var label2 = document.createElement("label");
    label2.textContent = "Giá bán";
    var input2 = document.createElement("input");
    input2.type = "number";
    input2.name = "add_gia_ban[]";
    var div2 = document.createElement("div");

    var label3 = document.createElement("label");
    label3.textContent = "Giá gốc";

    var input3 = document.createElement("input");
    input3.type = "number";
    input2.name = "add_gia_goc[]";
    var div3 = document.createElement("div");

    var label4 = document.createElement("label");
    label4.textContent = "Số lượng";

    var input4 = document.createElement("input");
    input4.type = "number";
    input2.name = "add_so_luong[]";
    var div4 = document.createElement("div");

    var box = document.createElement("div");
    div.classList.add("show1");
    // Append các phần tử vào div
    div1.appendChild(label1);
    div1.appendChild(document.createElement("br"));
    div1.appendChild(input1);

    div.appendChild(div1);

    div2.appendChild(label2);
    div2.appendChild(document.createElement("br"));
    div2.appendChild(input2);

    div.appendChild(div2);

    div3.appendChild(label3);
    div3.appendChild(document.createElement("br"));
    div3.appendChild(input3);

    div.appendChild(div3);

    div4.appendChild(label4);
    div4.appendChild(document.createElement("br"));
    div4.appendChild(input4);

    div.appendChild(div4);
    // Append div vào container
    box.appendChild(div);
    container.appendChild(div)
}
</script>
<!-- End of Main Content -->
<?php include "views/layout/admin/Footer.php"; ?>