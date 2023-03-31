<?php
// profil du user
$user = $controler->user->userModel->getUserProfil($_GET['user']);

// posts du user
$userPosts = $controler->post->postModel->getAllPostsFromUser($user['idUser']);

// vérifie si on est ami
$isFriend = $controler->friend->friendModel->isFriend($_SESSION['id'], $user['idUser']);
?>

<div class='h-56 relative'>
   <!-- bannière de user -->
   <img src="data:<?= $user['userTypeBanner'] ?>;base64,<?= base64_encode($user['userBanner']) ?>" alt="banner" class='h-full block w-full object-cover absolute' />
   <!-- bannière de user -->


   <!-- Le menu en bas à gauche de la bannière -->
   <div class='relative z-10 flex gap-10 text-2xl w-full h-full pb-1 items-end pr-8 justify-end text-white font-leger'>
      <a href="./?page=profile&req=groupe&user=<?= $_GET['user'] ?>">Groupe</a>
      <a href="./?page=profile&user=<?= $_GET['user'] ?>">Profile</a>
      <a href="./?page=profile&req=amis&user=<?= $_GET['user'] ?>">Amis</a>
   </div>
   <!-- Le menu en bas à gauche de la bannière -->

   <!-- Photo de profil -->
   <img src="data:<?= $user['userTypeImg'] ?>;base64,<?= base64_encode($user['userImg']) ?>" alt="pp user" class='w-60 h-60 rounded-full absolute top-24 left-10 shadow-lg' />
   <!-- Photo de profil -->

</div>

<div class='h-auto px-8 mt-32'>
   <div class='flex justify-between items-center'>
      <!-- Pseudo du user -->
      <h1 class='title'><?= $user['userPseudo'] ?></h1>
      <!-- Pseudo du user -->

      <!-- Button setting (uniquement afficher pour l'utilisateur connecté) -->
      <?php if (isset($_SESSION) && $_SESSION['id'] === $user['idUser']) : ?>
         <label for="modal-profil" class="btn">
            <i class="fa-solid fa-gear"></i>
         </label>
      <?php endif; ?>
      <!-- Button setting -->

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
               <button type="submit" class='btn btn-error' name='btn-form-remove-friend'>
                  <i class="fa-sharp fa-solid fa-user-minus"></i>
               </button>
            <?php else : ?>
               <button type="submit" class='btn btn-success' name='btn-form-friend'>
                  <i class="fa-solid fa-user-plus"></i>
               </button>
            <?php endif; ?>
            <!-- On vérifie si on est ami avec le user -->

         </form>
      <?php endif; ?>
      <!-- Bouton ajouter en ami, visible uniquement si on est sur le profil d'un autre user -->

   </div>

   <!-- Le @ -->
   <h3 class='text-accent'>@<?= $user['userPrenom'] ?></h3>
   <!-- Le @ -->

   <!-- La bio -->
   <div class='mt-4 text-justify'>
      <p><?= $user['userBio'] ?></p>
   </div>
   <!-- La bio -->

   <div class='flex gap-8 items-center text-accent mt-4'>
      <!-- La date de l'inscription du user -->
      <div class='flex gap-2 items-center'>
         <i class="fa-regular fa-calendar-days"></i>
         <p>Joined October 14</p>
      </div>
      <!-- La date de l'inscription du user -->

      <!-- La date de naissance du user -->
      <div class='flex gap-2 items-center'>
         <i class="fa-solid fa-cake-candles"></i>
         <p><?= $user['userNaissance'] ?></p>
      </div>
      <!-- La date de naissance du user -->

   </div>

   <hr class='my-8 border-secondary'>

   <div class='mt-4 mb-4'>
      <?php if (!isset($_GET['req'])) : ?>

         <!-- Les postes de l'utilisateur -->
         <div class="flex justify-between items-center">
            <h1 class='title mb-6'>Postes</h1>

            <!-- Afficher uniquement si on est sur notre profil -->
            <?php if ($user['idUser'] === $_SESSION['id']) : ?>
               <label class="btn btn-sm" for="modal-create-post-from-profil">
                  <i class="fa-solid fa-plus"></i>
               </label>
            <?php endif; ?>
            <!-- Afficher uniquement si on est sur notre profil -->

         </div>


         <div class='flex w-full gap-4 flex-col'>

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
                              <h3 class='font-leger text-xl'>
                                 <a href="#">
                                    <?= $user['userPrenom'] ?>
                                 </a>
                              </h3>
                              <h3 class='font-leger text-accent'>
                                 <a href="#">
                                    @<?= $user['userPseudo'] ?>
                                 </a>
                              </h3>
                           </div>
                        </div>
                        <!-- Pseudo et @ -->

                        <!-- afficher uniquement si le post appartient au user connecté -->
                        <?php if ($post['fkIdUser'] === $_SESSION['id']) : ?>
                           <div class="dropdown dropdown-end absolute right-0 top-0 z-10">
                              <label tabindex="0" class="btn btn-sm">
                                 <i class="fa-solid fa-ellipsis-vertical"></i>
                              </label>
                              <ul tabindex="0" class="dropdown-content menu p-2 bg-primary shadow rounded-box w-52">
                                 <li><button class="btn btn-secondary bg-slate-800">modifier</button></li>
                                 <form action="../handler_formulaire/handler.php" method="post">
                                    <input type="text" hidden name="idpost" value="<?= $post['idPost'] ?>">
                                    <li><button type='submit' name="deletePostFromProfil" class="btn btn-secondary bg-red-800">supprimer</button></li>
                                 </form>
                              </ul>
                           </div>
                        <?php endif; ?>
                        <!-- afficher uniquement si le post appartient au user connecté -->
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

</div>