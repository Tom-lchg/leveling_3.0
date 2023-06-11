
<!DOCTYPE html>
<html lang="en" data-theme="mytheme">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="icon" type="image/x-icon" href="../assets/favicon.png">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
   <title>Leveling</title>
</head>

<body class='bg-white'>

<div class="grid grid-cols-7">

<div class="col-start-1 col-end-5 bg-[url('/assets/bg-with-logo.png')] bg-cover bg-center h-screen flex justify-center items-center drop-shadow-lg"></div>

    <div class="col-start-5 col-end-8 bg-neutral">


    <div class="p-6 w-full flex justify-center">
    <div class="tabs">
            <a class="tab tab-bordered" href="inscription.php">Inscription</a>
            <a class="tab tab-bordered" href="connexion.php">Connexion</a>
            <a class="tab tab-bordered tab-active" href="apropos.php">À propos</a>
         </div>
    </div>

    <div>

      <div class="w-full flex justify-center mt-44">
         <p class="text-2xl">À propos</p>
      </div>

      <div class="w-full flex justify-center">
         <div class="divider w-14"></div> 
      </div>

      <div class="w-full flex justify-center">
         <div class="w-96">
               <p class="text-justify">Alors qu'Ubisoft est passé du statut d'entreprise familiale à celui d'organisation mondiale, 
                notre désir d'adopter de nouvelles idées et technologies n'a jamais faibli. 
                Nous avons aujourd'hui décidé de lancer notre toute nouvelle plateforme <b>LEVELING</b>, 
                un espace réservé non pas uniquement à nos joueurs mais à tous ceux qui souhaitent se
                retrouver sur une plateforme dédié au jeu-vidéo dans sa globalité. 
                Venez créer votre communauté, échanger avec les autres utilisateurs et vous tenir au
                courant des nouvelles sorties des mises à jour et nouvelles sorties d'Ubisoft !
            </p>
         </div>
      </div>

    </div>


    </div>

</div>

<script src="../js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 6,
    spaceBetween: 1,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });
</script>

</body>

</html>