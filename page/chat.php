<?php
$conversations = $controler->conv->conversationModel->getConversation($_SESSION['id']);

if (isset($_GET['conversationId'])) {
    $userConnectedMessage = $controler->message->messageModel->getMessage($_SESSION['id'], $_GET['conversationId']);

    // la conv sur avec la personne quand on a cliquer
    $currentConv = $controler->conv->conversationModel->findById($_GET['conversationId'], 'idConversation');

    $userFriendMessage = $controler->message->messageModel->getMessage($currentConv['idFriend'], $_GET['conversationId']);
}
?>

<div class="flex h-screen max-w-web mx-auto">
    <div class="w-[300px] bg-slate-50 h-full overflow-y-scroll">
        <?php foreach ($conversations as $c) : ?>
            <a href="?page=chat&conversationId=<?= $c['idConversation'] ?>">
                <div class="bg-slate-200 p-4 flex items-center gap-4">
                    <img src="data:<?= $c['userTypeImg'] ?>;base64,<?= base64_encode($c['userImg']) ?>" alt="user pp" class="rounded-full w-10 h-10">
                    <h1 class="font-leger text-black"><?= $c['userPseudo'] ?></h1>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <div class="w-full flex-1 bg-white h-screen p-4 relative">
        <!-- On vérifie si on a selectionner une conv -->
        <?php if (!isset($_GET['conversationId'])) : ?>
            <h1>Aucune conversation selectionner</h1>
        <?php else : ?>
            <div class="relative h-full">

                <!-- Message des utilisateurs -->
                <div class="w-full flex-col">
                    <!-- message user connecté -->
                    <div>
                        <?php foreach ($userConnectedMessage as $m) : ?>
                            <p><?= $m['message'] ?></p>
                        <?php endforeach; ?>
                    </div>
                    <!-- message user connecté -->

                    <!-- message de l'ami -->
                    <div>
                        <?php foreach ($userFriendMessage as $m) : ?>
                            <p><?= $m['message'] ?></p>
                        <?php endforeach; ?>
                    </div>
                    <!-- message de l'ami -->
                </div>
                <!-- Message des utilisateurs -->

                <!-- Taper message -->
                <form action="../handler_formulaire/handler.php" class="absolute bottom-0 w-full" method="POST">
                    <div class="flex gap-4 items-center">
                        <input type="text" class=" w-full bg-slate-50 rounded-md h-10 outline-slate-100 active:border-slate-100 focus:border-slate-100 text-black pl-2" name="message">
                        <input type="text" hidden name="convid" value="<?= $_GET['conversationId'] ?>">
                        <button type="submit" class="btn btn-sm" name="btn_msg">
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
                <!-- Taper message -->

            </div>
        <?php endif; ?>
        <!-- On vérifie si on a selectionner une conv -->
    </div>
</div>