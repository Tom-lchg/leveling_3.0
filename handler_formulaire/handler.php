<?php
// je require tout aussi ici car handler n'est pas dans l'arboressence des pages

// require controler
require_once('../mvc/controler/Controler.php');
require_once('../mvc/controler/User.php');
require_once('../mvc/controler/Groupe.php');
require_once('../mvc/controler/Games.php');

// require model
require_once('../mvc/model/User.php');
require_once('../mvc/model/Games.php');
require_once('../mvc/model/Groupe.php');
require_once('../mvc/model/Model.php');

use \mvc\controler\controler\Controler;

$controler = new Controler();
/*
   1. le fichier handler.php sert uniquement à traitier les formulaires.
   2. l'action des formulaires pointera à chaque fois sur ce fichier.
   3. Le fichier handler.php lancera les fonctions des controlers
*/

// formulaire d'inscription
if (isset($_POST['btn-inscription'])) {
   $controler->user->register($_POST, $_FILES);
}


// formulaire de connexion
if (isset($_POST['btn-connexion'])) {
   $email = $_POST['email'];
   $mdp = $_POST['mdp'];
   $controler->user->login($email, $mdp);
}

// formulaire de modification d'un utilisateur
if (isset($_POST['btn-edit-profile'])) {
   $controler->user->updateUser($_POST);
   // header('Location: ./?page=profil');
}
