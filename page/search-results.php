<?php

   $searchresults = $controler->model->search($_GET['search'], $_GET['type']);

?>

<!-- résultats pour users -->

<?php if($_GET['type'] == 'users'){ ?>

    <h1 class='title p-8 font-toxigenesis'>UTILISATEURS</h1>

    <?php if(!empty($searchresults)){ ?>

        <?php foreach ($searchresults as $searchresult) : ?>

    <a href="../?page=profile&activite&user=<?= $searchresult['userPseudo'] ?>">
    <div class="container-home flex items-center w-full mb-4">
    <div class="shrink-0">
                <img src="data:<?= $searchresult['userTypeImg'] ?>;base64,<?= base64_encode($searchresult['userImg']) ?>" alt="banniere user" class='object-cover rounded-full h-[80px] w-[80px]'>
                </div>
        <div class="ml-4">
            <div class="flex w-full">
                <p class='drop-shadow-sm font-bold text-accent text-3xl font-toxigenesis'><?php echo $searchresult['userPseudo'] ?></p>
                <div>
                    <img src="./assets/ranks/<?= $searchresult['userLevel'] ?>/icon.png" alt="" width="34em" class="ml-2">
                </div>
            </div>                     
        </div>
    </div>
    </a>
    <?php endforeach; ?>

<?php } else { ?>

    <p class="text-xl">Aucun résultat</p>

<?php } ?>
<?php } ?>

<!-- résultats pour users -->


<!-- résultats pour games -->

<?php if($_GET['type'] == 'games'){ ?>

<h1 class='title p-8 font-toxigenesis'>JEUX</h1>

<?php if(!empty($searchresults)){ ?>

<?php foreach ($searchresults as $searchresult) : ?>

<a href="./?page=games&game=<?= $searchresult['idGame'] ?>">
<div class="container-home flex items-center w-full mb-4">
    <div class="shrink-0">
        <img src="../assets/games/pp/<?= $searchresult['gameImg'] ?>" alt="game" class='rounded-lg h-56'>
    </div>
    <div class="ml-4">
        <p class='drop-shadow-sm font-bold text-accent text-3xl font-toxigenesis'><?= $searchresult['gameName'] ?></p>
        <p class="text-sm font-semibold"><?= $searchresult['gameGenre'] ?></p>
    </div>
</div>
</a>

<?php endforeach; ?>

<?php } else { ?>

    <p class="text-xl">Aucun résultat</p>

<?php } ?>
<?php } ?>

<!-- résultats pour games -->


<!-- résultats pour groups -->

<?php if($_GET['type'] == 'groups'){ ?>

<h1 class='title p-8 font-toxigenesis'>GROUPES</h1>

<?php if(!empty($searchresults)){ ?>

<?php foreach ($searchresults as $searchresult) : ?>

<a href="./?page=groupes&groupe=<?= $searchresult['idGroupe'] ?>&privacy=<?=$searchresult['groupePrivacy'] ?>">    
<div class="container-home flex items-center w-full mb-4">
    <div class="shrink-0">
    <img class="object-cover rounded-md h-[150px] w-[150px]" src="data:<?= $searchresult['groupeTypeImg'] ?>;base64,<?= base64_encode($searchresult['groupeImg']) ?>" alt="">
    </div>
    <div class="ml-4">
        <p class='drop-shadow-sm font-bold text-accent text-3xl font-toxigenesis'><?= $searchresult['groupeName'] ?></p>
        <p class="text-sm font-semibold"><?= $searchresult['groupePrivacy'] ?></p>
        <p><?= $searchresult['groupeDescription'] ?></p>
    </div>
</div>
</a>

<?php endforeach; ?>

<?php } else { ?>

    <p class="text-xl">Aucun résultat</p>

<?php } ?>
<?php } ?>

<!-- résultats pour groups -->