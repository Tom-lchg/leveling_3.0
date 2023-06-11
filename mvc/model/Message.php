<?php

namespace Models\Message;

use PDO;
use \Models\Model;

class Message
{
    private $pdo;
    private $model;

    public function __construct()
    {
        //$this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
        $this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
        $this->model = new Model('tblmessages');
    }

    public function getAll()
    {
        return $this->model->getAll();
    }

    public function findById($id, $target)
    {
        return $this->model->findById($id, $target);
    }

    public function insertMessage($msg, $iduser, $idconv)
    {
        $sql = "INSERT INTO tblmessages VALUES(null, :iduser, :idconv, :msg)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":iduser" => $iduser,
            ":idconv" => $idconv,
            ":msg" => $msg
        ]);
    }

    public function getMessage($iduser, $convid, $idFriend)
    {
        $sql = "SELECT m.message, u.userPseudo, u.userImg, u.idUser FROM tblmessages m INNER JOIN tblconversation c INNER JOIN tblusers u WHERE m.fkIdConversation = $convid AND m.fkIdUser = u.idUser";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
