<?php
$user = $controler->user->userModel->getUserProfil($_GET['user']);
$groupes = $controler->groupe->groupeModel->getGroupbyUser($user['idUser']);


?>
   




   
<div class="container-home p-6">

<div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md"><p>GROUPES</p></div>

<div class="mt-2 text-justify">

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
         <label class='btn bg-accent text-white border-accent hover:bg-[#1991FF] hover:text-white hover:border-[#1991FF] my-2' for="modal-create-groupe">Créer un nouveau groupe</label>
         <!-- ce bouton renvoie sur la modal qui est définit dans le fichier modal-profil -->
      </div>
   <?php endif; ?>
   <!-- Si l'utilisateur n'as pas de groupe -->
<?php endif; ?>
<br>
<!-- afficher uniquement si c'est le user connecté -->

<!--- Faire le code pour afficher tous les groupes où le user y est-->
<?php foreach($groupes as $groupe){
   $allGroupes = $controler->groupe->groupeModel->findbyIdGroupe($groupe['idgroupe']);
   foreach($allGroupes as $oneGroupe) : ?>
   <a href="./?page=groupes&groupe=<?= $oneGroupe['idGroupe'] ?>&privacy=<?=$oneGroupe['groupePrivacy'] ?>" class="hover:scale-105 transition">
      <div class="card w-96 shadow-xl image-full relative">
         <figure><img src="data:<?= $oneGroupe['groupeTypeBanner'] ?>;base64,<?= base64_encode($oneGroupe['groupeBanner']) ?>" alt="Shoes" /></figure>
            <div class="card-body">
               <h2 class="card-title"><?= $oneGroupe['groupeName'] ?></h2>
               <p><?= $oneGroupe['groupeDescription'] ?></p>
            </div>
            <br>
      </div>
   <?php endforeach ; }?>







