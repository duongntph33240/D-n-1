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
    <?php
    session_destroy();
    ?>
</head>

<body>
    <h3 id="error">
        <?php if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
        } ?>
    </h3>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="index.php?controller=dangKy" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" name="name" placeholder="Name" />
                <input type="email" id="email" name="email" onblur="checkEmail()" placeholder="Email" required />
                <input type="password" name="password" placeholder="Password" required />
                <button id="done_Signup">Sign Up</button>
                <button id="error_Signup" style="display: none;" disabled>Sign Up</button>

            </form>

        </div>
        <div class="form-container sign-in-container">
            <form action="index.php?controller=dangNhap" method="post">
                <h1>Sign in</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" name="email" <?php
                                                    if (isset($_SESSION['username'])) {
                                                        echo 'value="' . $_SESSION['username'] . '"';
                                                    }
                                                    ?> placeholder="Email" />
                <input type="password" name="password" <?php
                                                        if (isset($_SESSION['password'])) {
                                                            echo 'value="' . $_SESSION['password'] . '"';
                                                        }
                                                        ?> placeholder="Password" />
                <a href="index.php?controller=quenMatKhau">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script>
function checkEmail() {

    // Lấy thông tin sản phẩm
    var productInfo = {
        email: document.getElementById('email').value,
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
                    document.getElementById('error').innerHTML = "Email đã tồn tại"
                    document.getElementById('done_Signup').style.display = "none"
                    document.getElementById('error_Signup').style.display = "block"
                } else {
                    checktontai();
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

function checktontai() {
    // Lấy thông tin sản phẩm
    var productInfo = {
        email: document.getElementById('email').value,
        // Thêm thông tin khác nếu cần thiết
    };

    // Sử dụng AJAX để gửi dữ liệu đến máy chủ
    var xhl = new XMLHttpRequest();
    xhl.open("POST", "api/check_email/check_ton_tai.php", true);
    xhl.setRequestHeader("Content-Type", "application/json");

    xhl.onreadystatechange = function() {
        if (xhl.readyState === 4) {
            if (xhl.status === 200) {
                // Xử lý kết quả từ máy chủ nếu cần
                if (xhl.responseText > 0) {
                    document.getElementById('error').innerHTML = "Email không có thật"
                    document.getElementById('done_Signup').style.display = "none"
                    document.getElementById('error_Signup').style.display = "block"
                } else {
                    document.getElementById('error').innerHTML = "Email hợp lệ"
                    document.getElementById('done_Signup').style.display = "block"
                    document.getElementById('error_Signup').style.display = "none"
                }

                // Cập nhật nội dung thẻ có id là "card" với dữ liệu từ máy chủ
            } else {
                // Xử lý lỗi nếu có
                alert("Có lỗi xảy ra");
            }
        }
    };

    // Chuyển đổi object thành JSON và gửi đi
    xhl.send(JSON.stringify(productInfo));
}
</script>
<script src="assets/js/login/js.js">
</script>