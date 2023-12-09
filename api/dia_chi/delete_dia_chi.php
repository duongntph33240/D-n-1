<?php
include_once "../../controllers/TaiKhoanControllerAPI.php";
$add_dia_chi = new TaiKhoanControllerAPI();

// Nhận dữ liệu từ phía front-end
$data = json_decode(file_get_contents("php://input"));
$result = $add_dia_chi->delete($data->id);
