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

<input type="checkbox" id="modal-profil" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box bg-secondary max-w-3xl">
      <h3 class='title mb-4'>Modifier votre profile</h3>
      <label for="modal-profil" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <form action="../handler_formulaire/handler.php" method="post">
         <div>
            <div>
               <label for="pp" class='block mb-2 font-leger'>Pseudo</label>
               <input type="text" name='pseudo' class="inputForm bg-primary" value="<?= $user['userPseudo'] ?>" />
            </div>
            <div class='mt-4'>
               <textarea class="textarea w-full bg-primary resize-none h-44" placeholder="Bio" name='bio'><?= $user['userBio'] ?></textarea>
            </div>
            <div class="mt-4">
               <button class='btn button' type='submit' name='btn-edit-profile'>Modifier</button>
            </div>
         </div>
      </form>
   </div>
</div>