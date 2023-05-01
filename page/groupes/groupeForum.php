<?php  $allGroups = $controler->groupe->groupeModel->getAll(); ?>
<?php  
   $oneGroupePublic = null;
   $oneGroupePrive = null;

   if($_GET['privacy'] == "publique"){
      $oneGroupePublic = $controler->groupe->groupeModel->getOneGroupPublic($_GET["groupe"]);
   }else if($_GET['privacy'] == "prive"){
      $oneGroupePrive = $controler->groupe->groupeModel->getOneGroupPrive($_GET["groupe"]);

   }

         
?>

<!-- Container global -->
<div class="max-w-7xl mx-auto">

   <div class='h-56 relative mt-4'>
      <!-- bannière de groupe -->
      <img src="data:<?= $oneGroupePrive===null ? $oneGroupePublic['groupeTypeBanner'] : $oneGroupePrive['groupeTypeBanner'] ?>;base64,<?= $oneGroupePrive===null ? base64_encode($oneGroupePublic['groupeBanner']) :  base64_encode($oneGroupePrive['groupeBanner'])?>" alt="banner" class='rounded-t-lg h-full block w-full object-cover absolute'>
      <!-- bannière de user -->

      <!-- Nom du groupe + Settings -->
      <div class='ml-56 pr-2 relative z-10 justify-between flex gap-1 text-2xl h-full pb-1 items-end text-white font-leger'>

         <p class='drop-shadow-sm border-accent font-bold text-3xl font-toxigenesis'><?= $oneGroupePrive==null ? $oneGroupePublic['groupeName'] : $oneGroupePrive['groupeName'] ?> </p>

         <!-- Button setting (uniquement afficher pour le modo du groupe) -->
            <label for="" class="btn btn-ghost btn-sm">
               <i class="fa-solid fa-circle-plus"></i>
            </label>
         <!-- Button setting -->

      </div>
      <!-- Nom du groupe + Settings -->

      <!-- Photo de profil -->
      <img src="data:<?= $oneGroupePrive===null ? $oneGroupePublic['groupeTypeImg'] : $oneGroupePrive['groupeTypeImg'] ?>;base64,<?= $oneGroupePrive===null ? base64_encode($oneGroupePublic['groupeImg']) :  base64_encode($oneGroupePrive['groupeImg'])?>"
      class='w-40 h-40 rounded-md absolute z-20 top-32 left-10 shadow-lg' alt="">
      <!-- Photo de profil -->
    
      <div class="flex justify-between bg-neutral drop-shadow-lg rounded-b-lg">
         <div class="flex">
            <!-- Menu du groupe-->
            <div class='mb-8 flex h-full items-center pl-8'>
               <div class='flex gap-4 items-center ml-[13em]'>
                  <div>
                     <!-- Nombre de posts -->
                     <p class="font-bold">MEMBRES</p>
                     <p><?= $oneGroupePrive===null ? $oneGroupePublic['groupePublicNbUsers'] : $oneGroupePrive['groupePrivateNbUsers']?></p>
                     <!-- Nombre de posts -->
                  </div>
                  <div class="divider divider-horizontal text-neutral"></div>
                  <div>
                     <!-- La date de l'inscription du user -->
                     <p class="font-bold">CRÉATION</p>
                     <p>21 Avril 2022</p>
                     <!-- La date de l'inscription du user -->
                  </div>
                  <div class="divider divider-horizontal text-neutral"></div>
                  <div>
                     <!-- La date d'anniversaire du user -->
                     <p class="font-bold">TYPE</p>
                     <p><?= $oneGroupePrive===null ? $oneGroupePublic['groupePrivacy'] : $oneGroupePrive['groupePrivacy'] ?></p>
                     <!-- La date d'anniversaire du user -->
                  </div>
               </div>
            </div>
               <!-- Menu du groupe-->
         </div>
      </div>

   </div>


   <div class='h-auto grid grid-cols-4 mt-24 gap-6'>

      <div class="col-start-1 col-end-2 container-home p-6">

         <div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary  rounded-md">
            <p>À PROPOS</p>
         </div>

         <div class="mt-2 text-justify">
            <!-- La bio -->
            <div class='mt-4 text-justify'>
               <p><?= $oneGroupePrive===null ? $oneGroupePublic['groupeDescription'] : $oneGroupePrive['groupeDescription'] ?></p>
            </div>
            <!-- La bio -->
         </div>

      </div>

      <div class="col-start-2 col-end-5">
         <!-- Tabs -->
         <div class="col-start-2 col-end-5 tabs gap-2 tabs-boxed mb-4 h-10 bg-accent font-semibold">

            <!-- Si onglets actif ou non -->
            <?php if (!isset($_GET['req'])) : ?>
               <a class="tab bg-white rounded-md text-accent" href="./?page=groupes&groupe=<?= $_GET['groupe']?>&privacy=<?= $oneGroupePrive===null ? $oneGroupePublic['groupePrivacy'] : $oneGroupePrive['groupePrivacy'] ?>">DISCUSSIONS</a>
            <?php else : ?>
               <a class="tab text-white" href="./?page=groupes&groupe=<?= $_GET['groupe']?>&privacy=<?= $oneGroupePrive===null ? $oneGroupePublic['groupePrivacy'] : $oneGroupePrive['groupePrivacy'] ?>">DISCUSSIONS</a>
            <?php endif; ?>

            <?php if (isset($_GET['req']) == 'groupe') : ?>
               <a class="tab bg-white rounded-md text-accent" href="./?page=groupes&groupe=<?= $_GET['groupe']?>&privacy=<?= $_GET['privacy']?>&req=membres">MEMBRES</a>
            <?php else : ?>
               <a class="tab text-white " href="./?page=groupes&groupe=<?= $_GET['groupe']?>&privacy=<?= $_GET['privacy']?>&req=membres">MEMBRES</a>
            <?php endif; ?>

            <!-- Si onglets actif ou non -->

         </div>
         <!-- Tabs -->

         <div class='mt-4 mb-4'>
            <?php if (!isset($_GET['req'])) : ?>

               <!-- Block de l'activité -->
               <div class="container-home p-6">

                  <div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md">
                     <p>FORUM</p>
                  </div>



                  <div class='flex w-full gap-4 flex-col mt-4'>

                     <div>
                        <div class="flex justify-between">
                           <div>
                           <label class='btn bg-accent text-white border-accent hover:bg-[#1991FF] hover:text-white hover:border-[#1991FF] my-2' for="modal-create-sujet">NOUVEAU SUJET</label>
                              <button class="btn btn-accent"><i class="fa-solid fa-arrows-rotate"></i></button>
                           </div>
                           <div class="content-center flex items-center">
                              <i class="fa-solid fa-magnifying-glass text-2xl text-accent mr-4"></i>
                              <input type="text" placeholder="Recherche" class="input input-sm input-bordered border-accent w-full max-w-xs rounded-full placeholder:text-[#E9E9E9]" />
                        </div>

                     </div>

                  </div>

                  <?php if(!isset($_GET['sujet'])){ ?>

                  <div class="overflow-x-auto rounded-md border border-[#E9E9E9]">
                     <table class="w-full">
                        <!-- head -->
                        <thead class="bg-accent text-white">
                           <tr>
                           <th><p class="m-2">Sujet</p></th>
                           <th><p class="m-2">Auteur</p></th>
                           <th><p class="m-2">Réponse</p></th>
                           </tr>
                        </thead>
                        <tbody>

                           <!-- row 1 -->
                           <tr class="hover:text-accent cursor-pointer">
                           <td><a href="./?page=groupes&groupe=yugioh&sujet=0"><p class="m-4">Yu-Gi-Oh! Power of Chaos</p></a></td>
                           <td>
                              <div class="flex items-center">
                                 <img src="../assets/pp.jpg" alt="" class="rounded-full w-10">
                                 <p class="ml-2 font-toxigenesis">KiSEi</p>
                              </div>
                           </td>
                           <td>24</td>
                           </tr>

                           <!-- row 2 -->
                           <tr class="hover:text-accent cursor-pointer">
                           <td><p class="m-4">Les Youtubers jeux vidéos sont-ils corrompus par l'argent ?</p></td>
                           <td>
                              <div class="flex items-center">
                                 <img src="../assets/pp2.jpg" alt="" class="rounded-full w-10">
                                 <p class="ml-2 font-toxigenesis">Skeim</p>
                              </div>
                           </td>
                           <td>15</td>
                           </tr>

                           <!-- row 3 -->
                           <tr class="hover:text-accent cursor-pointer">
                           <td><p class="m-4">[Retro ou pas] Vos trouvailles & bonnes affaires</p></td>
                           <td>
                              <div class="flex items-center">
                                 <img src="../assets/pp3.jpg" alt="" class="rounded-full w-10">
                                 <p class="ml-2 font-toxigenesis">Mirinae</p>
                              </div>
                           </td>
                           <td>10</td>
                           </tr>
                        </tbody>
                     </table>
                     </div>
                     
                     <?php }else{ 

                        require('groupeForumSujet.php');

                     } ?>

                  </div>
                  

               <?php endif; ?>

               <?php
               if (isset($_GET['req'])) {
                  switch ($_GET['req']) {
                     case 'membres':
                        require('groupeMembres.php');
                        break;
                     default:
                        header('location: ./?page=azrazr');
                        break;
                  }
               };

               if (isset($_GET['sujet'])) {
                  switch ($_GET['sujet']) {
                     case 'sujet':
                        require('groupeForumSujet.php');
                        break;
                     default:
                        header('location: ./?page=azrazr');
                        break;
                  }
               }
               ?>
               </div>
               <!-- Block de l'activité -->
         </div>

      </div>

   </div>

</div>
<!-- Container global -->