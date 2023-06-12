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
      // $this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
      $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
      $this->model = new Model('tblgroups');
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

   public function verifCreateGroup($idGroupe, $idUser)
   {
      $sql = "SELECT idGroupe, groupeFkIdUser from tblgroups WHERE idGroupe =:idgroupe AND groupeFkIdUser= :iduser";
      $data = array(
         ":idgroupe" => $idGroupe,
         ":iduser" => $idUser
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
      return $prepare->fetchAll();
   }

   public function verifUserGroupeAlready($idGroupe, $idUser)
   {
      $sql = "SELECT * FROM tblgroupsuser WHERE idgroupe=:idgroupe AND iduser=:iduser";
      $data = array(
         ":idgroupe" => $idGroupe,
         ":iduser" => $idUser
      );

      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
      return $prepare->fetchAll();
   }


   public function addUserOnGroup($idGroupe, $idUser)
   {
      $validation = null;
      $verifCreateGroup = $this->verifCreateGroup($idGroupe, $idUser);
      $verifUserGroupeAlready = $this->verifUserGroupeAlready($idGroupe, $idUser);
      if ($verifUserGroupeAlready) {
         $validation = false;
      } else {

         $validation = true;
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
   public function findbyIdGroupe($idgroupe)
   {
      $sql = "SELECT * FROM tblgroups WHERE idGroupe=:idgroupe";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idgroupe" => $idgroupe]);
      return $stmt->fetchAll();
   }



   public function insertInGroupUser($idgroupe, $iduser)
   {
      $sql = "INSERT INTO tblgroupsuser values(null,:idgroupe,:iduser)";
      $data = array(
         ":idgroupe" => $idgroupe,
         ":iduser" => $iduser
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }



   public function getGroupPublicbyUser($iduser)
   {
      $sql = "SELECT * FROM tblgroupsuser WHERE iduser=:iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":iduser" => $iduser]);
      return $stmt->fetchAll();
   }

   public function getGroupbyIdGroupe($idgroupe)
   {
      $sql = "SELECT * FROM tblgroupsuser WHERE idgroupe=:idgroupe";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idgroupe" => $idgroupe]);
      return $stmt->fetchAll();
   }

   public function dropUserOnGroup($idGroupe, $idUser)
   {
      $sql = "DELETE FROM tblgroupsuser WHERE idgroupe=:idgroupe AND iduser=:iduser";
      $data = array(
         ":idgroupe" => $idGroupe,
         ":iduser" => $idUser
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   public function addTopics($tab)
   {
      $sql = "INSERT INTO tbltopics VALUES(null, :idgroupe, :idauteur, sysdate(),:titre, :content, 0)";
      $data = array(
         ":idgroupe" => htmlspecialchars($tab['idgroupe']),
         ":idauteur" =>  htmlspecialchars($tab['idauteur']),
         ":titre" =>  htmlspecialchars($tab['titreSujet']),
         ":content" =>  htmlspecialchars($tab['descSujet'])
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   public function topicByGroup($idgroupe)
   {
      $sql = "SELECT * FROM tbltopics WHERE idgroupe = :idgroupe";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idgroupe" => $idgroupe]);
      return $stmt->fetchAll();
   }

   public function getTopicById($idtopic)
   {
      $sql = "SELECT * FROM tbltopics WHERE idsujet= :idtopic";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idtopic" => $idtopic]);
      return $stmt->fetchAll();
   }


   public function addAnswerbyTopic($tab)
   {
      $sql = "INSERT INTO tbltopicsanswers VALUES(null, :idgroupe, :idsujet, :idUserAnswer, sysdate(), :content)";
      $data = array(
         ":idgroupe" => htmlspecialchars($tab['idgroupe']),
         ":idsujet" => htmlspecialchars($tab['idsujet']),
         ":idUserAnswer" => htmlspecialchars($tab['idauteur']),
         ":content" => htmlspecialchars($tab['descAnswers'])
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   public function updateNbReponseForTopic($idsujet)
   {
      $sql = "UPDATE tbltopics SET nbReponse= nbReponse + 1 WHERE idsujet = :idsujet";
      $data = array(
         ":idsujet" => htmlspecialchars($idsujet)
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   public function findTopicById($idsujet)
   {
      $sql = "SELECT * from tbltopicsanswers WHERE idtopic = :idtopic";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idtopic" => $idsujet]);
      return $stmt->fetchAll();
   }

   public function verifCreateUserbyGroupe($idgroupe, $iduser)
   {
      $sql = "SELECT * FROM tblgroups WHERE groupeFkIdUser = :iduser AND idGroupe = :idgroupe";

      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":iduser" => $iduser, ":idgroupe" => $idgroupe]);
      return $stmt->fetchAll();
   }


   public function updateGroupePublicNameAndDesc($tab)
   {
      $sql = "UPDATE tblgroups SET  groupeName = :newGroupeName, groupeDescription = :newGroupeDesc WHERE idGroupe = :idGroupe";
      $data = array(
         ":newGroupeName" => $tab['update-title'],
         ":newGroupeDesc" => $tab['update-desc'],
         ":idGroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);

      $sql = "UPDATE tblgroupspublic SET  groupeName = :newGroupeName , groupeDescription = :newGroupeDesc WHERE idGroupe = :idGroupe";
      $data = array(
         ":newGroupeName" => $tab['update-title'],
         ":newGroupeDesc" => $tab['update-desc'],
         ":idGroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   public function updateGroupPublicPdp($tab, $tabimg)
   {
      $sql = "UPDATE tblgroups SET  groupeImg = :pp , groupeTypeImg = :pptype WHERE idGroupe =:idgroupe";
      $data = array(
         ":pp" => file_get_contents($tabimg['update-group-profil']['tmp_name']),
         ":pptype" => $tabimg['update-group-profil']['type'],
         ":idgroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);

      $sql = "UPDATE tblgroupspublic SET  groupeImg = :pp , groupeTypeImg = :pptype WHERE idGroupe =:idgroupe";
      $data = array(
         ":pp" => file_get_contents($tabimg['update-group-profil']['tmp_name']),
         ":pptype" => $tabimg['update-group-profil']['type'],
         ":idgroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   public function updateGroupePublicBanner($tab, $tabimg)
   {
      $sql = "UPDATE tblgroups SET  groupeBanner = :banner , groupeTypeBanner = :bannertype WHERE idGroupe =:idgroupe";
      $data = array(
         ":banner" => file_get_contents($tabimg['update-group-banner']['tmp_name']),
         ":bannertype" => $tabimg['update-group-banner']['type'],
         ":idgroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);

      $sql = "UPDATE tblgroupspublic SET  groupeBanner = :banner , groupeTypeBanner = :bannertype WHERE idGroupe =:idgroupe";
      $data = array(
         ":banner" => file_get_contents($tabimg['update-group-banner']['tmp_name']),
         ":bannertype" => $tabimg['update-group-banner']['type'],
         ":idgroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }





   public function updateGroupePriveNameAndDesc($tab)
   {
      $sql = "UPDATE tblgroups SET  groupeName = :newGroupeName , groupeDescription = :newGroupeDesc WHERE idGroupe = :idGroupe";
      $data = array(
         ":newGroupeName" => $tab['update-title'],
         ":newGroupeDesc" => $tab['update-desc'],
         ":idGroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);

      $sql = "UPDATE tblgroupsprivate SET  groupeName = :newGroupeName , groupeDescription = :newGroupeDesc WHERE idGroupe = :idGroupe";
      $data = array(
         ":newGroupeName" => $tab['update-title'],
         ":newGroupeDesc" => $tab['update-desc'],
         ":idGroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   public function updateGroupPrivePdp($tab, $tabimg)
   {
      $sql = "UPDATE tblgroups SET  groupeImg = :pp , groupeTypeImg = :pptype WHERE idGroupe =:idgroupe";
      $data = array(
         ":pp" => file_get_contents($tabimg['update-group-profil']['tmp_name']),
         ":pptype" => $tabimg['update-group-profil']['type'],
         ":idgroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);

      $sql = "UPDATE tblgroupsprivate SET  groupeImg = :pp , groupeTypeImg = :pptype WHERE idGroupe =:idgroupe";
      $data = array(
         ":pp" => file_get_contents($tabimg['update-group-profil']['tmp_name']),
         ":pptype" => $tabimg['update-group-profil']['type'],
         ":idgroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }

   public function updateGroupePriveBanner($tab, $tabimg)
   {
      $sql = "UPDATE tblgroups SET  groupeBanner = :banner , groupeTypeBanner = :bannertype WHERE idGroupe =:idgroupe";
      $data = array(
         ":banner" => file_get_contents($tabimg['update-group-banner']['tmp_name']),
         ":bannertype" => $tabimg['update-group-banner']['type'],
         ":idgroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);

      $sql = "UPDATE tblgroupsprivate SET  groupeBanner = :banner , groupeTypeBanner = :bannertype WHERE idGroupe =:idgroupe";
      $data = array(
         ":banner" => file_get_contents($tabimg['update-group-banner']['tmp_name']),
         ":bannertype" => $tabimg['update-group-banner']['type'],
         ":idgroupe" => $tab['idgroupe']
      );
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute($data);
   }


   public function getMyGroupPrivate($iduser)
   {
      $sql = "SELECT * from tblgroupsuser WHERE iduser = :iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":iduser" => $iduser]);
      return $stmt->fetchAll();
   }

   public function checkUserinGroupePrivate($iduser, $idgroupe)
   {
      $sql = "SELECT * FROM tblgroupsuser WHERE idgroupe = :idgroupe AND iduser = :iduser";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idgroupe" => $idgroupe, ":iduser" => $iduser]);
      return $stmt->fetchAll();
   }

   public function addNbPeopleGroupe($privacy, $idgroupe)
   {
      if ($privacy == "publique") {
         $sql = "UPDATE tblgroupspublic SET groupePublicNbUsers = groupePublicNbUsers + 1 WHERE idGroupe =:idgroupe";
         $data = array(
            ":idgroupe" => $idgroupe
         );
         $prepare = $this->pdo->prepare($sql);
         $prepare->execute($data);
      } else if ($privacy == "prive") {
         $sql = "UPDATE tblgroupsprivate SET groupePrivateNbUsers = groupePrivateNbUsers + 1 WHERE idGroupe =:idgroupe";
         $data = array(
            ":idgroupe" => $idgroupe
         );
         $prepare = $this->pdo->prepare($sql);
         $prepare->execute($data);
      }
   }

   public function delNbPeopleGroupe($privacy, $idgroupe)
   {
      if ($privacy == "publique") {
         $sql = "UPDATE tblgroupspublic SET groupePublicNbUsers = groupePublicNbUsers - 1 WHERE idGroupe =:idgroupe";
         $data = array(
            ":idgroupe" => $idgroupe
         );
         $prepare = $this->pdo->prepare($sql);
         $prepare->execute($data);
      } else if ($privacy == "prive") {
         $sql = "UPDATE tblgroupsprivate SET groupePrivateNbUsers = groupePrivateNbUsers - 1 WHERE idGroupe =:idgroupe";
         $data = array(
            ":idgroupe" => $idgroupe
         );
         $prepare = $this->pdo->prepare($sql);
         $prepare->execute($data);
      }
   }

   public function getUserNotOnGroupe($idgroupe)
   {
      $sql = "SELECT tblusers.* FROM tblusers WHERE tblusers.idUser NOT IN (SELECT tblgroupsuser.iduser FROM tblgroupsuser WHERE tblgroupsuser.idgroupe = :idgroupe)";
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([":idgroupe" => $idgroupe]);
      return $stmt->fetchAll();
   }


   public function delOneGroupOnGroups($idgroupe)
   {
      $sql = "DELETE FROM tblgroups WHERE idGroupe = :idgroupe";
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute([":idgroupe" => $idgroupe]);
   }
   public function delOneGroupOnGroupsPublic($idgroupe)
   {
      $sql = "DELETE FROM tblgroupspublic WHERE idGroupe = :idgroupe";
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute([":idgroupe" => $idgroupe]);
   }
   public function delOneGroupOnGroupsPrivate($idgroupe)
   {
      $sql = "DELETE FROM tblgroupsprivate WHERE idGroupe = :idgroupe";
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute([":idgroupe" => $idgroupe]);
   }
   public function delOneGroupOnGroupsUser($idgroupe)
   {
      $sql = "DELETE FROM tblgroupsuser WHERE idgroupe = :idgroupe";
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute([":idgroupe" => $idgroupe]);
   }

   public function delOneGroupOnTopics($idgroupe)
   {
      $sql = "DELETE FROM tbltopics WHERE idGroupe = :idgroupe";
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute([":idgroupe" => $idgroupe]);
   }
   public function delOneGroupOnTopicAnswer($idgroupe)
   {
      $sql = "DELETE FROM tbltopicsanswers WHERE idGroupe = :idgroupe";
      $prepare = $this->pdo->prepare($sql);
      $prepare->execute([":idgroupe" => $idgroupe]);
   }
}
