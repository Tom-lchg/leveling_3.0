<?php require('./global/header.php'); ?>

<div class="grid grid-cols-7">

    <div class="col-start-1 col-end-5 bg-[url('/assets/bg.jpg')] bg-contain h-screen flex justify-center items-center drop-shadow-lg">

    </div>

    <div class="col-start-5 col-end-8 bg-neutral">


    <div class="p-6 w-full flex justify-center">
        <div class="tabs">
            <a class="tab tab-bordered">Inscription</a> 
            <a class="tab tab-bordered tab-active">Connexion</a> 
            <a class="tab tab-bordered">À propos</a>
        </div>
    </div>

    <div class="w-full flex justify-center p-6 mt-14">   
        <img src="./assets/logo-white.png" alt="" class="w-14">
    </div>

    <div class="w-full flex justify-center">
        <h1 class='text-4xl text-white font-toxigenesis'>LEVELING</h1>
    </div>

    <div class="w-full flex justify-center mt-24">
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

<?php require('./global/header-close.php') ?>