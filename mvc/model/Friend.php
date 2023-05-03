<?php

namespace Models\Friend;

use PDO;
use \Models\Model;

class Friend
{
    private $pdo;
    private $model;
    public function __construct()
    {
        $this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
        $this->model = new Model('tblFriends');
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
        $sql = "INSERT INTO tblFriends VALUES(null, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$_SESSION['id'], $idFriend]);
    }

    public function getFriends($idUser)
    {
        $sql = "SELECT * FROM tblFriends INNER JOIN tblusers ON userFriend = idUser WHERE userConnected = $idUser";
        $stmt = $this->pdo->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function isFriend($idUserConnected, $idUserFriend)
    {
        $sql = "SELECT * FROM tblFriends WHERE userConnected = :userCo";
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
        $sql = "DELETE FROM tblFriends WHERE userFriend = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userFriend]);
    }
}
