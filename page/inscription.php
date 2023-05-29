<?php require('./global/header.php'); ?>

<div class="grid grid-cols-7">

    <div class="col-start-1 col-end-5 bg-[url('/assets/bg-with-logo.png')] bg-cover bg-center h-screen flex justify-center items-center drop-shadow-lg"></div>

    <div class="col-start-5 col-end-8 bg-neutral">


        <div class="p-6 w-full flex justify-center">
            <div class="tabs">
                <a class="tab tab-bordered tab-active" href="./?page=inscription">Inscription</a>
                <a class="tab tab-bordered" href="./?page=connexion">Connexion</a>
                <a class="tab tab-bordered" href="./?page=apropos">À propos</a>
            </div>
        </div>

        <div class="w-full flex justify-center mt-7">
            <p class="text-2xl">Inscription</p>
        </div>

        <div class="w-full flex justify-center">
            <div class="divider w-14"></div>
        </div>

        <div class="w-full flex justify-center">

            <form action="../handler_formulaire/handler.php" class="max-w-2xl" method="POST">

                <div class="w-[25rem]">

                    <form action="../handler_formulaire/handler.php" method="post" class='' enctype="multipart/form-data">
                        <div class='mt-4 w-full flex gap-4 justify-center'>
                            <input maxlength="20" type="text" placeholder="Prénom" name='prenom' required class="input input-bordered w-full" />
                            <input maxlength="20" type="text" placeholder="Nom" name='nom' required class="input input-bordered w-full" />
                        </div>

                        <div class='mt-4 flex gap-4 justify-center'>
                            <input maxlength="40" type="email" placeholder="E-mail" name='email' required class="input input-bordered w-full" />

                        </div>
                        <div class='mt-4 flex gap-4 justify-center'>
                            <input maxlength="15" type="text" placeholder="Pseudo" name='pseudo' required class="input input-bordered" />
                            <input maxlength="20" type="password" placeholder="Mot de passe" name='mdp' required class="input input-bordered w-full" />

                        </div>
                        <div class='mt-4 flex gap-4 justify-center items-center'>
                            <input type="date" placeholder="Date de naissance" name='dateNaissance' required class="input input-bordered w-full" />
                        </div>
                        <div class='mt-4 flex gap-4 justify-center'>
                            <div class="w-full">
                                <label for="pp" class='block mb-2 font-leger'>Photo de profil</label>
                                <input type="file" name='pp' class="file-input file-input-accent w-full bg-secondary" />
                            </div>
                        </div>
                        <div class='mt-4 flex gap-4 justify-center'>
                            <div class="w-full">
                                <label for="pp" class='block mb-2 font-leger'>Bannière du profil</label>
                                <input type="file" name='banniere' class="file-input-accent file-input w-full bg-secondary" />
                            </div>
                        </div>
                        <div class='mt-4 flex gap-4 justify-center'>
                            <textarea class="textarea bg-secondary w-full h-36 placeholder:font-leger placeholder-[#CCCCCF] resize-none" name='bio' placeholder="Dites-en plus sur vous, ce que vous aimez, vos jeux préférés..."></textarea>
                        </div>

                        <!-- Posé ici en attendant de savoir à quoi ça sert -->
                        <input hidden type="number" placeholder="Âge" name='age' required class="input input-bordered w-full" />

                        <div class='mt-4 flex gap-4 justify-end'>
                            <button class="btn btn-accent w-full" type='submit' name='btn-inscription'>S'inscrire</button>
                        </div>
                    </form>


                </div>

        </div>


    </div>

</div>

<?php require('./global/header-close.php') ?>