<div class='p-8'>
   <h1 class='text-3xl font-leger'>Connexion</h1>

   <form action="../handler_formulaire/handler.php" class="max-w-2xl" method="POST">
      <div class='mt-4 flex gap-4'>
         <input type="email" placeholder="Adresse mail" name='email' required class="inputForm" />
         <input type="password" placeholder="Mot de passe" name='mdp' required class="inputForm" />
      </div>
      <div class='mt-4 flex gap-4'>
         <button class="btn button" type='submit' name='btn-connexion'>Button</button>
      </div>
   </form>
</div>