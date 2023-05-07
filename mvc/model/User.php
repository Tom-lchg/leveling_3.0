<?php

namespace Models\Users;

use \Models\Model;
use PDO;

class User
{
   private $pdo;
   private $model;
   public function __construct()
   {
      $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
      $this->model = new Model('tblUsers');
   }

   public function getAll()
   {
      return $this->model->getAll();
   }

   public function findById($id, $target)
   {
      return $this->model->findById($id, $target);
   }

   public function getUserProfil($pseudo)
   {
      $sql = "SELECT * FROM tblUsers WHERE userPseudo = :psd";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([
         ":psd" => $pseudo
      ]);

      return $stmt->fetch();
   }

   public function insertUser($tab, $tabimg)
   {
      $dateInscription = date('Y-m-d');
      $sql = "CALL insertUserSimple(:plat,:canModify,:nom,:prenom,:age,:bio,:naissance,:level,:pseudo,:mail,:password,:role, :date,:img,:timg,:banner,:tbanner, 0)";
      $data = array(
         ":plat" => "PC",
         ":canModify" => 0,
         ":nom" => htmlspecialchars($tab['nom']),
         ":prenom" => htmlspecialchars($tab['prenom']),
         ":age" => htmlspecialchars($tab['age']),
         ":bio" => htmlspecialchars($tab['bio']),
         ":naissance" => htmlspecialchars($tab['dateNaissance']),
         ":level" => 1,
         ":date" => $dateInscription,
         ":pseudo" => htmlspecialchars($tab['pseudo']),
         ":mail" => htmlspecialchars($tab['email']),
         ":password" => htmlspecialchars($tab['mdp']),
         ":role" => "user",
         ":img" => file_get_contents($tabimg['pp']['tmp_name']),
         ":timg" => $tabimg['pp']['type'],
         ":banner" => file_get_contents($tabimg['banniere']['tmp_name']),
         ":tbanner" => $tabimg['banniere']['type']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   public function updateUser($pseudo, $bio, $id)
   {
      $sql = "UPDATE tblUsers SET userPseudo = :pseudo, userBio = :bio WHERE idUser = :iduser";
      $this->pdo->prepare($sql)->execute([
         ":pseudo" => $pseudo,
         ":bio" => $bio,
         ":iduser" => $id
      ]);
   }

   public function getAllGroupe($iduser)
   {
      $sql = "SELECT * FROM tblGroups WHERE groupeFkIdUser = :iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(array(":iduser" => $iduser));
      return $stmt->fetchAll();
   }

   public function getNumberOfPosts($iduser)
   {
      $sql = "SELECT COUNT(*) FROM tblPosts WHERE fkIdUser = :iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(["iduser" => $iduser]);
      return $stmt->fetchColumn();
   }

   public function setLvlUser()
   {
      // id du user
      $iduser = $_SESSION['id'];
      // on récup l'xp
      $sql_xp = "SELECT userXP from tblUsers WHERE idUser = $iduser";
      $stmt_xp = $this->pdo->query($sql_xp);
      $xpArray = $stmt_xp->fetch();
      $currentXP = $xpArray['userXP'];

      // if pour savoir notre lvl
      if ($currentXP == 0 || $currentXP < 200) {
         $lvl = "1";
      } else if ($currentXP < 300) {
         $lvl = "2";
      } else if ($currentXP < 600) {
         $lvl = "3";
      } else if ($currentXP < 900) {
         $lvl = "4";
      } else if ($currentXP < 1200) {
         $lvl = "5";
      } else if ($currentXP < 1500) {
         $lvl = "6";
      } else if ($currentXP < 1800) {
         $lvl = "7";
      } else if ($currentXP < 2100) {
         $lvl = "8";
      } else if ($currentXP < 2400) {
         $lvl = "9";
      } else if ($currentXP < 2700 || $currentXP > 2700) {
         $lvl = "10";
      }

      return $lvl;
   }

   public function getFriends($idUserConnected)
   {
      $sql = "SELECT userPseudo, userImg, idUser FROM tblUsers INNER JOIN tblFriends ON userFriend = idUser and userConnected = $idUserConnected";

      $stmt = $this->pdo->query($sql);
      return $stmt->fetchAll();
   }

   public function deleteFriend($idFriend)
   {
      $sql = "DELETE from tblFriends WHERE userFriend = $idFriend";
      $this->pdo->query($sql);
   }

   public function topUsers()
   {
      $sql = "SELECT * from tblUsers ORDER BY userXP DESC LIMIT 3";
      return $this->pdo->query($sql)->fetchAll();
   }

   public function findByIdUser($iduser)
   {
      $sql = "SELECT * FROM tblusers WHERE idUser = :iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(array(":iduser" => $iduser));
      return $stmt->fetchAll();
   }
}
