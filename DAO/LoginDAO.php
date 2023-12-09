<?php
include_once 'models/Login.php';
include_once 'DAO/ConnectDAO.php';
class LoginDAO extends BaseDAO
{
    // kết nối database

    // lệnh kiểm tra thông tin tài khoản trên databasse
    public function Login($username, $password)
    {
        $sql = "SELECT `id_user`, `ten`, `anh`, `id_quyen`, `trang_thai` FROM `users` WHERE  `email`='$username' and `mat_khau`='$password'";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $data = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create an associative array with 'id_u' and 'role' keys
            $userData = new Login($row['id_user'], $row['ten'], $row['id_quyen'], $row['anh'], $row['trang_thai']);
            // Add the user data to the data array
            $data[] = $userData;
        }

        return $data; // Return an array containing 'id_u' and 'role'
    }
    // lệnh tạo mới tài khoản trên data base
    public function signup($name, $email, $password)
    {
        $sql = "INSERT INTO `users`(`email`, `mat_khau`, `ten`) VALUES ('$email','$password','$name')";
        $stmt = $this->PDO->prepare($sql);
        if ($stmt->execute()) {
            $_SESSION['username'] = $email;
            $_SESSION['password'] = $password;
        }
    }
}
