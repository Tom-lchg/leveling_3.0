<?php $users = $controler->user->userModel->getAll(); ?>
<?php $Topics = $controler->groupe->groupeModel->getTopicById($_GET['sujet']); ?>
<?php foreach ($Topics as $oneTopic) : ?>
<?php $detailsUser = $controler->user->userModel->findByIdUser($oneTopic['idauteur']); ?>
<?php  foreach ($detailsUser as $oneDetailsUser) : ?>

<div class="border border-[#E9E9E9] rounded-md w-full">

<div class="w-full rounded-t-md bg-accent text-white p-2 font-semibold ">
    <a href="javascript:history.back()"><i class="fa-solid fa-arrow-left"></i></a>
    <?= $oneTopic['titre'] ?>
</div>

<!-- un message-->

<div class="p-4 border border-[#1991FF] rounded-md mx-4 mt-4">

<div class="flex items-center mb-4">
     <img src="data:<?= $oneDetailsUser['userTypeImg'] ?>;base64,<?= base64_encode($oneDetailsUser['userImg']) ?>" alt="" class="rounded-full w-10">
     <div class="ml-2">
        <p class="font-toxigenesis hover:text-accent cursor-pointer"><?= $oneDetailsUser['userPseudo']?></p>
        <p class="text-xs"><?= $oneTopic['datesujet'] ?></p>
     </div>
</div>

<p> <?= $oneTopic['content']?></p>
</div>
<?php endforeach ;?>
<?php endforeach ;?>


<!-- un message-->

<!-- un message-->

<div class="p-4 border border-[#E9E9E9] rounded-md mx-4 mt-4">

<div class="flex items-center mb-4">
     <img src="../assets/pp4.jpg" alt="" class="rounded-full w-10">
     <div class="ml-2">
        <p class="font-toxigenesis hover:text-accent cursor-pointer">B0ltek</p>
        <p class="text-xs">Le 23/04/2023 à 18:21</p>
     </div>
</div>

<p>
    Légal non. 
    Mais c'pas la question, juste sur le point des ventes tu as raison, et puis les emus son qd même tres présents.
    Sinon bon boulot, envoie ptete un MP à un modo pour demander de sticker, c'est vraiment bien un topic comme ça

    Edit : c'est fait dans tout les cas je devais MP pour demander autre chose
</p>
</div>

<!-- un message-->

<!-- bouton pour répondre -->
<div class="w-full flex items-center p-4">
    <button name='btn-add-reponse' class='btn bg-accent w-full text-white border-accent hover:bg-[#1991FF] hover:text-white hover:border-[#1991FF]'>RÉPONDRE</button>
</div>
<!-- bouton pour répondre -->

</div>
