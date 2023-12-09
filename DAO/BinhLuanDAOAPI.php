<?php

class BinhLuanDAOAPI
{
    private $pdo;
    public function __construct()
    {
        require_once('../../config/PDO.php');
        $this->pdo = $pdo;
    }
    // thêm giỏ 
    public function add($id_pro, $commet)
    {
        session_start(); // You need to start the session to access $_SESSION variables.

        $id = $_SESSION['id'];
        $time =  get_time();


        $output = "";
        $sql = "INSERT INTO `binh_luan`( `id_user`, `id_san_pham`, `noi_dung_binh_luan`, `ngay_binh_luan`) VALUES ('$id','$id_pro','$commet','$time')";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();


        $sql = "SELECT `id_binh_luan`, users.ten,users.anh, san_pham.ten_san_pham, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia` FROM `binh_luan` JOIN san_pham ON san_pham.id_san_pham = binh_luan.id_san_pham join users on users.id_user=binh_luan.id_user Where binh_luan.id_san_pham = $id_pro";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output .= "
                <div class='single-comment justify-content-between d-flex'>
                                                        <div class='user justify-content-between d-flex'>
                                                            <div class='thumb text-center'>
                                                                <img src='assets/imgs/user/" . $row['anh'] . "'
                                                                    alt='' style='height: 80%;'>
                                                                <h6><a href='#'>" . $row['ten'] . "</a></h6>

                                                            </div>
                                                            <div class='desc'>
                                                                <div class='product-rate d-inline-block'>
                                                                    <div class='product-rating' style='width:90%'>
                                                                    </div>
                                                                </div>
                                                                <p>" . $row['noi_dung_binh_luan'] . "</p>
                                                                <div class='d-flex justify-content-between'>
                                                                    <div class='d-flex align-items-center'>
                                                                        <p class='font-xs mr-30'>" . $row['ngay_binh_luan'] . "
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> ";
            }
        } else {
            $output .= "<tr class='text'>
            <td colspan='7'>Không có sản phẩm trong giỏ hàng.</td>
        </tr>";
        }

        return  $output;
    }
    public function add_star($id_pro, $commet)
    {
        session_start(); // You need to start the session to access $_SESSION variables.

        $id = $_SESSION['id'];
        // $incoming_id = $_POST['incoming_id'];
        // $output = "";
        $sql = "SELECT danh_gia FROM `binh_luan` WHERE id_user = $id AND id_san_pham = $id_pro";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute();
        $so_luong = $stmt->fetchColumn();
        if ($so_luong > 0) {
            $sql = "UPDATE `binh_luan` SET `danh_gia`='$commet' WHERE id_user = $id AND id_san_pham = $id_pro";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        } else {
            $sql = "INSERT INTO `binh_luan`( `id_user`, `id_san_pham`, `danh_gia`) VALUES ('$id','$id_pro','$commet')";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
        }



        $output = "";



        $sql = "SELECT `id_binh_luan`, users.ten,users.anh, san_pham.ten_san_pham, `noi_dung_binh_luan`, `ngay_binh_luan`, `danh_gia` FROM `binh_luan` JOIN san_pham ON san_pham.id_san_pham = binh_luan.id_san_pham join users on users.id_user=binh_luan.id_user Where binh_luan.id_san_pham = $id_pro and users.id_user= $id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $output .= "<div class='product-rate d-inline-block mr-15'>
                <div class='product-rating' style='width:" . ($row["danh_gia"] / 5) * 100 . "%'>
                </div>
            </div>";
            }
        } else {
            $output .= "<tr class='text'>
            <td colspan='7'>Không có sản phẩm trong giỏ hàng.</td>
        </tr>";
        }

        return  $output;
    }
}
