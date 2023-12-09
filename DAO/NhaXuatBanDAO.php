<?php
include_once 'models/NhaXuatBan.php';
include_once 'DAO/ConnectDAO.php';
class NhaSanXuatDAO extends BaseDAO
{
    // kết nối database

    // thêm mới bộ truyện
    public function add($ten)
    {
        $sql = " INSERT INTO `nha_san_xuat`(`ten_nha_san_xuat`) VALUES ('$ten');";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // lấy danh sách bộ truyện
    public function show()
    {
        $sql = "SELECT nha_san_xuat.*, COUNT(san_pham.id_san_pham) AS so_luong_sach
        FROM nha_san_xuat
        LEFT JOIN san_pham ON nha_san_xuat.id_nha_san_xuat = san_pham.id_nha_san_xuat
        GROUP BY nha_san_xuat.id_nha_san_xuat;";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new NhaXuatBan($row['id_nha_san_xuat'], $row['ten_nha_san_xuat'], $row['trang_thai'], $row['so_luong_sach']);
            $lists[] = $product;
        }

        return $lists;
    }
    // xoá bộ truyện
    public function remove($id)
    {
        $sql = "UPDATE `nha_san_xuat` SET `trang_thai`= 0 WHERE id_nha_san_xuat = $id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // lấy thông tin 1 bộ truyện theo id
    public function showOne($id)
    {
        $sql = "SELECT * FROM `nha_san_xuat` WHERE id_nha_san_xuat =$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new NhaXuatBan($row['id_nha_san_xuat'], $row['ten_nha_san_xuat'], $row['trang_thai'], 0);
            $lists[] = $product;
        }
        return $lists;
    }
    // sửa bộ truyên
    public function update($id, $name, $trang_thai)
    {
        $sql = "UPDATE `nha_san_xuat` SET `ten_nha_san_xuat`='$name',`trang_thai`='$trang_thai' WHERE  id_nha_san_xuat = $id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
