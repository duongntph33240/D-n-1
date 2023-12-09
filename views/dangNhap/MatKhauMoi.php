<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <h3>
        <?php if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
        } ?>
    </h3>
    <div class="container" id="container" style="text-align: center">
        <h4>Đặt lại mật khẩu</h4>
        <form action="index.php?controller=quenMatKhau&datLaiMatKhau" method="post" onsubmit="return checkPass()">
            <label for="mk1">Nhập mật khẩu mới:</label>
            <input type="password" name="mk1" id="mk1" required>
            <label for="mk2">Nhập lại mật khẩu mới:</label>
            <input type="password" name="mk2" id="mk2" required>
            <input type="hidden" name="email" value="<?php echo $email ?>" required>
            <input type="hidden" name="id" value="<?php echo $id ?>" required>
            <input type="submit" value="Gửi">
            <a href="index.php?controller=dangNhap">Trở về lại trang đăng nhập</a>
        </form>
    </div>
</body>

<script>
function checkPass() {
    var password1 = document.getElementById('mk1').value;
    var password2 = document.getElementById('mk2').value;

    if (password1 !== password2) {
        alert('Mật khẩu không khớp. Vui lòng nhập lại.');
        return false;
    }

    // Additional password strength checks can be added here if needed

    return true;
}
</script>

</html>