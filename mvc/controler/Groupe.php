<?php

namespace Groupes;

use \Models\Model;
use \Models\Groupe\Groupe as GroupeModel;

class Groupe
{
   private $model;
   public $groupeModel;

   public function __construct()
   {
      $this->model = new Model('tblGroups');
      $this->groupeModel = new GroupeModel();
   }

   public function createGroupe($tab, $img)
   {
      // On parse notre tableau avec htmlspecialchars() pour vérifier toutes entrées utilisateur
      $nomGroupe = htmlspecialchars($tab['nomGroupe']);
      $descriptionGroupe = htmlspecialchars($tab['descGroupe']);
      $privacy = $tab['privacy'];

      // On parse notre tableau d'image pour récupérer uniquement les valeurs qu'on a besoin
      $pp_base_64 = $img['pp']['tmp_name'];
      $pp_type = $img['pp']['type'];
      $banniere_base_64 = $img['banner']['tmp_name'];
      $banniere_type = $img['banner']['type'];


      // on créer un nouveau trableau "propre" pour l'envoyer à notre fonction "createGroupe"
      $array = [
         "nomGroupe" => $nomGroupe,
         "description" => $descriptionGroupe,
         "privacy" => $privacy,
         "pp" => file_get_contents($pp_base_64),
         "pptype" => $pp_type,
         "banner" => file_get_contents($banniere_base_64),
         "bannertype" => $banniere_type,
         "idUser" => $_SESSION['id']
      ];

      // on appel notre fonction insertUser en lui donnant le $array_user
      $obj_groupe = (object) $array;
      $this->groupeModel->createGroupe($obj_groupe);
   }
}
