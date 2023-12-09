<?php
include_once "../../controllers/GioHangAPIController.php";
$add_card = new GioHangControllerAPI();

// Nhận dữ liệu từ phía front-end
$data = json_decode(file_get_contents("php://input"));
$result = $add_card->sum($data->id);

// Trả kết quả về phía client
echo json_encode(['result' => $result]);
