<!-- modal ajout avis jeux -->

<?php

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

<!-- Modal créer un post -->
<input type="checkbox" id="modal-create-post-game" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="modal-create-post-game" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-xl text-neutral font-bold"><i class="fa-solid fa-marker"></i> AJOUTER VOTRE AVIS</h3>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">


         <div class=''>
               
            <div class="flex items-center">
               <input required="required" name="gamepostgrade" max="20" maxlength="2" type="number" class="input input-bordered w-xs  placeholder-[#CCCCCF] placeholder:text-sm" placeholder="Note"/>
               <p class="ml-6 text-lg font-semibold">/ 20</p>
            </div>
            
            
            <textarea required="required" name='gamepostcontent' class='my-4 textarea textarea-bordered block w-full h-44 resize-none  placeholder-[#CCCCCF] placeholder:text-sm' placeholder="Qu'avez-vous pensé du jeu ?"></textarea>

            <div class="flex justify-end">
               <input hidden name="idgame" value="<?= $_GET['game'] ?>" type="text">
               <button type='submit' name='btn-add-post-game' class='btn w-full'>PUBLIER</button>
            </div>
            
         </div>

      </form>
   </div>
</div>
<!-- Modal créer un post -->