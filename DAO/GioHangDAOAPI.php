<?php

class GioHangDAOAPI
{

    private $pdo;
    public function __construct()
    {
        require_once('../../config/PDO.php');
        $this->pdo = $pdo;
    }
    // thêm giỏ hàng
    public function add_card($data)
    {
        session_start(); // You need to start the session to access $_SESSION variables.

        $id = $_SESSION['id'];
        // $incoming_id = $_POST['incoming_id'];
        // $output = "";
        $sql = "SELECT so_luong FROM `gio_hang` WHERE id_user = $id AND id_san_pham = $data";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $so_luong = $stmt->fetchColumn();
        if ($so_luong > 0) {
            $sql = "UPDATE `gio_hang` SET `so_luong`= $so_luong+1 WHERE id_user = $id AND id_san_pham = $data";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } else {
            $sql = "INSERT INTO `gio_hang` (`id_user`, `id_san_pham`, `so_luong`) VALUES ( '$id', $data, '1');";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
    }
    public function sum($data)
    {
        session_start(); // You need to start the session to access $_SESSION variables.

        $id = $_SESSION['id'];
        $sql = "SELECT COUNT(*) as so_luong FROM `gio_hang` WHERE id_user = $id ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $so_luong = $stmt->fetchColumn();
        if ($so_luong == 0) {
            $so_luong = 0;
        }
        return $so_luong;
    }
    public function down_card($data)
    {

        session_start(); // You need to start the session to access $_SESSION variables.

        $id = $_SESSION['id'];
        // $incoming_id = $_POST['incoming_id'];
        // $output = "";
        $sql = "SELECT so_luong FROM `gio_hang` WHERE id_user = $id AND id_san_pham = $data";


        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $so_luong = $stmt->fetchColumn();
        if ($so_luong != 1) {
            $sql = "UPDATE `gio_hang` SET `so_luong`= $so_luong-1 WHERE id_user = $id AND id_san_pham = $data";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } else {
            $sql = "UPDATE `gio_hang` SET `so_luong`= $so_luong WHERE id_user = $id AND id_san_pham = $data";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
        $output = "";
        $sql = "SELECT gio_hang.id_gio_hang,gio_hang.id_san_pham,san_pham.hinh_anh,san_pham.ten_san_pham,san_pham.gia_ban, gio_hang.so_luong FROM `gio_hang` JOIN san_pham ON gio_hang.id_san_pham = san_pham.id_san_pham WHERE gio_hang.id_user = $id ORDER BY `id_gio_hang` DESC";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output .= "<tr>
                <td>
                    <label class='checkbox-wrap checkbox-primary'>
                        <input type='checkbox' name='card[]' value=" . $row['id_san_pham'] . " />
                        <span class='checkmark'></span>
                    </label>
                </td>
                <td class='image product-thumbnail'><img src=" . 'assets/imgs/shop/' . $row['hinh_anh'] . " alt='#'></td>
                <td class='product-des product-name'>
                    <h5 class='product-name'><a href='product-details.html'>" . $row['ten_san_pham'] . "</a></h5></td>
                <td class='price' data-title='Price'><span>" . $row['gia_ban'] . " </span></td>
                <td class='text-center' data-title='Stock'>
                    <div class='detai border radius  m-auto'>
                        <a href='#' class='qty-down' onclick=down(" . $row['id_san_pham'] . ")><i class='fi-rs-angle-small-down'></i></a>
                        <span class='qty-val1'>" . $row['so_luong'] . "</span>
                        <a href='#' class='qty-up' onclick=up(" .  $row['id_san_pham'] . ")><i class='fi-rs-angle-small-up'></i></a>
                    </div>
                </td>
                <td class='text-right' data-title='Cart'>
                     <span> " . $row['so_luong'] * $row['gia_ban'] . " </span>
                </td>
                <td class='action' data-title='Remove' onclick=dele(" .  $row['id_san_pham'] . ")><a href='#' class='text-muted'><i class='fi-rs-trash'></i></a></td>
            </tr>";
            }
        } else {
            $output .= "<tr class='text'>
            <td colspan='7'>Không có sản phẩm trong giỏ hàng.</td>
        </tr>";
        }

        $output .= "<tr>
        <td colspan='6' class='text-end'>
            <a href='#' class='text-muted'> <i class='fi-rs-cross-small'></i> Clear Cart</a>
        </td>
    </tr>";
        return $output;
    }
    public function up_card($data)
    {

        session_start(); // You need to start the session to access $_SESSION variables.

        $id = $_SESSION['id'];
        // $incoming_id = $_POST['incoming_id'];
        // $output = "";
        $sql = "SELECT so_luong FROM `gio_hang` WHERE id_user = $id AND id_san_pham = $data";


        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $so_luong = $stmt->fetchColumn();
        if ($so_luong >= 1) {
            $sql = "UPDATE `gio_hang` SET `so_luong`= $so_luong+1 WHERE id_user = $id AND id_san_pham = $data";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } else {
            $sql = "UPDATE `gio_hang` SET `so_luong`= $so_luong WHERE id_user = $id AND id_san_pham = $data";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }
        $output = "";
        $sql = "SELECT gio_hang.id_gio_hang,gio_hang.id_san_pham,san_pham.hinh_anh,san_pham.ten_san_pham,san_pham.gia_ban, gio_hang.so_luong FROM `gio_hang` JOIN san_pham ON gio_hang.id_san_pham = san_pham.id_san_pham WHERE gio_hang.id_user = $id ORDER BY `id_gio_hang` DESC";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output .= "<tr>
                <td>
                <label class='checkbox-wrap checkbox-primary'>
                <input type='checkbox' name='card[]' value=" . $row['id_san_pham'] . " />
                <span class='checkmark'></span>
            </label>
                </td>
                <td class='image product-thumbnail'><img src=" . 'assets/imgs/shop/' .  $row['hinh_anh'] . " alt='#'></td>
                <td class='product-des product-name'>
                    <h5 class='product-name'><a href='product-details.html'>" . $row['ten_san_pham'] . "</a></h5></td>
                <td class='price' data-title='Price'><span>" . $row['gia_ban'] . " </span></td>
                <td class='text-center' data-title='Stock'>
                    <div class='detai border radius  m-auto'>
                        <a href='#' class='qty-down' onclick=down(" .  $row['id_san_pham'] . ")><i class='fi-rs-angle-small-down'></i></a>
                        <span class='qty-val1'>" . $row['so_luong'] . "</span>
                        <a href='#' class='qty-up' onclick=up(" .  $row['id_san_pham'] . ")><i class='fi-rs-angle-small-up'></i></a>
                    </div>
                </td>
                <td class='text-right' data-title='Cart'>
                     <span> " . $row['so_luong'] * $row['gia_ban'] . " </span>
                </td>
                <td class='action' data-title='Remove' onclick=dele(" .  $row['id_san_pham'] . ")><a href='#' class='text-muted'><i class='fi-rs-trash'></i></a></td>
            </tr>";
            }
        } else {
            $output .= "<tr class='text'>
            <td colspan='7'>Không có sản phẩm trong giỏ hàng.</td>
        </tr>";
        }
        $output .= "<tr>
        <td colspan='6' class='text-end'>
            <a href='#' class='text-muted'> <i class='fi-rs-cross-small'></i> Clear Cart</a>
        </td>
    </tr>";

        return $output;
    }

    function delete($data)
    {
        session_start(); // You need to start the session to access $_SESSION variables.

        $id = $_SESSION['id'];
        // $incoming_id = $_POST['incoming_id'];
        // $output = "";
        $sql = "DELETE FROM `gio_hang` WHERE id_user = $id AND id_san_pham = $data";


        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        $output = "";
        $sql = "SELECT gio_hang.id_gio_hang,gio_hang.id_san_pham,san_pham.hinh_anh,san_pham.ten_san_pham,san_pham.gia_ban, gio_hang.so_luong FROM `gio_hang` JOIN san_pham ON gio_hang.id_san_pham = san_pham.id_san_pham WHERE gio_hang.id_user = $id ORDER BY `id_gio_hang` DESC";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output .= "<tr>
                <td>
                <label class='checkbox-wrap checkbox-primary'>
                <input type='checkbox' name='card[]' value=" . $row['id_san_pham'] . " />
                <span class='checkmark'></span>
            </label>
                </td>
                <td class='image product-thumbnail'><img src=" . 'assets/imgs/shop/' .  $row['hinh_anh'] . " alt='#'></td>
                <td class='product-des product-name'>
                    <h5 class='product-name'><a href='product-details.html'>" . $row['ten_san_pham'] . "</a></h5></td>
                <td class='price' data-title='Price'><span>" . $row['gia_ban'] . " </span></td>
                <td class='text-center' data-title='Stock'>
                    <div class='detai border radius  m-auto'>
                        <a href='#' class='qty-down' onclick=down(" .  $row['id_san_pham'] . ")><i class='fi-rs-angle-small-down'></i></a>
                        <span class='qty-val1'>" . $row['so_luong'] . "</span>
                        <a href='#' class='qty-up' onclick=up(" .  $row['id_san_pham'] . ")><i class='fi-rs-angle-small-up'></i></a>
                    </div>
                </td>
                <td class='text-right' data-title='Cart'>
                     <span> " . $row['so_luong'] * $row['gia_ban'] . " </span>
                </td>
                <td class='action' data-title='Remove' onclick=dele(" .  $row['id_san_pham'] . ")><a href='#' class='text-muted'><i class='fi-rs-trash'></i></a></td>
            </tr>";
            }
        } else {
            $output .= "<tr class='text'>
            <td colspan='7'>Không có sản phẩm trong giỏ hàng.</td>
        </tr>";
        }
        $output .= "<tr>
        <td colspan='6' class='text-end'>
            <a href='#' class='text-muted'> <i class='fi-rs-cross-small'></i> Clear Cart</a>
        </td>
    </tr>";

        return $output;
    }
}
