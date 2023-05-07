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
        $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
        $this->model = new Model('tblConversation');
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
        $sql = "INSERT INTO tblConversation VALUES(null, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$idOwner, $idFriend]);
    }

    public function getConversation($idUserConnected)
    {
        $sql = "SELECT * FROM tblConversation INNER JOIN tblUsers WHERE idUserConnected = $idUserConnected AND idUser = idFriend";
        return $this->pdo->query($sql)->fetchAll();
    }
}
