<?php

namespace Games;

use \Models\Model;
use \Models\Games\Games as GamesModel;

class Games
{
   private $model;
   public $gameModel;

   public function __construct()
   {
      $this->model = new Model('tblgames');
      $this->gameModel = new GamesModel();
   }
}
