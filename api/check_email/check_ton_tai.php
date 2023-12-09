<?php
// Nhận dữ liệu từ phía front-end
$data = json_decode(file_get_contents("php://input"));


$api_key = 'd78f47a0e97a144358fa909f6e50f2cb52357dd4';  // Thay thế bằng khóa API của bạn
$url = "https://api.hunter.io/v2/email-verifier?email=$data->email&api_key=$api_key";

// Sử dụng cURL để gửi yêu cầu đến API
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Phân tích đáp ứng JSON từ API
$result = json_decode($response, true);

// Kiểm tra kết quả
// Kiểm tra kết quả
if ($result['data']['result'] == 'deliverable') {
    echo  0; // Email hợp lệ
} else {
    echo 1; // Email không hợp lệ
}
