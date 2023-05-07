<?php

namespace Conversation;

use PDO;
use \Models\Model;
use \Models\Conversation\Conversation as ConversationModel;

class Conversation
{
    private $model;
    private $pdo;
    public $conversationModel;

    public function __construct()
    {
        $this->model = new Model('tblConversation');
        $this->conversationModel = new ConversationModel();
        $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
    }

    public function checkConvIfExist($idFriend)
    {
        $sql = "SELECT * FROM tblConversation WHERE idUserConnected = :id AND idFriend = :idf";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([":id" => $_SESSION['id'], ":idf" => $idFriend]);

        $conv = $stmt->fetch();

        if (!$conv) {
            $this->conversationModel->createConv($_SESSION['id'], $idFriend);
        }
    }
}
