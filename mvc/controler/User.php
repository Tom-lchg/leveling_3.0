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
      $this->model = new Model('tblusers');
      $this->userModel = new UserModel();
   }

   // register = inscription
   public function register($data, $img)
   {
      $this->userModel->insertUser($data, $img);
   }

   public function logdin($mail, $mdp)
   {
      $users = $this->userModel->getAll();
      foreach ($users as $user) {
         if (password_verify($mdp, $user['userPassword'])) {
            if ($user['userMail'] === $mail) {
               // set variable de session
               $_SESSION['id'] = $user['idUser'];
               $_SESSION['pseudo'] = $user['userPseudo'];
            }
         }
      }
   }

   public function login($email, $password)
{
   $user = $this->userModel->getUserByEmail($email);

   if ($user && password_verify($password, $user['userPassword'])) {
      // Définir les variables de session
      $_SESSION['id'] = $user['idUser'];
      $_SESSION['pseudo'] = $user['userPseudo'];
      return true;
   }

   return false;
}

   public function updateUser($data, $dataimg)
   {
      // parse notre tableau
      $bio = htmlspecialchars($data['bio']);
      $img = file_get_contents($dataimg['img']['tmp_name']);
      $banner = file_get_contents($dataimg['banner']['tmp_name']);

      // on appelle notre model
      $this->userModel->updateUser($bio, $_SESSION['id'], $img, $banner);
   }
}
