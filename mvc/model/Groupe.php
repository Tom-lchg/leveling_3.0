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
            ":nbUserGroupe" => 1,
            ":groupeName" => htmlspecialchars($tab['nomGroupe']),
            ":groupeDescription" => htmlspecialchars($tab['descGroupe']),
            ":fkIdUser" => $_SESSION['id'],
            ":privacy" => htmlspecialchars($tab['privacy']),
            ":pp" => file_get_contents($tabimg['pp']['tmp_name']),
            ":tpp" => $tabimg['pp']['type'],
            ":banner" => file_get_contents($tabimg['banner']['tmp_name']),
            ":tbanner" => $tabimg['banner']['type']
         );
         $prepare = $this->pdo->prepare($sql);
         $prepare->execute($data);
      } else {
         $sql = "call insertGroupePrivate(:groupeMasquer,:nbUserGroupe,:fkIdUser,:groupeName,:groupeDescription,:fkIdUser,:privacy,:pp,:tpp,:banner,:tbanner)";
         $data = array(
            ":groupeMasquer" => 1,
            ":nbUserGroupe" => 1,
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

public function getAllGroupsPublic(){
   $sql = "SELECT * FROM tblgroupspublic";
   $stmt = $this->pdo->query($sql);
   return $stmt->fetchAll();
}
public function getAllGroups(){
   $sql = "SELECT * FROM tblgroups";
   $stmt = $this->pdo->query($sql);
   return $stmt->fetchAll();
}

public function getOneGroupPublic($idgroupe){
   $sql = "SELECT * FROM tblgroupspublic WHERE idGroupe = :idgroupe";
   $stmt = $this->pdo->prepare($sql);
   $stmt->execute([":idgroupe" => $idgroupe]);
   return $stmt->fetch();
}

public function getOneGroupPrive($idgroupe){
   $sql = "SELECT * FROM tblgroupsprivate WHERE idGroupe = :idgroupe";
   $stmt = $this->pdo->prepare($sql);
   $stmt->execute([":idgroupe" => $idgroupe]);
   return $stmt->fetch();
}

public function verifCreateGroup($idGroupe, $idUser){
   $sql = "SELECT idGroupe, groupeFkIdUser from tblgroups WHERE idGroupe =:idgroupe AND groupeFkIdUser= :iduser";
   $data = array(
      ":idgroupe" => $idGroupe,
      ":iduser" => $idUser
   );
   $prepare = $this->pdo->prepare($sql);
   $prepare->execute($data);
   return $prepare->fetchAll();
}

public function verifUserGroupeAlready($idGroupe, $idUser){
   $sql = "SELECT * FROM tblgroupsuser WHERE idgroupe=:idgroupe AND iduser=:iduser";
   $data = array(
      ":idgroupe" => $idGroupe,
      ":iduser" => $idUser
   );

   $prepare = $this->pdo->prepare($sql);
   $prepare->execute($data);
   return $prepare->fetchAll();
}


public function addUserOnGroup($idGroupe, $idUser){
   $validation= null;
   $verifCreateGroup = $this->verifCreateGroup($idGroupe, $idUser);
   $verifUserGroupeAlready = $this->verifUserGroupeAlready($idGroupe, $idUser);
   if($verifUserGroupeAlready){
      $validation=false;
   }else{
      
      $validation= true;
      $sql = "INSERT INTO tblgroupsuser VALUES(null,:idgroupe,:iduser)";
      $data = array(
      ":idgroupe" => $idGroupe,
      ":iduser" => $idUser
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   return $validation;
   
}
public function findbyIdGroupe($idgroupe){
   $sql = "SELECT * FROM tblgroups WHERE idGroupe=:idgroupe";
   $stmt = $this->pdo->prepare($sql);
   $stmt->execute([":idgroupe" => $idgroupe]);
   return $stmt->fetchAll();
}



public function insertInGroupUser($idgroupe , $iduser){
   $sql = "INSERT INTO tblgroupsuser(null,:idgroupe,:iduser)";
   $data = array(
      ":idgroupe" => $idgroupe,
      ":iduser" => $iduser
      );
   $prepare = $this->pdo->prepare($sql);
   $prepare->execute($data);

}



public function getGroupbyUser($iduser){
   $sql = "SELECT * FROM tblgroupsuser WHERE iduser=:iduser";
   $stmt = $this->pdo->prepare($sql);
   $stmt->execute([":iduser" => $iduser]);
   return $stmt->fetchAll();
}

public function getGroupbyIdGroupe($idgroupe){
   $sql = "SELECT * FROM tblgroupsuser WHERE idgroupe=:idgroupe";
   $stmt = $this->pdo->prepare($sql);
   $stmt->execute([":idgroupe" => $idgroupe]);
   return $stmt->fetchAll();
}

public function dropUserOnGroup($idGroupe, $idUser){
   $sql = "DELETE FROM tblgroupsuser WHERE idgroupe=:idgroupe AND iduser=:iduser";
   $data = array(
      ":idgroupe" => $idGroupe,
      ":iduser" => $idUser
      );
   $prepare = $this->pdo->prepare($sql);
   $prepare->execute($data);
}







}