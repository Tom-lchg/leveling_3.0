<?php

$game = $controler->games->gameModel->findById($_GET['game'], 'idGame');
$gamepc = $controler->games->gameModel->findByIdPc($_GET['game'], 'idGame');
$gamecs = $controler->games->gameModel->findByIdCs($_GET['game'], 'idGame');

?>

<div class="max-w-7xl mx-auto">

    <div class='h-[23rem] relative rounded-md'>

        <!-- bannière de user -->
        <img src="../assets/games/others/<?= $game['gameImgOther'] ?>" alt="" alt="banner" class='rounded-md h-full block w-full object-cover absolute'>
        <!-- bannière de user -->

        <!-- Pseudo + Settings -->
        <div class='ml-[12em] top-60 absolute z-10 justify-between flex text-2xl h-auto text-white font-leger'>
            <p class='drop-shadow-2xl border-accent font-bold text-3xl font-toxigenesis'><?= $game['gameName'] ?></p>
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
                            <div class="bg-info rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                                <p><?= $game['gameAvis'] ?>/20</p>
                            </div>
                            <p class="ml-4">Note des utilisateurs</p>
                        </div>
                        <!-- Note des users -->

                        <div class="divider divider-horizontal text-neutral"></div>
                        <!-- Classification -->
                        <div class="bg-error rounded-full h-14 w-14 flex justify-center items-center text-white font-bold">
                            <p>+<?= $game['gameClassification'] ?></p>
                        </div>
                        <p>Classification</p>
                    </div>
                    <!-- Classification -->
                </div>
            </div>
            <!-- Menu du user-->
        </div>

    </div>
</div>


<div class='grid grid-cols-4 gap-6 mt-4 pb-4 h-auto max-w-7xl mx-auto'>

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


    <div class="col-start-4 col-end-5 ">


        <!-- Block des info -->
        <div class="container-home h-full p-6">

            <div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md">
                <p>INFORMATIONS</p>
            </div>

            <div class="w-full flex justify-center mt-2">
                    <a href="./?page=games&game=<?= $game['idGame'] ?>&pc">
                        <button class="btn"><i class="fa-solid fa-computer-mouse"></i></button>
                    </a>
                    <a href="./?page=games&game=<?= $game['idGame'] ?>&cs">
                    <button class="btn ml-2"><i class="fa-solid fa-gamepad"></i></button>
                    </a>
            </div>

            <ul class="mt-4">
                

                <?php if(isset($_GET['pc'])){ ?>

                <li>• Système d'exploitation requis : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcOs']?></li>
                <li>• Processeur requis : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcProc']?></li>
                <li>• Carte graphique requise : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcCg']?></li>
                <li>• Espace requis : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcTaille']?> Go</li>
                <li>• Prix : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcPrix']?> €</li>
                <li>• Date de sortie : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePCDateSortie']?></li>
                <li>• Modèle économique : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamepc['gamePcModeleEco']?></li>

                <?php } ?>

                <?php if(isset($_GET['cs'])){ ?>

                <li>• Consoles : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamecs['gameCsSupport'] ?></li>
                <li>• Espace requis : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamecs['gameCsTaille']?> Go</li>
                <li>• Prix : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamecs['gameCsPrix'] ?> €</li>
                <li>• Date de sortie : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamecs['gameCsDateSortie'] ?></li>
                <li>• Modèle économique : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $gamecs['gameCsModeleEco'] ?></li>

                <?php } ?>

                <li>• Genre : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $game['gameGenre'] ?></li>
                <li>• Mode : </li>
                <li class="ml-[10px] font-semibold text-accent"><?= $game['gameMode'] ?></li>


            </ul>
        </div>
        <!-- Block des info -->

    </div>
</div>