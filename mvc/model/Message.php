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
        $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
        $this->model = new Model('tblMessages');
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
        $sql = "SELECT u.userPseudo, m.message FROM tblConversation c INNER JOIN tblUsers u INNER JOIN tblMessages m WHERE c.idConversation = :convid AND u.idUser = :iduser AND m.fkIdUser = :iduser AND c.idFriend = :idf";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ":iduser" => $iduser,
            ":convid" => $convid,
            ":idf" => $idFriend
        ]);

        return $stmt->fetchAll();
    }
}
