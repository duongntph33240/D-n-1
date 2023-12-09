<?php
class ChuyenDoiController
{
    public function index()
    {
        if (isset($_SESSION['chuyen'])) {
            unset($_SESSION['chuyen']);
        } else {
            $_SESSION['chuyen'] = "1";
        }
        header('location: index.php?controller=trangChu');
    }
}
