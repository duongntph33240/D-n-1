<?php
include_once '../../DAO/GioHangDAOAPI.php';
class GioHangControllerAPI
{
    public function index($id)
    {
        $GioHangDAO = new GioHangDAOAPI();
        $GioHangDAO->add_card($id);
    }
    public function dow($id)
    {
        $GioHangDAO = new GioHangDAOAPI();
        $a = $GioHangDAO->down_card($id);
        return $a;
    }
    public function up($id)
    {
        $GioHangDAO = new GioHangDAOAPI();
        $a = $GioHangDAO->up_card($id);
        return $a;
    }
    public function delete($id)
    {
        $GioHangDAO = new GioHangDAOAPI();
        $a = $GioHangDAO->delete($id);
        return $a;
    }
    public function sum($id)
    {
        $GioHangDAO = new GioHangDAOAPI();
        $a = $GioHangDAO->sum($id);
        return $a;
    }
}
