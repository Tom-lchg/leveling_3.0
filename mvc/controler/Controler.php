<?php

namespace mvc\controler\Controler;

use Users\User;
use Groupes\Groupe;
use Games\Games;

class Controler
{
   public $user;
   public $groupe;
   public $games;

   public function __construct()
   {
      $this->user = new User();
      $this->groupe = new Groupe();
      $this->games = new Games();
   }
}