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
      <form action="../handler_formulaire/handler.php" method="post">
         <div>

            <div class='mt-4'>
               <label><p class="text-sm">Pseudonyme</p></label>
               <input required="required" value="<?= $user['userPseudo'] ?>" maxlength="20" class='mt-4 input input-bordered w-xs placeholder-[#CCCCCF] placeholder:text-sm' type="text" placeholder="Pseudonyme" name='pseudo'>
            </div>

            <div class='mt-4 w-full'>
            <label><p class="text-sm">Biographie</p></label>
            <textarea required="required" class='mt-4 textarea textarea-bordered placeholder-[#CCCCCF] w-full h-24' placeholder='Bio' name='bio'><?= $user['userBio'] ?></textarea>
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


<!-- Modal créer un post -->
<input type="checkbox" id="modal-create-post" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="modal-create-post" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-lg font-bold">Publier un post</h3>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">

         <div class='flex flex-col gap-4 w-full '>

            <textarea class='textarea block w-full h-44 resize-none' placeholder='Que voulez-vous partager ?' name='content'></textarea>

            <button type='submit' name='btn-add-post' class='btn btn-accent'>Créer</button>
         </div>

      </form>
   </div>
</div>
<!-- Modal créer un post -->



<!-- Modal modifier un post -->

<!-- Si on modifie un post alors on doit récupéré le content et l'id du post -->
<?php
$test = "c pas bon";
if (isset($_GET['updatePost'])) {
   $test = "c bon";
}
?>
<!-- Si on modifie un post alors on doit récupéré le content et l'id du post -->


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



<!-- Modal pour crée un sujet d'un groupe-->
<input type="checkbox" id="modal-create-sujet" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-lg font-bold">Publier un sujet</h3>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">
         <div class='flex flex-col gap-4 w-full '>
            <input type="hidden" name="idgroupe" value="<?= $_GET['groupe']?>">
            <input type="hidden" name="idauteur" value="<?= $_SESSION['id']?>">
            <input type="hidden" name="privacy" value="<?= $_GET['privacy']?>">
            <input required="required" maxlength="100" class='input input-bordered w-xs placeholder-[#CCCCCF] placeholder:text-sm' type="text" placeholder="Titre du sujet" name='titreSujet'>
            <textarea class='textarea textarea-accent text-md textarea-xl' placeholder='Corp du sujet' name='descSujet'></textarea>
            <button type='submit' name='btn-add-topic' class='btn btn-accent'>Créer votre sujet</button>
         </div>

      </form>
   </div>
</div>
<!-- Modal pour crée un sujet d'un groupe-->


<!-- Modal pour répondre à un sujet d'un groupe-->
<input type="checkbox" id="modal-topic-answers" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-lg font-bold">Répondre</h3>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">
         <div class='flex flex-col gap-4 w-full '>
            <input type="hidden" name="idsujet" value="<?= $_GET['sujet']?>">
            <input type="hidden" name="idauteur" value="<?= $_SESSION['id']?>">
            <input type="hidden" name="idgroupe" value="<?= $_GET['groupe']?>">
            <input type="hidden" name="privacy" value="<?= $_GET['privacy']?>">
            <textarea class='textarea textarea-accent text-md textarea-xl' placeholder='Corp de la réponse' name='descAnswers'></textarea>
            <button type='submit' name='btn-answer-topic' class='btn btn-accent'>Publier votre réponse</button>
         </div>

      </form>
   </div>
</div>

<!-- Modal pour répondre à un un sujet d'un groupe-->


