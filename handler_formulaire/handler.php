<?php
// je require tout aussi ici car handler n'est pas dans l'arboressence des pages

// require controler
require_once('../mvc/controler/Controler.php');
require_once('../mvc/controler/User.php');
require_once('../mvc/controler/Groupe.php');
require_once('../mvc/controler/Games.php');
require_once('../mvc/controler/Post.php');
require_once('../mvc/controler/Friend.php');
require_once('../mvc/controler/GamePost.php');
require_once('../mvc/controler/Conversation.php');
require_once('../mvc/controler/Message.php');


// require model
require_once('../mvc/model/User.php');
require_once('../mvc/model/Games.php');
require_once('../mvc/model/Groupe.php');
require_once('../mvc/model/Model.php');
require_once('../mvc/model/Post.php');
require_once('../mvc/model/Friend.php');
require_once('../mvc/model/GamePost.php');
require_once('../mvc/model/Conversation.php');
require_once('../mvc/model/Message.php');

use \mvc\controler\controler\Controler;

$controler = new Controler();
/*
   1. le fichier handler.php sert uniquement à traiter les formulaires.
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
   header("Location: ../?page=home");
}


// formulaire de modification d'un utilisateur
if (isset($_POST['btn-edit-profile'])) {
   $controler->user->updateUser($_POST, $_FILES);
   $user = $_SESSION['pseudo'];
   header("Location: ../?page=profile&activite&user=$user");
}


// formulaire pour ajouter un nouveau groupe
if (isset($_POST['btn-add-groupe'])) {
   $controler->groupe->createGroupe($_POST, $_FILES);
   // ça sera toujours session pseudo car c'est le user connecté qui peut supprimer son groupe
   $user = $_SESSION['pseudo'];
   header("Location: ../?page=profile&groupes&user=$user");
}

//formulaire pour ajouter une personne dans un groupe
if (isset($_POST['btn-join-group'])) {
   $iduser = $_POST['idUser'];
   $idgroupe = $_POST['idGroupe'];
   $privacy = $_POST['privacy'];

   $non = $controler->groupe->groupeModel->addUserOnGroup($idgroupe, $iduser);
   $updateNb = $controler->groupe->groupeModel->addNbPeopleGroupe($privacy, $idgroupe);

   if ($non == false) {
      //faudrait changer ca
      header("Location:../?page=groupes&groupe=" . $idgroupe . "&privacy=" . $_POST['privacy'] . "");
   } else {
      header("Location:../?page=groupes&groupe=" . $idgroupe . "&privacy=" . $_POST['privacy'] . "");
   }
}

//formulaire pour se retirer d'un groupe
if (isset($_POST['btn-leave-group'])) {
   $iduser = $_POST['idUser'];
   $idgroupe = $_POST['idGroupe'];
   $privacy = $_POST['privacy'];

   $non = $controler->groupe->groupeModel->dropUserOnGroup($idgroupe, $iduser);
   $updateNb = $controler->groupe->groupeModel->delNbPeopleGroupe($privacy, $idgroupe);

   header("Location:../?page=groupes&groupe=" . $idgroupe . "&privacy=" . $_POST['privacy'] . "");
}



// formulaire créer un post
if (isset($_POST['btn-add-post'])) {
   $controler->post->createPost($_POST);
   header('Location: ../?page=home');
}

// formulaire créer un post depuis un jeu
if (isset($_POST['btn-add-post-game'])) {
   $idgame = $_POST['idgame'];
   $controler->post->createGamePost($_POST, $idgame);
   header("Location: ../?page=games&game=$idgame");
}


// formulaire créer un post depuis le profil
if (isset($_POST['btn-add-post-from-profil'])) {
   $controler->post->createPost($_POST);
   // ça sera toujours session pseudo car c'est le user connecté qui peut supprimer ses posts
   $user = $_SESSION['pseudo'];
   header("Location: ../?page=profile&activite&user=$user");
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
   $controler->post->postModel->delPost($_POST['idpost'], $_SESSION['id']);
   // ça sera toujours session pseudo car c'est le user connecté qui peut supprimer ses posts
   $user = $_SESSION['pseudo'];
   header("Location: ../?page=profile&activite&user=$user");
}

// formulaire pour l'ajout d'un ami
if (isset($_POST['btn-form-friend'])) {
   $controler->friend->friendModel->addFriends($_POST['iduser']);
   $user = $_POST['pseudo'];
   header("Location: ../?page=profile&activite&user=$user");
}


// formulaire pour remove l'ami
if (isset($_POST['btn-form-remove-friend'])) {
   $controler->friend->friendModel->removeFriend($_POST['iduser']);
   $user = $_POST['pseudo'];
   header("Location: ../?page=profile&activite&user=$user");
}


// delete un ami
if (isset($_POST['delFriend'])) {
   $controler->user->userModel->deleteFriend($_POST['idfriend']);
   header("Location: ../?page=home");
}

// envoyer un message
if (isset($_POST['btn_msg'])) {
   $idconv = $controler->message->checkMessage($_POST['message'], $_SESSION['id'], $_POST['convid']);
   header('Location: ../?page=chat&conversationId=' . $idconv);
}

<<<<<<< HEAD
// delete un avis sur un jeu
if (isset($_POST['deleteGamePost'])) {
   $controler->GamePost->GamePostModel->delGamePost($_POST['idgamepost'], $_SESSION['id']);
   // ça sera toujours session pseudo car c'est le user connecté qui peut supprimer ses posts
   $game = $_GET['game'];
   header("Location: ../?page=games&game=$game");
}
=======
>>>>>>> b7f024514ad11684ed0f367d665bc8ce451bb4f9

// ajouter un sujet
if (isset($_POST['btn-add-topic'])) {

   $controler->groupe->groupeModel->addTopics($_POST);
   header("Location:../?page=groupes&groupe=" . $_POST['idgroupe'] . "&privacy=" . $_POST['privacy'] . "");
}

// repondre à un sujet
if (isset($_POST['btn-answer-topic'])) {

   $controler->groupe->groupeModel->addAnswerbyTopic($_POST);
   $controler->groupe->groupeModel->updateNbReponseForTopic($_POST['idsujet']);
   header("Location:../?page=groupes&groupe=" . $_POST['idgroupe'] . "&privacy=" . $_POST['privacy'] . "&sujet=" . $_POST['idsujet'] . "");
}

// Modification d'un groupe

//Modification du nom et de la description d'un groupe public
if (isset($_POST['btn-update-group-text'])) {
   if ($_POST['privacy'] == "publique") {
      $controler->groupe->groupeModel->updateGroupePublicNameAndDesc($_POST);
      header("Location: ../?page=groupes&groupe=" . $_POST['idgroupe'] . "&privacy=" . $_POST['privacy'] . "");
   } else if ($_POST['privacy'] == "prive") {
      $controler->groupe->groupeModel->updateGroupePriveNameAndDesc($_POST);
      header("Location: ../?page=groupes&groupe=" . $_POST['idgroupe'] . "&privacy=" . $_POST['privacy'] . "");
   }
}
//Modification du nom et de la description d'un groupe public

// Mofification de la photo de profil d'un groupe
if (isset($_POST['btn-update-group-pdp'])) {
   if ($_POST['privacy'] == "publique") {
      $controler->groupe->groupeModel->updateGroupPublicPdp($_POST, $_FILES);
      header("Location: ../?page=groupes&groupe=" . $_POST['idgroupe'] . "&privacy=" . $_POST['privacy'] . "");
   } else if ($_POST['privacy'] == "prive") {
      $controler->groupe->groupeModel->updateGroupPrivePdp($_POST, $_FILES);
      header("Location: ../?page=groupes&groupe=" . $_POST['idgroupe'] . "&privacy=" . $_POST['privacy'] . "");
   }
}
// Mofification de la photo de profil d'un groupe

// Mofification de la bannière d'un groupe

if (isset($_POST['btn-update-group-banner'])) {
   if ($_POST['privacy'] == "publique") {
      $controler->groupe->groupeModel->updateGroupePublicBanner($_POST, $_FILES);
      header("Location: ../?page=groupes&groupe=" . $_POST['idgroupe'] . "&privacy=" . $_POST['privacy'] . "");
   } else if ($_POST['privacy'] == "prive") {
      $controler->groupe->groupeModel->updateGroupePriveBanner($_POST, $_FILES);
      header("Location: ../?page=groupes&groupe=" . $_POST['idgroupe'] . "&privacy=" . $_POST['privacy'] . "");
   }
}

// Mofification de la bannière d'un groupe

// Modification d'un groupe


//Ajout d'une personne dans une groupe privé
if (isset($_POST['btn-add-user-groupe'])) {
   $controler->groupe->groupeModel->insertInGroupUser($_POST['idgroupe'], $_POST['selectedUser']);
   $updateNb = $controler->groupe->groupeModel->addNbPeopleGroupe($_POST['privacy'], $_POST['idgroupe']);
   header("Location: ../?page=groupes&groupe=" . $_POST['idgroupe'] . "&privacy=" . $_POST['privacy'] . "");
}
//Ajout d'une personne dans une groupe privé
