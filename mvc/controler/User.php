<?php

namespace Users;

session_start();

use Models\Model;
use Models\Users\User as UserModel;

class User
{
   private $model;
   public $userModel;
   public function __construct()
   {
      $this->model = new Model('tblUsers');
      $this->userModel = new UserModel();
   }

   // register = inscription
   public function register($data, $img)
   {
      // On parse notre tableau avec htmlspecialchars() pour vérifier toutes entrées utilisateur
      $prenom = htmlspecialchars($data['prenom']);
      $pseudo = htmlspecialchars($data['pseudo']);
      $nom = htmlspecialchars($data['nom']);
      $age = htmlspecialchars($data['age']);
      $mdp = htmlspecialchars($data['mdp']);
      $email = htmlspecialchars($data['email']);
      $dateNaissance = htmlspecialchars($data['dateNaissance']);
      $bio = htmlspecialchars($data['bio']);

      // On parse notre tableau d'image pour récupérer uniquement les valeurs qu'on a besoin
      $pp_base_64 = $img['pp']['tmp_name'];
      $pp_type = $img['pp']['type'];
      $banniere_base_64 = $img['banniere']['tmp_name'];
      $banniere_type = $img['banniere']['type'];

      // on créer un nouveau trableau "propre" pour l'envoyer à notre fonction "insertUser"
      $array = [
         "prenom" => $prenom,
         "pseudo" => $pseudo,
         "nom" => $nom,
         "age" => $age,
         "mdp" => $mdp,
         "email" => $email,
         "dateNaissance" => $dateNaissance,
         "bio" => $bio,
         "pp" => file_get_contents($pp_base_64),
         "pptype" => $pp_type,
         "banniere" => file_get_contents($banniere_base_64),
         "bannieretype" => $banniere_type,
      ];

      // on appel notre fonction insertUser en lui donnant le $array_user
      $obj_user = (object) $array;
      $this->userModel->insertUser($obj_user);
      header('Location: .././?page=connexion');
   }

   public function login($mail, $mdp)
   {
      $users = $this->userModel->getAll();
      foreach ($users as $user) {
         if ($user['userPassword'] === $mdp) {
            if ($user['userMail'] === $mail) {
               // set variable de session
               $_SESSION['id'] = $user['idUser'];
               $_SESSION['pseudo'] = $user['userPseudo'];
               header('Location: .././?page=home');
            }
         }
      }
      var_dump('pas ok');
   }

   public function updateUser($data)
   {
      // parse notre tableau
      $pseudo = htmlspecialchars($data['pseudo']);
      $bio = htmlspecialchars($data['bio']);

      // on appelle notre model
      $this->userModel->updateUser($pseudo, $bio, $_SESSION['id']);
   }
}
