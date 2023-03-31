<div class='h-auto w-full'>



   <div class="w-full h-20 flex items-center">

      <div class="w-1/2 flex">
         <!-- le petit message de bienvenu -->
         <h1 class='ml-6 title'>
            <?= isset($_SESSION['id']) ? "Bienvenue " . $_SESSION['pseudo'] . " !" : "" ?>
         </h1>
         <!-- le petit message de bienvenu -->
      </div>

      <div class="justify-end w-1/2 flex">
         <!-- Barre de recherche -->
         <div class="content-center flex m-4 items-center">
            <i class="fa-solid fa-magnifying-glass text-2xl mr-4"></i>
            <input type="text" placeholder="Recherche" class="input w-full max-w-xs" />
         </div>
         <!-- Barre de recherche -->
      </div>

   </div>

   <div class='mt-4 grid grid-cols-4 gap-6'>

      <!-- Top user -->
      <div class='ml-6 col-start-1 col-end-3'>
         <h1 class='title'>MEILLEURS UTILISATEURS</h1>
         <!-- foreach pour afficher tous les users -->

         <div class='mt-4 gap-4 justify-center container-home p-4 flex flex-col'>
            <!-- un user -->
            <div class="flex gap-4 items-center">
               <h1 class='title text-yellow-300'>#1</h1>
               <img src="../assets/pp.jpg" alt="pp" class='w-14 h-14 rounded-full'>
               <h1 class='font-leger text-xl'>KiSEi</h1>
            </div>
            <!-- un user -->

            <!-- un user -->
            <div class="flex gap-4 items-center">
               <h1 class='title text-yellow-300'>#2</h1>
               <img src="../assets/pp.jpg" alt="pp" class='w-14 h-14 rounded-full'>
               <h1 class='font-leger text-xl'>KiSEi</h1>
            </div>
            <!-- un user -->

            <!-- un user -->
            <div class="flex gap-4 items-center">
               <h1 class='title text-yellow-300'>#3</h1>
               <img src="../assets/pp.jpg" alt="pp" class='w-14 h-14 rounded-full'>
               <h1 class='font-leger text-xl'>KiSEi</h1>
            </div>
            <!-- un user -->
         </div>


         <!-- foreach pour afficher tous les users -->
      </div>
      <!-- Top user -->

      <!-- Top groupe -->
      <div class='ml-6 col-start-3 col-end-6'>

         <h1 class='title'>MEILLEURES GROUPES</h1>

         <!-- foreach pour afficher tous les groupes -->
         <div class='mt-4 gap-4 justify-center container-home p-4 flex flex-col'>
            <!-- un groupe -->
            <div class="flex gap-4 items-center">
               <h1 class='title text-yellow-300'>#1</h1>
               <img src="../assets/pp.jpg" alt="pp" class='w-14 h-14 rounded-full'>
               <h1 class='font-leger text-xl'>MaBite</h1>
            </div>
            <!-- un groupe -->

            <!-- un groupe -->
            <div class="flex gap-4 items-center">
               <h1 class='title text-yellow-300'>#2</h1>
               <img src="../assets/pp.jpg" alt="pp" class='w-14 h-14 rounded-full'>
               <h1 class='font-leger text-xl'>MaBite</h1>
            </div>
            <!-- un groupe -->

            <!-- un groupe -->
            <div class="flex gap-4 items-center">
               <h1 class='title text-yellow-300'>#3</h1>
               <img src="../assets/pp.jpg" alt="pp" class='w-14 h-14 rounded-full'>
               <h1 class='font-leger text-xl'>MaBite</h1>
            </div>
            <!-- un groupe -->
            <!-- foreach pour afficher tous les groupes -->
         </div>
      </div>
      <!-- Top groupe -->

      <!-- Top jeux -->
      <div class='ml-6 col-start-1 col-end-3 container-home-no-bg'>
         <h1 class='title'>JEUX À LA UNE</h1>
      </div>

      <div class='p-6 col-start-1 h-48 col-end-7 flex flex-wrap items-center bg-[#2a2b2c] gap-0'>

         <div class="swiper mySwiper h-48">
            <div class="swiper-wrapper h-48">
               <div class="swiper-slide text-white"><img src="../assets/games/pp/IMG-6277c1dd81fac1.30807447.png" alt="pp jeux" class='h-[23rem]'></div>
               <div class="swiper-slide"><img src="../assets/games/pp/IMG-6277c1dd81fac1.30807447.png" alt="pp jeux" class='h-[23rem]'></div>
               <div class="swiper-slide"><img src="../assets/games/pp/IMG-634d7675e0cf83.13415792.jpg" alt="pp jeux" class='h-[23rem]'></div>
               <div class="swiper-slide"><img src="../assets/games/pp/IMG-627c1d61578b82.37357556.jpg" alt="pp jeux" class='h-[23rem]'></div>
               <div class="swiper-slide"><img src="../assets/games/pp/IMG-6277a0b2c5b848.96970598.png" alt="pp jeux" class='h-[23rem]'></div>
               <div class="swiper-slide"><img src="../assets/games/pp/IMG-6277a0b2c5b848.96970598.png" alt="pp jeux" class='h-[23rem]'></div>
            </div>
            <div class="swiper-pagination"></div>
         </div>

      </div>
      <!-- Top jeux -->

      <!-- Postes -->
      <div class='ml-6 col-start-1 col-end-6 container-home-no-bg'>

         <!-- récupération de tous les posts -->
         <?php
         $posts = $controler->post->postModel->getAllPosts();
         ?>
         <!-- récupération de tous les posts -->

         <!-- Header -->
         <div class="flex justify-between items-center">
            <h1 class='title mb-6'>Postes</h1>
            <label class="btn btn-sm" for="modal-create-post">
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
                  <!-- one poste -->
                  <div class='bg-secondary h-auto relative p-2 rounded-lg shadow-lg'>
                     <div class="grid grid-cols-post">
                        <div class="col-start-1 col-end-2">
                           <img src="data:<?= $post['userTypeImg'] ?>;base64,<?= base64_encode($post['userImg']) ?>" alt="pp" class='w-14 h-14 rounded-full'>
                        </div>
                        <div class="col-start-2 col-end-3 relative">

                           <!-- Pseudo et @ -->
                           <div class='flex gap-4 w-full'>
                              <div>
                                 <h3 class='font-leger text-xl'>
                                    <a href="/?page=profile&user=<?= $post['userPseudo'] ?>">
                                       <?= $post['userPrenom'] ?>
                                    </a>
                                 </h3>
                                 <h3 class='font-leger text-accent'>
                                    <a href="#">
                                       @<?= $post['userPseudo'] ?>
                                    </a>
                                 </h3>
                              </div>
                           </div>
                           <!-- Pseudo et @ -->

                           <!-- Afficher uniquement si on a un user connecté -->
                           <?php if (isset($_SESSION['id'])) : ?>
                              <!-- afficher uniquement si le post appartient au user connecté -->
                              <?php if ($post['fkIdUser'] === $_SESSION['id']) : ?>
                                 <div class="dropdown absolute right-0 top-0 z-10">
                                    <label tabindex="0" class="btn btn-sm">
                                       <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </label>
                                    <ul tabindex="0" class="dropdown-content menu p-2 bg-primary shadow rounded-box w-52">
                                       <li><button class="btn btn-secondary bg-slate-800">modifier</button></li>
                                       <form action="../handler_formulaire/handler.php" method="post">
                                          <input type="text" hidden name="idpost" value="<?= $post['idPost'] ?>">
                                          <li><button type='submit' name="deletePost" class="btn btn-secondary bg-red-800">supprimer</button></li>
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
                           <div class="w-full bg-primary rounded-md p-3 flex justify-around gap-4">
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
                  <!-- one poste -->

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