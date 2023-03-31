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
      $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
      $this->model = new Model('tblPosts');
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
      $sql = "INSERT INTO tblPosts VALUES(null, :iduser, :content, 0, 0)";
      $array = [
         ":iduser" => $_SESSION['id'],
         ":content" => $content
      ];

      $this->pdo->prepare($sql)->execute($array);
   }

   public function getAllPosts()
   {
      $sql = "SELECT * FROM tblPosts INNER JOIN tblUsers WHERE fkIdUser = tblusers.iduser";
      $stmt = $this->pdo->query($sql);
      return $stmt->fetchAll();
   }

   public function delPost($idpost)
   {
      $sql = "DELETE FROM tblposts WHERE idPost = :idpost and fkIdUser = :iduser";
      $a = [":idpost" => $idpost, ":iduser " => $_SESSION['id']];
      $this->pdo->prepare($sql)->execute($a);
   }

   public function getAllPostsFromUser($iduser)
   {
      $sql = "SELECT * FROM tblPosts WHERE fkIdUser = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":id" => $iduser]);
      return $stmt->fetchAll();
   }
}
