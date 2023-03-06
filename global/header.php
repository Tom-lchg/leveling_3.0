<?php
// require controler
require_once('./mvc/controler/Controler.php');
require_once('./mvc/controler/User.php');
require_once('./mvc/controler/Groupe.php');
require_once('./mvc/controler/Games.php');
require_once('./mvc/controler/Post.php');
require_once('./mvc/controler/Friend.php');

// require model
require_once('./mvc/model/User.php');
require_once('./mvc/model/Games.php');
require_once('./mvc/model/Groupe.php');
require_once('./mvc/model/Model.php');
require_once('./mvc/model/Post.php');
require_once('./mvc/model/Friend.php');

use \mvc\controler\controler\Controler;

$controler = new Controler();

?>

<!DOCTYPE html>
<html lang="en" data-theme="mytheme">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="icon" type="image/x-icon" href="../assets/favicon.png">
   <title>Leveling</title>
</head>

<body class='bg-primary'>
   <!-- require modal modification du profil -->
   <?php require('./components/modal-profil.php'); ?>