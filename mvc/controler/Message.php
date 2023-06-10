<?php

namespace Message;

use PDO;
use \Models\Model;
use \Models\Message\Message as modelMessage;

class Message
{
    private $model;
    private $pdo;
    public $messageModel;

    public function __construct()
    {
        $this->model = new Model('tblmessages');
        $this->messageModel = new modelMessage();
        $this->pdo = new PDO('mysql:host=172.20.0.161;dbname=leveling2', 'root', 'btssio2023');
        //$this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
    }

    public function checkMessage($msg, $iduser, $idconv)
    {
        $mymsg = htmlspecialchars($msg);
        $this->messageModel->insertMessage($mymsg, $iduser, $idconv);
        return $idconv;
    }
}
