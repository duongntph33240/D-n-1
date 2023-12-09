<?php
class DonHangDAOAPI
{
    private $pdo;
    public function __construct()
    {
        require_once('../../config/PDO.php');
        $this->pdo = $pdo;
    }
    public function showUser($id)
    {
        // session_start(); // You need to start the session to access $_SESSION variables.

        // $id = $_SESSION['id'];
        // $incoming_id = $_POST['incoming_id'];
        // $output = "";
        $sql = "SELECT  users.ten,users.sdt,dia_chi.dia_chi FROM `don_hang` JOIN users ON users.id_user = don_hang.id_user JOIN ho_don ON ho_don.id_don_hang = don_hang.id_don_hang JOIN dia_chi ON users.id_user = dia_chi.id_user WHERE dia_chi.trang_thai =1 AND don_hang.id_don_hang =$id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $output = "";
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output = "  <h5 style='color: dimgray'>Thông tin khách hàng</h5>
                <p>Người đặt hàng: " . $row['ten'] . " </p>
                <p>Số điện thoại: " . $row['sdt'] . " </p>
                <p>Địa chỉ nhận hàng: " . $row['dia_chi'] . " </p>";
            }
        } else {
            $output = "aaaaaaa";
        }
        return $output;
    }
    public function showPro($id)
    {
        // session_start(); // You need to start the session to access $_SESSION variables.

        // $id = $_SESSION['id'];
        // $incoming_id = $_POST['incoming_id'];
        // $output = "";
        $sql = "SELECT don_hang.id_don_hang,san_pham.ten_san_pham,chi_tiet_don_hang.so_luong FROM `don_hang` JOIN chi_tiet_don_hang ON don_hang.id_don_hang = chi_tiet_don_hang.id_don_hang JOIN san_pham ON chi_tiet_don_hang.id_san_pham = san_pham.id_san_pham where don_hang.id_don_hang =$id ORDER BY don_hang.id_don_hang ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $output = "";
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output .= "  <p> " . $row['ten_san_pham'] . " X " . $row['so_luong'] . " </p>";
            }
        } else {
            $output .= "aaaaaaa";
        }
        return $output;
    }
    public function showMD($id)
    {
        // session_start(); // You need to start the session to access $_SESSION variables.

        // $id = $_SESSION['id'];
        // $incoming_id = $_POST['incoming_id'];
        // $output = "";
        $sql = "SELECT ho_don.ma_hoa_don,ho_don.id_don_hang FROM ho_don WHERE ho_don.id_don_hang = $id ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $output = "";
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output .= "Mã đơn hàng : " .   $row['ma_hoa_don'] . "<input type='hidden' name='id' id='idpro' value=" . $row['id_don_hang'] . "> ";
            }
        } else {
            $output .= "aaaaaaa";
        }
        return $output;
    }
    public function showTT($id)
    {
        $sql = "SELECT id_trang_thai_don_hang FROM `don_hang` WHERE id_don_hang = $id ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $tt = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch instead of fetchAll since you are fetching a single value

        $sql = "SELECT `id_trang_thai_don_hang`, `ten_trang_thai_don_hang` FROM `trang_thai_don_hang`";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $output = "";
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($tt['id_trang_thai_don_hang'] == $row['id_trang_thai_don_hang']) {
                    $output .= "<option value=" . $row['id_trang_thai_don_hang'] . " selected>" . $row['ten_trang_thai_don_hang'] . "</option>";
                } else {
                    $output .= "<option value=" . $row['id_trang_thai_don_hang'] . ">" . $row['ten_trang_thai_don_hang'] . "</option>";
                }
            }
        } else {
            $output .= "";
        }
        return $output;
    }
    public function update($id, $trang_thai, $ghi_chu)
    {
        $sql = "UPDATE `don_hang` SET `id_trang_thai_don_hang`='$trang_thai',`ghi_chu`='$ghi_chu' WHERE id_don_hang = $id ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        // $tt = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch instead of fetchAll since you are fetching a single value
        $sql = "SELECT DISTINCT don_hang.id_don_hang, ho_don.ma_hoa_don, users.ten, users.sdt, don_hang.thoi_gian, trang_thai_don_hang.ten_trang_thai_don_hang, trang_thai_don_hang.id_trang_thai_don_hang
        FROM `don_hang`
        INNER JOIN `trang_thai_don_hang` ON don_hang.id_trang_thai_don_hang = trang_thai_don_hang.id_trang_thai_don_hang
        JOIN users ON users.id_user = don_hang.id_user
        JOIN ho_don ON don_hang.id_don_hang = ho_don.id_don_hang
        ORDER BY don_hang.id_don_hang DESC";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $count = 1;
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['id_don_hang'] == $id) {
                    break;
                } else {
                    $count++;
                }
            }
        }

        $sql = "SELECT DISTINCT don_hang.id_don_hang,ho_don.ma_hoa_don,users.ten,users.sdt,don_hang.thoi_gian,trang_thai_don_hang.ten_trang_thai_don_hang,trang_thai_don_hang.id_trang_thai_don_hang FROM `don_hang` INNER JOIN `trang_thai_don_hang` ON don_hang.id_trang_thai_don_hang = trang_thai_don_hang.id_trang_thai_don_hang JOIN users  on users.id_user = don_hang.id_user JOIN ho_don on don_hang.id_don_hang = ho_don.id_don_hang WHERE don_hang.id_don_hang =$id";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $output = "";
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                if ($row['ten_trang_thai_don_hang'] == "Chờ xác nhận") {
                    $show = "<span style='color: black;' class='badge bg-warning text-dark'>
                     " . $row['ten_trang_thai_don_hang'] . " </span>";
                } elseif ($row['ten_trang_thai_don_hang'] == "Đang giao hàng") {
                    $show = "<span style='color: aliceblue;' class='badge bg-primary'>
                    " . $row['ten_trang_thai_don_hang'] . " </span>";
                } elseif ($row['ten_trang_thai_don_hang'] == "Hủy") {
                    $show = "<span style='color: aliceblue;' class='badge bg-danger'>
                    " . $row['ten_trang_thai_don_hang'] . " </span>";
                } elseif ($row['ten_trang_thai_don_hang'] == "Đã giao hàng") {
                    $show = "<span style='color: aliceblue;' class='badge bg-success'>
                     " . $row['ten_trang_thai_don_hang'] . " </span>";
                } elseif ($row['ten_trang_thai_don_hang'] == "Giao hàng không thành công") {
                    $show = "<span style='color: aliceblue;' class='badge bg-secondary'>
                    " . $row['ten_trang_thai_don_hang'] . " </span>";
                }

                $output .= "<tr id='dh24' class='even'>

                <td class='sorting_1'>" . $count . "</td>
                <td> <a href='index.php?controller=donHang_fix&amp;id=" . $row['id_don_hang'] . "'>#" . $row['ma_hoa_don'] . "</a>
                </td>
                <td>" . $row['ten'] . "</td>
                <td>" . $row['sdt'] . "</td>
                <td>" . $row['thoi_gian'] . "</td>
                <th> " . $show . " </th>

                <td>
                    <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModalLong' onclick='showDH(" . $row['id_don_hang'] . ")'>
                        Trạng thái đơn hàng
                    </button>
                    <br>
                    <button style='margin-top: 5px;' type='button' class='btn btn-primary'>
                        Xuất hoá đơn
                    </button>
                </td>
            </tr>";
            }
        } else {
            $output .= "";
        }
        return $output;
    }
}
