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

   public function insertUser($tab , $tabimg)
   {
      $dateInscription = date('Y-m-d');
      $sql = "CALL insertUserSimple(:plat,:canModify,:nom,:prenom,:age,:bio,:naissance,:level,:pseudo,:mail,:password,:role,sysdate(),:img,:timg,:banner,:tbanner)";
      $data = array(
         ":plat" => "PC",
         ":canModify" => 0,
         ":nom" => htmlspecialchars($tab['nom']),
         ":prenom" => htmlspecialchars($tab['prenom']),
         ":age" => htmlspecialchars($tab['age']),
         ":bio" => htmlspecialchars($tab['bio']),
         ":naissance" => htmlspecialchars($tab['dateNaissance']),
         ":level" => 1,
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

   public function findByIdUser($iduser){
      $sql = "SELECT * FROM tblusers WHERE idUser = :iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(array(":iduser" => $iduser));
      return $stmt->fetchAll();
   }


}
