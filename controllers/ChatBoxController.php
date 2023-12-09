<?php
include_once 'DAO/ChatBoxDAOAPI.php';
class ChatBoxController
{
    public function index()
    {
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    $ChatBoxDAO = new User();
                    $id = $ChatBoxDAO->getId();
                    $GioHangDAO = new GioHangDAO();
                    $sum = $GioHangDAO->sum($_SESSION['id']);
                    $LoaiTruyenDAO = new LoaiTruyenDAO();
                    $danh_muc = $LoaiTruyenDAO->show();
                    include_once "views/chatbox/user/chatbox.php";
                } else {
                    include_once "views/chatbox/admin/users.php";
                }
            } else {
                $ChatBoxDAO = new User();
                $id = $ChatBoxDAO->getId();
                $GioHangDAO = new GioHangDAO();
                $sum = $GioHangDAO->sum($_SESSION['id']);
                $LoaiTruyenDAO = new LoaiTruyenDAO();
                $danh_muc = $LoaiTruyenDAO->show();
                include_once "views/chatbox/user/chatbox.php";
            }
        } else {
            header('location: index.php?controller=dangNhap');
        }
    }
    public function chat()
    {

        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] != 4) {
                if (isset($_SESSION['chuyen'])) {
                    $ChatBoxDAO = new User();
                    $id = $ChatBoxDAO->getId();
                    include_once "views/chatbox/user/chatbox.php";
                } else {
                    include_once "views/chatbox/admin/chatbox.php";
                }
            } else {
                $ChatBoxDAO = new User();
                $id = $ChatBoxDAO->getId();
                include_once "views/chatbox/user/chatbox.php";
            }
        } else {
            header("Location: index.php?controller=dangNhap");
        }
    }
}
