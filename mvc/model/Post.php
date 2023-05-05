<?php

namespace Models\Posts;

use PDO;
use \Models\Model;

class Post
{
   private $pdo;
   private $model;
   public function __construct()
   {
      $this->pdo = new PDO('mysql:host=localhost;dbname=testleveling', 'root', '');
      //$this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
      $this->model = new Model('tblPosts');
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

   public function createPost($content)
   {
      $sql = "INSERT INTO tblposts VALUES(null, :iduser, :content, 0, 0)";
      $array = [
         ":iduser" => $_SESSION['id'],
         ":content" => $content
      ];

      $this->pdo->prepare($sql)->execute($array);

      // ajoute l'XP
      $this->model->addXP('post');
   }

   public function createGamePost($gamepostgrade, $gamepostcontent, $gameid)
   {
      $sql = "INSERT INTO tblgameposts VALUES(null, :postContent, :postGrade, :iduser, :gameid)";
      $array = [
         ":postContent" => $gamepostcontent,
         ":postGrade" => $gamepostgrade,
         ":gameid" => $gameid,
         ":iduser" => $_SESSION['id'],
         ":gameid" => $gameid
      ];

      $this->pdo->prepare($sql)->execute($array);

      // ajoute l'XP
      $this->model->addXP('post');
   }


   public function getAllPosts()
   {
      $sql = "SELECT * FROM tblposts INNER JOIN tblusers WHERE fkIdUser = tblusers.iduser";
      $stmt = $this->pdo->query($sql);
      return $stmt->fetchAll();
   }

   public function delPost($idpost, $iduser)
   {
      $sql = "DELETE FROM tblposts WHERE idPost = :idpost and fkIdUser = :iduser";
      $a = [":idpost" => $idpost, ":iduser" => $iduser];
      $this->pdo->prepare($sql)->execute($a);
   }

   public function getAllPostsFromUser($iduser)
   {
      $sql = "SELECT * FROM tblposts WHERE fkIdUser = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":id" => $iduser]);
      return $stmt->fetchAll();
   }


   public function getMessage($idpost)
   {
      $sql = "SELECT postContent from tblposts WHERE idPost = :idpost";
      $stmt = $this->pdo->prepare($sql);
      // $stmt->execute([":idpost" => $idpost]);
      $result = $stmt->fetch();
      if ($result) {
         return $result['postContent'];
      } else {
         return null;
      }
   }
}
