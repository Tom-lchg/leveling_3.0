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
   $user = $controler->user->userModel->findById($_SESSION['id'], 'iduser');
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



<!-- Modal créer un post -->
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
      <label for="modal-create-sujet" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
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
      <label for="modal-topic-answers" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
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

<!-- Modal pour répondre à un un sujet d'un groupe--

<!-- Modal pour modifier les informations du groupe-->
<input type="checkbox" id="modal-update-group" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="modal-update-group" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-lg font-bold text-neutral">Modifier le groupe :</h3>
      <?php $oneGroupePublic = null; $oneGroupePrive = null;?>
      <?php if($_GET['privacy'] == "publique"){
         $oneGroupePublic = $controler->groupe->groupeModel->getOneGroupPublic($_GET["groupe"]);
      }else{
         $oneGroupePrive = $controler->groupe->groupeModel->getOneGroupPrive($_GET["groupe"]);
      }
      ?>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">
         <input type="hidden" name="idgroupe" value="<?= $_GET['groupe'] ?>">
         <input type="hidden" name="privacy" value="<?= $_GET['privacy'] ?>">
         <div class='flex flex-col gap-4 w-full text-neutral '>
            <label for="">
               <p class="text-xl ">Nom :</p>
               <input required="required" maxlength="100" class='input input-bordered w-120 placeholder-[#CCCCCF] placeholder:text-sm text-neutral' type="text" value="<?= $oneGroupePrive==null ? $oneGroupePublic['groupeName'] : $oneGroupePrive['groupeName'] ?>" name='update-title'>
            </label>
            <label for="">
               <p class="text-xl l">Description :</p>
               <input required="required" maxlength="100" class='input input-bordered w-200 placeholder-[#CCCCCF] placeholder:text-sm text-neutral' type="text" value="<?= $oneGroupePrive===null ? $oneGroupePublic['groupeDescription'] : $oneGroupePrive['groupeDescription'] ?>" name='update-desc'>
            </label>
            <button type='submit' name='btn-update-group-text' class='btn btn-accent'>Enregistrer le nom et la description</button>
         </div>     
      </form>


      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">
      <div class='flex flex-col gap-4 w-full text-neutral '>
      <input type="hidden" name="idgroupe" value="<?= $_GET['groupe'] ?>">
      <input type="hidden" name="privacy" value="<?= $_GET['privacy'] ?>">

            <div class="flex flex-row mt-8">
               <div class="basis-1/3">
                  <p class="text-xl ">Photo de profil :</p><br>
                  <img src="data:<?= $oneGroupePrive===null ? $oneGroupePublic['groupeTypeImg'] : $oneGroupePrive['groupeTypeImg'] ?>;base64,<?= $oneGroupePrive===null ? base64_encode($oneGroupePublic['groupeImg']) :  base64_encode($oneGroupePrive['groupeImg'])?>" class='max-w-md max-h-40' alt="">
                  <br><br>
               </div>
                  <div class="basis-2/3 mt-20">
                  <input type="file" class="file-input file-input-bordered w-50" name="update-group-profil" />
                  </div>
               </div>  
               <button type='submit' name='btn-update-group-pdp' class='btn btn-accent'>Enregistrer la nouvelle photo de profil</button>  
            </div>
      </form>

      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">
      <div class='flex flex-col gap-4 w-full text-neutral '>
      <input type="hidden" name="idgroupe" value="<?= $_GET['groupe'] ?>">
      <input type="hidden" name="privacy" value="<?= $_GET['privacy'] ?>">
            <div class="flex flex-row mt-8">
               <div class="basis-1/2">
                  <p class="text-xl ">Bannière :</p><br>
                  <img src="data:<?= $oneGroupePrive===null ? $oneGroupePublic['groupeTypeBanner'] : $oneGroupePrive['groupeTypeBanner'] ?>;base64,<?= $oneGroupePrive===null ? base64_encode($oneGroupePublic['groupeBanner']) :  base64_encode($oneGroupePrive['groupeBanner'])?>" alt="banner" class='max-w-md max-h-40'>

                  <br><br><br><br><br><br>
               </div>
                  <div class="basis-1/2 mt-20">
                  <input type="file" class="file-input file-input-bordered w-50" name="update-group-banner" />
                  </div>
               </div>  
               <button type='submit' name='btn-update-group-banner' class='btn btn-accent'>Enregistrer la nouvelle bannière</button>  
            </div>
      </form>
   </div>
   </div>
</div>

<!-- Modal pour modifier les informations du groupe-->

<!--- Modal pour ajouter une personne dans un groupe privé -->

<input type="checkbox" id="modal-add-user-groupe" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box relative bg-secondary max-w-3xl">
      <label for="modal-add-user-groupe" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <h3 class="text-lg font-bold">AJOUTER UNE PERSONNE :</h3>
      <?php $allUserNotInGroupe = $controler->groupe->groupeModel->getUserNotOnGroupe($_GET['groupe']);?>
      <center>
      <form action="../handler_formulaire/handler.php" method="POST" class='mt-4 w-full' enctype="multipart/form-data">
         <select class="select w-full max-w-xs" name="selectedUser">
            <option disabled selected>Liste de tous les utilisateurs qui ne sont pas dans le groupe</option>
            <?php foreach($allUserNotInGroupe as $oneUser) :?>           
            <option value="<?= $oneUser['idUser'] ?>"><?= $oneUser['userPseudo'] ?></option>
            <?php endforeach; ?>
         </select><br><br>
         <input type="hidden" name="idgroupe" value="<?= $_GET['groupe'] ?>">
         <input type="hidden" name="privacy" value="<?= $_GET['privacy'] ?>">
         <button type='submit' name='btn-add-user-groupe' class='btn btn-accent'>Ajouter cette personne</button>
   </div>

      </form>

      </center>
      
   </div>
</div>

<!--- Modal pour ajouter une personne dans un groupe privé -->
