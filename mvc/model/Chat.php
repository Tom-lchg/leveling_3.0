<?php

namespace Models\Chat;

use PDO;
use \Models\Model;

class Chat
{
    private $pdo;
    private $model;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
        //$this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
        $this->model = new Model('tblchat');
    }

    public function getAll()
    {
        return $this->model->getAll();
    }

    public function findById($id, $target)
    {
        return $this->model->findById($id, $target);
    }

    public function getMessageFromUser()
    {
        $sql = "SELECT c.chatMessage, u.idUser ,u.userPseudo, u.userImg, c.chatHeure from tblchat as c, tblusers as u WHERE u.idUser = c.fkIdUser";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function sendMessage($iduser, $message)
    {
        // réglage pour l'heure
        date_default_timezone_set('Europe/Paris');
        $time = date('h:i', time());

        $sql = "INSERT INTO tblchat VALUES(null, :message, :heure, :iduser)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":message" => $message,
            ":iduser" => $iduser,
            ":heure" => $time
        ]);
    }
}
