<!-- récupération de tous les groupes publics -->
<?php
   $AllGroupsPublics = $controler->groupe->groupeModel->getAllGroupsPublic();
?>
<!-- récupération de tous les groupes publics -->
<div class='h-auto p-8'>

   <?php if (!isset($_GET['groupe'])) : ?>
      <div class="flex justify-between">
      <div class='basis-1/2 title font-toxigenesis'>GROUPES</div>
      <?php if (isset($_SESSION['id'])){ ?>
         <div class='basis-1/2 title font-toxigenesis'>
            <div>
               <!-- ce bouton renvoie sur la modal qui est définit dans le fichier modal-profil -->
               <label class='btn bg-accent text-white border-accent hover:bg-[#1991FF] hover:text-white hover:border-[#1991FF] my-2' for="modal-create-groupe">Créer votre propre groupe</label>
               <!-- ce bouton renvoie sur la modal qui est définit dans le fichier modal-profil -->
            </div>
         </div>   
         <?php }else{  ?>
            <button class="btn btn-info">CONNECTEZ-VOUS POUR CREER UN GROUPE !</button>
         <?php }  ?>
      </div>
      
      <div class='flex gap-4 mt-4 flex-wrap'>
         <!-- foreach pour afficher tous les groupes 
         C'est ici qu'on fera un foreach de tous les groupes publics-->
      <?php foreach($AllGroupsPublics as $oneGroupe) : ?>
         <div class="container-home flex items-center">
            <div class="shrink-0">
               <a href="./?page=groupes&groupe=<?= $oneGroupe['idGroupe'] ?>&privacy=<?=$oneGroupe['groupePrivacy'] ?>">    
                  <!-- <img class="object-cover rounded-md h-[150px] w-[150px]" src="../assets/pp5.jpg" alt=""> -->
                  <img class="object-cover rounded-md h-[150px] w-[150px]" src="data:<?= $oneGroupe['groupeTypeImg'] ?>;base64,<?= base64_encode($oneGroupe['groupeImg']) ?>" alt="">
               </a>
            </div>
            <div class="ml-4">
               <p class='drop-shadow-sm font-bold text-accent text-3xl font-toxigenesis'><?= $oneGroupe['groupeName'] ?></p>
               <p class="text-sm font-semibold">Groupe Public - <?= $oneGroupe['groupePublicNbUsers'] ?> membres</p>
               <p><?= $oneGroupe['groupeDescription']?></p>
            </div>
         </div>
         <?php endforeach; ?>

      </div>
   <?php endif; ?>

   <!-- page jeu -->
   <?php if (isset($_GET['groupe'])) : ?>
      <?php require('./page/groupes/groupeForum.php'); ?>
   <?php endif; ?>
   <!-- page jeu -->

</div>