<?php

namespace Models;

use PDO;

class Model
{
   private $table;
   private $pdo;

   public function __construct($table)
   {
      $this->table = $table;
      $this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
        //$this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
   }

   public function getAll()
   {
      return $this->pdo->query("SELECT * FROM $this->table")->fetchAll();
   }

   public function findById($id, $target)
   {
      return $this->pdo->query("SELECT * FROM $this->table WHERE $target = $id")->fetch();
   }

   public function findByIdPc($id, $target)
   {
      return $this->pdo->query("SELECT * FROM tblgamespc WHERE $target = $id")->fetch();
   }

   public function findByIdCs($id, $target)
   {
      return $this->pdo->query("SELECT * FROM tblgamescs WHERE $target = $id")->fetch();
   }

   public function search($word, $type){

      $sql="";

      switch($type){
            case "users":
            $sql = "SELECT userImg, userTypeImg, userPseudo, userLevel FROM tblusers WHERE userPseudo LIKE '%$word%'";
            break;

            case "games":
            $sql = "SELECT idGame, gameImg, gameName, gameGenre FROM tblgames WHERE gameName LIKE '%$word%'";
            break;

            case "groups":
            $sql = "SELECT idGroupe, groupeImg, groupeTypeImg, groupeName, groupePrivacy, groupeDescription FROM tblgroups WHERE groupeName LIKE '%$word%'";
            break;
      }


      $stmt = $this->pdo->query($sql);
      return $stmt->fetchAll();

   }

   public function addXP($target)
   {
      switch ($target) {
         case "post": {
               $xp = 10;
               break;
            }
         case "groupe": {
               $xp = 20;
               break;
            }
      }

      // on récup l'xp actuelle
      $idUser = $_SESSION['id'];
      $sql_xp = "SELECT userXP from tblusers WHERE idUser = $idUser";
      $stmt = $this->pdo->query($sql_xp);
      $xp_array = $stmt->fetch();
      $currentXP = $xp_array['userXP'];

      $sql = "UPDATE tblusers SET userXP = $xp + $currentXP WHERE idUser = :id";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":id" => $_SESSION['id']]);
   }
}
