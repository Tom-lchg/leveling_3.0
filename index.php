<?php require('./global/header.php'); ?>


<?php
if (isset($_SESSION['id'])) {
   $user = $controler->user->userModel->getUserProfil($_SESSION['pseudo']);
   // récupéré tous les Amis
   $friends = $controler->user->userModel->getFriends($_SESSION['id']);
}
?>


<div class="drawer drawer-end">
   <input id="my-drawer-4" type="checkbox" class="drawer-toggle" />

   <div class="drawer-content">

      <!-- Contenu des pages -->
      <div class='grid grid-cols-layout h-auto w-full bg-white'>

            <!-- Menu en noir -->

            <div class="col-start-1 col-end-6 flex justify-between px-[15em] bg-neutral">

               <div class="flex">
                  <!-- Logo + titre -->
                  <div class='mb-8 flex h-full items-center pl-8'>
                     <img src="./assets/logo.png" alt="" class="w-10">
                     <a href="./?page=home" class='item-nav'>
                        <h1 class='title ml-2 text-white font-toxigenesis'>LEVELING</h1>
                     </a>
                  </div>
                  <!-- Logo + titre -->
               </div>

               <div class="justify-end flex items-center">
                  <!-- Inscription + Connexion -->
                  <div class='flex flex-col gap-4'>
                     <!-- Si on est pas connecté  -->
                     <?php if (!isset($_SESSION['id'])) : ?>
                        <div class='flex gap-4 items-center'>
                           <a href="./page/connexion.php" class='item-nav text-white'>CONNEXION</a>
                           <a href="./page/inscription.php" class='item-nav'><button class="btn btn-accent">Inscription</button></a>
                        </div>
                     <?php endif; ?>
                     <!-- Si on est pas connecté  -->

                     <!-- Si on est connecté -->
                     <?php if (isset($_SESSION['id'])) : ?>
                        <div class='flex gap-4 items-center'>
                           <?php if (isset($_SESSION['id'])) : ?>
                              <div class="avatar">
                                 <div class="w-10 rounded-full">
                                    <img src="data:<?= $user['userTypeImg'] ?>;base64,<?= base64_encode($user['userImg']) ?>" alt="">
                                 </div>
                              </div>
                           <?php endif; ?>
                           <a href="./?page=profile&activite&user=<?= $_SESSION['pseudo'] ?>" class='text-white font-toxigenesis'> <?= $_SESSION['pseudo'] ?> </a>
                           <a href="./page/connexion.php" class='item-nav'><button class="btn btn-error">Déconnexion</button></a>
                        </div>
                     <?php endif; ?>
                     <!-- Si on est connecté -->
                  </div>

                  <!-- Inscription + Connexion -->
               </div>

            </div>
            <!-- Menu en noir -->

            <!-- Menu en bleu -->
            <div class="col-start-1 col-end-6 flex justify-between px-[15em] bg-accent drop-shadow-lg sticky top-0 z-50">

               <!-- Menu -->
               <div class='mb-8 flex h-full items-center pl-8'>
                  <div class='flex gap-4 items-center'>
                     <a href="./?page=home"><button class="btn btn-ghost text-white btn-sm">Accueil</button></a>
                     <a href="./?page=games"><button class="btn btn-ghost text-white btn-sm">Jeux</button></a>
                     <a href="./?page=groupes"><button class="btn btn-ghost text-white btn-sm">Groupes</button></a>
                     <a href="./?page=chat" target="_blank"><button class="btn btn-ghost text-white btn-sm">Chat</button></a>
                  </div>
               </div>
               <!-- Menu -->

               <!-- Barre de recherche -->



               <div class="justify-end flex">
                  <div class="justify-center flex items-center">
                     <i class="fa-solid fa-magnifying-glass text-2xl text-white mr-4"></i>
                     <form method="post" action="./handler_formulaire/handler.php">
                        <select name="type" id="word-search" class="select select-sm w-26 h-2 rounded-full">
                           <option value="users">Utilisateurs</option>
                           <option value="games">Jeux</option>
                           <option value="groups">Groupes</option>
                        </select>
                        <input name="word" type="text" placeholder="Recherche" class="input input-sm w-26 max-w-xs rounded-full" />
                        <button hidden type='submit' name='search'></button>
                     </form>
                  </div>
               </div>
               <!-- Barre de recherche -->

            </div>
            <!-- Menu en bleu -->

         <!-- Router -->
         <div class="col-start-1 col-end-7 px-[15em]">
            <?php require_once('./page/router.php'); ?>
         </div>
         <!-- Router -->

      </div>
      <!-- Contenu des pages -->
   </div>
   


</div>



<?php require('./global/header-close.php') ?>
