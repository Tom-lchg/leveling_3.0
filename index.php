<?php require('./global/header.php') ?>

<div class='grid grid-cols-layout h-auto'>

   <div class='bg-secondary col-start-1 h-screen flex justify-between sticky top-0 flex-col p-8'>
      <div class='flex flex-col gap-4'>
         <div class='mb-8'>
            <h1 class='title sticky top-0'>Leveling</h1>
         </div>
         <div class='flex gap-4 items-center text-accent'>
            <i class="fa-solid fa-house text-xl"></i>
            <a href="./?page=home" class='item-nav'>Home</a>
         </div>

         <!-- SI le user n'est pas connecté alors il n'a pas accès à son profil -->
         <!-- s'affiche uniquement si le user est connecté  -->
         <?php if (isset($_SESSION['id'])) : ?>
            <div class='flex gap-4 items-center text-accent'>
               <i class="fa-regular fa-user text-xl"></i>
               <a href="./?page=profile&user=<?= $_SESSION['pseudo'] ?>" class='item-nav'>Profile</a>
            </div>
         <?php endif; ?>
         <!-- s'affiche uniquement si le user est connecté  -->
         <!-- SI le user n'est pas connecté alors il n'a pas accès à son profil -->

         <div class='flex gap-4 items-center text-accent'>
            <i class="fa-solid fa-gamepad text-xl"></i>
            <a href="./?page=games" class='item-nav'>Games</a>
         </div>
      </div>

      <div class='flex flex-col gap-4'>
         <!-- Si on est pas connecté  -->
         <?php if (!isset($_SESSION['id'])) : ?>
            <div class='flex gap-4 items-center text-accent'>
               <i class="fa-solid fa-user-plus"></i>
               <a href="./?page=inscription" class='item-nav'>Inscription</a>
            </div>
            <div class='flex gap-4 items-center text-accent'>
               <i class="fa-solid fa-right-to-bracket"></i>
               <a href="./?page=connexion" class='item-nav'>Connexion</a>
            </div>
         <?php endif; ?>
         <!-- Si on est pas connecté  -->

         <!-- Si on est connecté -->
         <?php if (isset($_SESSION['id'])) : ?>
            <div class='flex gap-4 items-center text-accent'>
               <i class="fa-solid fa-right-from-bracket"></i>
               <a href="./?page=deconnexion" class='item-nav'>Déconnexion</a>
            </div>
         <?php endif; ?>
         <!-- Si on est connecté -->
      </div>

   </div>

   <div class='col-start-2 h-auto'>
      <?php require_once('./page/router.php'); ?>
   </div>
</div>
<?php require('./global/header-close.php') ?>