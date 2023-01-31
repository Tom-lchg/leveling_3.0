<div class='h-auto p-8'>

   <!-- le petit message de bienvenu -->
   <h1 class='title'>
      <?= isset($_SESSION['id']) ? "Hello " . $_SESSION['pseudo'] : "Connectez-vous" ?>
   </h1>
   <!-- le petit message de bienvenu -->

   <div class='mt-4 grid grid-cols-6 gap-6'>

      <!-- Top trending -->
      <div class='col-start-1 col-end-4 container-home'>
         <h1 class='title'>Top Trending</h1>
      </div>
      <!-- Top trending -->

      <!-- Top user -->
      <div class='col-start-4 col-end-6 container-home'>
         <h1 class='title'>Top users</h1>
         <!-- un user -->
         <div class='mt-4 flex gap-4 items-center'>
            <h1 class='title text-yellow-300'>#1</h1>
            <img src="../assets/pp.jpg" alt="pp" class='w-14 h-14 rounded-full'>
            <h1 class='font-leger text-xl'>KiSEi</h1>
         </div>
         <!-- un user -->
      </div>
      <!-- Top user -->

      <!-- Top jeux -->
      <div class='col-start-1 col-end-2 container-home-no-bg'>
         <h1 class='title'>Top jeux</h1>
      </div>

      <div class='col-start-1 col-end-6 p-2 flex gap-4 flex-wrap container-home-no-bg'>
         <img src="../assets/games/pp/IMG-6277c1dd81fac1.30807447.png" alt="pp jeux" class='h-96 rounded-lg'>
         <img src="../assets/games/pp/IMG-634d7675e0cf83.13415792.jpg" alt="pp jeux" class='h-96 rounded-lg'>
         <img src="../assets/games/pp/IMG-627c1d61578b82.37357556.jpg" alt="pp jeux" class='h-96 rounded-lg'>
         <img src="../assets/games/pp/IMG-6277a0b2c5b848.96970598.png" alt="pp jeux" class='h-96 rounded-lg'>
      </div>
      <!-- Top jeux -->

      <div class='col-start-1 col-end-6 container-home-no-bg'>
         <h1 class='title mb-6'>Postes</h1>
         <!-- one poste -->
         <div class='bg-secondary h-auto relative p-2 rounded-lg shadow-lg'>
            <div class='flex justify-between items-center'>
               <div class='flex gap-4'>
                  <img src="../assets/pp.jpg" alt="pp" class='w-14 h-14 rounded-full'>
                  <div>
                     <h3 class='font-leger text-xl'>KiSEi</h3>
                     <h3 class='font-leger text-accent'>@KiSEi</h3>
                  </div>
               </div>
               <div>
                  <button class='btn btn-sm'>
                     <i class="fa-solid fa-ellipsis-vertical"></i>
                  </button>
               </div>
            </div>
            <div class='pl-16 mt-4'>
               <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Possimus voluptatibus ipsum nam tempore
                  reprehenderit ratione aperiam nostrum. Ullam accusantium blanditiis obcaecati minima, numquam eveniet.
               </p>
            </div>
         </div>
         <!-- one poste -->
      </div>
   </div>
</div>