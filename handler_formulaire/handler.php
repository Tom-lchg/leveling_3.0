<?php
// je require tout aussi ici car handler n'est pas dans l'arboressence des pages

// require controler
require_once('../mvc/controler/Controler.php');
require_once('../mvc/controler/User.php');
require_once('../mvc/controler/Groupe.php');
require_once('../mvc/controler/Games.php');
require_once('../mvc/controler/Post.php');
require_once('../mvc/controler/Friend.php');

// require model
require_once('../mvc/model/User.php');
require_once('../mvc/model/Games.php');
require_once('../mvc/model/Groupe.php');
require_once('../mvc/model/Model.php');
require_once('../mvc/model/Post.php');
require_once('../mvc/model/Friend.php');

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
   header("Location: ../?page=connexion");
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
   $user = $_SESSION['pseudo'];
   header("Location: ../?page=profile&user=$user");
}


// formulaire pour ajouter un nouveau groupe
if (isset($_POST['btn-add-groupe'])) {
   $controler->groupe->createGroupe($_POST, $_FILES);
   // ça sera toujours session pseudo car c'est le user connecté qui peut supprimer son groupe
   $user = $_SESSION['pseudo'];
   header("Location: ../?page=profile&req=groupe&user=$user");
}

//formulaire pour ajouter une personne dans une groupe
if(isset($_POST['btn-join-group'])){
   $iduser = $_POST['idUser'];
   $idgroupe = $_POST['idGroupe'];
   
   $non= $controler->groupe->groupeModel->addUserOnGroup($idgroupe, $iduser);

   if($non==false){
      //faudrait changer ca
      header("Location: ../?page=home&feur");
   }else{
      header("Location: ../?page=home&quoicou");
   }
   
}

//formulaire pour se retirer d'un groupe
if(isset($_POST['btn-leave-group'])){
   $iduser = $_POST['idUser'];
   $idgroupe = $_POST['idGroupe'];

   $non= $controler->groupe->groupeModel->dropUserOnGroup($idgroupe, $iduser);
   header("Location: ../?page=home");
}


// formulaire créer un post
if (isset($_POST['btn-add-post'])) {
   $controler->post->createPost($_POST);
   header('Location: ../?page=home');
}

// formulaire créer un post depuis le profil
if (isset($_POST['btn-add-post-from-profil'])) {
   $controler->post->createPost($_POST);
   // ça sera toujours session pseudo car c'est le user connecté qui peut supprimer ses posts
   $user = $_SESSION['pseudo'];
   header("Location: ../?page=profile&user=$user");
}


//modif un post
if (isset($_POST['editPost'])) {
   $controler->post->postModel->getMessage($_POST['idpost']);
   header('Location: ../?page=home');
}

// delete un post
if (isset($_POST['deletePost'])) {
   $controler->post->postModel->delPost($_POST['idpost'], $_SESSION['id']);
   header("Location: ../?page=home");
   
   
}

// delete un post from profil
if (isset($_POST['deletePostFromProfil'])) {
   $controler->post->postModel->delPost($_POST['idpost']);
   // ça sera toujours session pseudo car c'est le user connecté qui peut supprimer ses posts
   $user = $_SESSION['pseudo'];
   header("Location: ../?page=profile&user=$user");
}

// formulaire pour l'ajout d'un ami
if (isset($_POST['btn-form-friend'])) {
   $controler->friend->friendModel->addFriends($_POST['iduser']);
   $user = $_POST['pseudo'];
   header("Location: ../?page=profile&user=$user");
}


// formulaire pour remove l'ami
if (isset($_POST['btn-form-remove-friend'])) {
   $controler->friend->friendModel->removeFriend($_POST['iduser']);
   $user = $_POST['pseudo'];
   header("Location: ../?page=profile&user=$user");
}
