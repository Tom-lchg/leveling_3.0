<?php
$user = $controler->user->userModel->getUserProfil($_GET['user']);
$groupes = $controler->groupe->groupeModel->getGroupbyUser($user['idUser']);


?>
   




   
<div class="container-home p-6">

<div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md"><p>GROUPES</p></div>

<div class="mt-2 text-justify">
   <!-- afficher uniquement si c'est le user connecté qui est sur son profil -->
   <?php if ($user['idUser'] === $_SESSION['id']) : ?>
         <label class='btn w-full bg-accent text-white border-accent hover:bg-[#1991FF] hover:text-white hover:border-[#1991FF] mt-2' for="modal-create-groupe">Créer un nouveau groupe</label>
   <?php endif; ?>
   <!-- afficher uniquement si c'est le user connecté qui est sur son profil -->
</div>

<!-- afficher uniquement si c'est le user connecté -->
<?php if ($user['idUser'] === $_SESSION['id']) : ?>
   <!-- Si l'utilisateur n'as pas de groupe -->
   <?php if (count($groupes) === 0) : ?>
      <div class="m-6 flex justify-center items-center">
         <p>Aucun groupe pour le moment...</p>
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
      <div class="container-home rounded-md flex items-center w-full mb-4">
            <div class="shrink-0">
               <a href="./?page=groupes&groupe=<?= $oneGroupe['idGroupe'] ?>&privacy=<?=$oneGroupe['groupePrivacy'] ?>">    
                  <img class="object-cover rounded-md h-[80px] w-[80px]" src="data:<?= $oneGroupe['groupeTypeImg'] ?>;base64,<?= base64_encode($oneGroupe['groupeImg']) ?>" alt="">
               </a>
            </div>
            <div class="ml-2 h-[80px] w-full p-2">
               <p class='drop-shadow-sm font-bold text-accent text-3xl font-toxigenesis'><?= $oneGroupe['groupeName'] ?></p>
               <p><?= $oneGroupe['groupeDescription']?></p>
            </div>
         </div>

   <?php endforeach ; }?>







