<?php
$user = $controler->user->userModel->getUserProfil($_GET['user']);
$groupes = $controler->user->userModel->getAllGroupe($user['idUser']);
?>

<div class="flex justify-between">
   <h1 class='title mb-4'>Groupe</h1>

   <!-- afficher uniquement si c'est le user connecté qui est sur son profil -->
   <?php if ($user['idUser'] === $_SESSION['id']) : ?>
      <!-- afficher uniquement si l'utilisateur possède déjà des groupes -->
      <?php if (count($groupes) > 0) : ?>
         <label class="btn" for="modal-create-groupe">
            <i class="fa-solid fa-plus"></i>
         </label>
         <!-- afficher uniquement si l'utilisateur possède déjà des groupes -->
      <?php endif; ?>
   <?php endif; ?>
   <!-- afficher uniquement si c'est le user connecté qui est sur son profil -->
</div>

<!-- afficher uniquement si c'est le user connecté -->
<?php if ($user['idUser'] === $_SESSION['id']) : ?>
   <!-- Si l'utilisateur n'as pas de groupe -->
   <?php if (count($groupes) === 0) : ?>
      <div>
         <!-- ce bouton renvoie sur la modal qui est définit dans le fichier modal-profil -->
         <label class='btn' for="modal-create-groupe">Créer un nouveau groupe</label>
         <!-- ce bouton renvoie sur la modal qui est définit dans le fichier modal-profil -->
      </div>
   <?php endif; ?>
   <!-- Si l'utilisateur n'as pas de groupe -->
<?php endif; ?>
<!-- afficher uniquement si c'est le user connecté -->

<!-- Si l'utilisateur possède des groupes alors on affiche -->
<?php if (count($groupes) !== 0) : ?>
   <div class='flex flex-wrap gap-4 pb-4'>
      <!-- Foreach pour afficher tous les groupes -->
      <?php foreach ($groupes as $unGroupe) : ?>

         <!-- Afficher les groupes uniquement les groupes publique si on est sur le profil d'un autre user -->
         <?php if ($user['idUser'] === $_SESSION['id']) : ?>
            <a href="./?page=profile&req=groupe&user=<?= $_GET['user'] ?>&groupeName=<?= $unGroupe['groupeName'] ?>" class="hover:scale-105 transition">
               <div class="card w-96 shadow-xl image-full relative">
                  <figure><img src="data:<?= $unGroupe['groupeTypeBanner'] ?>;base64,<?= base64_encode($unGroupe['groupeBanner']) ?>" alt="Shoes" /></figure>
                  <div class="card-body">
                     <h2 class="card-title"><?= $unGroupe['groupeName'] ?></h2>
                     <p><?= $unGroupe['groupeDescription'] ?></p>
                  </div>

                  <!-- Afficher uniquement si le groupe est privé -->
                  <?php if ($unGroupe['groupePrivacy'] === 'prive') : ?>
                     <div class="tooltip absolute right-4 top-2 z-10" data-tip="Ce groupe est privé et ne sera pas visible pour les autres utilisateurs">
                        <p>
                           <i class="fa-solid fa-lock"></i>
                        </p>
                     </div>
                  <?php endif; ?>
                  <!-- Afficher uniquement si le groupe est privé -->

               </div>
               <!-- card pour un seul groupe -->
            </a>
         <?php elseif ($user['idUser'] !== $_SESSION['id'] && $unGroupe['groupePrivacy'] === 'publique') : ?>
            <a href="./?page=profile&req=groupe&user=<?= $_GET['user'] ?>&groupeName=<?= $unGroupe['groupeName'] ?>" class="hover:scale-105 transition">
               <div class="card w-96 shadow-xl image-full relative">
                  <figure><img src="data:<?= $unGroupe['groupeTypeBanner'] ?>;base64,<?= base64_encode($unGroupe['groupeBanner']) ?>" alt="Shoes" /></figure>
                  <div class="card-body">
                     <h2 class="card-title"><?= $unGroupe['groupeName'] ?></h2>
                     <p><?= $unGroupe['groupeDescription'] ?></p>
                  </div>

                  <!-- Afficher uniquement si le groupe est privé -->
                  <?php if ($unGroupe['groupePrivacy'] === 'prive') : ?>
                     <div class="tooltip absolute right-4 top-2 z-10" data-tip="Ce groupe est privé et ne sera pas visible pour les autres utilisateurs">
                        <p>
                           <i class="fa-solid fa-lock"></i>
                        </p>
                     </div>
                  <?php endif; ?>
                  <!-- Afficher uniquement si le groupe est privé -->

               </div>
               <!-- card pour un seul groupe -->
            </a>
         <?php endif; ?>
         <!-- Afficher les groupes uniquement les groupes publique si on est sur le profil d'un autre user -->

      <?php endforeach; ?>
      <!-- Foreach pour afficher tous les groupes -->

   </div>
   <!-- Si l'utilisateur possède des groupes alors on affiche -->
<?php endif; ?>

<!-- Page des groupes -->
<?php if (isset($_GET['groupeName'])) : ?>
   <hr class='my-4 border-slate-700'>
   <h1 class="text-4xl"><?= $_GET['groupeName'] ?></h1>
<?php endif; ?>
<!-- Page des groupes -->