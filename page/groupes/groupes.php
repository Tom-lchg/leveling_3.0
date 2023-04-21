
<div class='h-auto p-8'>

   <?php if (!isset($_GET['groupe'])) : ?>
      <h1 class='title font-toxigenesis'>GROUPES</h1>
      <div class='flex gap-4 mt-4 flex-wrap'>
         <!-- foreach pour afficher tous les groupes -->
         
         <div class="container-home flex items-center">
            <div class="shrink-0">
               <a href="./?page=groupes&groupe=yugioh">    
                  <img class="object-cover rounded-md h-[150px] w-[150px]" src="../assets/pp5.jpg" alt="">
               </a>
            </div>
            <div class="ml-4">
               <p class='drop-shadow-sm font-bold text-accent text-3xl font-toxigenesis'>Yu-Gi-Oh! Fans</p>
               <p class="text-sm font-semibold">Groupe Public - 13045 membres</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lacinia arcu sed diam suscipit, id pulvinar lacus sagittis. In odio tortor, facilisis euismod leo ac, cursus interdum diam. Morbi vel ullamcorper felis, ut finibus dui. Pellentesque felis dui, congue ut ex sit amet, auctor ullamcorper eros. Curabitur eget diam sed mi imperdiet ultrices.</p>
            </div>
         </div>

         <div class="container-home flex items-center">
            <img class="rounded-md h-[150px] w-[150px]" src="../assets/pp4.jpg" alt="">
            <div class="ml-4">
               <p class='drop-shadow-sm font-bold text-accent text-3xl font-toxigenesis'>LOTR</p>
               <p class="text-sm font-semibold">Groupe Privé - 821 membres</p>
               <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc lacinia arcu sed diam suscipit, id pulvinar lacus sagittis. In odio tortor, facilisis euismod leo ac, cursus interdum diam. Morbi vel ullamcorper felis, ut finibus dui. Pellentesque felis dui, congue ut ex sit amet, auctor ullamcorper eros. Curabitur eget diam sed mi imperdiet ultrices.</p>
            </div>
         </div>

         <!-- foreach pour afficher tous les groupes -->
      </div>
   <?php endif; ?>

   <!-- page jeu -->
   <?php if (isset($_GET['groupe'])) : ?>
      <?php require('./page/groupes/groupeForum.php'); ?>
   <?php endif; ?>
   <!-- page jeu -->

</div>