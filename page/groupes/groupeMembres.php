<?php $results = $controler->groupe->groupeModel->getGroupbyIdGroupe($_GET['groupe']);
        

?>

<div class="container-home p-6">

<div class="font-bold w-full flex justify-center items-center h-9 bg-neutral text-primary rounded-md"><p>MEMBRES</p></div>
<?php 
if(!$results){ ?>
    <!-- Si aucun membre -->
        <p class="my-4">Aucun membre pour le moment...</p>
    <!-- Si aucun membre -->

<?php }else{
    foreach($results as $oneResult){
        $detailsUsers = $controler->user->userModel->findByIdUser($oneResult['iduser']);
        foreach($detailsUsers as $oneDetailUser) : ?>
        <div class="w-full grid grid-cols-3">
            <!-- Un membre -->
            <div class="flex items-center mt-4">
                <img src="data:<?= $oneDetailUser['userTypeImg'] ?>;base64,<?= base64_encode($oneDetailUser['userImg']) ?>" alt="" class="rounded-lg w-14">
                <p class="ml-4 font-toxigenesis text-2xl"><?= $oneDetailUser['userPseudo']?></p>
            </div>
        </div>

    
    <?php endforeach ; } 
}
?>






</div>