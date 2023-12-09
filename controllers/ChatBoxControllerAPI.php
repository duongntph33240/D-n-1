<?php
include '../../DAO/ChatBoxDAO.php';
class ChatBoxControllerAPI
{

    public function getchat()
    {
        $ChatBoxDAO = new ChatBoxDAO();
        $ChatBoxDAO->getChat();
    }
    public function insertChat()
    {
        $ChatBoxDAO = new ChatBoxDAO();
        $ChatBoxDAO->insertChat();
    }
    public function getusers()
    {
        $ChatBoxDAO = new ChatBoxDAO();
        $ChatBoxDAO->getusers();
    }
    public function Search($sql)
    {
        $ChatBoxDAO = new ChatBoxDAO();
        $ChatBoxDAO->searchUser($sql);
    }
    public function getInfrom()
    {
        $ChatBoxDAO = new ChatBoxDAO();
        $ChatBoxDAO->getInfrom();
    }
}
