<?php
include_once('../../controllers/DonHangControllerAPI.php');
$DonHangController = new DonHangControllerAPI();
// Nhận dữ liệu từ phía front-end
$data = json_decode(file_get_contents("php://input"));
$result = $DonHangController->showTT($data->id);
// Trả kết quả về phía client
echo json_encode(['result' => $result]);
