<?php
include_once('models/Taikhoan.php');
include_once 'DAO/ConnectDAO.php';
class TaiKhoanDAO extends BaseDAO
{
    // kết nối database

    // lấy dữ liệu toàn bộ tài khoản trên data base
    public function show()
    {
        $sql = "SELECT users.id_user,ten,email,users.trang_thai,quyen.ten_quyen FROM `users` JOIN quyen ON users.id_quyen=quyen.id_quyen WHERE 1 group BY users.id_user";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new TaiKhoan(
                $row['id_user'],
                $row['ten'],
                $row['email'],
                $row['ten_quyen'],
                $row['trang_thai'],
            );

            $users[] = $user;
        }

        return $users;
    }
    // lấy địa chỉ
    public function show_dia_chi($id)
    {
        $sql = "SELECT * FROM `dia_chi` WHERE id_user = $id ORDER BY trang_thai DESC";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new listDiaChi(
                $row['id_dia_chi'],
                $row['dia_chi'],
                $row['trang_thai']
            );

            $users[] = $user;
        }

        return $users;
    }
    // infor user
    public function showInfor($id)
    {
        $sql = "SELECT `id_user`, `email`, `mat_khau`, `sdt`, `ten`, `anh` FROM `users` WHERE `id_user`=$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new infor(
                $row['id_user'],
                $row['ten'],
                $row['email'],
                $row['mat_khau'],
                $row['sdt'],
                $row['anh']
            );

            $users[] = $user;
        }

        return $users;
    }
    public function showEmail($email)
    {
        $sql = "SELECT `id_user`, `email`, `mat_khau`, `sdt`, `ten`, `anh` FROM `users` WHERE `email`='$email'";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new infor(
                $row['id_user'],
                $row['ten'],
                $row['email'],
                $row['mat_khau'],
                $row['sdt'],
                $row['anh']
            );

            $users[] = $user;
        }

        return $users;
    }
    public function checkUS($email,$id_user)
    {
        $sql = "SELECT `id_user`, `email`, `mat_khau`, `sdt`, `ten`, `anh` FROM `users` WHERE `email` = '$email' AND `id_user` = $id_user";
        $stmt = $this->PDO->prepare($sql);

        $stmt->execute();
        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new infor(
                $row['id_user'],
                $row['ten'],
                $row['email'],
                $row['mat_khau'],
                $row['sdt'],
                $row['anh']
            );

            $users[] = $user;
        }

        return $users;
    }
    // lấy danh sách quyền hạn của trang web
    public function showRole()
    {
        $sql = "SELECT * FROM `quyen` WHERE trang_thai=1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $roles = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $role = new role(
                $row['id_quyen'],
                $row['ten_quyen']
            );

            $roles[] = $role;
        }

        return $roles;
    }
    // lệnh thêm mới tài khoản
    public function add($name, $email, $password, $quyen)
    {
        $sql = "INSERT INTO `users`(`email`, `mat_khau`, `ten`,`id_quyen`) VALUES ('$email','$password','$name',$quyen)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // xoá tài khoản
    public function delete($id)
    {
        $sql = "UPDATE `users` SET `trang_thai`=0 WHERE `id_user`=$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // lấy dữ liệu của tài khoản cụ thế
    public function showOne($id)
    {
        $sql = "SELECT users.id_user,ten,email,users.trang_thai,quyen.ten_quyen FROM `users` JOIN quyen ON users.id_quyen=quyen.id_quyen WHERE `id_user`=$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new TaiKhoan(
                $row['id_user'],
                $row['ten'],
                $row['email'],
                $row['ten_quyen'],
                $row['trang_thai'],
            );

            $users[] = $user;
        }

        return $users;
    }
    // sửa thông tin user
    public function fix($id, $name, $email,  $quyen, $trang_thai)
    {
        $sql = "UPDATE `users` SET `email`='$email',`ten`='$name',`id_quyen`=$quyen,`trang_thai`=$trang_thai WHERE`id_user`=$id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function getUsID($id)
    {
        $sql = "SELECT * FROM `users` INNER JOIN dia_chi ON users.id_user = dia_chi.id_user  WHERE dia_chi.trang_thai = 1 AND users.id_user = " . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new DiaChi(
                $row['ten'],
                $row['sdt'],
                $row['dia_chi']
            );
            $users[] = $user;
        }

        return $users;
    }
    public function updateMK($MatKhau,$email){
        $sql = "UPDATE `users` SET `mat_khau`='$MatKhau' WHERE email = '$email'";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
}
