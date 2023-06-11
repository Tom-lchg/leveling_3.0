<?php

// https://www.php.net/manual/en/function.random-int.php
$random_game = $controler->games->gameModel->findById(random_int(21, 32), 'idGame');
$all_games = $controler->games->gameModel->getAll();
?>

<div class='h-auto w-full'>

   <!-- Jeu à la une (aléatoire dans la gallerie) -->
   <div class="w-full mt-10 flex items-center relative z-0">
      <div class="w-full flex items-center">
         <img src="../assets/games/pp/<?= $random_game['gameImg'] ?>" alt="pp jeux" class='h-48 drop-shadow-md'>
         <div class="mx-6">
            <p class="font-bold text-4xl drop-shadow-sm text-accent"><?= $random_game['gameName'] ?></p>
            <p class="text-lg text-primary h-[82px] w-full  text-ellipsis overflow-hidden"><?= $random_game['gameDescription'] ?></p>
            <a class="btn btn-sm mt-4 btn-accent" href="?page=games&game=<?= $random_game['idGame'] ?>">Voir plus</a>
         </div>
      </div>
   </div>
   <!-- Jeu à la une (aléatoire dans la gallerie) -->

   <div class='mt-4 grid grid-cols-4 gap-6'>

      <!-- Top jeux -->
      <div class='col-start-1 col-end-3 container-home-no-bg mt-6'>
         <h1 class='font-bold text-xl text-accent'><i class="fa-solid fa-star"></i> JEUX À LA UNE</h1>
      </div>

      <div class='p-6 col-start-1 h-auto col-end-7 flex items-center bg-neutral rounded-md'>
         <!-- Carousel (12 jeux aléatoires) -->
         <div class="swiper mySwiper">
            <div class="swiper-wrapper">
               <!-- foreach de tous les jeux -->
               <?php foreach ($all_games as $game) : ?>
                  <div class="swiper-slide"><img src="../assets/games/pp/<?= $game['gameImg'] ?>" alt="pp jeux" class='h-[15rem]'></div>
               <?php endforeach; ?>
               <!-- foreach de tous les jeux -->
            </div>
            <div class="swiper-pagination"></div>
         </div>
         <!-- Carousel (12 jeux aléatoires) -->
      </div>
      <!-- Top jeux -->

      <!-- Top user -->
      <div class='col-start-1 col-end-6'>

         <h1 class='font-bold text-xl text-accent'><i class="fa-solid fa-trophy"></i> MEILLEURS UTILISATEURS</h1>
         <!-- foreach pour afficher tous les users -->

         <div class='mt-8 gap-4 justify-center container-home-no-bg p-4 flex'>

            <?php $topUsers = $controler->user->userModel->topUsers(); ?>

            <?php $i = 1; ?>
            <?php foreach ($topUsers as $user) { ?>
               <!-- un user -->
               <div class="card w-80 bg-base-100 shadow-xl indicator ">

               <?php
               switch ($i) {
                  case 1: ?>
                     <span class="indicator-item indicator-top indicator-start"><img src="./assets/goldmedal.png" alt="" width="60em"></span> 
                     <?php break;
                  case 2: ?>
                     <span class="indicator-item indicator-top indicator-start"><img src="./assets/silvermedal.png" alt="" width="60em"></span>
                     <?php break;
                  case 3: ?>
                     <span class="indicator-item indicator-top indicator-start"><img src="./assets/bronzemedal.png" alt="" width="60em"></span> 
                     <?php break;
               } ?>

                  <figure class="px-10 pt-10">
                     <img src="data:<?= $user['userTypeImg'] ?>;base64,<?= base64_encode($user['userImg']) ?>" alt="" class='rounded-xl w-48 h-48'>
                  </figure>

                  <div class="card-body flex items-center justify-center text-center">
                     <h2 class="text-2xl font-semibold text-accent font-toxigenesis"><?= $user['userPseudo'] ?></h2>
                     <div class="flex flex-col w-full border-opacity-50">
                        <div class="divider"></div>
                        <div class="flex space place-content-evenly">
                           <div>
                              <p class="text-lg font-bold">EXP</p>
                              <p><i class="fa-solid fa-stars"></i><?= $user['userXP'] ?></p>
                           </div>
                        </div>
                        <div class="card-actions mt-4 self-center">
                           <a href="?page=profile&activite&user=<?= $user['userPseudo'] ?>" class="btn btn-accent">
                              Son profil
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <?php $i++ ?>
               <!-- un user -->
            <?php } ?>

         </div>
         <!-- foreach pour afficher tous les users -->
      </div>


      <!-- Posts -->
      <div class='col-start-1 col-end-6 container-home-no-bg'>

         <!-- récupération de tous les posts -->
         <?php
         $posts = $controler->post->postModel->getAllPosts();
         ?>
         <!-- récupération de tous les posts -->

         <!-- Header -->
         <div class="flex justify-between items-center">
            <h1 class='font-bold text-xl mb-6 mr-4 text-accent'><i class="fa-regular fa-clock"></i> ACTUALITÉS</h1>
         </div>
         <!-- Header -->

         <!-- Créer un post depuis la page d'accueil -->
         <div class="w-full">
            


      <form action="../handler_formulaire/handler.php" method="POST" class=' w-full' enctype="multipart/form-data">

         <div class='flex flex-col gap-4 w-full'>

            <textarea class='textarea block w-full h-24 resize-none textarea-bordered ' minlength="10" placeholder='Que voulez-vous partager ? (10 caractères minimum)' name='content'></textarea>

            <button type='submit' name='btn-add-post' class='btn btn-accent mb-4'>PUBLIER</button>
         </div>

      </form>

         </div>
         <!-- Créer un post depuis la page d'accueil -->

         <!-- controler si on a des posts -->
         <?php if (count($posts) !== 0) : ?>
            <!-- Posts -->
            <div class="flex flex-col gap-6">
               <!-- foreach pour afficher tous les posts -->
               <?php foreach ($posts as $post) : ?>
                           <?php
                           $postcontent = $controler->post->postModel->getMessage($post['idPost']);
                           ?>
                     <!-- one post -->
                        <div class='bg-secondary h-auto relative p-2 rounded-lg shadow-lg mt-4'>
                           <div class="grid grid-cols-post">

                              <div class="col-start-1 col-end-3 relative p-4">
                                 <!-- Pseudo et @ -->
                                 <div class='flex gap-4 w-full'>
                                    <div class="flex items-center">
                                    <img src="data:<?= $post['userTypeImg'] ?>;base64,<?= base64_encode($post['userImg']) ?>" alt="pp" class='w-14 h-14 rounded-full'>
                                       <h3 class='font-leger text-accent font-toxigenesis ml-4'>
                                          <a href="#">
                                             <?= $post['userPseudo'] ?>
                                          </a>
                                       </h3>
                                       <img src="./assets/ranks/<?= $post['userLevel'] ?>/icon.png" alt="" width="24em" class="ml-2">
                                    </div>

                                 <!-- afficher uniquement si le post appartient au user connecté -->
                                 <?php if ($post['fkIdUser'] === $_SESSION['id']) : ?>
                                    <div class="w-full rounded-md p-3 flex justify-end gap-4">
                                          <form action="../handler_formulaire/handler.php" method="post">
                                             <input type="text" hidden name="idpost" value="<?= $post['idPost'] ?>">
                                             <button type='submit' name="deletePostFromProfil" class="btn btn-error text-white"><i class="fa-solid fa-trash"></i></button>
                                          </form>
                                    </div>
                                 <?php endif; ?>
                                 <!-- afficher uniquement si le post appartient au user connecté -->

                                 </div>
                                 <!-- Pseudo et @ -->

                                 
                                 <div class='my-4'>
                                 <div class="divider"></div>
                                 <?= $post['postContent'] ?>
                                 </div>

                              

                              </div>
                           </div>

                        </div>
                  <!-- one post -->

               <?php endforeach; ?>
               <!-- foreach pour afficher tous les posts -->

            </div>
            <!-- Posts -->
         <?php else : ?>
            <p>Rien de nouveau pour le moment...</p>
         <?php endif; ?>
         <!-- controler si on a des posts -->

      </div>
      <!-- Postes -->

   </div>
   
   
   
</div>

