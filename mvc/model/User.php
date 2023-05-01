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

   public function insertUser($data)
   {
      $this->pdo->query("call insertUserSimple(
         'PC',
         0,
         '$data->nom',
         '$data->prenom',
         $data->age,
         '$data->bio',
         '$data->dateNaissance',
         1,
         '$data->pseudo',
         '$data->email',
         '$data->mdp',
         'user',
         'dateInscription',
         '$data->pp',
         '$data->pptype',
         '$data->banniere',
         '$data->bannieretype'
      )");
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
      if ($currentXP === 0) {
         $lvl = "novice";
      } else if ($currentXP < 300) {
         $lvl = "apprentice";
      } else if ($currentXP < 600) {
         $lvl = "adept";
      } else if ($currentXP < 900) {
         $lvl = "veteran";
      } else if ($currentXP < 1200) {
         $lvl = "pro";
      } else if ($currentXP < 1500) {
         $lvl = "expert";
      } else if ($currentXP < 1800) {
         $lvl = "champion";
      } else if ($currentXP < 2100) {
         $lvl = "master";
      } else if ($currentXP < 2400) {
         $lvl = "grand_master";
      } else if ($currentXP < 2700) {
         $lvl = "legend";
      }

      return $lvl;
   }
}
