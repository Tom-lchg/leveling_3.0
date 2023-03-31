<?php
$game = $controler->games->gameModel->findById($_GET['game'], 'idGame');
?>

<div class="max-w-7xl mx-auto">

    <!-- Header de la page -->
    <div class="grid grid-cols-2 gap-4">
        <div class="col-start-1">
            <img src="../assets/games/others/<?= $game['gameImgOther'] ?>" alt="ok" class="w-full rounded-md">
        </div>

        <div class="col-start-2">
            <div class="flex flex-col gap-4 bg-secondary h-full rounded-md p-4">
                <h1 class="text-3xl"><?= $game['gameName'] ?></h1>
                <p>Genre : <?= $game['gameGenre'] ?></p>
                <p>Avis : <?= $game['gameAvis'] ?>/20</p>
                <p>Classification : <?= $game['gameClassification'] ?>/20</p>
                <p>Mode de jeu : <?= $game['gameMode'] ?></p>
            </div>
        </div>
    </div>
    <!-- Header de la page -->

    <!-- Section a propos -->
    <div class="mt-6">
        <h1 class="font-bold text-2xl">À propos du jeu</h1>
        <p class="mt-4"><?= $game['gameDescription'] ?></p>
    </div>
    <!-- Section a propos -->

    <!-- section visuel -->
    <div class="mt-6">
        <h1 class="font-bold text-2xl">Visuel</h1>
    </div>
    <!-- section visuel -->

</div>