<?php

$game = $controler->games->gameModel->findById($_GET['game'], 'idGame');
$gamepc = $controler->games->gameModel->findByIdPc($_GET['game'], 'idGame');
$gamecs = $controler->games->gameModel->findByIdCs($_GET['game'], 'idGame');
$gamesperf = $controler->games->gameModel->getPerf();

?>

<div class="max-w-7xl mx-auto">

    <div class='h-[23rem] relative rounded-md'>

        <!-- bannière de user -->
        <img src="../assets/games/others/<?= $game['gameImgOther'] ?>" alt="" alt="banner" class='rounded-md h-full block w-full object-cover absolute'>
        <!-- bannière de user -->

        <!-- Pseudo + Settings -->
        <div class='ml-[12em] top-60 absolute z-10 justify-between flex text-2xl h-auto text-white font-leger'>
            <p class='drop-shadow-2xl border-accent font-bold text-3xl font-toxigenesis'><?= $game['gameName'] ?></p>


            <!-------------------- PERFORMANCE -------------------->

            <div class="ml-4 bg-neutral w-auto flex px-4 rounded-md">

            <?php if ($_SESSION['pseudo'] == "GARCIA_Clara") { ?>

                <?php foreach ($gamesperf as $onegameperf) {

                    if ($onegameperf['idGame'] == $_GET['game']) {

                        ?> <p><?php echo $onegameperf['performance']; ?> : </p><?php

                        switch ($onegameperf['nbetoile']) {
                            case 1: ?>
                                <div class="ml-2">
                                    <i class="fa-solid fa-star text-amber-500"></i>
                                </div>
                            <?php break;
                            case 2: ?>
                                <div class="ml-2">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            <?php break;
                            case 3: ?>
                                <div class="ml-2">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                            <?php break;
                            case 4: ?>
                                <div class="ml-2">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                <?php break;
                        }
                    }
                } ?>



            <?php } ?>

            </div>

            <!-------------------- PERFORMANCE -------------------->


        </div>
        <!-- Pseudo + Settings -->

        <!-- Photo de profil -->
        <img src="../assets/games/pp/<?= $game['gameImg'] ?>" alt="" class='w-64 rounded-md absolute z-30 top-0 left-0 m-4 shadow-lg'>

        <!-- Photo de profil -->

        <div class="absolute z-20 bottom-0 flex justify-between backdrop-blur-md drop-shadow-lg rounded-b-lg w-full">
            <div class="flex">
                <!-- Menu du user-->
                <div class='mb-8 flex h-full items-center pl-8'>
                    <div class='flex gap-4 items-center ml-[17em]'>
                        <div class="flex justify-center items-center">
                            <!-- Note des users -->

                            <?php
                            $allGamePost = $controler->gamepost->GamePostModel->getAllPostsFromGame($_GET['game']);
                            $gradeMoy = $controler->gamepost->GamePostModel->gradeMoy($_GET['game']);
                            ?>


                            <!-- Switch pour la couleur associée à la note -->
                            <?php switch ($gradeMoy) {
                                case ($gradeMoy < 5): ?>
                                    <div class="bg-red-600 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                        <p><?= $gradeMoy ?></p>
                                    </div>
                                    <?php break; ?>

                                <?php
                                case ($gradeMoy > 5 && $gradeMoy < 10): ?>
                                    <div class="bg-orange-500 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                        <p><?= $gradeMoy ?></p>
                                    </div>
                                    <?php break; ?>

                                <?php
                                case ($gradeMoy > 10 && $gradeMoy < 15): ?>
                                    <div class="bg-amber-400 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                        <p><?= $gradeMoy ?></p>
                                    </div>
                                    <?php break; ?>

                                <?php
                                case ($gradeMoy > 15 && $gradeMoy < 20): ?>
                                    <div class="bg-lime-500 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                        <p><?= $gradeMoy ?></p>
                                    </div>
                                    <?php break; ?>

                            <?php } ?>

                            <!-- Switch pour la couleur associée à la note -->

                            <p class="ml-4">Note des utilisateurs</p>
                        </div>


                        <!-- Note des users -->

                        <div class="divider divider-horizontal text-neutral"></div>
                        <!-- Classification -->

                        <!-- Switch pour la couleur associée à la classification -->
                        <?php
                        $gameClass = $game['gameClassification'];
                        switch ($gameClass) {

                            case ($gameClass == 3 || $gameClass == 7): ?>
                                <div class="bg-lime-500 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                    <p>+<?= $game['gameClassification'] ?></p>
                                </div>
                                <?php break; ?>

                            <?php
                            case ($gameClass == 12 || $gameClass == 16): ?>
                                <div class="bg-orange-500 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                    <p>+<?= $game['gameClassification'] ?></p>
                                </div>
                                <?php break; ?>

                            <?php
                            case ($gameClass == 18): ?>
                                <div class="bg-red-600 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                    <p>+<?= $game['gameClassification'] ?></p>
                                </div>
                                <?php break; ?>

                        <?php } ?>

                        <!-- Switch pour la couleur associée à la classification -->

                        <p>Classification</p>
                    </div>
                    <!-- Classification -->
                </div>
            </div>
            <!-- Menu du user-->
        </div>

    </div>
</div>


