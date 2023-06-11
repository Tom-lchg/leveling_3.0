<?php

namespace mvc\controler\Controler;

use Users\User;
use Groupes\Groupe;
use Games\Games;
use Post\Post;
use GamePost\GamePost;
use Friend\Friend;
use Chat\Chat;
use Models\Model;

class Controler
{
   public $user;
   public $groupe;
   public $games;
   public $post;
   public $gamepost;
   public $friend;
   public $chat;
   public $model;

   public function __construct()
   {
      $this->user = new User();
      $this->groupe = new Groupe();
      $this->games = new Games();
      $this->post = new Post();
      $this->gamepost = new GamePost();
      $this->friend = new Friend();
      $this->chat = new Chat();
      $this->model = new Model("");
   }
}
