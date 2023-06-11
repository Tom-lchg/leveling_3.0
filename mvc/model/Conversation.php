<?php

namespace Models\Conversation;

use PDO;
use \Models\Model;

class Conversation
{
    private $pdo;
    private $model;
    public function __construct()
    {
         //$this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
        $this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
        //$this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
        $this->model = new Model('tblconversation');
    }

    public function getAll()
    {
        return $this->model->getAll();
    }

    public function findById($id, $target)
    {
        return $this->model->findById($id, $target);
    }

    public function createConv($idOwner, $idFriend)
    {
        $sql = "INSERT INTO tblconversation VALUES(null, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$idOwner, $idFriend]);
    }

    public function getConversation($idUserConnected)
    {
        $sql = "SELECT * FROM tblconversation INNER JOIN tblusers WHERE idUserConnected = $idUserConnected AND idUser = idFriend";
        return $this->pdo->query($sql)->fetchAll();
    }
}
