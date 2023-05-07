<?php

namespace mvc\controler\Controler;

use Users\User;
use Groupes\Groupe;
use Games\Games;
use Post\Post;
use GamePost\GamePost;
use Friend\Friend;
use Conversation\Conversation;
use Message\Message;

class Controler
{
   public $user;
   public $groupe;
   public $games;
   public $post;
   public $gamepost;
   public $friend;
   public $conv;
   public $message;

   public function __construct()
   {
      $this->user = new User();
      $this->groupe = new Groupe();
      $this->games = new Games();
      $this->post = new Post();
      $this->gamepost = new GamePost();
      $this->friend = new Friend();
      $this->conv = new Conversation();
      $this->message = new Message();
   }
}
