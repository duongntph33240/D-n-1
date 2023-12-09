<?php
include_once 'models/SanPham.php';
include_once 'models/AnhSanPham.php';
include_once 'DAO/ConnectDAO.php';
class SanPhamDAO extends BaseDAO
{
    public function card($id, $listItem)
    {
        $id_string = implode(', ', $listItem);
        $sql = "SELECT san_pham.ten_san_pham,san_pham.hinh_anh,bo_truyen.id_loai_san_pham,
        chi_tiet_bo_truyen.id_bo_truyen,`id_gio_hang`, `id_user`, gio_hang.id_san_pham,
        san_pham.gia_ban, gio_hang.so_luong FROM `gio_hang` JOIN san_pham 
            ON gio_hang.id_san_pham=san_pham.id_san_pham JOIN chi_tiet_bo_truyen 
                ON chi_tiet_bo_truyen.id_san_pham = san_pham.id_san_pham
                JOIN bo_truyen ON bo_truyen.id_bo_truyen = chi_tiet_bo_truyen.id_bo_truyen  WHERE gio_hang.id_user = $id AND
                                           gio_hang.id_san_pham IN ($id_string)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new card(
                $row['id_gio_hang'],
                $row['id_user'],
                $row['id_san_pham'],
                $row['gia_ban'],
                $row['so_luong'],
                $row['hinh_anh'],
                $row['id_loai_san_pham'],
                $row['id_bo_truyen'],
                $row['ten_san_pham']
            );
            $lists[] = $product;
        }

