<?php
$user = $controler->user->userModel->findById($_SESSION['id'], 'idUser');
$groupes = $controler->user->userModel->getAllGroupe($_SESSION['id']);
?>

<div class="flex justify-between">
   <h1 class='title mb-4'>Groupe</h1>

   <!-- afficher uniquement si l'utilisateur possède déjà des groupes -->
   <?php if (count($groupes) > 0) : ?>
      <label class="btn" for="modal-create-groupe">
         <i class="fa-solid fa-plus"></i>
      </label>
      <!-- afficher uniquement si l'utilisateur possède déjà des groupes -->
   <?php endif; ?>
</div>

<!-- Si l'utilisateur n'as pas de groupe -->
<?php if (count($groupes) === 0) : ?>
   <div>
      <!-- ce bouton renvoie sur la modal qui est définit dans le fichier modal-profil -->
      <!--
         l'attribut "for" permet de faire le lien avec l'attribut id de l'input de la modal
       -->
      <label class='btn' for="modal-create-groupe">Créer un nouveau groupe</label>
      <!-- ce bouton renvoie sur la modal qui est définit dans le fichier modal-profil -->
   </div>
<?php endif; ?>
<!-- Si l'utilisateur n'as pas de groupe -->

<!-- Si l'utilisateur possède des groupes alors on affiche -->
<?php if (count($groupes) !== 0) : ?>
   <div class='flex flex-wrap gap-4'>
      <!-- Foreach pour afficher tous les groupes -->
      <?php foreach ($groupes as $unGroupe) : ?>
         <!-- card pour un seul groupe -->
         <div class="card w-96 shadow-xl image-full">
            <figure><img src="data:<?= $unGroupe['groupeTypeBanner'] ?>;base64,<?= base64_encode($unGroupe['groupeBanner']) ?>" alt="Shoes" /></figure>
            <div class="card-body">
               <h2 class="card-title"><?= $unGroupe['groupeName'] ?></h2>
               <p><?= $unGroupe['groupeDescription'] ?></p>
            </div>
         </div>
         <!-- card pour un seul groupe -->
      <?php endforeach; ?>
      <!-- Foreach pour afficher tous les groupes -->

   </div>
   <!-- Si l'utilisateur possède des groupes alors on affiche -->
<?php endif; ?>