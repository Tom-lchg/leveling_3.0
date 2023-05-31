<!-- modal modification de profil -->
<?php
// je require tout aussi ici car modal-profil n'est pas dans l'arboressence des pages

// require controler
require_once('./mvc/controler/Controler.php');
require_once('./mvc/controler/User.php');
require_once('./mvc/controler/Groupe.php');
require_once('./mvc/controler/Games.php');

// require model
require_once('./mvc/model/User.php');
require_once('./mvc/model/Games.php');
require_once('./mvc/model/Groupe.php');
require_once('./mvc/model/Model.php');

use \mvc\controler\controler\Controler;

$controler = new Controler();
if (isset($_SESSION['id'])) {
   $user = $controler->user->userModel->findById($_SESSION['id'], 'idUser');
}

?>

<!-- Modal pour update un user -->
<input type="checkbox" id="modal-profil" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box bg-secondary max-w-3xl">
   <h3 class="text-xl text-neutral font-bold"><i class="fa-solid fa-paintbrush"></i> MODIFIER VOTRE PROFIL</h3>
      <label for="modal-profil" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <form action="../handler_formulaire/handler.php" method="post" enctype="multipart/form-data">
         <div>

            <div class='mt-4 w-full'>
            <label><p class="text-sm">Biographie</p></label>
            <textarea required="required" class='mt-4 textarea textarea-bordered placeholder-[#CCCCCF] w-full h-24' placeholder='Bio' name='bio'><?= $user['userBio'] ?></textarea>
            </div>

            <div class='mt-4 w-full flex items-center'>
            <img src="data:<?= $user['userTypeImg'] ?>;base64,<?= base64_encode($user['userImg']) ?>" alt="" class='w-20 h-20 rounded-full shadow-lg'>
            <input name="img" type="file" class="file-input file-input-bordered file-input-md w-full max-w-xs ml-4"/>
            <p class="ml-4 font-bold text-neutral text-sm"><i class="fa-sharp fa-solid fa-circle-exclamation"></i> JPG UNIQUEMENT</p>
            </div>

            <div class='mt-4 w-full flex items-center'>
            <img src="data:<?= $user['userTypeBanner'] ?>;base64,<?= base64_encode($user['userBanner']) ?>" alt="" alt="banner" class='h-20 w-40 rounded-lg'>
            <input name="banner" type="file" class="file-input file-input-bordered file-input-md w-full max-w-xs ml-4"/>
            <p class="ml-4 font-bold text-neutral text-sm"><i class="fa-sharp fa-solid fa-circle-exclamation"></i> JPG UNIQUEMENT</p>
            </div>
            


            <div class="mt-4 w-full">
               <button class='btn button w-full' type='submit' name='btn-edit-profile'>Modifier</button>
            </div>
         </div>
      </form>
   </div>
</div>
<!-- Modal pour update un user -->

<!-- Modal pour créer un groupe -->
<input type="checkbox" id="modal-create-groupe" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="modal-create-groupe" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-xl text-neutral font-bold"><i class="fa-solid fa-people-group"></i> CRÉER VOTRE GROUPE</h3>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">

         <div class='flex flex-col gap-4 w-full '>

            <input required="required" maxlength="20" class='input input-bordered w-xs placeholder-[#CCCCCF] placeholder:text-sm' type="text" placeholder="Nom de votre groupe" name='nomGroupe'>
            <textarea required="required" class='textarea textarea-bordered placeholder-[#CCCCCF]' placeholder='Description de votre groupe' name='descGroupe'></textarea>



            <div class="w-20">

               <div>
                  <label class="label cursor-pointer">
                     <input required="required" type="radio" name="privacy" value='publique' class="radio checked:bg-blue-500" checked />
                     <span class="label-text ml-4">Public</span> 
                  </label>
               </div>

               <div>
                  <label class="label cursor-pointer">
                     <input required="required" type="radio" name="privacy" value="prive" class="radio checked:bg-red-500" checked />
                     <span class="label-text ml-4">Privé</span> 
                  </label>
               </div>

            </div>

            <label><p class="text-sm">Photo du groupe</p></label>
            <input type="file" name="pp" class="file-input file-input-bordered w-full max-w-xs" />

            <label><p class="text-sm">Bannière du groupe</p></label>
            <input type="file" class="file-input file-input-bordered w-full max-w-xs mb-6" name="banner" />

            <button type='submit' name='btn-add-groupe' class='btn'>Créer votre groupe</button>
         </div>

      </form>
   </div>
</div>
<!-- Modal pour créer un groupe -->





<input type="checkbox" id="modal-edit-post" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="modal-edit-post" id="closeModalEditPost" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-lg font-bold"><?= $test ?></h3>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">

         <div class='flex flex-col gap-4 w-full '>

            <input class='input input-bordered border-accent w-full placeholder:text-md' type="text" placeholder="Intitulé du sujet" name='nomSujet'>

            <textarea class='textarea textarea-accent text-md textarea-xl' placeholder='Corp du sujet' name='descSujet'></textarea>

            <button type='submit' name='btn-add-sujet' class='btn'>Publier</button>
         </div>

      </form>
   </div>
</div>
<!-- Modal modifier un post -->