        return $lists;
    }
    public function cardB($listItem)
    {
        $id_string = implode(', ', $listItem);
        $sql = "SELECT san_pham.ten_san_pham,san_pham.hinh_anh,bo_truyen.id_loai_san_pham,san_pham.id_san_pham,
        chi_tiet_bo_truyen.id_bo_truyen,
        san_pham.gia_ban FROM san_pham 
            JOIN chi_tiet_bo_truyen 
                ON chi_tiet_bo_truyen.id_san_pham = san_pham.id_san_pham 
                JOIN bo_truyen ON bo_truyen.id_bo_truyen = chi_tiet_bo_truyen.id_bo_truyen WHERE 
                                           chi_tiet_bo_truyen.id_san_pham IN ($id_string)";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new card(
                0,
                0,
                $row['id_san_pham'],
                $row['gia_ban'],
                1,
                $row['hinh_anh'],
                $row['id_loai_san_pham'],
                $row['id_bo_truyen'],
                $row['ten_san_pham']
            );
            $lists[] = $product;
        }

        return $lists;
    }
    public function add($ten_san_pham, $mo_ta, $gia_ban, $gia_goc, $so_luong, $so_trang, $id_tac_gia, $nam_xb, $kich_thuoc, $trong_luong, $ngay_nhap, $id_loai_san_pham,  $id_nha_san_xuat, $id_nha_phat_hanh)
    {
        $sql = "INSERT INTO `san_pham`(`ten_san_pham`, `mo_ta`, `gia_ban`, `gia_goc`, `so_luong`,
               `so_trang`, `id_tac_gia`, `nam_xb`, `kich_thuoc`, `trong_luong`,`ngay_nhap`, `id_nha_san_xuat`,
               `id_nha_phat_hanh`) VALUES ('$ten_san_pham','$mo_ta','$gia_ban','$gia_goc',
             '$so_luong','$so_trang','$id_tac_gia','$nam_xb','$kich_thuoc','$trong_luong','$ngay_nhap','$id_nha_san_xuat',
             '$id_nha_phat_hanh')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function showList()
    {
        $sql = "SELECT san_pham.*
        FROM san_pham
        ORDER BY san_pham.id_san_pham DESC;";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPhamList(
                $row['id_san_pham'],
                $row['ten_san_pham'],
                $row['mo_ta'],
                $row['hinh_anh'],
                $row['gia_ban'],
                $row['gia_goc'],
                $row['so_luong'],
                $row['so_trang'],
                $row['id_tac_gia'],
                $row['nam_xb'],
                $row['kich_thuoc'],
                $row['trong_luong'],
                $row['ngay_nhap'],
                $row['id_nha_san_xuat'],
                $row['id_nha_phat_hanh'],
                $row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    public function show()
    {
        $sql = "SELECT san_pham.*, chi_tiet_bo_truyen.id_bo_truyen, bo_truyen.id_loai_san_pham
        FROM san_pham
        JOIN chi_tiet_bo_truyen ON san_pham.id_san_pham = chi_tiet_bo_truyen.id_san_pham
        JOIN bo_truyen ON chi_tiet_bo_truyen.id_bo_truyen = bo_truyen.id_bo_truyen
        ORDER BY san_pham.id_san_pham DESC;
";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham(
                $row['id_san_pham'],
                $row['ten_san_pham'],
                $row['mo_ta'],
                $row['hinh_anh'],
                $row['gia_ban'],
                $row['gia_goc'],
                $row['so_luong'],
                $row['so_trang'],
                $row['id_tac_gia'],
                $row['nam_xb'],
                $row['kich_thuoc'],
                $row['trong_luong'],
                $row['ngay_nhap'],
                $row['id_loai_san_pham'],
                $row['id_bo_truyen'],
                $row['id_nha_san_xuat'],
                $row['id_nha_phat_hanh'],
                $row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    public function showNow()
    {
        $sql = "SELECT san_pham.*, chi_tiet_bo_truyen.id_bo_truyen , bo_truyen.id_loai_san_pham
        FROM san_pham
        JOIN chi_tiet_bo_truyen ON san_pham.id_san_pham = chi_tiet_bo_truyen.id_san_pham
        JOIN bo_truyen on chi_tiet_bo_truyen.id_bo_truyen = bo_truyen.id_bo_truyen
        WHERE MONTH(`ngay_nhap`) <= MONTH(NOW()) AND YEAR(`ngay_nhap`) <= YEAR(NOW())
        ORDER BY `ngay_nhap` DESC;

        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham(
                $row['id_san_pham'],
                $row['ten_san_pham'],
                $row['mo_ta'],
                $row['hinh_anh'],
                $row['gia_ban'],
                $row['gia_goc'],
                $row['so_luong'],
                $row['so_trang'],
                $row['id_tac_gia'],
                $row['nam_xb'],
                $row['kich_thuoc'],
                $row['trong_luong'],
                $row['ngay_nhap'],
                $row['id_loai_san_pham'],
                $row['id_bo_truyen'],
                $row['id_nha_san_xuat'],
                $row['id_nha_phat_hanh'],
                $row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    public function showImg($id)
    {
        $sql = "SELECT * FROM `anh_san_pham` WHERE id_san_pham= " . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $imgs = $stmt->fetchAll();
        return $imgs;
    }
    public function showBo($id)
    {
        $sql = "SELECT san_pham.*,chi_tiet_bo_truyen.id_bo_truyen,bo_truyen.id_loai_san_pham FROM `san_pham` JOIN chi_tiet_bo_truyen ON chi_tiet_bo_truyen.id_san_pham = san_pham.id_san_pham  JOIN bo_truyen on bo_truyen.id_bo_truyen = chi_tiet_bo_truyen.id_bo_truyen WHERE bo_truyen.id_bo_truyen =" . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham(
                $row['id_san_pham'],
                $row['ten_san_pham'],
                $row['mo_ta'],
                $row['hinh_anh'],
                $row['gia_ban'],
                $row['gia_goc'],
                $row['so_luong'],
                $row['so_trang'],
                $row['id_tac_gia'],
                $row['nam_xb'],
                $row['kich_thuoc'],
                $row['trong_luong'],
                $row['ngay_nhap'],
                $row['id_loai_san_pham'],
                $row['id_bo_truyen'],
                $row['id_nha_san_xuat'],
                $row['id_nha_phat_hanh'],
                $row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    public function showLQ($id)
    {
        $sql = "    SELECT san_pham.*,chi_tiet_bo_truyen.id_bo_truyen,bo_truyen.id_loai_san_pham FROM `san_pham`
        JOIN chi_tiet_bo_truyen ON san_pham.id_san_pham = chi_tiet_bo_truyen.id_san_pham
        JOIN bo_truyen ON chi_tiet_bo_truyen.id_bo_truyen = bo_truyen.id_bo_truyen
        WHERE id_loai_san_pham = " . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham(
                $row['id_san_pham'],
                $row['ten_san_pham'],
                $row['mo_ta'],
                $row['hinh_anh'],
                $row['gia_ban'],
                $row['gia_goc'],
                $row['so_luong'],
                $row['so_trang'],
                $row['id_tac_gia'],
                $row['nam_xb'],
                $row['kich_thuoc'],
                $row['trong_luong'],
                $row['ngay_nhap'],
                $row['id_loai_san_pham'],
                $row['id_bo_truyen'],
                $row['id_nha_san_xuat'],
                $row['id_nha_phat_hanh'],
                $row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    public function showOne($id)
    {
        $sql = "SELECT san_pham.*, chi_tiet_bo_truyen.id_bo_truyen ,bo_truyen.id_loai_san_pham,tac_gia.ten_tac_gia,loai_san_pham.ten_loai_san_pham,nha_san_xuat.ten_nha_san_xuat,nha_phat_hanh.ten_nha_phat_hanh,bo_truyen.ten_bo_truyen
        FROM san_pham
        JOIN chi_tiet_bo_truyen ON san_pham.id_san_pham = chi_tiet_bo_truyen.id_san_pham
        JOIN bo_truyen ON chi_tiet_bo_truyen.id_bo_truyen = bo_truyen.id_bo_truyen
        JOIN tac_gia on tac_gia.id_tac_gia = san_pham.id_tac_gia
        JOIN nha_san_xuat on nha_san_xuat.id_nha_san_xuat = san_pham.id_nha_san_xuat
        JOIN nha_phat_hanh on nha_phat_hanh.id_nha_phat_hanh = san_pham.id_nha_phat_hanh
        JOIN loai_san_pham ON loai_san_pham.id_loai_san_pham = bo_truyen.id_loai_san_pham
               WHERE san_pham.id_san_pham = " . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham(
                $row['id_san_pham'],
                $row['ten_san_pham'],
                $row['mo_ta'],
                $row['hinh_anh'],
                $row['gia_ban'],
                $row['gia_goc'],
                $row['so_luong'],
                $row['so_trang'],
                $row['ten_tac_gia'],
                $row['nam_xb'],
                $row['kich_thuoc'],
                $row['trong_luong'],
                $row['ngay_nhap'],
                $row['ten_loai_san_pham'],
                $row['ten_bo_truyen'],
                $row['ten_nha_san_xuat'],
                $row['ten_nha_phat_hanh'],
                $row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    public function search($key)
    {
        $sql = "SELECT san_pham.*, chi_tiet_bo_truyen.id_bo_truyen,bo_truyen.id_loai_san_pham
        FROM san_pham
        JOIN chi_tiet_bo_truyen ON chi_tiet_bo_truyen.id_san_pham = san_pham.id_san_pham
        join bo_truyen ON bo_truyen.id_bo_truyen = chi_tiet_bo_truyen.id_bo_truyen
        WHERE san_pham.ten_san_pham LIKE '%$key%' AND san_pham.trang_thai = 1;
        ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham(
                $row['id_san_pham'],
                $row['ten_san_pham'],
                $row['mo_ta'],
                $row['hinh_anh'],
                $row['gia_ban'],
                $row['gia_goc'],
                $row['so_luong'],
                $row['so_trang'],
                $row['id_tac_gia'],
                $row['nam_xb'],
                $row['kich_thuoc'],
                $row['trong_luong'],
                $row['ngay_nhap'],
                $row['id_loai_san_pham'],
                $row['id_bo_truyen'],
                $row['id_nha_san_xuat'],
                $row['id_nha_phat_hanh'],
                $row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    public function getOneIdDesc()
    {
        $sql = "SELECT * FROM san_pham ORDER BY id_san_pham DESC LIMIT 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham(
                $row['id_san_pham'],
                $row['ten_san_pham'],
                $row['mo_ta'],
                $row['hinh_anh'],
                $row['gia_ban'],
                $row['gia_goc'],
                $row['so_luong'],
                $row['so_trang'],
                $row['id_tac_gia'],
                $row['nam_xb'],
                $row['kich_thuoc'],
                $row['trong_luong'],
                $row['ngay_nhap'],
                $row['id_loai_san_pham'],
                $row['id_bo_truyen'],
                $row['id_nha_san_xuat'],
                $row['id_nha_phat_hanh'],
                $row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
    // add nhiều ảnh
    public function addImgs($hinh_anh, $id_san_pham)
    {
        $sql = "INSERT INTO `anh_san_pham`( `hinh_anh`, `id_san_pham`) VALUES ('$hinh_anh','$id_san_pham')";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    // update ảnh sản phẩm
    public function updateImgSP($hinh_anh, $id_san_pham)
    {
        $sql = "UPDATE `san_pham` SET `hinh_anh`='$hinh_anh' WHERE id_san_pham = " . $id_san_pham;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function updateSlSP($so_luong, $trangThai, $id_san_pham)
    {
        $sql = "UPDATE `san_pham` SET `so_luong`=$so_luong,`trang_thai`=$trangThai WHERE id_san_pham = " . $id_san_pham;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function deleteSP($id_san_pham)
    {
        $sql = "DELETE FROM `san_pham` WHERE id_san_pham = " . $id_san_pham;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function deleteASP($id_san_pham)
    {
        $sql = "DELETE FROM `anh_san_pham` WHERE id_san_pham = " . $id_san_pham;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function deleteOneASP($id_anh_san_pham)
    {
        $sql = "DELETE FROM `anh_san_pham` WHERE id_anh_san_pham = " . $id_anh_san_pham;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    public function fix($ten_san_pham, $mo_ta, $hinh_anh_sp, $gia_ban, $gia_goc, $so_luong, $so_trang, $id_tac_gia, $nam_xb, $kich_thuoc, $trong_luong, $id_loai_san_pham, $id_bo_truyen, $id_nha_san_xuat, $id_nha_phat_hanh, $id)
    {
        $sql = "UPDATE `san_pham` SET `ten_san_pham`='$ten_san_pham',`mo_ta`='$mo_ta',`hinh_anh`='$hinh_anh_sp',
              `gia_ban`='$gia_ban',`gia_goc`='$gia_goc',`so_luong`='$so_luong',`so_trang`='$so_trang',`id_tac_gia`='$id_tac_gia',
              `nam_xb`='$nam_xb',`kich_thuoc`='$kich_thuoc',`trong_luong`='$trong_luong',
              `id_loai_san_pham`='$id_loai_san_pham',`id_bo_truyen`='$id_bo_truyen',`id_nha_san_xuat`='$id_nha_san_xuat',
              `id_nha_phat_hanh`='$id_nha_phat_hanh' WHERE `id_san_pham` = " . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
    }
    //lấy danh sách imgs
    public function imgs($id)
    {
        $sql = "SELECT * FROM `anh_san_pham` WHERE id_san_pham = " . $id;
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $users = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new AnhSanPham(
                $row['id_anh_san_pham'],
                $row['hinh_anh'],
                $row['id_san_pham']
            );
            $users[] = $user;
        }

        return $users;
    }
    // lấy danh sách tác giả
    public function showtg()
    {
        $sql = "SELECT * FROM `tac_gia` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new TacGia(
                $row['id_tac_gia'],
                $row['ten_tac_gia'],
                $row['trang_thai'],
                0
            );

            $users[] = $user;
        }

        return $users;
    }
    // lấy danh sách loại
    public function showL()
    {
        $sql = "SELECT * FROM `loai_san_pham` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new LoaiTruyen(
                $row['id_loai_san_pham'],
                $row['ten_loai_san_pham'],
                $row['trang_thai'],
                0
            );

            $users[] = $user;
        }

        return $users;
    }
    public function showPH()
    {
        $sql = "SELECT * FROM `nha_phat_hanh` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new NhaPhatHanh(
                $row['id_nha_phat_hanh'],
                $row['ten_nha_phat_hanh'],
                $row['trang_thai'],
                0
            );

            $users[] = $user;
        }

        return $users;
    }
    public function showB()
    {
        $sql = "SELECT * FROM `bo_truyen` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new NhaPhatHanh(
                $row['id_bo_truyen'],
                $row['ten_bo_truyen'],
                $row['trang_thai'],
                0
            );

            $users[] = $user;
        }

        return $users;
    }
    public function showNSX()
    {
        $sql = "SELECT * FROM `nha_san_xuat` WHERE 1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        $users = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Create a Login object and add it to the array
            $user = new NhaXuatBan(
                $row['id_nha_san_xuat'],
                $row['ten_nha_san_xuat'],
                $row['trang_thai'],
                0
            );

            $users[] = $user;
        }

        return $users;
    }
    public function listSanPham()
    {

        $sql = "SELECT san_pham.*, chi_tiet_bo_truyen.id_bo_truyen ,bo_truyen.id_loai_san_pham
        FROM san_pham
        LEFT JOIN chi_tiet_bo_truyen ON san_pham.id_san_pham = chi_tiet_bo_truyen.id_san_pham 
        LEFT JOIN bo_truyen  ON bo_truyen.id_bo_truyen = chi_tiet_bo_truyen.id_bo_truyen 
        WHERE chi_tiet_bo_truyen.id_san_pham IS NULL
        ORDER BY san_pham.id_san_pham DESC ;        
";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $lists = array(); // hoặc $products = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Tạo đối tượng sản phẩm từ dữ liệu và thêm vào danh sách
            $product = new SanPham(
                $row['id_san_pham'],
                $row['ten_san_pham'],
                $row['mo_ta'],
                $row['hinh_anh'],
                $row['gia_ban'],
                $row['gia_goc'],
                $row['so_luong'],
                $row['so_trang'],
                $row['id_tac_gia'],
                $row['nam_xb'],
                $row['kich_thuoc'],
                $row['trong_luong'],
                $row['ngay_nhap'],
                $row['id_loai_san_pham'],
                $row['id_bo_truyen'],
                $row['id_nha_san_xuat'],
                $row['id_nha_phat_hanh'],
                $row['trang_thai'],
            );
            $lists[] = $product;
        }
        return $lists;
    }
}
