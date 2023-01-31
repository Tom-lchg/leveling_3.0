<!-- modal modification de profil -->
<input type="checkbox" id="modal-profil" class="modal-toggle" />
<div class="modal bg-modal">
   <div class="modal-box bg-secondary max-w-3xl">
      <h3 class='title mb-4'>Modifier votre profile</h3>
      <label for="modal-profil" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
      <form action="#" method="post">
         <div>
            <div>
               <label for="pp" class='block mb-2 font-leger'>Pseudo</label>
               <input type="text" name='pseudo' class="inputForm bg-primary" value='KiSEi' />
            </div>
            <div class='mt-4'>
               <textarea class="textarea w-full bg-primary resize-none h-44" placeholder="Bio" name='bio'>azrazrazr</textarea>
            </div>
            <div class="mt-4">
               <button class='btn button' type='submit' name='btn-edit-profile'>Modifier</button>
            </div>
         </div>
      </form>
   </div>
</div>
</div>