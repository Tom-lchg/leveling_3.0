<?php

namespace Models\Friend;

use PDO;
use \Models\Model;
use Conversation\Conversation;

class Friend
{
    private $pdo;
    private $model;
    private $conversationControler;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
        //$this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
        $this->model = new Model('tblfriends');
    }

    public function getAll()
    {
        return $this->model->getAll();
    }

    public function findById($id, $target)
    {
        return $this->model->findById($id, $target);
    }

    public function addFriends($idFriend)
    {
        $sql = "INSERT INTO tblfriends VALUES(null, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$_SESSION['id'], $idFriend]);

        // on créer la conversation
        $this->conversationControler->checkConvIfExist($idFriend);
    }

    public function getFriends($idUser)
    {
        $sql = "SELECT * FROM tblfriends INNER JOIN tblusers ON userFriend = idUser WHERE userConnected = $idUser";
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function isFriend($idUserConnected, $idUserFriend)
    {
        $sql = "SELECT * FROM tblfriends WHERE userConnected = :userCo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":userCo" => $idUserConnected]);

        $friends = $stmt->fetchAll();
        $check = false;

        foreach ($friends as $f) {
            if ($f['userFriend'] === $idUserFriend) {
                $check = true;
            } else {
                $check = false;
            }
        }

        return $check;
    }

    public function removeFriend($userFriend)
    {
        $sql = "DELETE FROM tblfriends WHERE userFriend = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userFriend]);
    }
}
