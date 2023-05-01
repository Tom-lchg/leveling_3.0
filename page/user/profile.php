<?php
// profil du user
$user = $controler->user->userModel->getUserProfil($_GET['user']);

// posts du user
$userPosts = $controler->post->postModel->getAllPostsFromUser($user['idUser']);

// vérifie si on est ami
$isFriend = $controler->friend->friendModel->isFriend($_SESSION['id'], $user['idUser']);
?>

<!-- Container global -->
<div class="max-w-7xl mx-auto">

   <div class='h-56 relative mt-4'>
      <!-- bannière de user -->
      <img src="data:<?= $user['userTypeBanner'] ?>;base64,<?= base64_encode($user['userBanner']) ?>" alt="" alt="banner" class='rounded-t-lg h-full block w-full object-cover absolute'>
      <!-- bannière de user -->

      <!-- Pseudo + Settings -->
      <div class='ml-56 pr-2 relative z-10 justify-between flex gap-1 text-2xl h-full pb-1 items-end text-white font-leger'>

         <p class='drop-shadow-sm border-accent font-bold text-3xl font-toxigenesis'><?= $user['userPseudo'] ?></p>


      <!-- Bouton ajouter en ami, visible uniquement si on est sur le profil d'un autre user -->
      <?php if ($user['idUser'] !== $_SESSION['id']) : ?>
         <form action="../../handler_formulaire/handler.php" method="post">
            <!-- input invisible qui stock l'id de la personne-->
            <input type="text" name='iduser' value="<?= $user['idUser'] ?>" hidden>
            <!-- input invisible qui stock l'id de la personne -->

            <!-- input invisible qui stock le pseudo de la personne -->
            <input type="text" name='pseudo' value="<?= $user['userPseudo'] ?>" hidden>
            <!-- input invisible qui stock le pseudo de la personne -->

            <!-- On vérifie si on est ami avec le user -->
            <?php if ($isFriend) : ?>
               <button type="submit" class="btn btn-ghost btn-sm" name='btn-form-remove-friend'>
                  <i class="fa-sharp fa-solid fa-user-minus"></i>
               </button>
            <?php else : ?>
               <button type="submit" class="btn btn-ghost btn-sm" name='btn-form-friend'>
                  <i class="fa-solid fa-user-plus"></i>
               </button>
            <?php endif; ?>
            <!-- On vérifie si on est ami avec le user -->

         </form>
      <?php endif; ?>
      <!-- Bouton ajouter en ami, visible uniquement si on est sur le profil d'un autre user -->

         <!-- Button setting (uniquement afficher pour l'utilisateur connecté) -->
         <?php if (isset($_SESSION) && $_SESSION['id'] === $user['idUser']) : ?>
            <label for="modal-profil" class="btn btn-ghost btn-sm">
               <i class="fa-solid fa-gear"></i>
            </label>
         <?php endif; ?>
         <!-- Button setting -->

      </div>
      <!-- Pseudo + Settings -->

      <!-- Photo de profil -->
      
      <img src="data:<?= $user['userTypeImg'] ?>;base64,<?= base64_encode($user['userImg']) ?>" alt="" class='w-40 h-40 rounded-full absolute z-20 top-32 left-10 shadow-lg'>
      <img src="./assets/ranks/master/icon.png" alt="" width="50em" class="absolute z-20 left-40 top-[14.9rem] shadow-lg">
      
      <!-- Photo de profil -->

      <div class="flex justify-between bg-neutral drop-shadow-lg rounded-b-lg">
         <div class="flex">
            <!-- Menu du user-->
            <div class='mb-8 flex h-full items-center pl-8'>
               <div class='flex gap-4 items-center ml-[13em]'>
                  <div>
                     <!-- Nombre de posts -->
                     <p class="font-bold">POSTS</p>
                     <p>44</p>
                     <!-- Nombre de posts -->
                  </div>
                  <div class="divider divider-horizontal text-neutral"></div>
                  <div>
                     <!-- La date de l'inscription du user -->
                     <p class="font-bold">INSCRIPTION</p>
                     <p><?= $user['userDateInscription'] ?></p>
                     <!-- La date de l'inscription du user -->
                  </div>
                  <div class="divider divider-horizontal text-neutral"></div>
                  <div>
                     <!-- La date d'anniversaire du user -->
                     <p class="font-bold">ANNIVERSAIRE</p>
                     <p><?= $user['userNaissance'] ?></p>
                     <!-- La date d'anniversaire du user -->
                  </div>
               </div>
            </div>
         </div>
         <!-- Menu du user-->
      </div>

   </div>


   <div class='h-auto grid grid-cols-4 mt-24 gap-6'>

      <div class="col-start-1 col-end-2 container-home p-6">

         <div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary  rounded-md">
            <p>À PROPOS</p>
         </div>

         <div class="mt-2 text-justify">
            <!-- La bio -->
            <div class='mt-4 text-justify'>
               <p><?= $user['userBio'] ?></p>
            </div>
            <!-- La bio -->
         </div>

      </div>

      <div class="col-start-2 col-end-5">
         <!-- Tabs -->
         <div class="col-start-2 col-end-5 tabs gap-2 tabs-boxed mb-4 h-10 bg-accent font-semibold">

            <!-- Si onglets actif ou non -->
            <?php if (!isset($_GET['req'])) : ?>
               <a class="tab bg-white rounded-md text-accent" href="./?page=profile&user=<?= $_GET['user'] ?>">PROFIL</a>
            <?php else : ?>
               <a class="tab text-white" href="./?page=profile&user=<?= $_GET['user'] ?>">PROFIL</a>
            <?php endif; ?>

            <?php if (isset($_GET['req']) == 'groupe') : ?>
               <a class="tab bg-white rounded-md text-accent" href="./?page=profile&req=groupe&user=<?= $_GET['user'] ?>">GROUPES</a>
            <?php else : ?>
               <a class="tab text-white " href="./?page=profile&req=groupe&user=<?= $_GET['user'] ?>">GROUPES</a>
            <?php endif; ?>

            <?php if (isset($_GET['req']) == 'amis') : ?>
               <a class="tab bg-white rounded-md text-accent" href="./?page=profile&req=amis&user=<?= $_GET['user'] ?>">AMIS</a>
            <?php else : ?>
               <a class="tab text-white" href="./?page=profile&req=amis&user=<?= $_GET['user'] ?>">AMIS</a>
            <?php endif; ?>
            <!-- Si onglets actif ou non -->

         </div>
         <!-- Tabs -->

         <div class='mt-4 mb-4'>
            <?php if (!isset($_GET['req'])) : ?>

               <!-- Block de l'activité -->
               <div class="container-home p-6">

                  <div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md">
                     <p>ACTIVITÉ</p>
                  </div>

                  <div class="mt-2 text-justify">

                     <!-- Les postes de l'utilisateur -->

                     <!-- Afficher uniquement si on est sur notre profil -->
                     <?php if ($user['idUser'] === $_SESSION['id']) : ?>

                        <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">

                           <div class='flex flex-col gap-4 w-full'>

                              <textarea class='textarea block w-full h-24 resize-none textarea-bordered ' placeholder='Que souhaitez-vous partager ?' name='content'></textarea>

                              <button type='submit' name='btn-add-post' class='btn bg-accent text-white border-accent hover:bg-[#1991FF] hover:text-white hover:border-[#1991FF]'>Publier</button>
                           </div>

                        </form>
                     <?php endif; ?>
                     <!-- Afficher uniquement si on est sur notre profil -->

                  </div>


                  <div class='flex w-full gap-4 flex-col mt-4'>

                     <!-- Si aucun post -->
                        <p>Aucune activité pour le moment...</p>
                     <!-- Si aucun post -->

                     <!-- foreach pour afficher tous les posts -->
                     <?php foreach ($userPosts as $post) : ?>
                        <div class='bg-secondary h-auto relative p-2 rounded-lg shadow-lg'>
                           <div class="grid grid-cols-post">
                              <div class="col-start-1 col-end-2">
                                 <img src="data:<?= $user['userTypeImg'] ?>;base64,<?= base64_encode($user['userImg']) ?>" alt="pp" class='w-14 h-14 rounded-full'>
                              </div>
                              <div class="col-start-2 col-end-3 relative">

                                 <!-- Pseudo et @ -->
                                 <div class='flex gap-4 w-full'>
                                    <div>
                                       <h3 class='font-leger text-accent font-toxigenesis'>
                                          <a href="#">
                                             <?= $user['userPseudo'] ?>
                                          </a>
                                       </h3>
                                    </div>
                                 </div>
                                 <!-- Pseudo et @ -->

                                 <!-- afficher uniquement si le post appartient au user connecté -->
                                 <?php if ($post['fkIdUser'] === $_SESSION['id']) : ?>
                                    <div class="dropdown absolute right-0 top-0 z-10">
                                       <label tabindex="0" class="btn-link btn-sm">
                                          <i class="fa-solid fa-ellipsis-vertical"></i>
                                       </label>
                                       <ul tabindex="0" class="dropdown-content menu p-2 shadow rounded-box w-52">
                                          <li><button class="btn btn-success mb-2 text-white">Modifier</button></li>
                                          <form action="../handler_formulaire/handler.php" method="post">
                                             <input type="text" hidden name="idpost" value="<?= $post['idPost'] ?>">
                                             <li><button type='submit' name="deletePost" class="btn btn-error text-white">Supprimer</button></li>
                                          </form>
                                       </ul>
                                    </div>
                                 <?php endif; ?>
                                 <!-- afficher uniquement si le post appartient au user connecté -->
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
                        <!-- one poste -->
                     <?php endforeach; ?>
                     <!-- foreach pour afficher tous les posts -->

                  </div>
                  <!-- Les postes de l'utilisateur -->
               <?php endif; ?>

               <?php
               if (isset($_GET['req'])) {
                  switch ($_GET['req']) {
                     case 'amis':
                        require('amis.php');
                        break;
                     case 'groupe':
                        require('groupe.php');
                        break;
                     default:
                        header('location: ./?page=azrazr');
                        break;
                  }
               }
               ?>
               </div>
               <!-- Block de l'activité -->
         </div>

      </div>

   </div>



   </div>
</div>
<!-- Container global -->