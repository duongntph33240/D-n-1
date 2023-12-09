<?php
include_once 'models/LoaiTruyen.php';
include_once 'DAO/ConnectDAO.php';
class LoaiTruyenDAO extends BaseDAO
{

    // thêm mới loại truyện
    public function add($ten)
    {
        $sql = "INSERT INTO `loai_san_pham`( `ten_loai_san_pham`) VALUES ('$ten');";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // lấy danh sách loại truyện
    public function show()
    {
        $sql = "SELECT loai_san_pham.*, COUNT(san_pham.id_san_pham) AS so_luong_sach
        FROM loai_san_pham
        LEFT JOIN bo_truyen ON loai_san_pham.id_loai_san_pham = bo_truyen.id_loai_san_pham
        LEFT JOIN chi_tiet_bo_truyen ON chi_tiet_bo_truyen.id_bo_truyen = bo_truyen.id_bo_truyen
        LEFT JOIN san_pham ON san_pham.id_san_pham = chi_tiet_bo_truyen.id_san_pham
        GROUP BY loai_san_pham.id_loai_san_pham;";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new LoaiTruyen($row['id_loai_san_pham'], $row['ten_loai_san_pham'], $row['trang_thai'], $row['so_luong_sach']);
            $lists[] = $product;
        }

        return $lists;
    }
    // xoá loại truyện
    public function remove($id)
    {
        $sql = "UPDATE `loai_san_pham` SET `trang_thai`= 0 WHERE id_loai_san_pham = $id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // lấy thông tin 1 loại truyện theo id
    public function showOne($id)
    {
        $sql = "SELECT * FROM `loai_san_pham` WHERE id_loai_san_pham =$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new LoaiTruyen($row['id_loai_san_pham'], $row['ten_loai_san_pham'], $row['trang_thai'], 0);
            $lists[] = $product;
        }
        return $lists;
    }
    // sửa loại truyên
    public function update($id, $name, $trang_thai)
    {
        $sql = "UPDATE `loai_san_pham` SET `ten_loai_san_pham`='$name',`trang_thai`='$trang_thai' WHERE  id_loai_san_pham = $id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
