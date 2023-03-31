<?php

namespace Friend;

use \Models\Model;
use \Models\Friend\Friend as FriendModel;

class Friend
{
    private $model;
    public $friendModel;

    public function __construct()
    {
        $this->model = new Model('tblGames');
        $this->friendModel = new FriendModel();
    }
}
