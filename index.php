<?php require('./global/header.php') ?>

<?php
if (isset($_SESSION['id'])){
   $user = $controler->user->userModel->getUserProfil($_SESSION['pseudo']);
}

?>

<div class='grid grid-cols-layout h-auto w-full bg-white'>

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
                  <a href="./?page=connexion" class='item-nav text-white'>CONNEXION</a>
                  <a href="./?page=inscription" class='item-nav'><button class="btn btn-accent">Inscription</button></a>
               </div>
            <?php endif; ?>
            <!-- Si on est pas connecté  -->

            <!-- Si on est connecté -->
            <?php if (isset($_SESSION['id'])) : ?>
               <div class='flex gap-4 items-center'>
                  <?php if(isset($_SESSION['id'])) :?>
                     <div class="avatar">
                     <div class="w-10 rounded-full">
                        <img src="data:<?= $user['userTypeImg'] ?>;base64,<?= base64_encode($user['userImg']) ?>" alt="">
                     </div>
                  </div>
                  <?php endif ;?>
                  <a href="./?page=profile&user=<?= $_SESSION['pseudo'] ?>" class='text-white font-toxigenesis'> <?= $_SESSION['pseudo'] ?> </a>
                  <a href="./?page=deconnexion" class='item-nav'><button class="btn btn-error">Déconnexion</button></a>
               </div>
            <?php endif; ?>
            <!-- Si on est connecté -->
         </div>

         <!-- Inscription + Connexion -->
      </div>


   </div>

   <div class="col-start-1 col-end-6 flex justify-between px-[15em] bg-accent drop-shadow-lg">

      <div class="flex">
         <!-- Menu -->
         <div class='mb-8 flex h-full items-center pl-8'>
            <div class='flex gap-4 items-center'>
               <a href="./?page=home"><button class="btn btn-ghost text-white btn-sm">Accueil</button></a>
               <a href="./?page=games"><button class="btn btn-ghost text-white btn-sm">Jeux</button></a>
               <a href="./?page=groupes"><button class="btn btn-ghost text-white btn-sm">Groupes</button></a>
            </div>
         </div>
      </div>
      <!-- Menu -->

      <div class="justify-end  flex">
         <!-- Barre de recherche -->
         <div class="content-center flex items-center">
            <i class="fa-solid fa-magnifying-glass text-2xl text-white mr-4"></i>
            <input type="text" placeholder="Recherche" class="input input-sm w-full max-w-xs rounded-full" />
         </div>
         <!-- Barre de recherche -->
      </div>
      


   </div>

   <div class="col-start-1 col-end-6 px-[15em]">
      <?php require_once('./page/router.php'); ?>
   </div>

</div>




<?php require('./global/header-close.php') ?>