<?php
include_once('models/TacGia.php');
include_once 'DAO/ConnectDAO.php';
class TacGiaDAO extends BaseDAO
{
    // kết nối database

    // lấy dữ liệu toàn bộ tác giả trên data base
    public function show()
    {
        $sql = "SELECT tac_gia.*, COUNT(san_pham.id_san_pham) AS so_luong_sach
        FROM tac_gia
        LEFT JOIN san_pham ON tac_gia.id_tac_gia = san_pham.id_tac_gia
        GROUP BY tac_gia.id_tac_gia;";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new TacGia(
                $row['id_tac_gia'],
                $row['ten_tac_gia'],
                $row['so_luong_sach'],
                $row['trang_thai'],
            );

            $users[] = $user;
        }

        return $users;
    }
    // lệnh thêm mới tác giả
    public function add($name)
    {
        $sql = "INSERT INTO `tac_gia`( `ten_tac_gia`) VALUES ('$name')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // xoá tác giả
    public function delete($id)
    {
        $sql = "UPDATE `tac_gia` SET `trang_thai`=0 WHERE  `id_tac_gia`=$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // lấy dữ liệu của tác giả cụ thế
    public function showOne($id)
    {
        $sql = "SELECT tac_gia.*, COUNT(san_pham.id_san_pham) AS so_luong_sach
        FROM tac_gia
        LEFT JOIN san_pham ON tac_gia.id_tac_gia = san_pham.id_tac_gia
        WHERE tac_gia.id_tac_gia=$id
        GROUP BY tac_gia.id_tac_gia;";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new TacGia(
                $row['id_tac_gia'],
                $row['ten_tac_gia'],
                $row['so_luong_sach'],
                $row['trang_thai'],
            );

            $users[] = $user;
        }

        return $users;
    }
    // sửa thông tin user
    public function fix($id, $name, $trang_thai)
    {
        $sql = "UPDATE `tac_gia` SET `ten_tac_gia`='$name',`trang_thai`='$trang_thai'WHERE`id_tac_gia`=$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
