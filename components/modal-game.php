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
      <label for="modal-create-post" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-lg font-bold">AJOUTER VOTRE AVIS</h3>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">

         <div class='flex flex-col gap-4 w-full '>

            <input name="gamepostgrade" max="2" type="number" placeholder="Donnez une note sur 20" class="input input-bordered w-full max-w-xs" />
            <textarea name='gamepostcontent' class='textarea block w-full h-44 resize-none' placeholder="Qu'avez vous pensez du jeu ?"></textarea>

            <button type='submit' name='btn-add-post-game' class='btn btn-accent'>POSTER</button>
         </div>

      </form>
   </div>
</div>
<!-- Modal créer un post -->