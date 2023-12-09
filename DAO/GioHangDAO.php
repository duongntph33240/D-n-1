<?php
include_once('models/GioHang.php');
include_once('DAO/ConnectDAO.php');
class GioHangDAO extends BaseDAO
{
    public function show($id)
    {
        $sql = "SELECT gio_hang.id_gio_hang,gio_hang.id_san_pham,san_pham.hinh_anh,san_pham.ten_san_pham,san_pham.gia_ban, gio_hang.so_luong FROM `gio_hang` JOIN san_pham ON gio_hang.id_san_pham = san_pham.id_san_pham WHERE gio_hang.id_user = $id ORDER BY `id_gio_hang` DESC";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new GioHang($row['id_gio_hang'], $row['id_san_pham'], $row['hinh_anh'], $row['ten_san_pham'], $row['so_luong'], $row['gia_ban']);
            $lists[] = $product;
        }
        return $lists;
    }
    public function sum($id)
    {
        $sql = "SELECT COUNT(*) as so_luong FROM `gio_hang` WHERE id_user = $id ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $so_luong = $stmt->fetchColumn();
        if ($so_luong == 0) {
            $so_luong = 0;
        }
        return $so_luong;
    }
    public function delete($id_san_pham)
    {
        $sql = "DELETE FROM `gio_hang` WHERE id_san_pham = " . $id_san_pham;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
