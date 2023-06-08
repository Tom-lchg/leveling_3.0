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
      $this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
      //$this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
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
      $sql = "SELECT * FROM tblgameposts INNER JOIN tblusers WHERE fkIdGame = :idgame AND idUser = fkidUser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idgame" => $idgame]);
      return $stmt->fetchAll();
   }

   // fonction qui calcule la moyenne des notes pour un jeu

   public function gradeMoy($idgame)
   {
      $sql1 = "SELECT COUNT(*) FROM tblgameposts  WHERE fkIdGame =" . $idgame . "";
      $sql2 = "SELECT postGrade FROM tblgameposts WHERE fkIdGame =" . $idgame . "";

      $nbGrade = $this->pdo->query($sql1)->fetch();
      $allGrades = $this->pdo->query($sql2)->fetchAll();

      $totalArrayGrades = array();

      foreach ($allGrades as $oneGrade) {
         array_push($totalArrayGrades, $oneGrade['postGrade']);
      }

      // additionne toutes les valeurs du tableau des notes
      $totalGrades = array_sum($totalArrayGrades);

      // intval pour convertir de string à int
      $gradeMoy = $totalGrades / intval($nbGrade['COUNT(*)']);

      // arrondit la moyenne à la dizaine
      return round($gradeMoy);
   }

   // Supprimer un avis sur un jeu

   public function delGamePost($idgamepost, $iduser)
   {
      $sql = "DELETE FROM tblgameposts WHERE idGamePost = :idgamepost and fkidUser = :iduser";
      $a = [":idpost" => $idpost, ":iduser" => $iduser];
      $this->pdo->prepare($sql)->execute($a);
   }
}
