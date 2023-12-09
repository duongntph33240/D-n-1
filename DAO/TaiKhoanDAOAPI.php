<?php
class TaiKhoaDAOAPI
{
    private $pdo;
    public function __construct()
    {
        require_once('../../config/PDO.php');
        $this->pdo = $pdo;
    }
    public function add($test)
    {
        session_start(); // You need to start the session to access $_SESSION variables.

        $id = $_SESSION['id'];


        $sql = "SELECT COUNT(*) FROM `dia_chi` WHERE id_user = $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $so_luong = $stmt->fetchColumn();
        if ($so_luong > 0) {
            $sql = "INSERT INTO `dia_chi` ( `id_user`, `dia_chi`, `trang_thai`) VALUES ( '$id', '$test', '0')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } else {
            $sql = "INSERT INTO `dia_chi` ( `id_user`, `dia_chi`, `trang_thai`) VALUES ( '$id', '$test', '1')";
            $stmt = $this->pdo->prepare($sql);

            $stmt->execute();
        }
    }
    public function update($text)
    {
        session_start(); // You need to start the session to access $_SESSION variables.

        $id = $_SESSION['id'];


        $sql = "UPDATE `dia_chi` SET `trang_thai`='0' WHERE `id_user`='$id'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $sql = "UPDATE `dia_chi` SET `trang_thai`='1' WHERE `id_dia_chi`='$text'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }
    public function delete($id)
    {
        session_start(); // You need to start the session to access $_SESSION variables.


        $sql = "DELETE FROM `dia_chi` WHERE `id_dia_chi`='$id'";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }
    public function show_dia_chi()
    {
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `dia_chi` WHERE id_user = $id ORDER BY trang_thai DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $output = "";
        if ($stmt->rowCount() > 0) {
            $count = 0;
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $count++;
                if ($row['trang_thai'] == 1) {
                    $trang_thai = "Mặc định";
                } else {
                    $trang_thai = "Địa chỉ";
                }
                $output .= "
            <tr>
            <td>" . $count . "</td>
            <td>" . $row['dia_chi'] . "</td>
            <td>" . $trang_thai . "</td>
            <td><a onclick=pick(" . $row['id_dia_chi'] . ")>đặt làm mặc
định</a>
<td> <a onclick='remo(" . $row['id_dia_chi'] . ")'>xoa</a>
</td>
</tr>";
            }
        } else {
            $output .= "<tr class='text'>
    <td colspan='7'>Tài khoản chưa có địa chỉ.</td>
</tr>";
        }
        echo $output;
    }
}
