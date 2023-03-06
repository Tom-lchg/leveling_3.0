<?php
$user = $controler->user->userModel->getUserProfil($_GET['user']);
$friends = $controler->friend->friendModel->getFriends($user['idUser']);
?>

<h1 class='title mb-4'>Amis</h1>


<!-- On vérifie que l'utilisateur possède des amis -->
<?php if (count($friends) !== 0) : ?>

   <!-- foreach pour afficher tous les amis -->
   <?php foreach ($friends as $f) : ?>

      <!-- Code pour un ami -->
      <div class='flex gap-4 flex-wrap'>
         <div class='w-96 h-auto pb-4 bg-secondary rounded-lg relative shadow-md'>
            <img src="data:<?= $f['userTypeBanner'] ?>;base64,<?= base64_encode($f['userBanner']) ?>" alt="banniere user" class='h-32 w-full object-cover rounded-t-lg'>
            <img src="data:<?= $f['userTypeImg'] ?>;base64,<?= base64_encode($f['userImg']) ?>" alt="banniere user" class='rounded-full w-24 absolute h-24 top-16 left-4 object-cover shadow-lg'>
            <div class='mt-10 px-4'>
               <a href="../?page=profile&user=<?= $f['userPseudo'] ?>">
                  <h2 class='text-xl font-leger'><?= $f['userPseudo'] ?></h2>
               </a>
            </div>
         </div>
      </div>
      <!-- Code pour un ami -->

   <?php endforeach; ?>
   <!-- foreach pour afficher tous les amis -->
<?php else : ?>
   <p>pas d'amis</p>
<?php endif; ?>
<!-- On vérifie que l'utilisateur possède des amis -->