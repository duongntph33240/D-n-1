<?php
include_once('../../DAO/BinhLuanDAOAPI.php');
class BinhLuanControllerAPI
{
    public function add($id, $commet)
    {
        $BinhLuan = new BinhLuanDAOAPI();
        $a =  $BinhLuan->add($id, $commet);
        return $a;
    }
    public function add_star($id, $commet)
    {
        $BinhLuan = new BinhLuanDAOAPI();
        $a =  $BinhLuan->add_star($id, $commet);
        return $a;
    }
}
