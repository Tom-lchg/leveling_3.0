<?php

namespace GamePost;

use \Models\Model;
use \Models\GamePost\GamePost as GamePostModel;

class GamePost
{
   private $model;
   public $GamePostModel;

   public function __construct()
   {
      $this->model = new Model('tblgameposts');
      $this->GamePostModel = new GamePostModel();
   }

   public function createPost(array $data)
   {
      $content = htmlspecialchars($data['content']);
      $this->postModel->createPost($content);
   }
   
}