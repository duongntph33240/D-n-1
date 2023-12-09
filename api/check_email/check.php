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

// Nhận dữ liệu từ phía front-end
$data = json_decode(file_get_contents("php://input"));

// Sử dụng tham số truyền vào để tránh SQL injection
$sql = "SELECT email FROM users WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $data->email, PDO::PARAM_STR);
$stmt->execute();

$so_luong = $stmt->fetchColumn();
if ($so_luong > 0) {
    echo 1;
} else {
    echo 0;
}
