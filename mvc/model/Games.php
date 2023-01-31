<?php

namespace Models\Games;

use PDO;
use \Models\Model;

class Games
{
   private $pdo;
   private $model;
   public function __construct()
   {
      $this->pdo = new PDO('mysql:host=localhost;dbname=leveling2', 'root', '');
      $this->model = new Model('tblGames');
   }

   public function getAll(): array
   {
      return $this->model->getAll();
   }

   public function findById(int $id, string $target): array
   {
      return $this->model->findById($id, $target);
   }
}