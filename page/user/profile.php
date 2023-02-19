<?php
$user = $controler->user->userModel->findById($_SESSION['id'], 'idUser');
?>

<div class='h-56 relative'>
   <!-- bannière de user -->
   <img src="data:<?= $user['userTypeBanner'] ?>;base64,<?= base64_encode($user['userBanner']) ?>" alt="banner" class='h-full block w-full object-cover absolute' />
   <!-- bannière de user -->


   <!-- Le menu en bas à gauche de la bannière -->
   <div class='relative z-10 flex gap-10 text-2xl w-full h-full pb-1 items-end pr-8 justify-end text-white font-leger'>
      <a href="./?page=profile&req=groupe">Groupe</a>
      <a href="./?page=profile">Profile</a>
      <a href="./?page=profile&req=amis">Amis</a>
   </div>
   <!-- Le menu en bas à gauche de la bannière -->

   <!-- Photo de profil -->
   <img src="data:<?= $user['userTypeImg'] ?>;base64,<?= base64_encode($user['userImg']) ?>" alt="pp user" class='w-60 h-60 rounded-full absolute top-24 left-10 shadow-lg' />
   <!-- Photo de profil -->

</div>

<div class='h-auto px-8 mt-32'>
   <div class='flex justify-between items-center'>
      <!-- Pseudo du user -->
      <h1 class='title'><?= $user['userPseudo'] ?></h1>
      <!-- Pseudo du user -->

      <!-- Button setting (uniquement afficher pour l'utilisateur connecté) -->
      <?php if (isset($_SESSION) && $_SESSION['id'] === $user['idUser']) : ?>
         <label for="modal-profil" class="btn">
            <i class="fa-solid fa-gear"></i>
         </label>
      <?php endif; ?>
      <!-- Button setting -->

   </div>

   <!-- Le @ -->
   <h3 class='text-accent'>@KiSEiXD</h3>
   <!-- Le @ -->

   <!-- La bio -->
   <div class='mt-4 text-justify'>
      <p><?= $user['userBio'] ?></p>
   </div>
   <!-- La bio -->

   <div class='flex gap-8 items-center text-accent mt-4'>
      <!-- La date de l'inscription du user -->
      <div class='flex gap-2 items-center'>
         <i class="fa-regular fa-calendar-days"></i>
         <p>Joined October 14</p>
      </div>
      <!-- La date de l'inscription du user -->

      <!-- La date de naissance du user -->
      <div class='flex gap-2 items-center'>
         <i class="fa-solid fa-cake-candles"></i>
         <p><?= $user['userNaissance'] ?></p>
      </div>
      <!-- La date de naissance du user -->

   </div>

   <hr class='my-8 border-secondary'>

   <div class='mt-4 mb-4'>
      <?php if (!isset($_GET['req'])) : ?>

         <!-- Les postes de l'utilisateur -->
         <h1 class='title mb-4'>Postes</h1>
         <div class='flex gap-4 flex-wrap'>
            <div class='w-96 h-96 bg-slate-600 rounded-lg'></div>
            <div class='w-96 h-96 bg-slate-600 rounded-lg'></div>
            <div class='w-96 h-96 bg-slate-600 rounded-lg'></div>
            <div class='w-96 h-96 bg-slate-600 rounded-lg'></div>
            <div class='w-96 h-96 bg-slate-600 rounded-lg'></div>
         </div>
         <!-- Les postes de l'utilisateur -->
      <?php endif; ?>

      <?php
      if (isset($_GET['req'])) {
         switch ($_GET['req']) {
            case 'amis':
               require('amis.php');
               break;
            case 'groupe':
               require('groupe.php');
               break;
            default:
               header('location: ./?page=azrazr');
               break;
         }
      }
      ?>
   </div>

</div>