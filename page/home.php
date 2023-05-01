<?php
// https://www.php.net/manual/en/function.random-int.php
$random_game = $controler->games->gameModel->findById(random_int(21, 32), 'idGame');
$all_games = $controler->games->gameModel->getALl();
?>

<div class='h-auto w-full'>

   <div class="w-full mt-10 flex items-center">
      <!-- Jeu à la une (aléatoire dans la gallerie) -->
      <div class="w-full flex items-center">
         <img src="../assets/games/pp/<?= $random_game['gameImg'] ?>" alt="pp jeux" class='h-48 drop-shadow-md'>
         <div class="mx-6">
            <p class="font-bold text-4xl drop-shadow-md text-accent"><?= $random_game['gameName'] ?></p>
            <p class="text-lg drop-shadow-sm break-normal text-primary h-24 w-full text-ellipsis overflow-hidden"><?= $random_game['gameDescription'] ?></p>
            <a class="btn btn-sm mt-4 btn-accent" href="?page=games&game=<?= $random_game['idGame'] ?>">Voir plus</a>
         </div>
      </div>
      <!-- Jeu à la une (aléatoire dans la gallerie) -->

   </div>

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

            <?php $users = $controler->user->userModel->getAll(); ?>

            <?php foreach ($users as $user) : ?>
               <!-- un user -->
               <div class="card w-80 bg-base-100 shadow-xl indicator ">

                  <span class="indicator-item indicator-top indicator-start"><img src="./assets/goldmedal.png" alt="" width="60em"></span>

                  <figure class="px-10 pt-10">
                     <img src="./assets/pp.jpg" alt="pp" class="rounded-xl" width="124em" />
                  </figure>

                  <div class="card-body flex items-center justify-center text-center">
                     <h2 class="text-2xl font-semibold text-accent font-toxigenesis"><?= $user['userPseudo'] ?></h2>
                     <div class="flex flex-col w-full border-opacity-50">
                        <div class="divider"></div>
                        <div class="flex space place-content-evenly">
                           <div>
                              <p class="text-lg font-bold">EXP</p>
                              <p><i class="fa-solid fa-stars"></i>127</p>
                           </div>
                           <div>
                              <p class="text-lg font-bold">POSTS</p>
                              <p>3431</p>
                           </div>
                        </div>
                        <div class="card-actions mt-4 self-center">
                           <a href="?page=profile&user=<?= $user['userPseudo'] ?>" class="btn btn-accent">
                              Son profil
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- un user -->
            <?php endforeach; ?>

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
            <label class="btn btn-sm btn-accent" for="modal-create-post">
               <i class="fa-solid fa-plus"></i>
            </label>
         </div>
         <!-- Header -->

         <!-- controler si on a des posts -->
         <?php if (count($posts) !== 0) : ?>
            <!-- Posts -->
            <div class="flex flex-col gap-6">
               <!-- foreach pour afficher tous les posts -->
               <?php foreach ($posts as $post) : ?>


                  <!-- one post -->
                  <div class='bg-secondary h-auto relative p-2 rounded-lg shadow-lg'>
                     <div class="grid grid-cols-post">
                        <div class="col-start-1 col-end-2">
                           <img src="data:<?= $post['userTypeImg'] ?>;base64,<?= base64_encode($post['userImg']) ?>" alt="pp" class='w-10 h-14 rounded-full'>
                        </div>
                        <div class="col-start-2 col-end-3 relative">

                           <!-- Pseudo -->
                           <div class='flex gap-4 w-full'>
                              <div>
                                 <h3 class='font-semibold text-accent font-xl font-toxigenesis'>
                                    <a href="#">
                                       <?= $post['userPseudo'] ?>
                                    </a>
                                 </h3>
                              </div>
                           </div>
                           <!-- Pseudo -->

                           <?php
                           $postcontent = $controler->post->postModel->getMessage($post['idPost']);
                           ?>

                           <!-- Modal modifier un post car on peut pas faire autrement-->
                           <input type="checkbox" id="modal-edit-post" class="modal-toggle" />
                           <div class="modal bg-modal">
                              <div class="modal-box relative bg-secondary max-w-3xl">
                                 <label for="modal-edit-post" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                                 <h3 class="text-lg font-bold">Modifier votre post <?= $post['idPost'] ?></h3>

                                 <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">

                                    <div class='flex flex-col gap-4 w-full '>

                                       <textarea class='textarea block w-full h-44 resize-none' name='content'><?= $postcontent ?><?= $post['idPost'] ?></textarea>
                                       <button type='submit' name='btn-add-post' class='btn btn-accent'>Modifier</button>
                                    </div>
                                 </form>
                              </div>
                           </div>

                           <!-- Afficher uniquement si on a un user connecté -->
                           <?php if (isset($_SESSION['id'])) : ?>
                              <!-- afficher uniquement si le post appartient au user connecté -->
                              <?php if ($post['fkIdUser'] === $_SESSION['id']) : ?>
                                 <div class="dropdown absolute right-0 top-0 z-10">
                                    <label tabindex="<?= $post['idPost'] ?>" class="btn-link btn-sm">
                                       <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </label>
                                    <ul tabindex="<?= $post['idPost'] ?>" class="dropdown-content menu p-2 shadow rounded-box w-52">
                                       <label for="modal-edit-post" id="modalEditPost" class="btn text-white btn-success mb-2">
                                          Modifier
                                       </label>
                                       <form action="../handler_formulaire/handler.php" method="post">
                                          <input type="text" hidden id="currentPostId" name="idpost" value="<?= $post['idPost'] ?>">
                                          <li><button type='submit' name="deletePost" class="btn btn-error text-white">Supprimer</button></li>
                                       </form>
                                    </ul>
                                 </div>
                              <?php endif; ?>
                              <!-- afficher uniquement si le post appartient au user connecté -->
                           <?php endif; ?>
                           <!-- Afficher uniquement si on a un user connecté -->

                           <div class='my-4'>
                              <p><?= $post['postContent'] ?></p>
                           </div>

                           <!-- message & like -->
                           <div class="w-full rounded-md p-3 flex justify-end gap-4">
                              <p>
                                 <i class="fa-solid fa-comment"></i>
                                 0
                              </p>
                              <p>
                                 <i class="fa-solid fa-heart"></i>
                                 0
                              </p>
                           </div>
                           <!-- message & like -->
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