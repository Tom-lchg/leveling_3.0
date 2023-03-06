<?php

namespace mvc\controler\Controler;

use Users\User;
use Groupes\Groupe;
use Games\Games;
use Post\Post;
use Friend\Friend;

class Controler
{
   public $user;
   public $groupe;
   public $games;
   public $post;
   public $friend;

   public function __construct()
   {
      $this->user = new User();
      $this->groupe = new Groupe();
      $this->games = new Games();
      $this->post = new Post();
      $this->friend = new Friend();
   }
}
