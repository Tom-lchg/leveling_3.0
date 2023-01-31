<div class="p-8">
   <h2 class='text-3xl font-leger text-neutral'>Inscription</h2>

   <form action="../handler_formulaire/handler.php" method="post" class='max-w-2xl' enctype="multipart/form-data">
      <div class='mt-4 flex gap-4'>
         <input type="text" placeholder="Prénom" name='prenom' required class="inputForm" />
         <input type="text" placeholder="Nom" name='nom' required class="inputForm" />
      </div>
      <div class='mt-4 flex gap-4'>
         <input type="number" placeholder="Âge" name='age' required class="inputForm" />
      </div>
      <div class='mt-4 flex gap-4'>
         <input type="password" placeholder="Mot de passe" name='mdp' required class="inputForm" />
         <input type="email" placeholder="Adresse email" name='email' required class="inputForm" />
      </div>
      <div class='mt-4 flex gap-4'>
         <input type="text" placeholder="Pseudo" name='pseudo' required class="inputForm" />
         <input type="date" placeholder="Date de naissance" name='dateNaissance' required class="inputForm" />
      </div>
      <div class='mt-4 flex gap-4'>
         <div>
            <label for="pp" class='block mb-2 font-leger'>Photo de profile</label>
            <input type="file" name='pp' class="file-input w-full max-w-xs bg-secondary" />
         </div>
         <div>
            <label for="pp" class='block mb-2 font-leger'>Photo de bannière</label>
            <input type="file" name='banniere' class="file-input w-full max-w-xs bg-secondary" />
         </div>
      </div>
      <div class='mt-4 flex gap-4'>
         <textarea class="textarea bg-secondary w-full h-44 placeholder:font-leger resize-none" name='bio' placeholder="Bio"></textarea>
      </div>
      <div class='mt-4 flex gap-4 justify-end'>
         <button class="btn button" type='submit' name='btn-inscription'>Button</button>
      </div>
   </form>
</div>