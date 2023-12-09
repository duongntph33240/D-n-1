<?php
include_once 'models/NhaPhatHanh.php';
include_once 'DAO/ConnectDAO.php';
class NhaPhatHanhDAO extends BaseDAO
{
    // kết nối database

    // thêm mới bộ truyện
    public function add($ten)
    {
        $sql = "INSERT INTO `nha_phat_hanh`(`ten_nha_phat_hanh`) VALUES ('$ten');";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // lấy danh sách bộ truyện
    public function show()
    {
        $sql = "SELECT nha_phat_hanh.*, COUNT(san_pham.id_san_pham) AS so_luong_sach
        FROM nha_phat_hanh
        LEFT JOIN san_pham ON nha_phat_hanh.id_nha_phat_hanh = san_pham.id_nha_phat_hanh
        GROUP BY nha_phat_hanh.id_nha_phat_hanh;";

        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new NhaPhatHanh($row['id_nha_phat_hanh'], $row['ten_nha_phat_hanh'], $row['trang_thai'], $row['so_luong_sach']);
            $lists[] = $product;
        }

        return $lists;
    }
    // xoá bộ truyện
    public function remove($id)
    {
        $sql = "UPDATE `nha_phat_hanh` SET `trang_thai`= 0 WHERE id_nha_phat_hanh = $id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // lấy thông tin 1 bộ truyện theo id
    public function showOne($id)
    {
        $sql = "SELECT * FROM `nha_phat_hanh` WHERE id_nha_phat_hanh =$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new NhaPhatHanh($row['id_nha_phat_hanh'], $row['ten_nha_phat_hanh'], $row['trang_thai'], 0);
            $lists[] = $product;
        }
        return $lists;
    }
    // sửa bộ truyên
    public function update($id, $name, $trang_thai)
    {
        $sql = "UPDATE `nha_phat_hanh` SET `ten_nha_phat_hanh`='$name',`trang_thai`='$trang_thai' WHERE  id_nha_phat_hanh = $id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
