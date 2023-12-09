<?php
include_once('../../DAO/DonHangDAOAPI.php');
class DonHangControllerAPI
{
    public function showUser($id)
    {
        $DonHangDAOAPI = new DonHangDAOAPI();
        $a = $DonHangDAOAPI->showUser($id);
        return $a;
    }
    public function showPro($id)
    {
        $DonHangDAOAPI = new DonHangDAOAPI();
        $a = $DonHangDAOAPI->showPro($id);
        return $a;
    }
    public function showMD($id)
    {
        $DonHangDAOAPI = new DonHangDAOAPI();
        $a = $DonHangDAOAPI->showMD($id);
        return $a;
    }
    public function showTT($id)
    {
        $DonHangDAOAPI = new DonHangDAOAPI();
        $a = $DonHangDAOAPI->showTT($id);
        return $a;
    }
    public function update($id, $trang_thai, $ghi_chu)
    {
        $DonHangDAOAPI = new DonHangDAOAPI();
        $a = $DonHangDAOAPI->update($id, $trang_thai, $ghi_chu);
        return $a;
    }
}
