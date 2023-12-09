<?php
include_once 'DAO/ConnectDAO.php';
class trangChuDAO extends BaseDAO
{
    // kết nối database

    // tổng hợp đơn hàng đã và đang giao , và doanh thu của thàng hiện tại
    public function show_thong_ke()
    {
        $sql = "SELECT SUM(chi_tiet_don_hang.gia*chi_tiet_don_hang.so_luong) as tong_tien, COUNT(*) as so_don_hang FROM don_hang join chi_tiet_don_hang ON chi_tiet_don_hang.id_don_hang = don_hang.id_don_hang  WHERE  MONTH(don_hang.thoi_gian) = MONTH(NOW()) AND YEAR(don_hang.thoi_gian)=YEAR(NOW()) AND don_hang.id_trang_thai_don_hang = 3";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    // tổng hợp đơn hàng chưa giao của thangs
    public function don_hang_chua_giao()
    {
        $sql = "SELECT COUNT(*) as soluong FROM `don_hang` JOIN trang_thai_don_hang ON don_hang.id_trang_thai_don_hang = trang_thai_don_hang.id_trang_thai_don_hang WHERE don_hang.id_trang_thai_don_hang != 3 and don_hang.id_trang_thai_don_hang != 2 and MONTH(don_hang.thoi_gian) = MONTH(NOW()) AND YEAR(don_hang.thoi_gian)=YEAR(NOW()) ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    // tổng hợp tất cả đơn hàng của tháng
    public function don_hang()
    {
        $sql = "SELECT COUNT(*) as soluong FROM `don_hang` WHERE MONTH(don_hang.thoi_gian) = MONTH(NOW()) AND YEAR(don_hang.thoi_gian)=YEAR(NOW()) ";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    // tổng hợp những khách hàng đang phản hồi
    public function phanhoi()
    {
        $sql = "SELECT COUNT(*) as soluong FROM `chatbox` JOIN users ON users.id_user = chatbox.id_out WHERE users.id_quyen=4";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    // tổng hợp toàn bộ sản phẩm
    public function all_san_pahm()
    {
        $sql = "SELECT COUNT(*) as soluong FROM `san_pham` WHERE trang_thai=1";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    // tổng hợp sản phẩm của từng loại
    public function List_san_pham()
    {
        $sql = " SELECT loai_san_pham.ten_loai_san_pham, COUNT(san_pham.id_san_pham) AS so_luong_sach
        FROM loai_san_pham
         LEFT JOIN bo_truyen ON loai_san_pham.id_loai_san_pham = bo_truyen.id_loai_san_pham
         LEFT JOIN chi_tiet_bo_truyen ON chi_tiet_bo_truyen.id_bo_truyen = bo_truyen.id_bo_truyen
         LEFT JOIN san_pham ON san_pham.id_san_pham = chi_tiet_bo_truyen.id_san_pham AND san_pham.trang_thai = 1
         GROUP BY loai_san_pham.id_loai_san_pham, loai_san_pham.ten_loai_san_pham;";

        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        // Fetch all rows
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
    // tổng hợp đơn hàng của mỗi loại sản phẩm
    public function all_don_hang()
    {
        $sql = "SELECT
        lsp.ten_loai_san_pham,
        COUNT( CASE WHEN dh.id_trang_thai_don_hang not in (1,4,5) THEN ctdh.id_san_pham END) AS so_luong_san_pham
    FROM
        loai_san_pham lsp
    LEFT JOIN bo_truyen ON lsp.id_loai_san_pham = bo_truyen.id_loai_san_pham
        LEFT JOIN chi_tiet_bo_truyen ON chi_tiet_bo_truyen.id_bo_truyen = bo_truyen.id_bo_truyen
        LEFT JOIN san_pham ON san_pham.id_san_pham = chi_tiet_bo_truyen.id_san_pham 
        
    LEFT JOIN
        chi_tiet_don_hang ctdh ON san_pham.id_san_pham = ctdh.id_san_pham
    LEFT JOIN
        don_hang dh ON ctdh.id_don_hang = dh.id_don_hang 
    GROUP BY
        lsp.id_loai_san_pham, lsp.ten_loai_san_pham;";

        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        // Fetch all rows
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }
}
