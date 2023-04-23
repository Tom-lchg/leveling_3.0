<?php
$games = $controler->games->gameModel->getAll();
?>

<div class='h-auto p-8'>

   <?php if (!isset($_GET['game'])) : ?>
      <h1 class='title font-toxigenesis'>JEUX</h1>
      <div class='flex gap-4 mt-4 flex-wrap'>
         <!-- foreach pour afficher tous les jeux -->
         <?php foreach ($games as $game) : ?>
            <div>
               <a href="./?page=games&game=<?= $game['idGame'] ?>">
                  <img src="../assets/games/pp/<?= $game['gameImg'] ?>" alt="game" class='rounded-lg h-56'>
               </a>
            </div>
         <?php endforeach; ?>
         <!-- foreach pour afficher tous les jeux -->
      </div>
   <?php endif; ?>

   <!-- page jeu -->
   <?php if (isset($_GET['game'])) : ?>
      <?php require('./page/games/oneGame.php'); ?>
   <?php endif; ?>
   <!-- page jeu -->

</div>