<?php

namespace Chat;

use \Models\Model;
use \Models\Chat\Chat as ChatModel;

class Chat
{
    private $model;
    public $chatModel;

    public function __construct()
    {
        $this->model = new Model('tblposts');
        $this->chatModel = new ChatModel();
    }

    public function sendMessage($iduser, $message)
    {
        // on controle si le message n'est pas vide
        if (strlen($message) > 0) {
            $this->chatModel->sendMessage($iduser, $message);
        }
    }
}