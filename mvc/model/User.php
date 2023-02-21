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

   public function getAll(): array
   {
      return $this->model->getAll();
   }

   public function findById(int $id, string $target): array
   {
      return $this->model->findById($id, $target);
   }

   public function getUserProfil(string $pseudo): array | bool
   {
      $sql = "SELECT * FROM tblUsers WHERE userPseudo = :psd";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([
         ":psd" => $pseudo
      ]);

      return $stmt->fetch();
   }

   public function insertUser(object $data): void
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

   public function updateUser(string $pseudo, string $bio, int $id)
   {
      $sql = "UPDATE tblUsers SET userPseudo = :pseudo, userBio = :bio WHERE idUser = :iduser";
      $this->pdo->prepare($sql)->execute([
         ":pseudo" => $pseudo,
         ":bio" => $bio,
         ":iduser" => $id
      ]);
   }

   public function getAllGroupe(string $iduser): array
   {
      $sql = "SELECT * FROM tblGroups WHERE groupeFkIdUser = :iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute(array(":iduser" => $iduser));
      return $stmt->fetchAll();
   }
}
