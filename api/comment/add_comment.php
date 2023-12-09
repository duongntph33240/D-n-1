<?php

include_once('../../controllers/BinhLuanControllerAPI.php');
// session_start(); // You need to start the session to access $_SESSION variables.

// $id = $_SESSION['id'];

// //
// // Nhận dữ liệu từ phía front-end
$data = json_decode(file_get_contents("php://input"));
$BinhLuan = new BinhLuanControllerAPI();
$a = $BinhLuan->add($data->id, $data->comment);
echo json_encode(['result' => $a]);
// $sql = "INSERT INTO `binh_luan`( `id_user`, `id_san_pham`, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia`) VALUES ('$id','$data->id','$data->comment','$time','5')";
// $stmt = $this->PDO->prepare($sql);
// $stmt->execute();