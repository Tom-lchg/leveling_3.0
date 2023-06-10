<?php
$messages = $controler->chat->chatModel->getMessageFromUser();
?>

<div class='basis-1/2 title font-toxigenesis p-8'>CHAT</div>

<div class="p-4 container-home h-[37rem] flex items-end">

    <div class="h-full w-full flex items-end">

        <div class="w-full h-full overflow-y-auto">
            <!-- Message des utilisateurs -->
            <?php foreach ($messages as $m) : ?>
                <?php
                // ternaire pour décider la couleur des messages
                $messageFromUserConnected = $m['idUser'] === $_SESSION['id'];
                ?>
                <div class="chat chat-start">
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <a href="/?page=profile&activite&user=<?= $m['userPseudo'] ?>" target="_blank">
                                <img src="data:image/jpeg;base64,<?= base64_encode($m['userImg']) ?>" />
                            </a>
                        </div>
                    </div>
                    <div class="chat-header"><?= $m['userPseudo'] ?> à <?= $m['chatHeure'] ?></div>
                    <div class="chat-bubble <?= $messageFromUserConnected ? "bg-cyan-600 text-white" : "" ?>"><?= $m['chatMessage'] ?></div>
                </div>
            <?php endforeach; ?>
            <!-- Message des utilisateurs -->
        </div>
    </div>
</div>

<!-- Input pour écrire un message -->
<div class="flex mt-4 container-home">
    <form action="../handler_formulaire/handler.php" method="post" class="flex w-full">
        <input type="text" placeholder="Écrire un message..." name="message" class="input w-full flex-1" />
        <input type="text" hidden name="iduser" value="<?= $_SESSION['id'] ?>">
        <button class="ml-4 btn btn-accent" type="submit" name="btn_send_message_chat">
            <i class="fa-solid fa-paper-plane"></i>
        </button>
    </form>
</div>
<!-- Input pour écrire un message -->