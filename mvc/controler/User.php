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
      $this->userModel->insertUser($data, $img);
      
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
