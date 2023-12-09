<?php
$dbHost = 'localhost';
$dbName = 'du_an_1';
$dbUser = 'root';
$dbPass = '';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
 function get_time() {
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $currentTime = time();
    $timestamp = $currentTime;
    return date("Y-m-d H:i:s", $timestamp);
}
function img(){
    if(isset($_FILES["hinh_anh_sp"]) && $_FILES["hinh_anh_sp"]["error"] === UPLOAD_ERR_OK) {
        $target_dir = "assets/imgs/shop/";
        $target_file = $target_dir . basename($_FILES["hinh_anh_sp"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra file ảnh là ảnh thật hay ảnh giả
        $check = getimagesize($_FILES["hinh_anh_sp"]["tmp_name"]);
        if($check === false) {
            throw new Exception("File is not an image.");
        }

        // Kiểm tra kích thước tệp
        if ($_FILES["hinh_anh_sp"]["size"] > 50000000) {
            throw new Exception("Sorry, your file is too large.");
        }

        // Cho phép một số định dạng tệp nhất định
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        // Tạo một tên tệp tin mới mà không bao gồm đường dẫn đầy đủ
        $newFileName = uniqid() . "." . $imageFileType; // trèn thêm dãy số timestap để tránh ảnh cùng tên mà khác hình
        $target_file = $target_dir . $newFileName;

        // Tải tập tin lên
        if (!move_uploaded_file($_FILES["hinh_anh_sp"]["tmp_name"], $target_file)) {
            throw new Exception("Sorry, there was an error uploading your file.");
        }

        return $newFileName;
    } else {
        throw new Exception("No image file uploaded or an error occurred.");
    }
}
function imgKH(){
    if(isset($_FILES["anh"]) && $_FILES["anh"]["error"] === UPLOAD_ERR_OK) {
        $target_dir = "assets/imgs/user/";
        $target_file = $target_dir . basename($_FILES["anh"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Kiểm tra file ảnh là ảnh thật hay ảnh giả
        $check = getimagesize($_FILES["anh"]["tmp_name"]);
        if($check === false) {
            throw new Exception("File is not an image.");
        }

        // Kiểm tra kích thước tệp
        if ($_FILES["anh"]["size"] > 50000000) {
            throw new Exception("Sorry, your file is too large.");
        }

        // Cho phép một số định dạng tệp nhất định
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            throw new Exception("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }

        // Tạo một tên tệp tin mới mà không bao gồm đường dẫn đầy đủ
        $newFileName = uniqid() . "." . $imageFileType; // trèn thêm dãy số timestap để tránh ảnh cùng tên mà khác hình
        $target_file = $target_dir . $newFileName;

        // Tải tập tin lên
        if (!move_uploaded_file($_FILES["anh"]["tmp_name"], $target_file)) {
            throw new Exception("Sorry, there was an error uploading your file.");
        }

        return $newFileName;
    } else {
        throw new Exception("No image file uploaded or an error occurred.");
    }
}