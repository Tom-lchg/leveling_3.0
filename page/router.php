<?php
if (isset($_GET['page'])) {
   switch ($_GET['page']) {
      case 'home':
         require('home.php');
         break;
      case 'profile':
         require('./page/user/profile.php');
         break;
      case 'games':
         require('./page/games/games.php');
         break;
      case 'inscription':
         require('inscription.php');
         break;
      case 'connexion':
         require('connexion.php');
         break;
      case 'deconnexion':
         require('deconnexion.php');
         break;
      default:
         require('notFound.php');
         break;
   }
}
