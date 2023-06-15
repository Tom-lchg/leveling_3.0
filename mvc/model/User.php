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
      //$this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
      $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
      $this->model = new Model('tblusers');
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
      $sql = "SELECT * FROM tblusers WHERE userPseudo = :psd";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([
         ":psd" => $pseudo
      ]);

      return $stmt->fetch();
   }

   public function insertUser($tab, $tabimg)
   {
      $dateInscription = date('Y-m-d');
      $sql = "CALL insertUserSimple(:plat,:canModify,:sexe,:nom,:prenom,:age,:bio,:naissance,:level,:pseudo,:mail,:password,:role, :date,:img,:timg,:banner,:tbanner, 0)";

      // Hasher le mot de passe
      $hashedPassword = password_hash($tab['mdp'], PASSWORD_DEFAULT);

      $data = array(
         ":plat" => "PC",
         ":canModify" => 0,
         ":sexe" => htmlspecialchars($tab['sexe']),
         ":nom" => htmlspecialchars($tab['nom']),
         ":prenom" => htmlspecialchars($tab['prenom']),
         ":age" => htmlspecialchars($tab['age']),
         ":bio" => "Aucune description",
         ":naissance" => htmlspecialchars($tab['dateNaissance']),
         ":level" => 1,
         ":date" => $dateInscription,
         ":pseudo" => htmlspecialchars($tab['pseudo']),
         ":mail" => htmlspecialchars($tab['email']),
         ":password" => $hashedPassword,
         ":role" => "user",
         ":img" => file_get_contents($tabimg['pp']['tmp_name']),
         ":timg" => $tabimg['pp']['type'],
         ":banner" => file_get_contents($tabimg['banniere']['tmp_name']),
         ":tbanner" => $tabimg['banniere']['type']
      );

      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   public function updateUser($bio, $id, $img, $banner)
   {
      $sql = "UPDATE tblusers SET userBio = :bio, userImg = :img, userBanner = :banner WHERE idUser = :iduser";
      $this->pdo->prepare($sql)->execute([
         ":bio" => $bio,
         ":iduser" => $id,
         ":img" => $img,
         ":banner" => $banner,
      ]);
   }

   public function getAllGroupe($iduser)
   {
      $sql = "SELECT * FROM tblgroups WHERE groupeFkIdUser = :iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(array(":iduser" => $iduser));
      return $stmt->fetchAll();
   }

   public function getNumberOfPosts($iduser)
   {
      $sql = "SELECT COUNT(*) FROM tblposts WHERE fkIdUser = :iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(["iduser" => $iduser]);
      return $stmt->fetchColumn();
   }

   public function setLvlUser()
   {
      // id du user
      $iduser = $_SESSION['id'];
      // on récup l'xp
      $sql_xp = "SELECT userXP from tblusers WHERE idUser = $iduser";
      $stmt_xp = $this->pdo->query($sql_xp);
      $xpArray = $stmt_xp->fetch();
      $currentXP = $xpArray['userXP'];

      // if pour savoir notre lvl
      if ($currentXP == 0 || $currentXP < 100) {
         $lvl = "1";
      } else if ($currentXP < 200) {
         $lvl = "2";
      } else if ($currentXP < 300) {
         $lvl = "3";
      } else if ($currentXP < 400) {
         $lvl = "4";
      } else if ($currentXP < 500) {
         $lvl = "5";
      } else if ($currentXP < 600) {
         $lvl = "6";
      } else if ($currentXP < 700) {
         $lvl = "7";
      } else if ($currentXP < 800) {
         $lvl = "8";
      } else if ($currentXP < 900) {
         $lvl = "9";
      } else if ($currentXP < 1000 || $currentXP > 1000) {
         $lvl = "10";
      }

      return $lvl;
   }

   public function getFriends($idUserConnected)
   {
      $sql = "SELECT userPseudo, userImg, idUser, userTypeImg FROM tblusers INNER JOIN tblfriends ON userFriend = idUser and userConnected = $idUserConnected";

      $stmt = $this->pdo->query($sql);
      return $stmt->fetchAll();
   }

   public function deleteFriend($idFriend)
   {
      $sql = "DELETE from tblfriends WHERE userFriend = $idFriend";
      $this->pdo->query($sql);
   }

   public function topUsers()
   {
      $sql = "SELECT * from tblusers ORDER BY userXP DESC LIMIT 3";
      return $this->pdo->query($sql)->fetchAll();
   }

   public function findByIdUser($iduser)
   {
      $sql = "SELECT * FROM tblusers WHERE idUser = :iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(array(":iduser" => $iduser));
      return $stmt->fetchAll();
   }

   public function checkMailAlreadyUser($mail){
      $sql = "SELECT * FROM tblusers WHERE userMail  = :usermail ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(array(":usermail" => $mail));
      return $stmt->fetchAll();
   }

   public function checkPseudoAlreadyUser($username){
      $sql = "SELECT * FROM tblusers WHERE userPseudo  = :userPseudo ";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(array(":userPseudo" => $username));
      return $stmt->fetchAll();
   }

   public function getUserByEmail($email) {
      // Assurez-vous d'avoir une connexion à la base de données ici
      $sql = "SELECT * FROM tblusers WHERE userMail = ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$email]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      $stmt->closeCursor();

      return $user;
   }

   public function getUserPseudo($pseudo) {
      // Assurez-vous d'avoir une connexion à la base de données ici
      $sql = "SELECT * FROM tblusers WHERE userPseudo = ?";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$pseudo]);
      $user = $stmt->fetch(PDO::FETCH_ASSOC);
      $stmt->closeCursor();

      return $user;
   }

}
