<?php

namespace Models\GamePost;

use PDO;
use \Models\Model;

class GamePost
{
   private $pdo;
   private $model;
   public function __construct()
   {
      $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
      $this->model = new Model('tblgameposts');
   }

   public function getAll()
   {
      return $this->model->getAll();
   }

   public function findById($id, $target)
   {
      return $this->model->findById($id, $target);
   }

   public function createPost($content, $grade, $idgame)
   {
      $sql = "INSERT INTO tblgameposts VALUES(null, :postcontent, :postgrade, :iduser, :idgame)";
      $array = [
         ":postcontent" => $content,
         ":postgrade" => $grade,
         ":iduser" => $_SESSION['id'],
         ":idgame" => $idgame
      ];

      $this->pdo->prepare($sql)->execute($array);

      // ajoute l'XP
      $this->model->addXP('post');
   }


   public function delPost($idpost, $iduser)
   {
      $sql = "DELETE FROM tblgameposts WHERE idGamePost = :idgamepost and fkIdUser = :iduser";
      $a = [":idgamepost" => $idpost, ":iduser" => $iduser];
      $this->pdo->prepare($sql)->execute($a);
   }

   public function getAllPostsFromGame($idgame)
   {
      $sql = "SELECT * FROM tblgameposts INNER JOIN tblUsers WHERE fkIdGame = :idgame AND idUser = fkidUser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idgame" => $idgame]);
      return $stmt->fetchAll();
   }
}
