<?php $users = $controler->user->userModel->getAll(); ?>
<?php $Topics = $controler->groupe->groupeModel->getTopicById($_GET['sujet']); ?>
<?php foreach ($Topics as $oneTopic) : ?>
<?php $detailsUser = $controler->user->userModel->findByIdUser($oneTopic['idauteur']); ?>
<?php  foreach ($detailsUser as $oneDetailsUser) : ?>

<div class="border border-[#E9E9E9] rounded-md w-full">

<div class="w-full rounded-t-md bg-accent text-white p-2 font-semibold ">
    <a href="./?page=groupes&groupe=<?= $_GET['groupe']?>&privacy=<?= $_GET['privacy'] ?>"><i class="fa-solid fa-arrow-left"></i></a>
    <?= $oneTopic['titre'] ?>
</div>

<!-- un message-->

<div class="p-4 border border-[#1991FF] rounded-md mx-4 mt-4">

<div class="flex items-center mb-4">
<img src="data:<?= $oneDetailsUser['userTypeImg'] ?>;base64,<?= base64_encode($oneDetailsUser['userImg']) ?>" alt="" class="rounded-full w-10">
    <a href="./?page=profile&user=<?= $oneDetailsUser['userPseudo'] ?>"> 
        <div class="ml-2">
            <p class="font-toxigenesis hover:text-accent cursor-pointer"><?= $oneDetailsUser['userPseudo']?></p>
            <p class="text-xs"><?= $oneTopic['datesujet'] ?></p>
        </div>
    </a>
</div>

<p> <?= $oneTopic['content']?></p>
</div>
<?php endforeach ;?>
<?php endforeach ;?>


<!-- un message-->

<!-- un message-->


<!-------METTRE LES FOREACH------->
<?php $allAnswers = $controler->groupe->groupeModel->findTopicById($_GET['sujet']);?>
<?php foreach($allAnswers as $oneAnswer) : ?>
<?php $allUsers = $controler->user->userModel->findByIdUser($oneAnswer['idUserAnswer']);?>
<?php foreach($allUsers as $oneUser) : ?>
<div class="p-4 border border-[#E9E9E9] rounded-md mx-4 mt-4">
<div class="flex items-center mb-4">
     <img src="data:<?= $oneUser['userTypeImg'] ?>;base64,<?= base64_encode($oneUser['userImg']) ?>" alt="" class="rounded-full w-10">
     <div class="ml-2">
        <p class="font-toxigenesis hover:text-accent cursor-pointer"><?= $oneUser['userPseudo'] ?></p>
<<<<<<< HEAD
        <p class="text-xs">Le <?= $oneAnswer['dateAnswers']?></p>
=======
        <p class="text-xs">Le <?= $oneAnswer['dateAnswer']?></p>
>>>>>>> b7f024514ad11684ed0f367d665bc8ce451bb4f9
     </div>
</div>

<p><?= $oneAnswer['content']?></p>
</div>

<!-- un message-->
<?php endforeach ; ?>
<?php endforeach ; ?>
<!-------METTRE LES FOREACH------->
<!-- bouton pour répondre -->
<div class="w-full flex items-center p-4">
    <label class='btn bg-accent w-full text-white border-accent hover:bg-[#1991FF] hover:text-white hover:border-[#1991FF]' for="modal-topic-answers">RÉPONDRE </label>
</div>

    
<!-- bouton pour répondre -->

</div>
