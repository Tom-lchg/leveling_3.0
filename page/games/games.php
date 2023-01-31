<div class='h-auto p-8'>

   <?php if (!isset($_GET['game'])) : ?>
      <h1 class='title'>Games</h1>
      <div class='flex gap-4 mt-4 flex-wrap'>
         <div>
            <a href="./?page=games&game=ass">
               <img src="../assets/games/pp/IMG-6277a0b2c5b848.96970598.png" alt="game" class='rounded-lg'>
            </a>
         </div>
         <div>
            <a href="./?page=games&game=divi">
               <img src="../../assets/games/pp/IMG-6277c6a22b28e2.44535644.jpg" alt="game" class='rounded-lg'>
            </a>
         </div>
      </div>
   <?php endif; ?>

   <!-- page jeu -->
   <?php if (isset($_GET['game'])) : ?>
      <?php require('./page/games/oneGame.php'); ?>
   <?php endif; ?>
</div>