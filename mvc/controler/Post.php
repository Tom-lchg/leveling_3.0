<?php

namespace Post;

use \Models\Model;
use \Models\Posts\Post as PostModel;

class Post
{
   private $model;
   public $postModel;

   public function __construct()
   {
      $this->model = new Model('tblPosts');
      $this->postModel = new PostModel();
   }

   public function createPost(array $data)
   {
      $content = htmlspecialchars($data['content']);
      $this->postModel->createPost($content);
   }
   
}
