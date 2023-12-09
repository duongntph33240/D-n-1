<?php
class BaseDAO
{
    protected $PDO;

    public function __construct()
    {
        global $pdo;
        require_once('config/PDO.php');  // Sử dụng global để chia sẻ biến $pdo giữa các DAO
        $this->PDO = $pdo;
    }
}