<div class='grid grid-rows-2 grid-cols-4 gap-6 mt-4 pb-4 h-auto max-w-7xl mx-auto'>

    <div class="col-start-1 col-end-4 container-home p-6 h-full">


        <div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md">
            <p>À PROPOS</p>
        </div>


        <div class="mt-2 text-justify">
            <!-- Synopsis du jeu -->
            <div class='mt-4 text-justify'>
                <p><?= $game['gameDescription'] ?></p>
            </div>
            <!-- Synopsis du jeu -->
        </div>

        <div class="mt-4 font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md">
            <p>TRAILER</p>
        </div>
        <!--Trailer -->
        <iframe class="mt-4 h-96 w-full rounded-md" src="<?= $game['gameTrailer'] ?>?autoplay=1&mute=1"></iframe>
        <!--Trailer -->

    </div>


    <div class="col-start-4 col-end-5">


        <!-- Block des info -->
        <div class="container-home h-full p-6">

            <div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md">
                <p>INFORMATIONS</p>
            </div>

            <ul class="mt-4">


                <?php if (!$gamepc == false) : ?>

                    <li>• Système d'exploitation requis : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcOs'] ?></li>
                    <li>• Processeur requis : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcProc'] ?></li>
                    <li>• Carte graphique requise : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcCg'] ?></li>
                    <li>• Espace requis : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcTaille'] ?> Go</li>
                    <li>• Prix : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcPrix'] ?> €</li>
                    <li>• Date de sortie : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePCDateSortie'] ?></li>
                    <li>• Modèle économique : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcModeleEco'] ?></li>

                <?php endif; ?>

                <?php if (!$gamecs == false) : ?>

                    <li>• Plateforme(s) : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamecs['gameCsSupport'] ?></li>
                    <li>• Espace requis : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamecs['gameCsTaille'] ?> Go</li>
                    <li>• Prix : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamecs['gameCsPrix'] ?> €</li>
                    <li>• Date de sortie : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamecs['gameCsDateSortie'] ?></li>
                    <li>• Modèle économique : </li>
                    <li class="ml-[10px] font-semibold text-accent"><?= $gamecs['gameCsModeleEco'] ?></li>

                <?php endif; ?>

                <li>• Genre : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $game['gameGenre'] ?></li>
                <li>• Mode : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $game['gameMode'] ?></li>


            </ul>
        </div>
        <!-- Block des info -->

    </div>

    <!-- Block des commentaires utilisateurs -->

    <div class="col-start-1 col-end-5 row-start-2">

        <div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md mb-4">
            <p>NOTES ET AVIS DES UTILISATEURS</p>
        </div>

        <label class='btn w-full bg-accent text-white border-accent hover:bg-[#1991FF] hover:text-white hover:border-[#1991FF] my-2' for="modal-create-post-game">AJOUTER UN AVIS</label>

        <!-- foreach pour afficher tous les posts -->
        <?php foreach ($allGamePost as $GamePost) : ?>


            <div class="h-auto container-home py-5 pr-6 grid grid-cols-8 mb-4">

                <!-- Image + note de l'utilisateur -->
                <div class="col-start-1 col-end-1">
                    <div class="flex justify-center w-full">
                        <img class="rounded-full mb-4" width="80px" src="data:<?= $GamePost['userTypeImg'] ?>;base64,<?= base64_encode($GamePost['userImg']) ?>" alt="">
                    </div>

                    <div class="flex justify-center">

                        <!-- Switch pour la couleur associée à la note -->
                        <?php switch ($GamePost['postGrade']) {
                            case ($GamePost['postGrade'] < 5): ?>
                                <div class="bg-red-600 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                    <p><?= $GamePost['postGrade'] ?></p>
                                </div>
                                <?php break; ?>

                            <?php
                            case ($GamePost['postGrade'] > 5 && $GamePost['postGrade'] < 10): ?>
                                <div class="bg-orange-500 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                    <p><?= $GamePost['postGrade'] ?></p>
                                </div>
                                <?php break; ?>

                            <?php
                            case ($GamePost['postGrade'] >= 10 && $GamePost['postGrade'] <= 15): ?>
                                <div class="bg-amber-400 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                    <p><?= $GamePost['postGrade'] ?></p>
                                </div>
                                <?php break; ?>

                            <?php
                            case ($GamePost['postGrade'] > 15 && $GamePost['postGrade'] <= 20): ?>
                                <div class="bg-lime-500 rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                    <p><?= $GamePost['postGrade'] ?></p>
                                </div>
                                <?php break; ?>

                        <?php } ?>

                        <!-- Switch pour la couleur associée à la note -->
                    </div>
                </div>
                <!-- Image + note de l'utilisateur -->


                <div class="col-start-2 col-end-9">
                    <!-- Pseudo + level de l'utilisateur -->
                    <div class="flex h-16 items-center">
                        <h3 class='font-semibold text-accent text-2xl font-toxigenesis ml-6 mr-4'><?= $GamePost['userPseudo'] ?></h3>
                        <div>
                            <img src="./assets/ranks/<?= $GamePost['userLevel'] ?>/icon.png" alt="" width="24em">
                        </div>
                    </div>
                    <!-- Pseudo + level de l'utilisateur -->
                    <div class="divider"></div>
                    <p class="text-justify"><?= $GamePost['postContent'] ?></p>

                    <?php if ($GamePost['fkidUser'] === $_SESSION['id']) : ?>
                        <div class="w-full rounded-md p-3 flex justify-end gap-4">
                            <form action="../handler_formulaire/handler.php" method="post">
                                <input type="text" hidden name="idpost" value="<?= $GamePost['idGamePost'] ?>">
                                <button type='submit' name="deleteGamePost" class="btn btn-error text-white"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

        <?php endforeach; ?>
        <!-- foreach pour afficher tous les posts -->

    </div>

</div>