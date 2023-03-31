<div class='h-auto p-8'>

   <!-- le petit message de bienvenu -->
   <h1 class='title'>
      <?= isset($_SESSION['id']) ? "Hello " . $_SESSION['pseudo'] : "Connectez-vous" ?>
   </h1>
   <!-- le petit message de bienvenu -->

   <div class='mt-4 grid grid-cols-6 gap-6'>

      <!-- Top trending -->
      <div class='col-start-1 col-end-4 container-home'>
         <h1 class='title'>Top Trending</h1>
      </div>
      <!-- Top trending -->

      <!-- Top user -->
      <div class='col-start-4 col-end-6 container-home'>
         <h1 class='title'>Top users</h1>

         <!-- foreach pour afficher tous les users -->
         <!-- un user -->
         <div class='mt-4 flex gap-4 items-center'>
            <h1 class='title text-yellow-300'>#1</h1>
            <img src="../assets/pp.jpg" alt="pp" class='w-14 h-14 rounded-full'>
            <h1 class='font-leger text-xl'>KiSEi</h1>
         </div>
         <!-- un user -->
         <!-- foreach pour afficher tous les users -->

      </div>
      <!-- Top user -->

      <!-- Top jeux -->
      <div class='col-start-1 col-end-2 container-home-no-bg'>
         <h1 class='title'>Top jeux</h1>
      </div>

      <div class='col-start-1 col-end-6 p-2 flex gap-4 flex-wrap container-home-no-bg'>
         <img src="../assets/games/pp/IMG-6277c1dd81fac1.30807447.png" alt="pp jeux" class='h-96 rounded-lg'>
         <img src="../assets/games/pp/IMG-634d7675e0cf83.13415792.jpg" alt="pp jeux" class='h-96 rounded-lg'>
         <img src="../assets/games/pp/IMG-627c1d61578b82.37357556.jpg" alt="pp jeux" class='h-96 rounded-lg'>
         <img src="../assets/games/pp/IMG-6277a0b2c5b848.96970598.png" alt="pp jeux" class='h-96 rounded-lg'>
      </div>
      <!-- Top jeux -->

      <!-- Postes -->
      <div class='col-start-1 col-end-6 container-home-no-bg'>

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
            <p>pas de post</p>
         <?php endif; ?>
         <!-- controler si on a des posts -->

      </div>
      <!-- Postes -->

   </div>
</div>