<?php require('./global/header.php'); ?>

<div class="grid grid-cols-7">

   <div class="col-start-1 col-end-5 bg-[url('/assets/bg-with-logo.png')] bg-cover bg-center h-screen flex justify-center items-center drop-shadow-lg"></div>

   <div class="col-start-5 col-end-8 bg-neutral">


      <div class="p-6 w-full flex justify-center">
         <div class="tabs">
            <a class="tab tab-bordered" href="./?page=inscription">Inscription</a>
            <a class="tab tab-bordered tab-active" href="./?page=connexion">Connexion</a>
            <a class="tab tab-bordered" href="./?page=apropos">À propos</a>
         </div>
      </div>

      <div>

         <div class="w-full flex justify-center mt-60">
            <p class="text-2xl">Connexion</p>
         </div>

         <div class="w-full flex justify-center">
            <div class="divider w-14"></div>
         </div>

         <div class="w-full flex justify-center">
            <div class="w-72">
               <form action="../handler_formulaire/handler.php" class="max-w-2xl" method="POST">
                  <div>
                     <input type="email" placeholder="E-mail" name='email' required class="input input-bordered w-full max-w-xs mb-4" />
                     <input type="password" placeholder="Mot de passe" name='mdp' required class="input input-bordered w-full max-w-xs mb-4" />
                     <button class="btn btn-accent w-full" type='submit' name='btn-connexion'>Connexion</button>
                  </div>
               </form>
            </div>
         </div>

      </div>


   </div>

</div>

<?php require('./global/header-close.php') ?>