<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/login/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="">
</head>
<style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

#container {
    text-align: center;
    background: linear-gradient(to bottom, #3498db, #ffffff);
    /* Use your preferred color codes for blue and white */
    padding: 20px;
    box-sizing: border-box;
}

h2 {
    color: #ffffff;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 10px;
    color: #000;
}

input {
    padding: 10px;
    margin-bottom: 10px;
    width: 100%;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #2ecc71;
    /* Use your preferred color code for green */
    color: #ffffff;
    cursor: pointer;
}

button {
    background-color: #2ecc71;
    /* Use your preferred color code for green */
    color: #ffffff;
    padding: 10px;
    border: none;
    text-decoration: none;
    cursor: pointer;
    display: inline-block;
    margin-top: 20px;
}

button a {
    color: #ffffff;
    text-decoration: none;
}
</style>

<body>
    <h3 id="error">
        <?php if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
        } ?>
    </h3>
    <div class="container" id="container" style="text-align: center">
        <h2>Quên mật khẩu</h2>
        <form action="index.php?controller=quenMatKhau&nhapEmail" method="post">
            <label for="email">Nhập email của bạn tại đây</label>
            <input type="email" id="em" onblur="checkEmail()" name="email" required>
            <input type="submit" value="Gửi">
        </form>
        <button><a href="index.php?controller=dangNhap">Trở về lại trang đăng nhập</a></button>
    </div>
</body>

</html>
<script>
function checkEmail() {
    console.log(document.getElementById('em').value)
    // Lấy thông tin sản phẩm
    var productInfo = {
        email: document.getElementById('em').value,
        // Thêm thông tin khác nếu cần thiết
    };

    // Sử dụng AJAX để gửi dữ liệu đến máy chủ
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "api/check_email/check.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Xử lý kết quả từ máy chủ nếu cần
                if (xhr.responseText > 0) {
                    document.getElementById('error').innerHTML = ""
                    // document.getElementById('done_Signup').style.display = "none"
                    // document.getElementById('error_Signup').style.display = "block"
                } else {
                    document.getElementById('error').innerHTML = "Email không tồn tại"
                }

                // Cập nhật nội dung thẻ có id là "card" với dữ liệu từ máy chủ
            } else {
                // Xử lý lỗi nếu có
                alert("Có lỗi xảy ra");
            }
        }
    };

    // Chuyển đổi object thành JSON và gửi đi
    xhr.send(JSON.stringify(productInfo));
}
</script>