<?php
// require controler
require_once('../mvc/controler/Controler.php');
require_once('../mvc/controler/User.php');
require_once('../mvc/controler/Groupe.php');
require_once('../mvc/controler/Games.php');
require_once('../mvc/controler/Post.php');
require_once('../mvc/controler/GamePost.php');
require_once('../mvc/controler/Friend.php');
require_once('../mvc/controler/Conversation.php');
require_once('../mvc/controler/Message.php');

// require model
require_once('../mvc/model/User.php');
require_once('../mvc/model/Games.php');
require_once('../mvc/model/Groupe.php');
require_once('../mvc/model/Model.php');
require_once('../mvc/model/Post.php');
require_once('../mvc/model/GamePost.php');
require_once('../mvc/model/Friend.php');
require_once('../mvc/model/Conversation.php');
require_once('../mvc/model/Message.php');

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
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
   <title>Leveling</title>
</head>

<body class='bg-white'>

<?php if(isset($_SESSION)){ session_destroy(); } ?>

<div class="grid grid-cols-7">

   <div class="col-start-1 col-end-5 bg-[url('/assets/bg-with-logo.png')] bg-cover bg-center h-screen flex justify-center items-center drop-shadow-lg"></div>

   <div class="col-start-5 col-end-8 bg-neutral">


      <div class="p-6 w-full flex justify-center">
         <div class="tabs">
            <a class="tab tab-bordered" href="inscription.php">Inscription</a>
            <a class="tab tab-bordered tab-active" href="connexion.php">Connexion</a>
            <a class="tab tab-bordered" href="apropos.php">À propos</a>
         </div>
      </div>

      <div>

         <div class="w-full flex justify-center mt-60">
            <p class="text-2xl">Connexion</p>
         </div>

         <div class="w-full flex justify-center">
            <div class="divider w-14"></div>
         </div>

         <div class="w-full flex justify-center">
            <div class="w-72">
               <form action="../handler_formulaire/handler.php" class="max-w-2xl" method="POST">
                  <div>
                     <input type="email" placeholder="E-mail" name='email' required class="input input-bordered w-full max-w-xs mb-4" />
                     <input type="password" placeholder="Mot de passe" name='mdp' required class="input input-bordered w-full max-w-xs mb-4" />
                     <button class="btn btn-accent w-full" type='submit' name='btn-connexion'>Connexion</button>
                  </div>
               </form>
            </div>
         </div>

      </div>

      <?php var_dump($_SESSION); ?>

   </div>

</div>

</body>

</html>