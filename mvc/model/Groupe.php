<?php

namespace Models\Groupe;

use \Models\Model;

use PDO;

class Groupe
{
   private $pdo;
   private $model;
   public function __construct()
   {
      $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
      $this->model = new Model('tblGroups');
   }

   public function getAll()
   {
      return $this->model->getAll();
   }

   public function findById($id, $target)
   {
      return $this->model->findById($id, $target);
   }

   public function createGroupe($tab, $tabimg)
   {
      // on vérifie si le groupe est en publique ou en privé
      if ($tab['privacy'] === 'publique') {
         $sql = "call insertGroupePublic(:groupeMasquer,:nbUserGroupe,:fkIdUser,:groupeName,:groupeDescription,:fkIdUser,:privacy,:pp,:tpp,:banner,:tbanner)";
         $data = array(
            ":groupeMasquer" => 0,
            ":nbUserGroupe" => 0,
            ":groupeName" => htmlspecialchars($tab['nomGroupe']),
            ":groupeDescription" => htmlspecialchars($tab['descGroupe']),
            ":fkIdUser" => $_SESSION['id'],
            ":privacy" => htmlspecialchars($tab['privacy']),
            ":pp" => file_get_contents($tabimg['pp']['tmp_name']),
            ":tpp" => $tabimg['pp']['type'],
            ":banner" => file_get_contents($tabimg['banner']['tmp_name']),
            ":tbanner" => $tabimg['pp']['type']
         );
         $prepare = $this->pdo->prepare($sql);
         $prepare->execute($data);
      } else {
         $sql = "call insertGroupePrivate(:groupeMasquer,:nbUserGroupe,:fkIdUser,:groupeName,:groupeDescription,:fkIdUser,:privacy,:pp,:tpp,:banner,:tbanner)";
         $data = array(
            ":groupeMasquer" => 1,
            ":nbUserGroupe" => 0,
            ":groupeName" => htmlspecialchars($tab['nomGroupe']),
            ":groupeDescription" => htmlspecialchars($tab['descGroupe']),
            ":fkIdUser" => $_SESSION['id'],
            ":privacy" => htmlspecialchars($tab['privacy']),
            ":pp" => file_get_contents($tabimg['pp']['tmp_name']),
            ":tpp" => $tabimg['pp']['type'],
            ":banner" => file_get_contents($tabimg['banner']['tmp_name']),
            ":tbanner" => $tabimg['pp']['type']
         );
         $prepare = $this->pdo->prepare($sql);
         $prepare->execute($data);
      }
   }

   public function getAllGroupsPublic()
   {
      $sql = "SELECT * FROM tblgroupspublic";
      $stmt = $this->pdo->query($sql);
      return $stmt->fetchAll();
   }
   public function getAllGroups()
   {
      $sql = "SELECT * FROM tblgroups";
      $stmt = $this->pdo->query($sql);
      return $stmt->fetchAll();
   }

   public function getOneGroupPublic($idgroupe)
   {
      $sql = "SELECT * FROM tblgroupspublic WHERE idGroupe = :idgroupe";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idgroupe" => $idgroupe]);
      return $stmt->fetch();
   }

   public function getOneGroupPrive($idgroupe)
   {
      $sql = "SELECT * FROM tblgroupsprivate WHERE idGroupe = :idgroupe";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idgroupe" => $idgroupe]);
      return $stmt->fetch();
   }
}
