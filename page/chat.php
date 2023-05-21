<?php
$conversations = $controler->conv->conversationModel->getConversation($_SESSION['id']);

if (isset($_GET['conversationId'])) {
    $currentConv = $controler->conv->conversationModel->findById($_GET['conversationId'], 'idConversation');
    $messages = $controler->message->messageModel->getMessage($_SESSION['id'], 2, $currentConv['idFriend']);
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
            <h1>Aucunes conversation selectionner</h1>
        <?php else : ?>
            <div class="relative h-full">

                <!-- Message des utilisateurs -->
                <div class="flex-col flex gap-3">
                    <?php foreach ($messages as $m) : ?>
                        <!-- La ternaire c'est pour décider la position des messages -->
                        <div class="flex flex-col <?= $_SESSION['id'] === $m['idUser'] ? 'items-end' : 'items-start' ?>">
                            <!-- Pour avoir les messages en bleu et en blanc -->
                            <?php $messagesUserConnected = $_SESSION['id'] === $m['idUser'] ? 'bg-blue-500 text-white' : 'bg-neutral-300 text-black'; ?>
                            <!-- Pour avoir les messages en bleu et en blanc -->

                            <div class="max-w-[350px] h-auto <?= $messagesUserConnected ?> p-2 rounded-md">
                                <p><?= $m['message'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
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