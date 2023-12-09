<?php
include_once 'models/DonHang.php';
include_once 'models/TrangThaiDonHang.php';
include_once 'models/PDF.php';
include_once 'DAO/ConnectDAO.php';
include_once 'config/PDO.php';
class DonHangDAO extends BaseDAO
{


    //
    public function donhang($id)
    {
        $sql = "SELECT
        don_hang.id_don_hang,
        don_hang.thoi_gian,
        trang_thai_don_hang.ten_trang_thai_don_hang,
        chi_tiet_don_hang.ten_san_pham,
        chi_tiet_don_hang.gia,
        chi_tiet_don_hang.so_luong
    FROM
        don_hang
    JOIN
        chi_tiet_don_hang ON don_hang.id_don_hang = chi_tiet_don_hang.id_don_hang
    JOIN
        trang_thai_don_hang ON trang_thai_don_hang.id_trang_thai_don_hang = don_hang.id_trang_thai_don_hang
    WHERE
        don_hang.id_trang_thai_don_hang NOT IN (3, 4) AND don_hang.id_user= $id
     ORDER BY `id_don_hang` DESC";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new LichSu($row['id_don_hang'],  $row['thoi_gian'], $row['ten_trang_thai_don_hang'], $row['ten_san_pham'], $row['gia'], $row['so_luong']);
            $lists[] = $product;
        }
        return $lists;
    }
    //
    public function lichsu($id)
    {
        $sql = "SELECT
        don_hang.id_don_hang,
        don_hang.thoi_gian,
        trang_thai_don_hang.ten_trang_thai_don_hang,
        chi_tiet_don_hang.ten_san_pham,
        chi_tiet_don_hang.gia,
        chi_tiet_don_hang.so_luong
    FROM
        don_hang
    JOIN
        chi_tiet_don_hang ON don_hang.id_don_hang = chi_tiet_don_hang.id_don_hang
    JOIN
        trang_thai_don_hang ON trang_thai_don_hang.id_trang_thai_don_hang = don_hang.id_trang_thai_don_hang
    WHERE
        don_hang.id_trang_thai_don_hang = 3 AND don_hang.id_user= $id
     ORDER BY `id_don_hang` DESC";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new LichSu($row['id_don_hang'],  $row['thoi_gian'], $row['ten_trang_thai_don_hang'], $row['ten_san_pham'], $row['gia'], $row['so_luong']);
            $lists[] = $product;
        }
        return $lists;
    }
    //
    public function show()
    {
        $sql = "SELECT DISTINCT don_hang.id_don_hang, ho_don.ma_hoa_don, users.ten, users.sdt, don_hang.thoi_gian, trang_thai_don_hang.ten_trang_thai_don_hang, trang_thai_don_hang.id_trang_thai_don_hang
        FROM `don_hang`
        INNER JOIN `trang_thai_don_hang` ON don_hang.id_trang_thai_don_hang = trang_thai_don_hang.id_trang_thai_don_hang
        JOIN users ON users.id_user = don_hang.id_user
        JOIN ho_don ON don_hang.id_don_hang = ho_don.id_don_hang
        ORDER BY don_hang.id_don_hang DESC;
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new DonHangshow($row['id_don_hang'], $row['ma_hoa_don'], $row['ten'], $row['sdt'], $row['thoi_gian'], $row['id_trang_thai_don_hang'], $row['ten_trang_thai_don_hang']);
            $lists[] = $product;
        }
        return $lists;
    }
    public function delete($id_don_hang)
    {
        $sql = "DELETE FROM `don_hang` WHERE id_don_hang = " . $id_don_hang;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function fix($id)
    {
        $sql = "SELECT * FROM don_hang INNER JOIN bang2 ON bang1.id = bang2.id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function showTTDH()
    {
        $sql = "SELECT * FROM `trang_thai_don_hang` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new TrangThaiDonHang($row['id_trang_thai_don_hang'], $row['ten_trang_thai_don_hang']);
            $lists[] = $product;
        }
        return $lists;
    }
    public function showOneTTDH($id)
    {
        $sql = "SELECT * FROM `trang_thai_don_hang` WHERE id_trang_thai_don_hang = " . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new TrangThaiDonHang($row['id_trang_thai_don_hang'], $row['ten_trang_thai_don_hang']);
            $lists[] = $product;
        }
        return $lists;
    }
    public function update_tt($id_trang_thai_don_hang, $ten_trang_thai_don_hang)
    {
        $sql = "UPDATE `trang_thai_don_hang` SET `ten_trang_thai_don_hang`='$ten_trang_thai_don_hang' WHERE id_trang_thai_don_hang = " . $id_trang_thai_don_hang;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function donHang_update_tt($id_don_hang, $tt)
    {
        $sql = "UPDATE `don_hang` SET `id_trang_thai_don_hang`='$tt' WHERE id_don_hang = " . $id_don_hang;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    //
    public function showOneId($id)
    {
        $sql = "SELECT 
        ho_don.ma_hoa_don, 
        don_hang.thoi_gian,don_hang.id_don_hang,
        dia_chi.dia_chi, 
        chi_tiet_don_hang.gia*chi_tiet_don_hang.so_luong as tong_tien,chi_tiet_don_hang.gia,chi_tiet_don_hang.so_luong,
        chi_tiet_don_hang.ten_san_pham,
        ho_don.trang_thai,users.ten,users.sdt
        FROM `ho_don` 
        JOIN don_hang ON don_hang.id_don_hang = ho_don.id_don_hang 
        JOIN users ON users.id_user = don_hang.id_user 
        JOIN dia_chi ON users.id_user = dia_chi.id_user 
        JOIN chi_tiet_don_hang ON chi_tiet_don_hang.id_don_hang = don_hang.id_don_hang WHERE dia_chi.trang_thai = 1 AND ho_don.id_don_hang=" . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new PDF(
                $row['id_don_hang'],
                $row['ma_hoa_don'],
                $row['thoi_gian'],
                $row['dia_chi'],
                $row['tong_tien'],
                $row['ten_san_pham'],
                $row['trang_thai'],
                $row['ten'],
                $row['sdt'],
                $row['gia'],
                $row['so_luong'],
            );

            $users[] = $user;
        }

        return $users;
    }
    public function showAllXN($id)
    {
        $sql = "SELECT 
        ho_don.ma_hoa_don, 
        don_hang.thoi_gian,
        dia_chi.dia_chi, 
        chi_tiet_don_hang.gia*chi_tiet_don_hang.so_luong as tong_tien,chi_tiet_don_hang.gia,chi_tiet_don_hang.so_luong,
        chi_tiet_don_hang.ten_san_pham,
        ho_don.trang_thai,users.ten,users.sdt
        FROM `ho_don` 
        JOIN don_hang ON don_hang.id_don_hang = ho_don.id_don_hang 
        JOIN users ON users.id_user = don_hang.id_user 
        JOIN dia_chi ON users.id_user = dia_chi.id_user 
        JOIN chi_tiet_don_hang ON chi_tiet_don_hang.id_don_hang = don_hang.id_don_hang WHERE dia_chi.trang_thai = 1 AND ho_don.id_don_hang=" . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new PDF(
                $row['ma_hoa_don'],
                $row['thoi_gian'],
                $row['dia_chi'],
                $row['tong_tien'],
                $row['ten_san_pham'],
                $row['trang_thai'],
                $row['ten'],
                $row['sdt'],
                $row['gia'],
                $row['so_luong'],
            );

            $users[] = $user;
        }

        return $users;
    }
    public function gethd_id($id)
    {
        $sql = "SELECT * FROM chi_tiet_don_hang WHERE id_don_hang = " . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new ChiTietDonHang($row['id_chi_tiet_don_hang'], $row['id_san_pham'], $row['id_don_hang'], $row['gia'], $row['ten_san_pham'], $row['so_luong']);
            $lists[] = $product;
        }
        return $lists;
    }
    public function addDH($id_user, $thoi_gian, $id_trang_thai_don_hang)
    {
        $sql = "INSERT INTO `don_hang`(`id_user`, `thoi_gian`, `id_trang_thai_don_hang`) VALUES ('$id_user','$thoi_gian','$id_trang_thai_don_hang')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function addHD($id_don_hang, $ma_hoa_don, $phuong_thuc, $trangThai)
    {
        $sql = "INSERT INTO `ho_don`(`id_don_hang`, `ma_hoa_don`, `phuong_thuc`, `trang_thai`) VALUES ('$id_don_hang','$ma_hoa_don','$phuong_thuc','$trangThai')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function getOneIdDesc()
    {
        $sql = "SELECT id_don_hang FROM don_hang ORDER BY id_don_hang DESC LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new DonHang($row['id_don_hang'], 0, 0, 0, 0);
            $lists[] = $product;
        }
        return $lists;
    }
    public function addChiTietDH($id_san_pham, $id_don_hang, $gia, $ten_san_pham, $so_luong)
    {
        $sql = "INSERT INTO `chi_tiet_don_hang`(`id_san_pham`, `id_don_hang`, `gia`, `ten_san_pham`, `so_luong`) VALUES ('$id_san_pham','$id_don_hang','$gia','$ten_san_pham','$so_luong')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function addChiTietBT($id_bo_truyen, $id_don_hang,$id_user, $so_luong)
    {
        $sql = "INSERT INTO `chi_tiet_don_hang_bo_truyen`(`id_bo_truyen`, `id_don_hang`, `id_user`, `soLuong`) VALUES ('$id_bo_truyen','$id_don_hang','$id_user','$so_luong')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function tt_user_don_hang($id)
    {
        $sql = "SELECT DISTINCT
        don_hang.id_don_hang,
        ho_don.ma_hoa_don,
        ho_don.phuong_thuc,
        users.ten,
        users.sdt,
        dia_chi.dia_chi,
        don_hang.thoi_gian
    FROM
        don_hang
    JOIN
        trang_thai_don_hang ON trang_thai_don_hang.id_trang_thai_don_hang = don_hang.id_trang_thai_don_hang
    JOIN
        users ON don_hang.id_user = users.id_user
    JOIN
        dia_chi ON users.id_user = dia_chi.id_user AND dia_chi.trang_thai = 1
    JOIN
        ho_don ON ho_don.id_don_hang = don_hang.id_don_hang
    WHERE
        don_hang.id_don_hang = $id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new showu($row['id_don_hang'], $row['ma_hoa_don'], $row['ten'], $row['sdt'], $row['thoi_gian'], $row['dia_chi'], $row['phuong_thuc']);
            $lists[] = $product;
        }
        return $lists;
    }
    public function tt_sp_don_hang($id)
    {
        $sql = "SELECT 
        san_pham.hinh_anh,
        chi_tiet_don_hang.ten_san_pham,
        chi_tiet_don_hang.gia,
        chi_tiet_don_hang.so_luong,
        san_pham.id_san_pham,
        bo_truyen.id_loai_san_pham,
        chi_tiet_bo_truyen.id_bo_truyen,
        don_hang.id_trang_thai_don_hang
     FROM
         don_hang
     JOIN
         trang_thai_don_hang ON trang_thai_don_hang.id_trang_thai_don_hang = don_hang.id_trang_thai_don_hang
     JOIN
         chi_tiet_don_hang on chi_tiet_don_hang.id_don_hang = don_hang.id_don_hang
         JOIN san_pham ON san_pham.id_san_pham = chi_tiet_don_hang.id_san_pham
         JOIN chi_tiet_bo_truyen ON chi_tiet_bo_truyen.id_san_pham = san_pham.id_san_pham 
         join bo_truyen on bo_truyen.id_bo_truyen = chi_tiet_bo_truyen.id_bo_truyen
    WHERE
        don_hang.id_don_hang = $id";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new showpro($row['hinh_anh'], $row['ten_san_pham'], $row['gia'], $row['so_luong'], $row['id_san_pham'], $row['id_loai_san_pham'], $row['id_bo_truyen'], $row['id_trang_thai_don_hang']);
            $lists[] = $product;
        }
        return $lists;
    }
}
