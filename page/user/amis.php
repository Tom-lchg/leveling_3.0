<?php
$user = $controler->user->userModel->getUserProfil($_GET['user']);
$friends = $controler->friend->friendModel->getFriends($user['idUser']);
?>

<div class="container-home w-full h-auto px-6 pt-6">

<div class="font-bold mb-6 w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md"><p>AMIS</p></div>


   <!-- On vérifie que l'utilisateur possède des amis -->
   <?php if (count($friends) !== 0) : ?>

   <div class="flex gap-4 justify-center">

   <!-- foreach pour afficher tous les amis -->
   <?php foreach ($friends as $f) { ?>

      <!-- Code pour un ami -->

      <div class="container-home rounded-md flex items-center w-full mb-4">
            <div class="shrink-0">
            <img src="data:<?= $f['userTypeImg'] ?>;base64,<?= base64_encode($f['userImg']) ?>" alt="banniere user" class='object-cover rounded-full h-[80px] w-[80px]'>
            </div>
            <div class="ml-2 h-[80px] w-full p-2 flex items-center">
               <p class='drop-shadow-sm font-bold text-accent text-3xl'>
               <a href="../?page=profile&user=<?= $f['userPseudo'] ?>">
                  <h2 class='text-xl font-leger font-toxigenesis text-accent'><?= $f['userPseudo'] ?></h2>
               </a>
               </p>
            </div>
         </div>

      <!-- Code pour un ami -->

   <?php } ?>

   </div>
   <!-- foreach pour afficher tous les amis -->
<?php else : ?>

   <div class="m-6 flex justify-center items-center">
      <p>Aucun amis pour le moment...</p>
   </div>

<?php endif; ?>
<!-- On vérifie que l'utilisateur possède des amis -->

</div>


</div>