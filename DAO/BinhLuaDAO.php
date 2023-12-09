<?php
include_once('models/BinhLuan.php');
include_once 'DAO/ConnectDAO.php';
class BinhLuanDAO extends BaseDAO
{
    // lấy dữ liệu toàn bộ tác giả trên data base
    public function show()
    {
        $sql = "SELECT `id_binh_luan`, users.ten,users.anh, san_pham.ten_san_pham, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia` FROM `binh_luan` JOIN san_pham ON san_pham.id_san_pham = binh_luan.id_san_pham join users on users.id_user=binh_luan.id_user ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new BinhLuan($row['id_binh_luan'], $row['ten'], $row['ten_san_pham'], $row['noi_dung_binh_luan'], $row['ngay_binh_luan'], $row['anh'], $row['danh_gia']);
            $users[] = $user;
        }

        return $users;
    }
    // lấy dữ liệu bình luận cụ thể của sản phẩm
    public function showOne($id)
    {
        $sql = "SELECT `id_binh_luan`, users.ten,users.anh, san_pham.ten_san_pham, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia` FROM `binh_luan` JOIN san_pham ON san_pham.id_san_pham = binh_luan.id_san_pham join users on users.id_user=binh_luan.id_user Where binh_luan.id_san_pham = $id  ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new BinhLuan($row['id_binh_luan'], $row['ten'], $row['ten_san_pham'], $row['noi_dung_binh_luan'], $row['ngay_binh_luan'], $row['anh'], $row['danh_gia']);
            $users[] = $user;
        }

        return $users;
    }
    public function showOne_star($id)
    {
        $sql = "SELECT g.gia_tri, COALESCE(COUNT(b.danh_gia), 0) AS so_luong
        FROM (
            SELECT 1 AS gia_tri
            UNION SELECT 2 AS gia_tri
            UNION SELECT 3 AS gia_tri
            UNION SELECT 4 AS gia_tri
            UNION SELECT 5 AS gia_tri
        ) g
        LEFT JOIN binh_luan b ON g.gia_tri = b.danh_gia AND b.id_san_pham = $id
        GROUP BY g.gia_tri;
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $start = $stmt->fetchAll();
        return $start;
    }
    // lệnh thêm mới tác giả
    public function add($idpro, $iduser, $time, $mes)
    {
        $sql = "INSERT INTO `binh_luan`( `id_user`, `id_san_pham`, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia`) VALUES ('$iduser','$idpro','$mes','$time','5')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // xoá bình luận
    public function delete($id)
    {
        $sql = "DELETE FROM `binh_luan` WHERE  `id_binh_luan`=$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
