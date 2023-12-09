<?php
include_once('DAO/ConnectDAO.php');
class User extends BaseDAO
{

    // // lấy id người quản trị web
    public function getId()
    {
        $sql = "SELECT `id_user` FROM `users` WHERE id_quyen = 2";
        $stmt = $this->PDO->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Add user ID to the array
            $userIds = $row['id_user'];
        }
        return $userIds;
    }
}
